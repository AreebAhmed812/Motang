@extends('theme/layout-front/header')
@section('title','Listing')
@section('main')
<header class="header">
    <div class="container">
        <div class="navigation clearfix">
            <div class="logo"><a href="/"><img src="{{ asset('asset/images/logo.png')}}" alt="Automan"
                        class="img-responsive"></a></div> <!-- end .logo -->
            <div class="login"><a href="#"><i class="ion-ios-person"></i></a></div> <!-- end .login -->
            <div class="contact">
                <div class="line"></div>
                <a href="{{route('contact')}}"><i class="fa fa-phone"></i></a>
            </div> <!-- end .contact -->
            <nav class="main-nav">
                <ul class="list-unstyled">
                    <li >
                        <a href="/">Home</a>

                    </li>
                    <li class="active">
                        <a href="{{route('list')}}">Buy A Car</a>
                        <!-- <ul>
                                <li><a href="#">Add Car Details</a></li>
                                <li><a href="choose-specification.html">Choose Specification</a></li>
                                <li><a href="contact-details.html">Contact Details</a></li>
                                <li><a href="photos-videos.html">Photos Videos</a></li>
                                <li><a href="pay-publish.html">Pay Publish</a></li>
                            </ul> -->
                    </li>
                    <li>
                        <a href="{{route('user')}}">Sell Cars</a>
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
                        <a href="{{route('aboutUs')}}">About Us</a>
                        <!-- <ul>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>
                            </ul> -->
                    </li>
                    <li><a href="{{route('contact')}}">Contact Us</a></li>
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
<div class="page-title" style="background-image: url('{{ asset('asset/images/background01.jpg')}}');">
    <div class="inner">
        <div class="container">
            <div class="title">Car Listing</div> <!-- end .title -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->

