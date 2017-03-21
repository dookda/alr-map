<!DOCTYPE html>
<html lang="en">

<head>
    <?php
include "../../lib/sel_config.php";
conndb();

	$prov_name = $_GET[province2];
	$amphoe_name = $_GET[amphoe2];
	$tambon_name = $_GET[tambon2];
	
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

    <!-- start:content -->
			<?php 
			if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
			 $result1 = pg_query( "
			 SELECT count(*) as sum_alr
			 FROM alr_parcel ;");
			 $sum_a = pg_fetch_array($result1); 
			 $sum_all = $sum_a[sum_alr];
			}
			
			else if ($prov_name != '0' and $amphoe_name == '0'){
			 $result1 = pg_query( "
			 SELECT count(*) as sum_alr
			 FROM alr_parcel
			 where prov_code = '$prov_name' ;");
			 $sum_a = pg_fetch_array($result1); 
			 $sum_all = $sum_a[sum_alr];
			}
			
			else if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
			 $result1 = pg_query( "
			 SELECT count(*) as sum_alr
			 FROM alr_parcel
			 where prov_code = '$prov_name' and amp_code = '$amphoe_name' ;");
			 $sum_a = pg_fetch_array($result1); 
			 $sum_all = $sum_a[sum_alr];
			}
			
			else if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
			 $result1 = pg_query( "
			 SELECT count(*) as sum_alr
			 FROM alr_parcel
			 where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name' ;");
			 $sum_a = pg_fetch_array($result1); 
			 $sum_all = $sum_a[sum_alr];
			}
			?>
			
			<?php 
			if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
			 $result1 = pg_query( "
			 SELECT count(*) as sum_chk
			 FROM alr_parcel
			 where chkdata = '1';");
			 $sum_c = pg_fetch_array($result1); 
			 $sum_chk = $sum_c[sum_chk];
			}
			else if ($prov_name != '0' and $amphoe_name == '0'){
			 $result1 = pg_query( "
			 SELECT count(*) as sum_chk
			 FROM alr_parcel
			 where chkdata = '1' and prov_code = '$prov_name';");
			 $sum_c = pg_fetch_array($result1); 
			 $sum_chk = $sum_c[sum_chk];
			}
			else if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
			 $result1 = pg_query( "
			 SELECT count(*) as sum_chk
			 FROM alr_parcel
			 where chkdata = '1' and prov_code = '$prov_name' and amp_code = '$amphoe_name';");
			 $sum_c = pg_fetch_array($result1); 
			 $sum_chk = $sum_c[sum_chk];
			}
			else if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
			 $result1 = pg_query( "
			 SELECT count(*) as sum_chk
			 FROM alr_parcel
			 where chkdata = '1' and prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name' ;");
			 $sum_c = pg_fetch_array($result1); 
			 $sum_chk = $sum_c[sum_chk];
			}
			 $val =  round($sum_chk*100/$sum_all,2)  ;
			?>
	
			<div class="col-md-12">
			  <h2>อัตราการกรอกข้อมูล</h2>
			  <div class="progress">
				<div class="progress-bar 
				<?php if ($val < 20){
					echo "progress-bar-danger";
				}else if ($val < 70){
					echo "progress-bar-warning";
				}else if ($val <= 100){
					echo "progress-bar-success";
				}

				?> progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo $val ;?>%">
				  <?php  echo $val ;?>% จำนวนแปลงที่กรอก <?php  echo $sum_chk ;?> แปลง
				</div>
			  </div>
			  
				  <table class="table">
					<thead>
					  <tr>
						<th>รายชื่อ</th>
						<th><center>จำนวนแปลงที่กรอก</center></th>
					  </tr>
					</thead>
					<tbody>
					<?php 
			if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
			 $result1 = pg_query( "with ss as (
SELECT prov_code,prov_nam_t, count(*) as sum
FROM alr_parcel 
where chkdata = '1'
group by prov_code,prov_nam_t
)
SELECT alr_parcel.prov_code,alr_parcel.prov_nam_t as name,ss.sum
FROM alr_parcel
left join ss ON alr_parcel.prov_code = ss.prov_code
group by alr_parcel.prov_code,alr_parcel.prov_nam_t,ss.sum ;");
			}
			else if ($prov_name != '0' and $amphoe_name == '0'){
			 $result1 = pg_query( "with ss as (
SELECT amp_code,amp_nam_t , count(*) as sum
FROM alr_parcel 
where chkdata = '1' and prov_code = '$prov_name'
group by amp_code,amp_nam_t
)
SELECT alr_parcel.amp_nam_t  as name,alr_parcel.amp_code,ss.sum
FROM alr_parcel
left join ss ON alr_parcel.amp_code = ss.amp_code
where prov_code = '$prov_name'
group by alr_parcel.amp_nam_t,alr_parcel.amp_code,ss.sum;");
			}
			else if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
			 $result1 = pg_query( "with ss as (
SELECT tam_code,tam_nam_t   , count(*) as sum
FROM alr_parcel 
where chkdata = '1' and prov_code = '$prov_name' and amp_code = '$amphoe_name'
group by  tam_code,tam_nam_t
)
SELECT alr_parcel.tam_nam_t as name,alr_parcel.tam_code,ss.sum
FROM alr_parcel
left join ss ON alr_parcel.tam_code = ss.tam_code
where prov_code = '$prov_name' and amp_code = '$amphoe_name'
group by alr_parcel.tam_nam_t,alr_parcel.tam_code,ss.sum;");
			}
			else if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
			 $result1 = pg_query( "with ss as (
SELECT tam_code,tam_nam_t   , count(*) as sum
FROM alr_parcel 
where chkdata = '1' and prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'
group by  tam_code,tam_nam_t
)
SELECT alr_parcel.tam_nam_t as name,alr_parcel.tam_code,ss.sum
FROM alr_parcel
left join ss ON alr_parcel.tam_code = ss.tam_code
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and alr_parcel.tam_code = '$tambon_name'
group by alr_parcel.tam_nam_t,alr_parcel.tam_code,ss.sum;");
			}
			while ($arr = pg_fetch_array($result1))
										
										{ ?>
					  <tr>
						<td><?php echo $arr[name]; ?></td>
						<td><center><?php echo $arr[sum]; ?></center></td>
					  </tr>
										<?php } ?>
							
					</tbody>
					<thead>
					  <tr>
						<th>จำนวนแปลงทั้งหมดในพื้นที่</th>
						<th><center><?php echo $sum_all; ?></center></th>
					  </tr>
					</thead>
				  </table>
			</div>
	
    <!-- end: content -->


</body>

</html>