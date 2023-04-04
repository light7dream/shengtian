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
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-service-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Service" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-service-table-toolbar="base">
                    <!--begin::Add service-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_service">Add Service</button>
                    <!--end::Add service-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-service-table-toolbar="selected">
                    <div class="fw-bold me-5">
                    <span class="me-2" data-kt-service-table-select="selected_count"></span>Selected</div>
                    <button type="button" class="btn btn-danger" data-kt-service-table-select="delete_selected">Delete Selected</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_services_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">Name</th>
                        <th class="min-w-125px">Email</th>
                        <th class="min-w-125px">Description</th>
                        <th class="min-w-125px">Created Date</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-semibold text-gray-600">
                    @foreach($services as $key=> $service)
                    <tr>
                        <input type="hidden" value="{{$service->id}}">
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url({{url('/storage/uploads/service/'.$service->id.'.png')}});"></span>
                                </a>
                                <div class="ms-5">
                                   <h4 data-kt-service-filter="service">{{$service->name}}</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>{{$service->email}}</div>
                        </td>
                        <td>
                            <div>{{$service->description}}</div>
                        </td>
                        <td>{{$service->created_at}}</td>
                        <td class="text-end d-flex flex-end">
                            
                                <div class="d-flex">
                                    <a href="javascript:(0);" data-kt-service-table-filter="edit_row" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#kt_modal_edit_service">Edit</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="d-flex" style="margin-left: 20px">
                                    <a href="#" class="btn btn-dark" data-id="{{$service->id}}" data-kt-service-table-filter="delete_row">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    <!--begin::Modals-->
    <!--begin::Modal - services - Add-->
    <div class="modal fade" id="kt_modal_add_service" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_add_service_form" data-kt-redirect="/">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_service_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Add a Service</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_service_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_service_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_service_header" data-kt-scroll-wrappers="#kt_modal_add_service_scroll" data-kt-scroll-offset="300px">
                            <form id="kt_add_service_form" class="form d-flex flex-column flex-row fv-plugins-bootstrap5 fv-plugins-framework" data-kt-redirect="">
                                <!--begin::Aside column-->
                                <div class="d-flex flex-column gap-7 gap-lg-10 mb-7 me-lg-10">
                                    <!--begin::Thumbnail settings-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2>Photo</h2>
                                            </div>
                                            <!--end::Card title-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body text-center pt-0">
                                            <!--begin::Image input-->
                                            <!--begin::Image input placeholder-->
                                            <style>.image-input-placeholder { background-image: url('{{asset("admin/assets/media/svg/files/blank-image.svg")}}'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
                                            <!--end::Image input placeholder-->
                                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-150px h-150px"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
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
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Service</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="required form-label">Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" id="service_name" name="service_name" class="form-control mb-2" placeholder="Name" value="">
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                {{-- <div class="text-muted fs-7">A name is required and recommended to be unique.</div> --}}
                                                <!--end::Description-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="required form-label">Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" id="service_email" name="service_email" class="form-control mb-2" placeholder="Email" value="">
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                {{-- <div class="text-muted fs-7">A email is required and recommended to be unique.</div> --}}
                                                <!--end::Description-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div>
                                                <!--begin::Label-->
                                                <label class="form-label">Description</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <div id="editor"></div> 
                                                <!--end::Editor-->
                                                <!--begin::Description-->
                                                <textarea name="service_description" class="form-control mb-2" placeholder="Description" value="" rows="5"></textarea>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                </div>
                                <!--end::Main column-->
                            </form>
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_add_service_cancel" class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_add_service_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_edit_service" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_edit_service_form" data-kt-redirect="/">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_edit_service_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Edit a Service</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_edit_service_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_edit_service_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_service_header" data-kt-scroll-wrappers="#kt_modal_edit_service_scroll" data-kt-scroll-offset="300px">
                            <form id="kt_edit_service_form" class="form d-flex flex-column flex-row fv-plugins-bootstrap5 fv-plugins-framework" data-kt-redirect="">
                                <!--begin::Aside column-->
                                <div class="d-flex flex-column gap-7 gap-lg-10 mb-7 me-lg-10">
                                    <!--begin::Thumbnail settings-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2>Photo</h2>
                                            </div>
                                            <!--end::Card title-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body text-center pt-0">
                                            <!--begin::Image input-->
                                            <!--begin::Image input placeholder-->
                                            <style>.image-input-placeholder { background-image: url('{{asset("admin/assets/media/svg/files/blank-image.svg")}}'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
                                            <!--end::Image input placeholder-->
                                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-150px h-150px"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
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
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Service</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="required form-label">Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" id="edit_service_name" name="service_name" class="form-control mb-2" placeholder="Name" value="">
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                {{-- <div class="text-muted fs-7">A name is required and recommended to be unique.</div> --}}
                                                <!--end::Description-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="required form-label">Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" id="edit_service_email" name="service_email" class="form-control mb-2" placeholder="Email" value="">
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                {{-- <div class="text-muted fs-7">A email is required and recommended to be unique.</div> --}}
                                                <!--end::Description-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div>
                                                <!--begin::Label-->
                                                <label class="form-label">Description</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <div id="editor"></div> 
                                                <!--end::Editor-->
                                                <!--begin::Description-->
                                                <textarea name="service_description" id="edit_service_description" class="form-control mb-2" placeholder="Description" value="" rows="5"></textarea>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                </div>
                                <!--end::Main column-->
                            </form>
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_edit_service_cancel" class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_edit_service_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Modal - services - Add-->
    
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
    var tF = document.getElementById("kt_modal_add_service_form");
    var tF_ = document.getElementById("kt_modal_edit_service_form");
    $('#kt_modal_add_service_close').click(function(){
				$('#kt_modal_add_service').modal('hide');
    })
    $('#kt_modal_edit_service_close').click(function(){
				$('#kt_modal_edit_service').modal('hide');
    })
    $('#kt_modal_add_service_cancel').click(function(){
        $("#service_name").val('');
        $("#service_email").val('');
        $("#service_description").val('');
    })
    $('#kt_modal_edit_service_cancel').click(function(){
        $("#edit_service_name").val('');
        $("#edit_service_email").val('');
        $("#edit_service_description").val('');
    })
    $('[data-kt-service-table-filter="edit_row"]').click(function(){
        var id =$(this.closest("tr")).find("input[type='hidden']").val();
        $('#kt_modal_edit_service_form .image-input-wrapper').css('background-image',$(this.closest("tr")).find("td").eq(0).find('span').css('background-image'));
        $('#kt_modal_edit_service_form').append('<input type="hidden" name="id" value = "'+id+'" >')
        $("#edit_service_name").val($(this.closest("tr")).find("td").eq(0).text().trim());
        $("#edit_service_email").val($(this.closest("tr")).find("td").eq(1).text().trim());
        $("#edit_service_description").val($(this.closest("tr")).find("td").eq(2).text().trim());
        $("#edit_service_description").text($(this.closest("tr")).find("td").eq(2).text().trim());
    });
    $("#kt_modal_add_service_submit").click
        (() => { 
          var formData= new FormData(tF);
          formData.append('_token' , '{{csrf_token()}}');
          $.ajax({
            type: 'POST',
            url:"/api/online-service/add-service",
            data: formData,
            processData: false, 
            contentType: false, 
            success: function(data) {
                Swal.fire({text:"Form has been successfully added!",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",
                    customClass:{confirmButton:"btn btn-primary"}
                }).then(function(){
                    location.reload() 
                })
            },
            error: function(request, status, error){
                Swal.fire({
                text:"Sorry, you must input name and email correctly, please try again.",
                icon:"error",
                buttonsStyling:!1,
                confirmButtonText:"Ok, got it!",
                customClass:{
                    confirmButton:"btn btn-primary"
                }
            })
            }
          })
           
    })
    
    $("#kt_modal_edit_service_submit").click
        (() => { 
          var formData= new FormData(tF_);
          formData.append('_token' , '{{csrf_token()}}');
          $.ajax({
            type: 'POST',
            url:"/api/online-service/edit-service",
            data: formData,
            processData: false, 
            contentType: false, 
            success: function(data) {
                Swal.fire({text:"Form has been successfully added!",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",
                    customClass:{confirmButton:"btn btn-primary"}
                }).then(function(){
                    location.reload() 
                })
            },
            error: function(request, status, error){
                Swal.fire({
                text:"Sorry, you must input name and email correctly, please try again.",
                icon:"error",
                buttonsStyling:!1,
                confirmButtonText:"Ok, got it!",
                customClass:{
                    confirmButton:"btn btn-primary"
                }
            })
            }
          })
           
    })
    var KTAppEcommerceCategories=function(){var t,e,n=()=>{
    t.querySelectorAll('[data-kt-service-table-filter="delete_row"]').forEach((t=>{t
    .addEventListener("click",(function(t){t.preventDefault();const n=t.target.closest("tr"),
        o=n.querySelector('[data-kt-service-filter="service"]').innerText,
        id=n.querySelector('input[type="hidden"]').value;
        Swal.fire({text:"Are you sure you want to delete "+o+"?",
            icon:"warning",showCancelButton:!0,buttonsStyling:!1,
            confirmButtonText:"Yes, delete!",
            cancelButtonText:"No, cancel",
            customClass:{confirmButton:"btn fw-bold btn-danger",
            cancelButton:"btn fw-bold btn-active-light-primary"}
        }).then((function(t){
            t.value?(
                $.post('/api/online-service/delete-service', {_token: '{{csrf_token()}}', id: id})
                    .done(function(){
                        Swal.fire({text:"You have deleted "+o+"!.",
                        icon:"success",
                            buttonsStyling:!1,
                            confirmButtonText:"Ok, got it!",
                            customClass:{confirmButton:"btn fw-bold btn-primary"}
                        }).then((function(){e.row($(n)).remove().draw()}))
                    })
                    .fail(function(){
                        Swal.fire({
                            text:o+" was not deleted.",
                            icon:"error",
                            buttonsStyling:!1,
                            confirmButtonText:"Ok, got it!",
                            customClass:{confirmButton:"btn fw-bold btn-primary"}
                        })
                    })

                ):"cancel"===t.dismiss&&Swal.fire({
                text:o+" was not deleted.",
                icon:"error",
                buttonsStyling:!1,
                confirmButtonText:"Ok, got it!",
                customClass:{confirmButton:"btn fw-bold btn-primary"}
            })
            }))
    }))}))};
    return{
        init:function(){
            (t=document.querySelector("#kt_services_table"))&&((
            e=$(t).DataTable({
                info:!1,
                order:[],
                pageLength:10,
                columnDefs:[
                {orderable:!1,targets:0},
                {orderable:!1,targets:3}
            ]})).on("draw",(function(){n()})
            ),
            document.querySelector('[data-kt-service-table-filter="search"]').addEventListener("keyup",
            (function(t){
            e.search(t.target.value).draw()
            })),n())
        }
    }
    }();
    KTUtil.onDOMContentLoaded((function(){KTAppEcommerceCategories.init()}));
	

    


</script>
@endsection