@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Current Directories in OnO</h3>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>Id</td> <td>Title</td> <td>Description</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($directories as $directory)
                 <tr>
                     <td>{{$directory->id}}</td>
                     <td>{{$directory->title}}</td>
                     <td>{{$directory->description}}</td>
                 </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer">
        </div>
    </div>
@endsection