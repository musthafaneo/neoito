<?php if ( have_rows( 'work' ) ) : ?>
    <section id="work" class="service-work">
        <div class="container">
            <div class="service-work-in" data-aos="fade-up"> 
                <div class="service-work-left"> 
                    <div class="service-work-tab hidden lg:block">
                        <?php $i=0; while ( have_rows( 'work' ) ) : the_row(); $i++;?>
                            <h2<?php if($i == 1){ echo ' class="active"';}?>><a href="#" data-tab-item-1="#service-work-tab-1<?php echo $i;?>" data-tab-item-2="#service-work-tab-2<?php echo $i;?>"><?php the_sub_field('title');?></a></h2>
                        <?php endwhile;?>  
                    </div><!-- .service-work-tab -->   
                    <div class="carousel-main">
                        <div class="service-work-items">
                            <?php $i=0; while ( have_rows( 'work' ) ) : the_row(); $i++;?>
                                <div id="service-work-tab-1<?php echo $i;?>" class="service-work-item<?php if($i == 1){ echo ' active';}?>" data-aos="fade-up-s">
                                    <h2 class="block lg:hidden"><?php the_sub_field('title');?></h2>
                                    <div class="service-work-tab-desc">
                                        <p><?php the_sub_field('description');?></p>
                                        <svg class="hidden lg:block" width="65" height="71" viewBox="0 0 65 71" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin">
                                            <path xmlns="http://www.w3.org/2000/svg" fill="#4C4E58" fill-rule="evenodd" d="M6.28896 22.6389C8.01604 16.3241 9.01806 9.66832 9.94964 3.20961C10.1463 1.81829 9.3919 0.475004 8.26379 0.312813C7.13861 0.0506305 6.06502 0.993707 5.87209 2.28509C4.97369 8.54532 4.02145 15.0023 2.3611 21.0203C2.00186 22.3026 2.58785 23.7375 3.67157 24.1977C4.75446 24.6579 5.92889 23.9211 6.28896 22.6389Z" clip-rule="evenodd"/><path xmlns="http://www.w3.org/2000/svg" fill="#4C4E58" fill-rule="evenodd" d="M26.6261 43.186C35.7109 33.3698 43.7252 22.1928 53.0357 12.5894C53.9036 11.7358 54.0086 10.1391 53.2677 9.09683C52.5259 8.05451 51.2191 7.88288 50.3474 8.83647C41.0112 18.4385 32.9721 29.6141 23.8617 39.4288C23.0099 40.3835 22.938 41.9816 23.7013 43.0251C24.4675 43.9686 25.7743 44.1406 26.6261 43.186Z" clip-rule="evenodd"/><path xmlns="http://www.w3.org/2000/svg" fill="#4C4E58" fill-rule="evenodd" d="M59.3502 64.3166C54.3613 64.3427 49.3724 64.3682 44.3826 64.3943C43.2425 64.3316 42.3169 65.4831 42.3196 66.8854C42.3231 68.2877 43.256 69.3399 44.397 69.4027C49.3942 69.377 54.3905 69.3519 59.3869 69.3262C60.5308 69.289 61.4506 68.1375 61.4413 66.7349C61.4282 65.4322 60.4933 64.2793 59.3502 64.3166Z" clip-rule="evenodd"/></svg>
                                    </div>
                                    <?php if($sub_title = get_sub_field('sub_title')){ echo '<h3>'.$sub_title.'</h3>';}?>
                                    <?php if ( have_rows( 'techs' ) ) : ?>
                                        <ul>
                                            <?php while ( have_rows( 'techs' ) ) : the_row(); ?>
                                                <li><?php if($icon = get_sub_field('icon')){ echo '<img src="'.$icon['url'].'" alt="icon">';}?><?php the_sub_field('label');?></li>
                                            <?php endwhile;?>
                                        </ul>
                                    <?php endif;?>                                    
                                    <?php if ( have_rows( 'client_message' ) ) : ?>
                                        <?php while ( have_rows( 'client_message' ) ) : the_row(); ?>
                                            <div class="client-mesage block lg:hidden">
                                                <p><?php the_sub_field('message');?></p>
                                                <div class="client-mesage-foot">
                                                    <?php if($image = get_sub_field('image')){ echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'">';}?>
                                                    <div class="client-mesage-foot-in">
                                                        <h4><?php the_sub_field('name');?></h4>
                                                        <span><?php the_sub_field('designation');?></span>
                                                    </div><!-- .client-mesage-foot-in -->
                                                </div><!-- .client-mesage-foot -->
                                            </div><!-- .client-mesage -->
                                        <?php endwhile;?>
                                    <?php endif;?>
                                    <span class="hidden lg:block"><a href="<?php echo get_permalink(22);?>" class="cs-button cs-button-alt">Talk to our <span>Experts</span></a></span>
                                </div><!-- .service-work-item -->
                            <?php endwhile;?>
                        </div><!--.service-work-items -->
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
                </div><!-- .service-work-left -->
                <div class="service-work-right lgd:hidden">
                    <?php $i=0; while ( have_rows( 'work' ) ) : the_row(); $i++;?>
                        <div id="service-work-tab-2<?php echo $i;?>" class="service-work-right-item service-work-right-item-<?php echo $i;?><?php if($i == 1){ echo ' active';}?>"  data-aos="fade-up-s">
                        <?php if($image_main = get_sub_field('image')){ echo '<div class="service-work-right-item-img"><img src="'.$image_main['url'].'" alt="'.$image_main['alt'].'"></div>';}?>                                
                            <?php if ( have_rows( 'client_message' ) ) : ?>
                                <?php while ( have_rows( 'client_message' ) ) : the_row(); ?>
                                    <div class="client-mesage">
                                        <p><?php the_sub_field('message');?></p>
                                        <div class="client-mesage-foot">
                                            <?php if($image = get_sub_field('image')){ echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'">';}?>
                                            <div class="client-mesage-foot-in">
                                                <h4><?php the_sub_field('name');?></h4>
                                                <span><?php the_sub_field('designation');?></span>
                                            </div><!-- .client-mesage-foot-in -->
                                        </div><!-- .client-mesage-foot -->
                                    </div><!-- .client-mesage -->
                                <?php endwhile;?>
                            <?php endif;?>
                        </div><!-- .service-work-right-item -->
                    <?php endwhile;?>
                </div><!-- .service-work-right -->
            </div><!-- .service-work-in -->
        </div><!-- .container -->
    </section>
<?php endif;?>