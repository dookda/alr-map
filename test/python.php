<html>
<head>
<title>py script</title>
</head>
<body>
<h1>hey there!</h1>
<?php 
	$pyscript = 'C:/xampp/htdocs/alr-map/python.py';
	$python = 'C:/Python27/ArcGIS10.4/python.exe';
	$command = escapeshellcmd('C:/xampp/htdocs/alr-map/python.py');
	$output=shell_exec($command);
	echo $output;
?>
</body>
</html>