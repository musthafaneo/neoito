<section class="playbook-content">
    <div class="container">
        <div class="playbook-content-main">
            <div class="playbook-content-left">

                <div class="links-toc-wrap">
                    <?php if (have_rows('playbook_contents')) :
                        $i = 102;

                        while (have_rows('playbook_contents')) : the_row(); ?>
                            <?php
                            $item =   get_sub_field('item');
                            ?><div class="links-toc-item"><a href="#<?php echo $i; ?>"><?php echo $item['title']; ?></a></div><?php
                                                                                                                                $i = $i + 1;
                                                                                                                            endwhile;
                                                                                                                        endif; ?>
                </div>
            </div>
            <div class="playbook-content-right flex flex-col">
                <?php if (have_rows('playbook_contents')) :
                    $i = 102;
                    while (have_rows('playbook_contents')) : the_row();
                        $item =   get_sub_field('item');
                ?>
                        <div class="content-wrapper flex" id="<?php echo $i ?>">
                            <?php if ($item) { ?>
                                <div class="playbook-content-right-content">
                                    <div class="entry-content">
                                        <h3><?php echo $item['title']; ?></h3>

                                        <?php echo $item['content']; ?>
                                    </div>
                                </div>
                                <div class="playbook-content-right-also-read">
                                    <?php $slugs = $item['also_read'];
                                    if (!empty($slugs) && isset($slugs)) {
                                        echo '<div class="also-read">Also Read</div>';
                                        echo '<div class="blog-item-playbook">';
                                        foreach ($slugs as $slug) {
                                            $post = get_post_by_slug($slug = $slug['related_blog_slug']);
                                            if (!empty($post)) { ?>
                                                <a href="<?php echo esc_url($post[0]->link); ?>" class="playbook-blog-item">
                                                    <?php if (isset($post[0]->_embedded->{'wp:featuredmedia'})) { ?>
                                                        <img src="<?php echo $post[0]->_embedded->{'wp:featuredmedia'}['0']->source_url; ?>" alt="<?php echo $post[0]->_embedded->{'wp:featuredmedia'}['0']->alt_text; ?>">
                                                    <?php } ?>
                                                    <h3><?php echo $post[0]->title->rendered; ?></h3>
                                                </a>
                                    <?php      }
                                        }
                                        echo '</div>';
                                    } 
                                    
                                    ?>

                                </div>
                        </div>
            <?php }
                            $i = $i + 1;
                        endwhile;
                    endif; ?>
            </div>

        </div>
    </div>
</section>