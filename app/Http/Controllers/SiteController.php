<?php

namespace App\Http\Controllers;


use App\Modules\Directories\Models\Directory;
use App\Modules\Directories\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __invoke()
    {

        return view('dashboard.index');
    }
}
