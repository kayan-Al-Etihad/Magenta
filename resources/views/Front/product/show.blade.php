@extends('layout.front.index')
@section('title')
   {{ $product->product_name }}
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
                    <div class="single-pro-slider single-big-photo view-lightbox slider-for">
                        <div>
                            {{-- <img src="{{ ($product->cover) }}" alt=""> --}}
                            {!! $product->model3d !!}
                            <a class="view-full-screen" href="{{ ($product->cover) }}"  data-lightbox="roadtrip" data-title="My caption">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                            
                        </div>
                    </div>
                    <!-- Single-pro-slider Big-photo end -->
                    <div class="product-info">
                        <div class="fix">
                            <h4 class="post-title floatleft">{{ $product->product_name }}</h4>
                            <span class="pro-rating floatright">
                                @for( $i = 0 ; $i < round($product->averageRating) ; $i++)
                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                @endfor
                                @for( $i = 5 ; $i > round($product->averageRating) ; $i--)
                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                @endfor
                            </span>
                        </div>
                        <div class="fix mb-20">
                            <span class="pro-price">$ {{ $product->price }}</span>
                        </div>
                        <div class="product-description">
                            <p>{{ $product->description }} </p>
                        </div>
                        <!-- color start -->
                        <div class="color-filter single-pro-color mb-20 clearfix">
                            @if ($product->colors->count())
                            <ul>
                                @foreach ($product->colors()->get(['color_code','color_name']) as $color)
                                <li><span class="color-title text-capitalize">color</span></li>
                                <li>
                                    <a href="#" class="active">
                                        <span class="color color-1" style="background: {{ $color->color_code }}"></span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <!-- color end -->
                        <!-- Size start -->
                        <div class="size-filter single-pro-size mb-35 clearfix">
                            @if ($product->has_size)
                            <ul>
                                <li><span class="color-title text-capitalize">size</span></li>
                                <li><a href="#">M</a></li>
                                <li><a class="active" href="#">S</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">SL</a></li>
                                <li><a href="#">XL</a></li>
                            </ul>
                            @endif
                        </div>
                        <!-- Size end -->
                        <div class="clearfix">
                            <div class="cart-plus-minus">
                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                            </div>
                            <div class="product-action clearfix d-flex align-items-center justify-content-center">
                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                            </div>
                        </div>
                        <!-- Single-pro-slider Small-photo start -->
                        <div class="single-pro-slider single-sml-photo slider-nav">
                            @foreach($product->photos as $photo)
                                <div>
                                    <img src="{{ ($photo->src ) }}" alt="" />
                                </div>
                            @endforeach
                        </div>
                        <!-- Single-pro-slider Small-photo end -->
                    </div>
                </div>
            </div>
            <!-- Single-product end -->
        </div>
        <!-- single-product-tab start -->
        <div class="single-pro-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="single-pro-tab-menu">
                        <!-- Nav tabs -->
                        <ul class="nav d-block">
                            <li><a href="#description" data-bs-toggle="tab">Description</a></li>
                            <li><a class="active" href="#reviews"  data-bs-toggle="tab">Reviews</a></li>
                            <li><a href="#information" data-bs-toggle="tab">Information</a></li>
                            <li><a href="#tags" data-bs-toggle="tab">Tags</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane" id="description">
                            <div class="pro-tab-info pro-description">
                                <h3 class="tab-title title-border mb-30">{{ $product->product_name }}</h3>
                                <p>{{ $product->description }}.</p>
                                </div>
                        </div>
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
                        <div class="tab-pane" id="information">
                            <div class="pro-tab-info pro-information">
                                <h3 class="tab-title title-border mb-30">Product information</h3>
                                <p>Made in : {{ $product->made_in }}.</p>
                                <p>
                                    @if ($product->has_size == 0)
                                    Size : There is no size for this product.
                                    @else
                                    Size : S , M , L , SL , XL
                                    @endif
                                </p>
                                <p>Weight : {{ $product->weight }}</p>
                             </div>
                        </div>
                        <div class="tab-pane" id="tags">
                            <div class="pro-tab-info pro-information">
                                <h3 class="tab-title title-border mb-30">tags</h3>
                                @foreach ($product->tags as $tag)
                                <p>{{ $tag->tag_name }}</p>
                                @endforeach
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
