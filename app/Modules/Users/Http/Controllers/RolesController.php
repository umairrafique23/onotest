<?php

namespace App\Modules\Users\Http\Controllers;

use App\Modules\Users\Models\Role;
use Illuminate\Http\Request;
use App\Modules\Admin\Http\Controllers\AdminAppController;


class RolesController extends AdminAppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::get();
        return view("users::roles.index")->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->page_title('Create New Role');
        return view('users::roles.create');
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
        $this->validate($request,[
            'name' => 'required|unique:roles,name',
            'display_name' => 'required|unique:roles,display_name',
            'description' => 'required',
        ]);
        $role = new Role();
        $role->name=$request->name;
        $role->display_name=$request->display_name;
        $role->description=$request->description;
        $role->timestamps;
        $role->save();
        $roles = Role::get();
        return view('users::roles.index')->with('roles',$roles);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->page_title('Edit Role');
        $role = Role::find($id);
        return view('users::roles.edit')->with(compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name' => "required|unique:roles,name,$id",
            'display_name' => "required|unique:roles,display_name,$id",
            'description' => 'required',
        ]);

        $role = Role::find($id);
        $role->name=$request->name;
        $role->display_name=$request->display_name;
        $role->description=$request->description;
        $role->timestamps;
        $role->save();

        $roles = Role::get();
        return view('users::roles.index')->with('roles',$roles);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $role = Role::find($id);
        $role->delete();

        $roles = Role::get();
        return view('users::roles.index')->with('roles',$roles);
    }
}
