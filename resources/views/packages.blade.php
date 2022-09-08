@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>

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

  <div class="all_qutas">
    <div class="container">
      <div class="row">

          @foreach($packages as $package)
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="quta_card">
            <div class="quta_img">
              <img src="{{Voyager::image($package['image'])}}" alt="">
            </div>
            <h5 class="card_title">{{$package->translate($locale)->name}}</h5>
            <div class="prices">
              <p class="discount"> {{__('price before')}} <span>{{$package->old_price}}</span> </p>
              <p> {{__('price after')}} <span>{{$package->price}}</span> </p>
              <p>{{__('the remaining time')}} <span>{{ Carbon\Carbon::parse($package->end_date)->diffInDays(Carbon\Carbon::now()) }} {{__('Day')}} </span></p>
            </div>
            <div class="option">
              <a href="{{ URL('package/packageDetails/'.$package->id )}}">{{__('Learn more')}}</a>
              <span></span>
              <a href="/package_form" class="second_link">{{__('Take advantage of the rest')}}</a>
            </div>
          </div>
        </div>

          @endforeach


      </div>
    </div>
  </div>

@endsection
