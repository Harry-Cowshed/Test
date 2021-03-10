<?php
// Enqueue scripts and styles
function loadBootstrap() {
    // CSS
    wp_register_style('bootCSS', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootCSS');

    // JS
    wp_enqueue_script('jquery'); // should be already known
    wp_register_script('bootJS', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootJS');
}
add_action( 'wp_enqueue_scripts', 'loadBootstrap' );

// Link CSS 
function loadCss()
{
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'loadCss');

// Custom post type function
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