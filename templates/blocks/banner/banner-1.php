<?php
    $image = get_field('image');
    $sub_title = get_field('sub_title');
    $title = get_field('title');
    $description = get_field('description');
?>
<div class="banner-block-content">
    <?php if($sub_title){?>
        <h2><?php echo $sub_title;?></h2>
    <?php }?>
    <?php if($title){?>
        <h1 class="banner-title" ><?php echo $title;?></h1>
    <?php }?>
    <div class="banner-block-content-main">
        <div class="banner-block-content-in">
            <?php if($description){?>
                <p><?php echo $description;?></p>
            <?php }?>
            <span class="block lgd:text-center"><a href="<?php echo get_permalink(22);?>" class="button"><?php esc_html_e( 'Talk to our experts', 'neoito' );?></a></span>
        </div><!-- .banner-block-content-in -->
        <?php if($image){?>
            <div class="banner-block-content-image">
                <svg width="162" height="162" viewBox="0 0 162 162" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M162 162C162 140.726 157.81 119.66 149.668 100.005C141.527 80.3505 129.594 62.4918 114.551 47.4487C99.5082 32.4056 81.6495 20.4728 61.9947 12.3315C42.34 4.19024 21.2741 -2.95614e-06 1.0963e-06 -1.0963e-06L4.57764e-05 162L162 162Z" fill="#F36D45"/></svg>
                <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_html($image['alt']);?>">
                <svg width="102" height="102" viewBox="0 0 102 102" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 3.24222e-06C1.59679e-06 13.3948 2.63831 26.6585 7.76429 39.0337C12.8903 51.4089 20.4035 62.6533 29.8751 72.1249C39.3467 81.5965 50.5911 89.1097 62.9663 94.2357C75.3415 99.3617 88.6052 102 102 102L102 -8.91712e-06L0 3.24222e-06Z" fill="#FFA88E"/></svg>

            </div><!-- .banner-block-content-image -->
        <?php }?>
    </div><!-- .banner-block-content-main -->
</div><!-- .banner-block-content -->