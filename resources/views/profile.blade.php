<?php
use App\Enums\ContractStatus;
use App\Enums\ContractCategory;
$locale = Config::get('app.locale');

function GetVideoURL($Link)
{
    if (strpos($Link, "youtube.com")) {
        $Link = str_replace("watch?v=", "embed/", $Link);
    } elseif (strpos($Link, "vimeo.com")) {
        $Link = str_replace("vimeo.com/", "player.vimeo.com/video/", $Link);
    } else {
        $Link = "";
    }
    return $Link;
}

?>
@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>
    <!--<div class="breadcrumb " style="position: relative;">-->
    <!--    <img src="{{ Voyager::image($page->image) }}" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" alt="" class="bg">-->
    <!--    <h5 class="breadcrumb-content">{{$page->translate($locale)->title}}</h5>-->
    <!--    <ul class="list-unstyled">-->
    <!--        <li><a href="./home">{{__('Home')}}</a></li>-->
    <!--        <li><a href="">{{__('My Account')}}</a></li>-->
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


    <div class="profile-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="profile-info-content">
                        <ul class="list-unstyled info-list">
                            <li class="itemlist">
                                <h5>{{__('Customer Name')}}</h5>
                                <span>{{ $user->name }}</span>
                            </li>
                            @if(isset($apartment))
                                <li class="itemlist">
                                    <h5>{{__('Unit Type')}}</h5>
                                    <span>{{ $apartment->type }}</span>
                                </li>
                                <li class="itemlist">
                                    <h5>{{__('Unit address')}}</h5>
                                    <span>{{ $apartment->address }}</span>
                                </li>
                            @endif
                            @if(isset($contract))
                            <li class="itemlist">
                                    <h5>{{__('The type of contract')}}</h5>
                                <?php
                                $val = ContractCategory::fromValue($contract->contract_category)->key;
                                ?>
                                    <span>{{ __($val) }}</span>
                                </li>
                                <li class="itemlist">
                                    <h5>{{__('Contract Status')}}</h5>
                                    <span>{{ ContractStatus::fromValue($contract->status)->key }}</span>
                                </li>
                                <li class="itemlist">
                                    <h5>{{__('Date of contract')}}</h5>
                                    <span>{{ $contract->date }}</span>
                                </li>
                                <li class="itemlist">
                                    <h5>{{__('Beginning of the decade')}}</h5>
                                    <span>{{ $contract->start_date }}</span>
                                </li>
                                <li class="itemlist">
                                    <h5>{{__('End of the decade')}}</h5>
                                    <span>{{ $contract->end_date }}</span>
                                </li>
                                <li class="itemlist">
                                    <?php $end_date = Carbon\Carbon::parse($contract->end_date) ?>
                                    @if($contract->status == ContractStatus::expired || $end_date->isPast())
                                        <h5>{{__('Notes')}}</h5>
                                        <span>{{ $contract->note ? $contract->note : 'contract has ended' }}</span>
                                    @else
                                        <h5>{{__('the remaining time')}}</h5>
                                        <span>{{ Carbon\Carbon::parse($contract->end_date)->diffInDays(Carbon\Carbon::now()) }}</span>
                                    @endif
                                </li>
                                <li class="itemlist">
                                    <h5>{{__('Total Contract')}}</h5>
                                    <span>{{ $contract->total_price }}{{__('EGP')}}</span>
                                </li>
                            @endif
                            @if(isset($batches))
                                <li class="itemlist Payments">
                                    <h5>{{__('Payments')}}</h5>
                                    <span class="payment-parent">
                  @foreach($batches as $batch)
                                            <div
                                                class="paymeny-box {{$batch->status == 1 ? 'active' : ''}}">{{ $batch->value }}</div>
                                        @endforeach
                </span>
                                </li>
                                <li class="itemlist">
                                    <h5>{{__('Residual')}}</h5>
                                    <span>{{ $remaining_price }} {{__('EGP')}}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="profile-content-picture">
                        <div class="contract-slider" dir="ltr">
                            <?php
                            if(isset($contract->images)){
                            $explode_photo = json_decode($contract->images, true);
                            ?>
                            @foreach($explode_photo as $photo)
                                <div class="slider-item">
                                    <img src="{{Voyager::image($photo)}}" alt="">
                                </div>
                            @endforeach
                            <?php
                            }else{
                            ?>
                            <div class="slider-item">
                                <img src="{{asset('assets/images/roam-in-color-AwOG1tC5buE-unsplash.png')}}" alt="">
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @if(isset($steps))
            <div class="steps">
                <div class="container">
                    <div class="breadcrumb">
                        <h5>{{__('Stages')}}</h5>
                    </div>
                    <div id="accordion">
                        <?php
                        $x = 0;
                        ?>
                        @foreach($steps as $step)
                            <?php
                                $sub_step = $step->sub_steps($apartment->id);
                                ?>
                                <div class="card">
                                    <div class="card-header" id="heading{{$x}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapse{{$x}}"
                                                    aria-expanded="false" aria-controls="collapse{{$x}}">
                                                {{$step->translate($locale)->name}}
                                            </button>
                                        </h5>
{{--                                        <div class="status done">--}}
{{--                                            <span class="pollit"></span>--}}
{{--                                            <span>{{$step->translate($locale)->status }}</span>--}}
{{--                                        </div>--}}
                                    </div>

                                    <div id="collapse{{$x}}" class="collapse" aria-labelledby="heading{{$x}}"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <?php $y = 0;?>
                                            <div id="subaccordion{{$x}}">

                                                @foreach($sub_step as $sub)
                                                    <div class="card">
                                                        <div class="card-header" id="headingSub{{$y}}">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse"
                                                                        data-target="#collapseSub{{$y}}"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapseSub{{$y}}">
                                                                    {{ $sub->translate($locale)->name }}
                                                                </button>
                                                            </h5>
                                                            <?php
                                                            $imagesbefore = $sub->sub_images->where('status', \App\Enums\ImagesStatus::before)->first();
                                                            $imagesafter = $sub->sub_images->where('status', \App\Enums\ImagesStatus::after)->first();
                                                            if (!empty($imagesbefore)) {
                                                                $explode_photo = json_decode($imagesbefore->image, true);
                                                                $explode_video = json_decode($imagesbefore->localvideos, true);
                                                                $links = $imagesbefore->links;
                                                                $link = explode(',', $links);
//
                                                            } else {
                                                                $explode_photo = [];
                                                                $explode_video = [];
                                                                $link = [];
                                                            }
                                                            ?>
                                                            @if(empty($imagesbefore))
                                                                <div class="status">
                                                                    <span class="pollit"></span>
                                                                    <span>{{__('Not started')}}</span>
                                                                </div>
                                                            @elseif(!empty($imagesafter))
                                                                <div class="status done">
                                                                    <span class="pollit"></span>
                                                                    <span>{{__('Been completed')}}</span>
                                                                </div>
                                                            @else
                                                                <div class="status progerresss">
                                                                    <span class="pollit"></span>
                                                                    <span>{{__('Underway')}}</span>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div id="collapseSub{{$y}}" class="collapse "
                                                             aria-labelledby="headingSub{{$y}}"
                                                             data-parent="#subaccordion{{$x}}">
                                                            <div class="card-body">
                                                                <nav>
                                                                    <div class="nav nav-tabs" id="nav-tab"
                                                                         role="tablist">
                                                                        <a class="nav-item nav-link "
                                                                           id="nav-bf-sub-{{$y}}-photo-tab"
                                                                           data-toggle="tab"
                                                                           href="#nav-bf-sub-{{$y}}-photo" role="tab"
                                                                           aria-controls="nav-bf-sub-{{$y}}-photo"
                                                                           aria-selected="true">{{__('Pictures before')}}</a>
                                                                        <a class="nav-item nav-link"
                                                                           id="nav-now-sub-{{$y}}-photo-tab"
                                                                           data-toggle="tab"
                                                                           href="#nav-now-sub-{{$y}}-photo" role="tab"
                                                                           aria-controls="nav-now-sub-{{$y}}-photo"
                                                                           aria-selected="true">{{__('Pictures during')}}</a>
                                                                        <a class="nav-item nav-link"
                                                                           id="nav-af-sub-{{$y}}-photo-tab"
                                                                           data-toggle="tab"
                                                                           href="#nav-af-sub-{{$y}}-photo" role="tab"
                                                                           aria-controls="nav-af-sub-{{$y}}-photo"
                                                                           aria-selected="false">{{__('Pictures after')}}</a>
                                                                    </div>
                                                                </nav>
                                                                <div class="tab-content" id="nav-tabContent">
                                                                    <div class="tab-pane fade"
                                                                         id="nav-bf-sub-{{$y}}-photo"
                                                                         role="tabpanel"
                                                                         aria-labelledby="nav-bf-sub-{{$y}}-photo-tab">
                                                                        <div class="row">
                                                                            @if(!empty($explode_photo))
                                                                                @foreach( $explode_photo as $value)
                                                                                    <div
                                                                                        class="col-sm-12 col-md-6 col-lg-4">
                                                                                        <div class="card-img">
                                                                                            <img
                                                                                                src="{{Voyager::image($value)}}"
                                                                                                alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-4">
                                                                                    <div class="card-img">
                                                                                    </div>
                                                                                </div>
                                                                            @endif

                                                                            @if(!empty($link))
                                                                                @foreach($link as $value)
                                                                                    <?php
                                                                                    $video = GetVideoURL($value);
                                                                                    ?>
                                                                                    <div
                                                                                        class="col-sm-12 col-md-6 col-lg-4">
                                                                                        <div class="card-video">
                                                                                            <!-- <img src="./assets/images/bg.png" alt=""> -->
                                                                                            <iframe width="100%"
                                                                                                    height="252px"
                                                                                                    src="{{ $video }}"
                                                                                                    title="YouTube video player"
                                                                                                    frameborder="0"
                                                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                                                    allowfullscreen></iframe>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach

                                                                            @endif
                                                                            @if(!empty($explode_video))
                                                                                @foreach($explode_video as $value)
                                                                                    <div
                                                                                        class="col-sm-12 col-md-6 col-lg-4">
                                                                                        <div class="">
                                                                                            <div class="card-video">
                                                                                                <video
                                                                                                    src="{{ Voyager::image($value['download_link'])}}"
                                                                                                    controls
                                                                                                    height="252px"
                                                                                                    width="100%"></video>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach

                                                                            @endif

                                                                        </div>
                                                                    </div>

                                                                    <?php $imagesduring = $sub->sub_images->where('status', \App\Enums\ImagesStatus::during)->first();
                                                                  if (!empty($imagesduring)) {
                                                                        $explode_photo = json_decode($imagesduring->image, true);
                                                                        $explode_video = json_decode($imagesduring->localvideos, true);
                                                                        $links = $imagesduring->links;
                                                                        $link = explode(',', $links);

                                                                    } else {
                                                                        $explode_photo = [];
                                                                        $explode_video = [];
                                                                        $link = [];
                                                                    }
                                                                    ?>

                                                                    <div class="tab-pane fade show active"
                                                                         id="nav-now-sub-{{$y}}-photo"
                                                                         role="tabpanel"
                                                                         aria-labelledby="nav-now-sub-{{$y}}-photo-tab">
                                                                        <div class="row">
                                                                            @if(!empty($explode_photo))
                                                                                @foreach($explode_photo as $value)
                                                                                    <div
                                                                                        class="col-sm-12 col-md-6 col-lg-4">
                                                                                        <div class="card-img">
                                                                                            <img
                                                                                                src="{{Voyager::image($value)}}"
                                                                                                alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-4">
                                                                                    <div class="card-img">

                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @if(!empty($link))
                                                                                @foreach( $link as $value)
                                                                                    <?php
                                                                                    $video = GetVideoURL($value);
                                                                                    ?>
                                                                                    <div
                                                                                        class="col-sm-12 col-md-6 col-lg-4">
                                                                                        <div class="card-video">
                                                                                            <!-- <img src="./assets/images/bg.png" alt=""> -->
                                                                                            <iframe width="100%"
                                                                                                    height="252px"
                                                                                                    src="{{ $video }}"
                                                                                                    title="YouTube video player"
                                                                                                    frameborder="0"
                                                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                                                    allowfullscreen></iframe>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach

                                                                            @endif
                                                                            @if(!empty($explode_video))
                                                                                @foreach($explode_video as $value)
                                                                                    <div
                                                                                        class="col-sm-12 col-md-6 col-lg-4">
                                                                                        <div class="">
                                                                                            <div class="card-video">
                                                                                                <video
                                                                                                    src="{{ Voyager::image( $value['download_link']) }}"
                                                                                                    controls
                                                                                                    height="252px"
                                                                                                    width="100%"></video>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @endif

                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                    if (!empty($imagesafter)) {
                                                                        $explode_photo = json_decode($imagesafter->image, true);
                                                                        $explode_video = json_decode($imagesafter->localvideos, true);
                                                                        $links = $imagesafter->links;
                                                                        $link = explode(',', $links);
                                                                    } else {
                                                                        $explode_photo = [];
                                                                        $explode_video = [];
                                                                        $link = [];
                                                                    }
                                                                    ?>

                                                                    <div class="tab-pane fade"
                                                                         id="nav-af-sub-{{$y}}-photo"
                                                                         role="tabpanel"
                                                                         aria-labelledby="nav-af-sub-{{$y}}-photo-tab">
                                                                        <div class="row">
                                                                            @if(!empty($explode_photo))
                                                                                @foreach($explode_photo as $value)
                                                                                    <div
                                                                                        class="col-sm-12 col-md-6 col-lg-4">
                                                                                        <div class="card-img">
                                                                                            <img
                                                                                                src="{{Voyager::image($value)}}"
                                                                                                alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else

                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-4">
                                                                                    <div class="card-img">

                                                                                    </div>
                                                                                </div>

                                                                            @endif

                                                                            @if(!empty($link))
                                                                                @foreach( $link as $value)
                                                                                    <?php
                                                                                    $video = GetVideoURL($value);
                                                                                    ?>
                                                                                    <div
                                                                                        class="col-sm-12 col-md-6 col-lg-4">
                                                                                        <div class="card-video">
                                                                                            <!-- <img src="./assets/images/bg.png" alt=""> -->
                                                                                            <iframe width="100%"
                                                                                                    height="252px"
                                                                                                    src="{{ $video }}"
                                                                                                    title="YouTube video player"
                                                                                                    frameborder="0"
                                                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                                                    allowfullscreen></iframe>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach

                                                                            @endif

                                                                            @if(!empty($explode_video))
                                                                                @foreach($explode_video as $value)
                                                                                    <div
                                                                                        class="col-sm-12 col-md-6 col-lg-4">
                                                                                        <div class="">
                                                                                            <div class="card-video">
                                                                                                <video
                                                                                                    src="{{ Voyager::image( $value['download_link']) }}"
                                                                                                    controls
                                                                                                    height="252px"
                                                                                                    width="100%"></video>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php $y++; ?>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $x++; ?>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
