<?php
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

    require('../lib/conn.php');
    $dbconn = pg_connect($conn_alr) or die('Could not connect'); 

	
function getData($col,$val,$alrcode){

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


function cwr($alrCode, $crop_type, $rai, $active_date, $active_land_cwr)
{   
    $chkExist = chkActivelandcwr($alrCode, $active_land_cwr);
    //print $chkExist."</br>";

    $pacelSql = pg_query("SELECT alrcode, $crop_type as active_type, $rai as rai, date_part('week'::text, $active_date) AS wk FROM alr_mobile where alrcode='$alrCode'");

    if($chkExist==0){

        while ($pacelRow = pg_fetch_assoc($pacelSql)) {            

            //function print header field
            /*foreach ($pacelRow as $pacelKey => $pacelValue) {
                print "$pacelKey = $pacelValue <br />";
            }*/
            
            pg_query("INSERT INTO $active_land_cwr (alrcode, crop_type, active_wk, rai) VALUES ('".$pacelRow['alrcode']."','".$pacelRow['active_type']."','".$pacelRow['wk']."',".$pacelRow['rai'].")");

            $wkNum = $pacelRow['wk'];
            $cropType = $pacelRow['active_type'];
        }
        //print "noooooo not exist";

    }else{
        while ($pacelRow = pg_fetch_assoc($pacelSql)) {

            pg_query("UPDATE $active_land_cwr SET crop_type='".$pacelRow['active_type']."', active_wk='".$pacelRow['wk']."',".$pacelRow['rai']." WHERE alrcode='$alrCode'");

            $wkNum = $pacelRow['wk'];
            $cropType = $pacelRow['active_type'];
        }
        //print "yess exist";
    }
    
    insertCwr($alrCode, $wkNum, $cropType, $active_land_cwr);
      
}


$postdata = file_get_contents("php://input");
if (isset($postdata)) {
    $request = json_decode($postdata);
    $alrcode = $request->alrcode;
        
    foreach($request as $item => $value){
        getData($item,$value,$alrcode);
        //echo $item;
        //echo $value
    }

    foreach($request as $item => $value){
        if($item=='c1_name'){
            //echo $value;
            cwr($alrcode, "c1_name", "c1_rai", "c1_grow", "active_land_cwr");

        }elseif($item=='c2_name'){
            //echo $value;
            cwr($alrcode, "c2_name", "c2_rai", "c2_grow", "active_land_cwr2");

        }elseif($item=='c3_name'){
            //echo $value;        
            cwr($alrcode, "c3_name", "c3_rai", "c3_grow", "active_land_cwr3");
        };
    }

    echo 'ส่งข้อมูลสำเร็จ';
}else {
    echo "Not called properly with username parameter!";
}


// Closing connection
pg_close($dbconn);
?>