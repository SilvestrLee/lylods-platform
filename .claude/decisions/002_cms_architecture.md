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
