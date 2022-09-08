
 <?php
 $locale = Config::get('app.locale');
?>

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
      <span class="loading" data-name="Loading">{{__('Loading')}}</span>
    </div>
  </div>

  <div class="header" data-aos="fade-up" data-aos-duration="3000">
    <div class="bg-video-wrap">
      <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop>
        <source src="{{ Voyager::image($video) }}" type="video/mp4">
      </video>
      <div class="overlay">
      </div>
      <div class="container">
        <!-- <div class="header-content">
          <h5>المصرية الهندسية الكفاءة الطبيعية تجاه
            الفنون <span>والتصميم الداخلي</span>
          </h5>
          <div class="links">
            <a href="">تعرف علينا</a>
            <a href="">
              <span>شاهد اعمالنا</span>
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div> -->
      </div>
    </div>
  </div>



  <!-- our services -->
  <div class="our-services">
    <div class="container">
      <div class="secton-header">
        <h6>{{__('Services')}}</h6>
        <h5>{{__('Our services')}}</h5>
      </div>
      {{-- <div class="row">
       @for($i= 0; $i < count($Service); $i++)
        <div class="col-sm-12 col-md-6 col-lg-4">
            <?php
            if($i==0){
            ?>
          <a href="/integration_work_home" class="serv-card">
              <?php
            }elseif($i==3){
              ?>
              <!-- /mistake_article -->
              <a href="/mistake_article" class="serv-card">
                  <?php }else{?>
                   <a href="/CommingSoon" class="serv-card">
                       <?php }?>

            <img src="{{Voyager::image($Service[$i]->image)}}" class="bg" alt="">
            <div class="card-icon">
              <img src="{{Voyager::image($Service[$i]->icon)}}" alt="">
            </div>
            <h5 class="card-title">{{$Service[$i]->translate($locale)->name}}</h5>
            <p class="card-text">{{$Service[$i]->translate($locale)->content}} </p>
          </a>
        </div>
        @endfor


      </div> --}}


      <div class="row">

        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="/integration_work_home" class="cardLink">
            <div class="card_img">
              <img src="./assets/images/cloud-pak-for-integration-svgrepo-com.svg" alt="">
            </div>
            <!-- <h5 class="card_title">مجالات الاعمال المتكاملة</h5> -->
            <button type="button" class="btn"> <span>الأعمال المتكاملة</span> <img
                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
          </a>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="" class="cardLink">
            <div class="card_img">
              <img src="./assets/images/control-panel-svgrepo-com.svg" alt="">
            </div>
            <!-- <h5 class="card_title">مجالات الاعمال المتكاملة</h5> -->
            <button type="button" href="" class="btn"> <span>أنظمة التحكم</span> <img
                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
          </a>
        </div>


        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="" class="cardLink">
            <div class="card_img">
              <img src="./assets/images/auto-repair-service-svgrepo-com.svg" alt="">
            </div>
            <!-- <h5 class="card_title">مجالات الاعمال المتكاملة</h5> -->
            <button type="button" href="" class="btn"> <span>مراكز الخدمة</span> <img
                src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
          </a>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="/eeta-academy" class="cardLink">
            <div class="card_img">
              <img src="./assets/images/notes-svgrepo-com.svg" alt="">
            </div>
            <!-- <h5 class="card_title">مجالات الاعمال المتكاملة</h5> -->
            <button type="button"  class="btn"> <span>EETA Academy</span> <img
              src="./assets/images/left-arrow-svgrepo-com.svg" alt=""></button>
          </a>
        </div>

       
      
      </div>

    </div>
  </div>

@endsection
