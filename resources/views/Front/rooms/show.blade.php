@extends('layout.front.index')
@section('title')
{{-- @php
 dd($roomsType->)   
@endphp --}}
{{ $roomsType->name }}
@endsection
@section('content')
			<!-- HEADING-BANNER START -->
			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>{{ $roomsType->name }}</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="{{ route('home') }}">Home</a></li>
										<li><a href="/categories">Categories</a></li>
										<li>{{ $roomsType->name }}</li>
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
                                </div>
                            </div>
							<div class="shop-content mt-tab-30 mb-30 mb-lg-0">
								<div class="tab-content">
									<div class="tab-pane" id="grid-view" style="display: block !important">
										<div class="row">
                                            @php
                                                $data = \Carbon\Carbon::today()->subDays(7)
                                            @endphp
                                            @foreach ($rooms as $product)
                                            <!-- Single-product start -->
                                            <div class="col-lg-4 col-md-6 category">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('front.show',$product->name) }}"><img src="{{ $product->embeded_code }}" alt="" /></a>
                                                    </div>
                                                    <div class="product-info clearfix text-center">
                                                        <div class="fix">
                                                            <h4 class="post-title"><a href="{{ route('front.show',$product->name) }}">{{ $product->name }}</a></h4>
                                                        </div>
                                                        <div class="product-action clearfix d-flex align-items-center justify-content-center">
                                                            <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a onclick="onCahnge('{{ $product->name }}', '{{ $product->cover }}', '{{ $product->description }}')" href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
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
            {{-- <script type="text/javascript">
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
            </script> --}}
@endsection
