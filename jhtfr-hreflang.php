<?php
/**
 * @package JHTFR HREFLANG
 * @version 0.1
 */
/*
Plugin Name: JHTFR HREFLANG
Plugin URI: https://github.com/ninthlink/nlk-plugins/tree/master/jhtfr-hreflang
Description: Adds extra tags to wp_head area to point between http://www.jacuzzi.com/hot-tubs/ http://www.jacuzzi.ca/hot-tubs/ and http://www.jacuzzi.ca/hot-tubs/fr/
Author: alex chousmith
Version: 0.1
Author URI: http://www.ninthlink.com
*/

function jhtfr_hreflang_fix() {
	$fruri = $_SERVER['REQUEST_URI'];
	$cauri = str_replace( '/hot-tubs/fr', '/hot-tubs', $fruri );
	echo '<link rel="alternate" href="http://www.jacuzzi.ca'. $fruri .'" hreflang="fr-ca" /><link rel="alternate" href="http://www.jacuzzi.ca'. $cauri .'" hreflang="en-ca" /><link rel="alternate" href="http://www.jacuzzi.com'. $cauri .'" hreflang="en-us" />';
	echo "\n";
	
	// and remove default wp shortlink meta tag
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}
add_action( 'wp_head', 'jhtfr_hreflang_fix', 9 );
?>
