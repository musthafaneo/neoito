<?php if ( have_rows( 'exp_technologies' ) ) : ?>
    <section id="expertise" class="service-exp">
        <div class="container">
            <div class="service-exp-main">
                <div class="service-exp-head">
                    <?php 
                        printmeta('exp_title', '<h2 class="section-main-title" data-aos="cs-text">%s</h2>');
                        printmeta('exp_description', '<p data-aos="fade-up" data-aos-delay="300" data-aos-id="exp-path">%s</p>');
                    ?>  
                    <span class="exp-path-anim hidden lg:block">
                    <svg class="path-anim" data-aos-parent="service-exp-head p" width="96" height="91" viewBox="0 0 96 91" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"><path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#4C4E58" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M2 2C4 24.3333 22 66 94.5 76.5M94.5 76.5C88.1667 72 74.5 60.8 70.5 52C73.2273 58 84 70 94.5 76.5ZM94.5 76.5C88.1667 76.8333 70.5 76.5 61 89.5"/></svg>
                </span>                 
                </div><!-- .service-exp-head -->
                <div class="carousel-main">
                    <div class="service-exp-items">
                        <?php while ( have_rows( 'exp_technologies' ) ) : the_row();?>
                            <div class="service-exp-item" data-aos="fade-up">
                                <div class="service-exp-item-in">
                                    <h3><?php the_sub_field('title');?></h3>
                                    <?php the_sub_field('content');?>
                                </div>
                            </div><!-- .service-exp-item -->
                        <?php endwhile;?>
                    </div><!--.service-exp-items -->
                    <div class="carousel-footer lg:hidden">
                        <span class="carousel-footer-bar"></span>
                        <span class="flex items-center">
                            <?php 
                                echo get_svg_icon('img-slide-prev', '17', '15', '<span class="slick-arrow slick-prev carousel-prev">', '</span>');
                                echo get_svg_icon('img-slide-next', '17', '15', '<span class="slick-arrow slick-next carousel-next">', '</span>');
                            ?>
                        </span>
                    </div><!-- .carousel-footer -->
                </div><!-- .carousel-main -->
            </div><!-- .service-exp-main -->
        </div><!-- .container -->
    </section>
<?php endif;?>