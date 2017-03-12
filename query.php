<?php
  header('Content-Type: application/json');
   $host        = "host=localhost";
   $port        = "port=5432";
   $dbname      = "dbname=alr";
   $credentials = "user=postgres password=TRF2cn2010";
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   }


   $prov=$_GET["prov__eq"];
   $amp=$_GET["amphoe__eq"];
   $tam=$_GET["tambon__eq"];
   $type=$_GET["layerType__eq"];

   //get BBOX
   if($tam !='เลือกตำบล...'){ //get bbox from tambon
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
   }

   // echo $sql;

   if($type !='เลือกชั้นข้อมูล...'){
        $sql="";
        if($type=='แปลง ส.ป.ก. ที่ผ่านเกณฑ์ GAP'){
            $sql="SELECT json_build_object(
                'type','Feature',
                'properties',
                json_build_object(
                    'tam_nam_t',tam_nam_t,
                    'amp_nam_t',amp_nam_t,
                    'prov_nam_t',prov_nam_t,
                    'lu57_t',lu57_t
                 ),
                 'geometry',ST_AsGeoJSON(ST_Transform(geom,3857))::json
             )
              as geojson FROM alr_parcel WHERE r_suit = 'เหมาะสม' AND ST_intersects(geom,st_geogfromtext('$geom'))";
        }
/*
        if($type=='ระวางภาพ ortho 1:25,000'){
            $sql="SELECT json_build_object(
                'type','Feature',
                'properties', json_build_object(
                    'mapsheet',mapsheet,
                    'utm_zone',utm_zone,
                    'scale',scale,
                    'cart',cart
                 ),
                 'geometry',ST_AsGeoJSON(ST_Transform(geom,3857))::json
             )
              as geojson FROM index_ortho25k2 WHERE ST_intersects(geom,st_geogfromtext('$geom'))";
        }

        if($type=='ระวางเส้นชั้นความสูง'){
            $sql="SELECT json_build_object(
                'type','Feature',
                'properties', json_build_object(
                    'contour',contour
                 ),
                 'geometry',ST_AsGeoJSON(ST_Transform(geom,3857))::json
             )
              as geojson FROM contour WHERE ST_intersects(geom,st_geogfromtext('$geom'))";
        }

        if($type=='ระวางแบบจำลองระดับสูงเชิงเลข'){
            $sql="SELECT json_build_object(
                'type','Feature',
                'properties', json_build_object(
                    'mapsheet',mapsheet,
                    'utm_zone',utm_zone,
                    'scale',scale,
                    'cart',cart
                 ),
                 'geometry',ST_AsGeoJSON(ST_Transform(geom,3857))::json
             )
              as geojson FROM index_dem4k WHERE ST_intersects(geom,st_geogfromtext('$geom'))";
        }

        if($type=='หมุดหลักฐานภาคพื้นดิน'){
            $sql="SELECT json_build_object(
                'type','Feature',
                'properties', json_build_object(
                    'point_id',point_id,
                    'utm_zone',utm_zone,
                    'cart',cart
                 ),
                 'geometry',ST_AsGeoJSON(ST_Transform(geom,3857))::json
             )
              as geojson FROM gcp WHERE ST_intersects(geom,st_geogfromtext('$geom'))";
        } */

        if(!empty($sql)){

               $ret = pg_query($db, $sql);
               if(!$ret){
                  exit;
               }
               $i=0;
			   $z="";
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


   }
pg_close($db);
?>
