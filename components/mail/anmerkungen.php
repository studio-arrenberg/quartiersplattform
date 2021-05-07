<tr class="">
    <th style="padding-bottom: 40px" class="">
        <h1 style="
                      font-family: Helvetica, sans-serif;
                      text-align: left;
                      margin: 0px;
                      font-size: 32px;
                      line-height: 32px;
                      letter-spacing: 0px;
                    ">
            <span style="color: #0091ff;"><?php if ( get_post_field( 'post_author', get_query_var('qp_post_id')) ) { echo get_the_author_meta( 'user_firstname', get_post_field( 'post_author', get_query_var('qp_post_id')) ); } else {echo "Jemand";} ?></span> hat eine Anmerkung <span style="color: #0091ff;"></span>geschrieben
        </h1>
    </th>
</tr>

<tr class="">
    <td style="padding-bottom: 18px" class="">
        <div style="
                      font-family: Helvetica, sans-serif;
                      margin: 0px;
                      font-size: 16px;
                      line-height: 26px;
                      letter-spacing: 0.5px;
                    " class="">
            <?php echo the_field('text', get_query_var('qp_post_id')); ?>
        </div>
    </td>
</tr>

<tr class="">
    <td style="padding-bottom: 18px" class="">
        <div style="text-decoration: none;">
            <a style="		
					padding: 15px;		  
					-webkit-appearance: none;
					-moz-appearance: none;
					appearance: none;
					user-select: none;
					border-radius: 15px;
					background-color: rgb(0, 145, 255);
					border: none;
					color: #fff;
					cursor: pointer;
					display: inline-block;
					font-size: 16px;
					line-height: 1.6rem;
					text-align: center;
					text-decoration: none;
                    href="<?php echo get_permalink(get_query_var('qp_post_id')); ?>">Zur Anmerkung</a>

        </div>
    </td>
</tr>