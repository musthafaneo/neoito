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
$id = 'why-node-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'why-node-block';
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
    
    <div class="why-node-block-head">
        <?php if($title){?>
            <h2 data-aos="cs-text"><?php echo $title;?></h2>
        <?php }?>
        <?php if($description){?>
            <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
        <?php }?>
    </div><!-- .why-node-block-head -->   
    <?php if ( have_rows( 'content' ) ) : ?>
        <div class="home-stats-items">
            <?php $i = 0; while ( have_rows( 'content' ) ) : the_row(); $i++;?>
                <div class="home-stats-item home-stats-item-<?php echo $i;?>" data-aos="fade-up">
                    <div class="home-stats-item-in">
                        <div class="home-stats-item-content">
                            <?php if($image = get_sub_field('icon')){
                                    echo '<span><img src="'.esc_url($image['url']).'"  alt="'.esc_html_e($image['alt']).'"></span>';
                                }?>
                            <h4><?php the_sub_field('text');?></h4>
                        </div>
                    </div><!-- .home-stats-item-in -->
                </div><!-- .home-stats-item -->
            <?php if($i == 5){ $i = 0;} endwhile;?>
        </div><!-- .home-stats-items -->
    <?php endif;?>
</div>
