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
    window.addEventListener( "pageshow", function ( event ) {
    var historyTraversal = event.persisted || 
            ( typeof window.performance != "undefined" && 
            window.performance.navigation.type === 2 );
    if ( historyTraversal ) {
        // Handle page restore.
        window.location.reload();
    }
    });

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
          var m = false;
    function googleTranslateElementInit1() {
        new google.translate.TranslateElement({includedLanguages: "zh-CN,en,zh-TW", layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        setTimeout(() => {
            if (jQuery( window ).width() < 768 && m == false){
            m = true;
            jQuery('#g_translater').detach().appendTo('#mobile_translator');                            
        } else if (jQuery( window ).width() >= 768 && m == true){
            m = false;
            jQuery('#g_translater').detach().prependTo('#translator');                            
        }
        
        }, 2000);
    }
    jQuery( window ).resize(function() {
        if (jQuery( window ).width() < 768 && m == false){
            m = true;
            jQuery('#g_translater').detach().appendTo('#mobile_translator');                            
        } else if (jQuery( window ).width() >= 768 && m == true){
            m = false;
            jQuery('#g_translater').detach().prependTo('#translator');                            
        }
    });
    </script>
    
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit1"></script>
    
    <script>
        setTimeout(function(){
            $('.VIpgJd-ZVi9od-xl07Ob-lTBxed').parent().prepend('<img src="{{asset('/assets/img/icon/fy.png')}}" alt="" width="30px" style="margin: 1em">')
            $('.VIpgJd-ZVi9od-xl07Ob-lTBxed').hide()
        }, 1000);

        $(document).ready(function(){
            $(window).bind('DOMNodeInserted', function(event) {
                $('iframe[id=":2.container"]').parent().hide();
            });
        });

        
  
    </script>
@endsection