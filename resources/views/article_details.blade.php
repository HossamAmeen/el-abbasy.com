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
@section('meta')

    <meta property="og:title" content="{!!html_entity_decode($article->translate($locale)->cover_name)!!}"/>
    <meta property="og:url" content="{{$url}}"/>

    <meta property="og:image" content="{{Voyager::image($article->cover_image)}}"/>
@endsection
@section('twittermeta')
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@el-abbasy">
    <meta name="twitter:title" content="{!!html_entity_decode($article->translate($locale)->cover_name)!!}">
    <meta name="twitter:image" content="{{Voyager::image($article->cover_image)}}">
@endsection

@section('content')

    <!--<div class="breadcrumb " style="position: relative;">-->
    <!--    <img src="{{ Voyager::image($page->image) }}" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" alt="" class="bg">        <h5 class="breadcrumb-content">{{$page->translate($locale)->title}}</h5>-->
    <!--    <ul class="list-unstyled">-->
    <!--        <li><a href="/home">{{__('Home')}}</a></li>-->
    <!--        <li><a href="/mistake_article">{{__('Articles and Mistakes')}}</a></li>-->
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


    <div class="article-details-page">
        <div class="container">
            <div class="main-article-slider">
                <div class="slider slider-for" dir="ltr">
                    <?php
                    if (isset($article->images)) {
                        $explode_photo = json_decode($article->images, true);

                    }
                    // var_dump($explode_photo);

                    for($i = 0;$i < count($explode_photo);$i++){
                    // var_dump(count($explode_photo));
                    // die();
                    ?>
                    <div>
                        <div class="card-img img-fluid">
                            <a href="{{Voyager::image($explode_photo[$i])}}" class="img_parent" data-fancybox="gallery"
                               rel="group1">
                                <img src="{{Voyager::image($explode_photo[$i])}}" alt="">
                            </a>
                            <div class="pic-number"><?= $i + 1 ?></div>
                        </div>
                    </div>
                    <?php }?>
                </div>

                <div class="slider slider-nav" dir="ltr">
                    @foreach($explode_photo as $photo)
                        <div>
                            <div class="card-img img-fluid"
                                 style="background-image: url('{{Voyager::image($photo)}}');"></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="article-pargraph">

                <h2 class="article_title">{{ $article->translate($locale)->cover_name }}</h2>

                {!!html_entity_decode($article->translate($locale)->content)!!}
            </div>

            <div class="articlemistake_share">
                <div class="wrapper">
                    <span>{{ __('share') }}</span>
                    <ul class="list-unstyled">
                        <li><a target="_blank" href="http://www.facebook.com/sharer.php?u={{$url}}"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="http://twitter.com/share?url={{$url}}"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="https://api.whatsapp.com/send?text={{$url}}"><i
                                    class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>


            @if(count($article->article_videos)!=0)
                <div class="article-video">
                    <h5 class="jumbrton bg-dark">{{__('Videos')}}</h5>
                    <div class="article-video-slider" dir="ltr">
                        @for($j = 0 ; $j < count($article->article_videos) ; $j++)
                            <?php
                            $explode_video = [];
                            $show_video = [];
                            if(!empty($article->article_videos[$j]->url)){
                            $video = GetVideoURL($article->article_videos[$j]->url);
                            ?>
                            <div class="slider-item">
                                <!-- <video src="./assets/video/videof.mp4" controls></video> -->
                                <a data-fancybox id="example1" href="{{ $video }}">
                                    <img src="{{Voyager::image($article->article_videos[$j]->image)}}" alt="">
                                </a>
                            </div>
                            <?php }else {
                            $explode_video = json_decode($article->article_videos[$j], true);
                            $show_video = json_decode($explode_video['file'], true);
                            ?>
                            @if(!empty($show_video))
                                @foreach($show_video as $value)

                                    <div class="slider-item">
                                        <!-- <video src="./assets/video/videof.mp4" controls></video> -->
                                        <a data-fancybox id="example1"
                                           href="{{ Voyager::image($value['download_link'])}}">
                                            <img src="{{Voyager::image($article->article_videos[$j]->image)}}" alt="">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                            <?php }?>
                        @endfor
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
