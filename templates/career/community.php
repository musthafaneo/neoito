<section class="career-community">
    <div class="container">
        <div class="career-community-main">
            <div class="career-community-left">
                <?php 
                    printmeta('cm_title', '<h2 class="section-main-title" data-aos="cs-text">%s</h2>');
                    printmeta('cm_description', '<p data-aos="fade-up" data-aos-delay="300">%s</p>');
                    printmeta('cm_join_link', '<a data-aos="fade-up" data-aos-delay="300" href="%s" target="_blank" class="cs-button">Join us on <span>nullcast</span></a>');
                ?>
            </div><!-- .career-community-left -->
            <div class="career-community-right lgd:hidden">
                <?php printmeta('cm_embed_code', '<div class="career-community-embed" data-aos="fade-up">%s</div>');?>
            </div><!-- .career-community-right -->
        </div><!-- .career-community-main -->
    </div><!-- .container -->
</section>
