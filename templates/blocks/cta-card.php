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
$id = 'cta-card-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta-card-block';
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
    <div class="cta-card-block-head">
        <?php if($title){?>
            <h2 class="section-main-title" data-aos="cs-text"><?php echo $title;?></h2>
        <?php }?>
    </div><!-- .cta-card-block-head -->   
    <?php if ( have_rows( 'content' ) ) : ?>
        <div class="cta-card-block-items">
            <?php $i = 0; while ( have_rows( 'content' ) ) : the_row(); $i++; ?>
                <div class="cta-card-block-item" data-aos="fade-up">
                    <div class="cta-card-block-item-in">
                        <?php if($image = get_sub_field('icon')){?>
                            <span>
                                <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_html($image['alt']);?>">
                            </span>
                        <?php }?>
                        <div class="cta-card-block-item-cnt">
                            <h3><?php the_sub_field('title');?></h3>
                            <p><?php the_sub_field('description');?></p>
                        </div>
                    </div><!-- .cta-card-block-item-in -->
                </div><!-- .cta-card-block-item -->
            <?php endwhile;?> 
        </div><!-- .ill-block-items -->       
    <?php endif;?>
    <div class="cta-card-block-footer" data-aos="fade-up">
         <?php if($description){?>
            <p><?php echo $description;?></p>
        <?php }?>
        <?php if($cta_url){?>
            <a href="<?php echo esc_url($cta_url );?>" class="button" ><?php echo esc_html( $cta_text );?></a>
        <?php }?>
    </div>
</div>
