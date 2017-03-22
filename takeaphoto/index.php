<!DOCTYPE html>
<html lang="en">
<head>
  <title>photo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 
<div class="container">
  <div class="text-center">
<?php
$alrcode = $_GET["alrcode"];
  echo '<h6>แปลง '.$alrcode.'</h6>';
  $photoDir = 'uploads/'.$alrcode;
  //echo $photoDir;
  $scan = scandir($photoDir);
  $i = 1;
  foreach($scan as $file)
  {
    if (!is_dir($file))
    {
      echo 'ภาพ '.$file;
      echo '<div class="panel"> <img src="'.$photoDir.'/'.$file.'" class="img-rounded" style="width: 400px;"/></div>';
    }
    $i+=1;
  }
?>
  </div>
</div>
</body>
</html>