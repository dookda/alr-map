Ext.namespace("Heron");
Ext.namespace("Heron.options");
Ext.namespace("Heron.options.map");
Ext.namespace("Heron.geoportal");

OpenLayers.Util.onImageLoadErrorColor = "transparent";
OpenLayers.ProxyHost = "/cgi-bin/proxy.cgi?url=";
OpenLayers.DOTS_PER_INCH = 25.4 / 0.28;

Ext.BLANK_IMAGE_URL = 'http://cdnjs.cloudflare.com/ajax/libs/extjs/3.4.1-1/resources/images/default/s.gif';

var prj4326 = new OpenLayers.Projection("EPSG:4326");
//var prj32647 = new OpenLayers.Projection("EPSG:32647");
var prj3857 = new OpenLayers.Projection("EPSG:3857");
var pnt = new OpenLayers.LonLat(100, 17.04);
//var center = pnt.transform(prj4326, prj3857);
//map.zoomToExtent(new OpenLayers.Bounds(10880654.89,1709976.28,11331413.44,2082257.42).transform("EPSG:4326", "EPSG:900913"));

// Without default bottom status bar.
Heron.options.map.statusbar = [
	{type: "any", options:{xtype: 'tbtext', text: 'Location'}},
	{type: "-"},
  {type: "xcoord"},
  {type: "ycoord"}
];


Ext.namespace("Heron.options.map.settings");
Heron.options.map.settings = {
    projection: prj3857,
    displayProjection: prj4326, //prj32647
    units: 'm',
    maxExtent: '-20037508, -20037508,20037508, 20037508.34',
    center: center,
    maxResolution: '156543.0339', //'0.17578125',
    xy_precision: 5,
    zoom: zoom,
    theme: null,
    controls: [
        new OpenLayers.Control.Zoom(),
        new OpenLayers.Control.Attribution(),
        new OpenLayers.Control.Navigation()
    ],
};

Ext.namespace("Heron.scratch");
Heron.scratch.urls = {
    PDOK: 'http://geodata.nationaalgeoregister.nl',
    wmsAlr: 'http://map.nu.ac.th/gs-alr/ows?',
    gwcAlr: 'http://map.nu.ac.th/gs-alr/gwc/service/wms?',
    wmsAlr2: 'http://map.nu.ac.th/gs-alr2/ows?',
    gwcAlr2: 'http://map.nu.ac.th/gs-alr2/gwc/service/wms?',
    gwcTrf: 'http://map.nu.ac.th/geoserver-trfland/gwc/service/wms?',
    OwsMapNU: 'http://map.nu.ac.th/geoserver-trfland/ows?',
    OwsGistNU: 'http://www2.cgistln.nu.ac.th/para/ows?',
    OwsGISTDA: 'http://tile.gistda.or.th/geoserver/ows?',
    OwsFGDS: 'http://fgds.gistda.or.th/geoserver/ows?',
    GwcGistNU: 'http://www2.cgistln.nu.ac.th/para/gwc/service/wms?'
};

Ext.namespace("Heron.options.wfs");
Heron.options.wfs.downloadFormats = [{
    name: 'CSV',
    outputFormat: 'csv',
    fileExt: '.csv'
}];

var filter = null;
var ip = 'www.map.nu.ac.th';
var hosturl = 'http://' + ip + '/geoserver-hgis/ows?';


