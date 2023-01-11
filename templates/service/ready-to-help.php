<?php if ( have_rows( 'rth_content' ) ) : ?>
    <section id="ready-to-help" class="service-rth">
        <div class="container">
            <div class="service-rth-head">
                <?php 
                    printmeta('rth_title', '<h2 class="section-main-title" data-aos="cs-text">%s</h2>');
                    printmeta('rth_description', '<p data-aos="fade-up" data-aos-delay="300">%s</p>');
                ?>
            </div><!-- .service-rth-head -->
            <div class="service-rth-items">
                <?php while ( have_rows( 'rth_content' ) ) : the_row();?>
                    <div class="service-rth-item" data-aos="fade-up">
                        <div class="service-rth-item-in"><p><?php the_sub_field('text');?></p></div>
                    </div><!-- .service-rth-item -->
                <?php endwhile;?>
            </div><!--.service-rth-items -->
        </div><!-- .container -->
    </section>
<?php endif;?>