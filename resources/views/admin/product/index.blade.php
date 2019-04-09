@extends('admin.adminlte')

@section('content')

    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product Table</h3>

                {{--<div class="card-tools">--}}
                    {{--<div class="input-group input-group-sm" style="width: 150px;">--}}
                        {{--<input type="text" name="table_search" class="form-control float-right" placeholder="Search">--}}

                        {{--<div class="input-group-append">--}}
                            {{--<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th><i class="fa fa-cog" aria-hidden="true"></i></th>

                    </tr>

    @forelse($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->pro_name}}</td>
                <td>
                    <form action="{{route('product.destroy',$product->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    {{--<input class="btn btn-sm btn-danger" type="submit" value="Delete">--}}
                    <a class="btn btn-sm btn-primary" href="{{$base_url}}admin/product/{{$product->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>


        {{--<li>--}}
        {{--<h4>Name of product:{{$product->pro_name}}</h4>--}}
        {{--<form action="{{route('product.destroy',$product->id)}}" method="post">--}}
            {{--{{csrf_field()}}--}}
            {{--{{method_field('DELETE')}}--}}
            {{--<input class="btn btn-sm btn-danger" type="submit" value="Delete">--}}
        {{--</form>--}}
    {{--</li>--}}

    @empty
        <h3>NO Products</h3>

    @endforelse
                    </tbody></table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>



@endsection