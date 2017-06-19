<?php

namespace App\Http\Controllers\site;

use App\Modules\Directories\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class ArticleController extends Controller
{
    //

    public function index($slug){

        $category = Category::findBySlug($slug);
        $articles = $category->articles()->get();
        $columns = Schema::getColumnListing('articles');
        return view('site.articles.index',compact('articles','columns','category'));

    }


}
