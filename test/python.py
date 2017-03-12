import arcpy
print 'start arcpy'
arcpy.env.workspace = "C:/workspace"
arcpy.CopyFeatures_management("site.shp", "C:/workspace/output/da.shp")
print 'ok!!!!'