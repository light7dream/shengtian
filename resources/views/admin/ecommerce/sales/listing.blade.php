
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
						<input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid ps-14" placeholder="Search Order" />
					</div>
					<!--end::Search-->
				</div>
				<!--end::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
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
							<th>Order ID</th>
							<th>Redemption Date</th>
							<th class="text-end">Exchange items</th>
							{{-- <th class="text-end">Color</th> --}}
							<th class="text-end">Use Points</th>
							<th class="text-end">Address</th>
							<th class="text-end">Telephone</th>
							<th class="text-end">Recipient</th>
							<th class="text-end">Status</th>
							<th class="text-end">Processing Orders</th>
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="fw-semibold text-gray-600">
						<!--begin::Table row-->
						@foreach ($orders as $order)
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
								<td data-order="{{$order->updated_at}}">
									<span class="fw-bold">{{explode(' ', $order->updated_at)[0]}}</span>
								</td>								
								<td>
								@foreach ($order->order_products as $order_product)
									{{$order_product->product->name.''.$order_product->color}}
								@endforeach
								</td>
								<td class="text-end">
									{{$order->total}}
								</td>
								<td class="text-end">
									{{$order->recipient_address}}
								</td>	
								<td class="text-end">
									{{$order->recipient_tel}}
								</td>	
								<td class="text-end">
									{{$order->recipient_name}}
								</td>								
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
								<td class="text-end">
									<div style="col-md-12 col-sm-12 text-center">
									<select class="btn btn-sm btn-light mb-2" class="status">
										@if($order->status==0)
											<option value="0" selected>Unprocessed</option>
											<option value="1">Preparation</option>
											<option value="2">Shipped</option>
											<option value="3">Completed</option>
										@elseif($order->status==1)
											<option value="0">Unprocessed</option>
											<option value="1" selected>Preparation</option>
											<option value="2">Shipped</option>
											<option value="3">Completed</option>
										@elseif($order->status==2)
											<option value="0">Unprocessed</option>
											<option value="1">Preparation</option>
											<option value="2" selected>Shipped</option>
											<option value="3">Completed</option>
										@else
											<option value="0">Unprocessed</option>
											<option value="1">Preparation</option>
											<option value="2">Shipped</option>
											<option value="3" selected>Completed</option>
										@endif
									</select>
									<button name="change_status_button" class="btn btn-sm btn-primary btn-active-light-primary" style="margin-left: 5px" >Sure</button>
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
		<!--end::Products-->
	</div>
<!--end::Content container-->
@endsection

@section('drawers')

@endsection
@section('modals')
@endsection
@section('scripts')
@parent
	<script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
	<script src="{{asset('admin/assets/js/widgets.bundle.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/widgets.js')}}"></script>
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
		}));


		e.querySelectorAll('[name = "change_status_button"]').forEach((e=>{
			e.addEventListener("click",(function(e){
				e.preventDefault();
				const n=e.target.closest("tr"),
				id=$(n).attr('data-id');
				status = $(n).find("td:last-child").find("select").val();
				$.post('/api/edit-order', {_token: '{{csrf_token()}}', id: id, status : status})
				.done(function(){
					Swal.fire({
						text:"Status has been successfully changed!",
						icon:"success",
						buttonsStyling:!1,
						confirmButtonText:"Ok, got it!",
						customClass:{
						confirmButton:"btn btn-primary"
						}
					}).then((function(){
						window.location='/admin/sales/orders'
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