//////////
var gTerrain = new OpenLayers.Layer.Google(
    "Google Terrain", {
        type: google.maps.MapTypeId.TERRAIN,
        visibility: true,
        group: 'background'
    }, {
        singleTile: false,
        buffer: 0,
        isBaseLayer: true
    }
);
var gSatellite = new OpenLayers.Layer.Google(
    "Google Satellite", {
        type: google.maps.MapTypeId.SATELLITE,
        visibility: false,
        group: 'background'
    }, {
        singleTile: false,
        buffer: 0,
        isBaseLayer: true
    }
);
var gStreet = new OpenLayers.Layer.Google(
    "Google Streets", // the default
    {
        type: google.maps.MapTypeId.ROADMAP,
        visibility: false,
        group: 'background'
    }, {
        singleTile: false,
        buffer: 0,
        isBaseLayer: true
    }
);
//////// flood
var flood_2005_geo = new OpenLayers.Layer.WMS(
    "พื้นที่น้ำท่วมปี 2548",
    Heron.scratch.urls.OwsGISTDA, { layers: "flood:flood_2005_geo", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);
var flood_2006_geo = new OpenLayers.Layer.WMS(
    "พื้นที่น้ำท่วมปี 2549",
    Heron.scratch.urls.OwsGISTDA, { layers: "flood:flood_2006_geo", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);
var flood_2007_geo = new OpenLayers.Layer.WMS(
    "พื้นที่น้ำท่วมปี 2550",
    Heron.scratch.urls.OwsGISTDA, { layers: "flood:flood_2007_geo", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);
var flood_2008_geo = new OpenLayers.Layer.WMS(
    "พื้นที่น้ำท่วมปี 2551",
    Heron.scratch.urls.OwsGISTDA, { layers: "flood:flood_2008_geo", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);
var flood_2009_geo = new OpenLayers.Layer.WMS(
    "พื้นที่น้ำท่วมปี 2552",
    Heron.scratch.urls.OwsGISTDA, { layers: "flood:flood_2009_geo", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);
var flood_2010_geo = new OpenLayers.Layer.WMS(
    "พื้นที่น้ำท่วมปี 2553",
    Heron.scratch.urls.OwsGISTDA, { layers: "flood:flood_2010_geo", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);
var flood_2011_geo = new OpenLayers.Layer.WMS(
    "พื้นที่น้ำท่วมปี 2554",
    Heron.scratch.urls.OwsGISTDA, { layers: "flood:flood_2011_geo", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);
var flood_2012_geo = new OpenLayers.Layer.WMS(
    "พื้นที่น้ำท่วมปี 2555",
    Heron.scratch.urls.OwsGISTDA, { layers: "flood:flood_2012_geo", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);
var flood_2013_geo = new OpenLayers.Layer.WMS(
    "พื้นที่น้ำท่วมปี 2556",
    Heron.scratch.urls.OwsGISTDA, { layers: "flood:flood_2013_geo", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);
var repeated_flooding = new OpenLayers.Layer.WMS(
    "พื้นที่น้ำท่วมซ้ำซาก",
    Heron.scratch.urls.OwsGISTDA, { layers: "flood:repeated_flooding", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        group: 'disaster'
    }
);
//////// rain
var scl_drought4326 = new OpenLayers.Layer.WMS(
    "ระดับเสี่ยงแล้ง",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:scl_drought4326", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);
var scl_erosion4326 = new OpenLayers.Layer.WMS(
    "ระดับเสี่ยงการสูญเสียดิน",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:scl_erosion4326", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);

var scl_landslide4326 = new OpenLayers.Layer.WMS(
    "ระดับเสี่ยงดินถล่ม",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:scl_landslide4326", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'disaster'
    }
);
var suiteCasava = new OpenLayers.Layer.WMS(
    "ระดับเหมาะสมปลูกมันสำปะหลัง",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:scasava", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'soilsuite'
    }
);
var suiteCorn = new OpenLayers.Layer.WMS(
    "ระดับเหมาะสมปลูกข้าวโพด",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:scorn", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'soilsuite'
    }
);
var suiteRice = new OpenLayers.Layer.WMS(
    "ระดับเหมาะสมปลูกข้าว",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:srice", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'soilsuite'
    }
);
var suiteSugar = new OpenLayers.Layer.WMS(
    "ระดับเหมาะสมปลูกอ้อย",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:ssugar", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'soilsuite'
    }
);
var suitePara = new OpenLayers.Layer.WMS(
    "ระดับเหมาะสมปลูกยางพารา",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:spara", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'soilsuite'
    }
);


var dem = new OpenLayers.Layer.WMS(
    "ความสูงภูมิประเทศเชิงเลข 30 เมตร ",
    Heron.scratch.urls.OwsFGDS, { layers: "gisportal:L040000_DEM_30m_RTSD", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'baseLayers'
    }
);
var basin = new OpenLayers.Layer.WMS(
    "พื้นที่ลุ่มน้ำ",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:basin250", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'baseLayers'
    }
);
var wshd_cl = new OpenLayers.Layer.WMS(
    "ชั้นคุณภาพลุ่มน้ำ",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:wshd_cl", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'baseLayers',
        metadata: {
            wfs: {
                protocol: 'fromWMSLayer',
                downloadFormats: Heron.options.wfs.downloadFormats
            }
        }
    }
);

//////// landuse
var dwrlu = new OpenLayers.Layer.WMS(
    "การใช้ประโยชน์ที่ดิน (กรมทรัพยากรน้ำ)",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:dwrlu", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'baseLayers',
        metadata: {
            wfs: {
                protocol: 'fromWMSLayer',
                downloadFormats: Heron.options.wfs.downloadFormats
            }
        }
    }
);
var spklu = new OpenLayers.Layer.WMS(
    "การใช้ประโยชน์ที่ดิน (ส.ป.ก.)",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:spklu", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'baseLayers',
        metadata: {
            wfs: {
                protocol: 'fromWMSLayer',
                downloadFormats: Heron.options.wfs.downloadFormats
            }
        }
    }
);

var p10_evap_tff = new OpenLayers.Layer.WMS(
    "ปริมาณการระเหยเฉลี่ย 10 ปี",
    Heron.scratch.urls.GwcGistNU, { layers: "para:p10_evap_tff", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'baseLayers'
    }
);
var p10_rain_tff = new OpenLayers.Layer.WMS(
    "ปริมาณน้ำฝนเฉลี่ย 10 ปี",
    Heron.scratch.urls.GwcGistNU, { layers: "para:p10_rain_tff", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'baseLayers'
    }
);
var flow_accum = new OpenLayers.Layer.WMS(
    "การไหลสะสมของน้ำ",
    Heron.scratch.urls.gwcAlr2, { layers: "alr:flow_accum", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.6,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'siteselection'
    }
);

var yield_4326 = new OpenLayers.Layer.WMS(
    "ปริมาณน้ำใต้ดิน (ลบ.ม./ไร่/ปี)",
    Heron.scratch.urls.wmsAlr2, { layers: "alr:wsupply_gwat", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'siteselection'
    }
);

var wsupply_runoff = new OpenLayers.Layer.WMS(
    "ปริมาณน้ำท่า (ลบ.ม./ไร่/ปี)",
    Heron.scratch.urls.wmsAlr2, { layers: "alr:wsupply_runoff", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'siteselection'
    }
);

var wsupply_rain = new OpenLayers.Layer.WMS(
    "ปริมาณน้ำฝน (ลบ.ม./ไร่/ปี)",
    Heron.scratch.urls.wmsAlr2, { layers: "alr:wsupply_rain", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'siteselection'
    }
);

var alr_parcel = new OpenLayers.Layer.WMS(
    "แปลงที่ดิน ส.ป.ก.",
    Heron.scratch.urls.wmsAlr2, {
        layers: "alr:alr_parcel",
        cql_filter: filter_tam,
        transparent: true,
        format: 'image/png'
    }, {
        singleTile: false,
        opacity: 0.6,
        isBaseLayer: false,
        visibility: lyrvisible_alr,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'default',
        metadata: {
            wfs: {
                protocol: 'fromWMSLayer',
                downloadFormats: Heron.options.wfs.downloadFormats
            }
        }
    }
);


// envi
var forestc = new OpenLayers.Layer.WMS(
    "ป่าไม้",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:forestc", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'baseLayers',
        metadata: {
            wfs: {
                protocol: 'fromWMSLayer',
                downloadFormats: Heron.options.wfs.downloadFormats
            }
        }
    }
);
var watbody = new OpenLayers.Layer.WMS(
    "แหล่งน้ำ",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:watbody", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'waterResource'
    }
);