<section class="section small-top-padding white">
    <div class="inner">
        <div class="container">
            <div class="row flex-tablet">
                <div class="col-sm-9">
                    <div class="listings">
                        <div class="heading clearfix">
                            <h5>Results Found</h5>
                            <div class="view">
                                <a class="list" href="#" class="active"><i class="fa fa-th-list"></i></a>
                                <a class="grid" href="#"><i class="fa fa-th"></i></a>
                            </div> <!-- end .view -->
                        <div class="select-wrapper sort">
                            <!-- <select class="selectpicker">
                                <option>Sort By</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                            </select> -->
                        </div> <!-- end .select-wrapper -->
                        </div> <!-- end .heading -->
                        <div class="listings-list clearfix">
                            @foreach($ads as $data)
                                <div class="listing">
                                    <div class="image"
                                        style="background-image: url('{{  asset(getImageURL($data->attachment_id))}}');"></div>
                                    <div class="details">
                                        <div class="item"><span>{{$data->seats}}</span><i class="icon-car-seat"></i></div>
                                        <div class="item"><span>{{$data->fuel}}</span><i class="icon-car-fuel"></i></div>
                                        <div class="item"><span>{{$data->doors}}</span><i class="icon-car-door"></i></div>
                                        <div class="item"><span>{{$data->transmission}}</span><i class="icon-car-gear"></i></div>
                                    
                                    </div> <!-- end .details -->
                                    <div class="content">
                                        {{-- <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star-o"></i></div> --}}
                                        <div class="title"><a href="{{route('ads.show',$data->id)}}">{{($data->brandData) ? $data->brandData->brand_name : ''}}</a></div>
                                        <p>{{$data->description}}</p>
                                        <a href="{{route('ads.show',$data->id)}}" class="button border">View Detials</a>
                                        <div class="price">N{{$data->price}}<span>/ for sale</span></div>
                                    </div> <!-- end .content -->
                                </div> <!-- end .listing -->
                                @endforeach
                                
                        </div> <!-- end .listings -->
                        <div class="listings-grid clearfix search-page">
                            @foreach($ads as $data)
                                <div class="listing">
                                    <div class="image"><a href="{{route('ads.show',$data->id)}}"><img src="{{  asset(getImageURL($data->attachment_id))}}"
                                                alt="listing" class="img-responsive"></a></div>
                                    <div class="content">
                                        <div class="title"><a href="{{route('ads.show',$data->id)}}">{{($data->brandData) ? $data->brandData->brand_name : ''}}</a>
                                        </div>
                                        <p>{{$data->description}}</p>
                                        <div class="price">N{{$data->price}}<span>/ for sale</span></div>
                                    </div>
                                </div> <!-- end .listing -->
                                @endforeach
                        </div> <!-- end .listing-grid -->
                    </div> <!-- end .listing-grid -->
                    
                    <div class="pagination-wrapper">
                        {{ $ads->links() }}
                    </div>
                </div> <!-- end .col-sm-9 -->
                <div class="col-sm-3">
                    <div class="refine-search">
                        <div class="title clearfix">Refine Your Search<i class="fa fa-search pull-right"></i></div>
                        <form action="{{ url('search')}}" method="GET">
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <!-- <input type="text" name="search" value="{{Request::get('search')}}"> -->
                                    <select class="selectpicker" name="doors" value="{{Request::get('doors')}}">
                                        <option value="" selected>Doors</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                    <!-- <span class="arrow"><i class="fa fa-caret-down"></i></span> -->
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <!-- <input type="text" name="search" value="{{Request::get('search')}}"> -->
                                    <select class="selectpicker" name="color" value="{{Request::get('color')}}">
                                        <option value="" selected>Colors</option>
                                        <option>Brown</option>
                                        <option>Beige</option>
                                        <option>Black</option>
                                        <option>Blue</option>
                                        <option>Brown</option>
                                        <option>Gold</option>
                                        <option>Gray</option>
                                        <option>Green</option>
                                        <option>Orange</option>
                                        <option>Pearl</option>
                                        <option>Pink</option>
                                        <option>Purple</option>
                                        <option>Red</option>
                                        <option>Silver</option>
                                        <option>White</option>
                                        <option>Yellow</option>
                                        <option>Other</option>
                                    </select>
                                    <!-- <span class="arrow"><i class="fa fa-caret-down"></i></span> -->
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <select class="selectpicker" name="model" value="{{Request::get('model')}}">
                                        <option value="" selected>Model</option>
                                        @php
                                        $addedBrands = [];
                                        @endphp
                                        @foreach($ads as $data)
                                        @php
                                        $brandName = ($data->brandData) ? $data->brandData->brand_name : '';
                                        @endphp
                                        @if (!in_array($brandName, $addedBrands))
                                        <option value="{{$data->brandData->id}}">{{ $brandName }}</option>
                                        @php
                                        $addedBrands[] = $brandName;
                                        @endphp
                                        @endif
                                        @endforeach
                                    </select>
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <select class="selectpicker" name="registered"
                                        value="{{Request::get('registered')}}">
                                        <option value="" selected>Registered</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <input type="number" class="selectpicker btn dropdown-toggle selectpicker btn-default" name="min_price"
                                        placeholder="Minimum Price" value="{{ Request::get('min_price') }}" min="0">
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                <input type="number" class="selectpicker btn dropdown-toggle selectpicker btn-default" name="max_price"
                                        placeholder="Maximum Price" value="{{ Request::get('max_price') }}" min="0">
                          
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <span class="price-slider-value">Price: <span id="price-min"></span> - <span
                                        id="price-max"></span></span>
                                <div id="price-slider"></div>
                            </div>   -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <select class="selectpicker" name="fuel" value="{{Request::get('fuel')}}">
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
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <select class="selectpicker" name="location" value="{{Request::get('location')}}">
                                        <option value="" selected>Location</option>
                                        <option>Akwa Ibom</option>
                                        <option>Abia</option>
                                        <option>Abuja (FCT)</option>
                                        <option>Adamawa</option>
                                        <option>Akwa Ibom</option>
                                        <option>Anambra</option>
                                        <option>Bauchi</option>
                                        <option>Bayelsa</option>
                                        <option>Benue</option>
                                        <option>Borno</option>
                                        <option>Cross River</option>
                                        <option>Delta</option>
                                        <option>Ebonyi</option>
                                        <option>Edo</option>
                                        <option>Ekiti</option>
                                        <option>Enugu</option>
                                        <option>Gombe</option>
                                        <option>Imo</option>
                                        <option>Jigawa</option>
                                        <option>Kaduna</option>
                                        <option>Kano</option>
                                        <option>Katsina</option>
                                        <option>Kebbi</option>
                                        <option>Kogi</option>
                                        <option>Kwara</option>
                                        <option>Lagos</option>
                                        <option>Nassarawa</option>
                                        <option>Niger</option>
                                        <option>Ogun</option>
                                        <option>Ondo</option>
                                        <option>Osun</option>
                                        <option>Oyo</option>
                                        <option>Plateau</option>
                                        <option>Rivers</option>
                                        <option>Sokoto</option>
                                        <option>Taraba</option>
                                        <option>Yobe</option>
                                        <option>Zamfara</option>
                                    </select>
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <select class="selectpicker" name="year" value="{{Request::get('year')}}">
                                        <option value="" selected>Year</option>
                                        @php
                                        $addedYears = [];
                                        @endphp

                                        @foreach($ads as $data)
                                        @php

                                        $year = ($data->yearData) ? $data->yearData->year : '';
                                        @endphp

                                        @if (!in_array($year, $addedYears))
                                        <option value="{{($data->yearData) ? $data->yearData->id : ''}}">{{ $year }}</option>
                                        @php
                                        $addedYears[] = $year;
                                        @endphp
                                        @endif
                                        @endforeach

                                    </select>
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <select class="selectpicker" name="condition" value="{{Request::get('condition')}}">
                                        <option value="" selected>All Condition</option>
                                        <option>Brand New</option>
                                        <option>Nigerian Used</option>
                                        <option>Foreign Used</option>
                                    </select>
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <select class="selectpicker" name="transmission"
                                        value="{{Request::get('transmission')}}">
                                        <option value="" selected>All Transmission</option>
                                        <option>Automatic</option>
                                        <option>Manual</option>
                                        <option>Semi Automatic</option>
                                        <option>Tiptronic</option>
                                    </select>
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <button type="submit" class="button solid yellow block">Search</button>
                        </form>
                    </div> <!-- end .refine-search -->
                    <div class="call-to-action sidebar-cta">
                        <div class="image"><img src="{{asset('asset/images/cta2.jpg')}}" alt="alt"
                                class="img-responsive"></div>
                        <div class="content">
                            <h4>Sell your Car</h4>
                            <p>Submit detail and sell it Nam liber tempor cum soluta nobis eleife option congue nihil…
                            </p>
                            <a href="{{ route('login') }}" class="button border white">Submit Car</a>
                        </div> <!-- end .content -->
                    </div> <!-- end .call-to-action -->
                </div> <!-- end .col-sm-3 -->
            </div> <!-- end .row -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</section> <!-- end .section -->
@endsection
