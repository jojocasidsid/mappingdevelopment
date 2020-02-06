@extends('layouts.master')

@section('content')

<div class="container spacer">
    <div class="card">
        <div class="card-header">
            <h4 class="display-4">Add Moderator</h4>
        </div>
        <div class="card-body">
                @include('layouts.errors')
            <form action="/adduser/store" method="post">
                @csrf
                <h5>Register</h5>
                <div class="form-group">
                    <label for="name">Name</label>

                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                 
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                
                </div>
                <div class="form-group">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control" name="role" required>
                          @foreach ($roles as $role)
                              
                         
                        <option value="{{$role->id}}">{{$role->name}}</option>
                      
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
          
        </div>
        <div class="card-footer">

                    <button type="submit" class="btn btn-primary">
                      Register
                    </button>
                    <a  class="btn btn-secondary" href="/users">
                            Cancel
                    </a>
         
            </div>
        </form>
    </div>
</div>

@endsection