@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                    <span style="font-weight: 700;
    letter-spacing: 1px;
    color: #f44336;">Edit Role</span>

                    <a href="{{url('/roleslist')}}" class="float-right btn btn-default btn-success">Show Roles</a>
                    <a href="{{url('/permissionslist')}}"class="float-right btn btn-default btn-primary mr-2"> Show Permissions</a>

                    <a href="{{url('/userslist')}}" class="float-right mr-2 btn btn-default btn-secondary">Show Users</a>
                    

                    

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<!-- form -->

<form  method="POST" class="submitform" action="{{url('/updaterole/'.$role->id)}}" >

{{ csrf_field() }}
 
<div class="row">
                   
<div class=" col-12 col-lg-12  mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$role->name}}" required />

@if ($errors->has('name'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

  
</div>

                                    

<div class="col-12 mb-3">
  <label for="description" class="form-label">Description</label>
  <input type="text" class="form-control" id="description" name="description"  placeholder="Enter Your Description" value="{{$role->description}}" required />  
</div>


<div class="col-12 ">
<button type="submit" class="btn btn-success" >Submit</button>
</div>

</div>


</form>

<!-- form end -->


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
