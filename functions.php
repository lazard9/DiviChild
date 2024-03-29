<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION

function lgbcoin_scripts() {
	wp_enqueue_style( 'lgbcoin-style', get_stylesheet_directory_uri() . '/dist/styles/main.min.css' );
}
add_action( 'wp_enqueue_scripts', 'lgbcoin_scripts' );

/**
 * Custom post type News
 */
require_once get_stylesheet_directory() . '/inc/custom-post-type.php';

/**
 * Shortcode to Display News Post Type
 */
require_once get_stylesheet_directory() . '/inc/shortcode.php';
