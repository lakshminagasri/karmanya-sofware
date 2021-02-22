@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                    <span style="font-weight: 700;
    letter-spacing: 1px;
    color: #f44336;">Roles List</span>

                    <a href="{{url('/createrole')}}" class="float-right btn btn-default btn-success">Create Role</a>


                    <a href="{{url('/permissionslist')}}" class="float-right btn btn-default btn-primary mr-2"> Show Permissions</a>

                    <a href="{{url('/userslist')}}" class="float-right mr-2 btn btn-default btn-secondary">Show Users</a>
                    

                    

                </div>

                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif

<!-- table start -->

<table class="table table-bordered table-striped">
      
    <thead>
    <th>S.No</th>
    <th>Role Name</th>  
  <th>Description</th>  
  
     <th style="width: 15%;">Action</th>
    </thead>
    <tbody>
 @if(count($roles)>0)
        @foreach($roles as $role)

<tr>
    <td>{{$role->id}}</td>
     <td>{{$role->name}}</td>
      <td>{{$role->description}}</td>
     
        <td class="menu-action">
                
                <a href="{{url('/editrole/'.$role->id)}}" data-id="{{$role->id}}" class="btnedit ml-2">
                  <i class="fa fa-pencil"></i>
                </a>
<a href="{{url('/deleterole/'.$role->id)}}" data-id="{{$role->id}}"  class="btndelete ml-2 " >
  <i class="fa fa-trash-o"></i>
</a>
               </td>

</tr>

@endforeach

@else


       

<tr>
  <td colspan="4" class="text-center">
<div>Table is empty</div>   
</td> 
</tr>
        @endif

        
    </tbody>

</table>


                  


<!-- table end -->


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
