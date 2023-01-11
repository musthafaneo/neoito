

<section class="banner playbook-banner">
    <div class="container">
        
        <div class="playbook-banner-main">
            <div class="playbook-banner-left">
            <?php
                printmeta('title_banner', '<h1 class="banner-title">%s</h1>');
                printmeta('content_banner', '<p>%s</p>');
                printmeta('ebook_link', '<a href="%s" class="button">Download Big E-Book!</a>');
        
                ?>
                
            </div><!-- .career-banner-left -->
            <div class="career-banner-right text-center lg:text-right">
                <img src="<?php printmeta('banner_image','%s'); ?>">
            </div><!-- .career-banner-right -->
        </div><!-- .career-banner-main -->

    </div><!-- .container -->
</section>
