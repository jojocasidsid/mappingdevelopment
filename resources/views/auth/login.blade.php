@extends('layouts.master1')

@section('content')



{{-- 
<div class="limiter">
    <div class="row">
        <div class="col-lg-8">
            <img src="/img/loginbanner.png" alt="log-in" width="100%" height="100%" class="loginbanner">
 
        </div>
        <div class="col-lg-4">
<div class="" style="padding-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header text-white bg-secondary"><h5>{{ __('Login') }}</h5></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-footer bg-light">
                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div> --}}



{{-- <form class="form-signin text-center"  method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">

    @csrf
 
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <div class="form-group">
        <label for="email" class="">{{ __('E-Mail Address') }}</label>

        <div class="">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
  </form> --}}






  <div class="container-limiter">
      <div class="container-login">
          <div class="container-image" style="background-image: url('/img/loginbanner.png')">

          </div>
          
            <div class="login-wrap padding-properties">
                <form action="{{ route('login') }}" aria-label="{{ __('Login') }}" method="POST" class="login-form" style="margin-top:50%;">

                    @csrf

                    <span class="title title-form">
                        Sign In
                        </span>


                    <div class="input-wrap">
                        <span class="label-input">
                            Email Address
                        </span>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>



                        <div class="form-group input-wrap">

                               <span class="label-input">Password</span>
            
                              
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
            
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password')}}</strong>
                                                </span>
                                            @endif
                                      
                                   
                        </div>

                        


                  
                        <div class="form1234 form-group" style="width=100%;">
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                 
                                


                             
                        <div class="form-group">
                              
                                 
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                              
                            
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                           
                            </div>
                            



                </form>

                <a href="\" class="btn btn-secondary">Back to Climate Justice Map</a>


            </div>

          </div>


  </div>
@endsection
