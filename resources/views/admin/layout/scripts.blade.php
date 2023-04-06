@section('scripts')
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('admin/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('admin/assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<script>
    $('#signout').click(function(){
        $('#logout_form').submit();
    })
    window.addEventListener( "pageshow", function ( event ) {
    var historyTraversal = event.persisted || 
            ( typeof window.performance != "undefined" && 
            window.performance.navigation.type === 2 );
    if ( historyTraversal ) {
        // Handle page restore.
        window.location.reload();
    }
    });
</script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({includedLanguages: "zh-CN,en,zh-TW", layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
        var i =0
        setTimeout(function(){
            $('.VIpgJd-ZVi9od-xl07Ob-lTBxed').parent().prepend('<img src="{{asset('/assets/img/icon/fy.png')}}" alt="" width="30px" style="margin: 1em">')
            $('.VIpgJd-ZVi9od-xl07Ob-lTBxed').hide()
        }, 1000);
        var m = true;
        if (jQuery( window ).width() < 992 && m == false){
            m = true;
            jQuery('#logout_form').detach().appendTo('#mobile_logout');                            
        } else if (jQuery( window ).width() >= 992 && m == true){
            m = false;
            jQuery('#logout_form').detach().prependTo('#desktop_logout');                            
        }
        jQuery( window ).resize(function() {
        if (jQuery( window ).width() < 992 && m == false){
            m = true;
            jQuery('#logout_form').detach().appendTo('#mobile_logout');                            
        } else if (jQuery( window ).width() >= 992 && m == true){
            m = false;
            jQuery('#logout_form').detach().prependTo('#desktop_logout');                            
        }
    });
  $(document).ready(function(){
    $(window).bind('DOMNodeInserted', function(event) {
        $('iframe[id=":2.container"]').parent().hide();
    });
  
  });
</script>
<script>
    
    $('span.zh-CN').click(function(){
            var t;
            for(var i=0;i<3;i++){
                var el=$($("iframe")[i]).contents();
                var bdy = $(el[0].body);
                var a=$($($($($($(bdy[0]).children()[0]).children()[0]).children()[0]).children()[0]).children()[0]).children();
                t=$(a[a.length-3]).children()[0];
                if(t)
                {
                    break;
                }
            }
            $(t).click();
           
        })
        
        $('span.zh-TW').click(function(){
            var t;
            for(var i=0;i<3;i++){
                var el=$($("iframe")[i]).contents();
                var bdy = $(el[0].body);
                var a=$($($($($($(bdy[0]).children()[0]).children()[0]).children()[0]).children()[0]).children()[0]).children();
                t=$(a[a.length-2]).children()[0];
                if(t)
                {
                    break;
                }
            }
            $(t).click();
        })
        
        $('span.En').click(function(){
            var t;
            for(var i=0;i<3;i++){
                var el=$($("iframe")[i]).contents();
                var bdy = $(el[0].body);
                var a=$($($($($($(bdy[0]).children()[0]).children()[0]).children()[0]).children()[0]).children()[0]).children();
                t=$(a[a.length-1]).children()[0];
                if(t)
                {
                    break;
                }
            }
            $(t).click();
        })
</script>
<!--end::Javascript-->
@endsection