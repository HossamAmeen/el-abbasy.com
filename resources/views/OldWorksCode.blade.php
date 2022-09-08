<?php
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

    <!--<div class="breadcrumb " style="position: relative;">-->
    <!--    <img src="{{ Voyager::image($page->image) }}"-->
    <!--         style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" alt="" class="bg">        <h5-->
    <!--        class="breadcrumb-content">{{$page->translate($locale)->title}}</h5>-->
    <!--    <ul class="list-unstyled">-->
    <!--        <li><a href="/home">{{__('Home')}}</a></li>-->
    <!--        <li><a href="">{{$page->translate($locale)->title}}</a></li>-->
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

    <div class="construction-design-work">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="progress-tab" data-toggle="tab" href="#progress" role="tab"
                       aria-controls="progress" aria-selected="true">{{__('Underway')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="done-tab" data-toggle="tab" href="#done" role="tab" aria-controls="done"
                       aria-selected="false">{{__('Been completed')}}</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active works-tabs" id="progress" role="tabpanel"
                     aria-labelledby="progress-tab">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                @for($i = 0 ; $i < count($in_progress_works) ; $i++)
                                    <a class="nav-link {{ $i == 0 ? 'active' : ''}}" id="v-pills-work-{{$i+1}}-tab"
                                       data-toggle="pill" href="#v-pills-work-{{$i+1}}" role="tab"
                                       aria-controls="v-pills-work-{{$i+1}}"
                                       aria-selected="{{ $i == 0 ? 'true' : 'false'}}">{{ $in_progress_works[$i]->translate($locale)->name }}</a>
                                @endfor
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                @for($i = 0 ; $i < count($in_progress_works) ; $i++)
                                    <div class="tab-pane fade show {{ $i == 0 ? 'active' : ''}}"
                                         id="v-pills-work-{{$i+1}}" role="tabpanel"
                                         aria-labelledby="v-pills-work-{{$i+1}}-tab">
                                        <div class="work-content">
                                            <div class="work-card"
                                                 style="background-image: url('{{Voyager::image($in_progress_works[$i]->image)}}');">
                                                <span class="s1"></span>
                                                <span class="s2"></span>
                                                <span class="s3"></span>
                                                <span class="s4"></span>
                                                <div class="container">
                                                    <h5 class="card-title">{!!html_entity_decode($in_progress_works[$i]->translate($locale)->image_title )!!}</h5>
                                                    <p class="card-text">{!!html_entity_decode($in_progress_works[$i]->translate($locale)->image_content )!!} </p>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <h5 class="card-title">{!!html_entity_decode($in_progress_works[$i]->translate($locale)->name )!!}</h5>
                                                <p class="card-text">{!!html_entity_decode($in_progress_works[$i]->translate($locale)->content)!!} </p>
                                            </div>
                                        </div>
                                        <div class="work-videos">
                                            <div class="row">

                                                @for($j = 0 ; $j < count($in_progress_works[$i]->videos) ; $j++)
                                                    <?php
                                                    $video = GetVideoURL($in_progress_works[$i]->videos[$j]->link);
                                                    ?>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="vido-frame">
                                                            <iframe height="315" src="{{ $video }}"
                                                                    title="YouTube video player" frameborder="0"
                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade works-tabs" id="done" role="tabpanel" aria-labelledby="done-tab">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                @for($i = 0 ; $i < count($finished_works) ; $i++)
                                    <a class="nav-link {{ $i == 0 ? 'active' : ''}}" id="v-pills-donework-{{$i+1}}-tab"
                                       data-toggle="pill" href="#v-pills-donework-{{$i+1}}" role="tab"
                                       aria-controls="v-pills-donework-{{$i+1}}"
                                       aria-selected="{{ $i == 0 ? 'true' : 'false'}}">{{ $finished_works[$i]->translate('ar')->name }}</a>
                                @endfor
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                @for($i = 0 ; $i < count($finished_works) ; $i++)

                                    <div class="tab-pane fade show {{ $i == 0 ? 'active' : ''}}"
                                         id="v-pills-donework-{{$i+1}}" role="tabpanel"
                                         aria-labelledby="v-pills-donework-{{$i+1}}-tab">
                                        <div class="work-content">
                                            <div class="work-card"
                                                 style="background-image: url('{{Voyager::image($finished_works[$i]->image)}}');">
                                                <span class="s1"></span>
                                                <span class="s2"></span>
                                                <span class="s3"></span>
                                                <span class="s4"></span>
                                                <div class="container">
                                                    <h5 class="card-title">{!!html_entity_decode($finished_works[$i]->translate($locale)->image_title )!!}</h5>
                                                    <p class="card-text">{!!html_entity_decode($finished_works[$i]->translate($locale)->image_content )!!} </p>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <h5 class="card-title">{!!html_entity_decode($finished_works[$i]->translate($locale)->name )!!}</h5>
                                                <p class="card-text">{!!html_entity_decode($finished_works[$i]->translate($locale)->content )!!} </p>
                                            </div>
                                        </div>
                                        <div class="work-videos">
                                            <div class="row">

                                                @for($j = 0 ; $j < count($finished_works[$i]->videos) ; $j++)
                                                    <?php
                                                    $video = GetVideoURL($finished_works[$i]->videos[$j]->link);
                                                    ?>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="vido-frame">
                                                            <iframe height="315" src="{{ $video }}"
                                                                    title="YouTube video player" frameborder="0"
                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
