        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; 
                       } 
                  }
             };
             req.open("GET", "sel_location.php?data="+src+"&val="+val); 
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); 
             req.send(null); 
        }
        // site selection
        window.onLoad=dochange('province', -1);     
        window.onLoad=dochange('amphoe', -1); 
        window.onLoad=dochange('tambon', -1); 
        // parcel register
        window.onLoad=dochange('province2', -1);     
        window.onLoad=dochange('amphoe2', -1); 
        window.onLoad=dochange('tambon2', -1); 
        //parcel summary
        window.onLoad=dochange('province3', -1);     
        window.onLoad=dochange('amphoe3', -1); 
        window.onLoad=dochange('tambon3', -1); 
        //parcel summary
        window.onLoad=dochange('province4', -1);     
        window.onLoad=dochange('amphoe4', -1); 
        window.onLoad=dochange('tambon4', -1); 