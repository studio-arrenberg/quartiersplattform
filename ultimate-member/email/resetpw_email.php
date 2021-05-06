<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="mail" style="text-align: center;vertical-align: center;background-color: #f7f7f7;padding: 10% 20%;">
  <div class="content" style="padding: 5%;text-align: center;vertical-align: center;position: relative;color: #666666;font-family: &quot;Open Sans&quot;, Helvetica,
Arial;font-size: 16px;background-color: white;display: inline-block;border-radius: 50px;">
    <div>
      
    </div>
    
    <div>
      <span style="
          font-size: 26px;
          font-weight: 600;
          color: #62b2f0;
          font-family: 'Open Sans', Helvetica, Arial;
        ">Passwort vergessen, {first_name} ?
      </span>
    </div>
    <div> </div>
    <div>
      <div class="text" style="width: 60%;display: inline-block;line-height: 24px;">
        <span><?php _e('Unter dem nachfolgenden Link kannst du dir ein neues Passwort erstellen. Solltest du dieses nicht angefordert haben, ignoriere bitte diese Mail.', 'quartiersplattform'); ?>
      </span></div>
      <p></p>
      
    </div>

    <div style="padding: 0 30px 30px 30px">
      <div> </div>
      <div style="padding: 10px 0 50px 0; text-align: center">
        <a class="shadow" style="background: #0091ff;color: #fff;padding: 20px 30px;text-decoration: none;border-radius: 20px;letter-spacing: 0.3px;font-family: &quot;Open Sans&quot;, Helvetica,
Arial;margin-top: 100px;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07), 0
2px 4px rgba(0, 0, 0, 0.07), 0 4px 8px rgba(0, 0, 0, 0.07), 0 8px 16px rgba(0,
0, 0, 0.07), 0 16px 32px rgba(0, 0, 0, 0.07), 0 32px 64px rgba(0, 0, 0, 0.07);font-size: 16px;" href="{password_reset_link}">
<?php _e('Passwort zurücksetzen', 'quartiersplattform'); ?>
        </a>
      </div>
      <div style="padding: 20px">
        <?php _e('Wenn Probleme auftreten, kannst du dich gerne per Mail an uns wenden.', 'quartiersplattform'); ?>
        {admin_email}
      </div>
    </div>
    <div style="color: ; padding: 20px 30px">
      <div><?php _e('Vielen Dank!', 'quartiersplattform'); ?> </div>
    </div>
  </div>
  <div class="footer" style="text-align: center;margin-top: 5%;">
    <p>
    <?php 
    $image = get_field('logo', 'option');
    if( !empty( $image ) ): ?>
        <img width="200" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>

    </p>
    <p class="footer" style="text-align: center; margin-top: 5%;">
<a class="footer_link" style="text-decoration: none; color: #62b2f0; font-family: 'Open Sans', Helvetica,Arial; margin-top: 100px; padding: 20% 2%;" href="<?php echo get_site_url(); ?>/impressum/"><?php _e('Impressum', 'quartiersplattform'); ?>  </a> 
<a class="footer_link" style="text-decoration: none; color: #62b2f0; font-family: 'Open Sans', Helvetica,Arial; margin-top: 100px; padding: 20% 2%;" href="<?php echo get_site_url(); ?>/datenschutz/"><?php _e('Datenschutz', 'quartiersplattform'); ?></a></p>
  </div>
</div>