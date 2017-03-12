Ext.namespace("Heron.options");
Ext.namespace("Heron.scratch");
Ext.namespace("Heron.examples");

OpenLayers.Util.onImageLoadErrorColor = "transparent";
OpenLayers.ProxyHost = "/cgi-bin/proxy.cgi?url=";
OpenLayers.DOTS_PER_INCH = 25.4 / 0.28;

Ext.BLANK_IMAGE_URL = 'http://cdnjs.cloudflare.com/ajax/libs/extjs/3.4.1-1/resources/images/default/s.gif';

Ext.namespace("Heron.options.map");
//Ext.namespace("Heron.PDOK");

Heron.options.map.settings = {
    projection: 'EPSG:900913',
	displayProjection: new OpenLayers.Projection("EPSG:4326"),
	units: 'm',
	maxExtent: '-20037508.34, -20037508.34, 20037508.34, 20037508.34',
	center: '11141190.727,1458223.243',
	maxResolution: '156543.0339',//'0.17578125',
	xy_precision: 5,
	zoom: 6,
	theme: null
};


Ext.namespace("Heron.options.wfs");
Heron.options.wfs.downloadFormats = [
    {
        name: 'CSV',
        outputFormat: 'csv',
        fileExt: '.csv'
    }
];

Heron.scratch.urls = {
	OWS: 'http://localhost:8080/geoserver/ows?'
};

Heron.scratch.layermap = {
    //BaseLayers
	gstr: new OpenLayers.Layer.Google(
			"Google Streets", // the default
			{type: google.maps.MapTypeId.ROADMAP, visibility: true},
			{singleTile: false, buffer: 0, isBaseLayer: true}
	),
	gsat: new OpenLayers.Layer.Google(
			"Google Satellite",
			{type: google.maps.MapTypeId.SATELLITE, visibility: false},
			{singleTile: false, buffer: 0, isBaseLayer: true}
	),	
	ghyb: new OpenLayers.Layer.Google(
			"Google Hybrid",
			{type: google.maps.MapTypeId.HYBRID, visibility: false},
			{singleTile: false, buffer: 0, isBaseLayer: true}
	),
	gter: new OpenLayers.Layer.Google(
			"Google Terrain",
			{type: google.maps.MapTypeId.TERRAIN, visibility: false},
			{singleTile: false, buffer: 0, isBaseLayer: true}
	),

    //Overlays    
    province: new OpenLayers.Layer.WMS(
            "ขอบเขตจังหวัด",
            Heron.scratch.urls.OWS,
            {layers: "occupation:tb_occupation", transparent: true, format: 'image/png'},
            {singleTile: false, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false, 
			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                wfs: {
                    protocol: 'fromWMSLayer',
                    downloadFormats: Heron.options.wfs.downloadFormats
                }
            }}
    ),
};


/** Collect layers from above, these are actually added to the map.
 * One could also define the layer objects here immediately.
 * */
Heron.options.map.layers = [
    //BaseLayers    
	Heron.scratch.layermap.gter,
	Heron.scratch.layermap.gsat,
	Heron.scratch.layermap.ghyb,
	Heron.scratch.layermap.gstr,
	// add overlay layers.
	Heron.scratch.layermap.province

];


