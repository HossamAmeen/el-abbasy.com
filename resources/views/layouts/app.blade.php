<?php
use Illuminate\Support\Facades\App;

$locale = App::currentLocale();

//import swal from 'sweetalert';


//if (@$_SERVER['HTTPS'] !== "on") {
//    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//    header('HTTP/1.1 301 Moved Permanently');
//    header('Location: ' . $redirect);
//    exit();
//}
?>



<!DOCTYPE html>
<html lang="en"  prefix="og: http://ogp.me/ns#">

<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-22Y1BE8FHL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){window.dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-22Y1BE8FHL');
</script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


 @yield('meta')

 @yield('twittermeta')


    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->
    <!--<script>tinymce.init({selector:'textarea'});</script>-->

    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uicons-regular-rounded.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <?php
    if (App::isLocale('ar')) {?>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-ar.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <?php
    }else{
    ?>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-en.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/style-en.css') }}">
    <?php
    }
    ?>
    <link rel="stylesheet" href="{{ asset('assets/css/applay-order.css') }}">

    <link rel="icon" href="{{Voyager::image(setting('site.logo'))}}">
    <link rel="stylesheet" href="{{ asset('assets/css/payment.css') }}">


    <title> {{ setting('site.title') }} </title>

    <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '447719160278483');
        fbq('track', 'PageView');
        </script>
        <noscript>
         <img height="1" width="1"
        src="https://www.facebook.com/tr?id=447719160278483&ev=PageView
        &noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->


     <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "107419061635695");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/ar_AR/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>



  <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--<script async-->
    <!--        src="https://www.googletagmanager.com/gtag/js?id=968216352037"></script>-->
    <!--<script>-->
    <!--    window.dataLayer = window.dataLayer || [];-->

    <!--    function gtag() {-->
    <!--        dataLayer.push(arguments);-->
    <!--    }-->

    <!--    gtag('js', new Date());-->

    <!--    gtag('config', '968216352037');-->
    <!--</script>-->





</head>

<body>

  <!--<div class="spalch_parent">-->
  <!--  <div class="cube-wrapper">-->
  <!--    <div class="cube-folding">-->
  <!--      <span class="leaf1"></span>-->
  <!--      <span class="leaf2"></span>-->
  <!--      <span class="leaf3"></span>-->
  <!--      <span class="leaf4"></span>-->
  <!--    </div>-->
  <!--    <span class="loading" data-name="Loading">جاري التحميل</span>-->
  <!--  </div>-->
  <!--</div> -->


<div class="bg-sidenavOpen"></div>

<div id="mySidenav" class="sidenav">
    <div class="container">
        <img class="logo" style="width: 100px;" src="{{Voyager::image(setting('site.logo'))}}" alt="">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
            <i class="fas fa-times"></i>
        </a>
        <ul class="links list-unstyled wow animate__animated animate__bounceInDown">
            <li class="navItem"><a class="navLink" href="/home">{{__('Home')}}</a></li>
            <li class="navItem submenueParent">
                <a class="navLink">{{__('About group')}}</a>
                <ul class="list-unstyled submenue">
                    <li><a href="/AboutUs">{{__('About integrated business')}}</a></li>
                    <li><a href="/CommingSoon">{{__('About maintenance centers')}}</a></li>
                    <li><a href="/CommingSoon">{{__('about control systems')}}</a></li>
                </ul>
            </li>
            <li class="navItem submenueParent">
                <a class="navLink">{{__('Our services')}}</a>
                <ul class="list-unstyled submenue">
                    <li><a href="/integration_work_home">{{__('integrated business')}}</a></li>
                    <li><a href="/CommingSoon"> {{__('control systems')}} </a></li>
                    <li><a href="/CommingSoon">{{__('Service Centers')}}</a></li>
                    {{-- <li><a href="/mistake_article">{{__('Articles and Mistakes')}}</a></li> --}}
                    <li><a href="/eeta-academy">EETA ACADEMY</a></li>
                </ul>
            </li>
            <li class="navItem submenueParent">
                <a class="navLink">{{__('Our projects')}}</a>
                <ul class="list-unstyled submenue">
                    <li><a href="/our-works">{{__('integrated business')}}</a></li>
                    <li><a href="/CommingSoon">{{__('maintenance centers')}}</a></li>
                    <li><a href="/CommingSoon">{{__('control systems')}}</a></li>
                </ul>
            </li>
            <li class="navItem submenueParent">
                <a class="navLink">{{__('Staff service')}}</a>
                <ul class="list-unstyled submenue">
                    <li><a href="/Managers">{{__('Administration')}}</a></li>
                    <li><a href="/teamWork">{{__('Members')}}</a></li>
                </ul>
            </li>
            <li class="navItem submenueParent">
                <a class="navLink">{{__('Jobs')}}</a>
                <ul class="list-unstyled submenue">
                    <li><a href="/joinUs">{{__('join us')}}</a></li>
                    <li><a href="/jobs">{{__('Available jobs')}}</a></li>
                </ul>
            </li>
            <li class="navItem submenueParent">
                <a class="navLink">{{__('Apply')}}</a>
                <ul class="list-unstyled submenue">
                    <li><a href="/order">{{__('integrated business')}}</a></li>
                     <li><a href="/preview">{{__('Submit an inspection request')}}</a></li>
                    <li><a href="/CommingSoon">{{__('maintenance centers')}}</a></li>
                    <li><a href="/CommingSoon">{{__('control systems')}}</a></li>
                </ul>
            </li>
            <li class="navItem"><a class="navLink" href="/partners">{{__('Success Partners')}}</a></li>
            <li class="navItem"><a class="navLink" href="/contactUs">{{__('Contact us')}}</a></li>
            <!--<li class="navItem"><a class="navLink" href="/mistake_article">{{__('Articles and Mistakes')}}</a></li>-->

        </ul>
    </div>
    <div class="social">
        <a href="//{{ setting('site.facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="//{{ setting('site.twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="//{{ setting('site.linked_in') }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        <a href="//{{ setting('site.instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>
