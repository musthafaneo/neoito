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
$id = 'table-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'table-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$image = get_field('image');
$title = get_field('title');
$description = get_field('description');
if(!empty($style)){
    $className .= ' '.$style;
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    
        <div class="table-block-head">
            <?php if($title){?>
                <h2 data-aos="cs-text" class="section-main-title"><?php echo $title;?></h2>
            <?php }?>
            <?php if($description){?>
                <p data-aos="fade-up" data-aos-delay="300"><?php echo $description;?></p>
            <?php }?>
        </div><!-- .table-block-head -->
        <div class="tb-table" data-aos="fade-up">
            <div class="tb-table-in">
                <table>
                    <thead>
                        <tr>
                            <td>
                                <h3>Engagement models</h3>
                            </td>
                            <td>
                                <h3>Dedicated team</h3>
                            </td>
                            <td>
                                <h3>time & material</h3>
                            </td>
                            <td>
                                <h3>fixed-price</h3>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Size of project</td>
                            <td>Large</td>
                            <td>Medium to large</td>
                            <td>Small</td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>Long</td>
                            <td>Average to long</td>
                            <td>Short and average</td>
                        </tr>
                        <tr>
                            <td>Client’s control</td>
                            <td>High</td>
                            <td>Medium</td>
                            <td>Low</td>
                        </tr>
                        <tr>
                            <td>Budget</td>
                            <td>Highly flexible</td>
                            <td>Moderately flexible</td>
                            <td>Fixed</td>
                        </tr>
                        <tr>
                            <td>Change Requests</td>
                            <td>Possible during project implementation</td>
                            <td>Possible during project implementation</td>
                            <td>Possible after project completion</td>
                        </tr>
                        <tr>
                            <td>Time-frames</td>
                            <td>Estimated</td>
                            <td>Incremental</td>
                            <td>Predefined</td>
                        </tr>
                        <tr>
                            <td>Team scalability</td>
                            <td>Moderate</td>
                            <td>High</td>
                            <td>Low</td>
                        </tr>
                        <tr>
                            <td>Dedicated Resources</td>
                            <td>Retained month on month</td>
                            <td>Released after scope of work</td>
                            <td>Assigned</td>
                        </tr>
                        <tr>
                            <td>Requirements</td>
                            <td>Evolving</td>
                            <td>Evolving</td>
                            <td>Defined</td>
                        </tr>                
                    </tbody>
                </table>
            </div><!-- .tb-table-in -->
        </div><!-- .tb-table -->
    <svg display="none" class="hidden">
        <defs>
            <g id="img-tb-g-check">
                <circle xmlns="http://www.w3.org/2000/svg" cx="12" cy="12" r="12" fill="#12AB26"/><g xmlns="http://www.w3.org/2000/svg" clip-path="url(#clip0_218_5027)"><path fill="white" d="M8.98569 13.1235C9.76677 13.9045 11.0332 13.9045 11.8142 13.1234L17.188 7.749C17.5004 7.43657 18.0069 7.43647 18.3194 7.74876C18.6321 8.06121 18.6321 8.56798 18.3196 8.88054L11.8142 15.3859C11.0331 16.167 9.76681 16.167 8.98576 15.3859L5.87438 12.2746C5.562 11.9622 5.562 11.4557 5.87438 11.1434C6.18675 10.831 6.6932 10.831 7.00558 11.1434L8.98569 13.1235Z"/></g><defs xmlns="http://www.w3.org/2000/svg"><clipPath id="clip0_218_5027"><path fill="white" d="M0 0H19.2V19.2H0z" transform="translate(2.4 2.4)"/></clipPath></defs>
            </g>
            <g id="img-tb-g-excl">
                <path xmlns="http://www.w3.org/2000/svg" fill="#7DD7A5" d="M12 0.300049C5.3802 0.300049 0 5.68025 0 12.3C0 18.9198 5.3802 24.3 12 24.3C18.6198 24.3 24 18.9198 24 12.3C24 5.68025 18.6198 0.300049 12 0.300049ZM12 19.5904C11.0402 19.5904 10.2504 18.8005 10.2504 17.8407C10.2504 16.8704 11.0402 16.0911 12 16.0911C12.9598 16.0911 13.7496 16.8716 13.7496 17.8407C13.7496 18.8005 12.9598 19.5904 12 19.5904ZM13.4203 13.2705C13.3606 14.01 12.7395 14.5901 12 14.5901C11.2605 14.5901 10.6394 14.01 10.5797 13.2705L10.0102 6.06005C9.93985 5.23037 10.5996 4.52021 11.4305 4.52021H12.5707C13.4004 4.52021 14.0602 5.23037 13.991 6.06005L13.4203 13.2705Z"/>
            </g>
            <g id="img-tb-g-cross">
                <circle xmlns="http://www.w3.org/2000/svg" cx="12" cy="12" r="12" fill="#E53935"/><g xmlns="http://www.w3.org/2000/svg" clip-path="url(#clip0_218_5077)"><path fill="white" d="M11.2929 10.1618C11.6834 10.5524 12.3166 10.5524 12.7071 10.1618L15.3944 7.47454C15.7067 7.16216 16.2132 7.16216 16.5256 7.47454C16.8379 7.78691 16.8379 8.29336 16.5256 8.60574L13.8383 11.293C13.4478 11.6836 13.4478 12.3167 13.8383 12.7072L16.5256 15.3945C16.8379 15.7069 16.8379 16.2134 16.5256 16.5257C16.2132 16.8381 15.7067 16.8381 15.3944 16.5257L12.7071 13.8384C12.3166 13.4479 11.6834 13.4479 11.2929 13.8384L8.60557 16.5257C8.2932 16.8381 7.78674 16.8381 7.47437 16.5257C7.162 16.2134 7.162 15.7069 7.47437 15.3945L10.1617 12.7072C10.5522 12.3167 10.5522 11.6836 10.1617 11.293L7.47437 8.60574C7.162 8.29336 7.162 7.78691 7.47437 7.47454C7.78674 7.16216 8.2932 7.16216 8.60557 7.47454L11.2929 10.1618Z"/></g><defs xmlns="http://www.w3.org/2000/svg"><clipPath id="clip0_218_5077"><path fill="white" d="M0 0H19.2V19.2H0z" transform="translate(2.4 2.4)"/></clipPath></defs>
            </g>
        </defs>
    </svg>
</div>
