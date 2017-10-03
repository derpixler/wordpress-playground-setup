<?php # -*- coding: utf-8 -*-
/**
 * Plugin Name:  MyHotelShop MU Plugins Loader
 * Plugin URI:   https://bitbucket.org/webdevmedia/
 * Description:	 Load must use plugins
 * Author:       web dev media UG
 * Author URI:   www.web-dev-media.de
 * Contributors: derpixler
 * Version:      1.0.0
 *
 * How to use:
 * Drop your plugin at MUPLUGINDIR [wp-content/mu-plugins]
 * add require_one for your plugin index php.
 *
 *  require_once( MUPLUGINDIR . '/my-foo-plugin/foo.php' );
 *
 */

/**
 * MHS Controller access management
 * Restrict the accessment on controller wp-admin dashboards.
 */

# require_once( MUPLUGINDIR . '/controller/example.php' );