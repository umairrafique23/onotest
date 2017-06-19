@extends('layouts.admin')

@section('content')
    <div class="box box-primary">

        <div class="box-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Version</th>
                    <th>Enabled</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($modules as $key => $module)
                    <tr>
                        <td>{{$module['name']}}</td>
                        <td>{{$module['version']}}</td>
                        <td>{{$module['enabled']}}</td>
                        <td>{{$module['description']}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Version</th>
                    <th>Enabled</th>
                    <th>Description</th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>

    @endsection

