@extends('front.master')

@section('content')

    <?php if ($cartItems->isEmpty()) { ?>
    <br>
    <br>
    <br>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div align="center">  <img src="{{asset('dist/img/empty-cart.png')}}"/></div>
        </div>
    </section> <!--/#cart_items-->
    <?php } else { ?>
    <br>
    <br>
    <section id="cart_items">


        <div class="container" id="app">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}"></a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>

            <div id="updateDiv">

                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                @if(session('error'))

                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif


                <div class="table-responsive cart_info">


                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Image</td>
                            <td class="description">Product</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>




                        <!-- Start #updateDiv -->



                        </thead>
                            <tbody>
                            <tr v-for="cart in carts">
                                <td class="cart_product">

                                    <img :src="getImg(cart.img)" class="img-thumbnail" >
                                </td>
                                <td>
                                    <a href="">
                                        <h4><a  style="color:blue">@{{cart.name}}</a></h4>
                                        <p>Product ID: @{{cart.id}}</p>
                                        <p>Only @{{cart.stock}} left</p>
                                    </a>
                                </td>
                                <td class="cart_price">
                                    <p>$@{{cart.price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <input type="hidden" id="rowId" value="cart.rowId"/>
                                    <input type="hidden" id="proId" :value="cart.id"/>
                                    <input v-model="cart.qty" type="number" size="2" :value="cart.qty" name="qty" id="upCart"
                                           autocomplete="off" style="text-align:center; max-width:50px;"
                                           @change="changeQty(cart.rowId,cart.qty)" MIN="1" MAX="1000">
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">@{{cart.subtotal}}</p>
                                </td>
                                <td class="cart_delete">
                                    <button class="btn btn-primary">
                                        <a class="cart_quantity_delete" style="background-color:red"
                                           href="{{url('/cart/remove')}}/"><i class="fa fa-times"></i></a>
                                    </button>
                                </td>
                            </tr>

                            </tbody>
                    </table>

                </div>
                <!-- End of Updatediv</div> --></div>


        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">

                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>$@{{cart.subtotal}}</span></li>
                            <li>Eco Tax <span>$@{{cart.tax}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>$@{{cart.subtotal}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{url('/')}}/checkout">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
@endsection
@section('javascript')
    <script>
        var base_url='{{url('/')}}'
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="{{asset('assets/js/app/cart.js')}}"></script>
@endsection