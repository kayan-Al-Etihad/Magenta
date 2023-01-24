<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            @if (app()->getLocale() == "ar")
                <div class="row text-right" dir="rtl">
                    <div class="col-lg-8 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main" style="display: flex;align-items:center;flex-wrap:nowrap">
                                    @php
                                    $settings=DB::table('settings')->get();
                                @endphp
                                <a style="margin-right: auto" href="{{route('home')}}"><img style="height: 45px;" src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"></a>
                                <li style="border:none;" class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">@lang('auth.home')</a></li>
                                <li style="border:none;" class="{{Request::path()=='category' ? 'active' : ''}}"><a href="{{route('category.index')}}">@lang('auth.category')</a></li>
                                <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">@lang('auth.about')</a></li>
                                <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">@lang('auth.products')</a></li>

                                <li style="border-right: 1px solid #f0f0f0;padding: 0px 13px;" class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact.home')}}">@lang('auth.contact')</a></li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                    <div class="col-lg-4 col-md-12 col-12" style="display: flex;align-items: center;padding: 0;" dir="ltr">
                        <div class="right-content">
                            <ul class="list-main" style="display: flex;align-items:center;flex-wrap:nowrap">
                                <li><div class="sinlge-bar shopping">
                                    @php
                                        $total_prod=0;
                                        $total_amount=0;
                                    @endphp
                                @if(session('wishlist'))
                                        @foreach(session('wishlist') as $wishlist_items)
                                            @php
                                                $total_prod+=$wishlist_items['quantity'];
                                                $total_amount+=$wishlist_items['amount'];
                                            @endphp
                                        @endforeach
                                @endif
                                    <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{Helper::wishlistCount()}}</span></a>
                                    @auth
                                        <div class="shopping-item">
                                            <div class="dropdown-cart-header">
                                                <span>{{count(Helper::getAllProductFromWishlist())}} @lang('auth.items')</span>
                                                <a href="{{route('wishlist')}}">@lang('auth.view_wishlist')</a>
                                            </div>
                                            <ul class="shopping-list">
                                                    @foreach(Helper::getAllProductFromWishlist() as $data)
                                                            @php
                                                                $photo=explode(',',$data->product['photo']);
                                                            @endphp
                                                            <li>
                                                                <a href="{{route('wishlist-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                                <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                                <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                                                <p class="quantity">{{$data->quantity}} x - <span class="amount">${{number_format($data->price,2)}}</span></p>
                                                            </li>
                                                    @endforeach
                                            </ul>
                                            <div class="bottom">
                                                <div class="total">
                                                    <span>@lang('auth.total')</span>
                                                    <span class="total-amount">${{number_format(Helper::totalWishlistPrice(),2)}}</span>
                                                </div>
                                                <a href="{{route('cart')}}" class="btn animate">@lang('auth.cart')</a>
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                                <div class="sinlge-bar shopping">
                                    <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                                    @auth
                                        <div class="shopping-item">
                                            <div class="dropdown-cart-header">
                                                <span>{{count(Helper::getAllProductFromCart())}} @lang('auth.items')</span>
                                                <a href="{{route('cart')}}">@lang('auth.view_cart')</a>
                                            </div>
                                            <ul class="shopping-list">
                                                    @foreach(Helper::getAllProductFromCart() as $data)
                                                            @php
                                                                $photo=explode(',',$data->product['photo']);
                                                            @endphp
                                                            <li>
                                                                <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                                <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                                <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                                                <p class="quantity">{{$data->quantity}} x - <span class="amount">${{number_format($data->price,2)}}</span></p>
                                                            </li>
                                                    @endforeach
                                            </ul>
                                            <div class="bottom">
                                                <div class="total">
                                                    <span>Total</span>
                                                    <span class="total-amount">${{number_format(Helper::totalCartPrice(),2)}}</span>
                                                </div>
                                                <a href="{{route('checkout')}}" class="btn animate">@lang('auth.checkout')</a>
                                            </div>
                                        </div>
                                    @endauth
                                </div></li>
                                    @auth
                                        @if(Auth::user()->role=='admin')
                                            <li><i class="ti-user"></i> <a href="{{route('admin')}}"  target="_blank">@lang('auth.dashboard')</a></li>
                                        @else
                                            <li><i class="ti-user"></i> <a href="{{route('user')}}"  target="_blank">@lang('auth.dashboard')</a></li>
                                        @endif
                                        <li><i class="ti-power-off"></i> <a href="{{route('user.logout')}}">@lang('auth.logout')</a></li>

                                    @else
                                        <li><i class="ti-power-off"></i><a href="{{route('login.form')}}">@lang('auth.login') /</a> <a href="{{route('register.form')}}">@lang('auth.register')</a></li>
                                    @endauth
                                    @if (app()->getLocale() == 'ar')
                                    <li class="lang">
                                        <a id="lang" href="#">AR</a>
                                            <ul class="lang dropdown border-0 shadow">
                                                <li>
                                                    <a href="/lang/en">EN</a>
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    @else
                                    <li class="lang">
                                        <a id="lang" href="#">En</a>
                                            <ul class="lang dropdown border-0 shadow">
                                                <li>
                                                    <a href="/lang/ar">AR</a>
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main" style="display: flex;align-items:center">
                                    @php
                                    $settings=DB::table('settings')->get();
                                @endphp
                                <a style="margin-right: auto" href="{{route('home')}}"><img style="height: 45px;" src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"></a>
                                <li class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">@lang('auth.home')</a></li>
                                <li style="border:none;" class="{{Request::path()=='category' ? 'active' : ''}}"><a href="{{route('category.index')}}">@lang('auth.category')</a></li>
                                <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">@lang('auth.about')</a></li>
                                <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">@lang('auth.products')</a></li>

                                <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact.home')}}">@lang('auth.contact')</a></li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                    <div class="col-lg-4 col-md-12 col-12" style="display: flex;align-items: center;padding: 0;">
                        <div class="right-content">
                            <ul class="list-main" style="display: flex;align-items:center">
                                <li><div class="sinlge-bar shopping">
                                    @php
                                        $total_prod=0;
                                        $total_amount=0;
                                    @endphp
                                   @if(session('wishlist'))
                                        @foreach(session('wishlist') as $wishlist_items)
                                            @php
                                                $total_prod+=$wishlist_items['quantity'];
                                                $total_amount+=$wishlist_items['amount'];
                                            @endphp
                                        @endforeach
                                   @endif
                                    <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{Helper::wishlistCount()}}</span></a>
                                    @auth
                                        <div class="shopping-item">
                                            <div class="dropdown-cart-header">
                                                <span>{{count(Helper::getAllProductFromWishlist())}} @lang('auth.items')</span>
                                                <a href="{{route('wishlist')}}">@lang('auth.view_wishlist')</a>
                                            </div>
                                            <ul class="shopping-list">
                                                    @foreach(Helper::getAllProductFromWishlist() as $data)
                                                            @php
                                                                $photo=explode(',',$data->product['photo']);
                                                            @endphp
                                                            <li>
                                                                <a href="{{route('wishlist-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                                <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                                <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                                                <p class="quantity">{{$data->quantity}} x - <span class="amount">${{number_format($data->price,2)}}</span></p>
                                                            </li>
                                                    @endforeach
                                            </ul>
                                            <div class="bottom">
                                                <div class="total">
                                                    <span>@lang('auth.total')</span>
                                                    <span class="total-amount">${{number_format(Helper::totalWishlistPrice(),2)}}</span>
                                                </div>
                                                <a href="{{route('cart')}}" class="btn animate">@lang('auth.cart')</a>
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                                <div class="sinlge-bar shopping">
                                    <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                                    @auth
                                        <div class="shopping-item">
                                            <div class="dropdown-cart-header">
                                                <span>{{count(Helper::getAllProductFromCart())}} @lang('auth.items')</span>
                                                <a href="{{route('cart')}}">@lang('auth.view_cart')</a>
                                            </div>
                                            <ul class="shopping-list">
                                                    @foreach(Helper::getAllProductFromCart() as $data)
                                                            @php
                                                                $photo=explode(',',$data->product['photo']);
                                                            @endphp
                                                            <li>
                                                                <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                                <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                                <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                                                <p class="quantity">{{$data->quantity}} x - <span class="amount">${{number_format($data->price,2)}}</span></p>
                                                            </li>
                                                    @endforeach
                                            </ul>
                                            <div class="bottom">
                                                <div class="total">
                                                    <span>Total</span>
                                                    <span class="total-amount">${{number_format(Helper::totalCartPrice(),2)}}</span>
                                                </div>
                                                <a href="{{route('checkout')}}" class="btn animate">@lang('auth.checkout')</a>
                                            </div>
                                        </div>
                                    @endauth
                                </div></li>
                                    @auth
                                        @if(Auth::user()->role=='admin')
                                            <li><i class="ti-user"></i> <a href="{{route('admin')}}"  target="_blank">@lang('auth.dashboard')</a></li>
                                        @else
                                            <li><i class="ti-user"></i> <a href="{{route('user')}}"  target="_blank">@lang('auth.dashboard')</a></li>
                                        @endif
                                        <li><i class="ti-power-off"></i> <a href="{{route('user.logout')}}">@lang('auth.logout')</a></li>

                                    @else
                                        <li><i class="ti-power-off"></i><a href="{{route('login.form')}}">@lang('auth.login') /</a> <a href="{{route('register.form')}}">@lang('auth.register')</a></li>
                                    @endauth
                                    @if (app()->getLocale() == 'ar')
                                    <li class="lang">
                                        <a id="lang" href="#">AR</a>
                                            <ul class="lang dropdown border-0 shadow">
                                                <li>
                                                    <a href="/lang/en">EN</a>
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    @else
                                    <li class="lang">
                                        <a id="lang" href="#">En</a>
                                            <ul class="lang dropdown border-0 shadow">
                                                <li>
                                                    <a href="/lang/ar">AR</a>
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- End Topbar -->
    {{-- <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <div class="sinlge-bar shopping">
                            @php
                                $total_prod=0;
                                $total_amount=0;
                            @endphp
                           @if(session('wishlist'))
                                @foreach(session('wishlist') as $wishlist_items)
                                    @php
                                        $total_prod+=$wishlist_items['quantity'];
                                        $total_amount+=$wishlist_items['amount'];
                                    @endphp
                                @endforeach
                           @endif
                            <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{Helper::wishlistCount()}}</span></a>
                            @auth
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count(Helper::getAllProductFromWishlist())}} Items</span>
                                        <a href="{{route('wishlist')}}">View Wishlist</a>
                                    </div>
                                    <ul class="shopping-list">
                                            @foreach(Helper::getAllProductFromWishlist() as $data)
                                                    @php
                                                        $photo=explode(',',$data->product['photo']);
                                                    @endphp
                                                    <li>
                                                        <a href="{{route('wishlist-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                        <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                        <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                                        <p class="quantity">{{$data->quantity}} x - <span class="amount">${{number_format($data->price,2)}}</span></p>
                                                    </li>
                                            @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">${{number_format(Helper::totalWishlistPrice(),2)}}</span>
                                        </div>
                                        <a href="{{route('cart')}}" class="btn animate">Cart</a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                            @auth
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count(Helper::getAllProductFromCart())}} Items</span>
                                        <a href="{{route('cart')}}">View Cart</a>
                                    </div>
                                    <ul class="shopping-list">
                                            @foreach(Helper::getAllProductFromCart() as $data)
                                                    @php
                                                        $photo=explode(',',$data->product['photo']);
                                                    @endphp
                                                    <li>
                                                        <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                        <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                        <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                                        <p class="quantity">{{$data->quantity}} x - <span class="amount">${{number_format($data->price,2)}}</span></p>
                                                    </li>
                                            @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">${{number_format(Helper::totalCartPrice(),2)}}</span>
                                        </div>
                                        <a href="{{route('checkout')}}" class="btn animate">Checkout</a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Header Inner -->
    {{-- <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">Home</a></li>
                                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">About Us</a></li>
                                            <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">Products</a><span class="@if(Request::path()=='product-grids'||Request::path()=='product-lists') New @endif new">New</span></li>
                                                {{Helper::getHeaderCategory()}}
                                            <li class="{{Request::path()=='blog' ? 'active' : ''}}"><a href="{{route('blog')}}">Blog</a></li>

                                            <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact.home')}}">Contact Us</a></li>
                                            <li class="{{Request::path()=='join' ? 'active' : ''}}"><a href="{{route('join.home')}}">Join Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--/ End Header Inner -->
</header>
