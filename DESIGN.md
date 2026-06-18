---
name: Synthetic Horizon
colors:
  surface: '#131316'
  surface-dim: '#131316'
  surface-bright: '#39393c'
  surface-container-lowest: '#0e0e10'
  surface-container-low: '#1c1b1e'
  surface-container: '#201f22'
  surface-container-high: '#2a2a2c'
  surface-container-highest: '#353437'
  on-surface: '#e5e1e5'
  on-surface-variant: '#c9c4d6'
  inverse-surface: '#e5e1e5'
  inverse-on-surface: '#313033'
  outline: '#928ea0'
  outline-variant: '#474554'
  surface-tint: '#c7bfff'
  primary: '#c7bfff'
  on-primary: '#2b009e'
  primary-container: '#8e7fff'
  on-primary-container: '#25008c'
  inverse-primary: '#5b46d2'
  secondary: '#44e2cd'
  on-secondary: '#003731'
  secondary-container: '#03c6b2'
  on-secondary-container: '#004d44'
  tertiary: '#e6c364'
  on-tertiary: '#3d2e00'
  tertiary-container: '#c9a84c'
  on-tertiary-container: '#503d00'
  error: '#ffb4ab'
  on-error: '#690005'
  error-container: '#93000a'
  on-error-container: '#ffdad6'
  primary-fixed: '#e5deff'
  primary-fixed-dim: '#c7bfff'
  on-primary-fixed: '#180065'
  on-primary-fixed-variant: '#4229b9'
  secondary-fixed: '#62fae3'
  secondary-fixed-dim: '#3cddc7'
  on-secondary-fixed: '#00201c'
  on-secondary-fixed-variant: '#005047'
  tertiary-fixed: '#ffe08f'
  tertiary-fixed-dim: '#e6c364'
  on-tertiary-fixed: '#241a00'
  on-tertiary-fixed-variant: '#584400'
  background: '#131316'
  on-background: '#e5e1e5'
  surface-variant: '#353437'
  deep-space: '#060608'
  void-navy: '#0B0B1A'
  electric-violet: '#7C6AF5'
  neon-cyan: '#2DD4BF'
  plasma-gold: '#C9A84C'
  frost-white: '#F0F0F5'
  glass-stroke: rgba(240, 240, 245, 0.12)
typography:
  display-lg:
    fontFamily: Sora
    fontSize: 64px
    fontWeight: '800'
    lineHeight: 72px
    letterSpacing: -0.02em
  display-lg-mobile:
    fontFamily: Sora
    fontSize: 40px
    fontWeight: '800'
    lineHeight: 48px
    letterSpacing: -0.02em
  headline-md:
    fontFamily: Sora
    fontSize: 32px
    fontWeight: '600'
    lineHeight: 40px
  headline-sm:
    fontFamily: Sora
    fontSize: 24px
    fontWeight: '600'
    lineHeight: 32px
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  code-label:
    fontFamily: JetBrains Mono
    fontSize: 14px
    fontWeight: '500'
    lineHeight: 20px
    letterSpacing: 0.05em
  cta-label:
    fontFamily: Sora
    fontSize: 16px
    fontWeight: '700'
    lineHeight: 100%
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  unit: 8px
  container-max: 1280px
  gutter: 24px
  margin-mobile: 16px
  margin-desktop: 64px
---

## Brand & Style

The design system is a high-fidelity, futuristic framework designed for an immersive tech-driven experience. It targets a tech-literate audience seeking cutting-edge AI and info-product solutions. 

The aesthetic is a hybrid of **Glassmorphism** and **Futuristic 3D**, characterized by deep spatial depth and luminous interfaces. It utilizes translucent layers with high-refraction blurs to simulate physical glass, paired with high-frequency neon accents that mimic data flows and energy cores. The UI should feel like a sophisticated cockpit or a neural interface—dark, focused, and multidimensional.

## Colors

The palette centers on a "Deep Space" foundation, using `#060608` for the primary canvas to maximize the luminance of accent colors. 

- **Primary (Electric Violet):** Used for core AI-driven interactions, primary CTAs, and active states.
- **Secondary (Neon Cyan):** Reserved for technical data, secondary signals, and "online" or "success" indicators.
- **Tertiary (Plasma Gold):** A premium accent used sparingly for high-value info-products, certifications, or exclusive features.
- **Surface Strategy:** Backgrounds are not flat; they utilize radial gradients of `void-navy` and `deep-space` to create an illusion of infinite depth.

## Typography

The typography strategy balances high-tech precision with editorial impact.

- **Sora** serves as the display typeface, chosen for its geometric, futuristic construction and wide stance. It should be used for all major headings and button labels to reinforce the brand's bold technological stance.
- **Inter** provides high legibility for long-form content and body descriptions, ensuring the UI remains functional despite its futuristic aesthetics.
- **JetBrains Mono** is utilized for metadata, labels, and technical specifications, evoking a "developer-centric" or "AI-processing" feel.

Apply a subtle text-shadow (glow) to Headlines in `primary_color` at low opacity to simulate light emission.

## Layout & Spacing

This design system employs a **Fluid Grid** with a strong emphasis on verticality and 3D layering.

- **Grid:** A 12-column grid system is used for desktop, 8 for tablet, and 4 for mobile. 
- **Z-Axis Hierarchy:** Elements are not just spaced horizontally and vertically, but also along the Z-axis. Use generous padding inside glass containers (minimum 32px) to allow the background blurs to feel substantial.
- **Reflow:** On mobile, complex 3D side-by-side elements should stack into a single column, maintaining their depth through shadow intensity rather than scale.

## Elevation & Depth

Depth is the cornerstone of this design system. It is achieved through three primary methods:

1.  **Glassmorphism:** Surfaces use a background blur (minimum 20px) and a semi-transparent fill (`rgba(11, 11, 26, 0.6)`). Every glass panel must have a 1px solid border at 12% opacity (Frost White) to catch "light" at the edges.
2.  **Luminous Shadows:** Instead of traditional black shadows, use "Glow Shadows" that inherit the color of the element (e.g., a violet glow for primary buttons). These should be highly diffused (blur 30px+) and low opacity (20-30%).
3.  **Parallax Layers:** Background decorative elements (spheres, grid lines) should move at a slower scroll speed than the foreground glass cards to create a sense of vast space.

## Shapes

The shape language is sophisticated and modern. A `0.5rem` (8px) base radius is standard for most interface elements, providing a sleek, "machined" look that isn't too soft or too aggressive. 

For high-level 3D cards and primary containers, use `rounded-xl` (1.5rem) to emphasize the "floating glass slab" metaphor. Internal elements like tags or small inputs should maintain the base `roundedness` for consistency.

## Components

### 3D Floating Cards
Cards are the primary container. They feature a 1px top-left "highlight" border and a darker bottom-right "shadow" border to simulate thickness. When hovered, the card should lift (translateY -8px) and the border-opacity should increase.

### 3D Buttons
Buttons utilize a "thick" appearance. The base of the button is a darker shade of the accent color, while the top face is the vibrant hex. Upon clicking, the button "depresses" via a transform: scale(0.98) and a reduction in the bottom shadow height.

### AI Glow Inputs
Input fields are dark with a `glass-stroke` border. On focus, the entire border glows with `neon-cyan`, and a subtle inner-glow appears at the bottom of the field.

### Data Chips
Small, monospaced labels using `JetBrains Mono`. They should appear as "tags" with a subtle background tint of the accent color and no border, appearing as if they are etched into the glass surface.

### Parallax Sections
Section transitions should feature "light leaks" or geometric wireframes that move independently of the content, creating a sense of an evolving technological environment.