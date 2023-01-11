<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package neoito
 */

?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="site-footer-top">
			<div class="lg:grid lg:grid-flow-col lg:gap-4">
				<?php if (have_rows('locations', 2)) : ?>
					<div class="site-footer-widget lg:col-span-1 block lg:hidden">
						<h2><?php esc_html_e('LOCATIONS', 'neoito'); ?></h2>
						<div>
							<ul class="menu">
								<?php while (have_rows('locations', 2)) : the_row(); ?>
									<li><a href="<?php echo esc_url(get_sub_field('map_coordinate')); ?>" target="_blank"><?php the_sub_field('location'); ?></a></li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div>
				<?php endif; ?>
				<?php dynamic_sidebar('sidebar-2'); ?>
				<div class="site-footer-widget lg:col-span-1 hidden lg:block">
					<h2><?php esc_html_e('Follow us on', 'neoito'); ?></h2>
					<ul class="social-icons">
						<?php if ($facebook = get_field('facebook', 'options')) : ?>
							<li class="fb"><a href="<?php echo esc_html($facebook); ?>" title="Facebook"><?php echo get_svg_icon('img-facebook', '11', '23'); ?></a>
							<?php endif; ?>

							<?php if ($linked_in = get_field('linkedin', 'options')) : ?>
							<li class="ln"><a href="<?php echo esc_html($linked_in); ?>" title="Linkedin"><?php echo get_svg_icon('img-linkedin', '22', '23'); ?></a>
							<?php endif; ?>

							<?php if ($twitter = get_field('twitter', 'options')) : ?>
							<li class="tw"><a href="<?php echo esc_html($twitter); ?>" title="Twitter"><?php echo get_svg_icon('img-twitter', '26', '23'); ?></a>
							<?php endif; ?>

							<?php if ($instagram = get_field('instagram', 'options')) : ?>
							<li class="in"><a href="<?php echo esc_html($instagram); ?>" title="Instagram"><?php echo get_svg_icon('img-instagram', '23', '23'); ?></a>
							<?php endif; ?>
					</ul>
					<!-- clutch start -->
					<!-- <script type="text/javascript" src="https://widget.clutch.co/static/js/widget.js"></script> -->
					<div class="clutch-widget" style="margin-top: 60px; margin-bottom:60px" data-url="https://widget.clutch.co" data-widget-type="2" data-height="145" data-nofollow="true" data-expandifr="true" data-scale="100" data-clutchcompany-id="91155"></div>
					<a href="http://localhost/neoito/contact/" class="button">Book a strategy call</a>
					<!-- clutch end -->
				</div>
			</div>
		</div><!-- .site-footer-top -->
		<div class="site-footer-bottom">
			<p>
				<strong>Copyright <span>©</span> <?php echo date("Y"); ?></strong><a href="https://www.neoito.com/privacy-policy/">Privacy Policy</a><a href="https://www.neoito.com/cookie-policy/">Cookie Policy</a><a href="https://www.neoito.com/terms-of-use/">Terms of Use</a>
			</p>
			<ul class="social-icons justify-center">
				<?php if ($facebook = get_field('facebook', 'options')) : ?>
					<li class="fb"><a href="<?php echo esc_html($facebook); ?>" title="Facebook"><?php echo get_svg_icon('img-facebook', '11', '23'); ?></a>
					<?php endif; ?>

					<?php if ($linked_in = get_field('linkedin', 'options')) : ?>
					<li class="ln"><a href="<?php echo esc_html($linked_in); ?>" title="Linkedin"><?php echo get_svg_icon('img-linkedin', '22', '23'); ?></a>
					<?php endif; ?>

					<?php if ($twitter = get_field('twitter', 'options')) : ?>
					<li class="tw"><a href="<?php echo esc_html($twitter); ?>" title="Twitter"><?php echo get_svg_icon('img-twitter', '26', '23'); ?></a>
					<?php endif; ?>

					<?php if ($instagram = get_field('instagram', 'options')) : ?>
					<li class="in"><a href="<?php echo esc_html($instagram); ?>" title="Instagram"><?php echo get_svg_icon('img-instagram', '23', '23'); ?></a>
					<?php endif; ?>
			</ul>
					<!-- start -->
					
					<!-- <script type="text/javascript" src="https://widget.clutch.co/static/js/widget.js"></script> -->
					<div class="block lg:hidden">
					<div class="clutch-widget" style="margin: 60px auto; width:189px" data-url="https://widget.clutch.co" data-widget-type="2" data-height="145" data-nofollow="true" data-expandifr="true" data-scale="100" data-clutchcompany-id="91155"></div>
					<a href="http://localhost/neoito/contact/" class="button">Book a strategy call</a>
					</div>
					<!-- end -->
		</div><!-- .site-footer-bottom -->
	</div><!-- .container-->
</footer><!-- #colophon -->
<?php /*<div class="bg-lines">
		<span></span>
		<span></span>
		<span></span>
		<span class="hidden md:block"></span>
		<span class="hidden md:block"></span>
		<span class="hidden md:block"></span>
	</div>*/ ?>
<?php get_template_part('templates/icons'); ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php if (is_page(18)) { ?>
	<script type="module" src="<?php echo get_template_directory_uri(); ?>/js/globe.js"></script>
<?php } ?>
</body>

</html>