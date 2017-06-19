@extends('layouts.site')
@section('content')
    <div class="col-md-12">

        <h2>{{$category->title}}</h2>


        <ul class="w3-ul w3-card-2">
            @foreach($articles as $article)

                <li class="w3-padding-16">
                    <img src="{{asset('images/'. $article->image)}}" class="w3-left w3-square w3-margin-right" style="width:50px">
                    @foreach($columns as $column)

                        @if($column == 'id' || $column == 'slug' || $column == 'directory_id' || $column == 'created_at' || $column == 'updated_at')

                        @elseif($column == 'title')
                            <span class="w3-large"><a href="#">{{$article->title}}</a></span><br>

                        @elseif($column == 'description')
                            @php($description = $article->$column)

                        @else
                           <span style="font-size: 10px">@if($article->$column!=''){{$article->$column}} |@endif</span>

                        @endif
                    @endforeach
                    <p>{{str_limit($description,50)}}</p>
                </li>
            @endforeach
        </ul>




    </div>


@endsection