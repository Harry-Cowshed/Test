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
    wp_register_style('style', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
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

// Theme options
add_theme_support('menus');

// Menus
register_nav_menus(
    [
        'main_nav' => 'Main Navigation',
    ]
);

// Create custom category
function awesome_custom_taxonomies() {
	
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Types', // must be plural
		'singular_name' => 'Type', // singular
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Types'
	);
	
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'type' )
	);
	
	register_taxonomy('type', array('wp_ciders'), $args);
	
}
add_action( 'init' , 'awesome_custom_taxonomies' );