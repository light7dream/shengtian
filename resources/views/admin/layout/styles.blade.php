@section('styles')
<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
<link rel="shortcut icon" href="{{asset('admin/assets/media/logos/favicon.ico')}}" />
<!--begin::Fonts(mandatory for all pages)-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="{{asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
<link href="{{asset('admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->
<style>
.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    max-width: 90%;
}

.my {
    display: inline-block;
    margin-top: 1px;
}


[data-kt-app-header-fixed-mobile=true] .app-header {
    position: relative !important;
}

[data-kt-app-header-fixed-mobile=true] .app-wrapper {
    margin-top: 0!important;
}

.drawer{
    padding-top: 40px;
}

.drawer .menu-item{
    border-bottom: 1px solid #eee;
}
.goog-te-menu-frame,.goog-te-balloon-frame{
    box-shadow:none!important
    }
.goog-te-gadget-simple{
    background-color:transparent;
    border: 0 !important;;
    border-radius:5px;
    padding:5px 10px;
    /* box-shadow:0 2px 10px -7px rgba(0,0,0,0.2); */
    font-size:0;
    }
.goog-te-gadget-icon{
    display: none;
}
</style>
@endsection