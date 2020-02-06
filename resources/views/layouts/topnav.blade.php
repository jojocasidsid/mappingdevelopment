
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
        <a class="navbar-brand" href="\" id="navbar-brand">Climate Justice</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
              @if (Route::has('login'))
          <ul class="navbar-nav ml-auto">
        
                  @auth
                  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="nav-link" data-toggle="dropdown">

                        <img src="/img/projectorscreen.png" width="30px" alt="">Project
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" id="nav-dropdown" href="/">Climate Justice Map</a>
                          <a class="dropdown-item" href="/home">Projects</a>
                          @if(Auth::user()->role->name=="Admin")
                          <a class="dropdown-item" href="/users">Moderators</a>
                          @endif
                        </div>
                    </li>
            

                

                <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="/documentations"><img src="/img/Documents.png" width="30px" alt="">Documentation</a>
                    </li>

                 

                <li class="nav-item dropdown">
                    <a id="nav-link"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img src="/img/user.png" width="30px" alt="" >
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="/userprofile"> Account Settings
                       
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                    </div>
                    

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </div>
                    </div>

               
                       

            @else






            
      
            <li class="nav-item">
                  <a class="nav-link" id="nav-link" href="/"> <img src="/img/projectorscreen.png" width="25px" alt=""> Project</a>
                </li>
      
      
          
      
            <li class="nav-item">
              <a class="nav-link" id="nav-link" href="{{ route('login') }}"><img src="/img/login.png" width="25px" >Login</a>
            </li>
      
                @endauth
        
          </ul>
          @endif
        </div>
    </div>

      </nav>

