<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div style="word-wrap: break-word; -webkit-nbsp-mode: space; line-break: after-white-space;">

<table width="600px" style="color: rgb(0, 0, 0); font-size: 12px" class="">
    <tbody class="">
        <tr class="">
            <th style="padding-bottom: 40px" class="">
                <h1>
                    <?php _e('Dein', 'quartiersplattform'); ?>
                    <span class="accent"><?php _e('Passwort', 'quartiersplattform'); ?> </span>
                    <br><?php _e('wurde geändert.', 'quartiersplattform'); ?>
                </h1>
            </th>
        </tr>
        
        <tr class="">
            <td style="padding-bottom: 18px" class="">
                <div class="text">
                <?php _e('Dein Passwort wurde vor kurzem geändert. Sollte diese Änderung nicht von dir gewesen sein, kontaktiere uns bitte umgehend.', 'quartiersplattform'); ?>
                </div>
            </td>
        </tr>
        

        <tr class="">
            <td style="padding-bottom: 18px" class="">
            <div>
                    <a class="button" href="{user_account_link}"><?php _e('Sieh dir dein Konto an', 'quartiersplattform'); ?> </a>
                </div>
            </td>
        </tr>
        <tr class="">
            <td style="padding-bottom: 48px" class="">
            
                <br>
                <h2 style="
              font-family: Helvetica, sans-serif;
              margin: 0px;
    text-align: left;
              font-size: 16px;
              letter-spacing: 0.5px;
            ">
                    <span class="accent , hide">Quartiersplattform</span> <span class="hide"
                        ><?php the_field('quartiersplattform-name','option'); ?></span>
                    <br><br>
                </h2>
                
                <br>
                <hr>
                <br>
<p>
<?php 
$image = get_field('logo', 'option');
if( !empty( $image ) ): ?>
<img width="200" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
</p>
            </td>
        </tr>

    </tbody>
</table>
</div>