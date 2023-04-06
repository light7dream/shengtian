
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
						<input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid ps-14" placeholder="搜索顺序" />
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
							<th>订购ID</th>
							<th>购买日期
							<th class="text-end">交换项目
							{{-- <th class="text-end">Color</th> --}}
							<th class="text-end">使用点
							<th class="text-end">地址
							<th class="text-end">电话
							<th class="text-end">接受者
							<th class="text-end">地位>
							<th class="text-end">处理订单
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
									<div class="badge badge-light-danger">未处理</div>
									@elseif($order->status==1)
									<div class="badge badge-light-warning">准备</div>
									@elseif($order->status==2)
									<div class="badge badge-light-info">发货</div>
									@else
									<div class="badge badge-light-success">已完成</div>
									@endif
									<!--end::Badges-->
								</td>
								<td class="text-end">
									<div style="col-md-12 col-sm-12 text-center">
									<select class="btn btn-sm btn-light mb-2" class="status">
										@if($order->status==0)
											<option value="0" selected>未处理</option>
											<option value="1">准备</option>
											<option value="2">发货</option>
											<option value="3">已完成</option>
										@elseif($order->status==1)
											<option value="0">未处理</option>
											<option value="1" selected>准备</option>
											<option value="2">发货</option>
											<option value="3">已完成</option>
										@elseif($order->status==2)
											<option value="0">未处理</option>
											<option value="1">准备</option>
											<option value="2" selected>发货</option>
											<option value="3">已完成</option>
										@else
											<option value="0">未处理</option>
											<option value="1">准备</option>
											<option value="2">发货</option>
											<option value="3" selected>已完成</option>
										@endif
									</select>
									<button name="change_status_button" class="btn btn-sm btn-primary btn-active-light-primary" style="margin-left: 5px" >确定</button>
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
						text:"您确定要删除订单吗: "+r+"?",icon:"warning",showCancelButton:!0,buttonsStyling:!1,confirmButtonText:"是的，删除！",cancelButtonText:"不，取消",customClass:{
							confirmButton:"btn fw-bold btn-danger",cancelButton:"btn fw-bold btn-active-light-primary"
						}
					}).then((function(e){
						e.value?Swal.fire({
							text:"您已删除 "+r+"!.",icon:"success",buttonsStyling:!1,confirmButtonText:"好的，我知道了！",customClass:{
								confirmButton:"btn fw-bold btn-primary"
							}
						}).then((function(){
							t.row($(n)).remove().draw()
						})):"cancel"===e.dismiss&&Swal.fire({
							text:r+" 没有被删除。",icon:"error",buttonsStyling:!1,confirmButtonText:"好的，我知道了！",customClass:{
								confirmButton:"btn fw-bold btn-primary"
							}
						})
					}))
				})
				.fail(function(){
					Swal.fire({
						html:"抱歉，看起来有一些错误，请重试。",
						icon:"error",
						buttonsStyling:!1,
						confirmButtonText:"好的，我知道了！",
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
						text:"状态已成功改变！",
						icon:"success",
						buttonsStyling:!1,
						confirmButtonText:"好的，我知道了！",
						customClass:{
						confirmButton:"btn btn-primary"
						}
					}).then((function(){
						window.location='/admin/sales/orders'
					}))
				})
				.fail(function(){
					Swal.fire({
						html:"抱歉，看起来有一些错误，请重试。",
						icon:"error",
						buttonsStyling:!1,
						confirmButtonText:"好的，我知道了！",
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