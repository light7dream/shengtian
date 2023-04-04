@extends('admin.layout.app')

@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
    <!--begin::Products-->
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-faq-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="search" />
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <!--begin::Add product-->
                <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_add_faq" class="btn btn-primary">Add New FAQ</a>
                <!--end::Add product-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_faq_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-100px">Questions</th>
                        <th class="min-w-200px">Answers</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody id="all_ques" class="fw-semibold text-gray-600">
				 @foreach ($faqs as $key=> $faq)
                    <tr>
						<input type="hidden" value="{{$faq->id}}" />
                        <td>
                            <div class="ms-5">
								<span class="fw-bold" data-kt-faq-filter="faq_name">{{$faq->question}}</span>
                            </div>
                        </td>
                        <td class="">
                            <span class="fw-bold">{{$faq->answer}}</span>
                        </td>
                        <td class="text-end d-flex flex-end">
                            <div class="d-flex">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_faq" class="btn btn-warning">Edit</a>
                                </div>
                                <div class="d-flex" style="margin-left: 20px">
                                    <a href="#" class="btn btn-dark" data-kt-faq-filter="delete_row">Delete</a>
                                </div>
                        </td>
                    </tr>
					@endforeach
                    <!--end::Table row-->
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Products-->
</div>
@endsection

@section('modals')
		<!--begin::Modal - Customers - Add-->
		<div class="modal fade" id="kt_modal_add_faq" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-950px">
				<!--begin::Modal content-->
				<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_add_faq_header">
							<!--begin::Modal title-->
							<h2 class="fw-bold">Add a FAQ</h2>
							<!--end::Modal title-->
							<!--begin::Close-->
							<div id="kt_modal_add_faq_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
							<div class="scroll-y me-n7 pe-7" id="kt_modal_add_faq_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
								<!--begin::Input group-->
								<div class="fv-row mb-7">
									<!--begin::Label-->
									<label class="required fs-6 fw-semibold mb-2">Question</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" id="add_question" class="form-control form-control-solid" placeholder="" name="question" value="" />
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-7">
									<!--begin::Label-->
									<label class="fs-6 fw-semibold mb-2">
										<span class="required">Answer</span>
									</label>
									<!--end::Label-->
									<!--begin::Input-->
									<textarea class="form-control form-control-solid" id="add_answer" placeholder="" name="answer" value="" rows="6"></textarea>
									<!--end::Input-->
								</div>
								<!--end::Input group-->
							</div>
							<!--end::Scroll-->
						</div>
						<!--end::Modal body-->
						<!--begin::Modal footer-->
						<div class="modal-footer flex-center">
							<!--begin::Button-->
							<button type="reset" id="kt_modal_add_faq_cancel" class="btn btn-light me-3">Discard</button>
							<!--end::Button-->
							<!--begin::Button-->
							<button type="button" id="kt_modal_add_faq_submit" class="btn btn-primary">
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
		<!--end::Modal - Customers - Add-->
        <!--begin::Modal - Customers - Add-->
		<div class="modal fade" id="kt_modal_edit_faq" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-950px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Form-->
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_edit_faq_header">
							<!--begin::Modal title-->
							<h2 class="fw-bold">Edit dfdf a FAQ</h2>
							<!--end::Modal title-->
							<!--begin::Close-->
							<div id="kt_modal_edit_faq_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
							<div class="scroll-y me-n7 pe-7" id="kt_modal_edit_faq_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
								<!--begin::Input group-->
								<div class="fv-row mb-7">
									<!--begin::Label-->
									<label class="required fs-6 fw-semibold mb-2">Question</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" id="edit_question" class="form-control form-control-solid" placeholder="" name="question" value="" />
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-7">
									<!--begin::Label-->
									<label class="fs-6 fw-semibold mb-2">
										<span class="required">Answer</span>
									</label>
									<!--end::Label-->
									<!--begin::Input-->
									<textarea id="edit_answer" class="form-control form-control-solid" placeholder="" name="answer" value="" rows="6"></textarea>
									<!--end::Input-->
								</div>
								<!--end::Input group-->
							</div>
							<!--end::Scroll-->
						</div>
						<!--end::Modal body-->
						<!--begin::Modal footer-->
						<div class="modal-footer flex-center">
							<!--begin::Button-->
							<button type="reset" id="kt_modal_edit_faq_cancel" class="btn btn-light me-3">Discard</button>
							<!--end::Button-->
							<!--begin::Button-->
							<button type="button" id="kt_modal_edit_faq_submit" class="btn btn-primary">
								<span class="indicator-label">Submit</span>
							</button>
							<!--end::Button-->
						</div>
						<!--end::Modal footer-->
					<!--end::Form-->
				</div>
			</div>
		</div>
		<!--end::Modal - Customers - Add-->
