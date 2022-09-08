
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

<div class="about-construction-design">
    <div class="who-us">
        <div class="container">
            <div class="who-content">
                <img src="{{Voyager::image($AboutUs[0]['image'])}}" alt="">
                <div class="secton-header">
                    <h6>من نحن</h6>
                    <h5>{{$AboutUs[0]->translate($locale)->title}}</h5>
                </div>
                <p>
                    {{$AboutUs[0]->translate($locale)->content}}
                </p>

            </div>


                   <!--<div class="card-img" style="background-image: url('{{Voyager::image($AboutUs[1]['image'])}}'); height: 109px;">-->
                   <!--             <h5>{{$AboutUs[1]->translate($locale)->title}}</h5>-->
                   <!--         </div>-->
                   <!--         <p class="card-text">-->
                   <!--             {{$AboutUs[1]->translate($locale)->content}}-->
                   <!--         </p>-->

            <div class="aboutCards">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="aboutCar">
                            <div class="card_icon"><i class="fas fa-paper-plane"></i></div>
                            <h5>{{$AboutUs[1]->translate($locale)->title}}</h5>
                            <p class="card-text">
                                {{$AboutUs[1]->translate($locale)->content}}
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="aboutCar">
                            <div class="card_icon"><i class="fas fa-eye"></i></div>
                            <h5>{{$AboutUs[2]->translate($locale)->title}}</h5>
                            <p class="card-text">
                                {{$AboutUs[2]->translate($locale)->content}}
                            </p>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="aboutCar">
                            <div class="card_icon"><i class="fas fa-bullseye"></i></div>
                            <h5>{{$AboutUs[3]->translate($locale)->title}}</h5>
                             <p class="card-text">
                                {{$AboutUs[3]->translate($locale)->content}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
