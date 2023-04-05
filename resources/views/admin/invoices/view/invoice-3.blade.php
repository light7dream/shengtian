@extends('admin.layout.app')

@section('content')
	<!-- begin::Invoice 3-->
	<div class="card">
		<!-- begin::Body-->
		<div class="card-body py-20">
			<!-- begin::Wrapper-->
			<div class="mw-lg-950px mx-auto w-100">
				<!-- begin::Header-->
				<div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
					<h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7">INVOICE</h4>
					<!--end::Logo-->
					<div class="text-sm-end">
						<!--begin::Logo-->
						<a href="#" class="d-block mw-150px ms-sm-auto">
							<img alt="Logo" src="{{asset('assets/img/logo/logo.svg')}}" class="w-100" />
						</a>
						<!--end::Logo-->
						<!--begin::Text-->
						<div class="text-sm-end fw-semibold fs-4 text-muted mt-7">
							<div>Cecilia Chapman, 711-2880 Nulla St, Mankato</div>
							<div>Mississippi 96522</div>
						</div>
						<!--end::Text-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="pb-12">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column gap-7 gap-md-10">
						<!--begin::Message-->
						<div class="fw-bold fs-2">{{$invoice->order->member->name}},
						<span class="fs-6"> ID-#{{$invoice->order->member->id}}</span>
						<br />
						<span class="text-muted fs-5">Here are your order details. We thank you for your purchase.</span></div>
						<!--begin::Message-->
						<!--begin::Separator-->
						<div class="separator"></div>
						<!--begin::Separator-->
						<!--begin::Order details-->
						<div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
							<div class="flex-root d-flex flex-column">
								<span class="text-muted">Order ID</span>
								<span class="fs-5">#{{$invoice->order_id}}</span>
							</div>
							<div class="flex-root d-flex flex-column">
								<span class="text-muted">Date</span>
								<span class="fs-5">{{$invoice->ended_date}}</span>
							</div>
							<div class="flex-root d-flex flex-column">
								<span class="text-muted">Invoice ID</span>
								<span class="fs-5">#INV-{{$invoice->id}}</span>
							</div>
							</div>
						<!--end::Order details-->
						<!--begin::Billing & shipping-->
						<div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
							<div class="flex-root d-flex flex-column">
								<span class="text-muted">Billing Address</span>
								<span class="fs-6">Unit 1/23 Hastings Road,
								<br />Melbourne 3000,
								<br />Victoria,
								<br />Australia.</span>
							</div>
							<div class="flex-root d-flex flex-column">
								<span class="text-muted">Shipping Address</span>
								<span class="fs-6">{{$invoice->recipient_name}},
								<br />+{{$invoice->recipient_phone}},
								<br />{{$invoice->recipient_address}}
								</span>
							</div>
						</div>
						<!--end::Billing & shipping-->
						<!--begin:Order summary-->
						<div class="d-flex justify-content-between flex-column">
							<!--begin::Table-->
							<div class="table-responsive border-bottom mb-9">
								<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
									<thead>
										<tr class="border-bottom fs-6 fw-bold text-muted">
											<th class="min-w-175px pb-2">Products</th>
											<th class="min-w-70px text-end pb-2">SKU</th>
											<th class="min-w-80px text-end pb-2">QTY</th>
											<th class="min-w-100px text-end pb-2">Total</th>
										</tr>
									</thead>
									<tbody class="fw-semibold text-gray-600">
										<!--begin::Products-->
										@foreach ($invoice->orders as $order)
                                        <tr>
                                        <!--begin::Product-->
                                        <td>
                                            {{-- <div class="d-flex align-items-center"> --}}
                                                <!--begin::Title-->
                                                <div class="ms-5">
                                                    <div class="fw-bold">{{$order['product']}}</div>
                                                    <div class="fs-7 text-muted">{{$order['size'].', '.$order['color']}}</div>
                                                </div>
                                                <!--end::Title-->
                                            {{-- </div> --}}
                                        </td>
                                        <!--end::Product-->
                                        <!--begin::SKU-->
                                        <td class="text-end">{{$order['category']}}</td>
                                        <!--end::SKU-->
                                        <!--begin::Quantity-->
                                        <td class="text-end">{{$order['quantity']}}</td>
                                        <!--end::Quantity-->
                                        <!--begin::Total-->
                                        <td class="text-end">${{$order['price']*$order['quantity']}}</td>
                                        <!--end::Total-->
                                    </tr>
                                    @endforeach
										<!--end::Products-->
										<!--begin::Subtotal-->
										<tr>
										</tr>
										<!--end::Subtotal-->
										<!--begin::VAT-->
										<tr>
										</tr>
										<!--end::VAT-->
										<!--begin::Shipping-->
										<tr>
										</tr>
										<!--end::Shipping-->
										<!--begin::Grand total-->
										<tr>
											<td colspan="3" class="fs-3 text-dark fw-bold text-end">Grand Total</td>
											<td class="text-dark fs-3 fw-bolder text-end">${{$invoice->total}}</td>
										</tr>
										<!--end::Grand total-->
									</tbody>
								</table>
							</div>
							<!--end::Table-->
						</div>
						<!--end:Order summary-->
					</div>
					<!--end::Wrapper-->
				</div>
				@if($invoice->status)
				<div class="mt-5 mb-1">
					<img src="{{url('storage/uploads/invoices/'.$invoice->id.'.png')}}" />
				</div>
				@endif
				<!--end::Body-->
				<!-- begin::Footer-->
				<div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
					<!-- begin::Actions-->
					<div class="my-1 me-5">
						<!-- begin::Pint-->
						<!-- end::Pint-->
						<!-- begin::Download-->
						<!-- end::Download-->
					</div>
					<button type="button" class="btn btn-primary my-1 me-12" onclick="window.print();">Print Invoice</button>
					<!-- end::Actions-->
					<!-- begin::Action-->
					<!-- end::Action-->
				</div>
				<!-- end::Footer-->
			</div>
			<!-- end::Wrapper-->
		</div>
		<!-- end::Body-->
	</div>
	<!-- end::Invoice 1-->
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
	<script src="{{asset('admin/assets/js/custom/widgets.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/apps/chat/chat.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/utilities/modals/users-search.js')}}"></script>
	
@endsection