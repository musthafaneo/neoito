<section class="banner case-study-banner">
    <div class="container">
        <div class="case-study-banner-main">            
            <div class="case-study-banner-right" data-aos="fade-up">
                <div class="case-study-banner-right-in">
                        <?php 
                            $image_md = get_field('b_image_md');
                            $image_lg = get_field('b_image_lg');

                            if($image_md || $image_lg){?>
                            <picture>
                                <?php 
                                    if($image_lg){ echo '<source  media="(min-width: 1024px)" srcset="'.$image_lg['url'].'">';}
                                    if($image_md){ 
                                        echo '<img src="'.$image_md['url'].'" alt="'.$image_md['alt'].'">';
                                    }else{
                                        echo '<img src="'.$image_lg['url'].'" alt="'.$image_lg['alt'].'">';
                                    }
                                ?>
                            </picture>
                        <?php }?>
                        <?php if ($tech_stacks = get_field('tech_stack')): ?>
                            <ul>
                                <?php 
                                    foreach ($tech_stacks as $key => $tech_stack) {
                                        echo '<li><img src="'.esc_url( $tech_stack['url']).'" alt="'.$tech_stack['alt'].'"></li>';
                                    }
                                ?>
                            </ul>
                        <?php endif;?>
                </div><!-- .case-study-banner-right-in -->
            </div><!-- .case-study-banner-right -->
            <div class="case-study-banner-left">
                <?php 
                    printmeta('b_title', '<h1>%s</h1>');
                    printmeta('b_description', '<p>%s</p>');
                ?> 
                <?php 
                    $industry = get_field('industry');
                    $country = get_field('country');
                    if($industry || $country){
                        echo '<ul>';
                        if($industry){
                            echo '<li>'.get_svg_icon('img-factory', '40', '40').'<h3>Industry</h3><span>'.$industry.'</span></li>';
                        }
                        if($country){
                            echo '<li>'.get_svg_icon('img-pin', '40', '40').'<h3>Country</h3><span>'.$country.'</span></li>';
                        }
                        echo '</ul>';

                     }
                ?>
            </div><!-- .case-study-banner-left -->
        </div><!-- .case-study-banner-main -->
        
    </div><!-- .container -->
</section>