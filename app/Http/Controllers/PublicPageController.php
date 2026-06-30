<?php

namespace App\Http\Controllers;

use App\Services\CMS\CareerService;
use App\Services\CMS\CaseStudyService;
use App\Services\CMS\CompliancePageService;
use App\Services\CMS\InsightService;
use App\Services\CMS\OrganisationService;
use App\Services\CMS\PageService;
use App\Services\CMS\ServiceService;
use App\Services\CMS\SiteSettingService;
use App\Services\CMS\TeamService;
use App\Services\CMS\TestimonialService;

class PublicPageController extends Controller
{
    public function __construct(
        private PageService $pageService,
        private ServiceService $serviceService,
        private SiteSettingService $siteSettingService,
        private TeamService $teamService,
        private TestimonialService $testimonialService,
        private OrganisationService $organisationService,
        private CaseStudyService $caseStudyService,
        private InsightService $insightService,
        private CareerService $careerService,
        private CompliancePageService $compliancePageService
    ) {}

    public function home()
    {
        $page          = $this->pageService->homepage();
        $testimonials  = $this->testimonialService->featured();
        $organisations = $this->organisationService->forHome();
        return view('public.home', compact('page', 'testimonials', 'organisations'));
    }

    public function about()
    {
        $page           = $this->pageService->forSlug('about');
        $teamMembers    = $this->teamService->active();
        $accreditations = $this->organisationService->byType('accreditation');
        return view('public.about', compact('page', 'teamMembers', 'accreditations'));
    }

    public function services()
    {
        $page          = $this->pageService->forSlug('services');
        $serviceGroups = $this->serviceService->allGroups();
        return view('public.services', compact('page', 'serviceGroups'));
    }

    public function investment()
    {
        $page = $this->pageService->forSlug('investment');
        return view('public.investment', compact('page'));
    }

    public function contact()
    {
        $page        = $this->pageService->forSlug('contact');
        $siteSetting = $this->siteSettingService->current();
        return view('public.contact', compact('page', 'siteSetting'));
    }

    public function caseStudies()
    {
        $page        = $this->pageService->forSlug('case-studies');
        $caseStudies = $this->caseStudyService->published();
        return view('public.case-studies', compact('page', 'caseStudies'));
    }

    public function caseStudy(string $slug)
    {
        $caseStudy = $this->caseStudyService->findBySlug($slug);
        if (! $caseStudy) {
            abort(404);
        }
        return view('public.case-study', compact('caseStudy'));
    }

    public function insights()
    {
        $page     = $this->pageService->forSlug('insights');
        $insights = $this->insightService->published();
        return view('public.insights', compact('page', 'insights'));
    }

    public function insight(string $slug)
    {
        $insight = $this->insightService->findBySlug($slug);
        if (! $insight) {
            abort(404);
        }
        return view('public.insight', compact('insight'));
    }

    public function property()
    {
        $page = $this->pageService->forSlug('property');
        return view('public.property', compact('page'));
    }

    public function careers()
    {
        $page    = $this->pageService->forSlug('careers');
        $careers = $this->careerService->published();
        return view('public.careers', compact('page', 'careers'));
    }

    public function privacy()
    {
        $page = $this->pageService->forSlug('privacy');
        return view('public.privacy', compact('page'));
    }

    public function communityProjects()
    {
        $page = $this->pageService->forSlug('community-projects');
        return view('public.community-projects', compact('page'));
    }

    public function privacyNotice()
    {
        $page           = $this->pageService->forSlug('privacy-notice');
        $compliancePage = $this->compliancePageService->forSlug('privacy-notice');
        return view('public.privacy-notice', compact('page', 'compliancePage'));
    }

    public function cookieNotice()
    {
        $page           = $this->pageService->forSlug('cookie-notice');
        $compliancePage = $this->compliancePageService->forSlug('cookie-notice');
        return view('public.cookie-notice', compact('page', 'compliancePage'));
    }

    public function accessibility()
    {
        $page           = $this->pageService->forSlug('accessibility');
        $compliancePage = $this->compliancePageService->forSlug('accessibility');
        return view('public.accessibility', compact('page', 'compliancePage'));
    }

    public function complaints()
    {
        $page           = $this->pageService->forSlug('complaints');
        $compliancePage = $this->compliancePageService->forSlug('complaints');
        return view('public.complaints', compact('page', 'compliancePage'));
    }

    public function terms()
    {
        $page           = $this->pageService->forSlug('terms');
        $compliancePage = $this->compliancePageService->forSlug('terms');
        return view('public.terms', compact('page', 'compliancePage'));
    }
}
