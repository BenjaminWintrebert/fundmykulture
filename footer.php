<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FundMyKulture
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fundmykulture' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'fundmykulture' ), 'WordPress' ); ?></a>
        <span class="sep"> | </span>
        <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'fundmykulture' ), 'fundmykulture', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript">
    jQuery( document ).ready( function( $ ) {
        /* Masonry + Infinite Scroll */
        var $container = $('#grid-container');
        $container.imagesLoaded(function () {
            $container.masonry({
                itemSelector: '.post'
            });
        });
        $('#grid-container').masonry({
            itemSelector: '.post',
            columnWidth: 258
        });
        $container.infinitescroll({
            navSelector: '#page-nav',
            nextSelector: '#page-nav a',
            itemSelector: '.post',
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
            jQuery('#grid-container').infinitescroll('retrieve');
            return false;
        });
        $(document).ajaxError(function (e, xhr, opt) {
            if (xhr.status == 404) $('#page-nav a').remove();
        });
    });
</script>
</body>
</html>
