<?php

/**
 * Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'casestudy-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'casestudy-block';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$text             = get_field('title') ?: 'Your title here...';
$content = get_field('content') ?: 'Your contents here...';
$slugs = get_field('related_posts') ?: 'Your related posts slug here...';


?>
<div class="playbook-content-right-content">
    <h2><?php echo $text; ?></h2>
    <div class="entry-content">
        <?php echo $content ?>
    </div>
</div>
<div class="playbook-content-right-also-read">
    <?php
    foreach ($slugs as $slug) {
        $post = get_post_by_slug($slug = $slug['related_blog_slug']);
        if (!empty($post)) {
    ?>
            <div class="playbook-blog-item">
                <div class="playbook-blog-item-header">
                    <?php if (isset($post[0]->_embedded->{'wp:featuredmedia'})) { ?>
                        <img src="<?php echo $post[0]->_embedded->{'wp:featuredmedia'}['0']->source_url; ?>" alt="<?php echo $post[0]->_embedded->{'wp:featuredmedia'}['0']->alt_text; ?>">
                    <?php } ?>
                    <div class="reading_time">
                        <?php
                        if (isset($post[0]->content->rendered)) {
                            reading_time_by_content($post[0]->content->rendered);
                        }
                        ?>
                    </div>
                </div>
                <div class="playbook-blog-item-content">

                    <div class="author"><?php echo $post[0]->{'_embedded'}->author[0]->name; ?></div>
                    <h3><?php echo $post[0]->title->rendered; ?></h3>

                    <div class="read-more">
                        <a href="<?php echo esc_url($post[0]->link); ?>">Read More</a>
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
    <?php
        }
    }
    ?>
</div>