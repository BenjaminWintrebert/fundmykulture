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
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="fs-medium ml10"><span class="logo-home"></span>Accueil</a>
			</div>
	<div class="col-50 t-right">
		<span class="logo-search"></span>Recherche</span><form><input type="text" class="fs-medium" placeholder="Rechercher"></form>
		<span class="fs-medium ml10 mr10"><a href='<?php echo esc_url( home_url( "/login" ) ); ?>'><span class="logo-login"></span>Se connecter</a></span>
		</div>
		</header>



	<div id="content" class="site-content">
