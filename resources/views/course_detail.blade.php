@extends('layouts.app')

@section('content')
<?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>
<div class="breadcrumb" style="background-image: url('./assets/images/breadcrumb.png');">
  <h5 class="breadcrumb-content">معاينه الطلب</h5>
</div>


<div class="eeta_course_details">

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
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="course_images">
          <div class="course_img">
            <div class="img_parent">
              <img src="{{asset('assets/images/computer.jpg')}}" alt="">
            </div>
          </div>
          <button class="btn"> <i class="fas fa-play"></i> <span>مشاهدة العرض</span> </button>
          <button href="{{url('join-course')}}" class="btn btn_style"> <span>الاشتراك الآن</span> </button>
        </div>

        <div class="auther_courses">

          <h5 class="header">كورسات وتدريبات اخرى</h5>

          

          @foreach ($courses as $item)

            <div class="train_course_box">
              <div class="card_img">
                <div class="img_wrapper">
                  <img src="{{$item->course_image}}">
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
                  <a href="{{url('join-course')}}" class="old">الحجز الان</a>
                </div>
              </div>
            </div>

          @endforeach
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-8">
        <div class="course_info">
          <div class="info_data">
            <ul class="list-unstyled">
              <li>
                <h5> <i class="fas fa-briefcase"></i> اسم الكورس</h5> <span>{{$course->course_name}}</span>
              </li>
              <li>
                <h5> <i class="fas fa-money-bill"></i> السعر قبل</h5> <span class="discount">{{$course->course_cost_before}}</span>
              </li>
              <li>
                <h5> <i class="fas fa-money-bill"></i> السعر بعد</h5> <span>{{$course->course_cost_after}}</span>
              </li>
              <li>
                <h5> <i class="fas fa-clock"></i> مده الكورس</h5> <span>{{$course->course_duration}}</span>
              </li>
              <li>
                <h5> <i class="fas fa-eye"></i> توافر الكورس</h5> <span>{{$course->course_status}}</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="course_info">
          <div class="triner">
            <div class="card_img">
              <div class="img_parent">
                <img src="{{asset($course->coach_image)}}" alt="">
              </div>
            </div>
            <div class="card_body">
              <h5>{{$course->course_coach}}</h5>
              <p>{{$course->course_coach_prief}} </p>
            </div>
          </div>
        </div>

        <div class="course_info">
          <div class="course_content">
            <h6 class="header">محتوى الكورس</h6>
            {{$course->course_detail}}
            {{-- <ul class="list-unstyled">
             {{$course->course_detail}}
            </ul> --}}

          </div>
        </div>

        {{-- <div class="course_info">
          <div class="graduation_opinio">
            <h6 class="header">اراء الخريجين</h6>

            <p> لرؤية اراء الخريجين تفضل بزيارة صفحة اراء الخريجين</p>

            <a href="" class="btn">اراء الخريجين</a>

          </div>
        </div> --}}

        {{-- <div class="course_info">
          <div class="all_comments">
            <h6 class="header">التعليقات</h6>
            <div class="comment_card">
              <h5 class="card_title">عمر علي سليمان</h5>
              <p class="card_text">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                النص العربى، حيث</p>
              <span class="date">12-5-2020</span>
            </div>
            <div class="comment_card">
              <h5 class="card_title">عمر علي سليمان</h5>
              <p class="card_text">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                النص العربى، حيث</p>
              <span class="date">12-5-2020</span>
            </div>
            <div class="comment_card">
              <h5 class="card_title">عمر علي سليمان</h5>
              <p class="card_text">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                النص العربى، حيث</p>
              <span class="date">12-5-2020</span>
            </div>
          </div>
        </div> --}}

        {{-- <div class="course_info">
          <div class="comments">
            <h6 class="header">اضف تعليق</h6>
            <div class="add_comment">
              <form action="">
                <div class="row">
                  <div class="col-sm-12 col-lg-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="اكتب اسمك هنا">
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-12">
                    <div class="form-group">
                      <textarea name="" placeholder="نص التعلق" id="" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-12">
                    <div class="btn_submit">
                      <button class="btn">اضف تعليقك</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div> --}}

      </div>
    </div>
  </div>
</div>



@endsection