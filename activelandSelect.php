<?php
	include "../lib/sel_config.php";
    conndb();

	$sql = "select * from active_land";
	$result = pg_query($sql);
	$data = null;

	while($row = pg_fetch_array($result)){
		$data[] = $row;
	}

	echo json_encode($data);
	closedb();
?>


