<?php
	// Set MySQL values 
	$dbhost = '';
	$dbuser = '';
	$dbpassw = '';
	$dbname = '':

	// Connect to MYSQL database
        $con = mysqli_connect($dbhost,$dbuser ,$dbpassw,$dbname);
	
	// Exit if database connection error
	if(mysqli_connect_errno())
	{
    		print "Connection Failed".mysqli_connect_error();
    		exit;
	}

	// Close connection
	function closeDB($con)	{
        	mysqli_close($con);
	}


?>
