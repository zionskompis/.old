https://direktoratet.se/swehack/chall/orko/ 

https://news.ycombinator.com/item?id=9484757
```
// index.php
<html>
<head>
<title> ork0.bot.beta </title>
    <style> 
        input { margin:0;background-color:#000;border:1px solid #000; }
	body { background-color:#000;}
	h3 { color:#fff;}<!-- remember to delete tmp -->
    </style>  
</head>
<center><img src="orko.front.png"></img><br><br>
    <form method="post" action="panel.php"> 
   <br><br>  
   <input type=password id="pass" name="pass">
   </form>
</center>
</body>
</html>
```

```
// panel.php
<html>
<head>
<title> ork0.bot.beta </title>
    <style> 
        input { margin:0;background-color:#000;border:1px solid #000; }
        body { background-color:#000;}
        h2 { color:#fff;}
    </style>  
</head>
<?php
if(isset($_POST["pass"]))
{
	$master_pw = "0e841649072371042243902571898835"; 
	$pass = $_POST["pass"];
	$hash = md5($pass);
	$hash = trim($hash);
	if($hash == $master_pw)
	{
		echo "<center><h2>Well done, no boots here unfortunately but you can get the flag instead.";
		echo "<br><br><img src='orko.png'></img>";
		echo "<br><br>flag{I_smoke_my_friends_down_to_the_filter}</h2></center>";
	}
	else
	{
		header("location: index.php");
		die("wrong password");	
	}       
}
?>
</body>
</html>
```

Create a directory tmp, directory listing needs to be on and in the the tmp directory create a file 'notes' with the content below.

```
Remember to check with mentor if the login function is safe:

	$master_pw = "0e841649072371042243902571898835"; //only md5 but the password is super strong so bruteforce would be very difficult
	$pass = $_POST["pass"];
	$hash = md5($pass);
	$hash = trim($hash);
	if($hash == $master_pw)
		// login ok - load panel
--------------------------------------------------
```

I messed up a little when I thought that you had to find a string that matches the hash, the idea was that you would have to write a script that finds one that matches. I missed that php is not at all accurate when two floats is compared.
Example: ```<?php if("0e15" == md5('QNKCDZO')) echo "same"; ?><?php if("0e15" == md5('QNKCDZO')) echo "same"; ?>```

Before I discovered this, I wrote a script that finds a matching string.

```
<?php
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$mp = "0e841649072371042243902571898835";
while(1)
{
	$str = generateRandomString();
	$hash =  md5($str);
        $hs = (string)$hash;
        if(substr($hs, 0, 2) === "0e")
        {
		echo "testing :" . $str . " : " . md5($str) ."\n";
		if($hash == $mp)
		{
			echo "\n jay\t " . $str ." : " . $hash;
			break;
		}	
	}
}
?>
```
