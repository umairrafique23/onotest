@extends('layouts.admin')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools">
                <div class="input-group input-group-sm">
                    <a href="{{route('permissions.create')}}" class="btn btn-info">
                        <i class="fa fa-plus"></i> Create New Permission
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
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->display_name}}</td>
                        <td>{{$permission->description}}</td>
                        <td>{{$permission->created_at}}</td>
                        <td class="text-right"><div class="btn-group-horizontal">
                                <a href="{{route('permissions.edit',$permission->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                <form action="{{route('permissions.destroy',$permission->id)}}" class="inline" method="POST">
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
