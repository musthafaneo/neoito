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
$id = 'other-service-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'other-service-block';
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
    <div class="other-service-block-main">
        <div class="other-service-block-left">
            <?php if($title){?>
                <h2 class="section-main-title" data-aos="cs-text"><?php echo $title;?></h2>
            <?php }?>
            <?php if($description){?>
                <p class="lg:hidden" data-aos="fade-up"><?php echo $description;?></p>
            <?php }?>
            <span  class="lgd:hidden"><a href="<?php echo get_permalink('11');?>" class="button">Explore all services</a></span>
        </div><!-- .other-service-block-left -->
        <div class="other-service-block-right">
            <?php if($description){?>
                <p  class="lgd:hidden" data-aos="fade-up"><?php echo $description;?></p>
            <?php }?>
            <?php $services = get_field('services'); if($services): ?>
                <div class="other-service-block-items">
                    <?php 
                        foreach($services as $service){ 
                        $icon = get_field('icon', $service);
                    ?>
                        <div class="other-service-block-item" data-aos="fade-up">
                            <a href="<?php echo get_permalink($service);?>" class="other-service-block-item-in">
                                <?php if($icon){ the_get_inline_svg_form_url($icon['url']);}?>
                                <h3><?php echo get_the_title($service);?></h3>
                                <span class="v-more">View Details</span>
                            </a><!-- .other-service-block-item-in -->
                        </div><!-- .other-service-block-item -->
                    <?php }?> 
                </div><!-- .other-service-block-items -->
            <?php endif;?>            
        </div><!-- .other-service-block-right -->
        <div  class="lg:hidden text-center"><a href="<?php echo get_permalink('11');?>" class="button">Explore all services</a></div>
    </div><!-- .other-service-block-main -->
</div>
