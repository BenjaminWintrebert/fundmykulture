<?php get_header(); ?>
 <div id="filter" class="center">
	<input type="radio" id="all" name="color"/>
	<label for="all">Tout</label>
	<input type="radio" id="musique" name="color" />
	<label for="musique">Musiques</label>
	<input type="radio" id="video" name="color"/>
	<label for="video">Vidéos</label>
	<input type="radio" id="spectacle" name="color"/>
	<label for="spectacle">Spectacles</label>
	<input type="radio" id="jeux" name="color" />
	<label for="jeux">Jeux</label>
	<input type="radio" id="litterature" name="color" />
	<label for="litterature">Littératures</label>
	<input type="radio" id="autres" name="color" />
	<label for="autres">Autres</label>
</div>
<div id="container">
    <?php $loop = new WP_Query( array( 'post_type' => 'projet', 'posts_per_page' => -1 ) ); ?>
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
        <div class="brick <?php echo str_replace('é', 'e', $custom['categories'][0]); ?>">
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

<script src="<?php echo get_template_directory_uri() . '/js/masonry.js'; ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/particle.js'; ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/trie.js'; ?>"></script>
<script>jQuery( document ).ready( function() {masonry();});</script>
<?php get_footer(); ?>
