@extends('layouts.admin')
@section('content')


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Fields</h3>
        </div>

        @include('admin.fields._form',compact('field'))

    </div>



@endsection