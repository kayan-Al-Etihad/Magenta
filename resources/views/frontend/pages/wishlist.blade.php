@extends('frontend.layouts.master')
@section('title','Wishlist Page')
@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (app()->getLocale() == "ar")
                        <div class="bread-inner text-right" dir="rtl">
                            <ul class="bread-list">
                                <li><a href="{{ route('home') }}">@lang('auth.home')<i class="ti-arrow-left"></i></a></li>
                                <li class="active"><a href="{{ route('wishlist') }}">@lang('auth.wishlist')</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{ route('home') }}">@lang('auth.home')<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="{{ route('wishlist') }}">@lang('auth.wishlist')</a></li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
                @if (app()->getLocale() == "ar")
                    <div class="col-12 text-center" dir="rtl">
                        <!-- Shopping Summery -->
                        <table class="table shopping-summery">
                            <thead>
                                <tr class="main-hading">
                                    <th>@lang('auth.product')</th>
                                    <th>@lang('auth.name')</th>
                                    <th class="text-center">@lang('auth.total')</th>
                                    <th class="text-center">@lang('auth.Add_to_cart')</th>
                                    <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Helper::getAllProductFromWishlist())
                                    @foreach(Helper::getAllProductFromWishlist() as $key=>$wishlist)
                                        <tr>
                                            @php
                                                $photo=explode(',',$wishlist->product['photo']);
                                            @endphp
                                            <td class="image" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
                                            <td class="product-des" data-title="Description">
                                                <p class="product-name"><a href="{{route('product-detail',$wishlist->product['slug'])}}">{{$wishlist->product['title_ar']}}</a></p>
                                                <p class="product-des">{!!($wishlist['summary_ar']) !!}</p>
                                            </td>
                                            <td class="total-amount" data-title="Total"><span>${{$wishlist['amount']}}</span></td>
                                            <td><a href="{{route('add-to-cart',$wishlist->product['slug'])}}" class='btn text-white'>@lang('auth.Add_to_cart')</a></td>
                                            <td class="action" data-title="Remove"><a href="{{route('wishlist-delete',$wishlist->id)}}"><i class="ti-trash remove-icon"></i></a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center">
                                            @lang('auth.no_wishlist') . <a href="{{route('product-grids')}}" style="color:blue;">@lang('auth.continue_shopping')</a>

                                        </td>
                                    </tr>
                                @endif


                            </tbody>
                        </table>
                        <!--/ End Shopping Summery -->
                    </div>
                    @else
                    <div class="col-12">
                        <!-- Shopping Summery -->
                        <table class="table shopping-summery">
                            <thead>
                                <tr class="main-hading">
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center">@lang('auth.Add_to_cart')</th>
                                    <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Helper::getAllProductFromWishlist())
                                    @foreach(Helper::getAllProductFromWishlist() as $key=>$wishlist)
                                        <tr>
                                            @php
                                                $photo=explode(',',$wishlist->product['photo']);
                                            @endphp
                                            <td class="image" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
                                            <td class="product-des" data-title="Description">
                                                <p class="product-name"><a href="{{route('product-detail',$wishlist->product['slug'])}}">{{$wishlist->product['title']}}</a></p>
                                                <p class="product-des">{!!($wishlist['summary']) !!}</p>
                                            </td>
                                            <td class="total-amount" data-title="Total"><span>${{$wishlist['amount']}}</span></td>
                                            <td><a href="{{route('add-to-cart',$wishlist->product['slug'])}}" class='btn text-white'>Add To Cart</a></td>
                                            <td class="action" data-title="Remove"><a href="{{route('wishlist-delete',$wishlist->id)}}"><i class="ti-trash remove-icon"></i></a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center">
                                            @lang('auth.no_wishlist') . <a href="{{route('product-grids')}}" style="color:blue;">@lang('auth.continue_shopping')</a>

                                        </td>
                                    </tr>
                                @endif


                            </tbody>
                        </table>
                        <!--/ End Shopping Summery -->
                    </div>
                @endif
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->

<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>@lang('auth.shiping')</h4>
                    <p>@lang('auth.shiping_sub')</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>@lang('auth.return')</h4>
                    <p>@lang('auth.return_sub')</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>@lang('auth.payment')</h4>
                    <p>@lang('auth.payment_sub')</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>@lang('auth.price')</h4>
                    <p>@lang('auth.price_sub')</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->


@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush
