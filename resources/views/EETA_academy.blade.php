@extends('layouts.app')

@section('content')
    <div class="spalch_parent">
        <div class="cube-wrapper">
            <div class="cube-folding">
                <span class="leaf1"></span>
                <span class="leaf2"></span>
                <span class="leaf3"></span>
                <span class="leaf4"></span>
            </div>
            <span class="loading" data-name="Loading">{{ __('Loading') }}</span>
        </div>
    </div>

    <div class="breadcrumb " style="position: relative;">
        <div class="img_parent">
            @if ($video != '')
                <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="">
                    <source src="{{ Voyager::image($video) }}" type="video/mp4">
                </video>
            @else
                <img src="{{ Voyager::image($page->image) }}">
            @endif
        </div>
        <h5 class="breadcrumb-content">{{ $page->translate($locale)->title }}</h5>
        <ul class="list-unstyled">
            <li><a href="/home">{{ __('Home') }}</a></li>
            <li><a href="">{{ $page->translate($locale)->title }}</a></li>
        </ul>
    </div>


    <div class="integration_work_homepage">

        {{-- <div class="eeta_academy_social"> --}}
        {{-- <ul class="list-unstyled"> --}}
        {{-- <li><a href=""><i class="fab fa-facebook-f"></i></a></li> --}}
        {{-- <li><a href=""><i class="fab fa-twitter"></i></a></li> --}}
        {{-- <li><a href=""><i class="fab fa-instagram"></i></a></li> --}}
        {{-- <li><a href=""><i class="fab fa-whatsapp"></i></a></li> --}}
        {{-- <li><a href=""><i class="fas fa-envelope"></i></a></li> --}}
        {{-- <li><a href=""><i class="fas fa-phone-alt"></i></a></li> --}}
        {{-- <li><a href=""><i class="fas fa-map-marker-alt"></i></a></li> --}}
        {{-- </ul> --}}
        {{-- </div> --}}

        <div class="container">
            <div class="secton-header">
                <h6>{{ __('Our services') }}</h6>
                <h5>EETA ACADEMY</h5>
            </div>
            <div class="row">

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="/CommingSoon" class="cardLink">
                        <div class="card_img">
                            <img src="./assets/images/login-svgrepo-com.svg" alt="">
                        </div>
                        <!-- <h5 class="card_title">المتابعه اونلاين</h5> -->
                        <button type="button" href="" class="btn"> <span>تسجيل الدخول للأكادمية</span> <img
                                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
                    </a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="/CommingSoon" class="cardLink">
                        <div class="card_img">
                            <img src="./assets/images/verification-login-svgrepo-com.svg" alt="">
                        </div>
                        <!-- <h5 class="card_title">المتابعه اونلاين</h5> -->
                        <button type="button" href="" class="btn"> <span>تسجيل عضوية بالأكادمية</span> <img
                                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
                    </a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="/CommingSoon" class="cardLink">
                        <div class="card_img">
                            <img src="./assets/images/search-career-work-job-recruitment-employee-svgrepo-com.svg"
                                alt="">
                        </div>
                        <!-- <h5 class="card_title">مجالات الاعمال المتكاملة</h5> -->
                        <button type="button" href="" class="btn"> <span>البرامج التدريبية</span> <img
                                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
                    </a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="/eeta-graduation-page" class="cardLink">
                        <div class="card_img">
                            <img src="./assets/images/graduation-svgrepo-com.svg" alt="">
                        </div>
                        <!-- <h5 class="card_title">اعمالنا</h5> -->
                        <button type="button" href="" class="btn"> <span>{{ __('Academy graduates') }}</span>
                            <img src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
                    </a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="/eeta-check-certificate" class="cardLink">
                        <div class="card_img">
                            <img src="./assets/images/certificate-svgrepo-com.svg" alt="">
                        </div>
                        <!-- <h5 class="card_title">اعمالنا</h5> -->
                        <button type="button" href="https://el-abbasy.com/eeta-check-certificate" class="btn">
                            <span>{{ __('Certificate Verification') }}</span> <img
                                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
                    </a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="/mistake_article" class="cardLink">
                        <div class="card_img">
                            <img src="./assets/images/notes-svgrepo-com.svg" alt="">
                        </div>
                        <!-- <h5 class="card_title">العروض والباقات</h5> -->
                        <button type="button" href="" class="btn"> <span>{{ __('Articles and Mistakes') }}</span>
                            <img src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
                    </a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="/CommingSoon" class="cardLink">
                        <div class="card_img">
                            <img src="./assets/images/teachers-svgrepo-com.svg" alt="">
                        </div>
                        <!-- <h5 class="card_title">تقديم طلب معاينة</h5> -->
                        <button type="button" href="" class="btn"> <span>هيئة التدريب</span> <img
                                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
                    </a>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="/CommingSoon" class="cardLink">
                        <div class="card_img">
                            <img src="./assets/images/library-svgrepo-com.svg" alt="">
                        </div>
                        <!-- <h5 class="card_title">تقديم طلب معاينة</h5> -->
                        <button type="button" href="" class="btn"> <span>المكتبة</span> <img
                                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
