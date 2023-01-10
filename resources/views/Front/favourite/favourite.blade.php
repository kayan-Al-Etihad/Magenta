@extends('layout.front.index')
@section('title')@section('title')
   Favourite
@endsection
@section('content')
<!-- HEADING-BANNER START -->
<div class="heading-banner-area overlay-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>Favourite</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Favourite</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->
<!-- WISHLIST-AREA START -->
<div class="shopping-cart-area pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shopping-cart">
                    <div class="tab-content">
                        <!-- shopping-cart start -->
                        <!-- wishlist start -->
                        <div class="tab-pane active" id="wishlist">
                            <form action="#">
                                <div class="shop-cart-table">
                                    <div class="table-content table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-price">Product</th>
                                                    <th class="product-stock">stock status</th>
                                                    <th class="product-remove">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="product-thumbnail  text-left">
                                                        <!-- Single-product start -->
                                                        <div class="single-product">
                                                            <div class="product-img">
                                                                <a href="single-product.html"><img src="{{ asset('front-end-assets/img/product/2.jpg') }}" alt="" /></a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
                                                            </div>
                                                        </div>
                                                        <!-- Single-product end -->
                                                    </td>
                                                    <td class="product-stock">in stock</td>
                                                    <td class="product-remove">
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="product-thumbnail  text-left">
                                                        <!-- Single-product start -->
                                                        <div class="single-product">
                                                            <div class="product-img">
                                                                <a href="single-product.html"><img src="{{ asset('front-end-assets/img/product/12.jpg') }}" alt="" /></a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
                                                            </div>
                                                        </div>
                                                        <!-- Single-product end -->
                                                    </td>
                                                    <td class="product-stock">in stock</td>
                                                    <td class="product-remove">
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="product-thumbnail  text-left">
                                                        <!-- Single-product start -->
                                                        <div class="single-product">
                                                            <div class="product-img">
                                                                <a href="single-product.html"><img src="{{ asset('front-end-assets/img/product/2.jpg') }}" alt="" /></a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
                                                            </div>
                                                        </div>
                                                        <!-- Single-product end -->
                                                    </td>
                                                    <td class="product-stock">in stock</td>
                                                    <td class="product-remove">
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- wishlist end -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- WISHLIST-AREA END -->
@endsection
