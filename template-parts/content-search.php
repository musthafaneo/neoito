<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neoito
 */

?>

<div class="blog-list-item" data-aos="fade-up">
	<a href="<?php the_permalink();?>" id="post-<?php the_ID(); ?>" class="blog-list-card">
		<?php if(has_post_thumbnail( )){?>
			<div class="blog-list-card-thumb">
				<?php the_post_thumbnail('blog-card');?>
			</div>
		<?php }?>
		<div class="blog-list-card-content">
			<span class="blog-meta"><?php reading_time($post->ID); echo ' - '.get_the_time('M d, Y');?></span>
	        <h3 class="blog-title"><?php the_title();?></h3>
	        <p><?php echo wp_trim_words( get_the_excerpt( ), '20', '...');?></p>
		</div><!-- .entry-content -->

		<footer class="blog-list-footer mdd:hidden">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 51 ); ?>
			<div class="blog-list-footer-in">
				<h4><?php the_author( );?></h4>
				<span>Posts by this author</span>
			</div>
		</footer><!-- .entry-footer -->
	</a><!-- #post-<?php the_ID(); ?> -->
</div>