@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>

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


    <div class="apply-order quta_applay">
        <div class="container">
            <div class="secton-header">
                <h6> {{ __('Apply Order') }}</h6>
                <h5>{{__('Feel free to order whatever you want')}}</h5>
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
            <div class="applay-form">
                <form action="/package_form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group applay-type">
                                <label for="order-type0">{{__('package_name')}}</label>
                                <select name="package_id" id="order-type0" class="customSelect form-control order-type-package" id="">
                                    <option value="selected" selected disabled>{{__('choose')}}</option>
                                    @foreach($packages as $package)
                                        <option value="{{$package->id}}">{{$package->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="name">{{__('The name')}}</label>
                                <input type="text" name="name" value="{{old('name')}}" id="name"
                                       placeholder="{{__('The name')}}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="phone_number">{{__('Phone number')}}</label>
                                <input type="phone_number" name="number" value="{{old('number')}}" id="phone_number"
                                       placeholder="{{__('Phone number')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="email">{{__('E-mail')}}</label>
                                <input type="email" name="email" value="{{old('email')}}" id="email"
                                       placeholder="{{__('E-mail')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="addional-information">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="jumbrton">
                                            <h6>{{__('additional information')}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="email1">{{__('job')}}</label>
                                            <input type="text" name="job" value="{{old('job')}}" id="email1"
                                                   placeholder="{{__('job')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="order-type3">{{__('Governorate')}}</label>
                                            <select name="governorate" value="{{old('governorate')}}" id="order-type3"
                                                    class=" form-control select0" id="">
                                                <option value="">{{__('Choose Governorate')}}</option>
                                                @foreach($Governorates as $Governorate)
                                                    <option
                                                        value="{{$Governorate->id}}">{{$Governorate->translate($locale)->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="order-type2">{{__('City')}}</label>
                                            <select name="city" id="mySelect" value="{{old('city')}}"
                                                    class=" form-control select1 Options">
                                                <option value="">{{__('Choose Governorate first')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="notes2">{{__('Address detail')}}</label>
                                            <textarea name="address" value="{{old('address')}}" id="notes2"
                                                      class="form-control"
                                                      placeholder="{{__('Address detail')}}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="order-type3">{{__('Unit type')}}</label>
                                            <select name="apartment_type" value="{{old('apartment_type')}}"
                                                    id="order-type3" class=" form-control" id="">
                                                <option value="شقه">{{__('apartment')}}</option>
                                                <option value="فيلا">{{__('Villa')}}</option>
                                                <option value="عماره">{{__('Residential Building')}}</option>
                                                <option value="اداري">{{__('Administrative')}}</option>
                                                <option value="تجاري">{{__('commercial')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="order-type4">{{__('area')}}</label>
                                            <div class="input-group">
                                                <input type="number" name="apartment_area"
                                                       value="{{old('apartment_area')}}" id="order-type4"
                                                       placeholder="{{__('area')}}" class="form-control">
                                                <div class="input-group-append">
                                <span class="input-group-text"
                                      id="basic-addon2">{{__('m2')}} <sup>2</sup></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="order-type3">{{__('Unit state')}}</label>
                                            <select name="apartment_status" value="{{old('apartment_status')}}"
                                                    id="order-type3" class="form-control">
                                                <option value="طوب">{{__('Bricks')}}</option>
                                                <option
                                                    value="تاسيس سباكه و كهرباء">{{__('Plumbing and electrical installation')}}</option>
                                                <option value="محاره">{{__('conch')}}</option>
                                                <option value="تجديد">{{__('renewal')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group label-lone">
                                            <label for="orderr label-lone">{{__('Arrival times')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2">{{__('To')}}</span>
                                                </div>
                                                <input name="available_end" value="{{old('available_end')}}"
                                                       type="text" class="form-control"
                                                       aria-label="Text input with dropdown button">
                                                <div class="input-group-append">
                                                    <select name="end_stat" id="order-type3"
                                                            class="customSelect form-control" id="">
                                                        <option value="am">{{__('am')}}</option>
                                                        <option value="pm">{{__('pm')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                          id="basic-addon2">{{__('From')}}</span>
                                                </div>
                                                <input name="available_start"
                                                       value="{{old('available_start')}}" type="text"
                                                       class="form-control"
                                                       aria-label="Text input with dropdown button">
                                                <div class="input-group-append">
                                                    <select name="start_stat" id="order-type3"
                                                            class="customSelect form-control" id="">
                                                        <option value="am">{{__('am')}}</option>
                                                        <option value="pm">{{__('pm')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="cost">
                                            <h5>  {{ __('Please pay an amount') }}<span id="pricenum" class="cost_price">0 <span>ج</span></span>{{ __('pound_and_old_price')}}<span id="oldprice" class="disount">0<span>{{__('EGP')}}</span></span> </h5>
                                        </div>
                                        <input name="price" id="priceinput" value="{{old('price')}}" type="hidden">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="order-type3">{{__('paying off')}}</label>
                                <select name="payment_time" id="order-type3"
                                        class="form-control payment-preview payment_time">
                                    <option value="later">{{__('later')}}</option>
                                    <option value="now">{{__('now')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 payment_type_parent">
                            <div class="form-group">
                                <label for="order-type3">{{__('paying off')}}</label>
                                <select name="payment_method" id="order-type3" class="form-control num-preview-package">
                                    <option value="">{{__('Choose your payment method')}}</option>
                                    <option value="0">{{__('Wallet Payment (Vodafone - Orange - Etisalat)')}}</option>
                                    <option value="1">{{__('Visa')}}</option>
                                    <option value="3">{{__('Installment')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 phone-preview-package" style="display: none">
                            <div class="form-group">
                                <label for="phone_number">{{__('phone preview')}}</label>
                                <input type="phone_number" name="wallet_phone" value="{{old('wallet_phone')}}"
                                       id="phone_number"
                                       placeholder="{{__('phone preview')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="notes">{{__('Notes')}}</label>
                                <textarea name="notes" value="{{old('notes')}}" id="notes" class="form-control"
                                          placeholder="{{__('Notes')}}"></textarea>
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



    <!-- Modal -->
    <div class="modal fade notification_modal" id="applayResult" tabindex="-1" role="dialog"
         aria-labelledby="applayResultTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    تم استلام طلبكم وسيتم التواصل معكم عن طريق خدمة العملاء في غضون ٤٨ ساعه عمل
                </div>
            </div>
        </div>
    </div>

@endsection
