<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="mail" style="text-align: center;vertical-align: center;background-color: #f7f7f7;padding: 10% 20%;">
  <div class="content" style="padding: 5%;text-align: center;vertical-align: center;position: relative;color: #666666;font-family: &quot;Open Sans&quot;, Helvetica,
Arial;font-size: 16px;background-color: white;display: inline-block;border-radius: 50px;">
    <div>
      <img src="https://ap1.arrenberg.studio/wp-content/themes/quartiersplattform/assets/mail/registrieren.png" alt="Arrenberg Logo" width="200" height="200">
    </div>
    <br>
    <div>
      <span style="
          font-size: 26px;
          font-weight: 600;
          color: #62b2f0;
          font-family: 'Open Sans', Helvetica, Arial;
        ">Hallo, {first_name}
      </span>
    </div>
    <div> </div>
    <div>
      <div class="text" style="width: 60%;display: inline-block;line-height: 24px;">
        <span>Schön das du da bist! Klicke auf den Link, um dein Passwort zu ändern.
      </span></div>
      <p></p>
      
    </div>

    <div style="padding: 0 30px 30px 30px">
      <div> </div>
      <div style="padding: 10px 0 50px 0; text-align: center">
        <a class="shadow" style="background: #0091ff;color: #fff;padding: 20px 30px;text-decoration: none;border-radius: 20px;letter-spacing: 0.3px;font-family: &quot;Open Sans&quot;, Helvetica,
Arial;margin-top: 100px;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07), 0
2px 4px rgba(0, 0, 0, 0.07), 0 4px 8px rgba(0, 0, 0, 0.07), 0 8px 16px rgba(0,
0, 0, 0.07), 0 16px 32px rgba(0, 0, 0, 0.07), 0 32px 64px rgba(0, 0, 0, 0.07);font-size: 16px;" href="{password_reset_link}">Passwort zurücksetzen
        </a>
      </div>
      <div style="padding: 20px">
        Sollten Probleme auftreten wende dich bitte per Mail an uns.
        {admin_email}
      </div>
    </div>
    <div style="color: ; padding: 20px 30px">
      <div>Vielen Dank!</div>
      <div>Dein Arrenberg Team.</div>
    </div>
  </div>
  <div class="footer" style="text-align: center;margin-top: 5%;">
    <p>
      <img src="https://ap1.arrenberg.studio/wp-content/themes/quartiersplattform/assets/sponsoren/aufbruch.svg" alt="Arrenberg Logo" width="200">
    </p>
    <p class="footer" style="text-align: center;margin-top: 5%;">
      <a class="footer_link" href="{login_url}" style="text-decoration: none;color: #62b2f0;font-family: &quot;Open Sans&quot;, Helvetica,
Arial;margin-top: 100px;padding: 20% 2%;">Impressum </a>
      <a class="footer_link" href="{login_url}" style="text-decoration: none;color: #62b2f0;font-family: &quot;Open Sans&quot;, Helvetica,
Arial;margin-top: 100px;padding: 20% 2%;">Datenschutz </a>
    </p>
  </div>
</div>
