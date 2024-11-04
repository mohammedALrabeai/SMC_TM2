@extends('home.ar.layout.wrapper')

@section('content')
    <section class="site-banner layout-02"
             style="background-image: url({{asset('home/images/banner.png')}});  background-position: 15% 100%; background-size: 700px;">
        <div class="container  offset-item">
            <div class="site-banner__content">
                <h1 class="site-banner__title">
                    يقدم تاسكلو</h1>
                <div class="title-wrap"> مجموعة متكاملة من الأدوات والميزات المصممة <strong>لتلبية احتياجات</strong>
                    شركات التسويق
                </div>
                <a href="{{url('/admin')}}"
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
                        <img src="{{asset('home/images/features-04.png')}}" alt="">
                        <div class="features-content">
                            <h3> الربط المباشر مع تطبيق واتساب لإرسال الإشعارات المتعلقة بالمهام الجديدة.
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
                <p>يقدم تاسكلو مجموعة متكاملة من الأدوات والميزات المصممة لتلبية احتياجات شركات التسويق، بما في
                    ذلك</p>
            </div>
            <div class="inner">
                <div class="row  offset-item">
                    <div class="col-12 col-lg-4">
                        <div class="item hover__box">
                            <a href="#">
                                <img src="{{asset('home/images/cat-01.png')}}" alt="">

                            </a>
                        </div>
                        <div class="info mt-2">
                            <h3> سهولة إضافة الموظفين والعملاء وإدارة البيانات بكفاءة</h3>
                            <img src="{{asset('home/images/cat-line-01.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="item hover__box">
                            <a href="#">
                                <img src="{{asset('home/images/cat-02.png')}}" alt="">

                            </a>
                        </div>
                        <div class="info mt-2">
                            <h3> تخصيص الحالات للمهام المختلفة لتناسب سير العمل لديك</h3>
                            <img src="{{asset('home/images/cat-line-02.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="item hover__box">
                            <a href="#">
                                <img src="{{asset('home/images/cat-03.png')}}" alt="">

                            </a>
                        </div>
                        <div class="info mt-2">
                            <h3> التقارير التفصيلية التي تمنحك رؤية شاملة حول أداء الموظفين والمهام</h3>
                            <img src="{{asset('home/images/cat-line-03.png')}}" alt="">
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
                            <div class="entry-thumb"><a href="#"><img
                                        src="{{asset('home/images/admin_features_01.png')}}"
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
                            <div class="entry-thumb"><a href="#"><img
                                        src="{{asset('home/images/admin_features_02.png')}}"
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
                            <div class="entry-thumb"><a href="#"><img
                                        src="{{asset('home/images/admin_features_03.png')}}"
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
                            <div class="entry-thumb"><a href="#"><img
                                        src="{{asset('home/images/admin_features_04.png')}}"
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
                            <div class="entry-thumb"><a href="#"><img
                                        src="{{asset('home/images/admin_features_05.png')}}"
                                        alt=""></a></div>
                            <div class="entry-detail">
                                <h3><a href="#"> عرض سجل زمني كامل لكل مهمة من لحظة إنشائها إلى حالتها النهائية.</a>
                                </h3>
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
                            <div class="entry-thumb"><a href="#"><img
                                        src="{{asset('home/images/employee_features_01.png')}}"
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
                            <div class="entry-thumb"><a href="#"><img
                                        src="{{asset('home/images/employee_features_02.png')}}"
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
                            <div class="entry-thumb"><a href="#"><img
                                        src="{{asset('home/images/employee_features_03.png')}}"
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
                            <div class="entry-thumb"><a href="#"><img
                                        src="{{asset('home/images/employee_features_04.png')}}"
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
    {{--    <section class="testimonial-wrap" id="testemonial">--}}
    {{--        <div class="container">--}}
    {{--            <div class="title-wrap align-center">--}}
    {{--                <h2>أراء عملائنا</h2>--}}
    {{--            </div>--}}
    {{--            <div class="slick-sliders offset-item">--}}
    {{--                <div class="slick-slider testimonial-slider layout-03 slider-pd30" data-item="3" data-arrows="true"--}}
    {{--                     data-itemScroll="3" data-dots="true" data-centerPadding="30" data-tabletitem="1"--}}
    {{--                     data-tabletscroll="1" data-mobileitem="1" data-mobilescroll="1" data-mobilearrows="false">--}}
    {{--                    <div class="testimonial-item">--}}
    {{--                        <div class="testimonial-info">--}}
    {{--                            <p>Really useful app to find interesting things to see do, drink and eat in new places.--}}
    {{--                                I’ve been using it regularly in my travels over the past few months.</p>--}}
    {{--                            <div class="testimonial-meta">--}}
    {{--                                <div class="avatar">--}}
    {{--                                    <img src="{{asset('home/images/member-avatar.png')}}" alt="Avatar" class="ava">--}}

    {{--                                </div>--}}
    {{--                                <div class="author">--}}
    {{--                                    <b>Kari Granleese</b>--}}
    {{--                                    <span>CEO Alididi</span>--}}
    {{--                                </div>--}}
    {{--                                <div class="quote">--}}
    {{--                                    <img src="{{asset('home/images/quote-active.png')}}" alt="Quote" class="quote">--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="testimonial-item">--}}
    {{--                        <div class="testimonial-info">--}}
    {{--                            <p>Really useful app to find interesting things to see do, drink and eat in new places.--}}
    {{--                                I’ve been using it regularly in my travels over the past few months.</p>--}}
    {{--                            <div class="testimonial-meta">--}}
    {{--                                <div class="avatar">--}}
    {{--                                    <img src="{{asset('home/images/member-avatar.png')}}" alt="Avatar" class="ava">--}}
    {{--                                </div>--}}
    {{--                                <div class="author">--}}
    {{--                                    <b>Kari Granleese</b>--}}
    {{--                                    <span>CEO Alididi</span>--}}
    {{--                                </div>--}}
    {{--                                <div class="quote">--}}
    {{--                                    <img src="{{asset('home/images/quote-active.png')}}" alt="Quote" class="quote">--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="testimonial-item">--}}
    {{--                        <div class="testimonial-info">--}}
    {{--                            <p>Really useful app to find interesting things to see do, drink and eat in new places.--}}
    {{--                                I’ve been using it regularly in my travels over the past few months.</p>--}}
    {{--                            <div class="testimonial-meta">--}}
    {{--                                <div class="avatar">--}}
    {{--                                    <img src="{{asset('home/images/member-avatar.png')}}" alt="Avatar" class="ava">--}}
    {{--                                </div>--}}
    {{--                                <div class="author">--}}
    {{--                                    <b>Kari Granleese</b>--}}
    {{--                                    <span>CEO Alididi</span>--}}
    {{--                                </div>--}}
    {{--                                <div class="quote">--}}
    {{--                                    <img src="{{asset('home/images/quote-active.png')}}" alt="Quote" class="quote">--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="testimonial-item">--}}
    {{--                        <div class="testimonial-info">--}}
    {{--                            <p>Really useful app to find interesting things to see do, drink and eat in new places.--}}
    {{--                                I’ve been using it regularly in my travels over the past few months.</p>--}}
    {{--                            <div class="testimonial-meta">--}}
    {{--                                <div class="avatar">--}}
    {{--                                    <img src="{{asset('home/images/member-avatar.png')}}" alt="Avatar" class="ava">--}}
    {{--                                </div>--}}
    {{--                                <div class="author">--}}
    {{--                                    <b>Kari Granleese</b>--}}
    {{--                                    <span>CEO Alididi</span>--}}
    {{--                                </div>--}}
    {{--                                <div class="quote">--}}
    {{--                                    <img src="{{asset('home/images/quote-active.png')}}" alt="Quote" class="quote">--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="place-slider__nav slick-nav">--}}
    {{--                    <div class="place-slider__prev slick-nav__prev">--}}
    {{--                        <i class="las la-angle-left"></i>--}}
    {{--                    </div><!-- .place-slider__prev -->--}}
    {{--                    <div class="place-slider__next slick-nav__next">--}}
    {{--                        <i class="las la-angle-right"></i>--}}
    {{--                    </div><!-- .place-slider__next -->--}}
    {{--                </div><!-- .place-slider__nav -->--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section><!-- .testimonial-wrap -->--}}

    <section class="banner-wrap">
        <div class="container">
            <div class="banner-inner" style="background-image: url({{asset('home/images/desk-home.png')}});">
                <h2>تواصل معنا</h2>
                <p>لا تتردد في التواصل معنا لأي استفسارات أو دعم
                    فني.</p>
                <a href="https://api.whatsapp.com/send?phone=966539811400&text=مرحبا, أريد تجربة مجانية في تاسكلو"
                   class="btn">تواصل معنا</a>
            </div>
        </div>
    </section><!-- .banner-wrap -->

    {{--    <main id="faq" class="site-main mt-4">--}}
    {{--        <div class="page-title page-title--small align-left">--}}
    {{--            <div class="container">--}}
    {{--                <div class="page-title__content">--}}
    {{--                    <h1 class="page-title__name">الأسئلة الشائعة</h1>--}}
    {{--                    <p class="page-title__slogan">أكثر الأسئلة شيوعا</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div><!-- .page-title -->--}}
    {{--        <div class="site-content">--}}
    {{--            <div class="container">--}}
    {{--                <h2 class="title align-center">كيف يمكننا مساعدتك؟</h2>--}}
    {{--                <ul class="accordion first-open">--}}
    {{--                    <li>--}}
    {{--                        <h3 class="accordion-title"><a href="#">What is Golo Theme?</a></h3>--}}
    {{--                        <div class="accordion-content">--}}
    {{--                            <p>It is a long established fact that a reader will be distracted by the readable--}}
    {{--                                content of a page when looking at its layout. The point of using Lorem Ipsum is that--}}
    {{--                                it has a more-or-less normal distribution of letters, as opposed to using 'Content--}}
    {{--                                here, content here', making it look like readable English.</p>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <li>--}}
    {{--                        <h3 class="accordion-title"><a href="#">Why should I save on Schoolable?</a></h3>--}}
    {{--                        <div class="accordion-content">--}}
    {{--                            <p>It is a long established fact that a reader will be distracted by the readable--}}
    {{--                                content of a page when looking at its layout. The point of using Lorem Ipsum is that--}}
    {{--                                it has a more-or-less normal distribution of letters, as opposed to using 'Content--}}
    {{--                                here, content here', making it look like readable English.</p>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <li>--}}
    {{--                        <h3 class="accordion-title"><a href="#">How secure is my money?</a></h3>--}}
    {{--                        <div class="accordion-content">--}}
    {{--                            <p>It is a long established fact that a reader will be distracted by the readable--}}
    {{--                                content of a page when looking at its layout. The point of using Lorem Ipsum is that--}}
    {{--                                it has a more-or-less normal distribution of letters, as opposed to using 'Content--}}
    {{--                                here, content here', making it look like readable English.</p>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <li>--}}
    {{--                        <h3 class="accordion-title"><a href="#">How much can I save on Golo?</a></h3>--}}
    {{--                        <div class="accordion-content">--}}
    {{--                            <p>It is a long established fact that a reader will be distracted by the readable--}}
    {{--                                content of a page when looking at its layout. The point of using Lorem Ipsum is that--}}
    {{--                                it has a more-or-less normal distribution of letters, as opposed to using 'Content--}}
    {{--                                here, content here', making it look like readable English.</p>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <li>--}}
    {{--                        <h3 class="accordion-title"><a href="#">How many saving plans can I create?</a></h3>--}}
    {{--                        <div class="accordion-content">--}}
    {{--                            <p>It is a long established fact that a reader will be distracted by the readable--}}
    {{--                                content of a page when looking at its layout. The point of using Lorem Ipsum is that--}}
    {{--                                it has a more-or-less normal distribution of letters, as opposed to using 'Content--}}
    {{--                                here, content here', making it look like readable English.</p>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div><!-- .site-content -->--}}
    {{--    </main><!-- .site-main -->--}}

    <section id="contactus" class="site-main contact-main  mt-4">
        <div class="page-title page-title--small align-left"
             style="background-image: url({{asset('home/images/bg-about.png')}});">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">تواصل معنا</h1>
                    <p class="page-title__slogan">نسعد بتواصلكم معنا</p>
                </div>
            </div>
        </div><!-- .page-title -->
        <div class="site-content site-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-text">
                            <h2>مكتبنا</h2>
                            <div class="contact-box">
                                <h3>المملكة العربية السعودية</h3>
                                <p></p>
                                <p dir="ltr"><a href="tel:+966539811400">+966 539811400</a></p>
                            </div>
                            {{--                                <div class="contact-box">--}}
                            {{--                                    <h3>Paris</h3>--}}
                            {{--                                    <p>Station F, 2 Parvis Alan Turing, 8742, Paris France</p>--}}
                            {{--                                    <p>+44 (0)34 5312 3505</p>--}}
                            {{--                                    <a href="#" title="Get Direction">Get Direction</a>--}}
                            {{--                                </div>--}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <h2>تواصل معنا</h2>

                            @if (request()->session()->get('success'))
                                <div class="alert alert-success">
                                    <p>
                                        {{ request()->session()->get('success') }}
                                        <button type="button"
                                                class="close d-flex align-items-center justify-content-center width-12 height-12 p-0"
                                                data-dismiss="alert" aria-label="{{ __('Close') }}">
                                            <span aria-hidden="true"
                                                  class="d-flex align-items-center">  <i class="la la-close"></i></span>
                                        </button>
                                    </p>
                                </div>
                            @endif

                            @if (request()->session()->get('error'))
                                <div class="alert alert-error">
                                    <p>
                                        {{ request()->session()->get('error') }}
                                        <button type="button"
                                                class="close d-flex align-items-center justify-content-center width-12 height-12 p-0"
                                                data-dismiss="alert" aria-label="{{ __('Close') }}">
                                            <span aria-hidden="true"
                                                  class="d-flex align-items-center">  <i class="la la-close"></i></span>
                                        </button>
                                    </p>
                                </div>
                            @endif

                            <form action="{{route('contact.send')}}" method="post" class="form-underline">
                                @csrf
                                <div class="field-input">
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="الإسم"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="field-input">
                                    <input type="tel" name="phone" value="{{old('phone')}}" dir="ltr"
                                           placeholder="رقم الهاتف"
                                           class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="field-submit mt-3">
                                    <input type="submit" value="إرسال" class="btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .site-content -->
    </section><!-- .site-main -->

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
@endsection
