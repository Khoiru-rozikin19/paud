# Persyaratan Sistem Penerimaan Murid Baru (SPMB) TK Islam Abu dzar

## Mission
Create implementation-ready, token-driven UI guidance for Persyaratan Sistem Penerimaan Murid Baru (SPMB) TK Islam Abu dzar that is optimized for consistency, accessibility, and fast delivery across dashboard web app.

## Brand
- Product/brand: Persyaratan Sistem Penerimaan Murid Baru (SPMB) TK Islam Abu dzar
- URL: https://spmb.abudzar.sch.id/index.php/persyaratan-tk-islam
- Audience: authenticated users and operators
- Product surface: dashboard web app

## Style Foundations
- Visual style: structured, tokenized, content-first
- Main font style: `font.family.primary=Inter`, `font.family.stack=Inter`, `font.size.base=16px`, `font.weight.base=400`, `font.lineHeight.base=29.8672px`
- Typography scale: `font.size.xs=0px`, `font.size.sm=13px`, `font.size.md=14.86px`, `font.size.lg=14.98px`, `font.size.xl=16px`, `font.size.2xl=18px`, `font.size.3xl=20px`, `font.size.4xl=26px`
- Color palette: `color.text.primary=#212529`, `color.text.secondary=#ffffff`, `color.text.tertiary=#585858`, `color.text.inverse=#828282`, `color.surface.base=#000000`, `color.surface.muted=#669933`, `color.surface.strong=#212161`, `color.border.default=#e9ecef`
- Spacing scale: `space.1=1px`, `space.2=4px`, `space.3=8px`, `space.4=10px`, `space.5=11.43px`, `space.6=12px`, `space.7=14px`, `space.8=15px`
- Radius/shadow/motion tokens: `radius.xs=3.2px`, `radius.sm=10px`, `radius.md=50px` | `shadow.1=rgba(0, 0, 0, 0.06) 0px 1px 6px 0px, rgba(0, 0, 0, 0.16) 0px 2px 32px 0px`

## Accessibility
- Target: WCAG 2.2 AA
- Keyboard-first interactions required.
- Focus-visible rules required.
- Contrast constraints required.

## Writing Tone
Concise, confident, implementation-focused.

## Rules: Do
- Use semantic tokens, not raw hex values, in component guidance.
- Every component must define states for default, hover, focus-visible, active, disabled, loading, and error.
- Component behavior should specify responsive and edge-case handling.
- Interactive components must document keyboard, pointer, and touch behavior.
- Accessibility acceptance criteria must be testable in implementation.

## Rules: Don't
- Do not allow low-contrast text or hidden focus indicators.
- Do not introduce one-off spacing or typography exceptions.
- Do not use ambiguous labels or non-descriptive actions.
- Do not ship component guidance without explicit state rules.

## Guideline Authoring Workflow
1. Restate design intent in one sentence.
2. Define foundations and semantic tokens.
3. Define component anatomy, variants, interactions, and state behavior.
4. Add accessibility acceptance criteria with pass/fail checks.
5. Add anti-patterns, migration notes, and edge-case handling.
6. End with a QA checklist.

## Required Output Structure
- Context and goals.
- Design tokens and foundations.
- Component-level rules (anatomy, variants, states, responsive behavior).
- Accessibility requirements and testable acceptance criteria.
- Content and tone standards with examples.
- Anti-patterns and prohibited implementations.
- QA checklist.

## Component Rule Expectations
- Include keyboard, pointer, and touch behavior.
- Include spacing and typography token requirements.
- Include long-content, overflow, and empty-state handling.
- Include known page component density: links (54), inputs (16), buttons (12), lists (10), navigation (8), tables (4).


## Quality Gates
- Every non-negotiable rule must use "must".
- Every recommendation should use "should".
- Every accessibility rule must be testable in implementation.
- Teams should prefer system consistency over local visual exceptions.
