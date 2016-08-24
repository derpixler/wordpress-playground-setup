<?php

if ( !defined( 'SUNRISE_LOADED' ) )
	define( 'SUNRISE_LOADED', 1 );

/* extendes url segmente to 2 */
add_action( 'site_by_path_segments_count', function (){ return 2; } );

/* Hide posttype Page */
add_action( 'admin_init', function(){

	global $wp_post_types;

	$wp_post_types['page']->public = false;
    $wp_post_types['page']->show_ui = false;
    $wp_post_types['page']->show_in_menu = false;
    $wp_post_types['page']->show_in_nav_menus = false;
    $wp_post_types['page']->show_in_admin_bar = false;
	$wp_post_types['page']->exclude_from_search = true;

	return $wp_post_types;

});

/* Remove Page from wordpress admin menu */
add_action( 'admin_menu', function(){ remove_menu_page( 'edit.php?post_type=page' ); });