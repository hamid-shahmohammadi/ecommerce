<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="{{url('/')}}"><img src="{{URL::asset('dist/img/ecom.png')}}"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/shop')}}">Shop</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <?php  $cats = DB::table('categories')->get(); ?>
                    @foreach($cats as $cat)
                        <a class="dropdown-item" href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a>

                    @endforeach

                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('/contact')}}">Contact</a>
            </li>

        </ul>
        <li class="nav-item dropdown list-inline-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profile
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(Auth::check())
                    {{--<a class="dropdown-item" href="#">{{Auth::user()->name}}</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    <a class="dropdown-item" href="{{url('/profile')}}"><i class="fa fa-user"></i> {{Auth::user()->name}}</a>
                    <a class="dropdown-item" href="{{url('/WishList')}}"><i class="fa fa-star"></i> Wish List <span style="color:green;">({{App\WishList::count()}})</span></a>
                    <a class="dropdown-item" href="{{url('/logout')}}">Log Out</a>
                @else

                    <a class="dropdown-item" href="{{url('/login')}}">Log In</a>
                @endif
            </div>

        </li>

        <li class="list-inline-item"><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart">
                    View Cart</i>({{Cart::count()}}) ({{Cart::total()}})</a> </li>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>