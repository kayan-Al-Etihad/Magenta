<!-- Meta Tag -->
@yield('meta')
<!-- Title Tag  -->
<title>@yield('title')</title>
<!-- Favicon -->
@php
$settings=DB::table('settings')->get();
@endphp
<link rel="icon" type="image/png" href="@foreach($settings as $data) {{$data->logo}} @endforeach">
<!-- Web Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

<!-- StyleSheet -->
<link rel="manifest" href="/manifest.json">
<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
<!-- Fancybox -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
<!-- Themify Icons -->
<link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/niceselect.css')}}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
<!-- Flex Slider CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/flex-slider.min.css')}}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">
<!-- Slicknav -->
<link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">
<!-- Jquery Ui -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">

<!-- Eshop StyleSheet -->
<link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');
    html{
        font-family: 'Cairo', sans-serif !important;
    }
    body{
        font-family: 'Cairo', sans-serif !important;
    }
    h2,h3,p,a,button,th,td,label,option,li{
        font-family: 'Cairo', sans-serif !important;
    }
    /* Multilevel dropdown */
    .dropdown-submenu {
    position: relative;
    }
    .owl-carousel.owl-loading {
        opacity: 1;
        display: block;
    }
    .header .shopping .dropdown-cart-header{
        display: flex;
        justify-content: space-between;
    }
    ul.shopping-list{
        display: flex;
        flex-direction: column
    }
    ul.shopping-list li h4{
        width: 50%;
        margin: auto;
        margin-top: 36px;
        text-align: center;
    }

    .dropdown-submenu>a:after {
    content: "\f0da";
    float: right;
    border: none;
    font-family: 'FontAwesome';
    }

    .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: 0px;
    margin-left: 0px;
    }

    .st-sticky-share-buttons.st-right.st-toggleable.st-has-labels.st-show-total{
        display: none !important;
    }
    .sketchfab-embed-wrapper{
        width: max-content;
    }
    .btn.btn-lg.ws-btn.wow.fadeInUpBig{
        border-radius: 7.5px;
    }
    .shop-home-list .single-list .content a:hover{
        color: #000 !important;
    }
    .nav.nav-tabs.filter-tope-group button{
       border-radius: 7.5px;
    }

    #Gslider .carousel-inner .carousel-caption {
        bottom: 0% !important;
        top: 89%;
        left: 38%;
    }

    @media screen and (max-width:992px){
        .single-product .product-img {
            width: 100%;
            height: 100%;
        }
        .topbar .list-main{
            display: block !important;
        }
        .topbar .col-lg-4.col-md-12.col-12{
            display: block !important;
        }
        .topbar .list-main a{
            margin-right: 0 !important;
        }
        #myTabContent{
            margin: 50px 0 !important;
        }
        .product-home{
            width: 50% !important;
            max-width: 100% !important;
        }
        .product-home .single-product{
            border-radius: 10px !important;
            width: 100% !important;
        }
        .product-home .product-img{
            border-radius: 10px !important;
            width: 100% !important;
        }
        .Midium-Banner{
            display: flex;
            align-content: center;
            flex-direction: column;
            gap: 20px;
        }
        .Midium-Banner .col-lg-6{
            width: 100% !important;
            max-width: 100% !important;
        }
        .fixed-nav li{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap:20px;
            font-size: 30px;
        }
        .fixed-nav{
            gap:20px;
        }
        .app-navbar{
            display: block !important;
        }
        .shop-home-list .col-md-4{
            width: 100% !important;
        }
        .shop-lists{
            flex-direction: column;
        }
        .shop-lists .col-md-4{
            max-width: 100%;
        }
        .shop-lists .col-md-4 .single-list .row{
            flex-direction: column;
        }
        .shop-lists .col-md-4 .single-list .row .col-lg-6{
            max-width: 100%;
        }
        .shop-lists .col-md-4 .single-list .row .no-padding .content h4 a{
            text-align: center !important;
            font-size: 30px !important;
        }
        .shop-lists .col-md-4 .single-list .row .no-padding .content p{
            text-align: center !important;
            font-size: 30px !important;
            padding: 13px 70px;

        }
        .shop-lists .col-md-4 .single-list .row .no-padding .content{
            text-align: center !important;
        }
        footer{
            padding-bottom: 187px !important;
        }
        footer .col-lg-4{
            text-align: center !important;
        }
        footer .col-lg-4 .logo{
            display: flex;
            text-align: center;
            align-items: center !important;
            justify-content: center;
        }
        footer .col-lg-4:not(.About){
            display: none;
        }
        #cssmenu{
            display: block !important;
            padding: 25px 0;
        }
        .big-screen-nav{
            display: none !important;
        }
        #Gslider .carousel-inner img{
            transform: scale(1.7);
        }
        .product-content{
            text-align: center !important;
        }
        .fixed-nav li.active{
            background: #c8a165;
            color: #ffffff;     
            padding: 13px;
            border-radius: 20px;
        }
        .small-screen-category .col-lg-3{
            width: 100% !important;
            flex: 0 0 100% !important;
            max-width: 100% !important;
        }
        .small-screen-category .col-lg-3 .single-product{
            width: 100% !important;
            position: relative;
        }
        .small-screen-category .col-lg-3 .product-img{
            width: 100% !important;
            height: 100% !important;
            border-radius: 10px;
        }
        .small-screen-category .col-lg-3 .product-content{
            position: absolute;
            width: 100%;
            bottom: 0;
            left: 0;
            padding: 40px;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.5);
        }
        .small-screen-category .col-lg-3 .product-content h3 a{
            font-size: 30px !important;
        }
        
        .breadcrumbs{
            margin-top: 130px;
        }
        .breadcrumbs a{
            font-size:20px;
        }
        .small-screen-category-list .col-lg-3{
            flex: 0 0 75%;
            max-width: 75%;
            padding: 0;
        }
        .small-screen-category-list .col-lg-9{
            flex: 0 0 25%;
            max-width: 25%;
            display: flex;
            align-items: center;  
            justify-content: center;
            margin-top: 49px;
            background: #c8a165;
            opacity: 0.7;
            color: #ffffff;
        }
        .small-screen-category-list .col-lg-9 p{
            display: none;
        }
        .small-screen-category-list .col-lg-3 .product-img{
            width: 100%;
            height: 100%;
        }
        .single-product .product-img{
            border-radius: 10px;
        }
        .owl-carousel .owl-refresh .owl-item{
            display: block !important;
        }
    }
    .app-navbar{
        display: none;
    }
    #st-1 {
        display: none !important;
    }
    #cssmenu{
        display: none;
    }
    .midium-banner .single-banner .content{
        background-color: rgba(0, 0, 0, 0.5)
    }
    .midium-banner .single-banner .content p{
        font-size: 30px;
        margin-bottom: 20px;
    }
    .midium-banner .single-banner .content h3{
        font-size: 25px;
        color: #ffffff
    }

    /* navbar */

    @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

