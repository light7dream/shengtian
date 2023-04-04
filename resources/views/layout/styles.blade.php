@section('styles')
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">
    
<!-- CSS 
========================= -->
<!--bootstrap min css-->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<!--owl carousel min css-->
<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
<!--slick min css-->
<link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
<!--magnific popup min css-->
<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
<!--font awesome css-->
<link rel="stylesheet" href="{{asset('assets/css/font.awesome.css')}}">
<!--ionicons min css-->
<link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
<!--animate css-->
<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
<!--jquery ui min css-->
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
<!--slinky menu css-->
<link rel="stylesheet" href="{{asset('assets/css/slinky.menu.css')}}">
<!--plugins css-->
<link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">

<!-- Main Style CSS -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

<style>
.goog-te-gadget-icon {
  display:none;
}

.goog-te-gadget-simple {
    background-color: #ecebf0 !important;
    border:0 !important;
    font-size: 5pt;
    font-weight:500;
    display: inline-block;
    padding:2px 2px !important;
    cursor: pointer;
    width: 30px;
    height: 30px;
    zoom: 1;
}

.goog-te-gadget-simple  span {
   color:#3e3065 !important;
}

.skiptranslate :first{
  display:none !important;
}

#goog-gt- {
  display: none !important;
}
</style>

<style>

body {
    top: 0!important;
}

.single_product:hover .add_to_cart {
    /* opacity: 1; */
    /* visibility: visible; */
    /* bottom: 27px; */
    z-index: 1000;
}

</style>
<!--modernizr min js here-->
<script src="{{asset('assets/js/vendor/modernizr-3.7.1.min.js')}}"></script>
@endsection