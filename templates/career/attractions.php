<?php if ( have_rows( 'attractions' ) ) : ?>
    <section class="career-attractions">
        <div class="container">
            <div class="career-attractions-items">
                <?php while ( have_rows( 'attractions' ) ) : the_row(); ?>
                    <div class="career-attractions-item">
                        <div class="career-attractions-item-in" data-aos="fade-up">
                            <?php if($icon = get_sub_field('icon')){
                                echo '<span><img src="'.esc_url($icon['url']).'"  alt="Icon"></span>';
                            }?>
                            <h3><?php the_sub_field('title');?></h3>
                            <p><?php the_sub_field('description');?></p>
                        </div><!-- .career-attractions-item-in -->
                    </div><!-- .career-attractions-item -->
                <?php endwhile;?>
            </div><!-- .career-attractions-items -->
        </div><!-- .container -->
    </section>
<?php endif;?>