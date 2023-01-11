<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neoito
 */

?>

<div class="blog-list-item" data-aos="fade-up">
	<div id="post-<?php the_ID(); ?>" class="blog-list-card">
		<div class="blog-list-card-thumb">
			<a href="<?php the_permalink();?>"><?php the_post_thumbnail('blog-card');?></a>
		</div>
		<div class="blog-list-card-content">
			<span class="blog-meta"><?php reading_time($post->ID); echo ' - '.get_the_time('M d, Y');?></span>
	        <h3 class="blog-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	        <p><?php echo wp_trim_words( get_the_excerpt( ), '20', '...');?></p>
		</div><!-- .entry-content -->
		<?php if(!is_author()){?>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>" class="blog-list-card-footer mdd:hidden">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 51 ); ?>
				<div class="blog-list-footer-in">
					<h4><?php the_author( );?></h4>
					<span>Posts by this author</span>
				</div>
			</a><!-- .entry-footer -->
		<?php }?>
	</div><!-- #post-<?php the_ID(); ?> -->
</div>
