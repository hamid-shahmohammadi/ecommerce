@extends('admin.adminlte')

@section('content')
<div class="container-fluid">
    <div class="col-md-12 mt-3">
            <div class="card card-primary">

                <div class="card-header">
                <h3 class="card-title">Add Product</h3>
                </div>
                {!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) !!}
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
                        {{ Form::text('pro_name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Code', 'Code') }}
                        {{ Form::text('pro_code', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('stock', 'stock') }}
                        {{ Form::text('stock', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('price', 'Price') }}
                        {{ Form::text('pro_price', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Description', 'Description') }}
                        {{ Form::text('pro_info', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('category_id', 'Categories') }}
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'SelectCategory']) }}
                    </div>


                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        {{ Form::file('image',array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('Sale Price', 'Sale Price') }}
                        {{ Form::text('spl_price', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="card-footer">
                 {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                </div>

                {!! Form::close() !!}
            </div>
    </div>
</div>

@endsection