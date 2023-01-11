<?php if ( have_rows( 'solutions' ) ) : ?>
    <section id="solutions" class="home-solutions">
        <div class="home-solutions-head">
            <div class="container">
                <?php printmeta('sl_title', '<h2 class="section-main-title" data-aos="fade-up">%s</h2>');?>
            </div><!-- .container -->
        </div><!-- .home-solutions-head -->
        <div class="container">
            <div class="carousel-main" data-aos="fade-up">
                <div class="home-solutions-items">
                    <?php 
                        $i = 0; while ( have_rows( 'solutions' ) ) : the_row(); $i++;
                        $bg_color = get_sub_field('bg_color');
                    ?>
                        <div class="home-solutions-item">
                            
                            <?php if($image = get_sub_field('image')){
                                echo '<img src="'.esc_url($image['url']).'"  alt="'.esc_html_e($image['alt']).'">';
                            }?>
                            <span<?php if($bg_color){ echo ' style="--csbgcolor:'.$bg_color.'"';}?>></span>
                            <div class="home-solutions-item-in">    
                                <h3><span>0<?php echo $i;?></span><?php the_sub_field('title');?></h3>
                                <div class="home-solutions-item-content"<?php if($i ==1){ echo ' style="display: block;"';}?>>
                                    <p><?php the_sub_field('description');?></p>   
                                    <?php if ( have_rows( 'solution_list' ) ) : ?>
                                        <ul>
                                        <?php while ( have_rows( 'solution_list' ) ) : the_row();?>
                                            <li>
                                                <?php if($icon = get_sub_field('icon')){
                                                    echo '<img src="'.esc_url($icon['url']).'"  alt="Icon">';
                                                }?>
                                                <?php the_sub_field('lablel');?>
                                            </li>
                                        <?php endwhile;?>
                                        </ul>
                                    <?php endif;?>                      
                                </div><!-- .home-solutions-item-content -->
                            </div><!-- .home-solutions-item-in -->
                        </div><!-- .home-solutions-item -->
                    <?php endwhile;?>
                </div><!-- .home-solutions-items -->
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

        </div><!-- .container -->
        
    </section>
<?php endif;?>