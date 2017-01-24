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



add_action( 'admin_bar_menu', function ( $wp_admin_bar ){

	switch ( $_SERVER[ 'REDIRECT_ENV' ] ) {
	    case 'production':
			$color = 'green';
			break;
		case 'test':
			$color = 'blue';
			break;
	    case 'vagrant':
			$color = 'red';
			break;
	}

	$args = array(
			'id'    => 'local:',
			'title' => '<div style="border-radius:50%;display:inline-block;margin-left:5px;margin-top:9px;width:15px;height:15px;background:' . $color . ';"></div>',
	);
	$wp_admin_bar->add_node( $args );
} );



/**
 * We have to force the COOKIEHASH
 * If we dont do this the customizer will not work sinze WordPress 4.7
 *
 * @see https://trello.com/c/4ypTZGat
 * @since wp 4.7.2
 *
 * @wp_hook query  string $query Database siteurl query.
 *
 * @TODO: Write a unittest for this freakshow - we have to test if the COOKIEHASH is well
 */
add_filter( 'query', function( $query ){

	if( array_key_exists( 'customize_changeset_uuid', $_GET ) && ! defined( 'COOKIEHASH' ) ){

		preg_match_all( "/^SELECT.*?WHERE domain IN \(\s\'(.*?)\',?.*?\) AND path IN \(\s'(.*?)'\s\) /", $query, $match );

		$siteurl  = ( ! empty( $match[1][0] ) ) ? $match[1][0] : FALSE;
		$sitepath = ( ! empty( $match[2][0] ) ) ? explode( "', '", $match[2][0] ) : FALSE;
		$siteurl = ( ! empty( $sitepath ) && count( $sitepath ) > 1 ) ? rtrim( get_protocol() . $siteurl . $sitepath[0], '/' ) : get_protocol() . $siteurl . $sitepath[0];

		$cookiehash = md5( $siteurl );

		define( 'COOKIEHASH', $cookiehash, true );

	}

	return $query;

} );