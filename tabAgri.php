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
  <h4>ข้อมูลการทำการเกษตร</h4>


<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><h6>การใช้ที่ดิน (ระดับ 1)</h6></td>
        <td><h6><?php  echo getParcel('lu_name1', 'alr_lu57_4326', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>การใช้ที่ดิน (ระดับ 2)</h6></td>
        <td><h6><?php  echo getParcel('lu_name2', 'alr_lu57_4326', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>การใช้ที่ดิน (ระดับ 3)</h6></td>
        <td><h6><?php  echo getParcel('lu_name3', 'alr_lu57_4326', $alrcode); ?></h6></td>
      </tr>
    </tbody>
  </table>
<hr color=red>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td><h6>ชื่อพืช 1</h6></td>
        <td><h6><?php  echo getParcel('c1_name', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>จำนวนเนื้อที่ที่ใช้ปลูก (ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c1_rai', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>วันเดือนปีที่ปลูก</h6></td>
        <td><h6><?php  echo getParcel('c1_grow', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>วันที่เริ่มเก็บเกี่ยวผลผลิตได้</h6></td>
        <td><h6><?php  echo getParcel('c1_har', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ปริมาณผลผลิตที่เคยได้ใน 2-3 ปีที่ผ่านมา (กก./ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c1_yield', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนเมล็ดพันธุ์ (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c1_seed', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนปุ๋ยเคมี (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c1_fert', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนสารเคมีป้องกันและกำจัดศัตรูพืช  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c1_chem', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c1_labor', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าเช่าเครื่องจักรกลการเกษตร  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c1_rent', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c1_gas', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c1_inc', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c1_incp', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ขายผลผลิตในลักษณะใด</h6></td>
        <td><h6><?php  echo getParcel('c1_sale', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>มีการใช้พันธุ์ส่งเสริมเพาะปลูก (มี/ไม่มี)</h6></td>
        <td><h6><?php  echo getParcel('c1_prom', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>มีการใช้ปุ๋ยธรรมชาติร่วมกับปุ๋ยเคมี (มี/ไม่มี)</h6></td>
        <td><h6><?php  echo getParcel('c1_orga', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
    </tbody>
  </table>
   <hr color=red>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td><h6>ชื่อพืช 2</h6></td>
        <td><h6><?php  echo getParcel('c2_name', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>จำนวนเนื้อที่ที่ใช้ปลูก (ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c2_rai', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>วันเดือนปีที่ปลูก</h6></td>
        <td><h6><?php  echo getParcel('c2_grow', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>วันที่เริ่มเก็บเกี่ยวผลผลิตได้</h6></td>
        <td><h6><?php  echo getParcel('c2_har', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ปริมาณผลผลิตที่เคยได้ใน 2-3 ปีที่ผ่านมา (กก./ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c2_yield', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนเมล็ดพันธุ์ (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c2_seed', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนปุ๋ยเคมี (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c2_fert', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนสารเคมีป้องกันและกำจัดศัตรูพืช  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c2_chem', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c2_labor', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าเช่าเครื่องจักรกลการเกษตร  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c2_rent', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c2_gas', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c2_inc', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c2_incp', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ขายผลผลิตในลักษณะใด</h6></td>
        <td><h6><?php  echo getParcel('c2_sale', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>มีการใช้พันธุ์ส่งเสริมเพาะปลูก (มี/ไม่มี)</h6></td>
        <td><h6><?php  echo getParcel('c2_prom', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>มีการใช้ปุ๋ยธรรมชาติร่วมกับปุ๋ยเคมี (มี/ไม่มี)</h6></td>
        <td><h6><?php  echo getParcel('c2_orga', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
    </tbody>
  </table>
  <hr color=red>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td><h6>ชื่อพืช 3</h6></td>
        <td><h6><?php  echo getParcel('c3_name', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>จำนวนเนื้อที่ที่ใช้ปลูก (ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c3_rai', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>วันเดือนปีที่ปลูก</h6></td>
        <td><h6><?php  echo getParcel('c3_grow', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>วันที่เริ่มเก็บเกี่ยวผลผลิตได้</h6></td>
        <td><h6><?php  echo getParcel('c3_har', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ปริมาณผลผลิตที่เคยได้ใน 2-3 ปีที่ผ่านมา (กก./ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c3_yield', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนเมล็ดพันธุ์ (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c3_seed', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนปุ๋ยเคมี (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c3_fert', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนสารเคมีป้องกันและกำจัดศัตรูพืช  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c3_chem', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c3_labor', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าเช่าเครื่องจักรกลการเกษตร  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c3_rent', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c3_gas', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c3_inc', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/ไร่)</h6></td>
        <td><h6><?php  echo getParcel('c3_incp', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ขายผลผลิตในลักษณะใด</h6></td>
        <td><h6><?php  echo getParcel('c3_sale', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>มีการใช้พันธุ์ส่งเสริมเพาะปลูก (มี/ไม่มี)</h6></td>
        <td><h6><?php  echo getParcel('c3_prom', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>มีการใช้ปุ๋ยธรรมชาติร่วมกับปุ๋ยเคมี (มี/ไม่มี)</h6></td>
        <td><h6><?php  echo getParcel('c3_orga', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
    </tbody>
  </table>
  <hr color=red>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td><h6>ประมงชนิดที่  1</h6></td>
        <td><h6><?php  echo getParcel('f1_name', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>จำนวนเนื้อที่ที่ใช้ (ไร่)</h6></td>
        <td><h6><?php  echo getParcel('f1_rai', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ระยะเวลาที่ใช้ผลิตฝเลี้ยงดู (เดือน)</h6></td>
        <td><h6><?php  echo getParcel('f1_time', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>จำนวนสัตว์น้ำ (ตัว)</h6></td>
        <td><h6><?php  echo getParcel('f1_count', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าพันธุ์สัตว์ (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f1_breed', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าอาหาร (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f1_feed', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าวัคซีน/โรค (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f1_vac', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f1_labor', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าเช่าเครื่องจักรกล  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f1_rent', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f1_gas', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/กก.)</h6></td>
        <td><h6><?php  echo getParcel('f1_inc', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/กก.)</h6></td>
        <td><h6><?php  echo getParcel('f1_incp', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ขายผลผลิตในลักษณะใด</h6></td>
        <td><h6><?php  echo getParcel('f1_ptyp', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>มีการใช้พันธุ์ส่งเสริม (มี/ไม่มี)</h6></td>
        <td><h6><?php  echo getParcel('f1_prom', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>  
    </tbody>
  </table>
  <hr color=red>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td><h6>ประมงชนิดที่  2</h6></td>
        <td><h6><?php  echo getParcel('f2_name', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>จำนวนเนื้อที่ที่ใช้ (ไร่)</h6></td>
        <td><h6><?php  echo getParcel('f2_rai', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ระยะเวลาที่ใช้ผลิตฝเลี้ยงดู (เดือน)</h6></td>
        <td><h6><?php  echo getParcel('f2_time', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>จำนวนสัตว์น้ำ (ตัว)</h6></td>
        <td><h6><?php  echo getParcel('f2_count', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าพันธุ์สัตว์ (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f2_breed', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าอาหาร (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f2_feed', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าวัคซีน/โรค (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f2_vac', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f2_labor', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าเช่าเครื่องจักรกล  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f2_rent', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('f2_gas', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/กก.)</h6></td>
        <td><h6><?php  echo getParcel('f2_inc', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/กก.)</h6></td>
        <td><h6><?php  echo getParcel('f2_incp', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ขายผลผลิตในลักษณะใด</h6></td>
        <td><h6><?php  echo getParcel('f2_ptyp', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>มีการใช้พันธุ์ส่งเสริม (มี/ไม่มี)</h6></td>
        <td><h6><?php  echo getParcel('f2_prom', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>  
    </tbody>
  </table>
  <hr color=red>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td><h6>ปศุสัตว์ชนิดที่ 1</h6></td>
        <td><h6><?php  echo getParcel('l1_name', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>จำนวนเนื้อที่ที่ใช้ (ไร่)</h6></td>
        <td><h6><?php  echo getParcel('l1_rai', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ระยะเวลาที่ใช้ผลิตฝเลี้ยงดู (เดือน)</h6></td>
        <td><h6><?php  echo getParcel('l1_time', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>จำนวนสัตว์ (ตัว)</h6></td>
        <td><h6><?php  echo getParcel('l1_count', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าพันธุ์สัตว์ (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l1_breed', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าอาหาร (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l1_feed', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าวัคซีน/โรค (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l1_vac', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l1_labor', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าเช่าเครื่องจักรกล  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l1_rent', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l1_gas', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/กก.)</h6></td>
        <td><h6><?php  echo getParcel('l1_inc', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/กก.)</h6></td>
        <td><h6><?php  echo getParcel('l1_incp', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ขายผลผลิตในลักษณะใด</h6></td>
        <td><h6><?php  echo getParcel('l1_ptyp', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>มีการใช้พันธุ์ส่งเสริม (มี/ไม่มี)</h6></td>
        <td><h6><?php  echo getParcel('l1_prom', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>  
    </tbody>
  </table>
  <hr color=red>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td><h6>ปศุสัตว์ชนิดที่ 2</h6></td>
        <td><h6><?php  echo getParcel('l2_name', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>จำนวนเนื้อที่ที่ใช้ (ไร่)</h6></td>
        <td><h6><?php  echo getParcel('l2_rai', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
      <tr>
        <td><h6>ระยะเวลาที่ใช้ผลิตฝเลี้ยงดู (เดือน)</h6></td>
        <td><h6><?php  echo getParcel('l2_time', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>จำนวนสัตว์ (ตัว)</h6></td>
        <td><h6><?php  echo getParcel('l2_count', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าพันธุ์สัตว์ (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l2_breed', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าอาหาร (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l2_feed', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าวัคซีน/โรค (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l2_vac', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l2_labor', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าเช่าเครื่องจักรกล  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l2_rent', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท)</h6></td>
        <td><h6><?php  echo getParcel('l2_gas', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/กก.)</h6></td>
        <td><h6><?php  echo getParcel('l2_inc', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/กก.)</h6></td>
        <td><h6><?php  echo getParcel('l2_incp', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>ขายผลผลิตในลักษณะใด</h6></td>
        <td><h6><?php  echo getParcel('l2_ptyp', 'alr_mobile', $alrcode); ?></h6></td>
      </tr>
	  <tr>
        <td><h6>มีการใช้พันธุ์ส่งเสริม (มี/ไม่มี)</h6></td>
        <td><h6><?php  echo getParcel('l2_prom', 'alr_mobile', $alrcode); ?></h6></td>
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