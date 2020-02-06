@extends('layouts.master')

@section('cdn')
<link rel="stylesheet" type="text/css" href="/css/summernote-bs4.css">
<script  src="/js/summernote-bs4.js"></script>   



<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js" integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q==" crossorigin=""></script>
@endsection
@section('content')


<div class="container spacer">
    <div class="card">
        <div class="card-header">
        <div class="display-4">Edit project  </div>
    </div>
<form method="POST" action="/update/{{$popup->id}}" enctype="multipart/form-data">
    @include('layouts.errors')
    {{ csrf_field() }}
    <div class="card-body">

            <div class="form-group">
                    <label>Project Title</label>
            <input type="text" class="form-control"  placeholder="Enter Project Name" name="projectTitle" value="{{$popup->name}}" required>
                  </div>


                  <div class="form-group">
                      <label>Project Description</label>
                  <input type="text" class="form-control" placeholder="Enter description" name="projectDescription" value="{{$popup->description}}">
                  </div>

                  <div class="form-group">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control" name="category" required>
                          @foreach ($categories as $category)
                              
                         
                         
                    <option value="{{$category->id}}" @if($popup->category_id==$category->id) selected @endif>{{$category->name}}</option>
                      
                            @endforeach
                        </select>
                      </div>


                      
                   

                            <div id="map"></div>
                            <br>
                            <div class="form-group">
                                    <label for="address">Address</label>
                            <input class="form-control" type="text" placeholder="Address" id="address" value="{{$popup->address}}" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Latiude</label>
                                <input class="form-control" type="text" placeholder="Latitude" id="latitude" value="{{$popup->latitude}}" name="latitude" required>
                                
                              </div>
                                
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                <input class="form-control" type="text" placeholder="Longitude" id="longitude" name="longitude" value="{{$popup->longitude}}" required>
                                    
        
        
                                    </div>


                  <div class="form-group">
                        <label for="exampleTextarea">Body</label>
                        <small id="fileHelp" class="form-text text-muted">Please make sure you resize the picture(100%, 50%, 25%) for mobile viewing purposes</small>
                  <textarea class="form-control"  rows="10" id="editor" name="body" required>{!! $popup->body !!}</textarea>
                      </div>



                      <div class="form-group">
                            <label for="exampleInputFile">Image Cover</label>
                      <input type="file" class="form-control-file" id="exampleInputFile" accept="image/*" value="{{$popup->image}}" name="image">
                            <small id="fileHelp" class="form-text text-muted">The image must be less than 1mb</small>

                            <small>Current Uploaded</small>
                            <img src="\uploads\{{$popup->image}}" width="300px"  alt="" title="" />
                            <br>
                            <br>
                          </div>

                    

    </div>

    <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        <a role="button" href="/home" class="btn-secondary btn">
            Cancel
        </a>
    </div>
</form>
    </div>

</div>


    {{-- <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>


  <!-- Load Esri Leaflet Geocoder from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.2.13/dist/esri-leaflet-geocoder.css"
    integrity="sha512-v5YmWLm8KqAAmg5808pETiccEohtt8rPVMGQ1jA6jqkWVydV5Cuz3nJ9fQ7ittSxvuqsvI9RSGfVoKPaAJZ/AQ=="
    crossorigin="">
  <script src="https://unpkg.com/esri-leaflet-geocoder@2.2.13/dist/esri-leaflet-geocoder.js"
    integrity="sha512-zdT4Pc2tIrc6uoYly2Wp8jh6EPEWaveqqD3sT0lf5yei19BC1WulGuh5CesB0ldBKZieKGD7Qyf/G0jdSe016A=="
    crossorigin=""></script> --}}

    <link  href="https://unpkg.com/leaflet-geosearch@latest/assets/css/leaflet.css" rel="stylesheet" />
<script src="https://unpkg.com/leaflet-geosearch@latest/dist/bundle.min.js"></script>





<script>
        $(document).ready(function() {
            $('#editor').summernote();
        });



var GeoSearchControl = window.GeoSearch.GeoSearchControl;
var EsriProvider = window.GeoSearch.EsriProvider;

// remaining is the same as in the docs, accept for the var instead of const declarations
var provider = new EsriProvider();

var searchControl = new GeoSearchControl({
  provider: provider,
  autoComplete: true,             // optional: true|false  - default true
  autoCompleteDelay: 250, 
  showMarker: true,                                   // optional: true|false  - default true
  showPopup: true,                                   // optional: true|false  - default false
  marker: {                                           // optional: L.Marker    - default L.Icon.Default
    icon: new L.Icon.Default(),
    draggable: true,
  },
  popupFormat: ({ query, result }) => result.label,   // optional: function    - default returns result label
  maxMarkers: 1,                                      // optional: number      - default 1
  retainZoomLevel: false,                             // optional: true|false  - default false
  animateZoom: true,                                  // optional: true|false  - default true
  autoClose: false,                                   // optional: true|false  - default false
  searchLabel: 'Enter Location',                       // optional: string      - default 'Enter address'
  keepResult: false                                   // optional: true|false  - default false
});



        	var map = L.map('map').setView([{!! $popup->latitude!!}, {!! $popup->longitude !!}], 5);
            map.addControl(searchControl);
            var marker = L.marker([{!! $popup->latitude!!}, {!! $popup->longitude !!}]).addTo(map);

     map.on('geosearch/showlocation', function(data){
        map.removeLayer(marker)
    lon = searchControl.resultList.results[0].x;
    lat = searchControl.resultList.results[0].y;
    address = searchControl.resultList.results[0].label;
    console.log(searchControl.resultList.results)
       $("#latitude").val(lat);
          $("#longitude").val(lon);
          $("#address").val(address);
          
    });


   map.on('geosearch/marker/dragend', function(data){
    lat = data.location.lat;
    lon = data.location.lng;
  

     $("#latitude").val(lat);

    $("#longitude").val(lon);

          $("#address").val("");

   });




L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.streets-basic'
}).addTo(map);













//   var sustainableagricultureIcon = L.icon({
//     iconUrl: '/img/webicon/location.svg',
//     iconSize:     [44, 49], // size of the icon
//      // size of the sh
//     iconAnchor:   [22, 49], // point of the icon which will correspond to marker's location
//     popupAnchor:  [0, -40] // point from which the popup should open relative to the iconAnchor
// });



// var results = L.layerGroup().addTo(map);

//    var searchControl = L.esri.Geocoding.geosearch().addTo(map);

// searchControl.on("results", function(data) {
//      results.clearLayers();
   
//     if(data.results.length==1){
//         results.addLayer(L.marker(data.results[0].latlng).bindPopup(data.results[0].text));
//     }
//     else{
//      for (var i = data.results.length - 1; i >= 0; i--) {
//          results.addLayer(L.marker(data.results[i].latlng).bindPopup(data.results[i].text).openPopup());
//     }
// }

    
   
//  });


 

// map.on('click',function(e){
//   lat = e.latlng.lat;
//   lon = e.latlng.lng;

     
//       //Clear existing marker, 

//       if (results != undefined) {
//         results.clearLayers();
//       };


//           $("#latitude").val(lat);
//       $("#longitude").val(lon);

      
   

//   //Add a marker to show where you clicked.
//   results.addLayer(L.marker([lat, lon])); 
  
// }); 

  // create the geocoding control and add it to the map



</script>

@endsection