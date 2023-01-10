@extends('layout.front.index')
@section('title')
   Page Not Found!
@endsection
@section('content')
   <div style="width:100% !important;height:100% !important;background:url('/front-end-assets/img/error.webp') !important;background-repeat: no-repeat !important;;background-size:cover !important;">
    <div class="container-fluid p-0 m-0" style="height: 100vh;width:100%;background-repeat: no-repeat;background-size:contain;background-position:center;">
        <div class="offset-80 w-50 m-auto py-5">
            <div class="on-duty-box">
               <img src="{{ asset('front-assets/empty-404-icon.png') }}" alt="">
               <h1 class="block-title large"> Ooops, we cannot find what you are looking for. Please try again.</h1>
               <div class="description">
                  Please try one of the following pages:
               </div>
               <a class="btn btn-border color-default" href="{{ route('home') }}">HOME PAGE</a>
            </div>
         </div>
       </div>
   </div>
@endsection
@section('extra_js')
@endsection
