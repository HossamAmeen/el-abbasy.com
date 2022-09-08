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

    <div class="check_cirtifcate">
        <div class="container">
            <div class="secton-header">
                <h6>{{__('verification')}}</h6>
                <h5>{{__('Is your certificate true?')}}</h5>
            </div>
            <form action="" class="col-lg-6 mx-auto" id="check_certificate" >
                @csrf
                <div class="form-group">
                    <input type="text" name="certificate_id" placeholder="{{__('Please enter the certificate code')}}" id="" class="form-control">
                </div>
                <div class="note">
                    <p>* {{__('The certificate code is located at the bottom of the certificate from the right')}}</p>
                </div>
                <button  type="submit"  class="btn" > {{__('verification')}} </button>
            </form>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="checkCertificateModal" tabindex="-1" role="dialog"
         aria-labelledby="checkCertificateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="graduateer_box" id="DivIdToPrint" style="display: none">

                    </div>

                    <div class="wrong_data" style="display: none" id="wrong_id">
                      <h5>{{__('Sorry.. the data is correct')}}</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info btnBrint">{{__('Print')}}</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">{{__('Close')}}</button>
                </div>
            </div>
        </div>
    </div>




@endsection
