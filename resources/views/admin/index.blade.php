@extends('admin.layout.app')

@section('content')

@endsection

@section('scripts')
@parent
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{asset('admin/assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('admin/assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('admin/assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('admin/assets/js/custom/utilities/modals/users-search.js')}}"></script>
<!--end::Custom Javascript-->
@endsection