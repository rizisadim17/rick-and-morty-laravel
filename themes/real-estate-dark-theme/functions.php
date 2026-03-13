<?php
/**
 * Real Estate Dark Theme Functions
 */

// Theme Setup
function real_estate_dark_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo');
    add_theme_support('responsive-embeds');
    
    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'real-estate-dark'),
        'footer' => __('Footer Menu', 'real-estate-dark'),
    ));
    
    // Image Sizes
    add_image_size('property-thumbnail', 400, 300, true);
    add_image_size('property-large', 1200, 600, true);
    add_image_size('hero-image', 1920, 800, true);
}
add_action('after_setup_theme', 'real_estate_dark_setup');

// Enqueue Scripts and Styles
function real_estate_dark_scripts() {
    // Main stylesheet
    wp_enqueue_style('real-estate-dark-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.1');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap', array(), null);
    
    // Font Awesome for icons
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Main JavaScript
    wp_enqueue_script('real-estate-dark-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);

    // Urbanist Google Font
    wp_enqueue_style(
        'urbanist-google-font',
        'https://fonts.googleapis.com/css2?family=Urbanist:wght@100;200;300;400;500;600;700;800&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'real_estate_dark_scripts');

// Register Widget Areas
function real_estate_dark_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'real-estate-dark'),
        'id'            => 'footer-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'real-estate-dark'),
        'id'            => 'footer-2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 3', 'real-estate-dark'),
        'id'            => 'footer-3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'real_estate_dark_widgets_init');

// Custom Post Type: Properties
function create_property_post_type() {
    $labels = array(
        'name'               => 'Properties',
        'singular_name'      => 'Property',
        'menu_name'          => 'Properties',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Property',
        'edit_item'          => 'Edit Property',
        'new_item'           => 'New Property',
        'view_item'          => 'View Property',
        'search_items'       => 'Search Properties',
        'not_found'          => 'No properties found',
        'not_found_in_trash' => 'No properties found in trash'
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'properties'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-building',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
    );
    
    register_post_type('property', $args);
}
add_action('init', 'create_property_post_type');

// Custom Taxonomy: Property Type
function create_property_taxonomies() {
    $labels = array(
        'name'              => 'Property Types',
        'singular_name'     => 'Property Type',
        'search_items'      => 'Search Property Types',
        'all_items'         => 'All Property Types',
        'edit_item'         => 'Edit Property Type',
        'update_item'       => 'Update Property Type',
        'add_new_item'      => 'Add New Property Type',
        'new_item_name'     => 'New Property Type Name',
        'menu_name'         => 'Property Types',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'property-type'),
    );

    register_taxonomy('property_type', array('property'), $args);
}
add_action('init', 'create_property_taxonomies');

// Excerpt Length
function real_estate_dark_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'real_estate_dark_excerpt_length');

// Excerpt More
function real_estate_dark_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'real_estate_dark_excerpt_more');

// ACF Options Page (if using ACF Pro)
if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
}