<section class="cs-result">
    <div class="container">
        <div class="cs-s-content-main cs-result-main">
            <div class="cs-s-content-left">
                <h2 data-aos="cs-text"><span>05</span>The Result</h2>
            </div><!-- .cs-s-content-left -->
            <div class="cs-s-content-right" data-aos="fade-up">
                <?php the_field('tr_description');?>
            </div><!-- .cs-s-content-right -->
        </div><!-- .cs-s-content-main --> 
        <div class="cs-s-content-main cs-result-sub">
            <div class="cs-s-content-left lgd:hidden">
                <div class="cs-s-content-left-in">
                    <?php if($image = get_field('tr_image')){ echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'">';}?>
                </div><!-- .cs-s-content-left-in -->
            </div><!-- .cs-s-content-left -->
            <div class="cs-s-content-right" data-aos="fade-up">
                <?php the_field('tr_content');?>
            </div><!-- .cs-s-content-right -->
        </div><!-- .cs-s-content-main -->       
    </div><!-- .container -->
</section>
