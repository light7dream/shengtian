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

</style>
@endsection