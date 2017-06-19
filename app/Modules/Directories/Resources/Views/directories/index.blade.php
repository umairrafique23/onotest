@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" media="screen" href="{{ URL::asset('css/css/style.css') }}">
@endsection
@section('content')
    <div class="container flash">
        @include('flash::message')
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools">
                <div class="input-group input-group-sm">
                    <a href="{{route('directories.create')}}" class="btn btn-info">
                        <i class="fa fa-plus"></i> Create New directory
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
                    <th>Description</th>
                    <th class="action-td"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($directories as $directory)
                    <tr>
                        <td>{{$directory->id}}</td>
                        <td>{{$directory->title}}</td>
                        <td>{{$directory->description}}</td>
                        <td class="text-right"><div class="btn-group-horizontal">
                                <a href="{{route('directories.edit',$directory->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                <form action="{{route('directories.destroy',$directory->id)}}" class="inline" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="submit" value="Delete" class="btn btn-danger btn-xs">
                                </form>

                            </div></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

    </div>

@endsection

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.directories.index') !!}
    @endsection
