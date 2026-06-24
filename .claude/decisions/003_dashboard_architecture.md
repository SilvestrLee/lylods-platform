# Dashboard Architecture

Status: Accepted

Decision:

Admin and investor dashboards must use shared dashboard shell components.

Admin dashboard:

- One admin shell
- One admin sidebar
- One admin topbar
- One admin footer/script source
- No duplicate sidebar markup across pages

Investor dashboard:

- One investor shell
- One investor sidebar/navigation
- One investor topbar
- Separate from admin routes and admin UI

Desktop behaviour:

- Fixed left sidebar
- Full-height sidebar
- Sticky topbar
- Main content offset correctly
- Main content scrolls cleanly
- Active navigation state visible

Mobile behaviour:

- Sidebar hidden by default
- Hamburger opens drawer
- Overlay closes drawer
- Navigation link closes drawer
- Touch-friendly spacing
- Mobile experience should feel app-like

Rules:

- Do not change business logic
- Do not rename routes
- Do not change migrations without approval
- Do not remove investor dashboard
- Do not route normal users into admin pages