// admin
var ln9p_prov = new OpenLayers.Layer.WMS(
    "ขอบเขตจังหวัด",
    Heron.scratch.urls.wmsAlr2, {
        layers: "alr:ln9p_prov",
        cql_filter: filter_pro,
        transparent: true,
        format: 'image/png'
    }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: lyrvisible_pro,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'adminBoundary',
        metadata: {
            wfs: {
                protocol: 'fromWMSLayer',
                downloadFormats: Heron.options.wfs.downloadFormats
            }
        }
    }
);
var ln9p_amp = new OpenLayers.Layer.WMS(
    "ขอบเขตอำเภอ",
    Heron.scratch.urls.wmsAlr2, {
        layers: "alr:ln9p_amp",
        cql_filter: filter_amp,
        transparent: true,
        format: 'image/png'
    }, {
        singleTile: false,
        opacity: 1,
        isBaseLayer: false,
        visibility: lyrvisible_amp,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'adminBoundary',
        metadata: {
            wfs: {
                protocol: 'fromWMSLayer',
                downloadFormats: Heron.options.wfs.downloadFormats
            }
        }
    }
);
var ln9p_tam = new OpenLayers.Layer.WMS(
    "ขอบเขตตำบล",
    Heron.scratch.urls.wmsAlr2, {
        layers: "alr:ln9p_tam",
        cql_filter: filter_tam,
        transparent: true,
        format: 'image/png'
    }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: lyrvisible_tam,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'adminBoundary',
        metadata: {
            wfs: {
                protocol: 'fromWMSLayer',
                downloadFormats: Heron.options.wfs.downloadFormats
            }
        }
    }
);
var municiple = new OpenLayers.Layer.WMS(
    "ขอบเขตเทศบาล",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:municiple", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'adminBoundary',
        metadata: {
            wfs: {
                protocol: 'fromWMSLayer',
                downloadFormats: Heron.options.wfs.downloadFormats
            }
        }
    }
);
var stream = new OpenLayers.Layer.WMS(
    "เส้นลำน้ำ",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:stream", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'waterResource'
    }
);
var L08_DS_HV_CONDUETOR = new OpenLayers.Layer.WMS(
    "ข้อมูลสายส่งแรงสูง",
    Heron.scratch.urls.OwsFGDS, { layers: "NGIS2014:L08_DS_HV_CONDUETOR", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'baseLayers'
    }
);
var trans = new OpenLayers.Layer.WMS(
    "เส้นทางคมนาคม",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:trans", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'baseLayers'
    }
);

