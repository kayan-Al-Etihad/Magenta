@extends('layout.front.index')
@section('title')
   {{ $product->product_name }}
@endsection
@section('extra-css')
<style>
    .slick-slider .slick-track{
        display: flex !important;
        flex-direction: column !important;
    }
    .single-sml-photo .slick-list{
        /* display: flex !important;
        align-items: center !important;
        justify-content: center !important; */
        height: 700px;
    }
    .single-pro-slider.single-big-photo.view-lightbox.slider-for.slick-initialized.slick-slider{
        width: 100% !important;
        height: 605px !important;
    }
    .single-pro-slider.single-big-photo.view-lightbox.slider-for.slick-initialized.slick-slider img{
        width: 100% !important;
        height: 605px !important;
    }
    .col-lg-2 .slick-slide{
        width: 100px !important;
    }
</style>
@endsection
@section('content')
<!-- HEADING-BANNER START -->
<div class="heading-banner-area overlay-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>{{ $product->product_name }}</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="/products">Product</a></li>
                            <li>{{ $product->product_name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->
<!-- PRODUCT-AREA START -->
<div class="product-area single-pro-area pt-80 pb-80 product-style-2">
    <div class="container">
        <div class="row shop-list single-pro-info no-sidebar">
            <!-- Single-product start -->
            <div class="col-lg-12">
                <div class="single-product clearfix">
                    <!-- Single-pro-slider Big-photo start -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="single-pro-slider single-big-photo view-lightbox slider-for">
                                        <div>
                                            @if (is_null($product->model3d))
                                            <img width="100%" src="{{ ($product->cover) }}" alt="" class="border rounded">
                                            @else
                                            {!! $product->model3d !!}
                                            @endif
                                            <a class="view-full-screen" href="{{ ($product->cover) }}"  data-lightbox="roadtrip" data-title="My caption">
                                                <i class="zmdi zmdi-zoom-in"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <!-- Single-pro-slider Small-photo start -->
                                    <div class="single-pro-slider single-sml-photo slider-nav" style="margin-top: 0 !important;height:700px">
                                            <div style="margin-top: 10px">
                                                <img src="{{ ($product->cover) }}" alt="" />
                                            </div>
                                            <div style="margin-top: 10px">
                                                <img src="{{ asset('images') }}/{{ ($product->image1) }}" alt="" />
                                            </div>
                                            <div style="margin-top: 10px">
                                                <img src="{{ asset('images') }}/{{ ($product->image2) }}" alt="" />
                                            </div>
                                    </div>
                                    <!-- Single-pro-slider Small-photo end -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Single-product end -->
        </div>
        <div class="row shop-list single-pro-info no-sidebar">
            <!-- Single-product start -->
            <div class="col-lg-12">
                <div class="single-product clearfix">
                    <!-- Single-pro-slider Big-photo start -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Single-pro-slider Big-photo end -->
                            <div class="product-info">
                                <div class="product-description">
                                    <p>{{ $product->description }} </p>
                                </div>
                                <div class="clearfix">
                                    <div class="product-action clearfix d-flex align-items-center justify-content-center">
                                        <a href="wishlist.html">Order</a>
                                    </div>
                                    <div class="product-action clearfix d-flex align-items-center justify-content-center">
                                        <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Single-product end -->
        </div>
        <!-- single-product-tab start -->
        <div class="single-pro-tab">
            <div class="row">
                <div class="col-md-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="reviews">
                            <div class="pro-tab-info pro-reviews">
                                <div class="customer-review mb-60">
                                    <h3 class="tab-title title-border mb-30">Customer review</h3>
                                    <ul class="product-comments clearfix d-flex flex-column">
                                        @foreach ($product->comments as $comment)
                                        <li class="mb-30 border-bottom">
                                            <div class="pro-reviewer-comment m-0 p-0">
                                                <div class="fix">
                                                    <div class="floatleft mbl-center">
                                                        <h5 class="text-uppercase mb-0"><strong>{{ $comment->guest_name }}</strong></h5>
                                                        <p class="reply-date">{{ $comment->created_at->diffForHumans() }}</p>
                                                    </div>
                                                    <div class="comment-reply floatright">
                                                        <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </div>
                                                </div>
                                                <p class="mb-0">{{ $comment->comment }}.</p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="leave-review">
                                    <h3 class="tab-title title-border mb-30">Leave your reviw</h3>
                                    <div class="your-rating mb-30">
                                        <p class="mb-10"><strong>Your Rating</strong></p>
                                        <span>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </span>
                                        <span class="separator">|</span>
                                        <span>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </span>
                                        <span class="separator">|</span>
                                        <span>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </span>
                                        <span class="separator">|</span>
                                        <span>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </span>
                                        <span class="separator">|</span>
                                        <span>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </span>
                                    </div>
                                    <div class="reply-box">
                                        <form action="#" method="POST">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Your name here..." name="name" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Subject..." name="name" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="custom-textarea" name="message" placeholder="Your review here..." ></textarea>
                                                    <button type="submit" data-text="submit review" class="button-one submit-button mt-20">submit review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single-product-tab end -->
    </div>
</div>
<!-- PRODUCT-AREA END -->
@endsection
@extends('layout.front.index')
@section('title')
   {{ $product->product_name }}
@endsection

@section('content')
