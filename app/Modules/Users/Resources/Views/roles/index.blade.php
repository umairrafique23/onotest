@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools">
                <div class="input-group input-group-sm">
                    <a href="{{route('roles.create')}}" class="btn btn-info">
                        <i class="fa fa-plus"></i> Create New Role
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
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Created_at</th>
                    <th class="action-td"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->display_name}}</td>
                        <td>{{$role->description}}</td>
                        <td>{{$role->created_at}}</td>
                        <td class="text-right"><div class="btn-group-horizontal">
                                <a href="{{route('roles.edit',$role->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                <form action="{{route('roles.destroy',$role->id)}}" class="inline" method="POST">
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
