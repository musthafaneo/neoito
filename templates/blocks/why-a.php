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
$id = 'why-a-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'why-a-block';
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
    
    <div class="why-a-block-head">
        <?php if($title){?>
            <h2 data-aos="cs-text"><?php echo $title;?></h2>
        <?php }?>
        <?php if($description){?>
            <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
        <?php }?>
    </div><!-- .why-a-block-head -->   
    <?php if ( have_rows( 'content' ) ) : ?>
        <div class="why-a-block-items" data-aos="fade-up">
            <?php while ( have_rows( 'content' ) ) : the_row(); ?>
                <div class="why-a-block-item">
                    <div class="why-a-block-item-in">
                        <?php if($icon = get_sub_field('icon')){?>
                            <span>
                                <img src="<?php echo esc_url($icon['url']);?>" alt="<?php echo esc_html($icon['alt']);?>">
                            </span>
                        <?php }?>
                        <h3><?php the_sub_field('title');?></h3>                        
                    </div><!-- .why-a-block-item-in -->
                </div><!-- .why-a-block-item -->
            <?php endwhile;?> 
        </div><!-- .why-a-block-items -->        
    <?php endif;?>
</div>
