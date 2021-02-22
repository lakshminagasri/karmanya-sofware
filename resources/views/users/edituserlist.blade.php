@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                    <span style="font-weight: 700;
    letter-spacing: 1px;
    color: #f44336;">Edit User</span>

    <a href="{{url('/userslist')}}" class="float-right  btn btn-default btn-secondary ">Show Users</a>

    <a href="{{url('/permissionslist')}}" class="float-right btn btn-default btn-primary mr-2"> Show Permissions</a>


                    <a href="{{url('/roleslist')}}" class="float-right btn btn-default btn-success mr-2">Show Roles</a>
                    
                    
                    

                    

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<!-- form -->

<form  method="POST" class="submitform" action="{{url('/updateuser/'.$userslist->id)}}" >

{{ csrf_field() }}
 
<div class="row">
                   
<div class=" col-12 col-lg-12  mb-3">
  <label for="name" class="form-label">User Name</label>
  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required value='{{$userslist->name}}' />

@if ($errors->has('name'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

  
</div>

                                    

<div class="col-12 mb-3">
  <label for="role" class="form-label">Roles</label>
  <!-- <input type="text" class="form-control" id="role" name="role"  placeholder="Add Roles" required />  --> 


<select id="role" class="js-example-basic-multiple form-control" name="role[]"  multiple="multiple" required >
                             @if(count($roles)>0)
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                         @else
                                         <option value="role">Add Role</option>
                                        @endif
                                        </select>
                                

</div>


<div class="col-12 mb-3">
  <label for="permission" class="form-label">Permissions</label>
  <!-- <input type="text" class="form-control" id="permission" name="permission"  placeholder="Add Permissions" required />  -->

<select id="permission" class="js-example-basic-multiple form-control" name="permission[]" multiple="multiple" required >
                             @if(count($permissions)>0)
                                        @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                        @endforeach
                                         @else
                                         <option value="permission">Add Role</option>
                                        @endif
                                        </select>

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

@section('scripts')

<script type="text/javascript">

  var g_roles_data=null;
  var g_permissions_data=null;

  
  if ({{count($roles_id)}} != 0) {
            g_roles_data = <?php echo json_encode($roles_id);?>;

        }

        
  if ({{count($permissions_id)}} != 0) {
       g_permissions_data = <?php echo json_encode($permissions_id);?>;

        }


        console.log(g_roles_data);
         $('#role').val(g_roles_data).trigger('change');

         console.log(g_permissions_data);
         $('#permission').val(g_permissions_data).trigger('change');



  </script>


@endsection

