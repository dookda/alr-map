<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

  require('../lib/conn.php');
  $dbconn = pg_connect($conn_alr) or die('Could not connect');


   $suitCrop=$_GET["suitCrop__eq"];  
   $luType=$_GET["luType__eq"];

if(!empty( $_GET['suitType__eq'] )){
  $cropTypc=checkType($_GET['suitType__eq']);
};


function checkType($dataGet){
  if ($dataGet == "ข้าว"){
    $cropType = "r_suit";
  }elseif ($dataGet == "ข้าวโพด") {
    $cropType = "m_suit";
  }elseif ($dataGet == "มันสำปะหลัง") {
    $cropType = "c_suit";
  }elseif ($dataGet == "พืชผัก") {
    $cropType = "v_suit";
  }elseif ($dataGet == "ไม้ผล") {
    $cropType = "f_suit";
  }elseif ($dataGet == "ทุ่งหญ้าเลี้ยงสัตว์") {
    $cropType = "p_suit";
  }elseif ($dataGet == "อ้อย") {
    $cropType = "s_suit";
  }else{
    $cropType = "เลือก...";
  }
  return $cropType;
};


function loadJsonData($sql){
  if(!empty($sql)){
    $ret = pg_query($sql);
      if(!$ret){
        exit;
      }

  $i=0;
  $z = "";
  
  while($row = pg_fetch_array($ret)){
    if($i==0){
      $z.=$row["geojson"];
    }else{
      $z.=",".$row["geojson"];
    }
      $i++;
  }

  echo '{"type": "FeatureCollection","features": [';
  echo $z;
  echo ']}';
  }
};      

//create where sqql
if(!empty( $_GET['tam'] )){
  $tam = $_GET['tam'];
  $admCode = "tam_code = '$tam'";
}elseif(!empty( $_GET['amp'])){
  $amp = $_GET['amp'];
  $admCode = "amp_code = '$amp'";
}elseif(!empty( $_GET['pro'])){
  $pro = $_GET['pro'];
  $admCode = "prov_code = '$pro'";
};


//echo $typc1;


  $sql = "select json_build_object('type','Feature','properties',json_build_object('alrcode',alrcode,'ele',ele,'slp',slp,'dru',dru,'flo',flo,'s_suit',s_suit,'v_suit',v_suit,'f_suit',f_suit,'p_suit',p_suit),'geometry',ST_AsGeoJSON(ST_Transform(geom,3857))::json) as geojson FROM alr_parcel where $cropTypc = '$suitCrop' and lu57_t = '$luType' and $admCode";
  
  //echo $sql;

  loadJsonData($sql);

// Closing connection
pg_close($dbconn);
?>
