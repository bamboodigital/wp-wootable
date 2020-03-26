<?php
/**
 * Woocommerce order to Airtable custom plugin.
 *
 * Plugin Name: Wootable
 * Plugin URI: https://bamboodigital.co
 * Description: Woocommerce order to Airtable custom plugin.
 * Version: 1.0.0
 * Author: Bamboo Digital
 * Author URI: https://bamboodigital.co
 * License: GPLv2 or later
 * Text Domain: wootable
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Adds action on order completion.
 */
add_action( 'wp', 'airtable_update_data'); 


/**
 * Sends custom order information to Airtable.
 */
function airtable_update_data(){

	$http_headers = array(	'Authorization' => 'Bearer keyePwTv0jYCDtpq0',
						'Content-Type' => 'application/json'
					);
	
	$fields = array(
				'id' => '3',
		        'image' => 'designshack.net/wp-content/uploads/symbol-logo-example.jpg',
		        'render-status' => 'done',
		        'aep' => 'story1',
		        'last-name' => 'Glacken',
		        'favorite-color' => 'fffffg',
		        'age' => '35',
				'first-name' => 'Endatrrry'
	 		 );

	$data = array("fields" => $fields, "typecast" => true);

	$curlopt_url =   "https://api.airtable.com/v0/appyDqElZ2rstA8C9/Videos";

	$args = array(  "method" => "POST",
				"timeout" => 15,
				"redirection" => 5,
				"blocking" => true,
				"headers" => $http_headers,
				"body" => json_encode($data),
			);

	$response = wp_remote_post( $curlopt_url, $args );
	$response_code = wp_remote_retrieve_response_code( $response );

	echo ($response_code);
}