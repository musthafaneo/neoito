<?php
/**
 * Template Name: Thank you
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
        <section class="thankyou-page">
            <?php while ( have_posts() ) : the_post();?>
                <div class="container">
                   <div class="thankyou-page-head">
                       <h1><?php esc_html_e( 'Thank you', 'neoito' );?></h1>
                        <h2>IT'S <?php echo date("l, F d, Y, h:i A,");?> AND YOU JUST MADE HISTORY</h2>
                    </div><!-- .thankyou-page-head -->
                    <div class="thankyou-page-msg">
                        <p>We have received your details and will get in touch with you soon!</p>
                        <a href="<?php echo get_permalink(22);?>" class="button-alt">Send another message</a>
                    </div><!-- .thankyou-page-msg -->
                    <div class="thankyou-page-wn">
                        <h2>What Happens next?</h2>
                        <?php if ( have_rows( 'content' ) ) : ?> 
                            <div class="acc-items">
                                <?php while ( have_rows( 'content' ) ) : the_row();?>
                                    <div class="acc-item">
                                        <div class="acc-item-head">
                                            <h3><?php the_sub_field('title');?></h3>
                                        </div><!-- .acc-item-head -->
                                        <div class="acc-item-content">
                                            <?php the_sub_field('description');?>
                                        </div><!-- .acc-item-content -->
                                    </div><!-- .acc-item -->
                                <?php endwhile;?>
                            </div><!-- .acc-items -->
                        <?php endif;?>
                        <div class="tpwn-foot">
                            <p>Actionable Resources to Grow Your Business. <a href="<?php echo get_field('blog_url', 'option');?>">Join Now</a></p>
                        </div>
                    </div><!-- .thankyou-page-wn -->
                </div><!-- .container -->
            <?php endwhile; // End of the loop. ?>
        </section>

	</main><!-- #main -->

    <div class="bg-lines">
		<span></span>
		<span></span>
		<span></span>
		<span class="hidden md:block"></span>
		<span class="hidden md:block"></span>
		<span class="hidden md:block"></span>
	</div>
    <?php get_template_part( 'templates/icons' );?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
