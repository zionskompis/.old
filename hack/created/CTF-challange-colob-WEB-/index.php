 <?php
  include_once("flag.php");
	$headers = apache_request_headers();
	
	echo $headers[' X-Forwarded-For'];
	if($headers['HTTP_X_FORWARDED_FOR'] == "https://hackforums.net")
	{
		echo "<hr>";
	}
	else
	{
                echo "<center><img src='http://iruntheinternet.com/lulzdump/images/brute-force-hacking-cat-sitting-keyboard-13630241816.jpg'><br>Only for the 31337";
                die();
	
	}
		
    	if(isset($_GET['swe'], $_GET['hack']))
	{
		$swe = $_GET['swe'];
		$hack = $_GET['hack'];
        	
		if(strlen($swe) <= 32 && strlen($hack) <= 32){
            		if($swe !== $hack)
			{
               			 if(hash('md5', $swe) === hash('md5', $hack)){
                    			echo $flag;
                		}
				else
				{
                    			die("No match");
                		}
            		}
			else
			{
                		die("Same values");
            		}
        	}
		else
		{
            		die("String(s) to long");
        	}

        	echo '<hr>';
    	}
?>
