<div
  style="
    word-wrap: break-word;
    -webkit-nbsp-mode: space;
    line-break: after-white-space;
  "
>
  <table style="color: #000000; font-size: 12px" width="600px">
    <tbody class="">
      <tr class="">
        <th class="" style="padding-bottom: 40px">
          <h1>
            <span class="accent">Passwort </span> vergessen, {first_name}?
          </h1>
        </th>
      </tr>
      <tr class="">
        <td class="" style="padding-bottom: 18px">
          <div class="text">
            Unter dem nachfolgenden Link kannst du dir ein neues Passwort
            erstellen. Solltest du dieses nicht angefordert haben, ignoriere
            bitte diese Mail.
          </div>
        </td>
      </tr>
      <tr class="">
        <td class="" style="padding-bottom: 18px">
          <div>
            <a class="button" href="{password_reset_link}">
              Passwort zurücksetzen</a
            >
          </div>
        </td>
      </tr>
      <tr class="">
        <td class="" style="padding-bottom: 48px">
          <br />
          <h2
            style="
              font-family: Helvetica, sans-serif;
              margin: 0px;
              text-align: left;
              font-size: 16px;
              letter-spacing: 0.5px;
            "
          >
            <span class="accent , hide">Quartiersplattform</span>
            <span class="hide">Quartier</span> <br /><br />
          </h2>
          <br />
          <hr />
          <br />
          <p>
            <?php 
                $image = get_field('logo', 'option');
                if( !empty( $image ) ): ?>
            <img width="200" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
            />
            <?php endif; ?>
          </p>
        </td>
      </tr>
    </tbody>
  </table>
</div>
