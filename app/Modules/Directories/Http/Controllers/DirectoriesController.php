<?php

namespace App\Modules\Directories\Http\Controllers;

use App\Modules\Directories\Models\Directory;
use App\Modules\Admin\Http\Controllers\AdminAppController;
use Illuminate\Http\Request;

use App\Http\Requests;


class DirectoriesController extends AdminAppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->page_title('Browse All Directories');
        $directories = Directory::all();
        return view('directories::directories.index',compact('directories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->page_title('Create New Directory');
        return view('directories::directories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd('store');
        $directory = new Directory();
        $directory->title =$request->title;
        $directory->description = $request->description;
        $directory->directory_type_id = 3;
        $directory->save();
        flash('New Directory Added')->success();
        return redirect('admin/directories');
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
        $directory = Directory::findOrFail($id);
        $this->page_title('Editing '.$directory->title);
        return view('directories::directories.edit')->with(compact('directory'));
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
//        dd('update');
        $directory = Directory::findOrFail($id);
        $directory->title =$request->title;
        $directory->description = $request->description;
        $directory->save();
        flash('Directory Updated')->warning();
        return redirect('admin/directories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $directory = Directory::findOrFail($id);
        $directory->delete();
        flash('Directory Deleted')->error();
        return back();
    }
}
