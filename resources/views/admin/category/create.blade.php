@extends('admin.adminlte')

@section('content')
<div class="container-fluid">
    <div class="col-md-12 mt-3">
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>


            {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-info">{{Session::get('message')}}</div>
                @endif
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control','required'=>'')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('category_id', 'Categories') }}

                    <select class="form-control" name="parent_id">
                        <option value="0">Select Category</option>
                        @foreach($caregories as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
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