<div class="cookie-alert">

    <h1>Wir nutzen 🍪 cookies</h1>
    <p>
        Wir speichern nur eigene cookies welche zur verbesserung der Nutzungserfahrung der Quartiersplattform helfen.<br>
        Cookies von drittanbietern speichern wir nicht. 
    </p>
    <a class="button">Zustimmen</a>
    <p>
        Personenbezogene Daten wie Cookies, Geräte-Kennungen oder andere Informationen wie zum Beispiel deine IP-Adresse können wir dazu nutzen, um dir personalisierte Anzeigen und Inhalte anzuzeigen, Inhaltsmessungen und Retargeting durchzuführen und wichtige Erkenntnisse über Zielgruppen für die Produktentwicklung zu gewinnen. Außerdem können wir damit die Nutzung unserer Angebote analysieren, Marketingmaßnahmen umsetzen und ihren Erfolg messen.
        Indem du auf "Zustimmen" klickst, stimmst du diesen Datenverarbeitungen freiwillig zu. Deine Zustimmung umfasst zeitlich begrenzt auch deine Einwilligung zur Datenverarbeitung außerhalb des EWR wie zum Beispiel in den USA (Art. 49 Abs. 1 lit. a) DS-GVO). Dort ist es unter Umständen möglich, dass Behörden zu Kontroll- und Überwachungszwecken auf deine Daten zugreifen und dabei weder wirksame Rechtsbehelfe noch Betroffenenrechte durchsetzbar sein können. 
        Deine getroffene Auswahl kannst du jederzeit unter "Datenschutzeinstellungen" am Seitenende anpassen. Weitere Informationen findest du in der Datenschutzerklärung.
    </p>

    <a class="footer-link" href="<?php echo get_site_url(); ?>/impressum/">Impressum</a>
    <?php
        if (get_privacy_policy_url()) {
            ?> 
        <a class="footer-link" href="<?php echo get_privacy_policy_url(); ?>">Datenschutzerklärung</a>
            <?php
        } 
    ?>

</div>

<script>
    
    $("div.cookie-alert a.button").click(function(){

        var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    
        var data = {
        'action': 'set_cookie',
        'request': 1
        };

        $.ajax({
            url: ajax_url,
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(response){
                $("div.cookie-alert").fadeOut();
            }
        });

    });

</script>