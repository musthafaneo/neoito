<?php
    $args = array(
        'post_type'      => 'casestudy',
        'posts_per_page' => -1,
        'post__not_in' => array(get_the_ID())
    );
    $casestudies = new WP_Query( $args );
    if ( $casestudies->have_posts() ) :				
?>
    <section id="casestudies" class="home-blog cs-more-items" >         
        <div class="container">
            <h2 class="section-main-title" data-aos="fade-up">More Case Studies</h2>
            <div class="carousel-main" data-aos="fade-up">
                <div class="home-blog-list single-cl">
                    <?php while($casestudies->have_posts()): $casestudies->the_post();?>
                        <a href="<?php the_permalink();?>" class="home-blog-list-item">
                            <?php the_post_thumbnail('full');?>
                            <h3><?php the_title();?></h3>
                        </a><!-- .home-blog-list-item -->
                    <?php endwhile;?>
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
<?php endif; wp_reset_postdata();?>
