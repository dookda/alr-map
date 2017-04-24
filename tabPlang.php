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
  <h4>ข้อมูลแปลงที่ดิน</h4>


<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><h6>เนื้อที่แปลงนี้ทั้งหมด (ไร่)</h6></td>
        <td><h6><?php  echo getParcel('alr_all_r', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>เนื้อที่แปลงนี้ทั้งหมด (งาน)</h6></td>
        <td><h6><?php  echo getParcel('alr_all_n', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>เนื้อที่แปลงนี้ทั้งหมด (วา)</h6></td>
        <td><h6><?php  echo getParcel('alr_all_w', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>เนื้อที่อยู่อาศัย (ไร่)</h6></td>
        <td><h6><?php  echo getParcel('alr_house_r', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>เนื้อที่อยู่อาศัย (งาน)</h6></td>
        <td><h6><?php  echo getParcel('alr_house_n', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>เนื้อที่อยู่อาศัย (วา)</h6></td>
        <td><h6><?php  echo getParcel('alr_house_w', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาขายที่ดิน ส.ป.ก. (บาทต่อไร่)</h6></td>
        <td><h6><?php  echo getParcel('alr_sale', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาขายที่ดินเอกสารสิทธิ์อื่นๆ  (บาทต่อไร่)</h6></td>
        <td><h6><?php  echo getParcel('other_sale', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ค่าเช่าที่ดิน ส.ป.ก.  (บาทต่อไร่)</h6></td>
        <td><h6><?php  echo getParcel('alr_rent', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ค่าเช่าที่ดินเอกสารสิทธิ์อื่นๆ  (บาทต่อไร่)</h6></td>
        <td><h6><?php  echo getParcel('other_rent', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  
	  
    </tbody>
  </table>




</div>



<?php closedb(); ?>
</body>
</html>