@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                    <span style="font-weight: 700;
    letter-spacing: 1px;
    color: #f44336;">Permissions List</span>

                    <a href="{{url('/createpermission')}}" class="float-right btn btn-default btn-primary">Create Permission</a>

                    
                    <a href="{{url('/roleslist')}}" class="float-right btn btn-default btn-success mr-2"> Show Roles</a>

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
    <th>Permission Name</th>  
  <th>Description</th>  
  
     <th style="width: 15%;">Action</th>
    </thead>
    <tbody>

        @if(count($permissions)>0)

        @foreach($permissions as $permission)

<tr>
    <td>{{$permission->id}}</td>
     <td>{{$permission->name}}</td>
      <td>{{$permission->description}}</td>
     
        <td class="menu-action">
                
                <a href="{{url('/editpermission/'.$permission->id)}}" data-id="{{$permission->id}}" class="btnedit ml-2">
                  <i class="fa fa-pencil"></i>
                </a>
<a href="{{url('/deletepermission/'.$permission->id)}}" data-id="{{$permission->id}}"  class="btndelete ml-2 " >
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
