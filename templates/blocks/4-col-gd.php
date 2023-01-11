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
$id = 'four-cgd-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'four-cgd-block';
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
    <div class="four-cgd-block-head">
        <?php if($title){?>
            <h2 class="section-main-title" data-aos="cs-text"><?php echo $title;?></h2>
            <?php if($description){?>
                <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
            <?php }?>
        <?php }?>
    </div><!-- .four-cgd-block-head --> 
    <?php if ( have_rows( 'content' ) ) : ?>
        <div class="four-cgd-block-items">
                <?php $i = 0; while ( have_rows( 'content' ) ) : the_row(); $i++; ?>
                    <div class="four-cgd-block-item" data-aos="fade-up">
                        <div class="four-cgd-block-item-in">
                            <?php if($image = get_sub_field('icon')){?>
                                <span>
                                    <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_html($image['alt']);?>">
                                </span>
                            <?php }?>
                            <div class="four-cgd-block-item-cnt">
                                <h3><?php the_sub_field('title');?></h3>
                                <p><?php the_sub_field('description');?></p>
                            </div>
                        </div><!-- .four-cgd-block-item-in -->
                    </div><!-- .four-cgd-block-item -->
                <?php endwhile;?> 
        </div><!-- .four-cgd-block-items -->        
    <?php endif;?>    
</div>
