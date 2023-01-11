<?php 
    $testi = get_field('testimonials');
if ( have_rows( 'testimonials' ) ) : ?>
    <section id="testimonials" class="home-testimonials">
        <span class="path-anim-main hidden lg:block"><svg class="path-anim" data-aos-parent="home-testimonials-cl-main"width="1622" height="1062" viewBox="0 0 1622 1062" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"><path xmlns="http://www.w3.org/2000/svg" stroke="#F36E47" fill="none" stroke-width="152" d="M36 330.5L496.5 91L1572 1003.5"/>
        </svg></span>
         
        <div class="home-testimonials-in">     
            <div class="container">
                <?php printmeta('testi_title','<h2 class="section-title block lg:hidden" data-aos="fade-up">%s</h2>');?>
                    <div class="home-testimonials-main">
                        <div class="home-testimonials-cl-main" data-aos="fade-up" data-aos-id="fill-svg-testi">
                            <?php while ( have_rows( 'testimonials' ) ) : the_row();?>
                            <div class="home-testimonials-cl-main-item">
                                <?php if($video = get_sub_field('video_url')){?>
                                    <a href="<?php echo esc_url($video);?>" class="video-popup">
                                <?php }?>
                                    <div class="home-testimonials-cl-main-image">
                                        <?php if($image = get_sub_field('image')){  echo '<img src="'.esc_url($image['url']).'"  alt="'.esc_html_e($image['alt']).'">';}?>
                                        <div class="testi-author">
                                            <h3><?php the_sub_field('name');?></h3>
                                            <p><?php the_sub_field('designation');?></p>                                        
                                        </div>
                                    </div><!-- .home-testimonials-cl-main-image -->
                                <?php if($video){?>
                                        <svg width="75" height="75" viewBox="0 0 75 75" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"><g xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF" fill-rule="evenodd"><path class="video-cricle" d="M34.6822001,0.0436251849 C34.3998001,0.0764659849 33.5417001,0.174841985 32.7752001,0.262367985 C21.1680001,1.58713998 10.4438001,8.85873998 4.5586401,19.3949 C2.4093601,23.2426 0.8510871,28.0234 0.1896681,32.7988 C-0.0632227,34.6247 -0.0632227,40.356 0.1896681,42.1819 C1.7369401,53.3523 7.6970401,62.8399 17.0062001,68.951 C28.3933001,76.4262 43.3137001,77.0188 55.3652001,70.4745 C57.2054001,69.4754 57.6225001,69.1432 57.9907001,68.3829 C58.6241001,67.0752 58.2119001,65.5456 56.9954001,64.6893 C56.4698001,64.3192 56.2350001,64.2518 55.4664001,64.2495 C54.9035001,64.2478 54.3912001,64.3371 54.1184001,64.4845 C51.6568001,65.8133 50.6601001,66.3019 49.2777001,66.8565 C44.5379001,68.7585 39.4491001,69.494 34.4510001,68.9998 C21.9205001,67.7609 11.3068001,59.2691 7.4117301,47.3665 C5.2435301,40.7407 5.2433801,34.2337 7.4112901,27.6142 C10.5498001,18.0301 18.0173001,10.5767 27.6279001,7.43558998 C34.2151001,5.28260998 40.7436001,5.28686998 47.3506001,7.44834998 C54.5205001,9.79382998 60.4496001,14.4968 64.5311001,21.0758 C66.9109001,24.912 68.5326001,29.793 69.0033001,34.537 C69.6737001,41.2931 67.9791001,48.325 64.2284001,54.3506 C63.4027001,55.6771 63.3615001,55.7887 63.3606001,56.6964 C63.3596001,57.8396 63.7344001,58.556 64.6506001,59.1619 C65.4665001,59.7016 66.9017001,59.7242 67.7283001,59.2106 C68.6084001,58.6637 70.4033001,55.751 71.7848001,52.6275 C78.6600001,37.0831 74.2531001,18.9371 61.0127001,8.27141998 C55.6789001,3.97469998 49.7456001,1.39302998 42.7500001,0.325117985 C41.2877001,0.101829985 35.8232001,-0.0887643151 34.6822001,0.0436251849 Z"/><path d="M4.57763867,0.214246551 C2.46883867,0.780646551 0.803138672,2.46644655 0.252938672,4.59164655 C-0.0833613276,5.89114655 -0.0847613276,23.3816466 0.251438672,24.6890466 C0.719738672,26.5094466 2.24513867,28.2220466 3.98113867,28.8764466 C5.18443867,29.3302466 6.77863867,29.3960466 7.90463867,29.0388466 C8.46923867,28.8594466 11.7816387,27.0338466 16.6326387,24.2282466 C22.8365387,20.6399466 24.6107387,19.5473466 25.2274387,18.9354466 C27.5741387,16.6065466 27.5741387,12.6741466 25.2274387,10.3451466 C24.6107387,9.73324655 22.8365387,8.64064655 16.6326387,5.05244655 C11.7787387,2.24504655 8.47863867,0.426246551 7.92813867,0.255046551 C6.88223867,-0.0703534485 5.69123867,-0.0848534485 4.57763867,0.214246551 Z M13.5373387,10.0365466 C17.5225387,12.3427466 20.8798387,14.3220466 20.9979387,14.4349466 C21.1865387,14.6152466 21.1865387,14.6652466 20.9979387,14.8449466 C20.5451387,15.2765466 6.26553867,23.4419466 6.08483867,23.3725466 C5.93153867,23.3137466 5.89433867,21.6109466 5.89433867,14.6693466 C5.89433867,9.92264655 5.93833867,5.99514655 5.99213867,5.94144655 C6.04583867,5.88764655 6.13533867,5.84364655 6.19073867,5.84364655 C6.24623867,5.84364655 9.55223867,7.73054655 13.5373387,10.0365466 Z" transform="translate(24.974 22.85)"/></g></svg>
                                    </a>
                                <?php }?>
                            </div> 
                            <?php endwhile;?>
                        </div><!-- .home-testimonials-cl-main -->
                        <div class="home-testimonials-content" data-aos="fade-up">
                            <div class="carousel-main">
                                <div class="home-testimonials-cl-content">
                                    <?php while ( have_rows( 'testimonials' ) ) : the_row();?>
                                    <div class="home-testimonials-cl-content-item">
                                        <?php printmeta('testi_title','<h2 class="section-title hidden lg:block">%s</h2>');?>
                                        <p><?php the_sub_field('content');?></p>
                                        <a href="<?php echo get_permalink(22);?>" class="cs-button">Create your Success Story <span>with us</span></a>
                                    </div><!-- .home-testimonials-cl-content-item-->
                                    <?php endwhile;?>
                                </div><!-- .home-testimonials-cl-content -->
                                <?php if(count($testi) > 1){?>
                                    <div class="carousel-footer">
                                        <span class="carousel-footer-bar"></span>
                                        <span class="flex items-center">
                                            <?php 
                                                echo get_svg_icon('img-slide-prev', '17', '15', '<span class="slick-arrow slick-prev carousel-prev">', '</span>');
                                                echo get_svg_icon('img-slide-next', '17', '15', '<span class="slick-arrow slick-next carousel-next">', '</span>');
                                            ?>
                                        </span>
                                    </div><!-- .carousel-footer -->       
                                <?php }?>                     
                            </div><!-- .carousel-main -->
                            <a href="<?php echo get_permalink(22);?>" class="cs-button" data-aos="fade-up">Create your Success Story <span>with us</span></a>
                        </div><!-- .home-testimonials-content -->
                    </div><!-- .home-testimonials-main -->                

            </div><!-- .container -->
        </div><!-- .home-testimonials-in -->
        
    </section>
<?php endif;?>