@endsection

@section('drawers')

@endsection
@section('scripts')
@parent
	<!--begin::Vendors Javascript(used for this page only)-->
	 <script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script> 
	 <script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>


	<script>       
		window.onload=function(){

			$("#kt_modal_add_faq_submit").click(function (){
				var question = $("#add_question").val();
				var answer = $("#add_answer").val();
	
				if(question =="" || answer =="")
				{
					Swal.fire({text:"You must input question and answer!",
					icon:"error",
					buttonsStyling:!1,
					confirmButtonText:"Ok, got it!",
					customClass:{confirmButton:"btn fw-bold btn-primary"}
					});
				}
				else {
					$.post('/api/support/add-faq', {_token: '{{csrf_token()}}', question : question, answer :answer})
					.done((function(response){ 
						if(response == "added")
						{

							Swal.fire({text:"You have successfully added!",
							icon:"success",
							buttonsStyling:!1,
							confirmButtonText:"Ok, got it!",
							customClass:{confirmButton:"btn fw-bold btn-primary"}}).then(function(){
								location.reload()
							})
						}					
					}))
				}
			})
			$('#kt_modal_add_faq_close').click(function(){
				$('#kt_modal_add_faq').modal('hide');
			})
			$('#kt_modal_add_faq_cancel').click(function(){
				$("#add_question").val('');
				$("#add_answer").val('');
			})
			
			$('[data-bs-target="#kt_modal_edit_faq"]').click(function(){
				var id =$(this.closest("tr")).find('input[type="hidden"]').val()
				$('#kt_modal_edit_faq').append('<input type="hidden" value="'+id+'"/>');
				$('#edit_question').val($(this.closest("tr")).find('td').eq(0).text().trim());
				$('#edit_answer').val($(this.closest("tr")).find('td').eq(1).text().trim());
			})

			$('#kt_modal_edit_faq_submit').click(function(){
				var id = $('#kt_modal_edit_faq').find('input[type="hidden"]').val();
				$.post('/api/support/edit-faq', {_token: '{{csrf_token()}}', id: id, question:$('#edit_question').val(), answer: $('#edit_answer').val()})
                    .done(function(){
                        location.reload();
                    })
                    .fail(function(){
                        Swal.fire({
                            text:"Something went wrong.",
                            icon:"error",
                            buttonsStyling:!1,
                            confirmButtonText:"Ok, got it!",
                            customClass:{confirmButton:"btn fw-bold btn-primary"}
                        })
                    })
			})
		}

	var KTAppEcommerceCategories=function(){var t,e,n=()=>{
    t.querySelectorAll('[data-kt-faq-filter="delete_row"]').forEach((t=>{t
    .addEventListener("click",(function(t){t.preventDefault();const n=t.target.closest("tr"),
        o=n.querySelector('[data-kt-faq-filter="faq_name"]').innerText,
        id=n.querySelector('input[type="hidden"]').value;
        Swal.fire({text:"Are you sure you want to delete "+o+"?",
            icon:"warning",showCancelButton:!0,buttonsStyling:!1,
            confirmButtonText:"Yes, delete!",
            cancelButtonText:"No, cancel",
            customClass:{confirmButton:"btn fw-bold btn-danger",
            cancelButton:"btn fw-bold btn-active-light-primary"}
        }).then((function(t){
            t.value?(
                $.post('/api/support/delete-faq', {_token: '{{csrf_token()}}', id: id})
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
            (t=document.querySelector("#kt_faq_table"))&&((
            e=$(t).DataTable({
                info:!1,
                order:[],
                pageLength:10,
                columnDefs:[
                {orderable:!1,targets:0},
                {orderable:!1,targets:1}
            ]})).on("draw",(function(){n()})
            ),
            document.querySelector('[data-kt-faq-filter="search"]').addEventListener("keyup",
            (function(t){
            e.search(t.target.value).draw()
            })),n())
        }
    }
    }();
    KTUtil.onDOMContentLoaded((function(){KTAppEcommerceCategories.init()}));
	
   
	</script>

@endsection