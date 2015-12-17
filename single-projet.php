<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="container">
        <h1 class="title"><?php the_title(); ?></h1>
        <?php get_the_post_thumbnail( 'large' ); ?>
        <div class="content">
            <?php the_content(); ?>
        </div>
    </article>
</div>
<?php endwhile; ?>
<?php endif; ?> 
<?php get_footer(); ?>
