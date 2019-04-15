@extends('admin.adminlte')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12 mt-3">
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Add Product</h3>
                </div>
                {!! Form::model($products, ['method'=>'post', 'action'=> ['ProductsController@sumbitProperty', $products->id], 'files'=>true]) !!}
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('msg'))
                        <div class="alert alert-info">{{Session::get('msg')}}</div>
                    @endif
                    <b>Product Name:</b>
                     <select class="form-control" name="pro_id">

                        <option  value="{{$products->id}}">{{$products->pro_name}}</<option>

                      </select>
                    <br>

                    <b>Size: </b>
                    <select class="form-control" name="size">
                      <option  value="L">L</option>
                      <option  value="XL">XL</option>
                      <option  value="XXL">XXL</option>
                    </select><br>


                    <b>Color:</b>
                    <select class="form-control" name="color">
                         <option  value="blue">Blue</option>
                         <option  value="green">Green</option>
                         <option  value="black">Black</option>
                   </select><br>

                    <b>Price: </b>
                    <input type="text" name="p_price" class="form-control">

                <br>
                </div>

                <div class="card-footer">
                 <input type="submit" class="btn btn-success pull-right" value="Submit Property" style="margin:-4px"/>
               </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

