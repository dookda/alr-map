
<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

include "../lib/sel_config.php";
conndb();

$i=0;
$result = pg_query("SELECT * FROM cwrt"); 
while ($row = pg_fetch_assoc($result)) {
    if($row['rice105'] > 0){
        $i=$i+1;
        //echo $row['rice105'].'</br>';
        $cwr[] = $row['rice105'];
    }
}

$arr = array();
for($x = 1; $x <=10; $x++ ){
  array_push($arr, $x);
  //echo $x;
}


function chkActivelandcwr($alrcode,$active_land_cwr){
    //$check = "SELECT alrcode FROM active_land WHERE alrcode = '$code'";
    $rs = pg_query("SELECT alrcode FROM $active_land_cwr WHERE alrcode = '$alrcode'");
    $data = pg_fetch_array($rs);

    if ($data[0] == $alrcode){    
        return 1;
    }else{
        return 0;
    }
}


closedb();

class cropWater
{  
  
    function __construct(){
        //$this->_SITE_ROOT = $_SERVER['DOCUMENT_ROOT']."/SpotPrices/";
        include("config.php");
        //$this->dbConnection = pg_connect("dbname=$_DB_NAME user=$_DB_USER password=$_DB_PSWD host=$_DB_HOST");
    }

  function rice105(){
    $da = [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6];
    return $da;
  }

  function cropType($cropName){
    //$pgdb = pg_connect("host=localhost user=postgres password=1234 dbname=alr");
    include("config.php");
    $sql = pg_query($pgdb, "SELECT * FROM cwrt"); 

    while ($row = pg_fetch_assoc($sql)){
      if($row[$cropName] > 0){
        $cwr[] = $row[$cropName];  
      }           
    }
    return $cwr;
  }

  function cwrWk($alrcode, $active_land_cwr){
    //$pgdb = pg_connect("host=localhost user=postgres password=1234 dbname=alr");
    include("config.php");
    $sql = pg_query($pgdb, "SELECT * FROM $active_land_cwr where alrcode='$alrcode'"); 
    
    while ($row = pg_fetch_assoc($sql)) {
        foreach($row as $key => $value) {            
            if($key !== 'gid' & $key !== 'alrcode' & $key !== 'crop_type' & $key !== 'active_wk'){
              if($value == ''){
                $value = 'null';
                $cwrSelect[] = $value;
                //print "$key = $value </br>";
              }else{
                $cwrSelect[] = $value;
              }
              
            }          
        }
    }
    return $cwrSelect;
  }


  function cwrType($alrcode, $active_land_cwr){
    //$pgdb = pg_connect("host=localhost user=postgres password=1234 dbname=alr");
    include("config.php");
    $sql = pg_query($pgdb, "select * from $active_land_cwr where alrcode='$alrcode'"); 
    
    while ($row = pg_fetch_assoc($sql)) {
        foreach($row as $key => $value) {            
            if($key == 'crop_type'){
                 $cropType = $value; 
            }          
        }
    }
    return $cropType;
  }


} // class

class meteoWeek
{  
  function rainNow($tamCode){
    //$pgdb = pg_connect("host=localhost user=postgres password=1234 dbname=alr");
    include("config.php");
    $sql = pg_query($pgdb, "SELECT * FROM rain_now where tam_code='$tamCode'"); 
    
    while ($row = pg_fetch_assoc($sql)) {
        foreach($row as $key => $value) {            
            if($key !== 'geom' & $key !== 'gid' & $key !== 'tam_code' & $key !== 'amp_code' & $key !== 'prov_code'){
              //$rain[] = $value;
              //print "$key = $value </br>";
			  if($value == ''){
                $value = 'null';
                $rain[] = $value;
                //print "$key = $value </br>";
              }else{
                $rain[] = $value;
              }
            }          
        }
    }
    return $rain;
  }
  
