@extends('layouts.master')
@section('cdn')


<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>

      <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection




@section('content')



<div class="container spacer">
 
  <div class="card">
<div class="card-header">
        <h1 class="display-4">Project list</h1>
<br>


<form action="search" method="POST" role="search" class="mr-1">
    {{ csrf_field() }}
    <div class="input-group">
    
        <input type="text" class="form-control" name="q"
            placeholder="Search" style="margin-right:5px;"> 
 
     
            <button type="submit" class="btn btn-success">
            Search
            </button>

    </div>
</form>


<div class="form-inline py-2">

    <a href="/addproject" class="btn btn-primary mr-2 my-2 btn-text"><img src="/img/Add-New.png" alt="" class="img-buttons" width="20px"> Add project  </a>


<button data-url="" class="btn btn-danger mr-2 my-2 btn-text delete-all"><img src="/img/trash.png" alt="" class="img-buttons" width="20px">Delete checked</button>



<div class="ml-auto form-inline">
<div class="dropdown mx-1">
    <button class="btn btn-info dropdown-toggle btn-text my-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Sort
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
   
      <a class="dropdown-item" href="/home?sort=id&direction=asc">id</a>
      <a class="dropdown-item" href="/home?sort=name&direction=asc">name</a>
      <a class="dropdown-item" href="/home?sort=address&direction=asc">address</a>
      <a class="dropdown-item" href="/home?sort=created_at&direction=desc">Date</a>
    </div>
  </div>
  
<a href="/home?sort=created_at&direction=desc"class="btn btn-secondary ml-1 btn-text my-2">Rollback</a>
</div>
</div>
@if(isset($count))
<h6>Total number of projects: (
{{$count}})</h6>
@endif
</div>


<div class="card-body">


   
    @if(isset($details))
    <div class="table-responsive ">
            <table class="table table-hover">
             
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                    <thead>
                      <tr>
                        <th><input type="checkbox" class="check" id="check_all"></th>
                        <th>@sortablelink('id') 
                        </th>
                        <th>@sortablelink('name')</th>
                  
                        <th>@sortablelink('address')</th>
                        <th>@sortablelink('category_id', 'Category') </th>
                      
                        <th>Posted by</th>
                        <th>@sortablelink('created_at','Created At') </th>
                        {{-- <th>View</th> --}}
                        <th>@sortablelink('updated_at', 'Last Updated At')</th>
                        <th>Edit </th>
                        <th>Delete</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                     
                    
                
                      @foreach ($details as  $popup)
                          
                      
                      <tr >
                   
                    <td><input type="checkbox"  class="checkbox" data-id="{{ $popup->id }}" /></td>
 
                        <td>{{$popup->id}}</td>
                      <td>{{$popup->name}}</td>
                      <td>{{$popup->address}}</td>
                      <td>{{$popup->category->name}}</td>

                    
                      <td>{{$popup->user->name}}</td>
                        <td>{{$popup->created_at->toFormattedDateString()}}</td>
                        <td>{{$popup->updated_at->toFormattedDateString()}}</td>
                    {{-- <td><button id="{{ $popup->id }}" class="btn btn-info" type="submit" data-toggle="modal" data-target="#view" data-docid="{{$popup->id}}" data-projectname="{{$popup->name}}" data-projectaddress="{{$popup->address}}" data-projectcategory="{{$popup->category->name}}" data-projectbody='{{ $popup->body }}' data-projectimage="{{$popup->image}}" data-projectcreatedat="{{$popup->created_at->toFormattedDateString()}}" data-projectuser="{{$popup->user->name}}">View</button></td> --}}
                  
                      <td><a href="/edit/{{$popup->id}}" class="btn btn-warning">Edit</a></td>
                        <td><button id="{{ $popup->id }}" class="btn btn-danger" type="submit" data-toggle="modal" data-target="#delete" data-docid="{{$popup->id}}" >Delete</button>
                        </td>
                      </tr>
                      @endforeach
              
                    
                     
            
              
                    
                 
                    </tbody>

                  </table>
                 
              

    </div>
    {!! $details->render() !!}

    @endif
    
</div>




</div>
<!-- Modals-->

{{-- <div class="modal fade" id="view" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      
        <div class="modal-header">
          <p class="modal-title" id="project_name"></p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <div class="modal-body">
          <p><b>Category:</b></p>
          <p id="project_category"></p>
          <br>
          <p id="project_description"></p>
          <br>
          <p><b>Address:</b></p>
          <p id="project_address"></p>
          <br>
          <p><b>Project Salient Points</b></p>
          <p id="project_body"></p>
          <br>
          <p><b>Created At:</b></p>
          <p id="project_createdat"></p>
          <br>
          <p><b>Posted by:</b></p>
          <p id="project_user"></p> 
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
        </div>
  
   
      </div>
    </div>
  </div> --}}





  <div class="modal fade" id="delete" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form action="/delete/project" method="POST">
    
         
            {{csrf_field()}}
    
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation!</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    
          <div class="modal-body">
            <p>Are you sure you want to delete this record?</p>
            <input type="hidden" name="popup_id" id="doc_id" value="">
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete Record</button>
          </div>
    
        </form>
        </div>
      </div>
    </div>




        <!-- The Modal -->
   <div class="modal fade" id="deleteConfirmation">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h3 class="modal-title">Delete Checked Items</h3>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            Are you sure that you want to delete the selected projects?
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" id="yesConfirm" class="btn btn-danger">Yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
          
        </div>
      </div>
    </div>


</div>

@endsection

@section('scripts')

<script>


//  $('#view').on('show.bs.modal', function (event) {

// var button = $(event.relatedTarget)

// var name = button.data('projectname')
// var body = button.data('projectbody')
// var description = button.data('projectdescription')
// var address = button.data('projectaddress')
// var body = button.data('projectbody')
// var category = button.data('projectcategory')
// var user = button.data('projectuser')
// var date = button.data('projectcreatedat')

// var modal = $(this)
// modal.find('.modal-header #project_name').html(name);
// modal.find('.modal-body #project_body').html(body);
// modal.find('.modal-body #project_description').html(description);
// modal.find('.modal-body #project_address').html(address);
// modal.find('.modal-body #project_category').html(category);
// modal.find('.modal-body #project_user').html(user);
// modal.find('.modal-body #project_createdat').html(date);

// })


  $('#delete').on('show.bs.modal', function (event) {

           var button = $(event.relatedTarget)

           var doc_id = button.data('docid')
           var modal = $(this)

modal.find('.modal-body #doc_id').val(doc_id);

})








  $(document).ready(function () {

$('#check_all').on('click', function(e) {
 if($(this).is(':checked',true))  
 {
    $(".checkbox").prop('checked', true);  
 } else {  
    $(".checkbox").prop('checked',false);  
 }  
});




 $('.checkbox').on('click',function(){
    if($('.checkbox:checked').length == $('.checkbox').length){
        $('#check_all').prop('checked',true);
    }else{
        $('#check_all').prop('checked',false);
    }
 });

$('.delete-all').on('click', function(e) {


    var idsArr = [];  
    $(".checkbox:checked").each(function() {  
        idsArr.push($(this).attr('data-id'));
    });  


    if(idsArr.length <=0)  
    {  
        //alert("Please select atleast one record to delete.");
        $("#noneSelected").modal();
    }  else {  
      $("#deleteConfirmation").modal();

        $("#yesConfirm").click(function(){
          
          var strIds = idsArr.join(","); 

$.ajax({
    url: "{{ route('category.multiple-delete') }}",
    type: 'DELETE',
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    data: 'ids='+strIds,
    success: function (data) {
        if (data['status']==true) {
            $(".checkbox:checked").each(function() {  
                $(this).parents("tr").remove();
            });
            alert(data['message']);
        } else {
            alert('Whoops Something went wrong!!');
        }
    },
    error: function (data) {
        alert(data.responseText);
    }
});

   $("#deleteConfirmation").modal("hide");

          });
       /*  if(confirm("Are you sure, you want to delete the selected projects?")){  

            var strIds = idsArr.join(","); 

            $.ajax({
                url: "{{ route('category.multiple-delete') }}",
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: 'ids='+strIds,
                success: function (data) {
                    if (data['status']==true) {
                        $(".checkbox:checked").each(function() {  
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


        }   */
    }  
});

$('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    onConfirm: function (event, element) {
        element.closest('form').submit();
    }
});   

});
</script>




 




@endsection
