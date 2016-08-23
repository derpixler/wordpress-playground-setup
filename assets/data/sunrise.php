<?php

if ( !defined( 'SUNRISE_LOADED' ) )
	define( 'SUNRISE_LOADED', 1 );


add_action( 'site_by_path_segments_count', function (){ return 2; } );