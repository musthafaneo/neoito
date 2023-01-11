<?php if($the_callenge = get_field('impact')){?>
    <section class="cs-impact">
            <div class="container">
                <div class="cs-s-content-main cs-s-content-main-sky">
                    <div class="cs-s-content-left">
                        <div class="cs-s-content-left-sky">
                            <h2 data-aos="cs-text"><span>04</span>The NeoITO Impact</h2>
                        </div>
                    </div><!-- .cs-s-content-left -->
                    <div class="cs-s-content-right" data-aos="fade-up">
                        <?php the_field('impact');?>
                    </div><!-- .cs-s-content-right -->
                </div><!-- .cs-s-content-main -->       
            </div><!-- .container -->
    </section>
<?php }?>
