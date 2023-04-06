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
						<input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid ps-14" placeholder="搜索产品" />
					</div>
					<!--end::Search-->
				</div>
				<!--end::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
					<!--begin::Add product-->
					<a href="/admin/catalog/add-product" class="btn btn-primary">添加产品</a>
					<!--end::Add product-->
				</div>
				<!--end::Card toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body pt-0">
				<!--begin::Table-->
				<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
					<!--begin::Table head-->
					<thead>
						<!--begin::Table row-->
						<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
							<th class="w-10px pe-2">
								<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
									{{-- <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" /> --}}
								</div>
							</th>
							<th class="min-w-200px">产品</th>
							<th class="min-w-100px">描述</th>
							<th class="min-w-70px">类别</th>
							<th class="min-w-100px">点</th>
							{{-- <th class="min-w-100px">Colors</th>
							<th class="min-w-100px">Sizes</th> --}}
							<th class="min-w-100px">数量</th>
							<th class="text-end min-w-70px">动作</th>
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="fw-semibold text-gray-600">
						<!--begin::Table row-->
						@foreach ($products as $product)
						<tr>
							<!--begin::Checkbox-->
							<td>
								<div class="form-check form-check-sm form-check-custom form-check-solid">
									<input type="hidden" value="{{$product->id}}" />
								</div>
							</td>
							<!--end::Checkbox-->
							<!--begin::Category=-->
							<td>
								<div class="d-flex align-items-center">
									<!--begin::Thumbnail-->
									<a href="/admin/catalog/edit-product/{{$product->id}}" class="symbol symbol-50px">
										<span class="symbol-label" style="background-image:url({{'/storage/uploads/catalog/products/'.$product->id.'/main.png'}});"></span>
									</a>
									<!--end::Thumbnail-->
									<div class="ms-5">
										<!--begin::Title-->
										<a href="/admin/catalog/edit-product/{{$product->id}}" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">{{$product->name}}</a>
										<!--end::Title-->
									</div>
								</div>
							</td>
							<!--end::Category=-->
							<!--begin::SKU=-->
							<td class="">
								<span class="fw-bold">{!!$product->description!!}</span>
							</td>
							<!--end::SKU=-->
							<!--begin::Qty=-->
							<td class="0">
								<span class="fw-bold ms-3">{{$product->category->name}}</span>
							</td>
							<!--end::Qty=-->
							<!--begin::Price=-->
							<td class="">{{$product->points}}</td>
							<!--end::Price=-->
							<!--begin::Rating-->
							{{-- <td class="">
								@foreach ($product->colors as $color )<span style="display:inline-block;margin:2px;width:2em;height:2em;background-color: {{$color}}"></span>@endforeach
							</td> --}}
							<!--end::Rating-->
							<!--begin::Status=-->
							{{-- <td class="0">
								@foreach ($product->sizes as $size )<span class="ms-2 border border-dashed border-primary p-2">{{$size}}</span>@endforeach
							</td> --}}
							<td class="0">
								{{$product->quantity}}
							</td>
							<!--end::Status=-->
							<!--begin::Action=-->
							<td class="text-end">
								
									<div class="mb-1" style="display: inline-block">
										<a href="/admin/catalog/edit-product/{{$product->id}}" class="btn btn-warning">编辑</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="mb-1" style="display: inline-block">
										<a href="#" class="btn btn-dark" data-kt-ecommerce-product-filter="delete_row" data-id="{{$product->id}}">删除</a>
									</div>
									<!--end::Menu item-->
								
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
	<!--begin::Custom Javascript(used for this page only)-->
	<script>
		"use strict";var KTAppEcommerceProducts=function(){var t,e,n=()=>{
			t.querySelectorAll('[data-kt-ecommerce-product-filter="delete_row"]').forEach(
				(t=>{
					t.addEventListener("click",(function(t){
						t.preventDefault();
						var id = $(this).attr('data-id')
						const n=t.target.closest("tr"),
						r=n.querySelector('[data-kt-ecommerce-product-filter="product_name"]').innerText;
						Swal.fire({
							text:"你确定你要删除"+r+"?",
							icon:"warning",showCancelButton:!0,
							buttonsStyling:!1,
							confirmButtonText:"是的，删除！",
							cancelButtonText:"不，取消",
							customClass:{confirmButton:"btn fw-bold btn-danger",
							cancelButton:"btn fw-bold btn-active-light-primary"}})
							.then((function(t){
								t.value?(
									$.post('/api/catalog/delete-product', {_token: '{{csrf_token()}}', id: id})
										.done(function(){
											Swal.fire(
												{text:"您已删除"+r+"!.",
												icon:"success",
												buttonsStyling:!1,
												confirmButtonText:"好的，我知道了！",
												customClass:{confirmButton:"btn fw-bold btn-primary"}})
												.then((function(){e.row($(n)).remove().draw()}))
										})
										.fail(function(){
											Swal.fire({text:r+"没有被删除。",icon:"error",buttonsStyling:!1,confirmButtonText:"好的，我知道了！",customClass:{confirmButton:"btn fw-bold btn-primary"}})
										})
									
									):"cancel"===t.dismiss&&Swal.fire({text:r+"没有被删除。",icon:"error",buttonsStyling:!1,confirmButtonText:"好的，我知道了！",customClass:{confirmButton:"btn fw-bold btn-primary"}})}))}))}))};return{init:function(){(t=document.querySelector("#kt_ecommerce_products_table"))&&((e=$(t).DataTable({info:!1,order:[],pageLength:10,columnDefs:[{render:DataTable.render.number(",",".",2),targets:4},{orderable:!1,targets:0},{orderable:!1,targets:5}]})).on("draw",(function(){n()})),document.querySelector('[data-kt-ecommerce-product-filter="search"]').addEventListener("keyup",(function(t){e.search(t.target.value).draw()})),(()=>{const t=document.querySelector('[data-kt-ecommerce-product-filter="status"]');$(t).on("change",(t=>{let n=t.target.value;"all"===n&&(n=""),e.column(6).search(n).draw()}))})(),n())}}}();KTUtil.onDOMContentLoaded((function(){KTAppEcommerceProducts.init()}));
	</script>
@endsection