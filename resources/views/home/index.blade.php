@php use Carbon\Carbon; @endphp
    <!doctype html>
<html lang="en" dir="rtl">
<head>
    helloe
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Taskellow | للتسويق</title>
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>

    <!-- favicons -->
    <link rel="shortcut icon" href="{{asset('home/favicon.png')}}">


    <!-- Style CSS -->
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('home/fonts/jost/stylesheet.css')}}"/>--}}
    <link rel="stylesheet" type="text/css" href="{{asset('home/libs/line-awesome/css/line-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/libs/fontawesome-pro/css/fontawesome.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/libs/bootstrap/css/bootstrap-rtl.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/libs/slick/slick-theme.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/libs/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/libs/quilljs/css/quill.bubble.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/libs/quilljs/css/quill.core.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/libs/quilljs/css/quill.snow.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/libs/chosen/chosen.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/libs/datetimepicker/jquery.datetimepicker.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/libs/venobox/venobox.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- jQuery -->
    <script src="{{asset('home/js/jquery-1.12.4.js')}}"></script>
    <script src="{{asset('home/libs/popper/popper.js')}}"></script>
    <script src="{{asset('home/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/libs/slick/slick.min.js')}}"></script>
    <script src="{{asset('home/libs/slick/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('home/libs/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('home/libs/quilljs/js/quill.core.js')}}"></script>
    <script src="{{asset('home/libs/quilljs/js/quill.js')}}"></script>
    <script src="{{asset('home/libs/chosen/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('home/libs/datetimepicker/jquery.datetimepopperpicker.full.min.js')}}"></script>
    <script src="{{asset('home/libs/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('home/libs/waypoints/jquery.waypoints.min.js')}}"></script>
    <!-- orther script -->
    <script src="{{asset('home/js/main.js')}}"></script>
</head>

