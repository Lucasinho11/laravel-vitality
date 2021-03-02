
@extends('layouts.default')
@section('content')
@include('partials.navbar')
<script>

function initMap() {
  const v_hive = { lat: 48.8652497, lng: 2.3519977 };

  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: v_hive,
  });

  const marker = new google.maps.Marker({
    position: v_hive,
    map: map,
  });
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?=env('API_KEY')?>&callback=initMap&libraries=&v=weekly" async></script>
<style>
#map {
    margin-left: 10%;
    margin-right: 10%;
  height: 400px;

  width: 80%;

}
</style>
<div class="img-index">
    <div class="text-index">
        <h2>Réservez maintenant!</h2>
        <a href="/reservation">
        <button type="button" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Réserver maintenant</button>
        </a>
    </div>
</div>
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Lundi
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Mardi
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Mercredi
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jeudi
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Vendredi
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Samedi
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Dimanche
                
              </th>

            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">12h-18h</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">12h-18h</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">12h-18h</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">12h-18h</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">12h-18h</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">12h-18h</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">Fermé ❌</div>
              </td>
            </tr>

            <!-- More items... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="infos">
<h2>📍Adresse: 102 Boulevard de Sébastopol, 75003 Paris</h2>
</div>
<div id="map">

</div>
<?= env('APP_NAME');?>
