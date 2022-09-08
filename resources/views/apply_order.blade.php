
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

    <div class="apply-order">
        <div class="container">
            <div class="secton-header">
                <h6>{{__('Apply Order')}}</h6>
                <h5>{{__('Feel free to order whatever you want')}}</h5>
            </div>
            <div class="applay-form">
                @if ($errors->any())

                    <script>
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
                            text: "{{__('Your request has been successfully sent')}}",
                            icon: "success",
                            button: "{{__('ok')}}",
                        });
                    </script>
                @endif
                <form action="/order", method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="order-type">{{__('Choose the type of order')}}</label>
                                <select name="type" value="{{old('type')}}" id="order-type" class="customSelect form-control" >
                                    <option value="0">{{__('Technical Support Request')}}</option>
                                <!--<option value="1">{{__('Communication')}}</option>-->
                                    <option value="2">{{__('Visit')}}</option>
                                    <option value="4">{{__('complaint')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="name">{{__('The name')}}</label>
                                <input type="text" name="name" value="{{old('name')}}" id="name" placeholder="{{__('The name')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="email">{{__('E-mail')}}</label>
                                <input type="email" name="email" value="{{old('email')}}" id="email" placeholder="{{__('E-mail')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="phone_number">{{__('Phone number')}}</label>
                                <input type="phone_number" name="phone_number" value="{{old('phone_number')}}" id="phone_number" placeholder="{{__('Phone number')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="notes">{{__('Notes')}}</label>
                                <textarea name="notes" value="{{old('notes')}}" id="notes" class="form-control" placeholder="{{__('Notes')}}"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-12">
                            <div class="btn-submit">
                                <button type="submit" id="sub">{{__('Send')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
