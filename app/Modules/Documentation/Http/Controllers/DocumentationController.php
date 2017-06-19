<?php

namespace App\Modules\Documentation\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DocumentationController extends Controller
{
    public function index()
    {
        return view('documentation::admin.documentation.index');
    }
}
