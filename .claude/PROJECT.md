# The Lylod's Group

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