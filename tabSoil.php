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


ini_set('max_execution_time', 300);

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
  <h3>ข้อมูลดิน</h3>


<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>กลุุ่มดิน</td>
        <td><?php  echo getParcel('soi_gup', 'alr_soil_4326', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ชุดดิน</td>
        <td><?php  echo getParcel('soi_name', 'alr_soil_4326', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมต่อการปลูกข้าว</td>
        <td><?php  echo getParcel('s_rice', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมต่อการปลูกข้าวโพดเลี้ยงสัตว์</td>
        <td><?php  echo getParcel('s_maize', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมต่อการปลูกมัน</td>
        <td><?php  echo getParcel('s_cassava', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมต่อการปลูกอ้อย</td>
        <td><?php  echo getParcel('s_sugar', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมต่อการปลูกพืชผัก</td>
        <td><?php  echo getParcel('s_vege', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมต่อการปลูกผลไม้</td>
        <td><?php  echo getParcel('s_fruit', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมต่อการปลูกทุ่งหญ้าเลี้ยงสัตว์</td>
        <td><?php  echo getParcel('s_pasture', 'alr_suit_4326', $alrcode); ?></td>
      </tr><tr>
        <td>ความเหมาะสมต่อการปลูกข้าวสาลี</td>
        <td><?php  echo getParcel('s_wheat', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมต่อการปลูกข้าวบาร์เล่ย์</td>
        <td><?php  echo getParcel('s_barley', 'alr_suit_4326', $alrcode); ?></td>
      </tr> 
	  <tr>
        <td>ความเหมาะสมต่อการปลูกข้าวฟ่าง</td>
        <td><?php  echo getParcel('s_sorghum', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกถั่วเหลือง</td>
        <td><?php  echo getParcel('s_soybean', 'alr_suit_4326', $alrcode); ?></td>
      </tr> 
	  <tr>
        <td>ความเหมาะสมต่อการปลูกถั่วลิสง</td>
        <td><?php  echo getParcel('s_peanut', 'alr_suit_4326', $alrcode); ?></td>
      </tr> 
	  <tr>
        <td>ความเหมาะสมต่อการปลูกถั่วเขียว</td>
        <td><?php  echo getParcel('s_mungbean', 'alr_suit_4326', $alrcode); ?></td>
      </tr> 
	  <tr>
        <td>ความเหมาะสมต่อการปลูกถั่ว</td>
        <td><?php  echo getParcel('s_bean', 'alr_suit_4326', $alrcode); ?></td>
      </tr> 
	  <tr>
        <td>ความเหมาะสมต่อการปลูกงา</td>
        <td><?php  echo getParcel('s_sesame', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกปาล์มน้ำมัน</td>
        <td><?php  echo getParcel('s_oil', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกฝ้าย</td>
        <td><?php  echo getParcel('s_cotton', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกยาสูบ</td>
        <td><?php  echo getParcel('s_tobacco', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกลิ้นจี่</td>
        <td><?php  echo getParcel('s_lychee', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกลำไย</td>
        <td><?php  echo getParcel('s_longan', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกกาแฟ</td>
        <td><?php  echo getParcel('s_arabica', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกชา</td>
        <td><?php  echo getParcel('s_tea', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกมะม่วง</td>
        <td><?php  echo getParcel('s_mango', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกต้นหอม</td>
        <td><?php  echo getParcel('s_onion_l', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกชา</td>
        <td><?php  echo getParcel('s_tea', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกกระเทียม</td>
        <td><?php  echo getParcel('s_garlic', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกมะเขือเทศ</td>
        <td><?php  echo getParcel('s_tomato', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกส้ม</td>
        <td><?php  echo getParcel('s_orange1', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกสัปปะรด</td>
        <td><?php  echo getParcel('s_pineappl', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกไหม</td>
        <td><?php  echo getParcel('s_silk', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกมะขาม</td>
        <td><?php  echo getParcel('s_tamarind', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกกล้วย</td>
        <td><?php  echo getParcel('s_banana', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกมะม่วงหิมพานต์</td>
        <td><?php  echo getParcel('s_cashewnu', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกขนุน</td>
        <td><?php  echo getParcel('s_jackfrui', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	  <tr>
        <td>ความเหมาะสมต่อการปลูกไม้ไผ่</td>
        <td><?php  echo getParcel('s_bamboo', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	   <tr>
        <td>ความเหมาะสมต่อการปลูกพริก</td>
        <td><?php  echo getParcel('s_chili', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	   <tr>
        <td>ความเหมาะสมต่อการปลูกกะหล่ำปลี</td>
        <td><?php  echo getParcel('s_cabbage', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	   <tr>
        <td>ความเหมาะสมต่อการปลูกมันฝรั่ง</td>
        <td><?php  echo getParcel('s_potato', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	   <tr>
        <td>ความเหมาะสมต่อการปลูกนุ่น</td>
        <td><?php  echo getParcel('s_kapok', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	   <tr>
        <td>ความเหมาะสมต่อการปลูกอาโวคาโด</td>
        <td><?php  echo getParcel('s_avocado', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
	   <tr>
        <td>ความเหมาะสมต่อการปลูกดอกไม้</td>
        <td><?php  echo getParcel('s_flowers', 'alr_suit_4326', $alrcode); ?></td>
      </tr>
    </tbody>
  </table>




</div>



<?php closedb(); ?>
</body>
</html>
