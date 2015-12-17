<?php get_header(); ?>
<script type='text/javascript' src='http://localhost/marathon/wp-content/themes/fundmykulture/js/slider.js?ver=2.0'></script>
<script>
    jssor_1_slider_init = function() {

        var jssor_1_SlideshowTransitions = [
            {$Duration:1200,$Opacity:2}
        ];

        var jssor_1_options = {
            $AutoPlay: true,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizing
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 600);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        //responsive code end
    };
</script>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="container">
    <?php
$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full");
$img = $img[0];
    ?>
    <div class="postimg" style="<?php if($img){echo 'background-image:url('.$img.');';} ?>">
        <h1 class="title"><?php the_title(); ?></h1>
    </div>


    <?php $custom = get_post_custom($post->ID); ?>
    <?php $time=time(); $fin=strtotime($custom['fin_de_la_campagne'][0]);
$restant=$time-$fin;
if ($restant < 0)
{
    $restant='terminée' ;
}
else{
    $restant=$restant/60/60/24;
    $restant=floor($restant).' jours restants';
}
    ?>

    <div class="post_stats"><div class='stat-4'><span class="dashicons dashicons-clock"></span> <?php echo $restant; ?></div><div class='stat-4'> <span class="dashicons dashicons-chart-area"></span> 82% collectés</div><div class='stat-4'><span class="dashicons dashicons-admin-users"></span> 39 contributeurs</div><div class='stat-4'><span class="dashicons dashicons-heart"></span> 178 Coup de coeur</div></div>

    <div id='slide_container'>
        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
                <div data-p="112.50" style="display: none;">
                    <img src="<?php echo $img; ?>" />
                </div>
                <?php if(isset($custom['image_additionnel_1'][0])) { ?>
                <div data-p="112.50" style="display: none;">
                    <?php echo wp_get_attachment_image($custom['image_additionnel_1'][0], 'full'); ?>
                </div>
                <?php } ?>
                <?php if(isset($custom['image_additionnel_2'][0])) { ?>
                <div data-p="112.50" style="display: none;">
                    <?php echo wp_get_attachment_image($custom['image_additionnel_2'][0], 'full'); ?>
                </div>
                <?php } ?>
                <?php if(isset($custom['image_additionnel_3'][0])) { ?>
                <div data-p="112.50" style="display: none;">
                    <?php echo wp_get_attachment_image($custom['image_additionnel_3'][0], 'full'); ?>
                </div>
                <?php } ?>
                <?php if(isset($custom['image_additionnel_4'][0])) { ?>
                <div data-p="112.50" style="display: none;">
                    <?php echo wp_get_attachment_image($custom['image_additionnel_4'][0], 'full'); ?>
                </div>
                <?php } ?>
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
                <!-- bullet navigator item prototype -->
                <div data-u="prototype" style="width:16px;height:16px;"></div>
            </div>
            <!-- Arrow Navigator -->
            <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
            <a href="http://www.jssor.com" style="display:none">Bootstrap Carousel</a>
        </div>
        <script>
            jssor_1_slider_init();
        </script>
    </div>

    <div class="content">
        <?php the_content(); ?>
    </div>

    <?php
if($custom['ajouter_des_paliers_'][0]!='0'){
    for($i=1;$i<=$custom['ajouter_des_paliers_'][0];$i++){

    }
}
    ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