</div>


<div class="container-fluid">
    <div class="topheader">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 langParent">
          <span class="lang">
            <span class="spanLabel">{{__('language')}}</span>
            <select name="language" id="language" class="customSelect" onchange="location = this.value;">
              <option value="/language/ar" {{ $locale == 'ar' ? "selected" : ""  }}>AR</option>
              <option value="/language/en" {{ $locale == 'en' ? "selected" : ""  }}>EN</option>
            </select>
          </span>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="social">
                    <a href="//{{ setting('site.facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="//{{ setting('site.twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="//{{ setting('site.instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="//{{ setting('site.linked_in') }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- navbar -->
<div class="mynavbar">
    <div class="container-fluid">
        <div class="navbar-parent">
            <div class="menue">
                <img onClick="openNav()" src="{{ asset('assets/images/menu.png') }}" alt="">
            </div>
            <div class="logo">
                <img src="{{Voyager::image(setting('site.logo'))}}" alt="">
            </div>
            <ul class="list-unstyled nav-links">
                <li class="navItem"><a class="navLink" href="/home">{{__('Home')}}</a></li>
                <li class="navItem">
                    <a class="navLink">{{__('About group')}}</a>
                    <ul class="list-unstyled submenue">
                        <li><a href="/AboutUs">{{__('About integrated business')}}</a></li>
                        <li><a href="/CommingSoon">{{__('About maintenance centers')}}</a></li>
                        <li><a href="/CommingSoon">{{__('about control systems')}}</a></li>
                    </ul>
                </li>
                    <li class="navItem">
                    <a class="navLink">{{__('Our services')}}</a>
                    <ul class="list-unstyled submenue">
                        <li><a href="/integration_work_home">{{__('integrated business')}}</a></li>
                        <li><a href="/CommingSoon">{{__('control systems')}}</a></li>
                        <li><a href="/CommingSoon">{{__('Service Centers')}}</a></li>
                        {{-- <li><a href="/mistake_article">{{__('Articles and Mistakes')}}</a></li> --}}
                        <li><a href="/eeta-academy">EETA ACADEMY</a></li>
                    </ul>
                </li>
                <li class="navItem">
                    <a class="navLink">{{__('Our projects')}}</a>
                    <ul class="list-unstyled submenue">
                        <li><a href="/our-works">{{__('integrated business')}}</a></li>
                        <li><a href="/CommingSoon">{{__('maintenance centers')}}</a></li>
                        <li><a href="/CommingSoon">{{__('control systems')}}</a></li>
                    </ul>
                </li>
                <li class="navItem">
                    <a class="navLink">{{__('Staff service')}}</a>
                    <ul class="list-unstyled submenue">
                        <li><a href="/Managers">{{__('Administration')}}</a></li>
                        <li><a href="/teamWork">{{__('Members')}}</a></li>
                    </ul>
                </li>
                 <li class="navItem">
                    <a class="navLink">{{__('Jobs')}}</a>
                    <ul class="list-unstyled submenue">
                        <li><a href="/joinUs">{{__('join us')}}</a></li>
                        <li><a href="/jobs">{{__('Available jobs')}}</a></li>
                    </ul>
                </li>
                 <li class="navItem">
                    <a class="navLink">{{__('Apply')}}</a>
                    <ul class="list-unstyled submenue">
                        <li><a href="/order">{{__('integrated business')}}</a></li>
                         <li><a href="/preview">{{__('Submit an inspection request')}} <span class="new_note">(جديد)</span> </a></li>
                        <li><a href="/CommingSoon">{{__('maintenance centers')}}</a></li>
                        <li><a href="/CommingSoon">{{__('control systems')}}</a></li>
                    </ul>
                </li>
                <li class="navItem"><a class="navLink" href="/partners">{{__('Success Partners')}}</a></li>
                <li class="navItem"><a class="navLink" href="/contactUs">{{__('Contact us')}}</a></li>
                 <!--<li class="navItem"><a class="navLink" href="/">{{__('Our services')}}</a></li>-->
                 <!--<li class="navItem"><a class="navLink" href="/mistake_article">{{__('Articles and Mistakes')}}</a></li>-->
            </ul>
            <div class="applay">
                @guest
                    <a data-toggle="modal" data-target="#demo3" class="log">{{__('Sign in')}}</a>
                @else

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('My Account')}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/profile/{{Auth::user()->id}}"><i
                                    class="fas fa-user"></i><span>{{__('Account Information')}}</span></a>
                            <a class="dropdown-item" href="{{ route('signout') }}"><i
                                    class="fas fa-sign-out-alt"></i><span>{{__('Sign out')}}</span></a>
                        </div>
                    </div>

                    <!--<div class="btn-group">-->
                    <!--    <span class="btn" style="background: #cda274;">الحساب</span>-->
                    <!--    <button type="button" style="background: #cda274;" class="btn  dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--        <span class="sr-only">Toggle Dropdown</span>-->
                    <!--    </button>-->
                    <!--    <div class="dropdown-menu">-->
                <!--        <a class="dropdown-item" href="{{ route('signout') }}"> تسجيل الخروج</a>-->
                    <!--    </div>-->
                    <!--</div>-->
                @endguest
            </div>
        </div>
    </div>
