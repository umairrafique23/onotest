<div class="box box-primary">
    <form action="@if(isset($user)){{route('users.update',$user->id)}}@else{{route('users.store')}}@endif" role="form" class="form-horizontal" method="post">
        @if(isset($user))
            {{method_field('PATCH')}}
        @else
            {{method_field('POST')}}
        @endif

        {{csrf_field()}}
        <div class="box-body">

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input required type="text" name="name" class="form-control" id="name" placeholder="Enter Name"
                           @if(isset($user))value="{{$user->name}}"@endif>
                </div>
            </div>

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input required type="email" name="email" class="form-control" id="email" placeholder="Enter E-mail"
                           @if(isset($user))value="{{$user->email}}"@endif>
                </div>
            </div>

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input required type="password" name="password" class="form-control" id="password" placeholder="Enter Password"
                           @if(isset($user))value="{{$user->password}}"@endif>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">@if(isset($user))Update @else Submit @endif</button>
        </div>
    </form>
</div>