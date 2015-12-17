<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="container">
    <?php
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full");
        $img = $img[0];
    ?>
    <div class="postimg" style="<?php if($img){echo 'background:url('.$img.');';} ?>">
        <h1 class="title"><?php the_title(); ?></h1>
    </div>

    <div class="content">
        <?php the_content(); ?>
    </div>
    </article>
</div>
<?php endwhile; ?>
<?php endif; ?> 
<?php get_footer(); ?>
