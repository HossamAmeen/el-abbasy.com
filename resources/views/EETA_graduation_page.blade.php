@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>

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


  <div class="graduation_page">
    <div class="container">
      <div class="secton-header">
        <h6>{{__('Academy graduates')}}</h6>
        <h5>{{__('Always and forever proud of them')}}</h5>
      </div>
      <div class="row">
          @foreach($graduates as $graduate)
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="graduateer_box">
            <div class="box_img">
              <div class="img_parent">
                <img src="{{ Voyager::image($graduate->image) }}" alt="">
              </div>
            </div>
            <h5>{{ $graduate->translate($locale)->name }}</h5>
            <ul class="list-unstyled">
              <li><span>{{__('training program')}}:</span><span class="answer">{{ $graduate->translate($locale)->course }}</span></li>
              <li><span>{{__('University')}}:</span><span class="answer">{{ $graduate->translate($locale)->university }}</span></li>
              <li><span>{{__('faculty')}}:</span><span class="answer">{{ $graduate->translate($locale)->faculty }}</span></li>
            </ul>
            {{-- <a href="https://images.unsplash.com/photo-1617854818583-09e7f077a156?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" data-fancybox="gallery" rel="group2">{{__('Review')}}</a> --}}
             <?php
              $video_content ="";
              $explode_video_content = json_decode($graduate->video, true);
              if(!empty($explode_video_content)&& $graduate->video != null) {
                  $video_content = $explode_video_content[0]['download_link'];
              }
              ?>
              @if($video_content != "")
                 <a href="{{ Voyager::image($video_content) }}" data-fancybox="gallery" rel="group1">{{__('Review')}}</a>
              @else
                 <a href="{{ Voyager::image($graduate->image_content) }}" data-fancybox="gallery" rel="group1">{{__('Review')}}</a>
              @endif
          </div>
        </div>
          @endforeach


      </div>
    </div>
  </div>





  @endsection
