<?php

namespace App\Http\Controllers\Admin;

use App\DirectoryType;
use App\Modules\Admin\Http\Controllers\AdminAppController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DirectoryTypeController extends AdminAppController
{
    //

    public function index()
    {
        $this->page_title('Ono Directory Types');
        $directory_types = DirectoryType::all();
        return view('admin.directory.type.index')->with(compact('directory_types'));
    }
}
