<?php

namespace App\Http\Controllers;

use App\userslist;
use App\Roles;
use App\permissions;

use Illuminate\Http\Request;

class UserslistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

 // $users=Userslist::all();
// dd($users);

         // return view('users.userslist')->with('users',$users); 

$userslist=Userslist::orderBy('id','asc')->get();

$roles = Roles::orderBy('name','asc')->get();
$permissions=Permissions::orderBy('name','asc')->get();


 // $data['permissions'] =Permissions::orderBy('name','asc')->get();
// $users=$data['users']

 // $data['get_roles'] = json_decode($users->roles);
// dd($users['roles']);

foreach($userslist as $user)
{

     $roles = json_decode($user->roles);
      $user->roles  = Roles::whereIn('id',$roles)->get();

   $permissions = json_decode($user->permissions);
   $user->permissions  = Permissions::whereIn('id',$permissions)->get();

// dd($rolesdata);



}


  return view('users.userslist')->with('userslist',$userslist); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

$data['roles'] = Roles::orderBy('name','asc')->get();
        $data['permissions'] = Permissions::orderBy('name','asc')->get();

        return view('users.createuserlist',$data);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // dd($request->all());

        // dd($request->role);

        // dd(json_encode(request('role')));

         $userslist=new Userslist;
        $userslist->name=$request->name;
         $userslist->roles=json_encode(request('role'));
           $userslist->permissions=json_encode(request('permission'));
         $userslist->save();


          $request->session()->flash('msg','User saved successfully');
        return redirect('/userslist');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\userslist  $userslist
     * @return \Illuminate\Http\Response
     */
    public function show(userslist $userslist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\userslist  $userslist
     * @return \Illuminate\Http\Response
     */
    public function edit(userslist $userslist,$id)
    {
        //

        // dd($id);

        $userslist=Userslist::where('id','=',$id)->first();
          $data['userslist']=Userslist::where('id','=',$id)->first();
       // dd($userslist);

          $roles_id_list = json_decode($userslist->roles);
$data['roles_id'] = $roles_id_list;
        // $data['roles'] = Roles::find($roles_id_list);

 $data['roles'] = Roles::all();



    $permissions_id_list = json_decode($userslist->permissions);
    $data['permissions_id'] = $permissions_id_list;
    // $data['permissions'] = Permissions::find($permissions_id_list);

    $data['permissions'] = Permissions::all();

        // dd($data);






        // return view('users.edituserlist')->with('userslist',$userslist);

         return view('users.edituserlist',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\userslist  $userslist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userslist $userslist,$id)
    {
        //

        // dd($id);

         $userslist= Userslist::find($id);

         // dd($userslsit);
       $userslist->name=$request->name;
         $userslist->roles=json_encode(request('role'));
           $userslist->permissions=json_encode(request('permission'));
         $userslist->save();


          $request->session()->flash('msg','User Updated successfully');
        return redirect('/userslist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userslist  $userslist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,userslist $userslist,$id)
    {
        //

        $userslist= Userslist::find($id);
         $userslist->delete();

         $request->session()->flash('msg','User deleted successfully');
        return redirect('userslist');
    }
}
