<?php
/*
* Register Theme Settings Page.
*/
function neoito_acf_options_page() {
	// Check function exists.
    if( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}

    // register options page.
    $option_page = acf_add_options_page(array(
        'page_title'      => __( 'Theme Settings', 'neoito' ),
        'menu_title'      => __( 'Theme Settings', 'neoito'),
        'menu_slug'       => 'theme-settings',
        'capability'      => 'manage_options',
		'redirect'        => false,
		'updated_message' => __( 'Theme Options Updated', 'neoito' ),
    ));
}
add_action( 'acf/init', 'neoito_acf_options_page' );


/**
 * Print the meta data after checking it's existence (ACF)
 *
 * @param  String $metakey  Post meta key
 * @param  Sting  $template  Template
 * @return String           Meta value in template
 */
function printmeta( $metakey, $template, $return = false, $post_id = null ) {
	if ( ! $post_id ) {
		global $post;
		$post_id = $post->ID;
	}

	if ( get_field( $metakey, $post_id ) ) {
		$value = get_field( $metakey, $post_id );
		if ( $return ) {
			return sprintf( $template, $value );
		} else {
			echo sprintf( $template, $value );
		}
	}
}

function printimage( $metakey, $size = 'thumbnail', $return = false, $post_id = null ) {
	if ( ! $post_id ) {
		global $post;
		$post_id = $post->ID;
	}

	if ( get_field( $metakey, $post_id ) ) {
		$image   = get_field( $metakey, $post_id );
		$imgesrc = sprintf( '<img src="%s" alt="%s">', $image['sizes'][ $size ], $image['title'] );
		if ( $return ) {
			return $imgesrc;
		} else {
			echo $imgesrc;
		}
	}
}

/**
 * Test Printing
 */
function tp( $data ) {
	echo '<pre>';
	print_r( $data );
	echo '</pre>';
}
/**
 * Test Printing
 */
function dp( $data ) {
	echo '<pre>';
	print_r( $data );
	echo '</pre>';
	exit;
}

/*
 * Custom Mime Types for uploads.
 */
function neoito_custom_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	if ( isset( $mimes['exe'] ) ) {
		unset( $mimes['exe'] );
	}
	return $mimes;
}
add_filter( 'upload_mimes', 'neoito_custom_mime_types' );


/**
 * Customize the form HTML content.
 *
 * @param string $form_string The form markup.
 * @return string
 */
function neoito_gform_get_form_filter( $form_string ) {
	$form_string = str_replace( array( " type='text/javascript'", "This iframe contains the logic required to handle Ajax powered Gravity Forms." ), "", $form_string );
	return $form_string;
}
add_filter( 'gform_get_form_filter', 'neoito_gform_get_form_filter' );


/**
 * Get svg sprite icon
 *
 * @param string $id SVG HTML ID
 * @param string $width SVG icon width
 * @param string $height SVG icon height
 * @param string $before before wraping element
 * @param string $after after wraping element
 * @return string
 */
function get_svg_icon( $id, $width, $height, $before = '', $after = '' ) {
	$icon = '';
	if ( $id ) {
		$icon = $before . '<svg width="' . $width . '" height="' . $height . '" viewBox="0 0 ' . $width . ' ' . $height . '" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"><use xlink:href="#' . $id . '"></use></svg>' . $after;
	}
	return $icon;
}


function get_inline_svg_form_url($url) {
	$svg_file = file_get_contents($url);

	$find_string   = '<svg';
	$position = strpos($svg_file, $find_string);
	$svg_file_new = '<span class="wp-svg-img">'.substr($svg_file, $position).'</span>';

	return $svg_file_new;
}

function the_get_inline_svg_form_url($url) {

	 $svg_file_new = get_inline_svg_form_url($url);

	 echo $svg_file_new;

}

function get_image_svg($meta = array(), $alt = '', $class = '') {
	if($meta){
		$img = '';
		if($alt){
			$alt_text = $alt;
		}else{
			$alt_text = $meta['title'];
		}
		if($class){
			$class = ' class="'.$class.'"';
		}
		if( $meta['mime_type'] == 'image/svg+xml'){
			$img = get_inline_svg_form_url($meta['url']);
		}else{
			$img = '<img'.$class.' src="'.$meta['url'].'" alt="'.$alt_text.'" width="'.$meta['width'].'" height="'.$meta['height'].'">';
		}
	}
	return $img;
}

function the_get_image_svg($meta = array(), $alt = '', $class = '') {
	echo get_image_svg($meta, $alt, $class);
}
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {
		
		// vars
		$icon = get_field('icon', $item);
		
		
		// append icon
		if( $icon ) {
			
			$item->title .= '<span><img src="'.esc_url($icon['url']).'" alt="Icon"></span>';
			
		}
		
	}
	
	
	// return
	return $items;
	
}

