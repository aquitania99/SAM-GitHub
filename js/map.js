var companyName = 'My Compay Pty. Ltd.';
var infowindow = new google.maps.InfoWindow({});
function initialize() {
    var myLatlng = new google.maps.LatLng(-33.865143,151.209900);
    var mapOptions = {
      zoom: 15,
      center: myLatlng
    }
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: companyName,
        animation: google.maps.Animation.DROP,
    });
}

google.maps.event.addDomListener(window, 'load', initialize);