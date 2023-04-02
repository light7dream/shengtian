@section('scripts')
<!-- JS
============================================ -->
<!--jquery min js-->
<script src="{{asset('assets/js/vendor/jquery-3.4.1.min.js')}}"></script>
<!--popper min js-->
<script src="{{asset('assets/js/popper.js')}}"></script>
<!--bootstrap min js-->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!--owl carousel min js-->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<!--slick min js-->
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<!--magnific popup min js-->
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<!--counterup min js-->
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<!--jquery countdown min js-->
<script src="{{asset('assets/js/jquery.countdown.js')}}"></script>
<!--jquery ui min js-->
<script src="{{asset('assets/js/jquery.ui.js')}}"></script>
<!--jquery elevatezoom min js-->
<script src="{{asset('assets/js/jquery.elevatezoom.js')}}"></script>
<!--isotope packaged min js-->
<script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
<!--slinky menu js-->
<script src="{{asset('assets/js/slinky.menu.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('assets/js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    // var fi = "{{csrf_token()}}";
    $(document).ready(function(){
        (()=>{
            $('.cart_remove a').click(function(){
                $(this).parent().find('form').submit();
            })
            $('.signout').click(function(){
                $(this).parent().submit();
            })
        })();
    })
    </script>
   
    <script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({includedLanguages: "zh-CN,en,zh-TW", layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    </script>
    
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    {{-- <script>

        $('#google_translate_element').bind('DOMNodeInserted', function(event) {
        $('.goog-te-menu-value span:first').html('LANGUAGE');
        $('.goog-te-menu-frame.skiptranslate').load(function(){
            setTimeout(function(){
            $('.goog-te-menu-frame.skiptranslate').contents().find('.goog-te-menu2-item-selected .text').html('LANGUAGE');    
            }, 100);
        });
        });
    </script> --}}

    <script>
        var i =0
        setTimeout(function(){
            $('.VIpgJd-ZVi9od-xl07Ob-lTBxed').html('<img src="{{asset('/assets/img/icon/fy.png')}}" alt="" width="40px" style="margin: 1em">')
        }, 1000);
    </script>
@endsection