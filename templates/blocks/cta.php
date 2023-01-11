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
$id = 'cta-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title = get_field('title');
$description = get_field('description');
$cta_text = get_field('cta_text');
$cta_url = get_field('cta_url');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">    
    <?php if($title){?>
        <h2 class="section-main-title" data-aos="cs-text"><?php echo $title;?></h2>
    <?php }?> 
    <?php if($cta_url){?>
        <span data-aos="fade-up" data-aos-delay="300"><a href="<?php echo esc_url($cta_url );?>" class="button button-alt" ><?php echo esc_html( $cta_text );?></a></span>
    <?php }?>
</div>
