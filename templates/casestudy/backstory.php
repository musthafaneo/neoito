<section class="cs-backstory">
    <div class="container">
        <div class="cs-s-content-main cs-s-content-main-sky">
            <div class="cs-s-content-left">
                <div class="cs-s-content-left-sky">
                    <h2 data-aos="cs-text"><span>01</span>Backstory</h2>
                </div>
            </div><!-- .cs-s-content-left -->
            <div class="cs-s-content-right"  data-aos="fade-up">
                <?php the_field('backstory');?>
            </div><!-- .cs-s-content-right -->
        </div><!-- .cs-s-content-main -->
        <?php if($bs_gallery = get_field('bs_gallery')){?>
            <div class="cs-s-cl"  data-aos="fade-up">
                <?php foreach ($bs_gallery as $key => $bs_gal) {?>
                    <div class="cs-s-cl-item">
                        <?php echo '<img src="'.esc_url( $bs_gal['url']).'" alt="'.$bs_gal['alt'].'">';?>
                    </div><!-- .cs-s-cl-item -->
                <?php }?>
            </div><!-- .cs-s-cl -->
        <?php }?>
    </div><!-- .container -->
</section>