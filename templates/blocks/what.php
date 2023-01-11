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
$id = 'what-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'what-block';
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
    
    <div class="what-block-head">
        <div class="what-block-head-left">
            <?php if($style == 'style-1'){
                if($sub_title){?>
                <h3 data-aos="cs-text"><?php echo $sub_title;?></h3>
            <?php }}?>
            <?php if($title){?>
                <h2 data-aos="cs-text"><?php echo $title;?></h2>
            <?php }?>
            <?php if(!$style == 'style-1'){?>
            <?php if($description){?>
                <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
            <?php }}?>
        </div><!-- .what-block-left -->
        <?php if($style == 'style-1'){?>
            <div class="what-block-head-right">
                <?php if($description){?>
                    <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
                <?php }?>
            </div><!---.what-block-right -->
        <?php }?>
    </div><!-- .what-block-head -->   
    <?php if ( have_rows( 'content' ) ) : ?>
        <div class="what-block-items">
            <?php while ( have_rows( 'content' ) ) : the_row(); ?>
                <div class="what-block-item" data-aos="fade-up">
                    <div class="what-block-item-in">
                        <?php if($icon = get_sub_field('icon')){?>
                            <span>
                                <img src="<?php echo esc_url($icon['url']);?>" alt="<?php echo esc_html($icon['alt']);?>">
                            </span>
                        <?php }?>
                        <?php if($style == 'style-4'){ echo '<div class="what-block-item-cnt">';}?>
                            <h3><?php the_sub_field('title');?></h3>
                            <p><?php the_sub_field('description');?></p>
                        <?php if($style == 'style-4'){ echo '</div><!-- .what-block-item-cnt -->';}?>
                        
                    </div><!-- .what-block-item-in -->
                </div><!-- .what-block-item -->
            <?php endwhile;?> 
        </div><!-- .what-block-items -->        
    <?php endif;?>
</div>
