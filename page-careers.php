<?php
/**
 * Template Name: Careers
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

			get_template_part( 'templates/career/banner' );
			get_template_part( 'templates/career/we-want' );
			get_template_part( 'templates/career/jobs' );
			get_template_part( 'templates/career/resume' );
			get_template_part( 'templates/career/attractions' );
			get_template_part( 'templates/career/life' );
			get_template_part( 'templates/career/community' );
			get_template_part( 'templates/home/lets-talk' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
