# CMS Implementation Plan — The Lylods Group

---

## Blueprint Status

**Version:** 2.2 — Architecture Frozen
This document supersedes all previous CMS planning. It governs all remaining CMS implementation. Do not deviate without approval. Any future architectural changes require explicit approval. No additional redesigns, scope expansion, or new models without approval.

---

## Core Principles (Non-Negotiable)

- No page builder
- No drag-and-drop layout editing
- Developer-controlled Blade layouts, Tailwind, and navigation
- Existing custom admin architecture — no Filament
- Investor Portal domain isolation
- Frozen frontend design — no redesigns, no new sections, no layout changes
- No Repository classes — Eloquent remains the persistence layer

---

## 1. Existing Admin / CMS State

**Admin panel:** Custom Blade-based. Routes under `/admin` with `auth` + `admin` middleware. Views at `resources/views/admin/`.

**Admin capabilities today:**
- Investment Plans (CRUD)
- Investments (CRUD)
- Investors / Users (CRUD)
- Notices (CRUD)

**CMS capabilities today:** None. All public pages are fully static Blade templates.

**Filament:** Not installed. Not in `composer.json`. Will not be introduced.

**Notable:** Most public views already contain `{{-- CMS: ... --}}` comments marking where dynamic data should be injected.

---

## 2. Existing Models / Migrations

| Model | Migration | Notes |
|---|---|---|
| `User` | `0001_01_01_000000` | Has `role`, `investor_number` fields |
| `InvestmentPlan` | `2026_06_09_173725` | Investor-facing, not CMS |
| `Investment` | `2026_06_09_173731` | Investor-facing, not CMS |
| `Notice` | `2026_06_10_213413` | Investor notices, not CMS |

**`PublicPageController`:** Currently returns plain views with no data passed. Every method is a one-liner `return view(...)`.

---

## 3. Conflict Check — Blueprint v2.2 vs Codebase

| Requirement | Codebase State | Conflict? |
|---|---|---|
| No Filament | Not installed | None |
| Custom admin architecture | Pattern in place | None |
| All CMS models | None exist | None — clean slate |
| Service layer (`app/Services/CMS/`) | Does not exist | None |
| Media model | Nothing exists | None |
| Admin nav reorganisation | Flat nav today, investor routes untouched | None — additive only |
| Investor domain isolation | Separate controllers/models/views | None |
| Frontend frozen | All public views are static Blade | None |
| Laravel storage | Not configured yet | None — needs setup |

No conflicts. Codebase is clean for Phase 1A to proceed.

---

## 4. Platform Architecture

Three distinct domains sharing one application:

1. **Public Website** — static Blade views, `PublicPageController`
2. **Website CMS (Admin)** — custom admin panel under `/admin`
3. **Investor Portal** — completely separate domain, must not be affected

---

## 5. CMS Service Layer

Controllers must not communicate directly with models for CMS functionality. All retrieval, caching, fallback behaviour, and business rules belong in a dedicated service layer.

**Namespace:** `app/Services/CMS/`

| Service | Responsibilities |
|---|---|
| `SiteSettingService` | Retrieve and cache the single SiteSetting record, handle fallbacks |
| `PageService` | Retrieve pages by slug, apply published filter, homepage helper |
| `MediaService` | Upload, retrieve, delete media assets; resolve storage URLs |
| `ServiceService` | Retrieve service groups and services by group |
| `CaseStudyService` | Retrieve published case studies, single by slug, featured listings |
| `InsightService` | Retrieve published insights, single by slug, category filtering |
| `CareerService` | Retrieve active/published career opportunities |
| `TeamService` | Retrieve active team members in display order |
| `TestimonialService` | Retrieve active/featured testimonials |
| `OrganisationService` | Retrieve organisations by type (partner, client, accreditation, etc.) |

**Usage pattern:**

Controllers receive services via constructor injection:

```php
// Instead of:
Page::forSlug('home')
SiteSetting::current()

// Use:
$pageService->homepage()
$siteSettingService->current()
```

The service layer is also the single point responsible for:
- Cache read/write/invalidation
- Publishing rule enforcement
- Fallback content behaviour
- Future API support
- Future business rules

---

## 6. Caching Strategy

Every CMS service implements cache support. Admin pages are never cached.

