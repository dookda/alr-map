<?php


include "../../../lib/sel_config.php";
conndb();
$i=0;
$result = pg_query("SELECT alrcode FROM alr_parcel limit 10"); 
while ($row = pg_fetch_assoc($result)) {
    foreach($row as $key => $value) {            
            echo $value.'<br/>';  
            mkdir($value);
        }
    
}

?>