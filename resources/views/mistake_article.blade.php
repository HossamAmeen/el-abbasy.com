
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


  <div class="article-mistakes construction-design-work">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="progress-tab" data-toggle="tab" href="#progress" role="tab"
            aria-controls="progress" aria-selected="true">{{__('articles')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="done-tab" data-toggle="tab" href="#done" role="tab" aria-controls="done"
            aria-selected="false">{{ __('mistakes') }}</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active works-tabs" id="progress" role="tabpanel" aria-labelledby="progress-tab">
          <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3">
              <div class="nav flex-column nav-pills article-nav" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                  @for($i=0 ; $i < count($article_categories); $i++)
                      <a class="nav-link {{$i == 0 ? 'active' : ''}}" id="v-pills-work-{{$i+1}}-tab" data-toggle="pill" href="#v-pills-work-{{$i+1}}" role="tab"
                         aria-controls="v-pills-work-{{$i+1}}" aria-selected="{{ $i == 0 ? 'true' : 'false' }}">{{ $article_categories[$i]->translate($locale)->name }}</a>
                  @endfor
              </div>

            </div>
            <div class="col-sm-12 col-md-8 col-lg-9">
              <div class="tab-content" id="v-pills-tabContent">
                  @for($i=0 ; $i < count($article_categories); $i++)
                      <div class="tab-pane fade {{$i == 0 ? 'show active' : ''}}" id="v-pills-work-{{$i+1}}" role="tabpanel"
                           aria-labelledby="v-pills-work-{{$i+1}}-tab">
                          <div class="row">
                              @foreach($article_categories[$i]->articles as $article)
                                  <div class="col-sm-12 col-md-6 col-lg-4">
                                      <div class="article-mistake-card">
                                          <div class="card-img" style="background-image: url('{{Voyager::image($article->cover_image)}}');"></div>
                                          <div class="card-body">
                                              <h5 class="card-title">{{ $article->translate($locale)->cover_name }}</h5>
                                              <p class="card-text"> {{ $article->translate($locale)->cover_content }} </p>
                                              <a href="article_details/{{$article->id}}" class="read-more">{{__('Read more')}}</a>
                                          </div>
                                      </div>
                                  </div>
                              @endforeach
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
              <div class="nav flex-column nav-pills article-nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @for($i=0 ; $i < count($mistake_categories); $i++)
                    <a class="nav-link {{$i == 0 ? 'active' : ''}}" id="v-pills-donework-{{$i+1}}-tab" data-toggle="pill" href="#v-pills-donework-{{$i+1}}" role="tab"
                    aria-controls="v-pills-donework-{{$i+1}}" aria-selected="{{ $i == 0 ? 'true' : 'false' }}">{{ $mistake_categories[$i]->translate($locale)->name }}</a>
                @endfor
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-9">
              <div class="tab-content" id="v-pills-tabContent">
                @for($i=0 ; $i < count($mistake_categories); $i++)
                    <div class="tab-pane fade {{$i == 0 ? 'show active' : ''}}" id="v-pills-donework-{{$i+1}}" role="tabpanel"
                    aria-labelledby="v-pills-donework-{{$i+1}}-tab">
                        <div class="row">
                            @foreach($mistake_categories[$i]->mistakes as $mistake)
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="article-mistake-card">
                                        <div class="card-img" style="background-image: url('{{Voyager::image($mistake->content_image)}}');"></div>
                                        <div class="card-body">
                                        <h5 class="card-title">{{ $mistake->translate($locale)->name }}</h5>
                                        <p class="card-text"> {{ $mistake->translate($locale)->content }} </p>
                                        <a href="mistake_details/{{$mistake->id}}" class="read-more">{{__('Read more')}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