var treeTheme = [	
	{
		text:'กลุ่มชั้นข้อมูล', 
		expanded: true,
		children:
			[
				{
					text:'กลุ่มชั้นข้อมูล1', 
					expanded: true,
					children:
						[
							{
								text:'หมู่บ้าน', 
								expanded: true,
								children:
									[
										//{nodeType: "gx_layer", layer: "จำนวนผู้ป่วยโรคไข้เลือดออก(รายหมู่บ้าน)", text: 'จำนวนผู้ป่วย(คน)' },	
										//{nodeType: "gx_layer", layer: "จำนวนผู้ป่วยตายโรคไข้เลือดออก(รายหมู่บ้าน)", text: 'จำนวนผู้ป่วยตาย(คน)' }								
									]
							},{
								text:'ตำบล', 
								expanded: false,
								children:
									[
										//{nodeType: "gx_layer", layer: "จำนวนผู้ป่วยโรคไข้เลือดออก(รายตำบล)", text: 'จำนวนผู้ป่วย(คน)' },	
										//{nodeType: "gx_layer", layer: "จำนวนผู้ป่วยตายโรคไข้เลือดออก(รายตำบล)", text: 'จำนวนผู้ป่วยตาย(คน)' },
										//{nodeType: "gx_layer", layer: "อัตราป่วยตายโรคไข้เลือดออก(รายตำบล)", text: 'อัตราป่วยตาย' }										
									]
							},{
								text:'อำเภอ', 
								expanded: false,
								children:
									[
										//{nodeType: "gx_layer", layer: "dhf_pop_amp", text: 'จำนวนผู้ป่วย(คน)' },
										//{nodeType: "gx_layer", layer: "dhf_phthousand_amp", text: 'อัตราป่วยต่อ ปชก.แสนคน' },
										//{nodeType: "gx_layer", layer: "dhf_death_amp", text: 'จำนวนผู้ป่วยตาย(คน)' },
										//{nodeType: "gx_layer", layer: "dhf_per_amp", text: 'อัตราป่วยตาย' }															
									]
							},{
								text:'จังหวัด', 
								expanded: false,
								children:
									[
										//{nodeType: "gx_layer", layer: "dhf_pop_prov", text: 'จำนวนผู้ป่วย(คน)' }																		
									]
							}								
						]
				},{
					text:'กลุ่มชั้นข้อมูล2', 
					expanded: true,
					children:
						[
							//{nodeType: "gx_layer", layer: "จำนวนผู้ป่วยโรคInfluenza", text: 'จำนวนผู้ป่วยโรค Influenza รายหมู่บ้าน(คน)' },	
							//{nodeType: "gx_layer", layer: "Influenza_death_vill", text: 'จำนวนผู้ป่วยตายโรค Influenza รายหมู่บ้าน(คน)' }	
							{nodeType: "gx_layer", layer: "ขอบเขตจังหวัด", text: 'ขอบเขตตำบล', legend: true}	
						]
				},{
					text:'กลุ่มชั้นข้อมูล3', 
					expanded: true,
					children:
						[
							//{nodeType: "gx_layer", layer: "จำนวนผู้ป่วยโรค Diarrhoea รายหมู่บ้าน(คน)", text: 'จำนวนผู้ป่วย(คน)' },	
							//{nodeType: "gx_layer", layer: "จำนวนผู้ป่วยตายโรค Diarrhoea รายหมู่บ้าน(คน)", text: 'จำนวนผู้ป่วยตาย(คน)' }	
							{nodeType: "gx_layer", layer: "ขอบเขตจังหวัด", text: 'ขอบเขตตำบล', legend: true}							
						]
				},{
					text:'กลุ่มชั้นข้อมูล4', 
					expanded: true,
					children:
						[
							//{nodeType: "gx_layer", layer: "หมู่บ้าน", text: 'หมู่บ้าน' },,
							//{nodeType: "gx_layer", layer: "เส้นถนน", text: 'เส้นถนน' },
							//{nodeType: "gx_layer", layer: "ขอบเขตจังหวัด", text: 'ขอบเขตจังหวัด' },
							//{nodeType: "gx_layer", layer: "ขอบเขตอำเภอ", text: 'ขอบเขตอำเภอ' },
							{nodeType: "gx_layer", layer: "ขอบเขตจังหวัด", text: 'ขอบเขตจังหวัด', legend: true}						
						]
				}
			]
	},{
		text:'ชั้นข้อมูลฐาน', expanded: true,	
		nodeType: "gx_baselayercontainer"
	}
];

