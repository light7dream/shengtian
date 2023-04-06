@extends('admin.layout.app')

@section('content')
<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-xxl">
		<!--begin::Form-->
		<form id="kt_ecommerce_edit_order_form" action="#" class="form d-flex flex-column flex-lg-row" method="POST" data-kt-redirect="/admin/sales/listing">
			<!--begin::Aside column-->
			@csrf
			<input type='hidden' name="id" value="{{$order->id}}"/>
			<div class="w-100 flex-lg-row-auto w-lg-300px mb-7 me-7 me-lg-10">
				<!--begin::Order details-->
				<div class="card card-flush py-4">
					<!--begin::Card header-->
					<div class="card-header">
						<div class="card-title">
							<h2>订单详细信息</h2>
						</div>
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<div class="d-flex flex-column gap-10">
							<!--begin::Input group-->
							<div class="fv-row">
								<!--begin::Label-->
								<label class="form-label">订单编号</label>
								<!--end::Label-->
								<!--begin::Auto-generated ID-->
								<div class="fw-bold fs-3">#{{$order->id}}</div>
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							
							<!--end::Input group-->
							
							<!--begin::Input group-->
							<div class="fv-row">
								<!--begin::Label-->
								<label class="form-label">订购日期</label>
								<!--end::Label-->
								<!--begin::Editor-->
								<input id="kt_ecommerce_edit_order_date" name="order_date" disabled placeholder="选择日期" class="form-control mb-2" value="{{$order->created_at}}" />
								<!--end::Editor-->
								<!--begin::Description-->
								<!--end::Description-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row">
								<!--begin::Label-->
								<label class="form-label">地位</label>
								<!--end::Label-->
								<!--begin::Select2-->
								<select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="选择一个选项" name="status" id="kt_ecommerce_edit_order_status">
									<option value="0" {{$order->status==0?'selected="selected"':''}}>未处理</option>
									<option value="1" {{$order->status==1?'selected="selected"':''}}>准备</option>
									<option value="2" {{$order->status==2?'selected="selected"':''}}>发货</option>
									<option value="3" {{$order->status==3?'selected="selected"':''}}>已完成</option>
								</select>
								<!--end::Select2-->
								<!--begin::Description-->
								<div class="text-muted fs-7">设置要处理的订单日期。</div>
								<!--end::Description-->
							</div>
							<!--end::Input group-->
						</div>
					</div>
					<!--end::Card header-->
				</div>
				<!--end::Order details-->
			</div>
			<!--end::Aside column-->
			<!--begin::Main column-->
			<div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
				<!--begin::Order details-->
				<div class="card card-flush py-4">
					<!--begin::Card header-->
					<div class="card-header">
						<div class="card-title">
							<h2>产品</h2>
						</div>
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<div class="d-flex flex-column gap-10">
							<!--begin::Input group-->
							<div>
								<!--begin::Label-->
								<!--end::Label-->
								<!--begin::Selected products-->
								<!--begin::Selected products-->
								<!--begin::Total price-->
								<div class="fw-bold fs-4">总成本: $
								<span id="kt_ecommerce_edit_order_total_price">{{$order->total}}</span></div>
								<!--end::Total price-->
							</div>
							<!--end::Input group-->
							<!--begin::Separator-->
							<div class="separator"></div>
							<!--end::Separator-->
							<!--begin::Search products-->
							<div class="d-flex align-items-center position-relative mb-n7">
								<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
								<span class="svg-icon svg-icon-1 position-absolute ms-4">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
										<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<input type="text" data-kt-ecommerce-edit-order-filter="search" class="form-control form-control-solid w-100 w-lg-50 ps-14" placeholder="搜索产品" />
							</div>
							<!--end::Search products-->
							<!--begin::Table-->
							<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_edit_order_product_table">
								<!--begin::Table head-->
								<thead>
									<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
										{{-- <th class="w-25px pe-2"></th> --}}
										<th class="min-w-200px">Product</th>
										<th class="min-w-100px text-end pe-5">数量</th>
									</tr>
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<tbody class="fw-semibold text-gray-600">
									<!--begin::Table row-->
									@foreach ($order->order_products as $op)
										<tr>
										<!--begin::Checkbox-->
										{{-- <td>
											<div class="form-check form-check-sm form-check-custom form-check-solid">
												<input class="form-check-input" type="checkbox" value="1" />
											</div>
										</td> --}}
										<!--end::Checkbox-->
										<!--begin::Product=-->
										<td>
											<div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
												<!--begin::Thumbnail-->
												<a href="/admin/catalog/edit-product/{{$op->product_id}}" class="symbol symbol-50px">
													<span class="symbol-label" style="background-image:url({{asset('admin/assets/media//stock/ecommerce/1.gif')}});"></span>
												</a>
												<!--end::Thumbnail-->
												<div class="ms-5">
													<!--begin::Title-->
													<a href="/admin/catalog/edit-product/{{$op->product_id}}" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{$op->product->name}}</a>
													<!--end::Title-->
													<!--begin::Price-->
													<div class="fw-semibold fs-7">价格: $
													<span data-kt-ecommerce-edit-order-filter="price">{{$op->product->points}}</span></div>
													<!--end::Price-->
													<!--begin::SKU-->
													<div class="text-muted fs-7">{{$op->product->category->name}}</div>
													<!--end::SKU-->
												</div>
											</div>
										</td>
										<!--end::Product=-->
										<!--begin::Qty=-->
										<td class="text-end pe-5" data-order="14">
											<span class="fw-bold ms-3">{{$op->quantity}}</span>
										</td>
										<!--end::Qty=-->
									</tr>
									@endforeach
									
									<!--end::Table row-->
								</tbody>
								<!--end::Table body-->
							</table>
							<!--end::Table-->
						</div>
					</div>
					<!--end::Card header-->
				</div>
				<!--end::Order details-->
				<!--begin::Order details-->
				<div class="card card-flush py-4">
					<!--begin::Card header-->
					<div class="card-header">
						<div class="card-title">
							<h2>送货详情</h2>
						</div>
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<!--begin::Billing address-->
						<div class="d-flex flex-column gap-5 gap-md-7">
							
							<!--begin::Shipping address-->
							<div class="d-flex flex-column gap-5 gap-md-7" id="kt_ecommerce_edit_order_shipping_form">
								<!--begin::Title-->
								<div class="fs-4 fw-bold mb-n2">收件地址</div>
								<!--end::Title-->
								<!--begin::Input group-->
								<div class="d-flex flex-column flex-md-row gap-5">
									<div class="flex-row-fluid">
										<!--begin::Label-->
										<label class="form-label">收件人姓名</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control" name="" placeholder="收件人姓名" value="{{$order->recipient_name}}" disabled />
										<!--end::Input-->
									</div>
									<div class="fv-row flex-row-fluid">
										<!--begin::Label-->
										<label class="form-label">收件人电话</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control" name="" placeholder="收件人电话" value="{{$order->recipient_tel}}" disabled />
										<!--end::Input-->
									</div>
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column flex-md-row gap-5">
									<div class="fv-row flex-row-fluid">
										<!--begin::Label-->
										<label class="form-label">收件人地址</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control" name="" placeholder="收件人地址" value="{{$order->recipient_address}}" disabled />
										<!--end::Input-->
									</div>
								</div>
								<!--end::Input group-->
								
							</div>
							<!--end::Shipping address-->
						</div>
						<!--end::Billing address-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Order details-->
				<div class="d-flex justify-content-end">
					<!--begin::Button-->
					<a href="/catalog/products" id="kt_ecommerce_edit_order_cancel" class="btn btn-light me-5">取消</a>
					<!--end::Button-->
					<!--begin::Button-->
					<button type="submit" id="kt_ecommerce_edit_order_submit" class="btn btn-primary">
						<span class="indicator-label">节省</span>
						<span class="indicator-progress">请稍等...
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
					</button>
					<!--end::Button-->
				</div>
			</div>
			<!--end::Main column-->
		</form>
		<!--end::Form-->
	</div>
