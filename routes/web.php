<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminInvestmentController;
use App\Http\Controllers\AdminInvestmentPlanController;
use App\Http\Controllers\AdminInvestorController;
use App\Http\Controllers\AdminCompliancePageController;
use App\Http\Controllers\AdminFooterLinkController;
use App\Http\Controllers\AdminMediaController;
use App\Http\Controllers\AdminNoticeController;
use App\Http\Controllers\AdminSocialLinkController;
use App\Http\Controllers\AdminCareerController;
use App\Http\Controllers\AdminCaseStudyController;
use App\Http\Controllers\AdminDownloadController;
use App\Http\Controllers\AdminInsightController;
use App\Http\Controllers\AdminOrganisationController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminPartnerController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminServiceGroupController;
use App\Http\Controllers\AdminSiteSettingController;
use App\Http\Controllers\AdminTeamMemberController;
use App\Http\Controllers\AdminTestimonialController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\InvestorDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::get('/', [PublicPageController::class, 'home'])->name('home');
Route::get('/about', [PublicPageController::class, 'about'])->name('about');
Route::get('/services', [PublicPageController::class, 'services'])->name('services');
Route::get('/industries', [PublicPageController::class, 'industries'])->name('industries');
Route::get('/investment', [PublicPageController::class, 'investment'])->name('investment');
Route::get('/contact', [PublicPageController::class, 'contact'])->name('contact');
Route::post('/contact', [EnquiryController::class, 'store'])->name('contact.store')->middleware('throttle:5,1');
Route::get('/case-studies', [PublicPageController::class, 'caseStudies'])->name('case-studies');
Route::get('/case-studies/{slug}', [PublicPageController::class, 'caseStudy'])->name('case-study');
Route::get('/insights', [PublicPageController::class, 'insights'])->name('insights');
Route::get('/insights/{slug}', [PublicPageController::class, 'insight'])->name('insight');
Route::get('/property', [PublicPageController::class, 'property'])->name('property');
Route::get('/careers', [PublicPageController::class, 'careers'])->name('careers');
Route::get('/privacy', [PublicPageController::class, 'privacy'])->name('privacy');
Route::get('/community-projects', [PublicPageController::class, 'communityProjects'])->name('community-projects');
Route::get('/privacy-notice', [PublicPageController::class, 'privacyNotice'])->name('privacy-notice');
Route::get('/cookie-notice', [PublicPageController::class, 'cookieNotice'])->name('cookie-notice');
Route::get('/accessibility', [PublicPageController::class, 'accessibility'])->name('accessibility');
Route::get('/complaints', [PublicPageController::class, 'complaints'])->name('complaints');
Route::get('/terms', [PublicPageController::class, 'terms'])->name('terms');

