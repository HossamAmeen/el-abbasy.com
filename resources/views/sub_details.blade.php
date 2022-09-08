@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    
    ?>

    <!--<div class="breadcrumb" style="position: relative;">-->
    <!--    <img src="{{ Voyager::image($page->image) }}" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" alt="" class="bg">-->
    <!--    <h5 class="breadcrumb-content">{{ $sub_details->translate($locale)->title }}</h5>-->
    <!--    <ul class="list-unstyled">-->
    <!--        <li><a href="/home">{{ __('Home') }}</a></li>-->
    <!--        <li><a href="">{{ $page->translate($locale)->title }}</a></li>-->
    <!--    </ul>-->
    <!--</div>-->

    <div class="breadcrumb " style="position: relative;">
        <div class="img_parent">
            <img src="{{ Voyager::image($page->image) }}">      
            <!--<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="">-->
            <!--    <source src="https://el-abbasy.com//storage/settings/June2022/fnRYxfl59lEh3H9QevmW.mp4" type="video/mp4">-->
            <!--</video>-->
        </div>
        <h5 class="breadcrumb-content">{{$page->translate($locale)->title}}</h5>
        <ul class="list-unstyled">
            <li><a href="/home">{{__('Home')}}</a></li>
            <li><a href="">{{$page->translate($locale)->title}}</a></li>
        </ul>
    </div>

    <div class="sub-serv-details">
        <div class="container">
            <div class="sub-img"><img src="{{Voyager::image($sub_details['image_details'])}}" alt=""></div>
            <div class="sub-content">
                <p>{!!html_entity_decode($sub_details->translate($locale)->details )!!}
                </p>
            </div>
            <div class="row">
                <?php $explode_photo = json_decode($sub_details->photos, true);
                //                 print_r($explode_photo[0]) ;
                // die();
                ?>
                @foreach($explode_photo as $value)
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card-img about-serv-card"
                             style="background-image: url('{{ Voyager::image($value) }}');">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
