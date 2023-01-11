<?php
add_action('acf/init', 'sbc_acf_init_block_types');
function sbc_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {


        acf_register_block_type(array(
            'name'              => 'banner',
            'title'             => __('Banner'),
            'description'       => __('A custom banner block.'),
            'render_template'   => 'templates/blocks/banner.php',
            'category'          => 'content',
            'icon'              => 'button',
            'keywords'          => array( 'banner', 'page_banner' ),
            'enqueue_style' 	=> get_template_directory_uri() . '/assets/css/blocks/banner.css',
            
        ));    
        acf_register_block_type(array(
            'name'              => 'what-content-block',
            'title'             => __('What content block'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/what.php',
            'category'          => 'content',
            'icon'              => 'grid-view',
            'keywords'          => array( 'what', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/what.css',
            
        ));    
        acf_register_block_type(array(
            'name'              => 'ill-content-block',
            'title'             => __('Illustration content block'),
            'description'       => __('A custom Illustration content block.'),
            'render_template'   => 'templates/blocks/illustration.php',
            'category'          => 'content',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'illustration', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/illustration.css',
            
        ));       
        acf_register_block_type(array(
            'name'              => 'offer-table',
            'title'             => __('What you get table'),
            'description'       => __('A custom table content block.'),
            'render_template'   => 'templates/blocks/table.php',
            'category'          => 'content',
            'icon'              => 'editor-table',
            'keywords'          => array( 'table', 'what you get' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/table.css',
            
        )); 
        acf_register_block_type(array(
            'name'              => 'verticals',
            'title'             => __('Industry verticals'),
            'description'       => __('A custom verticals block.'),
            'render_template'   => 'templates/blocks/verticals.php',
            'category'          => 'content',
            'icon'              => 'editor-table',
            'keywords'          => array( 'industry vertical', 'vertical' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/verticals.css',
            
        ));          
        acf_register_block_type(array(
            'name'              => 'content_block',
            'title'             => __('Content Block'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/content.php',
            'category'          => 'content',
            'icon'              => 'editor-paste-text',
            'keywords'          => array( 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/content.css',
            
        ));        
        acf_register_block_type(array(
            'name'              => 'process',
            'title'             => __('Process Block'),
            'description'       => __('A custom process block.'),
            'render_template'   => 'templates/blocks/process.php',
            'category'          => 'content',
            'icon'              => 'editor-ol',
            'keywords'          => array( 'process' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/process.css',
            
        )); 
        acf_register_block_type(array(
            'name'              => 'web_dev_team',
            'title'             => __('Meet Web Dev team'),
            'description'       => __('A custom block.'),
            'render_template'   => 'templates/blocks/web-dev.php',
            'category'          => 'content',
            'icon'              => 'editor-ol',
            'keywords'          => array( 'web dev team' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/web-dev.css',
            
        ));     
        acf_register_block_type(array(
            'name'              => 'casestudy',
            'title'             => __('Casestudy Block'),
            'description'       => __('A custom block.'),
            'render_template'   => 'templates/blocks/casestudy.php',
            'category'          => 'content',
            'icon'              => 'media-text',
            'keywords'          => array( 'casestudy' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/casestudy.css',
            
        ));
        acf_register_block_type(array(
            'name'              => 'blog',
            'title'             => __('Blog Block'),
            'description'       => __('A custom block.'),
            'render_template'   => 'templates/blocks/blog.php',
            'category'          => 'content',
            'icon'              => 'media-text',
            'keywords'          => array( 'blog' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/blog.css',
            
        ));
        acf_register_block_type(array(
            'name'              => 'hire_experts',
            'title'             => __('Hire Experts'),
            'description'       => __('A custom block.'),
            'render_template'   => 'templates/blocks/hire.php',
            'category'          => 'content',
            'icon'              => 'admin-users',
            'keywords'          => array( 'hire experts' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/hire.css',
            
        ));
        acf_register_block_type(array(
            'name'              => 'faq',
            'title'             => __('FAQ'),
            'description'       => __('A custom FAQ block.'),
            'render_template'   => 'templates/blocks/faq.php',
            'category'          => 'content',
            'icon'              => 'editor-help',
            'keywords'          => array( 'faq' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/faq.css',
            
        ));
        acf_register_block_type(array(
            'name'              => 'other_services',
            'title'             => __('Other Services'),
            'description'       => __('A custom  block.'),
            'render_template'   => 'templates/blocks/service.php',
            'category'          => 'content',
            'icon'              => 'album',
            'keywords'          => array( 'other services', 'services' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/service.css',
            
        ));
        acf_register_block_type(array(
            'name'              => 'services_card',
            'title'             => __('Services card'),
            'description'       => __('A custom Services block.'),
            'render_template'   => 'templates/blocks/service-card.php',
            'category'          => 'content',
            'icon'              => 'album',
            'keywords'          => array( 'services', 'service card' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/service-card.css',
            
        ));
        acf_register_block_type(array(
            'name'              => 'four_grid_card',
            'title'             => __('Four grid card'),
            'description'       => __('A custom block.'),
            'render_template'   => 'templates/blocks/f-card.php',
            'category'          => 'content',
            'icon'              => 'grid-view',
            'keywords'          => array( 'four card', '4 card' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/f-card.css',
            
        ));
        acf_register_block_type(array(
            'name'              => 'why-neoito-block',
            'title'             => __('Why neoito block'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/why.php',
            'category'          => 'content',
            'icon'              => 'sos',
            'keywords'          => array( 'Why neoito', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/why.css',
            
        ));    
        acf_register_block_type(array(
            'name'              => 'why-angular-block',
            'title'             => __('Why angular block'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/why-a.php',
            'category'          => 'content',
            'icon'              => 'sos',
            'keywords'          => array( 'Why angular', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/why-a.css',
            
        ));  
        acf_register_block_type(array(
            'name'              => 'why-node-block',
            'title'             => __('Why node block'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/why-node.php',
            'category'          => 'content',
            'icon'              => 'sos',
            'keywords'          => array( 'Why node', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/why-node.css',
            
        ));   
        acf_register_block_type(array(
            'name'              => 'stats',
            'title'             => __('Stats'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/stats.php',
            'category'          => 'content',
            'icon'              => 'chart-bar',
            'keywords'          => array( 'stats', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/stats.css',
            
        ));   
        acf_register_block_type(array(
            'name'              => 'gloal-leaders',
            'title'             => __('Global leaders'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/global-leaders.php',
            'category'          => 'content',
            'icon'              => 'sos',
            'keywords'          => array( 'Global leaders', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/global-leaders.css',
            
        ));  
        acf_register_block_type(array(
            'name'              => 'scroll-block',
            'title'             => __('Scroll content blocks'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/scroll-content.php',
            'category'          => 'content',
            'icon'              => 'editor-justify',
            'keywords'          => array( 'scroll content', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/scroll-content.css',
            
        ));  
        acf_register_block_type(array(
            'name'              => 'tech-stack',
            'title'             => __('Tech stack'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/tech-stack.php',
            'category'          => 'content',
            'icon'              => 'editor-justify',
            'keywords'          => array( 'tech stack', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/tech-stack.css',
            
        ));  

        acf_register_block_type(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/testi.php',
            'category'          => 'content',
            'icon'              => 'editor-justify',
            'keywords'          => array( 'testimonial', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/testi.css',
            
        ));    
        acf_register_block_type(array(
            'name'              => 'text_image',
            'title'             => __('2 col content & image'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/2-col-ci.php',
            'category'          => 'content',
            'icon'              => 'editor-justify',
            'keywords'          => array( '2 col content image', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/2-col-ci.css',
            
        ));   
        acf_register_block_type(array(
            'name'              => 'four_col_grid',
            'title'             => __('4 col grid'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/4-col-gd.php',
            'category'          => 'content',
            'icon'              => 'editor-justify',
            'keywords'          => array( '4 col grid', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/4-col-gd.css',
            
        ));     
        acf_register_block_type(array(
            'name'              => 'expertise',
            'title'             => __('Expertise'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/expertise.php',
            'category'          => 'content',
            'icon'              => 'editor-justify',
            'keywords'          => array( 'expertise', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/expertise.css',
            
        ));      
        acf_register_block_type(array(
            'name'              => 'cta_width_cards',
            'title'             => __('CTA with cards'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/cta-card.php',
            'category'          => 'content',
            'icon'              => 'editor-justify',
            'keywords'          => array( 'cta card', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/cta-card.css',
            
        ));   
        acf_register_block_type(array(
            'name'              => 'cta',
            'title'             => __('CTA'),
            'description'       => __('A custom content block.'),
            'render_template'   => 'templates/blocks/cta.php',
            'category'          => 'content',
            'icon'              => 'editor-justify',
            'keywords'          => array( 'cta', 'content' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/cta.css',
            
        ));      

        // acf_register_block_type(array(
        //     'name'              => 'Playbook Content',
        //     'title'             => __('Playbook Content'),
        //     'description'       => __('A custom block to add contents to playbook page'),
        //     'render_template'   => 'templates/blocks/playbook/playbook-content.php',
        //     'category'          => 'content',
        //     'icon'              => 'editor-justify',
        //     'keywords'          => array( 'playbook', 'content' ),
        //     'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/cta.css',
            
        // ));  
    }
}

function editor_styles_enqueue_gutenberg() {
 	// Make sure you link this to your actual file.
	wp_register_style( 'sbc-editor-styles', get_stylesheet_directory_uri() . '/css/admin-style.css' );
	wp_enqueue_style( 'sbc-editor-styles' );
	
}
add_action( 'enqueue_block_editor_assets', 'editor_styles_enqueue_gutenberg' );