#cssmenu ul li,
#cssmenu ul li a,
#cssmenu #menu-button {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  font-size: 20px;
}
#cssmenu:after,
#cssmenu > ul:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
#cssmenu #menu-button {
  display: none;
}
#cssmenu {
  font-family: Montserrat, sans-serif;
  background: #fff;
  box-shadow: 0px 0px 10px 0px #000;
}
#cssmenu > ul > li {
  float: left;
}
#cssmenu.align-center > ul {
  font-size: 0;
  text-align: center;
}
#cssmenu.align-center > ul > li {
  display: inline-block;
  float: none;
}
#cssmenu.align-center ul ul {
  text-align: left;
}
#cssmenu.align-right > ul > li {
  float: right;
}
#cssmenu > ul > li > a {
  padding: 17px;
  font-size: 20px;
  letter-spacing: 1px;
  text-decoration: none;
  color: #000;
  font-weight: 700;
  text-transform: uppercase;
}
#cssmenu > ul > li:hover > a {
  color: #ffffff;
}
#cssmenu > ul > li.has-sub > a {
  padding-right: 30px;
}
#cssmenu > ul > li.has-sub > a:after {
  position: absolute;
  top: 22px;
  right: 11px;
  width: 8px;
  height: 2px;
  display: block;
  background: #000;
  content: '';
}
#cssmenu > ul > li.has-sub > a:before {
  position: absolute;
  top: 19px;
  right: 14px;
  display: block;
  width: 2px;
  height: 8px;
  background: #000;
  content: '';
  -webkit-transition: all .25s ease;
  -moz-transition: all .25s ease;
  -ms-transition: all .25s ease;
  -o-transition: all .25s ease;
  transition: all .25s ease;
}
#cssmenu > ul > li.has-sub:hover > a:before {
  top: 23px;
  height: 0;
}
#cssmenu ul ul {
  position: absolute;
  left: -9999px;
}
#cssmenu.align-right ul ul {
  text-align: right;
}
#cssmenu ul ul li {
  height: 0;
  -webkit-transition: all .25s ease;
  -moz-transition: all .25s ease;
  -ms-transition: all .25s ease;
  -o-transition: all .25s ease;
  transition: all .25s ease;
}
#cssmenu li:hover > ul {
  left: auto;
}
#cssmenu.align-right li:hover > ul {
  left: auto;
  right: 0;
}
#cssmenu li:hover > ul > li {
  height: 35px;
}
#cssmenu ul ul ul {
  margin-left: 100%;
  top: 0;
}
#cssmenu.align-right ul ul ul {
  margin-left: 0;
  margin-right: 100%;
}
#cssmenu ul ul li a {
  border-bottom: 1px solid rgba(150, 150, 150, 0.15);
  padding: 11px 15px;
  width: 170px;
  font-size: 12px;
  text-decoration: none;
  color: #000;
  font-weight: 400;
  background: #333333;
}
#cssmenu ul ul li:last-child > a,
#cssmenu ul ul li.last-item > a {
  border-bottom: 0;
}
#cssmenu ul ul li:hover > a,
#cssmenu ul ul li a:hover {
  color: #000;
}
#cssmenu ul ul li.has-sub > a:after {
  position: absolute;
  top: 16px;
  right: 11px;
  width: 8px;
  height: 2px;
  display: block;
  background: #000;
  content: '';
}
#cssmenu.align-right ul ul li.has-sub > a:after {
  right: auto;
  left: 11px;
}
#cssmenu ul ul li.has-sub > a:before {
  position: absolute;
  top: 13px;
  right: 14px;
  display: block;
  width: 2px;
  height: 8px;
  background: #000;
  content: '';
  -webkit-transition: all .25s ease;
  -moz-transition: all .25s ease;
  -ms-transition: all .25s ease;
  -o-transition: all .25s ease;
  transition: all .25s ease;
}
#cssmenu.align-right ul ul li.has-sub > a:before {
  right: auto;
  left: 14px;
}
#cssmenu ul ul > li.has-sub:hover > a:before {
  top: 17px;
  height: 0;
}
@media all and (max-width: 768px), only screen and (-webkit-min-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (min--moz-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (-o-min-device-pixel-ratio: 2/1) and (max-width: 1024px), only screen and (min-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (min-resolution: 192dpi) and (max-width: 1024px), only screen and (min-resolution: 2dppx) and (max-width: 1024px) {
  #cssmenu {
    width: 100%;
  }
  #cssmenu ul {
    width: 100%;
    display: none;
  }
  #cssmenu.align-center > ul {
    text-align: left;
  }
  #cssmenu ul li {
    width: 100%;
    border-top: 1px solid rgba(120, 120, 120, 0.2);
  }
  #cssmenu ul ul li,
  #cssmenu li:hover > ul > li {
    height: auto;
  }
  #cssmenu ul li a,
  #cssmenu ul ul li a {
    width: 100%;
    border-bottom: 0;
  }
  #cssmenu > ul > li {
    float: none;
  }
  #cssmenu ul ul li a {
    padding-left: 25px;
  }
  #cssmenu ul ul ul li a {
    padding-left: 35px;
  }
  #cssmenu ul ul li a {
    color: #dddddd;
    background: none;
  }
  #cssmenu ul ul li:hover > a,
  #cssmenu ul ul li.active > a {
    color: #ffffff;
  }
  #cssmenu ul ul,
  #cssmenu ul ul ul,
  #cssmenu.align-right ul ul {
    position: relative;
    left: 0;
    width: 100%;
    margin: 0;
    text-align: left;
  }
  #cssmenu > ul > li.has-sub > a:after,
  #cssmenu > ul > li.has-sub > a:before,
  #cssmenu ul ul > li.has-sub > a:after,
  #cssmenu ul ul > li.has-sub > a:before {
    display: none;
  }
  #cssmenu #menu-button {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 17px;
    color: #dddddd;
    cursor: pointer;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: 700;
  }
  #cssmenu #menu-button i{
    color: #000;
    font-size: 40px;
  }

  /* #cssmenu #menu-button:after {
    position: absolute;
    top: 40px;
    right: 17px;
    display: block;
    height: 4px;
    width: 20px;
    border-top: 2px solid #000;
    border-bottom: 2px solid #000;
    content: '';
  }
  #cssmenu #menu-button:before {
    position: absolute;
    top: 35px;
    right: 17px;
    display: block;
    height: 2px;
    width: 20px;
    background: #000;
    content: '';
  }
  #cssmenu #menu-button.menu-opened:after {
    top: 36px;
    border: 0;
    height: 2px;
    width: 15px;
    background: #000;
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
  }
  #cssmenu #menu-button.menu-opened:before {
    top: 36px;
    background: #000;
    width: 15px;
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
  } */
  #cssmenu .submenu-button {
    position: absolute;
    z-index: 99;
    right: 0;
    top: 0;
    display: block;
    border-left: 1px solid rgba(120, 120, 120, 0.2);
    height: 46px;
    width: 46px;
    cursor: pointer;
  }
  #cssmenu .submenu-button.submenu-opened {
    background: #262626;
    display: block !important;
  }
  #cssmenu ul ul .submenu-button {
    height: 34px;
    width: 34px;
  }
  #cssmenu ul{
    display: block;
  }
  #cssmenu .submenu-button:after {
    position: absolute;
    top: 22px;
    right: 19px;
    width: 8px;
    height: 2px;
    display: block;
    background: #dddddd;
    content: '';
  }
  #cssmenu ul ul .submenu-button:after {
    top: 15px;
    right: 13px;
  }
  #cssmenu .submenu-button.submenu-opened:after {
    background: #ffffff;
  }
  #cssmenu .submenu-button:before {
    position: absolute;
    top: 19px;
    right: 22px;
    display: block;
    width: 2px;
    height: 8px;
    background: #dddddd;
    content: '';
  }
  #cssmenu ul ul .submenu-button:before {
    top: 12px;
    right: 16px;
  }
  #cssmenu .submenu-button.submenu-opened:before {
    display: none;
  }
  #cssmenu{
    position: absolute;
    top: 0;
    left: 0;
    z-index: 15855;
  }
  #cssmenu ul.hide{
    height: 0px !important;
    display: block !important;
  }
  #cssmenu ul.hide li{
    visibility: hidden !important;
    transition-delay: 0.05s;
  }
  #cssmenu ul.Open li{
    visibility: visible !important;
    transition-delay: 0.3s;
  }
  #cssmenu ul{
    transition: 0.7s ease-in-out !important;
  }
  #cssmenu ul li{
    padding-top: 10px;
  }
  #cssmenu ul.Open{
    height: 650px !important;
  }
}

    /* navbar */
    /*
</style>
@stack('styles')
