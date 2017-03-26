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
  <h3>ข้อมูลการทำการเกษตร</h3>


<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>การใช้ที่ดิน (ระดับ 1)</td>
        <td>#</td>
      </tr>
      <tr>
        <td>การใช้ที่ดิน (ระดับ 2)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>การใช้ที่ดิน (ระดับ 3)</td>
        <td>#</td>
      </tr>
    </tbody>
  </table>
  
<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td>ชื่อพืช 1</td>
        <td>#</td>
      </tr>
      <tr>
        <td>จำนวนเนื้อที่ที่ใช้ปลูก (ไร่)</td>
        <td>#</td>
      </tr>
      <tr>
        <td>วันเดือนปีที่ปลูก</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>วันที่เริ่มเก็บเกี่ยวผลผลิตได้</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ปริมาณผลผลิตที่เคยได้ใน 2-3 ปีที่ผ่านมา (กก./ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนเมล็ดพันธุ์ (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนปุ๋ยเคมี (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนสารเคมีป้องกันและกำจัดศัตรูพืช  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าเช่าเครื่องจักรกลการเกษตร  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ขายผลผลิตในลักษณะใด</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>มีการใช้พันธุ์ส่งเสริมเพาะปลูก (มี/ไม่มี)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>มีการใช้ปุ๋ยธรรมชาติร่วมกับปุ๋ยเคมี (มี/ไม่มี)</td>
        <td>#</td>
      </tr>
    </tbody>
  </table>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td>ชื่อพืช 2</td>
        <td>#</td>
      </tr>
      <tr>
        <td>จำนวนเนื้อที่ที่ใช้ปลูก (ไร่)</td>
        <td>#</td>
      </tr>
      <tr>
        <td>วันเดือนปีที่ปลูก</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>วันที่เริ่มเก็บเกี่ยวผลผลิตได้</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ปริมาณผลผลิตที่เคยได้ใน 2-3 ปีที่ผ่านมา (กก./ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนเมล็ดพันธุ์ (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนปุ๋ยเคมี (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนสารเคมีป้องกันและกำจัดศัตรูพืช  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าเช่าเครื่องจักรกลการเกษตร  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ขายผลผลิตในลักษณะใด</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>มีการใช้พันธุ์ส่งเสริมเพาะปลูก (มี/ไม่มี)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>มีการใช้ปุ๋ยธรรมชาติร่วมกับปุ๋ยเคมี (มี/ไม่มี)</td>
        <td>#</td>
      </tr>
    </tbody>
  </table>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td>ชื่อพืช 3</td>
        <td>#</td>
      </tr>
      <tr>
        <td>จำนวนเนื้อที่ที่ใช้ปลูก (ไร่)</td>
        <td>#</td>
      </tr>
      <tr>
        <td>วันเดือนปีที่ปลูก</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>วันที่เริ่มเก็บเกี่ยวผลผลิตได้</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ปริมาณผลผลิตที่เคยได้ใน 2-3 ปีที่ผ่านมา (กก./ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนเมล็ดพันธุ์ (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนปุ๋ยเคมี (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนสารเคมีป้องกันและกำจัดศัตรูพืช  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าเช่าเครื่องจักรกลการเกษตร  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/ไร่)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ขายผลผลิตในลักษณะใด</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>มีการใช้พันธุ์ส่งเสริมเพาะปลูก (มี/ไม่มี)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>มีการใช้ปุ๋ยธรรมชาติร่วมกับปุ๋ยเคมี (มี/ไม่มี)</td>
        <td>#</td>
      </tr>
    </tbody>
  </table>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td>ประมงชนิดที่  1</td>
        <td>#</td>
      </tr>
      <tr>
        <td>จำนวนเนื้อที่ที่ใช้ (ไร่)</td>
        <td>#</td>
      </tr>
      <tr>
        <td>ระยะเวลาที่ใช้ผลิตฝเลี้ยงดู (เดือน)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>จำนวนสัตว์น้ำ (ตัว)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าพันธุ์สัตว์ (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าอาหาร (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าวัคซีน/โรค (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าเช่าเครื่องจักรกล  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/กก.)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/กก.)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ขายผลผลิตในลักษณะใด</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>มีการใช้พันธุ์ส่งเสริม (มี/ไม่มี)</td>
        <td>#</td>
      </tr>  
    </tbody>
  </table>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td>ประมงชนิดที่  2</td>
        <td>#</td>
      </tr>
      <tr>
        <td>จำนวนเนื้อที่ที่ใช้ (ไร่)</td>
        <td>#</td>
      </tr>
      <tr>
        <td>ระยะเวลาที่ใช้ผลิตฝเลี้ยงดู (เดือน)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>จำนวนสัตว์น้ำ (ตัว)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าพันธุ์สัตว์ (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าอาหาร (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าวัคซีน/โรค (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าเช่าเครื่องจักรกล  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/กก.)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/กก.)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ขายผลผลิตในลักษณะใด</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>มีการใช้พันธุ์ส่งเสริม (มี/ไม่มี)</td>
        <td>#</td>
      </tr>  
    </tbody>
  </table>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td>ปศุสัตว์ชนิดที่ 1</td>
        <td>#</td>
      </tr>
      <tr>
        <td>จำนวนเนื้อที่ที่ใช้ (ไร่)</td>
        <td>#</td>
      </tr>
      <tr>
        <td>ระยะเวลาที่ใช้ผลิตฝเลี้ยงดู (เดือน)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>จำนวนสัตว์ (ตัว)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าพันธุ์สัตว์ (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าอาหาร (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าวัคซีน/โรค (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าเช่าเครื่องจักรกล  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/กก.)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/กก.)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ขายผลผลิตในลักษณะใด</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>มีการใช้พันธุ์ส่งเสริม (มี/ไม่มี)</td>
        <td>#</td>
      </tr>  
    </tbody>
  </table>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อข้อมูล</th>
        <th>ค่าข้อมูล</th>
      </tr>
    </thead>
    <tbody>
	<tr>
        <td>ปศุสัตว์ชนิดที่ 2</td>
        <td>#</td>
      </tr>
      <tr>
        <td>จำนวนเนื้อที่ที่ใช้ (ไร่)</td>
        <td>#</td>
      </tr>
      <tr>
        <td>ระยะเวลาที่ใช้ผลิตฝเลี้ยงดู (เดือน)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>จำนวนสัตว์ (ตัว)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าพันธุ์สัตว์ (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าอาหาร (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าวัคซีน/โรค (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าจ้างแรงงานนอกครัวเรือน  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าเช่าเครื่องจักรกล  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ต้นทุนค่าน้ำมันเชื้อเพลิงและหล่อลื่น  (บาท)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในปีที่ผ่านมา  (บาท/กก.)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ราคาผลผลิตที่ขายได้ในช่วง 2-3 ปีที่ผ่านมา  (บาท/กก.)</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>ขายผลผลิตในลักษณะใด</td>
        <td>#</td>
      </tr>
	  <tr>
        <td>มีการใช้พันธุ์ส่งเสริม (มี/ไม่มี)</td>
        <td>#</td>
      </tr>  
    </tbody>
  </table>
</div>



<?php closedb(); ?>
</body>
</html>