  function rainTam($tamCode){
    //$pgdb = pg_connect("host=localhost user=postgres password=1234 dbname=alr");
    include("config.php");
    $sql = pg_query($pgdb, "SELECT * FROM rain30y where tam_code='$tamCode'"); 
    
    while ($row = pg_fetch_assoc($sql)) {
        foreach($row as $key => $value) {            
            if($key !== 'geom' & $key !== 'gid' & $key !== 'tam_code' & $key !== 'amp_code' & $key !== 'prov_code'){
              $rain[] = $value;
              //print "$key = $value </br>";
            }          
        }
    }
    return $rain;
  }

  function evapTam($tamCode){
    //$pgdb = pg_connect("host=localhost user=postgres password=1234 dbname=alr");
    include("config.php");
    $sql = pg_query($pgdb, "SELECT * FROM evap30y where tam_code='$tamCode'"); 
    
    while ($row = pg_fetch_assoc($sql)) {
        foreach($row as $key => $value) {            
            if($key !== 'geom' & $key !== 'gid' & $key !== 'tam_code' & $key !== 'amp_code' & $key !== 'prov_code'){
              $evap[] = $value;
              //print "$key = $value </br>";
            }          
        }
    }
    return $evap;
  }

} // class




$alrCode = $_GET["alrcode"];

$tamcode = explode("-", $alrCode);

$cwr = new cropWater; 
$meteo = new meteoWeek;

$active_land_cwr1 = chkActivelandcwr($alrCode, 'active_land_cwr');
$active_land_cwr2 = chkActivelandcwr($alrCode, 'active_land_cwr2');
$active_land_cwr3 = chkActivelandcwr($alrCode, 'active_land_cwr3');

#echo $active_land_cwr1;
#echo $active_land_cwr2;
#echo $active_land_cwr3;
echo "<script>var land_cwr =[]; </script>";
if($active_land_cwr1==1){
    echo "<script>land_cwr.push('cwr1'); </script>";
    //echo "<script>var a ='a'; </script>";
    //echo "<script>var a1 =[1,2,3,4,5,6,7]; </script>";
    echo "<script>var a = 'ความต้องการน้ำของ".$cwr->cwrType($alrCode, 'active_land_cwr').";'</script>";
    echo "<script>var a1 = [".join($cwr->cwrWk($alrCode, 'active_land_cwr'), ',')."];</script>";

}

if ($active_land_cwr2==1) {
    echo "<script>land_cwr.push('cwr2'); </script>";
    //echo "<script>var b ='b'; </script>";

    //echo "<script>var b1 =[5,6,7,8,9,3,4]; </script>";

    echo "<script>var b = 'ความต้องการน้ำของ".$cwr->cwrType($alrCode, 'active_land_cwr2').";'</script>";
    echo "<script>var b1 = [".join($cwr->cwrWk($alrCode, 'active_land_cwr2'), ',')."];</script>";
}

if ($active_land_cwr3==1) {
    echo "<script>land_cwr.push('cwr3'); </script>";
    //echo "<script>var c ='c'; </script>";

    //echo "<script>var c1 =[5,4,6,7,8,9,2]; </script>";
    echo "<script>var c = 'ความต้องการน้ำของ".$cwr->cwrType($alrCode, 'active_land_cwr3').";'</script>";
    echo "<script>var c1 = [".join($cwr->cwrWk($alrCode, 'active_land_cwr3'), ',')."];</script>";
}


?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<title></title>
</head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<body>
<div id="container" style="min-width: 310px; height: 250px; margin: 0 auto"></div>
<script type="text/javascript">

