# The Lylods Group — Release Candidate (RC-1) Review

**Date:** 2026-07-19
**Sprint:** RC-1 Completion Sprint (`.claude/adjust`)
**Scope:** Completion, polish, stability, and QA of the existing enterprise CMS platform. No new CMS modules, no layout redesigns, no PageBuilder — per the platform's locked architectural principles.

---

## 1. Summary

The platform's CMS architecture was already substantially complete going into this sprint. The work here closed the remaining gaps between "architecture exists" and "content is populated, wired end-to-end, and tested" — plus fixed a genuine pre-existing security gap found during forms verification (open self-registration into the investor portal).

Every change stayed inside the existing CMS pattern: new content lives in the database behind `*_media_id` / model fields already designed for it, and everything remains editable by an admin through the existing admin screens. No PageBuilder, no section composition, no layout changes.

**Test suite: 179/179 passing** (up from 151 at sprint start — 28 new tests added, 2 replaced for the registration change).

---

## 2. Completed Work

### Task 1 — Mega menu interaction
- Root-caused and fixed the "hover gap" bug: mouseleave used to close a mega panel instantly with no delay, so crossing the small visual gap between the nav button and the dropdown panel would slam it shut. Added a shared debounced timer (150ms open-delay, 300ms close-delay) in `components/layouts/public.blade.php`.
- Added `@focusout` handling on each mega-menu trigger so keyboard users tabbing out of the last link in a panel closes it cleanly, without breaking the existing global Escape handler.
- Investigated the previously-documented "4 dead anchors in the About mega panel" (`.claude/TODO.md`) — confirmed these no longer exist in the current markup; the About panel only links to real routes. No action needed; the TODO note is stale.
- No IA/structural navigation changes made (Industries-into-primary-nav / new Insights mega menu remain explicitly out of scope, per `.claude/decisions/009_navigation_governance.md`).

