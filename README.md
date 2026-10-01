# Simple Branded Preloader for WordPress

A lightweight full-screen preloader for WordPress. It shows your logo with a smooth entrance animation and a gradient progress bar, then fades out. Pure CSS animation with a tiny bit of JavaScript, no plugin or library needed.

## Features
- Full-screen overlay with a solid background color
- Logo fades and scales in
- Animated gradient progress bar
- Smooth fade-out, then removed from the page
- Responsive sizing (logo and bar scale with the screen)
- Works with any theme that supports `wp_body_open`

## Installation
1. Install the free WPCode (Code Snippets) plugin, or use your child theme's `functions.php`.
2. Create a new PHP snippet and paste in the code from `preloader.php`.
3. Replace the logo URL in the `<img>` tag with your own logo.
4. Set the snippet to run everywhere (frontend) and activate it.

## Customization
All of this is in the CSS inside the snippet:
- Background color: `.gp-bg`
- Logo size and corner radius: `.gp-logo`
- Progress bar colors: `.gp-bar` (the gradient)
- Timing: the `2s` fade-out delay in `#groonic-preloader`, the `1.7s` bar fill, and the `2800` ms removal in the script. Keep the removal time slightly longer than the fade-out delay plus its duration.

## How it works
1. `wp_body_open` outputs the overlay markup right after the opening `<body>` tag.
2. `wp_head` adds the CSS animations.
3. `wp_footer` adds a small script that hides the overlay after the animation finishes.

## Author
Azmayen Farhan - https://azmayenfarhan.com
