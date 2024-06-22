@extends('theme/layout-front/header')
@section('title','Reports')
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
            <div class="title">Car Details</div> <!-- end .title -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->


<section class="section white">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="contact">
                        <h4>Feedback</h4>
                        <div class="col-lg-8 col-md-12 col-xs-12">
                            <div class="details-box mt-1 mb-5">
                                <div class="ads-details-info">
                                    <h2 class="text-center text-dark">Report For</h2>
                                    <h6 class="text-center"><b>Toyota Venza 2013 Black</b></h6>
                                    <form action="{{route('reports.store')}}" method="POST">
                                        <div class="form-group mb-3">
                                            <select class="form-control" name="report" required="">
                                                <option value="">Reason</option>
                                                <option value="Seller asked for prepayment">Seller asked for prepayment
                                                </option>
                                                <option value="The ads is spam">The ads is spam</option>
                                                <option value="It is sold">It is sold</option>
                                                <option value="The ads is illegal">The ads is illegal</option>
                                                <option value="The price is wrong">The price is wrong</option>
                                                <option value="Wrong category">Wrong category</option>
                                                <option value="User is unreachable">User is unreachable</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" name="description" rows="5" placeholder="Description"
                                                required=""></textarea>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-common btn-block" name="report">Submit
                                                Report</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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