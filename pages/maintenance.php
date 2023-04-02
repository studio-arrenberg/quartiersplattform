<?php
# init wp files
require_once("../../../../wp-load.php");

# redirect if maintenence mode is off and plugins are installed
if (class_exists('acf_pro') && class_exists('UM')) {
  if (get_field('maintenance', 'option') == false) {
    wp_redirect( get_site_url() );
  }
}
# redirect if plugins are installed and user can visit
if (class_exists('acf_pro') && class_exists('UM') && (current_user_can('skip_maintenance'))) {
  wp_redirect( get_site_url() );
}

?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      <?php
        if (class_exists('acf_pro')) {
          if (get_field('quartiersplattform-name', 'option')) {
              echo get_field('quartiersplattform-name', 'option').__(" Update",'quartiersplattform');
          }
          else {
              _e("Hier entsteht deine Quatiersplattform",'quartiersplattform');
          }
        }
        else {
          _e("Hier entsteht deine Quatiersplattform",'quartiersplattform');
        }
      ?>
    </title>


    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/maintenance.css">

    <link rel="apple-touch-icon" sizes="57x57"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri()?>/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
        content="<?php echo get_template_directory_uri()?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

  </head>

  <body>
    <canvas id="confetti"></canvas>

    <div class="top-bar">
      <img class="top-bar-logo" src="<?php echo get_template_directory_uri()?>/assets/icons/quartiersplattform.svg" alt=""/>
      <div class="flex-push-end">
      <!-- <a class="btn btn-shadow" href="https://arrenberg.app/projekte/quartiersplattform/">Das Projekt</a> -->
      <a class="btn btn-shadow" href="https://github.com/studio-arrenberg/quartiersplattform/blob/main/documentation/documentation.md"><?php _e('Zur Dokumentation', 'quartiersplattform'); ?> </a>
      </div>
    </div>
      <img class="bg-logo" src="<?php echo get_template_directory_uri()?>/assets/icons/q.svg" alt=""/>
    </div>

    <div class="center-desktop">

      <?php
      # Maintanance View
      if (class_exists('acf_pro') && class_exists('UM')) {
      ?>

        <h2 class="pre-title"><?php _e('Gestalte dein Quartier', 'quartiersplattform'); ?> </h2>
        <h1><?php _e('Hier entsteht', 'quartiersplattform'); ?>  <br><?php _e(' deine Quartiersplattform', 'quartiersplattform'); ?> </h1>

        <p class="big">
          <?php _e('Bald findest du hier spannende Neuigkeiten aus Quartiersprojekten, kannst an Umfragen teilnehmen und eigene Projekte über die Plattform planen.', 'quartiersplattform'); ?>
        </p>

        <!-- neu -->
        <p><?php _e('Du möchtest dabei helfen, die Plattform für das Quartier vorzubereiten?', 'quartiersplattform'); ?> <br><?php _e('Dann registriere dich jetzt!', 'quartiersplattform'); ?> </p>
        <div class="btn-container">
          <a   class="btn btn-shadow" href="<?php echo get_site_url(); ?>/login/"><?php _e('Anmelden', 'quartiersplattform'); ?> </a>
          <a class="btn btn-shadow" href="<?php echo get_site_url(); ?>/register/"><?php _e('Registrieren', 'quartiersplattform'); ?> </a>
        </div>


        <h3><?php _e('Die Quartiersplattform wird bereits in den folgenden Quartieren genutzt', 'quartiersplattform'); ?></h3>
        <div class="flex">
          <?php
          # map picture variables
          $latlong = "7.128,51.2485,";
          $map_zoom = 15.48;
          $width = 500;
          $height = 300;
          ?>

          <div class="card shadow" style="background: url('https://api.mapbox.com/styles/v1/studioarrenberg/ckl9rpmct17pi17mxw1zw46h0/static/<?php echo $latlong.$map_zoom."/".$width."x".$height; ?>@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ')">
            <a class="card-link" href="https://arrenberg.app">
               <h4 class="heading-size-3">Arrenberg</h4>
              <h5>Wuppertal</h5>
            </a>
          </div>

          <?php
          # map picture variables
          $latlong = "7.244365,51.274734,";
          $map_zoom = 13.48;
          $width = 500;
          $height = 300;
          ?>
<!--
          <div class="card  shadow" style="background: url('https://api.mapbox.com/styles/v1/studioarrenberg/ckl9rpmct17pi17mxw1zw46h0/static/<?php echo $latlong.$map_zoom."/".$width."x".$height; ?>@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ')">
            <a class="card-link" href="https://langerfeld.app">
               <h4 class="heading-size-3">Langerfeld</h4>
              <h5>Wuppertal</h5>
            </a>
          </div> -->


        </div>


      <?php
      }
      # Setup View
      else {
      ?>

      <h2 class="pre-title">Erste Schritte</h2>
        <h1><?php _e('Plugins installieren', 'quartiersplattform'); ?> </h1>
        <p class="big">
          <?php _e('Bald findest du hier spannende Neuigkeiten aus Quartiersprojekten, kannst an Umfragen teilnehmen und eigene Projekte über die Plattform planen.', 'quartiersplattform'); ?>
        </p>

        <h3><?php _e('Du musst noch folgende Schritte durchführen:', 'quartiersplattform'); ?> </h3>

        <!-- neu -->
        <!-- <a class="button" href="https://github.com/studio-arrenberg/quartiersplattform/blob/main/documentation/documentation.md"><?php _e('Dokumentation Lesen', 'quartiersplattform'); ?> </a> -->

        <div class="flex">

        <?php
          if (!class_exists('acf_pro')) {
          ?>

          <div class="card bg_red white">
            <a class="card-link" href="<?php echo get_site_url(); ?>/wp-admin/plugins.php">
              <h2><?php _e('Bitte Advanced Custom Fields installieren', 'quartiersplattform'); ?> </h2>
              <p>
                <?php _e('Bitte installiere das Plugin ACF über die Wordpress Plugin Seite.', 'quartiersplattform'); ?>
              </p>
            </a>
          </div>

      <?php
        }
        if (!class_exists('UM')) {
        ?>

      <div class="card bg_red white">
        <a class="card-link" href="<?php echo get_site_url(); ?>/wp-admin/plugins.php">
          <h2><?php _e('Bitte Ultimate Member installieren', 'quartiersplattform'); ?> </h2>
          <p>
            <?php _e('Bitte installiere das Plugin Ultimate Member über die Wordpress Plugin Seite und stelle die in der Dokumentation beschriebenen Einstellungen ein.', 'quartiersplattform'); ?>
          </p>
        </a>
      </div>

        <?php
      }
      if (!function_exists( 'wp_mail_smtp' )) {
        ?>

      <div class="card bg_orange-light white">
        <a class="card-link" href="<?php echo get_site_url(); ?>/wp-admin/plugins.php">

          <h2><?php _e('Bitte WP Mail SMTP installieren', 'quartiersplattform'); ?></h2>
          <p>
            <?php _e(' Bitte installiere das Plugin WP Mail SMTP über die Wordpress Plugin Seite stelle die in der Dokumentation beschriebenen E-Mail Einstellungen ein.', 'quartiersplattform'); ?>
          </p>
      </a>

      </div>

        <?php
      }
    }
    ?>


      <div class="logo">
        <a href="https://www.arrenberg.studio">

          <?php include get_stylesheet_directory() . '/assets/icons/studio-arrenberg.svg'; ?>

        </a>
    </div>
  </div>


    </body>

  <script>
    // confetti script
    !(function (e, t) {
      "object" == typeof exports && "undefined" != typeof module
        ? (module.exports = t())
        : "function" == typeof define && define.amd
        ? define(t)
        : ((e = e || self).ConfettiGenerator = t());
    })(this, function () {
      "use strict";
      return function (e) {
        var a = {
          target: "confetti-holder",
          max: 80,
          size: 1,
          animate: !0,
          respawn: !0,
          props: ["circle", "square", "triangle", "line"],
          colors: [
            [165, 104, 246],
            [230, 61, 135],
            [0, 199, 228],
            [253, 214, 126],
          ],
          clock: 25,
          interval: null,
          rotate: !1,
          start_from_edge: !1,
          width: window.innerWidth,
          height: window.innerHeight,
        };
        if (
          (e &&
            (e.target && (a.target = e.target),
            e.max && (a.max = e.max),
            e.size && (a.size = e.size),
            null != e.animate && (a.animate = e.animate),
            null != e.respawn && (a.respawn = e.respawn),
            e.props && (a.props = e.props),
            e.colors && (a.colors = e.colors),
            e.clock && (a.clock = e.clock),
            null != e.start_from_edge &&
              (a.start_from_edge = e.start_from_edge),
            e.width && (a.width = e.width),
            e.height && (a.height = e.height),
            null != e.rotate && (a.rotate = e.rotate)),
          "object" != typeof a.target && "string" != typeof a.target)
        )
          throw new TypeError(
            "The target parameter should be a node or string"
          );
        if (
          ("object" == typeof a.target &&
            (null === a.target || !a.target instanceof HTMLCanvasElement)) ||
          ("string" == typeof a.target &&
            (null === document.getElementById(a.target) ||
              !document.getElementById(a.target) instanceof
                HTMLCanvasElement))
        )
          throw new ReferenceError(
            "The target element does not exist or is not a canvas element"
          );
        var t =
            "object" == typeof a.target
              ? a.target
              : document.getElementById(a.target),
          o = t.getContext("2d"),
          r = [];
        function n(e, t) {
          e = e || 1;
          var r = Math.random() * e;
          return t ? Math.floor(r) : r;
        }
        var i = a.props.reduce(function (e, t) {
          return e + (t.weight || 1);
        }, 0);
        function s() {
          var e =
            a.props[
              (function () {
                for (
                  var e = Math.random() * i, t = 0;
                  t < a.props.length;
                  ++t
                ) {
                  var r = a.props[t].weight || 1;
                  if (e < r) return t;
                  e -= r;
                }
              })()
            ];
          return {
            prop: e.type ? e.type : e,
            x: n(a.width),
            y: a.start_from_edge
              ? a.clock < 0
                ? parseFloat(a.height) + 10
                : -10
              : n(a.height),
            src: e.src,
            radius: n(4) + 1,
            size: e.size,
            rotate: a.rotate,
            line: Math.floor(n(65) - 30),
            angles: [
              n(10, !0) + 2,
              n(10, !0) + 2,
              n(10, !0) + 2,
              n(10, !0) + 2,
            ],
            color: a.colors[n(a.colors.length, !0)],
            rotation: (n(360, !0) * Math.PI) / 180,
            speed: n(a.clock / 7) + a.clock / 30,
          };
        }
        function l(e) {
          if (e)
            switch (
              ((o.fillStyle = o.strokeStyle =
                "rgba(" + e.color + ", " + (3 < e.radius ? 0.8 : 0.4) + ")"),
              o.beginPath(),
              e.prop)
            ) {
              case "circle":
                o.moveTo(e.x, e.y),
                  o.arc(e.x, e.y, e.radius * a.size, 0, 2 * Math.PI, !0),
                  o.fill();
                break;
              case "triangle":
                o.moveTo(e.x, e.y),
                  o.lineTo(
                    e.x + e.angles[0] * a.size,
                    e.y + e.angles[1] * a.size
                  ),
                  o.lineTo(
                    e.x + e.angles[2] * a.size,
                    e.y + e.angles[3] * a.size
                  ),
                  o.closePath(),
                  o.fill();
                break;
              case "line":
                o.moveTo(e.x, e.y),
                  o.lineTo(e.x + e.line * a.size, e.y + 5 * e.radius),
                  (o.lineWidth = 2 * a.size),
                  o.stroke();
                break;
              case "square":
                o.save(),
                  o.translate(e.x + 15, e.y + 5),
                  o.rotate(e.rotation),
                  o.fillRect(
                    -15 * a.size,
                    -5 * a.size,
                    15 * a.size,
                    5 * a.size
                  ),
                  o.restore();
                break;
              case "svg":
                o.save();
                var t = new window.Image();
                t.src = e.src;
                var r = e.size || 15;
                o.translate(e.x + r / 2, e.y + r / 2),
                  e.rotate && o.rotate(e.rotation),
                  o.drawImage(
                    t,
                    (-r / 2) * a.size,
                    (-r / 2) * a.size,
                    r * a.size,
                    r * a.size
                  ),
                  o.restore();
            }
        }
        function c() {
          (a.animate = !1),
            clearInterval(a.interval),
            requestAnimationFrame(function () {
              o.clearRect(0, 0, t.width, t.height);
              var e = t.width;
              (t.width = 1), (t.width = e);
            });
        }
        return {
          render: function () {
            (t.width = a.width), (t.height = a.height), (r = []);
            for (var e = 0; e < a.max; e++) r.push(s());
            return requestAnimationFrame(function e() {
              for (var t in (o.clearRect(0, 0, a.width, a.height), r))
                l(r[t]);
              !(function () {
                for (var e = 0; e < a.max; e++) {
                  var t = r[e];
                  t &&
                    (a.animate && (t.y += t.speed),
                    t.rotate && (t.rotation += t.speed / 35),
                    ((0 <= t.speed && a.height < t.y) ||
                      (t.speed < 0 && t.y < 0)) &&
                      (a.respawn
                        ? ((r[e] = t),
                          (r[e].x = n(a.width, !0)),
                          (r[e].y = t.speed < 0 ? parseFloat(a.height) : -10))
                        : (r[e] = void 0)));
                }
                r.every(function (e) {
                  return void 0 === e;
                }) && c();
              })(),
                a.animate && requestAnimationFrame(e);
            });
          },
          clear: c,
        };
      };
    });

    // init
    var confettiElement = document.getElementById("confetti");
    var confettiSettings = {
      target: "confetti",
      max: "95",
      size: "2",
      animate: true,
      props: ["circle"],
      colors: [
        [0, 145, 255],
        [240, 115, 150],
        [250, 185, 45],
        [90, 185, 140],
      ],
      clock: "0",
      rotate: false,
      width: "1792",
      height: "1040",
      start_from_edge: false,
      respawn: true,
    };
    var confetti = new ConfettiGenerator(confettiSettings);
    confetti.render();

  </script>
</html>
