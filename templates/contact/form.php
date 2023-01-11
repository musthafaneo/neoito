    <section id="contact-form" class="contact-form">
        <span class="path-anim-main hidden lg:flex justify-center">
            <svg class="path-anim" data-aos-parent="contact-form-main" width="1375" height="1259" viewBox="0 0 1375 1259" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"><path xmlns="http://www.w3.org/2000/svg" fill="url(#paint0_linear_3_39635)" d="M0.786865 0.710022L292.287 0.70998L1374.33 1129.74L1174.11 1258.22L0.786865 0.710022Z" opacity=".07"/><defs xmlns="http://www.w3.org/2000/svg"><linearGradient id="paint0_linear_3_39635" x1="100.294" x2="1133.9" y1="-25.586" y2="1050.97" gradientUnits="userSpaceOnUse"><stop stop-color="#F36E47"/><stop offset="1" stop-color="#F36E47" stop-opacity="0"/></linearGradient></defs></svg> 
        </span> 
        <div class="container">
            <div class="contact-form-main" data-aos-id="fill-svg-lt">
                <?php printmeta('cf_title', '<h2 data-aos="cs-text">%s</h2>');?>
                <div data-aos="fade-up">
                    <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true" tabindex="49"]');?>
                </div>
            </div><!-- .contact-form-main -->
            <?php if ( have_rows( 'locations', 2 ) ) : ?>
                <div class="home-locations hidden lg:block">
                    <h2 data-aos="cs-text"><?php esc_html_e( 'LOCATIONS', 'neoito' );?></h2>
                    <div class="home-locations-items">
                        <?php while ( have_rows( 'locations', 2 ) ) : the_row();?>
                            <div class="home-locations-item" data-aos="fade-up">
                                <div class="home-locations-item-in">
                                    <h3><?php the_sub_field('location');?></h3>
                                    <div class="hli-address"><p><?php the_sub_field('address');?></p></div>
                                    <ul>
                                        <li>
                                            <a href="#" class="copy-clip" data-text="<?php echo strip_tags(get_sub_field('address'));?>"><?php echo get_svg_icon('img-clipboard', '12', '12', );?></a>
                                        </li>
                                        <li>
                                            <a href="https://maps.google.com?saddr=Current+Location&daddr=<?php the_sub_field('map_coordinate');?>" target="_blank"><?php echo get_svg_icon('img-location', '12', '12', );?></a>
                                        </li>
                                    </ul>
                                </div><!-- .home-locations-item-in -->
                            </div><!-- .home-locations-item -->
                        <?php endwhile;?>
                    </div><!-- .home-locations-items -->
                </div><!-- .home-locations -->
            <?php endif;?>
        </div><!-- .container -->
    </section>

