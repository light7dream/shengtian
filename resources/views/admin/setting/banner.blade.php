@extends('admin.layout.app')

@section('content')
<!--begin::Content container-->
<div id="kt_app_content_container" class="app-container container-xxl">
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <h2  class="fw-bold">横幅</h2>
                {{-- <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-banner-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search banner" />
                </div> --}}
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-banner-table-toolbar="base">
                    <!--begin::Add banner-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_banner">添加横幅</button>
                    <!--end::Add banner-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-banner-table-toolbar="selected">
                    <div class="fw-bold me-5">
                    <span class="me-2" data-kt-banner-table-select="selected_count"></span>选定</div>
                    <button type="button" class="btn btn-danger" data-kt-banner-table-select="delete_selected">删除所选</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <form action="/api/setting/edit-banner" enctype="multipart/form-data" method="post" id="kt_edit_banner_form">
        <div class="card-body pt-10 mb-10">
                @csrf
            <div class="pb-4 border-bottom">
                <label class="fs-6 fw-semibold form-label mt-3 d-flex ms-10 me-10">
                    <div class="col-md-4 col-sm-6 col-lg-2 text-center pt-3">
                        <span class="form-label text-gray-700 fs-6 fw-semibold">横条广告 轮番时间 </span>
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-2 fv-row">
                        <input class="form-control" type="number" value="5" min="1" name="banner_time"/>
                    </div>
                </label>
            </div>      
            @foreach ($banners as $key=> $banner)
            <div class="col-12 text-center mt-20">
                <!--begin::Image input-->
                <!--begin::Image input placeholder-->
                <style>
                .image-input-placeholder { background-image: url('{{url("storage/uploads/banners/".$banner.".png")}}')!important ; } [data-bs-theme="dark"] 
                .image-input-placeholder { background-image: url('{{url("storage/uploads/banners/".$banner.".png")}}'); }
                .image-input {
                    width: 90%!important;
                }
                .image-input .image-input-wrapper{
                    width: 100%!important;
                    height: 22em;
                }
                </style>
                <!--end::Image input placeholder-->
                <div class="image-input image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper col-12" style="background-image: url('{{url("storage/uploads/banners/".$banner.".png")}}"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="banner_images[]" accept=".png, .jpg, .jpeg">
                        <input type="hidden" name="banner_removes[]">
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-id='{{$banner}}' data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Description-->
                {{-- <div class="text-muted fs-7">Set the avatar image. Only *.png, *.jpg and *.jpeg image files are accepted</div> --}}
                <!--end::Description-->
            </div>
            @endforeach
        </div>
        <!--end::Card body-->
        <div class="card-footer text-end me-20">
            <button class="btn btn-primary" type="submit" id="kt_banner_edit_submit">保存数据</button>
        </div>
        </form>
    </div>
    <!--end::Card-->
    <!--begin::Modals-->
    <!--begin::Modal - banners - Add-->
    <div class="modal fade" id="kt_modal_add_banner" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" enctype="multipart/form-data" action="/api/setting/add-banner" method="post" id="kt_modal_add_banner_form" data-kt-redirect="/">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_banner_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">添加横幅</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_banner_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17 ">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_banner_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_banner_header" data-kt-scroll-wrappers="#kt_modal_add_banner_scroll" data-kt-scroll-offset="300px">
                                <!--begin::Aside column-->
                                @csrf
                                <div class="d-flex flex-column gap-7 gap-lg-10 mb-7 me-lg-10">
                                    <!--begin::Thumbnail settings-->
                                    <div class="card card-flush py-4" style="border: 0">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                {{-- <h2>Banner</h2> --}}
                                            </div>
                                            <!--end::Card title-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body text-center fv-row pt-0" style="border: none">
                                            <!--begin::Image input-->
                                            <!--begin::Image input placeholder-->
                                            <style>.image-input-placeholder { background-image: url(''); background: none!important } [data-bs-theme="dark"] .image-input-placeholder { background-image: url(''); }</style>
                                            <!--end::Image input placeholder-->
                                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-900px h-300px"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="banner_image" accept=".png, .jpg, .jpeg">
                                                    <input type="hidden" name="avatar_remove">
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Description-->
                                            {{-- <div class="text-muted fs-7">Set the avatar image. Only *.png, *.jpg and *.jpeg image files are accepted</div> --}}
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Thumbnail settings-->
                                </div>
                                <!--end::Aside column-->
                                <!--begin::Main column-->
                              
                                <!--end::Main column-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_add_banner_submit" class="btn btn-primary">
                            <span class="indicator-label">提交</span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
   
    <!--end::Modal - banners - Add-->
    
    <!--end::Modals-->
