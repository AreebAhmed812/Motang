<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="{{ asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('asset/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{{ asset('asset/fonts/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <!-- Cars -->
    <link href="{{ asset('asset/fonts/cars/style.css')}}" rel="stylesheet">
    <!-- FlexSlider -->
    <link href="{{ asset('asset/scripts/FlexSlider/flexslider.css')}}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{ asset('asset/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/css/owl.theme.default.css')}}" rel="stylesheet">
    <!-- noUiSlider -->
    <link href="{{ asset('asset/css/jquery.nouislider.min.css')}}" rel="stylesheet">
    <!-- Style.css -->
    <link href="{{ asset('asset/css/style.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
   
    @yield('main')
    <footer class="footer">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <h5>About Us</h5>
                        <p>Mota.ng is your one-stop shop for buying and selling cars and trucks. As a dealer or private
                            owner, you can simply upload pictures of your vehicle, with a brief description and price,
                            in order to attract the right buyer. Buyers and Sellers on our platform are advised to
                            physically examine any vehicle posted before paying for it.
                            Mota.ng will not be liable for any third-party mischaracterization.
                        </p>
                        <hr />
                        <div class="iconbox-left">
                            <div class="icon"><i class="fa fa-map-marker"></i></div> <!-- end .icon -->
                            <div class="content">
                                <p>3015 Grand Ave, Coconut Grove, Merrick Way, FL 12345</p>
                            </div> <!-- end .content -->
                        </div> <!-- end .iconbox-left -->
                        <div class="iconbox-left">
                            <div class="icon"><i class="fa fa-envelope"></i></div> <!-- end .icon -->
                            <div class="content">
                                <p>info@mota.ng</p>
                            </div> <!-- end .content -->
                        </div> <!-- end .iconbox-left -->
                        <div class="iconbox-left">
                            <div class="icon"><i class="fa fa-phone"></i></div> <!-- end .icon -->
                            <div class="content">
                                <p>123-456-7890</p>
                            </div> <!-- end .content -->
                        </div> <!-- end .iconbox-left -->
                    </div> <!-- end .col-sm-4 -->
                    <div class="col-sm-4">
                        <h5>Quick Link</h5>
                        <div class="featured-deals">
                            <a href="/" class="clearfix">
                                <h5>Home</h5>
                                <!-- <span class="price">$80,000</span> -->
                            </a>
                            <!-- <p>Nam liber tempor cum soluta nobis eleife wheelers as option congue nihil…</p> -->
                        </div> <!-- end .featured-deals -->
                        <div class="featured-deals">
                            <a href="{{route('list')}}" class="clearfix">
                                <h5>Buy a Car</h5>
                                <!-- <span class="price">$80,000</span> -->
                            </a>
                            <!-- <p>Nam liber tempor cum soluta nobis eleife wheelers as option congue nihil…</p> -->
                        </div> <!-- end .featured-deals -->
                        <div class="featured-deals">
                            <a href="{{route('login')}}" class="clearfix">
                                <h5>Sell Cars</h5>
                                <!-- <span class="price">$80,000</span> -->
                            </a>
                            <!-- <p>Nam liber tempor cum soluta nobis eleife wheelers as option congue nihil…</p> -->
                        </div> <!-- end .featured-deals -->
                        <div class="featured-deals">
                            <a href="{{route('aboutUs')}}" class="clearfix">
                                <h5>About Us</h5>
                                <!-- <span class="price">$80,000</span> -->
                            </a>
                            <!-- <p>Nam liber tempor cum soluta nobis eleife wheelers as option congue nihil…</p> -->
                        </div> <!-- end .featured-deals -->
                        <div class="featured-deals">
                            <a href="{{route('contact')}}" class="clearfix">
                                <h5>Contact Us</h5>
                                <!-- <span class="price">$80,000</span> -->
                            </a>
                            <!-- <p>Nam liber tempor cum soluta nobis eleife wheelers as option congue nihil…</p> -->
                        </div> <!-- end .featured-deals -->
                        <div class="featured-deals">
                            <a href="{{route('termsConditions')}}" class="clearfix">
                                <h5>Terms & Condition</h5>
                                <!-- <span class="price">$80,000</span> -->
                            </a>
                            <!-- <p>Nam liber tempor cum soluta nobis eleife wheelers as option congue nihil…</p> -->
                        </div> <!-- end .featured-deals -->
                        <div class="featured-deals">
                            <a href="{{route('privacyPolicy')}}" class="clearfix">
                                <h5>Privacy Policy</h5>
                                <!-- <span class="price">$80,000</span> -->
                            </a>
                            <!-- <p>Nam liber tempor cum soluta nobis eleife wheelers as option congue nihil…</p> -->
                        </div> <!-- end .featured-deals -->
                    </div> <!-- end .col-sm-4 -->
                    <div class="col-sm-4">
                        <h5>Get in Touch</h5>
                        <form action="" method="post" id="footer-contact-form" target="_blank">
                            
                            {{-- <div class="form-group">
                                <input type="text" class="contact-name"  id="name" name="name" placeholder="Name*"
                                required />
                            </div> <!-- end .form-group --> --}}
                            <div class="form-group">
                                <input type="email" id="email" class="contact-email" name="email" placeholder="Email*"
                                required />
                                {{-- <input type="email" class="contact-email" name="contact-email" placeholder="Email" /> --}}
                            </div> <!-- end .form-group -->
                            {{-- <div class="form-group">
                                <textarea name="message" id="message" class="contact-message" placeholder="Comment*"
                                required rows="7"></textarea>
                            </div> <!-- end .form-group --> --}}
                            <div class="form-group">
                                <a type="submit" class="button light-blue" href="mailto:info@motang.com">Submit</a>
                            </div> <!-- end .form-group -->
                         
                            <div id="contact-loading" class="alert alert-info form-alert">
                                <span class="icon"><i class="fa fa-info"></i></span>
                                <span class="message">Loading...</span>
                            </div>
                            <div id="contact-success" class="alert alert-success form-alert">
                                <span class="icon"><i class="fa fa-check"></i></span>
                                <span class="message">Success!</span>
                            </div>
                            {{-- <div id="contact-error" class="alert alert-danger form-alert">
                                <span class="icon"><i class="fa fa-times"></i></span>
                                <span class="message">Error!</span>
                            </div> --}}
                        </form> <!-- end contact-form -->
                        <h5 class="mt32">Follow Us</h5>
                            <div class="icon"><a class="white" href="www.facebook.com"><i class="fa fa-facebook"></i></a>
                            <a class="white" href="www.instagram.com"><i class="fa fa-instagram"></i></a>
                            <a class="white" href="www.twitter.com"><i class="fa fa-twitter"></i></a></div>
                    </div> <!-- end .col-sm-4 -->
                </div> <!-- end .row -->
            </div> <!-- end .container -->
        </div> <!-- end .top -->
        <div class="bottom">
            <span class="copyright">Developed & Designed by Velox Tech</span>
            <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fa fa-chevron-up"></i></a>
        </div> <!-- end .bottom -->
    </footer> <!-- end .footer -->

    <!-- jQuery -->
    <script src="{{ asset('asset/js/jquery-1.11.2.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('asset/js/bootstrap.min.js')}}"></script>
    <!-- Inview -->
    <script src="{{ asset('asset/js/jquery.inview.min.js')}}"></script>
    <!-- google maps -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp')}}"></script> --}}
    <!-- Tweetie -->
    <script src="{{ asset('asset/scripts/Tweetie/tweetie.min.js')}}"></script>
    <!-- FlexSlider -->
    
    <script src="{{ asset('asset/scripts/FlexSlider/jquery.flexslider-min.js')}}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('asset/js/owl.carousel.min.js')}}"></script>
    <!-- Isotope -->
    <script src="{{ asset('asset/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('asset/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- noUiSlider -->
    <script src="{{ asset('asset/js/jquery.nouislider.all.min.js')}}"></script>
    <!-- Scripts.js -->
    <script src="{{ asset('asset/js/scripts.js')}}"></script>

</body>

</html>