
@extends('theme/layout-front/header')
@section('title','Detail')
@section('main')
<style>
    .owl-stage{
	background-color: #000;
}
@media only screen and (max-width:320px){
    .car-details .main-car-details .item .option-content,
    .car-details .main-car-details .item .option{
        font-size: 13px;
    }
    .widget > .agent-inner > ul.fa-ul.text-dark > li{font-size: 11px;}
}
</style>
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
            <div class="car-details">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="clearfix">
                            <div class="title">{{($ad->brandData) ? $ad->brandData->brand_name : ''}}</div>
                            <!-- <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div> -->
                        </div>
                        <div id="car-details-slider" class="image">
                            @foreach (getMultiImageLink($ad->attachment_id) as $imagelink)

                            <div class="item d-flex align-items-center justify-content-center">
                                <img src="{{$imagelink}}" alt="alt" class="img-responsive img-fluid"  style="max-width: 100%; max-height: 100%;">
                            </div>
                            @endforeach

                        </div>
                        <div class="tabpanel border" role="tabpanel">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#heading-tab4"
                                        aria-controls="heading-tab4" role="tab" data-toggle="tab">Description</a>
                                </li>
                                {{-- <li role="presentation"><a href="#heading-tab5" aria-controls="heading-tab5" role="tab"
                                        data-toggle="tab">Car Specifications</a></li>
                                <li role="presentation"><a href="#heading-tab6" aria-controls="heading-tab6" role="tab"
                                        data-toggle="tab">Other Details</a></li> --}}
                            </ul> <!-- end .nav-tabs -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="heading-tab4">
                                    <p>{{$ad->description}}</p>

                                </div> <!-- end .tab-panel -->
                                {{-- <div role="tabpanel" class="tab-pane fade" id="heading-tab5">
                                    <p>{{($ad->brandData) ? $ad->brandData->brand_name : ''}}</p>
                                    <p>{{($ad->modelData) ? $ad->modelData->model : ''}}</p>
                                    <p>{{($ad->yearData) ? $ad->yearData->year : ''}}</p>
                                    <p>{{$ad->color}}</p>
                                    <p>{{$ad->location}}</p>

                                    <p>{{$ad->transmission}}</p>

                                    <p>{{$ad->fuel}}</p>
                                    <p>{{$ad->seats}}</p>
                                    <p>{{$ad->doors}}</p>
                                </div> <!-- end .tab-panel -->
                                <div role="tabpanel" class="tab-pane fade" id="heading-tab6">
                                    <p>{{$ad->description}}</p>

                                </div> <!-- end .tab-panel --> --}}
                            </div> <!-- end .tab-content -->
                        </div> <!-- end .tabpanel -->
                    </div> <!-- end .col-sm-8 -->
                    <div class="col-sm-4">
                        <div class="buttons">
                            <a href="{{route('feedbacks.show',$ad->id)}}" class="button border dark feedback-btn">Feedback</a>
                            <a href="{{route('reports.show',$ad->id)}}" class="button border blue feedback-btn" >Report Abuse</a>
                        </div>
                        <div class="price">N{{$ad->price}} <span>/ for sale</span></div>
                        <div class="main-car-details">
                            <div class="item clearfix">
                                <div class="option">Name</div>
                                <div class="option-content">{{($ad->user) ? formatToHumanView($ad->user->name) : ''}}</div>
                            </div> <!-- end .item -->
                            <div class="item clearfix">
                                <div class="option">Year</div>
                                <div class="option-content">{{($ad->yearData) ? $ad->yearData->year : ''}}</div>
                            </div> <!-- end .item -->
                            <div class="item clearfix">
                                <div class="option">Make</div>
                                <div class="option-content">{{($ad->brandData) ? $ad->brandData->brand_name : ''}}</div>
                            </div> <!-- end .item -->
                            <div class="item clearfix">
                                <div class="option">Model</div>
                                <div class="option-content">{{($ad->modelData) ? $ad->modelData->model : ''}}</div>
                            </div> <!-- end .item -->
                            <div class="item clearfix">
                                <div class="option">Seats</div>
                                <div class="option-content">{{$ad->seats}}</div>
                            </div>
                            <div class="item clearfix">
                                <div class="option">Door</div>
                                <div class="option-content">{{$ad->seats}}</div>
                            </div>
                            <div class="item clearfix">
                                <div class="option">Transmission</div>
                                <div class="option-content">{{$ad->transmission}}</div>
                            </div> <!-- end .item -->
                            <div class="item clearfix">
                                <div class="option">Fuel Economy</div>
                                <div class="option-content">{{$ad->fuel}}</div>
                            </div> <!-- end .item -->
                            <div class="item clearfix">
                                <div class="option">Condition</div>
                                <div class="option-content">{{$ad->condition}}</div>
                            </div> <!-- end .item -->
                            <div class="item clearfix">
                                <div class="option">Location</div>
                                <div class="option-content">{{$ad->location}}</div>
                            </div> <!-- end .item -->
                            <div class="item clearfix">
                                <div class="option">Price</div>
                                <div class="option-content">${{$ad->price}}</div>
                            </div> <!-- end .item -->
                            <!-- <div class="item clearfix">
                                <div class="option">DriveTrain</div>
                                <div class="option-content">AWD</div>
                            </div> end .item -->
                            <!-- <div class="item clearfix">
                                <div class="option">Engine</div>
                                <div class="option-content">2.8L Straight Six</div>
                            </div> end .item -->
                            <div class="item clearfix">
                                <div class="option">Exterior Color</div>
                                <div class="option-content">{{$ad->color}}</div>
                            </div> <!-- end .item -->
                            <div class="item clearfix">
                                <div class="option">Interior Color</div>
                                <div class="option-content">{{$ad->color}}</div>
                            </div> <!-- end .item -->
                            <!-- <div class="item clearfix">
                                <div class="option">MPG</div>
                                <div class="option-content">24 City MPG / 36 Hmy MPG</div>
                            </div> end .item -->
                            <div class="item clearfix">
                                <div class="option">Phone Number</div>
                                <div class="option-content">{{$ad->phone_number}}</div>
                            </div> <!-- end .item -->
                            <div class="item clearfix">
                                <div class="option">Car Registered</div>
                                <div class="option-content">{{($ad->car_registered==1) ? 'Yes': 'No'}}</div>
                            </div> <!-- end .item -->
                        </div> <!-- end .main-car-details -->
                        <div class="widget" style="box-shadow: 0 0 10px rgba(175,175,175,.23);padding:20px;border-radius:5px;">
                            <h4 class="widget-title item clearfix" style="border-bottom: 1px solid #d7dce4;">Safety Tips</h4>
                            <div class="agent-inner">
                                <ul class="fa-ul text-dark">
                                    <li><span class="fa-li"><i class="fa-solid fa-circle-check"></i></span> - Do not pay
                                        in advance</li>
                                    <li><span class="fa-li"><i class="fa-solid fa-circle-check"></i></span> - Try to
                                        meet at a safe, public location</li>
                                    <li><span class="fa-li"><i class="fa-solid fa-circle-check"></i></span> - Check the
                                        item before you buy it</li>
                                    <li><span class="fa-li"><i class="fa-solid fa-circle-check"></i></span> - Pay only
                                        after collecting the item</li>
                                </ul>

                            </div>
                        </div>
                        {{-- <div class="widget" style="box-shadow: 0 0 10px rgba(175,175,175,.23);padding:20px;border-radius:5px;">
                            <h4 class="widget-title item clearfix" style="border-bottom: 1px solid #d7dce4;">Share</h4>
                            <div class="agent-inner">
                                <a href="https://wa.me/?text=Check out this awesome content: {{ url()->current() }}" class="whatsapp-link" target="_blank" title="Share on WhatsApp">
                                    <i class="fa fa-whatsapp" style="background-color: green; "></i>
                                </a>

                                <!-- Facebook Share -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"  class="whatsapp-link"
                                    target="_blank" title="Share on Facebook">
                                    <i class="fa fa-facebook" style="background-color: blue;"></i>
                                </a>

                                <!-- Twitter Share -->
                                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text=Check out this awesome content: [Your Content Here]"  class="whatsapp-link"
                                    target="_blank" title="Share on Twitter">
                                    <i class="fa fa-twitter" style="background-color: skyblue;"></i>
                                </a>

                            </div>
                        </div> --}}
                        <div class="widget" style="box-shadow: 0 0 10px rgba(175,175,175,.23); padding: 20px; border-radius: 5px;">
                            <h4 class="widget-title item clearfix" style="border-bottom: 1px solid #d7dce4;">Share</h4>
                            <div class="agent-inner d-flex justify-content-between">

                                <!-- WhatsApp Share -->
                                <a class="btn btn-primary" style="background-color: #25d366;"  href="https://wa.me/?text=Check out this awesome content: {{ url()->current() }}" role="button">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                                <!-- Facebook Share -->
                                <a class="btn btn-primary" style="background-color: #3b5998;" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"  role="button">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                                <!-- Twitter Share -->
                                <a class="btn btn-primary" style="background-color: #55acee;" href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text=Check out this awesome content: [Your Content Here]"  role="button">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </div>
                        </div>


                    </div> <!-- end .col-sm-4 -->
                </div> <!-- end .row -->
            </div> <!-- end .car-details -->
            <div class="listings related-vehicles">
                <div class="heading clearfix">
                    <h5>Related Vehicles</h5>
                </div>
                <div class="listings-grid clearfix listing-home">
                    @foreach(getrelatedads($ad->user_id) as $value)
                    <div class="listing">
                        <div class="image"><a href=""><img src="{{asset('asset/images/listing01.jpg')}}" alt="listing"
                                    class="img-responsive"></a></div>
                        <div class="content">
                            <div class="title"><a href="">{{($value->brandData) ? $value->brandData->brand_name : ''}}</a></div>
                            <p>{{$value->description }} </p>
                            <div class="price">N{{$value->price}} <span>/ for sale</span></div>
                        </div>
                    </div> <!-- end .listing -->
                    @endforeach

                </div> <!-- end .listing-grid -->
            </div> <!-- end .listings -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</section> <!-- end .section -->
@endsection
