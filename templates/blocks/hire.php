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
$id = 'hire-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hire-block';
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
    <?php if ( have_rows( 'content' ) ) : ?>
        <div class="hire-block-items">
            <?php $i = 0; while ( have_rows( 'content' ) ) : the_row(); $i++; ?>
                <div class="hire-block-item" data-aos="fade-up">
                    <div class="hire-block-item-in">
                        <p><?php the_sub_field('text');?></p>
                        <?php if($image = get_sub_field('image')){?>
                            <img src="<?php echo esc_url($image['url']);?>" alt="<?php esc_html($image['alt']);?>">
                        <?php }?>
                    </div><!-- .hire-block-item-in -->
                </div><!-- .hire-block-item -->
            <?php endwhile;?>
        </div><!-- .hire-block-items -->
    <?php endif;?>
</div>
