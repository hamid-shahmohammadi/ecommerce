@extends('front.master')
@section('content')

    <section class="hero hero-page gray-bg padding-small">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-9 order-2 order-lg-1">
                    <h1>Checkout</h1>
                    <p class="lead text-muted">You currently have 3 item(s) in your basket</p>
                </div>
                <ul class="breadcrumb d-flex justify-content-start justify-content-lg-center col-lg-3 text-right order-1 order-lg-2">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Checout Forms-->
    <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
            <tr class="cart_menu">
                <td class="image">Item</td>
                <td class="description"></td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="total">Total</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php $count =1;?>
            @foreach($cartItems as $cartItem)
                <tr>
                    <td class="cart_product">
                        <a href="{{url('/product_details')}}/{{$cartItem->id}}"><img src="{{url('/').'/images/'.$cartItem->options->img}}" alt="" width="200px"></a>
                    </td>
                    {!! Form::open(['url' => ['cart/update',$cartItem->rowId], 'method'=>'put']) !!}
                    <td class="cart_description">
                        <h4><a href="{{url('/product_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                        <p>Product ID: {{$cartItem->id}}</p>
                        <p>Only {{$cartItem->options->stock}} left</p>
                    </td>
                    <td class="cart_price">
                        <p>${{$cartItem->price}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">

                            <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                            <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>

                            <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                   autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="30">
                            <br>
                            <input type="submit" class="btn btn-primary" value="Update" styel="margin:5px">


                            {!! Form::close() !!}


                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" style="background-color:red"
                           href="{{url('/cart/remove')}}/{{$cartItem->rowId}}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>

                <?php $count++;?>
                  @endforeach
            </tbody>
        </table>
    </div>



    <?php  // form start here ?>
    <section class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="checkout1.html" class="nav-link active">Address</a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Delivery Method </a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Payment Method </a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Order Review</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="address" class="active tab-block">

                            <form action="{{url('/')}}/formvalidate" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <h1>Shopper Information</h1>


                                    <div class="form-group col-md-6">
                                        <label for="firstname" class="form-label">Display Name</label>


                                        <input id="firstname" type="text" name="fullname" placeholder="Display Name"  value="{{ old('firstname') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('fullname') }}</span>


                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="lastname" class="form-label">State Name</label>

                                        <input id="lastname" type="text" name="state" placeholder="State Name" value="{{ old('state') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('state') }}</span>
                                    </div>




                                    <div class="form-group col-md-6">
                                        <label for="lastname" class="form-label">Pincode</label>

                                        <input id="lastname" type="text" name="pincode" placeholder="Pincode" value="{{ old('pincode') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('pincode') }}</span>

                                    </div>




                                    <div class="form-group col-md-6">
                                        <label for="lastname" class="form-label">City Name</label>

                                        <input id="lastname" type="text" name="city" placeholder="City Name" value="{{ old('city') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('city') }}</span>

                                    </div>


                                    <hr>

                                    <select name="country" class="form-control" >
                                        <option value="{{ old('country') }}" selected="selected">Select country</option>
                                        <option value="United States">United States</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="UK">UK</option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Ucrane">Ucrane</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Dubai">Dubai</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('country') }}</span>



                                    <span>
                       <input type="radio" name="pay" value="COD" checked="checked"> COD
                          </span>

                                    <span>
                        <input type="radio" name="pay" value="paypal"> PayPal
                         {{--@include('front.paypal')--}}
                        </span>


                                    <span>
                      <input type="submit" value="Continue" class="btn btn-primary btn-sm">
                       </span>

                                </div>
                            </form>


                            <div class="CTAs d-flex justify-content-between flex-column flex-lg-row"><a href="cart.html" class="btn btn-template-outlined wide prev"> <i class="fa fa-angle-left"></i>Back to basket</a><a href="checkout2.html" class="btn btn-template wide next">Choose delivery method<i class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="block-body order-summary">
                        <h6 class="text-uppercase">Order Summary</h6>
                        <p>Shipping and additional costs are calculated based on values you have entered</p>
                        <ul class="order-menu list-unstyled">
                            <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong>${{Cart::subtotal()}}</strong></li>
                            <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>$10.00</strong></li>
                            <li class="d-flex justify-content-between"><span>Tax</span><strong>${{Cart::tax()}}</strong></li>
                            <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">${{Cart::total()}}</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php  // form start here ?>

    @endsection
