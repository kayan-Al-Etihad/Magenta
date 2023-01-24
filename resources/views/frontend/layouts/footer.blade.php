
	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
                @if (app()->getLocale() == "ar")
				<div class="row text-right" dir="rtl">
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Widget -->
							@php
                            $settings=DB::table('settings')->get();
                        @endphp
						<div class="single-footer about text-right p-0 m-0">
							<div class="logo">
								<a href="index.html"><img width="100" height="100" src="@foreach($settings as $data) {{$data->logo}}@endforeach" alt="#"></a>
							</div>
							<p class="text">@foreach($settings as $data) {{$data->short_des_ar}} @endforeach</p>
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
                <div class="row">
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Widget -->
							@php
                            $settings=DB::table('settings')->get();
                        @endphp
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img width="100" height="100" src="@foreach($settings as $data) {{$data->logo}}@endforeach" alt="#"></a>
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
