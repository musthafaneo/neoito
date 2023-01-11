<section id="lets-talk" class="lets-talk">
    <div class="lets-talk-in" data-aos-id="fill-svg-lt">
        <span class="path-anim-main hidden lg:flex justify-end">
            <svg class="path-anim" data-aos-parent="lets-talk-in" width="1316" height="1259" viewBox="0 0 1316 1259" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin">
                <path xmlns="http://www.w3.org/2000/svg" fill="url(#paint0_linear_235_1168)" d="M0 0.709961L291.5 0.709919L1373.54 1129.74L1173.32 1258.22L0 0.709961Z" opacity=".07" />
                <defs xmlns="http://www.w3.org/2000/svg">
                    <linearGradient id="paint0_linear_235_1168" x1="99.507" x2="1133.11" y1="-25.586" y2="1050.97" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#F36E47" />
                        <stop offset="1" stop-color="#F36E47" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg>
        </span>
        <div class="container">
            <div class="lets-talk-main">
                <div class="lets-talk-content">
                    <div class="lets-talk-content-head hidden lg:inline-block" data-aos="cs-text">
                        <?php
                        printmeta('lt_title', '<h2>%s</h2>', '', 2);
                        printmeta('lt_sub_title', '<h3>%s</h3>', '', 2);
                        ?>
                    </div><!-- .lets-talk-content-head -->
                    <div class="text-center block lg:hidden">
                        <a href="#" class="button contact-form-popup" data-aos="fade-up"><?php esc_html_e('Let’s Talk', 'neoito'); ?></a>
                    </div>
                    <?php if ($lt_awards = get_field('lt_awards', 2)) { ?>
                        <div class="lets-talk-content-awards" data-aos="fade-up">
                            <?php foreach ($lt_awards as $key => $lt_award) { ?>
                                <span>
                                    <img src="<?php echo esc_url($lt_award['url']); ?>" alt="<?php echo esc_html_e($lt_award['alt']); ?>">
                                </span>
                            <?php } ?>
                        </div><!-- .lets-talk-content-awards -->
                    <?php } ?>
                    <div class="lets-talk-content-main" data-aos="fade-up">
                        <?php printmeta('lt_journey_title', '<h4>%s</h4>', '', 2); ?>
                        <?php if (have_rows('lt_testimonial', 2)) : ?>
                            <?php while (have_rows('lt_testimonial', 2)) : the_row(); ?>
                                <p><?php the_sub_field('text'); ?></p>
                                <div class="lt-testi-footer">
                                    <?php if ($image = get_sub_field('image')) {
                                        echo '<img src="' . esc_url($image['url']) . '"  alt="' . esc_html_e($image['alt']) . '">';
                                    } ?>
                                    <div class="lt-testi-footer-in">
                                        <h5><?php the_sub_field('name'); ?></h5>
                                        <span><?php the_sub_field('designation'); ?></span>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div><!-- .lets-talk-content-main -->

                </div><!-- .lets-talk-content -->
                <div class="lets-talk-form-main" data-aos="fade-up">
                    <div class="lets-talk-form">
                        <a href="#" class="cf-close block lg:hidden"><?php echo get_svg_icon('img-close', '28', '28'); ?></a>
                        <div class="lets-talk-form-in">
                            <h2 class="block lg:hidden"><?php the_field('lt_title'); ?><span><?php the_field('lt_sub_title'); ?></span></h2>
                            <!-- <?php // echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49"]');
                                    ?> -->
                            <!-- <script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js"></script>
                            <script>
                                hbspt.forms.create({
                                   
                                    portalId: "26506052",
                                    formId: "f5ac00a2-d383-4521-a884-09257717c7b6"
                                });
                            </script> -->

                            <script>
                                jQuery(document).ready(function() {
                                    jQuery(window).scroll(function() {
                                    if (!jQuery('.hbspt-form').length) {
                                        hbspt.forms.create({
                                            portalId: "26506052",
                                            formId: "f5ac00a2-d383-4521-a884-09257717c7b6"
                                        });
                                    }
                                });
                            });
                            </script>

                        </div>
                    </div><!-- .lets-talk-form -->
                </div><!-- .lets-talk-form-main -->
            </div><!-- .lets-talk-main -->
            <?php if (have_rows('locations', 2)) : ?>
                <div class="home-locations hidden lg:block">
                    <h2 data-aos="cs-text"><?php esc_html_e('LOCATIONS', 'neoito'); ?></h2>
                    <div class="home-locations-items">
                        <?php while (have_rows('locations', 2)) : the_row(); ?>
                            <div class="home-locations-item" data-aos="fade-up">
                                <div class="home-locations-item-in">
                                    <h3><?php the_sub_field('location'); ?></h3>
                                    <div class="hli-address">
                                        <p><?php the_sub_field('address'); ?></p>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#" class="copy-clip" data-text="<?php echo strip_tags(get_sub_field('address')); ?>"><?php echo get_svg_icon('img-clipboard', '12', '12',); ?></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo esc_url(get_sub_field('map_coordinate')); ?>" target="_blank"><?php echo get_svg_icon('img-location', '12', '12',); ?></a>
                                        </li>
                                    </ul>
                                </div><!-- .home-locations-item-in -->
                            </div><!-- .home-locations-item -->
                        <?php endwhile; ?>
                    </div><!-- .home-locations-items -->
                </div><!-- .home-locations -->
            <?php endif; ?>
        </div><!-- .container -->
    </div><!-- .lets-talk-in -->
</section>