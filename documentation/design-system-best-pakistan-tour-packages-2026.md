# Best Pakistan Tour Packages 2026

## Context And Goals

Design intent: present Pakistan travel information with a clean, confident, image-led interface that makes routes, prices, and next actions easy to scan.

This system applies to the marketing site at `naturehikepakistan.pk` and its static/PHP and Django implementations. The known page density is 424 links, 38 buttons, 32 cards, 18 lists, 11 inputs, one primary navigation, and one table.

The interface targets WCAG 2.2 AA, keyboard-first use, responsive layouts, and consistent implementation through shared tokens.

## Design Tokens And Foundations

### Typography

- `font.family.primary` must be `DM Sans`.
- `font.family.stack` must be `DM Sans, sans-serif`.
- Base text must use `16px`, weight `400`, and line height `29.76px`.
- The scale must use `11px`, `13px`, `14px`, `15px`, `16px`, `20px`, `22px`, and `25.6px` tokens.
- Headings should use weight `600` or `700`; body copy must not use all caps.

### Color

Use semantic tokens instead of component-specific hex values:

```css
:root {
  --color-text-primary: #9fbd21;
  --color-text-secondary: #313041;
  --color-text-tertiary: #ffffff;
  --color-text-inverse: #757783;
  --color-surface-base: #000000;
  --color-surface-muted: #fcc900;
}
```

- Primary text and active brand accents must use `--color-text-primary`.
- Secondary copy must use `--color-text-secondary` only on light surfaces or an equivalent accessible dark-surface token.
- White text must use `--color-text-tertiary` on dark imagery or dark surfaces.
- `--color-surface-muted` must not be used for long text.
- Every text/background pair must pass WCAG AA contrast checks.

### Spacing, Radius, And Motion

- Spacing must use `3px`, `5px`, `8px`, `10px`, `15px`, `16px`, `18px`, and `20px` tokens.
- `radius.xs` must be `8px`; `radius.sm` must be `50px` for pills and circular controls.
- Motion must use `200ms`, `300ms`, and `350ms` tokens.
- Reduced-motion users must receive no essential motion and no layout-dependent animation.

## Component-Level Rules

### Global Navigation

Anatomy: utility contact row, brand mark, primary links, tour menu, account actions, and mobile menu control.

- Default: navigation must expose descriptive labels and a visible active route.
- Hover: links should change color without shifting layout.
- Focus-visible: every link and menu control must show a 3px high-contrast outline.
- Active: the current route must have a non-color indicator.
- Disabled: unavailable destinations must be removed from tab order or marked disabled.
- Loading: navigation must remain usable while page data loads.
- Error: failed menu data must show a recoverable link or concise message.
- Keyboard: `Tab` must move through controls; `Enter` and `Space` must open supported menus; `Escape` must close an open menu.
- Touch: menu targets must be at least 44 by 44 CSS pixels.
- Responsive: desktop menus must collapse into one predictable mobile disclosure.
- Overflow: long labels must wrap or use a menu; they must not clip or overlap.

### Hero And Trip Finder

Anatomy: eyebrow, heading, supporting copy, primary action, secondary action, and destination/type/date fields.

- Default: the finder must identify each field with a visible label.
- Hover: action buttons should use a restrained color change.
- Focus-visible: fields and buttons must retain a visible outline against the hero image.
- Active: submit must communicate that a search was initiated.
- Disabled: submit must be disabled only while the request is pending.
- Loading: the submit control must expose a loading label and remain width-stable.
- Error: invalid fields must use `aria-invalid="true"` and an adjacent text error.
- Keyboard: fields must follow logical source order; `Enter` must submit the form.
- Touch: date and select controls must remain usable without hover.
- Responsive: fields must stack below 768px without horizontal scrolling.
- Empty state: an empty search must explain how to choose a destination rather than returning a blank result.

### Destination And Package Cards

Anatomy: image, category, title, short description, metadata, price, and one descriptive action.

- Default: cards must use a stable image ratio and consistent content padding.
- Hover: image zoom must be subtle and must not alter card dimensions.
- Focus-visible: the entire linked card or its action must show an outline.
- Active: pressed actions must provide a visual state.
- Disabled: unavailable packages must show status text and disable booking only.
- Loading: image placeholders must reserve the final image dimensions.
- Error: failed images must use meaningful alt text and a neutral fallback.
- Keyboard, pointer, and touch users must have the same destination target.
- Long titles and prices must wrap without changing neighboring card alignment.
- Empty lists must show a useful message and a route back to all destinations.

