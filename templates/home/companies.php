<?php if ( $companies = get_field('companies') ) : ?>
    <section id="companies" class="home-companies" data-aos="fade-up" data-aos-delay="500">
        <svg width="1440" height="1218" viewBox="0 0 1440 1218" preserveAspectRatio="none" class="clip-svg hidden lg:block">
                <path xmlns="http://www.w3.org/2000/svg" fill="#282A37" d="M0 0L1345.46 285.806C1400.89 297.58 1440.53 346.522 1440.53 403.187V1218L94.8319 929.342C39.5151 917.476 0 868.586 0 812.011V0Z" style=""></path></svg>
        <div class="home-companies-in">
            <div class="container">
                <h2>
                    <?php printmeta('cm_title', '%s');?> 
                    <svg width="58" height="36" viewBox="0 0 58 36" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"> <defs xmlns="http://www.w3.org/2000/svg"><linearGradient id="grad-16778" x1="99.302%" x2="1.513%" y1="53.444%" y2="47.201%"><stop offset="0%" stop-color="#FFFFFF"/><stop offset="100%" stop-color="#F36D45"/></linearGradient></defs><g xmlns="http://www.w3.org/2000/svg" fill="url(#grad-16778)" transform="rotate(-12)"><path class="pi-1" d="M57.947 15.296L0 5.987 1.292 0z"/><g transform="translate(0 10)"><path class="pi-2" d="M57.947 15.296L0 5.987 1.292 0z"/></g><g transform="translate(0 20)"><path class="pi-3" d="M57.947 15.296L0 5.987 1.292 0z"/></g></g></svg>   
                </h2>        
                
            </div><!-- .container -->
            <div class="home-companies-cl cl-flex">
                <?php foreach ($companies as $key => $company) {?>
                    <div class="home-companies-cl-item">
                    <img width="100%" height="auto" class="no-lazy" src="<?php echo esc_url($company['url']);?>"  alt="<?php echo esc_html_e($company['alt']);?>">
                    </div>
                <?php }?>
            </div><!-- .home-companies-cl -->
        </div><!-- .home-companies-in -->
    </section>
<?php endif;?>