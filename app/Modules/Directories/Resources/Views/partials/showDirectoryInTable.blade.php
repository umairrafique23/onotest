<table class="table table-hover table-striped">
    <thead>
    <tr>

        <th><h4><b>Directory Title</b></h4></th>

        <th class="action-td"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($directories as $directory)
        <tr>
            <td>{{$directory->title}}</td>
            <td class="text-right"><div class="btn-btn-flat">
                    <a href="{{route('fields.show',$directory->id)}}" class="btn btn-info btn-flat"><i class="fa fa-angle-double-right"></i>View Fields</a>


                </div></td>
        </tr>
    @endforeach
    </tbody>

</table>

