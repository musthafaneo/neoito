<?php
/**
 * Template Name: Home
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

			get_template_part( 'templates/home/banner' );
			get_template_part( 'templates/home/stats' );
			get_template_part( 'templates/home/solutions' );
			get_template_part( 'templates/home/companies' );
			get_template_part( 'templates/home/casestudies' );
			get_template_part( 'templates/home/testimonials' );
			get_template_part( 'templates/home/ceo-note' );
			get_template_part( 'templates/home/blogs' );
			get_template_part( 'templates/home/lets-talk' );
			

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
