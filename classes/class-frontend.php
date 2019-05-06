<?php
namespace \lsx_starter_child_theme\classes;
/**
 * @package   lsx_starter_child_theme\classes
 * @author    LightSpeed
 * @license   GPL-2.0+
 * @link
 * @copyright 2019 LightSpeed
 */

/**
 * Class Core
 * @package lsx_starter_child_theme\classes
 */
class Frontend {

	/**
	 * Holds class instance
	 *
	 * @since 1.0.0
	 *
	 * @var      object lsx_starter_child_theme\classes\Frontend()
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 11 );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @return    object \lsx_starter_child_theme\classes\Frontend()    A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Enqueues the parent and the child theme styles.
	 *
	 * @package 	lsx-starter-child-theme
	 * @subpackage	setup
	 */
	function scripts() {
		// Fonts from LSX Theme. Add these lines if your website will use a different font.
		//wp_dequeue_style( 'lsx-header-font' );
		//wp_dequeue_style( 'lsx-body-font' );
		//wp_dequeue_style( 'lsx_font_scheme' );
		
		// Google Fonts. Add these lines if your website will use a different font.
		//wp_enqueue_style( 'lsx-starter-child-theme-quattrocento-sans', 'https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i' );

		wp_enqueue_style( 'lsx-starter-child-theme-styles', get_stylesheet_directory_uri() . '/custom.css' );
		wp_enqueue_script( 'lsx-starter-child-theme-scripts', get_stylesheet_directory_uri() . '/assets/js/custom.min.js', array( 'jquery' ) );
	}	
}