var chartData = [{
            name: 'ปริมาณน้ำฝนปัจจุบัน',
			color: '#2874A6',
			dashStyle: 'Solid',
			marker: {symbol: 'circle'},			
            data: [<?php echo join($meteo->rainNow($tamcode[0]), ','); ?>]
        },{
            name: 'ปริมาณน้ำฝนเฉลี่ย 30 ปี',
			color: '#85C1E9',
			dashStyle: 'Solid',
			marker: {symbol: 'circle'},			
            data: [<?php echo join($meteo->rainTam($tamcode[0]), ','); ?>]
        }, {
            name: 'ปริมาณการระเหยเฉลี่ย 30 ปี',
			color: '#E74C3C',
			dashStyle: 'ShortDash',
			marker: {symbol: 'circle'},
            data: [<?php echo join($meteo->evapTam($tamcode[0]), ','); ?>]
        }
        /*,{
            name: 'ความต้องการน้ำของ'+'<?php echo $cwr->cwrType($alrCode, "active_land_cwr"); ?>',
            data: [<?php echo join($cwr->cwrWk($alrCode, "active_land_cwr"), ','); ?>]
        }, {
            name: 'ความต้องการน้ำของ'+'<?php echo $cwr->cwrType($alrCode, "active_land_cwr2"); ?>',
            data: [<?php echo join($cwr->cwrWk($alrCode, "active_land_cwr2"), ','); ?>]
        }, {
            name: 'ความต้องการน้ำของ'+'<?php echo $cwr->cwrType($alrCode, "active_land_cwr3"); ?>',
            data: [<?php echo join($cwr->cwrWk($alrCode, "active_land_cwr3"), ','); ?>]
        }*/
    ];
//var cars = ["BMW", "Volvo", "Saab", "Ford"];
var i = 0;
while (land_cwr[i]) {

    if(land_cwr[i]=='cwr1'){
        chartData.push(
            { 
                name: a,
				color: '#AF7AC5',
				dashStyle: 'ShortDot',
				marker: {symbol: 'square'},
                data: a1
            }
        );
    }else if(land_cwr[i]=='cwr2'){
        chartData.push(
            { 
                name: b,
				color: '#58D68D',
				dashStyle: 'ShortDashDotDot',
				marker: {symbol: 'diamond'},
                data: b1
            }
        );
    }else if(land_cwr[i]=='cwr3'){
        chartData.push(
            { 
                name: c,
				color: '#F7DC6F',
				dashStyle: 'ShortDashDot',
				marker: {symbol: 'triangle'},
                data: c1
            }
        );
    };
    //console.log('cwr3');
    i++;

};





  $(function () {
    Highcharts.chart('container', {
       chart: {
                zoomType: 'x'
        },
        title: {
            text: '',
            x: -20 //center
        },
        /* subtitle: {
            text: 'Source: WorldClimate.com',
            x: 20
        },*/
        xAxis: {
            categories: ['wk1', 'wk2',  'wk3',  'wk4',  'wk5',  'wk6',  'wk7',  'wk8',  'wk9',  'wk10', 'wk11', 'wk12', 'wk13', 'wk14', 'wk15', 'wk16', 'wk17', 'wk18', 'wk19', 'wk20', 'wk21', 'wk22', 'wk23', 'wk24', 'wk25', 'wk26', 'wk27', 'wk28', 'wk29', 'wk30', 'wk31', 'wk32', 'wk33', 'wk34', 'wk35', 'wk36', 'wk37', 'wk38', 'wk39', 'wk40', 'wk41', 'wk42', 'wk43', 'wk44', 'wk45', 'wk46', 'wk47', 'wk48', 'wk49', 'wk50', 'wk51', 'wk52']
        },
        yAxis: {
            title: {
                text: 'ปริมาณ (มม.)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' มม.'
        },
        legend: {
            layout: 'horizontal',
            backgroundColor: 'white',
            align: 'center',
            verticalAlign: 'top',
            y: 0,
            //x: 10,
            borderWidth: 0.5,
            borderRadius: 0,
            //title: {text: ':: Drag me'},
            floating: true,
            draggable: true,
            zIndex: 20
        },
        series: chartData
    });
});
</script>
<?php //echo join($cwr->cwrWk($alrCode), ','); ?>
</body>
</html>


