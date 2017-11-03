<?php
	require('../lib/conn.php');
	$dbconn = pg_connect($conn_alr) or die('Could not connect');

	$sql = "select * from active_land";
	$result = pg_query($sql);
	$data = null;

	while($row = pg_fetch_array($result)){
		$data[] = $row;
	}

	echo json_encode($data);
	
// Closing connection
pg_close($dbconn);
?>