| Content | Cache Duration | Cache Key Pattern | Invalidation Trigger |
|---|---|---|---|
| Site Settings | Forever | `cms.site_settings` | On `SiteSetting` save |
| Pages | 30 minutes | `cms.page.{slug}` | On `Page` save for that slug |
| Footer links | Forever | `cms.footer_links` | On `FooterLink` save |
| Social links | Forever | `cms.social_links` | On `SocialLink` save |
| Service Groups | 30 minutes | `cms.service_groups` | On `ServiceGroup` or `Service` save |
| Case Studies | 30 minutes | `cms.case_studies`, `cms.case_study.{slug}` | On `CaseStudy` save |
| Insights | 15 minutes | `cms.insights`, `cms.insight.{slug}` | On `Insight` save |
| Compliance Pages | Forever | `cms.compliance.{slug}` | On `CompliancePage` save |

Cache invalidation is handled automatically within each service method when content is saved via the admin. Use Laravel model observers or service save methods to trigger cache clears.

---

## 7. CMS Models (v2.2)

### Media

Centralised, reusable media asset store. Image references on models use FK to this table wherever practical.

| Field | Type |
|---|---|
| `id` | bigint |
| `title` | string |
| `alt_text` | string nullable |
| `caption` | text nullable |
| `path` | string |
| `disk` | string (public, s3, cloudflare) default 'public' |
| `mime_type` | string |
| `file_size` | integer |
| `width` | integer nullable |
| `height` | integer nullable |
| `checksum` | string nullable |
| `dominant_colour` | string nullable (hex) |
| `uploaded_by` | FK → users.id nullable |
| `timestamps` | |

**Models referencing Media via FK:**

| Model | FK Columns |
|---|---|
| `Page` | `hero_media_id`, `og_media_id` |
| `SiteSetting` | `logo_media_id`, `logo_inverse_media_id`, `favicon_media_id`, `default_og_media_id` |
| `Service` | `image_media_id` |
| `Organisation` | `logo_media_id` |
| `TeamMember` | `photo_media_id` |
| `CaseStudy` | `featured_media_id` |
| `Insight` | `featured_media_id` |
| `Testimonial` | `photo_media_id`, `company_logo_media_id` |

> Phase 1A may initially use raw storage paths where Media FK is not yet available. The schema must support migration to FKs without redesign.

---

### SiteSetting

Single record. Typed fields only — no key/value pairs.

| Field | Type |
|---|---|
| `site_name` | string |
| `tagline` | string nullable |
| `logo_media_id` | FK → media.id nullable |
| `logo_inverse_media_id` | FK → media.id nullable |
| `favicon_media_id` | FK → media.id nullable |
| `primary_email` | string nullable |
| `phone` | string nullable |
| `address` | text nullable |
| `office_hours` | string nullable |
| `google_maps_embed` | text nullable |
| `google_analytics_id` | string nullable |
| `linkedin` | string nullable |
| `facebook` | string nullable |
| `instagram` | string nullable |
| `youtube` | string nullable |
| `footer_text` | text nullable |
| `copyright` | string nullable |
| `default_meta_title` | string nullable |
| `default_meta_description` | text nullable |
| `default_og_media_id` | FK → media.id nullable |
| `timestamps` | |

---

### Page

Each public page owns its hero content, section visibility, SEO metadata, and audit trail.

| Field | Type |
|---|---|
| `slug` | string unique — auto-generated, manual override allowed, preserved on edit unless changed |
| `title` | string |
| `hero_title` | string nullable |
| `hero_subtitle` | string nullable |
| `hero_description` | text nullable |
| `hero_media_id` | FK → media.id nullable |
| `primary_cta_label` | string nullable |
| `primary_cta_url` | string nullable |
| `secondary_cta_label` | string nullable |
| `secondary_cta_url` | string nullable |
| `section_visibility` | json nullable (homepage only) |
| `meta_title` | string nullable |
| `meta_description` | text nullable |
| `og_media_id` | FK → media.id nullable |
| `canonical_url` | string nullable |
| `robots` | string nullable |
| `structured_data` | json nullable |
| `sitemap_include` | boolean default true |
| `is_published` | boolean default true |
| `created_by` | FK → users.id nullable |
| `updated_by` | FK → users.id nullable |
| `timestamps` | |

> No soft delete. Page records are permanent developer-defined entries.

