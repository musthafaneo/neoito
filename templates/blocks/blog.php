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
$id = 'blog-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blog-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">        
        <h2 class="section-main-title" data-aos="fade-up">Now Live on Blog</h2>
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
    </div>

