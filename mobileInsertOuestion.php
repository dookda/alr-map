<?php
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

	include "../lib/sel_config.php";
    conndb();

	
function chkData($col,$val,$alrcode){

    if(gettype($val) =='string'){
        $val = "'$val'";
    }

    $rs = pg_query("SELECT alrcode FROM alr_mobile WHERE alrcode = '$alrcode'");
    $result = pg_fetch_array($rs);

    if (empty($result['alrcode'])){  
        $sql = "INSERT INTO alr_mobile ($col) VALUES ($val)";
        pg_query($sql);  
        return $sql;
    }else{
        $sql = "UPDATE alr_mobile SET $col=$val WHERE alrcode = '$alrcode'";
        pg_query($sql);
        return $sql;
    }
}

$postdata = file_get_contents("php://input");
if (isset($postdata)) {
    $request = json_decode($postdata);
    $alrcode = $request->alrcode;
        
    foreach($request as $item => $value){
        echo chkData($item,$value,$alrcode);
        //echo $item;
        //echo $value;
    }
}else {
    echo "Not called properly with username parameter!";
}

closedb();
?>