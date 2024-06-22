@extends('theme/layout-front/header')
@section('title','Search Cars')
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
{{-- @dd($selectedData['fuel']); --}}
<section class="section small-top-padding white">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="listings">
                        <div class="heading clearfix">

                            <h5>{{($search->count() >0)?'Found Result':'Result Not Found'}}</h5>
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
                            @foreach($search as $data)

                            <div class="listing">
                                <div class="image"
                                    style="background-image: url('{{  asset(getImageURL($data->attachment_id))}}');">
                                </div>
                                <div class="details">
                                    <div class="item"><span>{{$data->seats}}</span><i class="icon-car-seat"></i></div>
                                    <div class="item"><span>{{$data->fuel}}</span><i class="icon-car-fuel"></i></div>
                                    <div class="item"><span>{{$data->doors}}</span><i class="icon-car-door"></i></div>
                                    <div class="item"><span>{{$data->transmission}}</span><i class="icon-car-gear"></i>
                                    </div>

                                </div> <!-- end .details -->
                                <div class="content">
                                    {{-- <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star-o"></i></div> --}}
                                    <div class="title"><a
                                            href="{{route('ads.show',$data->id)}}">{{($data->brandData) ? $data->brandData->brand_name : ''}}</a>
                                    </div>
                                    <p>{{$data->description}}</p>
                                    <a href="{{route('ads.show',$data->id)}}" class="button border">View Detials</a>
                                    <div class="price">{{$data->price}}<span>/ for sale</span></div>
                                </div> <!-- end .content -->
                            </div> <!-- end .listing -->
                            @endforeach

                        </div> <!-- end .listings -->
                        <div class="listings-grid clearfix search-page">
                        @foreach($search as $data)
                            <div class="listing">
                                <div class="image"><a href="{{route('ads.show',$data->id)}}"><img src="{{  asset(getImageURL($data->attachment_id))}}"
                                            alt="listing" class="img-responsive"></a></div>
                                <div class="content">
                                    <div class="title"><a href="{{route('ads.show',$data->id)}}">{{($data->brandData) ? $data->brandData->brand_name : ''}}</a>
                                    </div>
                                    <p>{{$data->description}}</p>
                                    <div class="price">${{$data->price}}<span>/ for sale</span></div>
                                </div>
                            </div> <!-- end .listing -->
                            @endforeach
                        </div> <!-- end .listing-grid -->
                    </div> <!-- end .listing-grid -->
                    <div class="pagination-wrapper">

                    </div>
                </div> <!-- end .col-sm-9 -->
                <div class="col-sm-3">
                    <div class="refine-search">
                        <div class="title clearfix">Refine Your Search<i class="fa fa-search pull-right"></i></div>
                        <form action="{{ url('search')}}" method="GET">
                            <div class="form-group">
                                <div class="select-wrapper">
                                    <!-- <input type="text" name="search" value="{{Request::get('search')}}"> -->
                                    {!! Form::select('doors', [
                                        '' => 'Doors',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '5' => '5',
                                        '6' => '6',
                                        '7' => '7',
                                        '8' => '8',
                                        '9' => '9',
                                        '10' => '10',
                                    ], Request::get('doors'), ['class' => 'selectpicker']) !!}
                                    
                                    <!-- <span class="arrow"><i class="fa fa-caret-down"></i></span> -->
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    {!! Form::select('color', [
                                        '' => 'Colors',
                                        'Brown' => 'Brown',
                                        'Beige' => 'Beige',
                                        'Black' => 'Black',
                                        'Blue' => 'Blue',
                                        'Gold' => 'Gold',
                                        'Gray' => 'Gray',
                                        'Green' => 'Green',
                                        'Orange' => 'Orange',
                                        'Pearl' => 'Pearl',
                                        'Pink' => 'Pink',
                                        'Purple' => 'Purple',
                                        'Red' => 'Red',
                                        'Silver' => 'Silver',
                                        'White' => 'White',
                                        'Yellow' => 'Yellow',
                                        'Other' => 'Other',
                                    ], Request::get('color'), ['class' => 'selectpicker']) !!}

                                    <!-- <span class="arrow"><i class="fa fa-caret-down"></i></span> -->
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    {!! Form::select('model', ['' => 'Model'] + $ads->mapWithKeys(function ($data) {
                                        $brandName = optional($data->brandData)->brand_name;
                                        return [$data->brandData->id => $brandName];
                                    })->unique()->toArray(), Request::get('model'), ['class' => 'selectpicker']) !!}
                                    
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    {!! Form::select('registered', [
    '' => 'Registered',
    '1' => 'Yes',
    '0' => 'No',
], Request::get('registered'), ['class' => 'selectpicker']) !!}

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
                                    {!! Form::number('max_price', Request::get('max_price'), [
                                        'class' => 'selectpicker btn dropdown-toggle selectpicker btn-default',
                                        'placeholder' => 'Maximum Price',
                                        'min' => 0
                                    ]) !!}
                                    
                          
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <span class="price-slider-value">Price: <span id="price-min"></span> - <span
                                        id="price-max"></span></span>
                                <div id="price-slider"></div>
                            </div>   -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    {!! Form::select('fuel', [
                                        '' => 'Fuel',
                                        'Petrol' => 'Petrol',
                                        'Diesel' => 'Diesel',
                                        'Petrol/Electric Hybrid' => 'Petrol/Electric Hybrid',
                                        'Natural Gas' => 'Natural Gas',
                                        'Gasoline/Electric' => 'Gasoline/Electric',
                                        'Flex-Fuel' => 'Flex-Fuel',
                                        'Electric' => 'Electric',
                                        'Diesel/Electric Hybrid' => 'Diesel/Electric Hybrid'
                                    ], Request::get('fuel'), ['class' => 'selectpicker']) !!}

                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    {!! Form::select('location', [
                                        '' => 'Location',
                                        'Akwa Ibom' => 'Akwa Ibom',
                                        'Abia' => 'Abia',
                                        'Abuja (FCT)' => 'Abuja (FCT)',
                                        'Adamawa' => 'Adamawa',
                                        'Anambra' => 'Anambra',
                                        'Bauchi' => 'Bauchi',
                                        'Bayelsa' => 'Bayelsa',
                                        'Benue' => 'Benue',
                                        'Borno' => 'Borno',
                                        'Cross River' => 'Cross River',
                                        'Delta' => 'Delta',
                                        'Ebonyi' => 'Ebonyi',
                                        'Edo' => 'Edo',
                                        'Ekiti' => 'Ekiti',
                                        'Enugu' => 'Enugu',
                                        'Gombe' => 'Gombe',
                                        'Imo' => 'Imo',
                                        'Jigawa' => 'Jigawa',
                                        'Kaduna' => 'Kaduna',
                                        'Kano' => 'Kano',
                                        'Katsina' => 'Katsina',
                                        'Kebbi' => 'Kebbi',
                                        'Kogi' => 'Kogi',
                                        'Kwara' => 'Kwara',
                                        'Lagos' => 'Lagos',
                                        'Nassarawa' => 'Nassarawa',
                                        'Niger' => 'Niger',
                                        'Ogun' => 'Ogun',
                                        'Ondo' => 'Ondo',
                                        'Osun' => 'Osun',
                                        'Oyo' => 'Oyo',
                                        'Plateau' => 'Plateau',
                                        'Rivers' => 'Rivers',
                                        'Sokoto' => 'Sokoto',
                                        'Taraba' => 'Taraba',
                                        'Yobe' => 'Yobe',
                                        'Zamfara' => 'Zamfara',
                                    ], Request::get('location'), ['class' => 'selectpicker']) !!}
                                    
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    {!! Form::select('year', ['' => 'Year'] + $ads->mapWithKeys(function ($data) {
                                        $year = optional($data->yearData)->year;
                                        return [$year => ($data->yearData) ? $data->yearData->id : ''];
                                    })->unique()->toArray(), Request::get('year'), ['class' => 'selectpicker']) !!}
                                    
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    {!! Form::select('condition', [
                                        '' => 'All Condition',
                                        'Brand New' => 'Brand New',
                                        'Nigerian Used' => 'Nigerian Used',
                                        'Foreign Used' => 'Foreign Used',
                                    ], Request::get('condition'), ['class' => 'selectpicker']) !!}
                                    
                                </div> <!-- end .select-wrapper -->
                            </div> <!-- end .form-group -->
                            <div class="form-group">
                                <div class="select-wrapper">
                                    {!! Form::select('transmission', [
                                        '' => 'All Transmission',
                                        'Automatic' => 'Automatic',
                                        'Manual' => 'Manual',
                                        'Semi Automatic' => 'Semi Automatic',
                                        'Tiptronic' => 'Tiptronic',
                                    ], Request::get('transmission'), ['class' => 'selectpicker']) !!}
                                    
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
