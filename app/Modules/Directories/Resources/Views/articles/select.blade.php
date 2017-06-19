@extends('layouts.admin')

@section('content')


    <form action="{{route('articles.create')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <select class="form-control" name="dir">
            @foreach($directories as $directory)
                <option>{{$directory->title}}</option>
            @endforeach
        </select><br>
        <input type="submit" class="btn btn-primary">
    </div>
</form>
@endsection