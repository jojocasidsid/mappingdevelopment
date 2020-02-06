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
        <div class="display-4">Add project  </div>
    </div>
<form method="POST" action="/addproject/store" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-body">

            @include('layouts.errors')

            <div class="form-group">
                    <label>Project Title</label>
                    <small id="fileHelp" class="form-text text-muted">This field is required</small>
                    <input type="text" class="form-control" value="{{ old('projectTitle') }}"  placeholder="Enter Project Name" name="projectTitle" required>
                  </div>


                  <div class="form-group">
                      <label>Project Description</label>
                      <input type="text" class="form-control" placeholder="Enter description" value="{{ old('projectDescription') }}" name="projectDescription">
                  </div>

                  <div class="form-group">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control" name="category" required>
                          @foreach ($categories as $category)
                              
                         
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      
                            @endforeach
                        </select>
                      </div>


                      
                   

                            <div id="map"></div>
                            <br>
                            <div class="form-group">
                                    <label for="address">Address</label>
                                    <small id="fileHelp" class="form-text text-muted">This field is required</small>
                                    <input class="form-control" type="text" placeholder="Address" id="address" name="address"  value="{{ old('address') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Latiude</label>
                                    <small id="fileHelp" class="form-text text-muted">This field is required</small>
                                <input class="form-control" type="text" placeholder="Latitude" id="latitude" name="latitude" value="{{ old('latitude')}}" required>
                                
                              </div>
                                
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <small id="fileHelp" class="form-text text-muted">This field is required</small>
                                <input class="form-control" type="text" placeholder="Longitude" id="longitude" name="longitude" value="{{ old('longitude') }}" required>
                                    
        
        
                                    </div>


                  <div class="form-group">
                        <label for="exampleTextarea">Body</label>
                        <small id="fileHelp" class="form-text text-muted">Please make sure you resize the picture(100%, 50%, 25%) for mobile viewing purposes<br>This field is required</small>
                  <textarea class="form-control"  rows="10" id="editor" name="body" required>{{ old('body') }}</textarea>
                      </div>



                      <div class="form-group">
                            <label for="exampleInputFile">Image Cover</label>
                            
                      <input type="file" class="form-control-file" id="exampleInputFile" accept="image/*" name="image" value="{{ old('image') }}">
                            <small id="fileHelp" class="form-text text-muted">The image must be less than 1mb</small>
                          </div>

                    

    </div>

    <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        <a role="button" href="/home" class="btn-secondary btn">
            Cancel
        </a>
    </div>
</form>
    </div>

</div>

@endsection
@section('scripts')

<link  href="https://unpkg.com/leaflet-geosearch@latest/assets/css/leaflet.css" rel="stylesheet" />
<script src="https://unpkg.com/leaflet-geosearch@latest/dist/bundle.min.js"></script>


<script>
        $(document).ready(function() {
            $('#editor').summernote(

               
            );
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



        	var map = L.map('map').setView([11.81, 122.17], 5);
            map.addControl(searchControl);


            map.on('geosearch/showlocation', function(data){
      
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

         

   });




L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.streets-basic'
}).addTo(map);







</script>

@endsection