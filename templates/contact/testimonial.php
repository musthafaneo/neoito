<?php if ( have_rows( 'testimonial' ) ) : ?>
<?php while ( have_rows( 'testimonial' ) ) : the_row(); ?>
    <section class="contact-testi">
        <div class="container">
            <div class="contact-testi-main" data-aos="fade-up">
                <?php the_sub_field('quote');?>
                <div class="contact-testi-foot">
                    <?php if($image = get_sub_field('image')){ echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'">';}?>
                    <div class="contact-testi-foot-in">
                        <h4><?php the_sub_field('name');?></h4>
                        <span><?php the_sub_field('designation');?></span>
                    </div><!-- .ontact-testi-foot-in -->
                </div><!-- .ontact-testi-foot -->
            </div><!-- .client-mesage -->
        </div><!-- .container -->
    </section>
<?php endwhile;?>
<?php endif;?>