**Homepage `section_visibility` JSON structure:**

```json
{
  "hero": true,
  "why_choose_us": true,
  "services": true,
  "testimonials": true,
  "partners": true,
  "cta": true
}
```

Only visibility is editable by admins. Section order remains developer-controlled.

---

### ServiceGroup

| Field | Type |
|---|---|
| `name` | string |
| `slug` | string unique — auto-generated from name, manual override allowed, preserved on edit unless changed |
| `description` | text nullable |
| `icon` | string nullable |
| `display_order` | integer default 0 |
| `is_active` | boolean default true |
| `created_by` | FK → users.id nullable |
| `updated_by` | FK → users.id nullable |
| `timestamps` | |

---

### Service

| Field | Type |
|---|---|
| `service_group_id` | FK → service_groups.id |
| `title` | string |
| `slug` | string unique — auto-generated from title, manual override allowed, preserved on edit unless changed |
| `summary` | string nullable |
| `description` | text nullable |
| `icon` | string nullable |
| `image_media_id` | FK → media.id nullable |
| `display_order` | integer default 0 |
| `is_active` | boolean default true |
| `created_by` | FK → users.id nullable |
| `updated_by` | FK → users.id nullable |
| `timestamps` | |

---

### CaseStudy

Soft delete enabled.

| Field | Type |
|---|---|
| `title` | string |
| `slug` | string unique — auto-generated from title, manual override allowed, preserved on edit unless changed |
| `industry` | string nullable |
| `challenge` | text nullable |
| `our_role` | text nullable |
| `outcome` | text nullable |
| `summary` | text nullable |
| `featured_media_id` | FK → media.id nullable |
| `gallery` | json nullable |
| `featured` | boolean default false |
| `status` | enum: draft, published, archived — default draft |
| `published_at` | timestamp nullable |
| `seo_title` | string nullable |
| `seo_description` | text nullable |
| `canonical_url` | string nullable |
| `robots` | string nullable |
| `sitemap_include` | boolean default true |
| `created_by` | FK → users.id nullable |
| `updated_by` | FK → users.id nullable |
| `deleted_at` | timestamp nullable |
| `timestamps` | |

---

### Insight

Soft delete enabled.

| Field | Type |
|---|---|
| `title` | string |
| `slug` | string unique — auto-generated from title, manual override allowed, preserved on edit unless changed |
| `excerpt` | text nullable |
| `content` | longText nullable |
| `featured_media_id` | FK → media.id nullable |
| `author` | string nullable |
| `reading_time` | integer nullable (minutes) |
| `category` | string nullable |
| `featured` | boolean default false |
| `status` | enum: draft, published, archived — default draft |
| `published_at` | timestamp nullable |
| `seo_title` | string nullable |
| `seo_description` | text nullable |
| `canonical_url` | string nullable |
| `robots` | string nullable |
| `sitemap_include` | boolean default true |
| `created_by` | FK → users.id nullable |
| `updated_by` | FK → users.id nullable |
| `deleted_at` | timestamp nullable |
| `timestamps` | |

---

### CareerOpportunity

Soft delete enabled.

| Field | Type |
|---|---|
| `title` | string |
| `location` | string nullable |
| `type` | string (full-time, part-time, contract, placement) |
| `description` | longText nullable |
| `closing_date` | date nullable |
| `status` | enum: draft, published, archived — default draft |
| `created_by` | FK → users.id nullable |
| `updated_by` | FK → users.id nullable |
| `deleted_at` | timestamp nullable |
| `timestamps` | |

---

### TeamMember

Soft delete enabled.

| Field | Type |
|---|---|
| `name` | string |
| `role` | string nullable |
| `bio` | text nullable |
| `photo_media_id` | FK → media.id nullable |
| `expertise` | string nullable |
| `email` | string nullable |
| `linkedin` | string nullable |
| `display_order` | integer default 0 |
| `is_active` | boolean default true |
| `created_by` | FK → users.id nullable |
| `updated_by` | FK → users.id nullable |
| `deleted_at` | timestamp nullable |
| `timestamps` | |

---

### Testimonial

Soft delete enabled.

