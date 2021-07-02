<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div style="word-wrap: break-word; -webkit-nbsp-mode: space; line-break: after-white-space;">

<table width="600px" style="color: rgb(0, 0, 0); font-size: 12px" class="">
    <tbody class="">
        <tr class="">
            <th style="padding-bottom: 40px" class="">
                <h1>
                    
                    <span class="accent"><?php _e('Willkommen  ', 'quartiersplattform'); ?> </span>
                    <br><?php _e('im Quartier,', 'quartiersplattform'); ?>{first_name}.
                </h1>
            </th>
        </tr>
        
        <tr class="">
            <td style="padding-bottom: 18px" class="">
                <div class="text">
                <?php _e('Schön das du da bist! Auf der Quartiersplattform findest du alle relevanten Informationen rund um dein Viertel. So kannst du neue Menschen kennen lernen und dein Quartier nachhaltig entwickeln und verbessern.', 'quartiersplattform'); ?> 

                <div class="column">

          <h1><?php _e('Projekte', 'quartiersplattform'); ?> </h1>
          <p>
            <?php _e('Entdecke und erstelle eigene Projekte. Dich stört etwas in deinem Lieblingspark? Mach ein Projekt draus und finde Mitstreiter!', 'quartiersplattform'); ?> 
          </p>
        </div>
        <div class="column" >
          <h1 ><?php _e('Veranstaltungen', 'quartiersplattform'); ?></h1>
          <p>
            <?php _e('Verpasse nie wieder tolle Veranstaltungen in deinem Viertel. Hier findest du alles was du wissen musst, um bei nächsten mal dabei zu sein.', 'quartiersplattform'); ?>
          </p>
        </div>
        <div class="column" >
          <h1 ><?php _e('Sprachen', 'quartiersplattform'); ?></h1>
          <p>
            <?php _e('Verpasse nie wieder tolle Veranstaltungen in deinem Viertel. Hier findest du alles was du wissen musst, um bei nächsten mal dabei zu sein.', 'quartiersplattform'); ?>
          </p>
        </div>

                </div>
            </td>
        </tr>
        

        <tr class="">
            <td style="padding-bottom: 18px" class="">
            <div>
                    <a class="button" href="{login_url}"><?php _e('Entdecke dein Quartier!', 'quartiersplattform'); ?> </a>
                </div>
            </td>
        </tr>
        <tr class="">
            <td style="padding-bottom: 48px" class="">
            
                <br>
                <h2>
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