</div>

<main class="">
    @yield('content')
</main>

<!-- footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-2">
                <div class="footer-logo">
                    <img src="{{ Voyager::image(setting('site.logo')) }}" alt="">
                    <p>{{ $locale == 'ar' ? setting('site.description_ar') : setting('site.description_en') }}</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <h5 class="footer-header">{{__('links')}}</h5>
                <div class="footer-links">
                    <ul class="list-unstyled">
                        <li><a href="/home">{{__('Home')}}</a></li>
                        <li><a href="/AboutUs">{{__('About group')}}</a></li>
                        <li><a href="/our-works">{{__('Our work')}}</a></li>
                        <li><a href="/contactUs">{{__('Branches')}}</a></li>
                        <li><a href="/partners">{{__('Success Partners')}}</a></li>
                        <li><a href="/Managers">{{__('Administration')}}</a></li>
                        <li><a href="/joinUs">{{__('join us')}}</a></li>
                        <li><a href="/contactUs">{{__('Contact us')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <h5 class="footer-header">{{__('Contact us')}}</h5>
                <div class="con">
                    <i class="fas fa-envelope"></i>
                    <span>{{ setting('site.email') }}</span>
                </div>
                <div class="con">
                    <i class="fas fa-mobile-alt"></i>
                    <span>{{ setting('site.phone') }}</span>
                </div>
                <div class="social">
                    <a href="//{{ setting('site.facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="//{{ setting('site.twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="//{{ setting('site.instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="//{{ setting('site.linked_in') }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <h5 class="footer-header">{{__('The main branch')}}</h5>
                <div class="footer-map">
                    <iframe src="{{ setting('site.map') }}" style="border:0;"
                            allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- logn modal -->
<div class="modal fade login-modal" id="demo3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog opacity-animate3">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="login-form">
                    <h5 class="form-head">{{__('Sign in')}}</h5>
                    <p style="text-align:center">{{__('Only for Egyptian Engineering clients')}} <br><span
                            style="font-size: 14px;color: #666;">{{__("The user name and password are received from the company's headquarters")}}</span>
                    </p>
                    @if ($errors->any())
                        <script>
                            swal({
                                title: "{{__('sorry')}}",
                                text: "{{__('Please make sure that the data is correct')}}",
                                icon: "error",
                                button: "{{__('ok')}}",
                            });
                        </script>
                    @endif
                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="email" id="email" class="form-control"
                                           placeholder="{{__('user name')}}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control"
                                           placeholder="{{__('password')}}" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">

                                <div class="btn-submit">
                                    <button type="submit">{{__('Sign in')}}</button>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="forger-pass">
                                    <!--<a href="">هل نسيت كلمة السر</a>-->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-ui.min.js')}}"></script>
  <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
  <script src="{{ asset('assets/js/repeater.js') }}"></script>
  <script src="{{ asset('assets/js/wow.js') }}"></script>
    <!-- <script src="./assets/fancybox/jquery.mousewheel-3.0.4.pack.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <!-- <script src="./assets/fancybox/jquery.fancybox-1.3.4.js"></script> -->
  <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/js/aos.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>
