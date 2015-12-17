<?php get_header(); ?>
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
    <?php var_dump($custom); ?>
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
    <div id='coin-slider'>
        <a href="">
            <img src='<?php echo $img; ?>' >
            <span>
            </span>
        </a>
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
<script type="text/javascript">
	$(document).ready(function() {
		$('#coin-slider').coinslider();
	});
</script>
<?php get_footer(); ?>
