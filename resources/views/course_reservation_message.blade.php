@extends('layouts.app')

@section('content')
<?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>
  <style>
    @media print {

      .mynavbar .links,
      .breadcrumb,
      .academy_message,
      .site-footer {
        display: none;
      }

      .course_reservation_bill {
        min-height: fit-content;
        /* border: 1px solid #000; */
        margin-top: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
    }
  </style>
<div class="breadcrumb" style="background-image: url({{asset('assets/images/breadcrumb.png')}});">
  <h5 class="breadcrumb-content">معاينه الطلب</h5>
</div>


<div class="academy_message">

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
    <div class="message_box">
      <p>
        تم استالم طلبكم بنجاح رقم : ...... وسيتم التواصل معكم ف 48 ساعه (
          لطباعة او تحميل الفاتوره <a href="">الضغط هنا</a>
      </p>
    </div>
  </div>
</div>


  <div class="course_reservation_bill">
    <div class="container">
      <div class="wrapper">
        <h5> فاتورة مدفوعات الكترونية </h5>
        <ul class="list-unstyled">
          <li><span class="qust">رقم:</span><span class="answer">1234567</span></li>
          <li><span class="qust">التاريخ:</span><span class="answer">12-10-2022</span></li>
          <li><span class="qust">الوقت:</span><span class="answer">02:30</span></li>
          <li><span class="qust">الاسم:</span><span class="answer">عمر علي سليمان</span></li>
          <li><span class="qust">رقم الهاتف:</span><span class="answer">01098586783</span></li>
          <li><span class="qust">القيمة:</span><span class="answer">300 ج.م</span></li>
          <li><span class="qust">مقابل:</span><span class="answer"> قيمة/حجز (اسم البنرامج التدريبي)</span></li>
        </ul>
      </div>
    </div>
  </div>


@endsection