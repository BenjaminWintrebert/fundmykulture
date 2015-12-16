<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FundMyKulture
 */

get_header(); ?>

<div id="primary" class="content-area">
    <div class="row" id="ms-container">
        <?php $loop = new WP_Query( array( 'post_type' => 'projet', 'posts_per_page' => -1 ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="ms-item">

            <?php if (has_post_thumbnail()) : ?>

            <figure class="article-preview-image">

                <?php the_post_thumbnail('large'); ?>

            </figure>

            <?php else : ?>

            <?php endif; ?>

            <h2 class="post-title"><a href="<?php the_permalink(); ?>" class="post-title-link"><?php the_title(); ?></a></h2>

            <?php the_excerpt(); ?>

            <div class="clearfix"></div>

            <a href="<?php the_permalink(); ?>" class="btn btn-green btn-block">Read More</a>

            <div class="clearfix"></div>

        </div>

        <?php endwhile;

else : ?>

        <article class="no-posts">

            <h1><?php _e('No posts were found.', 'webtegrity-framework'); ?></h1>

        </article>
        <?php endif; ?>

    </div>
    <div class="clearfix"></div>

    <?php
get_footer();

<?php endwhile; wp_reset_query(); ?>
