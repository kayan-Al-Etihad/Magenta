
	<div class="container-fluid bg-white fixed-bottom p-3 app-navbar" style="box-shadow: 0 4px 8px 0 rgba(27, 23, 23, 0.9), 0 -6px 77px 0 rgba(27, 23, 23, 0.9);">
		<div class="row">
			<div class="col-lg-12">
				@if (app()->getLocale() == "ar")
					<ul class="list-main fixed-nav" style="display: flex;align-items:center;flex-wrap:nowrap;justify-content:space-around;gap:20px" dir="rtl">
						@php
							$settings=DB::table('settings')->get();
						@endphp
						<li class="{{Request::path()=='category-grids' ||Request::path()=='category-lists' ? 'active' : ''}}"><i class="bi bi-tags"></i><a href="{{route('front-categoriesGrid')}}">@lang('auth.category')</a></li>
						<li class="{{Request::path()=='about-us' ? 'active' : ''}}"><i class="bi bi-file-person"></i><a href="{{route('about-us')}}">@lang('auth.about')</a></li>
						<li style="border:none;" class="{{Request::path()=='/' ? 'active' : ''}}"><i class="bi bi-house"></i><a href="{{route('home')}}">@lang('auth.home')</a></li>
						<li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><i class="bi bi-collection"></i><a href="{{route('product-grids')}}">@lang('auth.products')</a></li>

						<li class="{{Request::path()=='contact' ? 'active' : ''}}"><i class="bi bi-person-rolodex"></i><a href="{{route('contact.home')}}">@lang('auth.contact')</a></li>
					</ul>
					@else
					<ul class="list-main fixed-nav" style="display: flex;align-items:center;flex-wrap:nowrap;justify-content:space-around;gap:20px" dir="rtl">
						@php
							$settings=DB::table('settings')->get();
						@endphp
						<li class="{{Request::path()=='category-grids' ||Request::path()=='category-lists' ? 'active' : ''}}"><i class="bi bi-tags"></i><a href="{{route('front-categoriesGrid')}}">@lang('auth.category')</a></li>
						<li class="{{Request::path()=='about-us' ? 'active' : ''}}"><i class="bi bi-file-person"></i><a href="{{route('about-us')}}">@lang('auth.about')</a></li>
						<li style="border:none;" class="{{Request::path()=='/' ? 'active' : ''}}"><i class="bi bi-house"></i><a href="{{route('home')}}">@lang('auth.home')</a></li>
						<li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><i class="bi bi-collection"></i><a href="{{route('product-grids')}}">@lang('auth.products')</a></li>

						<li class="{{Request::path()=='contact' ? 'active' : ''}}"><i class="bi bi-person-rolodex"></i><a href="{{route('contact.home')}}">@lang('auth.contact')</a></li>
					</ul>
				@endif
			</div>
		</div>
	</div>
	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
                @if (app()->getLocale() == "ar")
				<div class="row" dir="rtl">
					<div class="col-lg-4 text-right About">
						<!-- Single Widget -->
							@php
                            $settings=DB::table('settings')->get();
                        @endphp
						<div class="single-footer about p-0 m-0">
							<div class="logo">
								<a href="{{ route('home') }}"><img width="100" height="100" style="height: 45px !important;display:flex !important;width:fit-content" src="@foreach($settings as $data) {{$data->logo}}@endforeach" alt="#"></a>
							</div>
							<p class="text">@foreach($settings as $data) {{$data->short_des_ar}} @endforeach</p>
							<p class="call">@lang('auth.qot_question')<span><a href="tel:123456789">@foreach($settings as $data) {{$data->phone}} @endforeach</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-4 text-right">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>@lang('auth.information')</h4>
							<ul>
								<li><a href="{{route('home')}}">@lang('auth.home')</a></li>
								<li><a href="{{route('about-us')}}">@lang('auth.about')</a></li>
								<li><a href="{{route('product-grids')}}">@lang('auth.product')</a></li>
								<li><a href="{{route('contact.home')}}">@lang('auth.contact')</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-4 text-right">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>@lang('auth.get_in_touch')</h4>
							<!-- Single Widget -->
							<div class="contact p-0 m-0">
								<ul>
									<li class="p-0 m-0">@foreach($settings as $data) {{$data->address_ar}} @endforeach</li>
									<li class="p-0 m-0">@foreach($settings as $data) {{$data->email}} @endforeach</li>
									<li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<div class="sharethis-inline-follow-buttons text-right"></div>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
                @else
                <div class="row justify-content-center">
					<div class="col-lg-4 col-md-6 col-12 About">
						<!-- Single Widget -->
							@php
                            $settings=DB::table('settings')->get();
                        @endphp
						<div class="single-footer about">
							<div class="logo">
								<a href="{{ route('home') }}"><img width="100" height="100" style="height: 45px !important;display:flex !important;width:fit-content" src="@foreach($settings as $data) {{$data->logo}}@endforeach" alt="#"></a>
							</div>
							<p class="text">@foreach($settings as $data) {{$data->short_des}} @endforeach</p>
							<p class="call">@lang('auth.qot_question')<span><a href="tel:123456789">@foreach($settings as $data) {{$data->phone}} @endforeach</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>@lang('auth.information')</h4>
							<ul>
								<li><a href="{{route('home')}}">@lang('auth.home')</a></li>
								<li><a href="{{route('about-us')}}">@lang('auth.about')</a></li>
								<li><a href="{{route('product-grids')}}">@lang('auth.product')</a></li>
								<li><a href="{{route('contact.home')}}">@lang('auth.contact')</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>@lang('auth.get_in_touch')</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
									<li>@foreach($settings as $data) {{$data->email}} @endforeach</li>
									<li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<div class="sharethis-inline-follow-buttons"></div>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
                @endif
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-12 col-12">
                            @if (app()->getLocale() == "ar")
							<div class="centr text-center" dir="rtl">
                                <p>@lang('auth.copyright') © {{date('Y')}} <a href='https://kayanaletihad.com/' target='_blank'>@lang('auth.company_name')</a>  -  @lang('auth.right')</p>
                            </div>
                            @else
							<div class="centr text-center">
                                <p>@lang('auth.copyright') © {{date('Y')}} <a href='https://kayanaletihad.com/' target='_blank'>@lang('auth.company_name')</a>  -  @lang('auth.right')</p>
                            </div>
                            @endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->

	<!-- Jquery -->
	
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	<script src="{{asset('frontend/js/colors.js')}}"></script>
	<!-- Slicknav JS -->
	<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{asset('frontend/js/nicesellect.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{asset('frontend/js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{asset('frontend/js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{asset('frontend/js/onepage-nav.min.js')}}"></script>
	{{-- Isotope --}}
	<script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{asset('frontend/js/easing.js')}}"></script>

	<!-- Active JS -->
	<script src="{{asset('frontend/js/active.js')}}"></script>




	@stack('scripts')
	<script>
		setTimeout(function(){
		  $('.alert').slideUp();
		},5000);
		$(function() {
		// ------------------------------------------------------- //
		// Multi Level dropdowns
		// ------------------------------------------------------ //
			$("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
				event.preventDefault();
				event.stopPropagation();

				$(this).siblings().toggleClass("show");


				if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
				}
				$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
				});

			});
		});
	  </script>

	  <script>
		(function($) {

		/*
			Responsive Flat Menu
			http://cssmenumaker.com/menu/responsive-flat-menu
		*/

		$.fn.menumaker = function(options) {

		var cssmenu = $(this),
			settings = $.extend({
			title: `<a style="margin-right: auto" href="{{route('home')}}"><img style="height: 45px;" src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"></a>`,
			format: "dropdown",
			sticky: false
			}, options);

		return this.each(function() {
			cssmenu.prepend('<div id="menu-button">' + settings.title + '<i class="bi bi-justify"></i>' + '</div>');
			$(this).find("#menu-button").on('click', function() {
			$(this).toggleClass('menu-opened');
			var mainmenu = $(this).next('ul');
			if (mainmenu.hasClass('Open')) {
				mainmenu.hide().removeClass('Open');
			} else {
				mainmenu.show().addClass('Open');
				if (settings.format === "dropdown") {
				mainmenu.find('ul').show();
				}
			}
			});

			cssmenu.find('li ul').parent().addClass('has-sub');

			multiTg = function() {
			cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
			cssmenu.find('.submenu-button').on('click', function() {
				$(this).toggleClass('submenu-opened');
				if ($(this).siblings('ul').hasClass('Open')) {
				$(this).siblings('ul').removeClass('Open').hide();
				} else {
				$(this).siblings('ul').addClass('Open').show();
				}
			});
			};

			if (settings.format === 'multitoggle') multiTg();
			else cssmenu.addClass('dropdown');

			if (settings.sticky === true) cssmenu.css('position', 'fixed');

			resizeFix = function() {
			if ($(window).width() > 768) {
				cssmenu.find('ul').show();
			}

			if ($(window).width() <= 768) {
				cssmenu.find('ul').hide().removeClass('Open');
			}
			};
			resizeFix();
			return $(window).on('resize', resizeFix);

		});
		};
		})(jQuery);

		/*
		By Osvaldas Valutis, www.osvaldas.info
		Available for use under the MIT License
		*/

		;
		(function($, window, document, undefined) {
		$.fn.doubleTapToGo = function(params) {
		if (!('ontouchstart' in window) &&
			!navigator.msMaxTouchPoints &&
			!navigator.userAgent.toLowerCase().match(/windows phone os 7/i)) return false;

		this.each(function() {
			var curItem = false;

			$(this).on('click', function(e) {
			var item = $(this);
			if (item[0] != curItem[0]) {
				e.preventDefault();
				curItem = item;
			}
			});

			$(document).on('click touchstart MSPointerDown', function(e) {
			var resetItem = true,
				parents = $(e.target).parents();

			for (var i = 0; i < parents.length; i++)
				if (parents[i] == curItem[0])
				resetItem = false;

			if (resetItem)
				curItem = false;
			});
		});
		return this;
		};
		})(jQuery, window, document);

		/**
		* doubleTapToGoDecorator
		* Adds the ability to remove the need for a second tap
		* when in the mobile view
		*
		* @param {function} f - doubleTapToGo
		*/
		function doubleTapToGoDecorator(f) {
		return function() {

		this.each(function() {
			$(this).on('click', function(e) {

			// If mobile menu view
			if ($('#menu-button').css('display') == 'block') {

				// If this is not a submenu button
				if (!$(e.target).hasClass('submenu-button')) {

				// Remove the need for a second tap
				window.location.href = $(e.target).attr('href');
				}
			}

			});
		});

		return f.apply(this);
		}
		}

		// Add decorator to the doubleTapToGo plugin
		jQuery.fn.doubleTapToGo = doubleTapToGoDecorator(jQuery.fn.doubleTapToGo);

		/**
		* jQuery
		*/
		(function($) {
		$(document).ready(function() {

		$("#cssmenu").menumaker({
			title: `<a style="margin-right: auto" href="{{route('home')}}"><img style="height: 45px;" src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"></a>`,
			format: "multitoggle"
		});

		$('#cssmenu li:has(ul)').doubleTapToGo();

		});
		})(jQuery);
	  </script>
