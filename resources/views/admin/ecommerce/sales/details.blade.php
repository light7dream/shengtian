@extends('admin.layout.app')

@section('content')

<!--begin::Content container-->
<div id="kt_app_content_container" class="app-container container-xxl">
	<!--begin::Order details page-->
	<div class="d-flex flex-column gap-7 gap-lg-10">
		<div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
			<!--begin:::Tabs-->
			<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-lg-n2 me-auto">
				{{-- <!--begin:::Tab item-->
				<li class="nav-item">
					<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_sales_order_summary">Order Summary</a>
				</li>
				<!--end:::Tab item-->
				<!--begin:::Tab item-->
				<li class="nav-item">
					<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_sales_order_history">Order History</a>
				</li>
				<!--end:::Tab item--> --}}
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
			{{-- <a href="#" class="btn btn-primary btn-sm">Add New Order</a> --}}
			<!--end::Button-->
		</div>
		<!--begin::Order summary-->
		<div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
			<!--begin::Customer details-->
			<div class="card card-flush py-4 flex-row-fluid">
				<!--begin::Card header-->
				<div class="card-header">
					<div class="card-title">
						<h2>Customer Details</h2>
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
										<!--end::Svg Icon-->Customer</div>
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
										<!--end::Svg Icon-->Address</div>
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
										<!--end::Svg Icon-->Phone</div>
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
										<!--end::Svg Icon-->Invoice
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
								{{-- <tr>
									<td class="text-muted">
										<div class="d-flex align-items-center">
										<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm006.svg-->
										<span class="svg-icon svg-icon-2 me-2">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M20 8H16C15.4 8 15 8.4 15 9V16H10V17C10 17.6 10.4 18 11 18H16C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18H21C21.6 18 22 17.6 22 17V13L20 8Z" fill="currentColor" />
												<path opacity="0.3" d="M20 18C20 19.1 19.1 20 18 20C16.9 20 16 19.1 16 18C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18ZM15 4C15 3.4 14.6 3 14 3H3C2.4 3 2 3.4 2 4V13C2 13.6 2.4 14 3 14H15V4ZM6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->Shipping
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="View the shipping manifest generated by this order."></i></div>
									</td>
									<td class="fw-bold text-end">
										<a href="#" class="text-gray-600 text-hover-primary">#SHP-0025410</a>
									</td>
								</tr> --}}
								<!--end::Shipping-->
								<!--begin::Rewards-->
								{{-- <tr>
									<td class="text-muted">
										<div class="d-flex align-items-center">
										<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm011.svg-->
										<span class="svg-icon svg-icon-2 me-2">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M21.6 11.2L19.3 8.89998V5.59993C19.3 4.99993 18.9 4.59993 18.3 4.59993H14.9L12.6 2.3C12.2 1.9 11.6 1.9 11.2 2.3L8.9 4.59993H5.6C5 4.59993 4.6 4.99993 4.6 5.59993V8.89998L2.3 11.2C1.9 11.6 1.9 12.1999 2.3 12.5999L4.6 14.9V18.2C4.6 18.8 5 19.2 5.6 19.2H8.9L11.2 21.5C11.6 21.9 12.2 21.9 12.6 21.5L14.9 19.2H18.2C18.8 19.2 19.2 18.8 19.2 18.2V14.9L21.5 12.5999C22 12.1999 22 11.6 21.6 11.2Z" fill="currentColor" />
												<path d="M11.3 9.40002C11.3 10.2 11.1 10.9 10.7 11.3C10.3 11.7 9.8 11.9 9.2 11.9C8.8 11.9 8.40001 11.8 8.10001 11.6C7.80001 11.4 7.50001 11.2 7.40001 10.8C7.20001 10.4 7.10001 10 7.10001 9.40002C7.10001 8.80002 7.20001 8.4 7.30001 8C7.40001 7.6 7.7 7.29998 8 7.09998C8.3 6.89998 8.7 6.80005 9.2 6.80005C9.5 6.80005 9.80001 6.9 10.1 7C10.4 7.1 10.6 7.3 10.8 7.5C11 7.7 11.1 8.00005 11.2 8.30005C11.3 8.60005 11.3 9.00002 11.3 9.40002ZM10.1 9.40002C10.1 8.80002 10 8.39998 9.90001 8.09998C9.80001 7.79998 9.6 7.70007 9.2 7.70007C9 7.70007 8.8 7.80002 8.7 7.90002C8.6 8.00002 8.50001 8.2 8.40001 8.5C8.40001 8.7 8.30001 9.10002 8.30001 9.40002C8.30001 9.80002 8.30001 10.1 8.40001 10.4C8.40001 10.6 8.5 10.8 8.7 11C8.8 11.1 9 11.2001 9.2 11.2001C9.5 11.2001 9.70001 11.1 9.90001 10.8C10 10.4 10.1 10 10.1 9.40002ZM14.9 7.80005L9.40001 16.7001C9.30001 16.9001 9.10001 17.1 8.90001 17.1C8.80001 17.1 8.70001 17.1 8.60001 17C8.50001 16.9 8.40001 16.8001 8.40001 16.7001C8.40001 16.6001 8.4 16.5 8.5 16.4L14 7.5C14.1 7.3 14.2 7.19998 14.3 7.09998C14.4 6.99998 14.5 7 14.6 7C14.7 7 14.8 6.99998 14.9 7.09998C15 7.19998 15 7.30002 15 7.40002C15.2 7.30002 15.1 7.50005 14.9 7.80005ZM16.6 14.2001C16.6 15.0001 16.4 15.7 16 16.1C15.6 16.5 15.1 16.7001 14.5 16.7001C14.1 16.7001 13.7 16.6 13.4 16.4C13.1 16.2 12.8 16 12.7 15.6C12.5 15.2 12.4 14.8001 12.4 14.2001C12.4 13.3001 12.6 12.7 12.9 12.3C13.2 11.9 13.7 11.7001 14.5 11.7001C14.8 11.7001 15.1 11.8 15.4 11.9C15.7 12 15.9 12.2 16.1 12.4C16.3 12.6 16.4 12.9001 16.5 13.2001C16.6 13.4001 16.6 13.8001 16.6 14.2001ZM15.4 14.1C15.4 13.5 15.3 13.1 15.2 12.9C15.1 12.6 14.9 12.5 14.5 12.5C14.3 12.5 14.1 12.6001 14 12.7001C13.9 12.8001 13.8 13.0001 13.7 13.2001C13.6 13.4001 13.6 13.8 13.6 14.1C13.6 14.7 13.7 15.1 13.8 15.4C13.9 15.7 14.1 15.8 14.5 15.8C14.8 15.8 15 15.7 15.2 15.4C15.3 15.2 15.4 14.7 15.4 14.1Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->Reward Points
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Reward value earned by customer when purchasing this order."></i></div>
									</td>
									<td class="fw-bold text-end">600</td>
								</tr> --}}
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
									<h2>Shipping Information</h2>
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
								<h2>Order #{{$order->id}}</h2>
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
											<th class="min-w-175px">Product</th>
											<th class="min-w-100px text-end">Category</th>
											<th class="min-w-70px text-end">Qty</th>
											<th class="min-w-100px text-end">Unit Price</th>
											<th class="min-w-100px text-end">Total</th>
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
														<div class="fs-7 text-muted">Delivery Date: 06/10/2022</div>
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
										{{-- <tr>
											<td colspan="4" class="text-end">Subtotal</td>
											<td class="text-end">${{$order->total}}</td>
										</tr> --}}
										<!--end::Subtotal-->
										{{-- <!--begin::VAT-->
										<tr>
											<td colspan="4" class="text-end">VAT (0%)</td>
											<td class="text-end">$0.00</td>
										</tr>
										<!--end::VAT-->
										<!--begin::Shipping-->
										<tr>
											<td colspan="4" class="text-end">Shipping Rate</td>
											<td class="text-end">$5.00</td>
										</tr>
										<!--end::Shipping--> --}}
										<!--begin::Grand total-->
										<tr>
											<td colspan="4" class="fs-3 text-dark text-end">Total</td>
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