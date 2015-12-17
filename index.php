<?php get_header(); ?>
<div id="container">
    <?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$loop = new WP_Query( array(
    'post_type' => 'projet',
    'posts_per_page' => -1,
    'orderby'=> 'date',
    'paged'=>$paged
));
    ?>
    <?php $max_num_pages=$loop->max_num_pages ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <a href='<?php the_permalink(); ?>'>
        <?php $custom = get_post_custom($post->ID); ?>
        <div class="brick <?php echo $custom['categories'][0]; ?>">
            <div class="projet_container">
				<figcaption>
					<span>
						<?php the_title(); ?>
					</span>
				</figcaption>
				<div class="img_projet"><?php the_post_thumbnail(); ?></div>
            </div>
        </div>
    </a>
    <?php endwhile; ?>

</div>

<div class="navigation">
    <div class="alignleft"><?php previous_posts_link('&laquo; Previous') ?></div>
    <div class="alignright"><?php next_posts_link('More &raquo;') ?></div>
</div>
<?php wp_reset_query(); ?>

<script src="<?php echo get_template_directory_uri() . '/js/particle.js'; ?>"></script>

<script>
    jQuery( document ).ready( function( $ ) {
        /* Masonry + Infinite Scroll */
        var $container = $('#container');
        $container.imagesLoaded(function () {
            $container.masonry({
                itemSelector: '.brick'
            });
        });
        $('#container').masonry({
            itemSelector: '.brick',
            columnWidth: 341
        });
        $container.infinitescroll({
            navSelector: '#page-nav',
            nextSelector: '#page-nav a',
            itemSelector: '.brick',
            loading: {
                msgText: 'Chargement des contenus...',
                finishedMsg: 'Aucun contenu à charger.',
                img: 'http://i.imgur.com/6RMhx.gif'
            }
        }, function (newElements) {
            var $newElems = $(newElements).css({
                opacity: 0
            });
            $newElems.imagesLoaded(function () {
                $newElems.animate({
                    opacity: 1
                });
                $container.masonry('appended', $newElems, true);
            });
        });
        $(window).unbind('.infscr');
        jQuery("#page-nav a").click(function () {
            jQuery('#container').infinitescroll('retrieve');
            return false;
        });
        $(document).ajaxError(function (e, xhr, opt) {
            if (xhr.status == 404) $('#page-nav a').remove();
        });
    });
</script>
<?php get_footer(); ?>
