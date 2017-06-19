<?php

namespace App\Modules\Directories\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Modules\Admin\Http\Controllers\AdminAppController;
use App\Modules\Directories\Models\Directory;
use App\Modules\Directories\Models\DirectoryField;
use App\Modules\Directories\Models\Field;
use Illuminate\Support\Facades\DB;


class FieldsController extends AdminAppController
{

    public function index()
    {
        $this->page_title('Fields Manager');
        
        $directories = Directory::all();
        //$fields = Field::paginate(10);
        return view('directories::fields.index')->with(compact('directories'));
    }


    public function create(Directory $directory)
    {
        //
        $this->page_title('Add Field in '.$directory->title);
        return view('directories::fields.create',compact('directory'));


    }


    public function store(Request $request,Directory $directory)
    {
        //


            $directory->fields()->create(['title' => $request->title, 'description' => $request->description]);
            flash('New Field Created')->success();
            return redirect('admin/fields/'.$directory->id);
    }


    public function show($id)
    {
        //
        $directory=Directory::find($id);
        $directories = Directory::all();
        $this->page_title('Fields Manager');
        $dir = $id;
        return view('directories::fields.show',compact('directory','directories','dir'));
        
    }


    public function editing($id, $dir)
    {
        //
        $field = Field::findOrFail($id);
        $this->page_title('Editing '.$field->title);
        return view('directories::fields.edit',compact('field','dir'));
    }


    public function update(Request $request, Field $field)
    {
        //
        if(isset($field)){
            $field->title=$request->title;
            $field->description=$request->description;
            $field->save();
            flash('Field Updated')->warning();
            return redirect('admin/fields/'.$request->dir);

        }

    }


    public function destroy($field_id,$directory_id)
    {

        $directory_field=DirectoryField::where('field_id',$field_id)->where('directory_id', $directory_id)->delete();
        flash('Field Deleted')->error();
        return redirect('admin/fields/'.$directory_id);
    }
}
