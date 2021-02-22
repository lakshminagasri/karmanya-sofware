<?php

namespace App\Http\Controllers;

use App\permissions;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $permissions=Permissions::all();
// dd($permissions);

         return view('permissions.permissionslist')->with('permissions',$permissions); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('permissions.createpermission');  
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

        $permission=new Permissions;
        $permission->name=$request->name;
         $permission->description=$request->description;
         $permission->save();


          $request->session()->flash('msg','Permission saved successfully');
        return redirect('/permissionslist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function show(permissions $permissions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function edit(permissions $permissions,$id)
    {
        //

         // dd($id);

        $permission=Permissions::where('id','=',$id)->first();

        // dd($permission);


        return view('permissions.editpermission')->with('permission',$permission); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, permissions $permissions,$id)
    {
        //


        // dd($id);

         $permission= Permissions::find($id);

         // dd($role);
        $permission->name=$request->name;
         $permission->description=$request->description;
         $permission->save();


          $request->session()->flash('msg','Permission updated successfully');
        return redirect('/permissionslist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,permissions $permissions,$id)
    {
        //

         $permission= Permissions::find($id);
         $permission->delete();

         $request->session()->flash('msg','Permission deleted successfully');
        return redirect('permissionslist');
    }
}
