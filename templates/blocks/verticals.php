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
$id = 'verticals-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'verticals-block';
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
    <div class="verticals-block-head">
        <?php if($title){?>
            <h2 class="section-main-title" data-aos="cs-text"><?php echo $title;?></h2>
        <?php }?>
        <?php if($description){?>
            <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
        <?php }?>
    </div><!-- .verticals-block-head -->   
    <?php if ( $verticals = get_field('verticals') ) : ?>
            <div class="carousel-main">
                <div class="verticals-block-items<?php if($style == 'style-1'){ echo ' verticals-block-items-cl';}else{ echo '  verticals-block-items-m-cl';}?>">
                    <?php 
                        $style = '';
                        foreach($verticals as $vertical){
                        $icon = get_field('icon', 'verticals_'.$vertical->term_id);
                    ?>
                        <div class="verticals-block-item">
                            <div class="verticals-block-item-in" data-aos="fade-up">
                                <?php if($icon){ the_get_inline_svg_form_url($icon['url']);}?>
                                <h3><?php echo $vertical->name;?></h3>
                            </div>
                        </div><!-- .verticals-block-item -->
                    <?php }?>
                </div><!--.verticals-block-items -->
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
    <?php endif;?>
</div>
