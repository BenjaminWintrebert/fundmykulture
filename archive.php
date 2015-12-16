<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FundMyKulture
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php $loop = new WP_Query( array( 'post_type' => 'projet', 'posts_per_page' => -1 ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        The stuff you want to loop goes in here
        <?php endwhile; wp_reset_query(); ?>


    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
