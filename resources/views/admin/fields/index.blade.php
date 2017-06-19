@extends('layouts.admin');
@section('content')
    <div class="row">
        <div class="col-md-lg">
            <div class="box">
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <tr><th></th><th>Title</th><th class="text-right">Actions</th></tr>
                        </thead>
                        <tbody>
                        @foreach($fields as $field)
                        <tr>
                            <td></td>
                            <td>{{$field->title}}</td>
                            <td class="text-right">
                                <div class="margin">
                                    <a href="{{route('fields.edit',$field)}}" class="btn btn-info btn-flat"><i class="fa fa-edit"></i>Edit</a>
                                    <form action="{{route('fields.destroy',$field->id)}}" method="delete" style="display: inline;">
                                        
                                        <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-"></i>Delete</button>
                                    </form>

                                </div>

                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection