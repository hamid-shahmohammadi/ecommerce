@extends('front.master')

@section('content')
    <br><br>
<div class="container">
    <div class="row">
        <div class="col-3">
            @include('profile.menu')
        </div>
        <div class="col-9">
            @if(session('msg'))
                <div class="alert alert-info">{{session('msg')}}</div>

            @endif
            <div class="card">
                <div class="card-header">Create Address</div>
                <div class="card-body">
                    {!! Form::open(['url' => 'updateAddress',  'method' => 'post']) !!}
                    <input type="hidden" name="address_id" value="{{$address->id}}">
                    <div class="form-group row">

                        <div class="form-group col-md-6">
                            <label for="example-text-input" >Full Name</label>
                            <input class="form-control" type="text"  name="fullname" value="{{$address->fullname}}">
                            <span style="color:red">{{ $errors->first('fullname') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="form-group col-md-6">
                            <label for="example-text-input" >City</label>
                            <input class="form-control" type="text"  name="city" value="{{$address->city}}">
                            <span style="color:red">{{ $errors->first('city') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="form-group col-md-6">
                            <label for="example-text-input" >State</label>
                            <input class="form-control" type="text"  name="state" value="{{$address->state}}">
                            <span style="color:red">{{ $errors->first('state') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="form-group col-md-6">
                            <label for="example-text-input" >Pincode</label>
                            <input class="form-control" type="text"  name="pincode" value="{{$address->pincode}}">
                            <span style="color:red">{{ $errors->first('pincode') }}</span>
                        </div>
                    </div>


                    <div class="form-group row">

                        <div class="form-group col-md-6">
                            <label for="example-text-input" >Country</label>
                            <input class="form-control" type="text"  name="country" value="{{$address->country}}">
                            <span style="color:red">{{ $errors->first('country') }}</span>
                        </div>
                    </div>
                    <div class="form-group col-md-6" align="right">
                        <input class="btn btn-primary" type="submit"  value="Update Address">
                    </div>
                    {!! Form::close() !!}
        </div>
    </div>


    </div>
</div>
</div>
@endsection