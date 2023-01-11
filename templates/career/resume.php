<section class="career-resume" data-aos="fade-up">  
    <div class="container">
        <div class="career-resume-main">
            <?php if($res_bg_image = get_field('res_bg_image')){
                echo '<img src="'.esc_url($res_bg_image['url']).'" alt="'.esc_html($res_bg_image['alt']).'">';
            }?>
            <div class="career-resume-in">
                <?php 
                    printmeta('res_title', '<h2 class="section-main-title">%s</h2>');
                    printmeta('res_description', '<p>%s</p>');
                    echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true" tabindex="49"]');
                ?>
            </div><!-- .career-resume-in -->
        </div><!-- .career-resume-main -->
    </div><!-- .container -->
</section>