| Field | Type |
|---|---|
| `quote` | text |
| `client_name` | string |
| `role` | string nullable |
| `organisation` | string nullable |
| `company_logo_media_id` | FK → media.id nullable |
| `photo_media_id` | FK → media.id nullable |
| `featured` | boolean default false |
| `display_order` | integer default 0 |
| `is_active` | boolean default true |
| `created_by` | FK → users.id nullable |
| `updated_by` | FK → users.id nullable |
| `deleted_at` | timestamp nullable |
| `timestamps` | |

---

### Organisation

Single model for clients, partners, associations, accreditations, and suppliers. Soft delete enabled.

| Field | Type |
|---|---|
| `name` | string |
| `logo_media_id` | FK → media.id nullable |
| `website` | string nullable |
| `type` | string (client, partner, association, accreditation, supplier) |
| `display_order` | integer default 0 |
| `is_active` | boolean default true |
| `created_by` | FK → users.id nullable |
| `updated_by` | FK → users.id nullable |
| `deleted_at` | timestamp nullable |
| `timestamps` | |

---

### FooterLink

No soft delete.

| Field | Type |
|---|---|
| `group` | string |
| `label` | string |
| `url` | string |
| `display_order` | integer default 0 |
| `timestamps` | |

---

### SocialLink

No soft delete.

| Field | Type |
|---|---|
| `platform` | string |
| `url` | string |
| `icon` | string nullable |
| `display_order` | integer default 0 |
| `timestamps` | |

---

### CompliancePage

No soft delete.

| Field | Type |
|---|---|
| `slug` | string unique |
| `title` | string |
| `content` | longText nullable |
| `seo_title` | string nullable |
| `seo_description` | text nullable |
| `last_reviewed_at` | date nullable |
| `created_by` | FK → users.id nullable |
| `updated_by` | FK → users.id nullable |
| `timestamps` | |

---

## 8. Slug Policy

Applies to: `Page`, `ServiceGroup`, `Service`, `CaseStudy`, `Insight`

| Rule | Behaviour |
|---|---|
| Auto-generate | Slug is automatically generated from `title` on creation |
| Manual override | Admin may set a custom slug at creation or edit time |
| Uniqueness | Enforced at database level and in validation |
| Preserve on edit | Existing slug is not changed when editing unless admin explicitly modifies the slug field |

---

## 9. Soft Delete Policy

| Model | Soft Delete |
|---|---|
| `CaseStudy` | Yes |
| `Insight` | Yes |
| `CareerOpportunity` | Yes |
| `TeamMember` | Yes |
| `Testimonial` | Yes |
| `Organisation` | Yes |
| `SiteSetting` | No — single active record |
| `Page` | No — developer-defined permanent records |
| `FooterLink` | No |
| `SocialLink` | No |
| `CompliancePage` | No |

---

## 10. Publishing Workflow

Applies to: `Insight`, `CaseStudy`, `CareerOpportunity`

| Status | Behaviour |
|---|---|
| `draft` | Default on creation. Not visible on public website. |
| `published` | Visible on public website. Sets `published_at` on first publish. |
| `archived` | Hidden from public website. Preserved in admin. Soft-deletable. |

Editors must explicitly publish. No auto-publish on save.

---

## 11. Audit Fields

Reserved on all applicable content models. Populated via model observers or service save methods.

| Field | Type |
|---|---|
| `created_by` | FK → users.id nullable |
| `updated_by` | FK → users.id nullable |

Applicable to: `Page`, `ServiceGroup`, `Service`, `CaseStudy`, `Insight`, `CareerOpportunity`, `TeamMember`, `Testimonial`, `Organisation`, `CompliancePage`

---

## 12. SEO Architecture

| Field | Models |
|---|---|
| `meta_title`, `meta_description`, `og_media_id` | `Page` |
| `seo_title`, `seo_description` | `CaseStudy`, `Insight`, `CompliancePage` |
| `canonical_url` | `Page`, `CaseStudy`, `Insight` |
| `robots` | `Page`, `CaseStudy`, `Insight` |
| `structured_data` (json) | `Page` |
| `sitemap_include` | `Page`, `CaseStudy`, `Insight` |

`SiteSetting` provides global fallbacks: `default_meta_title`, `default_meta_description`, `default_og_media_id`.

> `canonical_url`, `robots`, `structured_data`, and `sitemap_include` are reserved now. Full SEO implementation occurs in Phase 6.

---

## 13. Future Versioning (Reserved — Not Implemented)

