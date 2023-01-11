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
$id = 'sl-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'sl-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title = get_field('title');
$description = get_field('description');
$style = get_field('style');
if(!empty($style)){
    $className .= ' '.$style;
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">    
    <div class="sl-block-head">
        <?php if($title){?>
            <h2 class="section-main-title" data-aos="cs-text"><?php echo $title;?></h2>
        <?php }?>
        <?php if($description){?>
            <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
        <?php }?>
    </div><!-- .sl-block-head -->   
    <?php if ( have_rows( 'content' ) ) : ?>
        <?php if($style == 'style-5'){?>
            <div class="carousel-main">
        <?php }?>
                <div class="sl-block-items">
                    <?php $i = 0; while ( have_rows( 'content' ) ) : the_row(); $i++; ?>
                        <div class="sl-block-item" data-aos="fade-up">
                            <div class="sl-block-item-in">
                                <?php if($image = get_sub_field('icon')){?>
                                    <span>
                                        <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_html($image['alt']);?>">
                                    </span>
                                <?php }else{?>
                                    <span class="sl-cnt-item"></span>
                                <?php }?>
                                <div class="sl-block-item-cnt">
                                    <h3><?php the_sub_field('title');?></h3>
                                    <p><?php the_sub_field('description');?></p>
                                </div>
                            </div><!-- .sl-block-item-in -->
                        </div><!-- .sl-block-item -->
                    <?php endwhile;?> 
                </div><!-- .ill-block-items -->      
            <?php if($style == 'style-5'){?>
                <div class="carousel-footer">
                    <span class="carousel-footer-bar"></span>
                    <span class="flex items-center">
                        <?php 
                            echo get_svg_icon('img-slide-prev', '17', '15', '<span class="slick-arrow slick-prev carousel-prev">', '</span>');
                            echo get_svg_icon('img-slide-next', '17', '15', '<span class="slick-arrow slick-next carousel-next">', '</span>');
                        ?>
                    </span>
                </div><!-- .carousel-footer -->
                </div>
            <?php }?>
    <?php endif;?>
</div>
