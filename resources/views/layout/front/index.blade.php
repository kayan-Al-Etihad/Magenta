<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>@yield('title')</title>
		<meta name="description" content="Hurst – Furniture Store eCommerce HTML Template is a clean and elegant design – suitable for selling flower, cookery, accessories, fashion, high fashion, accessories, digital, kids, watches, jewelries, shoes, kids, furniture, sports….. It has a fully responsive width adjusts automatically to any screen size or resolution.">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="generator" content="Geany 1.37.1" />

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('front-end-assets/img/favicon.ico') }}">
		<!-- Place favicon.ico in the root directory -->

		<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
		<link rel="stylesheet" href="{{ asset('front-end-assets/css/bootstrap.min.css') }}">
		<!-- animate css -->
        <link rel="stylesheet" href="{{ asset('front-end-assets/css/animate.min.css') }}">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="{{ asset('front-end-assets/css/jquery-ui.min.css') }}">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="{{ asset('front-end-assets/css/meanmenu.min.css') }}">
		<!-- nivo-slider css -->
        <link rel="stylesheet" href="{{ asset('front-end-assets/lib/css/nivo-slider.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end-assets/lib/css/preview.css') }}">
		<!-- slick css -->
        <link rel="stylesheet" href="{{ asset('front-end-assets/css/slick.min.css') }}">
		<!-- lightbox css -->
        <link rel="stylesheet" href="{{ asset('front-end-assets/css/lightbox.min.css') }}">
		<!-- material-design-iconic-font css -->
        <link rel="stylesheet" href="{{ asset('front-end-assets/css/material-design-iconic-font.css') }}">
		<!-- All common css of theme -->
        <link rel="stylesheet" href="{{ asset('front-end-assets/css/default.css') }}">
		<!-- style css -->
		<link rel="stylesheet" href="asset{{ asset('front-end-assets/style.min.css') }}">
        <!-- shortcode css -->
        <link rel="stylesheet" href="{{ asset('front-end-assets/css/shortcode.css') }}">
		<!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('front-end-assets/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end-assets/style.min.css') }}">
		<!-- modernizr css -->
		<script src="{{ asset('front-end-assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>


		{{-- 3dmodel --}}
			<script src="https://unpkg.com/@webcomponents/webcomponentsjs@2.1.3/webcomponents-loader.js"></script>
		{{--  --}}

        @yield('extra-css')
	</head>
	<body>
		<!-- WRAPPER START -->
		<div class="wrapper bg-dark-white">

			<!-- HEADER-AREA START -->
			<header id="sticky-menu" class="header header-2">
				<div class="header-area">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-4 offset-md-4 col-7">
								<div class="logo text-md-center">
									@foreach ($setting as $setting)
                                    <a href="{{ route('home') }}"><img src="{{ asset('front-end-assets/img/logo') }}/{{ $setting->site_logo }}" alt="" /></a>
                                    @endforeach
								</div>
							</div>
							<div class="col-md-4 col-5">
								<div class="mini-cart text-end">
									<ul>
										<li>
											<a class="cart-icon" href="/favourite">
												<i class="zmdi zmdi-favorite-outline"></i>
												<span>3</span>
											</a>
										</li>
                                        @guest
                                        <li>
                                            <a class="nav-link font-weight-bold cart-icon" href="{{ route('login') }}"><i class="zmdi zmdi-sign-in"></i> Login</a>
										</li>
                                        @else
                                        <li class="nav-item">
                                          <a class="nav-link font-weight-bold"
                                          onclick="event.preventDefault();document.getElementById('Logout').submit()" href="{{ route('logout') }}">{{ Auth::user()->name }}</a>

                                          <form class=" d-none" id="Logout" action="{{ route('logout') }}" method="POST">
                                          @csrf
                                          </form>
                                        </li>
                                      @endguest
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- MAIN-MENU START -->
				<div class="menu-toggle menu-toggle-2 hamburger hamburger--emphatic d-none d-md-block">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
				<div class="main-menu  d-none d-md-block">
					<nav>
						<ul>
							<li><a href="{{ route('home') }}">home</a>
							</li>
							<li><a href="/about">about us</a></li>
							<li><a href="{{ route('front.productsList') }}">products</a>
							</li>
							<li><a href="/categories">Categories</a>
								<div class="mega-menu menu-scroll">
									<div class="table">
										<div class="table-cell">
											<div class="half-width">
												<ul>
													<li class="menu-title">Categories</li>
													@foreach ($categories as $category)
                                                    <li>
                                                        <a href="{{ route('front.showCategory',$category->category_slug) }}">{{ $category->category_name }}</a>
                                                    </li>
                                                    @endforeach
												</ul>
											</div>
											<div class="full-width">
												<div class="mega-menu-img">
													<a href="single-product.html"><img src="{{ asset('front-end-assets/img/megamenu/1 - Copy.jpg') }}" alt="" /></a>
												</div>
											</div>
											<div class="pb-80"></div>
										</div>
									</div>
								</div>
							</li>
							<li><a href="/brands">Brands</a></li>
							<li><a href="/feedback">feedback</a></li>
							<li><a href="/contact">contact us</a></li>
						</ul>
					</nav>
				</div>
				<!-- MAIN-MENU END -->
			</header>
			<!-- HEADER-AREA END -->
			<!-- Mobile-menu start -->
			<div class="mobile-menu-area">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 d-block d-md-none">
							<div class="mobile-menu">
								<nav id="dropdown">
									<ul>
										<li><a href="index.html">home</a>
											<ul>
												<li><a href="index.html">Home Version 1</a></li>
												<li><a href="index-2.html">Home Version 2</a></li>
											</ul>
										</li>
										<li><a href="shop.html">products</a></li>
										<li><a href="shop-sidebar.html">accesories</a></li>
										<li><a href="shop-list.html">lookbook</a></li>
										<li><a href="blog.html">blog</a></li>
										<li><a href="#">pages</a>
											<ul>
												<li><a href="shop.html">Shop</a></li>
												<li><a href="shop-sidebar.html">Shop Sidebar</a></li>
												<li><a href="shop-list.html">Shop List</a></li>
												<li><a href="single-product.html">Single Product</a></li>
												<li><a href="single-product-sidebar.html">Single Product Sidebar</a></li>
												<li><a href="cart.html">Shopping Cart</a></li>
												<li><a href="wishlist.html">Wishlist</a></li>
												<li><a href="checkout.html">Checkout</a></li>
												<li><a href="order.html">Order</a></li>
												<li><a href="login.html">login / Registration</a></li>
												<li><a href="my-account.html">My Account</a></li>
												<li><a href="404.html">404</a></li>
												<li><a href="blog.html">Blog</a></li>
												<li><a href="single-blog.html">Single Blog</a></li>
												<li><a href="single-blog-sidebar.html">Single Blog Sidebar</a></li>
												<li><a href="about.html">About Us</a></li>
												<li><a href="contact.html">Contact</a></li>
											</ul>
										</li>
										<li><a href="about.html">about us</a></li>
										<li><a href="contact.html">contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile-menu end -->

            @yield('content')

			<!-- BRAND-LOGO-AREA END -->
			<!-- FOOTER START -->
            <footer>
				<!-- Footer-area start -->
				<div class="footer-area footer-2">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="single-footer">
									<h3 class="footer-title  title-border">Contact Us</h3>
									<ul class="footer-contact">
										<li><span>Address :</span>{{ $setting->site_address }}</li>
										<li><span>Cell-Phone :</span>{{ $setting->site_phone }}</li>
										<li><span>Email :</span>{{ $setting->site_email }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="single-footer">
									<h3 class="footer-title  title-border">Social Media</h3>
									<ul class="footer-contact">
										<li>
                                            <a href="#" class="fs-6">
                                                <i class="zmdi zmdi-facebook" style="margin-right: 11px"></i> : facebook
                                            </a>
                                        </li>
										<li>
                                            <a href="#" class="fs-6">
                                                <i class="zmdi zmdi-instagram" style="margin-right: 5px"></i> : instagram
                                            </a>
                                        </li>
										<li>
                                            <a href="#" class="fs-6">
                                                <i class="zmdi zmdi-twitter" style="margin-right: 5px"></i> : twitter
                                            </a>
                                        </li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="single-footer newsletter-item">
									<h3 class="footer-title  title-border">Email Newsletters</h3>
									<div class="footer-subscribe">
										<form action="#">
											<input type="text" name="name" placeholder="Your Name..." />
											<input type="text" name="email" placeholder="Email Address..." />
											<input type="text" name="phone" placeholder="Your Phone..." />
											<button class="button-one submit-btn-4" type="submit" data-text="Subscribe">Subscribe</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Footer-area end -->
				<!-- Copyright-area start -->
				<div class="copyright-area copyright-2">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="copyright text-center">
									<p class="mb-0">&copy; <a href="https://themeforest.net/user/codecarnival/portfolio" target="_blank">CodeCarnival </a> 2022. All Rights Reserved.</p>
								</div>
							</div>
							{{-- <div class="col-md-6">
								<div class="payment  text-md-end">
									<a href="#"><img src="{{ asset('front-end-assets/img/payment/1.png') }}" alt="" /></a>
									<a href="#"><img src="{{ asset('front-end-assets/img/payment/2.png') }}" alt="" /></a>
									<a href="#"><img src="{{ asset('front-end-assets/img/payment/3.png') }}" alt="" /></a>
									<a href="#"><img src="{{ asset('front-end-assets/img/payment/4.png') }}" alt="" /></a>
								</div>
							</div> --}}
						</div>
					</div>
				</div>
				<!-- Copyright-area start -->
			</footer>
			<!-- FOOTER END -->
			<!-- QUICKVIEW PRODUCT -->
			<div id="quickview-wrapper d-none">
			   <!-- Modal -->
               <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img id="qv-img" alt="#" src="">
                                    </div>
                                </div><!-- .product-images -->

                                <div class="product-info">
                                    <h1>Aenean eu tristique</h1>
                                    {{-- <div class="price-box-3">
                                        <hr />
                                        <div class="s-price-box">
                                            <span class="new-price">$160.00</span>
                                            <span class="old-price">$190.00</span>
                                        </div>
                                        <hr />
                                    </div>
                                    <a href="shop.html" class="see-all">See all features</a> --}}
                                    {{-- <div class="quick-add-to-cart">
                                        <form method="post" class="cart">
                                            <div class="numbers-row">
                                                <input type="number" id="french-hens" value="3" min="1">
                                            </div>
                                            <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                        </form>
                                    </div> --}}
                                    <div class="quick-desc">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                                    </div>
                                    <div class="social-sharing">
                                        <div class="widget widget_socialsharing_widget">
                                            <h3 class="widget-title-modal">Share this product</h3>
                                            <ul class="social-icons">
                                                <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="zmdi zmdi-google-plus"></i></a></li>
                                                <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="zmdi zmdi-twitter"></i></a></li>
                                                <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="zmdi zmdi-facebook"></i></a></li>
                                                <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .product-info -->
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
           </div>
			   <!-- END Modal -->
			</div>
			<!-- END QUICKVIEW PRODUCT -->

		</div>
		<!-- WRAPPER END -->

		<!-- all js here -->
		<!-- jquery latest version -->
		<script src="{{ asset('front-end-assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
		<script src="{{ asset('front-end-assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
		<!-- bootstrap js -->
		<script src="{{ asset('front-end-assets/js/bootstrap.bundle.min.js') }}"></script>
		<!-- jquery.meanmenu js -->
		<script src="{{ asset('front-end-assets/js/jquery.meanmenu.js') }}"></script>
		<!-- slick.min js -->
		<script src="{{ asset('front-end-assets/js/slick.min.js') }}"></script>
		<!-- jquery.treeview js -->
		<script src="{{ asset('front-end-assets/js/jquery.treeview.js') }}"></script>
		<!-- lightbox.min js -->
		<script src="{{ asset('front-end-assets/js/lightbox.min.js') }}"></script>
		<!-- jquery-ui js -->
		<script src="{{ asset('front-end-assets/js/jquery-ui.min.js') }}"></script>
		<!-- jquery.nivo.slider js -->
        <script src="{{ asset('front-end-assets/lib/js/jquery.nivo.slider.js') }}"></script>
        <script src="{{ asset('front-end-assets/lib/home.js') }}"></script>
		<!-- jquery.nicescroll.min js -->
		<script src="{{ asset('front-end-assets/js/jquery.nicescroll.min.js') }}"></script>
		<!-- countdon.min js -->
		<script src="{{ asset('front-end-assets/js/countdon.min.js') }}"></script>
		<!-- wow js -->
		<script src="{{ asset('front-end-assets/js/wow.min.js') }}"></script>
		<!-- plugins js -->
		<script src="{{ asset('front-end-assets/js/plugins.js') }}"></script>
		<!-- main js -->
		<script src="{{ asset('front-end-assets/js/main.min.js') }}"></script>

        <script>
            function onCahnge(name, image, description) {
               console.log(name);
               console.log(image);
               const model = document.getElementById('productModal');
               const modelName = model.querySelector(".product-info h1");
               console.log(modelName);
               const modelDescription = model.querySelector(".quick-desc");
               console.log(modelDescription.textContent);
               modelDescription.textContent = description;
               modelName.textContent = name;
               const qvImage = document.getElementById("qv-img");
            //    console.log(lastFive);
               function subStr(string, character, position) {
                if(position=='b')
                return string.substring(string.indexOf(character) + 1);
                else if(position=='a')
                return string.substring(0, string.indexOf(character));
                else
                return string;
            }
            $path = subStr(image, 's','b');
            qvImage.src = 'images/'+$path;
            console.log(subStr('Tutorix & Tutorialspoint','&','a'));
            console.log("</br>");
            console.log(subStr(image, 's','b'));
            }

       </script>
	</body>
</html>
