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
</script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({includedLanguages: "zh-CN,en,zh-TW", layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>
        var i =0
        setTimeout(function(){
            $('.VIpgJd-ZVi9od-xl07Ob-lTBxed').parent().prepend('<img src="{{asset('/assets/img/icon/fy.png')}}" alt="" width="30px" style="margin: 1em">')
            $('.VIpgJd-ZVi9od-xl07Ob-lTBxed').hide()
        }, 1000);
    </script>
<!--end::Javascript-->
@endsection