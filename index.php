<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; }
      #floating-panel {
  position: absolute;
  top: 75px;
  left: 0%;
  z-index: 5;
  background-color: transparent;
  padding: 5px;
  border: 0px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}
        #floating-panel-create {
  position: absolute;
  top: 115px;
  left: 0px;
  z-index: 5;
  background-color: transparent;
  padding: 5px;
  border: 0px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}
        
      .floating-panel-faq {
  position: absolute;
  top: 15px;
  right: 15px;
  z-index: 5;
  background-color: transparent;
  padding: 5px;
  border: 0px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}
        
.floating-panel-faq-white{
  position: absolute;
  top: 15px;
  right: 15px;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 0px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}
.floating-panel-status{
  position: absolute;
  top: 15px;
  left: 45%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}
        .sweet-alert{
         width: 600px !important;  
            border: :0px solid transparent !important;
     border-radius: 0px !important;
        }
    .btn-control{
     border: :0px solid transparent !important;
     border-radius: 0px !important;
     background: #fff !important;
     font-size: 17px !important;
        outline: none !important;
    }
    .btn-faq{
    border: :0px solid transparent !important ;
     border-radius: 50px !important;
     background: #fff !important;
     font-size: 17px !important;
        outline: none !important;
    transition: width 0.3s ease-in-out, height 0.3s ease-in-out;
    -webkit-transition:width 0.3s ease-in-out, height 0.3s ease-in-out;
    width:35.7188px;
    height: 35.7188px;
    text-align: center;
        display:inline-block;
     overflow: hidden !important;
        padding-top: 3px;
        word-wrap: break-word;
    }
    .btn-faq:hover{
    border: :0px solid transparent !important;
     border-radius: 50px !important;
     background: #fff !important;
     font-size: 17px !important;
     outline: none !important;
     width:250px;
     height: 400px;
        word-wrap: break-word;
   
    }
    .btn-create{
    border: :0px solid transparent !important;
     border-radius: 0px !important;
     background: #fff !important;
     font-size: 17px !important;
        outline: none !important;
      
    }

    </style>
      <script src="jquery-2.2.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optionales Theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://use.fontawesome.com/e35b3c8a4a.js"></script>
            <link rel="stylesheet" href="sweetalert.css">
      <script src="sweetalert.min.js"></script>
  </head>
  <body>
      <div id="floating-panel-status" class="floating-panel-status">
                <div id= "progress"><b>Progress:  1/4</b></div>



          <div id="debug1" style="display:none">TEST</div></div>

<div id="floating-panel-faq" class="floating-panel-faq" name="<?php echo $_GET["chase"]; ?>">
      <div class="btn-faq" id="faq"><i class="fa fa-question fa-4" aria-hidden="true"></i>          
                    <div id= "ratsel">TEST</div>
      </div>
          <div id="faq-panel" style="display:none;"> TEST FAQ</div>
            <div id="box" class="box"><font size=6>

      </font>
      
      </div></div></div>
    <div id="floating-panel">
      <button type="button" class="btn btn-default btn-control " onclick="clearMarkers();" ><i class="fa fa-eye-slash fa-4" aria-hidden="true"></i></button>
      
      <button type="button" class="btn btn-default btn-control" onclick="showMarkers();" ><i class="fa fa-map-marker fa-4" aria-hidden="true"></i></button>
      <button type="button" class="btn btn-default btn-control" onclick="deleteMarkers();" ><i class="fa fa-trash fa-4" aria-hidden="true"></i></button></div>
    </div>




    <div id="map"></div>
    <script type="text/javascript">
var markers=[];
var circles=[];
var map;
var lat1, lat2, lat3, lat4, lat5;
var lng1, lng2, lng3, lng4, lng5;
var lines;
var file;
var text1;
var debug1;
var lats=[];
var lngs=[];
var hints=[];
var count=0;
var pos1, pos2, pos3, pos4, pos5;
var progress=0;
var ratsel;
var finished=false;
var cityProgress;
var cP={
    chicago1: {
        lat: 41.878, 
        lng: -87.629}
};


function placeMarker(location) {
    if(finished==false){
    var marker = new google.maps.Marker({
        position: location, 
        map: map
    });
    markers.push(marker);
    var cityCircle = new google.maps.Circle({
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
      center: location,
      radius: 50000
    });
    circles.push(cityCircle);
    
    var p1=fromLatLngToPoint(location, map);
    
       // debug1.innerHTML=p1;
    //var p2=fromLatLngToPoint(citymap.chicago.center, map);    
        console.log(location.lat()+ " " + location.lng());
        

        getNextHint(progress+1, location.lat(),location.lng());

    
    
    }
    
}
          
function endChase(){
    deleteMarkers();
    for( var i=0;i<hints.length;i++){
        console.log(typeof lats[i]);
        console.log(typeof lngs[i]);
        var myLatLng = new google.maps.LatLng(parseFloat(lats[i]),parseFloat(lngs[i]));
        addMarker(myLatLng);
        }
    
    var chasePath = new google.maps.Polyline({
    path: markers,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });
    chasePath.setMap(map);
    
    map.setZoom(7);
    
    
    
     swal({
        title: 'Paperchase finished!',
        type: 'success',
        text: 'Congratulations! You finished your PaperChase!',
        showCloseButton: true,
        width: 600
        
    });
    
}
        
        
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 0, lng: 0},
    zoom: 3
  });
    var myBox = document.getElementById('box');
