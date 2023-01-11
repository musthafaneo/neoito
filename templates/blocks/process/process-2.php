<div class="process-block-items-main">
    <svg class="path-svg xld:hidden" width="1350" height="1151" viewBox="0 0 1350 1151" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <path fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#F36D45" stroke-width="5" d="M-20 121C26.6667 198.667 164.4 357.8 342 373C564 392 693 226 773 154C853 82.0002 988 -10.9998 1136 5.00016C1284 21.0002 1356 113 1346 249C1336 385 1201 452 1136 466C1071 480 296 610 390 976C465.2 1268.8 813.667 1119.83 1035 1026.5"/>
        
    </svg>
    <div class="process-block-items">
        <?php while ( have_rows( 'process' ) ) : the_row();?>
            <div class="process-block-item" data-aos="fade-up">
                <div class="process-block-item-in">
                    <?php if($icon = get_sub_field('icon')){?>
                        <span><img src="<?php echo esc_url($icon['url']);?>" alt="icon"></span>
                    <?php }?>
                    <h4><?php the_sub_field('title');?></h4>
                </div><!-- .service-process-item-in -->
            </div><!-- .service-process-item -->
        <?php endwhile;?>
    </div><!--.service-process-items -->
</div><!--.service-process-items-main -->
