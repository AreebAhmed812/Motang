 <!-- CSRF Token -->


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->


    <!-- Scripts -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
<style>
@media only screen and (max-width:768px) {
    .header .container{
        margin: 0 !important;
    }
    .responsive-menu-open {
    padding-right: 0;
    /* margin-top: 4%; */
}
}
@media only screen and (max-width:425px){
.responsive-menu-open{
    padding-right: 22px;
}
}
</style>
<body>
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
            <div class="title">Login</div> <!-- end .title -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->
<div class="container" style="margin:50px auto;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('userLogin') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a class="btn btn-link" href="{{ route('signUp') }}" style="padding:10px 0;">
                                    {{ __('Create a New Account') }}
                                </a>
                            </div>
                        </div>
                    </form>
                    @include('partials.alerts')
                </div>
            </div>
        </div>
    </div>
</div>
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
