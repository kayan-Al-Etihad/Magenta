@extends('frontend.layouts.master')
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
                                <li class="active"><a href="{{ route('cart') }}">@lang('auth.cart')</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{ route('home') }}">@lang('auth.home')<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="{{ route('cart') }}">@lang('auth.cart')</a></li>
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
        @if (app()->getLocale() == "ar")
		<div class="container" dir="rtl">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th style="width: 33.3%">@lang('auth.product')</th>
								<th style="width: 33.3%">@lang('auth.name')</th>
								<th style="width: 33.3%" class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody id="cart_item_list">
							<form action="{{route('cart.update')}}" method="POST">
								@csrf
								@if(Helper::getAllProductFromCart())
									@foreach(Helper::getAllProductFromCart() as $key=>$cart)
										<tr>
											@php
											$cover=explode(',',$cart->product['cover']);
											@endphp
											<td class="image text-center" data-title="No"><img src="{{$cover[0]}}" alt="{{$cover[0]}}"></td>
											<td class="product-des text-center" data-title="Description">
												<p class="product-name"><a href="{{route('product-detail',$cart->product['slug'])}}" target="_blank">{{$cart->product['title_ar']}}</a></p>
												<p class="product-des">{!!($cart['summary']) !!}</p>
											</td>

											<td class="action text-center" data-title="Remove"><a href="{{route('cart-delete',$cart->id)}}"><i class="ti-trash remove-icon"></i></a></td>
										</tr>
									@endforeach
									<tr class="d-flex align-items-center">
										<td class="float-right" style="padding: 30px 5px">
											<button style="padding: 17px 40px;" class="btn float-right" type="submit">@lang('auth.update')</button>
										</td>
										<td class="float-right" style="width:400px">
											<div class="button5 d-flex align-items-center">
												<a href="{{route('checkout')}}" class="btn">@lang('auth.checkout')</a>
												<a style="margin-right: 35px" href="{{route('product-grids')}}" class="btn text-white">@lang('auth.continue_shopping')</a>
											</div>
										</td>
									</tr>
								@else
										<tr>
											<td class="text-center">
												There are no any carts available. <a href="{{route('product-grids')}}" style="color:blue;">@lang('auth.continue_shopping')</a>

											</td>
										</tr>
								@endif

							</form>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->

					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
        @else
        <div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th style="width: 33.3%">@lang('auth.product')</th>
								<th style="width: 33.3%">@lang('auth.name')</th>
								<th style="width: 33.3%" class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody id="cart_item_list">
							<form action="{{route('cart.update')}}" method="POST">
								@csrf
								@if(Helper::getAllProductFromCart())
									@foreach(Helper::getAllProductFromCart() as $key=>$cart)
										<tr>
											@php
											$cover=explode(',',$cart->product['cover']);
											@endphp
											<td class="image text-center" data-title="No"><img src="{{$cover[0]}}" alt="{{$cover[0]}}"></td>
											<td class="product-des text-center" data-title="Description">
												<p class="product-name"><a href="{{route('product-detail',$cart->product['slug'])}}" target="_blank">{{$cart->product['title']}}</a></p>
												<p class="product-des">{!!($cart['summary']) !!}</p>
											</td>

											<td class="action text-center" data-title="Remove"><a href="{{route('cart-delete',$cart->id)}}"><i class="ti-trash remove-icon"></i></a></td>
										</tr>
									@endforeach
									<tr class="d-flex align-items-center">
										<td class="float-right" style="padding: 30px 5px">
											<button style="padding: 17px 40px;" class="btn float-right" type="submit">@lang('auth.update')</button>
										</td>
										<td class="float-right" style="width:500px">
											<div class="button5 d-flex align-items-center">
												<a href="{{route('checkout')}}" class="btn">@lang('auth.checkout')</a>
												<a style="margin-left: 35px" href="{{route('product-grids')}}" class="btn text-white">@lang('auth.continue_shopping')</a>
											</div>
										</td>
									</tr>
								@else
										<tr>
											<td class="text-center">
												There are no any carts available. <a href="{{route('product-grids')}}" style="color:blue;">@lang('auth.continue_shopping')</a>

											</td>
										</tr>
								@endif

							</form>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
		</div>
        @endif
	</div>
	<!--/ End Shopping Cart -->




@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#f40011  !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') );
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0;
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush
