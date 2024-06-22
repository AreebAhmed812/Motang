@extends('theme/layout-front/header')
@section('title', 'Home')
@section('main')
    <style>
        .main-sec {
            display: none !important;
        }

        @media only screen and (max-width:768px) {
            .text-align {
                text-align: center;
                font-size: 14px;
            }

        }

        @media only screen and (max-width:425px) {
            .banner.big {
                padding: 24px 24px 0 24px;
            }

            .p-24 {
                padding: 0 24px 24px 24px;
            }

            .owl-theme .owl-dots {
                margin-top: -50px;
                margin-bottom: 24px;
            }

            .flexslider {
                display: none;
            }

            .h-758 {
                height: 758px !important;
            }

            .main-sec {
                display: block !important;
                position: absolute;
                top: 35%;
                right: 4%;
                left: 4%;
                z-index: 999999;
            }
        }

        @media only screen and (max-width:320px) {
            .featured-cars.owl-theme .owl-nav [class*='owl-'] {
                top: 35%;
            }
        }
    </style>
    <header class="header">
        <div class="container">
            <div class="navigation clearfix">
                <div class="logo"><a href="/"><img src="{{ asset('asset/images/logo.png') }}" alt="Automan"
                            class="img-responsive"></a></div> <!-- end .logo -->
                <div class="login"><a href="#"><i class="ion-ios-person"></i></a></div> <!-- end .login -->
                <div class="contact">
                    <div class="line"></div>
                    <a href="{{ route('contact') }}"><i class="fa fa-phone"></i></a>
                </div> <!-- end .contact -->
                <nav class="main-nav">
                    <ul class="list-unstyled">
                        <li class="active">
                            <a href="/">Home</a>

                        </li>
                        <li>
                            <a href="{{ route('list') }}">Buy A Car</a>
                            <!-- <ul>
                                    <li><a href="#">Add Car Details</a></li>
                                    <li><a href="choose-specification.html">Choose Specification</a></li>
                                    <li><a href="contact-details.html">Contact Details</a></li>
                                    <li><a href="photos-videos.html">Photos Videos</a></li>
                                    <li><a href="pay-publish.html">Pay Publish</a></li>
                                </ul> -->
                        </li>
                        <li>
                            <a href="{{ route('user') }}">Sell Cars</a>
                            <!-- <ul>
                                    <li><a href="listing-grid-view.html">Listing Grid View</a></li>
                                    <li><a href="#l">Listing List View</a></li>
                                    <li><a href="details.html">Details 1</a></li>
                                    <li><a href="details-1.html">Details 2</a></li>
                                </ul> -->
                        </li>

                        <!-- <li>
                                <a href="blog.html">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-post.html">Blog Post</a></li>
                                </ul>
                            </li> -->
                        <li>
                            <a href="{{ route('aboutUs') }}">About Us</a>
                            <!-- <ul>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="shortcodes.html">Shortcodes</a></li>
                                </ul> -->
                        </li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li>
                            <a href="/sign-in">Login</a>
                            <!-- <ul>
                                    <li><a href="compare.html">Compare</a></li>
                                    <li><a href="compare-details.html">Compare Details</a></li>
                                </ul> -->
                        </li>
                    </ul>
                </nav> <!-- end .main-nav -->
                <a href="" class="responsive-menu-open"><i class="fa fa-bars"></i></a>
            </div> <!-- end .navigation -->
        </div> <!-- end .container -->
    </header> <!-- end .header -->
    <div class="responsive-menu">
        <a href="" class="responsive-menu-close"><i class="ion-android-close"></i></a>
        <nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
    </div> <!-- end .responsive-menu -->
    <div class="flexslider welcome">
        <div class="slides">
            <div class="slide" style="background-image: url('{{ asset('asset/images/background01.jpg') }}');">
                <div class="inner">
                    <div class="container">
                        <div class="banner-wrapper">
                            <div class="banner big">
                                Top Cars: Mercedes Class
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem eriam, eaque ipsa quae ab illo inventore veritatis..</p>
                            </div> <!-- end .banner -->
                        </div> <!-- end .banner-wrapper -->
                        <a href="{{ route('list') }}" class="button solid white xsmall">Know More</a>
                    </div> <!-- end .container -->
                </div> <!-- end .inner -->
            </div> <!-- end .slide -->
            <div class="slide" style="background-image: url('{{ asset('asset/images/background01.jpg') }}');">
                <div class="inner">
                    <div class="container">
                        <div class="banner-wrapper">
                            <div class="banner">
                                Top Cars: Mercedes Class
                            </div> <!-- end .banner -->
                        </div> <!-- end .banner-wrapper -->
                        <a href="{{ route('list') }}" class="button border white xsmall">Know More</a>
                    </div> <!-- end .container -->
                </div> <!-- end .inner -->
            </div> <!-- end .slide -->
            <div class="slide" style="background-image: url('{{ asset('asset/images/background01.jpg') }}');">
                <div class="inner">
                    <div class="container">
                        <div class="banner-wrapper">
                            <div class="banner big">
                                Top Cars: Mercedes Class
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem eriam, eaque ipsa quae ab illo inventore veritatis..</p>
                            </div> <!-- end .banner -->
                        </div> <!-- end .banner-wrapper -->
                        <a href="{{ route('list') }}" class="button solid white xsmall">Know More</a>
                    </div> <!-- end .container -->
                </div> <!-- end .inner -->
            </div> <!-- end .slide -->
        </div> <!-- end .slides -->
    </div> <!-- end .welcome -->

    <section class="section dark tiny">
        <div class="inner">
            <div class="container">
                <div class="tabpanel border section-tab" role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#search-cars" aria-controls="search-cars"
                                role="tab" data-toggle="tab">Search Cars</a></li>
                        {{-- <li role="presentation"><a href="#sell-car" aria-controls="sell-car" role="tab"
                            data-toggle="tab">Sell Car</a></li> --}}
                    </ul> <!-- end .nav-tabs -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="search-cars">
                            <form action="{{ url('search') }}" method="GET" class="banner-form">
                                <div class="item items">
                                    <div class="select-wrapper">
                                        <select class="selectpicker" name="model" value="{{ Request::get('model') }}">
                                            <option value="" selected>Brand</option>
                                            @php
                                                $addedBrands = [];
                                            @endphp
                                            @foreach ($ads as $data)
                                                @php
                                                    $brandName = $data->brandData ? $data->brandData->brand_name : '';
                                                @endphp
                                                @if (!in_array($brandName, $addedBrands))
                                                    <option value="{{ $data->brandData->id }}">{{ $brandName }}
                                                    </option>
                                                    @php
                                                        $addedBrands[] = $brandName;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </select>

                                    </div> <!-- end .select-wrapper -->
                                </div> <!-- end .item -->
                                <div class="item items">
                                    <div class="select-wrapper">
                                        <select class="selectpicker" name="fuel" value="{{ Request::get('fuel') }}">
                                            <option value="" selected>Fuel</option>
                                            <option>Petrol</option>
                                            <option>Diesel</option>
                                            <option>Petrol/Electric Hybrid</option>
                                            <option>Natural Gas</option>
                                            <option>Gasoline/Electric</option>
                                            <option>Flex-Fuel</option>
                                            <option>Electric</option>
                                            <option>Diesel/Electric Hybrid</option>
                                        </select>

                                    </div> <!-- end .select-wrapper -->
                                </div> <!-- end .item -->
                                <div class="item items">
                                    <div class="select-wrapper">
                                        <select class="selectpicker" name="year" value="{{ Request::get('year') }}">
                                            <option value="" selected>Year</option>
                                            @php
                                                $addedYears = [];
                                            @endphp

                                            @foreach ($ads as $data)
                                                @php

                                                    $year = $data->yearData ? $data->yearData->year : '';
                                                @endphp

                                                @if (!in_array($year, $addedYears))
                                                    <option value="{{ $data->yearData ? $data->yearData->id : '' }}">
                                                        {{ $year }}</option>
                                                    @php
                                                        $addedYears[] = $year;
                                                    @endphp
                                                @endif
                                            @endforeach

                                        </select>

                                    </div> <!-- end .select-wrapper -->
                                </div> <!-- end .item -->
                                <div class="item items">

                                    <div class="select-wrapper">
                                        <input type="number" class="selectpicker" name="min_price"
                                            style="border:1px solid #44728e;background-color: #2e566e;color: #fff;"
                                            placeholder="Minimum Price" value="{{ Request::get('min_price') }}"
                                            min="0">
                                    </div> <!-- end .select-wrapper -->
                                </div> <!-- end .form-group -->
                                <div class="item items">
                                    <div class="select-wrapper">
                                        <input type="number" class="selectpicker" name="max_price"
                                            style="border:1px solid #44728e;background-color: #2e566e;color: #fff;"
                                            placeholder="Maximum Price" value="{{ Request::get('max_price') }}"
                                            min="0">

                                    </div>
                                </div>

                                <div class="item items">
                                    <button type="submit" class="button solid light-blue">Search</button>
                                </div> <!-- end .item -->
                            </form> <!-- end .banner-form -->
                        </div> <!-- end .tab-panel -->
                        {{-- <div role="tabpanel" class="tab-pane fade" id="sell-car">
                        <form action="" method="" class="banner-form">
                            <div class="item">
                                <input type="text" placeholder="Brand">
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Model">
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Year">
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Price">
                            </div>
                            <div class="item">
                                <button type="submit" class="button solid light-blue">Submit</button>
                            </div>
                        </form>
                    </div>  --}}
                    </div> <!-- end .tab-content -->
                </div> <!-- end .tabpanel -->
            </div> <!-- end .container -->
        </div> <!-- end .inner -->
    </section> <!-- end .section -->

    <section class="section white text-center bg-texture">
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h1 class="main-heading">Welcome to Car Dealership</h1>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem eriam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                            beatae vitae dicta sunt explicabo.</p>
                    </div> <!-- end .col-sm-8 -->
                </div> <!-- end .row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="link-box blue"
                            style="background-image: url('{{ asset('asset/images/link-bg01.jpg') }}');">
                            <a href="{{ route('login') }}">
                                <div class="overlay">
                                    <span>Cars For</span>
                                    <h2>Selling</h2>
                                </div>
                            </a>
                        </div> <!-- end .link-box -->
                    </div> <!-- end .col-sm-4 -->
                    <div class="col-sm-6">
                        <div class="link-box green"
                            style="background-image: url('{{ asset('asset/images/link-bg02.jpg') }}');">
                            <a href="{{ route('list') }}">
                                <div class="overlay">
                                    <span>Cars To</span>
                                    <h2>Buy</h2>
                                </div>
                            </a>
                        </div> <!-- end .link-box -->
                    </div> <!-- end .col-sm-4 -->
                    {{-- <div class="col-sm-4">
                    <div class="link-box yellow"
                        style="background-image: url('{{ asset('asset/images/link-bg03.jpg')}}');">
                        <a href="#l">
                            <div class="overlay">
                                <span>Cars For</span>
                                <h2>Rent</h2>
                            </div>
                        </a>
                    </div>
                </div> --}}
                </div> <!-- end .row -->
            </div> <!-- end .container -->
        </div> <!-- end .inner -->
    </section> <!-- end .section -->

    <section class="section light no-padding-bottom">
        <div class="inner">
            <div class="container">
                <h1 class="main-heading">Featured Car Deals<small>Best Car Deals</small></h1>
                <div id="featured-cars-three" class="owl-carousel featured-cars three-cols">
                    @foreach ($featureAd as $data)
                        <div class="item">
                            <div class="featured-car">
                                <div class="image">
                                    <a href="{{ route('ads.show', $data->id) }}"><img
                                            src="{{ asset(getImageURL($data->attachment_id)) }}" alt="car"
                                            class="img-responsive"></a>
                                    <span class="sale-tag">For Sale</span>
                                </div> <!-- end .image -->
                                <div class="content">
                                    <div class="clearfix">
                                        <h5><a
                                                href="{{ route('ads.show', $data->id) }}">{{ $data->brandData ? $data->brandData->brand_name : '' }}</a>
                                        </h5>
                                        <span class="price">N{{ $data->price }}</span>
                                    </div> <!-- end .clearfix -->
                                    <div class="line"></div>
                                    <p>{{ $data->description }}</p>
                                </div> <!-- end .content -->
                                <div class="details clearfix">
                                    <div class="seats"><i class="icon-car-seat"></i>{{ $data->seats }}</div>
                                    <div class="fuel"><i class="icon-car-fuel"></i>{{ $data->fuel }}</div>
                                    <div class="type"><i class="icon-car-door"></i>{{ $data->doors }}</div>
                                </div> <!-- end .details -->
                            </div> <!-- end .featured-car -->
                        </div> <!-- end .item -->
                    @endforeach
                </div>

            </div> <!-- end .featured-cars -->

        </div> <!-- end .container -->
        </div> <!-- end .inner -->
    </section> <!-- end .section -->
    <section class="section small-top-padding white bg-texture" style="padding-top: 100px;">
        <div class="inner ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="listings">
                            <div class="heading clearfix">
                                <h1 class="main-heading">POPULAR CAR ADS<small>Best Car Deals</small></h1>
                            </div> <!-- end .heading -->
                            <div class="listings-grid clearfix listing-home">
                                @foreach ($ads as $key => $data)
                                    @if ($key < 3)
                                        <div class="listing">
                                            <div class="image"><a href="{{ route('ads.show', $data->id) }}"><img
                                                        src="{{ asset(getImageURL($data->attachment_id)) }}"
                                                        alt="listing" class="img-responsive"></a></div>
                                            <div class="content">
                                                <div class="title"><a
                                                        href="{{ route('ads.show', $data->id) }}">{{ $data->brandData ? $data->brandData->brand_name : '' }}</a>
                                                </div>
                                                <p>{{ $data->description }}</p>
                                                <div class="price">N{{ $data->price }}<span>/ for sale</span></div>
                                            </div>
                                        </div> <!-- end .listing -->
                                    @else
                                    @break
                                @endif
                            @endforeach


                        </div> <!-- end .listing-grid -->
                    </div> <!-- end .listings -->

                </div> <!-- end .col-sm-9 -->

            </div> <!-- end .row -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</section> <!-- end .section -->
<section class="section" style="background-color: #e5eaed !important;">
    <div class="inner" style="background-color: #e5eaed !important;">
        <div class="container">
            <h1 class="main-heading">How It Works<small>Best Car Deals</small></h1>
            <div class="services clearfix">
                <div class="service yellow">
                    <div class="icon">
                        <i class="icon-minicar"></i>
                        <div class="sub-icon">$</div> <!-- end .sub-icon -->
                    </div> <!-- end .icon -->
                    <div class="line"></div> <!-- end .line -->
                    <h5>Create an Account</h5>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                </div> <!-- end .service -->
                <div class="service orange">
                    <div class="icon">
                        <i class="icon-sports-car"></i>
                        <div class="sub-icon"><i class="ion-key"></i></div> <!-- end .sub-icon -->
                    </div> <!-- end .icon -->
                    <div class="line"></div> <!-- end .line -->
                    <h5>Post Free Car Ads</h5>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                </div> <!-- end .service -->
                <div class="service green">
                    <div class="icon">
                        <i class="icon-monster-truck"></i>
                        <div class="sub-icon">R</div> <!-- end .sub-icon -->
                    </div> <!-- end .icon -->
                    <div class="line"></div> <!-- end .line -->
                    <h5>Wait For Buyers</h5>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                </div> <!-- end .service -->
            </div> <!-- end .services -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</section> <!-- end .section -->
<section class="section bg-texture">
    <div class="inner">
        <div class="container">
            <div class="row" style="justify-content:space-between; display:flex;flex-wrap: wrap;">
                <div class="col-md-5 flex-col">
                    <img class="img-search" src="{{ asset('asset/images/car-icon.png') }}" alt="">
                    <h1 class="main-heading">Do You Want To Sell A Car?<small>Sellers</small></h1>
                    <p class="text-align">Post free car ads, add car details, boast revenue and get buyers from
                        different locations.</p>
                    <a class="button solid light-blue" href="{{ route('user') }}">Register Now</a>
                </div>
                <div class="col-md-5 flex-col">
                    <img class="img-search" src="{{ asset('asset/images/car-icon.png') }}" alt="">
                    <h1 class="main-heading">Do You Want To Buy A Car?<small>Buyers</small></h1>
                    <p class="text-align">Search and explore different cars, brand new and used cars, all on Mota.Ng.
                    </p>
                    <a class="button solid light-blue" href="{{ route('search') }}">Search Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="section white text-center">
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h1 class="main-heading">TOP CITIES</h1>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem eriam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                            beatae vitae dicta sunt explicabo.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="link-box blue"
                            style="background-image: url('{{ asset('asset/images/link-bg01.jpg') }}');">
                            <a href="#">
                                <div class="overlay">
                                    <h2>Kano</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="link-box green"
                            style="background-image: url('{{ asset('asset/images/link-bg02.jpg') }}');">
                            <a href="#l">
                                <div class="overlay">
                                    <h2>Kano</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="link-box yellow"
                            style="background-image: url('{{ asset('asset/images/link-bg03.jpg') }}');">
                            <a href="#l">
                                <div class="overlay">
                                    <h2>Kano</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="link-box yellow"
                            style="background-image: url('{{ asset('asset/images/link-bg03.jpg') }}');">
                            <a href="#l">
                                <div class="overlay">
                                    <h2>Kano</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="link-box green"
                            style="background-image: url('{{ asset('asset/images/link-bg02.jpg') }}');">
                            <a href="#l">
                                <div class="overlay">
                                    <h2>Kano</h2>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="link-box blue"
                            style="background-image: url('{{ asset('asset/images/link-bg01.jpg') }}');">
                            <a href="#l">
                                <div class="overlay">
                                    <h2>Kano</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  -->