Route::middleware(['auth', 'investor'])->group(function () {
    Route::get('/dashboard', [InvestorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/notices', [InvestorDashboardController::class, 'notices'])->name('dashboard.notices');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', fn () => redirect()->route('admin.dashboard'))->name('home');

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::get('/investments', [AdminInvestmentController::class, 'index'])->name('investments.index');
        Route::get('/investments/create', [AdminInvestmentController::class, 'create'])->name('investments.create');
        Route::post('/investments', [AdminInvestmentController::class, 'store'])->name('investments.store');
        Route::get('/investments/{investment}/edit', [AdminInvestmentController::class, 'edit'])->name('investments.edit');
        Route::patch('/investments/{investment}', [AdminInvestmentController::class, 'update'])->name('investments.update');

        Route::get('/investment-plans', [AdminInvestmentPlanController::class, 'index'])->name('investment-plans.index');
        Route::get('/investment-plans/create', [AdminInvestmentPlanController::class, 'create'])->name('investment-plans.create');
        Route::post('/investment-plans', [AdminInvestmentPlanController::class, 'store'])->name('investment-plans.store');
        Route::get('/investment-plans/{investmentPlan}/edit', [AdminInvestmentPlanController::class, 'edit'])->name('investment-plans.edit');
        Route::patch('/investment-plans/{investmentPlan}', [AdminInvestmentPlanController::class, 'update'])->name('investment-plans.update');

        Route::get('/investors', [AdminInvestorController::class, 'index'])->name('investors.index');
        Route::get('/investors/create', [AdminInvestorController::class, 'create'])->name('investors.create');
        Route::post('/investors', [AdminInvestorController::class, 'store'])->name('investors.store');
        Route::get('/investors/{investor}/edit', [AdminInvestorController::class, 'edit'])->name('investors.edit');
        Route::patch('/investors/{investor}', [AdminInvestorController::class, 'update'])->name('investors.update');

        Route::get('/notices', [AdminNoticeController::class, 'index'])->name('notices.index');
        Route::get('/notices/create', [AdminNoticeController::class, 'create'])->name('notices.create');
        Route::post('/notices', [AdminNoticeController::class, 'store'])->name('notices.store');
        Route::get('/notices/{notice}/edit', [AdminNoticeController::class, 'edit'])->name('notices.edit');
        Route::patch('/notices/{notice}', [AdminNoticeController::class, 'update'])->name('notices.update');

        Route::prefix('cms')->name('cms.')->group(function () {
            Route::get('/site-settings', [AdminSiteSettingController::class, 'edit'])->name('site-settings.edit');
            Route::patch('/site-settings', [AdminSiteSettingController::class, 'update'])->name('site-settings.update');

            Route::get('/pages', [AdminPageController::class, 'index'])->name('pages.index');
            Route::get('/pages/{page}/edit', [AdminPageController::class, 'edit'])->name('pages.edit');
            Route::patch('/pages/{page}', [AdminPageController::class, 'update'])->name('pages.update');

            Route::get('/media', [AdminMediaController::class, 'index'])->name('media.index');
            Route::post('/media', [AdminMediaController::class, 'store'])->name('media.store');
            Route::post('/media/bulk-delete', [AdminMediaController::class, 'bulkDelete'])->name('media.bulk-delete');
            Route::post('/media/bulk-category', [AdminMediaController::class, 'bulkCategory'])->name('media.bulk-category');
            Route::post('/media/bulk-visibility', [AdminMediaController::class, 'bulkVisibility'])->name('media.bulk-visibility');
            Route::get('/media/{media}/edit', [AdminMediaController::class, 'edit'])->name('media.edit');
            Route::patch('/media/{media}', [AdminMediaController::class, 'update'])->name('media.update');
            Route::post('/media/{media}/replace', [AdminMediaController::class, 'replace'])->name('media.replace');
            Route::delete('/media/{media}', [AdminMediaController::class, 'destroy'])->name('media.destroy');

            Route::get('/partners', [AdminPartnerController::class, 'index'])->name('partners.index');
            Route::get('/partners/create', [AdminPartnerController::class, 'create'])->name('partners.create');
            Route::post('/partners', [AdminPartnerController::class, 'store'])->name('partners.store');
            Route::get('/partners/{partner}/edit', [AdminPartnerController::class, 'edit'])->name('partners.edit');
            Route::patch('/partners/{partner}', [AdminPartnerController::class, 'update'])->name('partners.update');
            Route::delete('/partners/{partner}', [AdminPartnerController::class, 'destroy'])->name('partners.destroy');

            Route::get('/downloads', [AdminDownloadController::class, 'index'])->name('downloads.index');
            Route::get('/downloads/create', [AdminDownloadController::class, 'create'])->name('downloads.create');
            Route::post('/downloads', [AdminDownloadController::class, 'store'])->name('downloads.store');
            Route::get('/downloads/{download}/edit', [AdminDownloadController::class, 'edit'])->name('downloads.edit');
            Route::patch('/downloads/{download}', [AdminDownloadController::class, 'update'])->name('downloads.update');
            Route::delete('/downloads/{download}', [AdminDownloadController::class, 'destroy'])->name('downloads.destroy');

            Route::get('/services/groups', [AdminServiceGroupController::class, 'index'])->name('services.groups.index');
            Route::get('/services/groups/{serviceGroup}/edit', [AdminServiceGroupController::class, 'edit'])->name('services.groups.edit');
            Route::patch('/services/groups/{serviceGroup}', [AdminServiceGroupController::class, 'update'])->name('services.groups.update');

            Route::get('/services/groups/{serviceGroup}/items', [AdminServiceController::class, 'index'])->name('services.items.index');
            Route::get('/services/groups/{serviceGroup}/items/create', [AdminServiceController::class, 'create'])->name('services.items.create');
            Route::post('/services/groups/{serviceGroup}/items', [AdminServiceController::class, 'store'])->name('services.items.store');
            Route::get('/services/groups/{serviceGroup}/items/{service}/edit', [AdminServiceController::class, 'edit'])->name('services.items.edit');
            Route::patch('/services/groups/{serviceGroup}/items/{service}', [AdminServiceController::class, 'update'])->name('services.items.update');

            Route::get('/people/team', [AdminTeamMemberController::class, 'index'])->name('people.team.index');
            Route::get('/people/team/create', [AdminTeamMemberController::class, 'create'])->name('people.team.create');
            Route::post('/people/team', [AdminTeamMemberController::class, 'store'])->name('people.team.store');
            Route::get('/people/team/{teamMember}/edit', [AdminTeamMemberController::class, 'edit'])->name('people.team.edit');
            Route::patch('/people/team/{teamMember}', [AdminTeamMemberController::class, 'update'])->name('people.team.update');
            Route::delete('/people/team/{teamMember}', [AdminTeamMemberController::class, 'destroy'])->name('people.team.destroy');

            Route::get('/people/testimonials', [AdminTestimonialController::class, 'index'])->name('people.testimonials.index');
            Route::get('/people/testimonials/create', [AdminTestimonialController::class, 'create'])->name('people.testimonials.create');
            Route::post('/people/testimonials', [AdminTestimonialController::class, 'store'])->name('people.testimonials.store');
            Route::get('/people/testimonials/{testimonial}/edit', [AdminTestimonialController::class, 'edit'])->name('people.testimonials.edit');
            Route::patch('/people/testimonials/{testimonial}', [AdminTestimonialController::class, 'update'])->name('people.testimonials.update');
            Route::delete('/people/testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('people.testimonials.destroy');

            Route::get('/trust', [AdminOrganisationController::class, 'index'])->name('trust.index');
            Route::get('/trust/create', [AdminOrganisationController::class, 'create'])->name('trust.create');
            Route::post('/trust', [AdminOrganisationController::class, 'store'])->name('trust.store');
            Route::get('/trust/{organisation}/edit', [AdminOrganisationController::class, 'edit'])->name('trust.edit');
            Route::patch('/trust/{organisation}', [AdminOrganisationController::class, 'update'])->name('trust.update');
            Route::delete('/trust/{organisation}', [AdminOrganisationController::class, 'destroy'])->name('trust.destroy');

            Route::get('/content/case-studies', [AdminCaseStudyController::class, 'index'])->name('content.case-studies.index');
            Route::get('/content/case-studies/create', [AdminCaseStudyController::class, 'create'])->name('content.case-studies.create');
            Route::post('/content/case-studies', [AdminCaseStudyController::class, 'store'])->name('content.case-studies.store');
            Route::get('/content/case-studies/{caseStudy}/edit', [AdminCaseStudyController::class, 'edit'])->name('content.case-studies.edit');
            Route::patch('/content/case-studies/{caseStudy}', [AdminCaseStudyController::class, 'update'])->name('content.case-studies.update');
            Route::post('/content/case-studies/{caseStudy}/publish', [AdminCaseStudyController::class, 'publish'])->name('content.case-studies.publish');
            Route::post('/content/case-studies/{caseStudy}/archive', [AdminCaseStudyController::class, 'archive'])->name('content.case-studies.archive');
            Route::delete('/content/case-studies/{caseStudy}', [AdminCaseStudyController::class, 'destroy'])->name('content.case-studies.destroy');

            Route::get('/content/insights', [AdminInsightController::class, 'index'])->name('content.insights.index');
            Route::get('/content/insights/create', [AdminInsightController::class, 'create'])->name('content.insights.create');
            Route::post('/content/insights', [AdminInsightController::class, 'store'])->name('content.insights.store');
            Route::get('/content/insights/{insight}/edit', [AdminInsightController::class, 'edit'])->name('content.insights.edit');
            Route::patch('/content/insights/{insight}', [AdminInsightController::class, 'update'])->name('content.insights.update');
            Route::post('/content/insights/{insight}/publish', [AdminInsightController::class, 'publish'])->name('content.insights.publish');
            Route::post('/content/insights/{insight}/archive', [AdminInsightController::class, 'archive'])->name('content.insights.archive');
            Route::delete('/content/insights/{insight}', [AdminInsightController::class, 'destroy'])->name('content.insights.destroy');

            Route::get('/content/careers', [AdminCareerController::class, 'index'])->name('content.careers.index');
            Route::get('/content/careers/create', [AdminCareerController::class, 'create'])->name('content.careers.create');
            Route::post('/content/careers', [AdminCareerController::class, 'store'])->name('content.careers.store');
            Route::get('/content/careers/{careerOpportunity}/edit', [AdminCareerController::class, 'edit'])->name('content.careers.edit');
            Route::patch('/content/careers/{careerOpportunity}', [AdminCareerController::class, 'update'])->name('content.careers.update');
            Route::post('/content/careers/{careerOpportunity}/publish', [AdminCareerController::class, 'publish'])->name('content.careers.publish');
            Route::post('/content/careers/{careerOpportunity}/archive', [AdminCareerController::class, 'archive'])->name('content.careers.archive');
            Route::delete('/content/careers/{careerOpportunity}', [AdminCareerController::class, 'destroy'])->name('content.careers.destroy');

            Route::get('/footer/links', [AdminFooterLinkController::class, 'index'])->name('footer.links.index');
            Route::get('/footer/links/create', [AdminFooterLinkController::class, 'create'])->name('footer.links.create');
            Route::post('/footer/links', [AdminFooterLinkController::class, 'store'])->name('footer.links.store');
            Route::get('/footer/links/{footerLink}/edit', [AdminFooterLinkController::class, 'edit'])->name('footer.links.edit');
            Route::patch('/footer/links/{footerLink}', [AdminFooterLinkController::class, 'update'])->name('footer.links.update');
            Route::delete('/footer/links/{footerLink}', [AdminFooterLinkController::class, 'destroy'])->name('footer.links.destroy');

            Route::get('/footer/social', [AdminSocialLinkController::class, 'index'])->name('footer.social.index');
            Route::get('/footer/social/create', [AdminSocialLinkController::class, 'create'])->name('footer.social.create');
            Route::post('/footer/social', [AdminSocialLinkController::class, 'store'])->name('footer.social.store');
            Route::get('/footer/social/{socialLink}/edit', [AdminSocialLinkController::class, 'edit'])->name('footer.social.edit');
            Route::patch('/footer/social/{socialLink}', [AdminSocialLinkController::class, 'update'])->name('footer.social.update');
            Route::delete('/footer/social/{socialLink}', [AdminSocialLinkController::class, 'destroy'])->name('footer.social.destroy');

            Route::get('/compliance', [AdminCompliancePageController::class, 'index'])->name('compliance.index');
            Route::get('/compliance/{compliancePage}/edit', [AdminCompliancePageController::class, 'edit'])->name('compliance.edit');
            Route::patch('/compliance/{compliancePage}', [AdminCompliancePageController::class, 'update'])->name('compliance.update');
        });
    });

require __DIR__.'/auth.php';