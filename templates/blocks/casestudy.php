<?php

/**
 * Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'casestudy-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'casestudy-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<?php
    $args = array(
        'post_type'      => 'casestudy',
        'posts_per_page' => -1,
    );
    $casestudies = new WP_Query( $args );
    if ( $casestudies->have_posts() ) :             
?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">        
        <h2 class="section-main-title" data-aos="fade-up">Case Studies</h2>
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
    </div>
<?php endif; wp_reset_postdata();?>

