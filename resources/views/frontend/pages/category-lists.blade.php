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
                    <ul class="bread-list text-right" dir="rtl">
                        <li><a href="{{route('home')}}">@lang('auth.home')<i class="ti-arrow-left"></i></a></li>
                        <li class="active"><a href="/product-grids">@lang('auth.all_category')</a></li>
                    </ul>
                </div>
                @else
                <div class="bread-inner text-left">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">@lang('auth.home')<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="/product-grids">@lang('auth.all_category')</a></li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<form action="{{route('shop.filter')}}" method="POST">
    @csrf
    <!-- Product Style 1 -->
    <section class="product-area shop-sidebar shop-list shop section">
        <div class="container">
            <div class="row">
                @if (app()->getLocale() == "ar")
                <div class="col-lg-12 col-md-12 col-12 text-right" dir="rtl">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <label>Show :</label>
                                        <select class="show" name="show" onchange="this.form.submit();">
                                            <option value="">Default</option>
                                            <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9' ) selected
                                                @endif>09</option>
                                            <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15' )
                                                selected @endif>15</option>
                                            <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21' )
                                                selected @endif>21</option>
                                            <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30' )
                                                selected @endif>30</option>
                                        </select>
                                    </div>
                                    <div class="single-shorter">
                                        <label>Sort By :</label>
                                        <select class='sortBy' name='sortBy' onchange="this.form.submit();">
                                            <option value="">Default</option>
                                            <option value="title" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='title' ) selected @endif>Name</option>
                                            <option value="price" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='price' ) selected @endif>Price</option>
                                            <option value="category" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='category' ) selected @endif>Category</option>
                                            <option value="brand" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='brand' ) selected @endif>Brand</option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="view-mode">
                                    <li><a href="{{ route('front-categoriesGrid') }}"><i class="fa fa-th-large"></i></a>
                                    </li>
                                    <li class="active"><a href="{{ route('front-categoriesList') }}"><i
                                                class="fa fa-th-list"></i></a></li>
                                </ul>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @if(count($categories))
                        @foreach($categories as $category)
                        {{-- {{$category}} --}}
                        <!-- Start Single List -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{route('product-detail',$category->slug)}}">
                                                @php
                                                $photo=explode(',',$category->photo);
                                                @endphp
                                                <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-6 col-12">
                                    <div class="list-content">
                                        <div class="product-content">
                                            @if ($category->is_parent == 1)
                                            <h3><a href="{{ route('product-grid', $category->slug) }}">{{
                                                    $category->title_ar }}</a>
                                            </h3>
                                            @else
                                            @php
                                            $parent = $categories->where('parent_id', '==',
                                            $category->paernt_id)->first();
                                            @endphp
                                            <h3><a
                                                    href="{{ route('product-sub-cat', [$parent->slug, $category->slug]) }}">{{
                                                    $category->title_ar }}</a>
                                            </h3>
                                            @endif
                                        </div>
                                        <p class="des pt-2">{!! html_entity_decode($category->summary_ar) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single List -->
                        @endforeach
                        @else
                        <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 justify-content-center d-flex">
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <label>Show :</label>
                                        <select class="show" name="show" onchange="this.form.submit();">
                                            <option value="">Default</option>
                                            <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9' ) selected
                                                @endif>09</option>
                                            <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15' )
                                                selected @endif>15</option>
                                            <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21' )
                                                selected @endif>21</option>
                                            <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30' )
                                                selected @endif>30</option>
                                        </select>
                                    </div>
                                    <div class="single-shorter">
                                        <label>Sort By :</label>
                                        <select class='sortBy' name='sortBy' onchange="this.form.submit();">
                                            <option value="">Default</option>
                                            <option value="title" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='title' ) selected @endif>Name</option>
                                            <option value="price" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='price' ) selected @endif>Price</option>
                                            <option value="category" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='category' ) selected @endif>Category</option>
                                            <option value="brand" @if(!empty($_GET['sortBy']) &&
                                                $_GET['sortBy']=='brand' ) selected @endif>Brand</option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="view-mode">
                                    <li><a href="{{ route('front-categoriesGrid') }}"><i class="fa fa-th-large"></i></a>
                                    </li>
                                    <li class="active"><a href="{{ route('front-categoriesList') }}"><i
                                                class="fa fa-th-list"></i></a></li>
                                </ul>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @if(count($categories))
                        @foreach($categories as $category)
                        {{-- {{$category}} --}}
                        <!-- Start Single List -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{route('product-detail',$category->slug)}}">
                                                @php
                                                $photo=explode(',',$category->photo);
                                                @endphp
                                                <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-6 col-12">
                                    <div class="list-content">
                                        <div class="product-content">
                                            @if ($category->is_parent == 1)
                                            <h3><a href="{{ route('product-grid', $category->slug) }}">{{
                                                    $category->title }}</a>
                                            </h3>
                                            @else
                                            @php
                                            $parent = $categories->where('parent_id', '==',
                                            $category->paernt_id)->first();
                                            @endphp
                                            <h3><a
                                                    href="{{ route('product-sub-cat', [$parent->slug, $category->slug]) }}">{{
                                                    $category->title }}</a>
                                            </h3>
                                            @endif
                                        </div>
                                        <p class="des pt-2">{!! html_entity_decode($category->summary) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single List -->
                        @endforeach
                        @else
                        <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 justify-content-center d-flex">
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-md-12 justify-content-center d-flex">
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </section>
    <!--/ End Product Style 1  -->
</form>

@endsection
@push ('styles')
<style>
    .pagination {
        display: inline-flex;
    }

    .filter_button {
        /* height:20px; */
        text-align: center;
        background: f40011;
        padding: 8px 16px;
        margin-top: 10px;
        color: white;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

{{-- <script>
    $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
					else{
                        swal('error',response.msg,'error').then(function(){
							// document.location.href=document.location.href;
						});
                    }
                }
            })
        });
</script> --}}
<script>
    $(document).ready(function(){
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }

            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
</script>

@endpush
