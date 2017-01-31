<?php
/**
 * LSX Starter Child functions
 *
 * @package 	lsx-starter-child-theme
 */

/**
 * Sets up theme defaults
 *
 * @package 	lsx-starter-child-theme
 * @subpackage	setup
 */
function lsx_sct_child_setup() {
	load_theme_textdomain( 'lsx-starter-child-theme', get_stylesheet_directory() . '/languages' . get_locale() . '.mo' );
}
add_action( 'after_setup_theme', 'lsx_sct_child_setup' );

/**
 * Enqueues the parent and the child theme styles.
 *
 * @package 	lsx-starter-child-theme
 * @subpackage	setup
 */
function lsx_sct_child_scripts() {
	// Fonts from LSX Theme. Add these lines if your website will use a different font.
	//wp_deregister_style( 'lsx-header-font' );
	//wp_deregister_style( 'lsx-body-font' );
	//wp_deregister_style( 'lsx_font_scheme' );

	wp_enqueue_script( 'lsx-starter-child-theme-scripts', get_stylesheet_directory_uri() . '/assets/js/custom.min.js', array( 'jquery' ) );
	wp_enqueue_style( 'lsx-starter-child-theme-styles', get_template_directory_uri() . '/style.css' );

	// Google Fonts. Add these lines if your website will use a different font.
	//wp_register_style( 'lsx-starter-child-theme-quattrocento-sans', 'https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i' );
	//wp_enqueue_style( 'lsx-starter-child-theme-quattrocento-sans');
}
add_action( 'wp_enqueue_scripts', 'lsx_sct_child_scripts' );
