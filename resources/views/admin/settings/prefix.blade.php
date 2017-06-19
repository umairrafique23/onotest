@extends('layouts.admin')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit And Save</h3>
    </div>
    <form action="{{route('settings.storeprefix')}}" class="form-horizontal" role="form" method="post">
        {{csrf_field()}}
    <div class="box-body">

            @foreach($settings as $setting)
                <div class="form-group">
                    <label for="{{$setting->key}}" class="col-sm-2 control-label">{{$setting->title}}</label>

                    <div class="col-sm-6">
                        @if($setting->input_type=='text')
                        <input type="text" class="form-control" id="{{$setting->key}}" placeholder="{{$setting->title}}" name="settings[{{$setting->key}}]" value="{{$setting->value}}">
                        @endif
                            @if($setting->input_type=='textarea')
                                <textarea name="settings[{{$setting->key}}]" id="{{$setting->key}}" cols="30" rows="10" class="form-control" placeholder="{{$setting->title}}">
                                    {{$setting->value}}
                                </textarea>

                            @endif
                    </div>
                    <div class="col-sm-4">
                        {{$setting->description}}
                    </div>
                </div>
            @endforeach

    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
</div>

    @endsection