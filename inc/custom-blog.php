<?php

function awsm_custom_blog_post($perpage = '')
{
    if (empty($perpage)) {
        $perpage = 6;
    }
    $blog_url = get_field('blog_url', 'option');
    $response = wp_remote_get($blog_url . '/wp-json/wp/v2/posts?_embed&per_page=' . $perpage);

    if (is_wp_error($response)) {
        return false; // Bail early
    }

    $posts = json_decode(wp_remote_retrieve_body($response));
    if (empty($posts)) {
        return;
    }

    if (!empty($posts)) :
?>


        <?php foreach ($posts as $item) { ?>
            <a href="<?php echo esc_url($item->link); ?>" class="home-blog-list-item">
                <?php if (isset($item->_embedded->{'wp:featuredmedia'})) { ?>
                    <img src="<?php echo $item->_embedded->{'wp:featuredmedia'}['0']->source_url; ?>" alt="<?php echo $item->_embedded->{'wp:featuredmedia'}['0']->alt_text; ?>">
                <?php } ?>
                <h3><?php echo esc_html($item->title->rendered); ?></h3>
            </a><!-- .home-blog-list-item -->

        <?php } ?>

    <?php endif; ?>
    <?php
}


//pllay book

function playbook_blog_post($perpage = '')
{
    if (empty($perpage)) {
        $perpage = 6;
    }
    $blog_url = get_field('blog_url', 'option');
    $response = wp_remote_get($blog_url . '/wp-json/wp/v2/posts?_embed&per_page=' . $perpage);

    if (is_wp_error($response)) {
        return false; // Bail early
    }

    $posts = json_decode(wp_remote_retrieve_body($response));
    if (empty($posts)) {
        return;
    }

    if (!empty($posts)) :
        foreach ($posts as $item) {


            $author_id = get_post_field('post_author', $item->id);
            $display_name = get_the_author_meta('display_name', $author_id); ?>


            <div class="playbook-blog-item">
                <div class="playbook-blog-item-header">
                    <?php if (isset($item->_embedded->{'wp:featuredmedia'})) { ?>
                        <img src="<?php echo $item->_embedded->{'wp:featuredmedia'}['0']->source_url; ?>" alt="<?php echo $item->_embedded->{'wp:featuredmedia'}['0']->alt_text; ?>">
                    <?php } ?>
                    <div class="reading_time">
                        <?php reading_time($item->id) ?>
                    </div>
                </div>
                <div class="playbook-blog-item-content">
                    <p><?php echo  $display_name; ?></p>
                    <h3><?php echo $item->title->rendered; ?></h3>
                    <div class="read-more">
                        <a href="<?php echo esc_url($item->link); ?>">Read More</a>
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_302_1734)">
                                <path d="M4.96791 9.10745C7.25425 9.10745 9.10769 7.25401 9.10769 4.96767C9.10769 2.68133 7.25425 0.827881 4.96791 0.827881C2.68157 0.827881 0.828125 2.68133 0.828125 4.96767C0.828125 7.25401 2.68157 9.10745 4.96791 9.10745Z" stroke="#F87211" stroke-width="0.470862" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4.96777 6.6236L6.62369 4.96768L4.96777 3.31177" stroke="#F87211" stroke-width="0.470862" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.31201 4.96753H6.62384" stroke="#F87211" stroke-width="0.470862" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_302_1734">
                                    <rect width="9.93548" height="9.93548" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>

                </div>
            </div>
<?php }
    endif;
}

function playbook_blog_related_post($perpage = '')
{
    if (empty($perpage)) {
        $perpage = -1;
    }

    //http://example.com/wp-json/wp/v2/posts/?filter[category_name]=country&filter[posts_per_page]=-1
    $blog_url = get_field('blog_url', 'option');
    $response = wp_remote_get($blog_url . '/wp-json/wp/v2/posts?_embed&filter[posts_per_page]=-1');



    if (is_wp_error($response)) {
        return false; // Bail early
    }

    $posts = json_decode(wp_remote_retrieve_body($response));
    if (empty($posts)) {
        return;
    }

    if (!empty($posts)) :
        $related_posts = [];
        foreach ($posts as $item) {

            $id = $item->id;
            $title = $item->title->rendered;
            $related_posts[] = $id;
        }
    endif;
    // https://www.neoito.com/blog/wp-json/wp/v2/posts?slug=drawbacks-of-no-code-software/

    // print_r($related_posts);
} ?>
