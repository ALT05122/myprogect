<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * After setup theme hook
 */
function construction_builders_theme_setup(){

    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'construction-builders', get_stylesheet_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'construction_builders_theme_setup', 100 );

/**
 * Load assets.
 *
 */
function construction_builders_enqueue_styles_and_scripts() {
    $my_theme    = wp_get_theme();
    $version     = $my_theme['Version'];

    wp_enqueue_style( 'construction-landing-page-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'construction-builders-style', get_stylesheet_directory_uri() . '/style.css', array( 'construction-landing-page-style' ), $version );

    wp_enqueue_script( 'construction-builders-custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'));		
}
add_action( 'wp_enqueue_scripts', 'construction_builders_enqueue_styles_and_scripts' );

function construction_builders_remove_parent_filters(){
    remove_action( 'customize_register', 'construction_landing_page_customizer_demo_content' );
}
add_action( 'init', 'construction_builders_remove_parent_filters' );

/**
 * Implementing new child theme functions to the child theme.
 */
require get_stylesheet_directory() . '/inc/child-functions.php';

/**
 * Implementing parent theme functions to the child theme.
 */
require get_stylesheet_directory() . '/inc/parent-functions.php';

/**
 * Implementing new child theme functions to the child theme.
 */
require get_stylesheet_directory() . '/inc/fontawesome.php';