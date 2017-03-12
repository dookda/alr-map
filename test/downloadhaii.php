<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<title>Download XML GeoRss Service From HAII</title>

</head>
<body>
<?php
date_default_timezone_set('Asia/Bangkok');
$doc = new DOMDocument();
//$doc->load('http://live1.haii.or.th/thaifloodwatch/igis/data/georss_haii.xml'); // http://live1.haii.or.th/thaiwater/igis2/data/georss_haii.xml
$doc->load('http://live1.haii.or.th/thaiwater/igis2/data/georss_haii.xml');
$destinations = $doc->getElementsByTagName("description");
//$sql = "INSERT INTO test (txt) VALUES ";
//include("connect.php");
$i=0;
foreach ($destinations as $destination) {
	//echo $destination;
    foreach($destination->childNodes as $child) {
		$i = $i+1;
		//echo $i;
        if ($child->nodeType == XML_CDATA_SECTION_NODE & $i >1) {
			$sql = "INSERT INTO haiiservice (sta, date, rain) VALUES ";
            $sql .= sprintf(
				"('%s');",
				$child->textContent
			);
			$tfind = array('<table><tr><td><font color = "white">รหัสสถานี: ',
			'</font></td></tr><tr><td><font color = "white">ชื่อสถานี :',
			'</font></td></tr><tr><td><font color = \'white\'>ที่ตั้ง: ',
			'</font></td></tr><tr><td><font color = \'white\'>ข้อมูลล่าสุด ณ วันที่ :',
			'</font></td></tr><tr><td><font color = \'white\'><b>ปริมาณฝนย้อนหลัง 24 ชม.: ',
			 'มม.</b></font></td></tr></table>',
			' มม.</b>&nbsp;&nbsp;<a href=\'#\' onClick=window.open(\'http://wea.haii.or.th/graph/zcgraph.php?code=',
			'&type=rain24h&schema=ais\',\'Station\',\'toolbar=no,location=no,status=no,menubar=no,top=30,left=100,scrollbars=no,resizable=yes,width=600,height=620\')><img src=\'images/icon_chart.png\' title=\'แสดงกราฟ\' name=\'graph\' width=\'18\' height=\'18\' border=\'0\'></a></font></td></tr></table>',
			'&type=rain24h&schema=dnp\',\'Station\',\'toolbar=no,location=no,status=no,menubar=no,top=30,left=100,scrollbars=no,resizable=yes,width=600,height=620\')><img src=\'images/icon_chart.png\' title=\'แสดงกราฟ\' name=\'graph\' width=\'18\' height=\'18\' border=\'0\'></a></font></td></tr></table>',
			'&type=rain24h&schema=HAII\',\'Station\',\'toolbar=no,location=no,status=no,menubar=no,top=30,left=100,scrollbars=no,resizable=yes,width=600,height=620\')><img src=\'images/icon_chart.png\' title=\'แสดงกราฟ\' name=\'graph\' width=\'18\' height=\'18\' border=\'0\'></a></font></td></tr></table>',
			//'&type=rain24h&schema=nakhonnayok\',\'Station\',\'toolbar=no,location=no,status=no,menubar=no,top=30,left=100,scrollbars=no,resizable=yes,width=600,height=620\')><img src=\'images/icon_chart.png\' title=\'แสดงกราฟ\' name=\'graph\' width=\'18\' height=\'18\' border=\'0\'></a></font></td></tr></table>',
			//'&type=rain24h&schema=oae\',\'Station\',\'toolbar=no,location=no,status=no,menubar=no,top=30,left=100,scrollbars=no,resizable=yes,width=600,height=620\')><img src=\'images/icon_chart.png\' title=\'แสดงกราฟ\' name=\'graph\' width=\'18\' height=\'18\' border=\'0\'></a></font></td></tr></table>',
			'&type=rain24h&schema=south31\',\'Station\',\'toolbar=no,location=no,status=no,menubar=no,top=30,left=100,scrollbars=no,resizable=yes,width=600,height=620\')><img src=\'images/icon_chart.png\' title=\'แสดงกราฟ\' name=\'graph\' width=\'18\' height=\'18\' border=\'0\'></a></font></td></tr></table>',
			'&type=rain24h&schema=tele_agro\',\'Station\',\'toolbar=no,location=no,status=no,menubar=no,top=30,left=100,scrollbars=no,resizable=yes,width=600,height=620\')><img src=\'images/icon_chart.png\' title=\'แสดงกราฟ\' name=\'graph\' width=\'18\' height=\'18\' border=\'0\'></a></font></td></tr></table>');
			
			$treplace = array('','_','_','_','_','_','_','','_','_','_','_','_');
			$sql2 = str_replace($tfind,$treplace,$sql);
			//$desId = substr($sql2, 11, 4); 
			// schema= ais,tele_agro,south31,oae,nakhonnayok,HAII,dnp
			//echo $sql2;
			$d = date("Y/m/d H:i:s");
			$sql3 = explode("_", $sql2);
			$sql4 = $sql3[0]."','".$d."',".$sql3[4].");";
			
			echo $sql4;
			
			//echo $d;
			//pg_query($sql4);
			echo "</br>";
			
			
        }
    }
}
//$sql = rtrim($sql, ',') . ';';
echo "ok"
?>
</body>
</html>