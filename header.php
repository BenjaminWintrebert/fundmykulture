<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FundMyKulture
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <header id="header" class="fixed">
            <div class="logo-container"><span class="logo-site"></span></div>
            <div class="col-50 t-left">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="fs-medium ml20 mr20 accueil"><span class="logo-home"></span>Accueil</a>
				<form><span class="logo-search"></span><input type="text" class="fs-medium search" placeholder="Rechercher"></form>
            </div>
            <div class="col-50 t-right">
                <?php if ( !is_user_logged_in() ) { ?> <span class="fs-medium ml20 mr20 login"><a href='<?php echo esc_url( home_url( "/wp-login.php" ) ); ?>'><span class="logo-login"></span>Se connecter</a></span> <?php }
else{ ?>
                <span class="fs-medium ml20 mr20 login"><a href='<?php echo wp_logout_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>'><span class="logo-login"></span>Se déconnecter</a></span>
                <?php } ?>
            </div>
        </header>

        <div id="content" class="site-content">
