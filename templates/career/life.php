<?php if ( have_rows( 'life_testimonials' ) ) : ?>
    <section class="employee-testi">
        <div class="container">
            <div class="about-team-head">
            <?php 
                printmeta('life_title', '<h2 class="section-main-title" data-aos="cs-text">%s</h2>');
            ?>
            </div><!-- .about-team-head -->
            <div class="carousel-main">
                <div class="relative" data-aos="fade-up">
                    <div class="about-team-cl-main">
                        <?php while ( have_rows( 'life_testimonials' ) ) : the_row(); ?>
                            <div class="about-team-cl-main-item">
                                <div class="about-team-cl-main-item-img">
                                    <?php if($image = get_sub_field('image')){
                                        echo '<span><img src="'.esc_url($image['url']).'"  alt="'.esc_html_e($image['alt']).'"></span>';
                                    }?>
                                </div><!-- .about-team-cl-main-item-img -->
                                <div class="about-team-cl-main-item-cnt">
                                    <p><?php the_sub_field('quote');?></p>
                                    <h3><?php the_sub_field('name');?></h3>
                                    <span><?php the_sub_field('designation');?></span>                                    
                                </div><!-- .about-team-cl-main-item-cnt -->
                            </div><!-- .about-team-cl-main-item -->
                        <?php endwhile;?>
                    </div><!-- .about-team-cl-main -->
                    <?php /* <div class="about-team-cl-sub">
                        <?php while ( have_rows( 'life_testimonials' ) ) : the_row(); ?>
                            <div class="about-team-cl-sub-item">
                                <div class="about-team-cl-sub-item-img">
                                    <?php if($image = get_sub_field('image')){
                                        echo '<img src="'.esc_url($image['url']).'"  alt="'.esc_html_e($image['alt']).'">';
                                        echo '<span>'.get_sub_field('name').'</span>';
                                    }?>
                                </div><!-- .about-team-cl-sub-item-img -->                            
                            </div><!-- .about-team-cl-sub-item -->
                        <?php endwhile;?>
                    </div><!-- .about-team-cl-sub --> */?>
                </div>
                <div class="carousel-footer" data-aos="fade-up">
                    <span class="carousel-footer-bar"></span>
                    <span class="flex items-center">
                        <?php 
                            echo get_svg_icon('img-slide-prev', '17', '15', '<span class="slick-arrow slick-prev carousel-prev">', '</span>');
                            echo get_svg_icon('img-slide-next', '17', '15', '<span class="slick-arrow slick-next carousel-next">', '</span>');
                        ?>
                    </span>
                </div><!-- .carousel-footer -->
            </div><!-- .carousel-main -->
        </div><!-- .container -->
    </section>
<?php endif;?>