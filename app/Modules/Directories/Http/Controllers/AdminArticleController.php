<?php

namespace App\Modules\Directories\Http\Controllers;

use App\Modules\Directories\Models\Directory;
use App\Modules\Directories\Models\ArticleCategory;
use App\Modules\Directories\Models\Category;
use App\Modules\Admin\Http\Controllers\AdminAppController;
use App\Modules\Directories\Models\Field;

use Illuminate\Http\Request;
use App\Modules\Directories\Models\Article;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Image;


class AdminArticleController extends AdminAppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->page_title('Browse All Articles');
        $articles = Article::all();
        $categories = Category::all();
        $article_categories =ArticleCategory::all();
        return view('directories::articles.index',compact('articles','article_categories','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectDirectory()
    {
        $this->page_title('Select Directory');
        $directories = Directory::all();
        return view('directories::articles.select',compact('directories'));
    }


    public function create(Request $request)
    {

        $this->page_title('Create Article');
        $directory =Directory::where('title', $request->dir)->first();
        $fields = Field::all();
        $dir_fields = $directory->fields()->get();
        $directory = $directory->id;
        return view('directories::articles.create',compact('dir_fields','fields','directory'));
    }



    public function store(Request $request)
    {
        //dd($request->except(['_token']));
       // $request = $request->except(['_token']);
        $directory = Directory::find($request->directory_id);
        $fields = $directory->fields()->get();
        $article = new Article();
        $article->title = $request->title;
        $article->summary = $request->summary;
        $article->description = $request->description;
        $article->directory_id = $request->directory_id;
        foreach ($fields as $field) {
                $field = 'f-'.$field->slug;
                $article->$field = $request->$field;

        }

        if($request->hasFile('image')){

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $article->image = $filename;
        }

        $article->save();
        return redirect('admin/articles');
//        $article->save($request->except(['_token']));

    }


    public function show($id)
    {
        //
    }


    public function deleteLinkedCategories(Request $request,$article_id,$category_id)
    {
        ArticleCategory::where('article_id',$article_id)->where('category_id',$category_id)->delete();
        return redirect()->route('articles.index');


    }


    public function edit(Article $article)
    {

        $article_categories =  $article->categories()->get();
        $directory = Directory::find($article->directory_id);
        $categories = Category::all();
        $dir_fields = $directory->fields()->get();
        return view('directories::articles.edit',compact('categories','article_categories','directory','dir_fields','article'));

    }


    public function update(Request $request,Article $article)
    {
       if (isset($request->categories)){
            $categories = Category::whereIn('title',$request->categories)->get();
           foreach ($categories as $category){
               $article_category = new ArticleCategory();
               $article_category->article_id = $article->id;
               $article_category->category_id = $category->id;
               $article_category->save();

           }
           return redirect()->route('articles.index');
       }

       elseif (isset($request->submit)){

           $directory = Directory::find($article->directory_id);
           $fields = $directory->fields()->get();
           $article->title = $request->title;
           $article->summary = $request->summary;
           $article->description = $request->description;
           foreach ($fields as $field) {
               $field = 'f-'.$field->slug;
               $article->$field = $request->$field;

           }
           $article->save();
           return redirect()->route('articles.index');

       }



    }


    public function destroy($id)
    {
        $deletedRows = DB::table('article_category')->where('article_id', $id)->delete();
        DB::table('articles')->where('id',$id)->delete();
        return back();
    }
}
