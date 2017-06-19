<form class="form" method="post" action="{{isset($field) ? route('fields.update', $field->id) : route('fields.store')}}">

    <div class="box-body">


        <div class="form-group">
            <label for="title" class="control-label">Title</label>

                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{isset($field->title)? $field->title: null}}">

        </div>

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @if(isset($field))
            <input type="hidden" name="_method" value="put">
        @endif
        <div class="form-group">
            <input class="btn btn-primary form-control" value="Submit" type="submit">
        </div>
    </div>

</form>