Version history is not in scope for this release. The architecture must not prevent future implementation of:

- Page revisions
- Rollback
- Revision history

No schema changes required now. No implementation until explicitly approved in a future release.

---

## 14. Admin Module Structure

Navigation order is fixed as follows:

```
Administration
├── Dashboard
├── Website CMS
│   ├── Site Settings        → AdminSiteSettingController
│   ├── Pages                → AdminPageController
│   ├── Services             → AdminServiceGroupController / AdminServiceController
│   ├── Content
│   │   ├── Case Studies     → AdminCaseStudyController
│   │   ├── Insights         → AdminInsightController
│   │   └── Careers          → AdminCareerController
│   ├── People
│   │   ├── Team             → AdminTeamMemberController
│   │   └── Testimonials     → AdminTestimonialController
│   ├── Trust                → AdminOrganisationController
│   └── Footer
│       ├── Footer Links     → AdminFooterLinkController
│       ├── Social Links     → AdminSocialLinkController
│       └── Compliance Pages → AdminCompliancePageController
├── Media Library            → AdminMediaController
├── Investor Management
│   ├── Investors
│   ├── Investment Plans
│   ├── Investments
│   └── Notices
├── Reports
└── System
```

Media Library sits directly beneath Website CMS because it supports all CMS modules.

---

## 15. CMS Dashboard

The CMS opens to a dashboard providing a high-level overview of website content state and platform health.

**Content widgets:**

| Widget | Data |
|---|---|
| Published Pages | Count of `pages` where `is_published = true` |
| Draft Insights | Count of `insights` where `status = draft` |
| Published Case Studies | Count of `case_studies` where `status = published` |
| Active Testimonials | Count of `testimonials` where `is_active = true` |
| Team Members | Count of active `team_members` |
| Media Assets | Count of records in `media` |
| Recent Updates | Last 5 content changes across CMS models |
| Quick Links | Direct links to Site Settings, Pages, Media Library |

**System Status widget:**

| Check | Data |
|---|---|
| Laravel version | `app()->version()` |
| PHP version | `PHP_VERSION` |
| Storage status | Disk availability check |
| Public disk | Confirm `storage/app/public` is readable |
| Symlink status | Confirm `public/storage` symlink exists |
| Last deployment | Git tag or deployment timestamp if available |

---

## 16. Public Page → Model Field Mapping

| Page | Models | Key Fields |
|---|---|---|
| **Home** | `SiteSetting`, `Page` (slug='home'), `ServiceGroup`, `Testimonial`, `Organisation` | hero, section visibility, service previews, logos |
| **About** | `Page` (slug='about'), `TeamMember`, `Organisation`, `Testimonial` | hero, team grid, accreditations |
| **Services** | `Page` (slug='services'), `ServiceGroup`, `Service` | hero, category list, service items |
| **Property** | `Page` (slug='property'), `Service` (group=property) | hero, property service items |
| **Community Projects** | `Page` (slug='community-projects'), `CaseStudy`, `Organisation` | hero, project cards, partners |
| **Case Studies** | `Page` (slug='case-studies'), `CaseStudy` (status=published) | hero, listing + detail pages |
| **Insights** | `Page` (slug='insights'), `Insight` (status=published) | hero, listing + detail pages |
| **Careers** | `Page` (slug='careers'), `CareerOpportunity` (status=published) | hero, active listings |
| **Contact** | `Page` (slug='contact'), `SiteSetting` | hero, address, phone, email, office hours, map |
| **Footer** | `FooterLink`, `SocialLink`, `SiteSetting` | link groups, social icons, copyright |
| **Privacy Notice** | `CompliancePage` (slug='privacy-notice') | full content |
| **Cookie Notice** | `CompliancePage` (slug='cookie-notice') | full content |
| **Accessibility** | `CompliancePage` (slug='accessibility') | full content |
| **Complaints** | `CompliancePage` (slug='complaints') | full content |
| **Terms of Use** | `CompliancePage` (slug='terms') | full content |
| **Site-wide** | `SiteSetting` | logo, favicon, site name, default SEO, analytics ID |

---

## 17. Implementation Phases

Do not skip phases.

### Phase 1A — Foundation

**Deliverable:** Working data foundation. No public UI changes.

