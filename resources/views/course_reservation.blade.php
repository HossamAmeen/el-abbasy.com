
@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>
 <style>
    .payment_type_parent1, .payment_type_parent2{
       display: none; 
    }
  </style>
<div class="breadcrumb" style="background-image: url({{asset('assets/images/breadcrumb.png')}});">
    <h5 class="breadcrumb-content">معاينه الطلب</h5>
  </div>


  <div class="academe_rigister apply-order">

    <div class="eeta_academy_social">
      <ul class="list-unstyled">
        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
        <li><a href=""><i class="fab fa-twitter"></i></a></li>
        <li><a href=""><i class="fab fa-instagram"></i></a></li>
        <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
        <li><a href=""><i class="fas fa-envelope"></i></a></li>
        <li><a href=""><i class="fas fa-phone-alt"></i></a></li>
        <li><a href=""><i class="fas fa-map-marker-alt"></i></a></li>
      </ul>
    </div>

    <div class="container">
      <div class="secton-header">
        <h6>تقديم طلب</h6>
        <h5>لا تتردد في طلب ما تريد</h5>
      </div>
      <div class="applay-form">
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

        <form action="{{url('course_reservation/'.$course_id)}}" method="POST">
            @csrf
          <div class="row">

          
          
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="program">البرنامج التدريبي</label>
                <select name="course_id" class="form-control customSelect course_select" id="program" required>

                  {{-- <option  selected disabled>يرجى اختيار البرنامج التدريبي</option> --}}
                  @foreach ($courses as $item)
                     <option value="{{$item->id}}"  @if($course_id == $item->id)selected @endif>{{$item->course_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>


            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" name="name" id="name" placeholder="الاسم" required class="form-control">
              </div>
            </div>
            


            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="national">الجنسية</label>
                <input type="text" name="nationality" id="national" placeholder="الجنسية" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="IDnumber">رقم الهوية</label>
                <input type="text" name="national_id" id="IDnumber" placeholder="يرجى ادخال رقم الهوية / جواز السفر لغير المصريين"
                  class="form-control" required>
                <span class="note_number" style="color: red; font-size: 12px;">* يجب ن يكون الرقم باللغة الانجليزية</span>

              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">مفتاح الدوله – رقم الهاتف</label>
                <input type="text" name="phone_number" id="phoneNumber"
                  placeholder="يررج ادخال الهاتف مسبوقا برمز الدوله التابع لها - )00000 - 00000000000)"
                  class="form-control" required>
                <span class="note_number" style="color: red; font-size: 12px;">* يجب ن يكون الرقم باللغة الانجليزية</span>

              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber"> البريد الإلكتروني </label>
                <input type="email" name="email" id="phoneNumber" placeholder="البريد الإلكتروني" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="program">الدرجه العلميه</label>
                <select name="degree" class="form-control customSelect" id="program" >
                  {{-- <option  selected disabled>يرجى اختيار الدرجه العلميه</option> --}}
                  <option value="طالب">طالب</option>
                  <option  value="متوسط">متوسط</option>
                  <option  value="فوق متوسط">فوق متوسط</option>
                  <option  value="ليسانس">ليسانس</option>
                  <option  value="بكارليوس">بكارليوس</option>
                  <option  value="ماجيستير">ماجيستير</option>
                  <option  value="دكتوراه">دكتوراه</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">التخصص</label>
                
                 <select name="specialty" class="form-control customSelect" id="program" >
                  @foreach ($specialties as $item)
                  <option >{{$item->name}}</option>
                  @endforeach
                </select>
                <!--<input type="text" name="specialty" id="phoneNumber" placeholder="يرجى ادخال التخصص بالدراسه "-->
                <!--  class="form-control" required>-->
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">الكلية</label>
                <input type="text" name="collage" id="phoneNumber" placeholder="يرجى ادخال اسم الكلية " class="form-control" required>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">الجامعه</label>
                <input type="text" name="university" id="phoneNumber" placeholder="يرجى ادخال اسم الجامعه " class="form-control" required>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">الوقت المفضل </label>
                <select name="favourite_time" class="form-control customSelect" id="program" >
                  <option value="صباحي">صباحي</option>
                  <option value="مسائي">مسائي</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">الحضور المفضل</label>
                <select name="favourite_attendees" class="form-control customSelect" id="program" >
                  <option value="عن بعد">عن بعد</option>
                  <option value="لحضور باحد مراكز التدريب">لحضور باحد مراكز التدريب</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="order-type3">الدفع</label>
                <select name="payment_time" id="order-type3" class="form-control customSelect payment-preview payment_time_meth" >
                  <option value="later">لاحقا</option>
                  <option value="now">الان</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 payment_type_parent1">
                <div class="form-group">
                  <label for="order-type3">  الدفع الان </label>
                  <select name="payment_option" id="order-type3" class="form-control customSelect payment-preview payment_option" >
                   <option value="1">المبلغ كاملا</option>
                   <option value="2">قيمة الحجز</option>
                  </select>
                </div>
             </div>

            <div class="col-sm-12 col-md-12 col-lg-12 payment_type_parent2">
              <div class="form-group">
                <label for="order-type3"> طريقة الدفع </label>
                <select name="payment_method" id="order-type3" class="form-control customSelect payment-preview num-preview-course" >
                  {{-- <option value="">اختر طريقة الدفع</option> --}}
                  <option data-attr="1" value="1">فيزا</option>
                  <option data-attr="0" value="0">
                      الدفع بالمحفظة (فودافون - اورانج - اتصالات)</option>
                  <option data-attr="2" value="3">الدفع بالتقسيط</option>
                   
                </select>
              </div>
            </div>
            
            <div class="col-sm-12 col-md-12 col-lg-12 phone-preview-course" style="display: none" >
              <div class="form-group">
                <label for="phone_number">رقم هاتف المحفظة</label>
                <input type="text" name="wallet_phone_number"  id="phone_number" placeholder="رقم هاتف المحفظة"
                  class="form-control" >
              </div>
            </div>
            
            
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="cost">
                    <h5>  {{ __('Please pay an amount') }}<span id="pricenum" class="cost_price">@if(isset($course) ) {{$course->course_cost_after}} @endif <span>ج</span></span>{{ __('pound_and_old_price')}}<span id="oldprice" class="disount">@if(isset($course) ) {{$course->course_cost_before}} @endif <span>{{__('EGP')}}</span></span> </h5>
                </div>
                <input name="price" id="priceinput" value="{{old('price')}}" type="hidden">
            </div>

            <div class="col-sm-12 col-lg-12">
              <div class="btn-submit">
                <button data-target="#applayResult" data-toggle="modal">ارسال</button>
              </div>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>

@endsection