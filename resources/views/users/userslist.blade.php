@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                    <span style="font-weight: 700;
    letter-spacing: 1px;
    color: #f44336;">Users List</span>

                    <a href="{{url('/createuser')}}" class="float-right btn btn-default btn-secondary">Create User</a>
                    <a href="{{url('/permissionslist')}}" class="float-right btn btn-default btn-primary mr-2"> Show Permissions</a>

                    <a href="{{url('/roleslist')}}" class="float-right mr-2 btn btn-default btn-success">Show Roles</a>
                    

                    

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
    <th>User Name</th>  
  <th>Roles</th>  
  <th>Permissions</th>
     <th style="width: 15%;">Action</th>
    </thead>
    <tbody>

        @if(count($userslist)>0)


@foreach($userslist as $user)

<tr>
    <td>{{$user->id}}</td>
     <td>{{$user->name}}</td>
      <td>
        

        @foreach($user->roles as $role)
        <span class="eachtag">{{$role->name}}</span>
        @endforeach
    </td>
       <td>

         @foreach($user->permissions as $permission)
          <span class="eachtag">{{$permission->name}}</span>
        @endforeach


        </td>
       
             <td class="menu-action">
                
                <a href="{{url('/edituser/'.$user->id)}}" data-id="{{$user->id}}" class="btnedit ml-2">
                  <i class="fa fa-pencil"></i>
                </a>
<a href="{{url('/deleteuser/'.$user->id)}}" data-id="{{$user->id}}"  class="btndelete ml-2 " >
  <i class="fa fa-trash-o"></i>
</a>
               </td>


        

</tr>

@endforeach

@else

<tr>
  <td colspan="5" class="text-center">
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
