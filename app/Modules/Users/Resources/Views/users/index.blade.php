@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools">
                <div class="input-group input-group-sm">
                    <a href="{{route('users.create')}}" class="btn btn-info">
                        <i class="fa fa-plus"></i> Create New User
                    </a>
                </div>
            </div>
        </div>
        <div class="box-body">

            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Created_at</th>
                    <th class="action-td"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td class="text-right"><div class="btn-group-horizontal">
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                <form action="{{route('users.destroy',$user->id)}}" class="inline" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="submit" value="Delete" class="btn btn-danger btn-xs">
                                </form>
                            </div></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>

@endsection

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.directories.index') !!}
    @endsection
