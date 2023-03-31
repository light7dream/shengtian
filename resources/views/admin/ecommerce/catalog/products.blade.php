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
						<input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Product" />
					</div>
					<!--end::Search-->
				</div>
				<!--end::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
					<!--begin::Add product-->
					<a href="/admin/catalog/add-product" class="btn btn-primary">Add Product</a>
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
							<th class="min-w-200px">Product</th>
							<th class="min-w-100px">Description</th>
							<th class="min-w-70px">Category</th>
							<th class="min-w-100px">Points</th>
							{{-- <th class="min-w-100px">Colors</th>
							<th class="min-w-100px">Sizes</th> --}}
							<th class="min-w-100px">Quantity</th>
							<th class="text-end min-w-70px">Actions</th>
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
									{{-- <input class="form-check-input" type="checkbox" value="1" /> --}}
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
								<span class="fw-bold">{{$product->description}}</span>
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
										<a href="/admin/catalog/edit-product/{{$product->id}}" class="menu-link px-3">Edit</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
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
	<script src="{{asset('admin/assets/js/custom/apps/ecommerce/catalog/products.js')}}"></script>
	<script src="{{asset('admin/assets/js/widgets.bundle.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/widgets.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/apps/chat/chat.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/utilities/modals/create-app.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/utilities/modals/users-search.js')}}"></script>
@endsection