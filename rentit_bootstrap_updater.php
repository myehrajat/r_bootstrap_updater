<?php
/**
 * @package Rentit_Bootstrap_4_Updater
 * @version 1.0
 */
/*
Plugin Name: Rentit Bootstrap 4 Updater 4.0.0-alpha.6 (bug)
Plugin URI: https://wordpress.org/plugins/hello-dolly/
Description: this make renit theme js and css file up to date
Version: 1.0
Author URI: https://ma.tt/
Text Domain: Rentit_Bootstrap_4_Updater
*/
//SOURCE:http://bootstrap.rtlcss.com/docs/4.0/getting-started/download/
//SOURCE:https://github.com/twbs/bootstrap/tree/v4-dev

//https://github.com/HubSpot/tether or
/* add forntend */
add_action( 'wp_enqueue_scripts', 'Rentit_Bootstrap_4_Updater_dequeue_scripts', 400 );
add_action( 'wp_enqueue_scripts', 'Rentit_Bootstrap_4_Updater_enqueue_scripts', 400 );
/* add backend */
add_action( 'admin_enqueue_scripts', 'Rentit_Bootstrap_4_Updater_dequeue_scripts', 400 );
add_action( 'admin_enqueue_scripts', 'Rentit_Bootstrap_4_Updater_enqueue_scripts', 400 );
/******************************************/
//Updating scripts
/******************************************/
function Rentit_Bootstrap_4_Updater_dequeue_scripts() {
	wp_deregister_script( 'renita_bootstrap_min_js' );
}
function Rentit_Bootstrap_4_Updater_enqueue_scripts() {
	wp_enqueue_script( 'renita_tether', plugins_url("tether/dist/js/tether.min.js",__FILE__ ), array(), '1.3.3', true  );
	if ( get_theme_mod( 'rentit_rlt_control', false ) == true ) {
		wp_enqueue_script( 'renita_bootstrap_min_js', plugins_url("bootstrap-rtl/js/bootstrap.min.js",__FILE__ ), array( 'renita_tether' ), '4.0.0.6', true );
	}else{
		wp_enqueue_script( 'renita_bootstrap_min_js', plugins_url("bootstrap/js/bootstrap.min.js",__FILE__ ), array( 'renita_tether' ), '4.0.0.6', true );
	}
}
/*************************************
*************************************/
/* add backend */
add_action( 'admin_enqueue_scripts', 'Rentit_Bootstrap_4_Updater_dequeue_styles', 400 );
add_action( 'admin_enqueue_scripts', 'Rentit_Bootstrap_4_Updater_enqueue_styles', 400 );
/* add forntend */
add_action( 'wp_enqueue_scripts', 'Rentit_Bootstrap_4_Updater_dequeue_styles', 400 );
add_action( 'wp_enqueue_scripts', 'Rentit_Bootstrap_4_Updater_enqueue_styles', 400 );
/******************************************/
//Updating styles
/******************************************/
function Rentit_Bootstrap_4_Updater_dequeue_styles() {
	wp_deregister_style( 'renita_bootstrap.min' );
	wp_deregister_style( 'renita_bootstrap-rtl' );
}
function Rentit_Bootstrap_4_Updater_enqueue_styles() {
	if ( get_theme_mod( 'rentit_rlt_control', false ) == true ) {
		wp_enqueue_style( 'renita_bootstrap.min', plugins_url("bootstrap-rtl/css/bootstrap.min.css",__FILE__ ), '4.0.0', true  );
	}else{
		wp_enqueue_style( 'renita_bootstrap.min',  plugins_url("bootstrap/css/bootstrap.min.css",__FILE__ ), '4.0.0', true );
	}
}


