@extends('layouts.admin')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Availble modules of Ono </h3>
        </div>
        <div class="alert alert-info">
            <h4><i class="fa fa-info"></i> What are Modules</h4>You can create any number of directories in OnO. Each directory can have only one of the following types. Each directory has its own taxonomies e.g. Categories and Tags.
            <p>Meta data of your choice can be associated with each directories through the fields section.</p>
        </div>
        <div class="box-body">
            @foreach($directory_types as $type)
                <div class="row">
                    <div class="col-md-2"><h4>{{$type->title}}</h4></div>
                    <div class="col-md-10">{{$type->description}}</div>
                </div>
                <hr/>
            @endforeach
        </div>
        <div class="box-footer">
        </div>
    </div>

    @endsection