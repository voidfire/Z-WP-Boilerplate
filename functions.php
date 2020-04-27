<?php

function z_wp_theme_support() {
    // Adds dynamic title tags support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'z_wp_theme_support');

function z_wp_menus() {
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', 'z_wp_menus');

function z_wp_register_styles() {

    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style('z-wp-style', get_template_directory_uri() . "/style.css", array('z-wp-bootstrap'), $version, 'all');
    
    wp_enqueue_style('z-wp-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');

    wp_enqueue_style('z-wp-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

}

add_action( 'wp_enqueue_scripts', 'z_wp_register_styles');

function z_wp_register_scripts() {

    wp_enqueue_script('z-wp-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
        
    wp_enqueue_script('z-wp-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
        
    wp_enqueue_script('z-wp-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
        
    wp_enqueue_script('z-wp-main', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);
        
}

add_action( 'wp_enqueue_scripts', 'z_wp_register_scripts');

function z_wp_widget_areas(){

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Sidebar area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );

}

add_action('widgets_init', 'z_wp_widget_areas');
?>