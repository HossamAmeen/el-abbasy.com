
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

  <div class="our-team">
    <div class="container">
      <div class="secton-header">
        <h5>{{__('Management team')}}</h5>
        <h6>{{__('Staff')}}</h6>
      </div>
      <div class="team-cards">
          @for($i=0;$i<=1;$i++)
              @if($i==0||$i==1)
               @if(isset($Managers[$i]))
        <div class="row">
          <div class="col-sm-12 col-md-2 col-lg-3 mx-auto">
            <button class="team-card-title" data-toggle="modal" data-target="#MemberTeam{{$i}}">
              <h5>{{$Managers[$i]->translate($locale)->type}}</h5>
            </button>
          </div>
        </div>
                 @endif
              @endif
          @endfor

        <div class="row row-border">
            @for($i=2;$i<count($Managers);$i++)
             @if(isset($Managers[$i]))
          <div class="col-sm-12 col-md-2 col-lg-4">

            <button class="team-card-title" data-toggle="modal" data-target="#MemberTeam{{$i}}">
              <h5>{{$Managers[$i]->translate($locale)->type}}</h5>
            </button>
          </div>
           @endif
            @endfor
        </div>
      </div>
    </div>
  </div>





  <!-- bootstrap modal -->

  <!-- Modal -->
    @for($i=0;$i<count($Managers);$i++)
  <div class="modal fade" id="MemberTeam{{$i}}" tabindex="-1" role="dialog" aria-labelledby="MemberTeamLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="team-card">
            <div class="card-img" style="background-image: url('{{Voyager::image($Managers[$i]->image)}}');"></div>
            <h5 class="card-title">{{$Managers[$i]->translate($locale)->name}}</h5>
            <p class="card-text">{{$Managers[$i]->translate($locale)->title}}</p>
            <p class="card-line">{{$Managers[$i]->translate($locale)->content}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
    @endfor
@endsection
