<?php
	// script path 
	define('__ROOT__', dirname(__FILE__));
	
	require_once(__ROOT__.'/inc/config.php');

	/* example using http://php.net/manual/en/function.simplexml-load-file.php
   	make request to api then for each ad in respons: save ad->id in foo 	*/

	$ad_feed = (array) simplexml_load_file($url);
	if($ad_feed){	
		$ads= $ad_feed['channel']->children();
		foreach($ads as $ad){
			// get the ad->id
			$ad_id = (string)$ad->children('intelliplan', true)->id; 	
		}
	}

	// close mysql connection if set	
	if($store_api === true){
		closeDB($con);
	}

	// exit 
	die();
