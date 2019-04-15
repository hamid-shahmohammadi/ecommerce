@extends('admin.adminlte')

@section('content')
<div class="container-fluid">
    <div class="col-md-12 mt-3">
            <div class="card card-primary">

                <div class="card-header">
                <h3 class="card-title">Add Product</h3>
                </div>

                <form action="/admin/product/{{$product->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
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
                    @if(Session::has('message'))
                        <div class="alert alert-info">{{Session::get('message')}}</div>
                    @endif
                    <div class="form-group">
                        {{ Form::label('Proname', 'Name') }}
                        {{ Form::text('pro_name', $product->pro_name, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Code', 'Code') }}
                        {{ Form::text('pro_code', $product->pro_code, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('stock', 'stock') }}
                        {{ Form::text('stock', $product->stock, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('price', 'Price') }}
                        {{ Form::text('pro_price', $product->pro_price, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Description', 'Description') }}
                        {{ Form::text('pro_info', $product->pro_info, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('category_id', 'Categories') }}
                        {{ Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control', 'placeholder'=>'SelectCategory']) }}
                    </div>


                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        {{ Form::file('image',array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('Sale Price', 'Sale Price') }}
                        {{ Form::text('spl_price', $product->spl_price, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="card-footer">
                 {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

                        <a href="{{route('addProperty',$product->id)}}" class="btn btn-sm btn-info" >Add Property</a>

                </div>

                </form>
            </div>
        <div>

        </div>
    </div>
</div>

@endsection