<body>
<div id="wrapper">
    <header id="header" class="site-header float-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-5">
                    <div class="site">
                        <div class="site__menu">
                            <a title="Menu Icon" href="#" class="site__menu__icon">
                                <i class="las la-bars la-24-black"></i>
                            </a>
                            <div class="popup-background"></div>
                            <div class="popup popup--left">
                                <a title="Close" href="#" class="popup__close">
                                    <i class="las la-times la-24-black"></i>
                                </a><!-- .popup__close -->
                                <div class="popup__content">

                                    <div class="popup__menu popup__box">
                                        <ul class="menu-arrow">
                                            <li>
                                                <a href="#features" title="خدماتنا">خدماتنا</a>
                                            </li>
                                            <li>
                                                <a href="#about" title="لماذا نحن">لماذا نحن</a>
                                            </li>
                                            <li>
                                                <a href="#advantage" title="مميزاتنا">مميزاتنا</a>
                                            </li>
                                            <li>
                                                <a href="#testemonial" title="راء العملاء">أراء العملاء</a>
                                            </li>
                                            <li>
                                                <a href="#blog" title="الأخبار">الأخبار</a>
                                            </li>

                                        </ul>
                                    </div><!-- .popup__menu -->
                                </div><!-- .popup__content -->
                                <div class="popup__button popup__box">
                                    <a title="Add place"
                                       href="https://api.whatsapp.com/send?phone=111111&text=مرحبا, أريد تجربة مجانية في Taskellow"
                                       class="btn">
                                        <span>تواصل معنا</span>
                                    </a>
                                </div><!-- .popup__button -->
                            </div><!-- .popup -->
                        </div><!-- .site__menu -->
                        <div class="site__brand">
                            <a title="Logo" href="{{url('/')}}" class="site__brand__logo"><img
                                    src="{{asset('home/logo.png')}}" alt="Golo"></a>
                        </div><!-- .site__brand -->

                    </div><!-- .site -->
                </div><!-- .col-md-6 -->
                <div class="col-xl-6 col-7">
                    <div class="right-header align-right">
                        <nav class="main-menu">
                            <ul>
                                <li>
                                    <a href="#features" title="خدماتنا">خدماتنا</a>
                                </li>
                                <li>
                                    <a href="#about" title="لماذا نحن">لماذا نحن</a>
                                </li>
                                <li>
                                    <a href="#advantage" title="مميزاتنا">مميزاتنا</a>
                                </li>
                                <li>
                                    <a href="#testemonial" title="راء العملاء">أراء العملاء</a>
                                </li>
                                <li>
                                    <a href="#blog" title="الأخبار">الأخبار</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="right-header__button btn">
                            <a title="Add place"
                               href="https://api.whatsapp.com/send?phone=111111&text=مرحبا, أريد تجربة مجانية في Taskellow">
                                <i class="las la-plus la-24-white"></i>
                                <span>تواصل معنا</span>
                            </a>
                        </div><!-- .right-header__button -->
                    </div><!-- .right-header -->
                </div><!-- .col-md-6 -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </header><!-- .site-header -->

    <main id="main" class="site-main  offset-item">
        <section class="site-banner layout-02" style="background-image: url({{asset('home/images/banner.png')}});">
            <div class="container  offset-item">
                <div class="site-banner__content">
                    <h1 class="site-banner__title">
                        يقدم Taskellow</h1>
                    <div class="title-wrap"> مجموعة متكاملة من الأدوات والميزات المصممة <strong>لتلبية احتياجات</strong>
                        شركات التسويق
                    </div>
                    <a href="https://api.whatsapp.com/send?phone=111111&text=مرحبا, أريد تجربة مجانية في Taskellow"
                       class="btn" title="View more">تجربة مجانية</a>
                </div><!-- .site-banner__content -->
            </div>
        </section><!-- .site-banner -->
        <section class="features layout-02" id="features">
            <div class="container">
                <div class="row  offset-item">
                    <div class="col-12 col-lg-3">
                        <div class="features-item">
                            <img src="{{asset('home/images/features-01.png')}}" alt="">
                            <div class="features-content">
                                <h3>إدارة مهام الموظفين وتخصيصها</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="features-item">
                            <img src="{{asset('home/images/features-02.png')}}" alt="">
                            <div class="features-content">
                                <h3>تتبع أداء العمل لكل عميل بسهولة</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="features-item">
                            <img src="{{asset('home/images/features-03.png')}}" alt="">
                            <div class="features-content">
                                <h3>الحصول على تقارير مفصلة تساعد في تحسين الإنتاجية واتخاذ القرارات الصائبة.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="features-item">
                            <img src="{{asset('home/images/features-03.png')}}" alt="">
                            <div class="features-content">
                                <h3> - الربط المباشر مع تطبيق واتساب لإرسال الإشعارات المتعلقة بالمهام الجديدة.
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- .features -->
        <section class="list-categories" id="about">
            <div class="container">
                <div class="title-wrap align-center">
                    <h2>لماذا نحن?</h2>
                    <p>يقدم Taskellow مجموعة متكاملة من الأدوات والميزات المصممة لتلبية احتياجات شركات التسويق، بما في
                        ذلك</p>
                </div>
                <div class="inner">
                    <div class="row  offset-item">
                        <div class="col-12 col-lg-4">
                            <div class="item hover__box">
                                <a href="#">
                                    <img src="{{asset('home/images/cat-01.jpg')}}" alt="">
                                    <span class="info">
                                            <span> سهولة إضافة الموظفين والعملاء وإدارة البيانات بكفاءة</span>
                                            <img src="{{asset('home/images/cat-line-01.png')}}" alt="">
                                        </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="item hover__box">
                                <a href="#">
                                    <img src="{{asset('home/images/cat-02.jpg')}}" alt="">
                                    <span class="info">
                                            <span> تخصيص الحالات للمهام المختلفة لتناسب سير العمل لديك</span>
                                            <img src="{{asset('home/images/cat-line-02.png')}}" alt="">
                                        </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="item hover__box">
                                <a href="#">
                                    <img src="{{asset('home/images/cat-03.jpg')}}" alt="">
                                    <span class="info">
                                            <span> التقارير التفصيلية التي تمنحك رؤية شاملة حول أداء الموظفين والمهام</span>
                                            <img src="{{asset('home/images/cat-line-03.png')}}" alt="">
                                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- .list-categories -->

        <section class="cities-wrap mt-5" id="advantage"
                 style="background-image: url({{asset('home/images/bg-world.png')}});">
            <div class="container">
                <div class="title-wrap align-center">
                    <h2>من مميزاتنا</h2>
                    <p>للأدمن</p>
                </div>
                <div class="row  offset-item">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="item hover-img">
                            <div class="item-inner">
                                <div class="entry-thumb"><a href="#"><img src="{{asset('home/images/city-02.jpeg')}}"
                                                                          alt=""></a></div>
                                <div class="entry-detail">
                                    <h3><a href="#"> إضافة الموظفين والعملاء مع بياناتهم الكاملة.</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="item hover-img">
                            <div class="item-inner">
                                <div class="entry-thumb"><a href="#"><img src="{{asset('home/images/city-02.jpeg')}}"
                                                                          alt=""></a></div>
                                <div class="entry-detail">
                                    <h3><a href="#">تخصيص حالات مخصصة للمهام لتحديد أولويات العمل</a></h3>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="item hover-img">
                            <div class="item-inner">
                                <div class="entry-thumb"><a href="#"><img src="{{asset('home/images/city-02.jpeg')}}"
                                                                          alt=""></a></div>
                                <div class="entry-detail">
                                    <h3><a href="#"> إصدار تقارير مفصلة بعدد ساعات العمل لكل موظف خلال فترات معينة.</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="item hover-img">
                            <div class="item-inner">
                                <div class="entry-thumb"><a href="#"><img src="{{asset('home/images/city-02.jpeg')}}"
                                                                          alt=""></a></div>
                                <div class="entry-detail">
                                    <h3><a href="#"> متابعة جميع المهام المنجزة لعميل محدد بسهولة.</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="item hover-img">
                            <div class="item-inner">
                                <div class="entry-thumb"><a href="#"><img src="{{asset('home/images/city-02.jpeg')}}"
                                                                          alt=""></a></div>
                                <div class="entry-detail">
                                    <h3><a href="#"> عرض سجل زمني كامل لكل مهمة من لحظة إنشائها إلى حالتها النهائية.</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="item hover-img">
                            <div class="item-inner">
                                <div class="entry-thumb"><a href="#"><img src="{{asset('home/images/city-02.jpeg')}}"
                                                                          alt=""></a></div>
                                <div class="entry-detail">
                                    <h3><a href="#">San Fancisco</a></h3>
                                    <span>32 Spaces</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="title-wrap align-center">
                    <h2>من مميزاتنا</h2>
                    <p>للموظف</p>
                </div>
                <div class="row  offset-item">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="item hover-img">
                            <div class="item-inner">
                                <div class="entry-thumb"><a href="#"><img src="{{asset('home/images/city-02.jpeg')}}"
                                                                          alt=""></a></div>
                                <div class="entry-detail">
                                    <h3><a href="#">إمكانية إسناد المهام لنفسه أو للزملاء.</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="item hover-img">
                            <div class="item-inner">
                                <div class="entry-thumb"><a href="#"><img src="{{asset('home/images/city-02.jpeg')}}"
                                                                          alt=""></a></div>
                                <div class="entry-detail">
                                    <h3><a href="#"> الاطلاع على مهامه فقط لمزيد من الخصوصية.</a></h3>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="item hover-img">
                            <div class="item-inner">
                                <div class="entry-thumb"><a href="#"><img src="{{asset('home/images/city-02.jpeg')}}"
                                                                          alt=""></a></div>
                                <div class="entry-detail">
                                    <h3><a href="#"> تعديل زمن التنفيذ للمهمة بناءً على الاحتياجات.</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="item hover-img">
                            <div class="item-inner">
                                <div class="entry-thumb"><a href="#"><img src="{{asset('home/images/city-02.jpeg')}}"
                                                                          alt=""></a></div>
                                <div class="entry-detail">
                                    <h3><a href="#"> الربط مع واتساب لإرسال الإشعارات إلى رقم الموظف أو مجموعة العمل</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- .cities-wrap -->
        <section class="testimonial-wrap" id="testemonial">
            <div class="container">
                <div class="title-wrap align-center">
                    <h2>أراء عملائنا</h2>
                </div>
                <div class="slick-sliders offset-item">
                    <div class="slick-slider testimonial-slider layout-03 slider-pd30" data-item="3" data-arrows="true"
                         data-itemScroll="3" data-dots="true" data-centerPadding="30" data-tabletitem="1"
                         data-tabletscroll="1" data-mobileitem="1" data-mobilescroll="1" data-mobilearrows="false">
                        <div class="testimonial-item">
                            <div class="testimonial-info">
                                <p>Really useful app to find interesting things to see do, drink and eat in new places.
                                    I’ve been using it regularly in my travels over the past few months.</p>
                                <div class="testimonial-meta">
                                    <div class="avatar">
                                        <img src="{{asset('home/images/member-avatar.png')}}" alt="Avatar" class="ava">

                                    </div>
                                    <div class="author">
                                        <b>Kari Granleese</b>
                                        <span>CEO Alididi</span>
                                    </div>
                                    <div class="quote">
                                        <img src="{{asset('home/images/quote-active.png')}}" alt="Quote" class="quote">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-info">
                                <p>Really useful app to find interesting things to see do, drink and eat in new places.
                                    I’ve been using it regularly in my travels over the past few months.</p>
                                <div class="testimonial-meta">
                                    <div class="avatar">
                                        <img src="{{asset('home/images/member-avatar.png')}}" alt="Avatar" class="ava">
                                    </div>
                                    <div class="author">
                                        <b>Kari Granleese</b>
                                        <span>CEO Alididi</span>
                                    </div>
                                    <div class="quote">
                                        <img src="{{asset('home/images/quote-active.png')}}" alt="Quote" class="quote">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-info">
                                <p>Really useful app to find interesting things to see do, drink and eat in new places.
                                    I’ve been using it regularly in my travels over the past few months.</p>
                                <div class="testimonial-meta">
                                    <div class="avatar">
                                        <img src="{{asset('home/images/member-avatar.png')}}" alt="Avatar" class="ava">
                                    </div>
                                    <div class="author">
                                        <b>Kari Granleese</b>
                                        <span>CEO Alididi</span>
                                    </div>
                                    <div class="quote">
                                        <img src="{{asset('home/images/quote-active.png')}}" alt="Quote" class="quote">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-info">
                                <p>Really useful app to find interesting things to see do, drink and eat in new places.
                                    I’ve been using it regularly in my travels over the past few months.</p>
                                <div class="testimonial-meta">
                                    <div class="avatar">
                                        <img src="{{asset('home/images/member-avatar.png')}}" alt="Avatar" class="ava">
                                    </div>
                                    <div class="author">
                                        <b>Kari Granleese</b>
                                        <span>CEO Alididi</span>
                                    </div>
                                    <div class="quote">
                                        <img src="{{asset('home/images/quote-active.png')}}" alt="Quote" class="quote">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="place-slider__nav slick-nav">
                        <div class="place-slider__prev slick-nav__prev">
                            <i class="las la-angle-left"></i>
                        </div><!-- .place-slider__prev -->
                        <div class="place-slider__next slick-nav__next">
                            <i class="las la-angle-right"></i>
                        </div><!-- .place-slider__next -->
                    </div><!-- .place-slider__nav -->
                </div>
            </div>
        </section><!-- .testimonial-wrap -->
        <section class="banner-wrap">
            <div class="container">
                <div class="banner-inner" style="background-image: url({{asset('home/images/desk-home.png')}});">
                    <h2>تواصل معنا</h2>
                    <p>لا تتردد في التواصل معنا لأي استفسارات أو دعم
                        فني.</p>
                    <a href="https://api.whatsapp.com/send?phone=111111&text=مرحبا, أريد تجربة مجانية في Taskellow"
                       class="btn">تواصل معنا</a>
                </div>
            </div>
        </section><!-- .banner-wrap -->
        {{--        <section class="blogs-wrap layout-02" id="blog">--}}
        {{--            <div class="container">--}}
        {{--                <div class="title-wrap align-center">--}}
        {{--                    <h2>الأخبار</h2>--}}
        {{--                </div>--}}
        {{--                <div class="blog-wrap offset-item">--}}
        {{--                    <div class="row">--}}
        {{--                        <div class="col-12 col-lg-4">--}}
        {{--                            <article class="post hover__box">--}}
        {{--                                <div class="post__thumb hover-img">--}}
        {{--                                    <a title="The 8 Most Affordable Michelin Restaurants in Paris"--}}
        {{--                                       href="blog-detail.html"><img src="{{asset('home/images/blog-01.jpg')}}"--}}
        {{--                                                                    alt="The 8 Most Affordable Michelin Restaurants in Paris"></a>--}}
        {{--                                </div>--}}
        {{--                                <div class="post__info">--}}
        {{--                                    <ul class="post__category">--}}
        {{--                                        <li><a title="Paris" href="02_city-details_1.html">Paris</a></li>--}}
        {{--                                        <li><a title="Food" href="02_city-details_1.html">Food</a></li>--}}
        {{--                                    </ul>--}}
        {{--                                    <h3 class="post__title"><a--}}
        {{--                                            title="The 8 Most Affordable Michelin Restaurants in Paris"--}}
        {{--                                            href="blog-detail.html">The 8 Most Affordable Michelin Restaurants in--}}
        {{--                                            Paris</a></h3>--}}
        {{--                                </div>--}}
        {{--                            </article>--}}
        {{--                        </div>--}}
        {{--                        <div class="col-12 col-lg-4">--}}
        {{--                            <article class="post hover__box">--}}
        {{--                                <div class="post__thumb hover-img">--}}
        {{--                                    <a title="The 7 Best Restaurants to Try Kobe Beef in London"--}}
        {{--                                       href="blog-detail.html"><img src="{{asset('home/images/blog-01.jpg')}}"--}}
        {{--                                                                    alt="The 7 Best Restaurants to Try Kobe Beef in London"></a>--}}
        {{--                                </div>--}}
        {{--                                <div class="post__info">--}}
        {{--                                    <ul class="post__category">--}}
        {{--                                        <li><a title="London" href="02_city-details_1.html">London</a></li>--}}
        {{--                                        <li><a title="Art & Decor" href="02_city-details_1.html">Art & Decor</a></li>--}}
        {{--                                    </ul>--}}
        {{--                                    <h3 class="post__title"><a title="The 7 Best Restaurants to Try Kobe Beef in London"--}}
        {{--                                                               href="blog-detail.html">The 7 Best Restaurants to Try--}}
        {{--                                            Kobe Beef in London</a></h3>--}}
        {{--                                </div>--}}
        {{--                            </article>--}}
        {{--                        </div>--}}
        {{--                        <div class="col-12 col-lg-4">--}}
        {{--                            <article class="post hover__box">--}}
        {{--                                <div class="post__thumb hover-img">--}}
        {{--                                    <a title="The 8 Most Affordable Michelin Restaurants in Paris"--}}
        {{--                                       href="blog-detail.html"><img src="{{asset('home/images/blog-01.jpg')}}"--}}
        {{--                                                                    alt="The 8 Most Affordable Michelin Restaurants in Paris"></a>--}}
        {{--                                </div>--}}
        {{--                                <div class="post__info">--}}
        {{--                                    <ul class="post__category">--}}
        {{--                                        <li><a title="Paris" href="02_city-details_1.html">Paris</a></li>--}}
        {{--                                        <li><a title="Stay" href="02_city-details_1.html">Stay</a></li>--}}
        {{--                                    </ul>--}}
        {{--                                    <h3 class="post__title"><a--}}
        {{--                                            title="The 8 Most Affordable Michelin Restaurants in Paris"--}}
        {{--                                            href="blog-detail.html">The 9 Best Cheap Hotels in New York City</a></h3>--}}
        {{--                                </div>--}}
        {{--                            </article>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="button-wrap">--}}
        {{--                        <a href="#" class="btn" title="View more">عرض أكثر</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}
    </main><!-- .site-main -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <a href="https://api.whatsapp.com/send?phone=111111&text=مرحبا, أريد تجربة مجانية في Taskellow"
       class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp whatsapp-icon-float"></i>
    </a>
    <footer id="footer" class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="footer__top__info">
                            <a title="Logo" href="{{url('/')}}" class="footer__top__info__logo"><img
                                    src="{{asset('home/logo.png')}}" alt="Golo"></a>
                            <p class="footer__top__info__desc">Taskellow هو نظام إدارة مهام مبتكر مصمم خصيصًا لشركات
                                التسويق لتحسين كفاءة العمليات اليومية وضمان تقديم خدمة عملاء متميزة. نسعى لتسهيل إدارة
                                المهام وتبسيط العمل الجماعي من خلال توفير أدوات تساعد في تتبع أداء الموظفين، تنظيم
                                العمل، وتخصيص المهام بشكل ذكي وسريع.
                            </p>

                        </div>
                    </div>
                    <div class="col-lg-2">
                        <aside class="footer__top__nav">
                            <h3>عام</h3>
                            <ul>
                                <li><a title="من نحن" href="#">من نحن</a></li>
                                <li><a title="الأسئلة الشائعة" href="#">الأسئلة الشائعة</a></li>
                                <li><a title="سياسة الخصوصية" href="#">سياسة الخصوصية</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-3">
                        <aside class="footer__top__nav footer__top__nav--contact">
                            <h3>تواصل معنا</h3>
                            <p>البريد الإلكتروني: support@domain.com</p>
                            <p>رقم الهاتف: 1 (00) 832 2342</p>
                            <ul>
                                <li class="facebook">
                                    <a title="Facebook" href="#">
                                        <i class="la la-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a title="Twitter" href="#">
                                        <i class="la la-twitter"></i>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a title="Youtube" href="#">
                                        <i class="la la-youtube"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a title="Instagram" href="#">
                                        <i class="la la-instagram"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a title="Snapchat" href="#">
                                        <i class="la la-snapchat"></i>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div><!-- .top-footer -->
            <div class="footer__bottom">
                <p class="footer__bottom__copyright">{{Carbon::now()->year}} &copy; <a title="Intshar"
                                                                                       href="https://intshar.net">Intshar.com</a>.
                    كل الحقوق محفوظة.</p>
            </div><!-- .top-footer -->
        </div><!-- .container -->
    </footer><!-- site-footer -->
</div><!-- #wrapper -->
</body>
</html>
