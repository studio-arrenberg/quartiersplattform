<div>

    <div><?php echo get_query_var( 'qp_no_content_icon' ); ?> </div>

    <h2><?php echo get_query_var( 'qp_no_content_title' ); ?></h2>
    <p><?php echo get_query_var( 'qp_no_content_text' ); ?></p>

    <?php if (get_query_var( 'qp_no_content_link_text' ) && get_query_var( 'qp_no_content_link_url' )) { ?>
    <a class="button" href="<?php echo get_query_var( 'qp_no_content_link_url' ); ?>"><?php echo get_query_var( 'qp_no_content_link_text' ); ?></a>
    <?php } ?>
    
</div>
