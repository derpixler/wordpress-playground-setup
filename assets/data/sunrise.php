<?php

if ( !defined( 'SUNRISE_LOADED' ) )
	define( 'SUNRISE_LOADED', 1 );

/* extendes url segmente to 2 */
add_action( 'site_by_path_segments_count', function (){ return 2; } );

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