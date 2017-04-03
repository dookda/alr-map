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
  <h3>ข้อมูลเกษตรกร</h3>


<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><h6>ชื่อเกษตรกรที่ลงทะเบียนใช้ที่ดินแปลงนี้</h6></td>
        <td><h6><?php  echo getParcel('farmer_f', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>นานสกุลเกษตรกรที่ลงทะเบียนใช้ที่ดินแปลงนี้</h6></td>
        <td><h6><?php  echo getParcel('farmer_s', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>เลขบัตรประชาชน</h6></td>
        <td><h6><?php  echo getParcel('farmer_id', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>สถานะการถือครอง</h6></td>
        <td><h6><?php  echo getParcel('alr_status', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>การเป็นศูนย์เครือข่าย ศพก. </h6></td>
        <td><h6><?php  echo getParcel('alr_center', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ชุดเกษตรยั่งยืน</h6></td>
        <td><h6><?php  echo getParcel('alr_type', 'alr_mobile', $alrcode); ?></h6></td>
      </tr><tr>
        <td><h6>การเป็นเกษตรต้นแบบ</h6></td>
        <td><h6><?php  echo getParcel('alr_model', 'alr_mobile', $alrcode); ?></h6></td>
      </tr><tr>
        <td><h6>ศักยภาพหรือสิ่งที่ท่านพร้อม</h6></td>
        <td><h6><?php  echo getParcel('alr_proten', 'alr_mobile', $alrcode); ?></h6></td>
      </tr><tr>
        <td><h6>โครงการที่ท่านต้องการมากที่สุด</h6></td>
        <td><h6><?php  echo getParcel('alr_need', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>รายได้หลักจากการใช้ที่ดินแปลงนี้</h6></td>
        <td><h6><?php  echo getParcel('alr_income', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	   <tr>
        <td><h6>ผลผลิตทางการเกษตรจากแปลงนี้ขายโดยช่องทางใด</h6></td>
        <td><h6><?php  echo getParcel('alr_market', 'alr_mobile', $alrcode); ?></h6></td>
      </tr> 
	  <tr>
        <td><h6>รายได้จาการทำการเกษตรในที่ดินแปลงนี้ (บาท/ปี)</h6></td>
        <td><h6><?php  echo getParcel('alr_baht', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	   <tr>
        <td><h6>ต้นทุนจาการทำการเกษตรในที่ดินแปลงนี้ (บาท/ปี)</h6></td>
        <td><h6><?php  echo getParcel('alr_cost', 'alr_mobile', $alrcode); ?></h6></td>
      </tr> 
	  <tr>
        <td><h6>ภาระหนี้สินในปัจจุบัน</h6></td>
        <td><h6><?php  echo getParcel('alr_debt', 'alr_mobile', $alrcode); ?></h6></td>
      </tr> 
	  <tr>
        <td><h6>ประเภทหนี้สิน</h6></td>
        <td><h6><?php  echo getParcel('debt_type', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	   <tr>
        <td><h6>แหล่งเงินกู้</h6></td>
        <td><h6><?php  echo getParcel('debt_sourc', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>จำนวนหนี้สินทั้งหมด (เงินต้น+ดอกเบี้ย) (บาท)</h6></td>
        <td><h6><?php  echo getParcel('debt_cost', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>จำนวนการชำระคืนหนี้ (เงินต้น+ดอกเบี้ย) (บาทต่อปี)</h6></td>
        <td><h6><?php  echo getParcel('debt_pay', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
    </tbody>
  </table>




</div>



<?php closedb(); ?>
</body>
</html>