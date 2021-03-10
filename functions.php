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
    $loop = array(
        'labels' => [
            'name' => __( 'Ciders' ),
            'singular_name' => __( 'Cider' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'ciders'],
    );

    register_post_type( 'wp_ciders', $loop  );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );