@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>

    <div class="spalch_parent">
        <div class="cube-wrapper">
            <div class="cube-folding">
                <span class="leaf1"></span>
                <span class="leaf2"></span>
                <span class="leaf3"></span>
                <span class="leaf4"></span>
            </div>
            <span class="loading" data-name="Loading">{{__('Loading')}}</span>
        </div>
    </div>

    <div class="breadcrumb " style="position: relative;">
        <div class="img_parent">
            @if($video != "")
                <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="">
                    <source src="{{ Voyager::image($video) }}" type="video/mp4">
                </video>
            @else
                <img src="{{ Voyager::image($page->image) }}">
            @endif
        </div>
        <h5 class="breadcrumb-content">{{$page->translate($locale)->title}}</h5>
        <ul class="list-unstyled">
            <li><a href="/home">{{__('Home')}}</a></li>
            <li><a href="">{{$page->translate($locale)->title}}</a></li>
        </ul>
    </div>


  <div class="integration_work_homepage">
    <div class="container">
      <div class="secton-header">
        <h6>{{__('Section')}}</h6>
        <h5>{{__('integrated business')}}</h5>
      </div>
      <div class="row">

        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="/AboutUs" class="cardLink">
            <div class="card_img">
              <img src="./assets/images/hard-work-work-svgrepo-com.svg" alt="">
            </div>
            <!-- <h5 class="card_title">عن الاعمال المتكاملة</h5> -->
            <button type="button" href="" class="btn"> <span>{{__('About integrated business')}}</span> <img
                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
          </a>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="/servicesDetails" class="cardLink">
            <div class="card_img">
              <img src="./assets/images/search-career-work-job-recruitment-employee-svgrepo-com.svg" alt="">
            </div>
            <!-- <h5 class="card_title">مجالات الاعمال المتكاملة</h5> -->
            <button type="button" href="" class="btn"> <span>{{__('Integrated business areas')}}</span> <img
                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
          </a>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="/our-works" class="cardLink">
            <div class="card_img">
              <img src="./assets/images/work-building-svgrepo-com.svg" alt="">
            </div>
            <!-- <h5 class="card_title">اعمالنا</h5> -->
            <button type="button" href="" class="btn"> <span>{{__('Our work')}}</span> <img
                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
          </a>
        </div>

          <div class="col-sm-12 col-md-6 col-lg-4">
              <a href="/packages" class="cardLink">
                  <div class="card_img">
                      <img src="./assets/images/price-tag-offer-discount-spcial-svgrepo-com.svg" alt="">
                  </div>
                  <!-- <h5 class="card_title">العروض والباقات</h5> -->
                  <button type="button" href="" class="btn"> <span>{{__('Offers and packages')}}</span> <img
                          src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
              </a>
          </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="/preview" class="cardLink">
            <div class="card_img">
              <img src="./assets/images/send-paper-svgrepo-com.svg" alt="">
            </div>
            <!-- <h5 class="card_title">تقديم طلب معاينة</h5> -->
            <button type="button" href="" class="btn"> <span>{{__('Submit an inspection request')}}</span> <img
                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
          </a>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
          <a data-toggle="modal" data-target="#demo3" class="cardLink">
            <div class="card_img">
              <img src="./assets/images/online-shop-svgrepo-com.svg" alt="">
            </div>
            <!-- <h5 class="card_title">المتابعه اونلاين</h5> -->
            <button type="button" href="" class="btn"> <span>{{__('Follow online')}}</span> <img
                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
          </a>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="/CommingSoon" class="cardLink">
            <div class="card_img">
              <img src="./assets/images/calculator-svgrepo-com.svg" alt="">
            </div>
            <!-- <h5 class="card_title">حاسبة التكاليف "عرض سعر"</h5> -->
            <button type="button" href="" class="btn"> <span>{{__('Cost Calculator')}}</span> <img
                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
          </a>
        </div>



      </div>
    </div>
  </div>

@endsection