### Buttons And Links

- Labels must describe the outcome: use `Get your quote`, not `Click here`.
- Default, hover, focus-visible, active, disabled, loading, and error states must be defined for every action.
- Icon-only controls must have an accessible name and a tooltip for unfamiliar icons.
- Buttons must use the shared spacing and typography tokens.
- Loading buttons must preserve width and prevent duplicate submissions.
- Error states must identify the failed action in text.

### WhatsApp Contact Control

- The floating control must use a recognizable vector WhatsApp mark, not text inside a circular button.
- It must link to the verified `wa.me` number and have `aria-label="Chat on WhatsApp"`.
- Default, hover, focus-visible, active, disabled, loading, and error states must be represented without relying on color alone.
- The tooltip must appear on hover and keyboard focus.
- It must remain 44 by 44 CSS pixels or larger and avoid covering form controls on mobile.

### Forms And Inputs

- Every input must have a persistent label, autocomplete value where applicable, and a clear error target.
- Default, hover, focus-visible, active, disabled, loading, and error styles must be available.
- Required fields must be announced with `required` and visible text, not color alone.
- Long validation messages must wrap within the form and remain adjacent to the field.
- Form submission must preserve entered values after an error.

### Tables And Lists

- Tables must use semantic `caption`, `thead`, and `tbody` elements.
- Tables must scroll horizontally on narrow screens without shrinking text below 13px.
- Lists must preserve meaningful order and use real list elements.
- Empty states must explain what is missing and provide a next action.

## Accessibility Requirements And Testable Acceptance Criteria

- Every interactive element must be reachable and operable with keyboard only.
- Automated accessibility testing must report zero serious or critical violations.
- Every focused element must have a visible outline with at least 3:1 contrast against adjacent pixels.
- The page must pass at 200% zoom without clipped primary actions or horizontal page scrolling.
- Screen readers must announce navigation landmarks, form labels, validation errors, button names, and dialog states.
- All meaningful images must have useful alt text; decorative images must use empty alt text.
- Color must never be the only indicator of state.
- Touch targets must be at least 44 by 44 CSS pixels.
- `prefers-reduced-motion: reduce` must disable non-essential transitions and animations.
- Focus must move into opened dialogs and return to the triggering control when closed.

## Content And Tone Standards

Copy must be concise, specific, and confident. Name the place, duration, travel mode, and price where known.

Use:

- `5 Days Hunza Valley, Naltar & Khunjerab Pass`
- `Starting from PKR 28,000`
- `Get a private itinerary`
- `Chat with a tour designer`

Avoid:

- `Click here`
- `The ultimate unforgettable experience of a lifetime`
- Unsupported claims such as `guaranteed best price`
- Invented reviews, ratings, or package availability

## Anti-Patterns And Prohibited Implementations

- The site must not use emoji as a substitute for interface icons.
- The site must not hide focus indicators.
- The site must not use low-contrast text over photos.
- The site must not mix multiple brand names in one primary navigation.
- The site must not use unlabelled icon-only actions.
- The site must not create one-off spacing or font sizes outside the token scale.
- The site must not place cards inside cards or use decorative effects that reduce content legibility.
- The site must not submit forms twice during loading.
- The site must not truncate prices, titles, error messages, or navigation labels.

## Migration Notes

- Use the shared token layer in `assets/css/style.css` and `discover_pakistan/static/css/style.css`.
- Keep static/PHP and Django templates structurally equivalent for the hero, destination cards, package cards, custom-tour route, and WhatsApp control.
- Replace legacy emoji markers with inline SVG or the project icon system as components are touched.
- Keep package and review content data-backed; do not duplicate production facts in templates when a model or configuration source exists.

## QA Checklist

- [ ] DM Sans loads and is applied to body, navigation, headings, controls, and tables.
- [ ] Semantic tokens are used for colors, spacing, radii, and motion.
- [ ] All buttons and links have default, hover, focus-visible, active, disabled, loading, and error behavior.
- [ ] Keyboard navigation works through the primary navigation, finder, forms, dialogs, and WhatsApp control.
- [ ] Focus indicators remain visible on dark backgrounds and photographs.
- [ ] Hero, cards, table, and forms pass at mobile, tablet, desktop, and 200% zoom.
- [ ] Empty, loading, image-error, and validation-error states are testable.
- [ ] No emoji remains in primary interface controls.
- [ ] WhatsApp links point to the verified number and expose an accessible name.
- [ ] Automated accessibility checks report no serious or critical violations.
- [ ] `python manage.py test apps.core` passes.
