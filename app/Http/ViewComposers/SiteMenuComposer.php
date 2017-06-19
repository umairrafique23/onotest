<?php
/**
 * Created by PhpStorm.
 * User: Usman
 * Date: 12/24/2016
 * Time: 8:56 PM
 */

namespace App\Http\ViewComposers;



use App\Modules\Directories\Models\Category;
use App\Modules\Directories\Models\Directory;
use Illuminate\View\View;


class SiteMenuComposer
{

    public function compose(View $view)
    {
        $directories = Directory::all();
        $categories = Category::all();
        //$directories = array();
        $view->with(compact('directories','categories'));
    }
}