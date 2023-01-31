@extends('frontend.layouts.master')

@section('meta')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='copyright' content=''>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
<meta name="description" content="{{$product_detail->summary}}">
<meta property="og:url" content="{{route('product-detail',$product_detail->slug)}}">
<meta property="og:type" content="article">
<meta property="og:title" content="{{$product_detail->title}}">
<meta property="og:image" content="{{$product_detail->photo}}">
<meta property="og:description" content="{{$product_detail->description}}">
<style>
    @media screen and (max-width: 995px){
    .fixed-nav li {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0px !important;
        font-size: 13px !important;
    }
    #cssmenu{
        display: block !important;
        padding: 0 !important;
    }
    .breadcrumbs {
        margin-top: 75px !important;
    }
}
</style>
@endsection
@section('title','Magenta')
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
                        <li class="active"><a href="{{ route('product-grids') }}">@lang('auth.products')<i
                                    class="ti-arrow-left"></i></a></li>
                        <li><a href="#">{{$product_detail->title_ar}}</a></li>
                    </ul>
                </div>
                @else
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ route('home') }}">@lang('auth.home')<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{ route('product-grids') }}">@lang('auth.products')<i
                                    class="ti-arrow-right"></i></a></li>
                        <li><a href="#">{{$product_detail->title}}</a></li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shop Single -->
