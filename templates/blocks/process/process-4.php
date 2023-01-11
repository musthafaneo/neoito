<?php 
$process = get_field('process');
$cls = "";
if(count($process) < 7){
    $cls = " three-col";
}
?>
<div class="process-block-items <?php echo $cls;?>">
    <?php $i = 0; while ( have_rows( 'process' ) ) : the_row(); $i++;?>
        <div class="process-block-item">
            <div class="process-block-item-in" data-aos="fade-up">
                <?php if($icon = get_sub_field('icon')){?>
                    <span><img src="<?php echo esc_url($icon['url']);?>" alt="icon"></span>
                <?php }?>
                <div class="process-block-item-cnt">
                    <h4><?php the_sub_field('title');?></h4>
                    <?php the_sub_field('description');?>
                </div>
            </div><!-- .service-process-item-in -->
        </div><!-- .service-process-item -->
    <?php endwhile;?>
</div><!--.service-process-items -->
