
var map;
var geocoder;

function initMap() {
  // The location of Uluru
  var uluru = {lat: 31.5204, lng: 74.3587};
  // The map, centered at Uluru
   map = new google.maps.Map(document.getElementById('map'), {zoom: 12, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});

  var cdata = JSON.parse(document.getElementById('data').innerHTML);
  geocoder = new google.maps.Geocoder();
  codeAddress(cdata);

  var allData = JSON.parse(document.getElementById('allData').innerHTML);
  showAllShops(allData)
}

function showAllShops(allData){
  var infoWind = new google.maps.InfoWindow;
    Array.prototype.forEach.call(allData, function(data){
    var content = document.createElement('div');
      var strong = document.createElement('strong');
      strong.textContent = data.name;
      content.appendChild(strong);

        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data.lat, data.lng),
           map: map
         });

         marker.addListener('click' , function(){
           infoWind.setContent(content);
           infoWind.open(map, marker);
         })
    })
}

function codeAddress(cdata) {
  Array.prototype.forEach.call(cdata, function(data){
    var address = data.name + ' '+ data.address;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == 'OK') {
        map.setCenter(results[0].geometry.location);
        var points = {};
        points.id = data.id;
        points.lat =map.getCenter().lat();
        points.lng =map.getCenter().lng();
        updateShopsWithLatLng(points);
      }
      else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
      });
  }
function updateShopsWithLatLng(points)
{
  //ajax calling
  $.ajax({
    url:"action.php",
    method:"post",
    data:points,
    success: function(res){
      console.log(res)
    }
  })
  console.log(points)
}
