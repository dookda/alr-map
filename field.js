Heron.gridColumns = [{
    featureType: 'alr_parcel',
    columns: [
        //colModule,
		//addEtc,
        /*{header: "",
            width: 120,
            renderer: function(value, metaData, record, rowIndex, colIndex, store) {
                var template = '<a target="_new" href="http://map.nu.ac.th/alr-map/route.html#/{alrcode}">เพิ่มข้อมูลเพาะปลูก</a>';
                var options = { attrNames: ['alrcode'] };
                return Heron.widgets.GridCellRenderer.substituteAttrValues(template, options, record);
            }
        },*/
        { header: 'รหัสแปลงที่ดิน สปก.', dataIndex: 'alrcode' },
        { header: 'เจ้าของแปลง', dataIndex: 'active_owner' },
        { header: 'เนื้อที่ทั้งหมดของแปลง ส.ป.ก. (ไร่)', dataIndex: 'spk_rai' },
        { header: 'ประเภทการใช้ประโยชน์ที่ดิน', dataIndex: 'active_type' },
        { header: 'เนื้อที่ที่ดำเนินกิจกรรม', dataIndex: 'active_rai' },
        { header: 'วันที่เริ่มดำเนินการ', dataIndex: 'active_date' },
        //{ header: 'รหัสตำบล', dataIndex: 'tam_code' },
        { header: 'ชื่อตำบล', dataIndex: 'tam_nam_t' },
        //{ header: 'รหัสอำเภอ', dataIndex: 'amp_code' },
        { header: 'ชื่ออำเภอ', dataIndex: 'amp_nam_t' },
        //{ header: 'รหัสจังหวัด', dataIndex: 'prov_code' },
        { header: 'ชื่อจังหวัด', dataIndex: 'prov_nam_t' },
        { header: 'รหัสชั้นคุณภาพลุ่มน้ำ', dataIndex: 'swh' },
        { header: 'ชื่อชั้นคุณภาพลุ่มน้ำ', dataIndex: 'swh_name' },
        { header: 'ความสูงเฉลี่ย (เมตร)', dataIndex: 'ele' },
        { header: 'ความลาดชัน (เปอร์เซ็นต์)', dataIndex: 'slp' },
        { header: 'ความเสี่ยงภัยแล้ง', dataIndex: 'dru' },
        { header: 'ความเสี่ยงน้ำท่วมซ้ำซาก (ปี)', dataIndex: 'flo' },
        //{ header: 'รหัสการใช้ประโยชน์ที่ดินปี 48 ', dataIndex: 'lu48' },
        //{ header: 'คำอธิบายการใช้ประโยชน์ที่ดินปี 48', dataIndex: 'lu48_t' },
        { header: 'รหัสการใช้ประโยชน์ที่ดินปี 57', dataIndex: 'lu57' },
        { header: 'คำอธิบายการใช้ประโยชน์ที่ดินปี 57', dataIndex: 'lu57_t' },
        { header: 'ความเหมาะสมในการปลูกข้าว', dataIndex: 'r_suit' },
        { header: 'ความเหมาะสมในการปลูกข้าวโพดเลี้ยงสัตว์', dataIndex: 'm_suit' },
        { header: 'ความเหมาะสมในการปลูกมัน', dataIndex: 'c_suit' },
        { header: 'ความเหมาะสมในการปลูกอ้อย', dataIndex: 's_suit' },
        { header: 'ความเหมาะสมในการปลูกพืชผัก', dataIndex: 'v_suit' },
        { header: 'ความเหมาะสมในการปลูกผลไม้', dataIndex: 'f_suit' },
        { header: 'ความเหมาะสมในการปลูกทุ่งหญ้าเลี้ยงสัตว์', dataIndex: 'p_suit' },
        { header: 'ระยะห่างจากหมู่บ้าน (กม.)', dataIndex: 'vill_km' },
        { header: 'ชื่อหมู่บ้าน', dataIndex: 'vill_nam_t' },
        { header: 'ระยะห่างจากสถานพยาบาล (กม.)', dataIndex: 'hcr_km' },
        { header: 'ชื่อสถานพยาบาล', dataIndex: 'hcr_name' },
        { header: 'ระยะห่างจากสถานีรถไฟ (กม.)', dataIndex: 'tst_km' },
        { header: 'ชื่อสถานีรถไฟ', dataIndex: 'tst_name' },
        { header: 'ระยะห่างจากเทศบาล (กม.)', dataIndex: 'mun_km' },
        { header: 'ชื่อเทศบาล', dataIndex: 'mun_name' },
        { header: 'ระยะห่างจากถนน (กม.)', dataIndex: 'roa_km' },
        { header: 'ลักษณะของถนน', dataIndex: 'roa_type' },
        { header: 'ระยะห่างจากทางรถไฟ (กม.)', dataIndex: 'rai_km' },
        { header: 'ลักษณะของทางรถไฟ', dataIndex: 'rai_type' },
        { header: 'ระยะห่างจากแม่น่ำสายหลัก และแม่น้ำสายรอง (กม.)', dataIndex: 'str_km' },
        { header: 'ชื่อแม่น่ำสายหลัก และแม่น้ำสายรอง', dataIndex: 'str_name' },
        { header: 'ระยะห่างจากแหล่งน้ำธรรมชาติ (กม.)', dataIndex: 'wbn_km' },
        { header: 'ชื่อแหล่งน้ำธรรมชาติ', dataIndex: 'wbn_name' },
        { header: 'ระยะห่างจากแหล่งน้ำที่ถูกสร้างขึ้น (กม.)', dataIndex: 'wbm_km' },
        { header: 'ชื่อแหล่งน้ำที่ถูกสร้างขึ้น', dataIndex: 'wbm_name' },
        { header: 'ระยะห่างจากชลประทาน (กม.)', dataIndex: 'irr_km' },
        { header: 'ชื่อชลประทาน', dataIndex: 'irr_name' },
        { header: 'ระยะห่างจากอุทยานแห่งชาติ (กม.)', dataIndex: 'nfp_km' },
        { header: 'ชื่ออุทยานแห่งชาติ', dataIndex: 'nfp_name' },
        { header: 'ระยะห่างจากป่าสงวนแห่งชาติ และเขตอนุรักษ์พันธุ์สัตว์ป่า (กม.)', dataIndex: 'rfp_km' },
        { header: 'ชื่อป่าสงวนแห่งชาติ และเขตอนุรักษ์พันธุ์สัตว์ป่า', dataIndex: 'rfp_name' },
        { header: 'ระยะห่างจากป่าอื่นๆ (กม.)', dataIndex: 'ofr_km' },
        { header: 'ชื่อป่าอื่นๆ', dataIndex: 'ofr_name' }
    ]
},{
    featureType: 'alr_parcel_query',
    columns: [
        //colModule,
		//addEtc,

        { header: 'รหัสแปลงที่ดิน สปก.', dataIndex: 'alrcode' },
        //{ header: 'เจ้าของแปลง', dataIndex: 'active_owner' },
      //  { header: 'เนื้อที่ทั้งหมดของแปลง ส.ป.ก. (ไร่)', dataIndex: 'spk_rai' },
        //{ header: 'ประเภทการใช้ประโยชน์ที่ดิน', dataIndex: 'active_type' },
        //{ header: 'เนื้อที่ที่ดำเนินกิจกรรม', dataIndex: 'active_rai' },
        //{ header: 'วันที่เริ่มดำเนินการ', dataIndex: 'active_date' },
        //{ header: 'รหัสตำบล', dataIndex: 'tam_code' },
        { header: 'ชื่อตำบล', dataIndex: 'tam_nam_t' },
        //{ header: 'รหัสอำเภอ', dataIndex: 'amp_code' },
        { header: 'ชื่ออำเภอ', dataIndex: 'amp_nam_t' },
        //{ header: 'รหัสจังหวัด', dataIndex: 'prov_code' },
        { header: 'ชื่อจังหวัด', dataIndex: 'prov_nam_t' },
        { header: 'รหัสชั้นคุณภาพลุ่มน้ำ', dataIndex: 'swh' },
        { header: 'ชื่อชั้นคุณภาพลุ่มน้ำ', dataIndex: 'swh_name' },
        { header: 'ความสูงเฉลี่ย (เมตร)', dataIndex: 'ele' },
        { header: 'ความลาดชัน (เปอร์เซ็นต์)', dataIndex: 'slp' },
        { header: 'ความเสี่ยงภัยแล้ง', dataIndex: 'dru' },
        { header: 'ความเสี่ยงน้ำท่วมซ้ำซาก (ปี)', dataIndex: 'flo' },
        //{ header: 'รหัสการใช้ประโยชน์ที่ดินปี 48 ', dataIndex: 'lu48' },
        //{ header: 'คำอธิบายการใช้ประโยชน์ที่ดินปี 48', dataIndex: 'lu48_t' },
        { header: 'รหัสการใช้ประโยชน์ที่ดินปี 57', dataIndex: 'lu57' },
        { header: 'คำอธิบายการใช้ประโยชน์ที่ดินปี 57', dataIndex: 'lu57_t' },
        { header: 'ความเหมาะสมในการปลูกข้าว', dataIndex: 'r_suit' },
        { header: 'ความเหมาะสมในการปลูกข้าวโพดเลี้ยงสัตว์', dataIndex: 'm_suit' },
        { header: 'ความเหมาะสมในการปลูกมัน', dataIndex: 'c_suit' },
        { header: 'ความเหมาะสมในการปลูกอ้อย', dataIndex: 's_suit' },
        { header: 'ความเหมาะสมในการปลูกพืชผัก', dataIndex: 'v_suit' },
        { header: 'ความเหมาะสมในการปลูกผลไม้', dataIndex: 'f_suit' },
        { header: 'ความเหมาะสมในการปลูกทุ่งหญ้าเลี้ยงสัตว์', dataIndex: 'p_suit' },
        { header: 'ระยะห่างจากหมู่บ้าน (กม.)', dataIndex: 'vill_km' },
        { header: 'ชื่อหมู่บ้าน', dataIndex: 'vill_nam_t' },
        { header: 'ระยะห่างจากสถานพยาบาล (กม.)', dataIndex: 'hcr_km' },
        { header: 'ชื่อสถานพยาบาล', dataIndex: 'hcr_name' },
        { header: 'ระยะห่างจากสถานีรถไฟ (กม.)', dataIndex: 'tst_km' },
        { header: 'ชื่อสถานีรถไฟ', dataIndex: 'tst_name' },
        { header: 'ระยะห่างจากเทศบาล (กม.)', dataIndex: 'mun_km' },
        { header: 'ชื่อเทศบาล', dataIndex: 'mun_name' },
        { header: 'ระยะห่างจากถนน (กม.)', dataIndex: 'roa_km' },
        { header: 'ลักษณะของถนน', dataIndex: 'roa_type' },
        { header: 'ระยะห่างจากทางรถไฟ (กม.)', dataIndex: 'rai_km' },
        { header: 'ลักษณะของทางรถไฟ', dataIndex: 'rai_type' },
        { header: 'ระยะห่างจากแม่น่ำสายหลัก และแม่น้ำสายรอง (กม.)', dataIndex: 'str_km' },
        { header: 'ชื่อแม่น่ำสายหลัก และแม่น้ำสายรอง', dataIndex: 'str_name' },
        { header: 'ระยะห่างจากแหล่งน้ำธรรมชาติ (กม.)', dataIndex: 'wbn_km' },
        { header: 'ชื่อแหล่งน้ำธรรมชาติ', dataIndex: 'wbn_name' },
        { header: 'ระยะห่างจากแหล่งน้ำที่ถูกสร้างขึ้น (กม.)', dataIndex: 'wbm_km' },
        { header: 'ชื่อแหล่งน้ำที่ถูกสร้างขึ้น', dataIndex: 'wbm_name' },
        { header: 'ระยะห่างจากชลประทาน (กม.)', dataIndex: 'irr_km' },
        { header: 'ชื่อชลประทาน', dataIndex: 'irr_name' },
        { header: 'ระยะห่างจากอุทยานแห่งชาติ (กม.)', dataIndex: 'nfp_km' },
        { header: 'ชื่ออุทยานแห่งชาติ', dataIndex: 'nfp_name' },
        { header: 'ระยะห่างจากป่าสงวนแห่งชาติ และเขตอนุรักษ์พันธุ์สัตว์ป่า (กม.)', dataIndex: 'rfp_km' },
        { header: 'ชื่อป่าสงวนแห่งชาติ และเขตอนุรักษ์พันธุ์สัตว์ป่า', dataIndex: 'rfp_name' },
        { header: 'ระยะห่างจากป่าอื่นๆ (กม.)', dataIndex: 'ofr_km' },
        { header: 'ชื่อป่าอื่นๆ', dataIndex: 'ofr_name' }
    ]
},
// ข้อมูลสนับสนุนแหล่งน้ำ
{
    featureType: 'wsupply_rain',
    columns: [
        //colModule,
		//addEtc,
       
        { header: 'ปริมาณน้ำฝน(ลบ.ม./ไร่/ปี)', dataIndex: 'Rain' },


    ]
},
{
    featureType: 'wsupply_runoff',
    columns: [
        //colModule,
		//addEtc,
        
        { header: 'ปริมาณน้ำท่า (ลบ.ม./ไร่/ปี)', dataIndex: 'runoff' },


    ]
},
{
    featureType: 'wsupply_gwat',
    columns: [
        //colModule,
		//addEtc,
      
        { header: 'ปริมาณน้ำใต้ดิน  (ลบ.ม./วินาที)', dataIndex: 'gwater'},


    ]
},
{
    featureType: 'ln9p_gwat_dept_4326',
    columns: [
        //colModule,
		//addEtc,
      
        { header: 'ความลึกน้ำใต้ดิน (ลบ.ม./วินาที)', dataIndex: 'detp'},


    ]
},
//ขอบเขตการปกครอง
{
    featureType: 'ln9p_vill',
    columns: [
        //colModule,
		//addEtc,
        //{ header: 'รหัสหมู่บ้าน', dataIndex: 'Vill_code' },
        { header: 'ชื่อหมู่บ้าน', dataIndex: 'vill_nam_t'},
        //{ header: 'รหัสตำบล', dataIndex: 'tam_code' },
        { header: 'ชื่อตำบล', dataIndex: 'tam_nam_t'},
       // { header: 'รหัสอำเภอ', dataIndex: 'amp_code' },
        { header: 'ชื่ออำภอ', dataIndex: 'amp_nam_t'},
        //{ header: 'รหัสจังหวัด', dataIndex: 'prov_code' },
        { header: 'ชื่อจังหวัด', dataIndex: 'prov_nam_t'},

    ]
},
{
    featureType: 'ln9p_tam',
    columns: [
        //colModule,
		//addEtc,
		{ header: 'เนื้อที่ (ตร.กม.)', dataIndex: 'sqkm' },
		{ header: 'เนื้อที่(ไร่)', dataIndex: 'rai' },
        //{ header: 'รหัสตำบล', dataIndex: 'tam_code' },
        { header: 'ชื่อตำบล', dataIndex: 'tam_nam_t'},
        //{ header: 'รหัสอำเภอ', dataIndex: 'amp_code' },
        { header: 'ชื่ออำภอ_ภาษาไทย', dataIndex: 'amp_nam_t'},
		{ header: 'ชื่ออำภอ_ภาษาอังกฤษ', dataIndex: 'amp_nam_e'},
        //{ header: 'รหัสจังหวัด', dataIndex: 'prov_code' },
        { header: 'ชื่อจังหวัด_ภาษาไทย', dataIndex: 'prov_nam_t'},
		{ header: 'ชื่อจังหวัด_ภาษาอังกฤษ', dataIndex: 'prov_nam_e'},

    ]
},
{
    featureType: 'ln9p_amp',
    columns: [
        //colModule,
		//addEtc,
		{ header: 'เนื้อที่ (ตร.กม.)', dataIndex: 'sqkm' },
		{ header: 'เนื้อที่(ไร่)', dataIndex: 'rai' },
        { header: 'ชื่อ_ภาษาไทย', dataIndex: 'amp_nam_t' },
        { header: 'ชื่อ_ภาษาอังกฤษ', dataIndex: 'amp_nam_e'},


    ]
},
{
    featureType: 'ln9p_prov',
    columns: [
        //colModule,
		//addEtc,
		{ header: 'เนื้อที่ (ตร.กม.)', dataIndex: 'sqkm' },
		{ header: 'เนื้อที่(ไร่)', dataIndex: 'rai' },
        { header: 'รหัสจังหวัด', dataIndex: 'prov_code' },
        { header: 'ชื่อ_ภาษาไทย', dataIndex: 'prov_nam_t'},
		{ header: 'ชื่อ_ภาษาอังกฤษ', dataIndex: 'prov_nam_e'},

    ]
},
{
    featureType: 'municiple',
    columns: [
        //colModule,
		//addEtc,
		{ header: 'เนื้อที่ (ตร.กม.)', dataIndex: 'sqkm' },
		{ header: 'เนื้อที่(ไร่)', dataIndex: 'rai' },
        { header: 'ชื่อเทศบาล', dataIndex: 'muni_nam_t'},

    ]
},
//น้ำ
{
    featureType: 'stream',
    columns: [
        //colModule,
		//addEtc,
		{ header: 'ความยาว (กม.)', dataIndex: 'length_km' },
        { header: 'ชื่อ_ภาษาไทย', dataIndex: 'muni_nam_t'},
		{ header: 'ชื่อ_ภาษาอังกฤษ', dataIndex: 'muni_nam_e'},
		{ header: 'ประเภท', dataIndex: 'rai' },

    ]
},
{
    featureType: 'ln9p_wat_manmade_4326',
    columns: [
        //colModule,
		//addEtc,
		{ header: 'เนื้อที่ (ตร.กม.)', dataIndex: 'sqkm' },
		{ header: 'เนื้อที่(ไร่)', dataIndex: 'rai' },
        { header: 'ชื่อ_ภาษาไทย', dataIndex: 'wb_nam_t'},
		{ header: 'ชื่อ_ภาษาอังกฤษ', dataIndex: 'wb_nam_e'},

    ]
},
{
    featureType: 'ln9p_wat_natural_4326',
    columns: [
        //colModule,
		//addEtc,
		{ header: 'เนื้อที่ (ตร.กม.)', dataIndex: 'sqkm' },
		{ header: 'เนื้อที่(ไร่)', dataIndex: 'rai' },
        { header: 'ชื่อ_ภาษาไทย', dataIndex: 'wb_nam_t'},
		{ header: 'ชื่อ_ภาษาอังกฤษ', dataIndex: 'wb_nam_e'},

    ]
},
{
    featureType: 'ln9p_irr_4326',
    columns: [
        //colModule,
		//addEtc,
		{ header: 'เนื้อที่ (ตร.กม.)', dataIndex: 'sqkm' },
		{ header: 'เนื้อที่(ไร่)', dataIndex: 'rai' },
        { header: 'ชื่อ', dataIndex: 'prj_name'},


    ]
},
//ข้อมูลพื้นฐาน
{
    featureType: 'forestc',
    columns: [
        //colModule,
		//addEtc,
		{ header: 'เนื้อที่ (ตร.กม.)', dataIndex: 'sqkm'},
		{ header: 'เนื้อที่(ไร่)', dataIndex: 'rai' },
        { header: 'ชื่อ', dataIndex: 'for_nam_t'},
		{ header: 'ประเภท', dataIndex: 'type_t'},

    ]
},
{
    featureType: 'trans',
    columns: [
        //colModule,
		//addEtc,
		{ header: 'ความยาว (กม.)', dataIndex: 'length_km' },
        { header: 'ประเภท', dataIndex: 'typ_t'},
		{ header: 'ชื่อ', dataIndex: 'name_t'},

    ]
},
//ที่ตั้งสถานที่สำคัญ
{
    featureType: 'stabus',
    columns: [
        //colModule,
		//addEtc,
        { header: 'ชื่อ', dataIndex: 'bus_nam'},
		{ header: 'ที่ตั้ง', dataIndex: 'bus_add'},

    ]
},
{
    featureType: 'staairport',
    columns: [
        //colModule,
		//addEtc,
		{ header: 'เนื้อที่ (ตร.กม.)', dataIndex: 'sqkm'},
		{ header: 'เนื้อที่(ไร่)', dataIndex: 'rai' },
		{ header: 'ชื่อ', dataIndex: 'air_nam'},
		{ header: 'ที่ตั้ง', dataIndex: 'air_add' },
        { header: 'pass1999', dataIndex: 'pass1999'},
		{ header: 'pass2000', dataIndex: 'pass2000'},
		{ header: 'pass2001', dataIndex: 'pass2001'},
		{ header: 'pass2002', dataIndex: 'pass2002'},
		{ header: 'pass2003', dataIndex: 'pass2003'},
		{ header: 'flight1999', dataIndex: 'flight1999'},
		{ header: 'flight2000', dataIndex: 'flight2000'},
		{ header: 'flight2001', dataIndex: 'flight2001'},
		{ header: 'flight2002', dataIndex: 'flight2002'},
		{ header: 'flight2003', dataIndex: 'flight2003'},
		{ header: 'cargo1999', dataIndex: 'cargo1999'},
		{ header: 'cargo2000', dataIndex: 'cargo2000'},
		{ header: 'cargo2001', dataIndex: 'cargo2001'},
		{ header: 'cargo2002', dataIndex: 'cargo2002'},
		{ header: 'cargo2003', dataIndex: 'cargo2003'},
		{ header: 'สถานะ', dataIndex: 'air_stus'},

    ]
},
{
    featureType: 'factory',
    columns: [
        //colModule,
		//addEtc,

		{ header: 'ชื่อ', dataIndex: 'fac_name_t'},
		{ header: 'คำอธิบาย_ภาษาไทย', dataIndex: 'desc_t' },
       { header: 'คำอธิบาย__ภาษาอังกฤษ', dataIndex: 'desc_e' },
		{ header: 'ประเภท', dataIndex: 'fac_agtyp'},
		{ header: 'ตำบล', dataIndex: 'tam_name'},
		{ header: 'อำเภอ', dataIndex: 'amp_name'},
		{ header: 'จังหวัด', dataIndex: 'prov_name'},
    ]
},
{
    featureType: 'factory',
    columns: [
        //colModule,
		//addEtc,

		{ header: 'ชื่อ', dataIndex: 'name'},
		

    ]
},
{
    featureType: 'school',
    columns: [
        //colModule,
		//addEtc,

		{ header: 'ชื่อ', dataIndex: 'name'},
		

    ]
},
{
    featureType: 'anamai',
    columns: [
        //colModule,
		//addEtc,

		{ header: 'ชื่อ', dataIndex: 'name'},
		

    ]
},
{
    featureType: 'hospital2',
    columns: [
        //colModule,
		//addEtc,

		{ header: 'ชื่อ', dataIndex: 'name'},
		

    ]
}];
