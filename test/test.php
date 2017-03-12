<?php 
include "../lib/sel_config.php";
conndb();

$val = $_GET["code"];

$check="SELECT active_date FROM active_land WHERE alrcode = '$val'";
$rs = pg_query($check);
$ddate = pg_fetch_array($rs);

//$ddate = "2012-10-18";
$date = new DateTime($ddate[0]);
$week = $date->format("W");
echo "Weeknumber: $week"."<br>";


$result = pg_query("SELECT * FROM cwr"); 
while ($row = pg_fetch_assoc($result)) {
  echo $row['crop_type'];
  echo $row['w1'];
  echo $row['w2'];
  echo '</br>';
}

$i=0;
$result = pg_query("SELECT * FROM cwrt"); 
while ($row = pg_fetch_assoc($result)) {
    if($row['rice105'] > 0){
        $i=$i+1;
        echo $row['rice105'].'</br>';
    }
  //echo $row['crop_type'];
  //echo $row['w1'];
  //echo $row['w2'];
  //echo $row['rice'].'</br>';
}
//for 
echo $i;
closedb();
?>

