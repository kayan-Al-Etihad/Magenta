{{-- VARIABLE TO TAKE PRODUCTS IN LAST WEEK FOR DISPLAYING -NEW- LABEL  --}}
@php
   $data = \Carbon\Carbon::today()->subDays(7)
@endphp
@forelse($products as $product)
<div class="col-12">
    <div class="single-product">
        <div class="product-img">
            {{-- <span class="pro-label new-label">new</span> --}}
            @if($product->is_off == 1)
                <span class="pro-label new-label">Sale {{ $product->off }}% Off</span>
            @endif
            @if($product->created_at > $data)
                <span class="pro-label new-label">New</span>
            @endif
            @if($product->status != 1)
                <span onclick="onCahnge()" class="pro-label new-label">comming soon!</span>
            @endif
            <span class="pro-price-2">$ {{ $product->price }}</span>
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
@empty
@endforelse
