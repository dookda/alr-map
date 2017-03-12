<!DOCTYPE html>
<html lang="en">

<head>
    <?php
include "../../lib/sel_config.php";
conndb();

	$prov_name = $_GET[province3];
	$amphoe_name = $_GET[amphoe3];
	$tambon_name = $_GET[tambon3];
	$sel_parcel = $_GET[sel_parcel];
	$sel_plant = $_GET[sel_plant];
	$sel_r = $_GET[sel_r];
	$sel_m = $_GET[sel_m];
	$sel_s = $_GET[sel_s];
	$sel_c = $_GET[sel_c];
	$sel_lu = $_GET[sel_lu];
	$sel_dru = $_GET[sel_dru];
	$sel_flo = $_GET[sel_flo];
	$sel_hcr = $_GET[sel_hcr];
	
	
	
?>
        <meta charset="utf-8">
        <meta name="keyword" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ALR</title>

        <!-- start: Css -->
        <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

        <!-- plugins -->
        <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css" />
        <link href="asset/css/style.css" rel="stylesheet">
        <!-- end: Css -->


</head>

<body>

    <!-- start:content -->
    <div class="col-md-12 " style="margin-top:20px;">

        <?php if ($sel_parcel == '1'){}else{echo "<!--";} ?>

        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading-white panel-heading">
                    <h4>จำนวนแปลง ส.ป.ก. ของแต่ละพื้นที่</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <canvas class="bar-chart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($sel_parcel == '1'){}else{echo "-->";} ?>



        <?php if ($sel_plant == '1'){}else{echo "<!--";} ?>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading-white panel-heading">
                    <h4>จำนวนแปลงที่ปลูกพืชแต่ละชนิดของ ส.ป.ก.</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <canvas class="bar-chart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($sel_plant == '1'){}else{echo "-->";} ?>


        <?php if ($sel_lu == '1'){}else{echo "<!--";} ?>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading-white panel-heading text-center">
                    <h4>การใช้ประโยชน์ที่ดิน</h4>
                </div>
                <div class="panel-body">
                    <center>
                        <canvas class="bar-chart3"></canvas>
                    </center>
                </div>
            </div>
        </div>
        <?php if ($sel_lu == '1'){}else{echo "-->";} ?>



        <?php if ($sel_r == '1'){}else{echo "<!--";} ?>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading-white panel-heading text-center">
                    <h4>สัดส่วนพื้นที่เหมาะสมในการปลูกข้าว</h4>
                </div>
                <div class="panel-body">
                    <center>
                        <canvas class="pie-chart1"></canvas>
                    </center>
                </div>
            </div>
        </div>
        <?php if ($sel_r == '1'){}else{echo "-->";} ?>

        <?php if ($sel_m == '1'){}else{echo "<!--";} ?>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading-white panel-heading text-center">
                    <h4>สัดส่วนพื้นที่เหมาะสมในการปลูกข้าวโพด</h4>
                </div>
                <div class="panel-body">
                    <center>
                        <canvas class="pie-chart2"></canvas>
                    </center>
                </div>
            </div>
        </div>
        <?php if ($sel_m == '1'){}else{echo "-->";} ?>

        <?php if ($sel_c == '1'){}else{echo "<!--";} ?>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading-white panel-heading text-center">
                    <h4>สัดส่วนพื้นที่เหมาะสมในการปลูกมันสำปะหลัง</h4>
                </div>
                <div class="panel-body">
                    <center>
                        <canvas class="pie-chart3"></canvas>
                    </center>
                </div>
            </div>
        </div>
        <?php if ($sel_c == '1'){}else{echo "-->";} ?>

        <?php if ($sel_s == '1'){}else{echo "<!--";} ?>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading-white panel-heading text-center">
                    <h4>สัดส่วนพื้นที่เหมาะสมในการปลูกอ้อย</h4>
                </div>
                <div class="panel-body">
                    <center>
                        <canvas class="pie-chart4"></canvas>
                    </center>
                </div>
            </div>
        </div>
        <?php if ($sel_s == '1'){}else{echo "-->";} ?>

        <?php if ($sel_dru == '1'){}else{echo "<!--";} ?>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading-white panel-heading text-center">
                    <h4>พื้นที่เสี่ยงแล้ง</h4>
                </div>
                <div class="panel-body">
                    <center>
                        <canvas class="line-chart1"></canvas>
                    </center>
                </div>
            </div>
        </div>
        <?php if ($sel_dru == '1'){}else{echo "-->";} ?>

        <?php if ($sel_flo == '1'){}else{echo "<!--";} ?>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading-white panel-heading text-center">
                    <h4>พื้นที่น้ำท่วมซ้ำซาก</h4>
                </div>
                <div class="panel-body">
                    <center>
                        <canvas class="line-chart2"></canvas>
                    </center>
                </div>
            </div>
        </div>
        <?php if ($sel_flo == '1'){}else{echo "-->";} ?>

        <?php if ($sel_hcr == '1'){}else{echo "<!--";} ?>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading-white panel-heading text-center">
                    <h4>ระยะห่างจาก รพ.สต.</h4>
                </div>
                <div class="panel-body">
                    <center>
                        <canvas class="line-chart3"></canvas>
                    </center>
                </div>
            </div>
        </div>
        <?php if ($sel_hcr == '1'){}else{echo "-->";} ?>



    </div>
    <!-- end: content -->


    <!-- end: Content -->
    <!-- start: Javascript -->
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/jquery.ui.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>

    <!-- plugins -->
    <script src="asset/js/plugins/chart.min.js"></script>

    <!-- custom -->
    <script type="text/javascript">
        (function(jQuery) {


            <?php if ($sel_parcel == '1'){}else{echo "/*";} ?>
            var barData1 = {
                labels: [
                    <?php 
			 
		if($sel_parcel == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT prov_nam_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
group by prov_nam_t
order by sumpoint DESC limit 10;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT amp_nam_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name' 
group by amp_nam_t
order by sumpoint DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT tam_nam_t as name_bar,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' 
group by tam_nam_t
order by sumpoint DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT tam_nam_t as name_bar,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'
group by tam_nam_t
order by sumpoint DESC;");
						 
				   }
			
		  }
				while ($arr = pg_fetch_array($result))	
										
										{ ?>

                    "<?php echo $arr[name_bar]; ?>", <?php } ?>


                ],
                datasets: [{
                    label: "My Second dataset",
                    fillColor: "rgba(21,113,186,0.5)",
                    strokeColor: "rgba(151,187,205,0.8)",
                    highlightFill: "rgba(151,187,205,0.75)",
                    highlightStroke: "rgba(151,187,205,1)",
                    data: [
                        <?php 
						
						
				if($sel_parcel == '1'){ 		
		  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT prov_nam_t ,count(*) as sumpoint 
FROM alr_parcel 
group by prov_nam_t
order by sumpoint DESC limit 10;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT amp_nam_t as nam_ ,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name' 
group by amp_nam_t
order by sumpoint DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT tam_nam_t as name_bar,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' 
group by tam_nam_t
order by sumpoint DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT tam_nam_t as name_bar,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'
group by tam_nam_t
order by sumpoint DESC;");
						 
				   }
		   }
				while ($arr = pg_fetch_array($result))
										
										{ ?>
                        <?php echo $arr[sumpoint]; ?>, <?php } ?>

                    ]
                }]
            };

            <?php if ($sel_parcel == '1'){}else{echo "*/";} ?>


            <?php if ($sel_plant == '1'){}else{echo "/*";} ?>
            var barData2 = {
                labels: [
                    <?php 
				
		  	if($sel_plant == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query( "
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				   }
			}
				while ($arr = pg_fetch_array($result))
										
										{ ?>

                    "<?php echo $arr[name_bar]; ?>", <?php } ?>


                ],
                datasets: [{
                    label: "My Second dataset",
                    fillColor: "rgba(21,113,186,0.5)",
                    strokeColor: "rgba(151,187,205,0.8)",
                    highlightFill: "rgba(151,187,205,0.75)",
                    highlightStroke: "rgba(151,187,205,1)",
                    data: [
                        <?php 
		  
		  	if($sel_plant == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query( "
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				   }
			}
				while ($arr = pg_fetch_array($result))
										
										{ ?>
                        <?php echo $arr[sumpoint]; ?>, <?php } ?>

                    ]
                }]
            };

            <?php if ($sel_plant == '1'){}else{echo "*/";} ?>


            <?php if ($sel_lu == '1'){}else{echo "/*";} ?>
            var barData3 = {
                labels: [
                    <?php 
			if($sel_lu == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT lu57_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
group by lu57_t
order by sumpoint DESC limit 10;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT lu57_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name' 
group by lu57_t
order by sumpoint DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT lu57_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' 
group by lu57_t
order by sumpoint DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT lu57_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'
group by lu57_t
order by sumpoint DESC;");
						 
				   }
			}
				while ($arr = pg_fetch_array($result))
										
										{ ?>

                    "<?php echo $arr[name_bar]; ?>", <?php } ?>


                ],
                datasets: [{
                    label: "My Second dataset",
                    fillColor: "rgba(21,113,186,0.5)",
                    strokeColor: "rgba(151,187,205,0.8)",
                    highlightFill: "rgba(151,187,205,0.75)",
                    highlightStroke: "rgba(151,187,205,1)",
                    data: [
                        <?php 
		  
			if($sel_lu == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT lu57_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
group by lu57_t
order by sumpoint DESC limit 10;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT lu57_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name' 
group by lu57_t
order by sumpoint DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT lu57_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' 
group by lu57_t
order by sumpoint DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT lu57_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'
group by lu57_t
order by sumpoint DESC;");
						 
				   }
			}
				while ($arr = pg_fetch_array($result))
										
										{ ?>
                        <?php echo $arr[sumpoint]; ?>, <?php } ?>

                    ]
                }]
            };

            <?php if ($sel_lu == '1'){}else{echo "*/";} ?>



            <?php if ($sel_r == '1'){}else{echo "/*";} ?>
            var doughnutData1 = [{
                <?php 
		  if($sel_r == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where r_suit = 'เหมาะสม'
group by r_suit
order by r_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and r_suit = 'เหมาะสม'
group by r_suit
order by r_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and r_suit = 'เหมาะสม'
group by r_suit
order by r_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and r_suit = 'เหมาะสม'
group by r_suit
order by r_suit desc;");
						 
				   }
				   
				
				   
		 
		  $arr = pg_fetch_array($result); } if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}
		  ?>

                value: <?php echo $arr[sumpoint]; ?>,
                color: "#6cff4c",
                highlight: "#6cff4c",
                label: "เหมาะสม"


            }, {
                <?php 
		  
		  if($sel_r == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where r_suit = 'ไม่ค่อยเหมาะสม'
group by r_suit
order by r_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and r_suit = 'ไม่ค่อยเหมาะสม'
group by r_suit
order by r_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and r_suit ='ไม่ค่อยเหมาะสม'
group by r_suit
order by r_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and r_suit = 'ไม่ค่อยเหมาะสม'
group by r_suit
order by r_suit desc;");
						 
				   }
		 
		  $arr = pg_fetch_array($result);} if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}
		  
		  ?>

                value: <?php echo $arr[sumpoint]; ?>,
                color: "#ffed32",
                highlight: "#ffed32",
                label: "ไม่ค่อยเหมาะสม"


            }, {
                <?php 
		  
		  if($sel_r == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where r_suit = 'ไม่เหมาะสม'
group by r_suit
order by r_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and r_suit ='ไม่เหมาะสม'
group by r_suit
order by r_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and r_suit ='ไม่เหมาะสม'
group by r_suit
order by r_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and r_suit = 'ไม่เหมาะสม'
group by r_suit
order by r_suit desc;");
						 
				   }
		 
		  $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}
		  ?>

                value: <?php echo $arr[sumpoint]; ?>,
                color: "#ff4c4c",
                highlight: "#ff4c4c",
                label: "ไม่เหมาะสม"


            }, {
                <?php 
		  
		  if($sel_r == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where r_suit = 'ไม่มีข้อมูล'
group by r_suit
order by r_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and r_suit ='ไม่มีข้อมูล'
group by r_suit
order by r_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and r_suit ='ไม่มีข้อมูล'
group by r_suit
order by r_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and r_suit = 'ไม่มีข้อมูล'
group by r_suit
order by r_suit desc;");
						 
				   }
		 
		  $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                value: <?php echo $arr[sumpoint]; ?>,
                color: "#2F302F",
                highlight: "#2F302F",
                label: "ไม่มีข้อมูล"
            }];

            <?php if ($sel_r == '1'){}else{echo "*/";} ?>



            <?php if ($sel_m == '1'){}else{echo "/*";} ?>
            var doughnutData2 = [{
                    <?php 
		   if($sel_m == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where m_suit = 'เหมาะสม'
group by m_suit
order by m_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and m_suit = 'เหมาะสม'
group by m_suit
order by m_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and m_suit = 'เหมาะสม'
group by m_suit
order by m_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and m_suit = 'เหมาะสม'
group by m_suit
order by m_suit desc;");
						 
				   }
		 
		   $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#6cff4c",
                    highlight: "#6cff4c",
                    label: "เหมาะสม"


                }, {
                    <?php 
		  
		   if($sel_m == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where m_suit = 'ไม่ค่อยเหมาะสม'
group by m_suit
order by m_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and m_suit = 'ไม่ค่อยเหมาะสม'
group by m_suit
order by m_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and m_suit ='ไม่ค่อยเหมาะสม'
group by m_suit
order by m_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and m_suit = 'ไม่ค่อยเหมาะสม'
group by m_suit
order by m_suit desc;");
						 
				   }
		 
		   $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#ffed32",
                    highlight: "#ffed32",
                    label: "ไม่ค่อยเหมาะสม"


                }, {
                    <?php 
		  
		   if($sel_m == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where m_suit = 'ไม่เหมาะสม'
group by m_suit
order by m_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and m_suit ='ไม่เหมาะสม'
group by m_suit
order by m_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and m_suit ='ไม่เหมาะสม'
group by m_suit
order by m_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and m_suit = 'ไม่เหมาะสม'
group by m_suit
order by m_suit desc;");
						 
				   }
		 
		   $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#ff4c4c",
                    highlight: "#ff4c4c",
                    label: "ไม่เหมาะสม"


                }, {
                    <?php 
		  
		   if($sel_m == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where m_suit = 'ไม่มีข้อมูล'
group by m_suit
order by m_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and m_suit ='ไม่มีข้อมูล'
group by m_suit
order by m_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and m_suit ='ไม่มีข้อมูล'
group by m_suit
order by m_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and m_suit = 'ไม่มีข้อมูล'
group by m_suit
order by m_suit desc;");
						 
				   }
		 
		   $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#2F302F",
                    highlight: "#2F302F",
                    label: "ไม่มีข้อมูล"
                }

            ];
            <?php if ($sel_m == '1'){}else{echo "*/";} ?>



            <?php if ($sel_c == '1'){}else{echo "/*";} ?>
            var doughnutData3 = [{
                    <?php 
		   if($sel_c == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where c_suit = 'เหมาะสม'
group by c_suit
order by c_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and c_suit = 'เหมาะสม'
group by c_suit
order by c_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and c_suit = 'เหมาะสม'
group by c_suit
order by c_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and c_suit = 'เหมาะสม'
group by c_suit
order by c_suit desc;");
						 
				   }
		 
		   $arr = pg_fetch_array($result); } if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#6cff4c",
                    highlight: "#6cff4c",
                    label: "<?php echo $arr[suit]; ?>"


                }, {
                    <?php 
		  	   if($sel_c == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where c_suit = 'ไม่ค่อยเหมาะสม'
group by c_suit
order by c_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and c_suit = 'ไม่ค่อยเหมาะสม'
group by c_suit
order by c_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and c_suit ='ไม่ค่อยเหมาะสม'
group by c_suit
order by c_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and c_suit = 'ไม่ค่อยเหมาะสม'
group by c_suit
order by c_suit desc;");
						 
				   }
		 
			   $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#ffed32",
                    highlight: "#ffed32",
                    label: "<?php echo $arr[suit]; ?>"


                }, {
                    <?php 
		  	   if($sel_c == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where c_suit = 'ไม่เหมาะสม'
group by c_suit
order by c_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and c_suit ='ไม่เหมาะสม'
group by c_suit
order by c_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and c_suit ='ไม่เหมาะสม'
group by c_suit
order by c_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and c_suit = 'ไม่เหมาะสม'
group by c_suit
order by c_suit desc;");
						 
				   }
		 
			   $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#ff4c4c",
                    highlight: "#ff4c4c",
                    label: "<?php echo $arr[suit]; ?>"


                }, {
                    <?php 
		  	   if($sel_c == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where c_suit = 'ไม่มีข้อมูล'
group by c_suit
order by c_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and c_suit ='ไม่มีข้อมูล'
group by c_suit
order by c_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and c_suit ='ไม่มีข้อมูล'
group by c_suit
order by c_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and c_suit = 'ไม่มีข้อมูล'
group by c_suit
order by c_suit desc;");
						 
				   }
		 
			   $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#2F302F",
                    highlight: "#2F302F",
                    label: "<?php echo $arr[suit]; ?>"
                }

            ];
            <?php if ($sel_c == '1'){}else{echo "*/";} ?>



            <?php if ($sel_s == '1'){}else{echo "/*";} ?>
            var doughnutData4 = [{
                    <?php 
		  	   if($sel_s == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where s_suit = 'เหมาะสม'
group by s_suit
order by s_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and s_suit = 'เหมาะสม'
group by s_suit
order by s_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and s_suit = 'เหมาะสม'
group by s_suit
order by s_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and s_suit = 'เหมาะสม'
group by s_suit
order by s_suit desc;");
						 
				   }
		 
			   $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#6cff4c",
                    highlight: "#6cff4c",
                    label: "<?php echo $arr[suit]; ?>"


                }, {
                    <?php 
		   	   if($sel_s == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where s_suit = 'ไม่ค่อยเหมาะสม'
group by s_suit
order by s_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and s_suit = 'ไม่ค่อยเหมาะสม'
group by s_suit
order by s_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and s_suit ='ไม่ค่อยเหมาะสม'
group by s_suit
order by s_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and s_suit = 'ไม่ค่อยเหมาะสม'
group by s_suit
order by s_suit desc;");
						 
				   }
		 
			   $arr = pg_fetch_array($result);} if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#ffed32",
                    highlight: "#ffed32",
                    label: "<?php echo $arr[suit]; ?>"


                }, {
                    <?php 
		   	   if($sel_s == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where s_suit = 'ไม่เหมาะสม'
group by s_suit
order by s_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and s_suit ='ไม่เหมาะสม'
group by s_suit
order by s_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and s_suit ='ไม่เหมาะสม'
group by s_suit
order by s_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and s_suit = 'ไม่เหมาะสม'
group by s_suit
order by s_suit desc;");
						 
				   }
		 
			   $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#ff4c4c",
                    highlight: "#ff4c4c",
                    label: "<?php echo $arr[suit]; ?>"


                }, {
                    <?php 
		   	   if($sel_s == '1'){  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where s_suit = 'ไม่มีข้อมูล'
group by s_suit
order by s_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name'  and s_suit ='ไม่มีข้อมูล'
group by s_suit
order by s_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and s_suit ='ไม่มีข้อมูล'
group by s_suit
order by s_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'and s_suit = 'ไม่มีข้อมูล'
group by s_suit
order by s_suit desc;");
						 
				   }
		 
			   $arr = pg_fetch_array($result); }if($arr[sumpoint] == ''){$arr[sumpoint] = 0;}?>

                    value: <?php echo $arr[sumpoint]; ?>,
                    color: "#2F302F",
                    highlight: "#2F302F",
                    label: "<?php echo $arr[suit]; ?>"
                }

            ];
            <?php if ($sel_s == '1'){}else{echo "*/";} ?>



            <?php if ($sel_dru == '1'){}else{echo "/*";} ?>
            var lineChartData1 = {
                labels: [<?php 
				
		  	if($sel_dru == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT dru as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
group by dru
order by dru DESC;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT dru as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' 
group by dru
order by dru DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query( "
SELECT dru as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  
group by dru
order by dru DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT dru as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  
group by dru
order by dru DESC;");
						 
				   }
			}
				while ($arr = pg_fetch_array($result))
										
										{ ?>
                    "<?php echo $arr[name_bar]; ?>", <?php } ?>
                ],
                datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(21,186,103,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [<?php 
				
		  	if($sel_dru == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT dru as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
group by dru
order by dru DESC;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT dru as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and dru IS NOT NULL
group by dru
order by dru DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query( "
SELECT dru as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  and dru IS NOT NULL
group by dru
order by dru DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT dru as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  and dru IS NOT NULL
group by dru
order by dru DESC;");
						 
				   }
			}
				while ($arr = pg_fetch_array($result))
										
										{ ?>
                        <?php echo $arr[sumpoint]; ?>, <?php } ?>
                    ]
                }]
            };

            <?php if ($sel_dru == '1'){}else{echo "*/";} ?>



            <?php if ($sel_flo == '1'){}else{echo "/*";} ?>

            var lineChartData2 = {
                labels: [<?php 
				
		  	if($sel_flo == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
group by flo
order by flo DESC;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' 
group by flo
order by flo DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  
group by flo
order by flo DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  
group by flo
order by flo DESC;");
						 
				   }
			}
				while ($arr = pg_fetch_array($result))
										
										{ ?>
                    "<?php echo $arr[name_bar]; ?>", <?php } ?>
                ],
                datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(21,186,103,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [<?php 
				
		  	if($sel_flo == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
group by flo
order by flo DESC;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }
			}
				while ($arr = pg_fetch_array($result))
										
										{ ?>
                        <?php echo $arr[sumpoint]; ?>, <?php } ?>
                    ]
                }]
            };

            <?php if ($sel_flo == '1'){}else{echo "*/";} ?>



            <?php if ($sel_hcr == '1'){}else{echo "/*";} ?>

            var lineChartData3 = {
                labels: ["0-3 กิโลเมตร", "3-6 กิโลเมตร", "6-9 กิโลเมตร", "9-12 กิโลเมตร", "12 กิโลเมตรขึ้นไป", ],
                datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(21,186,103,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [<?php 
				
		  	if($sel_hcr == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT count(*) as sumpoint 
FROM alr_parcel 
where hcr_km between 0 and 2.99;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }
			}
				$arr = pg_fetch_array($result); 
				echo $arr[sumpoint];
				?>, <?php 
				
		  	if($sel_hcr == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT count(*) as sumpoint 
FROM alr_parcel 
where hcr_km between 3 and 5.99;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }
			}
				$arr = pg_fetch_array($result); 
				echo $arr[sumpoint];
				?>, <?php 
				
		  	if($sel_hcr == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT count(*) as sumpoint 
FROM alr_parcel 
where hcr_km between 6 and 8.99;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }
			}
				$arr = pg_fetch_array($result); 
				echo $arr[sumpoint];
				?>, <?php 
				
		  	if($sel_hcr == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT count(*) as sumpoint 
FROM alr_parcel 
where hcr_km between 9 and 11.99;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }
			}
				$arr = pg_fetch_array($result); 
				echo $arr[sumpoint];
				?>, <?php 
				
		  	if($sel_hcr == '1'){ 
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT count(*) as sumpoint 
FROM alr_parcel 
where hcr_km >= 12;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT flo as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  and flo IS NOT NULL
group by flo
order by flo DESC;");
						 
				   }
			}
				$arr = pg_fetch_array($result); 
				echo $arr[sumpoint];
				?>]
                }]
            };

            <?php if ($sel_hcr == '1'){}else{echo "*/";} ?>




            window.onload = function() {



                <?php if ($sel_parcel == '1'){}else{echo "/*";} ?>

                var ctx1 = $(".bar-chart1")[0].getContext("2d");
                window.myBar = new Chart(ctx1).Bar(barData1, {
                    responsive: true,
                    showTooltips: true
                });
                <?php if ($sel_parcel == '1'){}else{echo "*/";} ?>


                <?php if ($sel_plant == '1'){}else{echo "/*";} ?>
                var ctx2 = $(".bar-chart2")[0].getContext("2d");
                window.myBar = new Chart(ctx2).Bar(barData2, {
                    responsive: true,
                    showTooltips: true
                });
                <?php if ($sel_plant == '1'){}else{echo "*/";} ?>


                <?php if ($sel_lu == '1'){}else{echo "/*";} ?>
                var ctx7 = $(".bar-chart3")[0].getContext("2d");
                window.myBar = new Chart(ctx7).Bar(barData3, {
                    responsive: true,
                    showTooltips: true
                });
                <?php if ($sel_lu == '1'){}else{echo "*/";} ?>


                <?php if ($sel_r == '1'){}else{echo "/*";} ?>
                var ctx3 = $(".pie-chart1")[0].getContext("2d");
                window.myPie = new Chart(ctx3).Pie(doughnutData1, {
                    responsive: true,
                    showTooltips: true
                });
                <?php if ($sel_r == '1'){}else{echo "*/";} ?>



                <?php if ($sel_m == '1'){}else{echo "/*";} ?>
                var ctx4 = $(".pie-chart2")[0].getContext("2d");
                window.myPie = new Chart(ctx4).Pie(doughnutData2, {
                    responsive: true,
                    showTooltips: true
                });
                <?php if ($sel_m == '1'){}else{echo "*/";} ?>



                <?php if ($sel_c == '1'){}else{echo "/*";} ?>
                var ctx5 = $(".pie-chart3")[0].getContext("2d");
                window.myPie = new Chart(ctx5).Pie(doughnutData3, {
                    responsive: true,
                    showTooltips: true
                });
                <?php if ($sel_c == '1'){}else{echo "*/";} ?>



                <?php if ($sel_s == '1'){}else{echo "/*";} ?>
                var ctx6 = $(".pie-chart4")[0].getContext("2d");
                window.myPie = new Chart(ctx6).Pie(doughnutData4, {
                    responsive: true,
                    showTooltips: true
                });

                <?php if ($sel_s == '1'){}else{echo "*/";} ?>


                <?php if ($sel_dru == '1'){}else{echo "/*";} ?>
                var ctx8 = $(".line-chart1")[0].getContext("2d");
                window.myLine = new Chart(ctx8).Line(lineChartData1, {
                    responsive: true,
                    showTooltips: true
                });
                <?php if ($sel_dru == '1'){}else{echo "*/";} ?>


                <?php if ($sel_flo == '1'){}else{echo "/*";} ?>
                var ctx9 = $(".line-chart2")[0].getContext("2d");
                window.myLine = new Chart(ctx9).Line(lineChartData2, {
                    responsive: true,
                    showTooltips: true
                });
                <?php if ($sel_flo == '1'){}else{echo "*/";} ?>


                <?php if ($sel_hcr == '1'){}else{echo "/*";} ?>
                var ctx10 = $(".line-chart3")[0].getContext("2d");
                window.myLine = new Chart(ctx10).Line(lineChartData3, {
                    responsive: true,
                    showTooltips: true
                });
                <?php if ($sel_hcr == '1'){}else{echo "*/";} ?>



            };
        })(jQuery);
    </script>
    <!-- end: Javascript -->
</body>

</html>