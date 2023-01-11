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
$id = 'tech-stack-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'tech-stack-block';
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
    
    <div class="tech-stack-block-head">
        <?php if($title){?>
            <h2 class="section-main-title" data-aos="cs-text"><?php echo $title;?></h2>
        <?php }?>
        <?php if($description){?>
            <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
        <?php }?>
    </div><!-- .tech-stack-block-head -->   
    <?php if ( have_rows( 'content' ) ) : ?>
        <div class="tech-stack-block-items">
            <?php $i = 0; while ( have_rows( 'content' ) ) : the_row(); $i++; ?>
                <div class="tech-stack-block-item" data-aos="fade-up">
                    <div class="tech-stack-block-item-in">
                        <?php if($image = get_sub_field('image')){?>
                                <span>
                                    <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_html($image['alt']);?>">
                                </span>
                        <?php }?>
                        <h3><?php the_sub_field('text');?></h3>
                    </div><!-- .tech-stack-block-item-in -->
                </div><!-- .tech-stack-block-item -->
            <?php endwhile;?>
        </div><!-- .tech-stack-block-items -->
    <?php endif;?>
</div>