var expertSiteselection = new OpenLayers.Layer.WMS(
    "ตำแหน่งเหมาะสมต่อการพัฒนาแหล่งน้ำจากผู้เชี่ยวชาญ",
    Heron.scratch.urls.wmsAlr2, { layers: "alr:expert_site_selected_4326", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: true,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'siteselection'
    }
);
var anamai = new OpenLayers.Layer.WMS(
    "สถานีอนามัย",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:anamai", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'place'
    }
);
var factory = new OpenLayers.Layer.WMS(
    "โรงงาน",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:factory", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'place'
    }
);
var hospital2 = new OpenLayers.Layer.WMS(
    "โรงพยาบาล",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:hospital2", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'place'
    }
);
var school = new OpenLayers.Layer.WMS(
    "โรงเรียน",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:school", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'place'
    }
);
var staairport = new OpenLayers.Layer.WMS(
    "ท่าอากาศยาน",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:staairport", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'place'
    }
);
var stabus = new OpenLayers.Layer.WMS(
    "สถานีขนส่งโดยสารรถประจำทาง",
    Heron.scratch.urls.OwsMapNU, { layers: "trfgdb:stabus", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'place'
    }
);
var ln9p_vill = new OpenLayers.Layer.WMS(
    "หมู่บ้าน",
    Heron.scratch.urls.wmsAlr2, { layers: "alr:ln9p_vill", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'adminBoundary',
        metadata: {
            wfs: {
                protocol: 'fromWMSLayer',
                downloadFormats: Heron.options.wfs.downloadFormats
            }
        }
    }
);
var p10_evap = new OpenLayers.Layer.WMS(
    "สถานีตรวจวัดค่าการระเหย",
    Heron.scratch.urls.OwsGistNU, { layers: "para:p10_evap", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'place'
    }
);
var p10_rain = new OpenLayers.Layer.WMS(
    "สถานีตรวจวัดค่าน้ำฝน",
    Heron.scratch.urls.OwsGistNU, { layers: "para:p10_rain", transparent: true, format: 'image/png' }, {
        singleTile: false,
        opacity: 0.9,
        isBaseLayer: false,
        visibility: false,
        noLegend: false,
        featureInfoFormat: 'application/vnd.ogc.gml',
        transitionEffect: 'null',
        queryable: true,
        group: 'place'
    }
);

