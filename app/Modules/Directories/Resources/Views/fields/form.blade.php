@section('content')

<div class="box box-primary">
    <form action="@if(isset($field)){{route('fields.update',$field->id)}}@else{{route('fields.submit',$directory->id)}}@endif" role="form" class="form-horizontal" method="post">
        @if(isset($field))
            {{method_field('PATCH')}}
            <input type="hidden" name="dir" value="{{$dir}}">
        @else
            {{method_field('POST')}}
        @endif

        {{csrf_field()}}
    <div class="box-body">

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Field Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                    @if(isset($field))value="{{$field->title}}"@endif>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Field Description</label>
                <div class="col-sm-10">
                    <textarea type="text" name="description" class="form-control text-left" id="description" placeholder="Description">
                        @if(isset($field)){{$field->description}}@endif
                        </textarea>
                </div>
            </div>




    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>


@endsection