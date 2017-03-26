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
        <td>ชื่อ-สกุลเกษตรกรที่ลงทะเบียนใช้ที่ดินแปลงนี้</td>
        <td></td>
      </tr>
      <tr>
        <td>เลขบัตรประชาชน</td>
        <td></td>
      </tr>
      <tr>
        <td>สถานะการถือครอง</td>
        <td>Dooley</td>
      </tr>
	  <tr>
        <td>ศพก.</td>
        <td>Dooley</td>
      </tr>
	  <tr>
        <td>ชุดเกษตรยั่งยืน</td>
        <td>Dooley</td>
      </tr><tr>
        <td>การเป็นเกษตรต้นแบบ</td>
        <td>Dooley</td>
      </tr><tr>
        <td>ศักยภาพหรือสิ่งที่ท่านพร้อม</td>
        <td>Dooley</td>
      </tr><tr>
        <td>โครงการด้านใดที่คิดว่าจำเป็นต่อการทำกินในที่ดิน ส.ป.ก. มากที่สุด</td>
        <td>Dooley</td>
      </tr>
	  <tr>
        <td>รายได้หลักจากการใช้ที่ดินแปลงนี้</td>
        <td>Dooley</td>
      </tr>
	   <tr>
        <td>ผลผลิตทางการเกษตรจากแปลงนี้ขายโดยช่องทางใด</td>
        <td>Dooley</td>
      </tr> 
	  <tr>
        <td>รายได้จาการทำการเกษตรในที่ดินแปลงนี้ (บาท/ปี)</td>
        <td>Dooley</td>
      </tr>
	   <tr>
        <td>ต้นทุนจาการทำการเกษตรในที่ดินแปลงนี้ (บาท/ปี)</td>
        <td>Dooley</td>
      </tr> 
	  <tr>
        <td>ภาระหนี้สินในปัจจุบัน</td>
        <td>Dooley</td>
      </tr> 
	  <tr>
        <td>ประเภทหนี้สิน</td>
        <td>Dooley</td>
      </tr>
	   <tr>
        <td>แหล่งเงินกู้</td>
        <td>Dooley</td>
      </tr>
	  <tr>
        <td>จำนวนหนี้สินทั้งหมด (เงินต้น+ดอกเบี้ย) (บาท)</td>
        <td>Dooley</td>
      </tr>
	  <tr>
        <td>จำนวนการชำระคืนหนี้ (เงินต้น+ดอกเบี้ย) (บาทต่อปี)</td>
        <td>Dooley</td>
      </tr>
    </tbody>
  </table>




</div>



<?php closedb(); ?>
</body>
</html>