<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Life Saver</title>
        
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/validationEngine.jquery.css" type="text/css"/>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.2.custom.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.2.custom.min.css"/>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/animated-menu.css"/>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/menu/animated-menu.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/menu/jquery.easing.1.3.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/donor.css" type="text/css"/>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/trackRSDonor.js"></script>
</head>

<script language="javascript" type="text/javascript">
$(function() {
    document.getElementById("search").value="";
});
function loadScript() {   
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyC48L1OrM6h4IcE6smmfD1BdCO4-zwXj8M&sensor=true&callback=codeAddress";
    document.body.appendChild(script);
    showDialog();
}

var map;
var geocoder;
var markersArray = [];

function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-7.289166, 112.734398);
    var mapOptions = {
        zoom: 13,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

}

function clearOverlays() {
  if (markersArray) {
        for (i in markersArray) {
          markersArray[i].setMap(null);
        }
        markersArray.length = 0;

  }
}

function cek_value_input(){
    var address = document.getElementById("search").value;
    if(address==""){
        codeAddress();
    }
    else {
        search();
    }
}

function codeAddress() {
clearOverlays();
initialize();
var count=0;
var address =[];
var telp =[];
//var address = ["surabaya gebang putih","surabaya keputih","surabaya mulyorejo","surabaya kertajaya"];
<?php foreach ($data as $row):?>
address[count]='<?php echo $row->alamat_rs; ?>';
count++;
<?php endforeach; ?>
for (var temp = 0; temp < count; temp++) {
geocoder.geocode( { 'address': address[temp]}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
//map.setCenter(results[0].geometry.location);

addMarker(results[0].geometry.location, address[temp], '<IMG WIDTH="80px" HEIGHT="80px" BORDER="0" ALIGN="Left" SRC="<?php echo base_url(); ?>images/asset/logo.png">Rumah Sakit:<br/>'+results[0].formatted_address);
} else {
//alert("Geocode was not successful for the following reason: " + status);

}
});
}
}

function addMarker(latlng,title, content) {
var marker = new google.maps.Marker({
position: latlng,
map: map,
title: title
});
setTimeout(function(){ marker.setAnimation(null); }, 1500);
marker.setIcon('<?php echo base_url(); ?>images/asset/hospital-building.png');

var infowindow = new google.maps.InfoWindow({ content: content });
google.maps.event.addListener(marker, "click", function() {
infowindow.open(map, marker);
});
}

function search(){
    clearOverlays();
    initialize();
    var address = document.getElementById("search").value;
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
                setTimeout(function(){ marker.setAnimation(null); }, 1500);
                marker.setIcon('<?php echo base_url(); ?>images/asset/hospital-building.png');
                markersArray.push(marker);
                attachMessage(marker, '<IMG WIDTH="80px" HEIGHT="80px" BORDER="0" ALIGN="Left" SRC="<?php echo base_url(); ?>images/asset/logo.png"> Nama Rumah Sakit<br/>'+results[0].formatted_address);
            } else {
                //alert("Geocode was not successful for the following reason: " + status);
                codeAddress();
            }
        });
}

function attachMessage(marker, address) {
    //var message = ["This","is","the","secret","message"];
    var infowindow = new google.maps.InfoWindow(
        { content: address,
          size: new google.maps.Size(50,50)
        });
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
}

function showDialog(){
    $("#example").dialog();
    return false;
}
    
</script>
<body onload="loadScript()">
    
<div id="hairy"></div>
<div id="container">
    <div id="header">
        <img style="padding-bottom: 50px;" src="<?php echo base_url(); ?>images/asset/logo.png">
        <div class="menu">
            <ul class="uull">
		<li class="llii home-menu">
                    <p class="pp"><a class="aa" href="<?php echo base_url(); ?>home">Home</a></p>
		</li>
		<li class="llii partnership-menu">
			<p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/partnership">Partnership</a></p>
		</li>
		<li class="llii galleri-menu">
			<p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/gallery">Gallery</a></p>
		</li>
		<li class="llii contact-menu">
			<p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/contact">Contact</a></p>
		</li>
		<li class="llii about-menu">
			<p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/about">About Us</a></p>
		</li>
            </ul>
        </div>
    </div>
    <img style="position: absolute;margin-left: 50px;margin-top: 10px;" src="<?php echo base_url(); ?>images/asset/tittle-partnership.png">
    <div style="background: #D8D8D8;position: absolute; padding: 3px;margin-top: -40px;
         margin-left: 1130px;z-index: 5000;border-style:solid;border-width:1px;border-color: #A9A9A9">
        <div class="tool_search">
            <input style="margin-left: 35px;height: 25px;width: 200px;font-size:13pt;" type="text" name="search" id="search" value="" placeholder="Search" onchange="cek_value_input()"/>
        </div>
    </div>
    <div id="content" style="padding: 10px;">
        <div id="map-canvas" style="float:left;width:100%; height:100%;"></div>
    </div>
    <div id="example" class="flora" title="Learn How to Join">
        <img align="center" src="<?php echo base_url();?>images/join.png"/>
        <ul>
            <li>Daftar sekarang sebagai Bloodbank</li>
            <li>Unggah dokumen yang menandakan institusi Anda</li>
            <li>Segera setelah identifikasi dokumen kelengkapan akun Anda akan aktif</li>
        </ul>
    </div> 
</div>
</body>
</html>