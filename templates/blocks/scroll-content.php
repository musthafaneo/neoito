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
$id = 'sl-cnt-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'sl-cnt-block';
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
    
    <?php if ( have_rows( 'content' ) ) : ?>
        <div class="home-solutions-head">
            <?php if($title){?>
            <h2 class="section-main-title" data-aos="cs-text"><?php echo $title;?></h2>
            <?php }?>
            <?php if($description){?>
                <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
            <?php }?>
        </div><!-- .home-solutions-head -->
            <div class="carousel-main" data-aos="fade-up">
                <div class="home-solutions-items">
                    <?php 
                        $i = 0; while ( have_rows( 'content' ) ) : the_row(); $i++;
                        $bg_color = get_sub_field('bg_color');
                    ?>
                        <div class="home-solutions-item">
                            
                            <?php if($image = get_sub_field('image')){
                                echo '<img src="'.esc_url($image['url']).'"  alt="'.esc_html_e($image['alt']).'">';
                            }?>
                            <span<?php if($bg_color){ echo ' style="--csbgcolor:'.$bg_color.'"';}?>></span>
                            <div class="home-solutions-item-in">    
                                <h3><span>0<?php echo $i;?></span><?php the_sub_field('title');?></h3>
                                <div class="home-solutions-item-content"<?php if($i ==1){ echo ' style="display: block;"';}?>>
                                    <p><?php the_sub_field('description');?></p>   
                                    <?php if ( have_rows( 'solution_list' ) ) : ?>
                                        <ul>
                                        <?php while ( have_rows( 'solution_list' ) ) : the_row();?>
                                            <li>
                                                <?php if($icon = get_sub_field('icon')){
                                                    echo '<img src="'.esc_url($icon['url']).'"  alt="Icon">';
                                                }?>
                                                <?php the_sub_field('label');?>
                                            </li>
                                        <?php endwhile;?>
                                        </ul>
                                    <?php endif;?>                      
                                </div><!-- .home-solutions-item-content -->
                            </div><!-- .home-solutions-item-in -->
                        </div><!-- .home-solutions-item -->
                    <?php endwhile;?>
                </div><!-- .home-solutions-items -->
                <div class="carousel-footer lg:hidden">
                    <span class="carousel-footer-bar"></span>
                    <span class="flex items-center">
                        <?php 
                            echo get_svg_icon('img-slide-prev', '17', '15', '<span class="slick-arrow slick-prev carousel-prev">', '</span>');
                            echo get_svg_icon('img-slide-next', '17', '15', '<span class="slick-arrow slick-next carousel-next">', '</span>');
                        ?>
                    </span>
                </div><!-- .carousel-footer -->
            </div><!-- .carousel-main -->

        
<?php endif;?>
</div>
