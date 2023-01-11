<?php if ( have_rows( 'emerging_technologies' ) ) : ?>
    <section id="em-techs" class="service-em-techs">
        <div class="container">
            <div class="service-em-techs-head">
                <?php 
                    printmeta('et_title', '<h2 class="section-main-title" data-aos="cs-text">%s</h2>');
                ?>
            </div><!-- .service-em-techs-head -->
            <div class="carousel-main">
                <div class="service-em-techs-items">
                    <?php 
                        $style = '';
                        while ( have_rows( 'emerging_technologies' ) ) : the_row();
                        $icon = get_sub_field('icon');
                        $url = get_sub_field('url');
                        
                        if($bg_image = get_sub_field('bg_image')){
                            $style = ' style="--bg-image: url('.$bg_image['url'].')"';
                        }
                    ?>
                        <div class="service-em-techs-item" <?php echo $style;?>>
                            <?php if($url){?>
                                <a href="<?php echo esc_url( $url );?>" class="service-em-techs-item-in" data-aos="fade-up">
                            <?php }else{?>
                                <div class="service-em-techs-item-in" data-aos="fade-up">
                            <?php }?>
                            
                                <?php if($icon){ the_get_inline_svg_form_url($icon['url']);}?>
                                <h3><?php the_sub_field('title');?></h3>
                            <?php if($url){?>
                                </a>
                            <?php }else{?>
                                </div>
                            <?php }?>
                        </div><!-- .service-em-techs-item -->
                    <?php endwhile;?>
                </div><!--.service-em-techs-items -->
                <div class="carousel-footer">
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