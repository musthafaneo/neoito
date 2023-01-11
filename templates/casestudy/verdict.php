<?php if($the_callenge = get_field('verdict')){?>
    <section class="cs-verdict">
            <div class="container">
                <div class="cs-verdict-main">
                    <p><?php the_field('verdict');?></p>
                    <a href="<?php echo get_permalink(22);?>" class="button button-black"><?php esc_html_e( 'Let’s Talk', 'neoito' );?></a>
                </div><!-- .cs-s-content-main -->       
            </div><!-- .container -->
    </section>
<?php }?>
