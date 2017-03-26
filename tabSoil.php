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
        <td></td>
      </tr>
      <tr>
        <td>ชุดดิน</td>
        <td></td>
      </tr>
      <tr>
        <td>ความเหมาะสมในการปลูกข้าว</td>
        <td><?php  echo getParcel('r_suit', 'alr_parcel_query', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมในการปลูกข้าวโพดเลี้ยงสัตว์</td>
        <td><?php  echo getParcel('m_suit', 'alr_parcel_query', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมในการปลูกมัน</td>
        <td><?php  echo getParcel('c_suit', 'alr_parcel_query', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมในการปลูกอ้อย</td>
        <td><?php  echo getParcel('s_suit', 'alr_parcel_query', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมในการปลูกพืชผัก</td>
        <td><?php  echo getParcel('v_suit', 'alr_parcel_query', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมในการปลูกผลไม้</td>
        <td><?php  echo getParcel('f_suit', 'alr_parcel_query', $alrcode); ?></td>
      </tr>
      <tr>
        <td>ความเหมาะสมในการปลูกทุ่งหญ้าเลี้ยงสัตว์</td>
        <td><?php  echo getParcel('p_suit', 'alr_parcel_query', $alrcode); ?></td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
      </tr>
    </tbody>
  </table>




</div>



<?php closedb(); ?>
</body>
</html>
