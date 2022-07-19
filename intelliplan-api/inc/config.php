<?php

	define('__INC__', dirname(__FILE__));
	
	// The api keys and the organisation value is provided by intelliplan
	$org = null;
	$partner_code = null;
	$partner_id = null;
	
	// TLD: default = .eu
	$tld ='eu';

	// API->data store in MySQL. Default off
        $store_api = false;

	// Exit if api keys or org not set
	if(!isset($org) || !isset($partner_code) || !isset($partner_id))
	{
		die(print 'Required values not set in '. __FILE__);
	}

        // Build URL
        $url = 'https://'.$org.'.app.intelliplan.'.$tld.'/CandidatePortal_v1/JobAd/Rss?pid='. $partner_id .'&partner_code=' . $partner_code;

	// Connect to MySQL
	if($store_api === true)
	{
		require_once(__INC__.'/database.php');
		if(!isset($dbhost) || !isset($dbuser) || !isset($dbpassw) || !isset($database))
		{
			die(print 'Datbase values not set in '.__INC__.'/database.php');
		}	
	}
	

?>
