<section class="banner service-banner cs-banner">
    <div class="container">
        <div class="service-banner-main">
            <div class="service-banner-left" data-aos="na" data-aos-id="fill-svg">
                <?php 
                    printmeta('b_sub_title', '<h2>%s</h2>');
                    printmeta('b_title', '<h1 class="banner-title">%s</h1>');
                ?>
                <span class="b-path-anim hidden lg:block">
                    <svg class="path-anim" data-aos-parent="service-banner-left" width="122" height="42" viewBox="0 0 122 42" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"><path xmlns="http://www.w3.org/2000/svg" fill="#887C79" fill-rule="evenodd" d="M114.222 30.9693C113.766 30.9776 113.334 30.9852 112.952 30.9919C112.146 31.0061 111.559 31.0164 111.421 31.0223C102.434 31.4062 93.988 33.1636 85.5067 36.2161C84.8181 36.463 84.4603 37.2248 84.7072 37.9135C84.9541 38.6022 85.7159 38.9599 86.4046 38.7129C94.6279 35.7503 102.818 34.0436 111.536 33.6723C111.673 33.6664 112.254 33.6558 113.054 33.6413C115.214 33.6021 118.975 33.5338 119.943 33.4484C120.488 33.403 120.782 33.208 120.847 33.1554C121.203 32.8892 121.323 32.5694 121.367 32.3067C121.415 32.0096 121.373 31.5003 120.971 30.9766C120.657 30.5719 119.945 29.9659 119.486 29.5758C119.325 29.4395 119.196 29.3295 119.126 29.2638C117.972 28.1802 116.754 27.0896 115.514 25.9799C112.36 23.1553 109.068 20.2076 106.35 16.9407C102.74 12.6014 100.14 7.69278 100.453 1.69089C100.492 0.960253 99.9274 0.336121 99.1968 0.297299C98.4661 0.258474 97.8419 0.823025 97.8031 1.55366C97.4539 8.26398 100.275 13.7867 104.31 18.6361C106.982 21.8471 110.191 24.76 113.295 27.5467C75.6815 9.18617 31.293 6.08736 0.641968 38.8643C0.141878 39.397 0.170658 40.2356 0.706019 40.7376C1.23862 41.2377 2.07722 41.2089 2.57921 40.6735C32.9504 8.19687 77.207 12.2086 114.222 30.9693Z" clip-rule="evenodd"/></svg>
                </span>
                <span class="b-path-anim-2 hidden lg:block">
                    <svg class="path-anim" data-aos-parent="service-banner-left" width="363" height="23" viewBox="0 0 363 23" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"><path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#F36D45" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M51 6.88273C128 3.21606 290.6 -2.51727 325 3.88273C282.667 0.382715 158.6 -1.01731 1 21.3827C98.1667 16.0494 306.3 7.88269 361.5 17.8827"/></svg>
                </span>
            </div><!-- .service-banner-left -->
            <div class="service-banner-right">
                <?php printmeta('b_description', '<p>%s</p>');?>
                <span class="block lgd:text-center"><a href="<?php echo get_permalink(22);?>" class="button"><?php esc_html_e( 'Talk to our experts', 'neoito' );?></a></span>
            </div><!-- .service-banner-right -->
        </div><!-- .service-banner-main -->
        
    </div><!-- .container -->
</section>