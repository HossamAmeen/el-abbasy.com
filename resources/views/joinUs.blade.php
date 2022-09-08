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

    <div class="apply-order">
        <div class="container">
            <div class="secton-header">
                <h6>{{__('join us')}}</h6>
                <h5>{{__('Join the Abbasi group')}}</h5>
            </div>
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
            <div class="applay-form join-us-form">
                <form action="/joinUs" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="order-type">{{__('Choose a job type')}}</label>
                                <select name="job_id" id="order-type" class="customSelect form-control" id="">
                                    @foreach($jobs as $job)
                                        <option value="{{$job->id}}">{{$job->translate($locale)->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="name">{{__('Full name')}}</label>
                                <input type="text" name="name" value="{{old('name')}}" id="name"
                                       placeholder="{{__('Full name')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="prith-date">{{__('Date of birth')}}</label>
                                <input type="date" name="birthday" value="{{old('birthday')}}" id="prith-date"
                                       placeholder="{{__('Date of birth')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="order-type">{{__('Sex type')}}</label>
                                <select name="sex_type" id="sex_type" value="{{old('sex_type')}}"
                                        class="customSelect form-control">
                                    <option value="0">{{ __('Male') }}</option>
                                    <option value="1">{{ __('Female') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="nationality">{{__('Nationality')}}</label>
                                <input type="text" name="nationality" value="{{old('nationality')}}" id="nationality"
                                       placeholder="{{__('Nationality')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6" id="militry-service">
                            <div class="form-group">
                                <label for="militry-service">{{__('Military service')}}</label>
                                <select name="military_status" value="{{old('military_status')}}" id="militry-service"
                                        class="customSelect form-control" id="">
                                    <option value="0">{{__('Exemption')}}</option>
                                    <option value="1">{{__('Delayed')}}</option>
                                    <option value="2">{{__('complete')}}</option>
                                    <option value="3">{{__('not his turn')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6" id="civil-service" style="display: none">
                            <div class="form-group">
                                <label for="civil-service">{{__('Civil service')}}</label>
                                <select name="civil_status" value="{{old('civil_status')}}" id="civil-service"
                                        class="customSelect form-control" id="">
                                    <option value="0">{{__('uncompleted')}}</option>
                                    <option value="1">{{__('complete')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="ID-number">{{__('National ID')}}</label>
                                <input type="number" name="national_id" value="{{old('national_id')}}" id="ID-number"
                                       placeholder="{{__('National ID')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="phone-number">{{__('Phone number')}}</label>
                                <input type="text" name="number" value="{{old('number')}}" id="phone-number"
                                       placeholder="{{__('Phone number')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="email">{{__('E-mail')}}</label>
                                <input type="email" name="email" value="{{old('email')}}" id="email"
                                       placeholder="{{__('E-mail')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="address">{{__('Address')}}</label>
                                <input name="address" value="{{old('address')}}" id="address"
                                          placeholder="{{__('Address')}}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="address">{{__('Skills')}}</label>
                                <textarea name="skills" value="{{old('skills')}}" id="address"
                                          placeholder="{{__('Tell us about yourself and your skills')}}" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-12">
                            <h4 class="ro-head breadcrumb">{{__('last academic qualification')}}</h4>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="form-group">
                                <label for="education">{{__("Qualification type")}}</label>
                                <select name="qualification_type" value="{{old('qualification_type')}}" id="education"
                                        class="customSelect form-control" id="">
                                    <option value="mid">{{__('middle')}}</option>
                                    <option value="up_mid">{{__('Above average')}}</option>
                                    <option value="collage">{{__('academic')}}</option>
                                    <option value="master">{{__('Postgraduate')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="form-group">
                                <label for="taken-year">{{__('Qualification name')}}</label>
                                <input type="text" name="qualification_name" value="{{old('qualification_name')}}"
                                       id="taken-year" placeholder="{{__('Example of a Bachelor of Engineering')}}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="form-group">
                                <label for="taken-year">{{__('University Name')}}</label>
                                <input type="text" name="qualification_number" value="{{old('qualification_number')}}"
                                       id="taken-year" placeholder="{{__('University Name')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-12">
                            <h4 class="ro-head breadcrumb">{{__('Of experience')}}</h4>
                        </div>
                        <div id="repeater" class="col-sm-12 col-lg-12 parentcol">
                            <a class="add-anouther-certificate repeater-add-btn">
                                <i class="fas fa-plus-circle"></i>
                                <span>{{__('Add experience')}}</span>
                            </a>
                            <div class="items" data-group="experience">
                                <div class="item-content">
                                    <div class="row parentRow">
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="jopcompany">{{__("The Company's name")}}</label>
                                                <input type="text" data-name="company-name" class="form-control"
                                                       placeholder="{{__("The Company's name")}}"
                                                       name="experience[][company]"
                                                       value="{{old('experience[][company]')}}" id="jopcompany">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="jopname">{{__('Job name')}}</label>
                                                <input type="text" data-name="job-name" class="form-control"
                                                       placeholder="{{__('Job name')}}" name="experience[][job_title]"
                                                       value="{{old('experience[][job_title]')}}" id="jopname">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-1">
                                            <div class="form-group">
                                                <label for="yerastart">{{__('From')}}</label>
                                                <input type="number" data-name="start-date" class="form-control"
                                                       placeholder="2019" name="experience[][year_start]"
                                                       value="{{old('experience[][year_start]')}}" id="yerastart">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-1">
                                            <div class="form-group">
                                                <label for="yeraend">{{__('To')}}</label>
                                                <input type="number" data-name="end-date" class="form-control"
                                                       placeholder="2020" name="experience[][year_end]"
                                                       value="{{old('experience[][year_end]')}}" id="yeraend">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-1">
                                            <div class="form-group">
                                                <label for="netslary">{{__('salary')}}</label>
                                                <input type="number" data-name="net-salary" class="form-control"
                                                       placeholder="2300" name="experience[][net_salary]"
                                                       value="{{old('experience[][net_salary]')}}" id="netslary">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="leavereson">{{__('Reason for leaving')}}  </label>
                                                <input type="text" data-name="leave-reason" class="form-control"
                                                       placeholder="{{__('Reason for leaving')}} "
                                                       name="experience[][leave_reason]"
                                                       value="{{old('experience[][leave_reason]')}}" id="leavereson">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <a class="remove-certifcate remove-btn">
                                                <i class="fas fa-minus-circle"></i>
                                                <span>{{__('Delete experience')}}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-12">
                            <div class="btn-submit">
                                <button type="submit">{{__('Send')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
