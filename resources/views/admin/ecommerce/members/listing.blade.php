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
                    <input type="text" data-table-filter="search" class="form-control form-control-solid ps-15" placeholder="搜寻服务" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt_member_table-toolbar="base">
                    <!--begin::Add service-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_member">添加会员</button>
                    <!--end::Add service-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt_member_table-toolbar="selected">
                    <div class="fw-bold me-5">
                    <span class="me-2" data-kt_member_table-select="selected_count"></span>已选</div>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_members_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">姓名</th>
                        <th class="min-w-125px">创建日期</th>
                        <th class="min-w-125px">总积分</th>
                        <th class="min-w-125px">使用积分</th>
                        <th class="min-w-125px">剩余积分</th>
                        <th class="min-w-125px">最后兑换时间</th>
                        <th class="text-center min-w-70px">动作</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-semibold text-gray-600">
                    @foreach($members as $key=> $member)
                    <tr>
                        <input type="hidden" value="{{$member->id}}">
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-5">
                                   <h4 data-kt-member-filter="member">{{$member->name}}</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>{{$member->created_at}}</div>
                        </td>
                        <td>
                            <div>{{$member->points}}</div>
                        </td>
                        <td>
                            <div>{{$member->orders->sum('total')}}</div>
                        </td>
                        <td>
                            <div>{{$member->points-$member->orders->sum('total')}}</div>
                        </td>
                        <td>
                            <div>{{$member->last_exchange_at}}</div>
                        </td>
                        <td class="text-end">
                            <a href="/admin/members/edit-member/{{$member->id}}" class="btn btn-sm btn-warning mb-2" style="display: inline-block">编辑</a>
                            <a href="#" class="btn btn-sm btn-dark mb-2" data-id="{{$member->id}}" data-table-filter="delete_row" style="display: inline-block">删除</a>
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
    <div class="modal fade" id="kt_modal_add_member" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_add_member_form" data-kt-redirect="/">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_member_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">添加会员</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_member_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_member_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_member_header" data-kt-scroll-wrappers="#kt_modal_add_member_scroll" data-kt-scroll-offset="300px">
                            <form id="kt_add_member_form" class="form d-flex flex-column flex-row fv-plugins-bootstrap5 fv-plugins-framework" data-kt-redirect="">
                                <!--begin::Input group-->
                                @csrf
                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">ID</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" id="name" name="name" class="form-control mb-2" placeholder="ID" value="">
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    {{-- <div class="text-muted fs-7">ID 是必需的，建议是唯一的。</div> --}}
                                    <!--end::Description-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">密码</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" id="password" name="password" class="form-control mb-2" placeholder="密码" value="">
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    {{-- <div class="text-muted fs-7">电子邮件是必需的，建议是唯一的。</div> --}}
                                    <!--end::Description-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">积分</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <div id="editor"></div> 
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <input type="number" id="points" min="1" name="points" class="form-control mb-2" placeholder="Points" value="">
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </form>
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_add_member_cancel" class="btn btn-light me-3">丢弃</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_add_member_submit" class="btn btn-primary">
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
   
    <!--end::Modal - services - Add-->
    
    <!--end::Modals-->
</div>
<!--end::Content container-->
@endsection

@section('drawers')

@endsection
@section('modals')
		
