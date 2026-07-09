# The Lylod's Group

# Documentation Authority

If any architectural conflict exists between documents, precedence is:

1. .claude/decisions/*
2. CLAUDE.md
3. .claude/adjust
4. PROJECT.md

PROJECT.md is a planning document and may contain superseded ideas that have been replaced by accepted architectural decisions.

Mission

Deliver multidisciplinary engineering, consulting, digital transformation, workforce and project delivery solutions.


Target Clients

Government agencies

Multinational organizations

Private sector enterprises

Development organizations

Institutional clients


Positioning Rules

Never present The Lylod's Group as:

- Investment company
- Venture capital firm
- Crypto business
- Trading platform


Approved Domains

Project Management

Engineering

Digital Transformation

Technology Services

Compliance

Governance

Recruitment

Training


Current Objectives

Enterprise website

Capability statement

Company profile

Service catalog

Procurement readiness


Tone

Professional

Institutional

Measured

Evidence-backed

Trustworthy

CMS REQUIREMENT — LOCKED

The Lylods Group public website shall not be implemented as a hardcoded-only website.

This is not a page builder requirement.

Page layouts, section ordering, spacing, component composition, and overall design remain developer-controlled.

However, approved administrators shall be able to manage predefined public-facing content areas from the backend.

The CMS must allow content updates without requiring code edits.

The CMS should support:

GLOBAL SETTINGS
----------------

Site Name
Tagline
Primary Logo
Secondary Logo
Favicon
Footer Copyright
Privacy Policy Link
Terms Link

SOCIAL LINKS
------------

LinkedIn
Facebook
X
Instagram
YouTube
WhatsApp

HOMEPAGE
--------

Hero Heading
Hero Description
Hero Background Image
Hero CTA Text
Hero CTA URL

Metrics

Credibility Strip Items

Industries Served

Capability Snapshot Items

Featured Engagement Areas

Closing CTA Section


ABOUT PAGE
----------

Hero Content

Who We Are

How We Work

Operating Principles

Eight Disciplines

Sectors Served

Closing CTA


SERVICES PAGE
-------------

Service Categories

Service Cards

What It Covers

Who It Supports

Typical Outcomes

Service Images

Service CTA Buttons


INVESTMENT PAGE
---------------

Hero Content

Credibility Items

Portal Access Information

Official Notices Text

Process Steps

Closing CTA


CONTACT PAGE
------------

Email Address

Office Locations

Business Hours

Enquiry Types

Investor Support Information


FOOTER
------

Footer Introduction

Footer Links

Social Links

Investor CTA

Footer Disclaimer



IMAGE MANAGEMENT
----------------

Site Logo

Hero Images

Section Images

Service Images

Industry Images

Featured Engagement Images

Footer Branding Assets


SEO
---

Page Meta Titles

Meta Descriptions

OpenGraph Images


CONTENT MODEL PRINCIPLE
-----------------------

Do not build a drag-and-drop page builder.

Do not expose raw HTML editors where possible.

Use structured content fields.

Use image upload fields.

Use repeaters where appropriate.

Admins can modify content.

Admins cannot destroy layouts.



Suggested Laravel Models

SiteSetting

Page

PageSection

Service

Industry

Capability

EngagementArea

FooterLink

SocialLink

MediaAsset



Suggested Admin Navigation

CMS

├── Site Settings

├── Homepage

├── About

├── Services

├── Investment

├── Contact

├── Media Library

├── Footer

└── SEO



Important

The public website must remain visually premium.

CMS controls content.

Developers control structure.

CMS must not become Elementor.

CMS must not become WordPress.

CMS must not allow arbitrary section creation.

CMS should provide safe content updates while preserving the intended design system.
---

# Homepage CMS Status (Completed)

## Current Architecture

The homepage architecture is now considered complete.

Implemented principles:

- Developer-controlled Blade composition
- Reusable section components
- CMS-managed content
- Enterprise admin editing
- No runtime composition
- No PageBuilder
- No PageSection model
- No JSON page layouts
- No drag-and-drop architecture

Homepage sections:

- Hero
- Statistics
- Services
- Industries
- Why Choose Us
- How We Engage
- Discipline Identity Strip
- About & Values
- Testimonials
- Partners & Accreditations
- Work With Us CTA

All sections follow the same architectural pattern.

Developers own page composition.

Editors own content.

---

# About Page CMS Status (Completed)

The About page now follows the same enterprise CMS architecture as the Homepage. See `.claude/decisions/008_about_page_cms_architecture.md` for the full architecture note.

Real About page sections (audited from the live page, not the planning list above):

- Hero (existing `Page` fields, componentized)
- Who We Are / Introduction
- How We Work (4 steps)
- Areas of Focus (5 cards)
- Operating Principles (5 cards)
- Who We Support (8 tags)
- Why Clients Choose Us (6 cards)
- Our People (existing `TeamMember` CMS, componentized)
- Qualifications & Accreditations (existing `Organisation` CMS, componentized)
- Closing CTA

Merged into main. All sections follow the same architectural pattern established by the Homepage.

---

# Services Page CMS Status (Completed)

The Services page now follows the same enterprise CMS architecture as the Homepage and About page. See `.claude/decisions/007_services_page_cms_architecture.md` for the full architecture note.

Real Services page sections (audited from the live page, not a planning list):

- Hero (existing `Page` fields, componentized)
- Sticky Service Nav (existing `ServiceGroup`, componentized, no new schema)
- Service Catalogue Intro
- Service Area Panels (existing `ServiceGroup`/`Service`, componentized, no new schema, no duplicated CRUD)
- Why Clients Work With Us (6 cards)
- How We Work (4 steps)
- Closing CTA

Merged into main. All sections follow the same architectural pattern established by the Homepage and About page.

---

# Industries We Serve Page CMS Status (Implemented, pending merge)

The Industries We Serve page now follows the same enterprise CMS architecture as the Homepage, About, and Services pages — the first one designed from scratch rather than migrated, since no standalone Industries page existed before this phase. See `.claude/decisions/011_industries_page_architecture.md` for the full architecture note.

Real Industries page sections (per the approved Decision 011 blueprint):

- Hero (existing `Page` fields, componentized)
- Introduction
- Industry Grid (8 cards: Energy & Utilities, Infrastructure & Civil, Financial Services, Government & Public Sector, Technology & Digital, Oil & Gas / Industrial, Professional Services, Education & Training)
- Services cross-link (developer-composed, static, not CMS content)
- Related Case Studies / Insights (unfiltered featured/recent, reuses existing `CaseStudy`/`Insight` services, no new schema)
- Closing CTA

Navigation integration: added to primary navigation, removed the dead About mega-menu `#industries` anchor, added a Services mega-menu cross-link, added a new Industries footer column — exactly the 5 touchpoints scoped in the implementation, no broader Navigation Governance v1.0 restructuring (Insights/Case Studies consolidation remains separate future work).

Implemented on a review branch, pending review/merge approval.

---

## Enterprise CMS Current Baseline

Completed enterprise CMS pages:

- Homepage
- About
- Services
- Industries (pending merge)

Current regression baseline (pending final validation on this branch):

- 43 tests + new Industries/navigation tests
- Vite build passing

Current architecture:

- Developer-controlled Blade page composition
- CMS-managed content
- Purpose-built child tables for repeatable sections
- Dedicated Blade components per section
- Dedicated admin partials per page section
- No PageBuilder
- No PageSection model
- No JSON page layouts
- No runtime composition

Next enterprise CMS page:

- To be determined per Navigation Governance v1.0's roadmap (Solutions/Platforms/Trust all explicitly deferred pending real product justification)

