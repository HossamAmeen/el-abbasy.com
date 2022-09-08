 <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>
@extends('layouts.app')
@section('meta')

    <meta property="og:title" content="{{$work->translate($locale)->name}}"/>
    <meta property="og:type" content="article" />
    <meta property="og:description" content="{!!html_entity_decode($work->translate($locale)->content)!!}">
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{Voyager::image($work['image'])}}"/>
@endsection
@section('twittermeta')
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@el-abbasy">
    <meta name="twitter:title" content="{{$work->translate($locale)->name}}">
    <meta name="twitter:description" content="{!!html_entity_decode($work->translate($locale)->content)!!}">
    <meta name="twitter:image" content="{{Voyager::image($work['image'])}}">
@endsection
@section('content')
 
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


  <div class="new-work-details">
    <div class="container">
      <div class="new-work-detisl-slider" dir="ltr">

        @foreach($media as $media_object)
        <div class="slider_item">
          <div class="slider_work_card">
              <?php $media_object = json_decode($media_object,true);
               $file_extension = $media_object['file_extension'];
               $download_link = $media_object['download_link'];
              ?>
              <a href="{{ Voyager::image($download_link) }}" class="card_img" data-fancybox="gallery" rel="group1">
                <div class="img_parent">
                  @if(in_array($file_extension, ["mp4", "webm", "m4v"]))
                      <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="">
                          <source src="{{ Voyager::image($media_object['download_link']) }}" type="video/mp4">
                      </video>
                  @else
                      <img src="{{ Voyager::image($download_link) }}" alt="">
                  @endif
                </div>
              </a>
            </div>
        </div>
        @endforeach
      </div>

      <div class="new_work_pargraph">
        <div class="new_head">
          <h5>{{ $work->translate($locale)->name }}</h5>
          <span></span>
          <p>{{ $work->work_sub_category->translate($locale)->name }} </p>
          <span></span>
          <p>{{ $work->work_sub_category->work_category->translate($locale)->name }} </p>
        </div>
        <p class="card_text">
            {!!html_entity_decode($work->translate($locale)->content)!!}
        </p>

      </div>

      <div class="new_work_sahre list-unstyled">
        <ul class="list-unstyled">
          <li><a target="_blank" href="http://www.facebook.com/sharer.php?u={{$url}}"><i class="fab fa-facebook-f"></i></a></li>
          <li><a target="_blank" href="http://twitter.com/share?url={{$url}}"><i class="fab fa-twitter"></i></a></li>
          <li><a target="_blank" href="https://api.whatsapp.com/send?text={{$url}}"><i class="fab fa-whatsapp"></i></a></li>
        </ul>
      </div>

    </div>
  </div>



@endsection
