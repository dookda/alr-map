<?php
	//date_default_timezone_set('Asia/Bangkok');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
	
	include "../lib/sel_config.php";
    conndb();

	

function updateActiveland($code,$owner,$type,$rai,$date,$active_land){
	$check="SELECT alrcode FROM $active_land WHERE alrcode = '$code'";
	$rs = pg_query($check);
	$dat = pg_fetch_array($rs);

	if($dat[0]==$code){
    	$sql = "UPDATE $active_land SET active_owner='$owner',active_type='$type',active_rai=$rai,active_date='$date' WHERE alrcode='$code'";
	    pg_query($sql);
	    //echo('yes! '.$code);
	}else{
	    $sql ="INSERT INTO $active_land (alrcode,active_owner,active_type,active_rai,active_date) VALUES ('$code','$owner','$type',$rai,'$date')";
	    pg_query($sql);
		//echo('no! '.$code);
	}
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

function queryEvep($week, $alrCode){
    $tam = explode("-", $alrCode);
    //print $tam[0]."</br>";
    //print $week."</br>";
    $pacelSql = pg_query("select * from evap30y where tam_code='$tam[0]'");
    while ($pacelRow = pg_fetch_assoc($pacelSql)) {
        //print $pacelRow["$week"]."</br>";
        return $pacelRow["$week"];
    }
}

function insertCwr($alrCode, $wkNum, $cropType, $active_land_cwr){
    
    for ($x = 1; $x <= 52; $x++) {
      $wk = 'w'.$x;
      pg_query("update $active_land_cwr set $wk = null where alrcode='$alrCode'" );
    }
   
    $cwrSql = pg_query("select * from cwr where crop_name='$cropType'");
    $i      = 0;

    while ($cwrRow = pg_fetch_assoc($cwrSql)) {
        foreach ($cwrRow as $cwrKey => $cwrValue) {
            
            if ($cwrValue !== null & $cwrKey !== 'gid' & $cwrKey !== 'crop_name' & $cwrKey !== 'crop_type') {
                //print "$cwrKey = $cwrValue <br />";
                $wkAccm = $wkNum+$i;
                //print $wkNum."</br>";
                if($wkAccm<=52){
                    $wkStart = 'w' . $wkAccm;  
                    $evap = queryEvep($wkStart, $alrCode);
                    $cwrWk = $cwrValue * $evap;
                    //print $wkStart."</br>";    
                    //print "update active_land_cwr set $wkStart=$cwrWk where alrcode='$alrCode'" . "</br>";
                    pg_query("update $active_land_cwr set $wkStart=$cwrWk where alrcode='$alrCode'");           
                }else{
                    $wkAccm2 = $wkAccm - 52;
                    $wkStart = 'w' . $wkAccm2; 
                    $evap = queryEvep($wkStart,$alrCode);
                    $cwrWk = $cwrValue * $evap;                   
                    //print $wkStart."</br>";    
                    //print "update active_land_cwr set $wkStart=$cwrWk where alrcode='$alrCode'" . "</br>";
                    pg_query("update $active_land_cwr set $wkStart=$cwrWk where alrcode='$alrCode'");
                }
                $i += 1;                
            }
        }
    } 
    //print "insert ok!!" ;
}


function cwr($alrCode, $active_land, $active_land_cwr)
{   
    $chkExist = chkActivelandcwr($alrCode, $active_land_cwr);
    //print $chkExist."</br>";

    $pacelSql = pg_query("SELECT alrcode, active_type, date_part('week'::text, active_date) AS wk FROM $active_land where alrcode='$alrCode'");

    if($chkExist==0){

        while ($pacelRow = pg_fetch_assoc($pacelSql)) {            

            //function print header field
            /*foreach ($pacelRow as $pacelKey => $pacelValue) {
                print "$pacelKey = $pacelValue <br />";
            }*/
            
            pg_query("INSERT INTO $active_land_cwr (alrcode, crop_type, active_wk) VALUES ('".$pacelRow['alrcode']."','".$pacelRow['active_type']."','".$pacelRow['wk']."')");

            $wkNum = $pacelRow['wk'];
            $cropType = $pacelRow['active_type'];
        }
        //print "noooooo not exist";

    }else{
        while ($pacelRow = pg_fetch_assoc($pacelSql)) {

            pg_query("UPDATE $active_land_cwr SET crop_type='".$pacelRow['active_type']."',active_wk='".$pacelRow['wk']."' WHERE alrcode='$alrCode'");

            $wkNum = $pacelRow['wk'];
            $cropType = $pacelRow['active_type'];
        }
        //print "yess exist";
    }
    
    insertCwr($alrCode, $wkNum, $cropType, $active_land_cwr);
      
}

$postData = file_get_contents("php://input");
$data = json_decode($postData);


foreach($data as $item => $value){        
        //echo "$item: $value<br/>";
    if($item=='ctype'){
        //echo "type1 $item: $value";
        $code = $data->code;
        $owner = $data->owner;
        $type = $data->ctype;
        $rai = $data->rai;
        $date = date('Y-m-d H:i:s',strtotime($data->date));
        $active_land = "active_land";
        $active_land_cwr ="active_land_cwr";
        updateActiveland($code, $owner, $type, $rai, $date, $active_land);
        cwr($code, $active_land, $active_land_cwr);
        //echo "updateActiveland($code, $owner, $type, $rai, $date, $active_land) cwr($code, $active_land, $active_land_cwr)";
    }elseif($item=='ctype2'){
        //echo "type2 $item: $value";
        $code = $data->code;
        $owner = $data->owner;
        $type = $data->ctype2;
        $rai = $data->rai2;
        $date = date('Y-m-d H:i:s',strtotime($data->date2));
        $active_land = "active_land2";
        $active_land_cwr ="active_land_cwr2";
        updateActiveland($code, $owner, $type, $rai, $date, $active_land);
        cwr($code, $active_land, $active_land_cwr);
        //echo "updateActiveland($code, $owner, $type, $rai, $date, $active_land) cwr($code, $active_land, $active_land_cwr)";
    }elseif($item=='ctype3'){
        //echo "type3 $item: $value";
        $code = $data->code;
        $owner = $data->owner;
        $type = $data->ctype3;
        $rai = $data->rai3;
        $date = date('Y-m-d H:i:s',strtotime($data->date3));
        $active_land = "active_land3";
        $active_land_cwr ="active_land_cwr3";
        updateActiveland($code, $owner, $type, $rai, $date, $active_land);
        cwr($code, $active_land, $active_land_cwr);
        //echo "updateActiveland($code, $owner, $type, $rai, $date, $active_land) cwr($code, $active_land, $active_land_cwr)";
    }
}

/*if($data->ctype != ""){
    echo 'type ok';
}elseif ($data->ctype2 != "") {
    echo 'type 2 ok';
}elseif ($data->ctype3 != "") {
    echo 'type 3 ok';
};*/

closedb();
?>