@endsection
@section('scripts')
@parent
<script src="{{asset('admin/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
<script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<script>
    var f = document.getElementById("kt_modal_add_member_form");
    var e=FormValidation.formValidation(f,{
        fields:{
            name:{
                validators:{
                    notEmpty:{
                        message:"需要会员ID"}
                    }
                },
            password:{
                validators:{
                    notEmpty:{
                        message:"需要会员密码"}
                    }
                },
                
            points:{
                validators:{
                    notEmpty:{
                        message:"需要会员积分"}
                    }
                }
        },
        plugins:{
            trigger:new FormValidation.plugins.Trigger,
            bootstrap:new FormValidation.plugins.Bootstrap5({
                rowSelector:".fv-row",
                eleInvalidClass:"",
                eleValidClass:""})
        }
    })
    $('#kt_modal_add_member_close').click(function(){
        $('#kt_modal_add_member').modal('hide');
    })
    $('#kt_modal_add_member_cancel').click(function(){
        f.reset();
    })
   
    $("#kt_modal_add_member_submit").click
        (() => { 
            e&&e.validate().then(function(e){
                if(e=='Valid')
                {
                var formData= new FormData(f);
                $.ajax({
                    type: 'POST',
                    url:"/api/members/add-member",
                    data: formData,
                    processData: false, 
                    contentType: false, 
                    success: function(data) {
                        Swal.fire({text:"表格已成功添加！",icon:"success",buttonsStyling:!1,confirmButtonText:"好的，我知道了！",
                            customClass:{confirmButton:"btn btn-primary"}
                        }).then(function(){
                            location.reload() 
                        })
                    },
                    error: function(request, status, error){
                        Swal.fire({
                        text:"抱歉，似乎检测到一些错误，请重试。",
                        icon:"error",
                        buttonsStyling:!1,
                        confirmButtonText:"好的，我知道了！",
                        customClass:{
                            confirmButton:"btn btn-primary"
                        }
                    })
                    }
                })
                }
                else{
                    Swal.fire({
                        text:"抱歉，似乎检测到一些错误，请重试。",
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
    
    var KTAPPMembers=function(){var t,e,n=()=>{
    t.querySelectorAll('[data-table-filter="delete_row"]').forEach((t=>{t
    .addEventListener("click",(function(t){t.preventDefault();const n=t.target.closest("tr"),
        o=n.querySelector('[data-kt-member-filter="member"]').innerText,
        id=n.querySelector('input[type="hidden"]').value;
        Swal.fire({text:"你确定你要删除"+o+"?",
            icon:"warning",showCancelButton:!0,buttonsStyling:!1,
            confirmButtonText:"对，删除！",
            cancelButtonText:"不，取消",
            customClass:{confirmButton:"btn fw-bold btn-danger",
            cancelButton:"btn fw-bold btn-active-light-primary"}
        }).then((function(t){
            t.value?(
                $.post('/api/members/delete-member', {_token: '{{csrf_token()}}', id: id})
                    .done(function(){
                        Swal.fire({text:"您已删除"+o+"!.",
                        icon:"success",
                            buttonsStyling:!1,
                            confirmButtonText:"好的，我知道了！",
                            customClass:{confirmButton:"btn fw-bold btn-primary"}
                        }).then((function(){e.row($(n)).remove().draw()}))
                    })
                    .fail(function(){
                        Swal.fire({
                            text:o+" 没有被删除。",
                            icon:"error",
                            buttonsStyling:!1,
                            confirmButtonText:"好的，我知道了！",
                            customClass:{confirmButton:"btn fw-bold btn-primary"}
                        })
                    })

                ):"cancel"===t.dismiss&&Swal.fire({
                text:o+" 没有被删除。",
                icon:"error",
                buttonsStyling:!1,
                confirmButtonText:"好的，我知道了！",
                customClass:{confirmButton:"btn fw-bold btn-primary"}
            })
            }))
    }))}))};
    return{
        init:function(){
            (t=document.querySelector("#kt_members_table"))&&((
            e=$(t).DataTable({
                info:!1,
                order:[],
                pageLength:10,
                columnDefs:[
                {orderable:!1,targets:0},
                {orderable:!1,targets:3}
            ]})).on("draw",(function(){n()})
            ),
            document.querySelector('[data-table-filter="search"]').addEventListener("keyup",
            (function(t){
            e.search(t.target.value).draw()
            })),n())
        }
    }
    }();
    KTUtil.onDOMContentLoaded((function(){KTAPPMembers.init()}));
	
</script>
@endsection