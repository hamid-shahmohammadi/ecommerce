@extends('front.master')

@section('content')
<style>
    table td { padding:10px }
</style>

<br>
<br>


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{url('/profile')}}">Profile</a></li>
                <li class="breadcrumb-item active">My Address</li>
            </ol>
        </div><!--/breadcrums-->
        @if(session('msg'))
        <div class="alert alert-info">{{session('msg')}}</div>

        @endif



        <div class="row">

            @include('profile.menu')
            <div class="col-md-8">

                
                
                <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Your Address</h3>

                <br>




                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">city</th>
                        <th scope="col">state</th>
                        <th scope="col">country</th>
                        <th scope="col"><i class="fa fa-cog" aria-hidden="true"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                 @foreach($address_data as $value)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$value->fullname}}</td>
                                <td>{{$value->city}}</td>
                                <td>{{$value->state}}</td>
                                <td>{{$value->country}}</td>
                                <td><a href="{{url('address/edit',$value->id)}}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
                            </tr>
                 @endforeach

                    </tbody>
                </table>

               
            </div>
        </div>


    </div>
</section>






@endsection