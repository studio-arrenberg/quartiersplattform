<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<style>
.shadow { box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07), 0
2px 4px rgba(0, 0, 0, 0.07), 0 4px 8px rgba(0, 0, 0, 0.07), 0 8px 16px rgba(0,
0, 0, 0.07), 0 16px 32px rgba(0, 0, 0, 0.07), 0 32px 64px rgba(0, 0, 0, 0.07);
font-size: 16px; } .shadow:hover { box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07), 0
2px 8px rgba(0, 0, 0, 0.15), 0 4px 8px rgba(0, 0, 0, 0.07), 0 8px 32px rgba(0,
0, 0, 0.15), 0 16px 32px rgba(0, 0, 0, 0.07), 0 32px 126px rgba(0, 0, 0, 0.15);
} .text { width: 60%; display: inline-block; line-height: 24px; } h1 {
font-size: 16px; } .content { padding: 5%; text-align: center; vertical-align:
center; position: relative; color: #666666; font-family: "Open Sans", Helvetica,
Arial; font-size: 16px; background-color: white; display: inline-block;
border-radius: 50px; } .table:after { } .table { margin-top: 50px; display:
flex; justify-content: center; flex-wrap: wrap; padding: 0%; } .column { width:
100%; padding: 4%; font-size: 16px; line-height: 18px; } .column img {
max-width: 200px; } 

.link{
        font-size:12px;
      }

  @media (min-width: 800px) {
     .column { width: 24%; }
    .link a{
          font-size: 16px;
        }
        .mail{
          padding:10% 20%;;
        }
  } .mail
  { 
    text-align: center; 
    vertical-align: center; 
    background-color: #f7f7f7;
    padding: 5% 5%; 
  } 

.footer { text-align: center; margin-top: 5%; 
font-size: 12px;
} a {
text-decoration: none; color: #62b2f0; font-family: "Open Sans", Helvetica,
Arial; margin-top:100px; } .footer_link{ padding:20% 2%; margin-top:100px;</style>

<div class="mail" style="text-align: center;vertical-align: center;background-color: #f7f7f7;padding: 5% 5%;">
  <div class="content" style="padding: 5%;text-align: center;vertical-align: center;position: relative;color: #666666;font-family: &quot;Open Sans&quot;, Helvetica,
Arial;font-size: 16px;background-color: white;display: inline-block;border-radius: 50px;">
    <div>
      <img src="https://arrenberg.app/wp-content/themes/quartiersplattform/assets/sponsoren/aufbruch.svg" alt="Arrenberg Logo" width="200" height="200">
    </div>
    <div>
      <span style="
          font-size: 26px;
          font-weight: 600;
          color: #62b2f0;
          font-family: 'Open Sans', Helvetica, Arial;
        ">Aktiviere dein Konto, {first_name}
      </span>
    </div>
    <div> </div>
    <div>
      <div class="text" style="width: 60%;display: inline-block;line-height: 24px;">
        <span>Schön das du da bist! Klicke auf den Link, um dein Konto zu aktivieren.
      </span></div>
      <p></p>
      
    </div>

    <div style="padding: 0 30px 30px 30px">
      <div> </div>
      <div style="padding: 10px 0 50px 0;text-align: center;font-size: 12px;" class="link">
        <a class="shadow link" style="background: #0091ff;color: #fff;padding: 20px 30px;text-decoration: none;border-radius: 20px;letter-spacing: 0.3px;font-family: &quot;Open Sans&quot;, Helvetica,
Arial;margin-top: 100px;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07), 0
2px 4px rgba(0, 0, 0, 0.07), 0 4px 8px rgba(0, 0, 0, 0.07), 0 8px 16px rgba(0,
0, 0, 0.07), 0 16px 32px rgba(0, 0, 0, 0.07), 0 32px 64px rgba(0, 0, 0, 0.07);font-size: 12px;" href="{account_activation_link}">Konto aktivieren
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
  <div class="footer" style="text-align: center;margin-top: 5%;font-size: 12px;">
    <p>
      <img src="https://arrenberg.app/wp-content/themes/quartiersplattform/assets/sponsoren/aufbruch.svg" alt="Arrenberg Logo" width="150">
    </p>
    <p class="footer" style="text-align: center;margin-top: 5%;font-size: 12px;">
      <a class="footer_link" href="{login_url}" style="text-decoration: none;color: #62b2f0;font-family: &quot;Open Sans&quot;, Helvetica,
Arial;margin-top: 100px;padding: 20% 2%;">Impressum </a>
      <a class="footer_link" href="{login_url}" style="text-decoration: none;color: #62b2f0;font-family: &quot;Open Sans&quot;, Helvetica,
Arial;margin-top: 100px;padding: 20% 2%;">Datenschutz </a>
    </p>
  </div>
</div>
