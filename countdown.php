<?php

/*
Plugin Name: Countdown Shortcode
Plugin URI: https://github.com/wp-pure/countdown
Description: A simple plugin that creates a javascript countdown clock from a shortcode.
Version: 0.0.1
Author: James Pederson
Author URI: https://jpederson.com
License: GPL2
*/


// the shortcode itself
function countdown_shortcode( $atts ) {

	// set shortcode defaults
	$a = shortcode_atts( array(
		'date' => date( 'UTC', time()+864000 ),
	), $atts );


	$clock_html = '<div class="countdown-clock" data-date="' . $a['date'] . '">
	  <div class="countdown-column">
	    <span class="number days"></span>
	    <div class="label">Days</div>
	  </div>
	  <div class="countdown-column">
	    <span class="number hours"></span>
	    <div class="label">Hours</div>
	  </div>
	  <div class="countdown-column">
	    <span class="number minutes"></span>
	    <div class="label">Minutes</div>
	  </div>
	  <div class="countdown-column">
	    <span class="number seconds"></span>
	    <div class="label">Seconds</div>
	  </div>
	</div>
	<link href="/wp-content/countdown" />';

	return $clock_html;
}
add_shortcode( 'countdown', 'countdown_shortcode' );



// include the js and css
function countdown_assets() {
	wp_enqueue_style( 'countdown-css', plugin_dir_url( __FILE__ ) . 'countdown.css?v=1' );
	wp_enqueue_script( 'countdown-js', plugin_dir_url( __FILE__ ) . 'countdown.js?v=1', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'countdown_assets' );


