```
// index.php
<html>
<head>
</head>
<body>
<center>
reverse a string<br>
<form>
<input type="text" name="string"><br>
</form>
<?php
function is_forbidden($forbiddennames, $stringtocheck) 
{
    foreach ($forbiddennames as $name) {
        if (stripos($stringtocheck, $name) !== FALSE) {
            return true;
        }
    }
}
	if($_REQUEST["string"])
	{
		$str = $_REQUEST["string"];
		if(strlen($str) > 30)
			die("string to long :(");
	 	$dis = array("$(rm","$(del","$(id","$(whoami","$(ls","$(w","$(path","$(ps","$(dir","$(uname");
		
		if(is_forbidden($dis, $str)) 
    			die("\_(o_O)_/ stop trying to break me");
		
		if(preg_match('/\*/', $str))
  			 die("stop trying to break me");
                if(preg_match('/;/', $str))
                         die("stop trying to break me");
                if(preg_match('/&/', $str))
                         die("stop trying to break me");		
                if(preg_match('/\//', $str))
                         die("stop trying to break me");
                if(preg_match('/:/', $str))
                         die("stop trying to break me");
                if(preg_match('/\|/', $str))
                         die("stop trying to break me");
                if(preg_match('/`/', $str))
                         die("stop trying to break me");
                if(preg_match('/-/', $str))
                         die("stop trying to break me");
                //if(preg_match('/echo/', $str))
                //         die("string not allowed :(");
                if (strpos($str, '$(cat') !== false) 
                         die("There is no place like home, if you continue with your petty attempts I will find find you!");
                if (strpos($str, '$(echo') !== false)
                         die("There is no place like home, if you continue with your petty attempts I will find find you!");
		include(flag.php);
		echo $str . "<br>";
		system("echo $str | rev ");
		
		echo "<br><br>";
			print "<img src='";
			print "https://media.giphy.com/media/b9QBHfcNpvqDK/giphy.gif";
			print "'>";
		
		 
	}
?>

</center>
</body>
</html>
```
// create a file flag.php in the same dir

```
<?php
	/*
	flag{I'd_rather_have_a_free_bottle_in_front_of_me_than_a_prefrontal_lobotomy}
	*/
?>
```
