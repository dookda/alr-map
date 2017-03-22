<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    include "../lib/sel_config.php";
    conndb();


   $suit1=$_GET["suite1__eq"];
   $suit2=$_GET["suite2__eq"];   
   $suit3=$_GET["suite3__eq"];   
   $suit4=$_GET["suite4__eq"];
   $suit5=$_GET["suite5__eq"];
   $suit6=$_GET["suite6__eq"];
   $suit7=$_GET["suite7__eq"];

if(!empty( $_GET['typec1__eq'] )){
  $typc1=checkType($_GET['typec1__eq']);
};

if(!empty( $_GET['typec2__eq'])){
  $typc2=checkType($_GET['typec2__eq']);
};

if(!empty( $_GET['typec3__eq'])){
  $typc3=checkType($_GET['typec3__eq']);
};

if(!empty( $_GET['typec4__eq'])){
  $typc4=checkType($_GET['typec4__eq']);
};

if(!empty( $_GET['typec5__eq'])){
  $typc5=checkType($_GET['typec5__eq']);
};

if(!empty( $_GET['typec6__eq'])){
  $typc6=checkType($_GET['typec6__eq']);
};

if(!empty( $_GET['typec7__eq'])){
  $typc7=checkType($_GET['typec7__eq']);
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

  if($typc7 != 'เลือก...'){
  
      $typSuit = "$typc1 = '$suit1' and $typc2 = '$suit2' and $typc3 = '$suit3' and $typc4 = '$suit4' and $typc5 = '$suit5' and $typc6 = '$suit6' and $typc7 = '$suit7'";

   } elseif ($typc6 != 'เลือก...'){ 

      $typSuit = "$typc1 = '$suit1' and $typc2 = '$suit2' and $typc3 = '$suit3' and $typc4 = '$suit4' and $typc5 = '$suit5' and $typc6 = '$suit6'";

   } elseif ($typc5 != 'เลือก...'){

      $typSuit = "$typc1 = '$suit1' and $typc2 = '$suit2' and $typc3 = '$suit3' and $typc4 = '$suit4' and $typc5 = '$suit5'";

   } elseif ($typc4 != 'เลือก...'){  

      $typSuit = "$typc1 = '$suit1' and $typc2 = '$suit2' and $typc3 = '$suit3' and $typc4 = '$suit4'";

   } elseif ($typc3 != 'เลือก...'){ 

       $typSuit = "$typc1 = '$suit1' and $typc2 = '$suit2' and $typc3 = '$suit3'";

   } elseif ($typc2 != 'เลือก...'){

      $typSuit = "$typc1 = '$suit1' and $typc2 = '$suit2'";

   } elseif ($typc1 != 'เลือก...'){

      $typSuit = "$typc1 = '$suit1'";

   };

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


  $sql = "select json_build_object('type','Feature','properties',json_build_object('alrcode',alrcode,'ele',ele,'slp',slp,'dru',dru,'flo',flo,'s_suit',s_suit,'v_suit',v_suit,'f_suit',f_suit,'p_suit',p_suit),'geometry',ST_AsGeoJSON(ST_Transform(geom,3857))::json) as geojson FROM alr_parcel where $typSuit and $admCode";
  
  //echo $sql;

  loadJsonData($sql);

closedb();
?>
