<?php
// Enqueue scripts and styles
function loadBootstrap()
{
    // CSS
    wp_register_style('bootCSS', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootCSS');

    // JS
    wp_enqueue_script('jquery'); // should be already known
    wp_register_script('bootJS', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootJS');
}
add_action('wp_enqueue_scripts', 'loadBootstrap');

// Link CSS 
function loadCss()
{
    wp_register_style('style', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'loadCss');

// Custom post function
function create_post_type()
{
    $loop = array(
        'labels' => [
            'name' => __('Ciders'),
            'singular_name' => __('Cider')
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'ciders'],
        'taxonomies' => ['Sweetness']
    );

    register_post_type('wp_ciders', $loop);
}
// Hooking up our function to theme setup
add_action('init', 'create_post_type');

// Theme options
add_theme_support('menus');

// Menus
register_nav_menus(
    [
        'main_nav' => 'Main Navigation',
    ]
);

// Create custom category
function awesome_custom_taxonomies()
{

    //add new taxonomy hierarchical
    $labels = array(
        'name' => 'Sweetness', // must be plural
        'singular_name' => 'Sweetness', // singular
        'search_items' => 'Search Sweetness',
        'all_items' => 'All Sweetness',
        'parent_item' => 'Parent Sweetness',
        'parent_item_colon' => 'Parent Sweetness:',
        'edit_item' => 'Edit Sweetness',
        'update_item' => 'Update Sweetness',
        'add_new_item' => 'Add New Sweetness',
        'new_item_name' => 'New Sweetness Name',
        'menu_name' => 'Sweetness'
    );

    $args = [
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'Sweetness']
    ];

    register_taxonomy('Sweetness', ['wp_ciders'], $args);


    // Custom tags
    register_taxonomy('tags', ['wp_ciders'], [
        'label' => 'tags',
        'rewrite' => ['slug' => 'tag'],
        'hierarchical' => false,
        'show_admin_column' => true,
    ]);
}
add_action('init', 'awesome_custom_taxonomies'); // hook 