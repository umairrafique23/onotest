<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminAppController extends Controller
{
    //private $title = '';


    protected function page_title($title = '')
    {
        //$this->title = $title;
        view()->share('page_title', $title);
    }
}
