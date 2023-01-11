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
$id = 'tcci-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'tcci-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' block-align' . $block['align'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="tcci-block-main">
        <div class="tcci-block-left" data-aos="fade-up">
            <?php the_field('content');?>
        </div><!-- .tcci-block-left --> 
        <div class="tcci-block-right" data-aos="fade-up">
            <?php if($image = get_field('image')){?>
                <span>
                    <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_html($image['alt']);?>">
                </span>
            <?php }?>
        </div><!-- .tcci-block-right --> 
    </div><!-- .tcci-block-main -->        
</div>