var selectedLayers = [gTerrain, gSatellite, gStreet, alr_parcel];
var layersGroup = {
                            default: {
                                title: 'แปลง ส.ป.ก.',
                                expanded: true
                            }
                        };

var i = 0;
while (mapLayer[i]) {
    if (mapLayer[i] == 'lyrSiteselection') {
        selectedLayers.push(flow_accum, yield_4326, wsupply_runoff, wsupply_rain, expertSiteselection);
        layersGroup['siteselection'] = {};
        layersGroup.siteselection['title'] = "ตำแหน่งเหมาะสมพัฒนาแหล่งน้ำ";

    } else if (mapLayer[i] == 'lyrPlace') {
        selectedLayers.push(anamai, factory, hospital2, school, staairport, stabus, p10_evap, p10_rain);
        layersGroup['place'] = {};
        layersGroup.place['title'] = "สถานที่สำคัญ";

    } else if (mapLayer[i] == 'lyrAdmin') {
        selectedLayers.push(ln9p_prov, ln9p_amp, ln9p_tam, municiple, ln9p_vill);
        layersGroup['adminBoundary'] = {};
        layersGroup.adminBoundary['title'] = "ขอบเขตการปกครอง";

    } else if (mapLayer[i] == 'lyrBase') {
        selectedLayers.push(dem, basin, wshd_cl, dwrlu, spklu, p10_evap_tff, p10_rain_tff, L08_DS_HV_CONDUETOR, trans, forestc);
        layersGroup['baseLayers'] = {};
        layersGroup.baseLayers['title'] = "ข้อมูลพื้นฐาน";

    } else if (mapLayer[i] == 'lyrWater') {
        selectedLayers.push(watbody, stream);
        layersGroup['waterResource'] = {};
        layersGroup.waterResource['title'] = "แหล่งน้ำ";

    }else if (mapLayer[i] == 'lyrSoil') {
        selectedLayers.push(suiteCasava, suiteCorn, suiteRice, suiteSugar, suitePara);
        layersGroup['soilsuite'] = {};
        layersGroup.soilsuite['title'] = "ความเหมาะสมของดิน";
    } else if (mapLayer[i] == 'lyrDisaster') {
        selectedLayers.push(flood_2005_geo, flood_2006_geo, flood_2007_geo, flood_2008_geo, flood_2009_geo, flood_2010_geo, flood_2011_geo, flood_2012_geo, flood_2013_geo, repeated_flooding, scl_drought4326, scl_erosion4326, scl_landslide4326);
        layersGroup['disaster'] = {};
        layersGroup.disaster['title'] = "ภัยธรรมชาติ";
    };
    //console.log(layersGroup);
    i++;
};

//var layersGroup2 = layersGroup;


if(module == 'siteRegister'){
    //console.log(module);
    var hmodule = "module: สมดุลน้ำรายแปลง";
/*    var colModule = { header: "",
            width: 120,
            renderer: function(value, metaData, record, rowIndex, colIndex, store) {
                var template = '<a target="_new" href="http://map.nu.ac.th/alr-map/route.html#/{alrcode}">เพิ่มข้อมูลเพาะปลูก</a>';
                var options = { attrNames: ['alrcode'] };
                return Heron.widgets.GridCellRenderer.substituteAttrValues(template, options, record);
            }
        };
	var addEtc = { header: "",
            width: 120,
            renderer: function(value, metaData, record, rowIndex, colIndex, store) {
                var template = '<a target="_new" href="http://map.nu.ac.th/alr-map/route.html#/{alrcode}">เพิ่มข้อมูลอื่นๆ</a>';
                var options = { attrNames: ['alrcode'] };
                return Heron.widgets.GridCellRenderer.substituteAttrValues(template, options, record);
            }
        };*/
}else{
    //console.log(module);
    var hmodule = "module: ที่ตั้งพื้นที่เหมาะสมพัฒนาแหล่งน้ำ";
/*    var colModule = { header: "",
            width: 120,
        }*/
};

layersGroup['background'] = {};
layersGroup.background['title'] = "แผนที่ฐาน";
layersGroup.background['exclusive'] = true;

Heron.options.map.layers = selectedLayers;
