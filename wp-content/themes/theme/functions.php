<?php 

function load_stylesheets(){
    wp_register_style('font',get_template_directory_uri() . '/fonts/beyond_the_mountains-webfont.css',array(),1,'all');
    wp_enqueue_style('font');

    wp_register_style('bootstrap',get_template_directory_uri() . '/plugin-frameworks/bootstrap.min.css',array(),1,'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('swiper',get_template_directory_uri() . '/plugin-frameworks/swiper.css',array(),1,'all');
    wp_enqueue_style('swiper');

    wp_register_style('ionicons',get_template_directory_uri() . '/fonts/ionicons.css',array(),1,'all');
    wp_enqueue_style('ionicons');

    wp_register_style('styles',get_template_directory_uri() . '/common/styles.css',array(),1,'all');
    wp_enqueue_style('styles');

    wp_register_style('custom',get_template_directory_uri() . '/custom.css',array(),1,'all');
    wp_enqueue_style('custom');
}
add_action('wp_enqueue_scripts','load_stylesheets');

function load_js(){

    wp_deregister_script('jquery');
    wp_register_script('jquery',get_template_directory_uri() . '/plugin-frameworks/jquery-3.2.1.min.js',array(),1,1);
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap',get_template_directory_uri() . '/plugin-frameworks/bootstrap.min.js',array(),1,1);
    wp_enqueue_script('bootstrap');

    wp_register_script('swiper',get_template_directory_uri() . '/plugin-frameworks/swiper.js',array(),1,1);
    wp_enqueue_script('swiper');

    wp_register_script('scripts',get_template_directory_uri() . '/common/scripts.js',array(),1,1);
    wp_enqueue_script('scripts');

    wp_register_script('custom',get_template_directory_uri() . '/custom.js',array(),1,1);
    wp_enqueue_script('custom');
}
add_action("wp_enqueue_scripts",'load_js');

add_theme_support('menus');
add_theme_support('post-thumbnails');

register_nav_menus(

    array(
        'top-menu'=>__('Topper Menu','theme'),
    )
    );

//Custom image sizes
add_image_size('product_image_large',700,700,false);
add_image_size('product_image_small',400,400,false);

// Register Custom Post Type 'Food Items'
function food_items_post(){
    $args = array(
        'labels' => array(
            'name' => 'Food Items',
            'singular_name' => 'Food Item',
            'edit_item' => 'Edit Food Item',
            'add_new' => 'Add New Food Item',
            'add_new_item' => 'Add New Food Item',
            'new_item' => 'New Food Item', 
            'view_item' => 'View Food Item',
            'all_items' => 'All Food Items',
            'search_items' => 'Search Food Items',
            'not_found' => 'No Food Items found',
            'not_found_in_trash' => 'No Food Items found in Trash',
            'menu_name' => 'Food Items'
        ),
        'hierarchical' => false, // Make it non-hierarchical (like posts)
        'public' => true,
        'has_archive' => true,  // Enable archive page for this post type
        'menu_icon' => 'dashicons-food', // Use a food icon for the post type
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'), // Optional, add 'editor' and 'custom-fields' for more flexibility
    );
    register_post_type('food_items', $args);
}
add_action('init', 'food_items_post');

// Register Custom Taxonomy 'Food Categories' for Food Items
function create_food_category_taxonomy() {
    register_taxonomy(
        'food_category', // Taxonomy name
        'food_items',    // Post type name (Food Items)
        array(
            'label' => 'Food Categories',
            'hierarchical' => true, // Categories have a parent-child relationship
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'food-category'), // URL slug for category
        )
    );
}
add_action('init', 'create_food_category_taxonomy');

// Register Custom Taxonomy 'Food Tags' for Food Items
function create_food_tags_taxonomy() {
    register_taxonomy(
        'food_tags', // Taxonomy name
        'food_items', // Post type name (Food Items)
        array(
            'label' => 'Food Tags',
            'hierarchical' => false, // Tags are non-hierarchical (like post tags)
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'food-tag'), // URL slug for tags
        )
    );
}
add_action('init', 'create_food_tags_taxonomy');

?>
