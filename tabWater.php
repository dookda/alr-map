<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

include "../lib/sel_config.php";
conndb();


$alrcode = $_GET['alrcode'];

function getParcel($col, $table, $alrcode){
    //$pgdb = pg_connect("host=localhost user=postgres password=1234 dbname=alr");

	$sql = pg_query("SELECT $col FROM $table where alrcode='$alrcode'"); 
    
	$data = pg_fetch_array($sql);
    	return $data[0];
};

//ini_set('max_execution_time', 300);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>ข้อมูลน้ำ</h3>
  
  <h4> ข้อมูลปฐมภูมิ </h4>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><h6>ประเภทแหล่งน้ำที่ใช้หลัก</h6></td>
        <td><h6><?php  echo getParcel('alr_wat', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>เนื้อที่แหล่งน้ำ (ไร่)</h6></td>
        <td><h6><?php  echo getParcel('alr_wat_r', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>เนื้อที่แหล่งน้ำ (งาน)</h6></td>
        <td><h6><?php  echo getParcel('alr_wat_n', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>เนื้อที่แหล่งน้ำ (วา)</h6></td>
        <td><h6><?php  echo getParcel('alr_wat_w', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>จำนวนบ่อน้ำแปลงนี้ (บ่อ)</h6></td>
        <td><h6><?php  echo getParcel('alr_pit', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>จำนวนสระน้ำที่ขุดในแปลงนี้(แห่ง)</h6></td>
        <td><h6><?php  echo getParcel('alr_pond', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>

    </tbody>
  </table>

<h4> ข้อมูลทุติยภูมิ </h4>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><h6>ปริมาณฝนตกเฉลี่ยทั้งปี (มม.)</h6></td>
        <td><h6><?php  echo getParcel('rain', 'alr_soil_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ปริมาณน้ำท่าทั้งปี (ลบ.ม)</h6></td>
        <td><h6><?php  echo getParcel('evap', 'alr_soil_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ปริมาณน้ำใต้ดิน (ลบ.ม/วินาที)</h6></td>
        <td><h6><?php  echo getParcel('yield', 'alr_soil_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความลึกน้ำใต้ดิน (เมตร)</h6></td>
        <td><h6><?php  echo getParcel('detp', 'alr_soil_4326', $alrcode); ?></h6></td>
      </tr>
    </tbody>
  </table>




</div>



<?php closedb(); ?>
</body>
</html>