</div>
<!--end::Content container-->   
@endsection

@section('drawers')

@endsection
@section('scripts')
@parent
<script src="{{asset('admin/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
<script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<script>
    "use strict";
    var tf = document.getElementById("kt_modal_add_banner_form");
    var tfe = document.getElementById("kt_edit_banner_form");
    let e=FormValidation.formValidation(tf,{
        fields:{
            banner_image:{
                validators:{
                    notEmpty:{
                        message:"需要横幅图像"}
                    }
                },
        },
        plugins:{
            trigger:new FormValidation.plugins.Trigger,
            bootstrap:new FormValidation.plugins.Bootstrap5({
                rowSelector:".fv-row",
                eleInvalidClass:"",
                eleValidClass:""
            })
        }
    });
    let ee=FormValidation.formValidation(tfe,{
        fields:{
            banner_time:{
                validators:{
                    notEmpty:{
                        message:"需要横幅时间"}
                    }
                },
        },
        plugins:{
            trigger:new FormValidation.plugins.Trigger,
            bootstrap:new FormValidation.plugins.Bootstrap5({
                rowSelector:".fv-row",
                eleInvalidClass:"",
                eleValidClass:""})
        }
    });
    $('#kt_modal_add_banner_close').click(function(){
				$('#kt_modal_add_banner').modal('hide');
    })
   
    $("#kt_modal_add_banner_submit").click
        ((ev) => { 
            ev.preventDefault();
            e&&e.validate().then(function(e_){
                if(e_=="Valid"){
                    tf.submit();
                }
                else{
                    Swal.fire({
                        text:"抱歉，您必须正确输入文件，请重试。",
                        icon:"error",
                        buttonsStyling:!1,
                        confirmButtonText:"好的，我知道了！",
                        customClass:{
                            confirmButton:"btn btn-primary"
                        }
                    })
                }
            })
    })


    $('#kt_banner_edit_submit').click(function(e){
        e.preventDefault(); 
        ee&&ee.validate().then(function(re){
            if(re=='Valid'){
                tfe.submit();
            }
            else{
                Swal.fire({
                    text:"抱歉，您必须正确输入时间，请重试。",
                    icon:"error",
                    buttonsStyling:!1,
                    confirmButtonText:"好的，我知道了！",
                    customClass:{
                        confirmButton:"btn btn-primary"
                    }
                })
            }
        })
    })

    $('[data-kt-image-input-action="remove"]').click(function(){
        var id = $(this).attr('data-id');
        Swal.fire({text:"你确定你要删除？",
        icon:"warning",showCancelButton:!0,
        buttonsStyling:!1,
        confirmButtonText:"好的，我知道了！",
        cancelButtonText:"不，取消",
        customClass:{
            confirmButton:"btn btn-primary",
            cancelButton:"btn fw-bold btn-active-light-primary"
        }
        }).then((function(e){
        e.isConfirmed&&(
        $.post('/api/setting/delete-banner', {_token: '{{csrf_token()}}', id:id})
        .done(function(){
        location.reload();
        })
        .fail(function(){
        console.log('')
        })

        )
        }))
        
    })

</script>
@endsection