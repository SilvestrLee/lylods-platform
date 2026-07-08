# CMS Architecture

Status: Accepted

Decision:

The public website content shall be managed from backend CMS modules.

This is not a page builder.

Admin users should manage structured website content through backend forms.

Editable modules may include:

- Homepage
- About
- Services
- Service categories
- Testimonials
- Team members
- Contact information
- Footer
- Investor notices
- Company profile
- Calls to action
- Public website images

Developer-controlled areas:

- Layout structure
- Blade components
- Routes
- Authentication
- Dashboard shells
- Investor logic
- Admin authorization
- Design system rules
- Grid/layout behaviour

The admin should see clean module names such as:

- Manage Homepage
- Manage Services
- Manage Testimonials
- Manage Team
- Manage Contact Information
- Manage Footer

The admin should not see page-builder concepts such as:

- Drag block
- Resize column
- Edit section 17
- Move container
- Page builder canvas

## Structured Component Architecture

Public pages are composed of reusable developer-defined Blade components.

Component content is CMS-managed.

Component composition remains developer-controlled.

Administrators may edit content, media, visibility where supported, and configuration within approved limits, but may not arbitrarily compose or reorder page layouts.

This preserves UX consistency, accessibility, SEO, performance, and long-term maintainability while maximizing editor autonomy.

This confirms that The Lylods Group CMS is a structured enterprise CMS, not a drag-and-drop page builder, Elementor clone, WordPress block editor, or arbitrary visual canvas system.

---

## Homepage Architecture Status

The homepage architecture has now been fully implemented.

Status:

Completed

Verified:

- Component architecture
- CMS bindings
- Admin editing
- Homepage rendering
- Production validation
- Test suite

Future homepage work must extend the existing architecture rather than redesigning it.

