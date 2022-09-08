

@extends('layouts.app')

@section('content')

<style>
  .comming_soon {
    text-align: center;
    padding: 50px 0;
  }

  .comming_soon img {
    width: 600px;
    max-width: 100%;
    margin: auto;
  }

  .comming_soon h5 {
    font-size: 2rem;
    margin: 50px 0;
  }

  .comming_soon a {
    background-color: #ad8458;
    color: #fff;
    padding: 5px 20px;
    padding-top: 10px;
    border-radius: 5px;
    border: 1px solid #ad8458;
  }
  .comming_soon a:hover{
    background-color: #fff;
    color: #ad8458;
  }
</style>




<div class="comming_soon" >
  <div class="container">
    <img src="./assets/images/wating-you.svg" alt="">
    <h5>الصفحة تحت التحديث</h5>
    <div class="option_btn">
      <a href="javascript:history.back()">الرجوع للخلف</a>
      <a href="/">الرئيسية</a>
    </div>
  </div>
</div>

@endsection
