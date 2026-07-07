<?php

namespace App\Http\Controllers;

use App\Models\HeroCard;
use App\Models\HeroCardIcon;
use App\Models\Organisation;
use App\Models\Page;
use App\Models\PageAboutValue;
use App\Models\PageEngagementStep;
use App\Models\PageIndustry;
use App\Models\PageServiceCard;
use App\Models\PageStatistic;
use App\Models\PageWhyChooseUsCard;
use App\Models\Testimonial;
use App\Services\CMS\MediaService;
use App\Services\CMS\OrganisationService;
use App\Services\CMS\PageService;
use App\Services\CMS\TestimonialService;
use App\Support\HeroIconRegistry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPageController extends Controller
{
    /**
     * Bounded collection counts. These mirror the fixed number of slots the
     * homepage design supports for each repeatable section — matches the
     * existing Hero Cards precedent (exactly 2, no more/fewer).
     */
    private const STATISTIC_COUNT = 4;
    private const SERVICE_CARD_COUNT = 5;
    private const INDUSTRY_COUNT = 8;
    private const WHY_CHOOSE_US_COUNT = 6;
    private const ENGAGEMENT_STEP_COUNT = 4;
    private const ABOUT_VALUE_COUNT = 4;
    private const DISCIPLINE_ITEM_COUNT = 5;

    public function __construct(
        private PageService $service,
        private MediaService $media,
        private TestimonialService $testimonialService,
        private OrganisationService $organisationService,
    ) {}

    public function index()
    {
        $pages = $this->service->all();
        return view('admin.cms.pages.index', compact('pages'));
    }

    public function edit(Page $page)
    {
        $page->loadMissing(
            'heroMedia',
            'aboutMedia',
            'heroCards.image',
            'heroCards.icons',
            'statistics',
            'serviceCards.image',
            'industries',
            'whyChooseUsCards',
            'engagementSteps',
            'aboutValues',
        );

        $testimonials = null;
        $organisations = null;

        if ($page->slug === 'home') {
            $testimonials = Testimonial::orderByDesc('featured')->orderBy('display_order')->get();
            $organisations = Organisation::whereIn('type', ['partner', 'accreditation'])
                ->orderBy('display_order')
                ->orderBy('name')
                ->get();
        }

        return view('admin.cms.pages.edit', compact('page', 'testimonials', 'organisations'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate($this->rulesFor($page));

        $data['is_published']    = $request->boolean('is_published');
        $data['sitemap_include'] = $request->boolean('sitemap_include');
        $data['updated_by']      = auth()->id();

        if ($request->hasFile('hero_image_file')) {
            $heroImage = $this->media->store($request->file('hero_image_file'), 'pages', auth()->id());
            $data['hero_media_id'] = $heroImage->id;
        } elseif ($request->boolean('remove_hero_image')) {
            $data['hero_media_id'] = null;
        }

        if ($page->slug === 'home') {
            if ($request->hasFile('about_media_file')) {
                $aboutImage = $this->media->store($request->file('about_media_file'), 'pages', auth()->id());
                $data['about_media_id'] = $aboutImage->id;
            } elseif ($request->boolean('remove_about_media')) {
                $data['about_media_id'] = null;
            }
        }

        $heroCardsInput = $data['hero_cards'] ?? [];
        $statisticsInput = $data['statistics'] ?? [];
        $serviceCardsInput = $data['service_cards'] ?? [];
        $industriesInput = $data['industries'] ?? [];
        $whyChooseUsInput = $data['why_choose_us'] ?? [];
        $engagementStepsInput = $data['engagement_steps'] ?? [];
        $aboutValuesInput = $data['about_values'] ?? [];
        $disciplineItemsInput = $data['discipline_items'] ?? [];
        $testimonialsInput = $data['testimonials'] ?? [];
        $partnersInput = $data['partners'] ?? [];

        unset(
            $data['hero_image_file'], $data['remove_hero_image'],
            $data['about_media_file'], $data['remove_about_media'],
            $data['hero_cards'], $data['statistics'], $data['service_cards'],
            $data['industries'], $data['why_choose_us'], $data['engagement_steps'],
            $data['about_values'], $data['discipline_items'], $data['testimonials'], $data['partners'],
        );

        if ($page->slug === 'home') {
            $data['discipline_items'] = collect($disciplineItemsInput)
                ->map(fn ($item) => trim((string) ($item['label'] ?? '')))
                ->filter()
                ->values()
                ->all();
        }

        $this->service->update($page, $data);

        if ($page->slug === 'home') {
            if ($request->has('hero_cards')) {
                $this->syncHeroCards($request, $page, $heroCardsInput);
            }

            $this->syncRows($page, PageStatistic::class, $statisticsInput, self::STATISTIC_COUNT, ['label', 'value', 'caption']);
            $this->syncServiceCards($request, $page, $serviceCardsInput);
            $this->syncRows($page, PageIndustry::class, $industriesInput, self::INDUSTRY_COUNT, ['title']);
            $this->syncRows($page, PageWhyChooseUsCard::class, $whyChooseUsInput, self::WHY_CHOOSE_US_COUNT, ['icon', 'title', 'description', 'is_dark']);
            $this->syncRows($page, PageEngagementStep::class, $engagementStepsInput, self::ENGAGEMENT_STEP_COUNT, ['title', 'description', 'is_dark']);
            $this->syncRows($page, PageAboutValue::class, $aboutValuesInput, self::ABOUT_VALUE_COUNT, ['icon', 'title', 'description']);

            $this->syncTestimonials($testimonialsInput);
            $this->syncPartners($partnersInput);

            $this->testimonialService->flush();
            $this->organisationService->flush();
        }

        return redirect()->route('admin.cms.pages.edit', $page)
            ->with('success', 'Page content updated.');
    }

    private function rulesFor(Page $page): array
    {
        $rules = [
            'title'               => 'required|string|max:255',
            'hero_title'          => 'nullable|string|max:500',
            'hero_subtitle'       => 'nullable|string|max:255',
            'hero_description'    => 'nullable|string|max:2000',
            'hero_image_file'     => 'nullable|file|mimes:jpg,jpeg,png,webp|max:4096',
            'remove_hero_image'   => 'nullable|boolean',
            'primary_cta_label'   => 'nullable|string|max:100',
            'primary_cta_url'     => 'nullable|string|max:500',
            'secondary_cta_label' => 'nullable|string|max:100',
            'secondary_cta_url'   => 'nullable|string|max:500',
            'meta_title'          => 'nullable|string|max:255',
            'meta_description'    => 'nullable|string|max:500',
            'canonical_url'       => 'nullable|url|max:500',
            'robots'              => ['nullable', Rule::in(['index,follow', 'noindex,follow', 'index,nofollow', 'noindex,nofollow'])],
            'sitemap_include'     => 'nullable|boolean',
            'is_published'        => 'nullable|boolean',
        ];

        if ($page->slug !== 'home') {
            return $rules;
        }

        return array_merge($rules, [
            'hero_cards'                       => 'nullable|array',
            'hero_cards.*.badge'               => 'nullable|string|max:255',
            'hero_cards.*.title'               => 'nullable|string|max:255',
            'hero_cards.*.description'         => 'nullable|string|max:2000',
            'hero_cards.*.cta_label'           => 'nullable|string|max:100',
            'hero_cards.*.cta_url'             => 'nullable|string|max:500',
            'hero_cards.*.is_visible'          => 'nullable|boolean',
            'hero_cards.*.image_file'          => 'nullable|file|mimes:jpg,jpeg,png,webp|max:4096',
            'hero_cards.*.remove_image'        => 'nullable|boolean',
            'hero_cards.*.image_alt'           => 'nullable|string|max:255',
            'hero_cards.*.icons'                => 'nullable|array',
            'hero_cards.*.icons.*.icon'         => ['nullable', 'string', Rule::in(HeroIconRegistry::options())],
            'hero_cards.*.icons.*.label'        => 'nullable|string|max:255',
            'hero_cards.*.icons.*.tag'          => 'nullable|string|max:100',

            'statistics'                       => 'nullable|array',
            'statistics.*.label'               => 'nullable|string|max:255',
            'statistics.*.value'               => 'nullable|string|max:100',
            'statistics.*.caption'              => 'nullable|string|max:255',

            'services_eyebrow'                 => 'nullable|string|max:255',
            'services_heading'                 => 'nullable|string|max:255',
            'services_heading_break'           => 'nullable|string|max:255',
            'services_cta_label'               => 'nullable|string|max:100',
            'services_cta_url'                 => 'nullable|string|max:500',
            'service_cards'                    => 'nullable|array',
            'service_cards.*.icon'             => ['nullable', 'string', Rule::in(HeroIconRegistry::options())],
            'service_cards.*.title'            => 'nullable|string|max:255',
            'service_cards.*.description'      => 'nullable|string|max:2000',
            'service_cards.*.href'             => 'nullable|string|max:500',
            'service_cards.*.image_file'       => 'nullable|file|mimes:jpg,jpeg,png,webp|max:4096',
            'service_cards.*.remove_image'     => 'nullable|boolean',
            'service_cards.*.image_alt'        => 'nullable|string|max:255',

            'industries_eyebrow'               => 'nullable|string|max:255',
            'industries_heading'               => 'nullable|string|max:255',
            'industries_cta_label'             => 'nullable|string|max:100',
            'industries_cta_url'               => 'nullable|string|max:500',
            'industries'                       => 'nullable|array',
            'industries.*.title'               => 'nullable|string|max:255',

            'why_choose_us_eyebrow'            => 'nullable|string|max:255',
            'why_choose_us_heading'            => 'nullable|string|max:255',
            'why_choose_us_description'        => 'nullable|string|max:2000',
            'why_choose_us_cta_label'          => 'nullable|string|max:100',
            'why_choose_us_cta_url'            => 'nullable|string|max:500',
            'why_choose_us'                     => 'nullable|array',
            'why_choose_us.*.icon'              => ['nullable', 'string', Rule::in(HeroIconRegistry::options())],
            'why_choose_us.*.title'             => 'nullable|string|max:255',
            'why_choose_us.*.description'       => 'nullable|string|max:2000',
            'why_choose_us.*.is_dark'           => 'nullable|boolean',

            'engagement_eyebrow'                => 'nullable|string|max:255',
            'engagement_heading'                => 'nullable|string|max:255',
            'engagement_description'            => 'nullable|string|max:2000',
            'engagement_steps'                  => 'nullable|array',
            'engagement_steps.*.title'           => 'nullable|string|max:255',
            'engagement_steps.*.description'     => 'nullable|string|max:2000',
            'engagement_steps.*.is_dark'         => 'nullable|boolean',

            'discipline_eyebrow'                 => 'nullable|string|max:255',
            'discipline_items'                    => 'nullable|array',
            'discipline_items.*.label'            => 'nullable|string|max:255',

            'about_eyebrow'                      => 'nullable|string|max:255',
            'about_heading'                      => 'nullable|string|max:255',
            'about_description'                  => 'nullable|string|max:2000',
            'about_media_file'                   => 'nullable|file|mimes:jpg,jpeg,png,webp|max:4096',
            'remove_about_media'                 => 'nullable|boolean',
            'about_media_alt'                     => 'nullable|string|max:255',
            'about_cta_label'                     => 'nullable|string|max:100',
            'about_cta_url'                        => 'nullable|string|max:500',
            'about_values'                          => 'nullable|array',
            'about_values.*.icon'                   => ['nullable', 'string', Rule::in(HeroIconRegistry::options())],
            'about_values.*.title'                  => 'nullable|string|max:255',
            'about_values.*.description'            => 'nullable|string|max:2000',

            'wwu_eyebrow'                          => 'nullable|string|max:255',
            'wwu_heading'                           => 'nullable|string|max:255',
            'wwu_description'                       => 'nullable|string|max:2000',
            'wwu_primary_cta_label'                 => 'nullable|string|max:100',
            'wwu_primary_cta_url'                   => 'nullable|string|max:500',
            'wwu_secondary_cta_label'               => 'nullable|string|max:100',
            'wwu_secondary_cta_url'                 => 'nullable|string|max:500',
            'wwu_investor_note'                     => 'nullable|string|max:255',
            'wwu_investor_cta_label'                => 'nullable|string|max:255',
            'wwu_investor_cta_url'                  => 'nullable|string|max:500',

            'testimonials'                          => 'nullable|array',
            'testimonials.*.featured'               => 'nullable|boolean',
            'testimonials.*.display_order'          => 'nullable|integer|min:0',

            'partners'                               => 'nullable|array',
            'partners.*.is_active'                   => 'nullable|boolean',
            'partners.*.display_order'                => 'nullable|integer|min:0',
        ]);
    }

    private function syncHeroCards(Request $request, Page $page, array $heroCardsInput): void
    {
        foreach ($heroCardsInput as $index => $cardInput) {
            $order = $index + 1;

            $card = HeroCard::firstOrNew(['page_id' => $page->id, 'order' => $order]);

            $card->badge       = $cardInput['badge'] ?? null;
            $card->title       = $cardInput['title'] ?? null;
            $card->description = $cardInput['description'] ?? null;
            $card->cta_label   = $cardInput['cta_label'] ?? null;
            $card->cta_url     = $cardInput['cta_url'] ?? null;
            $card->is_visible  = ! empty($cardInput['is_visible']);

            if ($request->hasFile("hero_cards.{$index}.image_file")) {
                $cardImage = $this->media->store($request->file("hero_cards.{$index}.image_file"), 'pages', auth()->id());
                $card->image_media_id = $cardImage->id;
            } elseif (! empty($cardInput['remove_image'])) {
                $card->image_media_id = null;
            }

            $card->image_alt = $cardInput['image_alt'] ?? $card->image_alt;

            $card->save();

            $this->syncHeroCardIcons($card, $cardInput['icons'] ?? []);
        }
    }

    private function syncHeroCardIcons(HeroCard $card, array $iconsInput): void
    {
        $rows = collect($iconsInput)
            ->filter(fn ($row) => filled($row['icon'] ?? null) && filled($row['label'] ?? null))
            ->values();

        $keptOrders = [];

        foreach ($rows as $index => $row) {
            $order = $index + 1;
            $keptOrders[] = $order;

            HeroCardIcon::updateOrCreate(
                ['hero_card_id' => $card->id, 'order' => $order],
                [
                    'icon'  => $row['icon'],
                    'label' => $row['label'],
                    'tag'   => $row['tag'] ?? null,
                ]
            );
        }

        $card->icons()->whereNotIn('order', $keptOrders)->delete();
    }

    /**
     * Shared writer for the bounded, image-free homepage collections
     * (statistics, industries, why-choose-us cards, engagement steps,
     * about values). Each fixed slot is written by position (page_id +
     * order), mirroring the Hero Card precedent above.
     */
    private function syncRows(Page $page, string $modelClass, array $rows, int $count, array $fields): void
    {
        /** @var class-string<Model> $modelClass */
        for ($i = 0; $i < $count; $i++) {
            $input = $rows[$i] ?? [];
            $order = $i + 1;

            $row = $modelClass::firstOrNew(['page_id' => $page->id, 'order' => $order]);

            foreach ($fields as $field) {
                if ($field === 'is_dark') {
                    $row->is_dark = ! empty($input['is_dark']);
                    continue;
                }

                $row->{$field} = $input[$field] ?? null;
            }

            $row->save();
        }
    }

    private function syncServiceCards(Request $request, Page $page, array $rows): void
    {
        for ($i = 0; $i < self::SERVICE_CARD_COUNT; $i++) {
            $input = $rows[$i] ?? [];
            $order = $i + 1;

            $card = PageServiceCard::firstOrNew(['page_id' => $page->id, 'order' => $order]);

            $card->icon        = $input['icon'] ?? null;
            $card->title       = $input['title'] ?? null;
            $card->description = $input['description'] ?? null;
            $card->href        = $input['href'] ?? null;

            if ($request->hasFile("service_cards.{$i}.image_file")) {
                $image = $this->media->store($request->file("service_cards.{$i}.image_file"), 'pages', auth()->id());
                $card->image_media_id = $image->id;
            } elseif (! empty($input['remove_image'])) {
                $card->image_media_id = null;
            }

            $card->image_alt = $input['image_alt'] ?? $card->image_alt;

            $card->save();
        }
    }

    /**
     * Homepage inclusion for testimonials is managed on the existing
     * Testimonial records (featured + display_order) — no separate
     * homepage-only copy is created, per the CMS architecture decision
     * against duplicating testimonial data.
     */
    private function syncTestimonials(array $rows): void
    {
        foreach ($rows as $id => $input) {
            Testimonial::whereKey($id)->update([
                'featured'      => ! empty($input['featured']),
                'display_order' => (int) ($input['display_order'] ?? 0),
            ]);
        }
    }

    /**
     * Homepage visibility for partners/accreditations is managed on the
     * existing Organisation records (is_active + display_order) — no
     * separate homepage-only copy is created.
     */
    private function syncPartners(array $rows): void
    {
        foreach ($rows as $id => $input) {
            Organisation::whereKey($id)->update([
                'is_active'     => ! empty($input['is_active']),
                'display_order' => (int) ($input['display_order'] ?? 0),
            ]);
        }
    }
}
