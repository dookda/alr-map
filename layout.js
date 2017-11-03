Ext.namespace("Heron.examples");
// for search with combobox

Heron.options.map.toolbar = [{
        type: "featureinfo",
        pressed: true,
        options: {
            popupWindow: {
                width: 460,
                height: 380,
                featureInfoPanel: {
                    showTopToolbar: true,
                    //vertical feature info
                    displayPanels: ['Detail', 'Table'],

                    // Should column-names be capitalized? Default true.
                    columnCapitalize: true,

                    // Export to download file. Option values are 'CSV', 'XLS', or a Formatter object (see FeatureGridPanel) , default is no export (results in no export menu).
                    exportFormats: ['CSV', 'XLS', 'GMLv2', 'Shapefile', {
                            name: 'Esri Shapefile (WGS84)',
                            formatter: 'OpenLayersFormatter',
                            format: 'OpenLayers.Format.GeoJSON',
                            targetFormat: 'ESRI Shapefile',
                            targetSrs: 'EPSG:4326',
                            fileExt: '.zip',
                            mimeType: 'application/zip'
                        }, {
                            // Try this with PDOK Streekpaden and Fietsroutes :-)
                            name: 'GPS File (GPX)',
                            formatter: 'OpenLayersFormatter',
                            format: 'OpenLayers.Format.GeoJSON',
                            targetSrs: 'EPSG:4326',
                            targetFormat: 'GPX',
                            fileExt: '.gpx',
                            mimeType: 'text/plain'
                        },
                        'GeoJSON', 'WellKnownText'
                    ],
                    // Export to download file. Option values are 'CSV', 'XLS', default is no export (results in no export menu).
                    // exportFormats: ['CSV', 'XLS'],
                    maxFeatures: 10,

                    // In case that the same layer would be requested more than once: discard the styles
                    //discardStylesForDups: true,
                    gridCellRenderers: [{
                        featureType: 'ln9p_prov',
                        attrName: 'Prov_nam_e',
                        renderer: {
                            fn: Heron.widgets.GridCellRenderer.directLink,
                            options: {
                                url: 'http://en.wikipedia.org/wiki/{Prov_nam_e}',
                                target: '_new'
                            }
                        }
                    }],
                    gridColumns: Heron.gridColumns
                }
            }
        }
    }, {type: "coordinatesearch", options: {

		// === Full demo configuration ===

				// see ToolbarBuilder.js
					  formWidth: 420
					, formPageX: 15
					, formPageY: 100
				// see CoordSearchPanel.js
					// , title: 'My title'
					, titleDescription: 'โปรดเลือกระบบเส้นโครงแผนที่ที่ต้องการ...<br><br>จากนั้นให้กรอกค่าพิกัด ลองจิจูด / ละติจูด หรือ<br>พิกัดยูทีเอ็มทางตะวันออก / พิกัดยูทีเอ็มทางทางเหนือ.<br>&nbsp;<br>'
					, titleDescriptionStyle: 'font-size:11px; color:dimgrey;'
					, bodyBaseCls: 'x-form-back'
					, bodyItemCls: 'hr-html-panel-font-size-11'
					, bodyCls: 'hr-html-panel-font-size-11'
					, fieldMaxWidth: 250
					, fieldLabelWidth: 80
					, fieldStyle: 'color: blue;'
					, fieldLabelStyle: 'color: darkblue'
					//, layerName: 'Location Thailand - Lon/Lat'
					, onProjectionIndex: 1
					, onZoomLevel: -1
					, showProjection: true
					, showZoom: true
					, showAddMarkers: true
					, checkAddMarkers: true
					, showHideMarkers: true
					, checkHideMarkers: false
					, showResultMarker: true
					, fieldResultMarkerStyle: 'color: darkblue;' // green
					, fieldResultMarkerText: 'Marker position: '
					, fieldResultMarkerSeparator: ' | '
					, fieldResultMarkerPrecision: 4
					, removeMarkersOnClose: true
					, showRemoveMarkersBtn: true
					, buttonAlign: 'center'		// left, center, right
						/*
							http://spatialreference.org/ref/epsg/4326/
							EPSG:4326
							WGS 84
						    WGS84 Bounds: -180.0000, -90.0000, 180.0000, 90.0000
						    Projected Bounds: -180.0000, -90.0000, 180.0000, 90.0000

							http://spatialreference.org/ref/epsg/28992/    
							EPSG:28992
							Amersfoort / RD New
						    WGS84 Bounds: 3.3700, 50.7500, 7.2100, 53.4700
						    Projected Bounds: 12628.0541, 308179.0423, 283594.4779, 611063.1429
						*/
				, hropts: [
						{
							  projEpsg: 'EPSG:4326'
							, projDesc: 'EPSG:4326 - WGS 84'
							, fieldLabelX: 'Lon [ลองจิจูด]'
							, fieldLabelY: 'Lat [ละติจูด]'
							, fieldEmptyTextX: 'กรุณาระบุพิกัดลองจิจูด...'
							, fieldEmptyTextY: 'กรุณาระบุพิกัดละติจูด...'
							, fieldMinX: -180
							, fieldMinY: -90
							, fieldMaxX: 180
							, fieldMaxY: 90
							, fieldDecPrecision: 6
							, iconWidth: 32
							, iconHeight: 32
							, localIconFile: 'bluepin.png'
							, iconUrl: null
						}
						,
						{
							 projEpsg: 'EPSG:32647'
							, projDesc: 'EPSG:32647 - WGS 1984/UTM zone 47N'
							, fieldLabelX: 'E [meters]'
							, fieldLabelY: 'N [meters]'
							, fieldEmptyTextX: 'กรุณาระบุพิกัดยูทีเอ็มทางตะวันออก...'
							, fieldEmptyTextY: 'กรุณาระบุพิกัดยูทีเอ็มทางทางเหนือ...'
							, fieldMinX: 166021.4431
							, fieldMinY: 0.0000
							, fieldMaxX: 833978.5569
							, fieldMaxY: 9329005.1825
							, fieldDecPrecision: 2
							, iconWidth: 32
							, iconHeight: 32
							, localIconFile: 'redpin.png'
							, iconUrl: null
							
						}
						
						,
						{
							 projEpsg: 'EPSG:32648'
							, projDesc: 'EPSG:32648 - WGS 1984/UTM zone 48N'
							, fieldLabelX: 'E [meters]'
							, fieldLabelY: 'N [meters]'
							, fieldEmptyTextX: 'กรุณาระบุพิกัดยูทีเอ็มทางตะวันออก...'
							, fieldEmptyTextY: 'กรุณาระบุพิกัดยูทีเอ็มทางทางเหนือ...'
							, fieldMinX: 166021.4431
							, fieldMinY: 0.0000
							, fieldMaxX: 833978.5569
							, fieldMaxY: 9329005.1825
							, fieldDecPrecision: 2
							, iconWidth: 32
							, iconHeight: 32
							, localIconFile: 'redpin.png'
							, iconUrl: null
							
						}
						
				]
		}
	},{
        type: "-"
    },{
        type: "pan"
    },{
        type: "zoomin"
    },{
        type: "zoomout"
    },{
        type: "zoomvisible"
    },{
        type: "zoomprevious"
    },{
        type: "zoomnext"
    },{
        type: "-"
    },{
        type: "measurelength",
        options: {
            geodesic: false
        }
    }, {
        type: "measurearea",
        options: {
            geodesic: false
        }
    }, {
        type: "-"
    }/*, {
        type: "printdialog",
        options: {
            url: 'http://kademo.nl/print/pdf28992.kadviewer'
        }
    }, {
        type: "-"
    } */
];