- [ ] Configure Laravel storage (`public` disk, `storage:link`, `FILESYSTEM_DISK=public`)
- [ ] Create directory structure: `storage/app/public/cms/{logos,favicons,heroes,og,media}`
- [ ] Add `storage/app/public/cms` to `.gitignore`
- [ ] Create `media` table and `Media` model
- [ ] Create `site_settings` table and `SiteSetting` model
- [ ] Create `pages` table and `Page` model
- [ ] Create `app/Services/CMS/MediaService.php`
- [ ] Create `app/Services/CMS/SiteSettingService.php` with cache-forever strategy
- [ ] Create `app/Services/CMS/PageService.php` with 30-minute cache strategy
- [ ] Create `SiteSettingSeeder` with current hardcoded values
- [ ] Create `PageSeeder` pre-populating all 16 public page slugs with current hardcoded hero content
- [ ] Confirm `php artisan migrate` and seeders run cleanly
- [ ] No public routes or views change in this phase

---

### Phase 1B — CMS Integration

**Deliverable:** Existing public website fully powered by CMS foundation.

- [ ] Create `AdminSiteSettingController` (`edit` + `update` only)
- [ ] Create `AdminPageController` (`index`, `edit`, `update` — no create/destroy)
- [ ] Create `AdminMediaController` (`index`, `store`, `destroy`)
- [ ] Add admin routes for all three controllers
- [ ] Create admin views: `site-settings/edit`, `pages/index`, `pages/edit`, `media/index`
- [ ] Create CMS dashboard view with content widgets and system status widget
- [ ] Update admin nav to approved module structure (Phase 2+ entries visible as placeholders)
- [ ] Update `PublicPageController` — inject `SiteSettingService` and `PageService`, pass data to all 16 views
- [ ] Update `resources/views/components/layouts/public.blade.php` — logo, title, meta tags, OG tags dynamic
- [ ] Update all 16 public views — replace hardcoded hero content with `$page` fields
- [ ] Update contact page — address, phone, email, office hours, map embed from `$siteSetting`
- [ ] Add homepage `section_visibility` toggle UI in `pages/edit` for the `home` slug
- [ ] Update `public/home.blade.php` to respect `section_visibility` flags
- [ ] FormRequest validation on all admin controllers
- [ ] File uploads validate: `image`, `mimes:jpg,jpeg,png,webp`, `max:2048`
- [ ] Confirm all 16 public routes still resolve
- [ ] Confirm investor dashboard and admin login are unaffected

---

### Phase 2 — Services

- `ServiceGroup`, `Service` models, migrations, seeders
- `ServiceService` with 30-minute cache
- Admin controllers + views
- Wire to services page via `PublicPageController`

### Phase 3 — People & Trust

- `TeamMember`, `Testimonial`, `Organisation` models, migrations
- `TeamService`, `TestimonialService`, `OrganisationService`
- Admin controllers + views
- Wire to about and home pages

### Phase 4 — Content

- `CaseStudy`, `Insight`, `CareerOpportunity` models, migrations
- `CaseStudyService` (30-min cache), `InsightService` (15-min cache), `CareerService`
- Publishing workflow (draft / published / archived)
- Admin controllers + views with publish actions
- Public listing + detail routes: `GET /case-studies/{slug}`, `GET /insights/{slug}`

### Phase 5 — Footer & Compliance

- `FooterLink`, `SocialLink` models, migrations
- Cache-forever for footer and social links
- `CompliancePage` model, migration
- Cache-forever for compliance pages
- Admin controllers + views
- Wire all to public layout and compliance pages

### Phase 6 — SEO

- Surface `canonical_url`, `robots`, `structured_data`, `sitemap_include` in admin
- Update public layout `<head>` to emit all SEO fields dynamically
- Sitemap generation

### Phase 7 — QA, Performance & Handover

- Full content migration from hardcoded Blade to CMS records
- Cache warm-up verification
- Cross-browser and mobile QA
- Performance review (image sizes, query counts, cache hit rates)
- Client acceptance testing

---

## 18. Risk Areas

