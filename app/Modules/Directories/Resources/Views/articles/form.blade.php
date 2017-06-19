
    <div class="col-md-4">
        <form method="post" action="@if(isset($article)){{route('articles.update',$article->id)}}@else{{route('articles.store')}}@endif" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{method_field('POST')}}
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter title"  @if(isset($article))value="{{$article->title}}"@endif>
            </div>
            <div class="form-group">
                <label>Summary</label>
                <input type="text" class="form-control" name="summary" placeholder="Enter Summary" @if(isset($article))value="{{$article->summary}}"@endif>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" placeholder="Enter Description"> @if(isset($article)){{$article->description}}@endif</textarea>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" class="form-control" name="image" @if(isset($article))value="{{$article->image}}"@endif>
            </div>
            <input type="hidden"  name="directory_id" value="{{$directory}}">
            @foreach($dir_fields as $dir_field)

                <div class="form-group">
                    <label>{{$dir_field->title}}</label>
                    <?php $col_name = "f-".$dir_field->slug?>
                    <input type="text" class="form-control" name="f-{{$dir_field->slug}}" placeholder="Enter {{$dir_field->title}}" @if(isset($article))value="{{$article->$col_name}}"@endif>
                </div>

            @endforeach


            <input type="submit" class="btn btn-danger" value="Submit" name="submit">
        </form>
    </div>

