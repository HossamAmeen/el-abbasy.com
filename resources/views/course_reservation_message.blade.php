@extends('layouts.app')

@section('content')
<?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>
<style>
  .payment_type_parent1,
  .payment_type_parent2 {
    display: none;
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


@endsection