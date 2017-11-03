<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

  require('../lib/conn.php');
  $dbconn = pg_connect($conn_alr) or die('Could not connect');


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
  <h4>ข้อมูลดิน</h4>


<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><h6>กลุุ่มดิน</h6></td>
        <td><h6><?php  echo getParcel('soi_gup', 'alr_soil_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ชุดดิน</h6></td>
        <td><h6><?php  echo getParcel('soi_name', 'alr_soil_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ความเหมาะสมต่อการปลูกข้าว</h6></td>
        <td><h6><?php  echo getParcel('s_rice', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ความเหมาะสมต่อการปลูกข้าวโพดเลี้ยงสัตว์</h6></td>
        <td><h6><?php  echo getParcel('s_maize', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ความเหมาะสมต่อการปลูกมัน</h6></td>
        <td><h6><?php  echo getParcel('s_cassava', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ความเหมาะสมต่อการปลูกอ้อย</h6></td>
        <td><h6><?php  echo getParcel('s_sugar', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ความเหมาะสมต่อการปลูกพืชผัก</h6></td>
        <td><h6><?php  echo getParcel('s_vege', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ความเหมาะสมต่อการปลูกผลไม้</h6></td>
        <td><h6><?php  echo getParcel('s_fruit', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ความเหมาะสมต่อการปลูกทุ่งหญ้าเลี้ยงสัตว์</h6></td>
        <td><h6><?php  echo getParcel('s_pasture', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr><tr>
        <td><h6>ความเหมาะสมต่อการปลูกข้าวสาลี</h6></td>
        <td><h6><?php  echo getParcel('s_wheat', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ความเหมาะสมต่อการปลูกข้าวบาร์เล่ย์</h6></td>
        <td><h6><?php  echo getParcel('s_barley', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr> 
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกข้าวฟ่าง</h6></td>
        <td><h6><?php  echo getParcel('s_sorghum', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกถั่วเหลือง</h6></td>
        <td><h6><?php  echo getParcel('s_soybean', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr> 
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกถั่วลิสง</h6></td>
        <td><h6><?php  echo getParcel('s_peanut', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr> 
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกถั่วเขียว</h6></td>
        <td><h6><?php  echo getParcel('s_mungbean', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr> 
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกถั่ว</h6></td>
        <td><h6><?php  echo getParcel('s_bean', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr> 
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกงา</h6></td>
        <td><h6><?php  echo getParcel('s_sesame', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกปาล์มน้ำมัน</h6></td>
        <td><h6><?php  echo getParcel('s_oil', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกฝ้าย</h6></td>
        <td><h6><?php  echo getParcel('s_cotton', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกยาสูบ</h6></td>
        <td><h6><?php  echo getParcel('s_tobacco', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกลิ้นจี่</h6></td>
        <td><h6><?php  echo getParcel('s_lychee', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกลำไย</h6></td>
        <td><h6><?php  echo getParcel('s_longan', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกกาแฟ</h6></td>
        <td><h6><?php  echo getParcel('s_arabica', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกชา</h6></td>
        <td><h6><?php  echo getParcel('s_tea', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกมะม่วง</h6></td>
        <td><h6><?php  echo getParcel('s_mango', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกต้นหอม</h6></td>
        <td><h6><?php  echo getParcel('s_onion_l', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกชา</h6></td>
        <td><h6><?php  echo getParcel('s_tea', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกกระเทียม</h6></td>
        <td><h6><?php  echo getParcel('s_garlic', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกมะเขือเทศ</h6></td>
        <td><h6><?php  echo getParcel('s_tomato', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกส้ม</h6></td>
        <td><h6><?php  echo getParcel('s_orange1', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกสัปปะรด</h6></td>
        <td><h6><?php  echo getParcel('s_pineappl', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกไหม</h6></td>
        <td><h6><?php  echo getParcel('s_silk', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกมะขาม</h6></td>
        <td><h6><?php  echo getParcel('s_tamarind', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกกล้วย</h6></td>
        <td><h6><?php  echo getParcel('s_banana', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกมะม่วงหิมพานต์</h6></td>
        <td><h6><?php  echo getParcel('s_cashewnu', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกขนุน</h6></td>
        <td><h6><?php  echo getParcel('s_jackfrui', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ความเหมาะสมต่อการปลูกไม้ไผ่</h6></td>
        <td><h6><?php  echo getParcel('s_bamboo', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	   <tr>
        <td><h6>ความเหมาะสมต่อการปลูกพริก</h6></td>
        <td><h6><?php  echo getParcel('s_chili', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	   <tr>
        <td><h6>ความเหมาะสมต่อการปลูกกะหล่ำปลี</h6></td>
        <td><h6><?php  echo getParcel('s_cabbage', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	   <tr>
        <td><h6>ความเหมาะสมต่อการปลูกมันฝรั่ง</h6></td>
        <td><h6><?php  echo getParcel('s_potato', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	   <tr>
        <td><h6>ความเหมาะสมต่อการปลูกนุ่น</h6></td>
        <td><h6><?php  echo getParcel('s_kapok', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	   <tr>
        <td><h6>ความเหมาะสมต่อการปลูกอาโวคาโด</h6></td>
        <td><h6><?php  echo getParcel('s_avocado', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
	   <tr>
        <td><h6>ความเหมาะสมต่อการปลูกดอกไม้</h6></td>
        <td><h6><?php  echo getParcel('s_flowers', 'alr_suit_4326', $alrcode); ?></h6></td>
      </tr>
    </tbody>
  </table>




</div>



<?php 
// Closing connection
pg_close($dbconn);
?>
</body>
</html>
