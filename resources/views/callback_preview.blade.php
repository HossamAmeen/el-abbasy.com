
@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>

  <div class="breadcrumb" style="background-image: url({{asset('assets/images/breadcrumb.png')}});">
    <h5 class="breadcrumb-content">معاينه الطلب</h5>
  </div>


    <div class="preview-order-compleate payment-status">
        <div class="container">
            <div class="wrapper">
                @if( Session::get('message') != null  && $_REQUEST['success'] == "true")
                    <img src="./assets/images/check.svg" alt="">
                @else
                    <img src="./assets/images/reject.svg" alt="">
                @endif
                 <p> {{ Session::get('message') }} </p>
            </div>
        </div>
    </div>
        

{{--  <div class="preview-order-compleate">--}}
{{--      <div class="container">--}}
{{--        <div class="wrapper">--}}
{{--        @if(Session::get('message') != null)--}}
{{--            <p> {{ Session::get('message') }} </p>--}}
{{--        @else--}}
{{--            <p> </p>--}}
{{--        @endif--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}

@endsection