<!-- <section class="section extra-top-padding white">
   <div class="inner">
    <div class="container">
     <h1 class="main-heading">Latest From The Blog<small>Best Car Deals</small></h1>
     <div class="blog-grid">
      <div class="blog-post">
       <a href="blog-post.html"><div class="blog-post-image" style="background-image: url('images/blog-post-image02.jpg');"></div></a>
       <div class="content">
        <div class="avatar"><img src="images/avatar02.jpg" alt="author name"></div>
        <div class="meta"><span class="author">by John Doe</span><span class="date">Tue, Aug 14, 12</span></div>
        <h4><a href="blog-post.html">The Grand Car Road Show 2014</a></h4>
        <p class="excerpt">Nam liber tempor cum soluta nobis eleife option congue nihil... <a href="blog-post.html">Read more</a></p>
       </div>
      </div>
      <div class="blog-post">
       <a href="blog-post.html"><div class="blog-post-image" style="background-image: url('images/blog-post-image02.jpg');"></div></a>
       <div class="content">
        <div class="avatar"><img src="images/avatar02.jpg" alt="author name"></div>
        <div class="meta"><span class="author">by John Doe</span><span class="date">Tue, Aug 14, 12</span></div>
        <h4><a href="blog-post.html">The Grand Car Road Show 2014</a></h4>
        <p class="excerpt">Nam liber tempor cum soluta nobis eleife option congue nihil... <a href="blog-post.html">Read more</a></p>
       </div>
      </div>
      <div class="blog-post">
       <a href="blog-post.html"><div class="blog-post-image" style="background-image: url('images/blog-post-image02.jpg');"></div></a>
       <div class="content">
        <div class="avatar"><img src="images/avatar02.jpg" alt="author name"></div>
        <div class="meta"><span class="author">by John Doe</span><span class="date">Tue, Aug 14, 12</span></div>
        <h4><a href="blog-post.html">The Grand Car Road Show 2014</a></h4>
        <p class="excerpt">Nam liber tempor cum soluta nobis eleife option congue nihil... <a href="blog-post.html">Read more</a></p>
       </div>
      </div>
     </div>
    </div>
   </div>
  </section> -->
<!-- end .section -->
@endsection
