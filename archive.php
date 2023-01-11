<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neoito
 */

get_header();
?>

	<main id="primary" class="site-main">
		
			<?php global $wp_query; if ( have_posts() ) : ?>

				<header class="banner archive-banner">
					<div class="container">
						<div class="col-max-8 col-center text-center archive-header">
							<?php
							if(is_author()){
								echo get_avatar( get_the_author_meta( 'ID' ), 100 );
							}
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							echo '<p>'.$wp_query->found_posts.' Posts</p>'
							?>
						</div>
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
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;?>
						</div><!--blog-list-items -->
					</div><!-- .container -->
				</div><!-- .blog-list-->
				<?php 
					
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
