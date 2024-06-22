@extends('theme/layout-front/header')
@section('title','Terms & Conditions')
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
            <div class="title">Terms & Conditions</div> <!-- end .title -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .page-title -->
<section class="terms">
    <div class="container">
        <h1>Terms & Conditions</h1>
        <strong>
            Welcome To Our Terms And Conditions Page
        </strong>
        <p>
            At Mota NG, accessible from <a href="/">https://www.Mota.ng</a>, one of our main priorities is the privacy of our visitors.
            This Terms And Conditions document contains types of information that is collected and recorded by Mota NG
            and how we use it.
        </p>
        <p>
            If you have additional questions or require more information about our Terms And Conditions, do not hesitate
            to <a href="{{route('contact')}}">contact us.</a>
        </p>
        <p>
            This Terms And Conditions applies only to our online activities and is valid for visitors to our website
            with regards to the information that they shared and/or collect in Mota NG. This policy is not applicable to
            any information collected offline or via channels other than this website.
        </p>
        <h1>Consent</h1>
        <p>
            By using our website, you hereby consent to our Terms And Conditions and agree to its terms.
        </p>
        <h1>Information we collect</h1>
        <p>
            The personal information that you are asked to provide, and the reasons why you are asked to provide it,
            will be made clear to you at the point we ask you to provide your personal information.
        </p>
        <p>
            If you contact us directly, we may receive additional information about you such as your name, email
            address, phone number, the contents of the message and/or attachments you may send us, and any other
            information you may choose to provide.
        </p>
        <p>
            When you register for an Account, we may ask for your contact information, including items such as name,
            company name, address, email address, and telephone number.
        </p>
        <h1>How we use your information</h1>
        <p>
            We use the information we collect in various ways, including to:
        </p>
        <p>
            Provide, operate, and maintain our webste
        </p>
        <p>
            Improve, personalize, and expand our webste
        </p>
        <p>
            Understand and analyze how you use our webste
        </p>
        <p>
            Develop new products, services, features, and functionality
        </p>
        <p>
            Communicate with you, either directly or through one of our partners, including for customer service, to
            provide you with updates and other information relating to the webste, and for marketing and promotional
            purposes
        </p>
        <p>
            Send you emails
        </p>
        <p>
            Find and prevent fraud
        </p>
        <h1>Log Files</h1>
        <p>
            Mota NG follows a standard procedure of using log files. These files log visitors when they visit websites.
            All hosting companies do this and a part of hosting services' analytics. The information collected by log
            files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time
            stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that
            is personally identifiable. The purpose of the information is for analyzing trends, administering the site,
            tracking users' movement on the website, and gathering demographic information.
        </p>
        <h1>Cookies and Web Beacons</h1>
        <p>
            Like any other website, Mota NG uses 'cookies'. These cookies are used to store information including
            visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is
            used to optimize the users' experience by customizing our web page content based on visitors' browser type
            and/or other information.
        </p>
        <p>
            For more general information on cookies, please read <a href="https://www.termsfeed.com/blog/cookies/">
                "What Are Cookies" from Cookie Consent.</a>
        </p>
        <h1>Google DoubleClick DART Cookie</h1>
        <p>
            Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads
            to our site visitors based upon their visit to www.website.com and other sites on the internet. However,
            visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Terms
            And Conditions at the following URL – <a
                href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a>
        </p>
        <h1>Our Advertising Partners</h1>
        <p>
            Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below.
            Each of our advertising partners has their own Terms And Conditions for their policies on user data. For
            easier access, we hyperlinked to their Privacy Policies below.

            Google <a
                href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a>
        </p>
        <h1>Advertising Partners Privacy Policies</h1>
        <p>
            You may consult this list to find the Terms And Conditions for each of the advertising partners of Mota NG.
        </p>
        <p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are
            used in their respective advertisements and links that appear on Mota NG, which are sent directly to users'
            browser. They automatically receive your IP address when this occurs. These technologies are used to measure
            the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see
            on websites that you visit.</p>
        <p>
            Note that Mota NG has no access to or control over these cookies that are used by third-party advertisers.
        </p>
        <h1>Third Party Privacy Policies</h1>
        <p>
            Mota NG's Terms And Conditions does not apply to other advertisers or websites. Thus, we are advising you to
            consult the respective Privacy Policies of these third-party ad servers for more detailed information. It
            may include their practices and instructions about how to opt-out of certain options.
        </p>
        <p>
            You can choose to disable cookies through your individual browser options. To know more detailed information
            about cookie management with specific web browsers, it can be found at the browsers' respective websites.
        </p>
        <h1>
            CCPA Privacy Rights (Do Not Sell My Personal Information)
        </h1>
        <p>
            Under the CCPA, among other rights, California consumers have the right to:
        </p>
        <p>
            Request that a business that collects a consumer's personal data disclose the categories and specific pieces
            of personal data that a business has collected about consumers.
        </p>
        <p>
            Request that a business delete any personal data about the consumer that a business has collected.</p>
        <p>

            Request that a business that sells a consumer's personal data, not sell the consumer's personal data.
        </p>
        <p>
            If you make a request, we have one month to respond to you. If you would like to exercise any of these
            rights, please contact us.
        </p>
        <h1>
            GDPR Data Protection Rights
        </h1>
        <p>
            We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled
            to the following:
        </p>
        <p>
            The right to access – You have the right to request copies of your personal data. We may charge you a small
            fee for this service.
        </p>
        <p>
            The right to rectification – You have the right to request that we correct any information you believe is
            inaccurate. You also have the right to request that we complete the information you believe is incomplete.
        </p>
        <p>
            The right to erasure – You have the right to request that we erase your personal data, under certain
            conditions.
        </p>
        <p>
            The right to restrict processing – You have the right to request that we restrict the processing of your
            personal data, under certain conditions.
        </p>
        <p>
            The right to object to processing – You have the right to object to our processing of your personal data,
            under certain conditions.
        </p>
        <p>
            The right to data portability – You have the right to request that we transfer the data that we have
            collected to another organization, or directly to you, under certain conditions.
        </p>
        <p>
            If you make a request, we have one month to respond to you. If you would like to exercise any of these
            rights, please contact us.
        </p>
        <h1>
            Children's Information
        </h1>
        <p>
            Another part of our priority is adding protection for children while using the internet. We encourage
            parents and guardians to observe, participate in, and/or monitor and guide their online activity.
        </p>
        <p>
            Mota NG does not knowingly collect any Personal Identifiable Information from children under the age of 13.
            If you think that your child provided this kind of information on our website, we strongly encourage you to
            contact us immediately and we will do our best efforts to promptly remove such information from our records.
        </p>
        <p>


            If You Have Any Question About Our Privacy And Policy, Please Feel Free To <a href="{{route('contact')}}">Contact us.</a>
        </p>
    </div>
</section>

@endsection