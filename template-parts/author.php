<?php get_header(); ?>
    <div class="x-container max width offset">
        <div class="<?php x_main_content_class(); ?>" role="main">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-wrap">  
                        <?php x_get_view( 'global', '_content', 'the-excerpt' ); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <?php x_get_view( 'global', '_content-none' ); ?>
            <?php endif; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>