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
$id = 'expertise-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'expertise-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title = get_field('title');
$description = get_field('description');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if ( have_rows( 'content' ) ) : ?>   
        <div class="service-exp-main">
            <div class="service-exp-head">
                <?php if($title){?>
                    <h2 class="section-main-title" data-aos="cs-text"><?php echo $title;?></h2>
                 <?php }?>
                <?php if($description){?>
                    <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
                <?php }?> 
                <span class="exp-path-anim hidden lg:block">
                <svg class="path-anim" data-aos-parent="service-exp-head p" width="96" height="91" viewBox="0 0 96 91" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"><path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#4C4E58" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M2 2C4 24.3333 22 66 94.5 76.5M94.5 76.5C88.1667 72 74.5 60.8 70.5 52C73.2273 58 84 70 94.5 76.5ZM94.5 76.5C88.1667 76.8333 70.5 76.5 61 89.5"/></svg>
            </span>                 
            </div><!-- .service-exp-head -->
            <div class="carousel-main">
                <div class="service-exp-items">
                    <?php while ( have_rows( 'content' ) ) : the_row();?>
                        <div class="service-exp-item" data-aos="fade-up">
                            <div class="service-exp-item-in">
                                <h3><?php the_sub_field('title');?></h3>
                                <?php the_sub_field('content');?>
                            </div>
                        </div><!-- .service-exp-item -->
                    <?php endwhile;?>
                </div><!--.service-exp-items -->
                <div class="carousel-footer lg:hidden">
                    <span class="carousel-footer-bar"></span>
                    <span class="flex items-center">
                        <?php 
                            echo get_svg_icon('img-slide-prev', '17', '15', '<span class="slick-arrow slick-prev carousel-prev">', '</span>');
                            echo get_svg_icon('img-slide-next', '17', '15', '<span class="slick-arrow slick-next carousel-next">', '</span>');
                        ?>
                    </span>
                </div><!-- .carousel-footer -->
            </div><!-- .carousel-main -->
        </div><!-- .service-exp-main -->
    <?php endif;?> 
</div>