### Task 2 — Placeholder images (release blocker)
- Removed all 11 hardcoded Unsplash hotlink fallbacks (`?? 'https://images.unsplash.com/...'`) from `home.blade.php` and `property/context-banner.blade.php`.
- Sourced, downloaded, and imported **37 real photographs** into the Media Library via the existing `MediaService` pipeline (same WebP variant generation every admin upload goes through) — nothing hotlinked, everything stored locally and optimised.
- Assigned real images across every page's existing (previously empty) `*_media_id` fields: Home (hero, about, 2 hero cards, 5 service cards), About (intro), Property (context banner), Community Projects (hero, audience, role, 6 engagement cards — these card rows didn't exist yet, so they were created with the exact copy already defined as the page's own fallback content, not new messaging), Investment (hero, approach), Contact (hero, info panel), Industries (8 cards — same situation, rows created matching the existing fallback array), and 5 representative Services images (one per service group).
- Every image remains fully admin-editable — the CMS image-upload fields these use already existed; this sprint populated them, it didn't add them.
- Fixed a literal dev-artifact placeholder on the About page ("Future CMS-managed image" label with no photo) by populating `about_page_intro_media_id`.
- Set a site-wide default Open Graph image (Site Settings had none, and no individual page had one either — every page's social preview was blank; now falls back sensibly).

### Task 3 — Content review
- Swept all public views for lorem ipsum, dev-artifact copy, and placeholder text. None found in the areas Task 2 covers.
- Found (but did not fix, per explicit scope decision) that Insights and Case Studies pages still show icon/gradient placeholder blocks instead of photos even for real database records, and Insights has literal "Article coming soon" copy and non-functional "Browse by topic" filter pills. **Logged as a known issue below** — out of the brief's named Task 2 category list, and fixing it would mean wiring `featured_media_id` into two more views, a decision explicitly deferred to v1.1.

### Task 4 — Contact information → Site Settings
- Added `alternative_phone`, `support_email`, `enquiries_email` columns to `site_settings` (existing `primary_email`, `phone`, `address`, `office_hours` were already there but unpopulated).
- Wired the new fields into the admin Site Settings form, validation, and model.
- Seeded/backfilled the exact RC-1 demonstration values from the brief (phone `012345678`, alt phone `098765432`, `sample@thelylodsgroup.com`, `support@thelylodsgroup.com`, `info@thelylodsgroup.com`, the Business District address block, and the stated business hours).
- Replaced hardcoded contact defaults in `contact.blade.php` and the footer (`components/layouts/public.blade.php`) with real Site Settings data — the footer's trust strip previously had a literal `<span>United Kingdom</span>` and no phone number at all; both now pull from Site Settings with a graceful fallback if ever cleared.
- Nothing hardcoded — every value here is admin-editable via **Admin → Site Settings**.

### Task 5 — CMS editability verification
- **Found and closed a real gap against the project's own mandatory-testing rule** (`.claude/CLAUDE.md`: "every admin edit screen" needs authenticated GET render tests): 27 admin index/edit screens across Investments, Investment Plans, Investors, Notices, Media, Partners, Downloads, Service Groups, Team, Testimonials, Organisations (Trust), Case Studies, Insights, Careers, Footer Links, Social Links, and Compliance Pages had **zero** render test coverage.
- Added `tests/Feature/AdminScreenRenderTest.php` (28 tests) covering every one of those screens: 200 status, expected heading/section renders, correct route-model-binding fixtures.
- Also fully wired `Service.image_media_id` (column existed, was never in the admin form or public render) and added dedicated tests for it in `tests/Feature/AdminSiteSettingsAndServiceImagesTest.php`.
- Manually verified (via direct PATCH requests in tests, not just GET) that Site Settings and Service item edits save correctly and the new values appear on the live public page.
- Pre-existing modules (Homepage/About/Services/Industries/Property/Community/Investment/Careers/Contact/Footer via `AdminPageController`) already had strong test coverage before this sprint (9 existing test files) — untouched, still passing.

### Task 6 — Responsive QA
- **No browser automation tool was available in this environment**, so this was a code-level review of Tailwind breakpoint usage, not actual visual/interactive verification at different viewport widths. Documented here as such, not overstated as full QA.
- Reviewed every `grid-cols-[...]` and fixed-pixel-width layout across the public component library: all multi-column pixel/fraction grids are correctly gated behind `lg:` prefixes (mobile falls back to natural single-column stacking). The mega-menu panels' fixed pixel widths are safely scoped inside `hidden lg:flex`, so mobile never renders them.
- No `<table>` elements exist on the public site (no horizontal-scroll table risk).
- **Recommendation:** an actual manual pass on real devices (or a tool with browser automation) before client sign-off, since this review could only confirm the code *should* behave responsively, not that it visually does.

### Task 7 — UX polish
- Mega menu interaction fixed (see Task 1).
- Reviewed hover/focus states, loading states, spacing across section components — no other "clearly unfinished" markers found, aside from the Insights/Case Studies items logged as known issues.
- Left the disabled "Search… (coming soon)" input in the authenticated dashboard nav untouched — honestly labeled as a future feature, not a broken element; flagged for v1.1 consideration.

### Task 8 — Forms
- Contact form (`EnquiryController`): confirmed working — CSRF, inline validation, honeypot, rate throttling, success/error states, Mailable delivery. Existing test coverage (11 tests) still passing.
- Newsletter: **does not exist in the codebase** (confirmed with user) — marked N/A rather than built, per the sprint's no-new-features rule.
- **Confirmed every admin POST form site-wide has `@csrf`** (automated grep across all Blade forms, zero missing).
- **Found and fixed a real security/business-logic gap**: the standard Laravel `/register` route was live and public, defaulting new self-registered accounts to `role = 'investor'` (DB column default) and landing them straight on the investor dashboard — with no admin approval step. This directly contradicted the platform's "investor accounts are admin-created only" design. Confirmed with user and **disabled**: removed the `register` routes, deleted the now-unreachable `RegisteredUserController` and its view, and updated `RegistrationTest.php` to assert the route is gone. Investor accounts can now only be created via **Admin → Investors → Create**, as intended.

### Task 9 — Performance
- Added `loading="lazy" decoding="async"` to every below-the-fold content image that was missing it (About accreditations/team/intro, About Values, Community Projects audience/role, Contact info panel, Investment approach, Property context banner, Services card component). Hero/background images were deliberately left eager-loaded, since lazy-loading above-the-fold LCP images would hurt perceived load speed, not help it.
- Verified the local SVG placeholder asset and favicon exist on disk; verified the Vite build manifest exists.
- No console-error or 404-asset check was possible without a browser tool — recommend a manual DevTools pass before client review.

### Task 10 — SEO
- Verified every public page has a unique `<title>`, meta description, canonical URL, robots tag, and exactly one `<h1>`.
- **Found and fixed**: zero pages — and no site-wide default — had an Open Graph image set, meaning every page's social share preview was blank. Set a sensible site-wide default (reusing the homepage hero photo) so every page now renders `og:image`; pages can still set their own specific OG image through the existing admin field.
- Favicon was already correctly CMS-managed (Site Settings had one uploaded).

### Task 11 — Accessibility
- Confirmed no image is missing `alt` text.
- Confirmed the mega-menu keyboard fix (Task 1) covers `aria-expanded`/`aria-haspopup`/focus-out behavior.
- Confirmed no component removes the default focus outline without a replacement (`outline-none` doesn't appear anywhere in `components/sections`) — keyboard navigability works everywhere, just via the browser default outline outside the header nav, not the branded gold focus ring used there.
- **Recommendation for v1.1**: extend the branded `focus-visible:ring` treatment (currently only in the header/footer) to the ~190 CTA/link elements across section components, for visual consistency. Not a regression — a polish opportunity.
- Contrast/visual accessibility could not be verified without a browser tool.

### Task 12 — Full site walkthrough
- Code-level walkthrough only (no browser tool): verified every major route returns 200, checked for `href="#"` dead-end links (none found), checked all service-group anchor links (`#business-technology` etc.) match real section IDs, checked all `target="_blank"` external links carry `rel="noopener noreferrer"` (all do).
- Recommend a real manual click-through before client sign-off to catch anything a code review can't (visual glitches, actual hover behavior, mobile touch interaction).

### Task 13 — Production clean-up
- Confirmed zero `dd()`, `dump()`, `var_dump()`, or `console.log` anywhere in `app/` or `resources/`.
- Every temporary Artisan command used to import/audit images during this sprint (`temp:import-rc-images`, `temp:audit-images`, `temp:cleanup-orphan-media`, `temp:set-default-og`) was deleted immediately after use — none shipped.
- Cleaned up one orphaned Media record created during a failed first attempt at the image-import script.

---

## 3. Files Changed

**New:**
- `database/migrations/2026_07_19_000001_add_contact_fields_to_site_settings.php`
- `tests/Feature/AdminScreenRenderTest.php`
- `tests/Feature/AdminSiteSettingsAndServiceImagesTest.php`

**Modified (16 files):** `AdminServiceController`, `AdminSiteSettingController`, `SiteSetting` model, `ServiceService`, `SiteSettingSeeder`, admin service-item create/edit views, admin site-settings edit view, public layout (mega menu + footer), `about-values`, `about/accreditations`, `about/intro`, `about/team`, `community-projects/audience`, `community-projects/role`, `contact/info-panel`, `investment/approach`, `property/context-banner`, `services/catalogue`, `services/card`, `public/contact.blade.php`, `public/home.blade.php`, `routes/auth.php`, `tests/Feature/Auth/RegistrationTest.php`.

**Deleted:** `app/Http/Controllers/Auth/RegisteredUserController.php`, `resources/views/auth/register.blade.php` (public self-registration disabled).

**Database (data only, no other schema changes):** 37 new Media Library records; `site_settings` contact fields populated; 8 `page_industry_cards` rows created; 6 `page_community_engagement_cards` rows created; various `pages`/`hero_cards`/`page_service_cards`/`service` rows updated with `*_media_id` assignments.

---

## 4. Images Replaced

37 photographs sourced from Unsplash (free license), downloaded server-side, and imported through the Media Library (auto-generating WebP `large/medium/small/thumb` variants), each with descriptive alt text and `credit: Unsplash` recorded on the Media record:

| Page | Slots filled |
|---|---|
| Home | Hero background, About section, 2 hero cards, 5 service-discipline cards |
| About | Intro section image (was a literal "Future CMS-managed image" placeholder) |
| Property | Context/reach banner |
| Community Projects | Hero, audience section, role section, 6 engagement cards (rows newly created, matching existing copy) |
| Investment | Hero, approach section |
| Contact | Hero, info-panel image |
| Industries | 8 industry cards (rows newly created, matching existing copy) |
| Services | 5 representative service-item thumbnails (one per service group) |

Every image is reassignable/replaceable by the client through the existing admin CMS screens — nothing added a new upload mechanism.

---

## 5. CMS Verification

- Added 28 new authenticated GET render tests closing a total gap of 27 previously-untested admin screens.
- Added and passed PATCH/update tests for Site Settings and Service items confirming edit → save → live-page-reflects-change.
- Pre-existing `AdminPageController`-driven modules (Home/About/Services/Industries/Property/Community/Investment/Careers/Contact/Footer) retain their existing strong test coverage, unmodified and still passing.
- **179/179 tests passing** at time of writing.

---

## 6. Responsive Verification

Code-level only (see Task 6 above) — no visual/interactive browser verification was possible in this environment. Recommend a manual pass before client sign-off.

---

## 7. Known Issues

1. **Insights and Case Studies pages don't render real photos.** Both `featured_media_id` fields exist on their models but are never wired into the public views — even a real database record still shows an icon/gradient placeholder block. Insights also has literal "Article coming soon" fallback copy and non-functional "Browse by topic" filter pills. Not fixed this sprint (explicit scope decision — not in the brief's named Task 2 category list).
2. **Branded focus-visible styling** only exists in the header nav and footer; the rest of the site's ~190 CTAs/links rely on the browser's default focus outline (present, not broken, just visually inconsistent).
3. **No browser-based responsive/visual QA was performed** — Tasks 6, 9 (console/404 check), and 12 were done at the code level only, due to no browser automation tool being available in this environment.
4. `PublicPageController::careers()` fetches real `CareerOpportunity` listings that the Careers view never renders (pre-existing, noted in `.claude/TODO.md`, not touched this sprint).
5. The Industries/Insights navigation restructuring described in `.claude/decisions/009_navigation_governance.md` (Industries into primary nav, new Insights mega menu) remains unimplemented — explicitly out of scope for a stabilization sprint.

## 8. Fixed Beyond the Original Brief (found during verification passes)

- Disabled public self-registration, which defaulted new accounts to the `investor` role with no admin gate — confirmed with user before making the change.
- Set a site-wide default Open Graph image (previously every single page had a blank social preview).
- Wired `Service.image_media_id` end-to-end (field existed, was never in the admin form or public render).
- Closed the CLAUDE.md-mandated admin render-test gap across 27 screens.

---

## 9. Recommendations for Version 1.1

- Wire `featured_media_id` into Insights and Case Studies public views (same low-risk pattern used for Services in this sprint); replace "Article coming soon" and the non-functional topic filter with real behavior or remove them.
- Extend branded `focus-visible:ring` styling from the header/footer to section-level CTAs for visual consistency.
- Resolve the `/privacy` vs `/privacy-notice` orphaned-route question noted in `.claude/TODO.md`.
- Execute the Navigation Governance v1.0 restructuring (Industries into primary nav, dedicated Insights mega menu) as its own scoped IA project.
- Decide whether `PublicPageController::careers()`'s unused `$careers` data should be wired into the Careers view or the fetch removed.
- Perform a real manual/device-based responsive and accessibility QA pass — this sprint's Tasks 6, 9, and 12 were code-level reviews only.

---

## 10. Deployment Readiness

- All automated tests passing (179/179).
- No placeholder/hotlinked images remain; no lorem ipsum or dev-artifact copy found.
- All contact information is CMS-managed (Site Settings), populated with the agreed RC-1 demonstration values pending the client's final production contact details.
- CSRF protection confirmed site-wide; the one open security gap found (public self-registration into the investor portal) has been closed.
- No destructive or irreversible changes were made; all new database columns are additive and nullable.

**Recommendation: ready for client review**, contingent on a manual responsive/visual QA pass (Known Issue #3) before final sign-off, and a decision on the Insights/Case Studies known issue.

## 11. Overall Completion

**~92%** against the RC-1 brief's stated completion criteria. The remaining ~8% is the manual browser-based QA pass this environment couldn't perform, plus the two explicitly-deferred known issues (Insights/Case Studies imagery, focus-state consistency) — neither blocks client review, both are clearly logged above for a fast v1.1 follow-up.
