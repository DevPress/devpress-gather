<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Gather
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'gather' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<nav id="primary-navigation" class="main-navigation clearfix" role="navigation">
			<div class="col-width">
				<button class="menu-toggle" data-toggle="#primary-navigation .menu">
					<?php echo esc_html( gather_get_menu_name( 'primary' ) ); ?>
				</button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div>
		</nav>
		<?php endif; ?>

		<div class="site-branding">
			<div class="col-width">

				<?php if ( get_theme_mod( 'logo', false ) ) {
					$class = 'site-logo';
					$output = '<img src="' . esc_url( get_theme_mod( 'logo' ) ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
				} else {
					$class = 'site-title';
					$output = get_bloginfo( 'name' );
				} ?>

				<h1 class="<?php echo $class; ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php echo $output; ?>
					</a>
				</h1>

				<?php if ( get_theme_mod( 'display-site-tagline', 0 ) ) : ?>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif; ?>

			</div>
		</div>

		<?php if ( has_nav_menu( 'secondary' ) ) : ?>
		<nav id="secondary-navigation" class="main-navigation clearfix" role="navigation">
			<div class="col-width">
				<button class="menu-toggle" data-toggle="#secondary-navigation .menu">
					<?php echo esc_html( gather_get_menu_name( 'secondary' ) ); ?>
				</button>
				<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
			</div>
		</nav>
		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content clear">
		<div class="col-width">
