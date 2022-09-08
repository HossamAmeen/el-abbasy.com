<?php
$locale = Config::get('app.locale');
?>
@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>
    <!--<div class="breadcrumb " style="position: relative;">-->
    <!--    <img src="{{ Voyager::image($page->image) }}" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" alt="" class="bg">        <h5 class="breadcrumb-content">{{$page->translate($locale)->title}}</h5>-->
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

    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="section-contact">
                        <h6>{{__('Contact us')}}</h6>
                        <h5>{{__('Do you have a question?')}}</h5>
                    </div>
                    <div class="cont">
                        <div class="cont-img">
                            <img src="./assets/images/phone-call (2).png" alt="">
                        </div>
                        <div class="con-content">
                            <h5>{{__('Phone number')}}</h5>
                            <p>{{ setting('site.phone') }}</p>
                        </div>
                    </div>
                    <div class="cont">
                        <div class="cont-img">
                            <img src="./assets/images/Page-1.png" alt="">
                        </div>
                        <div class="con-content">
                            <h5>{{__('E-mail')}}</h5>
                            <p>{{ setting('site.email') }}</p>
                        </div>
                    </div>
                    <div class="cont">
                        <div class="cont-img">
                            <img src="./assets/images/location (1).png" alt="">
                        </div>
                        <div class="con-content">
                            <h5>{{__('Address')}}</h5>
                            <p>{{ setting('site.address') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="contact-form">

                        @if ($errors->any())

                                    <script>
                                        //  import swal from 'sweetalert';
                                        swal({
                                            title: "{{__('sorry')}}",
                                            text: "{{__('Please make sure that the data is correct')}}",
                                            icon: "error",
                                            button: "{{__('ok')}}",
                                        });
                                    </script>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @elseif(empty($errors->any())&& isset($success) && $success == 1)
                            <script>
                                swal({
                                    title: "{{__('Thank you')}}",
                                    text: "{{__('your message has been sent successfully')}}",
                                    icon: "success",
                                    button: "{{__('ok')}}",
                                });
                            </script>
                        @endif
                        <form action="/contactUs" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="name" id="" class="form-control" value="{{old('name')}}"
                                               placeholder="{{__('The name')}} ">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="number" id="" class="form-control" value="{{old('number')}}"
                                               placeholder="{{__('Phone number')}}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <input type="email" name="email" id="" class="form-control" value="{{old('email')}}"
                                               placeholder="{{__('E-mail')}}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="message_title" id="" class="form-control" value="{{old('message_title')}}"
                                               placeholder="{{__('Type the message title')}}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <textarea name="message" id="" class="form-control" value="{{old('message')}}"
                                                  placeholder="{{__('Details')}}"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <button type="submit">{{__('Send now')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="branches">
        <div class="container">
            <div class="breadcrumb breadcrumb-branche">
                <h5>{{__('Branches')}}</h5>
            </div>
            <div class="row">
                @foreach($Branches as $Branch)
                    <div class="col-sm-12 col-lg-6">
                        <div class="branch-card">
                            <iframe
                                src="{{$Branch->google_map}}"
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            <div class="card-body">
                                <h5 class="card-title">{{$Branch->translate($locale)->name}}</h5>
                                <p class="card-text">
                                    <i class="fas fa-map-marked-alt"></i>
                                    <span>{{$Branch->translate($locale)->address}}</span>
                                </p>
                                <p class="card-text">
                                    <i class="fas fa-envelope"></i>
                                    <span class="fontdiffrent">{{$Branch->email}}</span>
                                </p>
                                <?php
                                $numbers = $Branch->phones;
                                ?>
                                @foreach($numbers as $num)
                                    <p class="card-text">
                                        <i class="fas fa-phone"></i>
                                        <span class="fontdiffrent">{{$num->number}}</span>
                                    </p>
                                @endforeach


                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
