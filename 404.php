<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package neoito
 */

get_header();
?>

	<main id="primary" class="site-main pt-16">

		<section class="error-404 not-found">
			<div class="container">
				<div class="page-content text-center">
					<h1 class="page-title"><span>404</span><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'neoito' ); ?></h1>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button"><?php esc_html_e( 'Back to home', 'neoito' ); ?></a>

				</div><!-- .page-content -->
			</div><!-- .container -->
		</section><!-- .error-404 -->
		<?php get_template_part( 'templates/home/lets-talk' );?>
	</main><!-- #main -->

<?php
get_footer();
