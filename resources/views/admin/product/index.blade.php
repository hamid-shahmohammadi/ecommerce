@extends('admin.adminlte')

@section('content')

    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>code</th>
                        <th>price</th>
                        <th>Category</th>
                        <th>On Sale</th>
                        <th><i class="fa fa-cog" aria-hidden="true"></i></th>

                    </tr>

    @forelse($products as $product)
            <tr>
                <td style="width:50px;"><img class="img-thumbnail" src="{{url('images',$product->image)}}" width="50px" alt="Card image cap"></td>
                <td>{{$product->id}}</td>
                <td>{{$product->pro_name}}</td>
                <td>{{$product->pro_code}}</td>
                <td>{{$product->pro_price}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->spl_price}}</td>
                <td>
                    <form action="{{route('product.destroy',$product->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <a class="btn btn-sm btn-primary" href="{{url('/')}}/admin/product/{{$product->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
    @empty
        <h3>NO Products</h3>

    @endforelse
        </tbody></table>
    <div class="m-2">{{$products->links()}}</div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>



@endsection