@extends('admin.layout.app')

@section('content')

<!--begin::Content container-->
<div id="kt_app_content_container" class="app-container container-xxl">
	<!--begin::Order details page-->
	<div class="d-flex flex-column gap-7 gap-lg-10">
		<div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
			<!--begin:::Tabs-->
			<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-lg-n2 me-auto">
			</ul>
			<!--end:::Tabs-->
			<!--begin::Button-->
			<a href="/admin/sales/orders" class="btn btn-icon btn-light btn-sm ms-auto me-lg-n7">
				<!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
				<span class="svg-icon svg-icon-2">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor" />
					</svg>
				</span>
				<!--end::Svg Icon-->
			</a>
			<!--end::Button-->
			<!--begin::Button-->
			<!--end::Button-->
			<!--begin::Button-->
			<!--end::Button-->
		</div>
		<!--begin::Order summary-->
		<div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
			<!--begin::Customer details-->
			<div class="card card-flush py-4 flex-row-fluid">
				<!--begin::Card header-->
				<div class="card-header">
					<div class="card-title">
						<h2>顾客信息</h2>
					</div>
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body pt-0">
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
							<!--begin::Table body-->
							<tbody class="fw-semibold text-gray-600">
								<!--begin::Customer name-->
								<tr>
									<td class="text-muted">
										<div class="d-flex align-items-center">
										<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
										<span class="svg-icon svg-icon-2 me-2">
											<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor" />
												<path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor" />
												<rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->顾客</div>
									</td>
									<td class="fw-bold text-end">
										<div class="d-flex align-items-center justify-content-end">
											<!--begin:: Avatar -->
											<div class="symbol symbol-circle symbol-25px overflow-hidden me-3">
												
											</div>
											<!--end::Avatar-->
											<!--begin::Name-->
											<a href="#" class="text-gray-600 text-hover-primary">{{$order->recipient_name}}</a>
											<!--end::Name-->
										</div>
									</td>
								</tr>
								<!--end::Customer name-->
								<!--begin::Customer email-->
								<tr>
									<td class="text-muted">
										<div class="d-flex align-items-center">
										<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
										<span class="svg-icon  svg-icon-2 me-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Adress-book2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3"/>
												<path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="currentColor"/>
											</g>
										</svg><!--end::Svg Icon--></span>
										<!--end::Svg Icon-->地址</div>
									</td>
									<td class="fw-bold text-end">
										<a href="#" class="text-gray-600 text-hover-primary">{{$order->recipient_address}}</a>
									</td>
								</tr>
								<!--end::Payment method-->
								<!--begin::Date-->
								<tr>
									<td class="text-muted">
										<div class="d-flex align-items-center">
										<!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
										<span class="svg-icon svg-icon-2 me-2">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z" fill="currentColor" />
												<path opacity="0.3" d="M19 4H5V20H19V4Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->电话</div>
									</td>
									<td class="fw-bold text-end">{{$order->recipient_tel}}</td>
								</tr>
								<!--end::Date-->
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Customer details-->
			<!--begin::Documents-->
			<div class="card card-flush py-4 flex-row-fluid">
				<!--begin::Card header-->
				<div class="card-header">
					<div class="card-title">
						<h2>Documents</h2>
					</div>
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body pt-0">
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
							<!--begin::Table body-->
							<tbody class="fw-semibold text-gray-600">
								<!--begin::Invoice-->
								<tr>
									<td class="text-muted">
										<div class="d-flex align-items-center">
										<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
										<span class="svg-icon svg-icon-2 me-2">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor" />
												<path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor" />
												<path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->发票
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="View the invoice generated by this order."></i></div>
									</td>
									<td class="fw-bold text-end">
										@if($order->invoice)
										<a href="/admin/invoices/{{$order->invoice->id}}" class="text-gray-600 text-hover-primary">#INV-{{$order->invoice->id}}</a>
										@endif
									</td>
								</tr>
								<tr>
									<td>
										<a href="{{url('/storage/uploads/orders/qrcode_'.$order->id.'.png')}}" download><img width="100" class="align-items-center" src="{{url('/storage/uploads/orders/qrcode_'.$order->id.'.png')}}"></a>
									</td>
								</tr>
								<!--end::Invoice-->
								<!--begin::Shipping-->
								
								<!--end::Rewards-->
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Documents-->
		</div>
		<!--end::Order summary-->
		<!--begin::Tab content-->
		<div class="tab-content">
			<!--begin::Tab pane-->
			<div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" role="tab-panel">
				<!--begin::Orders-->
				<div class="d-flex flex-column gap-7 gap-lg-10">
					<div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
						<!--begin::Payment address-->
						
						<!--end::Payment address-->
						<!--begin::Shipping address-->
						<div class="card card-flush py-4 flex-row-fluid overflow-hidden">
							<!--begin::Background-->
							<div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
								<img src="{{asset('admin/assets/media/icons/duotune/ecommerce/ecm006.svg')}}" class="w-175px" />
							</div>
							<!--end::Background-->
							<!--begin::Card header-->
							<div class="card-header">
								<div class="card-title">
									<h2>运输信息</h2>
								</div>
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<!--end::Card body-->
						</div>
						<!--end::Shipping address-->
					</div>
					<!--begin::Product List-->
					<div class="card card-flush py-4 flex-row-fluid overflow-hidden">
						<!--begin::Card header-->
						<div class="card-header">
							<div class="card-title">
								<h2>命令 #{{$order->id}}</h2>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0">
							<div class="table-responsive">
								<!--begin::Table-->
								<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
									<!--begin::Table head-->
									<thead>
										<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
											<th class="min-w-175px">产品</th>
											<th class="min-w-100px text-end">类别</th>
											<th class="min-w-70px text-end">数量</th>
											<th class="min-w-100px text-end">单价</th>
											<th class="min-w-100px text-end">总</th>
										</tr>
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="fw-semibold text-gray-600">
										<!--begin::Products-->
										@foreach ($order->order_products as $op)
										<tr>
											<!--begin::Product-->
											<td>
												<div class="d-flex align-items-center">
													<!--begin::Thumbnail-->
													<a href="/catalog/edit-product/{{$op->product_id}}" class="symbol symbol-50px">
														<span class="symbol-label" style="background-image:url({{url('storage/uploads/catalog/products/'.$op->product_id.'/main.png')}});"></span>
													</a>
													<!--end::Thumbnail-->
													<!--begin::Title-->
													<div class="ms-5">
														<a href="/catalog/edit-product/{{$op->product_id}}" class="fw-bold text-gray-600 text-hover-primary">{{$op->product->name}}</a>
														<div class="fs-7 text-muted">交货日期: 06/10/2022</div>
													</div>
													<!--end::Title-->
												</div>
											</td>
											<!--end::Product-->
											<!--begin::SKU-->
											<td class="text-end">{{$op->product->category->name}}</td>
											<!--end::SKU-->
											<!--begin::Quantity-->
											<td class="text-end">{{$op->quantity}}</td>
											<!--end::Quantity-->
											<!--begin::Price-->
											<td class="text-end">${{$op->product->points}}</td>
											<!--end::Price-->
											<!--begin::Total-->
											<td class="text-end">${{$op->quantity*$op->product->points}}</td>
											<!--end::Total-->
										</tr>
										@endforeach
										<!--end::Products-->
										<!--begin::Subtotal-->
										
										<!--begin::Grand total-->
										<tr>
											<td colspan="4" class="fs-3 text-dark text-end">总</td>
											<td class="text-dark fs-3 fw-bolder text-end">${{$order->total}}</td>
										</tr>
										<!--end::Grand total-->
									</tbody>
									<!--end::Table head-->
								</table>
								<!--end::Table-->
							</div>
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Product List-->
				</div>
				<!--end::Orders-->
			</div>
			<!--end::Tab pane-->
			<!--begin::Tab pane-->
			<!--end::Tab pane-->
		</div>
		<!--end::Tab content-->
	</div>
	<!--end::Order details page-->
</div>
<!--end::Content container-->

@endsection

@section('drawers')

@endsection
@section('scripts')
@parent
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used for this page only)-->
	<script src="{{asset('admin/assets/js/widgets.bundle.js')}}"></script>
	
	<script>
		
	</script>
	<!--end::Custom Javascript-->
@endsection