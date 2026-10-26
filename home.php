<!doctype html>
<html lang="en-US">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <link rel="profile" href="https://gmpg.org/xfn/11" />

  <title>
    Academixsuite : A multi tenant school management software for mordern
    school.
  </title>
  <meta name="robots" content="max-image-preview:large" />
  <style>
    img:is([sizes="auto" i], [sizes^="auto," i]) {
      contain-intrinsic-size: 3000px 1500px;
    }
  </style>
  <link rel="dns-prefetch" href="//maps.googleapis.com" />
  <link rel="dns-prefetch" href="//fonts.googleapis.com" />
  <link rel="alternate" type="application/rss+xml" title="Academixsuite &raquo; Feed" href="feed/" />
  <link rel="alternate" type="application/rss+xml" title="Academixsuite &raquo; Comments Feed" href="comments/feed/" />
  <script type="text/javascript">
    /* <![CDATA[ */
    window._wpemojiSettings = {
      baseUrl: "https:\/\/s.w.org\/images\/core\/emoji\/16.0.1\/72x72\/",
      ext: ".png",
      svgUrl: "https:\/\/s.w.org\/images\/core\/emoji\/16.0.1\/svg\/",
      svgExt: ".svg",
      source: {
        concatemoji: "https:\/\/lizza.wpengine.com\/lms\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.8.3",
      },
    };
    /*! This file is auto-generated */
    !(function(s, n) {
      var o, i, e;

      function c(e) {
        try {
          var t = {
            supportTests: e,
            timestamp: new Date().valueOf()
          };
          sessionStorage.setItem(o, JSON.stringify(t));
        } catch (e) {}
      }

      function p(e, t, n) {
        (e.clearRect(0, 0, e.canvas.width, e.canvas.height),
          e.fillText(t, 0, 0));
        var t = new Uint32Array(
            e.getImageData(0, 0, e.canvas.width, e.canvas.height).data,
          ),
          a =
          (e.clearRect(0, 0, e.canvas.width, e.canvas.height),
            e.fillText(n, 0, 0),
            new Uint32Array(
              e.getImageData(0, 0, e.canvas.width, e.canvas.height).data,
            ));
        return t.every(function(e, t) {
          return e === a[t];
        });
      }

      function u(e, t) {
        (e.clearRect(0, 0, e.canvas.width, e.canvas.height),
          e.fillText(t, 0, 0));
        for (
          var n = e.getImageData(16, 16, 1, 1), a = 0; a < n.data.length; a++
        )
          if (0 !== n.data[a]) return !1;
        return !0;
      }

      function f(e, t, n, a) {
        switch (t) {
          case "flag":
            return n(
                e,
                "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f",
                "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f",
              ) ?
              !1 :
              !n(
                e,
                "\ud83c\udde8\ud83c\uddf6",
                "\ud83c\udde8\u200b\ud83c\uddf6",
              ) &&
              !n(
                e,
                "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f",
                "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f",
              );
          case "emoji":
            return !a(e, "\ud83e\udedf");
        }
        return !1;
      }

      function g(e, t, n, a) {
        var r =
          "undefined" != typeof WorkerGlobalScope &&
          self instanceof WorkerGlobalScope ?
          new OffscreenCanvas(300, 150) :
          s.createElement("canvas"),
          o = r.getContext("2d", {
            willReadFrequently: !0
          }),
          i = ((o.textBaseline = "top"), (o.font = "600 32px Arial"), {});
        return (
          e.forEach(function(e) {
            i[e] = t(o, e, n, a);
          }),
          i
        );
      }

      function t(e) {
        var t = s.createElement("script");
        ((t.src = e), (t.defer = !0), s.head.appendChild(t));
      }
      "undefined" != typeof Promise &&
        ((o = "wpEmojiSettingsSupports"),
          (i = ["flag", "emoji"]),
          (n.supports = {
            everything: !0,
            everythingExceptFlag: !0
          }),
          (e = new Promise(function(e) {
            s.addEventListener("DOMContentLoaded", e, {
              once: !0
            });
          })),
          new Promise(function(t) {
            var n = (function() {
              try {
                var e = JSON.parse(sessionStorage.getItem(o));
                if (
                  "object" == typeof e &&
                  "number" == typeof e.timestamp &&
                  new Date().valueOf() < e.timestamp + 604800 &&
                  "object" == typeof e.supportTests
                )
                  return e.supportTests;
              } catch (e) {}
              return null;
            })();
            if (!n) {
              if (
                "undefined" != typeof Worker &&
                "undefined" != typeof OffscreenCanvas &&
                "undefined" != typeof URL &&
                URL.createObjectURL &&
                "undefined" != typeof Blob
              )
                try {
                  var e =
                    "postMessage(" +
                    g.toString() +
                    "(" + [
                      JSON.stringify(i),
                      f.toString(),
                      p.toString(),
                      u.toString(),
                    ].join(",") +
                    "));",
                    a = new Blob([e], {
                      type: "text/javascript"
                    }),
                    r = new Worker(URL.createObjectURL(a), {
                      name: "wpTestEmojiSupports",
                    });
                  return void(r.onmessage = function(e) {
                    (c((n = e.data)), r.terminate(), t(n));
                  });
                } catch (e) {}
              c((n = g(i, f, p, u)));
            }
            t(n);
          })
          .then(function(e) {
            for (var t in e)
              ((n.supports[t] = e[t]),
                (n.supports.everything =
                  n.supports.everything && n.supports[t]),
                "flag" !== t &&
                (n.supports.everythingExceptFlag =
                  n.supports.everythingExceptFlag && n.supports[t]));
            ((n.supports.everythingExceptFlag =
                n.supports.everythingExceptFlag && !n.supports.flag),
              (n.DOMReady = !1),
              (n.readyCallback = function() {
                n.DOMReady = !0;
              }));
          })
          .then(function() {
            return e;
          })
          .then(function() {
            var e;
            n.supports.everything ||
              (n.readyCallback(),
                (e = n.source || {}).concatemoji ?
                t(e.concatemoji) :
                e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)));
          }));
    })((window, document), window._wpemojiSettings);
    /* ]]> */
  </script>
  <style id="wp-emoji-styles-inline-css" type="text/css">
    img.wp-smiley,
    img.emoji {
      display: inline !important;
      border: none !important;
      box-shadow: none !important;
      height: 1em !important;
      width: 1em !important;
      margin: 0 0.07em !important;
      vertical-align: -0.1em !important;
      background: none !important;
      padding: 0 !important;
    }
  </style>
  <style id="classic-theme-styles-inline-css" type="text/css">
    /*! This file is auto-generated */
    .wp-block-button__link {
      color: #fff;
      background-color: #32373c;
      border-radius: 9999px;
      box-shadow: none;
      text-decoration: none;
      padding: calc(0.667em + 2px) calc(1.333em + 2px);
      font-size: 1.125em;
    }

    .wp-block-file__button {
      background: #32373c;
      color: #fff;
      text-decoration: none;
    }
  </style>
  <style id="global-styles-inline-css" type="text/css">
    :root {
      --wp--preset--aspect-ratio--square: 1;
      --wp--preset--aspect-ratio--4-3: 4/3;
      --wp--preset--aspect-ratio--3-4: 3/4;
      --wp--preset--aspect-ratio--3-2: 3/2;
      --wp--preset--aspect-ratio--2-3: 2/3;
      --wp--preset--aspect-ratio--16-9: 16/9;
      --wp--preset--aspect-ratio--9-16: 9/16;
      --wp--preset--color--black: #000000;
      --wp--preset--color--cyan-bluish-gray: #abb8c3;
      --wp--preset--color--white: #ffffff;
      --wp--preset--color--pale-pink: #f78da7;
      --wp--preset--color--vivid-red: #cf2e2e;
      --wp--preset--color--luminous-vivid-orange: #ff6900;
      --wp--preset--color--luminous-vivid-amber: #fcb900;
      --wp--preset--color--light-green-cyan: #7bdcb5;
      --wp--preset--color--vivid-green-cyan: #00d084;
      --wp--preset--color--pale-cyan-blue: #8ed1fc;
      --wp--preset--color--vivid-cyan-blue: #0693e3;
      --wp--preset--color--vivid-purple: #9b51e0;
      --wp--preset--color--primary: #14452f;
      --wp--preset--color--secondary: #7cff77;
      --wp--preset--color--tertiary: #f2f8f1;
      --wp--preset--color--body-bg: #ffffff;
      --wp--preset--color--body-text: #394630;
      --wp--preset--color--alternate: #22281e;
      --wp--preset--color--transparent: rgba(0, 0, 0, 0);
      --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,
          rgba(6, 147, 227, 1) 0%,
          rgb(155, 81, 224) 100%);
      --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,
          rgb(122, 220, 180) 0%,
          rgb(0, 208, 130) 100%);
      --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,
          rgba(252, 185, 0, 1) 0%,
          rgba(255, 105, 0, 1) 100%);
      --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,
          rgba(255, 105, 0, 1) 0%,
          rgb(207, 46, 46) 100%);
      --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,
          rgb(238, 238, 238) 0%,
          rgb(169, 184, 195) 100%);
      --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,
          rgb(74, 234, 220) 0%,
          rgb(151, 120, 209) 20%,
          rgb(207, 42, 186) 40%,
          rgb(238, 44, 130) 60%,
          rgb(251, 105, 98) 80%,
          rgb(254, 248, 76) 100%);
      --wp--preset--gradient--blush-light-purple: linear-gradient(135deg,
          rgb(255, 206, 236) 0%,
          rgb(152, 150, 240) 100%);
      --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,
          rgb(254, 205, 165) 0%,
          rgb(254, 45, 45) 50%,
          rgb(107, 0, 62) 100%);
      --wp--preset--gradient--luminous-dusk: linear-gradient(135deg,
          rgb(255, 203, 112) 0%,
          rgb(199, 81, 192) 50%,
          rgb(65, 88, 208) 100%);
      --wp--preset--gradient--pale-ocean: linear-gradient(135deg,
          rgb(255, 245, 203) 0%,
          rgb(182, 227, 212) 50%,
          rgb(51, 167, 181) 100%);
      --wp--preset--gradient--electric-grass: linear-gradient(135deg,
          rgb(202, 248, 128) 0%,
          rgb(113, 206, 126) 100%);
      --wp--preset--gradient--midnight: linear-gradient(135deg,
          rgb(2, 3, 129) 0%,
          rgb(40, 116, 252) 100%);
      --wp--preset--font-size--small: 13px;
      --wp--preset--font-size--medium: 20px;
      --wp--preset--font-size--large: 36px;
      --wp--preset--font-size--x-large: 42px;
      --wp--preset--font-family--inter: "Inter", sans-serif;
      --wp--preset--font-family--cardo: Cardo;
      --wp--preset--spacing--20: 0.44rem;
      --wp--preset--spacing--30: 0.67rem;
      --wp--preset--spacing--40: 1rem;
      --wp--preset--spacing--50: 1.5rem;
      --wp--preset--spacing--60: 2.25rem;
      --wp--preset--spacing--70: 3.38rem;
      --wp--preset--spacing--80: 5.06rem;
      --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
      --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
      --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
      --wp--preset--shadow--outlined:
        6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
      --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
    }

    :where(.is-layout-flex) {
      gap: 0.5em;
    }

    :where(.is-layout-grid) {
      gap: 0.5em;
    }

    body .is-layout-flex {
      display: flex;
    }

    .is-layout-flex {
      flex-wrap: wrap;
      align-items: center;
    }

    .is-layout-flex> :is(*, div) {
      margin: 0;
    }

    body .is-layout-grid {
      display: grid;
    }

    .is-layout-grid> :is(*, div) {
      margin: 0;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    :where(.wp-block-columns.is-layout-grid) {
      gap: 2em;
    }

    :where(.wp-block-post-template.is-layout-flex) {
      gap: 1.25em;
    }

    :where(.wp-block-post-template.is-layout-grid) {
      gap: 1.25em;
    }

    .has-black-color {
      color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-color {
      color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-color {
      color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-color {
      color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-color {
      color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-color {
      color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-color {
      color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-color {
      color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-color {
      color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-color {
      color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-color {
      color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-color {
      color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-background-color {
      background-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-background-color {
      background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-background-color {
      background-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-background-color {
      background-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-background-color {
      background-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-background-color {
      background-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-background-color {
      background-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-background-color {
      background-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-background-color {
      background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-background-color {
      background-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-border-color {
      border-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-border-color {
      border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-border-color {
      border-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-border-color {
      border-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-border-color {
      border-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-border-color {
      border-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-border-color {
      border-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-border-color {
      border-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-border-color {
      border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-border-color {
      border-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
    }

    .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
      background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
    }

    .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-orange-to-vivid-red-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
    }

    .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
      background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
    }

    .has-cool-to-warm-spectrum-gradient-background {
      background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
    }

    .has-blush-light-purple-gradient-background {
      background: var(--wp--preset--gradient--blush-light-purple) !important;
    }

    .has-blush-bordeaux-gradient-background {
      background: var(--wp--preset--gradient--blush-bordeaux) !important;
    }

    .has-luminous-dusk-gradient-background {
      background: var(--wp--preset--gradient--luminous-dusk) !important;
    }

    .has-pale-ocean-gradient-background {
      background: var(--wp--preset--gradient--pale-ocean) !important;
    }

    .has-electric-grass-gradient-background {
      background: var(--wp--preset--gradient--electric-grass) !important;
    }

    .has-midnight-gradient-background {
      background: var(--wp--preset--gradient--midnight) !important;
    }

    .has-small-font-size {
      font-size: var(--wp--preset--font-size--small) !important;
    }

    .has-medium-font-size {
      font-size: var(--wp--preset--font-size--medium) !important;
    }

    .has-large-font-size {
      font-size: var(--wp--preset--font-size--large) !important;
    }

    .has-x-large-font-size {
      font-size: var(--wp--preset--font-size--x-large) !important;
    }

    :where(.wp-block-post-template.is-layout-flex) {
      gap: 1.25em;
    }

    :where(.wp-block-post-template.is-layout-grid) {
      gap: 1.25em;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    :where(.wp-block-columns.is-layout-grid) {
      gap: 2em;
    }

    :root :where(.wp-block-pullquote) {
      font-size: 1.5em;
      line-height: 1.6;
    }
  </style>
  <link rel="stylesheet" id="contact-form-7-css"
    href="wp-content/plugins/contact-form-7/includes/css/styles.css?ver=6.1.1" type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-plus-elementor-css"
    href="wp-content/plugins/lizza-lms-plus/elementor/assets/css/elementor.css?ver=1.0.2" type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-plus-common-css"
    href="wp-content/plugins/lizza-lms-plus/assets/css/common.css?ver=1.0.2" type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-pro-widget-css"
    href="wp-content/plugins/lizza-lms-pro/assets/css/widget.css?ver=1.0.0" type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-elementor-addon-core-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/assets/css/core.css?ver=1.0.0" type="text/css"
    media="all" />
  <style id="wdt-elementor-addon-core-inline-css" type="text/css">
    :root {
      --wdt-elementor-color-primary: #22281e;
      --wdt-elementor-color-primary-rgb: 34, 40, 30;
      --wdt-elementor-color-secondary: #14452f;
      --wdt-elementor-color-secondary-rgb: 20, 69, 47;
      --wdt-elementor-color-text: #394630;
      --wdt-elementor-color-text-rgb: 57, 70, 48;
      --wdt-elementor-color-accent: #14452f;
      --wdt-elementor-color-accent-rgb: 20, 69, 47;
      --wdt-elementor-color-custom-1: #7cff77;
      --wdt-elementor-color-custom-1-rgb: 124, 255, 119;
      --wdt-elementor-color-custom-2: #f2f8f1;
      --wdt-elementor-color-custom-2-rgb: 242, 248, 241;
      --wdt-elementor-color-custom-3: #ffffff;
      --wdt-elementor-color-custom-3-rgb: 255, 255, 255;
      --wdt-elementor-color-custom-4: #e7e7e7;
      --wdt-elementor-color-custom-4-rgb: 231, 231, 231;
      --wdt-elementor-typo-primary-font-family: DM Sans;
      --wdt-elementor-typo-primary-font-weight: 700;
      --wdt-elementor-typo-secondary-font-family: DM Sans;
      --wdt-elementor-typo-secondary-font-weight: 600;
      --wdt-elementor-typo-text-font-family: Manrope;
      --wdt-elementor-typo-text-font-weight: 400;
      --wdt-elementor-typo-accent-font-family: DM Sans;
      --wdt-elementor-typo-accent-font-weight: 600;
    }
  </style>
  <link rel="stylesheet" id="wcs-timetable-css"
    href="wp-content/plugins/weekly-class/assets/front/css/timetable.css?ver=2.3.1" type="text/css" media="all" />
  <style id="wcs-timetable-inline-css" type="text/css">
    .wcs-single__action .wcs-btn--action {
      color: rgba(255, 255, 255, 1);
      background-color: #bd322c;
    }
  </style>
  <link rel="stylesheet" id="woocommerce-layout-css"
    href="wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=9.1.4" type="text/css" media="all" />
  <link rel="stylesheet" id="woocommerce-smallscreen-css"
    href="wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css?ver=9.1.4" type="text/css"
    media="only screen and (max-width: 768px)" />
  <link rel="stylesheet" id="woocommerce-general-css"
    href="wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=9.1.4" type="text/css" media="all" />
  <style id="woocommerce-inline-inline-css" type="text/css">
    .woocommerce form .form-row .required {
      visibility: visible;
    }
  </style>
  <link rel="stylesheet" id="swiper-css"
    href="wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min.css?ver=8.4.5" type="text/css" media="all" />
  <link rel="stylesheet" id="fontawesome-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/all.min.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="material-icon-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/material-design-iconic-font.min.css?ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-base-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/base.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="wdt-common-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/common.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="wdt-modules-listing-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/modules-listing.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="wdt-modules-default-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/modules-default.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="elementor-icons-css"
    href="wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.30.0" type="text/css"
    media="all" />
  <link rel="stylesheet" id="elementor-frontend-css"
    href="wp-content/uploads/sites/12/elementor/css/custom-frontend-lite.min.css?ver=1729595945" type="text/css"
    media="all" />
  <link rel="stylesheet" id="elementor-post-6-css"
    href="wp-content/uploads/sites/12/elementor/css/post-6.css?ver=1729595945" type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-global-css"
    href="wp-content/uploads/sites/12/elementor/css/global.css?ver=1729595947" type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-21714-css"
    href="wp-content/uploads/sites/12/elementor/css/post-21714.css?ver=1729595947" type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-social-share-frontend-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/social-share/assets/social-share-frontend.css?ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="chosen-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/chosen.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="wdt-fields-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/fields.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="wdt-search-frontend-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/search/assets/search-frontend.css?ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-media-images-frontend-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/media-images/assets/media-images-frontend.css?ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-media-attachments-frontend-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/media-attachments/assets/media-attachments-frontend.css?ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-modules-singlepage-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/modules-singlepage.css?ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-comments-frontend-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/comments/assets/comments-frontend.css?ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-business-hours-frontend-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/business-hours/assets/business-hours-frontend.css?ver=6.8.3"
    type="text/css" media="all" />
  <style id="wdt-skin-inline-css" type="text/css">
    .wdt-dashbord-container .wdt-dashbord-section-holder .wdt-dashbord-section-title,
    .wdt-dashbord-section-holder-content .ui-sortable .wdt-social-item-section div[class*="section-options"] span:hover,
    .wdt-add-listing .wdt-dashbord-section-holder-content .wdt-dashboard-option-item div[class*="wdt-dashboard-option-item"] input[type="checkbox"]:checked~label:before,
    .wdt-my-ads-container .wdt-dashbord-section-holder-content .wdt-dashbord-ads-addnew-wrapper .wdt-dashbord-ad-details input[type="checkbox"]:checked~label:before,
    .wdt-dashboard-addincharge-form .wdt-dashbord-section-holder-content .wdt-dashboard-option-item input[type="checkbox"]:checked~label:before,
    .wdt-dashbord-reviews-listing-wrapper .wdt-dashbord-reviews-listing .wdt-ratings-holder span,
    .wdt-listings-item-wrapper.type1 .wdt-listings-item-bottom-section-content .custom-button-style.wdt-listing-view-details,
    .wdt-listings-item-wrapper.type2 .wdt-listings-item-bottom-section-content>div.wdt-listings-item-bottom-pricing-holder .custom-button-style,
    .wdt-packages-item-wrapper .wdt-item-pricing-details ins,
    .wdt-packages-item-wrapper.type1 .wdt-packagelist-view-details-button span,
    .wdt-packages-item-wrapper.type1 .wdt-item-status-details .wdt-proceed-button .custom-button-style span,
    .wdt-packages-item-wrapper.type2 .wdt-packagelist-view-details .custom-button-style span,
    .wdt-packages-item-wrapper.type2 .wdt-packagelist-view-details .custom-button-style:hover,
    .wdt-packages-item-wrapper.type2 .wdt-item-status-details .custom-button-style,
    .wdt-packages-item-wrapper.type2 .wdt-item-status-details .added_to_cart,
    .wdt-packages-item-wrapper.type3 .wdt-item-status-details .custom-button-style,
    .wdt-packages-item-wrapper.type3 .wdt-item-status-details .added_to_cart,
    .wdt-packages-item-wrapper.type3 .wdt-packagelist-view-details .custom-button-style,
    ul.wdt-dashboard-menus li a,
    .wdt-packages-item-wrapper.type3 .wdt-item-status-details .wdt-purchased,
    .wdt-listings-item-wrapper.type3 .wdt-listings-item-bottom-section a.custom-button-style,
    .wdt-listings-item-wrapper.type4 .wdt-listings-item-bottom-section>div.wdt-listings-item-bottom-pricing-holder .custom-button-style:before,
    .wdt-listings-item-wrapper.type5 .wdt-listings-item-bottom-section a.custom-button-style,
    .wdt-listings-item-wrapper.type4 .wdt-listings-item-top-section .wdt-listings-item-top-section-content>div a,
    .wdt-listings-item-wrapper.type4 .wdt-listings-item-top-section .wdt-listings-item-top-section-content>div.wdt-listings-utils-item-holder .wdt-listings-utils-item>*,
    .wdt-listing-taxonomy-item .wdt-listing-taxonomy-meta-data h3 a,
    wdt-sf-fields-holder input[type="checkbox"].wdt-sf-field:checked~label:before,
    .wdt-sf-location-field-holder .wdt-sf-location-field-inner-holder .wdt-detect-location,
    .wdt-sf-fields-holder input[type="checkbox"].wdt-sf-field:checked~label::before,
    .wdt-sf-fields-holder .ui-widget.ui-widget-content .wdt-sf-radius-slider-handle,
    .wdt-sf-features-field-holder>div>div[class*="-handle"],
    .wdt-custom-login,
    .wdt-custom-login li a,
    .wdt-swiper-arrow-pagination a:hover,
    .wdt-sf-others-field-holder div.wdt-sf-others-list,
    .wdt-marker-addition-info.wdt-marker-addition-info-totalviews,
    .wdt-marker-addition-info.wdt-marker-addition-info-averageratings,
    .wdt-marker-addition-info.wdt-marker-addition-info-startdate,
    .wdt-marker-addition-info.wdt-marker-addition-info-distance,
    .wdt-listing-taxonomy-item.type2 .wdt-listing-taxonomy-icon-image>span,
    .wdt-listing-taxonomy-item .wdt-listing-taxonomy-starting-price-html ins>span,
    .wdt-listings-item-wrapper:hover .wdt-listings-item-top-section .wdt-listings-item-ad-section,
    .wdt-listings-item-wrapper:hover .wdt-listings-item-top-section .wdt-listings-featured-item-container,
    .wdt-listings-item-wrapper.type2 .wdt-listings-item-top-section .wdt-listings-featured-item-container a:after,
    .wdt-listings-item-wrapper.type2:hover .wdt-listings-item-top-section .wdt-listings-featured-item-container:before,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-top-section .wdt-listings-item-ad-section,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-top-section .wdt-listings-featured-item-container,
    .wdt-listings-item-wrapper.type5 .wdt-listings-item-top-section .wdt-listings-featured-item-container:before,
    .wdt-listings-item-wrapper.type5:hover .wdt-listings-item-top-section .wdt-listings-featured-item-container:after,
    .wdt-listings-item-wrapper.type3 .wdt-listings-item-top-section div.wdt-listings-item-ad-section,
    .wdt-listings-item-wrapper.type3 .wdt-listings-item-top-section div.wdt-listings-featured-item-container a,
    .wdt-listings-item-wrapper.type3:hover .wdt-listings-item-top-section div.wdt-listings-item-ad-section:before,
    .wdt-listings-item-wrapper.type1:not(.has-post-thumbnail) .wdt-listings-item-top-section .wdt-listings-item-top-section-content .wdt-listings-utils-item-holder>div a,
    .wdt-listings-item-wrapper.type1:not(.has-post-thumbnail) .wdt-listings-item-top-section .wdt-listings-item-top-section-content .wdt-listings-utils-item-holder>div div,
    .wdt-dashbord-section-holder-content ul.wdt-dashbord-inbox-listing-messages-wrapper li:hover,
    .wdt-dashbord-section-holder-content ul.wdt-dashbord-inbox-listing-messages-wrapper li.active,
    .wdt-listings-comment-list-holder .commentlist li.comment .comment-body .reply a.comment-reply-link,
    .wdt-listings-countdown-timer-container.type2 .wdt-listings-countdown-timer-holder .wdt-listings-countdown-timer-notice span,
    .wdt-listings-item-wrapper ul.wdt-listings-contactdetails-list li span,
    .single-wdt_packages .wdt-item-pricing-details ins,
    .single-wdt_packages .wdt-item-pricing-details span.amount,
    .single-wdt_packages .wdt-packagelist-features li:before,
    .wdt-listings-item-wrapper.type2:hover .wdt-listings-item-top-section .wdt-listings-featured-item-container a:before,
    .wdt-listings-item-wrapper.type5:hover .wdt-listings-item-top-section .wdt-listings-featured-item-container a:after,
    .wdt-listings-item-wrapper.type8:hover .wdt-listings-item-top-section div.wdt-listings-featured-item-container a,
    .wdt-listing-taxonomy-item.type6 .wdt-category-total-items a:hover,
    .wdt-comment-form-fields-holder input#wdt_media+label:before,
    .wdt-listings-item-wrapper.type5 .wdt-listings-item-top-section .wdt-listings-featured-item-container a,
    .wdt-swiper-arrow-pagination a:before,
    .wdt-packages-item-wrapper .wdt-packagelist-details>h5 a,
    .wdt-listings-item-wrapper .wdt-listings-item-bottom-section-content .wdt-listings-item-title a,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-bottom-section .wdt-listings-item-title a,
    .wdt-user-list-item .wdt-user-item-meta-data h4 a,
    .wdt-user-list-item.type1 .wdt-user-sociallinks-list li a,
    .wdt-user-list-item.type2 .wdt-user-contactdetails-list li a,
    .wdt-user-list-item.type3 .wdt-user-contactdetails-list li span,
    .wdt-user-list-item.type2 .wdt-user-contactdetails-list li span,
    .wdt-listings-item-wrapper.type3 .wdt-listings-taxonomy-container li a,
    .wdt-listings-taxonomy-container.type3 li a,
    .wdt-listings-item-wrapper .wdt-listings-excerpt span,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-bottom-section-content .wdt-listings-item-bottom-left-content div[class*="wdt-listings-"] label[class*="wdt-listings-"],
    .wdt-comment-form-fields-holder input#wdt_media+label,
    p.tpl-forget-pwd a,
    .wdt-listings-item-wrapper.type5 .wdt-listings-item-bottom-section-content>div .wdt-listings-utils-item-holder a,
    .wdt-dashbord-recent-activites-holder .wdt-dashbord-recent-activites-content p a,
    .wdt-dashbord-recent-activites-holder .wdt-dashbord-recent-activites-content p strong,
    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-details h5 a,
    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-dashboard-owner a,
    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-details .wdt-mylisting-options-container>a[data-tooltip]:after,
    .wdt-dashbord-inbox-listing-conversation-wrapper ul.wdt-dashbord-inbox-conversation-list li>span:before,
    .wdt-listings-dates-container [class*="date-container"]> :not(:last-child),
    .wdt-listings-dates-container [class*="date-container"]>div:not(:last-child)> :not(:last-child),
    .wdt-listings-post-dates-container.type1 .wdt-listings-post-date-container span,
    .wdt-listings-dates-container.type2 [class*="date-container"]>span,
    p.login-remember input[type="checkbox"]:checked~label:before,
    .wdt-login-title h2,
    .wdt-claim-form-container .wdt-claimform-secure-note>span {
      color: #1e306e;
    }

    .wdt-pagination.wdt-ajax-pagination ul.page-numbers li span,
    .wdt-pagination.wdt-ajax-pagination ul.page-numbers li a:hover,
    .wdt-pagination.wdt-ajax-pagination .prev-post a:hover,
    .wdt-pagination.wdt-ajax-pagination .next-post a:hover {
      color: #1e306e;
    }

    .wdt-pagination.wdt-ajax-pagination .prev-post a,
    .wdt-pagination.wdt-ajax-pagination .next-post a,
    .wdt-pagination.wdt-ajax-pagination ul.page-numbers li span,
    .wdt-pagination.wdt-ajax-pagination ul.page-numbers li a {
      border-color: #1e306e;
    }

    .wdt-dashbord-container .woocommerce-orders-table th,
    .wdt-pagination.wdt-ajax-pagination .prev-post a,
    .wdt-pagination.wdt-ajax-pagination .next-post a,
    .wdt-pagination.wdt-ajax-pagination ul.page-numbers li a {
      background-color: #1e306e;
    }

    .wdt-packages-item-wrapper .wdt-packagelist-features li:before,
    .wdt-listings-average-rating-container .wdt-listings-average-rating-holder span,
    .wdt-listings-average-rating-container .wdt-listings-average-rating-overall,
    .wdt-listings-featured-item-container.type1>span,
    .wdt-listings-dates-container.type2 .wdt-listings-post-date-container span,
    .wdt-listings-nearby-places-container .wdt-listings-nearby-places-item .wdt-listings-nearby-places-content .wdt-listings-nearby-places-title,
    .wdt-listings-nearby-places-container .wdt-listings-nearby-places-item .wdt-listings-nearby-places-content .wdt-listings-nearby-places-ratings:before,
    .wdt-listings-nearby-places-container .wdt-listings-nearby-places-item .wdt-listings-nearby-places-content .wdt-listings-nearby-places-distance:before,
    .wdt-listings-nearby-places-container .wdt-listings-nearby-places-item .wdt-listings-nearby-places-content .wdt-listings-nearby-places-address:before,
    .wdt-listings-contactdetails-container.type2 .wdt-listings-contactdetails-list>li span,
    .wdt-announcement-listing-holder.booknow span,
    .wdt-announcement-listing-holder.booknow a:hover,
    .wdt-announcement-listing-holder.contactus:hover h2,
    .wdt-announcement-listing-holder.contactus:hover p,
    .wdt-claim-form-container .wdt-claim-form .wdt-claim-form-title,
    .wdt-listings-dates-container.type4 [class*="date-container"] span,
    .wdt-listings-countdown-timer-container.type2 .wdt-countdown-wrapper .wdt-countdown-icon-wrapper,
    .wdt-listings-countdown-timer-container.type2 .wdt-listings-countdown-timer-holder .wdt-listings-countdown-timer-holder .wdt-listings-countdown-timer-notice span,
    [class*="wdt-listings-utils-"] .wdt-listings-price-container .wdt-listings-price-item ins,
    .wdt-yelp-places-container .wdt-yelp-places-item .wdt-yelp-places-content .wdt-yelp-places-title,
    .wdt-yelp-places-container .wdt-yelp-places-item .wdt-yelp-places-content .wdt-yelp-places-ratings:before,
    .wdt-yelp-places-container .wdt-yelp-places-item .wdt-yelp-places-content .wdt-yelp-places-distance:before,
    .wdt-yelp-places-container .wdt-yelp-places-item .wdt-yelp-places-content .wdt-yelp-places-address:before,
    div[class*="-output-data-container"] .wdt-ajax-load-image .wdt-loader-inner,
    .wdt-sf-fields-holder input[type="text"]~span:not(.wdt-detect-location),
    .wdt-listings-contactform input~span,
    .wdt-listings-contactform textarea~span,
    .wdt-comment-form-fields-holder p input[type="text"]~span,
    .wdt-comment-form-fields-holder p input[type="email"]~span,
    .wdt-comment-form-fields-holder p textarea~span,
    .wdt-listings-item-wrapper:hover .wdt-listings-item-top-section .wdt-listings-featured-item-container a,
    form.lidd_mc_form .lidd_mc_input input[type="text"]~span:not(#lidd_mc_total_amount-error):before,
    form.lidd_mc_form .lidd_mc_input input[type="text"]~span:not(#lidd_mc_total_amount-error):after,
    .wdt-user-list-item.type3 .wdt-user-sociallinks-list li a,
    .wdt-user-list-item.type3 .wdt-user-contactdetails-list li a,
    .wdt-listings-contactdetails-container.type2 .wdt-listings-contactdetails-list>li a,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-bottom-section-content .wdt-listings-item-bottom-right-content .wdt-listings-utils-item-holder a,
    .wdt-listings-features-box-container.type3 .wdt-listings-features-box-item .wdt-listings-features-box-item-icon,
    .wdt-announcement-listing-holder.announcement,
    [class*="wdt-listings-utils-"] .wdt-listings-taxonomy-container .wdt-listings-taxonomy-list li a:hover span[class*="wdt"],
    .wdt-listings-item-wrapper.type6 .wdt-listings-item-bottom-section .wdt-listings-utils-item-holder a.wdt-listings-utils-favourite-item,
    .wdt-listings-attachment-holder.type1 .wdt-listings-attachment-box-item span,
    #loginform .wdt-login-field-item input~span,
    .wdt-listings-claim-form>.wdt-listings-claim-form-item input~span,
    .wdt-listings-claim-form>.wdt-listings-claim-form-item textarea~span,
    .wdt-listings-comment-list-holder .comment-body .comment-meta .comment-author b.fn,
    .wdt-listings-claim-form>.wdt-listings-claim-form-item input#wdt-claimform-verification-file+label,
    .wdt-listings-social-share-container .wdt-listings-social-share-list li a:hover,
    .wdt-listings-social-share-container .wdt-listings-social-share-list li a:hover,
    .wdt-user-list-item.type3 .wdt-user-item-meta-data .wdt-listings-social-share-container .wdt-listings-social-share-list li a:hover {
      color: #1e306e;
    }

    ul.wdt-dashboard-menus li a span,
    .wdt-dashboard-user-package-details .wdt-dashboard-package-detail span.wdt-dashboard-package-detail-value,
    .wdt-dashboard-user-package-details .wdt-dashboard-package-detail span.wdt-dashboard-package-detail-title,
    .wdt-dashbord-container .wdt-dashbord-section-holder .wdt-dashbord-statistics-counter-label,
    .custom-button-style,
    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-details .wdt-mylisting-options-container>a,
    .wdt-dashbord-section-holder-content ul.wdt-dashbord-reviews-listing-options-wrapper li:hover,
    .wdt-dashbord-section-holder-content ul.wdt-dashbord-reviews-listing-options-wrapper li.wdt-active,
    .wdt-dashboard-container .woocommerce-button.view,
    .wdt-listings-item-wrapper.type1:hover .wdt-listings-item-bottom-section-content .custom-button-style.wdt-listing-view-details:hover,
    .wdt-listings-item-wrapper.type2 .wdt-listings-item-bottom-section-content>div.wdt-listings-item-bottom-pricing-holder .custom-button-style:hover,
    .wdt-dashbord-container .wdt-packages-container .wdt-packages-item-wrapper .wdt-packagelist-details .wdt-item-status-details .wdt-proceed-button a.custom-button-style,
    .wdt-packages-item-wrapper.type1 .wdt-packagelist-view-details-button:hover,
    .wdt-packages-item-wrapper.type1 .wdt-item-status-details .wdt-proceed-button .custom-button-style:hover,
    .wdt-packages-item-wrapper.type1 .wdt-item-status-details .wdt-proceed-button .added_to_cart:hover,
    .wdt-packages-item-wrapper.type2 .wdt-item-status-details .custom-button-style:hover,
    .wdt-packages-item-wrapper.type2 .wdt-item-status-details .added_to_cart:hover,
    .wdt-packages-item-wrapper.type3 .wdt-item-status-details .custom-button-style:hover,
    .wdt-packages-item-wrapper.type3 .wdt-item-status-details .added_to_cart:hover,
    .wdt-packages-item-wrapper.type3 .wdt-packagelist-view-details .custom-button-style:hover,
    .wdt-packages-item-wrapper.type3 .wdt-item-status-details .wdt-purchased:hover,
    .wdt-listings-item-wrapper.type3 .wdt-listings-item-bottom-section a.custom-button-style:hover,
    .wdt-listings-item-wrapper.type4 .wdt-listings-item-bottom-section>div.wdt-listings-item-bottom-pricing-holder .custom-button-style:hover,
    .wdt-sf-orderby-field-holder ul.wdt-sf-orderby-list li a:hover,
    .wdt-sf-orderby-field-holder ul.wdt-sf-orderby-list li a.active,
    .wdt-sf-fields-holder .ui-widget-content .ui-state-default.ui-state-active,
    .wdt-sf-fields-holder.wdt-sf-features-field-holder .ui-widget.ui-widget-content,
    div[class*="-output-data-container"] .wdt-swiper-pagination-holder .wdt-swiper-bullet-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover,
    div[class*="-output-data-container"] .wdt-swiper-pagination-holder .wdt-swiper-bullet-pagination.swiper-pagination-bullets .swiper-pagination-bullet.swiper-pagination-bullet-active,
    .wdt-sf-others-field-holder div.wdt-sf-others-list:hover,
    .wdt-dashbord-ads-addnew-wrapper ul.wdt-addtocart-purhcase-preview-wrapper li:not(.duration):not(.total-amount) span.active,
    .wdt-marker-container,
    .wdt-marker-addition-info.wdt-marker-addition-info-categoryimage .wdt-marker-addition-info-categoryimage-inner,
    table.wdt-my-incharges-table thead tr th,
    .wdt-dashbord-load-buyer-listings-content table thead tr th,
    table.wdt-custom-table>tbody:first-child>tr>th,
    .wdt-dashbord-ads-listing table.wdt-custom-table tbody tr td:last-child a:hover,
    .wdt-listings-item-wrapper .wdt-listings-item-top-section .wdt-listings-featured-item-container a,
    .wdt-listings-item-wrapper .wdt-listings-item-top-section .wdt-listings-item-ad-section,
    .wdt-listings-item-wrapper.type3 .wdt-listings-item-top-section div.wdt-listings-item-ad-section:before,
    .wdt-listings-item-wrapper.type3 .wdt-listings-item-top-section div.wdt-listings-featured-item-container a:before,
    .wdt-listings-item-wrapper.type8 .wdt-listings-item-top-section .wdt-listings-featured-item-container a,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-top-section .wdt-listings-item-ad-section span:before,
    table.wdt-user-claimed-posts-table thead tr th,
    .wdt-dashbord-load-favourite-listings-content table th,
    .wdt-dashbord-inbox-listing-conversation-wrapper ul.wdt-dashbord-inbox-conversation-list li a.wdt-dashbord-inbox-conversation-reply-loader,
    .wdt-dashbord-inbox-listing-conversation-wrapper ul.wdt-dashbord-inbox-conversation-list li .wdt-dashbord-inbox-conversation-reply-wrapper .wdt-inbox-conversation-reply-submit,
    .wdt-dashbord-ads-addnew-wrapper ul.wdt-addtocart-purhcase-preview-wrapper li.duration span,
    .wdt-dashbord-ads-addnew-wrapper ul.wdt-addtocart-purhcase-preview-wrapper li.total-amount span,
    .wdt-listings-contactform a.wdt-contactform-submit-button,
    .wdt-listings-floorplan-top-section .wdt-listings-floorplan-expand-bottom-section,
    .wdt-listings-author-container[class*="swiper-container-"] .wdt-listings-swiper-pagination-holder.type1 .wdt-swiper-bullet-pagination .swiper-pagination-bullet-active,
    .wdt-listings-item-wrapper.type2 .wdt-listings-item-top-section div.wdt-listings-item-ad-section:after,
    .wdt-listings-item-wrapper.type2 .wdt-listings-item-top-section div.wdt-listings-item-ad-section:before,
    .wdt-listings-item-wrapper.type3.wdt-list:hover .wdt-listings-item-top-section div.wdt-listings-item-ad-section:after,
    .wdt-listings-item-wrapper.type3.wdt-list:hover .wdt-listings-item-top-section div.wdt-listings-featured-item-container:after,
    .wdt-listing-taxonomy-item.type7:hover .wdt-listing-taxonomy-starting-price:after,
    .wdt-listings-social-share-container.type2.active .wdt-listings-social-share-item-icon>span,
    .wdt-listings-social-share-container.type2:hover .wdt-listings-social-share-item-icon>span,
    .wdt-listings-item-wrapper.type5 .wdt-listings-item-top-section div.wdt-listings-taxonomy-container ul.wdt-listings-taxonomy-list li>a:before,
    .wdt-sf-pricerange-field-holder .ui-widget.ui-widget-content .ui-widget-header,
    .wdt-comment-form-fields-holder .comment-form-media span:hover input#wdt_media+label,
    .wdt-user-list-item.type3 .wdt-user-item-meta-data .wdt-listings-social-share-container.active .wdt-listings-social-share-item-icon span,
    .wdt-user-list-item.type3 .wdt-user-item-meta-data .wdt-listings-social-share-container .wdt-listings-social-share-item-icon:hover span,
    .wdt-user-list-item.type3 .wdt-user-item-meta-data .wdt-listings-utils-favourite .wdt-listings-utils-favourite-author:hover span,
    .wdt-listings-nearby-places-container .wdt-listings-nearby-places-item .wdt-listings-nearby-places-image .wdt-listings-nearby-places-icon,
    form.lidd_mc_form .lidd_mc_input input[type="submit"],
    .comment-form .wdt-comment-form-fields-holder p.form-submit input[type="submit"],
    .logged-in .wdt-listings-comment-list-holder p.form-submit input[type="submit"],
    #loginform .login-submit input[type="submit"],
    .wdt-listings-features-box-container.type1 .wdt-listings-features-box-item .wdt-listings-features-box-item-title:first-child:before,
    .wdt-announcement-listing-holder.contactus span,
    .wdt-listings-claim-wrapper .wdt-listings-claim-item,
    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-details .wdt-mylisting-options-container>a[data-tooltip]:before,
    .wdt-sf-fields-holder .ui-widget-content .ui-widget-header,
    .wdt-listings-post-dates-container.type2 .wdt-listings-post-date-container span,
    .wdt-listings-attachment-holder.type2 .wdt-listings-attachment-box-item span,
    .wdt-listings-dates-container.type3 [class*="date-container"] span,
    .wdt-listings-utils-container .wdt-listings-utils-item .wdt-listings-date-container:hover>span,
    .wdt-dashbord-ads-listing table.wdt-custom-table tbody tr td:last-child>*,
    .wdt-announcement-listing-holder.announcement h2:after,
    .wdt-announcement-listing-holder.announcement a,
    .wdt-listings-item-wrapper.type8 .wdt-listings-item-bottom-section ul.wdt-listings-taxonomy-list li a {
      background-color: #1e306e;
    }

    .wdt-listings-sociallinks-container.type1 .wdt-listings-sociallinks-list li a,
    .wdt-listings-sociallinks-container.type2 .wdt-listings-sociallinks-list li a,
    .wdt-listings-sociallinks-container.type3 .wdt-listings-sociallinks-list li a,
    .wdt-listings-sociallinks-container.type7 .wdt-listings-sociallinks-list li a,
    .wdt-listings-sociallinks-container.type4 .wdt-listings-sociallinks-list li a:hover,
    .wdt-listings-sociallinks-container.type5 .wdt-listings-sociallinks-list li a:hover,
    .wdt-listings-sociallinks-container.type6 .wdt-listings-sociallinks-list li a:hover,
    .wdt-listings-sociallinks-container.type8 .wdt-listings-sociallinks-list li a:hover,
    .wdt-listings-average-rating-container.type2 .wdt-listings-average-rating-holder,
    .wdt-listings-average-rating-container.type2 .wdt-listings-average-rating-overall,
    .wdt-listings-average-rating-container.type2 .wdt-listings-average-rating-reviews-count,
    .wdt-listings-average-rating-container.type3 .wdt-listings-average-rating-overall,
    .wdt-listings-mls-number-container span,
    .wdt-listings-mls-number-container.type3>span:before,
    .wdt-listings-featured-item-container.type2>span,
    .wdt-listings-featured-item-container.type3>span:before,
    .wdt-listings-price-container.type1 .wdt-listings-price-label-holder ins:before,
    .wdt-listings-price-container.type1 .wdt-listings-price-label-holder del:before,
    .wdt-listings-price-container.type3 .wdt-price-currency-symbol,
    .wdt-listings-price-container.type3 .wdt-listings-price-label-holder .wdt-listings-price-item,
    .wdt-listings-dates-container.type4 .wdt-listings-post-date-container,
    .wdt-listings-dates-container.type5 .wdt-listings-post-date-container a:hover,
    .wdt-listings-contactdetails-request-container.type1>a,
    .wdt-listings-contactdetails-request-container.type2>a:hover,
    .wdt-listings-address-directions,
    .wdt-listings-utils-container .wdt-listings-utils-item .wdt-listings-date-container:hover span:before,
    .wdt-listings-utils-container .wdt-listings-utils-item .wdt-listings-contactdetails-list li:hover span,
    .wdt-listings-utils-container .wdt-listings-utils-item .wdt-listings-utils-favourite-item:hover span,
    .wdt-listings-utils-container .wdt-listings-utils-item .wdt-listings-utils-pageview-item:hover span,
    .wdt-listings-utils-container .wdt-listings-utils-item .wdt-listings-utils-print-item:hover span,
    .wdt-listings-utils-container .wdt-listings-utils-item .wdt-listings-social-share-item-icon:hover span,
    .wdt-listings-utils-container .wdt-listings-utils-item .wdt-listings-social-share-container.active .wdt-listings-social-share-item-icon span,
    .wdt-listings-utils-container .wdt-listings-utils-item .wdt-listings-average-rating-container:hover .wdt-listings-average-rating-overall span,
    .wdt-listings-utils-container .wdt-listings-utils-item .wdt-listings-featured-item-container:hover span:before,
    .wdt-listings-utils-container .wdt-listings-taxonomy-container .wdt-listings-taxonomy-list li:hover a span:before,
    [class*="wdt-listings-utils-"] .wdt-listings-dates-container [class*="-date-container"]:hover span:before,
    .wdt-listings-contactdetails-container.type1 .wdt-listings-contactdetails-list>li:hover span,
    .wdt-announcement-listing-holder.booknow a,
    .wdt-announcement-listing-holder.booknow:hover span,
    .wdt-claim-form-container .wdt-listings-claim-form .wdt-claimform-submit-button,
    .wdt-listings-dates-container.type5 [class*="date-container"],
    .wdt-listings-countdown-timer-container.type1 .wdt-countdown-wrapper .wdt-countdown-icon-wrapper,
    .wdt-listings-countdown-timer-container.type1 .wdt-listings-countdown-timer-holder .wdt-listings-countdown-timer-notice,
    .wdt-listings-attachment-holder.type4 .wdt-listings-attachment-box-item,
    .wdt-listings-attachment-holder.type5 .wdt-listings-attachment-box-item a:hover,
    .wdt-listings-image-gallery-container .wdt-swiper-bullet-pagination.swiper-pagination-bullets .swiper-pagination-bullet.swiper-pagination-bullet-active,
    .swiper-pagination-progressbar .swiper-pagination-progressbar-fill,
    .wdt-swiper-scrollbar .swiper-scrollbar-drag,
    .wdt-listings-image-gallery-container .wdt-listings-swiper-pagination-holder .wdt-swiper-fraction-pagination,
    .wdt-listings-media-videos-container .wdt-swiper-bullet-pagination.swiper-pagination-bullets .swiper-pagination-bullet.swiper-pagination-bullet-active,
    .swiper-pagination-progressbar .swiper-pagination-progressbar-fill,
    .wdt-swiper-scrollbar .swiper-scrollbar-drag,
    .wdt-listings-media-videos-container .wdt-listings-swiper-pagination-holder .wdt-swiper-fraction-pagination,
    .wdt-listings-media-videos-container.swiper-container div[class*="wdt-swiper-arrow-pagination"].type1 a[class*="wdt-swiper-arrow-"]:after,
    .wdt-sf-others-field-holder div.wdt-sf-others-list div.active,
    .ui-datepicker th,
    .single-wdt_packages .wdt-payment-details a.added_to_cart,
    .wdt-sf-fields-holder .ui-state-default,
    .wdt-sf-fields-holder .ui-widget-content .ui-state-default,
    .wdt-listings-taxonomy-container.type3 li a span.wdt-listings-taxonomy-image,
    .wdt-listings-taxonomy-container.type5 .wdt-listings-taxonomy-list li a:before,
    .wdt-listings-post-dates-container.type4 .wdt-listings-post-date-container,
    .wdt-listings-claim-form>.wdt-listings-claim-form-item input#wdt-claimform-verification-file:hover+label {
      background-color: #1e306e;
    }

    .wdt-listings-item-wrapper.type2 .wdt-listings-item-bottom-section-content>div.wdt-listings-item-bottom-pricing-holder .custom-button-style:hover,
    .wdt-listings-item-wrapper.type3 .wdt-listings-item-bottom-section a.custom-button-style:hover,
    .wdt-packages-item-wrapper.type1 .wdt-packagelist-view-details-button:hover,
    .wdt-packages-item-wrapper.type1 .wdt-item-status-details .wdt-proceed-button .custom-button-style:hover,
    .wdt-packages-item-wrapper.type1 .wdt-item-status-details .wdt-proceed-button .added_to_cart:hover,
    .wdt-sf-orderby-field-holder ul.wdt-sf-orderby-list li a:hover,
    .wdt-sf-orderby-field-holder ul.wdt-sf-orderby-list li a.active,
    .wdt-sf-fields-holder .ui-widget-content .ui-state-default.ui-state-active,
    .wdt-sf-others-field-holder div.wdt-sf-others-list div:hover,
    .wdt-sf-others-field-holder div.wdt-sf-others-list div.active,
    .wdt-dashbord-ads-listing table.wdt-custom-table tbody tr td:last-child a:hover,
    .wdt-sf-fields-holder input[type="text"]~span:not(.wdt-detect-location),
    form.lidd_mc_form .lidd_mc_input input[type="text"]~span:not(#lidd_mc_total_amount-error) {
      border-color: #1e306e;
    }

    .wdt-listings-sociallinks-container.type4 .wdt-listings-sociallinks-list li a,
    .wdt-listings-sociallinks-container.type5 .wdt-listings-sociallinks-list li a,
    .wdt-listings-sociallinks-container.type6 .wdt-listings-sociallinks-list li a,
    .wdt-listings-sociallinks-container.type4 .wdt-listings-sociallinks-list li a:hover,
    .wdt-listings-sociallinks-container.type5 .wdt-listings-sociallinks-list li a:hover,
    .wdt-listings-sociallinks-container.type6 .wdt-listings-sociallinks-list li a:hover,
    .wdt-listings-sociallinks-container.type8 .wdt-listings-sociallinks-list li a,
    .wdt-listings-contactdetails-request-container.type2>a,
    .wdt-listings-contactdetails-request-container.type3>a,
    .wdt-announcement-listing-holder.booknow,
    .wdt-announcement-listing-holder.contactus,
    .wdt-announcement-listing-holder.contactus a,
    .wdt-announcement-listing-holder.booknow a,
    .wdt-claim-form-container .wdt-listings-claim-form textarea:focus,
    .wdt-listings-dates-container.type4 [class*="date-container"],
    .wdt-listings-image-gallery-holder .wdt-listings-image-gallery-thumb-container .wdt-listings-image-gallery-thumb .swiper-slide-active:after,
    .wdt-listings-media-videos-holder .wdt-listings-media-videos-thumb-container .wdt-listings-media-videos-thumb .swiper-slide-active:after,
    .wdt-listings-media-videos-container.swiper-container div[class*="wdt-swiper-arrow-pagination"].type1 a[class*="wdt-swiper-arrow-"]:last-child:before,
    .wdt-listings-media-videos-container.swiper-container div[class*="wdt-swiper-arrow-pagination"].type1 a[class*="wdt-swiper-arrow-"]:first-child:before {
      border-color: #1e306e;
    }

    .wdt-packages-item-wrapper.type2 .wdt-item-status-details .custom-button-style,
    .wdt-packages-item-wrapper.type2 .wdt-item-status-details .added_to_cart,
    .wdt-packages-item-wrapper.type3 .wdt-item-status-details .custom-button-style,
    .wdt-packages-item-wrapper.type3 .wdt-item-status-details .added_to_cart,
    .wdt-packages-item-wrapper.type3 .wdt-packagelist-view-details .custom-button-style,
    .wdt-packages-item-wrapper.type3 .wdt-item-status-details .wdt-purchased,
    .wdt-listings-item-wrapper.type3:not(.wdt-list) .wdt-listings-item-top-section div.wdt-listings-item-ad-section:before {
      box-shadow: inset 0 0 0 2px #1e306e;
    }

    input[type="submit"],
    button,
    input[type="button"],
    input[type="reset"] {
      background-color: #1e306e;
    }

    input[type="text"]:focus,
    input[type="text"]:active,
    input[type="password"]:focus,
    input[type="password"]:active,
    input[type="email"]:focus,
    input[type="email"]:active,
    input[type="url"]:focus,
    input[type="url"]:active,
    input[type="tel"]:focus,
    input[type="tel"]:active,
    input[type="number"]:focus,
    input[type="number"]:active,
    input[type="range"]:focus,
    input[type="range"]:active,
    input[type="date"]:focus,
    input[type="date"]:active,
    textarea:focus,
    textarea:active,
    input.text:focus,
    input.text:active,
    input[type="search"]:focus,
    input[type="search"]:active {
      border-color: #1e306e;
    }

    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-dashboard-status:after,
    .wdt-dashbord-container .wdt-packages-container .wdt-packages-item-wrapper .wdt-packagelist-details .wdt-item-status-details .wdt-purchased:after,
    .wdt-dashbord-container .wdt-packages-container .wdt-packages-item-wrapper .wdt-packagelist-details .wdt-item-status-details .wdt-active:after,
    .wdt-listings-item-wrapper:hover .wdt-listings-item-bottom-section-content>div .wdt-listings-price-container .wdt-listings-price-label-holder ins,
    ul.wdt-dashboard-menus li a:hover,
    ul.wdt-dashboard-menus li a.wdt-active,
    .wdt-packages-item-wrapper .wdt-item-status-details .wdt-purchased:after,
    .wdt-listings-item-wrapper.type3 .wdt-listings-item-bottom-section-content>div .wdt-listings-price-container .wdt-listings-price-label-holder ins,
    .wdt-listings-item-wrapper.type5 .wdt-listings-item-bottom-section a.custom-button-style:hover,
    .wdt-custom-login li a:hover,
    .wdt-listing-taxonomy-item .wdt-listing-taxonomy-meta-data h3 a:hover,
    .wdt-listings-comment-list-holder .commentlist li.comment .comment-body .reply a.comment-reply-link:hover,
    .wdt-packages-item-wrapper .wdt-packagelist-details>h5 a:hover,
    .wdt-listings-item-wrapper .wdt-listings-item-bottom-section-content .wdt-listings-item-title a:hover,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-bottom-section .wdt-listings-item-title a:hover,
    .wdt-user-list-item .wdt-user-item-meta-data h4 a:hover,
    .wdt-user-list-item.type2 .wdt-user-contactdetails-list li a:hover,
    .wdt-user-list-item.type3 .wdt-user-sociallinks-list li a:hover,
    .wdt-user-list-item.type3 .wdt-user-contactdetails-list li a:hover,
    .wdt-listings-item-wrapper.type3 .wdt-listings-taxonomy-container li a:hover,
    .wdt-listings-taxonomy-container.type3 li a:hover,
    .wdt-listings-contactdetails-container.type2 .wdt-listings-contactdetails-list>li a:hover,
    p.tpl-forget-pwd a:hover,
    .wdt-listings-item-wrapper.type5 .wdt-listings-item-bottom-section-content>div .wdt-listings-utils-item-holder a:hover,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-bottom-section-content .wdt-listings-item-bottom-right-content .wdt-listings-utils-item-holder a:hover,
    .wdt-listings-item-wrapper.type1.has-post-thumbnail .wdt-listings-item-top-section .wdt-listings-item-top-section-content .wdt-listings-utils-item-holder>div a:hover,
    .wdt-dashbord-recent-activites-holder .wdt-dashbord-recent-activites-content p a:hover,
    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-details h5 a:hover,
    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-dashboard-owner a:hover,
    .wdt-listings-item-wrapper.type5 .wdt-listings-item-bottom-section-content>div .wdt-listings-utils-item-holder [class*="wdt-listings-utils-"] a.wdt-listings-utils-favourite-item span:hover,
    .wdt-listings-item-wrapper.type1:not(.has-post-thumbnail) .wdt-listings-item-top-section .wdt-listings-item-top-section-content .wdt-listings-utils-item-holder .wdt-listings-utils-item:first-child>* span:hover,
    .wdt-listings-item-wrapper.type1:not(.has-post-thumbnail) .wdt-listings-item-top-section .wdt-listings-item-top-section-content .wdt-listings-utils-item-holder>div a:hover,
    .wdt-listings-item-wrapper.type1.has-post-thumbnail .wdt-listings-item-top-section .wdt-listings-item-top-section-content>div.wdt-listings-utils-item-holder .wdt-listings-utils-item>*>span:hover,
    div[class*="-apply-isotope"] div[class*="-isotope-filter"] a.active-sort,
    div[class*="-apply-isotope"] div[class*="-isotope-filter"] a:hover,
    .comment-form .wdt-comment-form-fields-holder>p.comment-form-cookies-consent input[type="checkbox"]:checked~label:before {
      color: #2fa5fb;
    }

    ul.wdt-dashboard-menus li a:hover span,
    ul.wdt-dashboard-menus li a.wdt-active span,
    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-dashboard-status,
    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-details .wdt-mylisting-options-container>a:hover,
    .custom-button-style:hover,
    .wdt-dashbord-container .wdt-packages-container .wdt-packages-item-wrapper .wdt-packagelist-details .wdt-item-status-details .wdt-purchased,
    .wdt-dashbord-container .wdt-packages-container .wdt-packages-item-wrapper .wdt-packagelist-details .wdt-item-status-details .wdt-active,
    .wdt-dashboard-container .woocommerce-button.view:hover,
    .wdt-dashbord-container .wdt-packages-container .wdt-packages-item-wrapper .wdt-packagelist-details .wdt-item-status-details .wdt-proceed-button a.custom-button-style:hover,
    .wdt-packages-item-wrapper .wdt-item-status-details .wdt-purchased,
    .wdt-listings-item-wrapper .wdt-listings-features-box-item>div.wdt-listings-features-box-item-title:first-child:before,
    .wdt-listings-item-wrapper.type6:hover .wdt-listings-item-bottom-section .wdt-listings-utils-item-holder a.wdt-listings-utils-favourite-item,
    .wdt-user-list-item.type1 .wdt-user-sociallinks-list li a:hover,
    div[class*="-output-data-container"] .wdt-swiper-pagination-holder .wdt-swiper-bullet-pagination.swiper-pagination-bullets .swiper-pagination-bullet,
    .wdt-dashbord-inbox-listing-conversation-wrapper ul.wdt-dashbord-inbox-conversation-list li a.wdt-dashbord-inbox-conversation-reply-loader:hover,
    .wdt-dashbord-inbox-listing-conversation-wrapper ul.wdt-dashbord-inbox-conversation-list li .wdt-dashbord-inbox-conversation-reply-wrapper .wdt-inbox-conversation-reply-submit:hover,
    .wdt-listings-contactform a.wdt-contactform-submit-button:hover,
    .wdt-listings-floorplan-top-section .wdt-listings-floorplan-expand-bottom-section:hover,
    .wdt-announcement-listing-holder a:hover,
    .single-wdt_packages .wdt-payment-details a.added_to_cart:hover,
    form.lidd_mc_form .lidd_mc_input input[type="submit"]:hover,
    .comment-form .wdt-comment-form-fields-holder p.form-submit input[type="submit"]:hover,
    .logged-in .wdt-listings-comment-list-holder p.form-submit input[type="submit"]:hover,
    #loginform .login-submit input[type="submit"]:hover,
    .wdt-listings-contactdetails-request-container.type2>a:hover,
    .wdt-listings-claim-wrapper .wdt-listings-claim-item:hover,
    .wdt-listings-post-dates-container.type2 .wdt-listings-post-date-container:hover span,
    .wdt-dashbord-ads-listing table.wdt-custom-table tbody tr td:last-child>a:hover,
    .wdt-claim-form-container .wdt-listings-claim-form .wdt-claimform-submit-button:hover,
    .dismissButton:hover:hover,
    .wdt-announcement-listing-holder.announcement a:hover,
    .wdt-listings-item-wrapper.type4:hover .wdt-listings-item-top-section .wdt-listings-featured-item-container a:hover {
      background-color: #2fa5fb;
    }

    .wdt-listings-sociallinks-container.type1 .wdt-listings-sociallinks-list li a:hover,
    .wdt-listings-sociallinks-container.type2 .wdt-listings-sociallinks-list li a:hover,
    .wdt-listings-sociallinks-container.type3 .wdt-listings-sociallinks-list li a:hover,
    .wdt-listings-sociallinks-container.type7 .wdt-listings-sociallinks-list li a:hover,
    .wdt-listings-average-rating-container.type3,
    .wdt-listings-mls-number-container.type3>span,
    .wdt-listings-featured-item-container.type3>span,
    .wdt-listings-price-container.type2 .wdt-listings-price-label-holder .wdt-listings-price-item,
    .wdt-listings-dates-container.type4 .wdt-listings-post-date-container:hover,
    .wdt-listings-contactdetails-request-container>a:hover,
    .wdt-listings-contactdetails-request-container.type3>a:hover,
    .wdt-listings-address-directions:hover,
    .wdt-listings-contactdetails-container.type2 .wdt-listings-contactdetails-list>li:hover span,
    .wdt-claim-form-container .wdt-listings-claim-form .wdt-claimform-submit-button:hover,
    .wdt-listings-dates-container.type3 [class*="date-container"]:hover span,
    .wdt-listings-dates-container.type4 [class*="date-container"]:hover,
    .wdt-listings-dates-container.type5 [class*="date-container"]:hover,
    .wdt-listings-attachment-holder.type2 .wdt-listings-attachment-box-item:hover span,
    .wdt-listings-attachment-holder.type3 .wdt-listings-attachment-box-item:hover,
    .wdt-listings-attachment-holder.type4 .wdt-listings-attachment-box-item:hover,
    .wdt-listings-image-gallery-container .wdt-swiper-bullet-pagination.swiper-pagination-bullets .swiper-pagination-bullet,
    .wdt-listings-media-videos-container .wdt-swiper-bullet-pagination.swiper-pagination-bullets .swiper-pagination-bullet,
    .wdt-listings-item-wrapper.type4 .wdt-listings-item-top-section .wdt-listings-item-top-section-content>div.wdt-listings-utils-item-holder .wdt-listings-utils-item>*:hover,
    .wdt-listings-item-wrapper.type4 .wdt-listings-item-top-section .wdt-listings-item-top-section-content>div:not(.wdt-listings-taxonomy-container) a.wdt-listings-utils-favourite-item:hover span,
    .wdt-listings-item-wrapper.type6:not(.has-post-thumbnail):hover .wdt-listings-item-top-section div.wdt-listings-item-ad-section,
    .wdt-listings-item-wrapper.type6:not(.has-post-thumbnail):hover .wdt-listings-item-top-section div.wdt-listings-featured-item-container a {
      background-color: #2fa5fb;
    }

    .wdt-listings-author-container[class*="swiper-container-"] .wdt-listings-author-details-holder:hover,
    .wdt-announcement-listing-holder.contactus a:hover,
    .wdt-listings-contactdetails-request-container.type2>a:hover,
    .wdt-listings-contactdetails-request-container.type3>a:hover,
    .wdt-listings-attachment-holder.type3 .wdt-listings-attachment-box-item:hover,
    .wdt-listings-dates-container.type4 [class*="date-container"]:hover,
    .dismissButton:hover:hover,
    .wdt-listings-features-box-container:not(.listing).type7 .wdt-listings-features-box-item,
    .wdt-listings-post-dates-container.type3 .wdt-listings-post-date-container,
    .wdt-listings-attachment-holder.type3 .wdt-listings-attachment-box-item {
      border-color: #2fa5fb;
    }

    .wdt-listings-item-wrapper.type3:not(.wdt-list):hover .wdt-listings-item-top-section div.wdt-listings-featured-item-container a {
      box-shadow: inset 0 0 0 0px #2fa5fb;
    }

    input[type="submit"]:hover,
    button:hover,
    input[type="button"]:hover,
    input[type="reset"]:hover {
      background-color: #2fa5fb;
    }

    .wdt-packages-item-wrapper.type2 .wdt-packagelist-view-details .custom-button-style,
    .wdt-listings-item-wrapper.type6:not(.has-post-thumbnail) .wdt-listings-item-bottom-section .wdt-listings-utils-item-holder,
    .wdt-listings-item-wrapper.type2 .wdt-listings-item-top-section .wdt-listings-featured-item-container a:before,
    .wdt-listings-item-wrapper.type5:hover .wdt-listings-item-top-section .wdt-listings-featured-item-container:before,
    .single-wdt_packages .wdt_packages>img,
    .wdt-listings-item-wrapper.type1 .wdt-listings-item-top-section .wdt-listings-item-top-section-content .wdt-listings-utils-item-holder>div a:hover,
    .wdt-listings-item-wrapper.type5:hover .wdt-listings-item-top-section .wdt-listings-featured-item-container a:before,
    p.login-remember input[type="checkbox"]~label:before,
    .wdt-listings-item-wrapper.type6 .wdt-listings-item-bottom-section .wdt-listings-taxonomy-list li a span {
      color: #d2edf8;
    }

    .wdt-packages-item-wrapper h5:before,
    .wdt-listings-item-wrapper.type1:hover .wdt-listings-item-bottom-section-content .custom-button-style.wdt-listing-view-details,
    .wdt-listings-item-wrapper.type4 .wdt-listings-item-bottom-section>div.wdt-listings-item-bottom-pricing-holder .custom-button-style,
    .wdt-listings-item-wrapper.type4 .wdt-listings-item-top-section .wdt-listings-item-top-section-content>div a,
    .wdt-listings-item-wrapper.type4 .wdt-listings-item-top-section .wdt-listings-item-top-section-content>div.wdt-listings-utils-item-holder .wdt-listings-utils-item>*,
    .wdt-listings-item-wrapper.type6:not(.has-post-thumbnail):hover .wdt-listings-item-bottom-section .wdt-listings-utils-item-holder a.wdt-listings-utils-favourite-item,
    .wdt-sf-pricerange-field-holder>div>div[class*="-handle"],
    .wdt-sf-features-field-holder>div>div[class*="-handle"],
    .wdt-sf-features-field-holder .ui-widget.ui-widget-content .ui-widget-header,
    .wdt-swiper-arrow-pagination a:hover,
    .wdt-marker-addition-info.wdt-marker-addition-info-totalviews,
    .wdt-marker-addition-info.wdt-marker-addition-info-averageratings,
    .wdt-marker-addition-info.wdt-marker-addition-info-startdate,
    .wdt-marker-addition-info.wdt-marker-addition-info-distance,
    .wdt-listing-taxonomy-item.type7 .wdt-listing-taxonomy-starting-price:after,
    .wdt-listings-item-wrapper:hover .wdt-listings-item-top-section .wdt-listings-item-ad-section,
    .wdt-listings-item-wrapper:hover .wdt-listings-item-top-section .wdt-listings-featured-item-container a,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-top-section .wdt-listings-item-ad-section,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-top-section .wdt-listings-featured-item-container,
    .wdt-listings-item-wrapper.type3 .wdt-listings-item-top-section div.wdt-listings-item-ad-section:after,
    .wdt-listings-item-wrapper.type3 .wdt-listings-item-top-section div.wdt-listings-featured-item-container a:after,
    .wdt-listings-item-wrapper.type3:hover .wdt-listings-item-top-section div.wdt-listings-item-ad-section:before,
    .wdt-listings-item-wrapper.type3:hover .wdt-listings-item-top-section div.wdt-listings-featured-item-container a:before,
    .wdt-listings-floorplan-top-section,
    .wdt-listings-contactdetails-request-container.type3>a,
    .wdt-listings-contactdetails-container.type2 .wdt-listings-contactdetails-list>li span,
    .wdt-announcement-listing-holder.contactus:hover,
    .wdt-listings-dates-container.type4 [class*="date-container"],
    .wdt-listings-countdown-timer-container.type2 .wdt-listings-countdown-timer-holder .wdt-listings-countdown-timer-notice span,
    .wdt-listings-attachment-holder.type2 .wdt-listings-attachment-box-item:hover span,
    .wdt-listings-image-gallery-container .wdt-listings-swiper-pagination-holder .wdt-swiper-progress-pagination,
    .wdt-listings-image-gallery-container .wdt-listings-swiper-pagination-holder .wdt-swiper-scrollbar,
    .wdt-listings-media-videos-container .wdt-listings-swiper-pagination-holder .wdt-swiper-progress-pagination,
    .wdt-listings-media-videos-container .wdt-listings-swiper-pagination-holder .wdt-swiper-scrollbar,
    .wdt-packages-item-wrapper:before,
    .single-wdt_packages .wdt-packagelist-items h3:before,
    .single-wdt_packages .wdt-payment-details .wdt-item-status-details>span,
    .wdt-listings-item-wrapper.type2:hover .wdt-listings-item-top-section div.wdt-listings-item-ad-section:after,
    .wdt-listings-item-wrapper.type2:hover .wdt-listings-item-top-section div.wdt-listings-item-ad-section:before,
    .wdt-sf-fields-holder.wdt-sf-pricerange-field-holder .ui-widget.ui-widget-content,
    .wdt-listing-taxonomy-item.type6 .wdt-category-total-items a:hover,
    .wdt-comment-form-fields-holder input#wdt_media+label,
    .wdt-user-list-item.type3 .wdt-user-contactdetails-list li:hover span,
    .wdt-user-list-item.type3 .wdt-user-item-meta-data .wdt-listings-social-share-container.active .wdt-listings-social-share-list,
    .wdt-listings-features-box-container.type5 .wdt-listings-features-box-item,
    .wdt-announcement-listing-holder,
    .wdt-listings-item-wrapper.type4 .wdt-listings-item-top-section .wdt-listings-item-top-section-content>div:not(.wdt-listings-taxonomy-container) a.wdt-listings-utils-favourite-item span,
    .wdt-listings-item-wrapper.type6 .wdt-listings-item-bottom-section .wdt-listings-utils-item-holder a.wdt-listings-utils-favourite-item span:hover,
    .wdt-sf-fields-holder .ui-widget.ui-widget-content,
    .wdt-dashbord-section-holder-content ul.wdt-dashbord-inbox-listing-messages-wrapper li.active,
    .wdt-dashbord-section-holder-content ul.wdt-dashbord-inbox-listing-messages-wrapper li:hover,
    .wdt-listings-business-hours-container .wdt-listings-business-hours-currenttime,
    .wdt-listings-claim-form>.wdt-listings-claim-form-item input#wdt-claimform-verification-file+label {
      background-color: #d2edf8;
    }

    .wdt-listings-item-wrapper,
    .wdt-listings-item-wrapper.type1 .wdt-listings-item-bottom-section-content>div.wdt-listings-item-bottom-right-content,
    .wdt-packages-item-wrapper,
    .wdt-listings-item-wrapper.type4 .wdt-listings-item-bottom-section .wdt-listings-item-bottom-section-content .wdt-listings-item-title,
    .wdt-packages-item-wrapper.type1 .wdt-packagelist-view-details-button,
    .wdt-packages-item-wrapper.type1 .wdt-item-status-details .wdt-proceed-button .custom-button-style,
    .wdt-packages-item-wrapper.type2>ul.wdt-packagelist-features,
    .wdt-packages-item-wrapper.type3 .wdt-packagelist-details,
    .wdt-packages-item-wrapper.type1 .wdt-item-status-details .wdt-proceed-button .added_to_cart,
    .wdt-listings-item-wrapper.type4 .wdt-listings-features-box-container>div:not(:last-child),
    .wdt-listings-item-wrapper.type5 .wdt-listings-item-bottom-section-content>div .wdt-listings-utils-item .wdt-listings-utils-totalimages-item a,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-bottom-section-content .wdt-listings-item-bottom-right-content .wdt-listings-utils-item-holder .wdt-listings-utils-item .wdt-listings-utils-totalimages-item a,
    .wdt-listing-taxonomy-item.type4,
    .wdt-user-list-item.type3,
    .wdt-user-list-item.type3 .wdt-user-contactdetails-list li span,
    .wdt-swiper-arrow-pagination a,
    .wdt-marker-info-box .wdt-listings-map-item-wrapper.type3 .wdt-listings-item-bottom-section .wdt-listings-item-title,
    .wdt-listing-taxonomy-item.type4 .wdt-listing-taxonomy-starting-price,
    .wdt-listings-item-wrapper.type7 .wdt-listings-item-bottom-section-content .wdt-listings-item-bottom-left-content .wdt-listings-post-dates-container,
    .wdt-dashbord-recent-activites-holder .wdt-dashbord-recent-activites-content p,
    .wdt-listings-comment-list-holder .comment-body,
    .comment-form .wdt-comment-form-fields-holder .wdt-ratings-holder,
    .wdt-marker-info-box .wdt-listings-map-item-wrapper.type3 .wdt-listings-item-bottom-section .wdt-listings-item-title,
    .wdt-listings-floorplan-box-container .wdt-listings-floorplan-box-item,
    .wdt-listings-business-hours-container,
    .wdt-listings-business-hours-container .wdt-listings-business-hours-status,
    .wdt-listings-business-hours-container .wdt-listings-business-hours-list li,
    .wdt-listings-dates-container.type1,
    .wdt-listings-dates-container.type1>div:not(:last-child),
    .wdt-listings-dates-container.type1 .wdt-listings-business-hours-list,
    .wdt-listings-dates-container.type1 .wdt-listings-business-hours-list li,
    .wdt-listings-image-gallery-thumb-container .wdt-listings-image-gallery-thumb .swiper-slide:hover:after,
    .wdt-listings-media-videos-thumb-container .wdt-listings-media-videos-thumb .swiper-slide:hover:after,
    .single-wdt_packages .wdt-payment-details .wdt-item-status-details,
    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-item-wrapper,
    .wdt-sf-fields-holder .ui-widget-content .ui-state-default.ui-state-hover,
    .wdt-listing-taxonomy-item.type6 .wdt-category-total-items a:hover,
    .wdt-user-list-item.type3 .wdt-user-item-meta-data .wdt-listings-utils-favourite,
    .wdt-listings-features-box-container.type4 .wdt-listings-features-box-item:not(:last-child),
    .wdt-listings-features-box-container.type7 .wdt-listings-features-box-item,
    .wdt-listings-countdown-timer-container.type2 .wdt-listings-countdown-timer-holder .wdt-listings-countdown-timer-notice,
    .wdt-announcement-listing-holder.contactus,
    .wdt-announcement-listing-holder.contactus:hover,
    .wdt-dashbord-section-holder-content ul.wdt-dashbord-inbox-listing-messages-wrapper li.active,
    .wdt-dashbord-section-holder-content ul.wdt-dashbord-inbox-listing-messages-wrapper li:hover {
      border-color: #d2edf8;
    }

    .wdt-listings-nearby-places-container .wdt-listings-nearby-places-item:not(:last-child),
    .wdt-listings-author-container .wdt-listings-author-details-holder,
    .wdt-packages-item-wrapper.type2 .wdt-packagelist-details,
    #primary.page-with-sidebar .wdt-packages-item-wrapper.type2 .wdt-packagelist-details {
      border-color: #d2edf8;
    }

    .wdt-listings-item-wrapper.type1 .wdt-listings-item-bottom-section-content .custom-button-style.wdt-listing-view-details,
    .wdt-listings-item-wrapper.type2 .wdt-listings-item-bottom-section-content>div.wdt-listings-item-bottom-pricing-holder {
      border-top-color: #d2edf8;
    }

    .wdt-packages-item-wrapper:hover,
    .wdt-packages-item-wrapper.type1:hover .wdt-packagelist-view-details-button,
    .wdt-packages-item-wrapper.type1:hover .wdt-item-status-details .wdt-proceed-button .custom-button-style,
    .wdt-user-list-item.type1:hover,
    .wdt-listings-taxonomy-container.type7 li a:hover,
    .wdt-listings-author-container .wdt-listings-author-details-holder:hover {
      box-shadow: 0 15px 30px 0 #d2edf8;
    }

    .swiper-wrapper .wdt-listings-item-wrapper:hover {
      box-shadow: 0 10px 20px 0 #d2edf8;
    }

    .comment-form .wdt-comment-form-fields-holder,
    .wdt-listings-contactform,
    .logged-in .wdt-listings-comment-list-holder .comment-form,
    .wdt-listings-nearby-places-container .wdt-listings-nearby-places-item .wdt-listings-nearby-places-image,
    .wdt-yelp-places-container .wdt-yelp-places-item .wdt-yelp-places-image,
    .wdt-listings-taxonomy-container.type7 li a:hover {
      box-shadow: 0 0 30px 0 #d2edf8;
    }

    .wdt-packages-item-container.swiper-wrapper .wdt-packages-item-wrapper:hover,
    .wdt-packages-item-container.swiper-wrapper .wdt-packages-item-wrapper.type1:hover .wdt-item-status-details .wdt-proceed-button .custom-button-style,
    .wdt-packages-item-container.swiper-wrapper .wdt-packages-item-wrapper.type1:hover .wdt-packagelist-view-details-button {
      box-shadow: 0 0 20px 0 #d2edf8;
    }

    .wdt-user-list-item.type3 .wdt-user-contactdetails-list li span,
    .wdt-listings-author-container .wdt-listings-author-details-holder .wdt-listings-author-details .wdt-listings-contactdetails-list li span {
      box-shadow: inset 0 0 0 2px #d2edf8;
    }

    .wdt-listings-media-videos-container.swiper-container div[class*="wdt-swiper-arrow-pagination"].type2>a[class*="wdt-swiper-arrow"] {
      background-color: rgba(30, 48, 110, 0.5);
    }

    .wdt-listings-media-videos-container.swiper-container div[class*="wdt-swiper-arrow-pagination"].type2>a[class*="wdt-swiper-arrow"]:hover,
    .wdt-listings-image-gallery-container.swiper-container div[class*="wdt-swiper-arrow-pagination"].type2>a[class*="wdt-swiper-arrow"]:hover {
      background-color: rgba(30, 48, 110, 0.6);
    }

    .wdt-listings-image-gallery-container.swiper-container div[class*="wdt-swiper-arrow-pagination"].type2>a[class*="wdt-swiper-arrow"] {
      background-color: rgba(30, 48, 110, 0.15);
    }

    .wdt-listings-item-wrapper.type6.has-post-thumbnail .wdt-listings-item-top-section .wdt-listings-feature-image-holder:before,
    .wdt-listings-item-wrapper.type6.has-post-thumbnail .wdt-listings-item-top-section .wdt-listings-image-gallery .swiper-slide:before {
      background-color: rgba(30, 48, 110, 0.8);
    }

    .lidd_mc_details .lidd_mc_summary p:not(:last-child),
    .lidd_mc_details .lidd_mc_results p,
    .wdt-listing-taxonomy-item.type4:hover,
    .wdt-listing-taxonomy-item.type4:hover .wdt-listing-taxonomy-starting-price,
    .wdt-user-list-item.type2 .wdt-user-image img,
    .wdt-dashbord-section-holder-content ul.wdt-dashbord-inbox-listing-messages-wrapper li:hover span,
    .wdt-dashbord-section-holder-content ul.wdt-dashbord-inbox-listing-messages-wrapper li.active span {
      border-color: rgba(47, 165, 251, 0.2);
    }

    .wdt-listings-features-box-container:not(.listing).type7 .wdt-listings-features-box-item,
    .wdt-listings-post-dates-container.type3 .wdt-listings-post-date-container,
    .wdt-listings-attachment-holder.type3 .wdt-listings-attachment-box-item {
      background-color: rgba(47, 165, 251, 0.3);
    }

    .wdt-dashbord-container .wdt-packages-container .wdt-packages-item-wrapper:hover,
    .wdt-dashbord-container .wdt-my-listings-container .wdt-listing-item-wrapper:hover {
      background-color: rgba(210, 237, 248, 0.135);
    }

    .lidd_mc_details,
    .wdt-listing-taxonomy-item.type4:hover,
    .wdt-listings-nearby-places-container:hover .wdt-listings-nearby-places-item .wdt-listings-nearby-places-image {
      background-color: rgba(210, 237, 248, 0.5);
    }
  </style>
  <link rel="stylesheet" id="b549b30414ed46447538ef1d3a028552-css"
    href="../css?family=Red+Hat+Display:300,400,500,600,700,800,900,300italic,italic,500italic,600italic,700italic,800italic,900italic&#038;subset=latin-ext"
    type="text/css" media="all" />
  <link rel="stylesheet" id="9cf5893edf1d7e4d60526d4dd68092d4-css"
    href="../css-1?family=DM+Sans:100,200,300,400,500,600,700,800,900&#038;subset=latin-ext" type="text/css"
    media="all" />
  <link rel="stylesheet" id="3313e79ffe037d389688456f7efde7a0-css"
    href="../css-2?family=Manrope:200,300,400,500,600,700,800&#038;subset=latin-ext" type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-lms-css" href="wp-content/themes/lizza-lms/style.css?ver=1.0.7" type="text/css"
    media="all" />
  <style id="lizza-lms-inline-css" type="text/css">
    :root {
      --wdtPrimaryColor: #14452f;
      --wdtPrimaryColorRgb: 20, 69, 47;
      --wdtSecondaryColor: #7cff77;
      --wdtSecondaryColorRgb: 124, 255, 119;
      --wdtTertiaryColor: #f2f8f1;
      --wdtTertiaryColorRgb: 242, 248, 241;
      --wdtBodyBGColor: #ffffff;
      --wdtBodyBGColorRgb: 255, 255, 255;
      --wdtBodyTxtColor: #394630;
      --wdtBodyTxtColorRgb: 57, 70, 48;
      --wdtHeadAltColor: #22281e;
      --wdtHeadAltColorRgb: 34, 40, 30;
      --wdtLinkColor: #22281e;
      --wdtLinkColorRgb: 34, 40, 30;
      --wdtLinkHoverColor: #14452f;
      --wdtLinkHoverColorRgb: 20, 69, 47;
      --wdtBorderColor: #e7e7e7;
      --wdtBorderColorRgb: 231, 231, 231;
      --wdtAccentTxtColor: #ffffff;
      --wdtAccentTxtColorRgb: 255, 255, 255;
      --wdtFontTypo_Base: "Manrope", sans-serif;
      --wdtFontWeight_Base: 400;
      --wdtFontSize_Base: 16px;
      --wdtLineHeight_Base: 1.7;
      --wdtFontTypo_Alt: "DM Sans", sans-serif;
      --wdtFontWeight_Alt: 700;
      --wdtFontSize_Alt: 68px;
      --wdtLineHeight_Alt: 1.2;
      --wdtFontTypo_H1: "DM Sans", sans-serif;
      --wdtFontWeight_H1: 700;
      --wdtFontSize_H1: 68px;
      --wdtLineHeight_H1: 1.2;
      --wdtFontTypo_H2: "DM Sans", sans-serif;
      --wdtFontWeight_H2: 700;
      --wdtFontSize_H2: 55px;
      --wdtLineHeight_H2: 1.2;
      --wdtFontTypo_H3: "DM Sans", sans-serif;
      --wdtFontWeight_H3: 700;
      --wdtFontSize_H3: 40px;
      --wdtLineHeight_H3: 1.2;
      --wdtFontTypo_H4: "DM Sans", sans-serif;
      --wdtFontWeight_H4: 700;
      --wdtFontSize_H4: 30px;
      --wdtLineHeight_H4: 1.2;
      --wdtFontTypo_H5: "DM Sans", sans-serif;
      --wdtFontWeight_H5: 700;
      --wdtFontSize_H5: 24px;
      --wdtLineHeight_H5: 1.2;
      --wdtFontTypo_H6: "DM Sans", sans-serif;
      --wdtFontWeight_H6: 700;
      --wdtFontSize_H6: 20px;
      --wdtLineHeight_H6: 1.2;
      --wdtFontTypo_Ext: "DM Sans", sans-serif;
      --wdtFontWeight_Ext: 500;
      --wdtFontSize_Ext: 14px;
      --wdtLineHeight_Ext: 1.15;
    }
  </style>
  <link rel="stylesheet" id="lizza-icons-css" href="wp-content/themes/lizza-lms/assets/css/icons.css?ver=1.0.7"
    type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-base-css" href="wp-content/themes/lizza-lms/assets/css/base.css?ver=1.0.7"
    type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-grid-css" href="wp-content/themes/lizza-lms/assets/css/grid.css?ver=1.0.7"
    type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-layout-css" href="wp-content/themes/lizza-lms/assets/css/layout.css?ver=1.0.7"
    type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-widget-css" href="wp-content/themes/lizza-lms/assets/css/widget.css?ver=1.0.7"
    type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-additional-css-css"
    href="wp-content/themes/lizza-lms/assets/css/additional-css.css?ver=1.0.7" type="text/css" media="all" />
  <link rel="stylesheet" id="site-breadcrumb-css"
    href="wp-content/plugins/lizza-lms-plus/modules/breadcrumb/assets/css/breadcrumb.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="site-header-css"
    href="wp-content/plugins/lizza-lms-plus/modules/header/assets/css/header.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="site-loader-css"
    href="wp-content/plugins/lizza-lms-plus/modules/site-loader/layouts/loader-1/assets/css/loader-1.css?ver=1.0.2"
    type="text/css" media="all" />
  <link rel="stylesheet" id="site-sidebar-css"
    href="wp-content/plugins/lizza-lms-pro/modules/sidebar/assets/css/sidebar.css?ver=1.0.0" type="text/css"
    media="all" />
  <link rel="stylesheet" id="wdt-blog-css" href="wp-content/themes/lizza-lms/modules/blog/assets/css/blog.css?ver=1.0.7"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-blog-archive-simple-css"
    href="wp-content/themes/lizza-lms/modules/blog/templates/simple/assets/css/blog-archive-simple.css?ver=1.0.7"
    type="text/css" media="all" />
  <link rel="stylesheet" id="jquery-bxslider-css"
    href="wp-content/themes/lizza-lms/modules/blog/assets/css/jquery.bxslider.css?ver=1.0.7" type="text/css"
    media="all" />
  <link rel="stylesheet" id="lizza-breadcrumb-css"
    href="wp-content/themes/lizza-lms/modules/breadcrumb/assets/css/breadcrumb.css?ver=1.0.7" type="text/css"
    media="all" />
  <link rel="stylesheet" id="lizza-comments-css"
    href="wp-content/themes/lizza-lms/modules/comments/assets/css/comments.css?ver=1.0.7" type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-footer-css"
    href="wp-content/themes/lizza-lms/modules/footer/assets/css/footer.css?ver=1.0.7" type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-header-css"
    href="wp-content/themes/lizza-lms/modules/header/assets/css/header.css?ver=1.0.7" type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-pagination-css"
    href="wp-content/themes/lizza-lms/modules/pagination/assets/css/pagination.css?ver=1.0.7" type="text/css"
    media="all" />
  <link rel="stylesheet" id="lizza-magnific-popup-css"
    href="wp-content/themes/lizza-lms/modules/post/assets/css/magnific-popup.css?ver=1.0.7" type="text/css"
    media="all" />
  <link rel="stylesheet" id="lizza-quick-search-css"
    href="wp-content/themes/lizza-lms/modules/search/assets/css/search.css?ver=1.0.7" type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-secondary-css"
    href="wp-content/themes/lizza-lms/modules/sidebar/assets/css/sidebar.css?ver=1.0.7" type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-woo-css"
    href="wp-content/themes/lizza-lms/modules/woocommerce/assets/css/default.css?ver=1.0.7" type="text/css"
    media="all" />
  <style id="lizza-woo-cart-notification-inline-css" type="text/css">
    /*--------------------------------------------------------------*/
    /* #region - Add-to-Cart Notification Widget */
    /*--------------------------------------------------------------*/

    .wdt-shop-cart-widget.cart-notification-widget,
    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-inner,
    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content {
      float: left;
      width: 100%;
    }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-close-button {
      font-size: 0;
      height: 25px;
      line-height: 0;
      position: absolute;
      right: 3px;
      top: 3px;
      text-align: center;
      width: 25px;
      -webkit-border-radius: 50%;
      border-radius: 50%;
    }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-close-button:before {
      content: "\2716";
      display: block;
      font-size: 14px;
      font-weight: normal;
      line-height: 25px;
    }

    .wdt-shop-cart-widget.cart-notification-widget {
      max-width: 500px;
      position: fixed;
      bottom: 32px;
      left: 18px;
      width: auto;
      z-index: 999;
      -webkit-transition: var(--wdtBaseTransition);
      transition: var(--wdtBaseTransition);
    }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-inner {
      padding: 20px;
    }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content>* {
      display: table-cell;
      vertical-align: middle;
    }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-thumb {
      line-height: 0;
      padding: 0 10px;
      width: 120px;
    }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-info {
      padding: 5px 10px;
      text-align: left;
    }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-thumb a,
    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-thumb a img {
      display: block;
      width: 100%;
    }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-info a {
      display: block;
      font-size: 18px;
      font-weight: bold;
    }

    .wdt-shop-cart-widget.cart-notification-widget {
      opacity: 0;
      visibility: hidden;
    }

    .wdt-shop-cart-widget.cart-notification-widget.wdt-shop-cart-widget-active {
      opacity: 1;
      visibility: visible;
    }

    .wdt-shop-cart-widget.cart-notification-widget {
      background-color: var(--wdtBodyBGColor);
    }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-close-button:before {
      color: var(--wdtAccentTxtColor);
    }

    .wdt-shop-cart-widget.cart-notification-widget {
      -webkit-box-shadow: 0 1px 3px 1px rgba(var(--wdtHeadAltColorRgb), 0.25);
      box-shadow: 0 1px 3px 1px rgba(var(--wdtHeadAltColorRgb), 0.25);
    }

    /* #endregion - Add-to-Cart Notification Widget */

    /*--------------------------------------------------------------*/
    /* #region - Add-to-Cart Sidebar Widget */
    /*--------------------------------------------------------------*/

    .wdt-shop-cart-widget.activate-sidebar-widget {
      height: 100%;
      position: fixed;
      right: 0;
      top: 0;
      width: 350px;
      z-index: 999992;
      -webkit-transform: translateX(100%);
      transform: translateX(100%);
      -webkit-transition: var(--wdtBaseTransition);
      transition: var(--wdtBaseTransition);
    }

    .wdt-shop-cart-widget.activate-sidebar-widget:before {
      content: "";
    }

    .wdt-shop-cart-widget.activate-sidebar-widget.wdt-shop-cart-widget-active {
      -webkit-transform: translateX(0);
      transform: translateX(0);
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-inner {
      height: 100%;
      padding: 45px 0 120px;
      position: relative;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header {
      border-width: 0 0 1px;
      padding-left: 15px;
      padding-right: 45px;
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 {
      font-size: 15px;
      font-weight: bold;
      line-height: 45px;
      margin: 0;
      text-transform: uppercase;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 span,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header a {
      height: 45px;
      position: absolute;
      top: 0;
      text-align: center;
      width: 45px;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 span {
      font-size: 18px;
      right: 0;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a {
      font-size: 0;
      line-height: 0;
      margin-right: 1px;
      overflow: hidden;
      right: 100%;
      text-indent: -9999px;
      -webkit-transform: translateX(100%);
      transform: translateX(100%);
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a:before {
      content: "\2716";
      display: block;
      font-size: 15px;
      font-weight: normal;
      line-height: 45px;
      text-indent: 0;
    }

    .wdt-shop-cart-widget[class*="sidebar"].activate-sidebar-widget:hover .wdt-shop-cart-widget-header h3 a {
      -webkit-transform: translateX(0);
      transform: translateX(0);
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content {
      float: left;
      width: 100%;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-inner,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li {
      float: left;
      width: 100%;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .total {
      padding: 0 15px;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li {
      border-width: 1px 0;
      display: inline;
      margin: -1px 0 0 !important;
      padding: 15px 25px 15px 50px;
      position: relative;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li:first-child {
      border-top-width: 0;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li:last-child {
      border-bottom-width: 0;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a:not(.remove) {
      font-weight: 600;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a img {
      margin: auto;
      position: absolute;
      left: 0;
      top: 16px;
      width: 40px;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove {
      font-size: 16px;
      height: 20px;
      line-height: 20px;
      margin: auto;
      position: absolute;
      bottom: 0;
      left: auto;
      right: 0;
      top: 0 !important;
      text-align: center;
      width: 20px;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove:not(:focus) {
      text-decoration: none;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li:before {
      content: none !important;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li .quantity {
      display: table;
      margin: 0;
      font-size: 14px;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer::before {
      content: "";
      height: 1px;
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      width: auto;
      z-index: -1;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p {
      height: 50px;
      line-height: 50px;
      margin: 0;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.total {
      padding: 0 15px;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.total strong {
      float: left;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.total .amount {
      float: right;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.buttons {
      display: flex;
      grid-gap: 1px;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.buttons a {
      height: 100%;
      line-height: inherit;
      margin: 0;
      padding-top: 0;
      padding-bottom: 0;
      text-align: center;
      width: 50%;
      -webkit-border-radius: 0;
      border-radius: 0;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart__empty-message {
      margin: 0;
      padding: 15px;
    }

    .wdt-shop-cart-widget-overlay {
      background-color: rgba(var(--wdtHeadAltColorRgb), 0.7);
      height: 100%;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 999991;
      -webkit-transition:
        opacity 0.25s ease,
        visibility 0s ease 0.25s;
      transition:
        opacity 0.25s ease,
        visibility 0s ease 0.25s;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header a,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li {
      border-style: solid;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove,
    .wdt-shop-cart-widget-overlay {
      opacity: 0;
      visibility: hidden;
    }

    .wdt-shop-cart-widget[class*="sidebar"].activate-sidebar-widget:hover .wdt-shop-cart-widget-header h3 a,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li:hover a.remove,
    .wdt-shop-cart-widget.activate-sidebar-widget.wdt-shop-cart-widget-active+.wdt-shop-cart-widget-overlay {
      opacity: 1;
      visibility: visible;
    }

    /* Default Color - Colors */
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a:not(.remove):not(:hover),
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.total .amount {
      color: var(--wdtHeadAltColor);
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a:hover {
      color: var(--wdtAccentTxtColor);
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove {
      color: var(--wdtAccentTxtColor) !important;
    }

    /* Default Color - Borders */
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer::before {
      -webkit-box-shadow: 0 2px 6px 0 rgba(var(--wdtHeadAltColorRgb), 0.5);
      box-shadow: 0 2px 6px 0 rgba(var(--wdtHeadAltColorRgb), 0.5);
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header a,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li {
      border-color: rgba(var(--wdtHeadAltColorRgb), 0.075);
    }

    /* Default Color - BG */
    .wdt-shop-cart-widget.activate-sidebar-widget {
      background-color: #f7f7f7;
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer {
      background-color: var(--wdtBodyBGColor);
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.buttons a.checkout,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.buttons a:not(.checkout),
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.buttons a:hover,
    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-close-button {
      background-color: var(--wdtHeadAltColor);
    }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 span {
      background-color: rgba(var(--wdtBodyBGColorRgb), 0.15);
    }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-close-button:hover,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove:hover {
      background-color: #9f2124;
    }

    /* #endregion - Add-to-Cart Sidebar Widget */

    /*--------------------------------------------------------------*/
    /* #region - Responsive */
    /*--------------------------------------------------------------*/

    /*----*****---- << Mobile (Landscape) >> ----*****----*/

    /* Common Styles for the devices below 767px width */
    @media only screen and (max-width: 767px) {
      .wdt-shop-cart-widget.cart-notification-widget {
        margin: auto;
        bottom: 5px;
        left: 0;
        right: 0;
      }
    }

    /* Note: Design for a width of 480px */
    @media only screen and (min-width: 480px) and (max-width: 767px) {
      .wdt-shop-cart-widget.cart-notification-widget {
        max-width: 420px;
      }
    }

    /* Common Styles for the devices below 479px width */
    @media only screen and (max-width: 479px) {
      .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content>* {
        display: table;
        margin: auto;
        text-align: center !important;
      }

      .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-info {
        font-size: 11px;
      }

      .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-info a {
        font-size: 13px;
      }

      .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a {
        right: 0;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        -webkit-transform: scale(0);
        transform: scale(0);
      }

      .wdt-shop-cart-widget[class*="sidebar"].activate-sidebar-widget:hover .wdt-shop-cart-widget-header h3 a {
        -webkit-border-radius: 0;
        border-radius: 0;
        -webkit-transform: scale(1);
        transform: scale(1);
      }
    }

    /*----*****---- << Mobile >> ----*****----*/

    /* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
    @media only screen and (min-width: 320px) and (max-width: 479px) {
      .wdt-shop-cart-widget.cart-notification-widget {
        max-width: 290px;
      }

      .wdt-shop-cart-widget.activate-sidebar-widget {
        max-width: 290px;
      }

      .wdt-shop-cart-widget.activate-sidebar-widget {
        width: 290px;
      }
    }

    /* #endregion - Responsive */
  </style>
  <link rel="stylesheet" id="lizza-plus-blog-css"
    href="wp-content/plugins/lizza-lms-plus/modules/blog/assets/css/blog.css?ver=1.0.2" type="text/css" media="all" />
  <link rel="stylesheet" id="dtplugin-nav-menu-animations-css"
    href="wp-content/plugins/lizza-lms-plus/modules/menu/assets/css/nav-menu-animations.css?ver=1.0.2" type="text/css"
    media="all" />
  <link rel="stylesheet" id="dtplugin-nav-menu-css"
    href="wp-content/plugins/lizza-lms-plus/modules/menu/assets/css/nav-menu.css?ver=1.0.2" type="text/css"
    media="all" />
  <link rel="stylesheet" id="lizza-pro-advance-field-css"
    href="wp-content/plugins/lizza-lms-pro/modules/advance-field/assets/css/style.css?ver=1.0.0" type="text/css"
    media="all" />
  <link rel="stylesheet" id="lizza-pro-blog-css"
    href="wp-content/plugins/lizza-lms-pro/modules/blog/assets/css/blog.css?ver=1.0.0" type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-pro-auth-css"
    href="wp-content/plugins/lizza-lms-pro/modules/auth/assets/css/style.css?ver=1.0.0" type="text/css" media="all" />
  <link rel="stylesheet" id="jquery-select2-css"
    href="wp-content/themes/lizza-lms/assets/lib/select2/select2.css?ver=1.0.7" type="text/css" media="all" />
  <link rel="stylesheet" id="lizza-theme-css" href="wp-content/themes/lizza-lms/assets/css/theme.css?ver=1.0.7"
    type="text/css" media="all" />
  <style id="lizza-admin-inline-css" type="text/css">
    .loader1 {
      background-color: var(--wdtBodyBGColor);
    }

    body {
      font-family: "Manrope", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 1.7;
      color: #394630;
    }

    a {
      color: #22281e;
    }

    a:hover {
      color: #14452f;
    }

    h1 {
      font-family: "DM Sans", sans-serif;
      font-weight: 700;
      font-size: 68px;
      line-height: 1.2;
    }

    h2 {
      font-family: "DM Sans", sans-serif;
      font-weight: 700;
      font-size: 55px;
      line-height: 1.2;
    }

    h3 {
      font-family: "DM Sans", sans-serif;
      font-weight: 700;
      font-size: 40px;
      line-height: 1.2;
    }

    h4 {
      font-family: "DM Sans", sans-serif;
      font-weight: 700;
      font-size: 30px;
      line-height: 1.2;
    }

    h5 {
      font-family: "DM Sans", sans-serif;
      font-weight: 700;
      font-size: 24px;
      line-height: 1.2;
    }

    h6 {
      font-family: "DM Sans", sans-serif;
      font-weight: 700;
      font-size: 20px;
      line-height: 1.2;
    }

    .main-title-section-wrapper.overlay-wrapper.dark-bg-breadcrumb>.main-title-section-bg,
    .main-title-section-wrapper.overlay-wrapper>.main-title-section-bg,
    .main-title-section-wrapper.dark-bg-breadcrumb>.main-title-section-bg,
    .main-title-section-wrapper>.main-title-section-bg {
      background-image: url("wp-content/uploads/sites/12/2024/02/pricing-breadcrumb-1.jpg");
      background-attachment: inherit;
      background-position: center top;
      background-size: cover;
      background-repeat: repeat;
      background-color: var(--wdtTertiaryColor);
    }
  </style>
  <link rel="stylesheet" id="dtlms-default-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/themes/default.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="jquery-ui-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/jquery-ui.min.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="scrolltabs-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/scrolltabs.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="dtlms-common-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/common.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="dtlms-frontend-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/frontend.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="dtlms-gridlist-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/gridlist-items.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="dtlms-single-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/single-items.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="dtlms-google-fonts-css" href="../css-3?family=Poppins&#038;ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="dtlms-theme-default-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/themes/default.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="dtlms-quiz-frontend-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/quiz/assets/quiz-frontend.css?ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="dtlms-class-frontend-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/class/assets/class-frontend.css?ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="dtlms-certificate-frontend-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/certificate/assets/certificate-frontend.css?ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="dtlms-badge-frontend-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/badge/assets/badge-frontend.css?ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="dtlms-assignment-frontend-css"
    href="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/assignment/assets/assignment-frontend.css?ver=6.8.3"
    type="text/css" media="all" />
  <style id="dtlms-skin-inline-css" type="text/css">
    .dtlms-login-form-container .dtlms-login-form .dtlms-title.dtlms-login-title:after,
    .dtlms-class-registration-form-container .dtlms-class-registration-form-inner .dtlms-title.dtlms-registration-title:after,
    .dtlms-title:after,
    .dtlms-total-items .dtlms-total-item-title,
    .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a,
    .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a,
    .page-template-default.page .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a,
    .page-template-default.page .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a,
    div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button,
    div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button>a.dtlms-cart-link:hover,
    div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button>.dtlms-cart-link.dtlms-button:hover,
    .dtlms-button,
    .dtlms-badge-certificate-holder a.dtlms-generate-certificate-content,
    .dtlms-item-status-details>.dtlms-package-proceed-button>a,
    .dtlms-package-pricing-details>.dtlms-package-proceed-button>a,
    .dtlms-payment-details .dtlms-item-status-details .dtlms-proceed-button>a,
    .dtlms-tabs-vertical-content .dtlms-course-detail-group-section .action>.group-button,
    div[class$="share-holder"] ul li a,
    .dtlms-author-details .dtlms-author-description .dtlms-author-contact-details>li>a,
    .dtlms-tabs-horizontal-content #comments .reply .comment-reply-link,
    .dtlms-tabs-vertical-content #comments .reply .comment-reply-link,
    .dtlms-class-single #comments .reply .comment-reply-link,
    .dtlms-course-single #comments .reply .comment-reply-link,
    .dtlms-tabs-horizontal-content .dtlms-course-detail-group-section .action>.group-button a,
    .dtlms-tabs-vertical-content .dtlms-course-detail-group-section .action>.group-button a,
    .dtlms-course-detail.type3 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a:after,
    .dtlms-class-detail.type3 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a:after,
    .dtlms-tabs-vertical-container ul.dtlms-tabs-vertical>li>a.current:after,
    .dtlms-quiz-questions .dtlms-boolean input[type="checkbox"]:checked+label:after,
    .dtlms-quiz-questions .dtlms-boolean input[type="radio"]:checked+label::after,
    .dtlms-quiz-questions ul:not(.dtlms-question-image-options) li input[type="checkbox"]:checked+label::after,
    .dtlms-quiz-questions ul:not(.dtlms-question-image-options) li input[type="radio"]:checked+label:after,
    div[class*="listing-filters"]>div[class$="filter"]>ul>li>input[type="checkbox"]:checked+label:after,
    div[class*="listing-filters"]>div[class$="filter"]>ul>li>input[type="radio"]:checked+label:after,
    .dtlms-course-category-item.type2:after,
    .dtlms-course-category-item.type5 .dtlms-course-category-meta-data:before,
    .dtlms-instructor-item.type4:after,
    .dtlms-instructor-item.type4:hover:before,
    .dtlms-course-category-item.type5 .dtlms-category-total-items,
    div[class*="listing-holder"] div[class*="display-filter"] a[class*="display-type"].active,
    .dtlms-apply-isotope div[class*="listing-isotope-filter"] a:hover:after,
    .dtlms-apply-isotope div[class*="listing-isotope-filter"] a.active-sort:after,
    .dtlms-pagination.dtlms-ajax-pagination .prev-post a:hover,
    .dtlms-pagination.dtlms-ajax-pagination .next-post a:hover,
    .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li span,
    .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a:hover,
    .swiper-container-horizontal .dtlms-swiper-pagination-holder .dtlms-swiper-arrow-pagination a:hover,
    #dtlms-course-curriculum-popup .dtlms-curriculum-details .dtlms-curriculum-detailed-links .dtlms-toggle-group-set li.active:before,
    #dtlms-course-curriculum-popup .dtlms-curriculum-details .dtlms-curriculum-detailed-links .dtlms-toggle-group-set li:hover:before,
    .dtlms-info-box,
    ul.dtlms-quiz-statistics-counter li.dtlms-quiz-total-questions,
    .dtlms-course-detail .dtlms-coursedetail-cart-link,
    .dtlms-course-detail-author .dtlms-author-contact-details>li>a,
    .dtlms-class-detail .dtlms-classdetail-cart-link,
    .dtlms-class-detail-author .dtlms-author-contact-details>li>a,
    .dtlms-questions-list .dtlms-question-title .dtlms-question-title-counter:before,
    #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-questions-list-container .dtlms-questions-list .dtlms-answer-hint span,
    .dtlms-course-detail.type1 .dtlms-toggle-group-set .dtlms-toggle.active,
    .dtlms-course-detail.type3 .dtlms-toggle-group-set .dtlms-toggle.active,
    .dtlms-class-detail.type1 .dtlms-toggle-group-set .dtlms-toggle.active,
    .dtlms-class-detail.type3 .dtlms-toggle-group-set .dtlms-toggle.active,
    .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a,
    .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a:hover,
    .dtlms-quiz-sidebar .dtlms-timer-container h4:before,
    .dtlms-quiz-sidebar .dtlms-question-counter-holder h4:before,
    .dtlms-quiz-sidebar .dtlms-question-counter-holder~div[class$="box"],
    #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>div.dtlms-quiz-results-container h2:before,
    #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>div.dtlms-post-quiz-msg,
    .dtlms-quiz-questions ul.dtlms-question-image-options li.selected .dtlms-quiz-answers-container,
    #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>form.formAssignment .dtlms-add-upload-assignment-field,
    #dtlms-course-curriculum-popup .dtlms-curriculum-details .dtlms-curriculum-detailed-links .dtlms-curriculum-list li .dtlms-curriculum-meta-items .dtlms-curriculum-meta-preview,
    .dtlms-dashboard-quiz-statistics>.dtlms-column>h6:before,
    .dtlms-curriculum-content-holder .dtlms-note,
    #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder ul.dtlms-assignment-submission li .dtlms-four-fifth>ul>li a,
    .dtlms-instructor-item.type10 .dtlms-team-social-links,
    #dtlms-course-curriculum-popup:before,
    #dtlms-course-result-popup:before,
    #dtlms-course-result-popup .dtlms-course-result-popup-container .dtlms-three-fifth .dtlms-curriculum-assignment-holder ul.dtlms-assignment-submission li .dtlms-four-fifth>ul>li a,
    .dtlms-tabs-horizontal-content>h2:after,
    .dtlms-course-result-curriculum-container .dtlms-curriculum-items.active td:last-child:after,
    .dtlms-title:after,
    div[class*="dynamic-section-holder"] div[class$="item-details"]>span,
    .dtlms-class-result-curriculum-container .dtlms-class-curriculum-table tr.active td:last-child:after,
    .dtlms-course-category-item.type10 .dtlms-course-category-meta-data,
    .dtlms-course-category-item.type10:hover .dtlms-course-category-meta-data>span,
    .dtlms-course-category-item.type7 .dtlms-course-category-meta-data:before,
    .dtlms-course-category-item.type7:hover .dtlms-category-total-items:before,
    div[class*="listing-holder"] div[class*="listing-filters"]>div[class$="filter"]>ul>li>input[type="checkbox"]:checked+label:before,
    .dtlms-package-detail .dtlms-package-items table th,
    .dtlms-course-detail .dtlms-coursedetail-cart-details .added_to_cart,
    .dtlms-payment-details .dtlms-packagedetail-cart-details>a.added_to_cart,
    .academy-carousel .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a:hover,
    .academy-carousel .dtlms-pagination.dtlms-ajax-pagination .prev-post a:hover,
    .academy-carousel .dtlms-pagination.dtlms-ajax-pagination .next-post a:hover,
    .dtlms-class-detail .dtlms-classdetail-cart-details .added_to_cart,
    .type7.dtlms-courselist-item-wrapper .dtlms-courselist-tags a,
    .dtlms-courselist-item-wrapper .dtlms-courselist-thumb .dtlms-courselist-featured-post,
    .type10.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-metadata p,
    .type10.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-right-section,
    .type3.dtlms-classlist-item-wrapper .dtlms-classlist-bottom-section-right a,
    /* Packages */
    .type2.dtlms-packagelist-item-wrapper .dtlms-packagedetail-cart-details a:hover,
    .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagelist-inclusion p,
    .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagedetail-cart-details a,
    .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-details-inner .dtlms-packagedetail-cart-details>.dtlms-packagedetail-cart-link,
    .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-details-inner .dtlms-packagedetail-cart-details>.added_to_cart,
    .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td,
    .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-present,
    .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-has-events.tribe-mini-calendar-today,
    .dtlms-course-detail .tribe-mini-calendar .tribe-events-has-events.tribe-events-present a:hover,
    .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar td.tribe-events-has-events.tribe-mini-calendar-today a:hover,
    .dtlms-course-detail-media-attachment th,
    .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td,
    .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-present,
    .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-has-events.tribe-mini-calendar-today,
    .dtlms-class-detail .tribe-mini-calendar .tribe-events-has-events.tribe-events-present a:hover,
    .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar td.tribe-events-has-events.tribe-mini-calendar-today a:hover,
    .dtlms-instructor-item.type1:before,
    .dt-sc-button.alternate-bg-color.filled:hover,
    .dtlms-curriculum-list .dtlms-curriculum-meta-preview,
    .dtlms-course-detail .dtlms-course-detail-content .dtlms-coursedetail-cart-details .dtlms-button:hover,
    .dtlms-class-detail .dtlms-class-detail-content .dtlms-classdetail-cart-details .dtlms-button:hover,
    .dt-sc-button.filled.dt-sc-skin-highlight,
    .dt-sc-button.filled.dt-skin-secondary-bg:hover,
    .dtlms-default-intro-section h3:after,
    .type5.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover,
    .type8.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover,
    .type1.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover,
    #avatar-crop-actions a.button,
    .dt-sc-portfolio-sorting.type9 a.active-sort,
    .dt-sc-portfolio-sorting.type9 a:hover,
    .dtlms-default-intro-section h3:before,
    .dt-sc-newsletter-section .dt-sc-subscribe-frm input[type="submit"],
    .dt-sc-team.hide-details-show-on-hover.dt-sc-one-course-team li a,
    div[class$="details-holder"] .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li>span.current,
    .dtlms-course-detail.type2 .dtlms-course-detail-content-meta>div:before,
    .swiper-pagination-bullets .swiper-pagination-bullet-active,
    .swiper-pagination.swiper-pagination-progress .swiper-pagination-progressbar,
    .swiper-pagination-bullets .swiper-pagination-bullet:hover,
    body[class*="single-dtlms"] #respond p.form-submit input[type="submit"],
    .dtlms-login-form-container .dtlms-login-form .dtlms-login-form-holder p #wp-submit,
    .dtlms-courses-listing-holder input[type="submit"],
    .dtlms-courses-listing-holder button,
    .dtlms-courses-listing-holder input[type="button"],
    .dtlms-classes-listing-holder input[type="submit"],
    .dtlms-classes-listing-holder button,
    .dtlms-classes-listing-holder input[type="button"] {
      background-color: rgb(124, 255, 119);
    }

    .dtlms-instructor-item.type2:hover,
    .dtlms-instructor-item.with-border img,
    .dtlms-instructor-item.rounded-with-border img,
    .dtlms-instructor-item.type3:hover,
    .dtlms-course-category-item.type1:hover:before,
    .dtlms-course-category-item.type6:after,
    .dtlms-pagination.dtlms-ajax-pagination .prev-post a:hover,
    .dtlms-pagination.dtlms-ajax-pagination .next-post a:hover,
    .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li span,
    .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a:hover,
    .swiper-container-horizontal .dtlms-swiper-pagination-holder .dtlms-swiper-arrow-pagination a,
    .dtlms-tabs-horizontal-content #comments .reply .comment-reply-link,
    .dtlms-tabs-vertical-content #comments .reply .comment-reply-link,
    .dtlms-class-single #comments .reply .comment-reply-link,
    .dtlms-course-single #comments .reply .comment-reply-link,
    .dtlms-quiz-features-list,
    .dtlms-question .dtlms-title-container,
    .dtlms-questions-list .dtlms-question::before,
    .dtlms-quiz-results-container,
    div[class*="listing-filters"]>div[class$="filter"]>ul>li>input[type="radio"]:checked+label:before,
    .dtlms-instructor-item.type6 .dtlms-instructor-item-meta-data-detailed,
    body[class*="single-dtlms"] div[class$="certificate-badge"] span,
    .type2.dtlms-packagelist-item-wrapper.grid-item:hover:before,
    .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td,
    .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td,
    .type1.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a,
    .type1.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover {
      border-color: rgb(124, 255, 119);
    }

    .dtlms-instructor-item.type3:after,
    #dtlms-course-curriculum-popup:not(.dtlms-curriculum-quiz-lock) .dtlms-questions-list-container .dtlms-questions-list .dtlms-question,
    #dtlms-course-result-popup .dtlms-questions-list-container.dtlms-dashboard-questions-list .dtlms-questions-list .dtlms-question,
    .dtlms-questions-list-container.dtlms-quiz-underprogess .dtlms-questions-list .dtlms-question:not(.dtlms-questions-oneatatime),
    .dtlms-default-intro-section:hover h3 {
      border-bottom-color: rgb(20, 69, 47);
    }

    .dtlms-instructor-item.type3:before {
      border-left-color: rgb(20, 69, 47);
    }

    .dtlms-instructor-item.type3:after {
      border-right-color: rgb(20, 69, 47);
    }

    .dtlms-instructor-item.type3:before {
      border-top-color: rgb(20, 69, 47);
    }

    table.dtlms-custom-table td a:hover,
    .dtlms-custom-box table td a:hover,
    table.dtlms-custom-table tbody.dtlms-custom-dashboard-table ul li a:hover,
    .dt-sc-dark-bg ul.dtlms-custom-login a:hover,
    .dtlms-course-category-item.type1:hover h3 a,
    .swiper-container-horizontal .dtlms-swiper-pagination-holder .dtlms-swiper-arrow-pagination a,
    .dt-sc-dark-bg .swiper-container-horizontal .dtlms-swiper-pagination-holder .dtlms-swiper-arrow-pagination a:hover,
    .dt-sc-skin-highlight .swiper-container-horizontal .dtlms-swiper-pagination-holder .dtlms-swiper-arrow-pagination a:hover,
    .dtlms-instructor-item.type5 .dtlms-instructor-item-meta-data h4 a:hover,
    .dtlms-course-category-item.type2 *:hover,
    .dtlms-classes-listing-holder #dtlms-ajax-load-image .dtlms-loading,
    .dtlms-courses-listing-holder #dtlms-ajax-load-image .dtlms-loading,
    .dt-sc-skin-highlight .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a,
    .dt-sc-skin-highlight .dtlms-pagination.dtlms-ajax-pagination .prev-post a,
    .dt-sc-skin-highlight .dtlms-pagination.dtlms-ajax-pagination .next-post a,
    .dtlms-course-detail .dtlms-coursedetail-price-details span,
    .dtlms-class-detail .dtlms-classdetail-price-details span,
    #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>div.dtlms-assignment-details-container strong,
    #dtlms-course-curriculum-popup.dtlms-course-curriculum-popup-quiz .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>div.dtlms-quiz-details-container strong,
    #dtlms-course-curriculum-popup.dtlms-course-curriculum-popup-lesson .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>div.dtlms-lesson-details-container strong,
    .dtlms-course-results-main-detail-wrapper .dtlms-author-details .dtlms-author-image img,
    .dtlms-class-results-main-detail-wrapper .dtlms-author-details .dtlms-author-image img,
    .dtlms-course-results-main-detail-wrapper .dtlms-author-details .dtlms-author-title h5 a:hover,
    .dtlms-class-results-main-detail-wrapper .dtlms-author-details .dtlms-author-title h5 a:hover,
    .dtlms-package-detail .dtlms-packagelist-price-details ins,
    div[class*="dynamic-section-holder"] p>a,
    .dtlms-course-category-item.type5:hover .dtlms-course-category-meta-data>img,
    .type2.dtlms-packagelist-item-wrapper .dtlms-packagelist-details h5 a:hover,
    .type2.dtlms-packagelist-item-wrapper .dtlms-packagelist-price-details span,
    .type2.dtlms-packagelist-item-wrapper .dtlms-packagelist-inclusion p:before,
    .dtlms-class-detail .dtlms-class-detail-info li a:hover,
    .dtlms-course-detail .dtlms-course-detail-info li a:hover,
    .dtlms-course-detail.type2 .dtlms-course-detail-content-meta a:hover,
    .dtlms-instructor-item.type7.default .dtlms-team-social-links ul li a:hover,
    .online-learning-carousel .type7.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-right-section .dtlms-coursedetail-cart-details a,
    .online-learning-carousel .type7.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-left-section .dtlms-coursedetail-price-details ins,
    .dtlms-default-intro-section .dt-sc-button.transparent span,
    .dtlms-default-intro-section h3:before,
    .type1.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a,
    .dtlms-course-category-item.type9 h3 a:hover,
    .dtlms-course-detail .dtlms-course-detail-author-title h5 a:hover,
    .dtlms-class-detail.type2 .dtlms-class-detail-author-title h5 a:hover,
    .dtlms-instructor-item.default .dtlms-team-social-links ul li a,
    a.dtlms-button,
    .dtlms-course-detail.type1 .dtlms-course-detail-content .dtlms-coursedetail-cart-details a.dtlms-login-link:hover {
      color: rgb(124, 255, 119);
    }

    .dtlms-button:hover,
    .dtlms-badge-certificate-holder a.dtlms-generate-certificate-content:hover,
    .dtlms-author-details .dtlms-author-description .dtlms-author-contact-details>li>a:hover,
    .dtlms-social-logins-container a[class^="dtlms-social"]:hover,
    .dtlms-payment-details .dtlms-item-status-details .dtlms-proceed-button>a:hover,
    .dtlms-tabs-vertical-content .dtlms-course-detail-group-section .action>.group-button:hover,
    div[class$="share-holder"] ul li a:hover,
    .dtlms-tabs-horizontal-content #comments .reply .comment-reply-link:hover,
    .dtlms-tabs-vertical-content #comments .reply .comment-reply-link:hover,
    .dtlms-class-single #comments .reply .comment-reply-link:hover,
    .dtlms-course-single #comments .reply .comment-reply-link:hover,
    .dtlms-tabs-horizontal-content .dtlms-course-detail-group-section .action>.group-button a:hover,
    .dtlms-tabs-vertical-content .dtlms-course-detail-group-section .action>.group-button a:hover,
    .dtlms-course-category-item.type3:hover,
    .dtlms-instructor-item.with-bg .dtlms-team-social-links ul li a:hover,
    .dtlms-course-category-item.type5 .dtlms-course-category-meta-data>span,
    div[class*="list-item-wrapper"] div[class*="list-thumb"] div[class$="list-overlay"] a.dtlms-button:hover,
    div[class*="list-item-wrapper"] .dtlms-item-status-details>a:hover,
    div[class*="list-item-wrapper"] .dtlms-item-status-details>.dtlms-button:hover,
    div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button>a:hover,
    div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button>.dtlms-button:hover,
    div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button>a.dtlms-cart-link,
    div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button>.dtlms-cart-link.dtlms-button,
    div[class*="list-item-wrapper"] div[class*="list-details"] div[class*="list-metadata"] p>span,
    div[class*="list-item-wrapper"] div[class*="list-details"] div[class*="list-metadata"] p>i,
    div[class*="listing-containers"] .dtlms-item-status-details .dtlms-item-pricing-details,
    div[class*="listing-containers"] .dtlms-item-status-details>span,
    .dtlms-packagelist-item .dtlms-package-pricing-details>span,
    .dtlms-instructor-item.type5:hover:after,
    .dtlms-classlist-item-wrapper .dtlms-classlist-details .dtlms-classlist-meta-wrapper .dtlms-class-type,
    .dtlms-tabs-vertical-content .dtlms-course-detail-total-students span,
    .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a:hover,
    .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a:hover,
    .page-template-default.page .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a:hover,
    .page-template-default.page .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a:hover,
    .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a.active,
    .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a.active,
    .page-template-default.page .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a.active,
    .page-template-default.page .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a.active,
    .dtlms-total-items:hover .dtlms-total-item-title,
    .dtlms-total-items span,
    .dt-sc-skin-highlight .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a:hover,
    .single>#dtlms-course-curriculum-popup:after,
    .dtlms-course-detail .dtlms-coursedetail-cart-link:hover,
    .dtlms-course-detail-author .dtlms-author-contact-details>li>a:hover,
    .dtlms-class-detail .dtlms-classdetail-cart-link:hover,
    .dtlms-class-detail-author .dtlms-author-contact-details>li>a:hover,
    #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>form.formAssignment .dtlms-add-upload-assignment-field:hover,
    dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder ul.dtlms-assignment-submission li .dtlms-four-fifth>ul>li a:hover,
    .dtlms-instructor-item.type9 .dtlms-team-social-links ul li a:hover,
    .dtlms-instructor-item.type10:hover .dtlms-team-social-links,
    #dtlms-course-result-popup .dtlms-course-result-popup-container .dtlms-three-fifth .dtlms-curriculum-assignment-holder ul.dtlms-assignment-submission li .dtlms-four-fifth>ul>li a:hover,
    .dtlms-course-category-item.type10 .dtlms-course-category-meta-data>span,
    .dtlms-course-category-item.type10:hover .dtlms-course-category-meta-data,
    .dtlms-course-detail .dtlms-coursedetail-cart-details .added_to_cart:hover,
    .dtlms-payment-details .dtlms-packagedetail-cart-details>a.added_to_cart:hover,
    #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder ul.dtlms-assignment-submission li .dtlms-four-fifth>ul>li a:hover,
    .dtlms-class-detail .dtlms-classdetail-cart-details .added_to_cart:hover,
    input.dtlms-button:hover,
    input.dtlms-button[type="button"]:hover,
    input.dtlms-button[type="submit"]:hover,
    .dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover,
    .type6.dtlms-courselist-item-wrapper.list-item .dtlms-courselist-details .dtlms-coursedetail-cart-details a:hover,
    .type2.dtlms-courselist-item-wrapper .dtlms-coursedetail-price-details .dtlms-price-status,
    .type2.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-bottom-section .dtlms-coursedetail-cart-details a,
    .type5.dtlms-courselist-item-wrapper .dtlms-coursedetail-price-details .dtlms-cost,
    .type6.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-coursedetail-price-details ins,
    .type7.dtlms-courselist-item-wrapper .dtlms-courselist-duration,
    .type10.dtlms-courselist-item-wrapper .dtlms-courselist-tags:before,
    .type4.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a,
    .type5.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a,
    .type8.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a,
    .type9.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-coursedetail-cart-details a,
    .type2.dtlms-classlist-item-wrapper .dtlms-classlist-metadata,
    .type3.dtlms-classlist-item-wrapper .dtlms-classlist-details .dtlms-classdetail-price-details ins,
    div[class*="list-item-wrapper"].type10 div[class*="list-details"] div[class*="list-metadata"] p>i,
    .type3.dtlms-courselist-item-wrapper.list-item .dtlms-coursedetail-cart-details a,
    .type3.dtlms-classlist-item-wrapper .dtlms-classlist-bottom-section-right a:hover,
    /* Packages */
    .type2.dtlms-packagelist-item-wrapper .dtlms-packagedetail-cart-details a,
    .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagedetail-cart-details a.added_to_cart,
    .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagedetail-cart-details a:hover,
    .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-price-details,
    .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-details-inner .dtlms-packagedetail-cart-details>.dtlms-packagedetail-cart-link:hover,
    .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-details-inner .dtlms-packagedetail-cart-details>.added_to_cart:hover,
    .dt-sc-button.alternate-bg-color.filled,
    .wpb_column.dtlms-slider-overlay .dtlms-courses-listing-holder .chosen-container .chosen-results li.active-result.highlighted,
    .dtlms-course-detail .dtlms-course-detail-content .dtlms-coursedetail-cart-details .dtlms-button,
    .dtlms-class-detail .dtlms-class-detail-content .dtlms-classdetail-cart-details .dtlms-button,
    .dt-sc-button.filled.dt-sc-skin-highlight:hover,
    .dt-sc-button.filled.dt-skin-secondary-bg,
    #avatar-crop-actions a.button:hover,
    .dt-sc-newsletter-section .dt-sc-subscribe-frm input[type="submit"]:hover,
    .dt-sc-team.hide-details-show-on-hover.dt-sc-one-course-team li a:hover,
    .dtlms-course-category-item.type8 .dtlms-course-category-meta-data>span,
    .type7.dtlms-courselist-item-wrapper .dtlms-courselist-tags a:hover,
    body[class*="single-dtlms"] table td#today,
    body[class*="single-dtlms"] #respond p.form-submit input[type="submit"]:hover,
    .dtlms-login-form-container .dtlms-login-form .dtlms-login-form-holder p #wp-submit:hover,
    .dtlms-courses-listing-holder input[type="submit"]:hover,
    .dtlms-courses-listing-holder button:hover,
    .dtlms-courses-listing-holder input[type="button"]:hover,
    .dtlms-classes-listing-holder input[type="submit"]:hover,
    .dtlms-classes-listing-holder button:hover,
    .dtlms-classes-listing-holder input[type="button"]:hover {
      background-color: rgb(20, 69, 47);
    }

    .dtlms-instructor-item.type3,
    .dtlms-course-category-item.type6:before,
    .dtlms-tabs-horizontal-content #comments .reply .comment-reply-link:hover,
    .dtlms-tabs-vertical-content #comments .reply .comment-reply-link:hover,
    .dtlms-class-single #comments .reply .comment-reply-link:hover,
    .dtlms-course-single #comments .reply .comment-reply-link:hover,
    .dt-sc-skin-highlight .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a:hover,
    .dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover,
    .type6.dtlms-courselist-item-wrapper .dtlms-courselist-author-image img,
    .type6.dtlms-courselist-item-wrapper.list-item .dtlms-courselist-details .dtlms-coursedetail-cart-details a,
    .dtlms-instructor-item.type9.default .dtlms-team-social-links ul li a:hover,
    .dtlms-instructor-item.type9.vibrant .dtlms-team-social-links ul li a:hover {
      border-color: rgb(20, 69, 47);
    }

    .dtlms-instructor-item.type3:hover:after,
    .type6.dtlms-courselist-item-wrapper .dtlms-courselist-thumb {
      border-bottom-color: rgb(20, 69, 47);
    }

    .dtlms-instructor-item.type3:hover:before,
    .dtlms-instructor-item.type4,
    div[class*="list-item-wrapper"] .dtlms-item-status-details>span:before,
    div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-item-pricing-details:before,
    .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-price-details:before {
      border-left-color: rgb(20, 69, 47);
    }

    .dtlms-instructor-item.type3:hover:after {
      border-right-color: rgb(20, 69, 47);
    }

    .dtlms-instructor-item.type3:hover:before {
      border-top-color: rgb(20, 69, 47);
    }

    .dtlms-login-form-container .dtlms-login-form .dtlms-title.dtlms-login-title strong,
    .dtlms-class-registration-form-container .dtlms-class-registration-form-inner .dtlms-title.dtlms-registration-title strong,
    div[class*="list-item-wrapper"] div[class*="list-details"] div[class*="list-metadata"] p>a:hover,
    .dtlms-main-title-section-wrapper .dtlms-breadcrumb a:hover,
    .dtlms-course-category-item.type1:hover *,
    .dtlms-course-category-item.type1:hover .dtlms-course-category-meta-data>span,
    .dtlms-course-category-item.type1:hover .dtlms-course-category-meta-data .dtlms-category-total-items,
    .dtlms-course-category-item.type4 h3 a:hover,
    .dtlms-instructor-item .dtlms-instructor-item-meta-data h4 a:hover,
    .dtlms-instructor-item.type3 .dtlms-instructor-item-meta-data h4 a:hover,
    .dtlms-instructor-item.type5.with-bg .dtlms-team-social-links ul li a:hover,
    .dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-author-details .dtlms-author-description h5 a:hover,
    .dtlms-quiz-questions .dtlms-boolean span label:hover,
    .dtlms-quiz-questions ul:not(.dtlms-question-image-options) li label:hover,
    div[class*="listing-filters"]>div[class$="filter"]>ul>li>label:hover,
    div[class*="list-item-wrapper"] div[class*="list-details"] h5 a:hover,
    .dtlms-package-single .dtlms-package-items table td>a:hover,
    .dtlms-team-details h4 a:hover,
    .dtlms-course-detail-group-section .item-title a:hover,
    .dtlms-course-news-item .dtlms-course-detail-news-details h5 a:hover,
    .dtlms-review-box .dtlms-average-value,
    body[class*="single-dtlms"] ul.commentlist li .author-name>a:hover,
    #comments #respond h3#reply-title #cancel-comment-reply-link:hover,
    div[class$="details-holder"] ul li a:hover,
    .dtlms-course-results-main-detail-wrapper .dtlms-author-title h5 a:hover,
    .dtlms-curriculum-list li .dtlms-curriculum-meta-title a:hover,
    .dtlms-curriculum-list li .dtlms-curriculum-meta-title a.active,
    .dtlms-curriculum-list li.active>.dtlms-curriculum-meta-title a,
    .dtlms-curriculum-list>li.locked:before,
    .dtlms-mark,
    #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container:before,
    #dtlms-course-result-popup .dtlms-course-curriculum-popup-container:before,
    .dtlms-class-result-popup .dtlms-course-curriculum-popup-container:before,
    .dtlms-course-detail-media-attachment td a:hover,
    .dtlms-course-result-curriculum-container table.dtlms-course-curriculum-table .dtlms-curriculum-items.active td,
    .dtlms-course-result-curriculum-container table.dtlms-course-curriculum-table .dtlms-curriculum-items.active .dtlms-view-curriculum-details,
    #dtlms-course-curriculum-popup:after,
    #dtlms-course-result-popup:after,
    #dtlms-class-result-popup:after,
    .dtlms-package-detail .dtlms-package-items table td a:hover,
    .dtlms-course-detail-news-item .dtlms-course-detail-news-details h5 a:hover,
    .type1.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-metadata i,
    .dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a,
    .type2.dtlms-courselist-item-wrapper .dtlms-coursedetail-price-details .dtlms-price-status:before,
    .type1.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-details-inner h5 a:hover,
    .type2.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-details-inner h5 a:hover,
    .type3.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-duration i,
    .type4.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-meta ul li span a:hover,
    .type4.dtlms-courselist-item-wrapper .dtlms-courselist-details-inner h5 a:hover,
    .type4.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-section .dtlms-coursedetail-price-details ins,
    .type5.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-details-inner h5 a:hover,
    .type5.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-bottom-section i,
    .type6.dtlms-courselist-item-wrapper .dtlms-courselist-tags,
    .type6.dtlms-courselist-item-wrapper .dtlms-courselist-tags a,
    .type6.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-bottom-section .dtlms-courselist-bottom-left-section i,
    .type7.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-right-section .dtlms-coursedetail-cart-details a:hover,
    .grid-item.type8.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-section .dtlms-courselist-metadata i,
    .type8.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-section .dtlms-coursedetail-price-details ins,
    .type9.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-section .dtlms-coursedetail-price-details ins,
    div[class*="classlist-item-wrapper"] div[class*="list-details"] h5 a:hover,
    .type2.dtlms-classlist-item-wrapper .dtlms-classlist-bottom-section-left .dtlms-classdetail-price-details ins,
    .type3.dtlms-classlist-item-wrapper .dtlms-classlist-details .dtlms-classlist-metadata p,
    .type3.dtlms-courselist-item-wrapper.list-item .dtlms-courselist-bottom-section .dtlms-coursedetail-price-details ins,
    .dtlms-login-form-container .dtlms-login-form p.tpl-forget-pwd a,
    .online-learning-carousel .type7.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-right-section .dtlms-coursedetail-cart-details a:hover,
    .dtlms-default-intro-section .dt-sc-button.transparent:hover,
    .dtlms-default-intro-section .dt-sc-button.transparent:hover span,
    .dtlms-course-category-item.type1.alternate-color-on-hover:hover h3 a,
    .type1.dtlms-classlist-item-wrapper .dtlms-instructor-item-meta-data p a:hover,
    .type3.dtlms-classlist-item-wrapper .dtlms-instructor-item-meta-data p a:hover,
    .type8.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-metadata-holder h5 a:hover,
    .dtlms-class-detail .dtlms-class-detail-author-title h5 a:hover,
    .type3.dtlms-courselist-item-wrapper .dtlms-courselist-author-description h5 a:hover,
    .type8.dtlms-courselist-item-wrapper .dtlms-courselist-author-description h5 a:hover,
    .type10.dtlms-courselist-item-wrapper .dtlms-courselist-author-description h5 a:hover,
    .dtlms-course-detail .dtlms-course-detail-author-title h5 a:hover,
    .dtlms-course-results-main-detail-wrapper .dtlms-author-details .dtlms-author-title h5 a:hover,
    .dtlms-class-results-main-detail-wrapper .dtlms-author-details .dtlms-author-title h5 a:hover,
    ul.dtlms-custom-login li a:hover,
    .type3.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a {
      color: rgb(20, 69, 47);
    }

    .dtlms-author-details .dtlms-author-title,
    .dt-sc-dark-bg ul.dtlms-custom-login.dt-skin-tertiary-color-on-hover a:hover {
      color: rgb(242, 248, 241);
    }

    div[class*="list-item-wrapper"] div[class*="list-thumb"] div[class$="list-overlay"] a.dtlms-button,
    .type9.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-section,
    .type10.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-left-section,
    /* Packages */
    .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagedetail-cart-details a.added_to_cart:hover {
      background-color: rgb(242, 248, 241);
    }

    .dtlms-login-form-container .dtlms-login-form .dtlms-login-form-holder p #wp-submit,
    .dtlms-total-items,
    .dtlms-total-items .dtlms-total-item-title,
    .dtlms-admin-dashboard table tr td a.dtlms-view-class-result,
    .dtlms-admin-dashboard table tr td a.dtlms-view-course-result,
    .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a,
    .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a,
    .page-template-default.page .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a,
    .page-template-default.page .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a,
    .dtlms-button,
    .dtlms-author-details .dtlms-author-description .dtlms-author-contact-details>li>a,
    .dtlms-payment-details .dtlms-item-status-details .dtlms-proceed-button>a,
    .dtlms-badge-certificate-holder a.dtlms-generate-certificate-content,
    .dtlms-view-class-result,
    .dtlms-view-course-result,
    .dtlms-social-logins-container a[class^="dtlms-social"],
    div[class$="share-holder"] ul li a,
    body[class*="single-dtlms"] #respond p.form-submit input[type="submit"],
    div[class*="listing-holder"] div[class*="display-filter"] a[class*="display-type"].active,
    div[class*="list-item-wrapper"] div[class*="list-thumb"] div[class$="list-overlay"] a.dtlms-button,
    div[class*="list-item-wrapper"] div[class*="list-details"] div[class*="list-metadata"] p>a,
    .dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-author-details .dtlms-author-description h5 a,
    div[class*="list-item-wrapper"] .dtlms-item-status-details>a,
    div[class*="list-item-wrapper"] .dtlms-item-status-details>.dtlms-button,
    div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button>a,
    div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button>.dtlms-button,
    .swiper-container-horizontal .dtlms-swiper-pagination-holder .dtlms-swiper-arrow-pagination a:hover,
    .dtlms-pagination.dtlms-ajax-pagination .prev-post a:hover,
    .dtlms-pagination.dtlms-ajax-pagination .next-post a:hover,
    .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li span,
    .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a:hover,
    .dtlms-tabs-horizontal-content #comments .reply .comment-reply-link,
    .dtlms-tabs-vertical-content #comments .reply .comment-reply-link,
    .dtlms-class-single #comments .reply .comment-reply-link,
    .dtlms-course-single #comments .reply .comment-reply-link,
    .dtlms-tabs-horizontal-content .dtlms-course-detail-group-section .action>.group-button a,
    .dtlms-tabs-vertical-content .dtlms-course-detail-group-section .action>.group-button a,
    .dtlms-timer-container>h4,
    div[class*="list-item-wrapper"] div[class*="list-thumb"] div[class$="list-overlay"] a.dtlms-button,
    .dtlms-course-detail .dtlms-coursedetail-cart-link,
    .dtlms-course-detail-author .dtlms-author-contact-details>li>a,
    .dtlms-questions-list-container .dtlms-questions-list .dtlms-question .dtlms-answer-hint span,
    .dtlms-course-detail.type1 .dtlms-toggle-group-set .dtlms-toggle.active a,
    .dtlms-course-detail.type1 .dtlms-toggle-group-set .dtlms-toggle.active:before,
    .dtlms-course-detail.type3 .dtlms-toggle-group-set .dtlms-toggle.active a,
    .dtlms-course-detail.type3 .dtlms-toggle-group-set .dtlms-toggle.active:before,
    .dtlms-class-detail.type1 .dtlms-toggle-group-set .dtlms-toggle.active a,
    .dtlms-class-detail.type1 .dtlms-toggle-group-set .dtlms-toggle.active:before,
    .dtlms-class-detail.type3 .dtlms-toggle-group-set .dtlms-toggle.active a,
    .dtlms-class-detail.type3 .dtlms-toggle-group-set .dtlms-toggle.active:before,
    .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a.current,
    .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a:hover,
    .dtlms-course-category-item.type10 .dtlms-course-category-meta-data h3 a,
    .dtlms-course-category-item.type10:hover .dtlms-course-category-meta-data>span,
    .dtlms-course-category-item.type7 h3 a,
    .dtlms-course-category-item.type7:hover .dtlms-category-total-items,
    .dtlms-package-detail .dtlms-package-items table th,
    .dtlms-course-detail .dtlms-coursedetail-cart-details .added_to_cart,
    .dtlms-payment-details .dtlms-packagedetail-cart-details>a.added_to_cart,
    .academy-carousel .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a:hover,
    .academy-carousel .dtlms-pagination.dtlms-ajax-pagination .prev-post a:hover,
    .academy-carousel .dtlms-pagination.dtlms-ajax-pagination .next-post a:hover,
    .dtlms-course-detail.type1 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a,
    .dtlms-course-detail.type1 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a:hover,
    .dtlms-class-detail.type1 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a,
    .dtlms-course-detail .dtlms-coursedetail-cart-link,
    .dtlms-course-detail-author .dtlms-author-contact-details>li>a,
    .dtlms-class-detail .dtlms-classdetail-cart-link,
    .dtlms-class-detail-author .dtlms-author-contact-details>li>a,
    .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a:hover,
    .dtlms-class-detail .dtlms-classdetail-cart-details .added_to_cart,
    input.dtlms-button,
    input.dtlms-button[type="button"],
    input.dtlms-button[type="submit"],
    .dtlms-classlist-item-wrapper .dtlms-class-listing-featured,
    .type10.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-metadata p,
    .type10.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-metadata p a,
    .type10.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-right-section ins,
    .type10.dtlms-courselist-item-wrapper .dtlms-price-status.dtlms-free,
    .type7.dtlms-courselist-item-wrapper .dtlms-courselist-tags a,
    .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagelist-inclusion p,
    .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagedetail-cart-details a,
    .dtlms-instructor-item.type10 .dtlms-team-social-links ul li a,
    body[class*="single-dtlms"] .dtlms-course-detail-media-attachment th,
    div[class*="dynamic-section-holder"] div[class$="item-details"]>span,
    .dtlms-courses-listing-holder input[type="submit"],
    .dtlms-courses-listing-holder input[type="reset"],
    .dtlms-courses-listing-holder button,
    .dtlms-courses-listing-holder input[type="button"],
    .dtlms-classes-listing-holder input[type="submit"],
    .dtlms-classes-listing-holder input[type="reset"],
    .dtlms-classes-listing-holder button,
    .dtlms-classes-listing-holder input[type="button"],
    .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td,
    .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-present,
    .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-has-events.tribe-mini-calendar-today,
    .dtlms-course-detail .tribe-mini-calendar .tribe-events-has-events.tribe-events-present a:hover,
    .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar td.tribe-events-has-events.tribe-mini-calendar-today a:hover,
    .dtlms-course-detail-media-attachment th,
    .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td,
    .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-present,
    .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-has-events.tribe-mini-calendar-today,
    .dtlms-class-detail .tribe-mini-calendar .tribe-events-has-events.tribe-events-present a:hover,
    .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar td.tribe-events-has-events.tribe-mini-calendar-today a:hover,
    .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td a,
    .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td a,
    #dtlms-course-curriculum-popup .dtlms-curriculum-details .dtlms-curriculum-detailed-links .dtlms-curriculum-list li .dtlms-curriculum-meta-items .dtlms-curriculum-meta-preview,
    .dt-sc-button.alternate-bg-color.filled:hover,
    #dtlms-course-curriculum-popup.dtlms-course-curriculum-popup-assignment .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>form.formAssignment .dtlms-add-upload-assignment-field,
    .dtlms-curriculum-list .dtlms-curriculum-meta-preview,
    .wpb_column.dtlms-slider-overlay .dtlms-courses-listing-holder .chosen-container .chosen-results li.active-result.highlighted,
    .dtlms-course-detail .dtlms-course-detail-content .dtlms-coursedetail-cart-details .dtlms-button:hover,
    .dtlms-class-detail .dtlms-class-detail-content .dtlms-classdetail-cart-details .dtlms-button:hover,
    .type2:not(.dtlms_classes) .dt-sc-toggle-frame h5.dt-sc-toggle-accordion.active a,
    .type2:not(.dtlms_classes) .dt-sc-toggle-frame h5.dt-sc-toggle.active a,
    .dt-sc-button.filled.dt-sc-skin-highlight,
    .dt-sc-button.filled.dt-skin-secondary-bg:hover,
    .type8.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover,
    .type1.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover,
    .dtlms-class-detail.type4 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a.current,
    .dtlms-class-detail.type4 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a:hover,
    #avatar-crop-actions a.button,
    .dt-sc-portfolio-sorting.type9 a.active-sort,
    .dt-sc-portfolio-sorting.type9 a:hover,
    .dt-sc-newsletter-section .dt-sc-subscribe-frm input[type="submit"],
    .dt-sc-team.hide-details-show-on-hover.dt-sc-one-course-team li a,
    .dtlms-course-category-item.type5 .dtlms-category-total-items,
    .page-template-default.page table.dtlms-custom-table td a.dtlms-button.dtlms-view-class-result,
    .page-template-default.page table.dtlms-custom-table td a.dtlms-button.dtlms-view-course-result,
    .dtlms-course-category-item.type5 .dtlms-course-category-meta-data h3 a,
    .dtlms-class-detail.type1 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a:hover,
    .type5.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover,
    div[class$="details-holder"] .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li>span.current,
    .dtlms-quiz-features-list~.dtlms-info-box,
    #dtlms-course-curriculum-popup.dtlms-course-curriculum-popup-quiz .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>div.dtlms-quiz-details-container .dtlms-info-box strong,
    #dtlms-course-curriculum-popup.dtlms-course-curriculum-popup-lesson .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>div.dtlms-lesson-details-container .dtlms-info-box strong,
    .dtlms-quiz-questions .dtlms-boolean input[type="radio"]:checked+label,
    .dtlms-quiz-questions ul:not(.dtlms-question-image-options) li input[type="radio"]:checked+label,
    .type2.dtlms-packagelist-item-wrapper .dtlms-packagedetail-cart-details a:hover,
    .dtlms-course-result-overview .dtlms-button,
    .dtlms-class-result-overview .dtlms-button,
    .type10.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-right-section .dtlms-coursedetail-price-details ins span,
    .dtlms-payment-details>.dtlms-packagedetail-cart-details>a,
    .dtlms-payment-details>.dtlms-packagedetail-cart-details>.dtlms-button,
    a.dtlms-button,
    a.dtlms-button:visited,
    #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>div.dtlms-post-quiz-msg,
    #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder>div.dtlms-info-box,
    .dtlms-curriculum-content-holder .dtlms-note,
    .dtlms-assignment-details-container .dtlms-info-box,
    .type3.dtlms-classlist-item-wrapper .dtlms-classlist-bottom-section-right a,
    .dtlms-courselist-item-wrapper.type10 .dtlms-courselist-bottom-section .dtlms-coursedetail-price-details del,
    .dtlms-courselist-item-wrapper.type10 .dtlms-courselist-bottom-section .dtlms-coursedetail-price-details del span,
    .dtlms-quiz-questions ul:not(.dtlms-question-image-options) li input[type="checkbox"]:checked+label,
    #dtlms-course-result-popup .dtlms-course-result-popup-container .dtlms-three-fifth .dtlms-curriculum-assignment-holder ul.dtlms-assignment-submission li .dtlms-four-fifth>ul>li a,
    .dtlms-course-detail.type3 .dtlms-course-detail-content .dtlms-coursedetail-cart-details a.dtlms-login-link,
    .dtlms-class-detail.type2 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a,
    .dtlms-class-detail.type4 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a,
    .dtlms-course-detail.type2 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a,
    .dtlms-course-detail.type4 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a {
      color: rgb(34, 40, 30);
    }

    .type2:not(.dtlms_classes) .dt-sc-toggle-frame h5.dt-sc-toggle-accordion.active:after,
    .dtlms-quiz-questions .dtlms-boolean input[type="radio"]:checked+label:before,
    .dtlms-quiz-questions ul:not(.dtlms-question-image-options) li input[type="radio"]:checked+label:before,
    .dtlms-quiz-questions ul:not(.dtlms-question-image-options) li input[type="checkbox"]:checked+label:before {
      background-color: rgb(34, 40, 30);
    }

    .dtlms-course-detail .dtlms-coursedetail-cart-link:hover,
    .dtlms-course-detail-author .dtlms-author-contact-details>li>a:hover,
    .dtlms-class-detail .dtlms-classdetail-cart-link:hover,
    .dtlms-class-detail-author .dtlms-author-contact-details>li>a:hover,
    .dtlms-course-category-item.type10 .dtlms-course-category-meta-data>span,
    .dtlms-course-category-item.type10:hover .dtlms-course-category-meta-data h3 a,
    .dtlms-course-detail .dtlms-coursedetail-cart-details .added_to_cart:hover,
    .dtlms-payment-details .dtlms-packagedetail-cart-details>a.added_to_cart:hover,
    input.dtlms-button:hover,
    input.dtlms-button[type="button"]:hover,
    input.dtlms-button[type="submit"]:hover,
    .type2.dtlms-classlist-item-wrapper .dtlms-classlist-metadata,
    .type7.dtlms-courselist-item-wrapper .dtlms-courselist-duration,
    .dtlms-class-detail .dtlms-classdetail-cart-details .added_to_cart:hover,
    .dtlms-courses-listing-holder input[type="submit"]:hover,
    .dtlms-courses-listing-holder input[type="reset"]:hover,
    .dtlms-courses-listing-holder button:hover,
    .dtlms-courses-listing-holder input[type="button"]:hover,
    .dtlms-classes-listing-holder input[type="submit"]:hover,
    .dtlms-classes-listing-holder input[type="reset"]:hover,
    .dtlms-classes-listing-holder button:hover,
    .dtlms-classes-listing-holder input[type="button"]:hover,
    .dt-sc-button.filled.alternate-bg-color,
    .type8.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a,
    .dtlms-course-detail .dtlms-course-detail-content .dtlms-coursedetail-cart-details .dtlms-button,
    .dtlms-class-detail .dtlms-class-detail-content .dtlms-classdetail-cart-details .dtlms-button,
    .dt-sc-button.filled.dt-skin-secondary-bg,
    .dt-sc-button.filled.dt-sc-skin-highlight:hover,
    .dt-header-menu ul.dt-primary-nav li.has-mega-menu div[class*="list-item-wrapper"].type1 div[class*="list-details"] a.dtlms-button:hover,
    #avatar-crop-actions a.button:hover,
    .dt-sc-newsletter-section .dt-sc-subscribe-frm input[type="submit"]:hover,
    .dt-sc-team.hide-details-show-on-hover.dt-sc-one-course-team li a:hover,
    .dt-sc-university-tab ul.dt-sc-tabs-horizontal-frame>li>a.current,
    .dt-sc-university-tab ul.dt-sc-tabs-horizontal-frame>li>a.current:hover,
    .page-template-default.page table.dtlms-custom-table td a.dtlms-button.dtlms-view-class-result:hover,
    .page-template-default.page table.dtlms-custom-table td a.dtlms-button.dtlms-view-course-result:hover,
    .type7.dtlms-courselist-item-wrapper .dtlms-courselist-tags a:hover,
    .dtlms-course-result-overview .dtlms-button:hover,
    .dtlms-class-result-overview .dtlms-button:hover,
    body[class*="single-dtlms"] table td#today,
    .type10.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-metadata p a:hover,
    .type2.dtlms-courselist-item-wrapper .dtlms-coursedetail-price-details span,
    .type2.dtlms-courselist-item-wrapper .dtlms-coursedetail-price-details del,
    .type5.dtlms-courselist-item-wrapper .dtlms-coursedetail-price-details span,
    .type5.dtlms-courselist-item-wrapper .dtlms-coursedetail-price-details del,
    .type6.dtlms-courselist-item-wrapper .dtlms-coursedetail-price-details ins span,
    .type9.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-section .dtlms-coursedetail-price-details del,
    .type9.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-section .dtlms-coursedetail-price-details span,
    .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-price-details del,
    .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-price-details .amount,
    .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-price-details del,
    .dtlms-payment-details>.dtlms-packagedetail-cart-details>a:hover,
    .dtlms-payment-details>.dtlms-packagedetail-cart-details>.dtlms-button:hover,
    .dtlms-instructor-item.type5.default .dtlms-instructor-item-meta-data .dtlms-team-social-links ul li a,
    a.dtlms-button:hover,
    a.dtlms-button:focus {
      color: rgb(255, 255, 255);
    }

    .dtlms,
    .type10.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a {
      color: rgb(242, 248, 241);
    }
  </style>
  <link rel="stylesheet" id="google-fonts-1-css"
    href="../css-4?family=DM+Sans%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CManrope%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.8.3"
    type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-icons-shared-0-css"
    href="wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.15.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="elementor-icons-fa-solid-css"
    href="wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.15.3" type="text/css"
    media="all" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
  <script type="text/javascript" src="wp-includes/js/jquery/jquery.min.js?ver=3.7.1" id="jquery-core-js"></script>
  <script type="text/javascript" src="wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1"
    id="jquery-migrate-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.7.0-wc.9.1.4"
    id="jquery-blockui-js" defer="defer" data-wp-strategy="defer"></script>
  <script type="text/javascript" id="wc-add-to-cart-js-extra">
    /* <![CDATA[ */
    var wc_add_to_cart_params = {
      ajax_url: "\/lms\/wp-admin\/admin-ajax.php",
      wc_ajax_url: "\/lms\/?wc-ajax=%%endpoint%%",
      i18n_view_cart: "View cart",
      cart_url: "https:\/\/lizza.wpengine.com\/lms\/cart\/",
      is_cart: "",
      cart_redirect_after_add: "no",
    };
    /* ]]> */
  </script>
  <script type="text/javascript" src="wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=9.1.4"
    id="wc-add-to-cart-js" defer="defer" data-wp-strategy="defer"></script>
  <script type="text/javascript"
    src="wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4-wc.9.1.4" id="js-cookie-js"
    defer="defer" data-wp-strategy="defer"></script>
  <script type="text/javascript" id="woocommerce-js-extra">
    /* <![CDATA[ */
    var woocommerce_params = {
      ajax_url: "\/lms\/wp-admin\/admin-ajax.php",
      wc_ajax_url: "\/lms\/?wc-ajax=%%endpoint%%",
    };
    /* ]]> */
  </script>
  <script type="text/javascript" src="wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=9.1.4"
    id="woocommerce-js" defer="defer" data-wp-strategy="defer"></script>
  <script type="text/javascript" id="wc-cart-fragments-js-extra">
    /* <![CDATA[ */
    var wc_cart_fragments_params = {
      ajax_url: "\/lms\/wp-admin\/admin-ajax.php",
      wc_ajax_url: "\/lms\/?wc-ajax=%%endpoint%%",
      cart_hash_key: "wc_cart_hash_d79814e9b660126373daa0caf4c2c422",
      fragment_name: "wc_fragments_d79814e9b660126373daa0caf4c2c422",
      request_timeout: "5000",
    };
    /* ]]> */
  </script>
  <script type="text/javascript" src="wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=9.1.4"
    id="wc-cart-fragments-js" defer="defer" data-wp-strategy="defer"></script>
  <script type="text/javascript" src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/chart.min.js?ver=6.8.3"
    id="dtlms-chart-js"></script>
  <link rel="https://api.w.org/" href="wp-json/" />
  <link rel="alternate" title="JSON" type="application/json" href="wp-json/wp/v2/pages/21714" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://lizza.wpengine.com/lms/xmlrpc.php?rsd" />
  <link rel="canonical" href="index" />
  <link rel="shortlink" href="index" />
  <link rel="alternate" title="oEmbed (JSON)" type="application/json+oembed"
    href="wp-json/oembed/1.0/embed?url=https%3A%2F%2Flizza.wpengine.com%2Flms%2F" />
  <link rel="alternate" title="oEmbed (XML)" type="text/xml+oembed"
    href="wp-json/oembed/1.0/embed-1?url=https%3A%2F%2Flizza.wpengine.com%2Flms%2F&#038;format=xml" />
  <style type="text/css" media="all" id="wcs_styles"></style>
  <noscript>
    <style>
      .woocommerce-product-gallery {
        opacity: 1 !important;
      }
    </style>
  </noscript>
  <meta name="generator"
    content="Elementor 3.23.3; features: e_optimized_css_loading, additional_custom_breakpoints, e_lazyload; settings: css_print_method-external, google_font-enabled, font_display-swap" />
  <link rel="preconnect" href="//code.tidio.co" />
  <style>
    .e-con.e-parent:nth-of-type(n + 4):not(.e-lazyloaded):not(.e-no-lazyload),
    .e-con.e-parent:nth-of-type(n + 4):not(.e-lazyloaded):not(.e-no-lazyload) * {
      background-image: none !important;
    }

    @media screen and (max-height: 1024px) {

      .e-con.e-parent:nth-of-type(n + 3):not(.e-lazyloaded):not(.e-no-lazyload),
      .e-con.e-parent:nth-of-type(n + 3):not(.e-lazyloaded):not(.e-no-lazyload) * {
        background-image: none !important;
      }
    }

    @media screen and (max-height: 640px) {

      .e-con.e-parent:nth-of-type(n + 2):not(.e-lazyloaded):not(.e-no-lazyload),
      .e-con.e-parent:nth-of-type(n + 2):not(.e-lazyloaded):not(.e-no-lazyload) * {
        background-image: none !important;
      }
    }
  </style>
  <style class="wp-fonts-local" type="text/css">
    @font-face {
      font-family: Inter;
      font-style: normal;
      font-weight: 300 900;
      font-display: fallback;
      src: url("wp-content/plugins/woocommerce/assets/fonts/Inter-VariableFont_slnt,wght.woff2") format("woff2");
      font-stretch: normal;
    }

    @font-face {
      font-family: Cardo;
      font-style: normal;
      font-weight: 400;
      font-display: fallback;
      src: url("wp-content/plugins/woocommerce/assets/fonts/cardo_normal_400.woff2") format("woff2");
    }
  </style>
  <link rel="icon" href="wp-content/uploads/sites/12/2023/11/Lizza-Fav-Icon-1.png" sizes="32x32" />
  <link rel="icon" href="wp-content/uploads/sites/12/2023/11/Lizza-Fav-Icon-1.png" sizes="192x192" />
  <link rel="apple-touch-icon" href="wp-content/uploads/sites/12/2023/11/Lizza-Fav-Icon-1.png" />
  <meta name="msapplication-TileImage"
    content="https://lizza.wpengine.com/lms/wp-content/uploads/sites/12/2023/11/Lizza-Fav-Icon-1.png" />
  <style type="text/css" id="wp-custom-css">
    div[class*="list-item-wrapper"] div[class*="list-thumb"]:before {
      z-index: 0 !important;
    }

    .scroll_tabs_container .scroll_tab_left_button::before {
      position: relative;
      display: block;
      left: -40px;
    }

    #dtlms-course-curriculum-popup .dtlms-curriculum-details .dtlms-curriculum-detailed-links .dtlms-toggle-group-set .dtlms-toggle-content {
      margin: -5px;
    }

    @media screen and (max-width: 1280px) {
      .mobile-menu ul li.has-mega-menu ul li.menu-item-object-wdt_mega_menus .elementor-heading-title {
        margin: 0;
      }
    }
  </style>
</head>

<body
  class="home wp-singular page-template page-template-elementor_header_footer page page-id-21714 wp-theme-lizza-lms theme-lizza-lms lizza-plus-1.0.2 lizza-pro-1.0.0 woocommerce-no-js elementor-default elementor-template-full-width elementor-kit-6 elementor-page elementor-page-21714">
  <div class="pre-loader loader1">
    <div class="loader-inner">
      <span class="loader-text"></span>
    </div>
  </div>
  <a class="skip-link screen-reader-text" href="#main">Skip to content</a>

  <!-- **Wrapper** -->
  <div class="wrapper">
    <!-- ** Inner Wrapper ** -->
    <div class="inner-wrapper">
      <!-- ** Header Wrapper ** -->
      <div id="header-wrapper" class="header-top-relative">
        <!-- **Header** -->
        <header id="header">
          <div class="wdt-elementor-container-fluid">
            <div id="header-1090" class="wdt-header-tpl header-1090">
              <div data-elementor-type="wp-post" data-elementor-id="1090" class="elementor elementor-1090">
                <section
                  class="elementor-section elementor-top-section elementor-element elementor-element-200f6f46 elementor-section-full_width sticky-header animated-fast elementor-section-height-default elementor-section-height-default elementor-invisible"
                  data-id="200f6f46" data-element_type="section"
                  data-settings='{"background_background":"classic","animation":"fadeIn","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                  <div class="elementor-container elementor-column-gap-no">
                    <div
                      class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-56dc910e"
                      data-id="56dc910e" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                        <div
                          class="elementor-element elementor-element-4cf1ce91 elementor-widget elementor-widget-wdt-logo"
                          data-id="4cf1ce91" data-element_type="widget" data-settings='{"wdt_animation_effect":"none"}'
                          data-widget_type="wdt-logo.default">
                          <div class="elementor-widget-container">
                            <div id="lizza-4cf1ce91" class="wdt-logo-container">
                              <a href="/" rel="home"><img src="wp-content/themes/lizza-lms/assets/images/logo.png"
                                  alt="Academixsuite" /></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-56d6a6 elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile"
                      data-id="56d6a6" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                        <div
                          class="elementor-element elementor-element-382cb852 elementor-align-center elementor-tablet_extra-align-right elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-widget elementor-widget-wdt-header-menu"
                          data-id="382cb852" data-element_type="widget" data-settings='{"wdt_animation_effect":"none"}'
                          data-widget_type="wdt-header-menu.default">
                          <div class="elementor-widget-container">
                            <div class="wdt-header-menu" data-menu="2">
                              <div class="menu-container">
                                <ul id="menu-wdt-lizza-lms-main-header-1" class="wdt-primary-nav" data-menu="2">
                                  <li class="close-nav">
                                    <a href="javascript:void(0);"></a>
                                  </li>
                                  <li
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-21714 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-21927 menu-item-depth-0">
                                    <a href="/" aria-current="page"><span data-text="%1$s">Home</span></a>
                                  </li>
                                  <li
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-22162 menu-item-depth-0">
                                    <a href="about-us/"><span data-text="%1$s">About Us</span></a>
                                  </li>
                                  <li
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children has-mega-menu menu-item-22740 menu-item-depth-0">
                                    <a href="/use-cases/"><span data-text="%1$s">Use Cases</span></a>
                                    <ul class="sub-menu is-hidden">
                                      <li class="close-nav">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="go-back">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="see-all"></li>
                                      <li
                                        class="menu-item menu-item-type-post_type menu-item-object-wdt_mega_menus menu-item-22741 menu-item-depth-1">
                                        <div data-elementor-type="wp-post" data-elementor-id="22685"
                                          class="elementor elementor-22685">
                                          <section
                                            class="elementor-section elementor-top-section elementor-element elementor-element-4d062a0 elementor-section-full_width wdt-section-wrap-col elementor-section-height-default elementor-section-height-default">
                                            <div class="elementor-container elementor-column-gap-no">
                                              <!-- Spacer Column -->
                                              <div
                                                class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-f563e52 wdt-overflow-hidden">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-51619df elementor-widget elementor-widget-spacer">
                                                    <div class="elementor-widget-container">
                                                      <div class="elementor-spacer">
                                                        <div class="elementor-spacer-inner"></div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                              <!-- School Types -->
                                              <div
                                                class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-1821fec">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-5a65e12 elementor-widget elementor-widget-heading">
                                                    <div class="elementor-widget-container">
                                                      <h6 class="elementor-heading-title elementor-size-default">
                                                        School Types
                                                      </h6>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-e102a54 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list">
                                                    <div class="elementor-widget-container">
                                                      <ul class="elementor-icon-list-items">
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/k12-schools/">
                                                            <span class="elementor-icon-list-text">K-12
                                                              Schools</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/universities/">
                                                            <span class="elementor-icon-list-text">Universities &
                                                              Colleges</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/vocational/">
                                                            <span class="elementor-icon-list-text">Vocational &
                                                              Training
                                                              Centers</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/international/">
                                                            <span class="elementor-icon-list-text">International
                                                              Schools</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/online-academies/">
                                                            <span class="elementor-icon-list-text">Online
                                                              Academies</span>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                              <!-- Administrative Features -->
                                              <div
                                                class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-6a738f1">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-02fe88d elementor-widget elementor-widget-heading">
                                                    <div class="elementor-widget-container">
                                                      <h6 class="elementor-heading-title elementor-size-default">
                                                        Administrative
                                                        Features
                                                      </h6>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-6bd8ab5 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list">
                                                    <div class="elementor-widget-container">
                                                      <ul class="elementor-icon-list-items">
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/admissions/">
                                                            <span class="elementor-icon-list-text">Admissions &
                                                              Enrollment</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/finance/">
                                                            <span class="elementor-icon-list-text">Fee Management
                                                              & Billing</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/timetable/">
                                                            <span class="elementor-icon-list-text">Timetable &
                                                              Scheduling</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/inventory/">
                                                            <span class="elementor-icon-list-text">Inventory &
                                                              Resource
                                                              Management</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/transport/">
                                                            <span class="elementor-icon-list-text">Transport
                                                              Management</span>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                              <!-- Academic Features -->
                                              <div
                                                class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-13ed450">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-d73d2ba elementor-widget elementor-widget-heading">
                                                    <div class="elementor-widget-container">
                                                      <h6 class="elementor-heading-title elementor-size-default">
                                                        Academic Features
                                                      </h6>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-1a0237f elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list">
                                                    <div class="elementor-widget-container">
                                                      <ul class="elementor-icon-list-items">
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/lms/">
                                                            <span class="elementor-icon-list-text">Learning
                                                              Management
                                                              System</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/assessment/">
                                                            <span class="elementor-icon-list-text">Assessment &
                                                              Grading</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/attendance/">
                                                            <span class="elementor-icon-list-text">Attendance
                                                              Tracking</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/library/">
                                                            <span class="elementor-icon-list-text">Digital Library
                                                              &
                                                              Resources</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/examination/">
                                                            <span class="elementor-icon-list-text">Examination
                                                              Management</span>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-fe977a7 elementor-widget elementor-widget-heading">
                                                    <div class="elementor-widget-container">
                                                      <h6 class="elementor-heading-title elementor-size-default">
                                                        Communication
                                                      </h6>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-a46c289 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list">
                                                    <div class="elementor-widget-container">
                                                      <ul class="elementor-icon-list-items">
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/parent-portal/">
                                                            <span class="elementor-icon-list-text">Parent-Teacher
                                                              Communication</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/notifications/">
                                                            <span class="elementor-icon-list-text">Notifications &
                                                              Alerts</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/messaging/">
                                                            <span class="elementor-icon-list-text">Internal
                                                              Messaging
                                                              System</span>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                              <!-- Multi-Tenant Features -->
                                              <div
                                                class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-6e0efa7">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-d04f289 elementor-widget elementor-widget-heading">
                                                    <div class="elementor-widget-container">
                                                      <h6 class="elementor-heading-title elementor-size-default">
                                                        Multi-Tenant Features
                                                      </h6>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-cac9c44 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list">
                                                    <div class="elementor-widget-container">
                                                      <ul class="elementor-icon-list-items">
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/branch-management/">
                                                            <span class="elementor-icon-list-text">Branch & Campus
                                                              Management</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/customization/">
                                                            <span class="elementor-icon-list-text">Brand
                                                              Customization</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/data-isolation/">
                                                            <span class="elementor-icon-list-text">Data Isolation
                                                              & Security</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/scalability/">
                                                            <span class="elementor-icon-list-text">Scalability &
                                                              Performance</span>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-100ca10 elementor-widget elementor-widget-heading">
                                                    <div class="elementor-widget-container">
                                                      <h6 class="elementor-heading-title elementor-size-default">
                                                        Integration
                                                      </h6>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-f6dde93 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list">
                                                    <div class="elementor-widget-container">
                                                      <ul class="elementor-icon-list-items">
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/payment-gateways/">
                                                            <span class="elementor-icon-list-text">Payment Gateway
                                                              Integration</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/sms-email/">
                                                            <span class="elementor-icon-list-text">SMS & Email
                                                              Integration</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/use-cases/api/">
                                                            <span class="elementor-icon-list-text">API &
                                                              Third-Party
                                                              Integration</span>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                        </div>
                                      </li>
                                    </ul>
                                  </li>
                                  <li
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children has-mega-menu menu-item-21675 menu-item-depth-0">
                                    <a href="/portals/"><span data-text="%1$s">Portals</span></a>
                                    <ul class="sub-menu is-hidden">
                                      <li class="close-nav">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="go-back">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="see-all"></li>
                                      <li
                                        class="menu-item menu-item-type-post_type menu-item-object-wdt_mega_menus menu-item-22440 menu-item-depth-1">
                                        <div data-elementor-type="wp-post" data-elementor-id="21678"
                                          class="elementor elementor-21678">
                                          <section
                                            class="elementor-section elementor-top-section elementor-element elementor-element-876ec7d elementor-section-full_width elementor-section-height-default elementor-section-height-default">
                                            <div class="elementor-container elementor-column-gap-no">
                                              <!-- School Admin Portal -->
                                              <div
                                                class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-424d95d">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-d81482e elementor-widget elementor-widget-heading">
                                                    <div class="elementor-widget-container">
                                                      <h6 class="elementor-heading-title elementor-size-default">
                                                        School Admin Portal
                                                      </h6>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-eca0b8f elementor-widget elementor-widget-wdt-header-menu">
                                                    <div class="elementor-widget-container">
                                                      <div class="wdt-header-menu" data-menu="45">
                                                        <div class="menu-container">
                                                          <ul id="menu-wdt-lms-course-menu-5" class="wdt-primary-nav"
                                                            data-menu="45">
                                                            <li class="close-nav">
                                                              <a href="javascript:void(0);"></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22718 menu-item-depth-0">
                                                              <a href="/admin/dashboard/"><span
                                                                  data-text="%1$s">Dashboard</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22719 menu-item-depth-0">
                                                              <a href="/admin/students/"><span data-text="%1$s">Student
                                                                  Management</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22720 menu-item-depth-0">
                                                              <a href="/admin/staff/"><span data-text="%1$s">Staff
                                                                  Management</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22721 menu-item-depth-0">
                                                              <a href="/admin/finance/"><span data-text="%1$s">Finance &
                                                                  Billing</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22722 menu-item-depth-0">
                                                              <a href="/admin/reports/"><span data-text="%1$s">Reports &
                                                                  Analytics</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22723 menu-item-depth-0">
                                                              <a href="/admin/settings/"><span data-text="%1$s">System
                                                                  Settings</span></a>
                                                            </li>
                                                          </ul>
                                                          <div class="sub-menu-overlay"></div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                              <!-- Teacher's Portal -->
                                              <div
                                                class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-ac8de60">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-3c1a67b elementor-widget elementor-widget-heading">
                                                    <div class="elementor-widget-container">
                                                      <h6 class="elementor-heading-title elementor-size-default">
                                                        Teacher's Portal
                                                      </h6>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-c0b25d0 elementor-widget elementor-widget-wdt-header-menu">
                                                    <div class="elementor-widget-container">
                                                      <div class="wdt-header-menu" data-menu="48">
                                                        <div class="menu-container">
                                                          <ul id="menu-wdt-lms-course-menu-6" class="wdt-primary-nav"
                                                            data-menu="48">
                                                            <li class="close-nav">
                                                              <a href="javascript:void(0);"></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22724 menu-item-depth-0">
                                                              <a href="/teacher/dashboard/"><span
                                                                  data-text="%1$s">Teacher
                                                                  Dashboard</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22725 menu-item-depth-0">
                                                              <a href="/teacher/attendance/"><span
                                                                  data-text="%1$s">Attendance
                                                                  Management</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22726 menu-item-depth-0">
                                                              <a href="/teacher/grading/"><span data-text="%1$s">Grading
                                                                  &
                                                                  Assessment</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22727 menu-item-depth-0">
                                                              <a href="/teacher/lesson-plans/"><span
                                                                  data-text="%1$s">Lesson
                                                                  Plans</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22728 menu-item-depth-0">
                                                              <a href="/teacher/communications/"><span
                                                                  data-text="%1$s">Communications</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22729 menu-item-depth-0">
                                                              <a href="/teacher/resources/"><span
                                                                  data-text="%1$s">Teaching
                                                                  Resources</span></a>
                                                            </li>
                                                          </ul>
                                                          <div class="sub-menu-overlay"></div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                              <!-- Student's Portal -->
                                              <div
                                                class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-60043e9">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-e5cf5d9 elementor-widget elementor-widget-heading">
                                                    <div class="elementor-widget-container">
                                                      <h6 class="elementor-heading-title elementor-size-default">
                                                        Student's Portal
                                                      </h6>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-c789076 elementor-widget elementor-widget-wdt-header-menu">
                                                    <div class="elementor-widget-container">
                                                      <div class="wdt-header-menu" data-menu="46">
                                                        <div class="menu-container">
                                                          <ul id="menu-wdt-lms-course-menu-7" class="wdt-primary-nav"
                                                            data-menu="46">
                                                            <li class="close-nav">
                                                              <a href="javascript:void(0);"></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22730 menu-item-depth-0">
                                                              <a href="/student/dashboard/"><span
                                                                  data-text="%1$s">Student
                                                                  Dashboard</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22731 menu-item-depth-0">
                                                              <a href="/student/timetable/"><span data-text="%1$s">Class
                                                                  Timetable</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22732 menu-item-depth-0">
                                                              <a href="/student/grades/"><span data-text="%1$s">Grades &
                                                                  Results</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22733 menu-item-depth-0">
                                                              <a href="/student/assignments/"><span
                                                                  data-text="%1$s">Assignments</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22734 menu-item-depth-0">
                                                              <a href="/student/resources/"><span
                                                                  data-text="%1$s">Learning
                                                                  Resources</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22735 menu-item-depth-0">
                                                              <a href="/student/attendance/"><span
                                                                  data-text="%1$s">Attendance
                                                                  Record</span></a>
                                                            </li>
                                                          </ul>
                                                          <div class="sub-menu-overlay"></div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                              <!-- Parent's Portal -->
                                              <div
                                                class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-70fd10a">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-5b45b4b elementor-widget elementor-widget-heading">
                                                    <div class="elementor-widget-container">
                                                      <h6 class="elementor-heading-title elementor-size-default">
                                                        Parent's Portal
                                                      </h6>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-f66d92c elementor-widget elementor-widget-wdt-header-menu">
                                                    <div class="elementor-widget-container">
                                                      <div class="wdt-header-menu" data-menu="47">
                                                        <div class="menu-container">
                                                          <ul id="menu-wdt-lms-course-menu-8" class="wdt-primary-nav"
                                                            data-menu="47">
                                                            <li class="close-nav">
                                                              <a href="javascript:void(0);"></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22736 menu-item-depth-0">
                                                              <a href="/parent/dashboard/"><span data-text="%1$s">Parent
                                                                  Dashboard</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22737 menu-item-depth-0">
                                                              <a href="/parent/child-progress/"><span
                                                                  data-text="%1$s">Child's
                                                                  Progress</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22738 menu-item-depth-0">
                                                              <a href="/parent/attendance/"><span
                                                                  data-text="%1$s">Attendance
                                                                  Tracking</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22739 menu-item-depth-0">
                                                              <a href="/parent/fees/"><span data-text="%1$s">Fee
                                                                  Payments</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22740 menu-item-depth-0">
                                                              <a href="/parent/communications/"><span
                                                                  data-text="%1$s">School
                                                                  Communications</span></a>
                                                            </li>
                                                            <li
                                                              class="menu-item menu-item-type-post_type menu-item-object-dtlms_courses menu-item-22741 menu-item-depth-0">
                                                              <a href="/parent/events/"><span data-text="%1$s">School
                                                                  Events</span></a>
                                                            </li>
                                                          </ul>
                                                          <div class="sub-menu-overlay"></div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                          <!-- Spacer Section -->
                                          <section
                                            class="elementor-section elementor-top-section elementor-element elementor-element-e2b3bfb elementor-section-full_width elementor-section-height-default elementor-section-height-default">
                                            <div class="elementor-container elementor-column-gap-no">
                                              <div
                                                class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-8318aad">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-d1b0479 elementor-widget elementor-widget-spacer">
                                                    <div class="elementor-widget-container">
                                                      <div class="elementor-spacer">
                                                        <div class="elementor-spacer-inner"></div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div
                                                class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-46d7a31">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-46a44b0 elementor-widget elementor-widget-spacer">
                                                    <div class="elementor-widget-container">
                                                      <div class="elementor-spacer">
                                                        <div class="elementor-spacer-inner"></div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div
                                                class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-ac6d48d">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-b278701 elementor-widget elementor-widget-spacer">
                                                    <div class="elementor-widget-container">
                                                      <div class="elementor-spacer">
                                                        <div class="elementor-spacer-inner"></div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                        </div>
                                      </li>
                                    </ul>
                                  </li>

                                  <li
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-22138 menu-item-depth-0">
                                    <a href="blog-without-sidebar/"><span data-text="%1$s">Blog</span></a>
                                  </li>

                                  <li
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-35 menu-item-depth-0">
                                    <a href="contact/"><span data-text="%1$s">Contact</span></a>
                                  </li>
                                </ul>
                                <div class="sub-menu-overlay"></div>
                              </div>
                              <div class="mobile-nav-container mobile-nav-offcanvas-right" data-menu="2">
                                <a href="#" class="menu-trigger menu-trigger-icon"
                                  data-menu="2"><i></i><span>Menu</span></a>
                                <div class="mobile-menu" data-menu="2"></div>
                                <div class="overlay"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-7c784c1d"
                      data-id="7c784c1d" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                        <div
                          class="elementor-element elementor-element-3346252a elementor-align-right elementor-widget__width-auto elementor-hidden-mobile elementor-widget elementor-widget-wdt-header-icons"
                          data-id="3346252a" data-element_type="widget" data-settings='{"wdt_animation_effect":"none"}'
                          data-widget_type="wdt-header-icons.default">
                          <div class="elementor-widget-container">
                            <div class="woocommerce">
                              <div class="wdt-header-icons-list">
                                <div class="wdt-header-icons-list-item search-item search-overlay">
                                  <div class="wdt-search-menu-icon">
                                    <a href="javascript:void(0)" class="wdt-search-icon"><span><i><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewbox="0 0 100 100" style="
                                                enable-background: new 0 0 100
                                                  100;
                                              " xml:space="preserve">
                                            <style type="text/css">
                                              .si0 {
                                                fill: none;
                                                stroke: currentcolor;
                                                stroke-width: 8;
                                                stroke-linecap: round;
                                                stroke-linejoin: round;
                                                stroke-miterlimit: 10;
                                              }
                                            </style>
                                            <circle class="si0" cx="43.4" cy="42.4" r="35.4"></circle>
                                            <line class="si0" x1="68.7" y1="67.7" x2="94" y2="93"></line>
                                          </svg></i></span></a>
                                    <div class="wdt-search-form-container">
                                      <form method="get" id="searchform" action="https://lizza.wpengine.com/lms/">
                                        <input id="s" name="s" type="text" value="" placeholder="Enter Keyword"
                                          class="text_input" />
                                        <ul class="quick_search_results"></ul>
                                        <input name="submit" type="submit" value="Go" />
                                      </form>
                                      <div class="wdt-search-form-close"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div
                          class="elementor-element elementor-element-2ed1bc24 elementor-widget__width-auto elementor-hidden-mobile end elementor-hidden-mobile_extra elementor-hidden-laptop elementor-widget elementor-widget-wdt-button"
                          data-id="2ed1bc24" data-element_type="widget" data-settings='{"wdt_animation_effect":"none"}'
                          data-widget_type="wdt-button.default">
                          <div class="elementor-widget-container">
                            <div
                              class="wdt-button-holder wdt-template-filled wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after"
                              id="wdt-button-2ed1bc24">
                              <a class="wdt-button" href="/request-demo" data-tooltip="Request Demo">
                                <div class="wdt-button-text">
                                  <span>Request Demo</span><span>Request Demo</span>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>

                        <div
                          class="elementor-element elementor-element-6f641c1e elementor-align-left elementor-tablet_extra-align-right elementor-widget-tablet_extra__width-auto elementor-hidden-desktop elementor-hidden-laptop elementor-widget elementor-widget-wdt-header-menu">
                          <div class="elementor-widget-container">
                            <div class="wdt-header-menu" data-menu="97">
                              <div class="menu-container">
                                <ul id="menu-wdt-mobile-menu" class="wdt-primary-nav" data-menu="97">
                                  <li class="close-nav">
                                    <a href="javascript:void(0);"></a>
                                  </li>

                                  <!-- Home -->
                                  <li id="menu-item-22859"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-21714 current_page_item menu-item-has-children menu-item-22859 menu-item-depth-0">
                                    <a href="/" aria-current="page"><span data-text="%1$s">Home</span></a>
                                    <ul class="sub-menu is-hidden">
                                      <li class="close-nav">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="go-back">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="see-all"></li>
                                      <li id="menu-item-22858"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-21714 current_page_item menu-item-22858 menu-item-depth-1">
                                        <a href="/" aria-current="page"><span data-text="%1$s">AcademixSuite
                                            Home</span></a>
                                      </li>
                                    </ul>
                                  </li>

                                  <!-- About Us -->
                                  <li id="menu-item-22862"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22862 menu-item-depth-0">
                                    <a href="/about-us/"><span data-text="%1$s">About Us</span></a>
                                  </li>

                                  <!-- Portals -->
                                  <li id="menu-item-22875"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-22875 menu-item-depth-0">
                                    <a href="/portals/"><span data-text="%1$s">Portals</span></a>
                                    <ul class="sub-menu is-hidden">
                                      <li class="close-nav">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="go-back">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="see-all"></li>
                                      <li id="menu-item-22901"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22901 menu-item-depth-1">
                                        <a href="/admin/"><span data-text="%1$s">School Admin Portal</span></a>
                                      </li>
                                      <li id="menu-item-22902"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22902 menu-item-depth-1">
                                        <a href="/teacher/"><span data-text="%1$s">Teacher's Portal</span></a>
                                      </li>
                                      <li id="menu-item-22903"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22903 menu-item-depth-1">
                                        <a href="/student/"><span data-text="%1$s">Student's Portal</span></a>
                                      </li>
                                      <li id="menu-item-22904"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22904 menu-item-depth-1">
                                        <a href="/parent/"><span data-text="%1$s">Parent's Portal</span></a>
                                      </li>
                                    </ul>
                                  </li>

                                  <!-- Use Cases -->
                                  <li id="menu-item-23106"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-23106 menu-item-depth-0">
                                    <a href="/use-cases/"><span data-text="%1$s">Use Cases</span></a>
                                    <ul class="sub-menu is-hidden">
                                      <li class="close-nav">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="go-back">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="see-all"></li>
                                      <li id="menu-item-22905"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22905 menu-item-depth-1">
                                        <a href="/use-cases/k12-schools/"><span data-text="%1$s">K-12 Schools</span></a>
                                      </li>
                                      <li id="menu-item-22906"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22906 menu-item-depth-1">
                                        <a href="/use-cases/universities/"><span data-text="%1$s">Universities &
                                            Colleges</span></a>
                                      </li>
                                      <li id="menu-item-22907"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22907 menu-item-depth-1">
                                        <a href="/use-cases/vocational/"><span data-text="%1$s">Vocational
                                            Centers</span></a>
                                      </li>
                                      <li id="menu-item-22908"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22908 menu-item-depth-1">
                                        <a href="/use-cases/features/"><span data-text="%1$s">Platform
                                            Features</span></a>
                                      </li>
                                      <li id="menu-item-22909"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22909 menu-item-depth-1">
                                        <a href="/use-cases/integration/"><span data-text="%1$s">Integration</span></a>
                                      </li>
                                    </ul>
                                  </li>

                                  <!-- Resources (Renamed from Blog) -->
                                  <li id="menu-item-22878"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-22878 menu-item-depth-0">
                                    <a href="/resources/"><span data-text="%1$s">Resources</span></a>
                                    <ul class="sub-menu is-hidden">
                                      <li class="close-nav">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="go-back">
                                        <a href="javascript:void(0);"></a>
                                      </li>
                                      <li class="see-all"></li>
                                      <li id="menu-item-22910"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22910 menu-item-depth-1">
                                        <a href="/resources/help-center/"><span data-text="%1$s">Help Center</span></a>
                                      </li>
                                      <li id="menu-item-22911"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22911 menu-item-depth-1">
                                        <a href="/resources/documentation/"><span
                                            data-text="%1$s">Documentation</span></a>
                                      </li>
                                      <li id="menu-item-22912"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22912 menu-item-depth-1">
                                        <a href="/resources/tutorials/"><span data-text="%1$s">Tutorials</span></a>
                                      </li>
                                      <li id="menu-item-22913"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22913 menu-item-depth-1">
                                        <a href="/resources/faq/"><span data-text="%1$s">FAQ</span></a>
                                      </li>
                                    </ul>
                                  </li>

                                  <!-- Contact -->
                                  <li id="menu-item-22896"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22896 menu-item-depth-0">
                                    <a href="/contact/"><span data-text="%1$s">Contact</span></a>
                                  </li>

                                  <!-- Get Started Button (Mobile) -->
                                  <li id="menu-item-22914"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22914 menu-item-depth-0">
                                    <a href="/get-started/" class="mobile-cta-button"><span data-text="%1$s">Get
                                        Started</span></a>
                                  </li>
                                </ul>
                                <div class="sub-menu-overlay"></div>
                              </div>
                              <div class="mobile-nav-container mobile-nav-offcanvas-right" data-menu="97">
                                <a href="#" class="menu-trigger menu-trigger-icon"
                                  data-menu="97"><i></i><span>Menu</span></a>
                                <div class="mobile-menu" data-menu="97"></div>
                                <div class="overlay"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div
                          class="elementor-element elementor-element-3e377c0e end elementor-widget__width-auto wdt-header-popup-menu elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-widget elementor-widget-wdt-popup-box"
                          data-id="3e377c0e" data-element_type="widget"
                          data-settings='{"show_close_Button":"true","wdt_animation_effect":"none"}'
                          data-widget_type="wdt-popup-box.default">
                          <div class="elementor-widget-container">
                            <div class="wdt-popup-box-trigger-holder wdt-click-element-icon"
                              id="wdt-popup-box-trigger-3e377c0e"
                              data-settings='{"module_id":"3e377c0e","module_ref_id":"wdt-popup-box-3e377c0e","popup_class":"wdt-popup-box-window wdt-popup-box-window-3e377c0e wdt-right-side-slide","trigger_type":"on-click","on_load_delay":null,"on_load_after":null,"external_class":null,"external_id":null,"show_close_Button":true,"esc_to_exit":false,"click_to_exit":false,"mfp_src":"#wdt-popup-box-content-holder-3e377c0e","mfp_type":"inline"}'>
                              <div class="wdt-popup-box-trigger-element">
                                <span class="wdt-popup-box-trigger-item wdt-popup-box-trigger-icon"><i><svg
                                      xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                      x="0px" y="0px" viewbox="0 0 100 100" style="
                                          enable-background: new 0 0 100 100;
                                        " xml:space="preserve">
                                      <g class="hambar-one">
                                        <rect x="1" y="38.6" width="98" height="2.5"></rect>
                                        <rect x="110" y="38.6" width="98" height="2.5"></rect>
                                      </g>
                                      <g class="hambar-two">
                                        <rect x="1" y="58.9" width="98" height="2.5"></rect>
                                        <rect x="110" y="58.9" width="98" height="2.5"></rect>
                                      </g>
                                    </svg></i></span>
                              </div>
                            </div>
                            <div id="wdt-popup-box-content-holder-3e377c0e"
                              class="wdt-popup-box-content-holder wdt-popup-box-content-holder-3e377c0e wdt-content-type-template mfp-hide">
                              <div class="wdt-popup-box-content-inner">
                                <style>
                                  .elementor-bc-flex-widget .elementor-1175 .elementor-element.elementor-element-676e5448.elementor-column .elementor-widget-wrap {
                                    align-items: center;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-676e5448.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                    align-content: center;
                                    align-items: center;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-676e5448>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
                                    margin-bottom: 20px;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-2905ba4c {
                                    border-style: solid;
                                    border-width: 0px 0px 1px 0px;
                                    transition:
                                      background 0.3s,
                                      border 0.3s,
                                      border-radius 0.3s,
                                      box-shadow 0.3s;
                                    padding: 0px 0px 30px 0px;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-2905ba4c>.elementor-background-overlay {
                                    transition:
                                      background 0.3s,
                                      border-radius 0.3s,
                                      opacity 0.3s;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-49bf230d .wdt-heading-holder,
                                  .elementor-1175 .elementor-element.elementor-element-49bf230d .wdt-heading-holder>.wdt-heading-separator-wrapper .wdt-heading-separator,
                                  .elementor-1175 .elementor-element.elementor-element-49bf230d .wdt-heading-holder>.wdt-heading-title-wrapper .wdt-heading-title,
                                  .elementor-1175 .elementor-element.elementor-element-49bf230d .wdt-heading-holder>.wdt-heading-subtitle-wrapper .wdt-heading-subtitle {
                                    text-align: start;
                                    justify-content: start;
                                    justify-items: start;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-49bf230d .wdt-heading-holder .wdt-heading-title-wrapper .wdt-heading-title {
                                    align-items: center;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-49bf230d .wdt-heading-holder .wdt-heading-subtitle-wrapper .wdt-heading-subtitle {
                                    align-items: center;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-597c3cd6 .elementor-widget-container {
                                    text-align: start;
                                    justify-content: start;
                                    justify-items: start;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-597c3cd6 .wdt-button-holder .wdt-button {
                                    margin: 0px 0px 0px 0px;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-677a0c0 {
                                    margin-top: 20px;
                                    margin-bottom: 20px;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-15d4ccb1>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
                                    margin-bottom: 10px;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-6b47a500 .wdt-heading-holder,
                                  .elementor-1175 .elementor-element.elementor-element-6b47a500 .wdt-heading-holder>.wdt-heading-separator-wrapper .wdt-heading-separator,
                                  .elementor-1175 .elementor-element.elementor-element-6b47a500 .wdt-heading-holder>.wdt-heading-title-wrapper .wdt-heading-title,
                                  .elementor-1175 .elementor-element.elementor-element-6b47a500 .wdt-heading-holder>.wdt-heading-subtitle-wrapper .wdt-heading-subtitle {
                                    text-align: start;
                                    justify-content: start;
                                    justify-items: start;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-6b47a500 .wdt-heading-holder .wdt-heading-title-wrapper .wdt-heading-title {
                                    align-items: center;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-6b47a500 .wdt-heading-holder .wdt-heading-subtitle-wrapper .wdt-heading-subtitle {
                                    align-items: center;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not( :last-child) {
                                    padding-bottom: calc(0px / 2);
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not( :first-child) {
                                    margin-top: calc(0px / 2);
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item {
                                    margin-right: calc(0px / 2);
                                    margin-left: calc(0px / 2);
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-items.elementor-inline-items {
                                    margin-right: calc(-0px / 2);
                                    margin-left: calc(-0px / 2);
                                  }

                                  body.rtl .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
                                    left: calc(-0px / 2);
                                  }

                                  body:not(.rtl) .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
                                    right: calc(-0px / 2);
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-icon i {
                                    color: var(--e-global-color-primary);
                                    transition: color 0.3s;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-icon svg {
                                    fill: var(--e-global-color-primary);
                                    transition: fill 0.3s;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-item:hover .elementor-icon-list-icon i {
                                    color: var(--e-global-color-81731bd);
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-item:hover .elementor-icon-list-icon svg {
                                    fill: var(--e-global-color-81731bd);
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-85f87bc {
                                    --e-icon-list-icon-size: 16px;
                                    --e-icon-list-icon-align: center;
                                    --e-icon-list-icon-margin: 0 calc(var(--e-icon-list-icon-size, 1em) * 0.125);
                                    --icon-vertical-align: center;
                                    --icon-vertical-offset: 0px;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-item>.elementor-icon-list-text,
                                  .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-item>a {
                                    font-family:
                                      var(--e-global-typography-primary-font-family),
                                      Sans-serif;
                                    font-weight: var(--e-global-typography-primary-font-weight);
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-85f87bc .elementor-icon-list-text {
                                    color: var(--e-global-color-primary);
                                    transition: color 0.3s;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-546f0bc6 {
                                    border-style: solid;
                                    border-width: 1px 0px 0px 0px;
                                    transition:
                                      background 0.3s,
                                      border 0.3s,
                                      border-radius 0.3s,
                                      box-shadow 0.3s;
                                    padding: 20px 0px 0px 0px;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-546f0bc6>.elementor-background-overlay {
                                    transition:
                                      background 0.3s,
                                      border-radius 0.3s,
                                      opacity 0.3s;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-787df380>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
                                    margin-bottom: 10px;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-5d3a8f1a .wdt-heading-holder,
                                  .elementor-1175 .elementor-element.elementor-element-5d3a8f1a .wdt-heading-holder>.wdt-heading-separator-wrapper .wdt-heading-separator,
                                  .elementor-1175 .elementor-element.elementor-element-5d3a8f1a .wdt-heading-holder>.wdt-heading-title-wrapper .wdt-heading-title,
                                  .elementor-1175 .elementor-element.elementor-element-5d3a8f1a .wdt-heading-holder>.wdt-heading-subtitle-wrapper .wdt-heading-subtitle {
                                    text-align: start;
                                    justify-content: start;
                                    justify-items: start;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-5d3a8f1a .wdt-heading-holder .wdt-heading-title-wrapper .wdt-heading-title {
                                    align-items: center;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-5d3a8f1a .wdt-heading-holder .wdt-heading-subtitle-wrapper .wdt-heading-subtitle {
                                    align-items: center;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-69e41488 .elementor-icon-list-icon i {
                                    transition: color 0.3s;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-69e41488 .elementor-icon-list-icon svg {
                                    transition: fill 0.3s;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-69e41488 {
                                    --e-icon-list-icon-size: 20px;
                                    --e-icon-list-icon-align: center;
                                    --e-icon-list-icon-margin: 0 calc(var(--e-icon-list-icon-size, 1em) * 0.125);
                                    --icon-vertical-align: center;
                                    --icon-vertical-offset: 0px;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-69e41488 .elementor-icon-list-icon {
                                    padding-right: 0px;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-69e41488 .elementor-icon-list-item>.elementor-icon-list-text,
                                  .elementor-1175 .elementor-element.elementor-element-69e41488 .elementor-icon-list-item>a {
                                    font-family:
                                      var(--e-global-typography-secondary-font-family),
                                      Sans-serif;
                                    font-weight: var(--e-global-typography-secondary-font-weight);
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-69e41488 .elementor-icon-list-text {
                                    color: var(--e-global-color-primary);
                                    transition: color 0.3s;
                                  }

                                  .elementor-1175 .elementor-element.elementor-element-69e41488 .elementor-icon-list-item:hover .elementor-icon-list-text {
                                    color: var(--e-global-color-secondary);
                                  }

                                  @media (max-width: 1280px) {
                                    .elementor-1175 .elementor-element.elementor-element-546f0bc6 {
                                      padding: 20px 0px 0px 0px;
                                    }
                                  }
                                </style>
                                <div data-elementor-type="page" data-elementor-id="1175"
                                  class="elementor elementor-1175">
                                  <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-100a9847 elementor-section-full_width wdt-section-side-panel elementor-section-height-default elementor-section-height-default"
                                    data-id="100a9847" data-element_type="section"
                                    data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                    <div class="elementor-container elementor-column-gap-no">
                                      <div
                                        class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-676e5448"
                                        data-id="676e5448" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                          <section
                                            class="elementor-section elementor-inner-section elementor-element elementor-element-2905ba4c elementor-section-full_width elementor-section-height-default elementor-section-height-default">
                                            <div class="elementor-container elementor-column-gap-no">
                                              <div
                                                class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-258798ed">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-49bf230d start elementor-widget elementor-widget-wdt-heading">
                                                    <div class="elementor-widget-container">
                                                      <div class="wdt-heading-holder" id="wdt-heading-49bf230d">
                                                        <h4
                                                          class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                                                          <span class="wdt-heading-title">About
                                                            AcademixSuite</span>
                                                        </h4>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-11de9114 elementor-widget elementor-widget-image">
                                                    <div class="elementor-widget-container">
                                                      <img loading="lazy" width="800" height="400"
                                                        src="wp-content/uploads/sites/12/2023/11/menu-image.jpg"
                                                        class="attachment-full size-full wp-image-22713"
                                                        alt="AcademixSuite School Management Platform Dashboard" srcset="
                                                            wp-content/uploads/sites/12/2023/11/menu-image.jpg         800w,
                                                            wp-content/uploads/sites/12/2023/11/menu-image.jpg         300w,
                                                            wp-content/uploads/sites/12/2023/11/menu-image-768x384.jpg 768w
                                                          " sizes="(max-width: 800px) 100vw, 800px" />
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-15f62d44 wdt-side-panel-cont-1 elementor-widget elementor-widget-text-editor">
                                                    <div class="elementor-widget-container">
                                                      <p>
                                                        <strong>AcademixSuite</strong>
                                                        is a comprehensive,
                                                        cloud-based
                                                        multi-tenant school
                                                        management platform
                                                        designed to transform
                                                        educational
                                                        administration. Our
                                                        all-in-one solution
                                                        streamlines operations
                                                        for schools, colleges,
                                                        universities, and
                                                        training centers
                                                        worldwide.
                                                      </p>
                                                      <p>
                                                        With
                                                        <strong>real-time
                                                          analytics</strong>,
                                                        <strong>seamless
                                                          communication
                                                          tools</strong>, and
                                                        <strong>automated
                                                          workflows</strong>, we empower
                                                        educational
                                                        institutions to focus
                                                        on what matters most –
                                                        delivering quality
                                                        education.
                                                      </p>
                                                      <p>
                                                        Our platform supports
                                                        <strong>unlimited
                                                          schools</strong>
                                                        with complete data
                                                        isolation, ensuring
                                                        security and privacy
                                                        for each institution.
                                                      </p>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-597c3cd6 start elementor-widget elementor-widget-wdt-button">
                                                    <div class="elementor-widget-container">
                                                      <div
                                                        class="wdt-button-holder wdt-template-filled wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after"
                                                        id="wdt-button-597c3cd6">
                                                        <a class="wdt-button" href="/about-us/"
                                                          data-tooltip="Learn More About AcademixSuite">
                                                          <div class="wdt-button-text">
                                                            <span>Learn
                                                              More</span><span>Learn
                                                              More</span>
                                                          </div>
                                                        </a>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                          <section
                                            class="elementor-section elementor-inner-section elementor-element elementor-element-677a0c0 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                            data-id="677a0c0" data-element_type="section"
                                            data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                            <div class="elementor-container elementor-column-gap-no">
                                              <div
                                                class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-15d4ccb1"
                                                data-id="15d4ccb1" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-6b47a500 start elementor-widget elementor-widget-wdt-heading"
                                                    data-id="6b47a500" data-element_type="widget"
                                                    data-settings='{"title_vertical_align":"center","subtitle_vertical_align":"center","wdt_animation_effect":"none"}'
                                                    data-widget_type="wdt-heading.default">
                                                    <div class="elementor-widget-container">
                                                      <div class="wdt-heading-holder" id="wdt-heading-6b47a500">
                                                        <h4
                                                          class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                                                          <span class="wdt-heading-title">We Are
                                                            Social</span>
                                                        </h4>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-85f87bc elementor-icon-list--layout-inline elementor-list-item-link-inline elementor-align-left wdt-footer-social-icons elementor-widget elementor-widget-icon-list"
                                                    data-id="85f87bc" data-element_type="widget"
                                                    data-settings='{"wdt_animation_effect":"none"}'
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                      <ul class="elementor-icon-list-items elementor-inline-items">
                                                        <li class="elementor-icon-list-item elementor-inline-item">
                                                          <span class="elementor-icon-list-text">Follow Us :</span>
                                                        </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item">
                                                          <a href="https://www.facebook.com/">
                                                            <span class="elementor-icon-list-icon">
                                                              <i aria-hidden="true" class="fab fa-facebook-f"></i>
                                                            </span>
                                                            <span class="elementor-icon-list-text"></span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item">
                                                          <a href="https://www.instagram.com/">
                                                            <span class="elementor-icon-list-icon">
                                                              <i aria-hidden="true" class="fab fa-instagram"></i>
                                                            </span>
                                                            <span class="elementor-icon-list-text"></span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item">
                                                          <a href="https://www.twitter.com/">
                                                            <span class="elementor-icon-list-icon">
                                                              <i aria-hidden="true" class="fab fa-twitter"></i>
                                                            </span>
                                                            <span class="elementor-icon-list-text"></span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item">
                                                          <a href="https://www.indeed.com/">
                                                            <span class="elementor-icon-list-icon">
                                                              <i aria-hidden="true" class="fab fa-linkedin-in"></i>
                                                            </span>
                                                            <span class="elementor-icon-list-text"></span>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                          <section
                                            class="elementor-section elementor-inner-section elementor-element elementor-element-546f0bc6 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                            data-id="546f0bc6" data-element_type="section"
                                            data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                            <div class="elementor-container elementor-column-gap-no">
                                              <div
                                                class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-787df380"
                                                data-id="787df380" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-5d3a8f1a start elementor-widget elementor-widget-wdt-heading"
                                                    data-id="5d3a8f1a" data-element_type="widget"
                                                    data-settings='{"title_vertical_align":"center","subtitle_vertical_align":"center","wdt_animation_effect":"none"}'
                                                    data-widget_type="wdt-heading.default">
                                                    <div class="elementor-widget-container">
                                                      <div class="wdt-heading-holder" id="wdt-heading-5d3a8f1a">
                                                        <h4
                                                          class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                                                          <span class="wdt-heading-title">Contact Us</span>
                                                        </h4>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div
                                                    class="elementor-element elementor-element-69e41488 elementor-list-item-link-inline wdt-footer-contact-details elementor-icon-list--layout-inline elementor-widget elementor-widget-icon-list"
                                                    data-id="69e41488" data-element_type="widget"
                                                    data-settings='{"wdt_animation_effect":"none"}'
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                      <ul class="elementor-icon-list-items elementor-inline-items">
                                                        <li class="elementor-icon-list-item elementor-inline-item">
                                                          <a href="tel:18408412569">
                                                            <span class="elementor-icon-list-icon">
                                                              <i aria-hidden="true" class="fas fa-phone-alt"></i>
                                                            </span>
                                                            <span class="elementor-icon-list-text">+1 840 841 25
                                                              69</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item">
                                                          <a href="mailto:info@email.com">
                                                            <span class="elementor-icon-list-icon">
                                                              <i aria-hidden="true" class="fas fa-envelope"></i>
                                                            </span>
                                                            <span class="elementor-icon-list-text">info@email.com</span>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </header>
        <!-- **Header - End ** -->

        <!-- ** Slider ** -->

        <!-- ** Slider End ** -->

        <!-- ** Breadcrumb ** -->
        <!-- ** Breadcrumb End ** -->
      </div>
      <!-- ** Header Wrapper - End ** -->

      <!-- **Main** -->
      <div id="main">
        <!-- ** Container ** -->
        <div class="wdt-elementor-container-fluid">
          <div data-elementor-type="wp-page" data-elementor-id="21714" class="elementor elementor-21714">
            <section
              class="elementor-section elementor-top-section elementor-element elementor-element-68c4a1ae elementor-section-full_width wdt-section-wrap-col elementor-section-height-default elementor-section-height-default"
              data-id="68c4a1ae" data-element_type="section"
              data-settings='{"background_background":"classic","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
              <div class="elementor-background-overlay"></div>
              <div class="elementor-container elementor-column-gap-no">
                <!-- Left Column: Image -->
                <div
                  class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-61e987d0"
                  data-id="61e987d0" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <!-- Decorative elements -->
                    <div
                      class="elementor-element elementor-element-55405bf elementor-widget__width-initial elementor-absolute animated-fast elementor-invisible elementor-widget elementor-widget-image"
                      data-id="55405bf" data-element_type="widget"
                      data-settings='{"_position":"absolute","wdt_animation_effect":"mouse-move","wdt_mme_speed":{"unit":"ms","size":1,"sizes":[]},"wdt_mme_invert_movement":"true","_animation":"fadeInRight","wdt_mme_depth":{"unit":"dpt","size":0.5,"sizes":[]},"wdt_mme_speed_laptop":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_tablet_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_tablet":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_mobile_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_mobile":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_laptop":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_tablet_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_tablet":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_mobile_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_mobile":{"unit":"px","size":"","sizes":[]},"wdt_mme_move_along":"both"}'
                      data-widget_type="image.default">
                      <div class="elementor-widget-container">
                        <img fetchpriority="high" decoding="async" width="512" height="176"
                          src="wp-content/uploads/sites/12/2024/02/Vector-1.1.webp"
                          class="attachment-full size-full wp-image-22425" alt="" srcset="
                              wp-content/uploads/sites/12/2024/02/Vector-1.1.webp         512w,
                              wp-content/uploads/sites/12/2024/02/Vector-1.1-300x103.webp 300w
                            " sizes="(max-width: 512px) 100vw, 512px" />
                      </div>
                    </div>
                    <div
                      class="elementor-element elementor-element-48ee58f4 elementor-widget__width-initial elementor-absolute elementor-invisible elementor-widget elementor-widget-image"
                      data-id="48ee58f4" data-element_type="widget"
                      data-settings='{"_position":"absolute","wdt_animation_effect":"mouse-move","wdt_mme_speed":{"unit":"ms","size":1,"sizes":[]},"_animation":"fadeInLeft","wdt_mme_depth":{"unit":"dpt","size":0.5,"sizes":[]},"wdt_mme_speed_laptop":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_tablet_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_tablet":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_mobile_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_mobile":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_laptop":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_tablet_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_tablet":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_mobile_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_mobile":{"unit":"px","size":"","sizes":[]},"wdt_mme_move_along":"both"}'
                      data-widget_type="image.default">
                      <div class="elementor-widget-container">
                        <img loading="lazy" decoding="async" width="434" height="174"
                          src="wp-content/uploads/sites/12/2024/02/Vector-1.4.webp"
                          class="attachment-full size-full wp-image-22428" alt="" srcset="
                              wp-content/uploads/sites/12/2024/02/Vector-1.4.webp         434w,
                              wp-content/uploads/sites/12/2024/02/Vector-1.4-300x120.webp 300w
                            " sizes="(max-width: 434px) 100vw, 434px" />
                      </div>
                    </div>
                    <div class="elementor-element elementor-element-5713d1f7 elementor-widget elementor-widget-image"
                      data-id="5713d1f7" data-element_type="widget" data-settings='{"wdt_animation_effect":"none"}'
                      data-widget_type="image.default">
                      <div class="elementor-widget-container">
                        <img loading="lazy" decoding="async" width="930" height="1055"
                          src="wp-content/uploads/sites/12/2024/02/AdobeStock_545875468%402x-1.webp"
                          class="attachment-full size-full wp-image-22289" alt="School administration dashboard" srcset="
                              wp-content/uploads/sites/12/2024/02/AdobeStock_545875468%402x-1.webp          930w,
                              wp-content/uploads/sites/12/2024/02/AdobeStock_545875468%402x-1-264x300.webp  264w,
                              wp-content/uploads/sites/12/2024/02/AdobeStock_545875468%402x-1-903x1024.webp 903w,
                              wp-content/uploads/sites/12/2024/02/AdobeStock_545875468%402x-1-768x871.webp  768w
                            " sizes="(max-width: 930px) 100vw, 930px" />
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Center Column: Content -->
                <div
                  class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-62900eb9"
                  data-id="62900eb9" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <div
                      class="elementor-element elementor-element-70f3bf1f wdt-slider-1-heading wdt-last-child center elementor-widget elementor-widget-wdt-heading"
                      data-id="70f3bf1f" data-element_type="widget"
                      data-settings='{"split_heading":"true","wdt_enable_inview_status":"true","title_vertical_align":"center","subtitle_vertical_align":"center","wdt_animation_effect":"none"}'
                      data-widget_type="wdt-heading.default">
                      <div class="elementor-widget-container">
                        <div class="wdt-heading-holder" id="wdt-heading-70f3bf1f">
                          <div class="wdt-heading-subtitle-wrapper wdt-heading-align-center">
                            <span class="wdt-heading-subtitle">All-in-One Platform</span>
                          </div>
                          <h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                            <span class="wdt-heading-title">Simplify School Management<span
                                class="wdt-split-heading-wrapper"></span></span>
                          </h2>
                          <div class="wdt-heading-content-wrapper">
                            Unified system for students, staff, finances, and
                            communication. Reduce admin work by 70%.
                          </div>
                        </div>
                      </div>
                    </div>

                    <section
                      class="elementor-section elementor-inner-section elementor-element elementor-element-641e038 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                      data-id="641e038" data-element_type="section"
                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                      <div class="elementor-container elementor-column-gap-no">
                        <div
                          class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-b7f4701"
                          data-id="b7f4701" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-38a395b0 elementor-widget__width-auto center elementor-widget elementor-widget-wdt-button"
                              data-id="38a395b0" data-element_type="widget"
                              data-settings='{"item_normal_background_background":"classic","wdt_animation_effect":"none"}'
                              data-widget_type="wdt-button.default">
                              <div class="elementor-widget-container">
                                <div
                                  class="wdt-button-holder wdt-template-filled wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after"
                                  id="wdt-button-38a395b0">
                                  <a class="wdt-button" href="/request-demo" data-tooltip="See it in action">
                                    <div class="wdt-button-text">
                                      <span>Request Demo</span><span>Request Demo</span>
                                    </div>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div
                              class="elementor-element elementor-element-392592aa elementor-widget__width-auto wdt-slider-1-popup-box elementor-widget elementor-widget-wdt-popup-box"
                              data-id="392592aa" data-element_type="widget"
                              data-settings='{"show_close_Button":"true","esc_to_exit":"true","click_to_exit":"true","wdt_animation_effect":"none"}'
                              data-widget_type="wdt-popup-box.default">
                              <div class="elementor-widget-container">
                                <div class="wdt-popup-box-trigger-holder wdt-click-element-label-n-icon"
                                  id="wdt-popup-box-trigger-392592aa"
                                  data-settings='{"module_id":"392592aa", "module_ref_id":"wdt-popup-box-392592aa", "popup_class":"wdt-popup-box-window wdt-popup-box-window-392592aa wdt-fade-zoom", "trigger_type":"on-click", "on_load_delay":null, "on_load_after":null, "external_class":null, "external_id":null, "show_close_Button":true, "esc_to_exit":true, "click_to_exit":true, "mfp_src":"https://vimeo.com/84198419", "mfp_type":"iframe"}'>
                                  <div class="wdt-popup-box-trigger-element">
                                    <span class="wdt-popup-box-trigger-item wdt-popup-box-trigger-label">Watch
                                      Demo</span>
                                    <span class="wdt-popup-box-trigger-item wdt-popup-box-trigger-icon">
                                      <i>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                          xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 60 60"
                                          style="
                                              enable-background: new 0 0 60 60;
                                            " xml:space="preserve">
                                          <path
                                            d="M52.6,27.6L9.8,2.9C9,2.4,8.1,2.4,7.2,2.9C6.3,3.4,6,4.3,6,5.3v49.4c0,1,0.4,1.9,1.2,2.4c0.4,0.2,0.8,0.4,1.3,0.4 c0.5,0,0.9-0.1,1.4-0.4l42.8-24.7C53.5,31.9,54,31,54,30C54,29,53.5,28.1,52.6,27.6z">
                                          </path>
                                        </svg>
                                      </i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>

                <!-- Right Column: Image -->
                <div
                  class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-7cb4b703 elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-hidden-tablet_extra"
                  data-id="7cb4b703" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <div
                      class="elementor-element elementor-element-2233fc28 elementor-widget__width-initial elementor-absolute elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-hidden-tablet_extra elementor-invisible elementor-widget elementor-widget-image"
                      data-id="2233fc28" data-element_type="widget"
                      data-settings='{"_position":"absolute","wdt_animation_effect":"mouse-move","wdt_mme_speed":{"unit":"ms","size":1,"sizes":[]},"wdt_mme_invert_movement":"true","_animation":"fadeInRight","wdt_mme_depth":{"unit":"dpt","size":0.5,"sizes":[]},"wdt_mme_speed_laptop":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_tablet_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_tablet":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_mobile_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_mobile":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_laptop":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_tablet_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_tablet":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_mobile_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_mobile":{"unit":"px","size":"","sizes":[]},"wdt_mme_move_along":"both"}'
                      data-widget_type="image.default">
                      <div class="elementor-widget-container">
                        <img loading="lazy" decoding="async" width="666" height="196"
                          src="wp-content/uploads/sites/12/2024/02/Vector-1.2.webp"
                          class="attachment-full size-full wp-image-22426" alt="" srcset="
                              wp-content/uploads/sites/12/2024/02/Vector-1.2.webp        666w,
                              wp-content/uploads/sites/12/2024/02/Vector-1.2-300x88.webp 300w
                            " sizes="(max-width: 666px) 100vw, 666px" />
                      </div>
                    </div>
                    <div
                      class="elementor-element elementor-element-45963633 elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-hidden-tablet_extra elementor-widget elementor-widget-image"
                      data-id="45963633" data-element_type="widget" data-settings='{"wdt_animation_effect":"none"}'
                      data-widget_type="image.default">
                      <div class="elementor-widget-container">
                        <img loading="lazy" decoding="async" width="930" height="1055"
                          src="wp-content/uploads/sites/12/2024/02/AdobeStock_587433154-1.webp"
                          class="attachment-full size-full wp-image-22290" alt="School analytics dashboard" srcset="
                              wp-content/uploads/sites/12/2024/02/AdobeStock_587433154-1.webp          930w,
                              wp-content/uploads/sites/12/2024/02/AdobeStock_587433154-1-264x300.webp  264w,
                              wp-content/uploads/sites/12/2024/02/AdobeStock_587433154-1-903x1024.webp 903w,
                              wp-content/uploads/sites/12/2024/02/AdobeStock_587433154-1-768x871.webp  768w
                            " sizes="(max-width: 930px) 100vw, 930px" />
                      </div>
                    </div>
                    <div
                      class="elementor-element elementor-element-7160b13c elementor-widget__width-initial elementor-absolute elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-hidden-tablet_extra elementor-invisible elementor-widget elementor-widget-image"
                      data-id="7160b13c" data-element_type="widget"
                      data-settings='{"_position":"absolute","wdt_animation_effect":"mouse-move","wdt_mme_speed":{"unit":"ms","size":1,"sizes":[]},"_animation":"fadeInLeft","wdt_mme_depth":{"unit":"dpt","size":0.5,"sizes":[]},"wdt_mme_speed_laptop":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_tablet_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_tablet":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_mobile_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_mobile":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_laptop":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_tablet_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_tablet":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_mobile_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_mobile":{"unit":"px","size":"","sizes":[]},"wdt_mme_move_along":"both"}'
                      data-widget_type="image.default">
                      <div class="elementor-widget-container">
                        <img loading="lazy" decoding="async" width="406" height="256"
                          src="wp-content/uploads/sites/12/2024/02/Vector-1.3.webp"
                          class="attachment-full size-full wp-image-22427" alt="" srcset="
                              wp-content/uploads/sites/12/2024/02/Vector-1.3.webp         406w,
                              wp-content/uploads/sites/12/2024/02/Vector-1.3-300x189.webp 300w
                            " sizes="(max-width: 406px) 100vw, 406px" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- Client Logos/Testimonials Section -->
            <section
              class="elementor-section elementor-top-section elementor-element elementor-element-3ee63466 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
              data-id="3ee63466" data-element_type="section"
              data-settings='{"background_background":"classic","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
              <div class="elementor-background-overlay"></div>
              <div class="elementor-container elementor-column-gap-no">
                <div
                  class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-38891ae6"
                  data-id="38891ae6" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <section
                      class="elementor-section elementor-inner-section elementor-element elementor-element-5ffaeb8 elementor-section-full_width wdt-overflow-hidden wdt-section-wrap-col elementor-section-height-default elementor-section-height-default"
                      data-id="5ffaeb8" data-element_type="section"
                      data-settings='{"background_background":"classic","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                      <div class="elementor-container elementor-column-gap-no">
                        <div
                          class="elementor-column elementor-col-16 elementor-inner-column elementor-element elementor-element-451a018"
                          data-id="451a018" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-03f3623 start center center center elementor-widget elementor-widget-wdt-heading"
                              data-id="03f3623" data-element_type="widget"
                              data-settings='{"title_vertical_align":"center","subtitle_vertical_align":"center","wdt_animation_effect":"none"}'
                              data-widget_type="wdt-heading.default">
                              <div class="elementor-widget-container">
                                <div class="wdt-heading-holder" id="wdt-heading-03f3623">
                                  <h4
                                    class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                                    <span class="wdt-heading-title">Trusted by Schools</span>
                                  </h4>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Client Logos -->
                        <!-- Keep all 6 logo columns exactly as they were -->
                        <div
                          class="elementor-column elementor-col-16 elementor-inner-column elementor-element elementor-element-87a13f5"
                          data-id="87a13f5" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-2cd9207 wdt-custom-icon-box-client-logo center elementor-widget elementor-widget-wdt-icon-box"
                              data-id="2cd9207" data-element_type="widget"
                              data-settings='{"columns":"1","columns_laptop":"1","columns_tablet_extra":"1","columns_mobile_extra":"1","columns_tablet":"1","item_normal_background_background":"classic","columns_mobile":1,"carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                              data-widget_type="wdt-icon-box.default">
                              <div class="elementor-widget-container">
                                <div
                                  class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template"
                                  id="wdt-icon-box-2cd9207" data-settings="">
                                  <div class="wdt-column-wrapper wdt-column-gap-no">
                                    <div class="wdt-column">
                                      <div class="wdt-content-item">
                                        <div class="wdt-content-media-group">
                                          <div class="wdt-content-icon-wrapper">
                                            <div class="wdt-content-icon">
                                              <span><i><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewbox="0 0 150 41" style="
                                                        enable-background: new 0
                                                          0 150 41;
                                                      " xml:space="preserve">
                                                    <style type="text/css">
                                                      .st0 {
                                                        fill: #e48413;
                                                      }
                                                    </style>
                                                    <path
                                                      d="M113.4,30.6l4.2-21.8h-7.4l-5.6,29h13.5l1.3-7.2C119.4,30.6,113.4,30.6,113.4,30.6z">
                                                    </path>
                                                    <path
                                                      d="M135.1,15.2c1.2,0,3,0.3,4,0.7l1.2-6.7c-1.5-0.2-3.2-0.3-5.1-0.3c-8.1,0-11.8,4.7-11.8,10c0,7,7.1,6.9,7.1,9.9 c0,1.5-1,2.3-3.4,2.3c-1.5,0-3.7-0.3-5.1-0.8l-1.3,7.2c1.5,0.3,3.5,0.5,5.7,0.5c7.2,0,12.3-4.7,12.3-10.6c0-6.9-7.2-6.9-7.2-9.9 C131.7,16.2,132.6,15.2,135.1,15.2z">
                                                    </path>
                                                    <path
                                                      d="M98.7,8.9c-11.1,0-18.2,8.2-18.2,18.3c0,6.4,3.4,10.7,11.8,10.7c3.4,0,6.9-0.7,9.6-1.8l2.7-13.9h-7.4l-1.5,8.5 c-0.7,0.2-1.3,0.2-2,0.2c-3.7,0-5.1-2-5.1-4.7c0-5,3-10.2,9.4-10.2c1.9,0,3.7,0.3,5.4,0.8c0.2,0,0.3,0.2,0.5,0.2 c0.7,0.2,1.2,0.5,1.5,0.7L107,10C104.6,9.4,101.6,8.9,98.7,8.9z">
                                                    </path>
                                                    <path class="st0"
                                                      d="M43.3,9l-2,9.5h13.8c-11.5,16.7-34,13.9-39.9,7C10,19.6,14.5,9.4,29.7,3C14.5,7.5,6.1,19.6,11.1,27.6 c5.6,9.2,23.2,12.9,38.9,8.5c10.4-3.7,14.8-8.7,16.5-11.6L64,37.8h10.3l5.6-29H43.3V9z">
                                                    </path>
                                                  </svg></i></span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Client Logo 2 -->
                        <div
                          class="elementor-column elementor-col-16 elementor-inner-column elementor-element elementor-element-e6773b6"
                          data-id="e6773b6" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-93d9fd9 wdt-custom-icon-box-client-logo center elementor-widget elementor-widget-wdt-icon-box"
                              data-id="93d9fd9" data-element_type="widget"
                              data-settings='{"columns":"1","columns_laptop":"1","columns_tablet_extra":"1","columns_mobile_extra":"1","columns_tablet":"1","item_normal_background_background":"classic","columns_mobile":1,"carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                              data-widget_type="wdt-icon-box.default">
                              <div class="elementor-widget-container">
                                <div
                                  class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template"
                                  id="wdt-icon-box-93d9fd9" data-settings="">
                                  <div class="wdt-column-wrapper wdt-column-gap-no">
                                    <div class="wdt-column">
                                      <div class="wdt-content-item">
                                        <div class="wdt-content-media-group">
                                          <div class="wdt-content-icon-wrapper">
                                            <div class="wdt-content-icon">
                                              <span><i><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewbox="0 0 1646.7 595.1" style="
                                                        enable-background: new 0
                                                          0 1646.7 595.1;
                                                      " xml:space="preserve">
                                                    <style type="text/css">
                                                      .st0 {
                                                        fill: #ff7e54;
                                                      }

                                                      .st1 {
                                                        fill: #f9c14a;
                                                      }

                                                      .st2 {
                                                        fill: #5494f6;
                                                      }

                                                      .st3 {
                                                        fill: #48e7ad;
                                                      }

                                                      .st4 {
                                                        fill: #b74edc;
                                                      }

                                                      .st5 {
                                                        fill: #9584f7;
                                                      }
                                                    </style>
                                                    <path class="st0"
                                                      d="M333.5,144.3l24,13.9c7.2,4.2,11.3,11.3,11.3,19.6c0,8.3-4.1,15.5-11.3,19.6l-46.6,26.9l-80.6,46.5l-61.3,35.4 c-4.1,2.4-8.8,2.4-12.9,0c-4.1-2.4-6.5-6.4-6.5-11.2v-44.6c0-8.3,4.1-15.5,11.3-19.6l149.9-86.5C318,140.2,326.2,140.2,333.5,144.3">
                                                    </path>
                                                    <path class="st0"
                                                      d="M391.5,133.8c-23.8,0-43.1-19.3-43.1-43.1c0-23.8,19.3-43.1,43.1-43.1c23.8,0,43.1,19.3,43.1,43.1 S415.3,133.8,391.5,133.8">
                                                    </path>
                                                    <path class="st1"
                                                      d="M156,127.5c45.2-26.1,90.3-52.1,135.4-78.2c4.1-2.4,8.8-2.4,12.9,0c4.1,2.4,6.5,6.4,6.5,11.2v44.6 c0,8.3-4.1,15.5-11.3,19.6l-115.9,66.9c-7.2,4.2-15.5,4.2-22.7,0c-7.2-4.2-11.3-11.3-11.3-19.6v-33.4 C149.6,134,151.9,129.9,156,127.5">
                                                    </path>
                                                    <path class="st2"
                                                      d="M310.4,383.7V356c0-8.3,4.1-15.5,11.3-19.6c7.2-4.2,15.5-4.2,22.7,0l46.6,26.9l80.6,46.5l61.3,35.4 c4.1,2.4,6.5,6.4,6.5,11.2c0,4.7-2.3,8.8-6.5,11.2l-38.7,22.3c-7.2,4.2-15.5,4.2-22.7,0l-149.9-86.5 C314.5,399.2,310.4,392.1,310.4,383.7">
                                                    </path>
                                                    <path class="st2"
                                                      d="M272.3,338.8c11.9,20.6,4.8,47-15.8,58.9c-20.6,11.9-47,4.8-58.9-15.8c-11.9-20.6-4.8-47,15.8-58.9 C234,311.1,260.4,318.1,272.3,338.8">
                                                    </path>
                                                    <path class="st3"
                                                      d="M384.6,545.8c-45.2-26.1-90.3-52.1-135.5-78.2c-4.1-2.4-6.4-6.4-6.4-11.2s2.3-8.8,6.5-11.2l38.6-22.3 c7.2-4.2,15.5-4.2,22.7,0l115.9,66.9c7.2,4.2,11.3,11.3,11.3,19.6s-4.1,15.5-11.3,19.6l-28.9,16.7 C393.4,548.1,388.7,548.1,384.6,545.8">
                                                    </path>
                                                    <path class="st4"
                                                      d="M529.3,284l-24,13.9c-7.2,4.2-15.5,4.2-22.7,0c-7.2-4.2-11.3-11.3-11.3-19.6V60.5c0-4.7,2.3-8.8,6.5-11.2 c4.1-2.4,8.8-2.4,12.9,0l38.7,22.3c7.2,4.2,11.3,11.3,11.3,19.6v173.1C540.6,272.7,536.5,279.8,529.3,284">
                                                    </path>
                                                    <path class="st4"
                                                      d="M509.4,339.5c11.9-20.6,38.3-27.7,58.9-15.8c20.6,11.9,27.7,38.3,15.8,58.9c-11.9,20.6-38.3,27.7-58.9,15.8 C504.6,386.5,497.5,360.1,509.4,339.5">
                                                    </path>
                                                    <path class="st5"
                                                      d="M632.5,138.7c0,52.1,0,104.3,0,156.4c0,4.7-2.4,8.8-6.5,11.2c-4.1,2.4-8.8,2.4-12.9,0L574.5,284 c-7.2-4.2-11.3-11.3-11.3-19.6V130.5c0-8.3,4.1-15.5,11.3-19.6c7.2-4.2,15.5-4.2,22.7,0l28.9,16.7 C630.2,129.9,632.5,134,632.5,138.7">
                                                    </path>
                                                    <path
                                                      d="M1497.2,240.1l-67.3,158.2c-6.8,17.2-15.3,29.3-25.3,36.3c-10.1,7-22.2,10.5-36.4,10.5c-7.8,0-15.4-1.2-23-3.6 c-7.6-2.4-13.8-5.7-18.6-10l15.8-30.7c3.3,2.9,7.2,5.3,11.5,6.9s8.6,2.5,12.9,2.5c5.9,0,10.7-1.4,14.4-4.3c3.7-2.9,7-7.6,10-14.3 l0.6-1.4l-64.5-150.1h44.6l41.8,101.1l42.1-101.1L1497.2,240.1L1497.2,240.1z M1327.6,381.9c-4.2,3.1-9.5,5.5-15.6,7.1 c-6.2,1.6-12.7,2.4-19.5,2.4c-17.7,0-31.4-4.5-41.1-13.6c-9.7-9-14.5-22.3-14.5-39.9v-61.2h-23v-33.2h23v-36.3h43.2v36.3h37.1v33.2 H1280v60.7c0,6.3,1.6,11.1,4.8,14.5s7.8,5.1,13.7,5.1c6.8,0,12.7-1.8,17.5-5.5L1327.6,381.9L1327.6,381.9z M1169.8,219.3 c-7.9,0-14.4-2.3-19.4-6.9c-5-4.6-7.5-10.3-7.5-17.2s2.5-12.6,7.5-17.2c5-4.6,11.5-6.9,19.4-6.9c7.9,0,14.4,2.2,19.4,6.6 s7.5,10,7.5,16.6c0,7.2-2.5,13.2-7.5,17.9C1184.2,216.9,1177.7,219.3,1169.8,219.3L1169.8,219.3z M1148.2,240.1h43.2v149h-43.2 V240.1L1148.2,240.1z M1047.3,237.9c18.5,0,33.4,5.5,44.7,16.6c11.4,11.1,17,27.5,17,49.3v85.3h-43.2v-78.7 c0-11.8-2.6-20.6-7.8-26.4s-12.7-8.7-22.4-8.7c-10.9,0-19.6,3.4-26,10.1c-6.5,6.7-9.7,16.8-9.7,30.1v73.7h-43.2v-149H998v17.5 c5.7-6.3,12.8-11.1,21.3-14.5C1027.9,239.6,1037.2,237.9,1047.3,237.9L1047.3,237.9z M827.7,392.4c-27.7,0-49.3-7.7-64.7-23 c-15.4-15.3-23.1-37.2-23.1-65.6V195.2h44.9v106.9c0,34.7,14.4,52.1,43.2,52.1c14,0,24.7-4.2,32.1-12.6c7.4-8.4,11.1-21.6,11.1-39.5 V195.2h44.3v108.6c0,28.4-7.7,50.3-23.1,65.6C876.9,384.7,855.4,392.4,827.7,392.4L827.7,392.4z">
                                                    </path>
                                                  </svg></i></span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div
                          class="elementor-column elementor-col-16 elementor-inner-column elementor-element elementor-element-91f3dfc"
                          data-id="91f3dfc" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-0ed3383 wdt-custom-icon-box-client-logo center elementor-widget elementor-widget-wdt-icon-box"
                              data-id="0ed3383" data-element_type="widget"
                              data-settings='{"columns":"1","columns_laptop":"1","columns_tablet_extra":"1","columns_mobile_extra":"1","columns_tablet":"1","item_normal_background_background":"classic","columns_mobile":1,"carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                              data-widget_type="wdt-icon-box.default">
                              <div class="elementor-widget-container">
                                <div
                                  class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template"
                                  id="wdt-icon-box-0ed3383" data-settings="">
                                  <div class="wdt-column-wrapper wdt-column-gap-no">
                                    <div class="wdt-column">
                                      <div class="wdt-content-item">
                                        <div class="wdt-content-media-group">
                                          <div class="wdt-content-icon-wrapper">
                                            <div class="wdt-content-icon">
                                              <span><i><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewbox="0 0 2787.1 1110" style="
                                                        enable-background: new 0
                                                          0 2787.1 1110;
                                                      " xml:space="preserve">
                                                    <style type="text/css">
                                                      .st0 {
                                                        fill: #dd4242;
                                                      }
                                                    </style>
                                                    <path class="st0"
                                                      d="M496.1,863.6c41,2.1,106,12.3,143.3,29.3c49.5,22.6,31.5,56.6-19.7,49.2c-26.1-3.8-57.1-13.8-72.4-17.2 c-26.4-5.8-53.3-6.9-70.2-15.7C454.1,897.2,441.6,860.9,496.1,863.6L496.1,863.6z">
                                                    </path>
                                                    <path class="st0"
                                                      d="M496.1,950.5c41,2.1,106,12.3,143.3,29.3c49.5,22.6,31.5,56.6-19.7,49.2c-26.1-3.8-57.1-13.8-72.4-17.2 c-26.4-5.8-53.3-6.9-70.2-15.7C454.1,984,441.6,947.7,496.1,950.5L496.1,950.5z">
                                                    </path>
                                                    <path class="st0"
                                                      d="M357.9,380.2V241.9l-0.6-0.1c-0.5-1.1-0.1-5.2,0-6.3l0.1-0.8l-29.8-10.5l260.1-23.5c0.8-4.3,1.1-9.7-1.9-11.9 c-0.5-0.4-1.5-0.7-2.8-0.9c0.2-3.4-0.2-6.8-2.4-8.5c-12.7-9.5-279.9,22.8-284.3,26c-0.9,1.6-1.7,4-2.3,7.1l-20.8-7.3 c-4.1,2.8-10.5,2.2-14.6,1.1c-18.6-4.8-48.4-8.3-56.9-19.1c-4.3-10.8,11.4-13.6,20.9-15.8c7.1-1.7,14.6-2.9,21.6-4.8 c54-15.1,108.5-29.6,162.7-44.1c36.8-9.8,73.7-19.6,110.6-29c12.9-3.3,25.9-6.6,38.9-9.7c4.3-1,11.7-3.1,16.6-3.7l328,85.7 c9.6,2.7,33.8,6.3,40.7,11.9c3.1,2.5,4.4,6,4.9,9.6c-6.8,9.7-75.4,24.6-86.7,27.2c-24,5.5-69.2,14.2-89.4,25.5l-3.8,2.1l-0.3,3.9 c-0.6,7.7-0.7,27.4-0.6,49.5c-57.6-40.3-134.1-56.2-220.9-26.8l-1.1,0.4c-19,2.2-38.6,6.6-58.8,13.5 C435.7,299.2,389.8,334.4,357.9,380.2L357.9,380.2L357.9,380.2z M847.2,199.8c8.6-2.3,17.2-4.8,25.1-7.5l16.3-5.6L847.2,199.8 L847.2,199.8z">
                                                    </path>
                                                    <path class="st0"
                                                      d="M559.3,170.8c0.8-4.3,1-9.7-1.9-11.9c-12.7-9.5-279.9,22.8-284.3,26c-10.2,18.9-3.6,142.7-3.2,177.7h20.8v-0.7 c-0.5-18.3-0.5-36.6-0.8-54.9l-0.2-9.9l2.6,1.2v-43.9l-0.9-36.8l0.7-22.7L559.3,170.8L559.3,170.8z">
                                                    </path>
                                                    <path class="st0"
                                                      d="M666.7,694.8c32.1-40.1,76.1-104.9,82.6-155.6C763.9,426.5,680.7,338.4,580,333 c-157.9-8.6-233.9,155.6-177.6,266.7c31.4,62.1,177.3,164.5,233.6,193.7c98.8,73.5,2.4,71.1-21.9,54.7 c-82.6-56-215.1-129.2-266.4-216.6c-89.2-152.1,13.9-312.1,138.2-354.2c260-88.2,428.4,230.5,270.3,395.1 c-61.5,70.5-73.8,91-73.8,91C677,763.3,636,733.2,666.7,694.8L666.7,694.8z">
                                                    </path>
                                                    <path class="st0"
                                                      d="M605.6,553.3l-23.2,11.5l-17.7,8.8c-67.9,33.7-55.8,39-51.6-27.9l1.6-25.9L516,500c4.8-75.6-5.9-67.8,50-30.7 l21.6,14.3l16.5,11C667.1,536.6,665.7,523.5,605.6,553.3L605.6,553.3z">
                                                    </path>
                                                    <path
                                                      d="M964.2,609.9h104.7c88.2,0,149.2-61.3,149.2-140.3v-0.8c0-79-61-139.5-149.2-139.5H964.2V609.9L964.2,609.9L964.2,609.9z  M1068.8,374.1c59,0,97.5,40.5,97.5,95.4v0.8c0,54.9-38.5,94.6-97.5,94.6h-55.3V374.1H1068.8L1068.8,374.1z M1280.6,609.9h49.3 V329.2h-49.3V609.9L1280.6,609.9z M1538,614.7c49.7,0,89.4-20,117.1-43.7V453.1h-119.5V496h71.8v52.5 c-17.2,12.8-41.3,21.3-67.7,21.3c-57.3,0-95.4-42.5-95.4-100.2v-0.8c0-53.7,39.3-99,91-99c35.7,0,56.9,11.6,78.6,30.1l31.3-37.3 c-28.9-24.5-59-38.1-107.9-38.1c-84.6,0-144.8,66.6-144.8,145.2v0.8C1392.4,552.2,1450.2,614.7,1538,614.7L1538,614.7L1538,614.7z  M1722,609.9h49.3V329.2H1722V609.9L1722,609.9z M1915.3,609.9h49.7v-235h89v-45.7h-227.7v45.7h89V609.9L1915.3,609.9L1915.3,609.9z  M2046,609.9l123.5-282.7h45.7l123.5,282.7h-52.1c-40.9-97.4-51-121.8-95-223.7c-38.6,90.2-57.2,135-95,223.7H2046L2046,609.9z  M2386.8,609.9h196.9V565h-147.5V329.2h-49.3L2386.8,609.9L2386.8,609.9z">
                                                    </path>
                                                    <path
                                                      d="M981.8,743.3c0-12,10.9-21.4,27.9-21.4c13.5,0,25.7,4.3,37.9,14.3l8.6-11.4c-13.3-10.7-27-16.1-46.1-16.1 c-24.9,0-43.1,15-43.1,36s13.9,31.5,44,38.1c27.5,5.8,34.1,12.7,34.1,25.1c0,13.3-11.6,22.5-29.2,22.5s-31.3-6.2-45-18.5l-9.2,10.9 c15.7,14.1,32.8,21,53.6,21c26.1,0,44.8-14.6,44.8-37.3c0-20.2-13.5-30.9-42.7-37.3C988.5,762.8,981.8,755.8,981.8,743.3 L981.8,743.3L981.8,743.3z M1364.3,820.9l-9.7-9.6c-12.6,12-24.4,18.9-42.4,18.9c-28.9,0-50.8-23.8-50.8-54.4s21.7-54,50.8-54 c17.8,0,30.2,7.5,41.2,18l10.1-10.9c-13.1-12.4-27.4-20.8-51.2-20.8c-38.6,0-66.4,30.6-66.4,68s27.9,67.7,65.8,67.7 C1335.6,843.9,1350.6,834.8,1364.3,820.9L1364.3,820.9L1364.3,820.9z M1642.3,782.6v59h14.8V710.5h-14.8v58.3h-75.7v-58.3h-14.8 v131.2h14.8v-59h75.7V782.6z M1983.8,775.9c0-36.4-26.8-67.7-66.7-67.7s-67.1,31.7-67.1,68s26.8,67.7,66.7,67.7 S1983.8,812.3,1983.8,775.9L1983.8,775.9L1983.8,775.9z M1968.4,776.3c0,30-21.4,54-51.4,54s-51.7-24.4-51.7-54.4s21.4-54,51.4-54 C1946.6,721.9,1968.4,746.3,1968.4,776.3L1968.4,776.3L1968.4,776.3z M2304.6,775.9c0-36.4-26.8-67.7-66.7-67.7s-67.1,31.7-67.1,68 s26.8,67.7,66.7,67.7C2277.5,843.9,2304.6,812.3,2304.6,775.9L2304.6,775.9L2304.6,775.9z M2289.3,776.3c0,30-21.4,54-51.4,54 s-51.7-24.4-51.7-54.4s21.4-54,51.4-54C2267.6,721.9,2289.3,746.3,2289.3,776.3L2289.3,776.3L2289.3,776.3z M2497.5,841.7h88.6V828 h-73.9V710.5h-14.8L2497.5,841.7L2497.5,841.7z">
                                                    </path>
                                                  </svg></i></span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div
                          class="elementor-column elementor-col-16 elementor-inner-column elementor-element elementor-element-2cb601a"
                          data-id="2cb601a" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-beb0c9f wdt-custom-icon-box-client-logo center elementor-widget elementor-widget-wdt-icon-box"
                              data-id="beb0c9f" data-element_type="widget"
                              data-settings='{"columns":"1","columns_laptop":"1","columns_tablet_extra":"1","columns_mobile_extra":"1","columns_tablet":"1","item_normal_background_background":"classic","columns_mobile":1,"carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                              data-widget_type="wdt-icon-box.default">
                              <div class="elementor-widget-container">
                                <div
                                  class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template"
                                  id="wdt-icon-box-beb0c9f" data-settings="">
                                  <div class="wdt-column-wrapper wdt-column-gap-no">
                                    <div class="wdt-column">
                                      <div class="wdt-content-item">
                                        <div class="wdt-content-media-group">
                                          <div class="wdt-content-icon-wrapper">
                                            <div class="wdt-content-icon">
                                              <span><i><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewbox="0 0 1530.3 430.1" style="
                                                        enable-background: new 0
                                                          0 1530.3 430.1;
                                                      " xml:space="preserve">
                                                    <style type="text/css">
                                                      .st0 {
                                                        fill: #6b4de1;
                                                      }

                                                      .st1 {
                                                        fill: #ffca6c;
                                                      }

                                                      .st2 {
                                                        fill: #7dd6ff;
                                                      }

                                                      .st3 {
                                                        fill: #8274ff;
                                                      }
                                                    </style>
                                                    <g>
                                                      <path
                                                        d="M1436.6,163.4h28.5l-37.6,103.4c-5.4,14.7-12.5,25.5-21.3,32.1c-8.9,6.7-19.9,9.7-33.1,9v-24.8c7.2,0.1,12.8-1.4,17-4.5  c4.2-3.2,7.5-8.3,10-15.3l-42.3-100h29.1l26.9,69.4L1436.6,163.4L1436.6,163.4z M1309.8,160.5c11.8,0,21.3,3.9,28.4,11.6  c7.1,7.7,10.6,18,10.6,31v63.6h-26.6V205c0-6.2-1.5-11-4.5-14.5c-3-3.4-7.3-5.2-12.8-5.2c-6.1,0-10.8,2-14.1,6  c-3.4,4-5.1,9.8-5.1,17.3v58H1259v-61.7c0-6.2-1.5-11-4.5-14.5c-3-3.4-7.3-5.2-12.8-5.2c-5.9,0-10.6,2-14.1,6s-5.3,9.8-5.3,17.3v58  h-26.6V163.4h26.6v10.9c6.2-9.2,15.8-13.8,28.7-13.8c12.9,0,22,4.9,28.1,14.9C1286,165.4,1296.2,160.5,1309.8,160.5L1309.8,160.5z   M1097.7,205.3h52.7c-1.5-7-4.6-12.3-9.4-15.7s-10.2-5.2-16.2-5.2c-7.2,0-13.1,1.8-17.8,5.5  C1102.4,193.6,1099.3,198.7,1097.7,205.3L1097.7,205.3z M1098.2,225.9c3.6,12.9,13.3,19.4,29.1,19.4c10.2,0,17.9-3.4,23.1-10.3  l21.5,12.4c-10.2,14.7-25.2,22.1-45,22.1c-17.1,0-30.8-5.2-41.1-15.5c-10.3-10.3-15.5-23.3-15.5-39s5.1-28.5,15.3-38.9  c10.2-10.4,23.3-15.6,39.2-15.6c15.1,0,27.6,5.2,37.5,15.7c9.8,10.5,14.8,23.4,14.8,38.8c0,3.4-0.3,7.1-1,10.9L1098.2,225.9  L1098.2,225.9z M975.6,236c5.4,5.4,12.3,8.2,20.5,8.2s15.1-2.7,20.4-8.2c5.4-5.4,8.1-12.4,8.1-21s-2.7-15.5-8.1-21  c-5.4-5.4-12.2-8.2-20.4-8.2s-15.1,2.7-20.5,8.2c-5.4,5.4-8.2,12.4-8.2,21S970.2,230.5,975.6,236L975.6,236z M1024.7,122.1h26.6  v144.6h-26.6v-12.2c-7.8,10-19,15.1-33.5,15.1s-25.8-5.3-35.6-15.8c-9.8-10.5-14.8-23.4-14.8-38.7s4.9-28.2,14.8-38.7  c9.9-10.5,21.7-15.8,35.6-15.8c13.9,0,25.6,5,33.5,15.1V122.1L1024.7,122.1z M846.4,236c5.4,5.4,12.2,8.2,20.4,8.2  c8.3,0,15.1-2.7,20.5-8.2c5.4-5.4,8.2-12.4,8.2-21s-2.7-15.5-8.2-21c-5.4-5.4-12.3-8.2-20.5-8.2s-15.1,2.7-20.4,8.2  c-5.4,5.4-8.1,12.4-8.1,21S841.1,230.5,846.4,236z M895.6,163.4h26.6v103.3h-26.6v-12.2c-8,10-19.2,15.1-33.7,15.1  s-25.6-5.3-35.4-15.8c-9.8-10.5-14.8-23.4-14.8-38.7s4.9-28.2,14.8-38.7c9.8-10.5,21.6-15.8,35.4-15.8c14.5,0,25.7,5,33.7,15.1  V163.4L895.6,163.4z M758,269.5c-15.6,0-28.5-5.2-38.9-15.7c-10.4-10.5-15.6-23.4-15.6-38.8s5.2-28.4,15.6-38.8  c10.4-10.5,23.4-15.7,38.9-15.7c10.1,0,19.2,2.4,27.5,7.2s14.5,11.3,18.8,19.4l-22.9,13.4c-2.1-4.3-5.2-7.6-9.4-10.1  s-8.9-3.7-14.1-3.7c-8,0-14.6,2.6-19.8,8c-5.2,5.3-7.8,12.1-7.8,20.3c0,8.3,2.6,14.8,7.8,20.1s11.8,8,19.8,8  c5.4,0,10.2-1.2,14.4-3.6c4.2-2.4,7.3-5.7,9.4-10l23.1,13.2c-4.5,8.1-10.9,14.6-19.2,19.5C777.2,267.1,768.1,269.5,758,269.5  L758,269.5z M608.9,236c5.4,5.4,12.2,8.2,20.4,8.2s15.1-2.7,20.5-8.2c5.4-5.4,8.2-12.4,8.2-21s-2.7-15.5-8.2-21  c-5.4-5.4-12.3-8.2-20.5-8.2s-15.1,2.7-20.4,8.2c-5.4,5.4-8.1,12.4-8.1,21S603.6,230.5,608.9,236z M658.1,163.4h26.6v103.3h-26.6  v-12.2c-8,10-19.2,15.1-33.7,15.1s-25.6-5.3-35.4-15.8c-9.8-10.5-14.8-23.4-14.8-38.7s4.9-28.2,14.8-38.7  c9.8-10.5,21.6-15.8,35.4-15.8c14.5,0,25.7,5,33.7,15.1V163.4L658.1,163.4z">
                                                      </path>
                                                      <polygon class="st0"
                                                        points="405.9,254.4 440,234.7 474.1,215.1 474.1,175.7 474.1,136.4 440,156 405.9,175.7 405.9,215.1  ">
                                                      </polygon>
                                                      <path class="st1"
                                                        d="M269.6,333.1v78.7l136.3-78.7v-78.7C360.5,280.6,315,306.9,269.6,333.1">
                                                      </path>
                                                      <path class="st2"
                                                        d="M269.6,333.1v78.7l-136.3-78.7v-78.7C178.7,280.6,224.2,306.9,269.6,333.1">
                                                      </path>
                                                      <path class="st3"
                                                        d="M269.6,175.7L235.5,156l-34.1-19.7l34.1-19.7L269.6,97l34.1,19.7l34.1,19.7L303.7,156L269.6,175.7L269.6,175.7  z M65.1,136.4l204.5,118l136.3-78.7L440,156l34.1-19.7l-204.5-118L65.1,136.4z">
                                                      </path>
                                                    </g>
                                                  </svg></i></span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div
                          class="elementor-column elementor-col-16 elementor-inner-column elementor-element elementor-element-49b232f"
                          data-id="49b232f" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-d497f50 wdt-custom-icon-box-client-logo center elementor-widget elementor-widget-wdt-icon-box"
                              data-id="d497f50" data-element_type="widget"
                              data-settings='{"columns":"1","columns_laptop":"1","columns_tablet_extra":"1","columns_mobile_extra":"1","columns_tablet":"1","item_normal_background_background":"classic","columns_mobile":1,"carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                              data-widget_type="wdt-icon-box.default">
                              <div class="elementor-widget-container">
                                <div
                                  class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template"
                                  id="wdt-icon-box-d497f50" data-settings="">
                                  <div class="wdt-column-wrapper wdt-column-gap-no">
                                    <div class="wdt-column">
                                      <div class="wdt-content-item">
                                        <div class="wdt-content-media-group">
                                          <div class="wdt-content-icon-wrapper">
                                            <div class="wdt-content-icon">
                                              <span><i><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewbox="0 0 169 46" style="
                                                        enable-background: new 0
                                                          0 169 46;
                                                      " xml:space="preserve">
                                                    <style type="text/css">
                                                      .st0 {
                                                        fill: #ea137a;
                                                      }
                                                    </style>
                                                    <path class="st0"
                                                      d="M13.8,2.4h19.5c3.9,0,7.3,0.4,9.6,1.1C45,4.2,46.7,5.4,48,6.8c1.2,1.4,1.6,3.3,1.8,5.3c0.4,1.9,0,4.6-0.4,6.2 c-0.5,3.5-1.8,6.2-3.2,7.9c-1.4,1.9-3.2,3.5-5.3,4.8c-2.1,1.2-4.2,2.1-6.4,2.5c-3,0.5-5.7,0.9-8,0.9H7.1L13.8,2.4z M23.4,9.6 L19.5,27h4.2c3.5,0,6.5,0.2,8.1-0.4c3.7-1.2,5.8-5.6,6.4-8.3c0.7-3.3,0.4-6-1.2-7.2c-1.6-1.2-4.8-1.8-9.2-1.8h-4.4V9.6z">
                                                    </path>
                                                    <path class="st0"
                                                      d="M53.8,2.4h21.8c4.8,0,8.1,0.9,10.1,2.6c1.9,1.8,2.7,4,1.9,7.2c-0.7,3.2-2.8,7.4-5.7,9.2 c-3,1.8-7.1,2.8-12.4,2.8h-9.4l-2.3,10.4h-11L53.8,2.4z M61.8,17.2H69c2.7,0,4.4-0.4,5.7-1.2c1.2-0.7,1.9-1.8,2.1-3s0-2.1-0.9-3 c-0.7-0.9-2.5-1.2-5-1.2h-7.8L61.8,17.2z">
                                                    </path>
                                                    <path
                                                      d="M161.7,2.4h-12.6l-8.3,8.8L137,2.4h-12.9l9.2,15.3l-16.1,15.7l1.2-6.2H97l1.1-5.5h20.2l1.4-6.5H99.5l1.2-6h21.8l1.4-6.9 H91.5l-6.7,32h31.3h0.9h12l8.8-9.7l4.8,9.7h12.9l-9.7-16.5L161.7,2.4z">
                                                    </path>
                                                    <path
                                                      d="M86.5,43.2l-2.3-4.8h1.2l1.2,3.2c0.2,0.4,0.2,0.7,0.4,1.1c0.2-0.5,0.4-0.9,0.4-0.9l1.6-3.3h1.4l1.2,2.5 c0.4,0.5,0.5,1.2,0.7,1.8c0.2-0.4,0.2-0.7,0.4-1.1l1.4-3.2h1.2L93,43.3h-1l-1.8-3.7c-0.2-0.4-0.2-0.5-0.4-0.5 c-0.2,0.2-0.2,0.4-0.2,0.5L88,43.2H86.5z">
                                                    </path>
                                                    <path
                                                      d="M95.9,40.9c0-0.9,0.4-1.4,1.2-1.9c0.7-0.5,1.8-0.7,3-0.7c0.9,0,1.6,0.2,2.1,0.4c0.7,0.2,1.1,0.5,1.4,0.9 c0.4,0.4,0.5,0.9,0.5,1.2c0,0.5-0.2,0.9-0.5,1.2c-0.4,0.4-0.9,0.7-1.6,0.9s-1.4,0.4-2.1,0.4c-0.9,0-1.6-0.2-2.1-0.4 c-0.7-0.2-1.1-0.5-1.4-0.9C96.1,41.6,95.9,41.3,95.9,40.9z M97,40.9c0,0.5,0.4,1.1,0.9,1.4c0.5,0.4,1.2,0.5,2.1,0.5s1.6-0.2,2.1-0.5 c0.5-0.4,0.9-0.9,0.9-1.4c0-0.4-0.2-0.7-0.4-1.1c-0.2-0.4-0.5-0.5-1.1-0.7c-0.5-0.2-0.9-0.2-1.6-0.2c-0.9,0-1.6,0.2-2.1,0.5 S97,40.2,97,40.9z">
                                                    </path>
                                                    <path
                                                      d="M106,43.2v-4.8h3.2c0.7,0,1.1,0,1.4,0.2c0.4,0,0.5,0.2,0.7,0.5c0.2,0.2,0.4,0.5,0.4,0.7c0,0.4-0.2,0.7-0.5,0.9 c-0.4,0.2-0.9,0.4-1.6,0.5c0.2,0,0.4,0.2,0.5,0.2c0.4,0.2,0.5,0.4,0.7,0.7l1.2,1.2h-1l-0.9-1.1c-0.4-0.4-0.5-0.5-0.7-0.7 s-0.4-0.2-0.5-0.4c-0.2,0-0.4-0.2-0.4-0.2c-0.2,0-0.4,0-0.5,0h-1.1V43H106V43.2z M106.9,40.6h1.9c0.4,0,0.7,0,1.1-0.2 c0.2,0,0.4-0.2,0.5-0.4c0.2-0.2,0.2-0.4,0.2-0.4c0-0.2-0.2-0.4-0.4-0.5c-0.2-0.2-0.7-0.2-1.2-0.2h-2.3v1.6h0.2V40.6z">
                                                    </path>
                                                    <path d="M113.4,43.2v-4.8h1.1v4.2h4.2v0.5L113.4,43.2L113.4,43.2z">
                                                    </path>
                                                    <path
                                                      d="M119.6,43.2v-4.8h3c0.7,0,1.2,0,1.6,0c0.5,0,0.9,0.2,1.2,0.4c0.5,0.2,0.9,0.5,1.1,0.9s0.4,0.7,0.4,1.2c0,0.4,0,0.7-0.2,1.1 c-0.2,0.4-0.4,0.5-0.5,0.7c-0.2,0.2-0.5,0.4-0.7,0.4c-0.4,0.2-0.7,0.2-1.1,0.2s-0.9,0-1.4,0h-3.4V43.2z M120.7,42.7h1.8 c0.5,0,1.1,0,1.4-0.2c0.4,0,0.5-0.2,0.7-0.2c0.4-0.2,0.5-0.4,0.7-0.5c0.2-0.2,0.2-0.5,0.2-0.9c0-0.5-0.2-0.9-0.5-1.2 c-0.4-0.4-0.7-0.5-1.1-0.5S123,39,122.5,39h-1.8C120.7,39,120.7,42.7,120.7,42.7z">
                                                    </path>
                                                    <path
                                                      d="M129.5,43.2l-2.3-4.8h1.2l1.2,3.2c0.2,0.4,0.2,0.7,0.4,1.1c0.2-0.5,0.4-0.9,0.4-0.9l1.6-3.3h1.4l1.2,2.5 c0.4,0.5,0.5,1.2,0.7,1.8c0.2-0.4,0.2-0.7,0.4-1.1l1.4-3.2h1.2l-2.3,4.8h-1l-1.8-3.7c-0.2-0.4-0.2-0.5-0.4-0.5 c-0.2,0.2-0.2,0.4-0.2,0.5l-1.8,3.7L129.5,43.2L129.5,43.2z">
                                                    </path>
                                                    <path d="M140.2,43.2v-4.8h1.1v4.8H140.2z"></path>
                                                    <path
                                                      d="M143.3,43.2v-4.8h3c0.7,0,1.2,0,1.6,0c0.5,0,0.9,0.2,1.2,0.4c0.5,0.2,0.9,0.5,1.1,0.9c0.2,0.4,0.4,0.7,0.4,1.2 c0,0.4,0,0.7-0.2,1.1c-0.2,0.4-0.4,0.5-0.5,0.7c-0.2,0.2-0.5,0.4-0.7,0.4c-0.4,0.2-0.7,0.2-1.1,0.2c-0.4,0-0.9,0-1.4,0h-3.4V43.2z  M144.4,42.7h1.8c0.5,0,1.1,0,1.4-0.2c0.4,0,0.5-0.2,0.7-0.2c0.4-0.2,0.5-0.4,0.7-0.5c0.2-0.2,0.2-0.5,0.2-0.9 c0-0.5-0.2-0.9-0.5-1.2c-0.4-0.4-0.7-0.5-1.1-0.5c-0.4,0-0.9-0.2-1.4-0.2h-1.8L144.4,42.7L144.4,42.7z">
                                                    </path>
                                                    <path
                                                      d="M152.2,43.2v-4.8h4.4V39h-3.5v1.4h3.4v0.5h-3.4v1.6h3.7V43h-4.6L152.2,43.2L152.2,43.2z">
                                                    </path>
                                                  </svg></i></span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
            <section
              class="elementor-section elementor-top-section elementor-element elementor-element-3e378bd elementor-section-boxed elementor-section-height-default elementor-section-height-default"
              data-id="3e378bd" data-element_type="section"
              data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
              <div class="elementor-container elementor-column-gap-no">
                <div
                  class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-e9a6425"
                  data-id="e9a6425" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <section
                      class="elementor-section elementor-inner-section elementor-element elementor-element-fb65bd3 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                      data-id="fb65bd3" data-element_type="section"
                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                      <div class="elementor-container elementor-column-gap-no">
                        <div
                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-3cfdf2b"
                          data-id="3cfdf2b" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-9e5f041 elementor-widget elementor-widget-image"
                              data-id="9e5f041" data-element_type="widget"
                              data-settings='{"wdt_animation_effect":"none"}' data-widget_type="image.default">
                              <div class="elementor-widget-container">
                                <img loading="lazy" loading="lazy" decoding="async" width="500" height="540"
                                  src="wp-content/uploads/sites/12/2024/03/New-Rectangle-2.webp"
                                  class="attachment-full size-full wp-image-23048" alt="" srcset="
                                      wp-content/uploads/sites/12/2024/03/New-Rectangle-2.webp         500w,
                                      wp-content/uploads/sites/12/2024/03/New-Rectangle-2-278x300.webp 278w
                                    " sizes="(max-width: 500px) 100vw, 500px" />
                              </div>
                            </div>
                            <div
                              class="elementor-element elementor-element-e8f5eb4 elementor-widget elementor-widget-image"
                              data-id="e8f5eb4" data-element_type="widget"
                              data-settings='{"wdt_animation_effect":"mouse-move","wdt_mme_speed":{"unit":"ms","size":1,"sizes":[]},"wdt_mme_depth":{"unit":"dpt","size":0.1,"sizes":[]},"wdt_mme_move_along":"y-axis","wdt_mme_invert_movement":"true","wdt_mme_speed_laptop":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_tablet_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_tablet":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_mobile_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_speed_mobile":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_laptop":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_tablet_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_tablet":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_mobile_extra":{"unit":"px","size":"","sizes":[]},"wdt_mme_depth_mobile":{"unit":"px","size":"","sizes":[]}}'
                              data-widget_type="image.default">
                              <div class="elementor-widget-container">
                                <img loading="lazy" loading="lazy" decoding="async" width="666" height="196"
                                  src="wp-content/uploads/sites/12/2024/02/Vector-1.2.webp"
                                  class="attachment-full size-full wp-image-22426" alt="" srcset="
                                      wp-content/uploads/sites/12/2024/02/Vector-1.2.webp        666w,
                                      wp-content/uploads/sites/12/2024/02/Vector-1.2-300x88.webp 300w
                                    " sizes="(max-width: 666px) 100vw, 666px" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div
                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-0d2960c"
                          data-id="0d2960c" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <section
                              class="elementor-section elementor-inner-section elementor-element elementor-element-5b56473 elementor-section-full_width elementor-section-height-min-height wdt-overflow-hidden elementor-section-height-default"
                              data-id="5b56473" data-element_type="section"
                              data-settings='{"background_background":"video","background_video_link":"https:\/\/wedesignthemes.s3.amazonaws.com\/lizza-lms\/Home+1+Video.mp4","background_play_on_mobile":"yes","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                              <div class="elementor-background-video-container">
                                <video class="elementor-background-video-hosted elementor-html5-video" autoplay=""
                                  muted="" playsinline="" loop=""></video>
                              </div>
                              <div class="elementor-background-overlay"></div>
                              <div class="elementor-container elementor-column-gap-no">
                                <div
                                  class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-8c04440"
                                  data-id="8c04440" data-element_type="column">
                                  <div class="elementor-widget-wrap elementor-element-populated">
                                    <div
                                      class="elementor-element elementor-element-f121100 elementor-widget elementor-widget-spacer"
                                      data-id="f121100" data-element_type="widget"
                                      data-settings='{"wdt_animation_effect":"none"}' data-widget_type="spacer.default">
                                      <div class="elementor-widget-container">
                                        <div class="elementor-spacer">
                                          <div class="elementor-spacer-inner"></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div
                                      class="elementor-element elementor-element-d4f09c9 start elementor-widget elementor-widget-wdt-heading"
                                      data-id="d4f09c9" data-element_type="widget"
                                      data-settings='{"title_vertical_align":"center","subtitle_vertical_align":"center","wdt_animation_effect":"none"}'
                                      data-widget_type="wdt-heading.default">
                                      <div class="elementor-widget-container">
                                        <div class="wdt-heading-holder" id="wdt-heading-d4f09c9">
                                          <h5
                                            class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                                            <span class="wdt-heading-title">Our Story</span>
                                          </h5>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                            <div
                              class="elementor-element elementor-element-a98ac15 elementor-widget elementor-widget-image"
                              data-id="a98ac15" data-element_type="widget"
                              data-settings='{"wdt_animation_effect":"none"}' data-widget_type="image.default">
                              <div class="elementor-widget-container">
                                <img loading="lazy" loading="lazy" decoding="async" width="500" height="575"
                                  src="wp-content/uploads/sites/12/2024/03/New-Rectangle-4.webp"
                                  class="attachment-full size-full wp-image-23049" alt="" srcset="
                                      wp-content/uploads/sites/12/2024/03/New-Rectangle-4.webp         500w,
                                      wp-content/uploads/sites/12/2024/03/New-Rectangle-4-261x300.webp 261w
                                    " sizes="(max-width: 500px) 100vw, 500px" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
                <div
                  class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-79530a8"
                  data-id="79530a8" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <div
                      class="elementor-element elementor-element-26c9742 start elementor-widget__width-initial elementor-widget-tablet__width-inherit elementor-invisible elementor-widget elementor-widget-wdt-heading"
                      data-id="26c9742" data-element_type="widget"
                      data-settings='{"split_heading":"true","wdt_enable_inview_status":"true","_animation":"fadeInRight","title_vertical_align":"center","subtitle_vertical_align":"center","wdt_animation_effect":"none"}'
                      data-widget_type="wdt-heading.default">
                      <div class="elementor-widget-container">
                        <div class="wdt-heading-holder" id="wdt-heading-26c9742">
                          <style>
                            .wdt-heading-main-text {
                              font-weight: 600;
                              color: #333;
                            }

                            .wdt-heading-highlight-text {
                              font-weight: 700;
                              display: inline-block;
                              position: relative;
                            }

                            .wdt-heading-highlight-text::after {
                              content: "";
                              position: absolute;
                              bottom: -5px;
                              left: 0;
                              width: 100%;
                              border-radius: 2px;
                            }
                          </style>

                          <div class="wdt-heading-subtitle-wrapper wdt-heading-align-center">
                            <span class="wdt-heading-subtitle">
                              Modern School Administration</span>
                          </div>
                          <h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                            <span class="wdt-heading-title">
                              <span class="wdt-heading-main-text">Streamlined Across</span>
                              <span class="wdt-heading-highlight-text">All Departments</span>
                            </span>
                          </h2>
                          <div class="wdt-heading-content-wrapper">
                            AcademixSuite unifies student management,
                            financial operations, academic planning, and
                            communication into one powerful multi-tenant
                            platform designed specifically for educational
                            institutions.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="elementor-element elementor-element-068f117 start wdt-counter-style-a elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-wdt-counter"
                      data-id="068f117" data-element_type="widget"
                      data-settings='{"columns_mobile_extra":"2","_animation":"fadeInRight","columns":2,"columns_laptop":2,"columns_tablet_extra":2,"columns_tablet":2,"columns_mobile":1,"carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                      data-widget_type="wdt-counter.default">
                      <div class="elementor-widget-container">
                        <div
                          class="wdt-counter-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template"
                          id="wdt-counter-068f117" data-settings="">
                          <div class="wdt-column-wrapper wdt-column-gap-custom">
                            <div class="wdt-column">
                              <div class="wdt-content-item">
                                <div class="wdt-content-media-group">
                                  <div class="wdt-content-icon-wrapper">
                                    <div class="wdt-content-icon">
                                      <span><i><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewbox="0 0 65.1 60" style="
                                                enable-background: new 0 0 65.1
                                                  60;
                                              " xml:space="preserve">
                                            <g>
                                              <path
                                                d="M19,55H6c-0.6,0-1-0.5-1-1l0,0V7.8c0-0.6,0.5-1,1-1l0,0h13c0.6,0,1,0.5,1,1V54C20.1,54.5,19.6,55,19,55   M7.1,53h11V8.8h-11V53z">
                                              </path>
                                              <path
                                                d="M15.1,48.6H9.9c-0.6,0-1-0.5-1-1.1c0-0.5,0.5-1,1-1h5.3c0.6,0,1,0.5,1,1.1  C16.1,48.2,15.7,48.6,15.1,48.6">
                                              </path>
                                              <path
                                                d="M31.9,55h-13c-0.6,0-1-0.5-1-1c0,0,0,0,0,0V7.8c0-0.6,0.5-1,1-1c0,0,0,0,0,0h13c0.6,0,1,0.5,1,1  c0,0,0,0,0,0V54C32.9,54.5,32.4,55,31.9,55C31.9,55,31.9,55,31.9,55 M19.9,53h11V8.8h-11V53z">
                                              </path>
                                              <path
                                                d="M28,48.6h-5.3c-0.6,0-1-0.5-1-1.1c0-0.5,0.5-1,1-1H28c0.6,0,1,0.5,1,1.1C29,48.2,28.5,48.6,28,48.6">
                                              </path>
                                              <path
                                                d="M46.8,55c-0.4,0-0.8-0.3-1-0.7L30.9,10.6C30.7,10,31,9.4,31.5,9.3l12.3-4.2c0.5-0.2,1.1,0.1,1.3,0.6  c0,0,0,0,0,0l14.9,43.8c0.2,0.5-0.1,1.1-0.6,1.3l-12.3,4.2C47,55,46.9,55,46.8,55 M33.2,10.9l14.3,41.8l10.4-3.5L43.5,7.3  L33.2,10.9z">
                                              </path>
                                              <path
                                                d="M48.4,47.7c-0.6,0-1-0.5-1-1c0-0.4,0.3-0.8,0.7-1l5-1.7c0.5-0.2,1.1,0.1,1.3,0.7  c0.2,0.5-0.1,1.1-0.6,1.3l-5,1.7C48.6,47.7,48.5,47.7,48.4,47.7">
                                              </path>
                                            </g>
                                          </svg></i></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="wdt-content-detail-group">
                                  <div class="wdt-content-counter-wrapper">
                                    <div class="wdt-content-counter">
                                      <span class="wdt-content-counter-number" data-from="0" data-to="70"
                                        data-speed="1000" data-refresh-interval="100"></span><span
                                        class="wdt-content-counter-suffix">%</span>
                                    </div>
                                  </div>
                                  <div class="wdt-content-description">
                                    Reduction in administrative workload with
                                    automated processes
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="wdt-column">
                              <div class="wdt-content-item">
                                <div class="wdt-content-media-group">
                                  <div class="wdt-content-icon-wrapper">
                                    <div class="wdt-content-icon">
                                      <span><i><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewbox="0 0 59 59" style="
                                                enable-background: new 0 0 59 59;
                                              " xml:space="preserve">
                                            <g>
                                              <path
                                                d="M41.9,17.1H17.1c-0.6,0-1.1-0.5-1.2-1.1c0-0.6,0.5-1.1,1.1-1.2c0,0,0,0,0.1,0h24.9  c0.6,0,1.1,0.5,1.2,1.1C43.1,16.6,42.6,17.1,41.9,17.1C42,17.1,42,17.1,41.9,17.1">
                                              </path>
                                              <path
                                                d="M41.9,23.1H17.1c-0.6,0-1.1-0.5-1.2-1.1c0-0.6,0.5-1.1,1.1-1.2c0,0,0,0,0.1,0h24.9  c0.6,0,1.1,0.5,1.2,1.1C43.1,22.6,42.6,23.1,41.9,23.1C42,23.1,42,23.1,41.9,23.1">
                                              </path>
                                              <path
                                                d="M29.5,29.2H17.1c-0.6,0-1.1-0.5-1.2-1.1c0-0.6,0.5-1.1,1.1-1.2c0,0,0,0,0.1,0h12.4  c0.6,0,1.1,0.5,1.2,1.1C30.7,28.6,30.2,29.1,29.5,29.2C29.5,29.2,29.5,29.2,29.5,29.2">
                                              </path>
                                              <path
                                                d="M48.9,54.5c-0.2,0-0.4,0-0.5-0.1l-6.7-3.5l-6.7,3.5c-0.6,0.3-1.2,0.1-1.5-0.5c-0.1-0.2-0.2-0.5-0.1-0.7  l1.3-7.5L29,40.3c-0.4-0.4-0.5-1.2,0-1.6c0.2-0.2,0.4-0.3,0.6-0.3l7.5-1.1l3.4-6.8c0.3-0.6,1-0.8,1.5-0.5c0.2,0.1,0.4,0.3,0.5,0.5  l3.4,6.8l7.5,1.1c0.6,0.1,1,0.7,1,1.3c0,0.2-0.2,0.5-0.3,0.6l-5.5,5.3l1.3,7.5c0.1,0.6-0.3,1.2-0.9,1.3  C49,54.5,48.9,54.5,48.9,54.5 M32.3,40.3l4.2,4.1c0.3,0.3,0.4,0.6,0.3,1l-1,5.8l5.2-2.8c0.3-0.2,0.7-0.2,1.1,0l5.2,2.8l-1-5.8  c-0.1-0.4,0.1-0.7,0.3-1l4.2-4.1l-5.9-0.9c-0.4-0.1-0.7-0.3-0.9-0.6l-2.6-5.3L39,38.9c-0.2,0.3-0.5,0.6-0.9,0.6L32.3,40.3z">
                                              </path>
                                              <path
                                                d="M18.2,54.5c-0.5,0-0.9-0.3-1-0.7l-4.5-11c-4.6-0.3-8.1-4.1-8.1-8.7v-21c0-4.8,3.9-8.7,8.7-8.7h32.7  c4.8,0,8.7,3.9,8.7,8.7v21.3c0,0.6-0.5,1.1-1.1,1.2c-0.6,0-1.1-0.5-1.2-1.1c0,0,0,0,0-0.1V13.2c0-3.5-2.9-6.4-6.4-6.4H13.2  c-3.5,0-6.4,2.9-6.4,6.4v21c0,3.5,2.9,6.4,6.4,6.4h0.2c0.5,0,0.9,0.3,1,0.7l3.7,9.1l3.7-9.1c0.2-0.4,0.6-0.7,1-0.7h1.9  c0.6,0,1.1,0.5,1.2,1.1c0,0.6-0.5,1.1-1.1,1.2c0,0,0,0-0.1,0h-1.2l-4.5,10.9C19,54.2,18.6,54.5,18.2,54.5">
                                              </path>
                                            </g>
                                          </svg></i></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="wdt-content-detail-group">
                                  <div class="wdt-content-counter-wrapper">
                                    <div class="wdt-content-counter">
                                      <span class="wdt-content-counter-number" data-from="0" data-to="4"
                                        data-speed="1000" data-refresh-interval="100"></span><span
                                        class="wdt-content-counter-suffix">.8</span>
                                    </div>
                                  </div>
                                  <div class="wdt-content-description">
                                    Average client satisfaction rating (out of
                                    5)
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="wdt-column">
                              <div class="wdt-content-item">
                                <div class="wdt-content-media-group">
                                  <div class="wdt-content-icon-wrapper">
                                    <div class="wdt-content-icon">
                                      <span><i><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewbox="0 0 74.2 57" style="
                                                enable-background: new 0 0 74.2
                                                  57;
                                              " xml:space="preserve">
                                            <g>
                                              <path
                                                d="M37.1,44.2c-0.3,0-0.5-0.1-0.7-0.3l-3-3.4c-0.2-0.3-0.3-0.6-0.2-1l3-6.9c0.2-0.5,0.7-0.7,1.2-0.5  c0.2,0.1,0.4,0.3,0.5,0.5l3,6.9c0.1,0.3,0.1,0.7-0.2,1l-3,3.4C37.6,44.1,37.4,44.2,37.1,44.2 M35.2,39.7l1.9,2.2l1.9-2.2l-1.9-4.4  L35.2,39.7z">
                                              </path>
                                              <path
                                                d="M17.4,44.5c-0.5,0-0.9-0.4-0.9-0.9c0,0,0-0.1,0-0.1l1.1-7.4c0.4-3.1,2.8-5.5,5.9-6l8.2-1.3  c0.2,0,0.4,0,0.6,0.1l4.8,2.7l4.8-2.7c0.2-0.1,0.4-0.1,0.6-0.1l8.2,1.3c3.1,0.5,5.5,2.9,5.9,6l1.1,7.4c0.1,0.5-0.3,1-0.8,1  c-0.5,0.1-1-0.3-1-0.8l-1.1-7.4c-0.3-2.3-2.1-4.1-4.4-4.4l-7.9-1.3l-5,2.8c-0.3,0.2-0.6,0.2-0.9,0l-5-2.8l-7.9,1.3  c-2.3,0.4-4,2.2-4.4,4.4l-1.1,7.4C18.3,44.2,17.9,44.5,17.4,44.5">
                                              </path>
                                              <path
                                                d="M31.8,30.6c-0.5,0-0.9-0.4-0.9-0.9c0-0.1,0-0.2,0.1-0.4l0.8-1.8c0.2-0.5,0.7-0.7,1.2-0.5  s0.7,0.7,0.5,1.2L32.7,30C32.5,30.3,32.2,30.6,31.8,30.6">
                                              </path>
                                              <path
                                                d="M42.4,30.6c-0.4,0-0.7-0.2-0.8-0.6l-0.8-1.8c-0.2-0.5,0-1,0.5-1.2s1,0,1.2,0.5l0.8,1.8  c0.2,0.5,0,1-0.5,1.2C42.6,30.5,42.5,30.6,42.4,30.6">
                                              </path>
                                              <path
                                                d="M37.1,27.3c-4.3,0-6.9-3.9-7.9-7.3c-0.8-0.5-1.3-1.5-1.3-2.4l-0.1-1.2c-0.2-1,0.2-2,1-2.6  c0-1.7,0.1-6.4,2.6-7.6c0,0,0,0,0-0.1c0.4-0.8,1-1.3,3-1.5c2.5-0.3,6,0.2,7.9,1.7l0.1,0.1c1.1,0.9,3.1,2.5,3,7.4  c0.8,0.6,1.1,1.6,1,2.6l-0.1,1.2c0,1-0.4,1.9-1.2,2.4C44.1,23.6,41.5,27.3,37.1,27.3 M35.9,6.3c-0.4,0-0.8,0-1.2,0.1  c-1.4,0.2-1.5,0.4-1.6,0.5c-0.2,0.4-0.5,0.7-0.9,0.9c-1.5,0.7-1.7,4.6-1.6,6.4c0,0.4-0.2,0.8-0.6,0.9c-0.2,0.1-0.5,0.2-0.4,1.1  l0.1,1.2c0.1,0.8,0.2,0.9,0.5,1c0.3,0.1,0.5,0.3,0.6,0.6c0.8,2.9,2.9,6.4,6.3,6.4c4.4,0,6-4.9,6.3-6.4c0.1-0.3,0.3-0.6,0.6-0.7  c0.3-0.1,0.4-0.2,0.5-1l0.1-1.2c0.1-0.9-0.2-1-0.4-1.1c-0.4-0.1-0.6-0.5-0.6-0.9c0.2-4.4-1.4-5.7-2.4-6.5l-0.1-0.1  C39.6,6.7,37.7,6.3,35.9,6.3">
                                              </path>
                                              <path
                                                d="M44.2,11.8c-0.4,0-0.8-0.3-0.9-0.7c-0.1-0.3-0.3-0.6-0.5-0.7c-1-0.6-3.3-0.4-6,0.5  c-2.6,0.8-4.6,0.8-5.8-0.2c-0.8-0.6-1.2-1.4-1.2-2.4c0-0.5,0.4-0.9,0.9-0.9c0.5,0,0.9,0.4,0.9,0.9c0,0.4,0.2,0.7,0.5,0.9  c0.4,0.3,1.5,0.7,4.2-0.1c2.4-0.7,5.6-1.4,7.5-0.3c0.7,0.4,1.2,1.1,1.4,1.9c0.1,0.5-0.2,1-0.7,1.1C44.4,11.8,44.3,11.8,44.2,11.8   M31.5,8.3L31.5,8.3z">
                                              </path>
                                              <path
                                                d="M63.6,48.2H10.6c-0.5,0-0.9-0.4-0.9-0.9l0,0V16.7c0-2.2,1.8-4,4.1-4.1h11.7c0.5,0,0.9,0.4,0.9,1  c0,0.5-0.4,0.9-0.9,0.9H13.8c-1.2,0-2.2,1-2.2,2.2v29.7h51.1V16.7c0-1.2-1-2.2-2.2-2.2H48.7c-0.5,0-0.9-0.4-0.9-1  c0-0.5,0.4-0.9,0.9-0.9h11.7c2.2,0,4,1.8,4.1,4.1v30.6C64.5,47.8,64.1,48.2,63.6,48.2L63.6,48.2">
                                              </path>
                                              <path
                                                d="M65.6,52.5H8.6c-2.2,0-4-1.8-4.1-4.1v-1.2c0-0.5,0.4-0.9,0.9-0.9c0,0,0,0,0,0h63.3  c0.5,0,0.9,0.4,0.9,0.9l0,0v1.2C69.7,50.7,67.9,52.5,65.6,52.5 M6.3,48.2v0.2c0,1.2,1,2.2,2.2,2.2h57.1c1.2,0,2.2-1,2.2-2.2v-0.2  H6.3z">
                                              </path>
                                            </g>
                                          </svg></i></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="wdt-content-detail-group">
                                  <div class="wdt-content-counter-wrapper">
                                    <div class="wdt-content-counter">
                                      <span class="wdt-content-counter-number" data-from="0" data-to="99"
                                        data-speed="1000" data-refresh-interval="100"></span><span
                                        class="wdt-content-counter-suffix">.7%</span>
                                    </div>
                                  </div>
                                  <div class="wdt-content-description">
                                    System uptime reliability for
                                    uninterrupted operations
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="wdt-column">
                              <div class="wdt-content-item">
                                <div class="wdt-content-media-group">
                                  <div class="wdt-content-icon-wrapper">
                                    <div class="wdt-content-icon">
                                      <span><i><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewbox="0 0 76.8 60" style="
                                                enable-background: new 0 0 76.8
                                                  60;
                                              " xml:space="preserve">
                                            <g>
                                              <path
                                                d="M68.6,48.8h-17c-0.6,0-1-0.4-1.1-1s0.4-1,1-1.1c0,0,0,0,0.1,0h17c0.6,0,1.1-0.5,1.1-1.1V8.2  c0-0.6-0.5-1.1-1.1-1.1H8.2c-0.6,0-1.1,0.5-1.1,1.1v37.5c0,0.6,0.5,1.1,1.1,1.1h17c0.6,0,1,0.4,1.1,1s-0.4,1-1,1.1c0,0,0,0-0.1,0  h-17c-1.8,0-3.2-1.4-3.2-3.2V8.2C5,6.4,6.4,5,8.2,5h60.5c1.8,0,3.2,1.4,3.2,3.2v37.5C71.8,47.4,70.4,48.8,68.6,48.8">
                                              </path>
                                              <path
                                                d="M38.4,45.6c-1.7,0-3.3-0.7-4.5-1.8c-0.8-0.8-1.9-1.2-3-1.2c-3.5,0-6.3-2.8-6.3-6.3c0-1.1-0.4-2.2-1.2-3  c-2.5-2.5-2.5-6.5,0-8.9c0.8-0.8,1.2-1.9,1.2-3c0-3.5,2.8-6.3,6.3-6.3c1.1,0,2.2-0.4,3-1.2c2.5-2.5,6.5-2.5,8.9,0  c0.8,0.8,1.9,1.2,3,1.2c3.5,0,6.3,2.8,6.3,6.3c0,1.1,0.4,2.2,1.2,3c2.5,2.5,2.5,6.5,0,8.9c-0.8,0.8-1.2,1.9-1.2,3  c0,3.5-2.8,6.3-6.3,6.3c-1.1,0-2.2,0.4-3,1.2C41.7,44.9,40.1,45.6,38.4,45.6 M38.4,13.9c-1.1,0-2.2,0.4-3,1.2  c-1.2,1.2-2.8,1.9-4.5,1.8c-2.3,0-4.2,1.9-4.2,4.2c0,1.7-0.7,3.3-1.8,4.5c-1.7,1.7-1.7,4.3,0,6c1.2,1.2,1.9,2.8,1.8,4.5  c0,2.3,1.9,4.2,4.2,4.2c1.7,0,3.3,0.7,4.5,1.8c1.7,1.7,4.3,1.7,6,0c1.2-1.2,2.8-1.9,4.5-1.8c2.3,0,4.2-1.9,4.2-4.2  c0-1.7,0.7-3.3,1.8-4.5c1.7-1.7,1.7-4.3,0-6c-1.2-1.2-1.9-2.8-1.8-4.5c0-2.3-1.9-4.2-4.2-4.2c-1.7,0-3.3-0.7-4.5-1.8  C40.6,14.4,39.5,13.9,38.4,13.9">
                                              </path>
                                              <path
                                                d="M38.4,38.9c-5.7,0-10.2-4.6-10.2-10.2s4.6-10.2,10.2-10.2s10.2,4.6,10.2,10.2  C48.6,34.4,44.1,38.9,38.4,38.9 M38.4,20.6c-4.5,0-8.2,3.7-8.2,8.2c0,4.5,3.7,8.2,8.2,8.2s8.2-3.7,8.2-8.2  C46.6,24.2,42.9,20.6,38.4,20.6">
                                              </path>
                                              <path
                                                d="M47.2,55c-0.1,0-0.3,0-0.4-0.1l-8.3-3.7l-8.3,3.7c-0.5,0.2-1.1,0-1.4-0.5c-0.1-0.1-0.1-0.3-0.1-0.4V41.6  c0-0.6,0.4-1,1-1.1s1,0.4,1.1,1c0,0,0,0,0,0.1v10.8l7.3-3.3c0.3-0.1,0.6-0.1,0.8,0l7.3,3.3V41.6c0-0.6,0.4-1,1-1.1s1,0.4,1.1,1  c0,0,0,0,0,0.1V54C48.2,54.5,47.7,55,47.2,55">
                                              </path>
                                            </g>
                                          </svg></i></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="wdt-content-detail-group">
                                  <div class="wdt-content-counter-wrapper">
                                    <div class="wdt-content-counter">
                                      <span class="wdt-content-counter-number" data-from="0" data-to="250"
                                        data-speed="1000" data-refresh-interval="100"></span><span
                                        class="wdt-content-counter-suffix">+</span>
                                    </div>
                                  </div>
                                  <div class="wdt-content-description">
                                    Educational institutions powered by our
                                    platform
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="elementor-element elementor-element-b61136d start elementor-invisible elementor-widget elementor-widget-wdt-button"
                      data-id="b61136d" data-element_type="widget"
                      data-settings='{"_animation":"fadeInRight","wdt_animation_effect":"none"}'
                      data-widget_type="wdt-button.default">
                      <div class="elementor-widget-container">
                        <div
                          class="wdt-button-holder wdt-template-filled wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after"
                          id="wdt-button-b61136d">
                          <a class="wdt-button" href="/request-demo" data-tooltip="Request a Personalized Demo">
                            <div class="wdt-button-text">
                              <span>Request a Demo</span><span>Request a Demo</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section
              class="elementor-section elementor-top-section elementor-element elementor-element-c254d89 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
              data-id="c254d89" data-element_type="section"
              data-settings='{"background_background":"classic","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
              <div class="elementor-container elementor-column-gap-no">
                <div
                  class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3c6f057"
                  data-id="3c6f057" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <section
                      class="elementor-section elementor-inner-section elementor-element elementor-element-5871664 elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-invisible"
                      data-id="5871664" data-element_type="section"
                      data-settings='{"animation":"fadeInRight","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                      <div class="elementor-container elementor-column-gap-no">
                        <div
                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7118ee2"
                          data-id="7118ee2" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-2837804 start center start elementor-widget elementor-widget-wdt-heading"
                              data-id="2837804" data-element_type="widget"
                              data-settings='{"split_heading":"true","wdt_enable_inview_status":"true","title_vertical_align":"center","subtitle_vertical_align":"center","wdt_animation_effect":"none"}'
                              data-widget_type="wdt-heading.default">
                              <div class="elementor-widget-container">
                                <div class="wdt-heading-holder" id="wdt-heading-2837804">
                                  <div class="wdt-heading-subtitle-wrapper wdt-heading-align-center">
                                    <span class="wdt-heading-subtitle">Comprehensive Solution</span>
                                  </div>
                                  <h2
                                    class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                                    <span class="wdt-heading-title">Discover AcademixSuite
                                      <span class="wdt-split-heading-wrapper"><span
                                          class="wdt-split-heading-title">F</span><span
                                          class="wdt-split-heading-title">e</span><span
                                          class="wdt-split-heading-title">a</span><span
                                          class="wdt-split-heading-title">t</span><span
                                          class="wdt-split-heading-title">u</span><span
                                          class="wdt-split-heading-title">r</span><span
                                          class="wdt-split-heading-title">e</span><span
                                          class="wdt-split-heading-title">s</span></span></span>
                                  </h2>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div
                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-840d403"
                          data-id="840d403" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-90b49a0 end center start elementor-widget elementor-widget-wdt-button"
                              data-id="90b49a0" data-element_type="widget"
                              data-settings='{"wdt_animation_effect":"none"}' data-widget_type="wdt-button.default">
                              <div class="elementor-widget-container">
                                <div
                                  class="wdt-button-holder wdt-template-filled wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after"
                                  id="wdt-button-90b49a0">
                                  <a class="wdt-button" href="/request-demo" data-tooltip="Schedule a Demo">
                                    <div class="wdt-button-text">
                                      <span>Schedule a Demo</span><span>Schedule a Demo</span>
                                    </div>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section
                      class="elementor-section elementor-inner-section elementor-element elementor-element-ae059d7 elementor-section-full_width animated-fast elementor-section-height-default elementor-section-height-default elementor-invisible"
                      data-id="ae059d7" data-element_type="section"
                      data-settings='{"animation":"fadeInLeft","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                      <div class="elementor-container elementor-column-gap-no">
                        <div
                          class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-4ca2e68"
                          data-id="4ca2e68" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-a86ce2c wdt-lms-category-type-1 elementor-widget elementor-widget-dtlms-widget-default-course-categories"
                              data-id="a86ce2c" data-element_type="widget"
                              data-settings='{"wdt_animation_effect":"none"}'
                              data-widget_type="dtlms-widget-default-course-categories.default">
                              <div class="elementor-widget-container">
                                <!-- Multi-Tenant Architecture -->
                                <div class="dtlms-course-category-item type1 dtlms-column dtlms-one-fourth first">
                                  <img decoding="async"
                                    src="wp-content/uploads/sites/12/2024/03/school-network-architecture.webp"
                                    alt="Multi-Tenant School Network" title="Multi-Tenant School Network" />
                                  <div class="dtlms-course-category-meta-data">
                                    <img decoding="async" src="wp-content/uploads/sites/12/2024/02/Categorey-Icon-7.svg"
                                      alt="Multi-Tenant Architecture" title="Multi-Tenant Architecture" />
                                    <h3>
                                      <a href="/multi-tenant-architecture">Multi-Tenant Platform</a>
                                    </h3>
                                    <div class="dtlms-category-total-items">
                                      <span>One</span> platform, multiple
                                      schools
                                    </div>
                                  </div>
                                </div>

                                <!-- Student Lifecycle Management -->
                                <div class="dtlms-course-category-item type1 dtlms-column dtlms-one-fourth">
                                  <img decoding="async"
                                    src="wp-content/uploads/sites/12/2024/03/student-management-dashboard.webp"
                                    alt="Student Management Dashboard" title="Student Management Dashboard" />
                                  <div class="dtlms-course-category-meta-data">
                                    <img decoding="async" src="wp-content/uploads/sites/12/2024/02/Categorey-Icon-8.svg"
                                      alt="Student Management" title="Student Management" />
                                    <h3>
                                      <a href="/student-management">Student Management</a>
                                    </h3>
                                    <div class="dtlms-category-total-items">
                                      <span>360°</span> lifecycle tracking
                                    </div>
                                  </div>
                                </div>

                                <!-- Academic Planning -->
                                <div class="dtlms-course-category-item type1 dtlms-column dtlms-one-fourth">
                                  <img decoding="async"
                                    src="wp-content/uploads/sites/12/2024/03/academic-curriculum-planning.webp"
                                    alt="Academic Curriculum Planning" title="Academic Curriculum Planning" />
                                  <div class="dtlms-course-category-meta-data">
                                    <img decoding="async" src="wp-content/uploads/sites/12/2024/02/Categorey-Icon-1.svg"
                                      alt="Academic Planning" title="Academic Planning" />
                                    <h3>
                                      <a href="/academic-planning">Academic Planning</a>
                                    </h3>
                                    <div class="dtlms-category-total-items">
                                      <span>Complete</span> curriculum system
                                    </div>
                                  </div>
                                </div>

                                <!-- Financial Management -->
                                <div class="dtlms-course-category-item type1 dtlms-column dtlms-one-fourth">
                                  <img decoding="async"
                                    src="wp-content/uploads/sites/12/2024/03/financial-billing-system.webp"
                                    alt="Financial Billing System" title="Financial Billing System" />
                                  <div class="dtlms-course-category-meta-data">
                                    <img decoding="async" src="wp-content/uploads/sites/12/2024/02/Categorey-Icon-4.svg"
                                      alt="Financial Management" title="Financial Management" />
                                    <h3>
                                      <a href="/financial-management">Financial Management</a>
                                    </h3>
                                    <div class="dtlms-category-total-items">
                                      <span>Automated</span> billing &
                                      reporting
                                    </div>
                                  </div>
                                </div>

                                <!-- Communication Portal -->
                                <div class="dtlms-course-category-item type1 dtlms-column dtlms-one-fourth first">
                                  <img decoding="async"
                                    src="wp-content/uploads/sites/12/2024/03/parent-teacher-portal.webp"
                                    alt="Parent-Teacher Portal" title="Parent-Teacher Portal" />
                                  <div class="dtlms-course-category-meta-data">
                                    <img decoding="async" src="wp-content/uploads/sites/12/2024/02/Categorey-Icon-6.svg"
                                      alt="Communication Portal" title="Communication Portal" />
                                    <h3>
                                      <a href="/communication-portal">Communication Hub</a>
                                    </h3>
                                    <div class="dtlms-category-total-items">
                                      <span>Integrated</span> parent portal
                                    </div>
                                  </div>
                                </div>

                                <!-- Attendance & Timetable -->
                                <div class="dtlms-course-category-item type1 dtlms-column dtlms-one-fourth">
                                  <img decoding="async"
                                    src="wp-content/uploads/sites/12/2024/03/attendance-timetable-system.webp"
                                    alt="Attendance & Timetable System" title="Attendance & Timetable System" />
                                  <div class="dtlms-course-category-meta-data">
                                    <img decoding="async" src="wp-content/uploads/sites/12/2024/02/Categorey-Icon-9.svg"
                                      alt="Attendance System" title="Attendance System" />
                                    <h3>
                                      <a href="/attendance-system">Attendance System</a>
                                    </h3>
                                    <div class="dtlms-category-total-items">
                                      <span>Real-time</span> tracking
                                    </div>
                                  </div>
                                </div>

                                <!-- Analytics & Reporting -->
                                <div class="dtlms-course-category-item type1 dtlms-column dtlms-one-fourth">
                                  <img decoding="async"
                                    src="wp-content/uploads/sites/12/2024/03/analytics-dashboard.webp"
                                    alt="Analytics Dashboard" title="Analytics Dashboard" />
                                  <div class="dtlms-course-category-meta-data">
                                    <img decoding="async" src="wp-content/uploads/sites/12/2024/02/Categorey-Icon-2.svg"
                                      alt="Analytics & Reporting" title="Analytics & Reporting" />
                                    <h3>
                                      <a href="/analytics-reporting">Advanced Analytics</a>
                                    </h3>
                                    <div class="dtlms-category-total-items">
                                      <span>Comprehensive</span> insights
                                    </div>
                                  </div>
                                </div>

                                <!-- HR & Staff Management -->
                                <div class="dtlms-course-category-item type1 dtlms-column dtlms-one-fourth">
                                  <img decoding="async"
                                    src="wp-content/uploads/sites/12/2024/03/hr-staff-management.webp"
                                    alt="HR & Staff Management" title="HR & Staff Management" />
                                  <div class="dtlms-course-category-meta-data">
                                    <img decoding="async" src="wp-content/uploads/sites/12/2024/02/Categorey-Icon-5.svg"
                                      alt="HR Management" title="HR Management" />
                                    <h3>
                                      <a href="/hr-management">HR Management</a>
                                    </h3>
                                    <div class="dtlms-category-total-items">
                                      <span>Complete</span> staff
                                      administration
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
            <section
              class="elementor-section elementor-top-section elementor-element elementor-element-0b54397 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
              data-id="0b54397" data-element_type="section"
              data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
              <div class="elementor-container elementor-column-gap-no">
                <div
                  class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-d872c11"
                  data-id="d872c11" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <div
                      class="elementor-element elementor-element-73f45e8 start elementor-invisible elementor-widget elementor-widget-wdt-heading"
                      data-id="73f45e8" data-element_type="widget"
                      data-settings='{"split_heading":"true","wdt_enable_inview_status":"true","_animation":"fadeInLeft","title_vertical_align":"center","subtitle_vertical_align":"center","wdt_animation_effect":"none"}'
                      data-widget_type="wdt-heading.default">
                      <div class="elementor-widget-container">
                        <div class="wdt-heading-holder" id="wdt-heading-73f45e8">
                          <div class="wdt-heading-subtitle-wrapper wdt-heading-align-center">
                            <span class="wdt-heading-subtitle">Get Started Now</span>
                          </div>
                          <h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                            <span class="wdt-heading-title">See AcademixSuite in Action<span
                                class="wdt-split-heading-wrapper"></span></span>
                          </h2>
                          <div class="wdt-heading-content-wrapper">
                            Request a personalized demo to see how our
                            platform can transform your school's
                            administration in just 30 minutes.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="elementor-element elementor-element-c27298d wdt-contact-form-icon-list elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-invisible elementor-widget elementor-widget-icon-list"
                      data-id="c27298d" data-element_type="widget"
                      data-settings='{"_animation":"fadeInLeft","wdt_animation_effect":"none"}'
                      data-widget_type="icon-list.default">
                      <div class="elementor-widget-container">
                        <ul class="elementor-icon-list-items">
                          <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                              <!-- Keep existing SVG -->
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewbox="0 0 38 38" style="enable-background: new 0 0 38 38"
                                xml:space="preserve">
                                <g>
                                  <g>
                                    <path
                                      d="M15.8,11.9H8.9c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7h6.8c0.4,0,0.7,0.3,0.7,0.7S16.2,11.9,15.8,11.9z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M15.8,15.3H8.9c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7h6.8c0.4,0,0.7,0.3,0.7,0.7S16.2,15.3,15.8,15.3z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M15.8,18.7H8.9c-0.4,0-0.7-0.3-0.7-0.7c0-0.4,0.3-0.7,0.7-0.7h6.8c0.4,0,0.7,0.3,0.7,0.7C16.5,18.4,16.2,18.7,15.8,18.7z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M15.8,22.2H8.9c-0.4,0-0.7-0.3-0.7-0.7c0-0.4,0.3-0.7,0.7-0.7h6.8c0.4,0,0.7,0.3,0.7,0.7C16.5,21.9,16.2,22.2,15.8,22.2z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M19,27.4c-0.2,0-0.4-0.1-0.5-0.2l-1.4-1.5H5.7C5.3,25.7,5,25.4,5,25V7.7C5,7.3,5.3,7,5.7,7h11.7c0.2,0,0.4,0.1,0.5,0.2   l1.6,1.7c0.1,0.1,0.2,0.3,0.2,0.5v17.3c0,0.3-0.2,0.5-0.4,0.6C19.2,27.4,19.1,27.4,19,27.4z M6.4,24.4h11c0.2,0,0.4,0.1,0.5,0.2   l0.5,0.5V9.7l-1.2-1.3H6.4V24.4z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M19.2,10.1c-0.2,0-0.3-0.1-0.5-0.2c-0.3-0.3-0.3-0.7,0-1l1.6-1.7c0.3-0.3,0.7-0.3,1,0c0.3,0.3,0.3,0.7,0,1l-1.6,1.7   C19.6,10,19.4,10.1,19.2,10.1z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M19.2,27.4c-0.2,0-0.3-0.1-0.5-0.2c-0.3-0.3-0.3-0.7,0-1l1.6-1.7c0.3-0.3,0.7-0.3,1,0s0.3,0.7,0,1l-1.6,1.7   C19.6,27.4,19.4,27.4,19.2,27.4z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M32.6,25.7H20.8c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7h11v-16h-11c-0.4,0-0.7-0.3-0.7-0.7c0-0.4,0.3-0.7,0.7-0.7h11.7   c0.4,0,0.7,0.3,0.7,0.7V25C33.2,25.4,32.9,25.7,32.6,25.7z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M35.2,28.4H2.8c-0.4,0-0.7-0.3-0.7-0.7V10.4c0-0.4,0.3-0.7,0.7-0.7h2.9c0.4,0,0.7,0.3,0.7,0.7s-0.3,0.7-0.7,0.7H3.5v16h31   v-16h-1.9c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7h2.6c0.4,0,0.7,0.3,0.7,0.7v17.3C35.9,28.1,35.6,28.4,35.2,28.4z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M29.3,11.9h-6.8c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7h6.8c0.4,0,0.7,0.3,0.7,0.7S29.7,11.9,29.3,11.9z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M29.3,15.3h-6.8c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7h6.8c0.4,0,0.7,0.3,0.7,0.7S29.7,15.3,29.3,15.3z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M29.3,18.7h-6.8c-0.4,0-0.7-0.3-0.7-0.7c0-0.4,0.3-0.7,0.7-0.7h6.8c0.4,0,0.7,0.3,0.7,0.7C30,18.4,29.7,18.7,29.3,18.7z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M25.8,7.9c-0.4,0-0.7-0.3-0.7-0.7c0-0.5-0.2-1.2-0.7-1.2H13.3c-0.4,0-0.4,0.9-0.4,1.2c0,0.4-0.3,0.7-0.7,0.7   s-0.7-0.3-0.7-0.7c0-2.3,1.2-2.6,1.8-2.6h11.1c1.3,0,2,1.3,2,2.6C26.5,7.6,26.2,7.9,25.8,7.9z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M24.4,30.9H13.3c-0.5,0-1.8-0.3-1.8-2.6c0-0.4,0.3-0.7,0.7-0.7s0.7,0.3,0.7,0.7c0,0.2,0,1.2,0.4,1.2h11.1   c0.4,0,0.7-0.6,0.7-1.2c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C26.5,29.5,25.8,30.9,24.4,30.9z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M20.6,33.4h-3.3c-0.4,0-0.7-0.3-0.7-0.7S17,32,17.4,32h3.3c0.4,0,0.7,0.3,0.7,0.7S21,33.4,20.6,33.4z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M25.8,36H12.2c-1.8,0-3.3-1.5-3.3-3.3V28c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7v4.6c0,1.1,0.9,2,1.9,2h13.6   c1.1,0,1.9-0.9,1.9-2v-4.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7v4.4C29.1,34.5,27.6,36,25.8,36z">
                                    </path>
                                  </g>
                                  <g>
                                    <path
                                      d="M28.4,7.8c-0.4,0-0.7-0.3-0.7-0.7V5.3c0-1.1-0.9-2-1.9-2H12.2c-1.1,0-1.9,0.9-1.9,2v1.8c0,0.4-0.3,0.7-0.7,0.7   S8.9,7.5,8.9,7.1V5.3c0-1.8,1.5-3.3,3.3-3.3h13.6c1.8,0,3.3,1.5,3.3,3.3v1.8C29.1,7.5,28.8,7.8,28.4,7.8z">
                                    </path>
                                  </g>
                                </g>
                              </svg>
                            </span>
                            <span class="elementor-icon-list-text">Live platform walkthrough</span>
                          </li>
                          <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                              <!-- Keep existing SVG -->
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewbox="0 0 90 90" style="enable-background: new 0 0 90 90"
                                xml:space="preserve">
                                <g>
                                  <path
                                    d="M55.9,24.9c0-0.9-0.5-1.7-1.3-2.1L49,20.7c-0.4-0.1-0.7,0.3-0.4,0.6l0.6,0.8l-3.2,1.9l-1.6,3l-1.6-3L39.5,22l0.7-0.9  c0.3-0.3-0.1-0.8-0.5-0.6l-5.7,2.3c-0.8,0.4-1.3,1.2-1.3,2.1v9h0l0,0c0,0,0,2.6,0,2.7l0.1,6.1l0,0c0,0.6,0.2,1.2,0.6,1.6l2.5,3.2  L36.3,69c0,0.5,0.2,2.2,2.3,2.2c1.6,0,2.2-1.6,2.3-2L43.1,51c0.1-0.6,0.6-1,1.2-1h0c0.6,0,1.1,0.4,1.2,1l2.2,18.2  c0,0.4,0.7,2,2.3,2c2.1,0,2.3-1.7,2.3-2.2l0.4-21.4l2.5-3.2c0.4-0.5,0.6-1,0.6-1.6l0,0L55.9,24.9z">
                                  </path>
                                  <path
                                    d="M44.3,18.7c3.2,0,5.8-4.7,5.8-7.9c0-3.2-2.6-5.8-5.8-5.8c-3.2,0-5.8,2.6-5.8,5.8C38.5,14,41.1,18.7,44.3,18.7z">
                                  </path>
                                  <path
                                    d="M60.1,64c5.2,0.4,10.3,1.1,15.3,3c1.2,0.5,2.5,1.1,3.6,1.9c0.6,0.4,1.1,0.9,1.6,1.4c0.5,0.6,0.9,1.3,1.1,2.1  c0.2,0.8,0.1,1.8-0.2,2.6c-0.3,0.8-0.8,1.4-1.3,1.9c-1.1,1.1-2.2,1.8-3.5,2.5c-2.4,1.3-5,2.1-7.5,2.8c-2.6,0.7-5.1,1.2-7.7,1.6  c-5.2,0.8-10.4,1.1-15.6,1.2c-5.2,0-10.5-0.3-15.7-1c-2.6-0.4-5.2-0.8-7.7-1.5c-2.6-0.6-5.1-1.4-7.6-2.5c-1.2-0.6-2.4-1.2-3.6-2  c-1.1-0.8-2.3-1.8-2.9-3.4c-0.1-0.4-0.2-0.8-0.2-1.3c0-0.2,0-0.4,0-0.6c0-0.2,0-0.4,0.1-0.6c0.2-0.4,0.3-0.8,0.5-1.1l0.3-0.5  c0.1-0.1,0.3-0.3,0.4-0.4c1-1.1,2.2-1.8,3.4-2.4c2.4-1.1,5-1.9,7.5-2.4c2.6-0.5,5.1-0.9,7.7-1.1c-2.5,0.6-5,1.2-7.5,2  c-2.4,0.8-4.8,1.7-7,2.9c-1.1,0.6-2.1,1.3-2.8,2.2c-0.1,0.1-0.2,0.2-0.3,0.3L10.5,72c-0.2,0.2-0.2,0.4-0.3,0.7  c-0.1,0.4-0.1,0.8,0.1,1.2c0.4,0.8,1.2,1.6,2.2,2.2c1,0.6,2.1,1.1,3.3,1.6c4.6,1.7,9.7,2.6,14.7,3.2c5,0.6,10.1,0.8,15.2,0.8  c5.1,0,10.2-0.3,15.2-1c2.5-0.3,5.1-0.8,7.5-1.3c2.4-0.6,4.9-1.3,7.1-2.3c1.1-0.5,2.2-1.1,2.9-1.9c0.8-0.7,1.3-1.6,1.1-2.4  c-0.1-0.8-0.9-1.8-1.8-2.5c-0.9-0.7-2-1.3-3.1-1.9C70.2,66.3,65.1,65.1,60.1,64z">
                                  </path>
                                  <path
                                    d="M53.7,65.8c3,0,6,0.3,8.9,1.2c0.7,0.3,1.5,0.5,2.2,1c0.4,0.2,0.7,0.5,1.1,0.8c0.2,0.2,0.3,0.4,0.5,0.6  c0.1,0.3,0.3,0.5,0.3,0.8c0.2,0.6,0.1,1.3-0.2,1.9c-0.3,0.5-0.6,0.9-0.9,1.2c-0.7,0.6-1.4,1.1-2.1,1.4c-1.5,0.7-2.9,1.2-4.4,1.6  c-1.5,0.4-3,0.7-4.5,0.9c-3,0.5-6,0.7-9,0.7c-3,0-6-0.1-9-0.6c-1.5-0.2-3-0.5-4.5-0.8c-1.5-0.3-3-0.8-4.4-1.4  c-0.7-0.3-1.5-0.7-2.2-1.2c-0.4-0.2-0.7-0.5-1-0.8c-0.3-0.3-0.7-0.7-0.9-1.3c-0.2-0.5-0.3-1.3-0.1-1.8c0.2-0.6,0.5-1,0.9-1.3  c0.7-0.7,1.4-1,2.2-1.3c2.9-1.1,5.9-1.4,8.9-1.5c-2.8,0.8-5.7,1.6-8.1,3c-0.6,0.4-1.1,0.7-1.5,1.2c-0.2,0.2-0.2,0.4-0.3,0.5  c0,0.1,0,0.2,0.1,0.3c0.2,0.2,0.6,0.6,1.2,0.9c0.5,0.3,1.2,0.5,1.8,0.7c2.6,0.8,5.5,1.3,8.3,1.5c2.9,0.3,5.7,0.4,8.6,0.4  c2.9,0,5.8-0.2,8.6-0.5c2.8-0.3,5.7-0.8,8.2-1.7c0.6-0.2,1.2-0.5,1.6-0.9c0.2-0.2,0.4-0.3,0.4-0.4c0.1-0.1,0.1-0.2,0.1-0.3  c0.1-0.2-0.3-0.7-0.8-1.1c-0.5-0.4-1.1-0.7-1.7-1.1C59.4,67.3,56.5,66.5,53.7,65.8z">
                                  </path>
                                </g>
                              </svg>
                            </span>
                            <span class="elementor-icon-list-text">Q&A with our experts</span>
                          </li>
                          <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                              <!-- Keep existing SVG -->
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewbox="0 0 90 90" style="enable-background: new 0 0 90 90"
                                xml:space="preserve">
                                <g>
                                  <path
                                    d="M25.3,29l17.1,5.1c0.8,0.3,1.8,0.3,2.6,0.3c0.8,0,1.8-0.2,2.6-0.3l14.5-4.3v7.5h-0.2c-0.3,0-0.4,0.2-0.4,0.4v2.2  c0,0.3,0.2,0.4,0.4,0.4H62l-0.7,1.3c-0.2,0.3,0.1,0.6,0.3,0.6h2.1c0.3,0,0.5-0.3,0.3-0.6l-0.6-1.3h0.1c0.3,0,0.4-0.2,0.4-0.4v-2.2  c0-0.3-0.2-0.4-0.4-0.4h-0.2v-7.9l1.3-0.4c1.2-0.3,1.2-2,0-2.4l-17.1-5.1c-0.8-0.3-1.8-0.3-2.6-0.3s-1.8,0.1-2.6,0.3l-17.1,5.1  C24.1,27,24.1,28.7,25.3,29z">
                                  </path>
                                  <path
                                    d="M45,37.6c-1.1,0-2.3-0.2-3.4-0.5L31.3,34v6.4c0,1.3,0.8,2.4,2,2.7l4.4,1.3c4.8,1.4,9.9,1.4,14.8,0l4.4-1.3  c1.2-0.3,2-1.4,2-2.7v-6.5l-10.5,3.2C47.3,37.5,46.1,37.6,45,37.6z">
                                  </path>
                                  <path
                                    d="M80.6,5H9.4C7.1,5,5.3,6.9,5.3,9.1v54.5c0,2.3,1.9,4.1,4.1,4.1h27.4v7.5h-3.6c-4.3,0-7.8,3.5-7.8,7.8l0,0c0,1.1,0.9,2,2,2  h34.9c1.2,0,2.1-0.9,2.1-2.1c0-4.3-3.5-7.8-7.8-7.8h-3.5v-7.5h27.4c2.3,0,4.1-1.9,4.1-4.1V9.1C84.7,6.9,82.9,5,80.6,5z M45,63.3  c-1.6,0-2.9-1.3-2.9-2.9s1.3-2.9,2.9-2.9s2.9,1.3,2.9,2.9S46.6,63.3,45,63.3z M76.4,53.3H13.6v-40h62.7  C76.4,13.3,76.4,53.3,76.4,53.3z">
                                  </path>
                                </g>
                              </svg>
                            </span>
                            <span class="elementor-icon-list-text">Custom pricing quote</span>
                          </li>
                          <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                              <!-- Keep existing SVG -->
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewbox="0 0 90 90" style="enable-background: new 0 0 90 90"
                                xml:space="preserve">
                                <path
                                  d="M86.3,52.7L84,51.3c0.1-0.8,0.1-1.7,0-2.5l2.4-1.4c0.5-0.3,0.7-0.8,0.5-1.3c-0.6-2.2-1.8-4.3-3.5-6 c-0.4-0.4-0.9-0.5-1.4-0.2l-2.4,1.4c-0.7-0.5-1.4-0.9-2.2-1.3v-2.7c0-0.5-0.4-1-0.9-1.1c-0.8-0.2-1.5-0.3-2.3-0.4v-24 c0-2.4-2-4.4-4.4-4.4H21.4c-2.4,0-4.4,2-4.4,4.4V13L6.7,14.6c-2.3,0.4-4,2.6-3.6,4.9l9.1,59.4c0.3,2.1,2.1,3.6,4.2,3.7 c0.2,0,0.4,0,0.7,0l23.2-3.5h29.7c2.4,0,4.4-2,4.4-4.4V64.3c0.8-0.1,1.5-0.2,2.3-0.4c0.5-0.1,0.9-0.6,0.9-1.1v-2.7 c0.8-0.3,1.5-0.8,2.2-1.3l2.4,1.4c0.5,0.3,1,0.2,1.4-0.2c1.6-1.7,2.8-3.7,3.5-6C87,53.5,86.8,53,86.3,52.7z M72.1,74.5 c0,1.2-1,2.1-2.1,2.1H21.4c-1.2,0-2.1-1-2.1-2.1V11.9c0-1.2,1-2.1,2.1-2.1h48.5c1.2,0,2.1,1,2.1,2.1v24c-0.8,0.1-1.5,0.2-2.3,0.4 c-0.5,0.1-0.9,0.6-0.9,1.1v2.7c-0.8,0.3-1.5,0.8-2.2,1.3L64.4,40c-0.5-0.3-1-0.2-1.4,0.2c-0.4,0.4-0.8,0.9-1.2,1.4H27 c-0.6,0-1.2,0.5-1.2,1.1c0,0.6,0.5,1.2,1.1,1.2c0,0,0,0,0.1,0h33.4c-0.4,0.7-0.6,1.5-0.9,2.3c-0.1,0.5,0.1,1,0.5,1.3L61,48H27 c-0.6,0-1.2,0.5-1.2,1.1c0,0.6,0.5,1.2,1.1,1.2c0,0,0,0,0.1,0h35.3c0,0.3,0,0.7,0.1,1L60,52.7c-0.5,0.3-0.7,0.8-0.5,1.3 c0,0.1,0.1,0.3,0.1,0.4H27c-0.6,0-1.2,0.5-1.2,1.1s0.5,1.2,1.1,1.2c0,0,0,0,0.1,0h33.6C61.2,57.9,62,59,63,60 c0.4,0.4,0.9,0.5,1.4,0.2l2.4-1.4c0.7,0.5,1.4,0.9,2.2,1.3v2.7c0,0.5,0.4,1,0.9,1.1c0.8,0.2,1.5,0.3,2.3,0.4L72.1,74.5z M78.7,47.8 L72.5,54c-0.4,0.4-1.2,0.4-1.6,0c0,0,0,0,0,0l-3.2-3.2c-0.4-0.4-0.4-1.2,0-1.6s1.2-0.4,1.6,0l2.4,2.4l5.4-5.4c0.4-0.4,1.2-0.4,1.6,0 C79.2,46.6,79.2,47.4,78.7,47.8L78.7,47.8z M25.8,36.4c0-0.6,0.5-1.1,1.1-1.1c0,0,0,0,0,0h37.3c0.6,0,1.1,0.5,1.1,1.2 c0,0.6-0.5,1.1-1.1,1.1H27C26.4,37.5,25.8,37,25.8,36.4C25.8,36.4,25.8,36.4,25.8,36.4z M65.5,62c0,0.6-0.5,1.1-1.1,1.1H27 c-0.6,0-1.2-0.5-1.2-1.1s0.5-1.2,1.1-1.2c0,0,0,0,0.1,0h37.3C64.9,60.8,65.5,61.3,65.5,62C65.5,62,65.5,62,65.5,62z M25.8,23.5 c0-0.6,0.5-1.1,1.1-1.1c0,0,0,0,0,0h11.9c0.6,0,1.2,0.5,1.2,1.1c0,0.6-0.5,1.2-1.1,1.2c0,0,0,0-0.1,0H27 C26.4,24.6,25.8,24.1,25.8,23.5L25.8,23.5z M25.8,29.2c0-0.6,0.5-1.1,1.1-1.1l0,0h19.8c0.6,0,1.1,0.5,1.1,1.1s-0.5,1.1-1.1,1.1l0,0 H27C26.4,30.3,25.8,29.8,25.8,29.2z">
                                </path>
                              </svg>
                            </span>
                            <span class="elementor-icon-list-text">Implementation roadmap</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-755b30f"
                  data-id="755b30f" data-element_type="column" data-settings='{"background_background":"classic"}'>
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-2c8a3b2 elementor-widget elementor-widget-shortcode"
                      data-id="2c8a3b2" data-element_type="widget" data-settings='{"wdt_animation_effect":"none"}'
                      data-widget_type="shortcode.default">
                      <div class="elementor-widget-container">
                        <div class="elementor-shortcode">
                          <div class="wpcf7 no-js" id="wpcf7-f22058-p21714-o2" lang="en-US" dir="ltr"
                            data-wpcf7-id="22058">
                            <div class="screen-reader-response">
                              <p role="status" aria-live="polite" aria-atomic="true"></p>
                              <ul></ul>
                            </div>
                            <form action="/lms/#wpcf7-f22058-p21714-o2" method="post" class="wpcf7-form init demo"
                              aria-label="Contact form" novalidate="novalidate" data-status="init">
                              <fieldset class="hidden-fields-container">
                                <input type="hidden" name="_wpcf7" value="22058" />
                                <input type="hidden" name="_wpcf7_version" value="6.1.1" />
                                <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f22058-p21714-o2" />
                                <input type="hidden" name="_wpcf7_container_post" value="21714" />
                                <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                              </fieldset>
                              <div class="wdt-form-style-a">
                                <div class="name">
                                  <p>
                                    <span class="wpcf7-form-control-wrap" data-name="first-name">
                                      <input size="40" maxlength="400"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                        aria-required="true" aria-invalid="false" placeholder="First Name*" value=""
                                        type="text" name="first-name" />
                                    </span>
                                    <span class="wpcf7-form-control-wrap" data-name="last-name">
                                      <input size="40" maxlength="400"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                        aria-required="true" aria-invalid="false" placeholder="Last Name*" value=""
                                        type="text" name="last-name" />
                                    </span>
                                  </p>
                                </div>
                                <div class="mail">
                                  <p>
                                    <span class="wpcf7-form-control-wrap" data-name="your-email">
                                      <input size="40" maxlength="400"
                                        class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email"
                                        aria-required="true" aria-invalid="false" placeholder="Work Email*" value=""
                                        type="email" name="your-email" />
                                    </span>
                                  </p>
                                </div>
                                <div class="selector">
                                  <p>
                                    <select>
                                      <option value="" disabled="" selected="">
                                        School/Institution Type*
                                      </option>
                                      <option value="k12">K-12 School</option>
                                      <option value="college">
                                        College/University
                                      </option>
                                      <option value="vocational">
                                        Vocational/Training Center
                                      </option>
                                      <option value="other">Other</option>
                                    </select>
                                  </p>
                                </div>
                                <div class="label">
                                  <p><label>Interested Features:</label></p>
                                </div>
                                <div class="checkbox">
                                  <p>
                                    <span class="wpcf7-form-control-wrap" data-name="our-lession">
                                      <span class="wpcf7-form-control wpcf7-checkbox">
                                        <span class="wpcf7-list-item first">
                                          <label>
                                            <input type="checkbox" name="our-lession[]" value="student-mgmt" />
                                            <span class="wpcf7-list-item-label">Student Management</span>
                                          </label>
                                        </span>
                                        <span class="wpcf7-list-item">
                                          <label>
                                            <input type="checkbox" name="our-lession[]" value="financial" />
                                            <span class="wpcf7-list-item-label">Financial Management</span>
                                          </label>
                                        </span>
                                        <span class="wpcf7-list-item">
                                          <label>
                                            <input type="checkbox" name="our-lession[]" value="academic" />
                                            <span class="wpcf7-list-item-label">Academic Planning</span>
                                          </label>
                                        </span>
                                        <span class="wpcf7-list-item last">
                                          <label>
                                            <input type="checkbox" name="our-lession[]" value="communication" />
                                            <span class="wpcf7-list-item-label">Communication Portal</span>
                                          </label>
                                        </span>
                                      </span>
                                    </span>
                                  </p>
                                </div>
                                <div class="submit-btn">
                                  <p>
                                    <input class="wpcf7-form-control wpcf7-submit has-spinner" type="submit"
                                      value="Request Demo Now" />
                                  </p>
                                </div>
                              </div>
                              <div class="wpcf7-response-output" aria-hidden="true"></div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="elementor-element elementor-element-9a19578 wdt-text-link-1 elementor-widget elementor-widget-text-editor"
                      data-id="9a19578" data-element_type="widget" data-settings='{"wdt_animation_effect":"none"}'
                      data-widget_type="text-editor.default">
                      <div class="elementor-widget-container">
                        <p>
                          By requesting a demo, you agree to our
                          <a href="#">Privacy Policy</a> and
                          <a href="#">Terms of Service</a>.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="elementor-section elementor-top-section elementor-element elementor-element-752bd4d8 elementor-section-boxed elementor-section-height-default elementor-section-height-default">
              <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5a2de6c6">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <!-- Section Heading -->
                    <div class="elementor-element elementor-element-2bd9526e wdt-last-child elementor-widget__width-initial center elementor-widget elementor-widget-wdt-heading">
                      <div class="elementor-widget-container">
                        <div class="wdt-heading-holder" id="wdt-heading-2bd9526e">
                          <div class="wdt-heading-subtitle-wrapper wdt-heading-align-center">
                            <span class="wdt-heading-subtitle">Latest Insights</span>
                          </div>
                          <h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                            <span class="wdt-heading-title">Resources & Insights</span>
                          </h2>
                          <div class="wdt-heading-content-wrapper">
                            Discover valuable resources, best practices, and expert insights on school management, educational technology, and platform optimization to enhance your institution's performance.
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Blog Posts Carousel -->
                    <div class="elementor-element elementor-element-37cbc62 elementor-widget elementor-widget-wdt-blog-posts">
                      <div class="elementor-widget-container">
                        <div class="wdt-posts-list-wrapper wdt-post-list-carousel-37cbc62">
                          <div class="tpl-blog-holder apply-isotope">
                            <!-- Grid Sizer -->
                            <div class="grid-sizer entry-grid-layout wdt-simple-style wdt-scalein-hover wdt-default-overlay alignleft column wdt-one-third wdt-post-entry"></div>

                            <!-- Article 1: Orientation Program -->
                            <div class="entry-grid-layout wdt-simple-style wdt-scalein-hover wdt-default-overlay alignleft column wdt-one-third wdt-post-entry">
                              <article id="post-22178" class="post-22178 post type-post status-publish format-standard has-post-thumbnail hentry category-technology tag-school-management blog-entry">
                                <!-- Featured Image -->
                                <div class="entry-thumb">
                                  <a href="orientation-program-for-the-new-students/" title="Permalink to Orientation Program For The New Students">
                                    <img loading="lazy" decoding="async" width="1420" height="813"
                                      src="wp-content/uploads/sites/12/2024/02/new-Blog-3-JPG.webp"
                                      class="attachment-wdt-blog-iii-column size-wdt-blog-iii-column wp-post-image"
                                      alt="Orientation Program For New Students"
                                      srcset="
                            wp-content/uploads/sites/12/2024/02/new-Blog-3-JPG.webp 1420w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-3-JPG-300x172.webp 300w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-3-JPG-1024x586.webp 1024w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-3-JPG-768x440.webp 768w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-3-JPG-1000x573.webp 1000w
                          "
                                      sizes="(max-width: 1420px) 100vw, 1420px" />
                                  </a>
                                </div>

                                <!-- Entry Meta -->
                                <div class="entry-meta-group">
                                  <!-- Entry Categories -->
                                  <div class="entry-categories">
                                    <i class="wdticon-folder"></i>
                                    <a href="category/development/">School Management</a>
                                  </div>
                                  <!-- Entry Comment -->
                                  <div class="entry-comments">
                                    <a href="orientation-program-for-the-new-students/#comments">
                                      <i class="wdticon-comment"></i> 3 Comments
                                    </a>
                                  </div>
                                </div>

                                <!-- Entry Title -->
                                <div class="entry-title">
                                  <h4>
                                    <a href="orientation-program-for-the-new-students/" title="Permalink to Orientation Program For The New Students">
                                      Streamlining Student Orientation with Digital Tools
                                    </a>
                                  </h4>
                                </div>

                                <!-- Entry Body -->
                                <div class="entry-body">
                                  <p>
                                    Learn how digital orientation programs can improve student onboarding, reduce administrative workload, and enhance the new student experience.
                                  </p>
                                </div>

                                <!-- Entry Button -->
                                <div class="entry-button wdt-core-button">
                                  <a href="orientation-program-for-the-new-students/" title="Streamlining Student Orientation" class="wdt-button">
                                    Read More
                                    <span>
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 59">
                                        <polygon points="59.9,6.1 79.4,25.7 6,25.7 6,33.3 79.4,33.3 59.9,52.9 65.3,58.2 94,29.5 65.3,0.8"></polygon>
                                      </svg>
                                    </span>
                                  </a>
                                </div>
                              </article>
                            </div>

                            <!-- Article 2: Business Logo Design -->
                            <div class="entry-grid-layout wdt-simple-style wdt-scalein-hover wdt-default-overlay alignleft column wdt-one-third wdt-post-entry">
                              <article id="post-22174" class="post-22174 post type-post status-publish format-standard has-post-thumbnail hentry category-strategy tag-digital-transformation blog-entry">
                                <!-- Featured Image -->
                                <div class="entry-thumb">
                                  <a href="world-wide-business-logo-design/" title="Permalink to World Wide Business Logo Design">
                                    <img loading="lazy" decoding="async" width="1420" height="813"
                                      src="wp-content/uploads/sites/12/2024/02/new-Blog-7-JPG.webp"
                                      class="attachment-wdt-blog-iii-column size-wdt-blog-iii-column wp-post-image"
                                      alt="Digital Branding for Educational Institutions"
                                      srcset="
                            wp-content/uploads/sites/12/2024/02/new-Blog-7-JPG.webp 1420w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-7-JPG-300x172.webp 300w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-7-JPG-1024x586.webp 1024w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-7-JPG-768x440.webp 768w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-7-JPG-1000x573.webp 1000w
                          "
                                      sizes="(max-width: 1420px) 100vw, 1420px" />
                                  </a>
                                </div>

                                <!-- Entry Meta -->
                                <div class="entry-meta-group">
                                  <!-- Entry Categories -->
                                  <div class="entry-categories">
                                    <i class="wdticon-folder"></i>
                                    <a href="category/design/">Digital Strategy</a>
                                  </div>
                                  <!-- Entry Comment -->
                                  <div class="entry-comments">
                                    <a href="world-wide-business-logo-design/#comments">
                                      <i class="wdticon-comment"></i> 5 Comments
                                    </a>
                                  </div>
                                </div>

                                <!-- Entry Title -->
                                <div class="entry-title">
                                  <h4>
                                    <a href="world-wide-business-logo-design/" title="Permalink to World Wide Business Logo Design">
                                      Digital Branding for Modern Educational Institutions
                                    </a>
                                  </h4>
                                </div>

                                <!-- Entry Body -->
                                <div class="entry-body">
                                  <p>
                                    Discover how strong digital branding can enhance your school's reputation, attract students, and build trust with parents and the community.
                                  </p>
                                </div>

                                <!-- Entry Button -->
                                <div class="entry-button wdt-core-button">
                                  <a href="world-wide-business-logo-design/" title="Digital Branding for Schools" class="wdt-button">
                                    Read More
                                    <span>
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 59">
                                        <polygon points="59.9,6.1 79.4,25.7 6,25.7 6,33.3 79.4,33.3 59.9,52.9 65.3,58.2 94,29.5 65.3,0.8"></polygon>
                                      </svg>
                                    </span>
                                  </a>
                                </div>
                              </article>
                            </div>

                            <!-- Article 3: Home Tutoring -->
                            <div class="entry-grid-layout wdt-simple-style wdt-scalein-hover wdt-default-overlay alignleft column wdt-one-third wdt-post-entry">
                              <article id="post-22173" class="post-22173 post type-post status-publish format-standard has-post-thumbnail hentry category-analytics tag-student-performance blog-entry">
                                <!-- Featured Image -->
                                <div class="entry-thumb">
                                  <a href="special-benefits-on-home-tutoring/" title="Permalink to Special Benefits On Home Tutoring">
                                    <img loading="lazy" decoding="async" width="1420" height="813"
                                      src="wp-content/uploads/sites/12/2024/02/new-Blog-8-JPG.webp"
                                      class="attachment-wdt-blog-iii-column size-wdt-blog-iii-column wp-post-image"
                                      alt="Personalized Learning Strategies"
                                      srcset="
                            wp-content/uploads/sites/12/2024/02/new-Blog-8-JPG.webp 1420w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-8-JPG-300x172.webp 300w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-8-JPG-1024x586.webp 1024w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-8-JPG-768x440.webp 768w,
                            wp-content/uploads/sites/12/2024/02/new-Blog-8-JPG-1000x573.webp 1000w
                          "
                                      sizes="(max-width: 1420px) 100vw, 1420px" />
                                  </a>
                                </div>

                                <!-- Entry Meta -->
                                <div class="entry-meta-group">
                                  <!-- Entry Categories -->
                                  <div class="entry-categories">
                                    <i class="wdticon-folder"></i>
                                    <a href="category/development/">Student Success</a>
                                  </div>
                                  <!-- Entry Comment -->
                                  <div class="entry-comments">
                                    <a href="special-benefits-on-home-tutoring/#comments">
                                      <i class="wdticon-comment"></i> 2 Comments
                                    </a>
                                  </div>
                                </div>

                                <!-- Entry Title -->
                                <div class="entry-title">
                                  <h4>
                                    <a href="special-benefits-on-home-tutoring/" title="Permalink to Special Benefits On Home Tutoring">
                                      Personalized Learning: Strategies for Student Success
                                    </a>
                                  </h4>
                                </div>

                                <!-- Entry Body -->
                                <div class="entry-body">
                                  <p>
                                    Explore how personalized learning approaches and targeted interventions can significantly improve student outcomes and engagement.
                                  </p>
                                </div>

                                <!-- Entry Button -->
                                <div class="entry-button wdt-core-button">
                                  <a href="special-benefits-on-home-tutoring/" title="Personalized Learning Strategies" class="wdt-button">
                                    Read More
                                    <span>
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 59">
                                        <polygon points="59.9,6.1 79.4,25.7 6,25.7 6,33.3 79.4,33.3 59.9,52.9 65.3,58.2 94,29.5 65.3,0.8"></polygon>
                                      </svg>
                                    </span>
                                  </a>
                                </div>
                              </article>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- View All Button -->
                    <div class="elementor-element elementor-element-view-all-button center elementor-widget elementor-widget-wdt-button" style="margin-top: 40px;">
                      <div class="elementor-widget-container">
                        <div class="wdt-button-holder wdt-template-textual wdt-button-link wdt-button-style-default wdt-button-size-lg wdt-animation- wdt-button-icon-after" id="wdt-view-all-resources">
                          <a class="wdt-button" href="/resources/" data-tooltip="Explore All Resources">
                            <div class="wdt-button-text">
                              <span>View All Resources</span>
                              <span>View All Resources</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section
              class="elementor-section elementor-top-section elementor-element elementor-element-7ea60b3 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
              data-id="7ea60b3" data-element_type="section"
              data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
              <div class="elementor-container elementor-column-gap-no">
                <div
                  class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ac2e1b9"
                  data-id="ac2e1b9" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <section
                      class="elementor-section elementor-inner-section elementor-element elementor-element-0f4c65f elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                      data-id="0f4c65f" data-element_type="section"
                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                      <div class="elementor-container elementor-column-gap-no">
                        <div
                          class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-006effb"
                          data-id="006effb" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-566aaf3 elementor-widget__width-initial center elementor-invisible elementor-widget elementor-widget-wdt-heading"
                              data-id="566aaf3" data-element_type="widget"
                              data-settings='{"split_heading":"true","wdt_enable_inview_status":"true","_animation":"fadeInRight","title_vertical_align":"center","subtitle_vertical_align":"center","wdt_animation_effect":"none"}'
                              data-widget_type="wdt-heading.default">
                              <div class="elementor-widget-container">
                                <div class="wdt-heading-holder" id="wdt-heading-566aaf3">
                                  <div class="wdt-heading-subtitle-wrapper wdt-heading-align-center">
                                    <span class="wdt-heading-subtitle">Modern School Management</span>
                                  </div>
                                  <h2
                                    class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                                    <span class="wdt-heading-title">Explore AcademixSuite
                                      <span class="wdt-split-heading-wrapper"><span
                                          class="wdt-split-heading-title">F</span><span
                                          class="wdt-split-heading-title">e</span><span
                                          class="wdt-split-heading-title">a</span><span
                                          class="wdt-split-heading-title">t</span><span
                                          class="wdt-split-heading-title">u</span><span
                                          class="wdt-split-heading-title">r</span><span
                                          class="wdt-split-heading-title">e</span><span
                                          class="wdt-split-heading-title">s</span></span>
                                      <span class="wdt-split-heading-wrapper"><span
                                          class="wdt-split-heading-title">S</span><span
                                          class="wdt-split-heading-title">o</span><span
                                          class="wdt-split-heading-title">l</span><span
                                          class="wdt-split-heading-title">u</span><span
                                          class="wdt-split-heading-title">t</span><span
                                          class="wdt-split-heading-title">i</span><span
                                          class="wdt-split-heading-title">o</span><span
                                          class="wdt-split-heading-title">n</span><span
                                          class="wdt-split-heading-title">s</span></span></span>
                                  </h2>
                                  <div class="wdt-heading-content-wrapper">
                                    AcademixSuite is a comprehensive
                                    multi-tenant school management platform
                                    designed to streamline administration,
                                    enhance learning outcomes, and connect
                                    educational communities. Manage multiple
                                    schools efficiently with our all-in-one
                                    solution.
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section
                      class="elementor-section elementor-inner-section elementor-element elementor-element-73e59b2 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                      data-id="73e59b2" data-element_type="section"
                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                      <div class="elementor-container elementor-column-gap-no">
                        <div
                          class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-6102772"
                          data-id="6102772" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-af205ea start wdt-swiper-style-a elementor-invisible elementor-widget elementor-widget-wdt-advanced-carousel"
                              data-id="af205ea" data-element_type="widget"
                              data-settings='{"slides_to_show_opts":"4","gap":{"unit":"dpt","size":30,"sizes":[]},"centered_slides":"yes","slides_to_show_opts_tablet_extra":"3","slides_to_show_opts_tablet":"2","slides_to_show_opts_mobile_extra":"2","slides_to_show_opts_mobile":"1","_animation":"fadeInLeft","autoplay":"yes","slides_to_show_opts_laptop":"3","direction":"horizontal","effect":"default","slides_to_scroll_opts":"single","speed":300,"gap_laptop":{"unit":"px","size":"","sizes":[]},"gap_tablet_extra":{"unit":"px","size":"","sizes":[]},"gap_tablet":{"unit":"px","size":"","sizes":[]},"gap_mobile_extra":{"unit":"px","size":"","sizes":[]},"gap_mobile":{"unit":"px","size":"","sizes":[]},"autoplay_speed":5000,"allow_touch":"yes","loop":"yes","pause_on_interaction":"yes","carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                              data-widget_type="wdt-advanced-carousel.default">
                              <div class="elementor-widget-container">
                                <div
                                  class="wdt-advanced-carousel-holder wdt-content-item-holder wdt-carousel-holder wdt-rc-template-custom-template"
                                  id="wdt-advanced-carousel-af205ea" data-id="af205ea" data-settings="">
                                  <div class="wdt-advanced-carousel-container swiper"
                                    data-settings='{"direction":"horizontal","effect":"default","slides_to_show":"4","slides_to_scroll":1,"arrows":"","pagination":"","speed":300,"autoplay":"yes","autoplay_speed":5000,"autoplay_direction":"","allow_touch":"yes","loop":"yes","centered_slides":"yes","pause_on_interaction":"yes","overflow_type":"","overflow_opacity":"","unequal_height_compatability":null,"gap":30,"responsive":[{"breakpoint":319,"toshow":1,"toscroll":1},{"breakpoint":481,"toshow":2,"toscroll":1},{"breakpoint":768,"toshow":2,"toscroll":1},{"breakpoint":1025,"toshow":3,"toscroll":1},{"breakpoint":1281,"toshow":3,"toscroll":1},{"breakpoint":1541,"toshow":4,"toscroll":1}],"space_between_gaps":{"desktop":30,"mobile":30,"mobile_extra":30,"tablet":30,"tablet_extra":30,"laptop":30}}'
                                    id="wdt-advanced-carousel-swiper-af205ea">
                                    <div class="wdt-advanced-carousel-wrapper swiper-wrapper">
                                      <!-- Slide 1: Multi-Tenant -->
                                      <div class="swiper-slide">
                                        <div class="wdt-content-item">
                                          <style>
                                            .elementor-21989 .elementor-element.elementor-element-9e3fd05:not(.elementor-motion-effects-element-type-background),
                                            .elementor-21989 .elementor-element.elementor-element-9e3fd05>.elementor-motion-effects-container>.elementor-motion-effects-layer {
                                              background-color: var(--e-global-color-accent);
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-9e3fd05,
                                            .elementor-21989 .elementor-element.elementor-element-9e3fd05>.elementor-background-overlay {
                                              border-radius: 7px 7px 7px 7px;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-9e3fd05 {
                                              transition:
                                                background 0.3s,
                                                border 0.3s,
                                                border-radius 0.3s,
                                                box-shadow 0.3s;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-9e3fd05>.elementor-background-overlay {
                                              transition:
                                                background 0.3s,
                                                border-radius 0.3s,
                                                opacity 0.3s;
                                            }

                                            .elementor-bc-flex-widget .elementor-21989 .elementor-element.elementor-element-69bb6a1.elementor-column .elementor-widget-wrap {
                                              align-items: space-between;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-69bb6a1.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: space-between;
                                              align-items: space-between;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-69bb6a1>.elementor-element-populated {
                                              padding: 30px 30px 30px 30px;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-fb2288e>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
                                              margin-bottom: 0px;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-bf2f81b .wdt-content-item {
                                              text-align: start;
                                              justify-content: start;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-title h5,
                                            .elementor-21989 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-title h5>a {
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-subtitle {
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span {
                                              font-size: 20px;
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-bf2f81b {
                                              z-index: 1;
                                            }

                                            .elementor-bc-flex-widget .elementor-21989 .elementor-element.elementor-element-ed1e016.elementor-column .elementor-widget-wrap {
                                              align-items: flex-end;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-ed1e016.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: flex-end;
                                              align-items: flex-end;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-db38cc3 {
                                              --spacer-size: 50px;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element .wdt-popup-box-trigger-icon {
                                              font-size: 18px;
                                              color: var(--e-global-color-accent);
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element:focus .wdt-popup-box-trigger-icon,
                                            .elementor-21989 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element:hover .wdt-popup-box-trigger-icon {
                                              color: var(--e-global-color-accent);
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-25c56ab {
                                              width: auto;
                                              max-width: auto;
                                            }

                                            .elementor-bc-flex-widget .elementor-21989 .elementor-element.elementor-element-554a841.elementor-column .elementor-widget-wrap {
                                              align-items: flex-end;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-554a841.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: flex-end;
                                              align-items: flex-end;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-9099b6e img {
                                              width: 100%;
                                              max-width: 100%;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-9099b6e>.elementor-widget-container {
                                              margin: -100px -50px -50px -50px;
                                            }

                                            .elementor-21989 .elementor-element.elementor-element-9099b6e {
                                              z-index: 0;
                                            }

                                            @media (max-width: 480px) {
                                              .elementor-21989 .elementor-element.elementor-element-69bb6a1 {
                                                width: 100%;
                                              }

                                              .elementor-21989 .elementor-element.elementor-element-fb2288e {
                                                width: 100%;
                                              }

                                              .elementor-21989 .elementor-element.elementor-element-ed1e016 {
                                                width: 50%;
                                              }

                                              .elementor-21989 .elementor-element.elementor-element-554a841 {
                                                width: 50%;
                                              }
                                            }
                                          </style>
                                          <div data-elementor-type="page" data-elementor-id="21989"
                                            class="elementor elementor-21989">
                                            <section
                                              class="elementor-section elementor-top-section elementor-element elementor-element-9e3fd05 elementor-section-full_width wdt-overflow-hidden elementor-section-height-default elementor-section-height-default"
                                              data-id="9e3fd05" data-element_type="section"
                                              data-settings='{"background_background":"classic","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                              <div class="elementor-container elementor-column-gap-no">
                                                <div
                                                  class="wdt-overflow-hidden elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-69bb6a1"
                                                  data-id="69bb6a1" data-element_type="column"
                                                  data-settings='{"wdt_overflow_hidden":"true"}'>
                                                  <div class="elementor-widget-wrap elementor-element-populated">
                                                    <section
                                                      class="elementor-section elementor-inner-section elementor-element elementor-element-bd688a2 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                                      data-id="bd688a2" data-element_type="section"
                                                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                                      <div class="elementor-container elementor-column-gap-no">
                                                        <div
                                                          class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-fb2288e"
                                                          data-id="fb2288e" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-bf2f81b start wdt-icon-box-style-a elementor-widget elementor-widget-wdt-icon-box"
                                                              data-id="bf2f81b" data-element_type="widget"
                                                              data-settings='{"carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                                                              data-widget_type="wdt-icon-box.default">
                                                              <div class="elementor-widget-container">
                                                                <div
                                                                  class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template"
                                                                  id="wdt-icon-box-bf2f81b">
                                                                  <div class="wdt-content-item">
                                                                    <div class="wdt-content-media-group">
                                                                      <div class="wdt-content-icon-wrapper">
                                                                        <div class="wdt-content-icon">
                                                                          <span><i aria-hidden="true"
                                                                              class="fas fa-school"></i></span>
                                                                        </div>
                                                                      </div>
                                                                      <div class="wdt-content-subtitle">
                                                                        Multi-Tenant
                                                                      </div>
                                                                    </div>
                                                                    <div class="wdt-content-detail-group">
                                                                      <div class="wdt-content-title">
                                                                        <h5>
                                                                          <a href="#" target="_blank"
                                                                            rel="nofollow">Manage
                                                                            Multiple
                                                                            Schools</a>
                                                                        </h5>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                    <section
                                                      class="elementor-section elementor-inner-section elementor-element elementor-element-1d1efa5 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                                      data-id="1d1efa5" data-element_type="section"
                                                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                                      <div class="elementor-container elementor-column-gap-no">
                                                        <div
                                                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-ed1e016"
                                                          data-id="ed1e016" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-db38cc3 elementor-widget elementor-widget-spacer"
                                                              data-id="db38cc3" data-element_type="widget"
                                                              data-settings='{"wdt_animation_effect":"none"}'
                                                              data-widget_type="spacer.default">
                                                              <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                  <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div
                                                              class="elementor-element elementor-element-25c56ab elementor-widget__width-auto wdt-popup-style-b elementor-widget elementor-widget-wdt-popup-box"
                                                              data-id="25c56ab" data-element_type="widget"
                                                              data-settings='{"show_close_Button":"true","esc_to_exit":"true","click_to_exit":"true","wdt_animation_effect":"none"}'
                                                              data-widget_type="wdt-popup-box.default">
                                                              <div class="elementor-widget-container">
                                                                <div
                                                                  class="wdt-popup-box-trigger-holder wdt-click-element-icon"
                                                                  id="wdt-popup-box-trigger-25c56ab"
                                                                  data-settings='{"module_id":"25c56ab", "module_ref_id":"wdt-popup-box-25c56ab", "popup_class":"wdt-popup-box-window wdt-popup-box-window-25c56ab wdt-fade-zoom", "trigger_type":"on-click", "on_load_delay":null, "on_load_after":null, "external_class":null, "external_id":null, "show_close_Button":true, "esc_to_exit":true, "click_to_exit":true, "mfp_src":"https://vimeo.com/84198419", "mfp_type":"iframe"}'>
                                                                  <div class="wdt-popup-box-trigger-element">
                                                                    <span
                                                                      class="wdt-popup-box-trigger-item wdt-popup-box-trigger-icon"><i
                                                                        aria-hidden="true"
                                                                        class="fas fa-play"></i></span>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div
                                                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-554a841"
                                                          data-id="554a841" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-9099b6e elementor-widget elementor-widget-image"
                                                              data-id="9099b6e" data-element_type="widget"
                                                              data-settings='{"wdt_animation_effect":"none"}'
                                                              data-widget_type="image.default">
                                                              <div class="elementor-widget-container">
                                                                <img loading="lazy" loading="lazy" decoding="async"
                                                                  width="700" height="700"
                                                                  src="wp-content/uploads/sites/12/2024/02/demo-course-img-02.webp"
                                                                  class="attachment-full size-full wp-image-21983"
                                                                  alt="AcademixSuite Multi-Tenant Dashboard" srcset="
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-02.webp         700w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-02-300x300.webp 300w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-02-150x150.webp 150w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-02-100x100.webp 100w
                                                                    " sizes="(max-width: 700px) 100vw, 700px" />
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                  </div>
                                                </div>
                                              </div>
                                            </section>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- Slide 2: Learning -->
                                      <div class="swiper-slide">
                                        <div class="wdt-content-item">
                                          <style>
                                            .elementor-21996 .elementor-element.elementor-element-9e3fd05:not(.elementor-motion-effects-element-type-background),
                                            .elementor-21996 .elementor-element.elementor-element-9e3fd05>.elementor-motion-effects-container>.elementor-motion-effects-layer {
                                              background-color: #d0125a;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-9e3fd05,
                                            .elementor-21996 .elementor-element.elementor-element-9e3fd05>.elementor-background-overlay {
                                              border-radius: 7px 7px 7px 7px;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-9e3fd05 {
                                              transition:
                                                background 0.3s,
                                                border 0.3s,
                                                border-radius 0.3s,
                                                box-shadow 0.3s;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-9e3fd05>.elementor-background-overlay {
                                              transition:
                                                background 0.3s,
                                                border-radius 0.3s,
                                                opacity 0.3s;
                                            }

                                            .elementor-bc-flex-widget .elementor-21996 .elementor-element.elementor-element-69bb6a1.elementor-column .elementor-widget-wrap {
                                              align-items: space-between;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-69bb6a1.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: space-between;
                                              align-items: space-between;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-69bb6a1>.elementor-element-populated {
                                              padding: 30px 30px 30px 30px;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-fb2288e>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
                                              margin-bottom: 0px;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-bf2f81b .wdt-content-item {
                                              text-align: start;
                                              justify-content: start;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-title h5,
                                            .elementor-21996 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-title h5>a {
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-subtitle {
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span {
                                              font-size: 20px;
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-bf2f81b {
                                              z-index: 1;
                                            }

                                            .elementor-bc-flex-widget .elementor-21996 .elementor-element.elementor-element-ed1e016.elementor-column .elementor-widget-wrap {
                                              align-items: flex-end;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-ed1e016.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: flex-end;
                                              align-items: flex-end;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-db38cc3 {
                                              --spacer-size: 50px;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element .wdt-popup-box-trigger-icon {
                                              font-size: 18px;
                                              color: var(--e-global-color-accent);
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element:focus .wdt-popup-box-trigger-icon,
                                            .elementor-21996 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element:hover .wdt-popup-box-trigger-icon {
                                              color: var(--e-global-color-accent);
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-25c56ab {
                                              width: auto;
                                              max-width: auto;
                                            }

                                            .elementor-bc-flex-widget .elementor-21996 .elementor-element.elementor-element-554a841.elementor-column .elementor-widget-wrap {
                                              align-items: flex-end;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-554a841.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: flex-end;
                                              align-items: flex-end;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-9099b6e img {
                                              width: 100%;
                                              max-width: 100%;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-9099b6e>.elementor-widget-container {
                                              margin: -100px 0px -50px -100px;
                                            }

                                            .elementor-21996 .elementor-element.elementor-element-9099b6e {
                                              z-index: 0;
                                            }

                                            @media (max-width: 480px) {
                                              .elementor-21996 .elementor-element.elementor-element-69bb6a1 {
                                                width: 100%;
                                              }

                                              .elementor-21996 .elementor-element.elementor-element-fb2288e {
                                                width: 100%;
                                              }

                                              .elementor-21996 .elementor-element.elementor-element-ed1e016 {
                                                width: 50%;
                                              }

                                              .elementor-21996 .elementor-element.elementor-element-554a841 {
                                                width: 50%;
                                              }

                                              .elementor-21996 .elementor-element.elementor-element-9099b6e>.elementor-widget-container {
                                                margin: -150px 0px -50px -50px;
                                              }
                                            }
                                          </style>
                                          <div data-elementor-type="page" data-elementor-id="21996"
                                            class="elementor elementor-21996">
                                            <section
                                              class="elementor-section elementor-top-section elementor-element elementor-element-9e3fd05 elementor-section-full_width wdt-overflow-hidden elementor-section-height-default elementor-section-height-default"
                                              data-id="9e3fd05" data-element_type="section"
                                              data-settings='{"background_background":"classic","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                              <div class="elementor-container elementor-column-gap-no">
                                                <div
                                                  class="wdt-overflow-hidden elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-69bb6a1"
                                                  data-id="69bb6a1" data-element_type="column"
                                                  data-settings='{"wdt_overflow_hidden":"true"}'>
                                                  <div class="elementor-widget-wrap elementor-element-populated">
                                                    <section
                                                      class="elementor-section elementor-inner-section elementor-element elementor-element-bd688a2 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                                      data-id="bd688a2" data-element_type="section"
                                                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                                      <div class="elementor-container elementor-column-gap-no">
                                                        <div
                                                          class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-fb2288e"
                                                          data-id="fb2288e" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-bf2f81b start wdt-icon-box-style-a elementor-widget elementor-widget-wdt-icon-box"
                                                              data-id="bf2f81b" data-element_type="widget"
                                                              data-settings='{"carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                                                              data-widget_type="wdt-icon-box.default">
                                                              <div class="elementor-widget-container">
                                                                <div
                                                                  class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template"
                                                                  id="wdt-icon-box-bf2f81b">
                                                                  <div class="wdt-content-item">
                                                                    <div class="wdt-content-media-group">
                                                                      <div class="wdt-content-icon-wrapper">
                                                                        <div class="wdt-content-icon">
                                                                          <span><i aria-hidden="true"
                                                                              class="fas fa-chalkboard-teacher"></i></span>
                                                                        </div>
                                                                      </div>
                                                                      <div class="wdt-content-subtitle">
                                                                        Learning
                                                                      </div>
                                                                    </div>
                                                                    <div class="wdt-content-detail-group">
                                                                      <div class="wdt-content-title">
                                                                        <h5>
                                                                          <a href="#" target="_blank"
                                                                            rel="nofollow">Smart
                                                                            Classroom
                                                                            Management</a>
                                                                        </h5>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                    <section
                                                      class="elementor-section elementor-inner-section elementor-element elementor-element-1d1efa5 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                                      data-id="1d1efa5" data-element_type="section"
                                                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                                      <div class="elementor-container elementor-column-gap-no">
                                                        <div
                                                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-ed1e016"
                                                          data-id="ed1e016" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-db38cc3 elementor-widget elementor-widget-spacer"
                                                              data-id="db38cc3" data-element_type="widget"
                                                              data-settings='{"wdt_animation_effect":"none"}'
                                                              data-widget_type="spacer.default">
                                                              <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                  <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div
                                                              class="elementor-element elementor-element-25c56ab elementor-widget__width-auto wdt-popup-style-b elementor-widget elementor-widget-wdt-popup-box"
                                                              data-id="25c56ab" data-element_type="widget"
                                                              data-settings='{"show_close_Button":"true","esc_to_exit":"true","click_to_exit":"true","wdt_animation_effect":"none"}'
                                                              data-widget_type="wdt-popup-box.default">
                                                              <div class="elementor-widget-container">
                                                                <div
                                                                  class="wdt-popup-box-trigger-holder wdt-click-element-icon"
                                                                  id="wdt-popup-box-trigger-25c56ab"
                                                                  data-settings='{"module_id":"25c56ab", "module_ref_id":"wdt-popup-box-25c56ab", "popup_class":"wdt-popup-box-window wdt-popup-box-window-25c56ab wdt-fade-zoom", "trigger_type":"on-click", "on_load_delay":null, "on_load_after":null, "external_class":null, "external_id":null, "show_close_Button":true, "esc_to_exit":true, "click_to_exit":true, "mfp_src":"https://vimeo.com/84198419", "mfp_type":"iframe"}'>
                                                                  <div class="wdt-popup-box-trigger-element">
                                                                    <span
                                                                      class="wdt-popup-box-trigger-item wdt-popup-box-trigger-icon"><i
                                                                        aria-hidden="true"
                                                                        class="fas fa-play"></i></span>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div
                                                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-554a841"
                                                          data-id="554a841" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-9099b6e elementor-widget elementor-widget-image"
                                                              data-id="9099b6e" data-element_type="widget"
                                                              data-settings='{"wdt_animation_effect":"none"}'
                                                              data-widget_type="image.default">
                                                              <div class="elementor-widget-container">
                                                                <img loading="lazy" loading="lazy" decoding="async"
                                                                  width="700" height="700"
                                                                  src="wp-content/uploads/sites/12/2024/02/demo-course-img-03.webp"
                                                                  class="attachment-full size-full wp-image-21982"
                                                                  alt="Smart Classroom Features" srcset="
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-03.webp         700w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-03-300x300.webp 300w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-03-150x150.webp 150w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-03-100x100.webp 100w
                                                                    " sizes="(max-width: 700px) 100vw, 700px" />
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                  </div>
                                                </div>
                                              </div>
                                            </section>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- Slide 3: Analytics -->
                                      <div class="swiper-slide">
                                        <div class="wdt-content-item">
                                          <style>
                                            .elementor-22005 .elementor-element.elementor-element-9e3fd05:not(.elementor-motion-effects-element-type-background),
                                            .elementor-22005 .elementor-element.elementor-element-9e3fd05>.elementor-motion-effects-container>.elementor-motion-effects-layer {
                                              background-color: #114fbe;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-9e3fd05,
                                            .elementor-22005 .elementor-element.elementor-element-9e3fd05>.elementor-background-overlay {
                                              border-radius: 7px 7px 7px 7px;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-9e3fd05 {
                                              transition:
                                                background 0.3s,
                                                border 0.3s,
                                                border-radius 0.3s,
                                                box-shadow 0.3s;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-9e3fd05>.elementor-background-overlay {
                                              transition:
                                                background 0.3s,
                                                border-radius 0.3s,
                                                opacity 0.3s;
                                            }

                                            .elementor-bc-flex-widget .elementor-22005 .elementor-element.elementor-element-69bb6a1.elementor-column .elementor-widget-wrap {
                                              align-items: space-between;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-69bb6a1.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: space-between;
                                              align-items: space-between;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-69bb6a1>.elementor-element-populated {
                                              padding: 30px 30px 30px 30px;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-fb2288e>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
                                              margin-bottom: 0px;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-bf2f81b .wdt-content-item {
                                              text-align: start;
                                              justify-content: start;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-title h5,
                                            .elementor-22005 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-title h5>a {
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-subtitle {
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span {
                                              font-size: 20px;
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-bf2f81b {
                                              z-index: 1;
                                            }

                                            .elementor-bc-flex-widget .elementor-22005 .elementor-element.elementor-element-ed1e016.elementor-column .elementor-widget-wrap {
                                              align-items: flex-end;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-ed1e016.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: flex-end;
                                              align-items: flex-end;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-db38cc3 {
                                              --spacer-size: 50px;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element .wdt-popup-box-trigger-icon {
                                              font-size: 18px;
                                              color: var(--e-global-color-accent);
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element:focus .wdt-popup-box-trigger-icon,
                                            .elementor-22005 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element:hover .wdt-popup-box-trigger-icon {
                                              color: var(--e-global-color-accent);
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-25c56ab {
                                              width: auto;
                                              max-width: auto;
                                            }

                                            .elementor-bc-flex-widget .elementor-22005 .elementor-element.elementor-element-554a841.elementor-column .elementor-widget-wrap {
                                              align-items: flex-end;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-554a841.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: flex-end;
                                              align-items: flex-end;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-9099b6e img {
                                              width: 100%;
                                              max-width: 100%;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-9099b6e>.elementor-widget-container {
                                              margin: -100px -50px -50px -50px;
                                            }

                                            .elementor-22005 .elementor-element.elementor-element-9099b6e {
                                              z-index: 0;
                                            }

                                            @media (max-width: 480px) {
                                              .elementor-22005 .elementor-element.elementor-element-69bb6a1 {
                                                width: 100%;
                                              }

                                              .elementor-22005 .elementor-element.elementor-element-fb2288e {
                                                width: 100%;
                                              }

                                              .elementor-22005 .elementor-element.elementor-element-ed1e016 {
                                                width: 50%;
                                              }

                                              .elementor-22005 .elementor-element.elementor-element-554a841 {
                                                width: 50%;
                                              }
                                            }
                                          </style>
                                          <div data-elementor-type="page" data-elementor-id="22005"
                                            class="elementor elementor-22005">
                                            <section
                                              class="elementor-section elementor-top-section elementor-element elementor-element-9e3fd05 elementor-section-full_width wdt-overflow-hidden elementor-section-height-default elementor-section-height-default"
                                              data-id="9e3fd05" data-element_type="section"
                                              data-settings='{"background_background":"classic","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                              <div class="elementor-container elementor-column-gap-no">
                                                <div
                                                  class="wdt-overflow-hidden elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-69bb6a1"
                                                  data-id="69bb6a1" data-element_type="column"
                                                  data-settings='{"wdt_overflow_hidden":"true"}'>
                                                  <div class="elementor-widget-wrap elementor-element-populated">
                                                    <section
                                                      class="elementor-section elementor-inner-section elementor-element elementor-element-bd688a2 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                                      data-id="bd688a2" data-element_type="section"
                                                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                                      <div class="elementor-container elementor-column-gap-no">
                                                        <div
                                                          class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-fb2288e"
                                                          data-id="fb2288e" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-bf2f81b start wdt-icon-box-style-a elementor-widget elementor-widget-wdt-icon-box"
                                                              data-id="bf2f81b" data-element_type="widget"
                                                              data-settings='{"carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                                                              data-widget_type="wdt-icon-box.default">
                                                              <div class="elementor-widget-container">
                                                                <div
                                                                  class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template"
                                                                  id="wdt-icon-box-bf2f81b">
                                                                  <div class="wdt-content-item">
                                                                    <div class="wdt-content-media-group">
                                                                      <div class="wdt-content-icon-wrapper">
                                                                        <div class="wdt-content-icon">
                                                                          <span><i aria-hidden="true"
                                                                              class="fas fa-chart-line"></i></span>
                                                                        </div>
                                                                      </div>
                                                                      <div class="wdt-content-subtitle">
                                                                        Analytics
                                                                      </div>
                                                                    </div>
                                                                    <div class="wdt-content-detail-group">
                                                                      <div class="wdt-content-title">
                                                                        <h5>
                                                                          <a href="#" target="_blank"
                                                                            rel="nofollow">Advanced
                                                                            Performance
                                                                            Analytics</a>
                                                                        </h5>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                    <section
                                                      class="elementor-section elementor-inner-section elementor-element elementor-element-1d1efa5 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                                      data-id="1d1efa5" data-element_type="section"
                                                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                                      <div class="elementor-container elementor-column-gap-no">
                                                        <div
                                                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-ed1e016"
                                                          data-id="ed1e016" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-db38cc3 elementor-widget elementor-widget-spacer"
                                                              data-id="db38cc3" data-element_type="widget"
                                                              data-settings='{"wdt_animation_effect":"none"}'
                                                              data-widget_type="spacer.default">
                                                              <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                  <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div
                                                              class="elementor-element elementor-element-25c56ab elementor-widget__width-auto wdt-popup-style-b elementor-widget elementor-widget-wdt-popup-box"
                                                              data-id="25c56ab" data-element_type="widget"
                                                              data-settings='{"show_close_Button":"true","esc_to_exit":"true","click_to_exit":"true","wdt_animation_effect":"none"}'
                                                              data-widget_type="wdt-popup-box.default">
                                                              <div class="elementor-widget-container">
                                                                <div
                                                                  class="wdt-popup-box-trigger-holder wdt-click-element-icon"
                                                                  id="wdt-popup-box-trigger-25c56ab"
                                                                  data-settings='{"module_id":"25c56ab", "module_ref_id":"wdt-popup-box-25c56ab", "popup_class":"wdt-popup-box-window wdt-popup-box-window-25c56ab wdt-fade-zoom", "trigger_type":"on-click", "on_load_delay":null, "on_load_after":null, "external_class":null, "external_id":null, "show_close_Button":true, "esc_to_exit":true, "click_to_exit":true, "mfp_src":"https://vimeo.com/84198419", "mfp_type":"iframe"}'>
                                                                  <div class="wdt-popup-box-trigger-element">
                                                                    <span
                                                                      class="wdt-popup-box-trigger-item wdt-popup-box-trigger-icon"><i
                                                                        aria-hidden="true"
                                                                        class="fas fa-play"></i></span>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div
                                                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-554a841"
                                                          data-id="554a841" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-9099b6e elementor-widget elementor-widget-image"
                                                              data-id="9099b6e" data-element_type="widget"
                                                              data-settings='{"wdt_animation_effect":"none"}'
                                                              data-widget_type="image.default">
                                                              <div class="elementor-widget-container">
                                                                <img loading="lazy" loading="lazy" decoding="async"
                                                                  width="700" height="700"
                                                                  src="wp-content/uploads/sites/12/2024/02/demo-course-img-01.webp"
                                                                  class="attachment-full size-full wp-image-21984"
                                                                  alt="Analytics Dashboard" srcset="
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-01.webp         700w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-01-300x300.webp 300w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-01-150x150.webp 150w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-01-100x100.webp 100w
                                                                    " sizes="(max-width: 700px) 100vw, 700px" />
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                  </div>
                                                </div>
                                              </div>
                                            </section>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- Slide 4: Community -->
                                      <div class="swiper-slide">
                                        <div class="wdt-content-item">
                                          <style>
                                            .elementor-22012 .elementor-element.elementor-element-9e3fd05:not(.elementor-motion-effects-element-type-background),
                                            .elementor-22012 .elementor-element.elementor-element-9e3fd05>.elementor-motion-effects-container>.elementor-motion-effects-layer {
                                              background-color: #2e8b57;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-9e3fd05,
                                            .elementor-22012 .elementor-element.elementor-element-9e3fd05>.elementor-background-overlay {
                                              border-radius: 7px 7px 7px 7px;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-9e3fd05 {
                                              transition:
                                                background 0.3s,
                                                border 0.3s,
                                                border-radius 0.3s,
                                                box-shadow 0.3s;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-9e3fd05>.elementor-background-overlay {
                                              transition:
                                                background 0.3s,
                                                border-radius 0.3s,
                                                opacity 0.3s;
                                            }

                                            .elementor-bc-flex-widget .elementor-22012 .elementor-element.elementor-element-69bb6a1.elementor-column .elementor-widget-wrap {
                                              align-items: space-between;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-69bb6a1.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: space-between;
                                              align-items: space-between;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-69bb6a1>.elementor-element-populated {
                                              padding: 30px 30px 30px 30px;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-fb2288e>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
                                              margin-bottom: 0px;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-bf2f81b .wdt-content-item {
                                              text-align: start;
                                              justify-content: start;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-title h5,
                                            .elementor-22012 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-title h5>a {
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-subtitle {
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span {
                                              font-size: 20px;
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-bf2f81b {
                                              z-index: 1;
                                            }

                                            .elementor-bc-flex-widget .elementor-22012 .elementor-element.elementor-element-ed1e016.elementor-column .elementor-widget-wrap {
                                              align-items: flex-end;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-ed1e016.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: flex-end;
                                              align-items: flex-end;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-db38cc3 {
                                              --spacer-size: 50px;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element .wdt-popup-box-trigger-icon {
                                              font-size: 18px;
                                              color: var(--e-global-color-accent);
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element:focus .wdt-popup-box-trigger-icon,
                                            .elementor-22012 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element:hover .wdt-popup-box-trigger-icon {
                                              color: var(--e-global-color-accent);
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-25c56ab {
                                              width: auto;
                                              max-width: auto;
                                            }

                                            .elementor-bc-flex-widget .elementor-22012 .elementor-element.elementor-element-554a841.elementor-column .elementor-widget-wrap {
                                              align-items: flex-end;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-554a841.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: flex-end;
                                              align-items: flex-end;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-9099b6e img {
                                              width: 100%;
                                              max-width: 100%;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-9099b6e>.elementor-widget-container {
                                              margin: -100px -50px -50px -50px;
                                            }

                                            .elementor-22012 .elementor-element.elementor-element-9099b6e {
                                              z-index: 0;
                                            }

                                            @media (max-width: 480px) {
                                              .elementor-22012 .elementor-element.elementor-element-69bb6a1 {
                                                width: 100%;
                                              }

                                              .elementor-22012 .elementor-element.elementor-element-fb2288e {
                                                width: 100%;
                                              }

                                              .elementor-22012 .elementor-element.elementor-element-ed1e016 {
                                                width: 50%;
                                              }

                                              .elementor-22012 .elementor-element.elementor-element-554a841 {
                                                width: 50%;
                                              }
                                            }
                                          </style>
                                          <div data-elementor-type="page" data-elementor-id="22012"
                                            class="elementor elementor-22012">
                                            <section
                                              class="elementor-section elementor-top-section elementor-element elementor-element-9e3fd05 elementor-section-full_width wdt-overflow-hidden elementor-section-height-default elementor-section-height-default"
                                              data-id="9e3fd05" data-element_type="section"
                                              data-settings='{"background_background":"classic","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                              <div class="elementor-container elementor-column-gap-no">
                                                <div
                                                  class="wdt-overflow-hidden elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-69bb6a1"
                                                  data-id="69bb6a1" data-element_type="column"
                                                  data-settings='{"wdt_overflow_hidden":"true"}'>
                                                  <div class="elementor-widget-wrap elementor-element-populated">
                                                    <section
                                                      class="elementor-section elementor-inner-section elementor-element elementor-element-bd688a2 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                                      data-id="bd688a2" data-element_type="section"
                                                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                                      <div class="elementor-container elementor-column-gap-no">
                                                        <div
                                                          class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-fb2288e"
                                                          data-id="fb2288e" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-bf2f81b start wdt-icon-box-style-a elementor-widget elementor-widget-wdt-icon-box"
                                                              data-id="bf2f81b" data-element_type="widget"
                                                              data-settings='{"carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                                                              data-widget_type="wdt-icon-box.default">
                                                              <div class="elementor-widget-container">
                                                                <div
                                                                  class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template"
                                                                  id="wdt-icon-box-bf2f81b">
                                                                  <div class="wdt-content-item">
                                                                    <div class="wdt-content-media-group">
                                                                      <div class="wdt-content-icon-wrapper">
                                                                        <div class="wdt-content-icon">
                                                                          <span><i aria-hidden="true"
                                                                              class="fas fa-users"></i></span>
                                                                        </div>
                                                                      </div>
                                                                      <div class="wdt-content-subtitle">
                                                                        Community
                                                                      </div>
                                                                    </div>
                                                                    <div class="wdt-content-detail-group">
                                                                      <div class="wdt-content-title">
                                                                        <h5>
                                                                          <a href="#" target="_blank"
                                                                            rel="nofollow">Parent-Teacher
                                                                            Collaboration</a>
                                                                        </h5>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                    <section
                                                      class="elementor-section elementor-inner-section elementor-element elementor-element-1d1efa5 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                                      data-id="1d1efa5" data-element_type="section"
                                                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                                      <div class="elementor-container elementor-column-gap-no">
                                                        <div
                                                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-ed1e016"
                                                          data-id="ed1e016" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-db38cc3 elementor-widget elementor-widget-spacer"
                                                              data-id="db38cc3" data-element_type="widget"
                                                              data-settings='{"wdt_animation_effect":"none"}'
                                                              data-widget_type="spacer.default">
                                                              <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                  <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div
                                                              class="elementor-element elementor-element-25c56ab elementor-widget__width-auto wdt-popup-style-b elementor-widget elementor-widget-wdt-popup-box"
                                                              data-id="25c56ab" data-element_type="widget"
                                                              data-settings='{"show_close_Button":"true","esc_to_exit":"true","click_to_exit":"true","wdt_animation_effect":"none"}'
                                                              data-widget_type="wdt-popup-box.default">
                                                              <div class="elementor-widget-container">
                                                                <div
                                                                  class="wdt-popup-box-trigger-holder wdt-click-element-icon"
                                                                  id="wdt-popup-box-trigger-25c56ab"
                                                                  data-settings='{"module_id":"25c56ab", "module_ref_id":"wdt-popup-box-25c56ab", "popup_class":"wdt-popup-box-window wdt-popup-box-window-25c56ab wdt-fade-zoom", "trigger_type":"on-click", "on_load_delay":null, "on_load_after":null, "external_class":null, "external_id":null, "show_close_Button":true, "esc_to_exit":true, "click_to_exit":true, "mfp_src":"https://vimeo.com/84198419", "mfp_type":"iframe"}'>
                                                                  <div class="wdt-popup-box-trigger-element">
                                                                    <span
                                                                      class="wdt-popup-box-trigger-item wdt-popup-box-trigger-icon"><i
                                                                        aria-hidden="true"
                                                                        class="fas fa-play"></i></span>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div
                                                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-554a841"
                                                          data-id="554a841" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-9099b6e elementor-widget elementor-widget-image"
                                                              data-id="9099b6e" data-element_type="widget"
                                                              data-settings='{"wdt_animation_effect":"none"}'
                                                              data-widget_type="image.default">
                                                              <div class="elementor-widget-container">
                                                                <img loading="lazy" loading="lazy" decoding="async"
                                                                  width="700" height="700"
                                                                  src="wp-content/uploads/sites/12/2024/02/demo-course-img-04.webp"
                                                                  class="attachment-full size-full wp-image-21981"
                                                                  alt="Parent-Teacher Communication Portal" srcset="
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-04.webp         700w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-04-300x300.webp 300w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-04-150x150.webp 150w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-04-100x100.webp 100w
                                                                    " sizes="(max-width: 700px) 100vw, 700px" />
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                  </div>
                                                </div>
                                              </div>
                                            </section>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- Slide 5: Mobile -->
                                      <div class="swiper-slide">
                                        <div class="wdt-content-item">
                                          <style>
                                            .elementor-22019 .elementor-element.elementor-element-9e3fd05:not(.elementor-motion-effects-element-type-background),
                                            .elementor-22019 .elementor-element.elementor-element-9e3fd05>.elementor-motion-effects-container>.elementor-motion-effects-layer {
                                              background-color: #ff8c00;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-9e3fd05,
                                            .elementor-22019 .elementor-element.elementor-element-9e3fd05>.elementor-background-overlay {
                                              border-radius: 7px 7px 7px 7px;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-9e3fd05 {
                                              transition:
                                                background 0.3s,
                                                border 0.3s,
                                                border-radius 0.3s,
                                                box-shadow 0.3s;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-9e3fd05>.elementor-background-overlay {
                                              transition:
                                                background 0.3s,
                                                border-radius 0.3s,
                                                opacity 0.3s;
                                            }

                                            .elementor-bc-flex-widget .elementor-22019 .elementor-element.elementor-element-69bb6a1.elementor-column .elementor-widget-wrap {
                                              align-items: space-between;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-69bb6a1.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: space-between;
                                              align-items: space-between;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-69bb6a1>.elementor-element-populated {
                                              padding: 30px 30px 30px 30px;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-fb2288e>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
                                              margin-bottom: 0px;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-bf2f81b .wdt-content-item {
                                              text-align: start;
                                              justify-content: start;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-title h5,
                                            .elementor-22019 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-title h5>a {
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-subtitle {
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-bf2f81b .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span {
                                              font-size: 20px;
                                              color: var(--e-global-color-81731bd);
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-bf2f81b {
                                              z-index: 1;
                                            }

                                            .elementor-bc-flex-widget .elementor-22019 .elementor-element.elementor-element-ed1e016.elementor-column .elementor-widget-wrap {
                                              align-items: flex-end;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-ed1e016.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: flex-end;
                                              align-items: flex-end;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-db38cc3 {
                                              --spacer-size: 50px;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element .wdt-popup-box-trigger-icon {
                                              font-size: 18px;
                                              color: var(--e-global-color-accent);
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element:focus .wdt-popup-box-trigger-icon,
                                            .elementor-22019 .elementor-element.elementor-element-25c56ab .wdt-popup-box-trigger-holder .wdt-popup-box-trigger-element:hover .wdt-popup-box-trigger-icon {
                                              color: var(--e-global-color-accent);
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-25c56ab {
                                              width: auto;
                                              max-width: auto;
                                            }

                                            .elementor-bc-flex-widget .elementor-22019 .elementor-element.elementor-element-554a841.elementor-column .elementor-widget-wrap {
                                              align-items: flex-end;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-554a841.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                              align-content: flex-end;
                                              align-items: flex-end;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-9099b6e img {
                                              width: 100%;
                                              max-width: 100%;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-9099b6e>.elementor-widget-container {
                                              margin: -100px -50px -50px -50px;
                                            }

                                            .elementor-22019 .elementor-element.elementor-element-9099b6e {
                                              z-index: 0;
                                            }

                                            @media (max-width: 480px) {
                                              .elementor-22019 .elementor-element.elementor-element-69bb6a1 {
                                                width: 100%;
                                              }

                                              .elementor-22019 .elementor-element.elementor-element-fb2288e {
                                                width: 100%;
                                              }

                                              .elementor-22019 .elementor-element.elementor-element-ed1e016 {
                                                width: 50%;
                                              }

                                              .elementor-22019 .elementor-element.elementor-element-554a841 {
                                                width: 50%;
                                              }
                                            }
                                          </style>
                                          <div data-elementor-type="page" data-elementor-id="22019"
                                            class="elementor elementor-22019">
                                            <section
                                              class="elementor-section elementor-top-section elementor-element elementor-element-9e3fd05 elementor-section-full_width wdt-overflow-hidden elementor-section-height-default elementor-section-height-default"
                                              data-id="9e3fd05" data-element_type="section"
                                              data-settings='{"background_background":"classic","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                              <div class="elementor-container elementor-column-gap-no">
                                                <div
                                                  class="wdt-overflow-hidden elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-69bb6a1"
                                                  data-id="69bb6a1" data-element_type="column"
                                                  data-settings='{"wdt_overflow_hidden":"true"}'>
                                                  <div class="elementor-widget-wrap elementor-element-populated">
                                                    <section
                                                      class="elementor-section elementor-inner-section elementor-element elementor-element-bd688a2 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                                      data-id="bd688a2" data-element_type="section"
                                                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                                      <div class="elementor-container elementor-column-gap-no">
                                                        <div
                                                          class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-fb2288e"
                                                          data-id="fb2288e" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-bf2f81b start wdt-icon-box-style-a elementor-widget elementor-widget-wdt-icon-box"
                                                              data-id="bf2f81b" data-element_type="widget"
                                                              data-settings='{"carousel_arrows_prev_arrow_vertical_align":"flex-start","carousel_arrows_prev_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_prev_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_align":"flex-start","carousel_arrows_next_arrow_vertical_top_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_vertical_top_indent_mobile":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_laptop":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_tablet":{"unit":"%","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra":{"unit":"px","size":"","sizes":[]},"carousel_arrows_next_arrow_horizontal_left_indent_mobile":{"unit":"%","size":"","sizes":[]},"wdt_animation_effect":"none"}'
                                                              data-widget_type="wdt-icon-box.default">
                                                              <div class="elementor-widget-container">
                                                                <div
                                                                  class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template"
                                                                  id="wdt-icon-box-bf2f81b">
                                                                  <div class="wdt-content-item">
                                                                    <div class="wdt-content-media-group">
                                                                      <div class="wdt-content-icon-wrapper">
                                                                        <div class="wdt-content-icon">
                                                                          <span><i aria-hidden="true"
                                                                              class="fas fa-mobile-alt"></i></span>
                                                                        </div>
                                                                      </div>
                                                                      <div class="wdt-content-subtitle">
                                                                        Mobile
                                                                      </div>
                                                                    </div>
                                                                    <div class="wdt-content-detail-group">
                                                                      <div class="wdt-content-title">
                                                                        <h5>
                                                                          <a href="#" target="_blank"
                                                                            rel="nofollow">Mobile-First
                                                                            Platform</a>
                                                                        </h5>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                    <section
                                                      class="elementor-section elementor-inner-section elementor-element elementor-element-1d1efa5 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                                      data-id="1d1efa5" data-element_type="section"
                                                      data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                                      <div class="elementor-container elementor-column-gap-no">
                                                        <div
                                                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-ed1e016"
                                                          data-id="ed1e016" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-db38cc3 elementor-widget elementor-widget-spacer"
                                                              data-id="db38cc3" data-element_type="widget"
                                                              data-settings='{"wdt_animation_effect":"none"}'
                                                              data-widget_type="spacer.default">
                                                              <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                  <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div
                                                              class="elementor-element elementor-element-25c56ab elementor-widget__width-auto wdt-popup-style-b elementor-widget elementor-widget-wdt-popup-box"
                                                              data-id="25c56ab" data-element_type="widget"
                                                              data-settings='{"show_close_Button":"true","esc_to_exit":"true","click_to_exit":"true","wdt_animation_effect":"none"}'
                                                              data-widget_type="wdt-popup-box.default">
                                                              <div class="elementor-widget-container">
                                                                <div
                                                                  class="wdt-popup-box-trigger-holder wdt-click-element-icon"
                                                                  id="wdt-popup-box-trigger-25c56ab"
                                                                  data-settings='{"module_id":"25c56ab", "module_ref_id":"wdt-popup-box-25c56ab", "popup_class":"wdt-popup-box-window wdt-popup-box-window-25c56ab wdt-fade-zoom", "trigger_type":"on-click", "on_load_delay":null, "on_load_after":null, "external_class":null, "external_id":null, "show_close_Button":true, "esc_to_exit":true, "click_to_exit":true, "mfp_src":"https://vimeo.com/84198419", "mfp_type":"iframe"}'>
                                                                  <div class="wdt-popup-box-trigger-element">
                                                                    <span
                                                                      class="wdt-popup-box-trigger-item wdt-popup-box-trigger-icon"><i
                                                                        aria-hidden="true"
                                                                        class="fas fa-play"></i></span>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div
                                                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-554a841"
                                                          data-id="554a841" data-element_type="column">
                                                          <div
                                                            class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                              class="elementor-element elementor-element-9099b6e elementor-widget elementor-widget-image"
                                                              data-id="9099b6e" data-element_type="widget"
                                                              data-settings='{"wdt_animation_effect":"none"}'
                                                              data-widget_type="image.default">
                                                              <div class="elementor-widget-container">
                                                                <img loading="lazy" loading="lazy" decoding="async"
                                                                  width="700" height="700"
                                                                  src="wp-content/uploads/sites/12/2024/02/demo-course-img-05.webp"
                                                                  class="attachment-full size-full wp-image-21980"
                                                                  alt="Mobile App Interface" srcset="
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-05.webp         700w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-05-300x300.webp 300w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-05-150x150.webp 150w,
                                                                      wp-content/uploads/sites/12/2024/02/demo-course-img-05-100x100.webp 100w
                                                                    " sizes="(max-width: 700px) 100vw, 700px" />
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </section>
                                                  </div>
                                                </div>
                                              </div>
                                            </section>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="wdt-advanced-carousel-pagination swiper-pagination"></div>
                                    <div
                                      class="wdt-advanced-carousel-navigation wdt-advanced-carousel-next navigation-arrow swiper-button-next"
                                      role="button" aria-label="Next slide" aria-controls="swiper-wrapper-af205ea"
                                      tabindex="0">
                                      <span class="arrow-icon fas fa-chevron-right"></span>
                                    </div>
                                    <div
                                      class="wdt-advanced-carousel-navigation wdt-advanced-carousel-prev navigation-arrow swiper-button-prev"
                                      role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-af205ea"
                                      tabindex="0">
                                      <span class="arrow-icon fas fa-chevron-left"></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
            <section
              class="elementor-section elementor-top-section elementor-element elementor-element-539a3a6 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
              data-id="539a3a6" data-element_type="section"
              data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
              <div class="elementor-container elementor-column-gap-no">
                <div
                  class="wdt-overflow-hidden elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-18410f6"
                  data-id="18410f6" data-element_type="column" data-settings='{"wdt_overflow_hidden":"true"}'>
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <section
                      class="elementor-section elementor-inner-section elementor-element elementor-element-b82093e elementor-section-full_width elementor-reverse-tablet elementor-reverse-mobile_extra elementor-reverse-mobile animated-fast elementor-section-height-default elementor-section-height-default elementor-invisible"
                      data-id="b82093e" data-element_type="section"
                      data-settings='{"background_background":"classic","animation":"fadeInRight","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                      <div class="elementor-container elementor-column-gap-no">
                        <div
                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-ea6a9a9"
                          data-id="ea6a9a9" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-6b72cea elementor-widget-tablet__width-inherit start start elementor-widget__width-initial elementor-widget elementor-widget-wdt-heading"
                              data-id="6b72cea" data-element_type="widget"
                              data-settings='{"split_heading":"true","wdt_enable_inview_status":"true","title_vertical_align":"center","subtitle_vertical_align":"center","wdt_animation_effect":"none"}'
                              data-widget_type="wdt-heading.default">
                              <div class="elementor-widget-container">
                                <div class="wdt-heading-holder" id="wdt-heading-6b72cea">
                                  <div class="wdt-heading-subtitle-wrapper wdt-heading-align-center">
                                    <span class="wdt-heading-subtitle">Coming Soon</span>
                                  </div>
                                  <h2
                                    class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                                    <span class="wdt-heading-title">AcademixSuite<span
                                        class="wdt-split-heading-wrapper"></span>
                                      Mobile App</span>
                                  </h2>
                                  <div class="wdt-heading-content-wrapper">
                                    Manage your school administration on the
                                    go. Get real-time notifications, access
                                    student data, and handle approvals from
                                    anywhere with our upcoming mobile
                                    application.
                                  </div>
                                </div>
                              </div>
                            </div>
                            <section
                              class="elementor-section elementor-inner-section elementor-element elementor-element-f7bd25b elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                              data-id="f7bd25b" data-element_type="section"
                              data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                              <div class="elementor-container elementor-column-gap-no">
                                <div
                                  class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-03e5f46"
                                  data-id="03e5f46" data-element_type="column">
                                  <div class="elementor-widget-wrap elementor-element-populated">
                                    <!-- Coming Soon Badge - Google Play -->
                                    <div
                                      class="elementor-element elementor-element-3d648ae elementor-widget__width-initial elementor-widget elementor-widget-image"
                                      data-id="3d648ae" data-element_type="widget"
                                      data-settings='{"wdt_animation_effect":"none"}' data-widget_type="image.default">
                                      <div class="elementor-widget-container">
                                        <div class="coming-soon-badge">
                                          <img loading="lazy" decoding="async" width="175" height="50"
                                            src="wp-content/uploads/sites/12/2024/02/google-play-button.webp"
                                            class="attachment-full size-full wp-image-22084"
                                            alt="Google Play - Coming Soon" style="
                                                opacity: 0.6;
                                                filter: grayscale(30%);
                                              " />
                                          <span class="coming-soon-label">Coming Soon</span>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Coming Soon Badge - App Store -->
                                    <div
                                      class="elementor-element elementor-element-99d5b95 elementor-widget__width-initial elementor-widget elementor-widget-image"
                                      data-id="99d5b95" data-element_type="widget"
                                      data-settings='{"wdt_animation_effect":"none"}' data-widget_type="image.default">
                                      <div class="elementor-widget-container">
                                        <div class="coming-soon-badge">
                                          <img loading="lazy" decoding="async" width="175" height="50"
                                            src="wp-content/uploads/sites/12/2024/02/app-store-button.webp"
                                            class="attachment-full size-full wp-image-22085"
                                            alt="App Store - Coming Soon" style="
                                                opacity: 0.6;
                                                filter: grayscale(30%);
                                              " />
                                          <span class="coming-soon-label">Coming Soon</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                            <!-- Notification Signup Form -->
                            <div
                              class="elementor-element elementor-element-5a9338a elementor-widget__width-auto wdt-app-iconlist elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                              data-id="5a9338a" data-element_type="widget"
                              data-settings='{"wdt_animation_effect":"none"}' data-widget_type="icon-list.default">
                              <div class="elementor-widget-container">
                                <div class="notify-signup-form">
                                  <h4>Get Notified When We Launch</h4>
                                  <form class="notify-form">
                                    <input type="email" placeholder="Enter your email address" required />
                                    <button type="submit">Notify Me</button>
                                  </form>
                                  <p class="form-note">
                                    Be the first to know when our mobile app
                                    is available.
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div
                          class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-d28d146"
                          data-id="d28d146" data-element_type="column">
                          <div class="elementor-widget-wrap elementor-element-populated">
                            <div
                              class="elementor-element elementor-element-aa651e4 elementor-widget elementor-widget-image"
                              data-id="aa651e4" data-element_type="widget"
                              data-settings='{"wdt_animation_effect":"none"}' data-widget_type="image.default">
                              <div class="elementor-widget-container">
                                <div class="coming-soon-device">
                                  <img loading="lazy" decoding="async" width="1801" height="1801"
                                    src="wp-content/uploads/sites/12/2024/02/Lizza-App-1.webp"
                                    class="attachment-full size-full wp-image-22536"
                                    alt="AcademixSuite Mobile App Preview - Coming Soon" srcset="
                                        wp-content/uploads/sites/12/2024/02/Lizza-App-1.webp           1801w,
                                        wp-content/uploads/sites/12/2024/02/Lizza-App-1-300x300.webp    300w,
                                        wp-content/uploads/sites/12/2024/02/Lizza-App-1-1024x1024.webp 1024w,
                                        wp-content/uploads/sites/12/2024/02/Lizza-App-1-150x150.webp    150w,
                                        wp-content/uploads/sites/12/2024/02/Lizza-App-1-768x768.webp    768w,
                                        wp-content/uploads/sites/12/2024/02/Lizza-App-1-1536x1536.webp 1536w,
                                        wp-content/uploads/sites/12/2024/02/Lizza-App-1-1000x1000.webp 1000w,
                                        wp-content/uploads/sites/12/2024/02/Lizza-App-1-100x100.webp    100w
                                      " sizes="(max-width: 1801px) 100vw, 1801px" />
                                  <div class="coming-soon-overlay">
                                    <span>Launching Soon</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>

            <!-- Add CSS for coming soon styling -->
            <style>
              .coming-soon-badge {
                position: relative;
                display: inline-block;
                margin: 0 10px;
              }

              .coming-soon-label {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: rgba(0, 0, 0, 0.8);
                color: white;
                padding: 8px 15px;
                border-radius: 20px;
                font-weight: bold;
                font-size: 14px;
                white-space: nowrap;
              }

              .coming-soon-device {
                position: relative;
                display: inline-block;
              }

              .coming-soon-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.3);
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 30px;
              }

              .coming-soon-overlay span {
                background: rgba(4, 57, 16, 0.9);
                color: white;
                padding: 15px 30px;
                border-radius: 25px;
                font-weight: bold;
                font-size: 18px;
                text-transform: uppercase;
                letter-spacing: 1px;
              }

              .notify-signup-form {
                margin-top: 30px;
                padding: 25px;
                background: #f8f9fa;
                border-radius: 10px;
                border-left: 4px solid rgba(4, 57, 16, 0.9);
              }

              .notify-signup-form h4 {
                margin-bottom: 15px;
                color: #333;
                font-size: 18px;
              }

              .notify-form {
                display: flex;
                gap: 10px;
                margin-bottom: 10px;
              }

              .notify-form input {
                flex: 1;
                padding: 12px 15px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 14px;
              }

              .notify-form button {
                background: rgba(4, 57, 16, 0.9);
                color: white;
                border: none;
                padding: 12px 25px;
                border-radius: 5px;
                cursor: pointer;
                font-weight: 600;
                transition: background 0.3s;
              }

              .notify-form button:hover {
                background: #1e540f;
              }

              .form-note {
                font-size: 12px;
                color: #666;
                margin: 0;
              }

              @media (max-width: 768px) {
                .notify-form {
                  flex-direction: column;
                }

                .coming-soon-badge {
                  display: block;
                  margin: 10px 0;
                }

                .coming-soon-overlay span {
                  font-size: 14px;
                  padding: 10px 20px;
                }
              }
            </style>
            <section
              class="elementor-section elementor-top-section elementor-element elementor-element-c8cecb1 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
              data-id="c8cecb1" data-element_type="section"
              data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
              <div class="elementor-container elementor-column-gap-no">
                <div
                  class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-fb31611"
                  data-id="fb31611" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <div
                      class="elementor-element elementor-element-4c1fbd0 wdt-popup-newsletter elementor-widget elementor-widget-wdt-popup-box"
                      data-id="4c1fbd0" data-element_type="widget"
                      data-settings='{"show_close_Button":"true","esc_to_exit":"true","click_to_exit":"true","wdt_animation_effect":"none"}'
                      data-widget_type="wdt-popup-box.default">
                      <div class="elementor-widget-container">
                        <div class="wdt-popup-box-trigger-holder" id="wdt-popup-box-trigger-4c1fbd0"
                          data-settings='{"module_id":"4c1fbd0", "module_ref_id":"wdt-popup-box-4c1fbd0", "popup_class":"wdt-popup-box-window wdt-popup-box-window-4c1fbd0 wdt-fade-zoom", "trigger_type":"on-load", "on_load_delay":{"unit":"ms", "size":200, "sizes":[]}, "on_load_after":{"unit":"days", "size":1, "sizes":[]}, "external_class":null, "external_id":null, "show_close_Button":true, "esc_to_exit":true, "click_to_exit":true, "mfp_src":"#wdt-popup-box-content-holder-4c1fbd0", "mfp_type":"inline"}'>
                        </div>
                        <div id="wdt-popup-box-content-holder-4c1fbd0"
                          class="wdt-popup-box-content-holder wdt-popup-box-content-holder-4c1fbd0 wdt-content-type-template mfp-hide">
                          <div class="wdt-popup-box-content-inner">
                            <style>
                              .elementor-bc-flex-widget .elementor-22519 .elementor-element.elementor-element-e118bfc.elementor-column .elementor-widget-wrap {
                                align-items: flex-end;
                              }

                              .elementor-22519 .elementor-element.elementor-element-e118bfc.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                align-content: flex-end;
                                align-items: flex-end;
                              }

                              .elementor-22519 .elementor-element.elementor-element-e118bfc.elementor-column>.elementor-widget-wrap {
                                justify-content: center;
                              }

                              .elementor-22519 .elementor-element.elementor-element-e118bfc>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not( :last-child):not(.elementor-absolute) {
                                margin-bottom: 0px;
                              }

                              .elementor-22519 .elementor-element.elementor-element-5f33cc2>.elementor-widget-container {
                                margin: -200px 0px 0px 0px;
                              }

                              .elementor-22519 .elementor-element.elementor-element-5f33cc2 {
                                width: auto;
                                max-width: auto;
                              }

                              .elementor-bc-flex-widget .elementor-22519 .elementor-element.elementor-element-b57be16.elementor-column .elementor-widget-wrap {
                                align-items: center;
                              }

                              .elementor-22519 .elementor-element.elementor-element-b57be16.elementor-column.elementor-element[data-element_type="column"]>.elementor-widget-wrap.elementor-element-populated {
                                align-content: center;
                                align-items: center;
                              }

                              .elementor-22519 .elementor-element.elementor-element-b57be16>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not( :last-child):not(.elementor-absolute) {
                                margin-bottom: 0px;
                              }

                              .elementor-22519 .elementor-element.elementor-element-b57be16>.elementor-element-populated {
                                padding: 60px 0px 60px 0px;
                              }

                              .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder,
                              .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder>.wdt-heading-separator-wrapper .wdt-heading-separator,
                              .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder>.wdt-heading-title-wrapper .wdt-heading-title,
                              .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder>.wdt-heading-subtitle-wrapper .wdt-heading-subtitle {
                                text-align: start;
                                justify-content: start;
                                justify-items: start;
                              }

                              .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder .wdt-heading-title-wrapper .wdt-heading-title {
                                align-items: center;
                              }

                              .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder .wdt-heading-subtitle-wrapper .wdt-heading-subtitle {
                                align-items: center;
                              }

                              .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder .wdt-heading-subtitle-wrapper {
                                color: var(--e-global-color-accent);
                              }

                              .elementor-22519 .elementor-element.elementor-element-e11db14>.elementor-widget-container {
                                padding: 0px 0px 30px 0px;
                              }

                              .elementor-22519 .elementor-element.elementor-element-b885747 .wdt-mailchimp-holder .wdt-mailchimp-subscribe-form {
                                text-align: center;
                                justify-content: center;
                                justify-items: center;
                              }

                              .elementor-22519 .elementor-element.elementor-element-b885747 .wdt-mailchimp-holder .wdt-mailchimp-wrapper .wdt-mailchimp-subscription-button-holder button {
                                color: var(--e-global-color-81731bd);
                              }

                              .elementor-22519 .elementor-element.elementor-element-b885747 .wdt-mailchimp-holder .wdt-mailchimp-wrapper .wdt-mailchimp-subscription-button-holder button:hover {
                                color: var(--e-global-color-secondary);
                              }

                              .elementor-22519 .elementor-element.elementor-element-b885747>.elementor-widget-container {
                                padding: 0px 0px 10px 0px;
                              }

                              .elementor-22519 .elementor-element.elementor-element-b885747 {
                                width: var(--container-widget-width, 600px);
                                max-width: 600px;
                                --container-widget-width: 600px;
                                --container-widget-flex-grow: 0;
                              }

                              .elementor-22519 .elementor-element.elementor-element-b8de34c {
                                text-align: left;
                                color: var(--e-global-color-text);
                              }

                              @media (max-width: 1280px) {
                                .elementor-22519 .elementor-element.elementor-element-e11db14>.elementor-widget-container {
                                  padding: 0px 0px 25px 0px;
                                }
                              }

                              @media (min-width: 481px) {
                                .elementor-22519 .elementor-element.elementor-element-e118bfc {
                                  width: 48%;
                                }

                                .elementor-22519 .elementor-element.elementor-element-b57be16 {
                                  width: 52%;
                                }
                              }

                              @media (max-width: 767px) and (min-width: 481px) {
                                .elementor-22519 .elementor-element.elementor-element-e118bfc {
                                  width: 100%;
                                }

                                .elementor-22519 .elementor-element.elementor-element-b57be16 {
                                  width: 100%;
                                }
                              }

                              @media (max-width: 1024px) {
                                .elementor-22519 .elementor-element.elementor-element-5f33cc2 img {
                                  width: 400px;
                                }

                                .elementor-22519 .elementor-element.elementor-element-b57be16>.elementor-element-populated {
                                  padding: 50px 0px 50px 0px;
                                }

                                .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder,
                                .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder>.wdt-heading-separator-wrapper .wdt-heading-separator,
                                .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder>.wdt-heading-title-wrapper .wdt-heading-title,
                                .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder>.wdt-heading-subtitle-wrapper .wdt-heading-subtitle {
                                  text-align: start;
                                  justify-content: start;
                                  justify-items: start;
                                }

                                .elementor-22519 .elementor-element.elementor-element-e11db14>.elementor-widget-container {
                                  padding: 0px 0px 20px 0px;
                                }

                                .elementor-22519 .elementor-element.elementor-element-e11db14 {
                                  width: 100%;
                                  max-width: 100%;
                                }

                                .elementor-22519 .elementor-element.elementor-element-b8de34c {
                                  text-align: left;
                                }
                              }

                              @media (max-width: 767px) {
                                .elementor-22519 .elementor-element.elementor-element-b57be16.elementor-column>.elementor-widget-wrap {
                                  justify-content: center;
                                }

                                .elementor-22519 .elementor-element.elementor-element-b57be16>.elementor-element-populated {
                                  padding: 40px 0px 40px 0px;
                                }

                                .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder,
                                .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder>.wdt-heading-separator-wrapper .wdt-heading-separator,
                                .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder>.wdt-heading-title-wrapper .wdt-heading-title,
                                .elementor-22519 .elementor-element.elementor-element-e11db14 .wdt-heading-holder>.wdt-heading-subtitle-wrapper .wdt-heading-subtitle {
                                  text-align: center;
                                  justify-content: center;
                                  justify-items: center;
                                }

                                .elementor-22519 .elementor-element.elementor-element-b8de34c {
                                  text-align: center;
                                }
                              }

                              @media (max-width: 480px) {
                                .elementor-22519 .elementor-element.elementor-element-b57be16>.elementor-element-populated {
                                  padding: 30px 0px 30px 0px;
                                }

                                .elementor-22519 .elementor-element.elementor-element-e11db14>.elementor-widget-container {
                                  padding: 0px 0px 20px 0px;
                                }
                              }
                            </style>
                            <div data-elementor-type="page" data-elementor-id="22519" class="elementor elementor-22519">
                              <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-ff7fe58 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                data-id="ff7fe58" data-element_type="section"
                                data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                                <div class="elementor-container elementor-column-gap-no">
                                  <div
                                    class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-e118bfc elementor-hidden-mobile_extra elementor-hidden-mobile"
                                    data-id="e118bfc" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                      <div
                                        class="elementor-element elementor-element-5f33cc2 elementor-widget__width-auto elementor-hidden-mobile_extra elementor-hidden-mobile elementor-widget elementor-widget-image"
                                        data-id="5f33cc2" data-element_type="widget"
                                        data-settings='{"wdt_animation_effect":"none"}'
                                        data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                          <img loading="lazy" loading="lazy" decoding="async" width="600" height="800"
                                            src="wp-content/uploads/sites/12/2024/02/Lizza-Modern-Newsletter-Img.webp"
                                            class="attachment-large size-large wp-image-23159" alt="" srcset="
                                                wp-content/uploads/sites/12/2024/02/Lizza-Modern-Newsletter-Img.webp         600w,
                                                wp-content/uploads/sites/12/2024/02/Lizza-Modern-Newsletter-Img-225x300.webp 225w
                                              " sizes="(max-width: 600px) 100vw, 600px" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div
                                    class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b57be16"
                                    data-id="b57be16" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                      <div
                                        class="elementor-element elementor-element-e11db14 start elementor-widget-tablet__width-inherit start center elementor-widget elementor-widget-wdt-heading"
                                        data-id="e11db14" data-element_type="widget"
                                        data-settings='{"split_heading":"true","wdt_enable_inview_status":"true","title_vertical_align":"center","subtitle_vertical_align":"center","wdt_animation_effect":"none"}'
                                        data-widget_type="wdt-heading.default">
                                        <div class="elementor-widget-container">
                                          <div class="wdt-heading-holder" id="wdt-heading-e11db14">
                                            <div class="wdt-heading-subtitle-wrapper wdt-heading-align-center">
                                              <span class="wdt-heading-subtitle">Hello There!</span>
                                            </div>
                                            <h2
                                              class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                                              <span class="wdt-heading-title">Our Newsletter</span>
                                            </h2>
                                            <div class="wdt-heading-content-wrapper">
                                              We're thrilled that you're
                                              interested in staying up-to-date
                                              with all the latest news
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div
                                        class="elementor-element elementor-element-b885747 elementor-widget__width-initial center elementor-widget elementor-widget-wdt-mailchimp"
                                        data-id="b885747" data-element_type="widget"
                                        data-settings='{"wdt_animation_effect":"none"}'
                                        data-widget_type="wdt-mailchimp.default">
                                        <div class="elementor-widget-container">
                                          <div class="wdt-mailchimp-holder wdt-template-type3"
                                            id="wdt-mailchimp-b885747">
                                            <div class="wdt-mailchimp-wrapper">
                                              <form class="wdt-mailchimp-subscribe-form with-btn-text"
                                                name="mailchimpSubscribeForm" action="#" method="post">
                                                <input type="email" name="wdt_mc_emailid" required="required"
                                                  placeholder="Your Email Id" value="" /><input type="hidden"
                                                  name="wdt_mc_listid" value="" />
                                                <div class="wdt-mailchimp-subscription-button-holder">
                                                  <button type="submit" name="wdt_mc_submit">
                                                    <span>Submit</span>
                                                  </button>
                                                </div>
                                              </form>
                                              <div class="wdt-mailchimp-subscription-msg"></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div
                                        class="elementor-element elementor-element-b8de34c wdt-text-link-1 elementor-widget elementor-widget-text-editor"
                                        data-id="b8de34c" data-element_type="widget"
                                        data-settings='{"wdt_animation_effect":"none"}'
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                          <p>
                                            We respect your privacy,
                                            Unsubscribe at anytime.
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </section>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- ** Container End ** -->
      </div>
      <!-- **Main - End ** -->

      <!-- **Footer** -->
      <footer id="footer">
        <div class="wdt-elementor-container-fluid">
          <div id="footer-58" class="wdt-footer-tpl footer-58">
            <div data-elementor-type="wp-post" data-elementor-id="58" class="elementor elementor-58">
              <section
                class="elementor-section elementor-top-section elementor-element elementor-element-56f86254 wdt-dark-bg elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="56f86254" data-element_type="section"
                data-settings='{"background_background":"classic","wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                <div class="elementor-background-overlay"></div>
                <div class="elementor-container elementor-column-gap-no">
                  <div
                    class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-798d7c98"
                    data-id="798d7c98" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                      <section
                        class="elementor-section elementor-inner-section elementor-element elementor-element-7e877fd8 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                        data-id="7e877fd8" data-element_type="section"
                        data-settings='{"wdt_bg_image":{"url":"","id":"","size":""},"wdt_bg_image_laptop":{"url":"","id":"","size":""},"wdt_bg_image_tablet_extra":{"url":"","id":"","size":""},"wdt_bg_image_tablet":{"url":"","id":"","size":""},"wdt_bg_image_mobile_extra":{"url":"","id":"","size":""},"wdt_bg_image_mobile":{"url":"","id":"","size":""},"wdt_bg_position":"center center","wdt_animation_effect":"none"}'>
                        <div class="elementor-container elementor-column-gap-no">
                          <div
                            class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-58e6ae5a"
                            data-id="58e6ae5a" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                              <div
                                class="elementor-element elementor-element-31b6fb01 elementor-icon-list--layout-inline elementor-align-center wdt-footer-icon-list-style-button elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                data-id="31b6fb01" data-element_type="widget"
                                data-settings='{"wdt_animation_effect":"none"}' data-widget_type="icon-list.default">
                                <div class="elementor-widget-container">
                                  <ul class="elementor-icon-list-items elementor-inline-items">
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <a href="#">
                                        <span class="elementor-icon-list-text">Be a Volunteer</span>
                                      </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <a href="#">
                                        <span class="elementor-icon-list-text">Success Stories</span>
                                      </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <a href="#">
                                        <span class="elementor-icon-list-text">Support Forum</span>
                                      </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <a href="#">
                                        <span class="elementor-icon-list-text">Internships</span>
                                      </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <a href="#">
                                        <span class="elementor-icon-list-text">Help Center</span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                      <section
                        class="elementor-section elementor-inner-section elementor-element elementor-element-141e6339 elementor-section-full_width wdt-section-wrap-col elementor-section-height-default elementor-section-height-default">
                        <div class="elementor-container elementor-column-gap-no">
                          <!-- CTA Column -->
                          <div
                            class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-1075470d">
                            <div class="elementor-widget-wrap elementor-element-populated">
                              <div
                                class="elementor-element elementor-element-1fde2fd6 start elementor-widget elementor-widget-wdt-heading">
                                <div class="elementor-widget-container">
                                  <div class="wdt-heading-holder" id="wdt-heading-1fde2fd6">
                                    <h3
                                      class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                                      <span class="wdt-heading-title">Transform Your School Management</span>
                                    </h3>
                                    <div class="wdt-heading-content-wrapper">
                                      Experience the future of education administration with our comprehensive,
                                      cloud-based platform. Streamline operations, enhance communication, and boost
                                      academic performance.
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div
                                class="elementor-element elementor-element-76bb5bcf start wdt-custom-view-map-button start elementor-widget elementor-widget-wdt-button">
                                <div class="elementor-widget-container">
                                  <div
                                    class="wdt-button-holder wdt-template-textual wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after"
                                    id="wdt-button-76bb5bcf">
                                    <a class="wdt-button" href="/request-demo" data-tooltip="Request a Free Demo">
                                      <div class="wdt-button-text">
                                        <span>Request Demo</span><span>Request Demo</span>
                                      </div>
                                      <div class="wdt-button-icon">
                                        <span><i>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                              xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 25 25">
                                              <path
                                                d="M11.9,22.5c-0.7-0.7-0.7-1.8,0-2.5c0,0,0,0,0,0l5.7-5.7H2.8c-1,0-1.8-0.8-1.8-1.8s0.8-1.8,1.8-1.8h14.9L11.9,5 c-0.3-0.3-0.5-0.8-0.5-1.3c0-1,0.8-1.8,1.8-1.8c0.5,0,0.9,0.2,1.3,0.5l8.7,8.7c0.1,0.1,0.2,0.2,0.2,0.3c0,0,0,0.1,0.1,0.1 c0,0,0,0,0,0l0,0c0,0.1,0.1,0.1,0.1,0.2c0,0,0,0.1,0.1,0.2l0,0c0,0,0,0,0,0c0,0,0,0.1,0,0.1c0,0.2,0,0.5,0,0.7c0,0,0,0.1,0,0.1 c0,0,0,0,0,0l0,0c0,0,0,0.1,0,0.2c0,0.1-0.1,0.1-0.1,0.2l0,0c0,0,0,0,0,0c0,0,0,0.1-0.1,0.1c-0.1,0.1-0.1,0.2-0.2,0.3l-8.7,8.7 C13.8,23.2,12.6,23.2,11.9,22.5C11.9,22.5,11.9,22.5,11.9,22.5z">
                                              </path>
                                            </svg>
                                          </i></span>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Platform Features Column -->
                          <div
                            class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-32e4355d">
                            <div class="elementor-widget-wrap elementor-element-populated">
                              <div
                                class="elementor-element elementor-element-38650dea center elementor-widget elementor-widget-wdt-accordion-and-toggle">
                                <div class="elementor-widget-container">
                                  <div
                                    class="wdt-accordion-toggle-holder wdt-module-toggle wdt-template-default wdt-expand-collapse-position-end"
                                    id="wdt-accordion-and-toggle-38650dea">
                                    <div class="wdt-accordion-toggle-wrapper">
                                      <div class="wdt-accordion-toggle-title-holder">
                                        <div class="wdt-accordion-toggle-title">Platform Features</div>
                                        <div class="wdt-accordion-toggle-icon">
                                          <div class="wdt-accordion-toggle-icon-expand"><i aria-hidden="true"
                                              class="fas fa-plus"></i></div>
                                          <div class="wdt-accordion-toggle-icon-collapse"><i aria-hidden="true"
                                              class="fas fa-minus"></i></div>
                                        </div>
                                      </div>
                                      <div class="wdt-accordion-toggle-description">
                                        <div data-elementor-type="page" data-elementor-id="21828"
                                          class="elementor elementor-21828">
                                          <section
                                            class="elementor-section elementor-top-section elementor-element elementor-element-38b6b82d elementor-section-full_width elementor-section-height-default elementor-section-height-default">
                                            <div class="elementor-container elementor-column-gap-no">
                                              <div
                                                class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3bd4f9ed">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-66481e57 elementor-list-item-link-inline elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list">
                                                    <div class="elementor-widget-container">
                                                      <ul class="elementor-icon-list-items">
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/features/student-management/">
                                                            <span class="elementor-icon-list-text">Student
                                                              Management</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/features/attendance-tracking/">
                                                            <span class="elementor-icon-list-text">Attendance
                                                              Tracking</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/features/fee-management/">
                                                            <span class="elementor-icon-list-text">Fee & Billing
                                                              System</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/features/gradebook/">
                                                            <span class="elementor-icon-list-text">Digital
                                                              Gradebook</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/features/timetable/">
                                                            <span class="elementor-icon-list-text">Timetable
                                                              Management</span>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Support Column -->
                          <div
                            class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-9c83c52">
                            <div class="elementor-widget-wrap elementor-element-populated">
                              <div
                                class="elementor-element elementor-element-13ed1df9 center elementor-widget elementor-widget-wdt-accordion-and-toggle">
                                <div class="elementor-widget-container">
                                  <div
                                    class="wdt-accordion-toggle-holder wdt-module-toggle wdt-template-default wdt-expand-collapse-position-end"
                                    id="wdt-accordion-and-toggle-13ed1df9">
                                    <div class="wdt-accordion-toggle-wrapper">
                                      <div class="wdt-accordion-toggle-title-holder">
                                        <div class="wdt-accordion-toggle-title">Support & Resources</div>
                                        <div class="wdt-accordion-toggle-icon">
                                          <div class="wdt-accordion-toggle-icon-expand"><i aria-hidden="true"
                                              class="fas fa-plus"></i></div>
                                          <div class="wdt-accordion-toggle-icon-collapse"><i aria-hidden="true"
                                              class="fas fa-minus"></i></div>
                                        </div>
                                      </div>
                                      <div class="wdt-accordion-toggle-description">
                                        <div data-elementor-type="page" data-elementor-id="21829"
                                          class="elementor elementor-21829">
                                          <section
                                            class="elementor-section elementor-top-section elementor-element elementor-element-413f5f13 elementor-section-full_width elementor-section-height-default elementor-section-height-default">
                                            <div class="elementor-container elementor-column-gap-no">
                                              <div
                                                class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-57f9f0f0">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-3280d60c elementor-list-item-link-inline elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list">
                                                    <div class="elementor-widget-container">
                                                      <ul class="elementor-icon-list-items">
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/support/documentation/">
                                                            <span class="elementor-icon-list-text">Documentation</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/support/help-center/">
                                                            <span class="elementor-icon-list-text">Help Center</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/support/tutorials/">
                                                            <span class="elementor-icon-list-text">Video
                                                              Tutorials</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/support/faq/">
                                                            <span class="elementor-icon-list-text">FAQ</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/contact/">
                                                            <span class="elementor-icon-list-text">Contact
                                                              Support</span>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Company Column -->
                          <div
                            class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-7a28ce7e">
                            <div class="elementor-widget-wrap elementor-element-populated">
                              <div
                                class="elementor-element elementor-element-4dbd85ac center elementor-widget elementor-widget-wdt-accordion-and-toggle">
                                <div class="elementor-widget-container">
                                  <div
                                    class="wdt-accordion-toggle-holder wdt-module-toggle wdt-template-default wdt-expand-collapse-position-end"
                                    id="wdt-accordion-and-toggle-4dbd85ac">
                                    <div class="wdt-accordion-toggle-wrapper">
                                      <div class="wdt-accordion-toggle-title-holder">
                                        <div class="wdt-accordion-toggle-title">Company</div>
                                        <div class="wdt-accordion-toggle-icon">
                                          <div class="wdt-accordion-toggle-icon-expand"><i aria-hidden="true"
                                              class="fas fa-plus"></i></div>
                                          <div class="wdt-accordion-toggle-icon-collapse"><i aria-hidden="true"
                                              class="fas fa-minus"></i></div>
                                        </div>
                                      </div>
                                      <div class="wdt-accordion-toggle-description">
                                        <div data-elementor-type="page" data-elementor-id="21830"
                                          class="elementor elementor-21830">
                                          <section
                                            class="elementor-section elementor-top-section elementor-element elementor-element-64d54868 elementor-section-full_width elementor-section-height-default elementor-section-height-default">
                                            <div class="elementor-container elementor-column-gap-no">
                                              <div
                                                class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-783bb8e2">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                  <div
                                                    class="elementor-element elementor-element-4fdeffeb elementor-list-item-link-inline elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list">
                                                    <div class="elementor-widget-container">
                                                      <ul class="elementor-icon-list-items">
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/about-us/">
                                                            <span class="elementor-icon-list-text">About
                                                              AcademixSuite</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/pricing/">
                                                            <span class="elementor-icon-list-text">Pricing Plans</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/careers/">
                                                            <span class="elementor-icon-list-text">Careers</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/blog/">
                                                            <span class="elementor-icon-list-text">Blog &
                                                              Insights</span>
                                                          </a>
                                                        </li>
                                                        <li class="elementor-icon-list-item">
                                                          <a href="/partners/">
                                                            <span class="elementor-icon-list-text">Partners
                                                              Program</span>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                      <section
                        class="elementor-section elementor-inner-section elementor-element elementor-element-42288aa6 elementor-section-full_width elementor-reverse-tablet elementor-reverse-mobile_extra elementor-reverse-mobile elementor-section-height-default elementor-section-height-default">
                        <div class="elementor-container elementor-column-gap-no">
                          <!-- Left Column: Logo and Legal -->
                          <div
                            class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-65274345">
                            <div class="elementor-widget-wrap elementor-element-populated">
                              <!-- Logo -->
                              <div
                                class="elementor-element elementor-element-66ac1906 elementor-widget elementor-widget-wdt-logo">
                                <div class="elementor-widget-container">
                                  <div id="lizza-66ac1906" class="wdt-logo-container">
                                    <a href="/" rel="home">
                                      <img src="wp-content/themes/lizza-lms/assets/images/light-logo.png"
                                        alt="AcademixSuite - School Management Platform">
                                    </a>
                                  </div>
                                </div>
                              </div>

                              <!-- Legal Links -->
                              <div
                                class="elementor-element elementor-element-9768649 elementor-list-item-link-inline elementor-icon-list--layout-inline elementor-widget elementor-widget-icon-list">
                                <div class="elementor-widget-container">
                                  <ul class="elementor-icon-list-items elementor-inline-items">
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <a href="/legal/terms/">
                                        <span class="elementor-icon-list-text">Terms of Service</span>
                                      </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <a href="/legal/privacy/">
                                        <span class="elementor-icon-list-text">Privacy Policy</span>
                                      </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <a href="/legal/data-security/">
                                        <span class="elementor-icon-list-text">Data Security</span>
                                      </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <a href="/legal/cookies/">
                                        <span class="elementor-icon-list-text">Cookie Policy</span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>

                              <!-- Copyright -->
                              <div
                                class="elementor-element elementor-element-46daef4f elementor-icon-list--layout-inline elementor-align-left elementor-mobile_extra-align-left elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list">
                                <div class="elementor-widget-container">
                                  <ul class="elementor-icon-list-items elementor-inline-items">
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <span class="elementor-icon-list-text">© 2024</span>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <a href="/">
                                        <span class="elementor-icon-list-text">AcademixSuite.</span>
                                      </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                      <span class="elementor-icon-list-text">All rights reserved</span>
                                    </li>
                                  </ul>
                                  <p style="margin-top: 10px; font-size: 12px; color: #888;">
                                    A comprehensive school management platform for educational institutions worldwide.
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Right Column: Newsletter -->
                          <div
                            class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-2d4b6e57">
                            <div class="elementor-widget-wrap elementor-element-populated">
                              <!-- Newsletter Title -->
                              <div
                                class="elementor-element elementor-element-5a23a825 start elementor-widget__width-initial elementor-widget elementor-widget-wdt-heading">
                                <div class="elementor-widget-container">
                                  <div class="wdt-heading-holder" id="wdt-heading-5a23a825">
                                    <h5
                                      class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper">
                                      <span class="wdt-heading-title">Stay Updated</span>
                                    </h5>
                                  </div>
                                </div>
                              </div>

                              <!-- Newsletter Description -->
                              <div
                                class="elementor-element elementor-element-2f5d98f3 elementor-widget__width-initial wdt-text-link-1 elementor-widget elementor-widget-text-editor">
                                <div class="elementor-widget-container">
                                  <p>
                                    Get the latest updates on school management trends, platform features, and
                                    educational technology insights delivered to your inbox.
                                    <br>
                                    <small>By subscribing, you agree to our <a href="/legal/privacy/">Privacy
                                        Policy</a>.</small>
                                  </p>
                                </div>
                              </div>

                              <!-- Newsletter Form -->
                              <div
                                class="elementor-element elementor-element-502b5cad elementor-widget__width-initial center elementor-widget elementor-widget-wdt-mailchimp">
                                <div class="elementor-widget-container">
                                  <div class="wdt-mailchimp-holder wdt-template-type3" id="wdt-mailchimp-502b5cad">
                                    <div class="wdt-mailchimp-wrapper">
                                      <form class="wdt-mailchimp-subscribe-form with-btn-text"
                                        name="mailchimpSubscribeForm" action="#" method="post">
                                        <input type="email" name="wdt_mc_emailid" required="required"
                                          placeholder="Enter your email address" value="">
                                        <input type="hidden" name="wdt_mc_listid" value="">
                                        <div class="wdt-mailchimp-subscription-button-holder">
                                          <button type="submit" name="wdt_mc_submit">
                                            <span>Subscribe</span>
                                          </button>
                                        </div>
                                      </form>
                                      <div class="wdt-mailchimp-subscription-msg"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Contact Info -->
                              <div
                                class="elementor-element elementor-element-contact-info elementor-widget elementor-widget-text-editor"
                                style="margin-top: 20px;">
                                <div class="elementor-widget-container">
                                  <p style="font-size: 14px; color: #aaa;">
                                    <strong>Contact:</strong> <a
                                      href="mailto:support@academixsuite.com">support@academixsuite.com</a> |
                                    <strong>Sales:</strong> <a
                                      href="mailto:sales@academixsuite.com">sales@academixsuite.com</a>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </footer>
      <!-- **Footer - End** -->
    </div>
    <!-- **Inner Wrapper - End** -->
  </div>
  <!-- **Wrapper - End** -->

  <script type="speculationrules">
    {
        "prefetch": [
          {
            "source": "document",
            "where": {
              "and": [
                { "href_matches": "\/lms\/*" },
                {
                  "not": {
                    "href_matches": [
                      "\/lms\/wp-*.php",
                      "\/lms\/wp-admin\/*",
                      "\/lms\/wp-content\/uploads\/sites\/12\/*",
                      "\/lms\/wp-content\/*",
                      "\/lms\/wp-content\/plugins\/*",
                      "\/lms\/wp-content\/themes\/lizza-lms\/*",
                      "\/lms\/*\\?(.+)"
                    ]
                  }
                },
                { "not": { "selector_matches": "a[rel~=\"nofollow\"]" } },
                {
                  "not": { "selector_matches": ".no-prefetch, .no-prefetch a" }
                }
              ]
            },
            "eagerness": "conservative"
          }
        ]
      }
    </script>
  <script type="text/javascript">
    const lazyloadRunObserver = () => {
      const lazyloadBackgrounds = document.querySelectorAll(
        `.e-con.e-parent:not(.e-lazyloaded)`,
      );
      const lazyloadBackgroundObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              let lazyloadBackground = entry.target;
              if (lazyloadBackground) {
                lazyloadBackground.classList.add("e-lazyloaded");
              }
              lazyloadBackgroundObserver.unobserve(entry.target);
            }
          });
        }, {
          rootMargin: "200px 0px 200px 0px"
        },
      );
      lazyloadBackgrounds.forEach((lazyloadBackground) => {
        lazyloadBackgroundObserver.observe(lazyloadBackground);
      });
    };
    const events = ["DOMContentLoaded", "elementor/lazyload/observe"];
    events.forEach((event) => {
      document.addEventListener(event, lazyloadRunObserver);
    });
  </script>
  <script type="text/javascript">
    (function() {
      var c = document.body.className;
      c = c.replace(/woocommerce-no-js/, "woocommerce-js");
      document.body.className = c;
    })();
  </script>
  <link rel="stylesheet" id="wc-blocks-style-css"
    href="wp-content/plugins/woocommerce/assets/client/blocks/wc-blocks.css?ver=wc-9.1.4" type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-22685-css"
    href="wp-content/uploads/sites/12/elementor/css/post-22685.css?ver=1729595947" type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-21678-css"
    href="wp-content/uploads/sites/12/elementor/css/post-21678.css?ver=1729595948" type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-21648-css"
    href="wp-content/uploads/sites/12/elementor/css/post-21648.css?ver=1729595948" type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-elementor-icons-css"
    href="wp-content/uploads/sites/12/elementor/css/custom-widget-icon-list.min.css?ver=6.8.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="elementor-post-1090-css"
    href="wp-content/uploads/sites/12/elementor/css/post-1090.css?ver=1729595948" type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-logo-css"
    href="wp-content/plugins/lizza-lms-plus/modules/menu/elementor/widgets/assets/css/logo.css?ver=1.0.2"
    type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-icons-fa-regular-css"
    href="wp-content/plugins/elementor/assets/lib/font-awesome/css/regular.min.css?ver=5.15.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="elementor-icons-fa-brands-css"
    href="wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min.css?ver=5.15.3" type="text/css"
    media="all" />
  <link rel="stylesheet" id="wdt-header-icons-css"
    href="wp-content/plugins/lizza-lms-plus/modules/menu/elementor/widgets/assets/css/header-icons.css?ver=1.0.2"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-header-carticons-css"
    href="wp-content/plugins/lizza-lms-plus/modules/menu/elementor/widgets/assets/css/header-carticon.css?ver=1.0.2"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-button-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/button/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-1175-css"
    href="wp-content/uploads/sites/12/elementor/css/post-1175.css?ver=1729595948" type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-heading-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/heading/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="jquery.magnific-popup-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/popup-box/assets/css/jquery.magnific-popup.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-popup-box-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/popup-box/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-column-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/common-controls/layout/assets/css/column.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-repeater-content-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/common-controls/repeater-contents/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-icon-box-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/icon-box/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <style id="wdt-icon-box-inline-css" type="text/css">
    @media only screen and (min-width: 481px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (min-width: 481px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (min-width: 481px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (min-width: 481px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (min-width: 481px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (min-width: 481px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-icon-box-2cd9207 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (min-width: 481px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-icon-box-93d9fd9 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (min-width: 481px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-icon-box-0ed3383 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (min-width: 481px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-icon-box-beb0c9f .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (min-width: 481px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-icon-box-d497f50 .wdt-column {
        width: 100%;
      }
    }
  </style>
  <link rel="stylesheet" id="wdt-counter-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/counter/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <style id="wdt-counter-inline-css" type="text/css">
    @media only screen and (min-width: 481px) {
      #wdt-counter-068f117 .wdt-column {
        width: 50%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-counter-068f117 .wdt-column {
        width: 50%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-counter-068f117 .wdt-column {
        width: 50%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-counter-068f117 .wdt-column {
        width: 50%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-counter-068f117 .wdt-column {
        width: 50%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-counter-068f117 .wdt-column {
        width: 100%;
      }
    }

    @media only screen and (min-width: 481px) {
      #wdt-counter-068f117 .wdt-column {
        width: 50%;
      }
    }

    @media only screen and (max-width: 1540px) {
      #wdt-counter-068f117 .wdt-column {
        width: 50%;
      }
    }

    @media only screen and (max-width: 1280px) {
      #wdt-counter-068f117 .wdt-column {
        width: 50%;
      }
    }

    @media only screen and (max-width: 1024px) {
      #wdt-counter-068f117 .wdt-column {
        width: 50%;
      }
    }

    @media only screen and (max-width: 767px) {
      #wdt-counter-068f117 .wdt-column {
        width: 50%;
      }
    }

    @media only screen and (max-width: 480px) {
      #wdt-counter-068f117 .wdt-column {
        width: 100%;
      }
    }
  </style>
  <link rel="stylesheet" id="elementor-post-21726-css"
    href="wp-content/uploads/sites/12/elementor/css/post-21726.css?ver=1729595949" type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-pricing-table-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/pricing-table/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-21736-css"
    href="wp-content/uploads/sites/12/elementor/css/post-21736.css?ver=1729595949" type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-tabs-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/tabs/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-blogcarousel-css"
    href="wp-content/plugins/lizza-lms-plus/modules/blog/elementor/widgets/assets/css/blogcarousel.css?ver=1.0.2"
    type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-21989-css"
    href="wp-content/uploads/sites/12/elementor/css/post-21989.css?ver=1729595949" type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-21996-css"
    href="wp-content/uploads/sites/12/elementor/css/post-21996.css?ver=1729595950" type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-22005-css"
    href="wp-content/uploads/sites/12/elementor/css/post-22005.css?ver=1729595950" type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-22007-css"
    href="wp-content/uploads/sites/12/elementor/css/post-22007.css?ver=1729595950" type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-22011-css"
    href="wp-content/uploads/sites/12/elementor/css/post-22011.css?ver=1729595950" type="text/css" media="all" />
  <link rel="stylesheet" id="jquery-swiper-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/common-controls/layout/assets/css/swiper.min.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-carousel-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/common-controls/layout/assets/css/carousel.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-advanced-carousel-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/advanced-carousel/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-22519-css"
    href="wp-content/uploads/sites/12/elementor/css/post-22519.css?ver=1729595950" type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-mailchimp-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/mailchimp/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-58-css"
    href="wp-content/uploads/sites/12/elementor/css/post-58.css?ver=1729595952" type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-21828-css"
    href="wp-content/uploads/sites/12/elementor/css/post-21828.css?ver=1729595952" type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-accordion-and-toggle-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/accordion-and-toggle/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-21829-css"
    href="wp-content/uploads/sites/12/elementor/css/post-21829.css?ver=1729595952" type="text/css" media="all" />
  <link rel="stylesheet" id="elementor-post-21830-css"
    href="wp-content/uploads/sites/12/elementor/css/post-21830.css?ver=1729595952" type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-elementor-sections-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/core/sections/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-elementor-columns-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/core/columns/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-elementor-widgets-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/core/widgets/assets/css/style.css?ver=1.0.0"
    type="text/css" media="all" />
  <link rel="stylesheet" id="wdt-e-animations-css"
    href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/assets/css/animations.min.css?ver=1.0.0"
    type="text/css" media="all" />
  <script type="text/javascript" src="wp-includes/js/dist/hooks.min.js?ver=4d63a3d491d11ffd8ac6"
    id="wp-hooks-js"></script>
  <script type="text/javascript" src="wp-includes/js/dist/i18n.min.js?ver=5e580eb46a90c2b997e6"
    id="wp-i18n-js"></script>
  <script type="text/javascript" id="wp-i18n-js-after">
    /* <![CDATA[ */
    wp.i18n.setLocaleData({
      "text direction\u0004ltr": ["ltr"]
    });
    /* ]]> */
  </script>
  <script type="text/javascript" src="wp-content/plugins/contact-form-7/includes/swv/js/.js?ver=6.1.1"
    id="swv-js"></script>
  <script type="text/javascript" id="contact-form-7-js-before">
    /* <![CDATA[ */
    var wpcf7 = {
      api: {
        root: "https:\/\/lizza.wpengine.com\/lms\/wp-json\/",
        namespace: "contact-form-7\/v1",
      },
      cached: 1,
    };
    /* ]]> */
  </script>
  <script type="text/javascript" src="wp-content/plugins/contact-form-7/includes/js/.js?ver=6.1.1"
    id="contact-form-7-js"></script>
  <script type="text/javascript" id="wdt-elementor-addon-core-js-extra">
    /* <![CDATA[ */
    var wdtElementorAddonGlobals = {
      ajaxUrl: "https:\/\/lizza.wpengine.com\/lms\/wp-admin\/admin-ajax.php",
    };
    /* ]]> */
  </script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/assets/js/core.js?ver=1.0.0"
    id="wdt-elementor-addon-core-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/woocommerce/assets/js/sourcebuster/sourcebuster.min.js?ver=9.1.4"
    id="sourcebuster-js-js"></script>
  <script type="text/javascript" id="wc-order-attribution-js-extra">
    /* <![CDATA[ */
    var wc_order_attribution = {
      params: {
        lifetime: 1.0e-5,
        session: 30,
        base64: false,
        ajaxurl: "https:\/\/lizza.wpengine.com\/lms\/wp-admin\/admin-ajax.php",
        prefix: "wc_order_attribution_",
        allowTracking: true,
      },
      fields: {
        source_type: "current.typ",
        referrer: "current_add.rf",
        utm_campaign: "current.cmp",
        utm_source: "current.src",
        utm_medium: "current.mdm",
        utm_content: "current.cnt",
        utm_id: "current.id",
        utm_term: "current.trm",
        utm_source_platform: "current.plt",
        utm_creative_format: "current.fmt",
        utm_marketing_tactic: "current.tct",
        session_entry: "current_add.ep",
        session_start_time: "current_add.fd",
        session_pages: "session.pgs",
        session_count: "udata.vst",
        user_agent: "udata.uag",
      },
    };
    /* ]]> */
  </script>
  <script type="text/javascript"
    src="wp-content/plugins/woocommerce/assets/js/frontend/order-attribution.min.js?ver=9.1.4"
    id="wc-order-attribution-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-pro/modules/woocommerce/listings/elementor/widgets/products/assets/js/swiper.min.js?ver=6.8.3"
    id="jquery-swiper-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/js/isotope.pkgd.min.js?ver=6.8.3"
    id="isotope-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/js/matchHeight.js?ver=6.8.3"
    id="matchheight-js"></script>
  <script type="text/javascript" id="wdt-common-js-extra">
    /* <![CDATA[ */
    var wdtcommonobject = {
      ajaxurl: "https:\/\/lizza.wpengine.com\/lms\/wp-admin\/admin-ajax.php",
      noResult: "No Results Found!",
    };
    var wdtcommonobject = {
      ajaxurl: "https:\/\/lizza.wpengine.com\/lms\/wp-admin\/admin-ajax.php",
      noResult: "No Results Found!",
    };
    /* ]]> */
  </script>
  <script type="text/javascript" src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/js/common.js?ver=6.8.3"
    id="wdt-common-js"></script>
  <script type="text/javascript" id="wdt-frontend-js-extra">
    /* <![CDATA[ */
    var wdtfrontendobject = {
      pluginFolderPath: "https:\/\/lizza.wpengine.com\/lms\/wp-content\/plugins\/",
      pluginPath: "https:\/\/lizza.wpengine.com\/lms\/wp-content\/plugins\/lizza-lms-wedesigntech-portfolio\/",
      ajaxurl: "https:\/\/lizza.wpengine.com\/lms\/wp-admin\/admin-ajax.php",
      purchased: "<p>Purchased<\/p>",
      somethingWentWrong: "<p>Something Went Wrong<\/p>",
      outputDivAlert: "Please make sure you have added output shortcode.",
      printerTitle: "Portfolio Printer",
      pleaseLogin: "Please login",
      noMorePosts: "No more posts to load!",
      elementorPreviewMode: "",
      primaryColor: "#1e306e",
      secondaryColor: "#2fa5fb",
      tertiaryColor: "#d2edf8",
    };
    var wdtfrontendobject = {
      pluginFolderPath: "https:\/\/lizza.wpengine.com\/lms\/wp-content\/plugins\/",
      pluginPath: "https:\/\/lizza.wpengine.com\/lms\/wp-content\/plugins\/lizza-lms-wedesigntech-portfolio\/",
      ajaxurl: "https:\/\/lizza.wpengine.com\/lms\/wp-admin\/admin-ajax.php",
      purchased: "<p>Purchased<\/p>",
      somethingWentWrong: "<p>Something Went Wrong<\/p>",
      outputDivAlert: "Please make sure you have added output shortcode.",
      printerTitle: "Portfolio Printer",
      pleaseLogin: "Please login",
      noMorePosts: "No more posts to load!",
      elementorPreviewMode: "",
      primaryColor: "#1e306e",
      secondaryColor: "#2fa5fb",
      tertiaryColor: "#d2edf8",
    };
    /* ]]> */
  </script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/js/frontend.js?ver=6.8.3"
    id="wdt-frontend-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/social-share/assets/frontend.js?ver=6.8.3"
    id="wdt-social-share-frontend-js"></script>
  <script type="text/javascript" src="wp-includes/js/jquery/ui/core.min.js?ver=1.13.3" id="jquery-ui-core-js"></script>
  <script type="text/javascript" src="wp-includes/js/jquery/ui/mouse.min.js?ver=1.13.3"
    id="jquery-ui-mouse-js"></script>
  <script type="text/javascript" src="wp-includes/js/jquery/ui/slider.min.js?ver=1.13.3"
    id="jquery-ui-slider-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/js/chosen.jquery.min.js?ver=6.8.3"
    id="chosen-js"></script>
  <script type="text/javascript" src="wp-includes/js/jquery/ui/datepicker.min.js?ver=1.13.3"
    id="jquery-ui-datepicker-js"></script>
  <script type="text/javascript" id="jquery-ui-datepicker-js-after">
    /* <![CDATA[ */
    jQuery(function(jQuery) {
      jQuery.datepicker.setDefaults({
        closeText: "Close",
        currentText: "Today",
        monthNames: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        monthNamesShort: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        nextText: "Next",
        prevText: "Previous",
        dayNames: [
          "Sunday",
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
        ],
        dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        dayNamesMin: ["S", "M", "T", "W", "T", "F", "S"],
        dateFormat: "MM d, yy",
        firstDay: 1,
        isRTL: false,
      });
    });
    /* ]]> */
  </script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/search/assets/frontend.js?ver=6.8.3"
    id="wdt-search-frontend-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/media-images/assets/frontend.js?ver=6.8.3"
    id="wdt-media-images-frontend-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/comments/assets/common.js?ver=6.8.3"
    id="wdt-comments-common-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/js/single-page.js?ver=6.8.3"
    id="wdt-modules-singlepage-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/comments/assets/frontend.js?ver=6.8.3"
    id="wdt-comments-frontend-js"></script>
  <script type="text/javascript" src="wp-content/themes/lizza-lms/assets/lib/select2/select2.full.js?ver=6.8.3"
    id="jquery-select2-js"></script>
  <script type="text/javascript" id="post-infinite-js-extra">
    /* <![CDATA[ */
    var lizza_lms_urls = {
      ajaxurl: "https:\/\/lizza.wpengine.com\/lms\/wp-admin\/admin-ajax.php",
    };
    /* ]]> */
  </script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-plus/modules/blog/assets/js/post-infinite.js?ver=1.0.2"
    id="post-infinite-js"></script>
  <script type="text/javascript" id="post-loadmore-js-extra">
    /* <![CDATA[ */
    var lizza_lms_urls = {
      ajaxurl: "https:\/\/lizza.wpengine.com\/lms\/wp-admin\/admin-ajax.php",
    };
    /* ]]> */
  </script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-plus/modules/blog/assets/js/post-loadmore.js?ver=1.0.2"
    id="post-loadmore-js"></script>
  <script type="text/javascript" src="wp-content/plugins/lizza-lms-plus/modules/menu/assets/js/mega-menu.js?ver=1.0.2"
    id="dtplugin-mega-menu-js"></script>
  <script type="text/javascript" src="wp-content/plugins/lizza-lms-pro/modules/auth/assets/js/script.js?ver=1.0.0"
    id="lizza-pro-auth-js"></script>
  <script type="text/javascript" src="wp-content/plugins/lizza-lms-pro/modules/post/assets/js/comment-form.js?ver=1.0.0"
    id="comment-form-js"></script>
  <script type="text/javascript" src="wp-content/themes/lizza-lms/modules/blog/assets/js/isotope.pkgd.js?ver=6.8.3"
    id="isotope-pkgd-js"></script>
  <script type="text/javascript" src="wp-content/themes/lizza-lms/modules/blog/assets/js/jquery.bxslider.js?ver=6.8.3"
    id="jquery-bxslider-js"></script>
  <script type="text/javascript" src="wp-content/themes/lizza-lms/modules/blog/assets/js/jquery.fitvids.js?ver=6.8.3"
    id="jquery-fitvids-js"></script>
  <script type="text/javascript"
    src="wp-content/themes/lizza-lms/modules/blog/assets/js/jquery.debouncedresize.js?ver=6.8.3"
    id="jquery-debouncedresize-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/js/jquery.magnific-popup.min.js?ver=6.8.3"
    id="jquery-magnific-popup-js"></script>
  <script type="text/javascript" src="wp-content/themes/lizza-lms/assets/js/custom.js?ver=6.8.3"
    id="lizza-jqcustom-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-pro/modules/woocommerce/single/modules/custom-template/elementor/assets/js/jquery.nicescroll.js?ver=6.8.3"
    id="jquery-nicescroll-js"></script>
  <script type="text/javascript" id="lizza-woo-cart-notification-js-after">
    /* <![CDATA[ */
    jQuery.noConflict();

    jQuery(document).ready(function($) {
      "use strict";

      // After adding product to cart
      $("body").on("added_to_cart", function(e) {
        if ($(".wdt-shop-cart-widget").hasClass("activate-sidebar-widget")) {
          $(".wdt-shop-cart-widget").addClass("wdt-shop-cart-widget-active");
          $(".wdt-shop-cart-widget-overlay").addClass(
            "wdt-shop-cart-widget-active",
          );

          // Nice scroll script

          var winHeight = $(window).height();
          var headerHeight = $(".wdt-shop-cart-widget-header").height();
          var footerHeight = $(".woocommerce-mini-cart-footer").height();

          var height = parseInt(winHeight - headerHeight - footerHeight, 10);

          $(".wdt-shop-cart-widget-content").height(height).niceScroll({
            cursorcolor: "#000",
            cursorwidth: "5px",
            background: "rgba(20,20,20,0.3)",
            cursorborder: "none",
          });
        }

        if ($(".wdt-shop-cart-widget").hasClass("cart-notification-widget")) {
          $(".wdt-shop-cart-widget").addClass("wdt-shop-cart-widget-active");
          $(".wdt-shop-cart-widget-overlay").addClass(
            "wdt-shop-cart-widget-active",
          );
          setTimeout(function() {
            $(".wdt-shop-cart-widget").removeClass(
              "wdt-shop-cart-widget-active",
            );
            $(".wdt-shop-cart-widget-overlay").removeClass(
              "wdt-shop-cart-widget-active",
            );
          }, 2400);
        }

        e.preventDefault();
      });

      $("body").on(
        "click",
        ".wdt-shop-cart-widget-close-button, .wdt-shop-cart-widget-overlay",
        function(e) {
          $(".wdt-shop-cart-widget").removeClass(
            "wdt-shop-cart-widget-active",
          );
          $(".wdt-shop-cart-widget-overlay").removeClass(
            "wdt-shop-cart-widget-active",
          );
          e.preventDefault();
        },
      );
    });
    /* ]]> */
  </script>
  <script type="text/javascript" id="lizza-woo-quantity-plus-minus-js-after">
    /* <![CDATA[ */
    jQuery.noConflict();

    jQuery(document).ready(function($) {
      "use strict";

      // Quatity plus & minus button

      jQuery("body").delegate(
        ".quantity .plus, .quantity .minus",
        "click",
        function(e) {
          var $qty = $(this).closest(".quantity").find(".qty"),
            currentVal = parseFloat($qty.val()),
            max = parseFloat($qty.attr("max")),
            min = parseFloat($qty.attr("min")),
            step = $qty.attr("step");

          if (!currentVal || currentVal === "" || currentVal === "NaN")
            currentVal = 0;
          if (max === "" || max === "NaN") max = "";
          if (min === "" || min === "NaN") min = 0;
          if (
            step === "any" ||
            step === "" ||
            step === undefined ||
            parseFloat(step) === "NaN"
          )
            step = "1";

          if ($(this).is(".plus")) {
            if (max && currentVal >= max) {
              $qty.val(max);
            } else {
              $qty.val(currentVal + parseFloat(step));
            }
          } else {
            if (min && currentVal <= min) {
              $qty.val(min);
            } else if (currentVal > 0) {
              $qty.val(currentVal - parseFloat(step));
            }
          }

          $qty.trigger("change");

          e.preventDefault();
        },
      );
    });
    /* ]]> */
  </script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-plus/modules/site-loader/assets/js/site-loader.js?ver=1.0.2"
    id="site-loader-js"></script>
  <script type="text/javascript" src="wp-includes/js/jquery/ui/sortable.min.js?ver=1.13.3"
    id="jquery-ui-sortable-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.donutchart.js?ver=6.8.3"
    id="donutchart-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.knob.js?ver=6.8.3"
    id="dtlms-knob-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.knob.custom.js?ver=6.8.3"
    id="dtlms-knob-custom-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.print.js?ver=6.8.3"
    id="dtlms-print-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.nicescroll.min.js?ver=6.8.3"
    id="nicescroll-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.tabs.min.js?ver=6.8.3"
    id="dtlms-tabs-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.inview.js?ver=6.8.3" id="inview-js"></script>
  <script type="text/javascript" src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/swiper.min.js?ver=6.8.3"
    id="swiper-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.sticky.js?ver=6.8.3" id="sticky-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.downCount.js?ver=6.8.3"
    id="downcount-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/isotope.pkgd.min.js?ver=6.8.3"
    id="isotope-3.0.5-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.scrolltabs.js?ver=6.8.3"
    id="scrolltab-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.mousewheel.js?ver=6.8.3"
    id="mousewheel-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/login-logout.js?ver=6.8.3"
    id="dtlms-login-logout-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/jquery.toggle.click.js?ver=6.8.3"
    id="dtlms-toggle-click-js"></script>
  <script type="text/javascript" id="dtlms-common-js-extra">
    /* <![CDATA[ */
    var lmscommonobject = {
      ajaxurl: "https:\/\/lizza.wpengine.com\/lms\/wp-admin\/admin-ajax.php",
      noResult: "No Results Found!",
      elementorPreviewMode: "",
    };
    /* ]]> */
  </script>
  <script type="text/javascript" src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/common.js?ver=6.8.3"
    id="dtlms-common-js"></script>
  <script type="text/javascript" id="dtlms-frontend-js-extra">
    /* <![CDATA[ */
    var lmsfrontendobject = {
      ajaxurl: "https:\/\/lizza.wpengine.com\/lms\/wp-admin\/admin-ajax.php",
      noGraph: "No enough data to generate graph!",
      onRefreshCurriculum: "Would you like to abort this quiz session, which will mark this session as completed ?.",
      locationAlert1: "To get GPS location please fill address.",
      locationAlert2: "Please add latitude and longitude",
      submitCourse: "You can submit course only when you have completed all items in course.",
      submitClass: "You can submit class only when you have submitted all courses.",
      confirmRegistration: "Please confirm your registration to this class!",
      closedRegistration: "Regsitration Closed",
      primarColor: "rgb(124,255,119)",
      elementorPreviewMode: "",
    };
    /* ]]> */
  </script>
  <script type="text/javascript" src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/frontend.js?ver=6.8.3"
    id="dtlms-frontend-js"></script>
  <script type="text/javascript" id="dtlms-quiz-frontend-js-extra">
    /* <![CDATA[ */
    var lmsquizfrontendobject = {
      quizTimerForegroundColor: "rgb(20,69,47)",
      quizTimerBackgroundColor: "rgb(124,255,119)",
      quizTimeout: "Timeout!",
      onRefresh: "Refreshing this quiz page will mark this session as completed.",
    };
    /* ]]> */
  </script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/quiz/assets/frontend.js?ver=6.8.3"
    id="dtlms-quiz-frontend-js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key&ver=6.8.3"
    id="dtlms-google-map-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/class/assets/common.js?ver=6.8.3"
    id="dtlms-class-common-js"></script>
  <script type="text/javascript" id="dtlms-class-frontend-js-extra">
    /* <![CDATA[ */
    var lmsclassfrontendobject = {
      registrationSuccess: "You have successfully registered with our class!",
    };
    /* ]]> */
  </script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/class/assets/frontend.js?ver=6.8.3"
    id="dtlms-class-frontend-js"></script>
  <script type="text/javascript" id="dtlms-certificate-common-js-extra">
    /* <![CDATA[ */
    var lmscertificatecommonobject = {
      pluginPath: "https:\/\/lizza.wpengine.com\/lms\/wp-content\/plugins\/lizza-wedesigntech-lms-addon\/modules\/certificate\/",
      printerTitle: "Certificate Printer",
    };
    /* ]]> */
  </script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/certificate/assets/common.js?ver=6.8.3"
    id="dtlms-certificate-common-js"></script>
  <script type="text/javascript" id="dtlms-assignment-frontend-js-extra">
    /* <![CDATA[ */
    var lmsassignmentobject = {
      assignmentNotification: "Please make sure required fields are filled.",
    };
    /* ]]> */
  </script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/assignment/assets/frontend.js?ver=6.8.3"
    id="dtlms-assignment-frontend-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-plus/modules/menu/elementor/widgets/assets/js/header-icons.js?ver=1.0.2"
    id="wdt-header-icons-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/heading/assets/js/script.js?ver=6.8.3"
    id="wdt-heading-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/popup-box/assets/js/jquery.cookie.min.js?ver=6.8.3"
    id="jquery.cookie-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/popup-box/assets/js/jquery.magnific-popup.min.js?ver=6.8.3"
    id="jquery.magnific-popup-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/popup-box/assets/js/script.js?ver=6.8.3"
    id="wdt-popup-box-js"></script>
  <script type="text/javascript"
    src="https://lizza.wpengine.com/lms/wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/common-controls/layout/assets/js/column.js?ver=6.8.3"
    id="wdt-column-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/counter/assets/js/jquery.countTo.js?ver=6.8.3"
    id="jquery-countTo-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/counter/assets/js/script.js?ver=6.8.3"
    id="wdt-counter-js"></script>
  <script type="text/javascript" src="wp-includes/js/jquery/ui/tabs.min.js?ver=1.13.3" id="jquery-ui-tabs-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/tabs/assets/js/jquery.scrolltabs.min.js?ver=6.8.3"
    id="jquery.scrolltabs-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/tabs/assets/js/script.js?ver=6.8.3"
    id="wdt-tabs-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-plus/modules/blog/elementor/widgets/assets/js/blogcarousel.js?ver=1.0.2"
    id="wdt-blogcarousel-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/common-controls/layout/assets/js/carousel.js?ver=6.8.3"
    id="wdt-carousel-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/mailchimp/assets/js/script.js?ver=6.8.3"
    id="wdt-mailchimp-js"></script>
  <script type="text/javascript" src="wp-includes/js/jquery/ui/accordion.min.js?ver=1.13.3"
    id="jquery-ui-accordion-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/widgets/accordion-and-toggle/assets/js/script.js?ver=6.8.3"
    id="wdt-accordion-and-toggle-js"></script>
  <script type="text/javascript" src="wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.23.3"
    id="elementor-webpack-runtime-js"></script>
  <script type="text/javascript" src="wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.23.3"
    id="elementor-frontend-modules-js"></script>
  <script type="text/javascript" src="wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2"
    id="elementor-waypoints-js"></script>
  <script type="text/javascript" id="elementor-frontend-js-before">
    /* <![CDATA[ */
    var elementorFrontendConfig = {
      environmentMode: {
        edit: false,
        wpPreview: false,
        isScriptDebug: false,
      },
      i18n: {
        shareOnFacebook: "Share on Facebook",
        shareOnTwitter: "Share on Twitter",
        pinIt: "Pin it",
        download: "Download",
        downloadImage: "Download image",
        fullscreen: "Fullscreen",
        zoom: "Zoom",
        share: "Share",
        playVideo: "Play Video",
        previous: "Previous",
        next: "Next",
        close: "Close",
        a11yCarouselWrapperAriaLabel: "Carousel | Horizontal scrolling: Arrow Left & Right",
        a11yCarouselPrevSlideMessage: "Previous slide",
        a11yCarouselNextSlideMessage: "Next slide",
        a11yCarouselFirstSlideMessage: "This is the first slide",
        a11yCarouselLastSlideMessage: "This is the last slide",
        a11yCarouselPaginationBulletMessage: "Go to slide",
      },
      is_rtl: false,
      breakpoints: {
        xs: 0,
        sm: 480,
        md: 481,
        lg: 1025,
        xl: 1440,
        xxl: 1600
      },
      responsive: {
        breakpoints: {
          mobile: {
            label: "Mobile Portrait",
            value: 480,
            default_value: 767,
            direction: "max",
            is_enabled: true,
          },
          mobile_extra: {
            label: "Mobile Landscape",
            value: 767,
            default_value: 880,
            direction: "max",
            is_enabled: true,
          },
          tablet: {
            label: "Tablet Portrait",
            value: 1024,
            default_value: 1024,
            direction: "max",
            is_enabled: true,
          },
          tablet_extra: {
            label: "Tablet Landscape",
            value: 1280,
            default_value: 1200,
            direction: "max",
            is_enabled: true,
          },
          laptop: {
            label: "Laptop",
            value: 1540,
            default_value: 1366,
            direction: "max",
            is_enabled: true,
          },
          widescreen: {
            label: "Widescreen",
            value: 2400,
            default_value: 2400,
            direction: "min",
            is_enabled: false,
          },
        },
      },
      version: "3.23.3",
      is_static: false,
      experimentalFeatures: {
        e_optimized_css_loading: true,
        additional_custom_breakpoints: true,
        container_grid: true,
        e_swiper_latest: true,
        e_nested_atomic_repeaters: true,
        e_onboarding: true,
        home_screen: true,
        "ai-layout": true,
        "landing-pages": true,
        e_lazyload: true,
      },
      urls: {
        assets: "https:\/\/lizza.wpengine.com\/lms\/wp-content\/plugins\/elementor\/assets\/",
        ajaxurl: "https:\/\/lizza.wpengine.com\/lms\/wp-admin\/admin-ajax.php",
      },
      nonces: {
        floatingButtonsClickTracking: "94d20dc8d7"
      },
      swiperClass: "swiper",
      settings: {
        page: [],
        editorPreferences: []
      },
      kit: {
        active_breakpoints: [
          "viewport_mobile",
          "viewport_mobile_extra",
          "viewport_tablet",
          "viewport_tablet_extra",
          "viewport_laptop",
        ],
        viewport_mobile: 480,
        viewport_mobile_extra: 767,
        viewport_tablet_extra: 1280,
        viewport_laptop: 1540,
        global_image_lightbox: "yes",
        lightbox_enable_counter: "yes",
        lightbox_enable_fullscreen: "yes",
        lightbox_enable_zoom: "yes",
        lightbox_enable_share: "yes",
        lightbox_title_src: "title",
        lightbox_description_src: "description",
      },
      post: {
        id: 21714,
        title: "WP%20%E2%80%93%20Lizza%20Site",
        excerpt: "",
        featuredImage: false,
      },
    };
    /* ]]> */
  </script>
  <script type="text/javascript" src="wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.23.3"
    id="elementor-frontend-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/core/sections/assets/js/script.js?ver=1.0.0"
    id="wdt-elementor-sections-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/assets/js/parallax-scroll.min.js?ver=1.0.0"
    id="wdt-parallax-scroll-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/assets/js/parallax.min.js?ver=1.0.0"
    id="wdt-parallax-js"></script>
  <script type="text/javascript"
    src="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/inc/core/widgets/assets/js/script.js?ver=1.0.0"
    id="wdt-elementor-widgets-js"></script>
  <script type="text/javascript">
    document.tidioChatCode = "nxrqsr9kbqcc2jeymwva0ru2upazaf3l";
    (function() {
      function asyncLoad() {
        var tidioScript = document.createElement("script");
        tidioScript.type = "text/javascript";
        tidioScript.async = true;
        tidioScript.src =
          "//code.tidio.co/nxrqsr9kbqcc2jeymwva0ru2upazaf3l.js";
        document.body.appendChild(tidioScript);
      }
      if (window.attachEvent) {
        window.attachEvent("onload", asyncLoad);
      } else {
        window.addEventListener("load", asyncLoad, false);
      }
    })();
  </script>
</body>

</html>