@extends('layouts.admin')

@section('content')
    <h1>Articles</h1>
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools">
                <div class="input-group input-group-sm">
                    <a href="{{route('articles.select')}}" class="btn btn-info">
                        <i class="fa fa-plus"></i> Create New Article
                    </a>
                </div>
            </div>
        </div>
        <div class="box-body">

            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Summary</th>
                    <th>Linked Categories</th>
                    <th class="action-td"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->summary}}</td>
                        <td>
                            @foreach($article_categories as $article_category)
                                @if($article->id == $article_category->article_id)
                                    @foreach($categories as $category)
                                        @if($category->id ==$article_category->category_id)



                                                <li>{{$category->title}}


                                                </li>


                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </td>



                        <td class="text-right">
                            <div class="btn-group-horizontal">
                                <a href="{{route('articles.edit',$article->id)}}" class="btn btn-info btn-xs"><i
                                            class="fa fa-edit"></i>Edit</a>


                                <input type="button" data-toggle="modal" value="delete" data-target="#myModal{{$article->id}}"
                                       class="btn btn-danger btn-xs">

                                <div id="myModal{{$article->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title">Warning</h2>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to completely delete this article?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <a href="{{route('articles.destroy',$article->id)}}"
                                                   class="btn btn-danger">Delete</a>

                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.articles.index') !!}
@endsection
