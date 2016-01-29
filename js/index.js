var myCenter=new google.maps.LatLng(42.6641,23.288);

function initialize()
{
    var mapProp = {
        center:myCenter,
        zoom:15,
        mapTypeId:google.maps.MapTypeId.ROADMAP,
        styles:[
            { featureType: "all", stylers: [ { "invert_lightness": false },{ "saturation": 0 }, { "weight": 1.5 } ] }
        ]
    };

    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker = new google.maps.Marker({
        position:myCenter
    });

    marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
