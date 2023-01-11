<?php if($testi_quote = get_field('testi_quote')):?>
    <section class="case-study-testi" data-aos="fade-up">
    <svg width="1439" height="597" viewBox="0 0 1439 597" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="none" class="lgd:hidden"><path xmlns="http://www.w3.org/2000/svg" fill="#282A37" d="M-2 0H1439V486.724C1439 549.871 1385.95 600.055 1322.9 596.555L101.903 528.768C43.6099 525.532 -2 477.32 -2 418.938V0Z"/></svg>
        <div class="container">
            <div class="case-study-testi-main">
                <p><?php echo get_field('testi_quote');?></p>
                <div class="case-study-testi-main-foot">
                    <?php if($image = get_field('testi_image')){ echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'">';}?>
                    <div class="case-study-testi-main-foot-in">
                        <h4><?php the_field('testi_name');?></h4>
                        <span><?php the_field('testi_designation');?></span>
                    </div><!-- .case-study-testi-main-foot-in -->
                </div><!-- .case-study-testi-main-foot -->
            </div><!-- .case-study-testi-main -->
        </div><!-- .container -->
    </section>
<?php endif;?>