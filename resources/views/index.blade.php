
@extends('layouts.default')
@section('content')
@include('partials.navbar')
<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: 48.8652497, lng: 2.3519977 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}

</script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=KEY&callback=initMap&libraries=&v=weekly"
      async
    ></script>
<style>
#map {
    margin-left: 10%;
    margin-right: 10%;
  height: 400px;
  /* The height is 400 pixels */
  width: 80%;
  /* The width is the width of the web page */
}
</style>
<div class="img-index">
    <div class="text-index">
        <h2>Réservez maintenant!</h2>
        <a href="/reservation">
        <button class="p-2 my-2 bg-blue-500 text-white rounded-md focus:outline-none focus:ring-2 ring-blue-300 ring-offset-2">Réserver</button>
        </a>
        
    </div>
</div>
<div id="map">
</div>
