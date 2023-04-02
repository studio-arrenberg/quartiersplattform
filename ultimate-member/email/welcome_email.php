<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div style="
    word-wrap: break-word;
    -webkit-nbsp-mode: space;
    line-break: after-white-space;
  ">
  <table width="600px" style="color: rgb(0, 0, 0); font-size: 12px" class="">
    <tbody class="">
      <tr class="">
        <th style="padding-bottom: 40px" class="">
          <h1 style="font-family: Titillium Web, Helvetica Neue, Helvetica, sans-serif;text-align: left;margin: 0px;font-size: 84px;line-height: 84px;letter-spacing: 3px;">
            <span class="accent" style="color: #0091ff;"><?php _e('Willkommen  ', 'quartiersplattform'); ?>
            </span>
            <br><?php _e('im Quartier,', 'quartiersplattform'); ?>
            {first_name}.
          </h1>
        </th>
      </tr>

      <tr class="">
        <td style="padding-bottom: 18px" class="">
          <div class="text" style="font-family: Titillium Web, Helvetica Neue, Helvetica, sans-serif;margin: 0px;font-size: 1.5em;letter-spacing: 0.5px;">
            <?php _e('Schön das du da bist! Auf der Quartiersplattform findest du alle relevanten Informationen rund um dein Viertel. So kannst du neue Menschen kennen lernen und dein Quartier nachhaltig entwickeln und verbessern.', 'quartiersplattform'); ?>

            <div class="column">
              <h2><?php _e('Projekte', 'quartiersplattform'); ?></h2>
              <p>
                <?php _e('Entdecke und erstelle eigene Projekte. Dich stört etwas in deinem Lieblingspark? Mach ein Projekt draus und finde Mitstreiter!', 'quartiersplattform'); ?>
              </p>
            </div>
            <div class="column">
              <h2><?php _e('Veranstaltungen', 'quartiersplattform'); ?></h2>
              <p>
                <?php _e('Verpasse nie wieder tolle Veranstaltungen in deinem Viertel. Hier findest du alles was du wissen musst, um bei nächsten mal dabei zu sein.', 'quartiersplattform'); ?>
              </p>
            </div>
            <div class="column">
              <h2>
                <?php _e('Sprachen', 'quartiersplattform'); ?>

              </h2>
              <p>
                <?php _e('Deine Quartiersplattform spricht mehrere Sprachen. Sie ist in Türkisch, Italienisch, Deutsch und Englisch verfügbar.', 'quartiersplattform'); ?>
              </p>
            </div>
          </div>
        </td>
      </tr>

      <tr class="">
        <td style="padding-bottom: 18px" class="">
          <div>
            <a class="button" href="<?php echo home_url().'/projekte/'; ?>" style="font-family: Titillium Web, Helvetica Neue, Helvetica, sans-serif;text-decoration: none;color: #ffffff;font-size: 16px;padding: 15px;-webkit-appearance: none;-moz-appearance: none;appearance: none;user-select: none;border-radius: 15px;background-color: rgb(0, 145, 255);border: none;cursor: pointer;display: inline-block;line-height: 1.6rem;text-align: center;transition: all 0.15s linear;box-shadow: 0 1px 2px rgba(0, 145, 255, 0.07),
				0 2px 4px rgba(0, 145, 255, 0.07), 0 4px 8px rgba(0, 145, 255, 0.07),
				0 8px 16px rgba(0, 145, 255, 0.07), 0 16px 32px rgba(0, 145, 255, 0.07),
				0 32px 64px rgba(0, 145, 255, 0.07);: ;">
              <?php _e('Entdecke dein Quartier!', 'quartiersplattform'); ?>
            </a>
          </div>
        </td>
      </tr>

      <tr class="">
        <td style="padding-bottom: 48px" class="">
          <br>
          <br>
          <p>
            <?php
              $image = get_field('logo', 'option');
              if( !empty( $image ) ):
            ?>
            <img width="200" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>;>
            <?php endif; ?>
          </p>
        </td>
      </tr>
    </tbody>
  </table>
</div>
