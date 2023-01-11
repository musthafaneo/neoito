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
$id = 'faq-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'faq-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title = get_field('title');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">    
    <?php if($title){?>
        <h2 class="section-main-title" data-aos="cs-text"><?php echo $title;?></h2>
    <?php }?>
    <?php if ( have_rows( 'faq' ) ) : ?>
        <div class="faq-items" data-aos="fade-up">
            <?php $i = 0; while ( have_rows( 'faq' ) ) : the_row(); $i++; ?>
                <div class="faq-item">
                    <div class="faq-item-title">
                        <span></span><h3><?php the_sub_field('title');?></h3>
                    </div><!-- .faq-title -->
                    <div class="faq-item-content">
                        <?php the_sub_field('content');?>
                    </div><!-- .faq-block-item-in -->
                </div><!-- .faq-block-item -->
            <?php endwhile;?>
        </div><!-- .faq-block-items -->
    <?php endif;?>
</div>