map.controls[google.maps.ControlPosition.TOP_RIGHT].push(myBox);
ratsel = document.getElementById('ratsel');
debug1 = document.getElementById('debug1');
cityProgress= document.getElementById('progress');
    file= document.getElementById('floating-panel-faq').getAttribute("name")+ ".txt";
    //loadXMLDoc();
    getNextHint(0,0,0);
    ratsel.innerHTML=hints[0];
    cityProgress.innerHTML= "Progress: 0/"+ count;
    map.addListener('click', function(event) {
   placeMarker(event.latLng);         
});
         var p1={x: 500,y: 500};
        var p2= {x: 800, y:789};
}

        // Adds a marker to the map and push to the array.
function addMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
    console.log(location.lat);
  markers.push(marker);
}
    
// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
    circles[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    if(finished==false){
  clearMarkers();
  markers = [];
    circles=[];
        
    }
}
        

function fromLatLngToPoint(latLng, map) {
	var topRight = map.getProjection().fromLatLngToPoint(map.getBounds().getNorthEast());
	var bottomLeft = map.getProjection().fromLatLngToPoint(map.getBounds().getSouthWest());
	var scale = Math.pow(2, map.getZoom());
	var worldPoint = map.getProjection().fromLatLngToPoint(latLng);
	return new google.maps.Point((worldPoint.x - bottomLeft.x) * scale, (worldPoint.y - topRight.y) * scale);
}

        
    function lineDistance( point1, point2 )
    {
      var xs = 0;
      var ys = 0;
     
      xs = point2.x - point1.x;
      xs = xs * xs;
     
      ys = point2.y - point1.y;
      ys = ys * ys;
     debug.innerHTML="DISTANZ: "+Math.sqrt( xs + ys );
      return Math.sqrt( xs + ys );
    }
        
function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1);  // deg2rad below
  var dLon = deg2rad(lon2-lon1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
debug1.innerHTML=d;
  return d;
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}
        
function loadXMLDoc()
{
var xmlhttp,i;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    text=xmlhttp.responseText;
    lines = text.split("\n"); 
    count=lines[0];
        count.replace(/,/g, '');
    document.getElementById('debug1').innerHTML=count; 
    var j=0;
    var lineCount=1;
    for( j=1;j<=count;j++){
        var lattemp= lines[lineCount];
        lattemp.replace(/,/g, '');
        var lngtemp=lines[lineCount+1];
        lngtemp.replace(/,/g, '');
        var hinttemp=lines[lineCount+2];
        hinttemp.replace(/,/g, '');
        lineCount+=3;
        
        lats.push(lattemp);
        lngs.push(lngtemp);
        hints.push(hinttemp);
        
    for(var i=0;i<lines.length;i++){
        console.log(lines[i]);
        
    }
        
    }       
    
 }
  }
xmlhttp.open("GET",file,false);
xmlhttp.send();
}

function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
}
        
    $(document).ready(function(){
    $("#faq").click(function(){
        //$("#floating-panel-faq").toggleClass("floating-panel-faq-white");

        //$("#box").toggle();
    });
        
    $("#faq").hover(function(){
        //$(this).append("<b>TEST</b>");
    });
    
});

        
function getNextHint(step, lat_c, lng_c){
    $.ajax({
        url: 'check.php',
        type: 'GET',
        data: {hintnumber:step, file: file, lat:lat_c, lng: lng_c},
        dataType: 'json',
        success: function(output_string){
            
            //do stuff when successfull
            //console.log(output_string.hint);
            //console.log(output_string.lat);
            //console.log(output_string.lng);
            
            

            
            if(step==0){
                count=output_string.count;
                ratsel.innerHTML=output_string.hint;
                cityProgress.innerHTML= "Progress: 0/"+ count;
                hints.push(output_string.hint);
            }else{
                
                if(output_string.res=='true'){
                    console.log(output_string.res);
                lats.push(output_string.lat);
                lngs.push(output_string.lng);
                hints.push(output_string.hint);    
                ratsel.innerHTML=output_string.hint;
                hints.push(output_string.hint);
                progress++;
                                document.getElementById('progress').innerHTML= "Progress: "+progress+"/"+count;
                    if (progress>=count){
        document.getElementById('progress').innerHTML= "Progress: "+count+"/"+count;
        ratsel.innerHTML="FINISHED";
        
        endChase();
        finished=true;
        
    }
                }
            }
            
            
        }, 
        error: function (xhr, ajaxOptions, thrownError){
                    console.log(xhr.statusText);
                    console.log(thrownError);
  
                    }
    }); 
    
        
    
}
        

    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKUh3F8Awm628Ua-KeGcPp9pYDU1wtQLI&callback=initMap">
    </script>
  </body>
</html>
