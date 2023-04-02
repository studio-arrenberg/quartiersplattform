<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div style="word-wrap: break-word; -webkit-nbsp-mode: space; line-break: after-white-space;">

<table width="600px" style="color: rgb(0, 0, 0); font-size: 12px" class="">
    <tbody class="">
        <tr class="">
            <th style="padding-bottom: 40px" class="">
                <h1 style="font-family: Titillium Web, Helvetica Neue, Helvetica, sans-serif;text-align: left;margin: 0px;font-size: 84px;line-height: 84px;letter-spacing: 3px;">
                    <?php _e('Dein', 'quartiersplattform'); ?>
                    <span class="accent" style="color: #0091ff;"><?php _e('Passwort', 'quartiersplattform'); ?> </span>
                    <br><?php _e('wurde geändert.', 'quartiersplattform'); ?>
                </h1>
            </th>
        </tr>

        <tr class="">
            <td style="padding-bottom: 18px" class="">
                <div class="text" style="font-family: Titillium Web, Helvetica Neue, Helvetica, sans-serif;margin: 0px;font-size: 1.5em;letter-spacing: 0.5px;">
                <?php _e('Dein Passwort wurde vor kurzem geändert. Sollte diese Änderung nicht von dir gewesen sein, kontaktiere uns bitte umgehend.', 'quartiersplattform'); ?>
                </div>
            </td>
        </tr>


        <tr class="">
            <td style="padding-bottom: 18px" class="">
            <div>
                    <a class="button" href="{user_account_link}" style="font-family: Titillium Web, Helvetica Neue, Helvetica, sans-serif;text-decoration: none;color: #ffffff;font-size: 16px;padding: 15px;-webkit-appearance: none;-moz-appearance: none;appearance: none;user-select: none;border-radius: 15px;background-color: rgb(0, 145, 255);border: none;cursor: pointer;display: inline-block;line-height: 1.6rem;text-align: center;transition: all 0.15s linear;box-shadow: 0 1px 2px rgba(0, 145, 255, 0.07),
				0 2px 4px rgba(0, 145, 255, 0.07), 0 4px 8px rgba(0, 145, 255, 0.07),
				0 8px 16px rgba(0, 145, 255, 0.07), 0 16px 32px rgba(0, 145, 255, 0.07),
				0 32px 64px rgba(0, 145, 255, 0.07);: ;"><?php _e('Sieh dir dein Konto an', 'quartiersplattform'); ?> </a>
                </div>
            </td>
        </tr>
        <tr class="">
            <td style="padding-bottom: 48px" class="">
                <br>
                <br>
                <br>
<p>
<?php
$image = get_field('logo', 'option');
if( !empty( $image ) ): ?>
<img width="200" src="<?php echo esc_url($image['url']); ?>;" alt="<?php echo esc_attr($image['alt']); ?>;">
<?php endif; ?>
</p>
            </td>
        </tr>

    </tbody>
</table>
</div>
