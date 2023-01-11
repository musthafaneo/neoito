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

	<main id="primary" class="site-main py-16">

		<div class="container">
			<?php while ( have_posts() ) : the_post();?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="blog-list-card-thumb">
					<?php the_post_thumbnail('blog-card');?>
				</div>
				<header class="entry-header blog-list-card-content mb-5">
					<span class="blog-meta"><?php reading_time($post->ID); echo ' - '.get_the_time('M d, Y');?></span>
			        <h3 class="section-main-title"><?php the_title();?></h3>
			        <div class="log-list-footer">
			        	<?php echo get_avatar( get_the_author_meta( 'ID' ), 51 ); ?>
						<div class="blog-list-footer-in">
							<h4><?php the_author( );?></h4>
							<span>Posts by this author</span>
						</div>
			        </div>
			    </header>

				<div class="entry-content">
					<?php the_content();?>
				</div>
			</article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; // End of the loop.?>
		</div><!-- .container -->

	</main><!-- #main -->

<?php
get_footer();
