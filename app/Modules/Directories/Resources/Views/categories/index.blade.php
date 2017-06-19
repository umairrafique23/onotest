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
                @foreach($directories as $directory)
                    <tr>
                        <td>{{$directory->title}}</td>
                        <td class="text-right">
                            <div class="btn-btn-flat">
                                <a href="{{route('categories.show',$directory->id)}}" class="btn btn-info btn-flat"><i
                                            class="fa fa-angle-double-right"></i>View Categories</a>


                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>


        </div>

    </div>
@endsection