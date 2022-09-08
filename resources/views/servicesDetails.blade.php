@extends('layouts.app')

@section('content')

    <?php
    use Illuminate\Support\Facades\App;

    $locale = App::currentLocale();


    ?>
        <!--<div class="breadcrumb" style="position: relative;">-->
    <!--    <img src="{{ Voyager::image($page->image) }}" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" alt="" class="bg">-->
    <!--    <h5 class="breadcrumb-content">{{$page->translate($locale)->title}}</h5>-->
    <!--    <ul class="list-unstyled">-->
    <!--        <li><a href="/home">{{__('Home')}}</a></li>-->
    <!--        <li><a href="">{{$page->translate($locale)->title}}</a></li>-->
    <!--    </ul>-->
    <!--</div>-->
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

    <?php $x = 0; ?>
    @foreach($servicesDetails as $iteam)
        <?php if($x % 2 == 0){ ?>
        <div class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="about-img">
                            <img src="{{Voyager::image($iteam['image'])}}" alt="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="about-content">
                            <div class="ab-head">
                                <span></span>
                                <span>{{$iteam->translate($locale)->title}}</span>
                            </div>
                            <h5 class="ab-title">{{$iteam->translate($locale)->title}}</h5>
                            <p class="ab-text">{{$iteam->translate($locale)->content}}</p>
                            <a href="{{ URL('servicesDetails/sub_details/'.$iteam->id )}}"
                               class="ab-link">{{__('Learn more')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $x++; }else{?>

        <div class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="about-content">
                            <div class="ab-head">
                                <span></span>
                                <span>{{$iteam->translate($locale)->title}}</span>
                            </div>
                            <h5 class="ab-title">{{$iteam->translate($locale)->title}}</h5>
                            <p class="ab-text">{{$iteam->translate($locale)->content}} </p>
                            <a href="{{ URL('servicesDetails/sub_details/'.$iteam->id )}}"
                               class="ab-link">{{__('Learn more')}}</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="about-img">
                            <img src="{{Voyager::image($iteam['image'])}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $x++;  } ?>
    @endforeach

@endsection
