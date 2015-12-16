<?php get_header(); ?>
<div id="container">
    <?php $loop = new WP_Query( array( 'post_type' => 'projet', 'posts_per_page' => -1 ) ); ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <div class="brick">
        <div class="projet_container">
            <div class="img_projet"><?php the_post_thumbnail(); ?></div>
            <?php the_title(); ?>
        </div>
    </div>
    <?php endwhile; wp_reset_query(); ?>
</div>
<script>
    jQuery( document ).ready( function( $ ) {
        $( '#container' ).masonry( { columnWidth: 341 } );
    } );
</script>
<?php get_footer(); ?>
