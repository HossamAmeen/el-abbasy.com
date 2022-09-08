<?php
$locale = Config::get('app.locale');
?>
@extends('layouts.app')

@section('content')


    <!--<div class="breadcrumb " style="position: relative;">-->
    <!--    <img src="{{ Voyager::image($page->image) }}" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" alt="" class="bg">        <h5 class="breadcrumb-content">{{$page->translate($locale)->title}}</h5>-->
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

    <div class="parnters">
        <div class="container">
            <div class="secton-header">
                <h6>{{__('Partners')}}</h6>
                <h5>{{__('the distinguished')}}</h5>
            </div>
            <div class="row">
                @foreach($Partners as $Partner)
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        @if(!empty($Partner->link))
                            <a target="_blank" style="color:#000;" href="{{$Partner->link}}">
                                @else
                                    <a style="color:#000;" href="#">
                                        @endif
                                        <div class="parnter-card" data-aos="fade-up"  data-aos-duration="3000">
                                            <div class="card-img">

                                                <img src="{{Voyager::image($Partner->image)}}" alt="">

                                            </div>
                                            <h5 class="card-title">{{$Partner->translate($locale)->name}}</h5>
                                        </div>
                                    </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
