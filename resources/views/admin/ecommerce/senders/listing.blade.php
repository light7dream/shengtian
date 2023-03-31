@extends('admin.layout.app')

@section('content')
	<div id="kt_app_content_container" class="app-container container-xxl">
		<!--begin::sender-->
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
						<input type="text" data-kt-ecommerce-sender-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search sender" />
					</div>
					<!--end::Search-->
				</div>
				<!--end::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
					<!--begin::Add customer-->
					<a href="/admin/members/add-sender" class="btn btn-primary">Add Sender</a>
					<!--end::Add customer-->
				</div>
				<!--end::Card toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body pt-0">
				<!--begin::Table-->
				<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sender_table">
					<!--begin::Table head-->
					<thead>
						<!--begin::Table row-->
						<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
							<th class="w-10px pe-2">
								<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
									{{-- <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_sender_table .form-check-input" value="1" /> --}}
								</div>
							</th>
							<th class="min-w-250px">Sender</th>
							<th class="min-w-150px">Sender Phone</th>
							<th class="min-w-150px">Sender Address</th>
							<th class="text-end min-w-70px">Actions</th>
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="fw-semibold text-gray-600">
						<!--begin::Table row-->
						@foreach ($senders as $sender)
							<tr>
							<!--begin::Checkbox-->
							<td>
								<div class="form-check form-check-sm form-check-custom form-check-solid">
									<input type="hidden" value="{{$sender->id}}" />
									{{-- <input class="form-check-input" type="checkbox" value="1" /> --}}
								</div>
							</td>
							<!--end::Checkbox-->
							<!--begin::sender=-->
							<td>
								<div class="d-flex">
									<!--begin::Thumbnail-->
									<a href="/admin/members/edit-sender/{{$sender->id}}" class="symbol symbol-50px">
										<span class="symbol-label" style="background-image:url({{url('/storage/uploads/members/senders/'.$sender->id.'.png')}});"></span>
									</a>
									<!--end::Thumbnail-->
									<div class="ms-5 p-2">
										<!--begin::Title-->
										<a href="/admin/members/edit-sender/{{$sender->id}}" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-sender-filter="sender_name">{{$sender->name}}</a>
										<!--end::Title-->
										<!--begin::Description-->
										<!--end::Description-->
									</div>
								</div>
							</td>
							<!--end::sender=-->
							<!--begin::Type=-->
							<td>
								<!--begin::Badges-->
								<div class="text-muted fs-7 fw-bold">{{$sender->phone}}</div>
								<!--end::Badges-->
							</td>
							<!--end::Type=-->
							<!--begin::Type=-->
							<td>
								<!--begin::Badges-->
								<div class="text-muted fs-7 fw-bold">{{$sender->address}}</div>
								<!--end::Badges-->
							</td>
							<!--end::Type=-->
							<!--begin::Action=-->
							<td class="text-end">
								<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
								<span class="svg-icon svg-icon-5 m-0">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon--></a>
								<!--begin::Menu-->
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="/admin/members/edit-sender/{{$sender->id}}" class="menu-link px-3">Edit</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3" data-kt-ecommerce-sender-filter="delete_row">Delete</a>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu-->
							</td>
							<!--end::Action=-->
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
		<!--end::sender-->
	</div>
@endsection

@section('drawers')

@endsection

@section('modals')

@endsection

@section('scripts')
@parent

	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
	<!--end::Vendors Javascript-->

	<script>
		"use strict";var KTAppEcommerceSenders=function(){var t,e,n=()=>{
	t.querySelectorAll('[data-kt-ecommerce-sender-filter="delete_row"]').forEach((t=>{t
		.addEventListener("click",(function(t){t.preventDefault();const n=t.target.closest("tr"),
			o=n.querySelector('[data-kt-ecommerce-sender-filter="sender_name"]').innerText,
			id=n.querySelector('input[type="hidden"]').value;
			Swal.fire({text:"Are you sure you want to delete "+o+"?",
				icon:"warning",showCancelButton:!0,buttonsStyling:!1,
				confirmButtonText:"Yes, delete!",
				cancelButtonText:"No, cancel",
				customClass:{confirmButton:"btn fw-bold btn-danger",
				cancelButton:"btn fw-bold btn-active-light-primary"}
			}).then((function(t){
				t.value?(
					$.post('/api/members/delete-sender', {_token: '{{csrf_token()}}', id: id})
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
		}))}))};return{init:function(){(t=document.querySelector("#kt_ecommerce_sender_table"))&&((e=$(t).DataTable({info:!1,order:[],pageLength:10,columnDefs:[{orderable:!1,targets:0},{orderable:!1,targets:3}]})).on("draw",(function(){n()})),document.querySelector('[data-kt-ecommerce-sender-filter="search"]').addEventListener("keyup",(function(t){e.search(t.target.value).draw()})),n())}}}();KTUtil.onDOMContentLoaded((function(){KTAppEcommerceSenders.init()}));
	</script>
@endsection