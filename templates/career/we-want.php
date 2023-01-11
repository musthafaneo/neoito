<?php 
    $ww_title = get_field('ww_title');
    $ww_description = get_field('ww_description');
    if($ww_title || $ww_description):
?>
    <section class="career-ww" data-aos="fade-up">
        <svg width="1439" height="478" viewBox="0 0 1439 478" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="none" class="lgd:hidden"><path xmlns="http://www.w3.org/2000/svg" fill="#E7F1F7" d="M-2 0H1439V367.527C1439 430.374 1386.44 480.447 1323.66 477.397L102.663 418.084C44.0553 415.237 -2 366.89 -2 308.214V0Z"/></svg>
        <div class="container">
            <div class="career-ww-main" data-aos="fade-up">
                <?php 
                    printmeta('ww_title', '<h2 class="section-main-title">%s</h2>');
                    printmeta('ww_description', '<p>%s</p>');
                ?>
            </div><!-- .career-ww-main -->
        </div><!-- .container -->
    </section>
<?php endif;?>