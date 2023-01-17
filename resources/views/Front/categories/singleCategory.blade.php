@extends('layout.front.index')
@section('title')
{{ $category->category_name }}
@endsection
@section('content')
			<!-- HEADING-BANNER START -->
			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>{{ $category->category_name }}</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="{{ route('home') }}">Home</a></li>
										<li><a href="/categories">Categories</a></li>
										<li>{{ $category->category_name }}</li>
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
                            <div class="row">
                                <div class="col-lg-12">
                                <!-- Widget-Search start -->
                                <aside class="widget widget-search mb-30">
                                    <form action="#">
                                        <input id="search" type="text" placeholder="Search here..." />
                                        <button type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </form>
                                </aside>
                                <!-- Widget-search end -->
                                </div>
                            </div>
							<!-- Shop-Content End -->
							<div class="shop-content mt-tab-30 mb-30 mb-lg-0">

								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane" id="grid-view" style="display: block !important">
										<div class="row">
                                            @php
                                                $data = \Carbon\Carbon::today()->subDays(7)
                                            @endphp
                                            @foreach ($category->products as $product)
                                            <!-- Single-product start -->
                                            <div class="col-lg-4 col-md-6 category">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        {{-- <span class="pro-label new-label">new</span> --}}
                                                        {{-- @if($product->is_off == 1)
                                                        <span class="pro-label new-label">Sale {{ $product->off }}% Off</span>
                                                        @else
                                                        <span class=""></span>
                                                        @endif --}}
                                                        {{-- @if($product->created_at < $data)
                                                            <span class="pro-label new-label">New</span>
                                                            @else
                                                            <span class=""></span>
                                                        @endif --}}
                                                        {{-- @if($product->status != 1)
                                                            <span class="pro-label new-label">comming soon!</span>
                                                        @endif --}}
                                                        {{-- <span class="pro-price-2">$ {{ $product->price }}</span> --}}
                                                        <a href="{{ route('front.show',$product->product_slug) }}"><img src="{{ $product->cover }}" alt="" /></a>
                                                    </div>
                                                    <div class="product-info clearfix text-center">
                                                        <div class="fix">
                                                            <h4 class="post-title"><a href="{{ route('front.show',$product->product_slug) }}">{{ $product->product_name }}</a></h4>
                                                        </div>
                                                        <div class="product-action clearfix d-flex align-items-center justify-content-center">
                                                            <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a onclick="onCahnge('{{ $product->product_name }}', '{{ $product->cover }}', '{{ $product->description }}')" href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single-product end -->
                                            @endforeach
										</div>
									</div>
								</div>
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
