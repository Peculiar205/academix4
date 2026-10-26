<!doctype html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="profile" href="https://gmpg.org/xfn/11" />

    <title>Academixsuite : A multi tenant school management software for mordern school.</title>
    <meta name="robots" content="max-image-preview:large" />
    <style>
      img:is([sizes="auto" i], [sizes^="auto," i]) {
        contain-intrinsic-size: 3000px 1500px;
      }
    </style>
    <link rel="dns-prefetch" href="//maps.googleapis.com" />
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link
      rel="alternate"
      type="application/rss+xml"
      title="Academixsuite.&raquo; Feed"
      href="feed/index
    />
    <link
      rel="alternate"
      type="application/rss+xml"
      title="Academixsuite.&raquo; Comments Feed"
      href="comments/feed/index
    />
    <script type="text/javascript">
      /* <![CDATA[ */
      window._wpemojiSettings = {
        baseUrl: "https:\/\/s.w.org\/images\/core\/emoji\/16.0.1\/72x72\/",
        ext: ".png",
        svgUrl: "https:\/\/s.w.org\/images\/core\/emoji\/16.0.1\/svg\/",
        svgExt: ".svg",
        source: {
          concatemoji:
            "https:\/\/lizza.wpengine.com\/lms\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.8.3",
        },
      };
      /*! This file is auto-generated */
      !(function (s, n) {
        var o, i, e;
        function c(e) {
          try {
            var t = { supportTests: e, timestamp: new Date().valueOf() };
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
          return t.every(function (e, t) {
            return e === a[t];
          });
        }
        function u(e, t) {
          (e.clearRect(0, 0, e.canvas.width, e.canvas.height),
            e.fillText(t, 0, 0));
          for (
            var n = e.getImageData(16, 16, 1, 1), a = 0;
            a < n.data.length;
            a++
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
              )
                ? !1
                : !n(
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
              self instanceof WorkerGlobalScope
                ? new OffscreenCanvas(300, 150)
                : s.createElement("canvas"),
            o = r.getContext("2d", { willReadFrequently: !0 }),
            i = ((o.textBaseline = "top"), (o.font = "600 32px Arial"), {});
          return (
            e.forEach(function (e) {
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
          (n.supports = { everything: !0, everythingExceptFlag: !0 }),
          (e = new Promise(function (e) {
            s.addEventListener("DOMContentLoaded", e, { once: !0 });
          })),
          new Promise(function (t) {
            var n = (function () {
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
                      "(" +
                      [
                        JSON.stringify(i),
                        f.toString(),
                        p.toString(),
                        u.toString(),
                      ].join(",") +
                      "));",
                    a = new Blob([e], { type: "text/javascript" }),
                    r = new Worker(URL.createObjectURL(a), {
                      name: "wpTestEmojiSupports",
                    });
                  return void (r.onmessage = function (e) {
                    (c((n = e.data)), r.terminate(), t(n));
                  });
                } catch (e) {}
              c((n = g(i, f, p, u)));
            }
            t(n);
          })
            .then(function (e) {
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
                (n.readyCallback = function () {
                  n.DOMReady = !0;
                }));
            })
            .then(function () {
              return e;
            })
            .then(function () {
              var e;
              n.supports.everything ||
                (n.readyCallback(),
                (e = n.source || {}).concatemoji
                  ? t(e.concatemoji)
                  : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)));
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
        --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(
          135deg,
          rgba(6, 147, 227, 1) 0%,
          rgb(155, 81, 224) 100%
        );
        --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(
          135deg,
          rgb(122, 220, 180) 0%,
          rgb(0, 208, 130) 100%
        );
        --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(
          135deg,
          rgba(252, 185, 0, 1) 0%,
          rgba(255, 105, 0, 1) 100%
        );
        --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(
          135deg,
          rgba(255, 105, 0, 1) 0%,
          rgb(207, 46, 46) 100%
        );
        --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(
          135deg,
          rgb(238, 238, 238) 0%,
          rgb(169, 184, 195) 100%
        );
        --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(
          135deg,
          rgb(74, 234, 220) 0%,
          rgb(151, 120, 209) 20%,
          rgb(207, 42, 186) 40%,
          rgb(238, 44, 130) 60%,
          rgb(251, 105, 98) 80%,
          rgb(254, 248, 76) 100%
        );
        --wp--preset--gradient--blush-light-purple: linear-gradient(
          135deg,
          rgb(255, 206, 236) 0%,
          rgb(152, 150, 240) 100%
        );
        --wp--preset--gradient--blush-bordeaux: linear-gradient(
          135deg,
          rgb(254, 205, 165) 0%,
          rgb(254, 45, 45) 50%,
          rgb(107, 0, 62) 100%
        );
        --wp--preset--gradient--luminous-dusk: linear-gradient(
          135deg,
          rgb(255, 203, 112) 0%,
          rgb(199, 81, 192) 50%,
          rgb(65, 88, 208) 100%
        );
        --wp--preset--gradient--pale-ocean: linear-gradient(
          135deg,
          rgb(255, 245, 203) 0%,
          rgb(182, 227, 212) 50%,
          rgb(51, 167, 181) 100%
        );
        --wp--preset--gradient--electric-grass: linear-gradient(
          135deg,
          rgb(202, 248, 128) 0%,
          rgb(113, 206, 126) 100%
        );
        --wp--preset--gradient--midnight: linear-gradient(
          135deg,
          rgb(2, 3, 129) 0%,
          rgb(40, 116, 252) 100%
        );
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
      .is-layout-flex > :is(*, div) {
        margin: 0;
      }
      body .is-layout-grid {
        display: grid;
      }
      .is-layout-grid > :is(*, div) {
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
        background-color: var(
          --wp--preset--color--luminous-vivid-orange
        ) !important;
      }
      .has-luminous-vivid-amber-background-color {
        background-color: var(
          --wp--preset--color--luminous-vivid-amber
        ) !important;
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
        border-color: var(
          --wp--preset--color--luminous-vivid-orange
        ) !important;
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
        background: var(
          --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple
        ) !important;
      }
      .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
        background: var(
          --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan
        ) !important;
      }
      .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
        background: var(
          --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange
        ) !important;
      }
      .has-luminous-vivid-orange-to-vivid-red-gradient-background {
        background: var(
          --wp--preset--gradient--luminous-vivid-orange-to-vivid-red
        ) !important;
      }
      .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
        background: var(
          --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray
        ) !important;
      }
      .has-cool-to-warm-spectrum-gradient-background {
        background: var(
          --wp--preset--gradient--cool-to-warm-spectrum
        ) !important;
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
    <link
      rel="stylesheet"
      id="contact-form-7-css"
      href="wp-content/plugins/contact-form-7/includes/css/styles.css?ver=6.1.1"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-plus-elementor-css"
      href="wp-content/plugins/lizza-lms-plus/elementor/assets/css/elementor.css?ver=1.0.2"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-plus-common-css"
      href="wp-content/plugins/lizza-lms-plus/assets/css/common.css?ver=1.0.2"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-pro-widget-css"
      href="wp-content/plugins/lizza-lms-pro/assets/css/widget.css?ver=1.0.0"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-elementor-addon-core-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-elementor-addon/assets/css/core.css?ver=1.0.0"
      type="text/css"
      media="all"
    />
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
    <link
      rel="stylesheet"
      id="wcs-timetable-css"
      href="wp-content/plugins/weekly-class/assets/front/css/timetable.css?ver=2.3.1"
      type="text/css"
      media="all"
    />
    <style id="wcs-timetable-inline-css" type="text/css">
      .wcs-single__action .wcs-btn--action {
        color: rgba(255, 255, 255, 1);
        background-color: #bd322c;
      }
    </style>
    <link
      rel="stylesheet"
      id="woocommerce-layout-css"
      href="wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=9.1.4"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="woocommerce-smallscreen-css"
      href="wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css?ver=9.1.4"
      type="text/css"
      media="only screen and (max-width: 768px)"
    />
    <link
      rel="stylesheet"
      id="woocommerce-general-css"
      href="wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=9.1.4"
      type="text/css"
      media="all"
    />
    <style id="woocommerce-inline-inline-css" type="text/css">
      .woocommerce form .form-row .required {
        visibility: visible;
      }
    </style>
    <link
      rel="stylesheet"
      id="swiper-css"
      href="wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min.css?ver=8.4.5"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="fontawesome-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/all.min.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="material-icon-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/material-design-iconic-font.min.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-base-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/base.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-common-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/common.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-modules-listing-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/modules-listing.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-modules-default-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/modules-default.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="elementor-icons-css"
      href="wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.30.0"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="elementor-frontend-css"
      href="wp-content/uploads/sites/12/elementor/css/custom-frontend-lite.min.css?ver=1729595945"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="elementor-post-6-css"
      href="wp-content/uploads/sites/12/elementor/css/post-6.css?ver=1729595945"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="elementor-global-css"
      href="wp-content/uploads/sites/12/elementor/css/global.css?ver=1729595947"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="elementor-post-21714-css"
      href="wp-content/uploads/sites/12/elementor/css/post-21714.css?ver=1729595947"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-social-share-frontend-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/social-share/assets/social-share-frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="chosen-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/chosen.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-fields-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/fields.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-search-frontend-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/search/assets/search-frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-media-images-frontend-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/media-images/assets/media-images-frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-media-attachments-frontend-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/media-attachments/assets/media-attachments-frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-modules-singlepage-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/assets/css/modules-singlepage.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-comments-frontend-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/comments/assets/comments-frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-business-hours-frontend-css"
      href="wp-content/plugins/lizza-lms-wedesigntech-portfolio/modules/business-hours/assets/business-hours-frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <style id="wdt-skin-inline-css" type="text/css">
      .wdt-dashbord-container
        .wdt-dashbord-section-holder
        .wdt-dashbord-section-title,
      .wdt-dashbord-section-holder-content
        .ui-sortable
        .wdt-social-item-section
        div[class*="section-options"]
        span:hover,
      .wdt-add-listing
        .wdt-dashbord-section-holder-content
        .wdt-dashboard-option-item
        div[class*="wdt-dashboard-option-item"]
        input[type="checkbox"]:checked
        ~ label:before,
      .wdt-my-ads-container
        .wdt-dashbord-section-holder-content
        .wdt-dashbord-ads-addnew-wrapper
        .wdt-dashbord-ad-details
        input[type="checkbox"]:checked
        ~ label:before,
      .wdt-dashboard-addincharge-form
        .wdt-dashbord-section-holder-content
        .wdt-dashboard-option-item
        input[type="checkbox"]:checked
        ~ label:before,
      .wdt-dashbord-reviews-listing-wrapper
        .wdt-dashbord-reviews-listing
        .wdt-ratings-holder
        span,
      .wdt-listings-item-wrapper.type1
        .wdt-listings-item-bottom-section-content
        .custom-button-style.wdt-listing-view-details,
      .wdt-listings-item-wrapper.type2
        .wdt-listings-item-bottom-section-content
        > div.wdt-listings-item-bottom-pricing-holder
        .custom-button-style,
      .wdt-packages-item-wrapper .wdt-item-pricing-details ins,
      .wdt-packages-item-wrapper.type1
        .wdt-packagelist-view-details-button
        span,
      .wdt-packages-item-wrapper.type1
        .wdt-item-status-details
        .wdt-proceed-button
        .custom-button-style
        span,
      .wdt-packages-item-wrapper.type2
        .wdt-packagelist-view-details
        .custom-button-style
        span,
      .wdt-packages-item-wrapper.type2
        .wdt-packagelist-view-details
        .custom-button-style:hover,
      .wdt-packages-item-wrapper.type2
        .wdt-item-status-details
        .custom-button-style,
      .wdt-packages-item-wrapper.type2 .wdt-item-status-details .added_to_cart,
      .wdt-packages-item-wrapper.type3
        .wdt-item-status-details
        .custom-button-style,
      .wdt-packages-item-wrapper.type3 .wdt-item-status-details .added_to_cart,
      .wdt-packages-item-wrapper.type3
        .wdt-packagelist-view-details
        .custom-button-style,
      ul.wdt-dashboard-menus li a,
      .wdt-packages-item-wrapper.type3 .wdt-item-status-details .wdt-purchased,
      .wdt-listings-item-wrapper.type3
        .wdt-listings-item-bottom-section
        a.custom-button-style,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-item-bottom-section
        > div.wdt-listings-item-bottom-pricing-holder
        .custom-button-style:before,
      .wdt-listings-item-wrapper.type5
        .wdt-listings-item-bottom-section
        a.custom-button-style,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        > div
        a,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        > div.wdt-listings-utils-item-holder
        .wdt-listings-utils-item
        > *,
      .wdt-listing-taxonomy-item .wdt-listing-taxonomy-meta-data h3 a,
      wdt-sf-fields-holder
        input[type="checkbox"].wdt-sf-field:checked
        ~ label:before,
      .wdt-sf-location-field-holder
        .wdt-sf-location-field-inner-holder
        .wdt-detect-location,
      .wdt-sf-fields-holder
        input[type="checkbox"].wdt-sf-field:checked
        ~ label::before,
      .wdt-sf-fields-holder
        .ui-widget.ui-widget-content
        .wdt-sf-radius-slider-handle,
      .wdt-sf-features-field-holder > div > div[class*="-handle"],
      .wdt-custom-login,
      .wdt-custom-login li a,
      .wdt-swiper-arrow-pagination a:hover,
      .wdt-sf-others-field-holder div.wdt-sf-others-list,
      .wdt-marker-addition-info.wdt-marker-addition-info-totalviews,
      .wdt-marker-addition-info.wdt-marker-addition-info-averageratings,
      .wdt-marker-addition-info.wdt-marker-addition-info-startdate,
      .wdt-marker-addition-info.wdt-marker-addition-info-distance,
      .wdt-listing-taxonomy-item.type2 .wdt-listing-taxonomy-icon-image > span,
      .wdt-listing-taxonomy-item
        .wdt-listing-taxonomy-starting-price-html
        ins
        > span,
      .wdt-listings-item-wrapper:hover
        .wdt-listings-item-top-section
        .wdt-listings-item-ad-section,
      .wdt-listings-item-wrapper:hover
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container,
      .wdt-listings-item-wrapper.type2
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container
        a:after,
      .wdt-listings-item-wrapper.type2:hover
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container:before,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-top-section
        .wdt-listings-item-ad-section,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container,
      .wdt-listings-item-wrapper.type5
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container:before,
      .wdt-listings-item-wrapper.type5:hover
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container:after,
      .wdt-listings-item-wrapper.type3
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section,
      .wdt-listings-item-wrapper.type3
        .wdt-listings-item-top-section
        div.wdt-listings-featured-item-container
        a,
      .wdt-listings-item-wrapper.type3:hover
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section:before,
      .wdt-listings-item-wrapper.type1:not(.has-post-thumbnail)
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        .wdt-listings-utils-item-holder
        > div
        a,
      .wdt-listings-item-wrapper.type1:not(.has-post-thumbnail)
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        .wdt-listings-utils-item-holder
        > div
        div,
      .wdt-dashbord-section-holder-content
        ul.wdt-dashbord-inbox-listing-messages-wrapper
        li:hover,
      .wdt-dashbord-section-holder-content
        ul.wdt-dashbord-inbox-listing-messages-wrapper
        li.active,
      .wdt-listings-comment-list-holder
        .commentlist
        li.comment
        .comment-body
        .reply
        a.comment-reply-link,
      .wdt-listings-countdown-timer-container.type2
        .wdt-listings-countdown-timer-holder
        .wdt-listings-countdown-timer-notice
        span,
      .wdt-listings-item-wrapper ul.wdt-listings-contactdetails-list li span,
      .single-wdt_packages .wdt-item-pricing-details ins,
      .single-wdt_packages .wdt-item-pricing-details span.amount,
      .single-wdt_packages .wdt-packagelist-features li:before,
      .wdt-listings-item-wrapper.type2:hover
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container
        a:before,
      .wdt-listings-item-wrapper.type5:hover
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container
        a:after,
      .wdt-listings-item-wrapper.type8:hover
        .wdt-listings-item-top-section
        div.wdt-listings-featured-item-container
        a,
      .wdt-listing-taxonomy-item.type6 .wdt-category-total-items a:hover,
      .wdt-comment-form-fields-holder input#wdt_media + label:before,
      .wdt-listings-item-wrapper.type5
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container
        a,
      .wdt-swiper-arrow-pagination a:before,
      .wdt-packages-item-wrapper .wdt-packagelist-details > h5 a,
      .wdt-listings-item-wrapper
        .wdt-listings-item-bottom-section-content
        .wdt-listings-item-title
        a,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-bottom-section
        .wdt-listings-item-title
        a,
      .wdt-user-list-item .wdt-user-item-meta-data h4 a,
      .wdt-user-list-item.type1 .wdt-user-sociallinks-list li a,
      .wdt-user-list-item.type2 .wdt-user-contactdetails-list li a,
      .wdt-user-list-item.type3 .wdt-user-contactdetails-list li span,
      .wdt-user-list-item.type2 .wdt-user-contactdetails-list li span,
      .wdt-listings-item-wrapper.type3 .wdt-listings-taxonomy-container li a,
      .wdt-listings-taxonomy-container.type3 li a,
      .wdt-listings-item-wrapper .wdt-listings-excerpt span,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-bottom-section-content
        .wdt-listings-item-bottom-left-content
        div[class*="wdt-listings-"]
        label[class*="wdt-listings-"],
      .wdt-comment-form-fields-holder input#wdt_media + label,
      p.tpl-forget-pwd a,
      .wdt-listings-item-wrapper.type5
        .wdt-listings-item-bottom-section-content
        > div
        .wdt-listings-utils-item-holder
        a,
      .wdt-dashbord-recent-activites-holder
        .wdt-dashbord-recent-activites-content
        p
        a,
      .wdt-dashbord-recent-activites-holder
        .wdt-dashbord-recent-activites-content
        p
        strong,
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-details
        h5
        a,
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-dashboard-owner
        a,
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-details
        .wdt-mylisting-options-container
        > a[data-tooltip]:after,
      .wdt-dashbord-inbox-listing-conversation-wrapper
        ul.wdt-dashbord-inbox-conversation-list
        li
        > span:before,
      .wdt-listings-dates-container
        [class*="date-container"]
        > :not(:last-child),
      .wdt-listings-dates-container
        [class*="date-container"]
        > div:not(:last-child)
        > :not(:last-child),
      .wdt-listings-post-dates-container.type1
        .wdt-listings-post-date-container
        span,
      .wdt-listings-dates-container.type2 [class*="date-container"] > span,
      p.login-remember input[type="checkbox"]:checked ~ label:before,
      .wdt-login-title h2,
      .wdt-claim-form-container .wdt-claimform-secure-note > span {
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
      .wdt-listings-average-rating-container
        .wdt-listings-average-rating-holder
        span,
      .wdt-listings-average-rating-container
        .wdt-listings-average-rating-overall,
      .wdt-listings-featured-item-container.type1 > span,
      .wdt-listings-dates-container.type2
        .wdt-listings-post-date-container
        span,
      .wdt-listings-nearby-places-container
        .wdt-listings-nearby-places-item
        .wdt-listings-nearby-places-content
        .wdt-listings-nearby-places-title,
      .wdt-listings-nearby-places-container
        .wdt-listings-nearby-places-item
        .wdt-listings-nearby-places-content
        .wdt-listings-nearby-places-ratings:before,
      .wdt-listings-nearby-places-container
        .wdt-listings-nearby-places-item
        .wdt-listings-nearby-places-content
        .wdt-listings-nearby-places-distance:before,
      .wdt-listings-nearby-places-container
        .wdt-listings-nearby-places-item
        .wdt-listings-nearby-places-content
        .wdt-listings-nearby-places-address:before,
      .wdt-listings-contactdetails-container.type2
        .wdt-listings-contactdetails-list
        > li
        span,
      .wdt-announcement-listing-holder.booknow span,
      .wdt-announcement-listing-holder.booknow a:hover,
      .wdt-announcement-listing-holder.contactus:hover h2,
      .wdt-announcement-listing-holder.contactus:hover p,
      .wdt-claim-form-container .wdt-claim-form .wdt-claim-form-title,
      .wdt-listings-dates-container.type4 [class*="date-container"] span,
      .wdt-listings-countdown-timer-container.type2
        .wdt-countdown-wrapper
        .wdt-countdown-icon-wrapper,
      .wdt-listings-countdown-timer-container.type2
        .wdt-listings-countdown-timer-holder
        .wdt-listings-countdown-timer-holder
        .wdt-listings-countdown-timer-notice
        span,
      [class*="wdt-listings-utils-"]
        .wdt-listings-price-container
        .wdt-listings-price-item
        ins,
      .wdt-yelp-places-container
        .wdt-yelp-places-item
        .wdt-yelp-places-content
        .wdt-yelp-places-title,
      .wdt-yelp-places-container
        .wdt-yelp-places-item
        .wdt-yelp-places-content
        .wdt-yelp-places-ratings:before,
      .wdt-yelp-places-container
        .wdt-yelp-places-item
        .wdt-yelp-places-content
        .wdt-yelp-places-distance:before,
      .wdt-yelp-places-container
        .wdt-yelp-places-item
        .wdt-yelp-places-content
        .wdt-yelp-places-address:before,
      div[class*="-output-data-container"]
        .wdt-ajax-load-image
        .wdt-loader-inner,
      .wdt-sf-fields-holder input[type="text"] ~ span:not(.wdt-detect-location),
      .wdt-listings-contactform input ~ span,
      .wdt-listings-contactform textarea ~ span,
      .wdt-comment-form-fields-holder p input[type="text"] ~ span,
      .wdt-comment-form-fields-holder p input[type="email"] ~ span,
      .wdt-comment-form-fields-holder p textarea ~ span,
      .wdt-listings-item-wrapper:hover
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container
        a,
      form.lidd_mc_form
        .lidd_mc_input
        input[type="text"]
        ~ span:not(#lidd_mc_total_amount-error):before,
      form.lidd_mc_form
        .lidd_mc_input
        input[type="text"]
        ~ span:not(#lidd_mc_total_amount-error):after,
      .wdt-user-list-item.type3 .wdt-user-sociallinks-list li a,
      .wdt-user-list-item.type3 .wdt-user-contactdetails-list li a,
      .wdt-listings-contactdetails-container.type2
        .wdt-listings-contactdetails-list
        > li
        a,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-bottom-section-content
        .wdt-listings-item-bottom-right-content
        .wdt-listings-utils-item-holder
        a,
      .wdt-listings-features-box-container.type3
        .wdt-listings-features-box-item
        .wdt-listings-features-box-item-icon,
      .wdt-announcement-listing-holder.announcement,
      [class*="wdt-listings-utils-"]
        .wdt-listings-taxonomy-container
        .wdt-listings-taxonomy-list
        li
        a:hover
        span[class*="wdt"],
      .wdt-listings-item-wrapper.type6
        .wdt-listings-item-bottom-section
        .wdt-listings-utils-item-holder
        a.wdt-listings-utils-favourite-item,
      .wdt-listings-attachment-holder.type1
        .wdt-listings-attachment-box-item
        span,
      #loginform .wdt-login-field-item input ~ span,
      .wdt-listings-claim-form > .wdt-listings-claim-form-item input ~ span,
      .wdt-listings-claim-form > .wdt-listings-claim-form-item textarea ~ span,
      .wdt-listings-comment-list-holder
        .comment-body
        .comment-meta
        .comment-author
        b.fn,
      .wdt-listings-claim-form
        > .wdt-listings-claim-form-item
        input#wdt-claimform-verification-file
        + label,
      .wdt-listings-social-share-container
        .wdt-listings-social-share-list
        li
        a:hover,
      .wdt-listings-social-share-container
        .wdt-listings-social-share-list
        li
        a:hover,
      .wdt-user-list-item.type3
        .wdt-user-item-meta-data
        .wdt-listings-social-share-container
        .wdt-listings-social-share-list
        li
        a:hover {
        color: #1e306e;
      }
      ul.wdt-dashboard-menus li a span,
      .wdt-dashboard-user-package-details
        .wdt-dashboard-package-detail
        span.wdt-dashboard-package-detail-value,
      .wdt-dashboard-user-package-details
        .wdt-dashboard-package-detail
        span.wdt-dashboard-package-detail-title,
      .wdt-dashbord-container
        .wdt-dashbord-section-holder
        .wdt-dashbord-statistics-counter-label,
      .custom-button-style,
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-details
        .wdt-mylisting-options-container
        > a,
      .wdt-dashbord-section-holder-content
        ul.wdt-dashbord-reviews-listing-options-wrapper
        li:hover,
      .wdt-dashbord-section-holder-content
        ul.wdt-dashbord-reviews-listing-options-wrapper
        li.wdt-active,
      .wdt-dashboard-container .woocommerce-button.view,
      .wdt-listings-item-wrapper.type1:hover
        .wdt-listings-item-bottom-section-content
        .custom-button-style.wdt-listing-view-details:hover,
      .wdt-listings-item-wrapper.type2
        .wdt-listings-item-bottom-section-content
        > div.wdt-listings-item-bottom-pricing-holder
        .custom-button-style:hover,
      .wdt-dashbord-container
        .wdt-packages-container
        .wdt-packages-item-wrapper
        .wdt-packagelist-details
        .wdt-item-status-details
        .wdt-proceed-button
        a.custom-button-style,
      .wdt-packages-item-wrapper.type1
        .wdt-packagelist-view-details-button:hover,
      .wdt-packages-item-wrapper.type1
        .wdt-item-status-details
        .wdt-proceed-button
        .custom-button-style:hover,
      .wdt-packages-item-wrapper.type1
        .wdt-item-status-details
        .wdt-proceed-button
        .added_to_cart:hover,
      .wdt-packages-item-wrapper.type2
        .wdt-item-status-details
        .custom-button-style:hover,
      .wdt-packages-item-wrapper.type2
        .wdt-item-status-details
        .added_to_cart:hover,
      .wdt-packages-item-wrapper.type3
        .wdt-item-status-details
        .custom-button-style:hover,
      .wdt-packages-item-wrapper.type3
        .wdt-item-status-details
        .added_to_cart:hover,
      .wdt-packages-item-wrapper.type3
        .wdt-packagelist-view-details
        .custom-button-style:hover,
      .wdt-packages-item-wrapper.type3
        .wdt-item-status-details
        .wdt-purchased:hover,
      .wdt-listings-item-wrapper.type3
        .wdt-listings-item-bottom-section
        a.custom-button-style:hover,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-item-bottom-section
        > div.wdt-listings-item-bottom-pricing-holder
        .custom-button-style:hover,
      .wdt-sf-orderby-field-holder ul.wdt-sf-orderby-list li a:hover,
      .wdt-sf-orderby-field-holder ul.wdt-sf-orderby-list li a.active,
      .wdt-sf-fields-holder
        .ui-widget-content
        .ui-state-default.ui-state-active,
      .wdt-sf-fields-holder.wdt-sf-features-field-holder
        .ui-widget.ui-widget-content,
      div[class*="-output-data-container"]
        .wdt-swiper-pagination-holder
        .wdt-swiper-bullet-pagination.swiper-pagination-bullets
        .swiper-pagination-bullet:hover,
      div[class*="-output-data-container"]
        .wdt-swiper-pagination-holder
        .wdt-swiper-bullet-pagination.swiper-pagination-bullets
        .swiper-pagination-bullet.swiper-pagination-bullet-active,
      .wdt-sf-others-field-holder div.wdt-sf-others-list:hover,
      .wdt-dashbord-ads-addnew-wrapper
        ul.wdt-addtocart-purhcase-preview-wrapper
        li:not(.duration):not(.total-amount)
        span.active,
      .wdt-marker-container,
      .wdt-marker-addition-info.wdt-marker-addition-info-categoryimage
        .wdt-marker-addition-info-categoryimage-inner,
      table.wdt-my-incharges-table thead tr th,
      .wdt-dashbord-load-buyer-listings-content table thead tr th,
      table.wdt-custom-table > tbody:first-child > tr > th,
      .wdt-dashbord-ads-listing
        table.wdt-custom-table
        tbody
        tr
        td:last-child
        a:hover,
      .wdt-listings-item-wrapper
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container
        a,
      .wdt-listings-item-wrapper
        .wdt-listings-item-top-section
        .wdt-listings-item-ad-section,
      .wdt-listings-item-wrapper.type3
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section:before,
      .wdt-listings-item-wrapper.type3
        .wdt-listings-item-top-section
        div.wdt-listings-featured-item-container
        a:before,
      .wdt-listings-item-wrapper.type8
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container
        a,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-top-section
        .wdt-listings-item-ad-section
        span:before,
      table.wdt-user-claimed-posts-table thead tr th,
      .wdt-dashbord-load-favourite-listings-content table th,
      .wdt-dashbord-inbox-listing-conversation-wrapper
        ul.wdt-dashbord-inbox-conversation-list
        li
        a.wdt-dashbord-inbox-conversation-reply-loader,
      .wdt-dashbord-inbox-listing-conversation-wrapper
        ul.wdt-dashbord-inbox-conversation-list
        li
        .wdt-dashbord-inbox-conversation-reply-wrapper
        .wdt-inbox-conversation-reply-submit,
      .wdt-dashbord-ads-addnew-wrapper
        ul.wdt-addtocart-purhcase-preview-wrapper
        li.duration
        span,
      .wdt-dashbord-ads-addnew-wrapper
        ul.wdt-addtocart-purhcase-preview-wrapper
        li.total-amount
        span,
      .wdt-listings-contactform a.wdt-contactform-submit-button,
      .wdt-listings-floorplan-top-section
        .wdt-listings-floorplan-expand-bottom-section,
      .wdt-listings-author-container[class*="swiper-container-"]
        .wdt-listings-swiper-pagination-holder.type1
        .wdt-swiper-bullet-pagination
        .swiper-pagination-bullet-active,
      .wdt-listings-item-wrapper.type2
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section:after,
      .wdt-listings-item-wrapper.type2
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section:before,
      .wdt-listings-item-wrapper.type3.wdt-list:hover
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section:after,
      .wdt-listings-item-wrapper.type3.wdt-list:hover
        .wdt-listings-item-top-section
        div.wdt-listings-featured-item-container:after,
      .wdt-listing-taxonomy-item.type7:hover
        .wdt-listing-taxonomy-starting-price:after,
      .wdt-listings-social-share-container.type2.active
        .wdt-listings-social-share-item-icon
        > span,
      .wdt-listings-social-share-container.type2:hover
        .wdt-listings-social-share-item-icon
        > span,
      .wdt-listings-item-wrapper.type5
        .wdt-listings-item-top-section
        div.wdt-listings-taxonomy-container
        ul.wdt-listings-taxonomy-list
        li
        > a:before,
      .wdt-sf-pricerange-field-holder
        .ui-widget.ui-widget-content
        .ui-widget-header,
      .wdt-comment-form-fields-holder
        .comment-form-media
        span:hover
        input#wdt_media
        + label,
      .wdt-user-list-item.type3
        .wdt-user-item-meta-data
        .wdt-listings-social-share-container.active
        .wdt-listings-social-share-item-icon
        span,
      .wdt-user-list-item.type3
        .wdt-user-item-meta-data
        .wdt-listings-social-share-container
        .wdt-listings-social-share-item-icon:hover
        span,
      .wdt-user-list-item.type3
        .wdt-user-item-meta-data
        .wdt-listings-utils-favourite
        .wdt-listings-utils-favourite-author:hover
        span,
      .wdt-listings-nearby-places-container
        .wdt-listings-nearby-places-item
        .wdt-listings-nearby-places-image
        .wdt-listings-nearby-places-icon,
      form.lidd_mc_form .lidd_mc_input input[type="submit"],
      .comment-form
        .wdt-comment-form-fields-holder
        p.form-submit
        input[type="submit"],
      .logged-in
        .wdt-listings-comment-list-holder
        p.form-submit
        input[type="submit"],
      #loginform .login-submit input[type="submit"],
      .wdt-listings-features-box-container.type1
        .wdt-listings-features-box-item
        .wdt-listings-features-box-item-title:first-child:before,
      .wdt-announcement-listing-holder.contactus span,
      .wdt-listings-claim-wrapper .wdt-listings-claim-item,
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-details
        .wdt-mylisting-options-container
        > a[data-tooltip]:before,
      .wdt-sf-fields-holder .ui-widget-content .ui-widget-header,
      .wdt-listings-post-dates-container.type2
        .wdt-listings-post-date-container
        span,
      .wdt-listings-attachment-holder.type2
        .wdt-listings-attachment-box-item
        span,
      .wdt-listings-dates-container.type3 [class*="date-container"] span,
      .wdt-listings-utils-container
        .wdt-listings-utils-item
        .wdt-listings-date-container:hover
        > span,
      .wdt-dashbord-ads-listing
        table.wdt-custom-table
        tbody
        tr
        td:last-child
        > *,
      .wdt-announcement-listing-holder.announcement h2:after,
      .wdt-announcement-listing-holder.announcement a,
      .wdt-listings-item-wrapper.type8
        .wdt-listings-item-bottom-section
        ul.wdt-listings-taxonomy-list
        li
        a {
        background-color: #1e306e;
      }
      .wdt-listings-sociallinks-container.type1
        .wdt-listings-sociallinks-list
        li
        a,
      .wdt-listings-sociallinks-container.type2
        .wdt-listings-sociallinks-list
        li
        a,
      .wdt-listings-sociallinks-container.type3
        .wdt-listings-sociallinks-list
        li
        a,
      .wdt-listings-sociallinks-container.type7
        .wdt-listings-sociallinks-list
        li
        a,
      .wdt-listings-sociallinks-container.type4
        .wdt-listings-sociallinks-list
        li
        a:hover,
      .wdt-listings-sociallinks-container.type5
        .wdt-listings-sociallinks-list
        li
        a:hover,
      .wdt-listings-sociallinks-container.type6
        .wdt-listings-sociallinks-list
        li
        a:hover,
      .wdt-listings-sociallinks-container.type8
        .wdt-listings-sociallinks-list
        li
        a:hover,
      .wdt-listings-average-rating-container.type2
        .wdt-listings-average-rating-holder,
      .wdt-listings-average-rating-container.type2
        .wdt-listings-average-rating-overall,
      .wdt-listings-average-rating-container.type2
        .wdt-listings-average-rating-reviews-count,
      .wdt-listings-average-rating-container.type3
        .wdt-listings-average-rating-overall,
      .wdt-listings-mls-number-container span,
      .wdt-listings-mls-number-container.type3 > span:before,
      .wdt-listings-featured-item-container.type2 > span,
      .wdt-listings-featured-item-container.type3 > span:before,
      .wdt-listings-price-container.type1
        .wdt-listings-price-label-holder
        ins:before,
      .wdt-listings-price-container.type1
        .wdt-listings-price-label-holder
        del:before,
      .wdt-listings-price-container.type3 .wdt-price-currency-symbol,
      .wdt-listings-price-container.type3
        .wdt-listings-price-label-holder
        .wdt-listings-price-item,
      .wdt-listings-dates-container.type4 .wdt-listings-post-date-container,
      .wdt-listings-dates-container.type5
        .wdt-listings-post-date-container
        a:hover,
      .wdt-listings-contactdetails-request-container.type1 > a,
      .wdt-listings-contactdetails-request-container.type2 > a:hover,
      .wdt-listings-address-directions,
      .wdt-listings-utils-container
        .wdt-listings-utils-item
        .wdt-listings-date-container:hover
        span:before,
      .wdt-listings-utils-container
        .wdt-listings-utils-item
        .wdt-listings-contactdetails-list
        li:hover
        span,
      .wdt-listings-utils-container
        .wdt-listings-utils-item
        .wdt-listings-utils-favourite-item:hover
        span,
      .wdt-listings-utils-container
        .wdt-listings-utils-item
        .wdt-listings-utils-pageview-item:hover
        span,
      .wdt-listings-utils-container
        .wdt-listings-utils-item
        .wdt-listings-utils-print-item:hover
        span,
      .wdt-listings-utils-container
        .wdt-listings-utils-item
        .wdt-listings-social-share-item-icon:hover
        span,
      .wdt-listings-utils-container
        .wdt-listings-utils-item
        .wdt-listings-social-share-container.active
        .wdt-listings-social-share-item-icon
        span,
      .wdt-listings-utils-container
        .wdt-listings-utils-item
        .wdt-listings-average-rating-container:hover
        .wdt-listings-average-rating-overall
        span,
      .wdt-listings-utils-container
        .wdt-listings-utils-item
        .wdt-listings-featured-item-container:hover
        span:before,
      .wdt-listings-utils-container
        .wdt-listings-taxonomy-container
        .wdt-listings-taxonomy-list
        li:hover
        a
        span:before,
      [class*="wdt-listings-utils-"]
        .wdt-listings-dates-container
        [class*="-date-container"]:hover
        span:before,
      .wdt-listings-contactdetails-container.type1
        .wdt-listings-contactdetails-list
        > li:hover
        span,
      .wdt-announcement-listing-holder.booknow a,
      .wdt-announcement-listing-holder.booknow:hover span,
      .wdt-claim-form-container
        .wdt-listings-claim-form
        .wdt-claimform-submit-button,
      .wdt-listings-dates-container.type5 [class*="date-container"],
      .wdt-listings-countdown-timer-container.type1
        .wdt-countdown-wrapper
        .wdt-countdown-icon-wrapper,
      .wdt-listings-countdown-timer-container.type1
        .wdt-listings-countdown-timer-holder
        .wdt-listings-countdown-timer-notice,
      .wdt-listings-attachment-holder.type4 .wdt-listings-attachment-box-item,
      .wdt-listings-attachment-holder.type5
        .wdt-listings-attachment-box-item
        a:hover,
      .wdt-listings-image-gallery-container
        .wdt-swiper-bullet-pagination.swiper-pagination-bullets
        .swiper-pagination-bullet.swiper-pagination-bullet-active,
      .swiper-pagination-progressbar .swiper-pagination-progressbar-fill,
      .wdt-swiper-scrollbar .swiper-scrollbar-drag,
      .wdt-listings-image-gallery-container
        .wdt-listings-swiper-pagination-holder
        .wdt-swiper-fraction-pagination,
      .wdt-listings-media-videos-container
        .wdt-swiper-bullet-pagination.swiper-pagination-bullets
        .swiper-pagination-bullet.swiper-pagination-bullet-active,
      .swiper-pagination-progressbar .swiper-pagination-progressbar-fill,
      .wdt-swiper-scrollbar .swiper-scrollbar-drag,
      .wdt-listings-media-videos-container
        .wdt-listings-swiper-pagination-holder
        .wdt-swiper-fraction-pagination,
      .wdt-listings-media-videos-container.swiper-container
        div[class*="wdt-swiper-arrow-pagination"].type1
        a[class*="wdt-swiper-arrow-"]:after,
      .wdt-sf-others-field-holder div.wdt-sf-others-list div.active,
      .ui-datepicker th,
      .single-wdt_packages .wdt-payment-details a.added_to_cart,
      .wdt-sf-fields-holder .ui-state-default,
      .wdt-sf-fields-holder .ui-widget-content .ui-state-default,
      .wdt-listings-taxonomy-container.type3
        li
        a
        span.wdt-listings-taxonomy-image,
      .wdt-listings-taxonomy-container.type5
        .wdt-listings-taxonomy-list
        li
        a:before,
      .wdt-listings-post-dates-container.type4
        .wdt-listings-post-date-container,
      .wdt-listings-claim-form
        > .wdt-listings-claim-form-item
        input#wdt-claimform-verification-file:hover
        + label {
        background-color: #1e306e;
      }
      .wdt-listings-item-wrapper.type2
        .wdt-listings-item-bottom-section-content
        > div.wdt-listings-item-bottom-pricing-holder
        .custom-button-style:hover,
      .wdt-listings-item-wrapper.type3
        .wdt-listings-item-bottom-section
        a.custom-button-style:hover,
      .wdt-packages-item-wrapper.type1
        .wdt-packagelist-view-details-button:hover,
      .wdt-packages-item-wrapper.type1
        .wdt-item-status-details
        .wdt-proceed-button
        .custom-button-style:hover,
      .wdt-packages-item-wrapper.type1
        .wdt-item-status-details
        .wdt-proceed-button
        .added_to_cart:hover,
      .wdt-sf-orderby-field-holder ul.wdt-sf-orderby-list li a:hover,
      .wdt-sf-orderby-field-holder ul.wdt-sf-orderby-list li a.active,
      .wdt-sf-fields-holder
        .ui-widget-content
        .ui-state-default.ui-state-active,
      .wdt-sf-others-field-holder div.wdt-sf-others-list div:hover,
      .wdt-sf-others-field-holder div.wdt-sf-others-list div.active,
      .wdt-dashbord-ads-listing
        table.wdt-custom-table
        tbody
        tr
        td:last-child
        a:hover,
      .wdt-sf-fields-holder input[type="text"] ~ span:not(.wdt-detect-location),
      form.lidd_mc_form
        .lidd_mc_input
        input[type="text"]
        ~ span:not(#lidd_mc_total_amount-error) {
        border-color: #1e306e;
      }
      .wdt-listings-sociallinks-container.type4
        .wdt-listings-sociallinks-list
        li
        a,
      .wdt-listings-sociallinks-container.type5
        .wdt-listings-sociallinks-list
        li
        a,
      .wdt-listings-sociallinks-container.type6
        .wdt-listings-sociallinks-list
        li
        a,
      .wdt-listings-sociallinks-container.type4
        .wdt-listings-sociallinks-list
        li
        a:hover,
      .wdt-listings-sociallinks-container.type5
        .wdt-listings-sociallinks-list
        li
        a:hover,
      .wdt-listings-sociallinks-container.type6
        .wdt-listings-sociallinks-list
        li
        a:hover,
      .wdt-listings-sociallinks-container.type8
        .wdt-listings-sociallinks-list
        li
        a,
      .wdt-listings-contactdetails-request-container.type2 > a,
      .wdt-listings-contactdetails-request-container.type3 > a,
      .wdt-announcement-listing-holder.booknow,
      .wdt-announcement-listing-holder.contactus,
      .wdt-announcement-listing-holder.contactus a,
      .wdt-announcement-listing-holder.booknow a,
      .wdt-claim-form-container .wdt-listings-claim-form textarea:focus,
      .wdt-listings-dates-container.type4 [class*="date-container"],
      .wdt-listings-image-gallery-holder
        .wdt-listings-image-gallery-thumb-container
        .wdt-listings-image-gallery-thumb
        .swiper-slide-active:after,
      .wdt-listings-media-videos-holder
        .wdt-listings-media-videos-thumb-container
        .wdt-listings-media-videos-thumb
        .swiper-slide-active:after,
      .wdt-listings-media-videos-container.swiper-container
        div[class*="wdt-swiper-arrow-pagination"].type1
        a[class*="wdt-swiper-arrow-"]:last-child:before,
      .wdt-listings-media-videos-container.swiper-container
        div[class*="wdt-swiper-arrow-pagination"].type1
        a[class*="wdt-swiper-arrow-"]:first-child:before {
        border-color: #1e306e;
      }
      .wdt-packages-item-wrapper.type2
        .wdt-item-status-details
        .custom-button-style,
      .wdt-packages-item-wrapper.type2 .wdt-item-status-details .added_to_cart,
      .wdt-packages-item-wrapper.type3
        .wdt-item-status-details
        .custom-button-style,
      .wdt-packages-item-wrapper.type3 .wdt-item-status-details .added_to_cart,
      .wdt-packages-item-wrapper.type3
        .wdt-packagelist-view-details
        .custom-button-style,
      .wdt-packages-item-wrapper.type3 .wdt-item-status-details .wdt-purchased,
      .wdt-listings-item-wrapper.type3:not(.wdt-list)
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section:before {
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
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-dashboard-status:after,
      .wdt-dashbord-container
        .wdt-packages-container
        .wdt-packages-item-wrapper
        .wdt-packagelist-details
        .wdt-item-status-details
        .wdt-purchased:after,
      .wdt-dashbord-container
        .wdt-packages-container
        .wdt-packages-item-wrapper
        .wdt-packagelist-details
        .wdt-item-status-details
        .wdt-active:after,
      .wdt-listings-item-wrapper:hover
        .wdt-listings-item-bottom-section-content
        > div
        .wdt-listings-price-container
        .wdt-listings-price-label-holder
        ins,
      ul.wdt-dashboard-menus li a:hover,
      ul.wdt-dashboard-menus li a.wdt-active,
      .wdt-packages-item-wrapper .wdt-item-status-details .wdt-purchased:after,
      .wdt-listings-item-wrapper.type3
        .wdt-listings-item-bottom-section-content
        > div
        .wdt-listings-price-container
        .wdt-listings-price-label-holder
        ins,
      .wdt-listings-item-wrapper.type5
        .wdt-listings-item-bottom-section
        a.custom-button-style:hover,
      .wdt-custom-login li a:hover,
      .wdt-listing-taxonomy-item .wdt-listing-taxonomy-meta-data h3 a:hover,
      .wdt-listings-comment-list-holder
        .commentlist
        li.comment
        .comment-body
        .reply
        a.comment-reply-link:hover,
      .wdt-packages-item-wrapper .wdt-packagelist-details > h5 a:hover,
      .wdt-listings-item-wrapper
        .wdt-listings-item-bottom-section-content
        .wdt-listings-item-title
        a:hover,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-bottom-section
        .wdt-listings-item-title
        a:hover,
      .wdt-user-list-item .wdt-user-item-meta-data h4 a:hover,
      .wdt-user-list-item.type2 .wdt-user-contactdetails-list li a:hover,
      .wdt-user-list-item.type3 .wdt-user-sociallinks-list li a:hover,
      .wdt-user-list-item.type3 .wdt-user-contactdetails-list li a:hover,
      .wdt-listings-item-wrapper.type3
        .wdt-listings-taxonomy-container
        li
        a:hover,
      .wdt-listings-taxonomy-container.type3 li a:hover,
      .wdt-listings-contactdetails-container.type2
        .wdt-listings-contactdetails-list
        > li
        a:hover,
      p.tpl-forget-pwd a:hover,
      .wdt-listings-item-wrapper.type5
        .wdt-listings-item-bottom-section-content
        > div
        .wdt-listings-utils-item-holder
        a:hover,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-bottom-section-content
        .wdt-listings-item-bottom-right-content
        .wdt-listings-utils-item-holder
        a:hover,
      .wdt-listings-item-wrapper.type1.has-post-thumbnail
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        .wdt-listings-utils-item-holder
        > div
        a:hover,
      .wdt-dashbord-recent-activites-holder
        .wdt-dashbord-recent-activites-content
        p
        a:hover,
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-details
        h5
        a:hover,
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-dashboard-owner
        a:hover,
      .wdt-listings-item-wrapper.type5
        .wdt-listings-item-bottom-section-content
        > div
        .wdt-listings-utils-item-holder
        [class*="wdt-listings-utils-"]
        a.wdt-listings-utils-favourite-item
        span:hover,
      .wdt-listings-item-wrapper.type1:not(.has-post-thumbnail)
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        .wdt-listings-utils-item-holder
        .wdt-listings-utils-item:first-child
        > *
        span:hover,
      .wdt-listings-item-wrapper.type1:not(.has-post-thumbnail)
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        .wdt-listings-utils-item-holder
        > div
        a:hover,
      .wdt-listings-item-wrapper.type1.has-post-thumbnail
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        > div.wdt-listings-utils-item-holder
        .wdt-listings-utils-item
        > *
        > span:hover,
      div[class*="-apply-isotope"] div[class*="-isotope-filter"] a.active-sort,
      div[class*="-apply-isotope"] div[class*="-isotope-filter"] a:hover,
      .comment-form
        .wdt-comment-form-fields-holder
        > p.comment-form-cookies-consent
        input[type="checkbox"]:checked
        ~ label:before {
        color: #2fa5fb;
      }
      ul.wdt-dashboard-menus li a:hover span,
      ul.wdt-dashboard-menus li a.wdt-active span,
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-dashboard-status,
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-details
        .wdt-mylisting-options-container
        > a:hover,
      .custom-button-style:hover,
      .wdt-dashbord-container
        .wdt-packages-container
        .wdt-packages-item-wrapper
        .wdt-packagelist-details
        .wdt-item-status-details
        .wdt-purchased,
      .wdt-dashbord-container
        .wdt-packages-container
        .wdt-packages-item-wrapper
        .wdt-packagelist-details
        .wdt-item-status-details
        .wdt-active,
      .wdt-dashboard-container .woocommerce-button.view:hover,
      .wdt-dashbord-container
        .wdt-packages-container
        .wdt-packages-item-wrapper
        .wdt-packagelist-details
        .wdt-item-status-details
        .wdt-proceed-button
        a.custom-button-style:hover,
      .wdt-packages-item-wrapper .wdt-item-status-details .wdt-purchased,
      .wdt-listings-item-wrapper
        .wdt-listings-features-box-item
        > div.wdt-listings-features-box-item-title:first-child:before,
      .wdt-listings-item-wrapper.type6:hover
        .wdt-listings-item-bottom-section
        .wdt-listings-utils-item-holder
        a.wdt-listings-utils-favourite-item,
      .wdt-user-list-item.type1 .wdt-user-sociallinks-list li a:hover,
      div[class*="-output-data-container"]
        .wdt-swiper-pagination-holder
        .wdt-swiper-bullet-pagination.swiper-pagination-bullets
        .swiper-pagination-bullet,
      .wdt-dashbord-inbox-listing-conversation-wrapper
        ul.wdt-dashbord-inbox-conversation-list
        li
        a.wdt-dashbord-inbox-conversation-reply-loader:hover,
      .wdt-dashbord-inbox-listing-conversation-wrapper
        ul.wdt-dashbord-inbox-conversation-list
        li
        .wdt-dashbord-inbox-conversation-reply-wrapper
        .wdt-inbox-conversation-reply-submit:hover,
      .wdt-listings-contactform a.wdt-contactform-submit-button:hover,
      .wdt-listings-floorplan-top-section
        .wdt-listings-floorplan-expand-bottom-section:hover,
      .wdt-announcement-listing-holder a:hover,
      .single-wdt_packages .wdt-payment-details a.added_to_cart:hover,
      form.lidd_mc_form .lidd_mc_input input[type="submit"]:hover,
      .comment-form
        .wdt-comment-form-fields-holder
        p.form-submit
        input[type="submit"]:hover,
      .logged-in
        .wdt-listings-comment-list-holder
        p.form-submit
        input[type="submit"]:hover,
      #loginform .login-submit input[type="submit"]:hover,
      .wdt-listings-contactdetails-request-container.type2 > a:hover,
      .wdt-listings-claim-wrapper .wdt-listings-claim-item:hover,
      .wdt-listings-post-dates-container.type2
        .wdt-listings-post-date-container:hover
        span,
      .wdt-dashbord-ads-listing
        table.wdt-custom-table
        tbody
        tr
        td:last-child
        > a:hover,
      .wdt-claim-form-container
        .wdt-listings-claim-form
        .wdt-claimform-submit-button:hover,
      .dismissButton:hover:hover,
      .wdt-announcement-listing-holder.announcement a:hover,
      .wdt-listings-item-wrapper.type4:hover
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container
        a:hover {
        background-color: #2fa5fb;
      }
      .wdt-listings-sociallinks-container.type1
        .wdt-listings-sociallinks-list
        li
        a:hover,
      .wdt-listings-sociallinks-container.type2
        .wdt-listings-sociallinks-list
        li
        a:hover,
      .wdt-listings-sociallinks-container.type3
        .wdt-listings-sociallinks-list
        li
        a:hover,
      .wdt-listings-sociallinks-container.type7
        .wdt-listings-sociallinks-list
        li
        a:hover,
      .wdt-listings-average-rating-container.type3,
      .wdt-listings-mls-number-container.type3 > span,
      .wdt-listings-featured-item-container.type3 > span,
      .wdt-listings-price-container.type2
        .wdt-listings-price-label-holder
        .wdt-listings-price-item,
      .wdt-listings-dates-container.type4
        .wdt-listings-post-date-container:hover,
      .wdt-listings-contactdetails-request-container > a:hover,
      .wdt-listings-contactdetails-request-container.type3 > a:hover,
      .wdt-listings-address-directions:hover,
      .wdt-listings-contactdetails-container.type2
        .wdt-listings-contactdetails-list
        > li:hover
        span,
      .wdt-claim-form-container
        .wdt-listings-claim-form
        .wdt-claimform-submit-button:hover,
      .wdt-listings-dates-container.type3 [class*="date-container"]:hover span,
      .wdt-listings-dates-container.type4 [class*="date-container"]:hover,
      .wdt-listings-dates-container.type5 [class*="date-container"]:hover,
      .wdt-listings-attachment-holder.type2
        .wdt-listings-attachment-box-item:hover
        span,
      .wdt-listings-attachment-holder.type3
        .wdt-listings-attachment-box-item:hover,
      .wdt-listings-attachment-holder.type4
        .wdt-listings-attachment-box-item:hover,
      .wdt-listings-image-gallery-container
        .wdt-swiper-bullet-pagination.swiper-pagination-bullets
        .swiper-pagination-bullet,
      .wdt-listings-media-videos-container
        .wdt-swiper-bullet-pagination.swiper-pagination-bullets
        .swiper-pagination-bullet,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        > div.wdt-listings-utils-item-holder
        .wdt-listings-utils-item
        > *:hover,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        > div:not(.wdt-listings-taxonomy-container)
        a.wdt-listings-utils-favourite-item:hover
        span,
      .wdt-listings-item-wrapper.type6:not(.has-post-thumbnail):hover
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section,
      .wdt-listings-item-wrapper.type6:not(.has-post-thumbnail):hover
        .wdt-listings-item-top-section
        div.wdt-listings-featured-item-container
        a {
        background-color: #2fa5fb;
      }
      .wdt-listings-author-container[class*="swiper-container-"]
        .wdt-listings-author-details-holder:hover,
      .wdt-announcement-listing-holder.contactus a:hover,
      .wdt-listings-contactdetails-request-container.type2 > a:hover,
      .wdt-listings-contactdetails-request-container.type3 > a:hover,
      .wdt-listings-attachment-holder.type3
        .wdt-listings-attachment-box-item:hover,
      .wdt-listings-dates-container.type4 [class*="date-container"]:hover,
      .dismissButton:hover:hover,
      .wdt-listings-features-box-container:not(.listing).type7
        .wdt-listings-features-box-item,
      .wdt-listings-post-dates-container.type3
        .wdt-listings-post-date-container,
      .wdt-listings-attachment-holder.type3 .wdt-listings-attachment-box-item {
        border-color: #2fa5fb;
      }
      .wdt-listings-item-wrapper.type3:not(.wdt-list):hover
        .wdt-listings-item-top-section
        div.wdt-listings-featured-item-container
        a {
        box-shadow: inset 0 0 0 0px #2fa5fb;
      }
      input[type="submit"]:hover,
      button:hover,
      input[type="button"]:hover,
      input[type="reset"]:hover {
        background-color: #2fa5fb;
      }
      .wdt-packages-item-wrapper.type2
        .wdt-packagelist-view-details
        .custom-button-style,
      .wdt-listings-item-wrapper.type6:not(.has-post-thumbnail)
        .wdt-listings-item-bottom-section
        .wdt-listings-utils-item-holder,
      .wdt-listings-item-wrapper.type2
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container
        a:before,
      .wdt-listings-item-wrapper.type5:hover
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container:before,
      .single-wdt_packages .wdt_packages > img,
      .wdt-listings-item-wrapper.type1
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        .wdt-listings-utils-item-holder
        > div
        a:hover,
      .wdt-listings-item-wrapper.type5:hover
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container
        a:before,
      p.login-remember input[type="checkbox"] ~ label:before,
      .wdt-listings-item-wrapper.type6
        .wdt-listings-item-bottom-section
        .wdt-listings-taxonomy-list
        li
        a
        span {
        color: #d2edf8;
      }
      .wdt-packages-item-wrapper h5:before,
      .wdt-listings-item-wrapper.type1:hover
        .wdt-listings-item-bottom-section-content
        .custom-button-style.wdt-listing-view-details,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-item-bottom-section
        > div.wdt-listings-item-bottom-pricing-holder
        .custom-button-style,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        > div
        a,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        > div.wdt-listings-utils-item-holder
        .wdt-listings-utils-item
        > *,
      .wdt-listings-item-wrapper.type6:not(.has-post-thumbnail):hover
        .wdt-listings-item-bottom-section
        .wdt-listings-utils-item-holder
        a.wdt-listings-utils-favourite-item,
      .wdt-sf-pricerange-field-holder > div > div[class*="-handle"],
      .wdt-sf-features-field-holder > div > div[class*="-handle"],
      .wdt-sf-features-field-holder
        .ui-widget.ui-widget-content
        .ui-widget-header,
      .wdt-swiper-arrow-pagination a:hover,
      .wdt-marker-addition-info.wdt-marker-addition-info-totalviews,
      .wdt-marker-addition-info.wdt-marker-addition-info-averageratings,
      .wdt-marker-addition-info.wdt-marker-addition-info-startdate,
      .wdt-marker-addition-info.wdt-marker-addition-info-distance,
      .wdt-listing-taxonomy-item.type7
        .wdt-listing-taxonomy-starting-price:after,
      .wdt-listings-item-wrapper:hover
        .wdt-listings-item-top-section
        .wdt-listings-item-ad-section,
      .wdt-listings-item-wrapper:hover
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container
        a,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-top-section
        .wdt-listings-item-ad-section,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-top-section
        .wdt-listings-featured-item-container,
      .wdt-listings-item-wrapper.type3
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section:after,
      .wdt-listings-item-wrapper.type3
        .wdt-listings-item-top-section
        div.wdt-listings-featured-item-container
        a:after,
      .wdt-listings-item-wrapper.type3:hover
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section:before,
      .wdt-listings-item-wrapper.type3:hover
        .wdt-listings-item-top-section
        div.wdt-listings-featured-item-container
        a:before,
      .wdt-listings-floorplan-top-section,
      .wdt-listings-contactdetails-request-container.type3 > a,
      .wdt-listings-contactdetails-container.type2
        .wdt-listings-contactdetails-list
        > li
        span,
      .wdt-announcement-listing-holder.contactus:hover,
      .wdt-listings-dates-container.type4 [class*="date-container"],
      .wdt-listings-countdown-timer-container.type2
        .wdt-listings-countdown-timer-holder
        .wdt-listings-countdown-timer-notice
        span,
      .wdt-listings-attachment-holder.type2
        .wdt-listings-attachment-box-item:hover
        span,
      .wdt-listings-image-gallery-container
        .wdt-listings-swiper-pagination-holder
        .wdt-swiper-progress-pagination,
      .wdt-listings-image-gallery-container
        .wdt-listings-swiper-pagination-holder
        .wdt-swiper-scrollbar,
      .wdt-listings-media-videos-container
        .wdt-listings-swiper-pagination-holder
        .wdt-swiper-progress-pagination,
      .wdt-listings-media-videos-container
        .wdt-listings-swiper-pagination-holder
        .wdt-swiper-scrollbar,
      .wdt-packages-item-wrapper:before,
      .single-wdt_packages .wdt-packagelist-items h3:before,
      .single-wdt_packages .wdt-payment-details .wdt-item-status-details > span,
      .wdt-listings-item-wrapper.type2:hover
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section:after,
      .wdt-listings-item-wrapper.type2:hover
        .wdt-listings-item-top-section
        div.wdt-listings-item-ad-section:before,
      .wdt-sf-fields-holder.wdt-sf-pricerange-field-holder
        .ui-widget.ui-widget-content,
      .wdt-listing-taxonomy-item.type6 .wdt-category-total-items a:hover,
      .wdt-comment-form-fields-holder input#wdt_media + label,
      .wdt-user-list-item.type3 .wdt-user-contactdetails-list li:hover span,
      .wdt-user-list-item.type3
        .wdt-user-item-meta-data
        .wdt-listings-social-share-container.active
        .wdt-listings-social-share-list,
      .wdt-listings-features-box-container.type5
        .wdt-listings-features-box-item,
      .wdt-announcement-listing-holder,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-item-top-section
        .wdt-listings-item-top-section-content
        > div:not(.wdt-listings-taxonomy-container)
        a.wdt-listings-utils-favourite-item
        span,
      .wdt-listings-item-wrapper.type6
        .wdt-listings-item-bottom-section
        .wdt-listings-utils-item-holder
        a.wdt-listings-utils-favourite-item
        span:hover,
      .wdt-sf-fields-holder .ui-widget.ui-widget-content,
      .wdt-dashbord-section-holder-content
        ul.wdt-dashbord-inbox-listing-messages-wrapper
        li.active,
      .wdt-dashbord-section-holder-content
        ul.wdt-dashbord-inbox-listing-messages-wrapper
        li:hover,
      .wdt-listings-business-hours-container
        .wdt-listings-business-hours-currenttime,
      .wdt-listings-claim-form
        > .wdt-listings-claim-form-item
        input#wdt-claimform-verification-file
        + label {
        background-color: #d2edf8;
      }
      .wdt-listings-item-wrapper,
      .wdt-listings-item-wrapper.type1
        .wdt-listings-item-bottom-section-content
        > div.wdt-listings-item-bottom-right-content,
      .wdt-packages-item-wrapper,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-item-bottom-section
        .wdt-listings-item-bottom-section-content
        .wdt-listings-item-title,
      .wdt-packages-item-wrapper.type1 .wdt-packagelist-view-details-button,
      .wdt-packages-item-wrapper.type1
        .wdt-item-status-details
        .wdt-proceed-button
        .custom-button-style,
      .wdt-packages-item-wrapper.type2 > ul.wdt-packagelist-features,
      .wdt-packages-item-wrapper.type3 .wdt-packagelist-details,
      .wdt-packages-item-wrapper.type1
        .wdt-item-status-details
        .wdt-proceed-button
        .added_to_cart,
      .wdt-listings-item-wrapper.type4
        .wdt-listings-features-box-container
        > div:not(:last-child),
      .wdt-listings-item-wrapper.type5
        .wdt-listings-item-bottom-section-content
        > div
        .wdt-listings-utils-item
        .wdt-listings-utils-totalimages-item
        a,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-bottom-section-content
        .wdt-listings-item-bottom-right-content
        .wdt-listings-utils-item-holder
        .wdt-listings-utils-item
        .wdt-listings-utils-totalimages-item
        a,
      .wdt-listing-taxonomy-item.type4,
      .wdt-user-list-item.type3,
      .wdt-user-list-item.type3 .wdt-user-contactdetails-list li span,
      .wdt-swiper-arrow-pagination a,
      .wdt-marker-info-box
        .wdt-listings-map-item-wrapper.type3
        .wdt-listings-item-bottom-section
        .wdt-listings-item-title,
      .wdt-listing-taxonomy-item.type4 .wdt-listing-taxonomy-starting-price,
      .wdt-listings-item-wrapper.type7
        .wdt-listings-item-bottom-section-content
        .wdt-listings-item-bottom-left-content
        .wdt-listings-post-dates-container,
      .wdt-dashbord-recent-activites-holder
        .wdt-dashbord-recent-activites-content
        p,
      .wdt-listings-comment-list-holder .comment-body,
      .comment-form .wdt-comment-form-fields-holder .wdt-ratings-holder,
      .wdt-marker-info-box
        .wdt-listings-map-item-wrapper.type3
        .wdt-listings-item-bottom-section
        .wdt-listings-item-title,
      .wdt-listings-floorplan-box-container .wdt-listings-floorplan-box-item,
      .wdt-listings-business-hours-container,
      .wdt-listings-business-hours-container
        .wdt-listings-business-hours-status,
      .wdt-listings-business-hours-container
        .wdt-listings-business-hours-list
        li,
      .wdt-listings-dates-container.type1,
      .wdt-listings-dates-container.type1 > div:not(:last-child),
      .wdt-listings-dates-container.type1 .wdt-listings-business-hours-list,
      .wdt-listings-dates-container.type1 .wdt-listings-business-hours-list li,
      .wdt-listings-image-gallery-thumb-container
        .wdt-listings-image-gallery-thumb
        .swiper-slide:hover:after,
      .wdt-listings-media-videos-thumb-container
        .wdt-listings-media-videos-thumb
        .swiper-slide:hover:after,
      .single-wdt_packages .wdt-payment-details .wdt-item-status-details,
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-item-wrapper,
      .wdt-sf-fields-holder .ui-widget-content .ui-state-default.ui-state-hover,
      .wdt-listing-taxonomy-item.type6 .wdt-category-total-items a:hover,
      .wdt-user-list-item.type3
        .wdt-user-item-meta-data
        .wdt-listings-utils-favourite,
      .wdt-listings-features-box-container.type4
        .wdt-listings-features-box-item:not(:last-child),
      .wdt-listings-features-box-container.type7
        .wdt-listings-features-box-item,
      .wdt-listings-countdown-timer-container.type2
        .wdt-listings-countdown-timer-holder
        .wdt-listings-countdown-timer-notice,
      .wdt-announcement-listing-holder.contactus,
      .wdt-announcement-listing-holder.contactus:hover,
      .wdt-dashbord-section-holder-content
        ul.wdt-dashbord-inbox-listing-messages-wrapper
        li.active,
      .wdt-dashbord-section-holder-content
        ul.wdt-dashbord-inbox-listing-messages-wrapper
        li:hover {
        border-color: #d2edf8;
      }
      .wdt-listings-nearby-places-container
        .wdt-listings-nearby-places-item:not(:last-child),
      .wdt-listings-author-container .wdt-listings-author-details-holder,
      .wdt-packages-item-wrapper.type2 .wdt-packagelist-details,
      #primary.page-with-sidebar
        .wdt-packages-item-wrapper.type2
        .wdt-packagelist-details {
        border-color: #d2edf8;
      }
      .wdt-listings-item-wrapper.type1
        .wdt-listings-item-bottom-section-content
        .custom-button-style.wdt-listing-view-details,
      .wdt-listings-item-wrapper.type2
        .wdt-listings-item-bottom-section-content
        > div.wdt-listings-item-bottom-pricing-holder {
        border-top-color: #d2edf8;
      }
      .wdt-packages-item-wrapper:hover,
      .wdt-packages-item-wrapper.type1:hover
        .wdt-packagelist-view-details-button,
      .wdt-packages-item-wrapper.type1:hover
        .wdt-item-status-details
        .wdt-proceed-button
        .custom-button-style,
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
      .wdt-listings-nearby-places-container
        .wdt-listings-nearby-places-item
        .wdt-listings-nearby-places-image,
      .wdt-yelp-places-container .wdt-yelp-places-item .wdt-yelp-places-image,
      .wdt-listings-taxonomy-container.type7 li a:hover {
        box-shadow: 0 0 30px 0 #d2edf8;
      }
      .wdt-packages-item-container.swiper-wrapper
        .wdt-packages-item-wrapper:hover,
      .wdt-packages-item-container.swiper-wrapper
        .wdt-packages-item-wrapper.type1:hover
        .wdt-item-status-details
        .wdt-proceed-button
        .custom-button-style,
      .wdt-packages-item-container.swiper-wrapper
        .wdt-packages-item-wrapper.type1:hover
        .wdt-packagelist-view-details-button {
        box-shadow: 0 0 20px 0 #d2edf8;
      }
      .wdt-user-list-item.type3 .wdt-user-contactdetails-list li span,
      .wdt-listings-author-container
        .wdt-listings-author-details-holder
        .wdt-listings-author-details
        .wdt-listings-contactdetails-list
        li
        span {
        box-shadow: inset 0 0 0 2px #d2edf8;
      }
      .wdt-listings-media-videos-container.swiper-container
        div[class*="wdt-swiper-arrow-pagination"].type2
        > a[class*="wdt-swiper-arrow"] {
        background-color: rgba(30, 48, 110, 0.5);
      }
      .wdt-listings-media-videos-container.swiper-container
        div[class*="wdt-swiper-arrow-pagination"].type2
        > a[class*="wdt-swiper-arrow"]:hover,
      .wdt-listings-image-gallery-container.swiper-container
        div[class*="wdt-swiper-arrow-pagination"].type2
        > a[class*="wdt-swiper-arrow"]:hover {
        background-color: rgba(30, 48, 110, 0.6);
      }
      .wdt-listings-image-gallery-container.swiper-container
        div[class*="wdt-swiper-arrow-pagination"].type2
        > a[class*="wdt-swiper-arrow"] {
        background-color: rgba(30, 48, 110, 0.15);
      }
      .wdt-listings-item-wrapper.type6.has-post-thumbnail
        .wdt-listings-item-top-section
        .wdt-listings-feature-image-holder:before,
      .wdt-listings-item-wrapper.type6.has-post-thumbnail
        .wdt-listings-item-top-section
        .wdt-listings-image-gallery
        .swiper-slide:before {
        background-color: rgba(30, 48, 110, 0.8);
      }
      .lidd_mc_details .lidd_mc_summary p:not(:last-child),
      .lidd_mc_details .lidd_mc_results p,
      .wdt-listing-taxonomy-item.type4:hover,
      .wdt-listing-taxonomy-item.type4:hover
        .wdt-listing-taxonomy-starting-price,
      .wdt-user-list-item.type2 .wdt-user-image img,
      .wdt-dashbord-section-holder-content
        ul.wdt-dashbord-inbox-listing-messages-wrapper
        li:hover
        span,
      .wdt-dashbord-section-holder-content
        ul.wdt-dashbord-inbox-listing-messages-wrapper
        li.active
        span {
        border-color: rgba(47, 165, 251, 0.2);
      }
      .wdt-listings-features-box-container:not(.listing).type7
        .wdt-listings-features-box-item,
      .wdt-listings-post-dates-container.type3
        .wdt-listings-post-date-container,
      .wdt-listings-attachment-holder.type3 .wdt-listings-attachment-box-item {
        background-color: rgba(47, 165, 251, 0.3);
      }
      .wdt-dashbord-container
        .wdt-packages-container
        .wdt-packages-item-wrapper:hover,
      .wdt-dashbord-container
        .wdt-my-listings-container
        .wdt-listing-item-wrapper:hover {
        background-color: rgba(210, 237, 248, 0.135);
      }
      .lidd_mc_details,
      .wdt-listing-taxonomy-item.type4:hover,
      .wdt-listings-nearby-places-container:hover
        .wdt-listings-nearby-places-item
        .wdt-listings-nearby-places-image {
        background-color: rgba(210, 237, 248, 0.5);
      }
    </style>
    <link
      rel="stylesheet"
      id="b549b30414ed46447538ef1d3a028552-css"
      href="../css?family=Red+Hat+Display:300,400,500,600,700,800,900,300italic,italic,500italic,600italic,700italic,800italic,900italic&#038;subset=latin-ext"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="9cf5893edf1d7e4d60526d4dd68092d4-css"
      href="../css-1?family=DM+Sans:100,200,300,400,500,600,700,800,900&#038;subset=latin-ext"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="3313e79ffe037d389688456f7efde7a0-css"
      href="../css-2?family=Manrope:200,300,400,500,600,700,800&#038;subset=latin-ext"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-lms-css"
      href="wp-content/themes/lizza-lms/style.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
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
    <link
      rel="stylesheet"
      id="lizza-icons-css"
      href="wp-content/themes/lizza-lms/assets/css/icons.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-base-css"
      href="wp-content/themes/lizza-lms/assets/css/base.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-grid-css"
      href="wp-content/themes/lizza-lms/assets/css/grid.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-layout-css"
      href="wp-content/themes/lizza-lms/assets/css/layout.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-widget-css"
      href="wp-content/themes/lizza-lms/assets/css/widget.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-additional-css-css"
      href="wp-content/themes/lizza-lms/assets/css/additional-css.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="site-breadcrumb-css"
      href="wp-content/plugins/lizza-lms-plus/modules/breadcrumb/assets/css/breadcrumb.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="site-header-css"
      href="wp-content/plugins/lizza-lms-plus/modules/header/assets/css/header.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="site-loader-css"
      href="wp-content/plugins/lizza-lms-plus/modules/site-loader/layouts/loader-1/assets/css/loader-1.css?ver=1.0.2"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="site-sidebar-css"
      href="wp-content/plugins/lizza-lms-pro/modules/sidebar/assets/css/sidebar.css?ver=1.0.0"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-blog-css"
      href="wp-content/themes/lizza-lms/modules/blog/assets/css/blog.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="wdt-blog-archive-simple-css"
      href="wp-content/themes/lizza-lms/modules/blog/templates/simple/assets/css/blog-archive-simple.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="jquery-bxslider-css"
      href="wp-content/themes/lizza-lms/modules/blog/assets/css/jquery.bxslider.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-breadcrumb-css"
      href="wp-content/themes/lizza-lms/modules/breadcrumb/assets/css/breadcrumb.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-comments-css"
      href="wp-content/themes/lizza-lms/modules/comments/assets/css/comments.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-footer-css"
      href="wp-content/themes/lizza-lms/modules/footer/assets/css/footer.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-header-css"
      href="wp-content/themes/lizza-lms/modules/header/assets/css/header.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-pagination-css"
      href="wp-content/themes/lizza-lms/modules/pagination/assets/css/pagination.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-magnific-popup-css"
      href="wp-content/themes/lizza-lms/modules/post/assets/css/magnific-popup.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-quick-search-css"
      href="wp-content/themes/lizza-lms/modules/search/assets/css/search.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-secondary-css"
      href="wp-content/themes/lizza-lms/modules/sidebar/assets/css/sidebar.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-woo-css"
      href="wp-content/themes/lizza-lms/modules/woocommerce/assets/css/default.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <style id="lizza-woo-cart-notification-inline-css" type="text/css">
      /*--------------------------------------------------------------*/
      /* #region - Add-to-Cart Notification Widget */
      /*--------------------------------------------------------------*/

      .wdt-shop-cart-widget.cart-notification-widget,
      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-inner,
      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-content {
        float: left;
        width: 100%;
      }

      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-close-button {
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

      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-close-button:before {
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

      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-inner {
        padding: 20px;
      }
      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-content
        > * {
        display: table-cell;
        vertical-align: middle;
      }
      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-content-thumb {
        line-height: 0;
        padding: 0 10px;
        width: 120px;
      }
      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-content-info {
        padding: 5px 10px;
        text-align: left;
      }

      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-content-thumb
        a,
      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-content-thumb
        a
        img {
        display: block;
        width: 100%;
      }

      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-content-info
        a {
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

      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-close-button:before {
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
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-header
        h3
        span,
      .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header a {
        height: 45px;
        position: absolute;
        top: 0;
        text-align: center;
        width: 45px;
      }

      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-header
        h3
        span {
        font-size: 18px;
        right: 0;
      }

      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-header
        h3
        a {
        font-size: 0;
        line-height: 0;
        margin-right: 1px;
        overflow: hidden;
        right: 100%;
        text-indent: -9999px;
        -webkit-transform: translateX(100%);
        transform: translateX(100%);
      }

      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-header
        h3
        a:before {
        content: "\2716";
        display: block;
        font-size: 15px;
        font-weight: normal;
        line-height: 45px;
        text-indent: 0;
      }

      .wdt-shop-cart-widget[class*="sidebar"].activate-sidebar-widget:hover
        .wdt-shop-cart-widget-header
        h3
        a {
        -webkit-transform: translateX(0);
        transform: translateX(0);
      }

      .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content {
        float: left;
        width: 100%;
      }

      .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-inner,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li {
        float: left;
        width: 100%;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .total {
        padding: 0 15px;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li {
        border-width: 1px 0;
        display: inline;
        margin: -1px 0 0 !important;
        padding: 15px 25px 15px 50px;
        position: relative;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li:first-child {
        border-top-width: 0;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li:last-child {
        border-bottom-width: 0;
      }

      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li
        a:not(.remove) {
        font-weight: 600;
      }

      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li
        a
        img {
        margin: auto;
        position: absolute;
        left: 0;
        top: 16px;
        width: 40px;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li
        a.remove {
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
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li
        a.remove:not(:focus) {
        text-decoration: none;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li:before {
        content: none !important;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li
        .quantity {
        display: table;
        margin: 0;
        font-size: 14px;
      }

      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer::before {
        content: "";
        height: 1px;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        width: auto;
        z-index: -1;
      }

      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer
        p {
        height: 50px;
        line-height: 50px;
        margin: 0;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer
        p.total {
        padding: 0 15px;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer
        p.total
        strong {
        float: left;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer
        p.total
        .amount {
        float: right;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer
        p.buttons {
        display: flex;
        grid-gap: 1px;
      }
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer
        p.buttons
        a {
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

      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart__empty-message {
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
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li {
        border-style: solid;
      }

      .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li
        a.remove,
      .wdt-shop-cart-widget-overlay {
        opacity: 0;
        visibility: hidden;
      }

      .wdt-shop-cart-widget[class*="sidebar"].activate-sidebar-widget:hover
        .wdt-shop-cart-widget-header
        h3
        a,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li:hover
        a.remove,
      .wdt-shop-cart-widget.activate-sidebar-widget.wdt-shop-cart-widget-active
        + .wdt-shop-cart-widget-overlay {
        opacity: 1;
        visibility: visible;
      }

      /* Default Color - Colors */
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li
        a:not(.remove):not(:hover),
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer
        p.total
        .amount {
        color: var(--wdtHeadAltColor);
      }

      .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3,
      .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-header
        h3
        a:hover {
        color: var(--wdtAccentTxtColor);
      }

      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li
        a.remove {
        color: var(--wdtAccentTxtColor) !important;
      }

      /* Default Color - Borders */
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer::before {
        -webkit-box-shadow: 0 2px 6px 0 rgba(var(--wdtHeadAltColorRgb), 0.5);
        box-shadow: 0 2px 6px 0 rgba(var(--wdtHeadAltColorRgb), 0.5);
      }

      .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header,
      .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header a,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li {
        border-color: rgba(var(--wdtHeadAltColorRgb), 0.075);
      }

      /* Default Color - BG */
      .wdt-shop-cart-widget.activate-sidebar-widget {
        background-color: #f7f7f7;
      }

      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer {
        background-color: var(--wdtBodyBGColor);
      }

      .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer
        p.buttons
        a.checkout,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li
        a.remove,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer
        p.buttons
        a:not(.checkout),
      .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .woocommerce-mini-cart-footer
        p.buttons
        a:hover,
      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-close-button {
        background-color: var(--wdtHeadAltColor);
      }

      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-header
        h3
        span {
        background-color: rgba(var(--wdtBodyBGColorRgb), 0.15);
      }

      .wdt-shop-cart-widget.cart-notification-widget
        .wdt-shop-cart-widget-close-button:hover,
      .wdt-shop-cart-widget[class*="sidebar"]
        .wdt-shop-cart-widget-content
        .product_list_widget
        li
        a.remove:hover {
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
        .wdt-shop-cart-widget.cart-notification-widget
          .wdt-shop-cart-widget-content
          > * {
          display: table;
          margin: auto;
          text-align: center !important;
        }

        .wdt-shop-cart-widget.cart-notification-widget
          .wdt-shop-cart-widget-content-info {
          font-size: 11px;
        }
        .wdt-shop-cart-widget.cart-notification-widget
          .wdt-shop-cart-widget-content-info
          a {
          font-size: 13px;
        }

        .wdt-shop-cart-widget[class*="sidebar"]
          .wdt-shop-cart-widget-header
          h3
          a {
          right: 0;
          -webkit-border-radius: 50%;
          border-radius: 50%;
          -webkit-transform: scale(0);
          transform: scale(0);
        }

        .wdt-shop-cart-widget[class*="sidebar"].activate-sidebar-widget:hover
          .wdt-shop-cart-widget-header
          h3
          a {
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
    <link
      rel="stylesheet"
      id="lizza-plus-blog-css"
      href="wp-content/plugins/lizza-lms-plus/modules/blog/assets/css/blog.css?ver=1.0.2"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtplugin-nav-menu-animations-css"
      href="wp-content/plugins/lizza-lms-plus/modules/menu/assets/css/nav-menu-animations.css?ver=1.0.2"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtplugin-nav-menu-css"
      href="wp-content/plugins/lizza-lms-plus/modules/menu/assets/css/nav-menu.css?ver=1.0.2"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-pro-advance-field-css"
      href="wp-content/plugins/lizza-lms-pro/modules/advance-field/assets/css/style.css?ver=1.0.0"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-pro-blog-css"
      href="wp-content/plugins/lizza-lms-pro/modules/blog/assets/css/blog.css?ver=1.0.0"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-pro-auth-css"
      href="wp-content/plugins/lizza-lms-pro/modules/auth/assets/css/style.css?ver=1.0.0"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="jquery-select2-css"
      href="wp-content/themes/lizza-lms/assets/lib/select2/select2.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lizza-theme-css"
      href="wp-content/themes/lizza-lms/assets/css/theme.css?ver=1.0.7"
      type="text/css"
      media="all"
    />
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
      .main-title-section-wrapper.overlay-wrapper.dark-bg-breadcrumb
        > .main-title-section-bg,
      .main-title-section-wrapper.overlay-wrapper > .main-title-section-bg,
      .main-title-section-wrapper.dark-bg-breadcrumb > .main-title-section-bg,
      .main-title-section-wrapper > .main-title-section-bg {
        background-image: url("wp-content/uploads/sites/12/2024/02/pricing-breadcrumb-1.jpg");
        background-attachment: inherit;
        background-position: center top;
        background-size: cover;
        background-repeat: repeat;
        background-color: var(--wdtTertiaryColor);
      }
    </style>
    <link
      rel="stylesheet"
      id="dtlms-default-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/themes/default.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="jquery-ui-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/jquery-ui.min.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="scrolltabs-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/scrolltabs.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtlms-common-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/common.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtlms-frontend-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtlms-gridlist-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/gridlist-items.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtlms-single-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/single-items.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtlms-google-fonts-css"
      href="../css-3?family=Poppins&#038;ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtlms-theme-default-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/css/themes/default.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtlms-quiz-frontend-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/quiz/assets/quiz-frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtlms-class-frontend-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/class/assets/class-frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtlms-certificate-frontend-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/certificate/assets/certificate-frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtlms-badge-frontend-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/badge/assets/badge-frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="dtlms-assignment-frontend-css"
      href="wp-content/plugins/lizza-wedesigntech-lms-addon/modules/assignment/assets/assignment-frontend.css?ver=6.8.3"
      type="text/css"
      media="all"
    />
    <style id="dtlms-skin-inline-css" type="text/css">
      .dtlms-login-form-container .dtlms-login-form .dtlms-title.dtlms-login-title:after, .dtlms-class-registration-form-container .dtlms-class-registration-form-inner 			.dtlms-title.dtlms-registration-title:after, .dtlms-title:after, .dtlms-total-items .dtlms-total-item-title, .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a, .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a, .page-template-default.page .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a, .page-template-default.page .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a, div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button, div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button > a.dtlms-cart-link:hover, div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button > .dtlms-cart-link.dtlms-button:hover, .dtlms-button, .dtlms-badge-certificate-holder a.dtlms-generate-certificate-content, .dtlms-item-status-details > .dtlms-package-proceed-button > a, .dtlms-package-pricing-details > .dtlms-package-proceed-button > a, .dtlms-payment-details .dtlms-item-status-details .dtlms-proceed-button > a, .dtlms-tabs-vertical-content .dtlms-course-detail-group-section .action > .group-button, div[class$="share-holder"] ul li a, .dtlms-author-details .dtlms-author-description .dtlms-author-contact-details > li > a, .dtlms-tabs-horizontal-content #comments .reply .comment-reply-link, .dtlms-tabs-vertical-content #comments .reply .comment-reply-link, .dtlms-class-single #comments .reply .comment-reply-link, .dtlms-course-single #comments .reply .comment-reply-link, .dtlms-tabs-horizontal-content .dtlms-course-detail-group-section .action > .group-button a, .dtlms-tabs-vertical-content .dtlms-course-detail-group-section .action > .group-button a, .dtlms-course-detail.type3 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a:after, .dtlms-class-detail.type3 .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a:after, .dtlms-tabs-vertical-container ul.dtlms-tabs-vertical > li > a.current:after, .dtlms-quiz-questions .dtlms-boolean input[type="checkbox"]:checked + label:after, .dtlms-quiz-questions .dtlms-boolean input[type="radio"]:checked + label::after, .dtlms-quiz-questions ul:not(.dtlms-question-image-options) li input[type="checkbox"]:checked + label::after, .dtlms-quiz-questions ul:not(.dtlms-question-image-options) li input[type="radio"]:checked + label:after, div[class*="listing-filters"] > div[class$="filter"] > ul > li > input[type="checkbox"]:checked + label:after, div[class*="listing-filters"] > div[class$="filter"] > ul > li > input[type="radio"]:checked + label:after, .dtlms-course-category-item.type2:after, .dtlms-course-category-item.type5 .dtlms-course-category-meta-data:before, .dtlms-instructor-item.type4:after, .dtlms-instructor-item.type4:hover:before, .dtlms-course-category-item.type5 .dtlms-category-total-items, div[class*="listing-holder"] div[class*="display-filter"] a[class*="display-type"].active, .dtlms-apply-isotope div[class*="listing-isotope-filter"] a:hover:after, .dtlms-apply-isotope div[class*="listing-isotope-filter"] a.active-sort:after, .dtlms-pagination.dtlms-ajax-pagination .prev-post a:hover, .dtlms-pagination.dtlms-ajax-pagination .next-post a:hover, .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li span, .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a:hover, .swiper-container-horizontal .dtlms-swiper-pagination-holder .dtlms-swiper-arrow-pagination a:hover, #dtlms-course-curriculum-popup .dtlms-curriculum-details .dtlms-curriculum-detailed-links .dtlms-toggle-group-set li.active:before, #dtlms-course-curriculum-popup .dtlms-curriculum-details .dtlms-curriculum-detailed-links .dtlms-toggle-group-set li:hover:before, .dtlms-info-box, ul.dtlms-quiz-statistics-counter li.dtlms-quiz-total-questions, .dtlms-course-detail .dtlms-coursedetail-cart-link, .dtlms-course-detail-author .dtlms-author-contact-details > li > a, .dtlms-class-detail .dtlms-classdetail-cart-link, .dtlms-class-detail-author .dtlms-author-contact-details > li > a, .dtlms-questions-list .dtlms-question-title .dtlms-question-title-counter:before, #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-questions-list-container .dtlms-questions-list .dtlms-answer-hint span, .dtlms-course-detail.type1 .dtlms-toggle-group-set .dtlms-toggle.active, .dtlms-course-detail.type3 .dtlms-toggle-group-set .dtlms-toggle.active, .dtlms-class-detail.type1 .dtlms-toggle-group-set .dtlms-toggle.active, .dtlms-class-detail.type3 .dtlms-toggle-group-set .dtlms-toggle.active, .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li.current a, .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a:hover, .dtlms-quiz-sidebar .dtlms-timer-container h4:before, .dtlms-quiz-sidebar .dtlms-question-counter-holder h4:before, .dtlms-quiz-sidebar .dtlms-question-counter-holder ~ div[class$="box"], #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder > div.dtlms-quiz-results-container h2:before, #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder > div.dtlms-post-quiz-msg, .dtlms-quiz-questions ul.dtlms-question-image-options li.selected .dtlms-quiz-answers-container, #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder > form.formAssignment .dtlms-add-upload-assignment-field, #dtlms-course-curriculum-popup .dtlms-curriculum-details .dtlms-curriculum-detailed-links .dtlms-curriculum-list li .dtlms-curriculum-meta-items .dtlms-curriculum-meta-preview, .dtlms-dashboard-quiz-statistics > .dtlms-column > h6:before, .dtlms-curriculum-content-holder .dtlms-note, #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder ul.dtlms-assignment-submission li .dtlms-four-fifth > ul > li a, .dtlms-instructor-item.type10 .dtlms-team-social-links, #dtlms-course-curriculum-popup:before, #dtlms-course-result-popup:before, #dtlms-course-result-popup .dtlms-course-result-popup-container .dtlms-three-fifth .dtlms-curriculum-assignment-holder ul.dtlms-assignment-submission li .dtlms-four-fifth > ul > li a, .dtlms-tabs-horizontal-content > h2:after, .dtlms-course-result-curriculum-container .dtlms-curriculum-items.active td:last-child:after, .dtlms-title:after, div[class*="dynamic-section-holder"] div[class$="item-details"] > span, .dtlms-class-result-curriculum-container .dtlms-class-curriculum-table tr.active td:last-child:after, .dtlms-course-category-item.type10 .dtlms-course-category-meta-data, .dtlms-course-category-item.type10:hover .dtlms-course-category-meta-data > span, .dtlms-course-category-item.type7 .dtlms-course-category-meta-data:before, .dtlms-course-category-item.type7:hover .dtlms-category-total-items:before, div[class*="listing-holder"] div[class*="listing-filters"] > div[class$="filter"] > ul > li > input[type="checkbox"]:checked + label:before, .dtlms-package-detail .dtlms-package-items table th, .dtlms-course-detail .dtlms-coursedetail-cart-details .added_to_cart, .dtlms-payment-details .dtlms-packagedetail-cart-details > a.added_to_cart, .academy-carousel .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a:hover, .academy-carousel .dtlms-pagination.dtlms-ajax-pagination .prev-post a:hover, .academy-carousel .dtlms-pagination.dtlms-ajax-pagination .next-post a:hover, .dtlms-class-detail .dtlms-classdetail-cart-details .added_to_cart, .type7.dtlms-courselist-item-wrapper .dtlms-courselist-tags a, .dtlms-courselist-item-wrapper .dtlms-courselist-thumb .dtlms-courselist-featured-post, .type10.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-metadata p, .type10.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-right-section, .type3.dtlms-classlist-item-wrapper .dtlms-classlist-bottom-section-right a, /* Packages */ .type2.dtlms-packagelist-item-wrapper .dtlms-packagedetail-cart-details a:hover, .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagelist-inclusion p, .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagedetail-cart-details a, .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-details-inner .dtlms-packagedetail-cart-details > .dtlms-packagedetail-cart-link, .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-details-inner .dtlms-packagedetail-cart-details > .added_to_cart, .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td, .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-present, .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-has-events.tribe-mini-calendar-today, .dtlms-course-detail .tribe-mini-calendar .tribe-events-has-events.tribe-events-present a:hover, .dtlms-course-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar td.tribe-events-has-events.tribe-mini-calendar-today a:hover, .dtlms-course-detail-media-attachment th, .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td, .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-present, .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-has-events.tribe-mini-calendar-today, .dtlms-class-detail .tribe-mini-calendar .tribe-events-has-events.tribe-events-present a:hover, .dtlms-class-detail .widget.tribe_mini_calendar_widget .tribe-mini-calendar td.tribe-events-has-events.tribe-mini-calendar-today a:hover, .dtlms-instructor-item.type1:before, .dt-sc-button.alternate-bg-color.filled:hover, .dtlms-curriculum-list .dtlms-curriculum-meta-preview, .dtlms-course-detail .dtlms-course-detail-content .dtlms-coursedetail-cart-details .dtlms-button:hover, .dtlms-class-detail .dtlms-class-detail-content .dtlms-classdetail-cart-details .dtlms-button:hover, .dt-sc-button.filled.dt-sc-skin-highlight, .dt-sc-button.filled.dt-skin-secondary-bg:hover, .dtlms-default-intro-section h3:after, .type5.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover, .type8.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover, .type1.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover, #avatar-crop-actions a.button, .dt-sc-portfolio-sorting.type9 a.active-sort, .dt-sc-portfolio-sorting.type9 a:hover, .dtlms-default-intro-section h3:before, .dt-sc-newsletter-section .dt-sc-subscribe-frm input[type="submit"], .dt-sc-team.hide-details-show-on-hover.dt-sc-one-course-team li a, div[class$="details-holder"] .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li > span.current, .dtlms-course-detail.type2 .dtlms-course-detail-content-meta > div:before, .swiper-pagination-bullets .swiper-pagination-bullet-active, .swiper-pagination.swiper-pagination-progress .swiper-pagination-progressbar, .swiper-pagination-bullets .swiper-pagination-bullet:hover, body[class*="single-dtlms"] #respond p.form-submit input[type="submit"], .dtlms-login-form-container .dtlms-login-form .dtlms-login-form-holder p #wp-submit, .dtlms-courses-listing-holder input[type="submit"], .dtlms-courses-listing-holder button, .dtlms-courses-listing-holder input[type="button"], .dtlms-classes-listing-holder input[type="submit"], .dtlms-classes-listing-holder button, .dtlms-classes-listing-holder input[type="button"] {
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
      .swiper-container-horizontal
        .dtlms-swiper-pagination-holder
        .dtlms-swiper-arrow-pagination
        a,
      .dtlms-tabs-horizontal-content #comments .reply .comment-reply-link,
      .dtlms-tabs-vertical-content #comments .reply .comment-reply-link,
      .dtlms-class-single #comments .reply .comment-reply-link,
      .dtlms-course-single #comments .reply .comment-reply-link,
      .dtlms-quiz-features-list,
      .dtlms-question .dtlms-title-container,
      .dtlms-questions-list .dtlms-question::before,
      .dtlms-quiz-results-container,
      div[class*="listing-filters"]
        > div[class$="filter"]
        > ul
        > li
        > input[type="radio"]:checked
        + label:before,
      .dtlms-instructor-item.type6 .dtlms-instructor-item-meta-data-detailed,
      body[class*="single-dtlms"] div[class$="certificate-badge"] span,
      .type2.dtlms-packagelist-item-wrapper.grid-item:hover:before,
      .dtlms-course-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        thead.tribe-mini-calendar-nav
        td,
      .dtlms-class-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        thead.tribe-mini-calendar-nav
        td,
      .type1.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a,
      .type1.dtlms-courselist-item-wrapper
        .dtlms-coursedetail-cart-details
        a:hover {
        border-color: rgb(124, 255, 119);
      }
      .dtlms-instructor-item.type3:after,
      #dtlms-course-curriculum-popup:not(.dtlms-curriculum-quiz-lock)
        .dtlms-questions-list-container
        .dtlms-questions-list
        .dtlms-question,
      #dtlms-course-result-popup
        .dtlms-questions-list-container.dtlms-dashboard-questions-list
        .dtlms-questions-list
        .dtlms-question,
      .dtlms-questions-list-container.dtlms-quiz-underprogess
        .dtlms-questions-list
        .dtlms-question:not(.dtlms-questions-oneatatime),
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
      .swiper-container-horizontal
        .dtlms-swiper-pagination-holder
        .dtlms-swiper-arrow-pagination
        a,
      .dt-sc-dark-bg
        .swiper-container-horizontal
        .dtlms-swiper-pagination-holder
        .dtlms-swiper-arrow-pagination
        a:hover,
      .dt-sc-skin-highlight
        .swiper-container-horizontal
        .dtlms-swiper-pagination-holder
        .dtlms-swiper-arrow-pagination
        a:hover,
      .dtlms-instructor-item.type5 .dtlms-instructor-item-meta-data h4 a:hover,
      .dtlms-course-category-item.type2 *:hover,
      .dtlms-classes-listing-holder #dtlms-ajax-load-image .dtlms-loading,
      .dtlms-courses-listing-holder #dtlms-ajax-load-image .dtlms-loading,
      .dt-sc-skin-highlight
        .dtlms-pagination.dtlms-ajax-pagination
        ul.page-numbers
        li
        a,
      .dt-sc-skin-highlight
        .dtlms-pagination.dtlms-ajax-pagination
        .prev-post
        a,
      .dt-sc-skin-highlight
        .dtlms-pagination.dtlms-ajax-pagination
        .next-post
        a,
      .dtlms-course-detail .dtlms-coursedetail-price-details span,
      .dtlms-class-detail .dtlms-classdetail-price-details span,
      #dtlms-course-curriculum-popup
        .dtlms-course-curriculum-popup-container
        .dtlms-four-fifth
        .dtlms-curriculum-content-holder
        > div.dtlms-assignment-details-container
        strong,
      #dtlms-course-curriculum-popup.dtlms-course-curriculum-popup-quiz
        .dtlms-course-curriculum-popup-container
        .dtlms-four-fifth
        .dtlms-curriculum-content-holder
        > div.dtlms-quiz-details-container
        strong,
      #dtlms-course-curriculum-popup.dtlms-course-curriculum-popup-lesson
        .dtlms-course-curriculum-popup-container
        .dtlms-four-fifth
        .dtlms-curriculum-content-holder
        > div.dtlms-lesson-details-container
        strong,
      .dtlms-course-results-main-detail-wrapper
        .dtlms-author-details
        .dtlms-author-image
        img,
      .dtlms-class-results-main-detail-wrapper
        .dtlms-author-details
        .dtlms-author-image
        img,
      .dtlms-course-results-main-detail-wrapper
        .dtlms-author-details
        .dtlms-author-title
        h5
        a:hover,
      .dtlms-class-results-main-detail-wrapper
        .dtlms-author-details
        .dtlms-author-title
        h5
        a:hover,
      .dtlms-package-detail .dtlms-packagelist-price-details ins,
      div[class*="dynamic-section-holder"] p > a,
      .dtlms-course-category-item.type5:hover
        .dtlms-course-category-meta-data
        > img,
      .type2.dtlms-packagelist-item-wrapper
        .dtlms-packagelist-details
        h5
        a:hover,
      .type2.dtlms-packagelist-item-wrapper
        .dtlms-packagelist-price-details
        span,
      .type2.dtlms-packagelist-item-wrapper
        .dtlms-packagelist-inclusion
        p:before,
      .dtlms-class-detail .dtlms-class-detail-info li a:hover,
      .dtlms-course-detail .dtlms-course-detail-info li a:hover,
      .dtlms-course-detail.type2 .dtlms-course-detail-content-meta a:hover,
      .dtlms-instructor-item.type7.default
        .dtlms-team-social-links
        ul
        li
        a:hover,
      .online-learning-carousel
        .type7.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-right-section
        .dtlms-coursedetail-cart-details
        a,
      .online-learning-carousel
        .type7.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-left-section
        .dtlms-coursedetail-price-details
        ins,
      .dtlms-default-intro-section .dt-sc-button.transparent span,
      .dtlms-default-intro-section h3:before,
      .type1.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a,
      .dtlms-course-category-item.type9 h3 a:hover,
      .dtlms-course-detail .dtlms-course-detail-author-title h5 a:hover,
      .dtlms-class-detail.type2 .dtlms-class-detail-author-title h5 a:hover,
      .dtlms-instructor-item.default .dtlms-team-social-links ul li a,
      a.dtlms-button,
      .dtlms-course-detail.type1
        .dtlms-course-detail-content
        .dtlms-coursedetail-cart-details
        a.dtlms-login-link:hover {
        color: rgb(124, 255, 119);
      }
      .dtlms-button:hover, .dtlms-badge-certificate-holder a.dtlms-generate-certificate-content:hover, .dtlms-author-details .dtlms-author-description .dtlms-author-contact-details > li > a:hover, .dtlms-social-logins-container a[class^="dtlms-social"]:hover, .dtlms-payment-details .dtlms-item-status-details .dtlms-proceed-button > a:hover, .dtlms-tabs-vertical-content .dtlms-course-detail-group-section .action > .group-button:hover, div[class$="share-holder"] ul li a:hover, .dtlms-tabs-horizontal-content #comments .reply .comment-reply-link:hover, .dtlms-tabs-vertical-content #comments .reply .comment-reply-link:hover, .dtlms-class-single #comments .reply .comment-reply-link:hover, .dtlms-course-single #comments .reply .comment-reply-link:hover, .dtlms-tabs-horizontal-content .dtlms-course-detail-group-section .action > .group-button a:hover, .dtlms-tabs-vertical-content .dtlms-course-detail-group-section .action > .group-button a:hover, .dtlms-course-category-item.type3:hover, .dtlms-instructor-item.with-bg .dtlms-team-social-links ul li a:hover, .dtlms-course-category-item.type5 .dtlms-course-category-meta-data > span, div[class*="list-item-wrapper"] div[class*="list-thumb"] div[class$="list-overlay"] a.dtlms-button:hover, div[class*="list-item-wrapper"] .dtlms-item-status-details > a:hover, div[class*="list-item-wrapper"] .dtlms-item-status-details > .dtlms-button:hover, div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button > a:hover, div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button > .dtlms-button:hover, div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button > a.dtlms-cart-link, div[class*="list-item-wrapper"] .dtlms-item-status-details .dtlms-proceed-button > .dtlms-cart-link.dtlms-button, div[class*="list-item-wrapper"] div[class*="list-details"] div[class*="list-metadata"] p > span, div[class*="list-item-wrapper"] div[class*="list-details"] div[class*="list-metadata"] p > i, div[class*="listing-containers"] .dtlms-item-status-details .dtlms-item-pricing-details, div[class*="listing-containers"] .dtlms-item-status-details > span, .dtlms-packagelist-item .dtlms-package-pricing-details > span, .dtlms-instructor-item.type5:hover:after, .dtlms-classlist-item-wrapper .dtlms-classlist-details .dtlms-classlist-meta-wrapper .dtlms-class-type, .dtlms-tabs-vertical-content .dtlms-course-detail-total-students span, .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a:hover, .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a:hover, .page-template-default.page .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a:hover, .page-template-default.page .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a:hover, .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a.active, .dtlms-statistics-container .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a.active, .page-template-default.page .dtlms-chart-holder ul.dtlms-purchases-overview-chart-options li a.active, .page-template-default.page .dtlms-chart-holder ul.dtlms-commissions-overview-chart-options li a.active, .dtlms-total-items:hover .dtlms-total-item-title, .dtlms-total-items span, .dt-sc-skin-highlight .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a:hover, .single > #dtlms-course-curriculum-popup:after, .dtlms-course-detail .dtlms-coursedetail-cart-link:hover, .dtlms-course-detail-author .dtlms-author-contact-details > li > a:hover, .dtlms-class-detail .dtlms-classdetail-cart-link:hover, .dtlms-class-detail-author .dtlms-author-contact-details > li > a:hover, #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder > form.formAssignment .dtlms-add-upload-assignment-field:hover, dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder ul.dtlms-assignment-submission li .dtlms-four-fifth > ul > li a:hover, .dtlms-instructor-item.type9 .dtlms-team-social-links ul li a:hover, .dtlms-instructor-item.type10:hover .dtlms-team-social-links,  #dtlms-course-result-popup .dtlms-course-result-popup-container .dtlms-three-fifth .dtlms-curriculum-assignment-holder ul.dtlms-assignment-submission li .dtlms-four-fifth > ul > li a:hover, .dtlms-course-category-item.type10 .dtlms-course-category-meta-data > span, .dtlms-course-category-item.type10:hover .dtlms-course-category-meta-data, .dtlms-course-detail .dtlms-coursedetail-cart-details .added_to_cart:hover, .dtlms-payment-details .dtlms-packagedetail-cart-details > a.added_to_cart:hover, #dtlms-course-curriculum-popup .dtlms-course-curriculum-popup-container .dtlms-four-fifth .dtlms-curriculum-content-holder ul.dtlms-assignment-submission li .dtlms-four-fifth > ul > li a:hover, .dtlms-class-detail .dtlms-classdetail-cart-details .added_to_cart:hover, input.dtlms-button:hover, input.dtlms-button[type="button"]:hover, input.dtlms-button[type="submit"]:hover, .dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover, .type6.dtlms-courselist-item-wrapper.list-item .dtlms-courselist-details .dtlms-coursedetail-cart-details a:hover, .type2.dtlms-courselist-item-wrapper .dtlms-coursedetail-price-details .dtlms-price-status, .type2.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-courselist-bottom-section .dtlms-coursedetail-cart-details a, .type5.dtlms-courselist-item-wrapper .dtlms-coursedetail-price-details .dtlms-cost, .type6.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-coursedetail-price-details ins, .type7.dtlms-courselist-item-wrapper .dtlms-courselist-duration, .type10.dtlms-courselist-item-wrapper .dtlms-courselist-tags:before, .type4.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a, .type5.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a, .type8.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a, .type9.dtlms-courselist-item-wrapper .dtlms-courselist-details .dtlms-coursedetail-cart-details a, .type2.dtlms-classlist-item-wrapper .dtlms-classlist-metadata, .type3.dtlms-classlist-item-wrapper .dtlms-classlist-details .dtlms-classdetail-price-details ins, div[class*="list-item-wrapper"].type10 div[class*="list-details"] div[class*="list-metadata"] p > i, .type3.dtlms-courselist-item-wrapper.list-item .dtlms-coursedetail-cart-details a, .type3.dtlms-classlist-item-wrapper .dtlms-classlist-bottom-section-right a:hover, /* Packages */ .type2.dtlms-packagelist-item-wrapper .dtlms-packagedetail-cart-details a, .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagedetail-cart-details a.added_to_cart, .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagedetail-cart-details a:hover, .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-price-details, .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-details-inner .dtlms-packagedetail-cart-details > .dtlms-packagedetail-cart-link:hover, .type1.dtlms-packagelist-item-wrapper .dtlms-packagelist-details-inner .dtlms-packagedetail-cart-details > .added_to_cart:hover, .dt-sc-button.alternate-bg-color.filled, .wpb_column.dtlms-slider-overlay .dtlms-courses-listing-holder .chosen-container .chosen-results li.active-result.highlighted, .dtlms-course-detail .dtlms-course-detail-content .dtlms-coursedetail-cart-details .dtlms-button, .dtlms-class-detail .dtlms-class-detail-content .dtlms-classdetail-cart-details .dtlms-button, .dt-sc-button.filled.dt-sc-skin-highlight:hover, .dt-sc-button.filled.dt-skin-secondary-bg, #avatar-crop-actions a.button:hover, .dt-sc-newsletter-section .dt-sc-subscribe-frm input[type="submit"]:hover, .dt-sc-team.hide-details-show-on-hover.dt-sc-one-course-team li a:hover, .dtlms-course-category-item.type8 .dtlms-course-category-meta-data > span, .type7.dtlms-courselist-item-wrapper .dtlms-courselist-tags a:hover, body[class*="single-dtlms"] table td#today, body[class*="single-dtlms"] #respond p.form-submit input[type="submit"]:hover, .dtlms-login-form-container .dtlms-login-form .dtlms-login-form-holder p #wp-submit:hover, .dtlms-courses-listing-holder input[type="submit"]:hover, .dtlms-courses-listing-holder button:hover, .dtlms-courses-listing-holder input[type="button"]:hover, .dtlms-classes-listing-holder input[type="submit"]:hover, .dtlms-classes-listing-holder button:hover, .dtlms-classes-listing-holder input[type="button"]:hover {
        background-color: rgb(20, 69, 47);
      }
      .dtlms-instructor-item.type3,
      .dtlms-course-category-item.type6:before,
      .dtlms-tabs-horizontal-content #comments .reply .comment-reply-link:hover,
      .dtlms-tabs-vertical-content #comments .reply .comment-reply-link:hover,
      .dtlms-class-single #comments .reply .comment-reply-link:hover,
      .dtlms-course-single #comments .reply .comment-reply-link:hover,
      .dt-sc-skin-highlight
        .dtlms-pagination.dtlms-ajax-pagination
        ul.page-numbers
        li
        a:hover,
      .dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a:hover,
      .type6.dtlms-courselist-item-wrapper .dtlms-courselist-author-image img,
      .type6.dtlms-courselist-item-wrapper.list-item
        .dtlms-courselist-details
        .dtlms-coursedetail-cart-details
        a,
      .dtlms-instructor-item.type9.default
        .dtlms-team-social-links
        ul
        li
        a:hover,
      .dtlms-instructor-item.type9.vibrant
        .dtlms-team-social-links
        ul
        li
        a:hover {
        border-color: rgb(20, 69, 47);
      }
      .dtlms-instructor-item.type3:hover:after,
      .type6.dtlms-courselist-item-wrapper .dtlms-courselist-thumb {
        border-bottom-color: rgb(20, 69, 47);
      }
      .dtlms-instructor-item.type3:hover:before,
      .dtlms-instructor-item.type4,
      div[class*="list-item-wrapper"] .dtlms-item-status-details > span:before,
      div[class*="list-item-wrapper"]
        .dtlms-item-status-details
        .dtlms-item-pricing-details:before,
      .type1.dtlms-packagelist-item-wrapper
        .dtlms-packagelist-price-details:before {
        border-left-color: rgb(20, 69, 47);
      }
      .dtlms-instructor-item.type3:hover:after {
        border-right-color: rgb(20, 69, 47);
      }
      .dtlms-instructor-item.type3:hover:before {
        border-top-color: rgb(20, 69, 47);
      }
      .dtlms-login-form-container
        .dtlms-login-form
        .dtlms-title.dtlms-login-title
        strong,
      .dtlms-class-registration-form-container
        .dtlms-class-registration-form-inner
        .dtlms-title.dtlms-registration-title
        strong,
      div[class*="list-item-wrapper"]
        div[class*="list-details"]
        div[class*="list-metadata"]
        p
        > a:hover,
      .dtlms-main-title-section-wrapper .dtlms-breadcrumb a:hover,
      .dtlms-course-category-item.type1:hover *,
      .dtlms-course-category-item.type1:hover
        .dtlms-course-category-meta-data
        > span,
      .dtlms-course-category-item.type1:hover
        .dtlms-course-category-meta-data
        .dtlms-category-total-items,
      .dtlms-course-category-item.type4 h3 a:hover,
      .dtlms-instructor-item .dtlms-instructor-item-meta-data h4 a:hover,
      .dtlms-instructor-item.type3 .dtlms-instructor-item-meta-data h4 a:hover,
      .dtlms-instructor-item.type5.with-bg
        .dtlms-team-social-links
        ul
        li
        a:hover,
      .dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-author-details
        .dtlms-author-description
        h5
        a:hover,
      .dtlms-quiz-questions .dtlms-boolean span label:hover,
      .dtlms-quiz-questions
        ul:not(.dtlms-question-image-options)
        li
        label:hover,
      div[class*="listing-filters"]
        > div[class$="filter"]
        > ul
        > li
        > label:hover,
      div[class*="list-item-wrapper"] div[class*="list-details"] h5 a:hover,
      .dtlms-package-single .dtlms-package-items table td > a:hover,
      .dtlms-team-details h4 a:hover,
      .dtlms-course-detail-group-section .item-title a:hover,
      .dtlms-course-news-item .dtlms-course-detail-news-details h5 a:hover,
      .dtlms-review-box .dtlms-average-value,
      body[class*="single-dtlms"] ul.commentlist li .author-name > a:hover,
      #comments #respond h3#reply-title #cancel-comment-reply-link:hover,
      div[class$="details-holder"] ul li a:hover,
      .dtlms-course-results-main-detail-wrapper .dtlms-author-title h5 a:hover,
      .dtlms-curriculum-list li .dtlms-curriculum-meta-title a:hover,
      .dtlms-curriculum-list li .dtlms-curriculum-meta-title a.active,
      .dtlms-curriculum-list li.active > .dtlms-curriculum-meta-title a,
      .dtlms-curriculum-list > li.locked:before,
      .dtlms-mark,
      #dtlms-course-curriculum-popup
        .dtlms-course-curriculum-popup-container:before,
      #dtlms-course-result-popup
        .dtlms-course-curriculum-popup-container:before,
      .dtlms-class-result-popup .dtlms-course-curriculum-popup-container:before,
      .dtlms-course-detail-media-attachment td a:hover,
      .dtlms-course-result-curriculum-container
        table.dtlms-course-curriculum-table
        .dtlms-curriculum-items.active
        td,
      .dtlms-course-result-curriculum-container
        table.dtlms-course-curriculum-table
        .dtlms-curriculum-items.active
        .dtlms-view-curriculum-details,
      #dtlms-course-curriculum-popup:after,
      #dtlms-course-result-popup:after,
      #dtlms-class-result-popup:after,
      .dtlms-package-detail .dtlms-package-items table td a:hover,
      .dtlms-course-detail-news-item
        .dtlms-course-detail-news-details
        h5
        a:hover,
      .type1.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-metadata
        i,
      .dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a,
      .type2.dtlms-courselist-item-wrapper
        .dtlms-coursedetail-price-details
        .dtlms-price-status:before,
      .type1.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-details-inner
        h5
        a:hover,
      .type2.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-details-inner
        h5
        a:hover,
      .type3.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-duration
        i,
      .type4.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-meta
        ul
        li
        span
        a:hover,
      .type4.dtlms-courselist-item-wrapper
        .dtlms-courselist-details-inner
        h5
        a:hover,
      .type4.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-section
        .dtlms-coursedetail-price-details
        ins,
      .type5.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-details-inner
        h5
        a:hover,
      .type5.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-bottom-section
        i,
      .type6.dtlms-courselist-item-wrapper .dtlms-courselist-tags,
      .type6.dtlms-courselist-item-wrapper .dtlms-courselist-tags a,
      .type6.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-bottom-section
        .dtlms-courselist-bottom-left-section
        i,
      .type7.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-right-section
        .dtlms-coursedetail-cart-details
        a:hover,
      .grid-item.type8.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-section
        .dtlms-courselist-metadata
        i,
      .type8.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-section
        .dtlms-coursedetail-price-details
        ins,
      .type9.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-section
        .dtlms-coursedetail-price-details
        ins,
      div[class*="classlist-item-wrapper"]
        div[class*="list-details"]
        h5
        a:hover,
      .type2.dtlms-classlist-item-wrapper
        .dtlms-classlist-bottom-section-left
        .dtlms-classdetail-price-details
        ins,
      .type3.dtlms-classlist-item-wrapper
        .dtlms-classlist-details
        .dtlms-classlist-metadata
        p,
      .type3.dtlms-courselist-item-wrapper.list-item
        .dtlms-courselist-bottom-section
        .dtlms-coursedetail-price-details
        ins,
      .dtlms-login-form-container .dtlms-login-form p.tpl-forget-pwd a,
      .online-learning-carousel
        .type7.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-right-section
        .dtlms-coursedetail-cart-details
        a:hover,
      .dtlms-default-intro-section .dt-sc-button.transparent:hover,
      .dtlms-default-intro-section .dt-sc-button.transparent:hover span,
      .dtlms-course-category-item.type1.alternate-color-on-hover:hover h3 a,
      .type1.dtlms-classlist-item-wrapper
        .dtlms-instructor-item-meta-data
        p
        a:hover,
      .type3.dtlms-classlist-item-wrapper
        .dtlms-instructor-item-meta-data
        p
        a:hover,
      .type8.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-metadata-holder
        h5
        a:hover,
      .dtlms-class-detail .dtlms-class-detail-author-title h5 a:hover,
      .type3.dtlms-courselist-item-wrapper
        .dtlms-courselist-author-description
        h5
        a:hover,
      .type8.dtlms-courselist-item-wrapper
        .dtlms-courselist-author-description
        h5
        a:hover,
      .type10.dtlms-courselist-item-wrapper
        .dtlms-courselist-author-description
        h5
        a:hover,
      .dtlms-course-detail .dtlms-course-detail-author-title h5 a:hover,
      .dtlms-course-results-main-detail-wrapper
        .dtlms-author-details
        .dtlms-author-title
        h5
        a:hover,
      .dtlms-class-results-main-detail-wrapper
        .dtlms-author-details
        .dtlms-author-title
        h5
        a:hover,
      ul.dtlms-custom-login li a:hover,
      .type3.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a {
        color: rgb(20, 69, 47);
      }
      .dtlms-author-details .dtlms-author-title,
      .dt-sc-dark-bg
        ul.dtlms-custom-login.dt-skin-tertiary-color-on-hover
        a:hover {
        color: rgb(242, 248, 241);
      }
      div[class*="list-item-wrapper"] div[class*="list-thumb"] div[class$="list-overlay"] a.dtlms-button, .type9.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-section, .type10.dtlms-courselist-item-wrapper .dtlms-courselist-bottom-left-section, /* Packages */ .type3.dtlms-packagelist-item-wrapper .dtlms-packagelist-details .dtlms-packagedetail-cart-details a.added_to_cart:hover {
        background-color: rgb(242, 248, 241);
      }
      .dtlms-login-form-container
        .dtlms-login-form
        .dtlms-login-form-holder
        p
        #wp-submit,
      .dtlms-total-items,
      .dtlms-total-items .dtlms-total-item-title,
      .dtlms-admin-dashboard table tr td a.dtlms-view-class-result,
      .dtlms-admin-dashboard table tr td a.dtlms-view-course-result,
      .dtlms-statistics-container
        .dtlms-chart-holder
        ul.dtlms-purchases-overview-chart-options
        li
        a,
      .dtlms-statistics-container
        .dtlms-chart-holder
        ul.dtlms-commissions-overview-chart-options
        li
        a,
      .page-template-default.page
        .dtlms-chart-holder
        ul.dtlms-purchases-overview-chart-options
        li
        a,
      .page-template-default.page
        .dtlms-chart-holder
        ul.dtlms-commissions-overview-chart-options
        li
        a,
      .dtlms-button,
      .dtlms-author-details
        .dtlms-author-description
        .dtlms-author-contact-details
        > li
        > a,
      .dtlms-payment-details
        .dtlms-item-status-details
        .dtlms-proceed-button
        > a,
      .dtlms-badge-certificate-holder a.dtlms-generate-certificate-content,
      .dtlms-view-class-result,
      .dtlms-view-course-result,
      .dtlms-social-logins-container a[class^="dtlms-social"],
      div[class$="share-holder"] ul li a,
      body[class*="single-dtlms"] #respond p.form-submit input[type="submit"],
      div[class*="listing-holder"]
        div[class*="display-filter"]
        a[class*="display-type"].active,
      div[class*="list-item-wrapper"]
        div[class*="list-thumb"]
        div[class$="list-overlay"]
        a.dtlms-button,
      div[class*="list-item-wrapper"]
        div[class*="list-details"]
        div[class*="list-metadata"]
        p
        > a,
      .dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-author-details
        .dtlms-author-description
        h5
        a,
      div[class*="list-item-wrapper"] .dtlms-item-status-details > a,
      div[class*="list-item-wrapper"]
        .dtlms-item-status-details
        > .dtlms-button,
      div[class*="list-item-wrapper"]
        .dtlms-item-status-details
        .dtlms-proceed-button
        > a,
      div[class*="list-item-wrapper"]
        .dtlms-item-status-details
        .dtlms-proceed-button
        > .dtlms-button,
      .swiper-container-horizontal
        .dtlms-swiper-pagination-holder
        .dtlms-swiper-arrow-pagination
        a:hover,
      .dtlms-pagination.dtlms-ajax-pagination .prev-post a:hover,
      .dtlms-pagination.dtlms-ajax-pagination .next-post a:hover,
      .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li span,
      .dtlms-pagination.dtlms-ajax-pagination ul.page-numbers li a:hover,
      .dtlms-tabs-horizontal-content #comments .reply .comment-reply-link,
      .dtlms-tabs-vertical-content #comments .reply .comment-reply-link,
      .dtlms-class-single #comments .reply .comment-reply-link,
      .dtlms-course-single #comments .reply .comment-reply-link,
      .dtlms-tabs-horizontal-content
        .dtlms-course-detail-group-section
        .action
        > .group-button
        a,
      .dtlms-tabs-vertical-content
        .dtlms-course-detail-group-section
        .action
        > .group-button
        a,
      .dtlms-timer-container > h4,
      div[class*="list-item-wrapper"]
        div[class*="list-thumb"]
        div[class$="list-overlay"]
        a.dtlms-button,
      .dtlms-course-detail .dtlms-coursedetail-cart-link,
      .dtlms-course-detail-author .dtlms-author-contact-details > li > a,
      .dtlms-questions-list-container
        .dtlms-questions-list
        .dtlms-question
        .dtlms-answer-hint
        span,
      .dtlms-course-detail.type1 .dtlms-toggle-group-set .dtlms-toggle.active a,
      .dtlms-course-detail.type1
        .dtlms-toggle-group-set
        .dtlms-toggle.active:before,
      .dtlms-course-detail.type3 .dtlms-toggle-group-set .dtlms-toggle.active a,
      .dtlms-course-detail.type3
        .dtlms-toggle-group-set
        .dtlms-toggle.active:before,
      .dtlms-class-detail.type1 .dtlms-toggle-group-set .dtlms-toggle.active a,
      .dtlms-class-detail.type1
        .dtlms-toggle-group-set
        .dtlms-toggle.active:before,
      .dtlms-class-detail.type3 .dtlms-toggle-group-set .dtlms-toggle.active a,
      .dtlms-class-detail.type3
        .dtlms-toggle-group-set
        .dtlms-toggle.active:before,
      .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a.current,
      .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a:hover,
      .dtlms-course-category-item.type10 .dtlms-course-category-meta-data h3 a,
      .dtlms-course-category-item.type10:hover
        .dtlms-course-category-meta-data
        > span,
      .dtlms-course-category-item.type7 h3 a,
      .dtlms-course-category-item.type7:hover .dtlms-category-total-items,
      .dtlms-package-detail .dtlms-package-items table th,
      .dtlms-course-detail .dtlms-coursedetail-cart-details .added_to_cart,
      .dtlms-payment-details
        .dtlms-packagedetail-cart-details
        > a.added_to_cart,
      .academy-carousel
        .dtlms-pagination.dtlms-ajax-pagination
        ul.page-numbers
        li
        a:hover,
      .academy-carousel
        .dtlms-pagination.dtlms-ajax-pagination
        .prev-post
        a:hover,
      .academy-carousel
        .dtlms-pagination.dtlms-ajax-pagination
        .next-post
        a:hover,
      .dtlms-course-detail.type1
        .dtlms-tabs-horizontal-container
        ul.dtlms-tabs-horizontal
        li.current
        a,
      .dtlms-course-detail.type1
        .dtlms-tabs-horizontal-container
        ul.dtlms-tabs-horizontal
        li
        a:hover,
      .dtlms-class-detail.type1
        .dtlms-tabs-horizontal-container
        ul.dtlms-tabs-horizontal
        li.current
        a,
      .dtlms-course-detail .dtlms-coursedetail-cart-link,
      .dtlms-course-detail-author .dtlms-author-contact-details > li > a,
      .dtlms-class-detail .dtlms-classdetail-cart-link,
      .dtlms-class-detail-author .dtlms-author-contact-details > li > a,
      .dtlms-tabs-horizontal-container ul.dtlms-tabs-horizontal li a:hover,
      .dtlms-class-detail .dtlms-classdetail-cart-details .added_to_cart,
      input.dtlms-button,
      input.dtlms-button[type="button"],
      input.dtlms-button[type="submit"],
      .dtlms-classlist-item-wrapper .dtlms-class-listing-featured,
      .type10.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-metadata
        p,
      .type10.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-metadata
        p
        a,
      .type10.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-right-section
        ins,
      .type10.dtlms-courselist-item-wrapper .dtlms-price-status.dtlms-free,
      .type7.dtlms-courselist-item-wrapper .dtlms-courselist-tags a,
      .type3.dtlms-packagelist-item-wrapper
        .dtlms-packagelist-details
        .dtlms-packagelist-inclusion
        p,
      .type3.dtlms-packagelist-item-wrapper
        .dtlms-packagelist-details
        .dtlms-packagedetail-cart-details
        a,
      .dtlms-instructor-item.type10 .dtlms-team-social-links ul li a,
      body[class*="single-dtlms"] .dtlms-course-detail-media-attachment th,
      div[class*="dynamic-section-holder"] div[class$="item-details"] > span,
      .dtlms-courses-listing-holder input[type="submit"],
      .dtlms-courses-listing-holder input[type="reset"],
      .dtlms-courses-listing-holder button,
      .dtlms-courses-listing-holder input[type="button"],
      .dtlms-classes-listing-holder input[type="submit"],
      .dtlms-classes-listing-holder input[type="reset"],
      .dtlms-classes-listing-holder button,
      .dtlms-classes-listing-holder input[type="button"],
      .dtlms-course-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        thead.tribe-mini-calendar-nav
        td,
      .dtlms-course-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        .tribe-events-present,
      .dtlms-course-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        .tribe-events-has-events.tribe-mini-calendar-today,
      .dtlms-course-detail
        .tribe-mini-calendar
        .tribe-events-has-events.tribe-events-present
        a:hover,
      .dtlms-course-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        td.tribe-events-has-events.tribe-mini-calendar-today
        a:hover,
      .dtlms-course-detail-media-attachment th,
      .dtlms-class-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        thead.tribe-mini-calendar-nav
        td,
      .dtlms-class-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        .tribe-events-present,
      .dtlms-class-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        .tribe-events-has-events.tribe-mini-calendar-today,
      .dtlms-class-detail
        .tribe-mini-calendar
        .tribe-events-has-events.tribe-events-present
        a:hover,
      .dtlms-class-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        td.tribe-events-has-events.tribe-mini-calendar-today
        a:hover,
      .dtlms-course-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        thead.tribe-mini-calendar-nav
        td
        a,
      .dtlms-class-detail
        .widget.tribe_mini_calendar_widget
        .tribe-mini-calendar
        thead.tribe-mini-calendar-nav
        td
        a,
      #dtlms-course-curriculum-popup
        .dtlms-curriculum-details
        .dtlms-curriculum-detailed-links
        .dtlms-curriculum-list
        li
        .dtlms-curriculum-meta-items
        .dtlms-curriculum-meta-preview,
      .dt-sc-button.alternate-bg-color.filled:hover,
      #dtlms-course-curriculum-popup.dtlms-course-curriculum-popup-assignment
        .dtlms-course-curriculum-popup-container
        .dtlms-four-fifth
        .dtlms-curriculum-content-holder
        > form.formAssignment
        .dtlms-add-upload-assignment-field,
      .dtlms-curriculum-list .dtlms-curriculum-meta-preview,
      .wpb_column.dtlms-slider-overlay
        .dtlms-courses-listing-holder
        .chosen-container
        .chosen-results
        li.active-result.highlighted,
      .dtlms-course-detail
        .dtlms-course-detail-content
        .dtlms-coursedetail-cart-details
        .dtlms-button:hover,
      .dtlms-class-detail
        .dtlms-class-detail-content
        .dtlms-classdetail-cart-details
        .dtlms-button:hover,
      .type2:not(.dtlms_classes)
        .dt-sc-toggle-frame
        h5.dt-sc-toggle-accordion.active
        a,
      .type2:not(.dtlms_classes) .dt-sc-toggle-frame h5.dt-sc-toggle.active a,
      .dt-sc-button.filled.dt-sc-skin-highlight,
      .dt-sc-button.filled.dt-skin-secondary-bg:hover,
      .type8.dtlms-courselist-item-wrapper
        .dtlms-coursedetail-cart-details
        a:hover,
      .type1.dtlms-courselist-item-wrapper
        .dtlms-coursedetail-cart-details
        a:hover,
      .dtlms-class-detail.type4
        .dtlms-tabs-horizontal-container
        ul.dtlms-tabs-horizontal
        li
        a.current,
      .dtlms-class-detail.type4
        .dtlms-tabs-horizontal-container
        ul.dtlms-tabs-horizontal
        li
        a:hover,
      #avatar-crop-actions a.button,
      .dt-sc-portfolio-sorting.type9 a.active-sort,
      .dt-sc-portfolio-sorting.type9 a:hover,
      .dt-sc-newsletter-section .dt-sc-subscribe-frm input[type="submit"],
      .dt-sc-team.hide-details-show-on-hover.dt-sc-one-course-team li a,
      .dtlms-course-category-item.type5 .dtlms-category-total-items,
      .page-template-default.page
        table.dtlms-custom-table
        td
        a.dtlms-button.dtlms-view-class-result,
      .page-template-default.page
        table.dtlms-custom-table
        td
        a.dtlms-button.dtlms-view-course-result,
      .dtlms-course-category-item.type5 .dtlms-course-category-meta-data h3 a,
      .dtlms-class-detail.type1
        .dtlms-tabs-horizontal-container
        ul.dtlms-tabs-horizontal
        li
        a:hover,
      .type5.dtlms-courselist-item-wrapper
        .dtlms-coursedetail-cart-details
        a:hover,
      div[class$="details-holder"]
        .dtlms-pagination.dtlms-ajax-pagination
        ul.page-numbers
        li
        > span.current,
      .dtlms-quiz-features-list ~ .dtlms-info-box,
      #dtlms-course-curriculum-popup.dtlms-course-curriculum-popup-quiz
        .dtlms-course-curriculum-popup-container
        .dtlms-four-fifth
        .dtlms-curriculum-content-holder
        > div.dtlms-quiz-details-container
        .dtlms-info-box
        strong,
      #dtlms-course-curriculum-popup.dtlms-course-curriculum-popup-lesson
        .dtlms-course-curriculum-popup-container
        .dtlms-four-fifth
        .dtlms-curriculum-content-holder
        > div.dtlms-lesson-details-container
        .dtlms-info-box
        strong,
      .dtlms-quiz-questions .dtlms-boolean input[type="radio"]:checked + label,
      .dtlms-quiz-questions
        ul:not(.dtlms-question-image-options)
        li
        input[type="radio"]:checked
        + label,
      .type2.dtlms-packagelist-item-wrapper
        .dtlms-packagedetail-cart-details
        a:hover,
      .dtlms-course-result-overview .dtlms-button,
      .dtlms-class-result-overview .dtlms-button,
      .type10.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-right-section
        .dtlms-coursedetail-price-details
        ins
        span,
      .dtlms-payment-details > .dtlms-packagedetail-cart-details > a,
      .dtlms-payment-details
        > .dtlms-packagedetail-cart-details
        > .dtlms-button,
      a.dtlms-button,
      a.dtlms-button:visited,
      #dtlms-course-curriculum-popup
        .dtlms-course-curriculum-popup-container
        .dtlms-four-fifth
        .dtlms-curriculum-content-holder
        > div.dtlms-post-quiz-msg,
      #dtlms-course-curriculum-popup
        .dtlms-course-curriculum-popup-container
        .dtlms-four-fifth
        .dtlms-curriculum-content-holder
        > div.dtlms-info-box,
      .dtlms-curriculum-content-holder .dtlms-note,
      .dtlms-assignment-details-container .dtlms-info-box,
      .type3.dtlms-classlist-item-wrapper
        .dtlms-classlist-bottom-section-right
        a,
      .dtlms-courselist-item-wrapper.type10
        .dtlms-courselist-bottom-section
        .dtlms-coursedetail-price-details
        del,
      .dtlms-courselist-item-wrapper.type10
        .dtlms-courselist-bottom-section
        .dtlms-coursedetail-price-details
        del
        span,
      .dtlms-quiz-questions
        ul:not(.dtlms-question-image-options)
        li
        input[type="checkbox"]:checked
        + label,
      #dtlms-course-result-popup
        .dtlms-course-result-popup-container
        .dtlms-three-fifth
        .dtlms-curriculum-assignment-holder
        ul.dtlms-assignment-submission
        li
        .dtlms-four-fifth
        > ul
        > li
        a,
      .dtlms-course-detail.type3
        .dtlms-course-detail-content
        .dtlms-coursedetail-cart-details
        a.dtlms-login-link,
      .dtlms-class-detail.type2
        .dtlms-tabs-horizontal-container
        ul.dtlms-tabs-horizontal
        li.current
        a,
      .dtlms-class-detail.type4
        .dtlms-tabs-horizontal-container
        ul.dtlms-tabs-horizontal
        li.current
        a,
      .dtlms-course-detail.type2
        .dtlms-tabs-horizontal-container
        ul.dtlms-tabs-horizontal
        li.current
        a,
      .dtlms-course-detail.type4
        .dtlms-tabs-horizontal-container
        ul.dtlms-tabs-horizontal
        li.current
        a {
        color: rgb(34, 40, 30);
      }
      .type2:not(.dtlms_classes)
        .dt-sc-toggle-frame
        h5.dt-sc-toggle-accordion.active:after,
      .dtlms-quiz-questions
        .dtlms-boolean
        input[type="radio"]:checked
        + label:before,
      .dtlms-quiz-questions
        ul:not(.dtlms-question-image-options)
        li
        input[type="radio"]:checked
        + label:before,
      .dtlms-quiz-questions
        ul:not(.dtlms-question-image-options)
        li
        input[type="checkbox"]:checked
        + label:before {
        background-color: rgb(34, 40, 30);
      }

      .dtlms-course-detail .dtlms-coursedetail-cart-link:hover,
      .dtlms-course-detail-author .dtlms-author-contact-details > li > a:hover,
      .dtlms-class-detail .dtlms-classdetail-cart-link:hover,
      .dtlms-class-detail-author .dtlms-author-contact-details > li > a:hover,
      .dtlms-course-category-item.type10
        .dtlms-course-category-meta-data
        > span,
      .dtlms-course-category-item.type10:hover
        .dtlms-course-category-meta-data
        h3
        a,
      .dtlms-course-detail
        .dtlms-coursedetail-cart-details
        .added_to_cart:hover,
      .dtlms-payment-details
        .dtlms-packagedetail-cart-details
        > a.added_to_cart:hover,
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
      .dtlms-course-detail
        .dtlms-course-detail-content
        .dtlms-coursedetail-cart-details
        .dtlms-button,
      .dtlms-class-detail
        .dtlms-class-detail-content
        .dtlms-classdetail-cart-details
        .dtlms-button,
      .dt-sc-button.filled.dt-skin-secondary-bg,
      .dt-sc-button.filled.dt-sc-skin-highlight:hover,
      .dt-header-menu
        ul.dt-primary-nav
        li.has-mega-menu
        div[class*="list-item-wrapper"].type1
        div[class*="list-details"]
        a.dtlms-button:hover,
      #avatar-crop-actions a.button:hover,
      .dt-sc-newsletter-section .dt-sc-subscribe-frm input[type="submit"]:hover,
      .dt-sc-team.hide-details-show-on-hover.dt-sc-one-course-team li a:hover,
      .dt-sc-university-tab ul.dt-sc-tabs-horizontal-frame > li > a.current,
      .dt-sc-university-tab
        ul.dt-sc-tabs-horizontal-frame
        > li
        > a.current:hover,
      .page-template-default.page
        table.dtlms-custom-table
        td
        a.dtlms-button.dtlms-view-class-result:hover,
      .page-template-default.page
        table.dtlms-custom-table
        td
        a.dtlms-button.dtlms-view-course-result:hover,
      .type7.dtlms-courselist-item-wrapper .dtlms-courselist-tags a:hover,
      .dtlms-course-result-overview .dtlms-button:hover,
      .dtlms-class-result-overview .dtlms-button:hover,
      body[class*="single-dtlms"] table td#today,
      .type10.dtlms-courselist-item-wrapper
        .dtlms-courselist-details
        .dtlms-courselist-metadata
        p
        a:hover,
      .type2.dtlms-courselist-item-wrapper
        .dtlms-coursedetail-price-details
        span,
      .type2.dtlms-courselist-item-wrapper
        .dtlms-coursedetail-price-details
        del,
      .type5.dtlms-courselist-item-wrapper
        .dtlms-coursedetail-price-details
        span,
      .type5.dtlms-courselist-item-wrapper
        .dtlms-coursedetail-price-details
        del,
      .type6.dtlms-courselist-item-wrapper
        .dtlms-coursedetail-price-details
        ins
        span,
      .type9.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-section
        .dtlms-coursedetail-price-details
        del,
      .type9.dtlms-courselist-item-wrapper
        .dtlms-courselist-bottom-section
        .dtlms-coursedetail-price-details
        span,
      .type1.dtlms-packagelist-item-wrapper
        .dtlms-packagelist-price-details
        del,
      .type1.dtlms-packagelist-item-wrapper
        .dtlms-packagelist-price-details
        .amount,
      .type3.dtlms-packagelist-item-wrapper
        .dtlms-packagelist-price-details
        del,
      .dtlms-payment-details > .dtlms-packagedetail-cart-details > a:hover,
      .dtlms-payment-details
        > .dtlms-packagedetail-cart-details
        > .dtlms-button:hover,
      .dtlms-instructor-item.type5.default
        .dtlms-instructor-item-meta-data
        .dtlms-team-social-links
        ul
        li
        a,
      a.dtlms-button:hover,
      a.dtlms-button:focus {
        color: rgb(255, 255, 255);
      }
      .dtlms,
      .type10.dtlms-courselist-item-wrapper .dtlms-coursedetail-cart-details a {
        color: rgb(242, 248, 241);
      }
    </style>
    <link
      rel="stylesheet"
      id="google-fonts-1-css"
      href="../css-4?family=DM+Sans%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CManrope%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.8.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="elementor-icons-shared-0-css"
      href="wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.15.3"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="elementor-icons-fa-solid-css"
      href="wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.15.3"
      type="text/css"
      media="all"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <script
      type="text/javascript"
      src="wp-includes/js/jquery/jquery.min.js?ver=3.7.1"
      id="jquery-core-js"
    ></script>
    <script
      type="text/javascript"
      src="wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1"
      id="jquery-migrate-js"
    ></script>
    <script
      type="text/javascript"
      src="wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.7.0-wc.9.1.4"
      id="jquery-blockui-js"
      defer="defer"
      data-wp-strategy="defer"
    ></script>
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
    <script
      type="text/javascript"
      src="wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=9.1.4"
      id="wc-add-to-cart-js"
      defer="defer"
      data-wp-strategy="defer"
    ></script>
    <script
      type="text/javascript"
      src="wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4-wc.9.1.4"
      id="js-cookie-js"
      defer="defer"
      data-wp-strategy="defer"
    ></script>
    <script type="text/javascript" id="woocommerce-js-extra">
      /* <![CDATA[ */
      var woocommerce_params = {
        ajax_url: "\/lms\/wp-admin\/admin-ajax.php",
        wc_ajax_url: "\/lms\/?wc-ajax=%%endpoint%%",
      };
      /* ]]> */
    </script>
    <script
      type="text/javascript"
      src="wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=9.1.4"
      id="woocommerce-js"
      defer="defer"
      data-wp-strategy="defer"
    ></script>
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
    <script
      type="text/javascript"
      src="wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=9.1.4"
      id="wc-cart-fragments-js"
      defer="defer"
      data-wp-strategy="defer"
    ></script>
    <script
      type="text/javascript"
      src="wp-content/plugins/lizza-wedesigntech-lms-addon/assets/js/chart.min.js?ver=6.8.3"
      id="dtlms-chart-js"
    ></script>
    <link rel="https://api.w.org/" href="wp-json/index />
    <link
      rel="alternate"
      title="JSON"
      type="application/json"
      href="wp-json/wp/v2/pages/21714"
    />
    <link
      rel="EditURI"
      type="application/rsd+xml"
      title="RSD"
      href="https://lizza.wpengine.com/lms/xmlrpc.php?rsd"
    />
    <link rel="canonical" href="index />
    <link rel="shortlink" href="index />
    <link
      rel="alternate"
      title="oEmbed (JSON)"
      type="application/json+oembed"
      href="wp-json/oembed/1.0/embed?url=https%3A%2F%2Flizza.wpengine.com%2Flms%2F"
    />
    <link
      rel="alternate"
      title="oEmbed (XML)"
      type="text/xml+oembed"
      href="wp-json/oembed/1.0/embed-1?url=https%3A%2F%2Flizza.wpengine.com%2Flms%2F&#038;format=xml"
    />
    <style type="text/css" media="all" id="wcs_styles"></style>
    <noscript
      ><style>
        .woocommerce-product-gallery {
          opacity: 1 !important;
        }
      </style></noscript
    >
    <meta
      name="generator"
      content="Elementor 3.23.3; features: e_optimized_css_loading, additional_custom_breakpoints, e_lazyload; settings: css_print_method-external, google_font-enabled, font_display-swap"
    />
    <link rel="preconnect" href="//code.tidio.co" />
    <style>
      .e-con.e-parent:nth-of-type(n + 4):not(.e-lazyloaded):not(.e-no-lazyload),
      .e-con.e-parent:nth-of-type(n + 4):not(.e-lazyloaded):not(.e-no-lazyload)
        * {
        background-image: none !important;
      }
      @media screen and (max-height: 1024px) {
        .e-con.e-parent:nth-of-type(n + 3):not(.e-lazyloaded):not(
            .e-no-lazyload
          ),
        .e-con.e-parent:nth-of-type(n + 3):not(.e-lazyloaded):not(
            .e-no-lazyload
          )
          * {
          background-image: none !important;
        }
      }
      @media screen and (max-height: 640px) {
        .e-con.e-parent:nth-of-type(n + 2):not(.e-lazyloaded):not(
            .e-no-lazyload
          ),
        .e-con.e-parent:nth-of-type(n + 2):not(.e-lazyloaded):not(
            .e-no-lazyload
          )
          * {
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
        src: url("wp-content/plugins/woocommerce/assets/fonts/Inter-VariableFont_slnt,wght.woff2")
          format("woff2");
        font-stretch: normal;
      }
      @font-face {
        font-family: Cardo;
        font-style: normal;
        font-weight: 400;
        font-display: fallback;
        src: url("wp-content/plugins/woocommerce/assets/fonts/cardo_normal_400.woff2")
          format("woff2");
      }
    </style>
    <link
      rel="icon"
      href="wp-content/uploads/sites/12/2023/11/Lizza-Fav-Icon-1.png"
      sizes="32x32"
    />
    <link
      rel="icon"
      href="wp-content/uploads/sites/12/2023/11/Lizza-Fav-Icon-1.png"
      sizes="192x192"
    />
    <link
      rel="apple-touch-icon"
      href="wp-content/uploads/sites/12/2023/11/Lizza-Fav-Icon-1.png"
    />
    <meta
      name="msapplication-TileImage"
      content="https://lizza.wpengine.com/lms/wp-content/uploads/sites/12/2023/11/Lizza-Fav-Icon-1.png"
    />
    <style type="text/css" id="wp-custom-css">
      div[class*="list-item-wrapper"] div[class*="list-thumb"]:before {
        z-index: 0 !important;
      }

      .scroll_tabs_container .scroll_tab_left_button::before {
        position: relative;
        display: block;
        left: -40px;
      }

      #dtlms-course-curriculum-popup
        .dtlms-curriculum-details
        .dtlms-curriculum-detailed-links
        .dtlms-toggle-group-set
        .dtlms-toggle-content {
        margin: -5px;
      }

      @media screen and (max-width: 1280px) {
        .mobile-menu
          ul
          li.has-mega-menu
          ul
          li.menu-item-object-wdt_mega_menus
          .elementor-heading-title {
          margin: 0;
        }
      }
    </style>
  </head>