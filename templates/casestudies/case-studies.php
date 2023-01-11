<?php if ( have_rows( 'casestudies' ) ) : ?>
    <section class="case-studies">
        <?php 
            $i = 0; while ( have_rows( 'casestudies' ) ) : the_row(); $i++;
            $btn_cls = 'cs-button';
            if($i == 1){
                $btn_cls = 'button';  
            }
            if($i == 4){
                $btn_cls .= ' cs-button-red'; 
            }
        ?>
        <div class="case-studies-item case-studies-item-<?php echo $i;?>">
            <?php if($i == 4){?>
                <svg width="1440" height="1070" viewBox="0 0 1440 1070" preserveAspectRatio="none" class="clip-svg hidden lg:block"><path xmlns="http://www.w3.org/2000/svg" fill="#E53935" d="M0 160.045C0 66.3811 80.0975 -7.25278 173.43 0.609363L1440 107.302V1070H0V160.045Z"/></svg>
            <?php }?>
            <div class="container">
                <div class="case-studies-item-in">
                    <div class="case-studies-item-content">
                            <?php 
                                $casestudy = get_sub_field('casestudy');
                                if($sub_title = get_sub_field('short_title')){ echo '<h3 data-aos="cs-text">'.$sub_title.'</h3>';}
                                if($title = get_sub_field('title')){ echo '<h2 data-aos="cs-text">'.$title.'</h2>';}
                            ?>
                            <div class="case-studies-item-image" data-aos="fade-up" data-aos-delay="200">
                            <?php if ( have_rows( 'image' ) ) : ?>
                                <?php while ( have_rows( 'image' ) ) : the_row(); ?>
                                    <div class="case-studies-item-image-in">
                                            <?php 
                                                $image_md = get_sub_field('image_md');
                                                $image_lg = get_sub_field('image_lg');

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
                                    </div><!-- .case-studies-item-image-in -->
                                <?php endwhile;?>
                            <?php endif;?>
                        </div><!-- .case-studies-item-image -->
                            <?php
                                if($description = get_sub_field('description')){ echo '<p data-aos="fade-up">'.$description.'</p>';}
                                if($casestudy){
                            ?>
                                <div class="client-mesage" data-aos="fade-up">
                                    <?php 
                                        if($quote = get_sub_field('client_quote')){
                                            $quote = $quote;
                                        }else{
                                            $quote = get_field('testi_quote', $casestudy);
                                        }
                                    ?>
                                    <p><?php echo $quote;?></p>
                                    <div class="client-mesage-foot">
                                        <?php if($image = get_field('testi_image', $casestudy)){ echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'">';}?>
                                        <div class="client-mesage-foot-in">
                                            <h4><?php the_field('testi_name',$casestudy);?></h4>
                                            <span><?php the_field('testi_designation',$casestudy);?></span>
                                        </div><!-- .client-mesage-foot-in -->
                                    </div><!-- .client-mesage-foot -->
                                </div><!-- .client-mesage -->
                            <span class="block lgd:text-center" data-aos="fade-up"><a href="<?php echo get_permalink($casestudy);?>" class="<?php echo $btn_cls;?>">View case <span>study</span></a></span>
                        <?php }?>
                    </div><!-- .case-studies-item-content -->
                    <?php /*<div class="case-studies-item-image lgd:hidden" data-aos="fade-up" data-aos-delay="200">
                        <?php if ( have_rows( 'image' ) ) : ?>
                            <?php while ( have_rows( 'image' ) ) : the_row(); ?>
                                <div class="case-studies-item-image-in">
                                    <?php if($image = get_sub_field('image_lg')){ echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'">';}?>
                                </div><!-- .case-studies-item-image-in -->
                            <?php endwhile;?>
                        <?php endif;?>
                    </div><!-- .case-studies-item-image -->*/?>
                </div><!-- .case-studies-item-in -->
            </div><!-- .container -->
        </div><!-- .case-studies-item -->
        <?php if($i==5){$i=0;}endwhile;?>
    </section>
<?php endif;?>