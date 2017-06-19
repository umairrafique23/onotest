<div class="box box-primary">
    <form action="@if(isset($permission)){{route('permissions.update',$permission->id)}}@else{{route('permissions.store')}}@endif" role="form" class="form-horizontal" method="post">
        @if(isset($permission))
            {{method_field('PATCH')}}
        @else
            {{method_field('POST')}}
        @endif

        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Permission Name</label>
                <div class="col-sm-10">
                    <input required type="text" name="name" class="form-control" id="name" placeholder="Enter Name"
                           @if(isset($permission))value="{{$permission->name}}"@endif>
                </div>
            </div>

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Permission Display Name</label>
                <div class="col-sm-10">
                    <input required type="text" name="display_name" class="form-control" id="display_name" placeholder="Enter Display Name"
                           @if(isset($permission))value="{{$permission->display_name}}"@endif>
                </div>
            </div>

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <input required type="text" name="description" class="form-control" id="description" placeholder="Enter description"
                           @if(isset($permission))value="{{$permission->description}}"@endif>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">@if(isset($permission))Update @else Submit @endif</button>
        </div>
    </form>
</div>