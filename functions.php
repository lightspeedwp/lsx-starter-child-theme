<?php
/**
 * LSX Starter Child functions
 *
 * @package 	lsx-child
 */

/**
 * Enqueues the parent and the child theme styles.
 *
 * @package 	lsx-child
 * @subpackage	setup
 * @category	scripts
 */
function lsx_child_scripts() {
	wp_enqueue_script( 'lsx-child-scripts', get_stylesheet_directory_uri() . '/assets/js/custom.min.js', array( 'jquery' ) );
	wp_enqueue_style( 'lsx-child-styles', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'lsx_child_scripts' );