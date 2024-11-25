@extends('home.ar.layout.wrapper')

@section('content')

<!-- رأس الموقع الرئيسي -->
<header class="main-header py-3 bg-light mt-5">
    {{ app()->setLocale(session('locale')) }}
    <div class="container">
        {{-- <div class="d-flex justify-content-between align-items-center">
            <div class="site-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('home/logo.png') }}" alt="Logo" height="50">
                </a>
            </div>
            <nav class="site-nav">
                <ul class="list-inline m-0">
                    <li class="list-inline-item"><a href="{{ url('/') }}" class="nav-link">{{ __('Home') }}</a></li>
                    <li class="list-inline-item"><a href="#features" class="nav-link">{{ __('Features') }}</a></li>
                    <li class="list-inline-item"><a href="#about" class="nav-link">{{ __('About Us') }}</a></li>
                    <li class="list-inline-item"><a href="#contactus" class="nav-link">{{ __('Contact Us') }}</a></li>
                </ul>
            </nav>
        </div> --}}
    </div>
</header>

<!-- قسم العنوان -->
<section class="page-title page-title--small align-left"
         style="background-image: url({{ asset('home/images/bg-about.png') }}); background-size: cover; background-position: center;">
    <div class="container">
        <div class="page-title__content text-center text-white py-5">
            <h1 class="page-title__name">{{ __('employee.request_form_title') }}</h1>
            <p class="page-title__slogan">{{ __('employee.form_description') }}</p>
            <div class="mt-3">
                <a href="{{ route('locale.change', 'en') }}" class="btn btn-outline-light btn-sm">{{ __('English') }}</a>
                <a href="{{ route('locale.change', 'ar') }}" class="btn btn-outline-light btn-sm">{{ __('العربية') }}</a>
            </div>
        </div>
    </div>
</section>



<!-- قسم الفورم -->
<section class="contact-main site-main mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>{{ __('employee.request_form_title') }}</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ __('employee.success_message') }}
                            </div>
                        @endif
                        <form action="{{ route('employee.request.store', $user_id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('employee.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       placeholder="{{ __('employee.name_placeholder') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('employee.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       placeholder="{{ __('employee.email_placeholder') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">{{ __('employee.phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone" 
                                       placeholder="{{ __('employee.phone_placeholder') }}" required>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <input type="hidden" name="number_of_hours_per_day" value="8">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('employee.submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
