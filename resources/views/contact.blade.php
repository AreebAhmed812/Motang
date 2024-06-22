@extends('theme/layout-front/header')
@section('title','Contact Us')
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
                    <li>
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
                    <li class="active"><a href="{{route('contact')}}">Contact Us</a></li>
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
<div class="page-title" style="background-image: url('{{asset('asset/images/background01.jpg')}}');">
    <div class="inner">
        <div class="container">
            <div class="title">Contact us</div> <!-- end .title -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->

<!-- <div id="map" class="map"></div> -->

<section class="section white">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="contact">
                        <h4>Contact Form</h4>
                        <form action="{{route('contact.store')}}" method="post" id="contact-form">
                            <div class="row">
                                <div class="col-sm-6">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" placeholder="Name*"
                                            required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" placeholder="Email*"
                                            required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="tel" id="phone" name="phone" placeholder="Phone" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" id="subject" name="subject"
                                            placeholder="Subject" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" placeholder="Comment*"
                                            required rows="7"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button light-blue">Submit</button>
                            </div>
                            @include('partials.alerts')
                            <div id="contact-loading" class="alert alert-info form-alert">
                                <span class="icon"><i class="fa fa-info"></i></span>
                                <span class="message">Loading...</span>
                            </div>
                            <div id="contact-success" class="alert alert-success form-alert">
                                <span class="icon"><i class="fa fa-check"></i></span>
                                <span class="message">Success!</span>
                            </div>
                            <div id="contact-error" class="alert alert-danger form-alert">
                                <span class="icon"><i class="fa fa-times"></i></span>
                                <span class="message">Error!</span>
                            </div>
                        </form>
                    </div> <!-- end .contact -->
                </div> <!-- end .col-sm-8 -->
                <div class="col-sm-4">
                    <div class="contact-details">
                        <div class="item">
                            <div class="icon"><i class="ion-ios-location-outline"></i></div>
                            <div class="content">
                                <h6>Address</h6>
                                <span>Lorem Ipsum is simply dummy text printing and type setting industry 5562. po
                                    alpu</span>
                            </div> <!-- end .content -->
                        </div> <!-- end .item -->
                        <div class="item">
                            <div class="icon"><i class="ion-ios-telephone-outline"></i></div>
                            <div class="content">
                                <h6>Phone</h6>
                                <span>Office: 0477-8556 55 2</span>
                                <span>Mobile: +91 556 333 245</span>
                            </div> <!-- end .content -->
                        </div> <!-- end .item -->
                        <div class="item">
                            <div class="icon"><i class="ion-ios-email-outline"></i></div>
                            <div class="content">
                                <h6>Email</h6>
                                <span>Office: info@automan.com</span>
                                <span>Mobile: +91 556 333 245</span>
                            </div> <!-- end .content -->
                        </div> <!-- end .item -->
                    </div> <!-- end .contact-details -->
                </div> <!-- end .col-sm-4 -->
            </div> <!-- end .row -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</section> <!-- end .section -->

@endsection