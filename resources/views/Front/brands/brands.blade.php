@extends('layout.front.index')
@section('title')@section('title')
   Brands
@endsection

@section('content')

			<!-- HEADING-BANNER START -->
			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>Brands</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="{{ route('home') }}">Home</a></li>
										<li>Brands</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- HEADING-BANNER END -->
			<!-- PRODUCT-AREA START -->
			<div class="product-area pt-80 pb-80 product-style-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 order-1">
							<!-- Shop-Content End -->
							<div class="shop-content mt-tab-30 mb-30 mb-lg-0">
								<div class="row">
                                    <div class="col-md-6">
                                        <div class="product-option mb-30 clearfix">
                                            <!-- Nav tabs -->
                                            <ul class="nav d-block shop-tab">
                                                <li><a href="#grid-view" data-bs-toggle="tab"><i class="zmdi zmdi-view-module"></i></a></li>
                                                <li><a class="active" href="#list-view"  data-bs-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <aside class="widget widget-search mb-30">
                                            <form action="#">
                                                <input id="search" type="text" placeholder="Search here..." />
                                                <button type="submit">
                                                    <i class="zmdi zmdi-search"></i>
                                                </button>
                                            </form>
                                        </aside>
                                    </div>
                                </div>
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane" id="grid-view">
										<div class="row">
											@foreach ($brands as $brand)
                                            <!-- Single-product start -->
                                            <div class="col-lg-4 col-md-6 category">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('front.showBrand',$brand->brand_slug) }}"><img src="{{ $brand->src }}" alt="" /></a>
                                                    </div>
                                                    <div class="product-info clearfix text-center">
                                                        <div class="fix">
                                                            <h4 class="post-title"><a href="{{ route('front.showBrand',$brand->brand_slug) }}">{{ $brand->brand_name }}</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single-product end -->
                                            @endforeach
                                            <div class="bg-white p-2 d-flex align-items-center justify-content-center">
                                                <ul class="pagination">
                                                    {{ $brands->links() }}
                                                </ul>
                                            </div>
										</div>
									</div>
									<div class="tab-pane active" id="list-view">
										<div class="row shop-list">
                                            @foreach ($brands as $brand)
											<!-- Single-product start -->
											<div class="col-lg-12 category">
												<div class="single-product clearfix">
													<div class="product-img">
														<a href="{{ route('front.showBrand',$brand->brand_slug) }}"><img src="{{ $brand->src }}" alt="" /></a>
													</div>
													<div class="product-info">
														<div class="fix">
															<h4 class="post-title floatleft"><a href="{{ route('front.showBrand',$brand->brand_slug) }}">{{ $brand->brand_name }}</a></h4>
														</div>
														<div class="fix mb-20">
														</div>
														<div class="product-description">
															<p>{{ $brand->brand_description }}.</p>
														</div>
													</div>
												</div>
											</div>
											<!-- Single-product end -->
                                            @endforeach
                                            <div class="bg-white p-2 d-flex align-items-center justify-content-center">
                                                <ul class="pagination">
                                                    {{ $brands->links() }}
                                                </ul>
                                            </div>
										</div>
									</div>
								</div>
								<!-- Pagination start -->
								{{-- <div class="shop-pagination  text-center">
									<div class="pagination">
										<ul>
											<li><a href="#"><i class="zmdi zmdi-long-arrow-left"></i></a></li>
											<li><a href="#">01</a></li>
											<li><a class="active" href="#">02</a></li>
											<li><a href="#">03</a></li>
											<li><a href="#">04</a></li>
											<li><a href="#">05</a></li>
											<li><a href="#"><i class="zmdi zmdi-long-arrow-right"></i></a></li>
										</ul>
									</div>
								</div> --}}
								<!-- Pagination end -->
							</div>
							<!-- Shop-Content End -->
						</div>
					</div>
				</div>
			</div>
			<!-- PRODUCT-AREA END -->
            <script type="text/javascript">
                const search = document.getElementById('search');
                search.addEventListener("input", (e)=>{
                    e.preventDefault();
                    const val = e.target.value.toLowerCase();
                    console.log(val);
                    const categories = document.querySelectorAll(".category");
                    // console.log(categories);
                    categories.forEach(category => {
                        const dot = category.querySelector('.post-title').textContent;
                        console.log(dot);
                        if(dot.toLowerCase().includes(val)){
                            category.style.display = "block";
                        }else{
                            category.style.display = "none";
                        }
                    });
                })
            </script>
@endsection
