<?php
    require('../lib/conn.php');
    $dbconn = pg_connect($conn_alr) or die('Could not connect');


function chkActivelandcwr($alrcode){
    //$check = "SELECT alrcode FROM active_land WHERE alrcode = '$code'";
    $rs = pg_query("select alrcode from active_land_cwr where alrcode = '$alrcode'");
    $data = pg_fetch_array($rs);

    if ($data[0] == $alrcode)
    {    
    return 1;
    }
  else
    {
    return 0;
    }
}


function queryEvep($week,$alrCode){
    $tam = explode("-",$alrCode);
    //print $tam[0]."</br>";
    //print $week."</br>";
    $pacelSql = pg_query("select * from evap30y where tam_code='$tam[0]'");
    while ($pacelRow = pg_fetch_assoc($pacelSql)) {
        //print $pacelRow["$week"]."</br>";
        return $pacelRow["$week"];
    }
}

function insertCwr($alrCode, $wkNum, $cropType){
    $i      = 0;
    $cwrSql = pg_query("select * from cwr where crop_type='$cropType'");
    while ($cwrRow = pg_fetch_assoc($cwrSql)) {
        foreach ($cwrRow as $cwrKey => $cwrValue) {
            
            if ($cwrValue !== null & $cwrKey !== 'gid' & $cwrKey !== 'crop_name' & $cwrKey !== 'crop_type') {
                //print "$cwrKey = $cwrValue <br />";

                $wkAccm = $wkNum+$i;
                //print $wkNum."</br>";
                if($wkAccm<=52){
                    $wkStart = 'w' . $wkAccm;  
                    $evap = queryEvep($wkStart,$alrCode);
                    $cwrWk = $cwrValue * $evap;
                    //print $wkStart."</br>";    
                    //print "update active_land_cwr set $wkStart=$cwrWk where alrcode='$alrCode'" . "</br>";
                    pg_query("update active_land_cwr set $wkStart=$cwrWk where alrcode='$alrCode'");           
                }else{
                    $wkAccm2 = $wkAccm - 52;
                    $wkStart = 'w' . $wkAccm2; 
                    $evap = queryEvep($wkStart,$alrCode);
                    $cwrWk = $cwrValue * $evap;                   
                    //print $wkStart."</br>";    
                    //print "update active_land_cwr set $wkStart=$cwrWk where alrcode='$alrCode'" . "</br>";
                    pg_query("update active_land_cwr set $wkStart=$cwrWk where alrcode='$alrCode'");
                }

                $i += 1;
                
            }
        }
    } 
    //print "insert ok!!" ;
}

function cwr($alrCode)
{   
    $chkExist = chkActivelandcwr($alrCode);
    //print $chkExist."</br>";

    $pacelSql = pg_query("SELECT alrcode, active_type, date_part('week'::text, active_date) AS wk FROM active_land where alrcode='$alrCode'");

    if($chkExist==0){

        while ($pacelRow = pg_fetch_assoc($pacelSql)) {            

            //function print header field
            /*foreach ($pacelRow as $pacelKey => $pacelValue) {
                print "$pacelKey = $pacelValue <br />";
            }*/
            
            pg_query("INSERT INTO active_land_cwr (alrcode, crop_type, active_wk) VALUES ('".$pacelRow['alrcode']."','".$pacelRow['active_type']."','".$pacelRow['wk']."')");

            $wkNum = $pacelRow['wk'];
            $cropType = $pacelRow['active_type'];
        }
        //print "noooooo not exist </br>";

    }else{
        while ($pacelRow = pg_fetch_assoc($pacelSql)) {

            pg_query("UPDATE active_land_cwr SET crop_type='".$pacelRow['active_type']."',active_wk='".$pacelRow['wk']."' WHERE alrcode='$alrCode'");

            $wkNum = $pacelRow['wk'];
            $cropType = $pacelRow['active_type'];
        }
        //print "yess exist </br>";
    }
    
    insertCwr($alrCode, $wkNum, $cropType);
      
}

$alrcode  = "650113-245488";
cwr($alrcode);

// Closing connection
pg_close($dbconn);




?>