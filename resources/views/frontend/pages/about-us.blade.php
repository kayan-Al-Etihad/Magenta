@extends('frontend.layouts.master')

@section('title','E-SHOP || About Us')

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
                                <li class="active"><a href="{{ route('about-us') }}">@lang('auth.about')</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{ route('home') }}">@lang('auth.home')<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="{{ route('about-us') }}">@lang('auth.about')</a></li>
                            </ul>
                        </div>
                    @endif
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- About Us -->
	<section class="about-us section">
			<div class="container">
				<div class="row">
                    @if (app()->getLocale() == "ar")
                        <div class="col-lg-6 col-12">
                            @php
                                $settings=DB::table('settings')->get();
                            @endphp
                            <div class="about-img overlay">
                                {{-- <div class="button">
                                    <a href="https://www.youtube.com/watch?v=nh2aYrGMrIE" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
                                </div> --}}
                                <img src="@foreach($settings as $data) {{$data->photo}} @endforeach" alt="@foreach($settings as $data) {{$data->photo}} @endforeach">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 text-right" dir="rtl">
                            <div class="about-content text-right" dir="rtl">
                                <style>
                                    h3::before{
                                        left: auto;
                                        right: 0;
                                    }
                                </style>
                                <h3>@lang('auth.about_title')</h3>
                                <p>@foreach($settings as $data) {{$data->description_ar}} @endforeach</p>
                                <div class="button">
                                    <a href="{{route('contact.home')}}" class="btn primary">@lang('auth.about_contsct')</a>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="col-lg-6 col-12">
						<div class="about-content">
							@php
								$settings=DB::table('settings')->get();
							@endphp
							<h3>@lang('auth.about_title')</h3>
							<p>@foreach($settings as $data) {{$data->description}} @endforeach</p>
							<div class="button">
								<a href="{{route('contact.home')}}" class="btn primary">@lang('auth.about_contact')</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="about-img overlay">
							{{-- <div class="button">
								<a href="https://www.youtube.com/watch?v=nh2aYrGMrIE" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
							</div> --}}
							<img src="@foreach($settings as $data) {{$data->photo}} @endforeach" alt="@foreach($settings as $data) {{$data->photo}} @endforeach">
						</div>
					</div>
                    @endif
				</div>
			</div>
	</section>
	<!-- End About Us -->


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
