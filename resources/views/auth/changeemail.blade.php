@extends('layouts.master')


@section('content')

<div class="container spacer">
    <div class="row justify-content-center">
        <div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="display-4">Change Email</h4>

        </div>
        <div class="card-body">



            <form action="/changeEmail" method="POST">

                    {{ csrf_field() }}

                    @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                

                <div class="form-group{{ $errors->has('current-email') ? ' has-error' : '' }}">
                    <label for="email">Current Email</label>
                <input type="email" name="current-email" id="current-email" class="form-control" required>

                 
                @if ($errors->has('current-email'))
                <span class="help-block">
                <strong>{{ $errors->first('current-email') }}                                </strong>
                                        </span>
                                        @endif
            </div>

            <div class="form-group{{ $errors->has('new-email') ? ' has-error' : '' }}">

            <label for="new-email">
                New Email
            </label>

            <input type="email" name="new-email" id="new-email" class="form-control" required>


            
            @if ($errors->has('new-email'))
            <span class="help-block">
            <strong>{{ $errors->first('new-email') }}</strong>
        </span>
        @endif

            </div>



            

        </div>
        <div class="card-footer">
                <div class="form-group">
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                Change Email
                            </button>
                        </div>
                    </div>
        </form>
        </div>
    </div>
</div>
    

</div>
</div>


@endsection