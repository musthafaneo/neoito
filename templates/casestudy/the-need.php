<section class="cs-need">
    <div class="container">
        <div class="cs-s-content-main-wrap">
            <div class="cs-s-content-main cs-s-content-main-sky">
                <div class="cs-s-content-left">
                    <div class="cs-s-content-left-sky">
                        <h2 data-aos="cs-text"><span>02</span>the need for <?php the_title();?></h2>
                    </div>
                </div><!-- .cs-s-content-left -->
                <div class="cs-s-content-right" data-aos="fade-up">
                    <?php the_field('the_need');?>
                </div><!-- .cs-s-content-right -->
            </div><!-- .cs-s-content-main-sky -->       
        </div><!-- .cs-s-content-main -->       
    </div><!-- .container -->
    <?php 
        if ( have_rows( 'tn_explantion' ) ) :
            $st = '';
            if($tn_bg_color= get_field('tn_bg_color')){
                $st = ' style="--bg-color:'.$tn_bg_color.'"';
            }
    ?>
        <div class="cs-need-exp"<?php echo $st;?>>
            <div class="container">
                <?php while ( have_rows( 'tn_explantion' ) ) : the_row();?>
                    <div class="cs-need-exp-item">
                        <div class="cs-need-exp-item-img" data-aos="fade-up">
                            <div class="cs-need-exp-item-img-in">
                                <?php if($image = get_sub_field('image')){
                                    echo '<img src="'.esc_url( $image['url']).'" alt="'.$image['alt'].'">';
                                }?>
                            </div><!-- .cs-need-exp-item-img-in -->
                        </div><!-- .cs-need-exp-item-img -->
                        <div class="cs-need-exp-item-cnt" data-aos="fade-up">
                            <?php the_sub_field('content');?>
                        </div><!-- .cs-need-exp-item-cnt -->
                    </div><!-- .cs-need-exp-item -->
                <?php endwhile;?>
            </div><!-- .container -->
        </div><!-- .cs-need-exp -->
    <?php endif;?>
</section>