<?php
  header('Content-Type: application/json');
   $host        = "host=localhost";
   $port        = "port=5432";
   $dbname      = "dbname=alr";
   $credentials = "user=postgres password=1234";
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   }


   $suit1=$_GET["suite1__eq"];
   $typc1=$_GET["typec1__eq"];
   $suit2=$_GET["suite2__eq"];
   $typc2=$_GET["typec2__eq"];
   $suit3=$_GET["suite3__eq"];
   $typc3=$_GET["typec3__eq"];


   //get BBOX
/*   if($tam !='เลือกตำบล...'){ //get bbox from tambon
      $sql="SELECT ST_AsText(ST_SimplifyPreserveTopology(geom,0.01)) AS geom FROM ln9p_tam WHERE prov_nam_t='$prov' AND amp_nam_t='$amp' AND tam_nam_t='$tam'";
      $ret = pg_query($db, $sql);
      if(!$ret){
        exit;
      }
      while($row = pg_fetch_array($ret)){
        $geom=$row["geom"];
     }
   }else if($amp !='เลือกอำเภอ...'){
      $sql="SELECT ST_AsText(ST_SimplifyPreserveTopology(geom,0.01)) AS geom FROM ln9p_amp WHERE prov_nam_t='$prov' AND amp_nam_t='$amp'";
      $ret = pg_query($db, $sql);
      if(!$ret){
        exit;
      }
      while($row = pg_fetch_array($ret)){
        $geom=$row["geom"];
      }
   }else{
      $sql="SELECT ST_AsText(ST_SimplifyPreserveTopology(geom,0.01)) AS geom FROM ln9p_prov WHERE prov_nam_t='$prov'";
      $ret = pg_query($db, $sql);
      if(!$ret){
        exit;
      }
      while($row = pg_fetch_array($ret)){
        $geom=$row["geom"];
      }
   }*/
  function loadJsonData($db, $sql){
    if(!empty($sql)){
               $ret = pg_query($db, $sql);
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
            echo '{
            "type": "FeatureCollection",
            "features": [';
            echo $z;
            echo ']}';
        }
  };      

   // echo $sql;

   if($typc3 != 'เลือก...'){
        $sql="SELECT json_build_object('type','Feature','properties',json_build_object('r_suit',r_suit,'m_suit',m_suit,'c_suit',c_suit,'s_suit',s_suit,'v_suit',v_suit,'f_suit',f_suit,'p_suit',p_suit),'geometry',ST_AsGeoJSON(ST_Transform(geom,3857))::json) as geojson FROM alr_parcel where $typc1 = '$suit1' and $typc2 = '$suit2' and $typc3 = '$suit3' and amp_code = '6503'";
        loadJsonData($db, $sql);

   } elseif ($typc2 != 'เลือก...'){
        $sql="SELECT json_build_object('type','Feature','properties',json_build_object('r_suit',r_suit,'m_suit',m_suit,'c_suit',c_suit,'s_suit',s_suit,'v_suit',v_suit,'f_suit',f_suit,'p_suit',p_suit),'geometry',ST_AsGeoJSON(ST_Transform(geom,3857))::json) as geojson FROM alr_parcel where $typc1 = '$suit1' and $typc2 = '$suit2' and amp_code = '6503'";
        loadJsonData($db, $sql);

   } elseif ($typc1 != 'เลือก...'){
        $sql="SELECT json_build_object('type','Feature','properties',json_build_object('r_suit',r_suit,'m_suit',m_suit,'c_suit',c_suit,'s_suit',s_suit,'v_suit',v_suit,'f_suit',f_suit,'p_suit',p_suit),'geometry',ST_AsGeoJSON(ST_Transform(geom,3857))::json) as geojson FROM alr_parcel where $typc1 = '$suit1' and amp_code = '6503'";
        loadJsonData($db, $sql);
   }
pg_close($db);
?>
