@extends('layout.front.index')
@section('title')
   Products
@endsection

@section('content')
   <!-- HEADING-BANNER START -->
   <div class="heading-banner-area overlay-bg">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="heading-banner">
                  <div class="heading-banner-title">
                     <h2>Shop</h2>
                  </div>
                  <div class="breadcumbs pb-15">
                     <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Shop</li>
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
         <!-- Shop-Content End -->
         <div class="shop-content">
            <div class="row">
               <div class="col-md-12">
                  <div class="product-option mb-30 clearfix">
                     <!-- Categories start -->
                     <div class="dropdown floatleft">
                        <button class="option-btn">
                           Categories
                        </button>
                        <div class="dropdown-menu dropdown-width">
                           <!-- Widget-Categories start -->
                           <aside class="widget widget-categories">
                              <div class="widget-title">
                                 <h4>Categories</h4>
                              </div>
                              <div id="cat-treeview" class="widget-info product-cat boxscrol2">
                                 <ul>
                                    @foreach ($categories as $category)
                                       <li>
                                          <span>{{ $category->category_name }}</span>
                                       </li>
                                    @endforeach
                                 </ul>
                              </div>
                           </aside>
                           <!-- Widget-categories end -->
                        </div>
                     </div>
                     <!-- Categories end -->
                     <!-- Price start -->
                     <div class="dropdown floatleft">
                        <button class="option-btn">
                           Price
                        </button>
                        <div class="dropdown-menu dropdown-width">
                           <!-- Shop-Filter start -->
                           <aside class="widget shop-filter">
                              <div class="widget-title">
                                 <h4>Price</h4>
                              </div>
                              <div class="widget-info">
                                 <div class="price_filter">
                                    <div class="price_slider_amount">
                                       <input type="submit" value="You range :" />
                                       <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                    <div id="slider-range"></div>
                                 </div>
                              </div>
                           </aside>
                           <!-- Shop-Filter end -->
                        </div>
                     </div>
                     <!-- Price end -->
                     <!-- Color start -->
                     <div class="dropdown floatleft">
                        <button class="option-btn">
                           Color
                        </button>
                        <div class="dropdown-menu dropdown-width">
                           <!-- Widget-Color start -->
                           <aside class="widget widget-color">
                              <div class="widget-title">
                                 <h4>Color</h4>
                              </div>
                              <div class="widget-info color-filter clearfix">
                                 <ul>
                                    <li><a href="#"><span class="color color-1"></span>LightSalmon<span
                                             class="count">12</span></a></li>
                                    <li><a href="#"><span class="color color-2"></span>Dark Salmon<span
                                             class="count">20</span></a></li>
                                    <li><a href="#"><span class="color color-3"></span>Tomato<span
                                             class="count">59</span></a></li>
                                    <li><a class="active" href="#"><span class="color color-4"></span>Deep Sky
                                          Blue<span class="count">45</span></a></li>
                                    <li><a href="#"><span class="color color-5"></span>Electric Purple<span
                                             class="count">78</span></a></li>
                                    <li><a href="#"><span class="color color-6"></span>Atlantis<span
                                             class="count">10</span></a></li>
                                    <li><a href="#"><span class="color color-7"></span>Deep Lilac<span
                                             class="count">15</span></a></li>
                                 </ul>
                              </div>
                           </aside>
                           <!-- Widget-Color end -->
                        </div>
                     </div>
                     <!-- Color end -->
                     <!-- Size start -->
                     <div class="dropdown floatleft">
                        <button class="option-btn">
                           Size
                        </button>
                        <div class="dropdown-menu dropdown-width">
                           <!-- Widget-Size start -->
                           <aside class="widget widget-size">
                              <div class="widget-title">
                                 <h4>Size</h4>
                              </div>
                              <div class="widget-info size-filter clearfix">
                                 <ul>
                                    <li><a href="#">M</a></li>
                                    <li><a class="active" href="#">S</a></li>
                                    <li><a href="#">L</a></li>
                                    <li><a href="#">SL</a></li>
                                    <li><a href="#">XL</a></li>
                                 </ul>
                              </div>
                           </aside>
                           <!-- Widget-Size end -->
                        </div>
                     </div>
                     <!-- Size end -->
                     <div class="showing text-end">
                        <p class="mb-0 d-none d-md-block">Showing 01-09 of 17 Results</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="row">
                     @php
                        $data = \Carbon\Carbon::today()->subDays(7);
                     @endphp
                     @foreach ($products as $product)
                        <!-- Single-product start -->
                        <div class="col-xl-3 col-md-4">
                           <div class="single-product">
                              <div class="product-img">
                                 @if ($product->is_off == 1)
                                    <span class="pro-label new-label">Sale {{ $product->off }}% Off</span>
                                 @else
                                    <span class=""></span>
                                 @endif
                                 @if ($product->created_at < $data)
                                    <span class="pro-label new-label">New</span>
                                 @else
                                    <span class=""></span>
                                 @endif
                                 @if ($product->status != 1)
                                    <span class="pro-label new-label">comming soon!</span>
                                 @endif
                                 <span class="pro-price-2">$ {{ $product->price }}</span>
                                 <a href="{{ route('front.show', $product->product_slug) }}"><img
                                       src="{{ $product->cover }}" alt="" /></a>
                              </div>
                              <div class="product-info clearfix text-center">
                                 <div class="fix">
                                    <h4 class="post-title"><a
                                          href="{{ route('front.show', $product->product_slug) }}">{{ $product->product_name }}</a>
                                    </h4>
                                 </div>
                                 <div class="product-action clearfix d-flex align-items-center justify-content-center">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top"
                                       title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                    <a onclick="onCahnge('{{ $product->product_name }}', '{{ $product->cover }}', '{{ $product->description }}')"
                                       href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                       title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Single-product end -->
                     @endforeach
                     
                     <div class="col-xl-3 col-md-4">
                        <div class="single-product">
                           <div class="product-img">
                              @if ($product->is_off == 1)
                                 <span class="pro-label new-label">Sale {{ $product->off }}% Off</span>
                              @else
                                 <span class=""></span>
                              @endif
                              @if ($product->created_at < $data)
                                 <span class="pro-label new-label">New</span>
                              @else
                                 <span class=""></span>
                              @endif
                              @if ($product->status != 1)
                                 <span class="pro-label new-label">comming soon!</span>
                              @endif
                              <span class="pro-price-2">$ {{ $product->price }}</span>
                              <div class="mt-5 pt-5 mb-4 pb-4">
                                 <model-viewer src="{{ asset('/3dmodel/super_meat_boy_free/scene.gltf') }}"
                                    shadow-intensity="1" disable-zoom camera-controls auto-rotate>
                                 </model-viewer>
                              </div>
                           </div>
                           <div class="product-info clearfix text-center">
                              <div class="fix">
                                 <h4 class="post-title"><a
                                       href="{{ route('front.show', $product->product_slug) }}">{{ $product->product_name }}</a>
                                 </h4>
                              </div>
                              <div class="product-action clearfix d-flex align-items-center justify-content-center">
                                 <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top"
                                    title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                 <a onclick="onCahnge('{{ $product->product_name }}', '{{ $product->cover }}', '{{ $product->description }}')"
                                    href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                    title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>


                     <!-- Loads <model-viewer> for modern browsers: -->
                     <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js">
                     </script>

                     <!-- Loads <model-viewer> for old browsers like IE11: -->
                     <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>

                  </div>
               </div>
               <div class="col-md-12">
                  <div class="bg-white p-2 d-flex align-items-center justify-content-center">
                     <ul class="pagination">
                        {{ $products->links() }}
                     </ul>
                  </div>
                  <!-- Pagination end -->
               </div>
            </div>
         </div>
         <!-- Shop-Content End -->
      </div>
   </div>
   <!-- PRODUCT-AREA END -->
@endsection
