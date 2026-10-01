/**
 * Groonic Preloader
 * Add this via WP Code Snippets (runs on every page)
 */

// Inject preloader HTML right after <body> opens
add_action('wp_body_open', function () { ?>
  <div id="groonic-preloader">
    <div class="gp-bg"></div>
    <div class="gp-content">
      <img
        src="https://www.new-viceroy.azmayenfarhan.com/wp-content/uploads/2026/09/ChatGPT-Image-Sep-26-2026-04_12_43-AM.png"
        alt="Groonic"
        class="gp-logo"
      />
      <div class="gp-bar-wrap">
        <div class="gp-bar"></div>
      </div>
    </div>
  </div>
<?php });

// Inject CSS
add_action('wp_head', function () { ?>
  <style>
    /* ── Preloader overlay ── */
    #groonic-preloader {
      position: fixed;
      inset: 0;
      z-index: 999999;
      display: flex;
      align-items: center;
      justify-content: center;
      pointer-events: all;

      /* Fade-out after 2 s, gone by 2.6 s */
      animation: gp-fadeout 0.6s ease forwards 2s;
    }

    /* Solid black background */
    .gp-bg {
      position: absolute;
      inset: 0;
      background: #1A1A1A;
    }

    /* Centre column */
    .gp-content {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 32px;
    }

    /* ── Logo ── */
    .gp-logo {
      width: clamp(180px, 30vw, 320px);
      height: auto;
	  border-radius: 20px;

      /* 1. start invisible & slightly small */
      opacity: 0;
      transform: scale(0.82) translateY(10px);

      /* 2. animate in */
      animation: gp-logoin 0.7s cubic-bezier(0.22, 1, 0.36, 1) forwards 0.15s;
    }

    /* ── Progress bar ── */
    .gp-bar-wrap {
      width: clamp(120px, 20vw, 200px);
      height: 2px;
      background: rgba(255, 255, 255, 0.12);
      border-radius: 999px;
      overflow: hidden;

      opacity: 0;
      animation: gp-fadein 0.4s ease forwards 0.5s;
    }

    .gp-bar {
      height: 100%;
      width: 0%;
      border-radius: 999px;
      background: linear-gradient(90deg, #AD0B14, #F5A502);

      /* fill across exactly 1.7 s so it reaches ~90 % by fade-out */
      animation: gp-fill 1.7s cubic-bezier(0.4, 0, 0.2, 1) forwards 0.55s;
    }

    /* ── Keyframes ── */
    @keyframes gp-logoin {
      to {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }

    @keyframes gp-fadein {
      to { opacity: 1; }
    }

    @keyframes gp-fill {
      to { width: 92%; }
    }

    @keyframes gp-fadeout {
      to {
        opacity: 0;
        pointer-events: none;
      }
    }

    /* Hide completely after animation finishes */
    #groonic-preloader.gp-hidden {
      display: none;
    }
  </style>
<?php });

// Inject JS (removes the element from DOM after the animation ends)
add_action('wp_footer', function () { ?>
  <script>
    (function () {
      var el = document.getElementById('groonic-preloader');
      if (!el) return;

      // Remove from DOM 200 ms after the CSS fade-out finishes (2 s delay + 0.6 s duration)
      setTimeout(function () {
        el.classList.add('gp-hidden');
      }, 2800);
    })();
  </script>
<?php });
