<?php if($the_callenge = get_field('the_callenge')){?>
    <section class="cs-challenge">
        <div class="container">
            <div class="cs-s-content-main cs-s-content-main-sky">
                <div class="cs-s-content-left">
                    <div class="cs-s-content-left-sky">
                        <h2 data-aos="cs-text"><span>03</span>The Challenge</h2>
                    </div>
                </div><!-- .cs-s-content-left -->
                <div class="cs-s-content-right" data-aos="fade-up">
                    <?php the_field('the_callenge');?>
                </div><!-- .cs-s-content-right -->
            </div><!-- .cs-s-content-main -->       
        </div><!-- .container -->
    </section>
<?php }?>