<!--end::Content container-->

@endsection

@section('drawers')

@endsection
@section('scripts')
@parent
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
	<!--end::Vendors Javascript-->
	<script>
		"use strict";
		
		var KTAppEcommerceSalesSaveOrder=function(){
			return {
				init:function(){
					(()=>{
					let e;
					const t=document.getElementById("kt_ecommerce_edit_order_form"),
					r=document.getElementById("kt_ecommerce_edit_order_submit");
					e=FormValidation.formValidation(t,{
						fields:{
							
						},plugins:{
							trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({
								rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""
							})
						}
					}),r.addEventListener("click",(o=>{
						o.preventDefault(),e&&e.validate().then((function(e){
							console.log("validated!"),
							"Valid"==e?(
								r.setAttribute("data-kt-indicator","on"),
								r.disabled=!0,
								$.post('/api/edit-order', $(t).serialize())
									.done(function(){
										r.removeAttribute("data-kt-indicator"),
										Swal.fire({
											text:"表单已成功提交！",
											icon:"success",
											buttonsStyling:!1,
											confirmButtonText:"好的，我知道了！",
											customClass:{
												confirmButton:"btn btn-primary"
											}
										}).then((function(e){
											e.isConfirmed&&(r.disabled=!1,window.location=t.getAttribute("data-kt-redirect"))
										}))
									})
									.fail(function(err){
										Swal.fire({
											html:"抱歉，似乎检测到一些错误，请重试。",
											icon:"error",
											buttonsStyling:!1,
											confirmButtonText:"好的，我知道了！",
											customClass:{
												confirmButton:"btn btn-primary"
											}
										})
									})
								):Swal.fire({
										html:"抱歉，似乎检测到一些错误，请重试。",
										icon:"error",
										buttonsStyling:!1,
										confirmButtonText:"好的，我知道了！",
										customClass:{
											confirmButton:"btn btn-primary"
										}
									})
								}))
							}))
					})()
				}
			}
		}();
		KTUtil.onDOMContentLoaded((function(){
			KTAppEcommerceSalesSaveOrder.init()
		}));
	</script>
	<!--end::Custom Javascript-->
@endsection