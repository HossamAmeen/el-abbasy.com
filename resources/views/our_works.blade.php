@extends('layouts.app')

@section('content')

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

<div class="new_our_works">
    <div class="container">
        <div class="filter_icon">
            <a href="">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5 col-lg-4">
                <div class="works_filter">
                    <div class="filter_header">
                        <span class="andel">{{ __('Close') }}</span>
                        <h5>{{ __('categories') }}</h5>
                    </div>
                    <div class="filter_content">
                        <ul class="list-unstyled">
                            @foreach($categories as $category)
                                <li class="nav_item submenu_parent">
                                    <a class="nav_link  nav_link_active"><span>{{$category->translate($locale)->name}}</span> <i class="fas fa-sort-down"></i></a>
                                    <div class="submenu">
                                        <ul class="list-unstyled">
                                            @foreach($category->work_sub_categories as $sub_category)
                                            <li class="submenu_item"><a class="submenu_link " href="" data-target="#{{$sub_category->id}}"> <span>{{$sub_category->translate($locale)->name}}</span> <i
                                                        class="fas fa-chevron-down"></i> </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-8">

                <div class="work_cards_parents">
                    <div class="works_parent active_tab" id="all">
                        <div class="wrks_box">
                            <div class="works_box_header">
                                <h5>{{__('all')}}</h5>
                            </div>
                            <div class="works_cards_parent">
                                <div class="row">
                                    @foreach($categories as $category)
                                            @foreach($category->work_sub_categories as $sub_category)
                                                @foreach($sub_category->works as $work)
                                                    <div class="col-sm-12 col-lg-6">
                                                        <a href="/our-works/{{$work->id}}" class="work_card">
                                                            <div class="card_img">
                                                                <div class="img_parent">
                                                                    <img src="{{ Voyager::image($work->image) }}" alt="">
                                                                </div>
                                                            </div>
                                                            <h5 class="card_title">{{$work->translate($locale)->name}}</h5>
                                                            <div class="place">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                                <span>{{$work->translate($locale)->location}}</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($categories as $category)
                        @foreach($category->work_sub_categories as $sub_category)
                            <div class="works_parent" id="{{$sub_category->id}}">
                                <div class="wrks_box">
                                    <div class="works_box_header">
                                        <h5>{{$sub_category->translate($locale)->name}}</h5>
                                    </div>
                                    <div class="works_cards_parent">
                                        <div class="row">
                                            @foreach($sub_category->works as $work)
                                                <div class="col-sm-12 col-lg-6">
                                                    <a href="/our-works/{{$work->id}}" class="work_card">
                                                        <div class="card_img">
                                                            <div class="img_parent">
                                                                <img src="{{ Voyager::image($work->image) }}" alt="">
                                                            </div>
                                                        </div>
                                                        <h5 class="card_title">{{ $work->translate($locale)->name }}</h5>
                                                        <div class="place">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            <span>{{$work->translate($locale)->location}}</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