/**
 * Create HTML list of nav menu items.
 * Replacement for the native Walker, using the description.
 *
 * @see    https://wordpress.stackexchange.com/q/14037/
 * @author fuxia
 */
class Description_Walker extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array|object $args    Additional strings. Actually always an 
    * instance of stdClass. But this is WordPress.
     * @return void
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {

        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' '
        ,   apply_filters(
                'nav_menu_css_class'
            ,   array_filter( $classes ), $item
            )
        );

        ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";

        $attributes  = '';

        ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        // insert description for top level elements only
        // you may change this
		$description = get_field('content', $item);
        if($description){
			$description = '<div class="cs-nav-desc">'.$description.'<a href="'.get_permalink(11).'" class="button">Learn More About <span>Services</span></a></div>';
		}

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output =
		$args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
             . $description
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
        ,   $item_output
        ,   $item
        ,   $depth
        ,   $args
        );
    }
}

//estimated reading time
function reading_time($id) {
	$content = get_post_field( 'post_content', $id );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);

	if ($readingtime == 1) {
	$timer = " min read";
	} else {
	$timer = " min read";
	}
	$totalreadingtime = $readingtime . $timer;

	echo $totalreadingtime;
}

function reading_time_by_content($content) {
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);

	if ($readingtime == 1) {
	$timer = " min read";
	} else {
	$timer = " min read";
	}
	$totalreadingtime = $readingtime . $timer;

	echo $totalreadingtime;
}


function awsm_remove_slug( $post_link, $post, $leavename ) {

    if ( 'service' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'awsm_remove_slug', 10, 3 );


function awsm_parse_request( $query ) {

    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'service', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'awsm_parse_request' );
add_action('init','neoit_trackers');

function neoit_trackers(){
	if(!isset($_COOKIE['neoitfsl'])){
		global $wp;
		$_COOKIE['neoitfsl'] = home_url( $wp->request );
	}
}
function neoit_get_trackers(){
	
	$field_value['referrer']		=wp_get_original_referer();
	
	if(isset($_COOKIE['neoitfsl'])){
		$field_value['first_landed']	=	$_COOKIE['neoitfsl'];
	}else{
		global $wp;
		$field_value['first_landed']	=	home_url( $wp->request );
	}

	return $field_value;
}
add_filter( 'gform_pre_render', 'neoito_add_form_fields' );
add_filter( 'gform_pre_validation', 'neoito_add_form_fields' );
add_filter( 'gform_pre_submission_filter', 'neoito_add_form_fields' );
add_filter( 'gform_admin_pre_render', 'neoito_add_form_fields' );

function neoito_add_form_fields( $form ){
	$tracker = neoit_get_trackers();
	$props = array( 
		'id' => 1000,
		'label' => 'Ip Address',
		'type' => 'hidden',
		'defaultValue'=>'{ip}',
	);
	$fields[] = GF_Fields::create( $props );
	$props = array( 
		'id' => 1001,
		'label' => 'GA tracking ID',
		'type' => 'hidden',
		'defaultValue'=>'',
	);
	$fields[] = GF_Fields::create( $props );
	$props = array( 
		'id' => 1002,
		'label' => 'From Page',
		'type' => 'hidden',
		'defaultValue' => '{embed_url}',
	);
	$fields[] = GF_Fields::create( $props );
	$props = array( 
		'id' => 1003,
		'label' => 'First Landed Page',
		'type' => 'hidden',
		'defaultValue' => $tracker['first_landed'],
	);
	$fields[] = GF_Fields::create( $props );
	
	$props = array( 
		'id' => 1004,
		'label' => 'Referral url',
		'type' => 'hidden',
		//'defaultValue' => $tracker['referrer'],
	);
	$fields[] = GF_Fields::create( $props );
	foreach($fields as $field){
		array_push( $form['fields'], $field );
	}
	return $form;
}

//start
function get_post_by_slug($slug = '')
{

    if (empty($slug)) {
        return false;
    }

    $blog_url = get_field('blog_url', 'option');
    $response = wp_remote_get($blog_url . '/wp-json/wp/v2/posts?_embed&slug='.$slug.'/');

    if (is_wp_error($response)) {
        return false; // Bail early
    }

    $post = json_decode(wp_remote_retrieve_body($response));
    if (empty($post)) {
        return;
    }

    if (!empty($post)) :
        return $post;
    endif;
}

//Strict Match Guessing -> URL

add_filter( 'strict_redirect_guess_404_permalink', 'strict_redirect_guessing');

function strict_redirect_guessing() {
  return true;
}

//remove jQuery Migrate 
function dequeue_jquery_migrate( $scripts ) {
    if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff(
            $scripts->registered['jquery']->deps,
            [ 'jquery-migrate' ]
        );
    }
}
add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );
