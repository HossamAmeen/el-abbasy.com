<?php
use Illuminate\Support\Facades\App;
$locale = App::currentLocale();
?>
@extends('layouts.app')
@section('meta')
    <meta property="og:title" content="{{$package->translate($locale)->name}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:description" content="{{$package->translate($locale)->content}}">
    <meta property="og:image" content="{{Voyager::image($package['image_detail'])}}"/>
@endsection
@section('twittermeta')
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@el-abbasy">
    <meta name="twitter:title" content="{{$package->translate($locale)->name}}">
    <meta name="twitter:description" content="{{$package->translate($locale)->content}}">
    <meta name="twitter:image" content="{{Voyager::image($package['image_detail'])}}">
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
            <li><a href="/packages">{{__('Offers and packages')}}</a></li>
            <li><a href="">{{$page->translate($locale)->title}}</a></li>
        </ul>
    </div>

    <div class="quta_details">

    <div class="eeta_academy_social">
        <ul class="list-unstyled">
        <li><a href="http://www.facebook.com/sharer.php?u={{$url}}"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="http://twitter.com/share?url={{$url}}"><i class="fab fa-twitter"></i></a></li>
{{--        <li><a href=""><i class="fab fa-instagram"></i></a></li>--}}
        <li><a href="https://api.whatsapp.com/send?text={{$url}}"><i class="fab fa-whatsapp"></i></a></li>
{{--        <li><a href=""><i class="fas fa-envelope"></i></a></li>--}}

      </ul>
    </div>

        <div class="container">
            <div class="quta_img">
                <div class="img_wrapper">
                    <img src="{{Voyager::image($package['image_detail'])}}" alt="" width="500">
                </div>
            </div>
            <div class="quta_information">
                <p class="quta_par">
                    {{$package->translate($locale)->content}}
                </p>

                <ul class="list-unstyled quta_date">
                    <li>{{__('This offer is valid until')}} <span>{{$package->translate($locale)->end_date}}</span></li>
                    <li>{{__('Remaining time on offer')}}<span>{{ Carbon\Carbon::parse($package->end_date)->diffInDays(Carbon\Carbon::now()) }} {{__('Day')}} </span></li>
                </ul>

                <div class="quta_cards_all">
                    <div class="row align-items-start justify-content-center ">

                        @foreach($package_details as $package_detail)
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="quta_info_card">
                                    <div class="half_circle_title">{{$package_detail->translate($locale)->name}}</div>
                                    <div class="details_box">
                                        <ul class="list-unstyled">
                                            @if ($package_detail->translate($locale)->content != "")
                                                <?php
                                                $coun = 1;
                                                ?>
                                                @foreach(explode(',', $package_detail->translate($locale)->content) as $info)
                                                    <li><span class="number">{{$coun}}</span> <span>{!! $info !!}</span>
                                                    </li>
                                                    <?php $coun++; ?>
                                                @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="quta_condition">
                    <h5>{{__('Terms of benefiting from the offer')}}</h5>
                    <ul>
                        @if ($package->translate($locale)->policy != "")
                            @foreach(explode(',', $package->translate($locale)->policy) as $info)
                                <li>{{$info}} </li>
                            @endforeach
                        @endif

                    </ul>
                </div>

                <div class="quta_condition">
                    <h5>{{__('Installment terms')}}</h5>
                    <ul>
                        @if ($package->translate($locale)->term != "")
                            @foreach(explode(',', $package->translate($locale)->term) as $info)
                                <li>{{$info}} </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="get_this_quta">
                    <a href="/package_form">{{__('Take advantage of this offer')}}</a>
                </div>

                <div class="floating_btn_get_quta">
                    <a href="/package_form">{{__('Take advantage of this offer')}}</a>
                </div>

            </div>
        </div>
    </div>





    <script>

    </script>
@endsection
