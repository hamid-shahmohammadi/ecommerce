@extends('front.master')

@section('content')
<div class="container mt-3">
<div class="row">
    <div class="col-md-3">
        <img class="img-thumbnail" src="{{url('images',$product->image)}}" alt="Card Image Cap" />
    </div>
    <div class="col-md-9">
        <h2><?php echo ucwords($product->pro_name)?></h2>
        <h2>{{$product->pro_price}}</h2>
        <h5>{{$product->pro_info}}</h5>
        <p><b>Availability:</b> {{$product->stock}} In Stock</p>

        <button class="btn btn-primary btn-sm">
            <a href="{{url('/cart/addItem')}}/{{$product->id}}" class="btn btn-primary btn-sm">Add To Cart<i class="fa fa-shopping-cart"></i> </a>
        </button>

        <?php
        $wishData = DB::table('wishlist')->rightJoin('products','wishlist.pro_id', '=', 'products.id')->where('wishlist.pro_id', '=', $product->id)->get();
        $count = App\WishList::where(['pro_id' => $product->id])->count();
        ?>

        <?php if($count=="0"){?>
        {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
            <input type="hidden" value="{{$product->id}}" name="pro_id"/>
            <input type="submit" value="Add to Wishlist" class="btn btn-primary"/>
        {!! Form::close() !!}
        <?php } else {?>
            <h3 style="color:green">Already Added to Wishlist <a href="{{url('/WishList')}}">wishlist</a></h3>
        <?php }?>

    </div>
</div>
@endsection