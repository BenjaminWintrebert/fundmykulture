<?php
/**
 * FundMyKulture functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FundMyKulture
 */

if ( ! function_exists( 'fundmykulture_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

add_action('init', 'my_custom_init');

function my_custom_init() {
    register_post_type( 'projet',   array('label' => 'Projets',     'labels' => array(       'name' => 'Projets',       'singular_name' => 'Projet',       'all_items' => 'Tous les projets',       'add_new_item' => 'Ajouter un projet',       'edit_item' => 'Éditer le projet',       'new_item' => 'Nouveau projet',       'view_item' => 'Voir le projet',       'search_items' => 'Rechercher parmi les projets',       'not_found' => 'Pas de projet trouvé',       'not_found_in_trash'=> 'Pas de projet dans la corbeille'       ),     'public' => true,     'capability_type' => 'post',  'menu_icon' => 'dashicons-art', 'supports' => array(       'title',       'editor',       'thumbnail'     ),     'has_archive' => true   ) ); }

function fundmykulture_setup() {
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on FundMyKulture, use a find and replace
	 * to change 'fundmykulture' to the name of your theme in all the template files.
	 */
    load_theme_textdomain( 'fundmykulture', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support( 'title-tag' );

    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'fundmykulture' ),
    ) );

    /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    /*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'fundmykulture_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif;
add_action( 'after_setup_theme', 'fundmykulture_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fundmykulture_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'fundmykulture_content_width', 640 );
}
add_action( 'after_setup_theme', 'fundmykulture_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fundmykulture_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'fundmykulture' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'fundmykulture_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fundmykulture_scripts() {
    wp_enqueue_style( 'fundmykulture-style', get_stylesheet_uri() );

    wp_enqueue_script( 'fundmykulture-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'fundmykulture-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script('jquery');
}

function mason_script() {
    wp_enqueue_script( 'jquery-masonry' );
}
add_action( 'wp_enqueue_scripts', 'mason_script' );


add_action( 'wp_enqueue_scripts', 'fundmykulture_scripts' );

/**
* Implement the Custom Header feature.
*/
require get_template_directory() . '/inc/custom-header.php';

/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Custom functions that act independently of the theme templates.
*/
require get_template_directory() . '/inc/extras.php';

/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';

/**
* Load Jetpack compatibility file.
*/
require get_template_directory() . '/inc/jetpack.php';
