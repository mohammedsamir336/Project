<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">

 <link rel="icon" href="{{ asset('img/m.png') }}" type="image/icon type">

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

 <!-- change direction of allpage-->
     @if(App::getLocale() == 'ar')
     <link rel="stylesheet" type="text/css" href="{{ asset('css/rtl.css') }}">
     @else
     <link rel="stylesheet" type="text/css" href="{{ asset('css/ltr.css') }}">
     @endif
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">


<style media="screen">

body, html {
  height: 100%; }

body {
  background-image: url("https://mdbootstrap.com/wp-content/uploads/2019/02/back.jpg");
  background-position: center;
  background-repeat: no-repeat;
  -webkit-background-size: cover;
  background-size: cover; }

.mobile-box {
  width: 360px;
  height: 640px;
  color: #fff;
  text-align: center;
  -webkit-box-shadow: 0 27px 24px 0 rgba(0, 0, 0, 0.2), 0 40px 77px 0 rgba(0, 0, 0, 0.92) !important;
  box-shadow: 0 27px 24px 0 rgba(0, 0, 0, 0.2), 0 40px 77px 0 rgba(0, 0, 0, 0.92) !important; }

.view .bg-image {
  height: 100%; }

.view .gradient-mask {
  background: -webkit-linear-gradient(rgba(0, 47, 75, 0.8) 0%, rgba(220, 66, 37, 0.8) 100%);
  background: -o-linear-gradient(rgba(0, 47, 75, 0.8) 0%, rgba(220, 66, 37, 0.8) 100%);
  background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 47, 75, 0.8)), to(rgba(220, 66, 37, 0.8)));
  background: linear-gradient(rgba(0, 47, 75, 0.8) 0%, rgba(220, 66, 37, 0.8) 100%);
  /* Chrome10+,Safari5.1+ */
  /* Opera 11.10+ */
  /* IE10+ */
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#002f4b', endColorstr='#00000000', GradientType=0); }

.view a {
  color: #fff; }
  .view a:hover {
    color: #dfdfdf; }

.view input[type=text], .view input[type=password], .view input[type=email] {
  border-bottom: 1px solid #ffffff; }

.view .md-form input[type=text]:focus:not([readonly]), .view .md-form input[type=password]:focus:not([readonly]), .view .md-form input[type=email]:focus:not([readonly]) {
  border-bottom: 1px solid #bbdefb !important;
  -webkit-box-shadow: 0 1px 0 0 #bbdefb !important;
  box-shadow: 0 1px 0 0 #bbdefb !important; }

.view .md-form label {
  color: #ffffff }
  .view .md-form label.active {
    color: #bbdefb !important; }

    /*to to remove blue background and black text from input*/
      @-webkit-keyframes autofill {
    to {
    color: #ffffff ;
    background: transparent; } }

    @keyframes autofill {
    to {
    color: #ffffff ;
    background: transparent; } }

    input:-webkit-autofill {
    -webkit-animation-name: autofill;
    animation-name: autofill;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both; }
/*end autofill*/

/* password toggle icon*/
    span.field-icon {
      position: absolute;
      display: inline-block;
      cursor: pointer;
      right: 0.5rem;
      top: 0.7rem;
      color: $input-label-color;
      z-index: 2;
    }

    .goog-te-banner-frame.skiptranslate{display:none!important;}
    body{top:0px!important;}
</style>

</head>
<body>



  @yield('content')
