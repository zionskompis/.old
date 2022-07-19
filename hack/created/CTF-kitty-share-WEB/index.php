<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Kitty Share</title>
</head>
<body>
<center>
<h3>Kitty Share - alpha</h3>
<h5>-- kitty pics --</h5>
<img src="kitty.jpg">
<hr><br><br>

<?php
 
if(!empty($_POST)) 
{
  if ($_FILES["file"]["error"] > 0)
  {
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
   else
  {
    $temp = explode(".", $_FILES["file"]["name"]);
    
    $newfilename = generateRandomString() . '.' . end($temp);
    
    $img = $_FILES["file"]["tmp_name"];	

	  $resource = imagecreatefromjpeg($img);
    imagejpeg($resource, "tmp/" . $newfilename);
    imagedestroy($resource);
    
    echo "File: <a href='tmp/" . $newfilename . "'>" . $newfilename . "</a><br><br>";
    echo '<img src="'. "tmp/" . $newfilename . '"><br><br><hr>';

  }
}

function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>


<form action="index.php" method="post" enctype="multipart/form-data" id="upload">

<label for="file">Pic:</label>
<input type="file" name="file" id="file">
<input type="hidden" name="MAX_FILE_SIZE" value="512000" />

<input type="submit" name="submit" value="Submit">
</form>

<script>
$(document).ready( function (){
    $("#upload").submit( function(submitEvent) {
        var filename = $("#file").val();
        var extension = filename.replace(/^.*\./, '');
        if (extension == filename) {
            extension = '';
        } else {
            extension = extension.toLowerCase();
        }

        switch (extension) {
            case 'jpg':
            case 'jpeg':
                console.log("File extension ok!");
            break;

            default:
                alert("File extension not allowed, only 'jpg' and 'jpeg'");
                submitEvent.preventDefault();
        }

  });
});

</script>
</body>
<html>
