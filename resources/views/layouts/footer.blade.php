<div class="container-fluid py-3 background-black">
        <div class="container">
                @if (Route::has('login'))
            <ul class="nav justify-content-center py-1">
                    <li class="nav-item">
                            @auth
                        <a class="nav-link" id="nav-link" href="{{ url('/home') }}">Dashboard</a>
                      </li>
                      @else
                
                      <li class="nav-item">
                            <a class="nav-link" id="nav-link" href="/"> <img src="/img/projectorscreen.png" width="50px" alt="">Climate Justice Map</a>
                          </li>
                
                
                    
                
                      <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('login') }}"><img src="/img/login.png" width="50px" >Login</a>
                      </li>
                
                 
                          @endauth
                  
                    </ul>
                    @endif


                </div>
        <div class="container py-3 spacer" style="height:300px;">
                <div class="row">
                    <div class="col-md-6">
                        <p></p>
                    </div>
                    <div class="col-md-6">
                        <p></p>
                        </div>
                </div>
        </div>
    </div>


