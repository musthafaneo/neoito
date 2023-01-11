<?php
    $image = get_field('image');
    $sub_title = get_field('sub_title');
    $title = get_field('title');
    $description = get_field('description');
    $style = get_field('banner_style');
    $content = get_field('content');
?>
<div class="banner-block-main">
    <div class="banner-block-content">
        <?php if($sub_title){?>
            <h2><?php echo $sub_title;?></h2>
        <?php }?>
        <?php if($title){?>
            <h1 class="banner-title">
                <?php echo $title;?>
                <?php if($style == 'style-2' || $style == 'style-3'){?>
                 <span class="b-path-anim hidden lg:inline-block">
                    <svg class="path-anim" width="35" height="106" viewBox="0 0 35 106" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"><path xmlns="http://www.w3.org/2000/svg" fill="#887C79" fill-rule="evenodd" d="M11.701 99.2749C11.6796 98.8774 11.6597 98.5015 11.642 98.1685C11.6046 97.466 11.5774 96.9544 11.5684 96.8343C10.9825 89.0144 9.38249 81.7191 6.80829 74.4426C6.59999 73.8517 6.01579 73.5691 5.50653 73.8108C4.99728 74.0525 4.75377 74.7303 4.96207 75.3212C7.46026 82.3764 9.01364 89.451 9.58121 97.0365C9.59022 97.1561 9.61737 97.6619 9.65479 98.3592C9.75578 100.241 9.93158 103.516 10.0278 104.358C10.0799 104.831 10.2362 105.08 10.2779 105.134C10.4896 105.434 10.7339 105.527 10.9327 105.555C11.1575 105.585 11.5388 105.529 11.9189 105.158C12.2126 104.87 12.6443 104.225 12.9222 103.81C13.0193 103.665 13.0977 103.548 13.1447 103.484C13.9206 102.436 14.6998 101.333 15.4925 100.21C17.5102 97.351 19.6159 94.3677 21.9805 91.8729C25.1212 88.5588 28.7231 86.1036 33.2429 86.1464C33.7931 86.1522 34.2433 85.636 34.2483 84.9976C34.2533 84.3591 33.8085 83.8366 33.2582 83.8309C28.205 83.7842 24.1491 86.4561 20.6391 90.1593C18.3151 92.6119 16.2329 95.5216 14.2421 98.3349C26.7915 64.8385 27.6502 26.0226 2.00929 0.56065C1.59257 0.145142 0.963413 0.202449 0.603972 0.688446C0.245874 1.17197 0.295296 1.90193 0.714143 2.319C26.1203 27.5486 24.5712 66.2849 11.701 99.2749Z" clip-rule="evenodd"/></svg>
                </span>  
                <?php }?> 
            </h1>
        <?php }?>
        <div class="banner-block-content-in">
            <?php if($description){?>
                <p><?php echo $description;?></p>
            <?php }?>
            <span class="block lgd:text-center"><a href="<?php echo get_permalink(22);?>" class="button"><?php esc_html_e( 'Talk to our experts', 'neoito' );?></a></span>
        </div><!-- .banner-block-content-in -->
        <?php if($content){?>
            <div class="banner-block-content-ex">
                <?php the_field('content');?>
            </div><!-- .banner-block-content-ex -->
        <?php }?>
    </div><!-- .banner-block-content -->     
    <?php if($image){?>
        <div class="banner-block-image" >
            <?php if($style == 'style-4'){echo '<svg width="141" height="141" viewBox="0 0 141 141" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M141 141C141 122.484 137.353 104.149 130.267 87.0416C123.181 69.9347 112.795 54.391 99.702 41.2979C86.609 28.2049 71.0653 17.8189 53.9584 10.733C36.8515 3.64707 18.5164 -4.55093e-06 2.93218e-06 -2.93218e-06L4.57764e-05 141L141 141Z" fill="#66D4D8"/></svg>';}?>
            <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_html($image['alt']);?>">
             <?php if($style == 'style-4'){echo '<svg width="78" height="78" viewBox="0 0 78 78" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 2.47935e-06C1.22107e-06 10.2431 2.01753 20.3859 5.9374 29.8493C9.85727 39.3127 15.6027 47.9114 22.8457 55.1543C30.0886 62.3973 38.6873 68.1427 48.1507 72.0626C57.6141 75.9825 67.7569 78 78 78L78 -6.81897e-06L0 2.47935e-06Z" fill="#92D0D2"/></svg>';}?>
        </div><!-- .banner-block-content-image -->
    <?php }?>
    
</div><!-- .banner-block-main -->