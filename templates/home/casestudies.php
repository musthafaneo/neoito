<?php if ( have_rows( 'casestudies' ) ) : ?>
    <section id="casestudies" class="home-casestudies" data-aos="fade-up">
        <div class="home-casestudies-head">
            <div class="container">
                <?php printmeta('cs_title', '<h2 class="section-title">%s</h2>');?>
            </div><!-- .container -->
        </div><!-- .home-casestudies-head -->
        <div class="container">
            <div class="carousel-main">
                <div class="home-casestudies-cl">
                    <div class="block lg:hidden">
                        <div class="home-casestudies-cl-left">
                            <?php                            
                                while ( have_rows( 'casestudies' ) ) : the_row(); ;
                                $bg_color = get_sub_field('bg_color');
                                $cs = get_sub_field('casestudy');
                            ?>
                                    <a href="<?php echo get_permalink( $cs->ID);?>" class="home-casestudies-item">
                                        <h3><?php echo get_the_title( $cs->ID);?></h3>
                                        <div class="home-casestudies-item-in"<?php if($bg_color){ echo ' style="--csbgcolor:'.$bg_color.'"';}?>>  
                                        <?php if($image = get_sub_field('image')){
                                            echo '<img src="'.esc_url($image['url']).'"  alt="'.esc_html_e($image['alt']).'">';
                                        }?>
                                          
                                            
                                            <div class="home-casestudies-item-content hidden md:block">
                                                <?php the_sub_field('description');?>  
                                                <span><?php esc_html_e( 'Read more', 'neoito' );?></span>                
                                            </div><!-- .home-casestudies-item-content -->
                                        </div><!-- .home-casestudies-item-in -->
                                    </a><!-- .home-casestudies-item -->
                                <?php endwhile;?>
                        </div><!-- .home-casestudies-cl-left -->
                    </div>
                    <div class="home-casestudies-cl-1 hidden lg:block ">
                        <div class="home-casestudies-cl-left">
                            <?php 
                                $casestudies = get_field('casestudies');
                                $j=1;
                                if($casestudies>2 && $casestudies%2 != 0){
                                    $j = 2;
                                }
                                $i = $y = 0; 
                                for ($x=0; $x < $j; $x++) {                             
                                
                                while ( have_rows( 'casestudies' ) ) : the_row(); $i++; $y++;
                                $bg_color = get_sub_field('bg_color');
                                $cs = get_sub_field('casestudy');
                            ?>
                                <?php if($y % 2 != 0){?>
                                    <a href="<?php echo get_permalink( $cs->ID);?>" class="home-casestudies-item home-casestudies-item-<?php echo $i;?>">
                                        <h3><?php echo get_the_title( $cs->ID);?></h3>
                                        <div class="home-casestudies-item-in"<?php if($bg_color){ echo ' style="--csbgcolor:'.$bg_color.'"';}?>>  
                                        <?php if($image = get_sub_field('image')){
                                            echo '<img src="'.esc_url($image['url']).'"  alt="'.esc_html_e($image['alt']).'">';
                                        }?>
                                          
                                            
                                            <div class="home-casestudies-item-content hidden md:block">
                                                <?php the_sub_field('description');?>  
                                                <span><?php esc_html_e( 'Read more', 'neoito' );?></span>                
                                            </div><!-- .home-casestudies-item-content -->
                                        </div><!-- .home-casestudies-item-in -->
                                    </a><!-- .home-casestudies-item -->
                                <?php }?>
                            <?php if($i == 2){ $i = 0;} endwhile;}?>
                        </div><!-- .home-casestudies-cl-left -->
                    </div>
                    <div class="home-casestudies-cl-2 hidden lg:block ">
                        <div class="home-casestudies-cl-right">
                            <?php 
                                $casestudies = get_field('casestudies');
                                $j=1;
                                if($casestudies>2 && $casestudies%2 != 0){
                                    $j = 2;
                                }
                                $i = $y = 0;
                                for ($x=0; $x < $j; $x++) {                             
                                
                                while ( have_rows( 'casestudies' ) ) : the_row(); $i++; $y++;
                                $bg_color = get_sub_field('bg_color');
                                $cs = get_sub_field('casestudy');
                            ?>
                                <?php if($y % 2 == 0){ ?>
                                    <a href="<?php echo get_permalink($cs->ID);?>" class="home-casestudies-item home-casestudies-item-<?php echo $i;?>">
                                        <h3><?php echo get_the_title($cs->ID);?></h3>
                                        <div class="home-casestudies-item-in"<?php if($bg_color){ echo ' style="--csbgcolor:'.$bg_color.'"';}?>>  
                                        <?php if($image = get_sub_field('image')){
                                            echo '<img src="'.esc_url($image['url']).'"  alt="'.esc_html_e($image['alt']).'">';
                                        }?>
                                          
                                            
                                            <div class="home-casestudies-item-content hidden md:block">
                                                <?php the_sub_field('description');?>  
                                                <span><?php esc_html_e( 'Read more', 'neoito' );?></span>                
                                            </div><!-- .home-casestudies-item-content -->
                                        </div><!-- .home-casestudies-item-in -->
                                    </a><!-- .home-casestudies-item -->
                                <?php }?>
                            <?php if($i == 2){ $i = 0;} endwhile;}?>
                        </div><!-- .home-casestudies-cl-right -->
                    </div>
                </div><!-- .home-casestudies-cl -->
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