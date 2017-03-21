<?php
  $host        = "host=localhost";
  $port        = "port=5432";
  $dbname      = "dbname=alr";
  $credentials = "user=postgres password=1234";
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   }

    $type=$_POST["type"];
    if($type=='s1'){
        $sql="select gid AS id, s_desc as name from query_suit  ORDER BY gid"; // suit type
    }else if($type=='t1'){
        $id=$_POST["code"];
        $sql="select c_type AS id, c_type as name from query_crop  ORDER BY gid"; // crop type
    }else if($type=='s2'){
        $id=$_POST["code"];
        $sql="select gid AS id, s_desc as name from query_suit  ORDER BY gid"; // suit type 2
    }else if($type=='t2'){
        $id=$_POST["code"];
        $sql="select c_type AS id, c_type as name from query_crop  ORDER BY gid"; // crop type 2
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
