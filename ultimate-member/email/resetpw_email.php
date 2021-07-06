<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div
  style="
    word-wrap: break-word;
    -webkit-nbsp-mode: space;
    line-break: after-white-space;
  "
>
  <table width="600px" style="color: rgb(0, 0, 0); font-size: 12px" class="">
    <tbody class="">
      <tr class="">
        <th class="" style="padding-bottom: 40px">
          <h1>
            <span class="accent">
            <?php _e('Passwort  ', 'quartiersplattform'); ?>
            </span>
            <br /><?php _e('vergessen,', 'quartiersplattform'); ?>
            {first_name}?
          </h1>
        </th>
      </tr>
      <tr class="">
        <td class="" style="padding-bottom: 18px">
          <div class="text">
          <?php _e('Unter dem nachfolgenden Link kannst du dir ein neues Passwort erstellen. Solltest du dieses nicht angefordert haben, ignoriere bitte diese Mail.', 'quartiersplattform'); ?>
            
          </div>
        </td>
      </tr>
      <tr class="">
        <td class="" style="padding-bottom: 18px">
          <div>
          <a class="button" href="{password_reset_link}"
              ><?php _e('Passwort zurücksetzen!', 'quartiersplattform'); ?>
            </a>
          </div>
        </td>
      </tr>
      <tr class="">
        <td class="" style="padding-bottom: 48px">
          <br />
          <h2>
            <span class="accent , hide">Quartiersplattform</span>
            <span class="hide"
              ><?php the_field('quartiersplattform-name','option'); ?></span
            >
            <br /><br />
          </h2>
          <br />
          <hr />
          <br />
          <p>
            <?php 
                $image = get_field('logo', 'option');
                if( !empty( $image ) ): ?>
            <img
              width="200"
              src="<?php echo esc_url($image['url']); ?>"
              alt="<?php echo esc_attr($image['alt']); ?>"
            />
            <?php endif; ?>
          </p>
        </td>
      </tr>
    </tbody>
  </table>
</div>
