
<?php
$locale = Config::get('app.locale');
?>
@extends('layouts.app')
@section('meta')

    <meta property="og:title" content="{!!html_entity_decode($mistake->translate($locale)->name)!!}"/>
    <meta property="og:url" content="{{$url}}"/>

    <meta property="og:image" content="{{Voyager::image($mistake->mistake_image)}}"/>
@endsection
@section('twittermeta')
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@el-abbasy">
    <meta name="twitter:title" content="{!!html_entity_decode($mistake->translate($locale)->name)!!}">
    <meta name="twitter:image" content="{{Voyager::image($mistake->mistake_image)}}">
@endsection

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


  <div class="mistake-details">
    <div class="container">
      <div class="content">
        <div class="heading">{{ __('mistake') }}</div>
        <div class="mistake-img">
          <a href="{{Voyager::image($mistake->mistake_image)}}" data-fancybox="gallery" rel="group1">
            <img src="{{Voyager::image($mistake->mistake_image)}}" alt="">
          </a>
        </div>
        <div class="mistake-pargrapgh">
          {!!html_entity_decode($mistake->translate($locale)->mistake_content)!!}
        </div>
      </div>
      <div class="content">
        <div class="heading">{{ __('Reason') }}</div>
          <div class="mistake-img">
              <a href="{{Voyager::image($mistake->suggest_image)}}" data-fancybox="gallery" rel="group1">
                  <img src="{{Voyager::image($mistake->suggest_image)}}" alt="">
              </a>
          </div>
          <div class="mistake-pargrapgh">
              <p> {!!html_entity_decode($mistake->translate($locale)->suggest_content)!!} </p>
          </div>
      </div>
      <div class="content">
        <div class="heading">{{ __('solution') }}</div>
          <div class="mistake-img">
              <a href="{{Voyager::image($mistake->solution_image)}}" data-fancybox="gallery" rel="group1">
                  <img src="{{Voyager::image($mistake->solution_image)}}" alt="">
              </a>
          </div>
          <div class="mistake-pargrapgh">
              <p> {!!html_entity_decode($mistake->translate($locale)->solution_content)!!} </p>
          </div>
      </div>
    </div>
  </div>

  <?php
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  ?>


  <div class="articlemistake_share">
    <div class="container">
      <div class="wrapper">
        <span>{{ __('share') }}</span>
        <ul class="list-unstyled">
          <li><a target="_blank" href="http://www.facebook.com/sharer.php?u={{$url}}"><i class="fab fa-facebook-f"></i></a></li>
          <li><a target="_blank" href="http://twitter.com/share?url={{$url}}"><i class="fab fa-twitter"></i></a></li>
          <li><a target="_blank" href="https://api.whatsapp.com/send?text={{$url}}"><i class="fab fa-whatsapp"></i></a></li>
        </ul>
      </div>
    </div>
  </div>

@endsection
