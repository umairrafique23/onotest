<div class="box box-primary">
    <form action="@if(isset($directory)){{route('directories.update',$directory->id)}}@else{{route('directories.store')}}@endif" role="form" class="form-horizontal" method="post">
        @if(isset($directory))
            {{method_field('PATCH')}}
        @else
            {{method_field('POST')}}
        @endif

        {{csrf_field()}}
    <div class="box-body">

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                    @if(isset($directory))value="{{$directory->title}}"@endif>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea type="text" name="description" class="form-control text-left" id="description" placeholder="Description">
                        @if(isset($directory)){{$directory->description}}@endif
                        </textarea>
                </div>
            </div>




    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>