| Risk | Severity | Mitigation |
|---|---|---|
| Breaking investor/dashboard logic | High | CMS touches only `PublicPageController` and public Blade views. Completely separate from investor domain. |
| Service layer adds indirection | Medium | Services are thin — retrieval + caching only. No complex logic in Phase 1. |
| Cache invalidation gaps | Medium | Each service method clears its own cache key on save. Model observers enforce this. |
| Media FK complexity in Phase 1A | Medium | Raw paths used initially where needed. FK migration architecture is reserved from day one. |
| `PublicPageController` currently passes no data | Medium | All 16 methods updated in Phase 1B. Seeders ensure no visual regression. |
| Homepage `section_visibility` JSON | Medium | Blade conditionals only — no JS drag-and-drop, no reordering. Simple `@if` checks. |
| Rich text for compliance pages | Medium | Plain `<textarea>` only. No JS rich-text editor until explicitly approved. |
| Compliance content accuracy | Medium | `last_reviewed_at` surfaced in admin. Legal text edits must be deliberate. |
| Audit fields (`created_by`, `updated_by`) | Low | Columns reserved in schema. Observer implementation can be deferred. |
| Case Study / Insight detail URLs | Low | New routes added in Phase 4. Low risk — new pattern, not a modification. |
| Seeders capturing hardcoded content accurately | Low | Must match current Blade text exactly to prevent visual regression on launch. |

---

## 19. Estimated Effort

| Phase | Scope | Estimate |
|---|---|---|
| Phase 1A — Foundation | Storage, Media, SiteSetting, Page, Services, Seeders | 2 days |
| Phase 1B — CMS Integration | Admin interfaces, controller wiring, dynamic layout | 2–3 days |
| Phase 2 — Services | ServiceGroup, Service | 1–2 days |
| Phase 3 — People & Trust | Team, Testimonials, Organisations | 2 days |
| Phase 4 — Content | CaseStudy, Insight, Careers, publishing workflow | 2–3 days |
| Phase 5 — Footer & Compliance | FooterLinks, SocialLinks, CompliancePages | 1–2 days |
| Phase 6 — SEO | Canonical, robots, structured data, sitemap | 1–2 days |
| Phase 7 — QA & Handover | Testing, content migration, acceptance | 2–3 days |
| **Total** | | **13–19 days** |

---

## 20. Files Expected to Change

**New — Models (14):**
`Media`, `SiteSetting`, `Page`, `ServiceGroup`, `Service`, `CaseStudy`, `Insight`, `CareerOpportunity`, `TeamMember`, `Testimonial`, `Organisation`, `FooterLink`, `SocialLink`, `CompliancePage`

**New — Migrations (14):** One per model.

**New — Services (10):**
`app/Services/CMS/SiteSettingService.php`, `PageService.php`, `MediaService.php`, `ServiceService.php`, `CaseStudyService.php`, `InsightService.php`, `CareerService.php`, `TeamService.php`, `TestimonialService.php`, `OrganisationService.php`

**New — Admin Controllers (14):**
`AdminSiteSettingController`, `AdminPageController`, `AdminMediaController`, `AdminServiceGroupController`, `AdminServiceController`, `AdminCaseStudyController`, `AdminInsightController`, `AdminCareerController`, `AdminTeamMemberController`, `AdminTestimonialController`, `AdminOrganisationController`, `AdminFooterLinkController`, `AdminSocialLinkController`, `AdminCompliancePageController`

**New — Admin Views (~42):** Index, create, edit views per resource under `resources/views/admin/cms/`.

**New — Seeders (2):** `SiteSettingSeeder`, `PageSeeder`

**Modified:**
- `app/Http/Controllers/PublicPageController.php` — all 16 methods updated (Phase 1B)
- `resources/views/components/layouts/public.blade.php` — dynamic logo, title, meta, footer (Phase 1B)
- All 16 views under `resources/views/public/` — dynamic hero content (Phase 1B)
- `routes/web.php` — new admin CMS routes (Phase 1B); new public detail routes (Phase 4)

**Untouched (by design):**
- All investor dashboard views and controllers
- All auth views and controllers
- All investment / plan / notice admin controllers and views
- `app/Models/Investment.php`, `InvestmentPlan.php`, `Notice.php`, `User.php`
- Investor and admin middleware

---

## Architecture Freeze

Blueprint v2.2 is the final approved architecture.

No further architectural changes without explicit approval.

No new models without approval.

No scope expansion without approval.

Implementation proceeds strictly by phase.

---

*Updated 2026-06-30. Blueprint v2.2 — Architecture frozen. Awaiting approval to begin Phase 1A.*
