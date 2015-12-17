<?php get_header(); ?>
<div id="container">
    <div id="filter">
        <h2>Filtrer par catégorie:</h2>
                <input type="radio" id="reset" name="color"/>
                <label for="reset">Reset</label>
                <input type="radio" id="orange" name="color" />
                <label for="orange">Orange</label>
                <input type="radio" id="red" name="color"/>
                <label for="red">RED</label>
                <input type="radio" id="green" name="color"/>
                <label for="green">GREEN</label>
                <input type="radio" id="jaune" name="color" />
                <label for="jaune">JAUNE</label>
                <input type="radio" id="blue" name="color" />
                <label for="blue">BLUE</label>
                <input type="radio" id="violet" name="color" />
                <label for="violet">VIOLET</label>
    </div>
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
<script src="<?php echo get_template_directory_uri() . '/js/particle.js'; ?>"></script>
<script>
    jQuery( document ).ready( function( $ ) {
        $( '#container' ).masonry( { columnWidth: 341 } );
    } );
</script>
<?php get_footer(); ?>
