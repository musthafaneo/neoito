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
$id = 'stats-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'stats-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
       
    <?php if ( have_rows( 'content' ) ) : ?>
        <div class="home-stats-items">
            <?php $i = 0; while ( have_rows( 'content' ) ) : the_row(); $i++;?>
                <div class="home-stats-item home-stats-item-<?php echo $i;?>" data-aos="fade-up">
                    <div class="home-stats-item-in">
                        <?php if($image = get_sub_field('image')){
                            echo '<img src="'.esc_url($image['url']).'"  alt="'.esc_html_e($image['alt']).'">';
                        }?>
                        <div class="home-stats-item-content">
                            <h3><?php the_sub_field('value');?></h3>
                            <p><?php the_sub_field('label');?></p>
                        </div>
                    </div><!-- .home-stats-item-in -->
                </div><!-- .home-stats-item -->
            <?php if($i == 5){ $i = 0;} endwhile;?>
        </div><!-- .home-stats-items -->
    <?php endif;?>
</div>
