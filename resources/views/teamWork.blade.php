
@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>
    <!--<div class="breadcrumb" style="position: relative;">-->
    <!--    <img src="{{ Voyager::image($page->image) }}" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" alt="" class="bg">        <h5 class="breadcrumb-content">{{$page->translate($locale)->title}}</h5>-->
    <!--    <ul class="list-unstyled">-->
    <!--        <li><a href="/home">{{__('Home')}}</a></li>-->
    <!--        <li><a href="">{{$page->translate($locale)->title}}</a></li>-->
    <!--    </ul>-->
    <!--</div>-->


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

  <div class="our-team">
    <div class="container">
      <div class="secton-header">
        <h5>{{__('All the staff')}}</h5>
        <h6>{{__('Staff')}}</h6>
      </div>
      <div class="team-cards">
        <div class="row">
         @foreach($teamWorks as $teamWork)
          <div class="col-sm-12 col-md-2 col-lg-3">
            <div class="team-card">
              <div class="card-img" style="background-image: url('{{Voyager::image($teamWork->image)}}');"></div>
              <h5 class="card-title">{{$teamWork->translate($locale)->name}}</h5>
              <p class="card-text">{{$teamWork->translate($locale)->title}}</p>
              <p class="card-line">{{$teamWork->translate($locale)->content}}</p>
            </div>
          </div>
           @endforeach

        </div>
      </div>
    </div>
  </div>

@endsection
