<?php 
    $count = count(get_field('process'));
?>
<div class="process-block-items-main">
    <div class="process-block-items" >
        <?php $i = 0; while ( have_rows( 'process' ) ) : the_row(); $i++;?>
            <div class="process-block-item">
                <div class="process-block-item-in">
                    <?php if($icon = get_sub_field('icon')){?>
                        <span><img src="<?php echo esc_url($icon['url']);?>" alt="icon"></span>
                    <?php }?>
                    <div data-aos="fade-up">
                        <h4><?php the_sub_field('title');?></h4>
                        <?php the_sub_field('description');?>
                    </div>
                </div><!-- .service-process-item-in -->
            </div><!-- .service-process-item -->
        <?php if($i%2 == 0 && $i !=$count){ echo '</div><div class="process-block-items">';}?>
        <?php endwhile;?>
    </div><!--.service-process-items -->
</div><!--.service-process-items-mian -->