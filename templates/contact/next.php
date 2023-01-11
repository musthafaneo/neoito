<?php if ( have_rows( 'nxt_content' ) ) : ?>
    <section class="contact-next">
        <div class="container">
            <div class="contact-next-head">
                <?php 
                    printmeta('nxt_title', '<h2 class="section-main-title" data-aos="cs-text">%s</h2>');
                    printmeta('nxt_description', '<p data-aos="fade-up" data-aos-delay="300">%s</p>');
                ?>
            </div><!-- .contact-next-head -->
            <div class="contact-next-items">
                <?php while ( have_rows( 'nxt_content' ) ) : the_row(); ?>
                    <div class="contact-next-item" data-aos="fade-up">
                        <div class="contact-next-item-in">
                            <h3><?php the_sub_field('title');?></h3>
                            <p><?php the_sub_field('description');?></p>
                        </div><!-- .contact-next-item-in -->
                    </div><!-- .contact-next-item -->
                <?php endwhile;?>
            </div><!-- .contact-next-items -->
                
        </div><!-- .container -->
    </section>

<?php endif;?>