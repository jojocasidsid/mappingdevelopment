@extends('layouts.master')

@section('content')

<div class="container spacer">
    <div class="card">
        <div class="card-header"><h1 class="display-4">Moderator List</h1>
        
            <a href="/adduser" class="btn btn-primary">Add Moderator</a></div>
      
        <div class="card-body">
            <div class="table-responsive">
               <table class="table table-hover">

              
                <thead>
                    <tr>
                     
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created_at</th>
        
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    @if($user->role->name === "Admin")
                    <tr>

               

                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->created_at->toFormattedDateString()}}</td>
                    </tr>
                    @else
                    <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->created_at->toFormattedDateString()}}</td>
                 
                    <td><button id="{{ $user->id }}" class="btn btn-danger" type="submit" data-toggle="modal" data-target="#delete" data-docid="{{$user->id}}" >Delete</button>
                    </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
               </table>
            </div>
        </div>

        <div class="card-footer text-center">
                {!! $users->appends(request()->except('page'))->render() !!}

        </div>

    </div>






    <div class="modal fade" id="delete" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <form action="/delete/user" method="POST">
          
               
                  {{csrf_field()}}
          
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
          
                <div class="modal-body">
                  <h6>Are you sure you want to delete this user?</h6>
                  <input type="hidden" name="user_id" id="doc_id" value="">
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger">Delete user</button>
                </div>
          
              </form>
              </div>
            </div>
          </div>
</div>

<script>

$('#delete').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)

    var doc_id = button.data('docid')
    var modal = $(this)

modal.find('.modal-body #doc_id').val(doc_id);

})
</script>
@endsection