<?php

// Link CSS 
function loadCss()
{
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'loadCss');

// Our custom post type function
function create_posttype() {
 
    register_post_type( 'wp_ciders',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Ciders' ),
                'singular_name' => __( 'Cider' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ciders'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );