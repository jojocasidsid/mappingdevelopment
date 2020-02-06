@extends('layouts.master')


@section('content')


<div class="container spacer">
    <div class="card">
        <div class="card-header">
            <h3 class="display-4">User Profile</h3>
           
        </div>
        <div class="card-body">
                <div class="row">
                        <div class="col-sm-6 text-center">
                           <p style="font-size:20px;"> {{ Auth::user()->name }}</p>
                        </div>
                        <div class="col-sm-6 text-center">
                            <button id="{{ Auth::user()->id}}" class="btn btn-primary" type="submit" data-toggle="modal" data-target="#change" data-userid="{{Auth::user()->id}}" >Change Name</button>
                        </div>
                    </div>
                    <hr>

                    
                    <div class="row">
                            <div class="col-sm-6 text-center">
                                    <p style="font-size:20px;"> {{ Auth::user()->email }}</p>
                            </div>
                            <div class="col-sm-6 text-center">
                                <a href="/change/email" class="btn btn-danger">
                                Change Email
                                </a>
                            </div>
                        </div>

                    <hr>

                    <div class="row">
                            <div class="col-sm-6 text-center">
                                *****************
                            </div>
                            <div class="col-sm-6 text-center">
                                <a href="/change/password" class="btn btn-warning">
                                Change Password
                                </a>
                            </div>
                        </div>
        </div>
    </div>
</div>



<div class="modal fade" id="change" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <form action="/changeName" method="POST">
      
           
              {{csrf_field()}}
      
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Change Name</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
      
            <div class="modal-body">
              <div class="form-group">
                  <label for="username">New Name</label>
                  <input type="text" name="username" id="username" class="form-control" required>
              </div>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Change Name</button>
            </div>
      
          </form>
          </div>
        </div>
      </div>

@endsection

@section('scripts')


@endsection