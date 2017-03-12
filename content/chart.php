<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="../../Highcharts-4.0.3/js/highcharts.js"></script>
		<script src="../../Highcharts-4.0.3/js/modules/exporting.js"></script>
		
		
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'การมีงานทำและเงินเดือนเฉลี่ยของนิสิตคณะ'+fac
            },
            subtitle: {
                text: 'Source: 2552-2555'
            },
            xAxis: [{
                categories: ['2552', '2553', '2554', '2555']
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    format: '{value}บาท',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                title: {
                    text: 'ค่าเฉลี่ยเงินเดือนที่ได้รับ',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: 'จำนวนบัณฑิตย์ที่มีงานทำ',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    format: '{value} คน',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                opposite: true
            }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                x: 120,
                verticalAlign: 'top',
                y: 100,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                name: 'จำนวนบัณฑิตย์ที่มีงานทำ',
                type: 'column',
                yAxis: 1,
                data: y,
                tooltip: {
                    valueSuffix: ' คน'
                }
    
            }, {
                name: 'ค่าเฉลี่ยเงินเดือนที่ได้รับ',
                type: 'spline',
                data: sy,
                tooltip: {
                    valueSuffix: ' บาท'
                }
            }]
        });
    });
    

		</script>
	</head>
	<body>
	<?php
	$x = $_GET['name'];
	
	switch ($x)
	{
	case "med":
		$f = "คณะแพทยศาสตร์";
		break;
	case "pha":
		$f = "คณะเภสัชศาสตร์";
		break;
	case "nurse":
		$f = "คณะพยาบาลศาสตร์";
		break;
	case "deny":
		$f = "คณะทันตแพทยศาสตร์";
		break;
	case "medsci":
		$f = "คณะวิทยาศาสตร์การแพทย์";
		break;
	case "ahs":
		$f = "คณะสหเวชศาสตร์ ";
		break;
	case "health":
		$f = "คณะสาธารณสุขศาสตร์";
		break;
	case "agi":
		$f = "คณะเกษตรศาสตร์ ทรัพยากรธรรมชาติและสิ่งแวดล้อม";
		break;
	case "sci":
		$f = "คณะวิทยาศาสตร์ ";
		break;
	case "eng":
		$f = "คณะวิศวกรรมศาสตร์ ";
		break;
	case "arch":
		$f = "คณะสถาปัตยกรรมศาสตร์ ";
		break;
	case "law":
		$f = "คณะนิติศาสตร์";
		break;
	case "human":
		$f = "คณะมนุษยศาสตร์";
		break;
	case "bec":
		$f = "คณะวิทยาการจัดการและสารสนเทศศาสตร์ ";
		break;
	case "edu":
		$f = "คณะศึกษาศาสตร์";
		break;
	case "soc":
		$f = "คณะสังคมศาสตร์";
		break;
	default:
		$f = "";
		break;
	}
	
	echo '<script>var fac = "'.$f.'";</script>';
	//connect database
	include("../../connect/connect_pg.php");
	// number of nisit
	$query_y52 = pg_query("select sum(".$x."52) from v_occupation;");
	$query_y53 = pg_query("select sum(".$x."53) from v_occupation;");
	$query_y54 = pg_query("select sum(".$x."54) from v_occupation;");
	$query_y55 = pg_query("select sum(".$x."55) from v_occupation;");
	// avg salary 
	$query_sy52 = pg_query("select round(avg(".$x."i52)) from v_occupation;");
	$query_sy53 = pg_query("select round(avg(".$x."i53)) from v_occupation;");
	$query_sy54 = pg_query("select round(avg(".$x."i54)) from v_occupation;");
	$query_sy55 = pg_query("select round(avg(".$x."i55)) from v_occupation;");
	
	// เรียก function		
	$y52 = query_p($query_y52);
	$y53 = query_p($query_y53);
	$y54 = query_p($query_y54);
	$y55 = query_p($query_y55);
	$sy52 = query_p($query_sy52);
	$sy53 = query_p($query_sy53);
	$sy54 = query_p($query_sy54);
	$sy55 = query_p($query_sy55);
		
	//echo $y;		
	echo "<script>var y = [$y52,$y53,$y54,$y55];</script>";
	echo "<script>var sy = [$sy52,$sy53,$sy54,$sy55];</script>";
		//echo '<script>var w_dhf = ['.$w_dhf.'];</script>';	
		
		// function 
		function query_p($result){
			$i=0;
			while ($row = pg_fetch_row($result)) 
			{
				$count = count($row[0]);
				//$count = 53;
				$y = 0;				
				while ($y < $count)
				{
					$c_row = current($row);
					$pvol .= $c_row.",";
					next($row);
					$y = $y + 1;
				}
				$i = $i + 1;
			}
			return $c_row;
			//echo $svol; 
		};	
	?>
	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</body>
</html>
