<?php

function load_stylesheets(){

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',array(),false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('style', get_template_directory_uri() . '/style.css',array(),false, 'all');
    wp_enqueue_style('style');

    wp_register_style('main', get_template_directory_uri() . '/main.css',array(),false, 'all');
    wp_enqueue_style('main');

}
add_action('wp_enqueue_scripts','load_stylesheets');

function include_jquery(){
    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery3.7.1.min.js','',1,true);
    add_action('wp_enqueue_scripts','jquery');
}
add_action('wp_enqueue_scripts','include_jquery');

function loadjs(){
    wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js','',1,true);
    wp_enqueue_script('customjs');
}
add_action("wp_enqueue_scripts",'loadjs');

add_theme_support('menus');

add_theme_support('post-thumbnails');

add_theme_support('widgets');

register_nav_menus(
    array(
            'top-menu' =>__('Top Menu','theme'),
            'footer-menu' => __('Footer Menu','theme'),
    )
);

add_image_size('smallest',300,300,true);
add_image_size('largest',800,800,true);

function first_post_type(){

    $args=array(
        'labels'=>array(
            'name'=>'Cars',
            'singular_name' =>'Car'
        ),

        'public'=>true,
        'has_archive'=>true,
        'menu_icon'=>'dashicons-car',
        'supports' =>array('title','editor','thumbnail'),
    );
    register_post_type('cars',$args);
}
add_action('init','first_post_type');

function locations(){

    $args=array(
        'labels'=>array(
            'name'=>'Locations',
            'singular_name' =>'Location'
        ),

        'public'=>true,
        'has_archive'=>true,
        'menu_icon'=>'dashicons-location',
        'supports' =>array('title','editor','thumbnail'),
    );
    register_post_type('locations',$args);
}
add_action('init','locations');

function team_members(){

    $args=array(
        'labels'=>array(
            'name'=>'Team Members',
            'singular_name' =>'Team_Members'
        ),

        'public'=>true,
        'has_archive'=>true,
        'menu_icon'=>'dashicons-admin-users',
        'supports' =>array('title','editor','thumbnail'),
    );
    register_post_type('team_members',$args);
}
add_action('init','team_members');

define( 'MY_PLUGIN_DIR_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

    


?>
