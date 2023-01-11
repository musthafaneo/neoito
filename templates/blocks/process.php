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
$id = 'process-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'process-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title = get_field('title');
$description = get_field('description');
$style = get_field('style');
$top_bg_color = get_field('top_bg_color');
$bottom_bg_color = get_field('bottom_bg_color');
if(!empty($style)){
    $className .= ' '.$style;
}
if($top_bg_color != 'none'){
    $className .= ' top-bg-'.$top_bg_color;
}
if($bottom_bg_color != 'none'){
    $className .= ' bottom-bg-'.$bottom_bg_color;
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>"> 
    <div class="service-process-in">   
        <div class="process-block-head">
            <?php if($title){?>
                <h2 data-aos="cs-text"><?php echo $title;?></h2>
            <?php }?>
            <?php if($description){?>
                <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
            <?php }?>
        </div><!-- .process-block-head -->   
        <?php 
            if($style == 'style-1'){
                get_template_part( 'templates/blocks/process/process-1' );
            }
            if($style == 'style-2'){
                get_template_part( 'templates/blocks/process/process-2' );
            }
            if($style == 'style-3'){
                get_template_part( 'templates/blocks/process/process-3' );
            }
            if($style == 'style-4' || $style == 'style-5'){
                get_template_part( 'templates/blocks/process/process-4' );
            }
        ?>
    </div>
</div>
