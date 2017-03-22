<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    include "../lib/sel_config.php";
    conndb();

    $data = $_GET['data'];

    $val = $_GET['val'];
    
        //site selection
         if ($data=='province') { 
              echo "<select class='form-control' name='province' onChange=\"dochange('amphoe', this.value)\">";
              echo "<option value='0'>- เลือกจังหวัด -</option>\n";
              $result=pg_query("select * from ln9p_prov order by prov_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value='$row[prov_code]' >$row[prov_nam_t]</option>" ;
              }
         } else if ($data=='amphoe') {
              echo "<select class='form-control' name='amphoe' onChange=\"dochange('tambon', this.value)\">";
              echo "<option value='0'>- เลือกอำเภอ -</option>\n";                             
              $result=pg_query("SELECT * FROM ln9p_amp WHERE prov_code= '$val' ORDER BY amp_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[amp_code]\" >$row[amp_nam_t]</option> " ;
              }
         } else if ($data=='tambon') {
              echo "<select class='form-control' name='tambon'>\n";
              echo "<option value='0'>- เลือกตำบล -</option>\n";
              $result=pg_query("SELECT * FROM ln9p_tam WHERE amp_code= '$val' ORDER BY tam_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[tam_code]\" >$row[tam_nam_t]</option> \n" ;
              }
         }

        // parcel register 
         if ($data=='province2') { 
              echo "<select class='form-control' name='province2' onChange=\"dochange('amphoe2', this.value)\">";
              echo "<option value='0'>- เลือกจังหวัด -</option>\n";
              $result=pg_query("select * from ln9p_prov order by prov_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value='$row[prov_code]' >$row[prov_nam_t]</option>" ;
              }
         } else if ($data=='amphoe2') {
              echo "<select class='form-control' name='amphoe2' onChange=\"dochange('tambon2', this.value)\">";
              echo "<option value='0'>- เลือกอำเภอ -</option>\n";                             
              $result=pg_query("SELECT * FROM ln9p_amp WHERE prov_code= '$val' ORDER BY amp_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[amp_code]\" >$row[amp_nam_t]</option> " ;
              }
         } else if ($data=='tambon2') {
              echo "<select class='form-control' name='tambon2'>\n";
              echo "<option value='0'>- เลือกตำบล -</option>\n";
              $result=pg_query("SELECT * FROM ln9p_tam WHERE amp_code= '$val' ORDER BY tam_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[tam_code]\" >$row[tam_nam_t]</option> \n" ;
              }
         }

         // parcel summarize
         if ($data=='province3') { 
              echo "<select class='form-control' name='province3' onChange=\"dochange('amphoe3', this.value)\">";
              echo "<option value='0'>- เลือกจังหวัด -</option>\n";
              $result=pg_query("select * from ln9p_prov order by prov_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value='$row[prov_code]' >$row[prov_nam_t]</option>" ;
              }
         } else if ($data=='amphoe3') {
              echo "<select class='form-control' name='amphoe3' onChange=\"dochange('tambon3', this.value)\">";
              echo "<option value='0'>- เลือกอำเภอ -</option>\n";                             
              $result=pg_query("SELECT * FROM ln9p_amp WHERE prov_code= '$val' ORDER BY amp_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[amp_code]\" >$row[amp_nam_t]</option> " ;
              }
         } else if ($data=='tambon3') {
              echo "<select class='form-control' name='tambon3'>\n";
              echo "<option value='0'>- เลือกตำบล -</option>\n";
              $result=pg_query("SELECT * FROM ln9p_tam WHERE amp_code= '$val' ORDER BY tam_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[tam_code]\" >$row[tam_nam_t]</option> \n" ;
              }
         }

    // progress bar
         if ($data=='province4') { 
              echo "<select class='form-control' name='province4' onChange=\"dochange('amphoe4', this.value)\">";
              echo "<option value='0'>- เลือกจังหวัด -</option>\n";
              $result=pg_query("select * from ln9p_prov order by prov_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value='$row[prov_code]' >$row[prov_nam_t]</option>" ;
              }
         } else if ($data=='amphoe4') {
              echo "<select class='form-control' name='amphoe4' onChange=\"dochange('tambon4', this.value)\">";
              echo "<option value='0'>- เลือกอำเภอ -</option>\n";                             
              $result=pg_query("SELECT * FROM ln9p_amp WHERE prov_code= '$val' ORDER BY amp_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[amp_code]\" >$row[amp_nam_t]</option> " ;
              }
         } else if ($data=='tambon4') {
              echo "<select class='form-control' name='tambon4'>\n";
              echo "<option value='0'>- เลือกตำบล -</option>\n";
              $result=pg_query("SELECT * FROM ln9p_tam WHERE amp_code= '$val' ORDER BY tam_nam_t");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[tam_code]\" >$row[tam_nam_t]</option> \n" ;
              }
         }



         echo "</select>\n";
        
        //echo pg_error();
        closedb();
?>
