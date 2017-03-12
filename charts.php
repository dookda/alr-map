<!doctype html>
<html>

<?php
include "../lib/sel_config.php";
conndb();

	$prov_name = $_GET[prov_name];
	$amphoe_name = $_GET[amphoe_name];
	$tambon_name = $_GET[tambon_name];
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

    <head>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
        <meta charset="UTF-8">
        <script src="js/anychart.min.js"></script>
        <script src="js/anychart-ui.min.js"></script>
        
        <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

    </head>
    <body>
      
<div class="row">


		<?php 
		if ($sel_parcel == '1'){
		}else{
			echo "<!--";} ?>	
			<div class="col-md-12">
				<div id="barchart" style="min-width: 310px; height: 400px; margin: 0 auto"></div> 
			</div>	
		<?php 
		if ($sel_parcel == '1'){
		}else{
			echo "-->";
		} ?>
		
		
		
			
		<?php 
		if ($sel_plant == '1'){
		}else{
			echo "<!--";} ?>
		<div class="col-md-12">	
			<div id="linechart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		</div>
		<?php 
		if ($sel_plant == '1'){
		}else{
			echo "-->";
		} ?>
	
	
		<?php 
		if ($sel_r == '1'){
		}else{
			echo "<!--";} ?>
					<div class="col-md-6">
						<div id="pie1" style="min-width: 100%; height: 400px; max-width: 600px; margin: 0 auto"></div>
					</div>	
		<?php 
		if ($sel_r == '1'){
		}else{
			echo "-->";
		} ?>
		
	<?php 
		if ($sel_m == '1'){
		}else{
			echo "<!--";} ?>
		<div class="col-md-6">
			<div id="pie2" style="min-width: 100%; height: 400px; max-width: 600px; margin: 0 auto"></div>
		</div>	
		<?php 
		if ($sel_m == '1'){
		}else{
			echo "-->";
		} ?>
		
		
		
		
		<?php 
		if ($sel_c == '1'){
		}else{
			echo "<!--";} ?>
		<div class="col-md-6">	
				<div id="pie3" style="min-width: 100%; height: 400px; max-width: 600px; margin: 0 auto"></div>
		</div>
		<?php 
		if ($sel_c == '1'){
		}else{
			echo "-->";
		} ?>
		
			<?php 
		if ($sel_s == '1'){
		}else{
			echo "<!--";} ?>
		<div class="col-md-6">	
			<div id="pie4" style="min-width: 100%; height: 400px; max-width: 600px; margin: 0 auto"></div>
		</div>
		<?php 
		if ($sel_s == '1'){
		}else{
			echo "-->";
		} ?>
		
		
		</div>	 
		
		

		
		
		 
		  <script type="text/javascript">
		  
	
	
	
<?php 
		if ($sel_r == '1'){
		}else{
			echo "/*";
		} ?>
	
	 // Build the chart
    Highcharts.chart('pie1', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'สัดส่วนพื้นที่เหมาะสมในการปลูกข้าว'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'ร้อยละ',
            colorByPoint: true,
            data: [
			
			
			<?php 
		  
					 if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query("
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
group by r_suit
order by r_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					      $result = pg_query("
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name' 
group by r_suit
order by r_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query("
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' 
group by r_suit
order by r_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query("
SELECT r_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'
group by r_suit
order by r_suit desc;");
						 
				   }
		  
				while ($arr = pg_fetch_array($result))
										
										{ ?>
			
			{
                name: '<?php echo $arr[suit]; ?>',
                y: <?php echo $arr[sumpoint]; ?>
            },
										<?php } ?>
			
			]
        }]
    });
	
	<?php 
		if ($sel_r == '1'){
		}else{
			echo "*/";
		} ?>
		  
		  
		  
		  
		  
<?php 
		if ($sel_m == '1'){
		}else{
			echo "/*";
		} ?>		  
	 // Build the chart
    Highcharts.chart('pie2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'สัดส่วนพื้นที่เหมาะสมในการปลูกข้าวโพด'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'ร้อยละ',
            colorByPoint: true,
            data: [
						
			<?php 
		  
					 if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query("
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
group by m_suit
order by m_suit desc ;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query("
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name' 
group by m_suit
order by m_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query("
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' 
group by m_suit
order by m_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query("
SELECT m_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'
group by m_suit
order by m_suit desc;");
						 
				   }
		  
				while ($arr = pg_fetch_array($result))
										
										{ ?>
			
			{
                name: '<?php echo $arr[suit]; ?>',
                y: <?php echo $arr[sumpoint]; ?>
            },
										<?php } ?>
			
			
			]
        }]
    });
<?php 
		if ($sel_m == '1'){
		}else{
			echo "*/";
		} ?>
		  		  
		
		
<?php 
		if ($sel_c == '1'){
		}else{
			echo "/*";
		} ?>			  
	 // Build the chart
    Highcharts.chart('pie3', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'สัดส่วนพื้นที่เหมาะสมในการปลูกมันสำปะหลัง'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'ร้อยละ',
            colorByPoint: true,
            data: [<?php 
		  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query("
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
group by c_suit
order by c_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query("
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name' 
group by c_suit
order by c_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query("
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' 
group by c_suit
order by c_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query( "
SELECT c_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'
group by c_suit
order by c_suit desc;");
						 
				   }
		  
				while ($arr = pg_fetch_array($result))
										
										{ ?>
			
			{
                name: '<?php echo $arr[suit]; ?>',
                y: <?php echo $arr[sumpoint]; ?>
            },
										<?php } ?>
			
			]
        }]
    });
	<?php 
		if ($sel_c == '1'){
		}else{
			echo "*/";
		} ?>
		  			  
		  
