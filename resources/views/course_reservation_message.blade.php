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
<script>
  swal({
      title: "{{__('Thank you')}}",
      text: "{{__('Your request has been successfully sent')}}",
      icon: "success",
      button: "{{__('ok')}}",
  });
</script>
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


<div class="academy_message">

  {{-- <div class="eeta_academy_social">
    <ul class="list-unstyled">
      <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
      <li><a href=""><i class="fab fa-twitter"></i></a></li>
      <li><a href=""><i class="fab fa-instagram"></i></a></li>
      <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
      <li><a href=""><i class="fas fa-envelope"></i></a></li>
      <li><a href=""><i class="fas fa-phone-alt"></i></a></li>
      <li><a href=""><i class="fas fa-map-marker-alt"></i></a></li>
    </ul>
  </div> --}}


  <div class="container">
    <div class="message_box">
      <p>
        تم استالم طلبكم بنجاح رقم : {{$course_reservation->id}} وسيتم التواصل معكم ف 48 ساعه 
        @if(isset($invoice))
            @if($course_reservation->payment_time)
              لطباعة او تحميل الفاتوره <a href="{{url('course-bill/'.$course_reservation->id)}}" class="btnBrint">الضغط هنا</a>
            @endif
        @endif
       
      </p>
    </div>
  </div>
</div>

 
@if(isset($invoice))
  <div class="course_reservation_bill">
    <div class="container">
      <div class="wrapper">
        <h5> فاتورة مدفوعات الكترونية </h5>
        <ul class="list-unstyled">
          <li><span class="qust">رقم:</span><span class="answer">{{$invoice->invoice_number}}</span></li>
          <li><span class="qust">التاريخ:</span><span class="answer">{{$invoice->created_at->format('d/m/Y')}}</span></li>
          <li><span class="qust">الوقت:</span><span class="answer">{{$invoice->created_at->format('HH:MM')}}</span></li>
          <li><span class="qust">الاسم:</span><span class="answer">{{$invoice->name}}</span></li>
          <li><span class="qust">رقم الهاتف:</span><span class="answer">{{$invoice->mobile_number}}</span></li>
          <li><span class="qust">القيمة:</span><span class="answer">{{$invoice->cost}} ج.م</span></li>
          <li><span class="qust">مقابل:</span><span class="answer"> قيمة/حجز ({{$invoice->details}})</span></li>
        </ul>
      </div>
    </div>
  </div>
@endif

@endsection