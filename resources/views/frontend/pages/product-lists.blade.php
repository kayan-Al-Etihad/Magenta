@extends('frontend.layouts.master')

@section('title','Magenta')

@section('main-content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (Request::path() == "product-lists")
                @if (app()->getLocale() == "ar")
                <div class="bread-inner text-right" dir="rtl">
                    <ul class="bread-list text-right" dir="rtl">
                        <li><a href="{{route('home')}}">@lang('auth.home')<i class="ti-arrow-left"></i></a></li>
                        <li class="active"><a href="/product-grids">@lang('auth.products')</a></li>
                    </ul>
                </div>
                @else
                <div class="bread-inner text-left">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">@lang('auth.home')<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="/product-grids">@lang('auth.products')</a></li>
                    </ul>
                </div>
                @endif
                @endif

                @if (Request::path() == "product-list/$category->slug")
                @if (app()->getLocale() == "ar")
                <div class="bread-inner text-right" dir="rtl">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">@lang('auth.home')<i class="ti-arrow-left"></i></a></li>
                        <li class="active"><a href="{{route('product-grid', $category->slug)}}">{{
                                $category->title_ar}}</a></li>
                    </ul>
                </div>
                @else
                <div class="bread-inner text-left">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">@lang('auth.home')<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{route('product-grid', $category->slug)}}">{{
                                $category->title}}</a></li>
                    </ul>
                </div>
                @endif
                @endif

                @php
                $sub = DB::table('categories')->where('parent_id', $category->id)->get()->first();
                @endphp
                @if ($sub != null)
                @if (Request::path() == "product-sub-list/$category->slug/$sub->slug")
                @if (app()->getLocale() == "ar")
                <div class="bread-inner text-right" dir="rtl">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">@lang('auth.home')<i class="ti-arrow-left"></i></a></li>
                        <li class="active"><a href="{{route('product-grid', $category->slug)}}">{{
                                $category->title_ar}}<i class="ti-arrow-left"></i></a></li>
                        <li class="active"><a href="#">{{ $sub->title_ar}}</a></li>
                    </ul>
                </div>
                @else
                <div class="bread-inner text-left">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">@lang('auth.home')<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{route('product-grid', $category->slug)}}">{{ $category->title}}<i
                                    class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="#">{{ $sub->title}}</a></li>
                    </ul>
                </div>
                @endif
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<form action="{{route('shop.filter')}}" method="POST">
    @csrf
    <!-- Product Style 1 -->
    <section class="product-area shop-sidebar shop-list shop section">
        <div class="container">
            @if (app()->getLocale() == "ar")
            <div class="row" dir="rtl">
                <div class="col-lg-3 col-md-4 col-12 text-right" dir="rtl">
                    <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">@lang("auth.category")</h3>
                            <ul class="categor-list">
                                @php
                                // $category = new Category();
                                $menu=App\Models\Category::getAllParentWithChild();
                                @endphp
                                @if($menu)
                                <li>
                                    @foreach($menu as $cat_info)
                                    @if($cat_info->child_cat->count()>0)
                                <li><a href="{{route('product-list',$cat_info->slug)}}">{{$cat_info->title_ar}}</a>
                                    <ul style="margin-right: 1.5rem;margin-left:0px">
                                        @foreach($cat_info->child_cat as $sub_menu)
                                        <li><a
                                                href="{{route('product-sub-list',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title_ar}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                <li><a href="{{route('product-list',$cat_info->slug)}}">{{$cat_info->title_ar}}</a></li>
                                @endif
                                @endforeach
                                </li>
                                @endif
                                {{-- @foreach(Helper::productCategoryList('products') as $cat)
                                @if($cat->is_parent==1)
                                <li><a href="{{route('product-list',$cat->slug)}}">{{$cat->title}}</a></li>
                                @endif
                                @endforeach --}}
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">@lang('auth.recent_post')</h3>
                            {{-- {{dd($recent_products)}} --}}
                            @foreach($recent_products as $product)
                            <!-- Single Post -->
                            @php
                            $photo=explode(',',$product->photo);
                            @endphp
                            <div class="single-post first" style="margin: 50px 0">
                                <div class="image">
                                    <img style="top:-40px" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                </div>
                                <div class="content">
                                    <h5><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- End Single Post -->
                            @endforeach
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <style>
                                        .nice-select:after {
                                            right: auto;
                                            left: 12px;
                                        }

                                        span.current {
                                            padding-left: 30px !important;
                                        }
                                    </style>
                                    <div class="single-shorter">
                                        <select class="show" name="show" onchange="this.form.submit();">
                                            <option value="">@lang('auth.default')</option>
                                            <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9' ) selected
                                                @endif>09</option>
                                            <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15' )
                                                selected @endif>15</option>
                                            <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21' )
                                                selected @endif>21</option>
                                            <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30' )
                                                selected @endif>30</option>
                                        </select>
                                        <label class="text-right"
                                            style="padding-left: 10px !important">@lang('auth.Show') : </label>
                                    </div>
                                    <div class="single-shorter">
                                        <select class='sortBy' name='sortBy' onchange="this.form.submit();">
                                            <option value="">@lang('auth.default')</option>
                                            <option value="title" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='title' ) selected @endif>@lang('auth.name')</option>
                                            <option value="price" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='price' ) selected @endif>@lang('auth.price')</option>
                                            <option value="category" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='category' ) selected @endif>@lang('auth.category')
                                            </option>
                                        </select>
                                        <label class="text-right"
                                            style="padding-left: 10px !important">@lang('auth.sort_by') : </label>
                                    </div>
                                </div>
                                <ul class="view-mode">
                                    @if (Request::path() == "product-lists")
                                    <li><a href="/product-grids"><i class="fa fa-th-large"></i></a></li>
                                    <li class="active"><a href="/product-lists"><i class="fa fa-th-list"></i></a></li>
                                    @endif
                                    @if (Request::path() == "product-list/$category->slug")
                                    <li><a href="{{ route('product-grid',$category->slug) }}"><i
                                                class="fa fa-th-large"></i></a></li>
                                    <li class="active"><a href="{{ route('product-list',$category->slug) }}"><i
                                                class="fa fa-th-list"></i></a></li>
                                    @endif
                                    @php
                                    $sub = DB::table('categories')->where('parent_id', $category->id)->get()->first();
                                    @endphp
                                    @if ($sub != null)
                                        @if (Request::path() == "product-sub-list/$category->slug/$sub->slug")
                                        <li><a href="{{ route('product-sub-list',[$category->slug,$sub->slug]) }}"><i
                                                    class="fa fa-th-large"></i></a></li>
                                        <li class="active"><a
                                                href="{{ route('product-sub-list',[$category->slug,$sub->slug]) }}"><i
                                                    class="fa fa-th-list"></i></a></li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @if(count($products))
                        @foreach($products as $product)
                        {{-- {{$product}} --}}
                        <!-- Start Single List -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{route('product-detail',$product->slug)}}">
                                                @php
                                                $photo=explode(',',$product->photo);
                                                @endphp
                                                <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                            </a>
                                            <div class="button-head">
                                                <div class="product-action" style="right: auto;left:60%">
                                                    <a data-toggle="modal" data-target="#{{$product->id}}"
                                                        title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick
                                                            Shop</span></a>
                                                    <a title="Wishlist"
                                                        href="{{route('add-to-wishlist',$product->slug)}}"><i
                                                            class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                </div>
                                                <div class="product-action-2" style="right: 0;left:auto">
                                                    <a
                                                        href="{{route('add-to-cart',$product->slug)}}">@lang('auth.Add_to_cart')</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12">
                                    <div class="list-content text-right">
                                        <div class="product-content">
                                            <h3 class="title"><a
                                                    href="{{route('product-detail',$product->slug)}}">{{$product->title_ar}}</a>
                                            </h3>
                                            {{-- <p>{!! html_entity_decode($product->summary) !!}</p> --}}
                                        </div>
                                        <p class="des pt-2">{!! html_entity_decode($product->summary_ar) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single List -->
                        @endforeach
                        @else
                        <h4 class="text-warning" style="margin:100px auto;">لا يوجد منتجلت.</h4>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 justify-content-center d-flex">
                            {{-- {{$products->appends($_GET)->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Categories</h3>
                            <ul class="categor-list">
                                @php
                                // $category = new Category();
                                $menu=App\Models\Category::getAllParentWithChild();
                                @endphp
                                @if($menu)
                                <li>
                                    @foreach($menu as $cat_info)
                                    @if($cat_info->child_cat->count()>0)
                                <li><a href="{{route('product-list',$cat_info->slug)}}">{{$cat_info->title}}</a>
                                    <ul style="margin-right: 1.5rem;margin-left:0px">
                                        @foreach($cat_info->child_cat as $sub_menu)
                                        <li><a
                                                href="{{route('product-sub-list',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                <li><a href="{{route('product-list',$cat_info->slug)}}">{{$cat_info->title}}</a></li>
                                @endif
                                @endforeach
                                </li>
                                @endif
                                {{-- @foreach(Helper::productCategoryList('products') as $cat)
                                @if($cat->is_parent==1)
                                <li><a href="{{route('product-list',$cat->slug)}}">{{$cat->title}}</a></li>
                                @endif
                                @endforeach --}}
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">Recent post</h3>
                            {{-- {{dd($recent_products)}} --}}
                            @foreach($recent_products as $product)
                            <!-- Single Post -->
                            @php
                            $photo=explode(',',$product->photo);
                            @endphp
                            <div class="single-post first" style="margin: 50px 0">
                                <div class="image">
                                    <img style="top:-40px" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                </div>
                                <div class="content">
                                    <h5><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- End Single Post -->
                            @endforeach
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <label>Show :</label>
                                        <select class="show" name="show" onchange="this.form.submit();">
                                            <option value="">Default</option>
                                            <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9' ) selected
                                                @endif>09</option>
                                            <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15' )
                                                selected @endif>15</option>
                                            <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21' )
                                                selected @endif>21</option>
                                            <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30' )
                                                selected @endif>30</option>
                                        </select>
                                    </div>
                                    <div class="single-shorter">
                                        <label>Sort By :</label>
                                        <select class='sortBy' name='sortBy' onchange="this.form.submit();">
                                            <option value="">Default</option>
                                            <option value="title" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='title' ) selected @endif>Name</option>
                                            <option value="price" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='price' ) selected @endif>Price</option>
                                            <option value="category" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='category' ) selected @endif>Category</option>
                                            <option value="brand" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='brand' ) selected @endif>Brand</option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="view-mode">
                                    @if (Request::path() == "product-lists")
                                    <li><a href="/product-grids"><i class="fa fa-th-large"></i></a></li>
                                    <li class="active"><a href="/product-lists"><i class="fa fa-th-list"></i></a></li>
                                    @endif
                                    @if (Request::path() == "product-list/$category->slug")
                                    <li><a href="{{ route('product-grid',$category->slug) }}"><i
                                                class="fa fa-th-large"></i></a></li>
                                    <li class="active"><a href="{{ route('product-list',$category->slug) }}"><i
                                                class="fa fa-th-list"></i></a></li>
                                    @endif
                                    @php
                                    $sub = DB::table('categories')->where('parent_id', $category->id)->get()->first();
                                    @endphp
                                    @if ($sub != null)
                                        @if (Request::path() == "product-sub-list/$category->slug/$sub->slug")
                                        <li><a href="{{ route('product-sub-list',[$category->slug,$sub->slug]) }}"><i
                                                    class="fa fa-th-large"></i></a></li>
                                        <li class="active"><a
                                                href="{{ route('product-sub-list',[$category->slug,$sub->slug]) }}"><i
                                                    class="fa fa-th-list"></i></a></li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @if(count($products))
                        @foreach($products as $product)
                        {{-- {{$product}} --}}
                        <!-- Start Single List -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{route('product-detail',$product->slug)}}">
                                                @php
                                                $photo=explode(',',$product->photo);
                                                @endphp
                                                <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                            </a>
                                            <div class="button-head">
                                                <div class="product-action">
                                                    <a data-toggle="modal" data-target="#{{$product->id}}"
                                                        title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick
                                                            Shop</span></a>
                                                    <a title="Wishlist"
                                                        href="{{route('add-to-wishlist',$product->slug)}}"
                                                        class="wishlist" data-id="{{$product->id}}"><i
                                                            class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                </div>
                                                <div class="product-action-2">
                                                    <a title="@lang('auth.Add_to_cart')"
                                                        href="{{route('add-to-cart',$product->slug)}}">@lang('auth.Add_to_cart')</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12">
                                    <div class="list-content">
                                        <div class="product-content">
                                            <h3 class="title"><a
                                                    href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a>
                                            </h3>
                                        </div>
                                        <p class="des pt-2">{!! html_entity_decode($product->summary) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single List -->
                        @endforeach
                        @else
                        <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 justify-content-center d-flex">
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    <!--/ End Product Style 1  -->
</form>
<!-- Modal -->
@if($products)
@foreach($products as $key=>$product)
<div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 15px !important;overflow:hidden">
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
                                @php
                                $photo=explode(',',$product->photo);
                                // dd($photo);
                                @endphp
                                @foreach($photo as $data)
                                <div class="single-slider" style="padding: 10px">
                                    <img src="{{$data}}" alt="{{$data}}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h2>{{$product->title_ar}}</h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-stock">
                                    @if($product->stock >0)
                                    <span><i class="fa fa-check-circle-o"></i> {{$product->stock}} في المخزن</span>
                                    @else
                                    <span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} غير
                                        متوفر</span>
                                    @endif
                                </div>
                            </div>
                            {{-- @php
                            $after_discount=($product->price-($product->price*$product->discount)/100);
                            @endphp
                            <h3><small><del class="text-muted">${{number_format($product->price,2)}}</del></small>
                                EGP{{number_format($after_discount,2)}} </h3> --}}
                            <div class="quickview-peragraph">
                                <p>{!! html_entity_decode($product->summary_ar) !!}</p>
                            </div>
                            @if($product->size)
                            <div class="size">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">@lang('auth.Size')</h5>
                                        <select>
                                            @php
                                            $sizes=explode(',',$product->size);
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
                                <input type="hidden" name="quant[1]" class="input-number" data-min="1" data-max="1000"
                                    value="1">
                                <div class="add-to-cart">
                                    <button type="submit" class="btn">@lang('auth.Add_to_cart')</button>
                                    <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i
                                            class="ti-heart"></i></a>
                                </div>
                            </form>
                            {{-- <div class="default-social">
                                <!-- ShareThis BEGIN -->
                                <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                            </div> --}}
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
                                @php
                                $photo=explode(',',$product->photo);
                                // dd($photo);
                                @endphp
                                @foreach($photo as $data)
                                <div class="single-slider" style="padding: 10px">
                                    <img src="{{$data}}" alt="{{$data}}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h2>{{$product->title}}</h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-stock">
                                    @if($product->stock >0)
                                    <span><i class="fa fa-check-circle-o"></i> {{$product->stock}} in stock</span>
                                    @else
                                    <span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} out
                                        stock</span>
                                    @endif
                                </div>
                            </div>
                            {{-- @php
                            $after_discount=($product->price-($product->price*$product->discount)/100);
                            @endphp
                            <h3><small><del class="text-muted">${{number_format($product->price,2)}}</del></small>
                                ${{number_format($after_discount,2)}} </h3> --}}
                            <div class="quickview-peragraph">
                                <p>{!! html_entity_decode($product->summary) !!}</p>
                            </div>
                            @if($product->size)
                            <div class="size">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">@lang('auth.Size')</h5>
                                        <select>
                                            @php
                                            $sizes=explode(',',$product->size);
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
                                        <input type="hidden" name="slug" value="{{$product->slug}}">
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
                                <input type="hidden" name="quant[1]" class="input-number" data-min="1" data-max="1000"
                                    value="1">
                                <div class="add-to-cart">
                                    <button type="submit" class="btn">@lang('auth.Add_to_cart')</button>
                                    <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i
                                            class="ti-heart"></i></a>
                                </div>
                            </form>
                            {{-- <div class="default-social">
                                <!-- ShareThis BEGIN -->
                                <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endforeach
@endif
<!-- Modal end -->
@endsection
@push ('styles')
<style>
    .pagination {
        display: inline-flex;
    }

    .filter_button {
        /* height:20px; */
        text-align: center;
        background: f40011;
        padding: 8px 16px;
        margin-top: 10px;
        color: white;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

{{-- <script>
    $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
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
							// document.location.href=document.location.href;
						});
                    }
                }
            })
        });
</script> --}}
<script>
    $(document).ready(function(){
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }

            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
</script>

@endpush
