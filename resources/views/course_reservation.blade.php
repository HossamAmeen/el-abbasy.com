
@extends('layouts.app')

@section('content')
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>
 <style>
    .payment_type_parent1, .payment_type_parent2{
      /* display: none; */
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
                <select name="course_id" class="form-control customSelect" id="program">

                  <option  selected disabled>يرجى اختيار البرنامج التدريبي</option>
                  @foreach ($courses as $item)
                     <option value="{{$item->id}}"  @if($course_id == $item->id)selected @endif>{{$item->course_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" name="name" id="name" placeholder="الاسم" class="form-control">
              </div>
            </div>
            


            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="national">الجنسية</label>
                <input type="text" name="nationality" id="national" placeholder="الجنسية" class="form-control">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="IDnumber">رقم الهوية</label>
                <input type="text" name="national_id" id="IDnumber" placeholder="يرجى ادخال رقم الهوية / جواز السفر لغير المصريين"
                  class="form-control">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">مفتاح الدوله – رقم الهاتف</label>
                <input type="text" name="phone_number" id="phoneNumber"
                  placeholder="يررج ادخال الهاتف مسبوقا برمز الدوله التابع لها - )00000 - 00000000000)"
                  class="form-control">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber"> البريد الإلكتروني </label>
                <input type="email" name="email" id="phoneNumber" placeholder="البريد الإلكتروني" class="form-control">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="program">الدرجه العلميه</label>
                <select name="degree" class="form-control customSelect" id="program">
                  <option  selected disabled>يرجى اختيار الدرجه العلميه</option>
                  <option >طالب</option>
                  <option >متوسط</option>
                  <option >فوق متوسط</option>
                  <option >ليسانس</option>
                  <option >بكارليوس</option>
                  <option >ماجيستير</option>
                  <option >دكتوراه</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">التخصص</label>
                <input type="text" name="specialty" id="phoneNumber" placeholder="يرجى ادخال التخصص بالدراسه "
                  class="form-control">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">الكلية</label>
                <input type="text" name="collage" id="phoneNumber" placeholder="يرجى ادخال اسم الكلية " class="form-control">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">الجامعه</label>
                <input type="text" name="university" id="phoneNumber" placeholder="يرجى ادخال اسم الجامعه " class="form-control">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">الوقت المفضل </label>
                <select name="favourite_time" class="form-control customSelect" id="program">
                  <option >صباحي</option>
                  <option >مسائي</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="phoneNumber">الحضور المفضل</label>
                <select name="favourite_attendees" class="form-control customSelect" id="program">
                  <option >عن بعد</option>
                  <option >لحضور باحد مراكز التدريب</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="order-type3">الدفع</label>
                <select name="payment_time" id="order-type3" class="form-control customSelect payment-preview payment_time">
                  <option value="later">لاحقا</option>
                  <option value="now">الان</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 payment_type_parent1">
                <div class="form-group">
                  <label for="order-type3">  الدفع الان </label>
                  <select name="payment_option" id="order-type3" class="form-control customSelect payment-preview">
                   <option value="">المبلغ كاملا</option>
                   <option value="">قيمة الحجز</option>
                  </select>
                </div>
              </div>

            <div class="col-sm-12 col-md-12 col-lg-12 payment_type_parent2">
              <div class="form-group">
                <label for="order-type3"> طريقة الدفع </label>
                <select name="payment_method" id="order-type3" class="form-control customSelect payment-preview">
                  <option >اختر طريقة الدفع</option>
                  <option value="0">الدفع بالمحفظة (فودافون - اورانج - اتصالات)</option>
                  <option value="1">فيزا</option>
                  <option value="3">الدفع بالتقسيط</option>
                </select>
              </div>
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

  <script>
    if ($(".payment_time").length) {
      $(".payment_time").on('change', function () {
        let payment_value = $(this).val();
        if (payment_value == "now") {
          // payment_value
          $(this).parent().parent().next('.payment_type_parent').slideDown();
          $(this).closest(".academe_rigister").find('.payment_type_parent1').slideDown();
          $(this).closest(".academe_rigister").find('.payment_type_parent2').slideDown();
        } else if (payment_value == "later") {
          // payment_value
          $(this).parent().parent().next('.payment_type_parent').slideUp();
          $(this).closest(".academe_rigister").find('.payment_type_parent1').slideUp();
          $(this).closest(".academe_rigister").find('.payment_type_parent2').slideUp();
        }
      })
    }
  </script>
@endsection