
@extends('admin.layout.app')

@section('content')
<!--begin::Content container-->
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
						<input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
					</div>
					<!--end::Search-->
				</div>
				<!--end::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
					<!--begin::Flatpickr-->
					{{-- <div class="input-group w-250px">
						<input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
						<button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
							<span class="svg-icon svg-icon-2">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
									<rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
					</div> --}}
					<!--end::Flatpickr-->
					{{-- <div class="w-100 mw-150px">
						<!--begin::Select2-->
						<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
							<option></option>
							<option value="all">All</option>
							<option value="Cancelled">Cancelled</option>
							<option value="Completed">Completed</option>
							<option value="Denied">Denied</option>
							<option value="Expired">Expired</option>
							<option value="Failed">Failed</option>
							<option value="Pending">Pending</option>
							<option value="Processing">Processing</option>
							<option value="Refunded">Refunded</option>
							<option value="Delivered">Delivered</option>
							<option value="Delivering">Delivering</option>
						</select>
						<!--end::Select2-->
					</div> --}}
					<!--begin::Add product-->
					{{-- <a href="/catalog/add-product" class="btn btn-primary">Add Order</a> --}}
					<!--end::Add product-->
				</div>
				<!--end::Card toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body pt-0">
				<!--begin::Table-->
				<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
					<!--begin::Table head-->
					<thead>
						<!--begin::Table row-->
						<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
							<th class="w-10px pe-2">
								<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
									{{-- <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_sales_table .form-check-input" value="1" /> --}}
								</div>
							</th>
							<th class="min-w-100px">Order ID</th>
							<th class="min-w-175px">Customer</th>
							<th class="text-end min-w-70px">Status</th>
							<th class="text-end min-w-100px">Total</th>
							<th class="text-end min-w-100px">Date Added</th>
							<th class="text-end min-w-100px">Date Modified</th>
							<th class="text-end min-w-100px">Actions</th>
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="fw-semibold text-gray-600">
						<!--begin::Table row-->
						@foreach ($orders as $order)
							@if($order->status == $status)
								<tr data-id="{{$order->id}}" >
									<!--begin::Checkbox-->
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											{{-- <input class="form-check-input" type="checkbox" value="1" /> --}}
										</div>
									</td>
									<!--end::Checkbox-->
									<!--begin::Order ID=-->
									<td data-kt-ecommerce-order-filter="order_id">
										<a href="/admin/sales/details/{{$order->id}}" class="text-gray-800 text-hover-primary fw-bold">#{{$order->id}}</a>
									</td>
									<!--end::Order ID=-->
									<!--begin::Customer=-->
									<td>
										<div class="d-flex align-items-center">
											{{-- <!--begin:: Avatar -->
											<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
												<a href="../../demo1/dist/apps/user-management/users/view.html">
													<div class="symbol-label">
														<img src="{{asset('admin/assets/media/avatars/300-12.jpg')}}" alt="Ana Crown" class="w-100" />
													</div>
												</a>
											</div>
											<!--end::Avatar--> --}}
											<div class="ms-5">
												<!--begin::Title-->
												<a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{$order->recipient_name}}</a>
												<span class="d-flex fs-9">{{$order->recipient_tel}}, {{$order->recipient_address}}</span>
												<!--end::Title-->
											</div>
										</div>
									</td>
									<!--end::Customer=-->
									<!--begin::Status=-->
									<td class="text-end pe-0" data-order="">
										<!--begin::Badges-->
										@if($order->status==0)
										<div class="badge badge-light-danger">Unprocessed</div>
										@elseif($order->status==1)
										<div class="badge badge-light-warning">Preparation</div>
										@elseif($order->status==2)
										<div class="badge badge-light-info">Shipped</div>
										@else
										<div class="badge badge-light-success">Completed</div>
										@endif
										<!--end::Badges-->
									</td>
									<!--end::Status=-->
									<!--begin::Total=-->
									<td class="text-end pe-0">
										<span class="fw-bold">${{$order->total}}</span>
									</td>
									<!--end::Total=-->
									<!--begin::Date Added=-->
									<td class="text-end" data-order="{{$order->created_at}}">
										<span class="fw-bold">{{explode(' ', $order->created_at)[0]}}</span>
									</td>
									<!--end::Date Added=-->
									<!--begin::Date Modified=-->
									<td class="text-end" data-order="{{$order->updated_at}}">
										<span class="fw-bold">{{explode(' ', $order->updated_at)[0]}}</span>
									</td>
									<!--end::Date Modified=-->
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
												<a href="/admin/sales/details/{{$order->id}}" class="menu-link px-3">View</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											{{-- <div class="menu-item px-3">
												<a href="/admin/sales/edit-order/{{$order->id}}" class="menu-link px-3">Edit</a>
											</div> --}}
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</td>
									<!--end::Action=-->
								</tr>
							@endif
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
<!--end::Content container-->
@endsection

@section('scripts')
@parent
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used for this page only)-->
	{{-- <script src="{{asset('admin/assets/js/custom/apps/ecommerce/sales/listing.js')}}"></script> --}}
	<script src="{{asset('admin/assets/js/widgets.bundle.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/widgets.js')}}"></script>
	{{-- <script src="{{asset('admin/assets/js/custom/apps/chat/chat.js')}}"></script> --}}
	{{-- <script src="{{asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script> --}}
	{{-- <script src="{{asset('admin/assets/js/custom/utilities/modals/create-app.js')}}"></script> --}}
	{{-- <script src="{{asset('admin/assets/js/custom/utilities/modals/users-search.js')}}"></script> --}}
	<!--end::Custom Javascript-->
	<script>
		"use strict";
var KTAppEcommerceSalesListing=function(){
	var e,t,n,r,o,a=(e,n,a)=>{
		r=e[0]?new Date(e[0]):null,o=e[1]?new Date(e[1]):null,$.fn.dataTable.ext.search.push((function(e,t,n){
			var a=r,c=o,l=new Date(moment($(t[5]).text(),"DD/MM/YYYY")),u=new Date(moment($(t[6]).text(),"DD/MM/YYYY"));
			return null===a&&null===c||null===a&&c>=u||a<=l&&null===c||a<=l&&c>=u
		})),t.draw()
	},c=()=>{
		e.querySelectorAll('[data-kt-ecommerce-order-filter="delete_row"]').forEach((e=>{
			e.addEventListener("click",(function(e){
				e.preventDefault();
				const n=e.target.closest("tr"),
				id=$(n).attr('data-id'),
				r=n.querySelector('[data-kt-ecommerce-order-filter="order_id"]').innerText;
				$.post('/api/delete-order', {_token: '{{csrf_token()}}', id: id})
				.done(function(){
					Swal.fire({
						text:"Are you sure you want to delete order: "+r+"?",icon:"warning",showCancelButton:!0,buttonsStyling:!1,confirmButtonText:"Yes, delete!",cancelButtonText:"No, cancel",customClass:{
							confirmButton:"btn fw-bold btn-danger",cancelButton:"btn fw-bold btn-active-light-primary"
						}
					}).then((function(e){
						e.value?Swal.fire({
							text:"You have deleted "+r+"!.",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{
								confirmButton:"btn fw-bold btn-primary"
							}
						}).then((function(){
							t.row($(n)).remove().draw()
						})):"cancel"===e.dismiss&&Swal.fire({
							text:r+" was not deleted.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{
								confirmButton:"btn fw-bold btn-primary"
							}
						})
					}))
				})
				.fail(function(){
					Swal.fire({
						html:"Sorry, looks like there are some errors detected, please try again.",
						icon:"error",
						buttonsStyling:!1,
						confirmButtonText:"Ok, got it!",
						customClass:{
							confirmButton:"btn btn-primary"
						}
					})
				})
				
			}))
		}))
	};
	return{
		init:function(){
			(e=document.querySelector("#kt_ecommerce_sales_table"))&&((t=$(e).DataTable({
				info:!1,order:[],pageLength:10,columnDefs:[{
					orderable:!1,targets:0
				},{
					orderable:!1,targets:7
				}]
			})).on("draw",(function(){
				c()
			})),(()=>{
				const e=document.querySelector("#kt_ecommerce_sales_flatpickr");
				n=$(e).flatpickr({
					altInput:!0,altFormat:"d/m/Y",dateFormat:"Y-m-d",mode:"range",onChange:function(e,t,n){
						a(e,t,n)
					}
				})
			})(),document.querySelector('[data-kt-ecommerce-order-filter="search"]').addEventListener("keyup",(function(e){
				t.search(e.target.value).draw()
			})),(()=>{
				const e=document.querySelector('[data-kt-ecommerce-order-filter="status"]');
				$(e).on("change",(e=>{
					let n=e.target.value;
					"all"===n&&(n=""),t.column(3).search(n).draw()
				}))
			})(),c()
			)
		}
	}
}();
KTUtil.onDOMContentLoaded((function(){
	KTAppEcommerceSalesListing.init()
}));

</script>
@endsection