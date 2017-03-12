<?php
  $host        = "host=localhost";
  $port        = "port=5432";
  $dbname      = "dbname=alr";
  $credentials = "user=postgres password=TRF2cn2010";
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   }

    $type=$_POST["type"];
    if($type=='p'){
        $sql="SELECT prov_code AS id, prov_nam_t AS name FROM ln9p_prov ORDER BY prov_nam_t";
    }else if($type=='a'){
        $id=$_POST["code"];
        $sql="SELECT  amp_code AS id, amp_nam_t AS name FROM ln9p_amp WHERE prov_code='$id' ORDER BY amp_nam_t";
    }else if($type=='t'){
        $id=$_POST["code"];
        $sql="SELECT tam_code AS id, tam_nam_t AS name,ST_AsGML(geom) AS g FROM ln9p_tam WHERE amp_code='$id' ORDER BY tam_nam_t";
    }

    //echo $sql;
   $ret = pg_query($db, $sql);
   if(!$ret){
      exit;
   }
   $data=array();
   while($row = pg_fetch_array($ret)){
        $x=array(
                "item"=>$row["name"],
                "value"=>$row["id"],

        );
        array_push($data,$x);
   }
   pg_close($db);
   echo json_encode($data);
?>
