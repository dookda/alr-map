<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    include "../lib/sel_config.php";
    conndb();


    $type=$_POST["type"];
    
    if($type=='s1'){
        $sql="select gid AS id, s_desc as name from query_suit  ORDER BY gid"; // suit type
    }else if($type=='t1'){
        $id=$_POST["code"];
        $sql="select c_type AS id, c_desc as name from query_crop  ORDER BY gid"; // crop type
    }else if($type=='s2'){
        $id=$_POST["code"];
        $sql="select gid AS id, s_desc as name from query_suit  ORDER BY gid"; // suit type 2
    }else if($type=='t2'){
        $id=$_POST["code"];
        $sql="select c_type AS id, c_desc as name from query_crop  ORDER BY gid"; // crop type 2
    }

    //echo $sql;
   $ret = pg_query($sql);
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
   closedb();
   echo json_encode($data);
?>
