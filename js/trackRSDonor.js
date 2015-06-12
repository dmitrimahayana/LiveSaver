function loadScript() {   
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyC48L1OrM6h4IcE6smmfD1BdCO4-zwXj8M&sensor=true&callback=calcRoute";
    document.body.appendChild(script);
}

var directionsDisplay;
var map;
var geocoder;
var markersArray = [];
var directionsService;

function initialize() {
    geocoder = new google.maps.Geocoder();
    directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});

    //var chicago = new google.maps.LatLng(41.850033, -87.6500523);

    var mapOptions = {
            //zoom:8,
            //center: chicago,
            mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById("directionsPanel"));

}

function makeMarker( position, icon, title ) {
    new google.maps.Marker({
            position: position,
            map: map,
            icon: icon,
            title: title
    });
}

function clearOverlays() {
  if (markersArray) {
        for (i in markersArray) {
          markersArray[i].setMap(null);
        }
        markersArray.length = 0;

  }
}


function calcRoute() {
    initialize();
    clearOverlays();
    var leg;

    var start = document.getElementById("start").value;
    var end = document.getElementById("end").value;
    var request = {
            origin:start,
            destination:end,
            travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService = new google.maps.DirectionsService();
    directionsService.route(request
    , function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                    leg = response.routes[ 0 ].legs[ 0 ];

            }
    });
    codeAddress(start,end);
}

function codeAddress(start,end) {
    var marker = new Array();
    //draw maker 1

    var address = new Array(start,end);
            geocoder.geocode( { 'address': address[0]}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                    marker[0] = new google.maps.Marker({
                            map: map,
                            //animation:BOUNCE,
                            position: results[0].geometry.location
                    });
                    marker[0].setAnimation(google.maps.Animation.BOUNCE);
                    setTimeout(function(){ marker[0].setAnimation(null); }, 1500);
                    marker[0].setIcon('http://localhost/lifesaverbaru/images/asset/bighouse.png');
                    markersArray.push(marker[0]);
                    attachMessage(marker[0], '<IMG WIDTH="80px" HEIGHT="80px" BORDER="0" ALIGN="Left" SRC="images/asset/wall.jpg"> Lokasi Anda:<br/>'+address[0]);

              } else {
                    alert("Geocode was not successful for the following reason: " + status);
              }
            });
    //}

    //draw maker 2
    geocoder.geocode( { 'address': address[1]}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
            marker[1] = new google.maps.Marker({
                    map: map,
                    //animation:BOUNCE,
                    position: results[0].geometry.location
            });
            marker[1].setAnimation(google.maps.Animation.BOUNCE);
            setTimeout(function(){ marker[1].setAnimation(null); }, 1500);
            marker[1].setIcon('http://localhost/lifesaverbaru/images/asset/firstaid.png');
            markersArray.push(marker[1]);
            attachMessage(marker[1], '<IMG WIDTH="80px" HEIGHT="80px" BORDER="0" ALIGN="Left" SRC="images/asset/wall.jpg"> Rumah Sakit:<br/>'+address[1]);

      } else {
            alert("Geocode was not successful for the following reason: " + status);
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

function goToPage(inp,inp2){
    
    document.getElementById("start").value = inp;
    document.getElementById("end").value = inp2;
    $("<div id='map-canvas'><div id='progressbar'><div class='progress-label'>").dialog({
        modal: true,
        title: 'Tracking Lokasi Donor Darah',
        width: '800',
        height: '700',
        show: {
            //effect: "slide",
            duration: 500
        },
        hide: {
            //effect: "slide",
            duration: 500
        },
        close: function(event, ui) {$(this).remove();}
    }).dialog('open');

    var progressbar = $( "#progressbar" ),
        progressLabel = $( ".progress-label" );
        progressbar.progressbar({
            value: false,
            change: function() {
                //progressLabel.text( progressbar.progressbar( "value" ) + "%" );
            },
            complete: function() {
                //progressLabel.text( "Complete!" );
            }
        });
        function progress() {
            var val = progressbar.progressbar( "value" ) || 0;
            progressbar.progressbar( "value", val + 5 );
            if ( val < 99 ) {
                setTimeout( progress, 100 );
            }
        }
        setTimeout( progress, 200 );

        setTimeout(function() { loadScript();}, 2000);
};

