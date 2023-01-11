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
$id = 'global-leaders-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'global-leaders-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$sub_title = get_field('sub_title');
$title = get_field('title');
$description = get_field('description');
$style = get_field('style');
if(!empty($style)){
    $className .= ' '.$style;
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    
    <div class="global-leaders-block-head">
        <?php if($title){?>
            <h2 class="section-main-title" data-aos="cs-text"><?php echo $title;?></h2>
        <?php }?>
        <?php if($description){?>
            <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
        <?php }?>
    </div><!-- .global-leaders-block-head -->   
    <?php if($logos = get_field('logos')): ?>
        <div class="global-leaders-block-items">
            <?php foreach ($logos as $key => $logo){?>
                <div class="global-leaders-block-item" data-aos="fade-up">
                    <div class="global-leaders-block-item-in">
                        <?php echo '<img src="'.esc_url($logo['url']).'"  alt="'.esc_html_e($logo['alt']).'">';?>
                    </div><!-- .global-leaders-block-item-in -->
                </div><!-- .global-leaders-block-item -->
            <?php }?>
        </div><!-- .global-leaders-block-items -->
    <?php endif;?>
</div>
