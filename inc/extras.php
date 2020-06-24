<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ACStarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acstarter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'acstarter_body_classes' );


function get_social_icons() {
	$social = array();
    $social_types = array(
        'facebook'  => 'fa fa-facebook',
        'twitter'   => 'fa fa-twitter',
        'linkedin'  => 'fa fa-linkedin',
        'instagram' => 'fa fa-instagram',
        'youtube'   => 'fa fa-youtube-play'
    );

    foreach($social_types as $k=>$icon) {
    	$field = $k . '_link';
    	$link = get_field($field,"option");
    	if($link) {
    		$social[] = array('icon'=>$icon,'type'=>$k,'link'=>$link);
    	}
    }
    return $social;
}
