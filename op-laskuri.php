<?php

/**
 * Plugin Name: OP Calculator
 * Description: This helps you add OP Laskuri to your site with shortcode [op-laskuri]. See readme file for more details. This plugin does not have a settings page.
 * Version: 2023.10.28
 * Author: Kenda
 * Author URI: https://kenda.fi/
 * Text Domain: op-laskuri
 * Domain Path: /languages
 *
 **/

// Makes sure WP is loaded (no direct loading of this file is allowed).

if ( !function_exists( 'add_action' ) ) { die( 'You cannot load this file directly.' ); }

// Load translations.

function op_laskuri_load_textdomain() {

	load_plugin_textdomain(
		'op-laskuri',
		false,
		basename( dirname( __FILE__ ) ) . '/languages'
	);

}

add_action( 'plugins_loaded', 'op_laskuri_load_textdomain' );

// Add CSS and Javascript

function op_laskuri_assets() {

	$our_path = plugin_dir_path( __FILE__ );

	if ( file_exists( $our_path.'op-calc-widget.css' ) ) {

		wp_enqueue_style(
			'op-laskuri-styles',
			plugins_url( basename( $our_path ).'/op-calc-widget.css' ),
			false,
			filemtime( $our_path.'op-calc-widget.css' ),
			false
		);

	}

	if ( file_exists( $our_path.'op-calc-widget.js' ) ) {

		wp_enqueue_script(
			'op-calc-widget',
			plugins_url( basename( $our_path ).'/op-calc-widget.js' ),
			array(), // dependencies
			filemtime( $our_path.'op-calc-widget.js' ),
			true // in footer
		);

	}

	if ( file_exists( $our_path.'op-script.js' ) ) {

		wp_enqueue_script(
			'op-script',
			plugins_url( basename( $our_path ).'/op-script.js' ),
			array(), // dependencies
			filemtime( $our_path.'op-script.js' ),
			true // in footer
		);

	}

}

add_action( 'wp_enqueue_scripts', 'op_laskuri_assets' );

// Shortcode [op-laskuri] or webshop version [op-laskuri shop=1]

function op_laskuri_shortcode_output( $atts = [], $content = null, $tag = '' ) {

	// Normalize attribute keys, lowercase.
	$atts = array_change_key_case((array)$atts, CASE_LOWER);

	// Get the GET variable value.
	$atts = shortcode_atts(
		array(
			'shop' => ( isset( $atts[ 'shop' ] ) && ( $atts[ 'shop' ] == 1 ) ? true : false ),
		),
		$atts,
		'op-laskuri'
	);

	if ( $atts[ 'shop' ] ) {

		// Shop version
		$return_html = '<div id="op-keti-init-product"></div>';

	} else {

		// Normal
		$return_html = '<div id="op-keti-init-content"></div>';

	}

	return $return_html;

}

function op_laskuri_shortcode_init() {

	add_shortcode( 'op-laskuri', 'op_laskuri_shortcode_output' );

}

add_action( 'init', 'op_laskuri_shortcode_init' );

?>