<?php 
		if ($sel_s == '1'){
		}else{
			echo "/*";
		} ?>			  
		  
		 // Build the chart
    Highcharts.chart('pie4', {
		chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'สัดส่วนพื้นที่เหมาะสมในการปลูกอ้อย'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'ร้อยละ',
            colorByPoint: true,
            data: [<?php 
		  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query( "
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
group by s_suit
order by s_suit desc;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query("
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name' 
group by s_suit
order by s_suit desc;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query("
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' 
group by s_suit
order by s_suit desc;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query("
SELECT s_suit as suit,sum(spk_rai) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'
group by s_suit
order by s_suit desc;");
						 
				   }
		  
				while ($arr = pg_fetch_array($result))
										
										{ ?>
			
			{
                name: '<?php echo $arr[suit]; ?>',
                y: <?php echo $arr[sumpoint]; ?>
            },
										<?php } ?>]
        }]
    });
<?php 
		if ($sel_s == '1'){
		}else{
			echo "*/";
		} ?>	
		  
		  
		  
		  
<?php 
		if ($sel_parcel == '1'){
		}else{
			echo "/*";
		} ?>		  
    Highcharts.chart('barchart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'จำนวนแปลง ส.ป.ก. ของแต่ละพื้นที่'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
		 <?php 
		  
	
	
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query("
SELECT prov_nam_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
group by prov_nam_t
order by sumpoint DESC limit 10;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query("
SELECT amp_nam_t as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name' 
group by amp_nam_t
order by sumpoint DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query("
SELECT tam_nam_t as name_bar,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' 
group by tam_nam_t
order by sumpoint DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query("
SELECT tam_nam_t as name_bar,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'
group by tam_nam_t
order by sumpoint DESC;");
						 
				   }
		  
				while ($arr = pg_fetch_array($result))
										
										{ ?>
		
            '<?php echo $arr[name_bar]; ?>',<?php } ?>
			
			
			
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวนแปลง'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} แปลง</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'จำนวนแปลง',
        data: [
		<?php 
		  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query("
SELECT prov_nam_t ,count(*) as sumpoint 
FROM alr_parcel 
group by prov_nam_t
order by sumpoint DESC limit 10;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query("
SELECT amp_nam_t as nam_ ,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code  =  '$prov_name' 
group by amp_nam_t
order by sumpoint DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {
					   
					      $result = pg_query("
SELECT tam_nam_t as name_bar,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' 
group by tam_nam_t
order by sumpoint DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query("
SELECT tam_nam_t as name_bar,count(*) as sumpoint 
FROM alr_parcel 
where  prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'
group by tam_nam_t
order by sumpoint DESC;");
						 
				   }
		  
				while ($arr = pg_fetch_array($result))
										
										{ ?>
		<?php echo $arr[sumpoint]; ?>,<?php } ?>
		
		]
    }]
});
<?php 
		if ($sel_parcel == '1'){
		}else{
			echo "*/";
		} ?>	
<?php 
		if ($sel_plant == '1'){
		}else{
			echo "/*";
		} ?>	
Highcharts.chart('linechart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'จำนวนแปลงที่ปลูกพืชแต่ละชนิดของ ส.ป.ก.'
    },
    legend: {
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        categories: [
				<?php 
		  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query("
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query("
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query("
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query("
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				   }
		  
				while ($arr = pg_fetch_array($result))
										
										{ ?>
		
            '<?php echo $arr[name_bar]; ?>',<?php } ?>
			
			
        ]
    },
    yAxis: {
        title: {
            text: 'จำนวนแปลง'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' แปลง'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: 'จำนวนแปลง',
        data: [
		
			<?php 
		  
					if ($prov_name == '0' and $amphoe_name == '0' and $tambon_name == '0'){
						
					   $result = pg_query("
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
					   
				   }if ($prov_name != '0' and $amphoe_name == '0'){
					   
					      $result = pg_query("
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				   }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name == '0') {  
					   
					      $result = pg_query("
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name'  and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				    }if ($prov_name != '0' and $amphoe_name != '0' and $tambon_name != '0') {
						
					      $result = pg_query("
SELECT active_type as name_bar ,count(*) as sumpoint 
FROM alr_parcel 
where prov_code = '$prov_name' and amp_code = '$amphoe_name' and tam_code = '$tambon_name'  and active_type IS NOT NULL
group by active_type,prov_nam_t
order by sumpoint DESC;");
						 
				   }
		  
				while ($arr = pg_fetch_array($result))
										
										{ ?>
		
            <?php echo $arr[sumpoint]; ?>,<?php } ?>
		
		]
    }]
});
<?php 
		if ($sel_plant == '1'){
		}else{
			echo "*/";
		} ?>	
        </script>
		
		
		
      
    </body>
</html>