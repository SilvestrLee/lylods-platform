# The Lylods Group Claude Instructions

Read and follow all files in `.claude/decisions`.

This project is The Lylods Group Laravel Platform.

It is not Keryon.
It is not a church SaaS.
It is not Faithflow.

Use UI/UX Pro Max only as a general UI/UX design intelligence layer.

Use 21st.dev Magic only for inspiration and component refinement.

Implementation stack:

- Laravel
- Blade
- TailwindCSS
- AlpineJS

Do not introduce:

- React
- NextJS
- Page builders
- Church/congregation/ministry assumptions

Current priorities:

1. Standardize dashboards
2. Improve admin and investor UX
3. Build backend-controlled website CMS
4. Preserve investor portal scope
5. Keep business logic intact

Before editing files:

- Review first
- Explain affected files
- Explain risk level
- Wait for approval when the change is structural

After editing files:

- List changed files
- Explain what changed
- Explain what was not changed
- Provide verification commands

---

# Locked Architectural Principle

The public website SHALL remain developer-composed.

Pages are assembled using reusable Blade components.

Administrators may edit content.

Administrators may not:

- reorder sections
- create sections
- delete sections
- compose layouts
- build arbitrary pages

No PageBuilder shall be introduced.

No runtime section composition shall be introduced.


## Mandatory Admin Render Tests

Every CMS implementation MUST include authenticated GET render tests for every admin edit screen.

PATCH tests alone are insufficient.

Minimum required:

- GET edit page returns 200
- Expected admin sections render
- Expected "Manage Elsewhere" links render
- Expected forms render
- No RouteNotFoundException
- No ViewException
- No MissingVariableException

Every new enterprise CMS page must add these tests before requesting approval.
---

## Enterprise CMS Checklist Requirement

Every future Enterprise CMS migration MUST satisfy:

`.claude/ENTERPRISE_CMS_CHECKLIST.md`

No page migration should be approved unless the checklist is reviewed and explicitly passed.

