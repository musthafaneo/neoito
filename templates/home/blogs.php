
    <section id="blogs" class="home-blog" >         
        <div class="container">
            <?php printmeta('blog_title','<h2 class="section-main-title" data-aos="fade-up">%s</h2>');?>
            <div class="carousel-main" data-aos="fade-up">                
                <div class="home-blog-list single-cl">
                    <?php awsm_custom_blog_post();?>
                </div><!-- .home-blog-list -->
                <div class="carousel-footer">
                    <span class="carousel-footer-bar"></span>
                    <span class="flex items-center">
                        <?php 
                            echo get_svg_icon('img-slide-prev', '17', '15', '<span class="slick-arrow slick-prev carousel-prev">', '</span>');
                            echo get_svg_icon('img-slide-next', '17', '15', '<span class="slick-arrow slick-next carousel-next">', '</span>');
                        ?>
                    </span>
                </div><!-- .carousel-footer -->
            </div><!-- .carousel-main -->
        </div><!-- .container -->        
    </section>
