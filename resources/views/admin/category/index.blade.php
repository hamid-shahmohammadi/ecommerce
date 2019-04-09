@extends('admin.adminlte')
@section('content')
<div class="container">
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category Table</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('category.show',$category->id)}}">{{$category->name}}</a></td>
                        <td>
                            @if($category->status=='0')
                                Enable
                            @else
                                Disable

                            @endif
                        </td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['CategoriesController@destroy', $category->id]]) !!}
                        <td>  {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}</td>
                        {!! Form::close() !!}
                    </tr>
                    @endforeach
                    </tbody></table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
