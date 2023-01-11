<section class="about-we-are">
    <div class="about-we-are-in">
        <div class="container">
            <div class="about-we-are-main">
                <div class="about-we-are-head">
                    <h2><span>We</span>Are</h2>
                    <?php printmeta('wa_description', '<p>%s</p>');?>
                </div><!-- .about-we-are-head -->
                <div class="relative about-we-are-head-b" data-aos="na" data-aos-id="wa-anim">
                    <?php printmeta('wa_title', '<h3>%s</h3>');?>
                    <span class="wa-path-anim">
                        <svg class="path-anim" data-aos-parent="about-we-are-head-b" width="363" height="23" viewBox="0 0 363 23" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"><path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#787474" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M51 6.88273C128 3.21606 290.6 -2.51727 325 3.88273C282.667 0.382715 158.6 -1.01731 1 21.3827C98.1667 16.0494 306.3 7.88269 361.5 17.8827"/></svg>
                    </span>
                </div>
                <?php if ( have_rows( 'wa_animation_texts' ) ) : ?>
                    <div class="about-we-are-panel">
                        <?php while ( have_rows( 'wa_animation_texts' ) ) : the_row();?>
                            <div>
                                <h4><?php the_sub_field('text');?></h4>
                            </div>
                        <?php endwhile;?>
                    </div><!-- .about-we-are-panel -->
                <?php endif;?>
            </div><!-- .about-we-are-main -->
        </div><!-- .container -->
    </div><!-- .about-we-are-in -->
</section>
