<?php

namespace App\Modules\Users\Http\Controllers;
use App\Modules\Admin\Http\Controllers\AdminAppController;


use App\Modules\Users\Models\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;

class PermissionsController extends AdminAppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::get();
        return view("users::permissions.index")->with('permissions',$permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->page_title('Create New Permission');
        return view('users::permissions.create');
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
            'name' => 'required|unique:permissions,name',
            'display_name' => 'required|unique:permissions,display_name',
            'description' => 'required',
        ]);
        $permission = new Permission();
        $permission->name=$request->name;
        $permission->display_name=$request->display_name;
        $permission->description=$request->description;
        $permission->timestamps;
        $permission->save();

        $permissions = Permission::get();
        return view('users::permissions.index')->with('permissions',$permissions);
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
        $this->page_title('Edit Permission');
        $permission = Permission::find($id);
        return view('users::permissions.edit')->with(compact('permission'));
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
            'name' => "required|unique:permissions,name,$id",
            'display_name' => "required|unique:permissions,display_name,$id",
            'description' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name=$request->name;
        $permission->display_name=$request->display_name;
        $permission->description=$request->description;
        $permission->timestamps;
        $permission->save();

        $permissions = Permission::get();
        return view('users::permissions.index')->with('permissions',$permissions);
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
        $permission = Permission::find($id);
        $permission->delete();

        $permissions = Permission::get();
        return view('users::permissions.index')->with('permissions',$permissions);
    }
}
