<section class="about-footer">
    <div class="container">
        <div class="about-footer-main">
            <?php if ( have_rows( 'contact' ) ) : ?>
                <div class="about-footer-main-in about-footer-contact">
                    <?php while ( have_rows( 'contact' ) ) : the_row();?>
                        <h2 class="section-main-title" data-aos="cs-text"><?php the_sub_field('title');?></h2>
                        <p data-aos="fade-up" data-aos-delay="300"><?php the_sub_field('description');?></p>
                        <span data-aos="fade-up" data-aos-delay="300"><a href="<?php echo get_permalink(22);?>" class="cs-button">Start My <span>Project</span></a></span>
                    <?php endwhile;?>
                </div><!-- .about-footer-contect -->
            <?php endif;?>
            <?php if ( have_rows( 'career' ) ) : ?>
                <div class="about-footer-main-in about-footer-career">
                    <?php while ( have_rows( 'career' ) ) : the_row();?>
                        <h2 class="section-main-title" data-aos="cs-text"><?php the_sub_field('title');?></h2>
                        <p data-aos="fade-up" data-aos-delay="300"><?php the_sub_field('description');?></p>
                        <span data-aos="fade-up" data-aos-delay="300"><a href="<?php echo get_permalink(89);?>" class="cs-button">Explore <span>Careers</span></a></span>
                    <?php endwhile;?>
                </div><!-- .about-footer-contect -->
            <?php endif;?>
        </div><!-- .about-footer-main -->
    </div><!-- .container -->
</section>
