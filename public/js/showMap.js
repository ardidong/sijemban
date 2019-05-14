var map;
function initMap(){
//var donasi = {!! json_encode($donasis->toArray()) !!};
//var myLatlng = new google.maps.LatLng(donasi.latitude, donasi.longitude);
var pos = {
	lat: 0, 
	lng: 0
};
//console.log(donasi.longitude)

map = new google.maps.Map(document.getElementById('map-canvas'), {
center: pos,
zoom: 13
});
}  