Heron.options.menuItems = [{
    id: 'hr-menu-bar',
    xtype: 'toolbar',
    floating: false,
    items: [{
        xtype: 'tbspacer',
        width: 240
    }, {
/*        xtype: 'tbseparator'
    }, {*/
        xtype: 'component',
        autoEl: {
                //tag: 'a',
                //href: 'http://localhost/alr-map/#menu3/',
                html: hmodule
            }
    }, {
        xtype: 'tbseparator'
    },{
        xtype: 'component',
        text: 'กลับหน้าหลัก',
        autoEl: {
                tag: 'a',
                href: 'https://www.gistnu.com/alr-map/#portfolio',
                html: 'กลับสู่หน้าหลัก'
            }
/*    }, {
        xtype: 'tbseparator'*/
    }]
}];

Heron.layout = {
    /** Top Panel: fills entire browser window. */
    xtype: 'panel',
    id: 'hr-container-main',
    layout: 'border',
    border: false,

    items: [{
        /** North container: fixed banner plus Menu. */
        xtype: 'panel',
        id: 'hr-container-north',
        region: 'north',
        layout: 'border',
        width: '100%',
        height: 28,
        bodyBorder: false,
        border: false,
        items: [{
                xtype: 'hr_htmlpanel',
                id: 'hr-logo-panel',
                region: 'center',
                bodyBorder: false,
                border: false,
                autoLoad: {
                    url: 'img/north-logo.html'
                },
                //height: 55
            },{
                xtype: 'hr_menupanel',
                id: 'hr-menu-panel',
                region: 'south',
                bodyBorder: false,
                border: false,
                height: 28,
                /** Menu options, see widgets/MenuPanel */
                hropts: {
                    pageRoot: 'content/',
                    cardContainer: 'hr-container-center',
                    pageContainer: 'hr-content-main',
                    defaultCard: 'hr-geo-main',
                    //defaultPage: 'intro'
                },
                /** See above for the items. */
                //items: Heron.geoportal.menuItems
                items: Heron.options.menuItems
            }
        ]
    }, {
        /**
         * Content area: either map + navigation or plain (HTML) content driven by Menu.
         * An ExtJS Card Layout is used to swap between Map view and HTML content views.
         **/
        xtype: 'panel',
        id: 'hr-container-center',
        region: 'center',
        layout: 'card',
        border: false,
        header: false,
        activeItem: 'hr-content-main',
        width: '100%',

        items: [{
            /** HTML content area in which HTML fragments from content/ dir are placed. */
            xtype: 'hr_htmlpanel',
            id: 'hr-content-main',
            layout: 'fit',
            autoScroll: true,
            height: '100%',
            width: '100%',
            preventBodyReset: true,
            bodyBorder: false,
            border: false
        }, {
            /** "Geo" content area, i.e. the Map and the Accordion widgets on the left. */
            xtype: 'panel',
            id: 'hr-geo-main',
            layout: 'border',
            width: '100%',
            border: false,
            items: [{
                /** "Geo" navigation area, i.e. the left widgets in Accordion layout. */
                xtype: 'panel',
                id: 'hr-menu-left-container',
                layout: 'accordion',
                region: "west",
                //tile: 'ddd',
                width: 240,
                collapsible: true,
                border: false,
                split: true,
                items: [{
                    xtype: 'hr_gxplayerpanel',
                    id: 'gxplayerpanel',
                    border: true,
                    autoScroll: true,
                    title: 'Layers',
                    //header: false,
                    //                    width: 240,
                    //bbar: [],
                    tbar: [], // we will add buttons to "gxplayerpanel.bbar" later
                    // configuration of all tool plugins for this application, see GXP docs
                    tools: [{
                        // ptype: "gxp_layertree",
                        ptype: "gxp_layermanager",
                        groups: layersGroup,
                        outputConfig: {
                            id: "layertree",
                            //title: __('Layers weew'),
                            //header: false,
                            //border: false,
                            //tbar: [], // we will add buttons to "tree.bbar" later
                        },
                        outputTarget: "gxplayerpanel"
                    }, {
                        ptype: "gxp_addlayers",
                        actionTarget: "gxplayerpanel.tbar",
                        //addActionText: __('Add layers'),
                        templatedLayerGrid: true,
                        layerGridWidth: 440,
                        layerGridHeight: 600,
                        layerPreviewWidth: 40,
                        layerPreviewHeight: 40,
                        // Zooms to the extent of the layer after adding it to the map.  Default is true.
                        zoomToLayer: true,
                        owsPreviewStrategies: ['attributionlogo', 'getlegendgraphic', 'randomcolor'],

                        // Catalog panel settings
                        searchText: "Zoek (via CSW) in Nationaal Georegister, tik bijv PDOK in",
                        catalogPanelWidth: 440,

                        defaultSrs: 'EPSG:28992',
                        search: {
                            selectedSource: "nationaalgeoregister_csw"
                        }
                    }, {
                        ptype: "gxp_removelayer",
                        actionTarget: ["gxplayerpanel.tbar", "layertree.contextMenu"]
                    }, {
                        ptype: "gxp_layerproperties",
                        outputConfig: {
                            defaults: {
                                autoScroll: true
                            },
                            width: 400,
                            autoHeight: true
                        },
                        actionTarget: ["gxplayerpanel.tbar", "layertree.contextMenu"]
                    }, {
                        ptype: "gxp_styler",
                        outputConfig: {
                            autoScroll: true,
                            width: 320
                        },
                        actionTarget: ["gxplayerpanel.tbar", "layertree.contextMenu"]
                        //                    actionTarget: ["layertree.contextMenu"],
                        //                    outputTarget: "layertree"
                    }, {
                        ptype: "gxp_zoomtolayerextent",
                        actionTarget: ["gxplayerpanel.tbar", "layertree.contextMenu"]
                    }, {
                        ptype: "gxp_opacityslider",
                        actionTarget: ["gxplayerpanel.tbar", "layertree.contextMenu"]
                    }],

                    // layer sources
                    defaultSourceType: "gxp_wmssource",
                    sources: {
                        alr1: {
                            url: Heron.scratch.urls.wmsAlr,
                            version: "1.1.1",
                            title: 'ฐานข้อมูล ส.ป.ก. (alr-db1)'
                        },
                        alr2: {
                            ptype: "gxp_wmssource",
                            url: Heron.scratch.urls.wmsAlr2,
                            version: "1.1.1",
                            title: 'ฐานข้อมูล ส.ป.ก. (alr-db2)'
                            // owsPreviewStrategies: ['getlegendgraphic']  // or 'no preview available' if empty array
                        }
                    },
                }]
            }, {
                /** Map and Feature Info panel area. */
                xtype: 'panel',
                id: 'hr-map-and-info-container',
                layout: 'border',
                region: 'center',
                width: '100%',
                collapsible: false,
                split: true,
                border: false,
                items: [{
                    xtype: 'hr_mappanel',
                    id: 'hr-map',
                    region: 'center',
                    collapsible: false,
                    border: false,
                    hropts: Heron.options.map
                },{
                    xtype: 'hr_featurechartpanel',
                    //id: 'hr-feature-info',
                    region: 'south',
                    border: false,
                    collapseMode: 'mini',
                    collapsible: true,
                    collapsed: true,
                    //width: 350,
                    height: 300,
                    split: true,
                    header: false,
                    showTopToolbar: false
                }]
            }]
        }]
    }]
};
