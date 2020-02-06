@extends('layouts.layoutsmap')


@section('cdn')


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>

<link rel="stylesheet" href="/css/leaflet-sidebar.css">
<link rel="stylesheet" href="/css/MarkerCluster.css">
<link rel="stylesheet" href="/css/MarkerCluster.Default.css">

@endsection

@section('content')

<style>
.leaflet-container {
	background: #fff;
	outline: 0;
}

.leaflet-bottom.leaflet-right{


}

.leaflet-control-attribution.leaflet-control{
    background-color: #414042;
    opacity: 1;
    color: white;
    
  
}

.leaflet-control-attribution.leaflet-control a{
    color: white;
}

.leaflet-control-attribution.leaflet-control h6{
    font-size: 25px;
}
</style>

<div class="wrapper">
    <!-- Sidebar  -->
    @if (Route::has('login'))
    <nav id="sidebar1" class="active">
        <div class="sidebar-header">
            <h3>Rosa Luxemburg Stifftung</h3>
            <strong>RLS</strong>
        </div>

        <ul class="list-unstyled components">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="nav-link" data-toggle="dropdown">

                <img src="/img/projectorscreen.png" width="50px" alt="">Project
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                        
                  <a class="dropdown-item" href="/home">Projects</a>
                  @if(Auth::user()->role->name=="Admin")
                  <a class="dropdown-item" href="/users">Users</a>
                  @endif
                </div>
            </li>

          <li class="nav-item">
                  <a class="nav-link" id="nav-link" href="/documentations"><img src="/img/Documents.png" width="50px" alt="">Documentation</a>
              </li>

          <li class="nav-item dropdown">
              <a id="nav-link"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img src="/img/user.png" width="50px" alt="" >
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="/userprofile"> Account
                 
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>


              

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
      @else






      

      <li class="nav-item">
            <a class="nav-link active" id="nav-link" href="/"> <img src="/img/projectorscreen.png" width="50px" alt=""> Project</a>
          </li>


    

      <li class="nav-item">
        <a class="nav-link" id="nav-link" href="{{ route('login') }}"><img src="/img/login.png" width="50px" >Login</a>
      </li>

    
          @endauth


          <li class="nav-item">
              <a class="nav-link" id="sidebarCollapse" href="#"><img src="/img/toggle.png" width="50px" >Toggle Sidebar</a>
            </li>
  
    </ul>
    @endif
        </ul>
      
    </nav>


<div id="map"></div>

</div>

<div id="sidebar-right">
  
    <br>
    <h5 class="text-center"><b>Project Salient Points</b></h5>
 

    <div id="sidebar-content">

    </div>
 
</div>

@endsection


@section('scripts')

<script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js" integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q==" crossorigin=""></script>
<script src="/js/leaflet.markercluster.js"></script>
<script type="text/javascript" src="/js/leaflet-sidebar.js"></script>

<script type="text/javascript" src="/js/jquery.mobile.custom.js"></script>


<link  href="https://unpkg.com/leaflet-geosearch@latest/assets/css/leaflet.css" rel="stylesheet" />
<script src="https://unpkg.com/leaflet-geosearch@latest/dist/bundle.min.js"></script>


<script type="text/javascript">

  $('#sidebarCollapse').on('click', function () {
      $('#sidebar1').toggleClass('active');
  });

$('#map').height(window.innerHeight);

 var projectlist =[
    @foreach($projects as $project)

     
    @if ($loop->last)

{"type":"Feature",


"properties":{
    "name":{!! json_encode($project->name) !!},
    "description":"{{ $project->description }}",
    "category":{!! json_encode($project->category->name) !!},
    "image":"{{ $project->image }}",
    "address":{!!json_encode($project->address)!!},
    "body":{!! json_encode($project->body) !!}
},

     "geometry":{
        "type":"Point",
        "coordinates": [ {{$project->longitude}}, {{$project->latitude}}]
    }
}
    @else

    {"type":"Feature",
    
    "properties":{
        "name":{!! json_encode($project->name) !!},
        "description":"{{ $project->description }}",
        "category":{!! json_encode($project->category->name)!!},
        "image":"{{ $project->image }}",
        "address":{!!json_encode($project->address)!!},
        "body":{!! json_encode($project->body) !!}
   
    },    
    "geometry":{
            "type":"Point",
            "coordinates": [{{$project->longitude}}, {{$project->latitude}}]
        },

   
    },

    @endif
    


      @endforeach

    ];

</script>
<script src="/js/projectpopup.js"></script>
    <!-- made by Jojo V. Casidsid Email:jvcasidsid2013@gmail.com-->
@endsection