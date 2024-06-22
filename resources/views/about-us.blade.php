@extends('theme/layout-front/header')
@section('title','About Us')
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
                    <li class="active">
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
<div class="page-title" style="background-image: url('{{asset('asset/images/background01.jpg')}}');">
    <div class="inner">
        <div class="container">
            <div class="title">About us</div> <!-- end .title -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->
<section class="section white">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <img src="{{asset('asset/images/about.jpg')}}" alt="about" class="img-responsive">
                </div> <!-- end .col-sm-7 -->
                <div class="column-spacer"></div>
                <div class="col-sm-5">
                    <h5 class="xsmall-heading"><strong>What We Are</strong></h5>
                    <p>Mota.ng is a subsidiary of One-stop Auto Imports Solutions Limited. You can buy and sell your
                        cars and trucks here. As a dealer or private owner, you can simply upload pictures of your
                        vehicle, with a brief description and price, in order to attract the right buyer. Buyers and
                        Sellers on our platform are advised to physically examine any vehicle posted before paying for
                        it. Mota.ng will not be liable for any third-party mischaracterization.</p>
                </div> <!-- end .col-sm-5 -->
            </div>
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</section> <!-- end .section -->

{{-- <!-- <section class="section light">
    <div class="inner">
        <div class="container">
            <div id="team-slider" class="owl-carousel team-slider">
                <div class="item">
                    <div class="team-member" style="background-image: url('{{asset('asset/images/team01.jpg')}}');">
                        <div class="about">
                            <span class="name">John Smith</span><span class="title">Selling Team Head</span>
                            <div class="social-icons">
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="item">
                    <div class="team-member" style="background-image: url('{{asset('asset/images/team02.jpg')}}');">
                        <div class="about">
                            <span class="name">John Smith</span><span class="title">Selling Team Head</span>
                            <div class="social-icons">
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                            </div> 
                        </div>
                    </div> 
                </div> 
                <div class="item">
                    <div class="team-member" style="background-image: url('{{asset('asset/images/team03.jpg')}}');">
                        <div class="about">
                            <span class="name">John Smith</span><span class="title">Selling Team Head</span>
                            <div class="social-icons">
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="item">
                    <div class="team-member" style="background-image: url('{{asset('asset/images/team04.jpg')}}');">
                        <div class="about">
                            <span class="name">John Smith</span><span class="title">Selling Team Head</span>
                            <div class="social-icons">
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                            </div> 
                        </div>
                    </div>
                </div> 
                <div class="item">
                    <div class="team-member" style="background-image: url('{{asset('asset/images/team02.jpg')}}');">
                        <div class="about">
                            <span class="name">John Smith</span><span class="title">Selling Team Head</span>
                            <div class="social-icons">
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                            </div> 
                        </div>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</section>  --> --}}

<section class="section white bg-texture">
    <div class="inner">
        <div class="container">
            <h1 class="main-heading">HOW IT WORKS?<small>Best Car Deals</small></h1>
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

@endsection