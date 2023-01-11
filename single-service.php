<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package neoito
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
			<?php while ( have_posts() ) : the_post();?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php the_content();?>
				</article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; // End of the loop.?>
		</div><!-- .container -->
		<?php get_template_part( 'templates/home/lets-talk' );?>

	</main><!-- #main -->

<?php
get_footer();
