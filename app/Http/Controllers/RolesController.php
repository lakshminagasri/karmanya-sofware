<?php

namespace App\Http\Controllers;

use App\roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $roles=Roles::all();
// dd($roles);

         return view('roles.roleslist')->with('roles',$roles);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('roles.createrole');  
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

        $role=new Roles;
        $role->name=$request->name;
         $role->description=$request->description;
         $role->save();


          $request->session()->flash('msg','Role saved successfully');
        return redirect('/roleslist');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(roles $roles,$id)
    {
        //

        // dd($id);

        $role=Roles::where('id','=',$id)->first();

        // dd($role);


        return view('roles.editrole')->with('role',$role); 


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, roles $roles,$id)
    {
        //

        // dd($id);

         $role= Roles::find($id);

         // dd($role);
        $role->name=$request->name;
         $role->description=$request->description;
         $role->save();


          $request->session()->flash('msg','Role updated successfully');
        return redirect('/roleslist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,roles $roles ,$id)
    {
        //

         $role= Roles::find($id);
         $role->delete();

         $request->session()->flash('msg','Role deleted successfully');
        return redirect('roleslist');


    }
}
