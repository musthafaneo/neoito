<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package neoito
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

				<header class="banner career-banner">
					<div class="container">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'neoito' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</div><!-- .container -->
				</header><!-- .page-header -->
				<div class="blog-list">
					<div class="container">
						<div class="blog-list-items" id="loadmorecontainer">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;?>
						</div><!--blog-list-items -->
					</div><!-- .container -->
				</div><!-- .blog-list-->
				<?php 
					global $wp_query;
					$link=get_next_posts_link('link',$wp_query->max_num_pages);
	                if($link){
	                echo '<div class="load-more text-center w-full" data-aos="fade-up"><a href="'.get_next_posts_page_link().'" class="loadmore" data-target="#loadmorecontainer"><span>'.esc_html__('Loadmore', 'crstech').'</span></a></div>';
	                }
	            ?>  
				<?php 

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

	</main><!-- #main -->

<?php
get_footer();
