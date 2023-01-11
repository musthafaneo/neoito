<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package neoito
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" rel="canonical" href="https://gmpg.org/xfn/11">
	<!-- Video js -->
	<?php echo is_page( 'contact' ) ? '<link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />':''; ?>
	
	<!-- fonts -->
	<link rel="preload" crossorigin="anonymous" as="font" href="<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Rift-Bold.woff2" type="font/woff2">
	<!-- <link rel="preload" crossorigin = "anonymous" as="font" href="<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Rift-Bold.woff2" type="font/woff2">
	<link rel="preload" crossorigin = "anonymous" as="font" href="<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Rift-Demi.woff2" type="font/woff2"> -->
	<!-- <link rel="preload" crossorigin = "anonymous" as="font" href="<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Outfit-Medium.woff2" type="font/woff2"> -->
	<link rel="preload" crossorigin="anonymous" as="font" href="<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Outfit-Regular.woff2" type="font/woff2">
	<!-- <link rel="preload" crossorigin = "anonymous" as="font" href="<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Outfit-Bold.woff" type="font/woff2">  -->

	<style>
		/* @font-face {
  font-family: "Rift";
  src: url("<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Rift-Medium.woff2") format("woff2"),
    url("<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Rift-Medium.woff2") format("woff");
  font-weight: 500;
  font-style: normal;
  
} */

		@font-face {
			font-family: "Rift";
			src: url("<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Rift-Bold.woff2") format("woff2"),
				url("<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Rift-Bold.woff2") format("woff");
			font-weight: bold;
			font-style: normal;

		}

		/* @font-face {
  font-family: "Rift";
  src: url("<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Rift-Demi.woff2") format("woff2"),
    url("<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Rift-Demi.woff2") format("woff");
  font-weight: 600;
  font-style: normal;
  
}  */

		/* @font-face {
  font-family: "Outfit";
  src: url("<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Outfit-Medium.woff2") format("woff2"),
    url("<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Outfit-Medium.woff") format("woff");
   font-weight: 500; 
  font-style: normal;
  
} */

		@font-face {
			font-family: "Outfit";
			src: url("<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Outfit-Regular.woff2") format("woff2"),
				url("<?php echo get_site_url(); ?>/wp-content/themes/neoito//assets/css/fonts/Outfit-Regular.woff") format("woff");
			font-weight: normal;
			font-style: normal;

		}

		/* @font-face {
  font-family: "Outfit";
  src: url("<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Outfit-Bold.woff2") format("woff2"),
    url("<?php echo get_site_url(); ?>/wp-content/themes/neoito/assets/css/fonts/Outfit-Bold.woff") format("woff");
  font-weight: bold;
  font-style: normal;
  
}  */
	</style>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<?php wp_head(); ?>

	<script>
		// document.addEventListener('touchstart', onTouchStart, {
		//             passive: true
		//         });

		jQuery.event.special.touchstart = {
			setup: function(_, ns, handle) {
				this.addEventListener("touchstart", handle, {
					passive: true
				});
			}
		};
	</script>

	
<script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js" async></script>
<!-- <script type="text/javascript" src="https://widget.clutch.co/static/js/widget.js" defer></script> -->
</head>



<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'neoito'); ?></a>

		<header id="masthead" class="site-header">
			<div class="container">
				<div class="site-header-in">
					<div class="site-branding">
						<?php
						the_custom_logo();
						if (is_front_page() && is_home()) :
						?>
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
						<?php
						else :
						?>
							<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
						<?php endif; ?>
					</div><!-- .site-branding -->

					<nav class="main-navigation main-navigation-1">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu-1',
								'walker'          => new Description_Walker,
							)
						);
						?>
					</nav><!-- #site-navigation -->
					<nav class="main-navigation main-navigation-2">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'primary-menu-2',
							)
						);
						?>
					</nav><!-- #site-navigation -->
					<span class="main-nav-toggle nav-toggle"><?php echo get_svg_icon('img-ham', '33', '11'); ?></span>
				</div><!-- .site-header-in -->
			</div><!-- .container -->
			<div class="mobile-navigation">
				<nav class="mobile-navigation-main">
					<a href="#" class="main-nav-toggle nav-toggle on"><?php echo get_svg_icon('img-close', '28', '28'); ?></a>
					<div class="mobile-navigation-main-in">
						<?php
						wp_nav_menu(
							array(
								'menu' => '5',
							)
						);
						?>
						<div class="nav-foot">
							<ul class="social-icons">
								<?php if ($facebook = get_field('facebook', 'options')) : ?>
									<li class="fb"><a href="<?php echo esc_html($facebook); ?>" title="Facebook"><?php echo get_svg_icon('img-facebook', '11', '23'); ?></a>
									<?php endif; ?>

									<?php if ($linked_in = get_field('linkedin', 'options')) : ?>
									<li class="ln"><a href="<?php echo esc_html($linked_in); ?>" title="Linkedin"><?php echo get_svg_icon('img-linkedin', '22', '23'); ?></a>
									<?php endif; ?>

									<?php if ($twitter = get_field('twitter', 'options')) : ?>
									<li class="tw"><a href="<?php echo esc_html($twitter); ?>" title="Twitter"><?php echo get_svg_icon('img-twitter', '26', '23'); ?></a>
									<?php endif; ?>

									<?php if ($instagram = get_field('instagram', 'options')) : ?>
									<li class="in"><a href="<?php echo esc_html($instagram); ?>" title="Instagram"><?php echo get_svg_icon('img-instagram', '23', '23'); ?></a>
									<?php endif; ?>
							</ul>
							<a href="<?php echo get_permalink(22); ?>" class="button"><?php esc_html_e('Let’s Talk', 'neoito'); ?></a>
						</div>
					</div><!-- .mobile-navigation-main-in -->
				</nav>
				<nav class="mobile-navigation-sub">
					<a href="#" class="sub-nav-toggle nav-toggle on"><?php echo get_svg_icon('img-close', '28', '28'); ?></a>
					<div class="mobile-navigation-sub-in">

						<h2><?php esc_html_e('Services', 'neoito'); ?></h2>
						<?php
						wp_nav_menu(
							array(
								'menu' => '6',
							)
						);
						?>
					</div><!-- .mobile-navigation-sub-in -->
				</nav>
			</div><!-- .mobile-navigation -->
		</header><!-- #masthead -->