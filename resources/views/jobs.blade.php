@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    function SubContent($Text, $MaxLength) {
    if (strlen($Text) > $MaxLength) {
        return mb_substr(strip_tags($Text), 0, $MaxLength, "UTF-8") . ".... ";
    } else {
        return strip_tags($Text);
    }
}
    ?>

    <!--<div class="breadcrumb " style="position: relative;">-->
    <!--    <img src="{{ Voyager::image($page->image) }}"-->
    <!--         style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" alt="" class="bg">-->
    <!--    <h5 class="breadcrumb-content">{{$page->translate($locale)->title}}</h5>-->
    <!--    <ul class="list-unstyled">-->
    <!--        <li><a href="/home">{{__('Home')}}</a></li>-->
    <!--        <li><a href="">{{$page->translate($locale)->title}}</a></li>-->
    <!--    </ul>-->
    <!--</div>-->

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

    <div class="jobs-page">
        <div class="container">
            <div class="secton-header">
                <h6>{{__('Jobs')}}</h6>
                <h5>{{__('Jobs')}}</h5>
            </div>
            <div class="row">
                <?php
                $x = 0;
                ?>
                @foreach($Jobs as $Job)
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="jobs-card">
                            <div class="card-img"
                                 style="background-image: url('{{Voyager::image($Job['image'])}}');"></div>
                            <h5 class="card-title">{{$Job->translate($locale)->name}}</h5>
                            <p class="card-text">
                               <?php
                               $text = SubContent($Job->translate($locale)->title ,100);
                               ?>
                                {!!html_entity_decode($text)!!}
                            </p>
                            <a class="card-link" data-toggle="modal"
                               data-target="#readMore<?=$x?>">{{__('Read more')}}</a>
                            <a href="/joinUs" class="card-modal">{{__('Apply for a job')}}</a>
                        </div>
                    </div>
                    <?php
                    $x++;
                    ?>
                @endforeach


            </div>
        </div>
    </div>

    <?php

    $x = 0;
    ?>
    @foreach($Jobs as $Job)
        <!-- Modal -->
        <div class="modal fade readMore" id="readMore<?=$x?>" tabindex="-1" role="dialog"
             aria-labelledby="readMoreLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="readMoreLabel">{{$Job->translate($locale)->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="content">
                            <h5>{{__('Job Description')}}</h5>
                            <p class="card-text">
                                {!!html_entity_decode($Job->translate($locale)->title)!!}
                            </p>
                        </div>
                        <div class="content">
                            <h5>{{__('Functional tasks')}}</h5>
                            <p class="card-text">
                                {!!html_entity_decode($Job->translate($locale)->functional_tasks)!!}
                            </p>
                        </div>
                        <div class="content">
                            <h5>{{__('Job Requirements')}}</h5>
                            <p class="card-text">
                            {!!html_entity_decode($Job->translate($locale)->requirements)!!}
                            </p>
                        </div>
                        <a href="/joinUs" class="applay-job">{{__('Apply for a job')}}</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $x++;
        ?>
    @endforeach




@endsection
