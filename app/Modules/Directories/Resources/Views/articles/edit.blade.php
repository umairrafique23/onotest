@extends('layouts.admin')
@section('content')

    @include('directories::articles.form')
    <div class="col-md-offset-2 col-md-5">
        <h2>Manage Categories</h2>

            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Linked Categories</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$article->title}}</td>
                    <td>

                    @foreach($article_categories as $article_category)
                    <li>{{$article_category->title}}


                        <a style="margin-left: 50px" href="{{route('articles.deleteCategory',['article'=>$article->id,'category'=>$article_category->id])}}"
                           class="btn btn-danger btn-xs"><i class="fa fa-edit"></i>Delete</a>




                    </li>




                    @endforeach

                    </td>
                </tr>
                </tbody>
                </table>
        <h2>Link new Categories</h2>

        <form method="post" action="{{route('articles.update',$article->id)}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <select class="form-control" multiple="multiple" name="categories[]" id="categories">
                <?php
                    foreach($categories as $category){
                            $match = 'false';
                        foreach($article_categories as $article_category){

                        if($article_category->title==$category->title){
                                $match = 'true';
                                break;
                        }}?>

                <option value="{{$category->title}}" @if($match == 'true') disabled @endif>{{$category->title}}</option>
                    <?php } ?>





            </select><p></p>
            <input type="submit" value="Save Changes" class="btn btn-danger btn-xs" name="save_categories">

        </form>



    </div>


@endsection