<section class="shop single section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <!-- Product Slider -->
                        <div class="product-gallery">
                            <!-- Images slider -->
                            <div class="flexslider-thumbnails">
                                <ul class="slides">
                                    @if ($product_detail->embeded_code == null && $product_detail->photo ==null)
                                    <img src="{{$product_detail->cover}}" alt="">
                                    @elseif ($product_detail->embeded_code != null && $product_detail->photo ==null)
                                    {!! $product_detail->embeded_code !!}
                                    @elseif ($product_detail->embeded_code == null && $product_detail->photo !=null)
                                    <div id="panorama-360-view"></div>
                                    <script>
                                        pannellum.viewer('panorama-360-view', {
                                            "type": "equirectangular",
                                            "panorama":{!! json_encode($product_detail->photo) !!},
                                            "autoLoad": true
                                        })
                                    </script>
                                    @endif
                                    {{-- @endif --}}
                                </ul>
                            </div>
                            <!-- End Images slider -->
                        </div>
                        <!-- End Product slider -->
                    </div>
                </div>
                @if (app()->getLocale() == "ar")
                <div class="row text-right" dir="rtl">
                    <div class="col-12">
                        <div class="product-info">
                            <div class="nav-main">
                                <!-- Tab Nav -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                            href="#description" role="tab">@lang('auth.Description')</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews"
                                            role="tab">@lang('auth.Reviews')</a></li>
                                </ul>
                                <!--/ End Tab Nav -->
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <!-- Description Tab -->
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="single-des">
                                                    <p>{!! ($product_detail->description_ar) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="short">
                                        <h4>{{$product_detail->title_ar}}</h4>
                                        <p class="description">{!!($product_detail->summary_ar)!!}</p>
                                    </div>
                                    <div class="product-buy">
                                        <form action="{{route('single-add-to-cart')}}" method="POST">
                                            @csrf
                                            <div class="add-to-cart mt-4">
                                                <input type="hidden" name="slug" value="{{ $product_detail->slug }}">
                                                <input type="hidden" name="quant[1]" value="1">
                                                <button type="submit" class="btn">@lang('auth.Add_to_cart')</button>
                                                <a href="{{route('add-to-wishlist',$product_detail->slug)}}"
                                                    class="btn min"><i class="ti-heart"></i></a>
                                            </div>
                                        </form>

                                        <p class="cat">@lang('auth.category') :<a
                                                href="{{route('product-cat',$product_detail->cat_info['slug'])}}">{{$product_detail->cat_info['title']}}</a>
                                        </p>
                                        @if($product_detail->sub_cat_info)
                                        <p class="cat mt-1">@lang('auth.sub_category') :<a
                                                href="{{route('product-sub-cat',[$product_detail->cat_info['slug'],$product_detail->sub_cat_info['slug']])}}">{{$product_detail->sub_cat_info['title']}}</a>
                                        </p>
                                        @endif
                                        <p class="availability">@lang('auth.Stock') : @if($product_detail->stock>0)<span
                                                class="badge badge-success">{{$product_detail->stock}}</span>@else <span
                                                class="badge badge-danger">{{$product_detail->stock}}</span> @endif</p>
                                    </div>
                                </div>
                                <!--/ End Description Tab -->
                                <!-- Reviews Tab -->
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="tab-single review-panel">
                                        <div class="row">
                                            <div class="col-12">

                                                <!-- Review -->
                                                <div class="comment-review">
                                                    <div class="add-review">
                                                        <h5>@lang('auth.add_a_review')</h5>
                                                        <p>@lang('auth.privacy')</p>
                                                    </div>
                                                    <h4>@lang('auth.your_rating') <span class="text-danger">*</span>
                                                    </h4>
                                                    <div class="review-inner">
                                                        <!-- Form -->
                                                        @auth
                                                        <form class="form" method="post"
                                                            action="{{route('review.store',$product_detail->slug)}}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-12 col-12">
                                                                    <div class="rating_box">
                                                                        <div class="star-rating">
                                                                            <div class="star-rating__wrap">
                                                                                <input class="star-rating__input"
                                                                                    id="star-rating-5" type="radio"
                                                                                    name="rate" value="5">
                                                                                <label
                                                                                    class="star-rating__ico fa fa-star-o"
                                                                                    for="star-rating-5"
                                                                                    title="5 out of 5 stars"></label>
                                                                                <input class="star-rating__input"
                                                                                    id="star-rating-4" type="radio"
                                                                                    name="rate" value="4">
                                                                                <label
                                                                                    class="star-rating__ico fa fa-star-o"
                                                                                    for="star-rating-4"
                                                                                    title="4 out of 5 stars"></label>
                                                                                <input class="star-rating__input"
                                                                                    id="star-rating-3" type="radio"
                                                                                    name="rate" value="3">
                                                                                <label
                                                                                    class="star-rating__ico fa fa-star-o"
                                                                                    for="star-rating-3"
                                                                                    title="3 out of 5 stars"></label>
                                                                                <input class="star-rating__input"
                                                                                    id="star-rating-2" type="radio"
                                                                                    name="rate" value="2">
                                                                                <label
                                                                                    class="star-rating__ico fa fa-star-o"
                                                                                    for="star-rating-2"
                                                                                    title="2 out of 5 stars"></label>
                                                                                <input class="star-rating__input"
                                                                                    id="star-rating-1" type="radio"
                                                                                    name="rate" value="1">
                                                                                <label
                                                                                    class="star-rating__ico fa fa-star-o"
                                                                                    for="star-rating-1"
                                                                                    title="1 out of 5 stars"></label>
                                                                                @error('rate')
                                                                                <span
                                                                                    class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-12">
                                                                    <div class="form-group">
                                                                        <label>@lang('auth.write_a_review')</label>
                                                                        <textarea name="review" rows="6"
                                                                            placeholder=""></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-12">
                                                                    <div class="form-group button5">
                                                                        <button type="submit"
                                                                            class="btn">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        @else
                                                        <p class="text-center p-5">
                                                            @lang('auth.you_need_to') <a href="{{route('login.form')}}"
                                                                style="color:rgb(54, 54, 204)">@lang('auth.login')</a> @lang('auth.or') <a
                                                                style="color:blue"
                                                                href="{{route('register.form')}}">@lang('auth.register')</a>

                                                        </p>
                                                        <!--/ End Form -->
                                                        @endauth
                                                    </div>
                                                </div>

                                                <div class="ratting-main">
                                                    <div class="avg-ratting">
                                                        {{-- @php
                                                        $rate=0;
                                                        foreach($product_detail->rate as $key=>$rate){
                                                        $rate +=$rate
                                                        }
                                                        @endphp --}}
                                                        <h4>{{ceil($product_detail->getReview->avg('rate'))}}
                                                            <span>(@lang('auth.Overall'))</span></h4>
                                                        <span>@lang('auth.based_on') {{$product_detail->getReview->count()}}
                                                            @lang('auth.Comments')</span>
                                                    </div>
                                                    @foreach($product_detail['getReview'] as $data)
                                                    <!-- Single Rating -->
                                                    <div class="single-rating">
                                                        <div class="rating-author">
                                                            @if($data->user_info['photo'])
                                                            <img src="{{$data->user_info['photo']}}"
                                                                alt="{{$data->user_info['photo']}}">
                                                            @else
                                                            <img src="{{asset('backend/img/avatar.png')}}"
                                                                alt="Profile.jpg">
                                                            @endif
                                                        </div>
                                                        <div class="rating-des">
                                                            <h6>{{$data->user_info['name']}}</h6>
                                                            <div class="ratings">

                                                                <ul class="rating">
                                                                    @for($i=1; $i<=5; $i++) @if($data->rate>=$i)
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        @else
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        @endif
                                                                        @endfor
                                                                </ul>
                                                                <div class="rate-count">(<span>{{$data->rate}}</span>)
                                                                </div>
                                                            </div>
                                                            <p>{{$data->review}}</p>
                                                        </div>
                                                    </div>
                                                    <!--/ End Single Rating -->
                                                    @endforeach
                                                </div>

                                                <!--/ End Review -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Reviews Tab -->
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-12">
                        <div class="product-info">
                            <div class="nav-main">
                                <!-- Tab Nav -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                            href="#description" role="tab">@lang('auth.Description')</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews"
                                            role="tab">@lang('auth.Reviews')</a></li>
                                </ul>
                                <!--/ End Tab Nav -->
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <!-- Description Tab -->
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="single-des">
                                                    <p>{!! ($product_detail->description) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="short">
                                        <h4>{{$product_detail->title}}</h4>
                                        <div class="rating-main">
                                            <ul class="rating" style="display: flex;">
                                                @php
                                                $rate=ceil($product_detail->getReview->avg('rate'))
                                                @endphp
                                                @for($i=1; $i<=5; $i++) @if($rate>=$i)
                                                    <li><i class="fa fa-star"></i></li>
                                                    @else
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    @endif
                                                    @endfor
                                            </ul>
                                            <a href="#" class="total-review">({{$product_detail['getReview']->count()}})
                                                @lang('auth.Reviews')</a>
                                        </div>
                                        <p class="description">{!!($product_detail->summary)!!}</p>
                                    </div>
                                    <div class="product-buy">
                                        <form action="{{route('single-add-to-cart')}}" method="POST">
                                            @csrf
                                            <div class="add-to-cart mt-4">
                                                <input type="hidden" name="slug" value="{{ $product_detail->slug }}">
                                                <input type="hidden" name="quant[1]" value="1">
                                                <button type="submit" class="btn">@lang('auth.Add_to_cart')</button>
                                                <a href="{{route('add-to-wishlist',$product_detail->slug)}}"
                                                    class="btn min"><i class="ti-heart"></i></a>
                                            </div>
                                        </form>

                                        <p class="cat">@lang('auth.category') :<a
                                                href="{{route('product-cat',$product_detail->cat_info['slug'])}}">{{$product_detail->cat_info['title']}}</a>
                                        </p>
                                        @if($product_detail->sub_cat_info)
                                        <p class="cat mt-1">@lang('auth.sub_category') :<a
                                                href="{{route('product-sub-cat',[$product_detail->cat_info['slug'],$product_detail->sub_cat_info['slug']])}}">{{$product_detail->sub_cat_info['title']}}</a>
                                        </p>
                                        @endif
                                        <p class="availability">@lang('auth.Stock') : @if($product_detail->stock>0)<span
                                                class="badge badge-success">{{$product_detail->stock}}</span>@else <span
                                                class="badge badge-danger">{{$product_detail->stock}}</span> @endif</p>
                                    </div>
                                </div>
                                <!--/ End Description Tab -->
                                <!-- Reviews Tab -->
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="tab-single review-panel">
                                        <div class="row">
                                            <div class="col-12">

                                                <!-- Review -->
                                                <div class="comment-review">
                                                    <div class="add-review">
                                                        <h5>@lang('auth.add_a_review')</h5>
                                                        <p>@lang('auth.privacy')</p>
                                                    </div>
                                                    <h4>@lang('auth.your_rating') <span class="text-danger">*</span>
                                                    </h4>
                                                    <div class="review-inner">
                                                        <!-- Form -->
                                                        @auth
                                                        <form class="form" method="post"
                                                            action="{{route('review.store',$product_detail->slug)}}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-12 col-12">
                                                                    <div class="rating_box">
                                                                        <div class="star-rating">
                                                                            <div class="star-rating__wrap">
                                                                                <input class="star-rating__input"
                                                                                    id="star-rating-5" type="radio"
                                                                                    name="rate" value="5">
                                                                                <label
                                                                                    class="star-rating__ico fa fa-star-o"
                                                                                    for="star-rating-5"
                                                                                    title="5 out of 5 stars"></label>
                                                                                <input class="star-rating__input"
                                                                                    id="star-rating-4" type="radio"
                                                                                    name="rate" value="4">
                                                                                <label
                                                                                    class="star-rating__ico fa fa-star-o"
                                                                                    for="star-rating-4"
                                                                                    title="4 out of 5 stars"></label>
                                                                                <input class="star-rating__input"
                                                                                    id="star-rating-3" type="radio"
                                                                                    name="rate" value="3">
                                                                                <label
                                                                                    class="star-rating__ico fa fa-star-o"
                                                                                    for="star-rating-3"
                                                                                    title="3 out of 5 stars"></label>
                                                                                <input class="star-rating__input"
                                                                                    id="star-rating-2" type="radio"
                                                                                    name="rate" value="2">
                                                                                <label
                                                                                    class="star-rating__ico fa fa-star-o"
                                                                                    for="star-rating-2"
                                                                                    title="2 out of 5 stars"></label>
                                                                                <input class="star-rating__input"
                                                                                    id="star-rating-1" type="radio"
                                                                                    name="rate" value="1">
                                                                                <label
                                                                                    class="star-rating__ico fa fa-star-o"
                                                                                    for="star-rating-1"
                                                                                    title="1 out of 5 stars"></label>
                                                                                @error('rate')
                                                                                <span
                                                                                    class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-12">
                                                                    <div class="form-group">
                                                                        <label>@lang('auth.write_a_review')</label>
                                                                        <textarea name="review" rows="6"
                                                                            placeholder=""></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-12">
                                                                    <div class="form-group button5">
                                                                        <button type="submit"
                                                                            class="btn">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        @else
                                                        <p class="text-center p-5">
                                                            @lang('auth.you_need_to') <a href="{{route('login.form')}}"
                                                                style="color:rgb(54, 54, 204)">@lang('auth.login')</a> @lang('auth.or') <a
                                                                style="color:blue"
                                                                href="{{route('register.form')}}">@lang('auth.register')</a>

                                                        </p>
                                                        <!--/ End Form -->
                                                        @endauth
                                                    </div>
                                                </div>

                                                <div class="ratting-main">
                                                    <div class="avg-ratting">
                                                        {{-- @php
                                                        $rate=0;
                                                        foreach($product_detail->rate as $key=>$rate){
                                                        $rate +=$rate
                                                        }
                                                        @endphp --}}
                                                        <h4>{{ceil($product_detail->getReview->avg('rate'))}}
                                                            <span>(@lang('auth.Overall'))</span></h4>
                                                        <span>@lang('auth.based_on') {{$product_detail->getReview->count()}}
                                                            @lang('auth.Comments')</span>
                                                    </div>
                                                    @foreach($product_detail['getReview'] as $data)
                                                    <!-- Single Rating -->
                                                    <div class="single-rating">
                                                        <div class="rating-author">
                                                            @if($data->user_info['photo'])
                                                            <img src="{{$data->user_info['photo']}}"
                                                                alt="{{$data->user_info['photo']}}">
                                                            @else
                                                            <img src="{{asset('backend/img/avatar.png')}}"
                                                                alt="Profile.jpg">
                                                            @endif
                                                        </div>
                                                        <div class="rating-des">
                                                            <h6>{{$data->user_info['name']}}</h6>
                                                            <div class="ratings">

                                                                <ul class="rating">
                                                                    @for($i=1; $i<=5; $i++) @if($data->rate>=$i)
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        @else
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        @endif
                                                                        @endfor
                                                                </ul>
                                                                <div class="rate-count">(<span>{{$data->rate}}</span>)
                                                                </div>
                                                            </div>
                                                            <p>{{$data->review}}</p>
                                                        </div>
                                                    </div>
                                                    <!--/ End Single Rating -->
                                                    @endforeach
                                                </div>

                                                <!--/ End Review -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Reviews Tab -->
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!--/ End Shop Single -->

<!-- Start Most Popular -->
<div class="product-area most-popular related-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>@lang('auth.related_products')</h2>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- {{$product_detail->rel_prods}} --}}
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach($product_detail->rel_prods as $data)
                    @if($data->id !==$product_detail->id)
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{route('product-detail',$data->slug)}}">
                                @php
                                $cover=explode(',',$data->cover);
                                @endphp
                                <img class="default-img" src="{{$cover[0]}}" alt="{{$cover[0]}}">
                                <img class="hover-img" src="{{$cover[0]}}" alt="{{$cover[0]}}">
                                {{-- <span class="price-dec">{{$data->discount}} % Off</span> --}}
                                {{-- <span class="out-of-stock">Hot</span> --}}
                            </a>
                            <div class="button-head">
                                @if (app()->getLocale() == "ar")
                                <div class="product-action" style="right: auto;left:45%">
                                    <a data-toggle="modal" data-target="#{{$data->id}}" title="Quick View" href="#"><i
                                            class=" ti-eye"></i><span>Quick Shop</span></a>
                                    <a title="Wishlist" href="{{route('add-to-wishlist',$data->slug)}}"><i
                                            class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                </div>
                                <div class="product-action-2" style="right: 0;left:auto">
                                    <a href="{{route('add-to-cart',$data->slug)}}">@lang('auth.Add_to_cart')</a>
                                </div>
                                @else
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#{{$data->id}}" title="Quick View" href="#"><i
                                            class=" ti-eye"></i><span>Quick Shop</span></a>
                                    <a title="Wishlist" href="{{route('add-to-wishlist',$data->slug)}}"><i
                                            class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                </div>
                                <div class="product-action-2">
                                    <a href="{{route('add-to-cart',$data->slug)}}">@lang('auth.Add_to_cart')</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        @if (app()->getLocale() == "ar")
                        <div class="product-content text-right">
                            <h3><a href="{{route('product-detail',$data->slug)}}">{{$data->title_ar}}</a></h3>
                            {{-- <div class="product-price">
                                @php
                                $after_discount=($data->price-(($data->discount*$data->price)/100));
                                @endphp
                                <span class="old">${{number_format($data->price,2)}}</span>
                                <span>${{number_format($after_discount,2)}}</span>
                            </div> --}}
                        </div>
                        @else
                        <div class="product-content">
                            <h3><a href="{{route('product-detail',$data->slug)}}">{{$data->title}}</a></h3>
                            {{-- <div class="product-price">
                                @php
                                $after_discount=($data->price-(($data->discount*$data->price)/100));
                                @endphp
                                <span class="old">${{number_format($data->price,2)}}</span>
                                <span>${{number_format($after_discount,2)}}</span>
                            </div> --}}
                        </div>
                        @endif
                    </div>
                    <!-- End Single Product -->

                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->


<!-- Modal -->
@foreach($product_detail->rel_prods as $data)
<div class="modal fade" id="{{ $data->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 15px !important;overflow:hidden" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                        aria-hidden="true"></span></button>
            </div>
            @if (app()->getLocale() == "ar")
            <div style="max-height: 412px;overflow:hidden" class="modal-body text-right" dir="rtl">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <!-- Product Slider -->
                        <div class="product-gallery">
                            <div class="quickview-slider-active">
                                <div class="single-slider">
                                    <img src="{{$data->cover}}" alt="{{$data->cover}}">
                                </div>
                            </div>
                        </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h2>{{ $data->title_ar }}</h2>
                            <div class="quickview-ratting-review">
                                <div class="">
                                    @if($data->stock >0)
                                    <span><i class="fa fa-check-circle-o"></i> {{$data->stock}} في المخزن</span>
                                    @else
                                    <span><i class="fa fa-times-circle-o text-danger"></i> {{$data->stock}} من
                                        المخزون</span>
                                    @endif
                                </div>
                            </div>
                            {{-- @php
                            $after_discount=($data->price-($data->price*$data->discount)/100);
                            @endphp
                            <h3><small><del class="text-muted">${{number_format($data->price,2)}}</del></small>
                                ${{number_format($after_discount,2)}} </h3> --}}
                            <div class="quickview-peragraph">
                                <p>{{ $data->description_ar }}.</p>
                            </div>
                            @if($data->size)
                            <div class="size">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">Size</h5>
                                        <select>
                                            @php
                                            $sizes=explode(',',$data->size);
                                            // dd($sizes);
                                            @endphp
                                            @foreach($sizes as $size)
                                                <option>{{$size}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="col-lg-6 col-12">
                                        <h5 class="title">Color</h5>
                                        <select>
                                            <option selected="selected">orange</option>
                                            <option>purple</option>
                                            <option>black</option>
                                            <option>pink</option>
                                        </select>
                                    </div> --}}
                                </div>
                            </div>
                            @endif
                            <form action="{{route('single-add-to-cart')}}" method="POST">
                                @csrf
                                {{-- <div class="quantity">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="slug" value="{{$data->slug}}">
                                        <input type="text" name="quant[1]" class="input-number" data-min="1"
                                            data-max="1000" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div> --}}
                                <input type="hidden" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
                                <div class="add-to-cart">
                                    <button type="submit" class="btn">@lang('auth.Add_to_cart')</button>
                                    <a href="{{route('add-to-wishlist',$data->slug)}}" class="btn min"><i
                                            class="ti-heart"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div style="max-height: 412px;overflow:hidden" class="modal-body">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <!-- Product Slider -->
                        <div class="product-gallery">
                            <div class="quickview-slider-active">
                                <div class="single-slider" style="padding: 10px">
                                    <img src="{{$data->cover}}" alt="{{$data->cover}}">
                                </div>
                            </div>
                        </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h2>{{ $data->title }}</h2>
                            <div class="quickview-ratting-review">
                                <div class="">
                                    @if($data->stock >0)
                                    <span><i class="fa fa-check-circle-o"></i> {{$data->stock}} @lang('auth.Stock') </span>
                                    @else
                                    <span><i class="fa fa-times-circle-o text-danger"></i> {{$data->stock}} @lang('auth.out_stock')</span>
                                    @endif
                                </div>
                            </div>
                            {{-- @php
                            $after_discount=($data->price-($data->price*$data->discount)/100);
                            @endphp
                            <h3><small><del class="text-muted">${{number_format($data->price,2)}}</del></small>
                                ${{number_format($after_discount,2)}} </h3> --}}
                            <div class="quickview-peragraph">
                                <p>{{ $data->description }}.</p>
                            </div>
                            @if($data->size)
                            <div class="size">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">@lang('auth.Size')</h5>
                                        <select>
                                            @php
                                            $sizes=explode(',',$data->size);
                                            // dd($sizes);
                                            @endphp
                                            @foreach($sizes as $size)
                                                <option>{{$size}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="col-lg-6 col-12">
                                        <h5 class="title">Color</h5>
                                        <select>
                                            <option selected="selected">orange</option>
                                            <option>purple</option>
                                            <option>black</option>
                                            <option>pink</option>
                                        </select>
                                    </div> --}}
                                </div>
                            </div>
                            @endif
                            <form action="{{route('single-add-to-cart')}}" method="POST">
                                @csrf
                                {{-- <div class="quantity">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="slug" value="{{$data->slug}}">
                                        <input type="text" name="quant[1]" class="input-number" data-min="1"
                                            data-max="1000" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div> --}}
                                <input type="hidden" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
                                <div class="add-to-cart">
                                    <button type="submit" class="btn">@lang('auth.Add_to_cart')</button>
                                    <a href="{{route('add-to-wishlist',$data->slug)}}" class="btn min"><i
                                            class="ti-heart"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endforeach
<!-- Modal end -->

@endsection
@push('styles')
<style>
    /* Rating */
    .rating_box {
        display: inline-flex;
    }

    .star-rating {
        font-size: 0;
        padding-left: 10px;
        padding-right: 10px;
    }

    .star-rating__wrap {
        display: inline-block;
        font-size: 1rem;
    }

    .star-rating__wrap:after {
        content: "";
        display: table;
        clear: both;
    }

    .star-rating__ico {
        float: right;
        padding-left: 2px;
        cursor: pointer;
        color: #c8a165;
        font-size: 16px;
        margin-top: 5px;
    }

    .star-rating__ico:last-child {
        padding-left: 0;
    }

    .star-rating__input {
        display: none;
    }

    .star-rating__ico:hover:before,
    .star-rating__ico:hover~.star-rating__ico:before,
    .star-rating__input:checked~.star-rating__ico:before {
        content: "\F005";
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

{{-- <script>
    $('.cart').click(function(){
            var quantity=$('#quantity').val();
            var pro_id=$(this).data('id');
            // alert(quantity);
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
					else{
                        swal('error',response.msg,'error').then(function(){
							document.location.href=document.location.href;
						});
                    }
                }
            })
        });
</script> --}}

@endpush
