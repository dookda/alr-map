<?php
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

	include "../lib/sel_config.php";
    conndb();

	
function getData($wk){     
        $sql_plang_cur = "CREATE OR REPLACE VIEW alr_sum_cwr_current_wk_parcel AS 
        		WITH 
        		cwr1 AS (SELECT cwr1.alrcode, cwr1.crop_type, cwr1.rai, COALESCE(cwr1.$wk,0) as sum_cwr1 FROM active_land_cwr cwr1),
  				cwr2 AS (SELECT cwr2.alrcode, cwr2.crop_type, cwr2.rai, COALESCE(cwr2.$wk,0) as sum_cwr2 FROM active_land_cwr2 cwr2),
  				cwr3 AS (SELECT cwr3.alrcode, cwr3.crop_type, cwr3.rai, COALESCE(cwr3.$wk,0) as sum_cwr3 FROM active_land_cwr3 cwr3)        
 				SELECT  
 				a.geom, a.alrcode,
    			b.crop_type AS crop_1,
			    b.rai AS crop_1_rai,
			    b.sum_cwr1 AS cwr1_mm,
			    b.rai::numeric * 1600::numeric * COALESCE(b.sum_cwr1/1000,0::numeric) AS cwr1_m3,
			    c.crop_type AS crop_2,
			    c.rai AS crop_2_rai,
			    c.sum_cwr2 AS cwr2_mm,
			    c.rai::numeric * 1600::numeric * COALESCE(c.sum_cwr2/1000,0::numeric) AS cwr2_m3,
			    d.crop_type AS crop_3,
			    d.rai AS crop_3_rai,
			    d.sum_cwr3 AS cwr3_mm,
			    d.rai::numeric * 1600::numeric * COALESCE(d.sum_cwr3/1000,0::numeric) AS cwr3_m3,
			    b.rai + c.rai + d.rai AS crop_total,
			    COALESCE(b.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(b.sum_cwr1/1000, 0::numeric) + COALESCE(c.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(c.sum_cwr2/1000, 0::numeric) + COALESCE(d.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(d.sum_cwr3/1000, 0::numeric) AS cwr_total
  
		   		FROM 
		   		alr_plang a
		     	LEFT JOIN cwr1 b ON a.alrcode::text = b.alrcode::text
		     	LEFT JOIN cwr2 c ON a.alrcode::text = c.alrcode::text
		     	LEFT JOIN cwr3 d ON a.alrcode::text = d.alrcode::text";

		$sql_tam_cur = "CREATE OR REPLACE VIEW alr_sum_cwr_current_wk_tam AS 
        		WITH 
		        cwr1 AS (SELECT left(cwr1.alrcode,6) as tam_code, cwr1.crop_type, cwr1.rai, COALESCE(cwr1.$wk,0) as sum_cwr1 FROM active_land_cwr cwr1),
			  	cwr2 AS (SELECT left(cwr2.alrcode,6) as tam_code, cwr2.crop_type, cwr2.rai, COALESCE(cwr2.$wk,0) as sum_cwr2 FROM active_land_cwr2 cwr2),
			  	cwr3 AS (SELECT left(cwr3.alrcode,6) as tam_code, cwr3.crop_type, cwr3.rai, COALESCE(cwr3.$wk,0) as sum_cwr3 FROM active_land_cwr3 cwr3)        
			 	SELECT
			 	a.geom, a.tam_code, a.tam_nam_t,
			    sum(b.rai) AS crop_1_rai,
			    sum(b.rai::numeric * 1600::numeric * COALESCE(b.sum_cwr1/1000,0::numeric)) AS cwr1_m3,
			    sum(c.rai) AS crop_2_rai,
			    sum(c.rai::numeric * 1600::numeric * COALESCE(c.sum_cwr2/1000,0::numeric)) AS cwr2_m3,
			    sum(d.rai) AS crop_3_rai,
			    sum(d.rai::numeric * 1600::numeric * COALESCE(d.sum_cwr3/1000,0::numeric)) AS cwr3_m3,
			    sum(COALESCE(b.rai::numeric, 0::numeric)) + sum(COALESCE(c.rai::numeric, 0::numeric)) + sum(COALESCE(d.rai::numeric, 0::numeric)) AS crop_total,
			    sum(COALESCE(b.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(b.sum_cwr1/1000, 0::numeric)) + sum(COALESCE(c.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(c.sum_cwr2/1000, 0::numeric)) + sum(COALESCE(d.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(d.sum_cwr3/1000, 0::numeric)) AS cwr_total


				FROM 
				ln9p_tam a
				LEFT JOIN cwr1 b ON a.tam_code::text = b.tam_code::text
				LEFT JOIN cwr2 c ON a.tam_code::text = c.tam_code::text
				LEFT JOIN cwr3 d ON a.tam_code::text = d.tam_code::text
				group by a.geom, a.tam_code, a.tam_nam_t";

		$sql_amp_cur = "CREATE OR REPLACE VIEW alr_sum_cwr_current_wk_amp AS 
				WITH 
		        cwr1 AS (SELECT left(cwr1.alrcode,4) as amp_code, cwr1.crop_type, cwr1.rai, COALESCE(cwr1.$wk,0) as sum_cwr1 FROM active_land_cwr cwr1),
			  	cwr2 AS (SELECT left(cwr2.alrcode,4) as amp_code, cwr2.crop_type, cwr2.rai, COALESCE(cwr2.$wk,0) as sum_cwr2 FROM active_land_cwr2 cwr2),
			  	cwr3 AS (SELECT left(cwr3.alrcode,4) as amp_code, cwr3.crop_type, cwr3.rai, COALESCE(cwr3.$wk,0) as sum_cwr3 FROM active_land_cwr3 cwr3)        
			 	SELECT
			 	a.geom, a.amp_code, a.amp_nam_t,
			    sum(b.rai) AS crop_1_rai,
			    sum(b.rai::numeric * 1600::numeric * COALESCE(b.sum_cwr1/1000,0::numeric)) AS cwr1_m3,
			    sum(c.rai) AS crop_2_rai,
			    sum(c.rai::numeric * 1600::numeric * COALESCE(c.sum_cwr2/1000,0::numeric)) AS cwr2_m3,
			    sum(d.rai) AS crop_3_rai,
			    sum(d.rai::numeric * 1600::numeric * COALESCE(d.sum_cwr3/1000,0::numeric)) AS cwr3_m3,
			    sum(COALESCE(b.rai::numeric, 0::numeric)) + sum(COALESCE(c.rai::numeric, 0::numeric)) + sum(COALESCE(d.rai::numeric, 0::numeric)) AS crop_total,
			    sum(COALESCE(b.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(b.sum_cwr1/1000, 0::numeric)) + sum(COALESCE(c.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(c.sum_cwr2/1000, 0::numeric)) + sum(COALESCE(d.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(d.sum_cwr3/1000, 0::numeric)) AS cwr_total


				FROM 
				ln9p_amp a
				LEFT JOIN cwr1 b ON a.amp_code::text = b.amp_code::text
				LEFT JOIN cwr2 c ON a.amp_code::text = c.amp_code::text
				LEFT JOIN cwr3 d ON a.amp_code::text = d.amp_code::text
				group by a.geom, a.amp_code, a.amp_nam_t";	

		$sql_prov_cur = "CREATE OR REPLACE VIEW alr_sum_cwr_current_wk_prov AS 
		        WITH 
		        cwr1 AS (SELECT left(cwr1.alrcode,2) as prov_code, cwr1.crop_type, cwr1.rai, COALESCE(cwr1.$wk,0) as sum_cwr1 FROM active_land_cwr cwr1),
			  	cwr2 AS (SELECT left(cwr2.alrcode,2) as prov_code, cwr2.crop_type, cwr2.rai, COALESCE(cwr2.$wk,0) as sum_cwr2 FROM active_land_cwr2 cwr2),
			  	cwr3 AS (SELECT left(cwr3.alrcode,2) as prov_code, cwr3.crop_type, cwr3.rai, COALESCE(cwr3.$wk,0) as sum_cwr3 FROM active_land_cwr3 cwr3)        
			 	SELECT
			 	a.geom, a.prov_code, a.prov_nam_t,
			    sum(b.rai) AS crop_1_rai,
			    sum(b.rai::numeric * 1600::numeric * COALESCE(b.sum_cwr1/1000,0::numeric)) AS cwr1_m3,
			    sum(c.rai) AS crop_2_rai,
			    sum(c.rai::numeric * 1600::numeric * COALESCE(c.sum_cwr2/1000,0::numeric)) AS cwr2_m3,
			    sum(d.rai) AS crop_3_rai,
			    sum(d.rai::numeric * 1600::numeric * COALESCE(d.sum_cwr3/1000,0::numeric)) AS cwr3_m3,
			    sum(COALESCE(b.rai::numeric, 0::numeric)) + sum(COALESCE(c.rai::numeric, 0::numeric)) + sum(COALESCE(d.rai::numeric, 0::numeric)) AS crop_total,
			    sum(COALESCE(b.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(b.sum_cwr1/1000, 0::numeric)) + sum(COALESCE(c.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(c.sum_cwr2/1000, 0::numeric)) + sum(COALESCE(d.rai::numeric, 0::numeric) * 1600::numeric * COALESCE(d.sum_cwr3/1000, 0::numeric)) AS cwr_total


				FROM 
				ln9p_prov a
				LEFT JOIN cwr1 b ON a.prov_code::text = b.prov_code::text
				LEFT JOIN cwr2 c ON a.prov_code::text = c.prov_code::text
				LEFT JOIN cwr3 d ON a.prov_code::text = d.prov_code::text
				group by a.geom, a.prov_code, a.prov_nam_t";

        pg_query($sql_plang_cur); 
        pg_query($sql_tam_cur);
        pg_query($sql_amp_cur);
        pg_query($sql_prov_cur);
        echo 'updated';
}

//$ddate = "2012-10-18";
$currentWeekNumber = date('W');
$wk = 'w'.$currentWeekNumber;
echo 'Week number:' . $wk;
getData($wk);
closedb();
?>