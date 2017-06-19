@extends('layouts.admin')

@section('content')

<div class="box box-primary">

	<div class="box-body">




		<table class="table table-hover table-striped">
			<thead>
			<tr>

				<th><h2><b>Directory Title</b></h2></th>

				<th class="action-td"></th>
			</tr>
			</thead>
			<tbody>
			@foreach($directories as $directori)
				<tr>
					<td>{{$directori->title}}</td>
					<td class="text-right"><div class="btn-btn-flat">
							<a href="{{route('fields.show',$directori->id)}}" class="btn btn-info btn-flat"><i class="fa fa-angle-double-right"></i>View Fields</a>


						</div></td>
				</tr>
			@endforeach
			</tbody>

		</table>

	</div>

</div>





@endsection