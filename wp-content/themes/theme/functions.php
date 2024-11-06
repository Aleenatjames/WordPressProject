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

function create_bestseller_post_type() {
    $labels = array(
        'name' => 'Best Sellers',
        'singular_name' => 'Best Seller',
        'menu_name' => 'Best Sellers',
        'name_admin_bar' => 'Best Seller',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Best Seller',
        'new_item' => 'New Best Seller',
        'edit_item' => 'Edit Best Seller',
        'view_item' => 'View Best Seller',
        'all_items' => 'All Best Sellers',
        'search_items' => 'Search Best Sellers',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'bestseller'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('bestseller', $args);
}
add_action('init', 'create_bestseller_post_type');

add_theme_support('menus');

register_nav_menus(

    array(
        'top-menu'=>__('Topper Menu','theme'),
    )
    );
?>
