
@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>

  <div class="breadcrumb" style="background-image: url({{asset('assets/images/breadcrumb.png')}});">
    <h5 class="breadcrumb-content">معاينه الطلب</h5>
  </div>


  <div class="training_cources">

    <div class="eeta_academy_social">
      <ul class="list-unstyled">
        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
        <li><a href=""><i class="fab fa-twitter"></i></a></li>
        <li><a href=""><i class="fab fa-instagram"></i></a></li>
        <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
        <li><a href=""><i class="fas fa-envelope"></i></a></li>
        <li><a href=""><i class="fas fa-phone-alt"></i></a></li>
        <li><a href=""><i class="fas fa-map-marker-alt"></i></a></li>
      </ul>
    </div>

    <div class="container">

      <div class="secton-header">
        <h6>البرامج</h6>
        <h5>التدريبة والكورسات</h5>
      </div>

      <div class="train_course_filter">
        <form action="{{url('courses')}}">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-5">
              <div class="form-group">
                <i class="fas fa-search icon"></i>
                <input type="text" name="specialty" class="form-control" placeholder="التخصص">
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5">
              <div class="form-group">
                <i class="fas fa-search icon"></i>
                <input type="text" name="name" class="form-control" placeholder="ابحث هنا">
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-2">
              <div class="btn_submit">
                <button class="btn">ابحث</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="head_of_traingn">
        <i class="fas fa-graduation-cap"></i>
        <h5>البرامج التدريبة</h5>
      </div>
      <div class="row">
        @foreach ($trainings as $item)
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="train_course_box">
            <div class="card_img">
              <div class="img_wrapper">
                <img src="{{asset("storage".$item->course_image)}}">
              </div>
            </div>
            <div class="card_body">
              <h5>{{$item->course_name}}</h5>
              <p>{{$item->course_detail}}</p>
              <div class="price">
                <span class="now">{{$item->course_cost_before}} ج.م</span>
                <span class="old">{{$item->course_cost_after}} ج.م</span>
              </div>
              <div class="btn_options">
                <a href="{{url('courses/' . $item->id)}}" class="now">التفاصيل</a>
                <a href="{{url('course_reservation/'.$item->id)}}" class="old">الحجز الان</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>

      <div class="head_of_traingn">
        <i class="fas fa-graduation-cap"></i>
        <h5>الكورسات</h5>
      </div>
      <div class="row">
        
          @foreach ($courses as $item)
          <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="train_course_box">
              <div class="card_img">
                <div class="img_wrapper">
                  <img src="{{asset("storage".$item->course_image)}}" alt="{{$item->course_name}}">
                </div>
              </div>
              <div class="card_body">
                <h5>{{$item->course_name}}</h5>
                <p>{{$item->course_detail}}</p>
                <div class="price">
                  <span class="now">{{$item->course_cost_before}} ج.م</span>
                  <span class="old">{{$item->course_cost_after}} ج.م</span>
                </div>
                <div class="btn_options">
                  <a href="{{url('courses/' . $item->id)}}" class="now">التفاصيل</a>
                  <a href="{{url('course_reservation/'.$item->id)}}" class="old">الحجز الان</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach

       
      </div>
    </div>
  </div>


@endsection