<?php
/**
 * Template Name: About
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neoito
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'templates/about/banner' );
			get_template_part( 'templates/about/purpose' );
			get_template_part( 'templates/about/global' );
			get_template_part( 'templates/about/we-are' );
			get_template_part( 'templates/about/team' );
			get_template_part( 'templates/about/footer' );
			get_template_part( 'templates/home/lets-talk' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
