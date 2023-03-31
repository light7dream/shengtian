@extends('admin.layout.app')

@section('styles')
@parent
<link href="{{asset('admin/assets/css/jquery-minicolors.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-xxl">
		<!--begin::Form-->
		<form id="kt_ecommerce_add_product_form" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row" data-kt-redirect="/admin/catalog/products">
			@csrf
			<!--begin::Aside column-->
			<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
				<!--begin::Thumbnail settings-->
				<div class="card card-flush py-4">
					<!--begin::Card header-->
					<div class="card-header">
						<!--begin::Card title-->
						<div class="card-title required">
							<h2>Thumbnail</h2>
						</div>
						<!--end::Card title-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body text-center pt-0 fv-row">
						<!--begin::Image input-->
						<!--begin::Image input placeholder-->
						<style>.image-input-placeholder { background-image: url('{{asset("admin/assets/media/svg/files/blank-image.svg")}}'); } [data-theme="dark"] .image-input-placeholder { background-image: url('{{asset("admin/assets/media/svg/files/blank-image-dark.svg")}}'); }</style>
						<!--end::Image input placeholder-->
						<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
							<!--begin::Preview existing avatar-->
							<div class="image-input-wrapper w-150px h-150px"></div>
							<!--end::Preview existing avatar-->
							<!--begin::Label-->
							<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
								<i class="bi bi-pencil-fill fs-7"></i>
								<!--begin::Inputs-->
								<input type="file" name="mainImage" accept=".png, .jpg, .jpeg" />
								<input type="hidden" name="mainImage_remove" />
								<!--end::Inputs-->
							</label>
							<!--end::Label-->
							<!--begin::Cancel-->
							<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
								<i class="bi bi-x fs-2"></i>
							</span>
							<!--end::Cancel-->
							<!--begin::Remove-->
							<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
								<i class="bi bi-x fs-2"></i>
							</span>
							<!--end::Remove-->
						</div>
						<!--end::Image input-->
						<!--begin::Description-->
						<div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
						<!--end::Description-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Thumbnail settings-->
				<!--begin::Status-->
				
				<!--end::Status-->
				<!--begin::Category & tags-->
				<div class="card card-flush py-4">
					<!--begin::Card header-->
					<div class="card-header">
						<!--begin::Card title-->
						<div class="card-title">
							<h2>Product Details</h2>
						</div>
						<!--end::Card title-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<div class="fv-row  mb-7">
						<!--begin::Input group-->
						<!--begin::Label-->
						<label class="required form-label">Categories</label>
						<!--end::Label-->
						<!--begin::Select2-->
						<select class="form-select mb-2" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="product_category">
							<option></option>
							@foreach ($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
						<!--end::Select2-->
						<!--begin::Description-->
						<div class="text-muted fs-7">Add product to a category.</div>
						<!--end::Description-->
						<!--end::Input group-->
						</div>
						<!--begin::Button-->
						<a href="/admin/catalog/add-category" class="btn btn-light-primary btn-sm mb-10">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
						<span class="svg-icon svg-icon-2x">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
								<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->Create new category</a>
						<!--end::Button-->
						<div class="fv-row mb-2">
							<!--begin::Input group-->
							<!--begin::Label-->
							<label class="required form-label d-block">Pricing</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input name="product_price" class="form-control mb-2" value="" type="number" />
							<!--end::Input-->
							<!--begin::Description-->
							<div class="text-muted fs-7">Enter price of a product.</div>
							<!--end::Description-->
							<!--end::Input group-->
						</div>
						<div class="fv-row mb-4">
							<!--begin::Input group-->
							<!--begin::Label-->
							<label class="form-label d-block">Colors</label>
							<!--end::Label-->
							<style> 
								.color-checker ul li {display: inline-block; margin: 2px;transition: all 0.1s ease 0s;cursor: pointer;} 
								.color-checker ul li span {display: block;} 
								.color-checker ul li input{display: none;}
								.color-checker ul li span:hover{background-color: rgba(0,0,0,0.6);}
							</style>
							<div class="color-checker row mt-3">
								<ul>
								</ul>
							</div>
							<!--begin::Input-->
							<div class="d-flex">
								<div class="col-md-9 col-sm-12">
									<input type="text" id="hue" class="demo mb-3 form-control" data-control="hue" value="#ff0000">
								</div>
								<div class="col-md-2 ms-1 mt-1">
								<button type="button" class="btn btn-light-primary btn-sm mb-7" id="my-add-color">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
										<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
									</svg>
								</button>
								</div>
							</div>
							
							<!--end::Input-->
							<!--begin::Description-->
							<div class="text-muted fs-7">Add colors to a product.</div>
							<!--end::Description-->
							<!--end::Input group-->
						</div>
						<div class="fv-row mb-4">
							<!--begin::Input group-->
							<!--begin::Label-->
							<label class="form-label d-block">Sizes</label>
							<!--end::Label-->
							<!--begin::Input-->
							{{-- <select class="form-select mb-2" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" name="product_sizes[]">
								<option></option>
								<option value="Small">Small</option>
								<option value="Medium">Medium</option>
								<option value="Large">Large</option>
							</select> --}}
							<style> 
								.size-picker ul li {display: inline-block; border: 1px solid #ccc; margin: 3px;transition: all 0.1s ease 0s;cursor: pointer;} 
								.size-picker ul li span {display: flex;align-items: center;} 
								.size-picker ul li span span {margin: 4px;} 
								.size-picker ul li input{display: none;}
								.size-picker ul li:hover{background-color: rgba(0,50,250,0.3);}
							</style>
							<div class="size-picker" id="product_sizes">
							<ul>
								<li class="black"><span><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
										<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"/>
									</g>
								</svg><!--end::Svg Icon--></span></span><input type="hidden" data-value="Small" name="product_sizes[]" value=""></a></li>
								<li class="gray"><span><span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
										<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"/>
									</g>
								</svg><!--end::Svg Icon--></span></span><input type="hidden" data-value="Medium"  name="product_sizes[]" value=""></li>
								<li class="red"><span><span class="svg-icon svg-icon-primary svg-icon-4x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
										<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"/>
									</g>
								</svg><!--end::Svg Icon--></span></span><input type="hidden"  data-value="Large" name="product_sizes[]" value=""></li>
							</ul>
							</div>
							<!--end::Input-->
							<!--begin::Description-->
							<div class="text-muted fs-7">Add sizes to a product.</div>
							<!--end::Description-->
							<!--end::Input group-->
						</div>
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Category & tags-->
				<!--begin::Template settings-->
				
				<!--end::Template settings-->
			</div>
			<!--end::Aside column-->
			<!--begin::Main column-->
			<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
				<!--begin:::Tabs-->
				<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
					<!--begin:::Tab item-->
					<li class="nav-item">
						{{-- <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a> --}}
					</li>
					<!--end:::Tab item-->
				</ul>
				<!--end:::Tabs-->
				<!--begin::Tab content-->
				<div class="tab-content">
					<!--begin::Tab pane-->
					<div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
						<div class="d-flex flex-column gap-7 gap-lg-10">
							<!--begin::General options-->
							<div class="card card-flush py-4">
								<!--begin::Card header-->
								<div class="card-header">
									<div class="card-title">
										<h2>General</h2>
									</div>
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<!--begin::Input group-->
									<div class="mb-10 fv-row">
										<!--begin::Label-->
										<label class="required form-label">Product Name</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text" name="product_name" class="form-control mb-2" placeholder="Product name" value="" />
										<!--end::Input-->
										<!--begin::Description-->
										<div class="text-muted fs-7">A product name is required and recommended to be unique.</div>
										<!--end::Description-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="mb-10 fv-row">
										<!--begin::Label-->
										<label class="required form-label">Description</label>
										<!--end::Label-->
										<!--begin::Editor-->
										<textarea class="form-control" name="product_description" rows="4" placeholder="Product description"></textarea>
										<!--end::Editor-->
										<!--begin::Description-->
										<div class="text-muted fs-7">Set a description to the product for better visibility.</div>
										<!--end::Description-->
									</div>
									<!--end::Input group-->
									
									<!--begin::Input group-->
									<div class="fv-row">
										<!--begin::Label-->
										<label class="required form-label">Quantity</label>
										<!--end::Label-->
										<!--begin::Editor-->
										<input class="form-control" min="0" type="number" name="product_quantity" rows="4" placeholder="Product quantity"/>
										<!--end::Editor-->
										<!--begin::Description-->
										<div class="text-muted fs-7">Enter the product quantity.</div>
										<!--end::Description-->
									</div>
									<!--end::Input group-->
								</div>
								<!--end::Card header-->
							</div>
							<!--end::General options-->
							<!--begin::Media-->
							<div class="card card-flush py-4">
								<!--begin::Card header-->
								<div class="card-header">
									<div class="card-title">
										<h2>Preview</h2>
									</div>
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-6 ms-6" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-120px h-120px"></div>
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="subImages[]" accept=".png, .jpg, .jpeg" />
											<input type="hidden" name="subImage_removes[]" />
											<!--end::Inputs-->
										</label>
										<!--end::Label-->
										<!--begin::Cancel-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
										<!--begin::Remove-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Remove-->
									</div>
									<!--end::Image input-->
									<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-6 ms-6" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-120px h-120px"></div>
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="subImages[]" accept=".png, .jpg, .jpeg" />
											<input type="hidden" name="subImage_removes[]" />
											<!--end::Inputs-->
										</label>
										<!--end::Label-->
										<!--begin::Cancel-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
										<!--begin::Remove-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Remove-->
									</div>
									<!--end::Image input-->
									<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-6 ms-6" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-120px h-120px"></div>
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="subImages[]" accept=".png, .jpg, .jpeg" />
											<input type="hidden" name="subImage_removes[]" />
											<!--end::Inputs-->
										</label>
										<!--end::Label-->
										<!--begin::Cancel-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
										<!--begin::Remove-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Remove-->
									</div>
									<!--end::Image input-->
									<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-6 ms-6" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-120px h-120px"></div>
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="subImages[]" accept=".png, .jpg, .jpeg" />
											<input type="hidden" name="subImage_removes[]" />
											<!--end::Inputs-->
										</label>
										<!--end::Label-->
										<!--begin::Cancel-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
										<!--begin::Remove-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Remove-->
									</div>
									<!--end::Image input-->
									<!--end::Image input-->
									<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-6 ms-6" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-120px h-120px"></div>
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="subImages[]" accept=".png, .jpg, .jpeg" />
											<input type="hidden" name="subImage_removes[]" />
											<!--end::Inputs-->
										</label>
										<!--end::Label-->
										<!--begin::Cancel-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
										<!--begin::Remove-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Remove-->
									</div>
									<!--end::Image input-->
								</div>
								<!--end::Card header-->
							</div>
							<!--end::Media-->
							<!--begin::Pricing-->
							
							<!--end::Pricing-->
						</div>
					</div>
					<!--end::Tab pane-->
				</div>
				<!--end::Tab content-->
				<div class="d-flex justify-content-end">
					<!--begin::Button-->
					<a href="/admin/catalog/products" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
					<!--end::Button-->
					<!--begin::Button-->
					<button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
						<span class="indicator-label">Save Changes</span>
						<span class="indicator-progress">Please wait...
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

@section('modals')

@endsection

@section('scripts')
@parent
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="{{asset('admin/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/jquery-minicolors.min.js')}}"></script>
	<!--end::Vendors Javascript-->
	
	<script>
		var KTAppEcommerceSaveProduct = function(){

			return{
				init:function(){
					(()=>{
						$('#my-add-color').click(function(){
							var color = $('#hue').val();
							var t = $('<li style="background-color: '+color+'"><span><span style="opacity:0;padding: 5px" class="svg-icon svg-icon-primary svg-icon-2x"> <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Home/Trash.svg--> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#ffffff" fill-rule="nonzero"/> <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#ffffff" opacity="0.9"/> </g> </svg><!--end::Svg Icon--></span></span><input type="hidden" name="product_colors[]" value="'+color+'"></li>')
							t.click(function(){
								t.remove();
							}).mouseover(function(){
								t.find('.svg-icon').css('opacity', 1);
							}).mouseout(function(){
								t.find('.svg-icon').css('opacity', 0);
							})
							
							$('.color-checker ul').append(t);
						})
						$('#product_sizes li').click(function(){
							var en = true;
							if($(this).attr('select')=='true')
							{
								$(this).attr('select',false);
								$(this).css('border-width', '1px');
								$(this).css('border-color', '#ccc');
								en=false;
							}
							else
							{
								$(this).attr('select',true);
								$(this).css('border-width', '2px');
								$(this).css('border-color', '#2c9aff');
								en=true;
							}
							var o = $(this).find('input');
							if(en)
							o.val(o.attr('data-value'));
							else
							o.val('');
						})
					})(),
					(()=>{
						const t=document.querySelector('#kt_ecommerce_add_product_colors');

						t&&new Tagify(t,
						{

							whitelist:["Red",
							"Blue",
							"Green",
							"Black",
							"Yello"],
							dropdown:{

								maxItems:20,
								classname:"tagify__inline__suggestions",
								enabled:0,
								closeOnSelect:!1

							}

						})
					})(),
					(()=>{
						const t=document.querySelector('#kt_ecommerce_add_product_sizes');

						t&&new Tagify(t,
						{

							whitelist:["Small",
							"Medium",
							"Large"],
							dropdown:{

								maxItems:20,
								classname:"tagify__inline__suggestions",
								enabled:0,
								closeOnSelect:!1

							}

						})
					})(),
					(()=>{

						let e;

						const t=document.getElementById("kt_ecommerce_add_product_form"),
						o=document.getElementById("kt_ecommerce_add_product_submit");

						e=FormValidation.formValidation(t,
						{

							fields:{
								product_name:{

									validators:{

										notEmpty:{

											message:"Product name is required"

										}

									}

								},
								product_description:{

									validators:{

										notEmpty:{

											message:"Product description is required"

										}

									}

								},
								product_quantity:{

									validators:{

										notEmpty:{

											message:"Product quantity is required"

										}

									}

								},
								product_category:{

									validators:{

										notEmpty:{

											message:"Product category is required"

										}

									}

								},
								product_price:{

									validators:{

										notEmpty:{

											message:"Product price is required"

										}

									}

								},
								mainImage:{

									validators:{

										notEmpty:{

											message:"Product thumbnail is required"

										}

									}

								}

							},
							plugins:{

								trigger:new FormValidation.plugins.Trigger,
								bootstrap:new FormValidation.plugins.Bootstrap5({

									rowSelector:".fv-row",
									eleInvalidClass:"",
									eleValidClass:""

								})

							}

						}),
						o.addEventListener("click",
							(a=>{

								a.preventDefault(),
								e&&e.validate().then((function(e){

									console.log("validated!"),
									"Valid"==e?(
										o.setAttribute("data-kt-indicator",
										"on"),
									console.log($(t).serialize()),
									$.ajax({
											type: 'POST',
											url:"/api/catalog/add-product",
											data: new FormData(t),
											processData: false, 
											contentType: false, 
											success: function(data) {
												o.removeAttribute("data-kt-indicator"),
												o.disabled=!1,
												Swal.fire({

													text:"Form has been successfully submitted!",
													icon:"success",
													buttonsStyling:!1,
													confirmButtonText:"Ok, got it!",
													customClass:{

														confirmButton:"btn btn-primary"

													}

												}).then((function(e){

													e.isConfirmed&&(o.disabled=!1,
														window.location=t.getAttribute("data-kt-redirect"))

												}))
											},
											error: function(request, status, error){
												console.log(error)
												o.removeAttribute("data-kt-indicator"),
												o.disabled=!1,
												Swal.fire({

													html:"Sorry, looks like there are some errors detected, please try again. <br/><br/>Please note that there may be errors in the <strong>General</strong> or <strong>Advanced</strong> tabs",
													icon:"error",
													buttonsStyling:!1,
													confirmButtonText:"Ok, got it!",
													customClass:{

														confirmButton:"btn btn-primary"

													}

												})
											}
									})):(
										o.removeAttribute("data-kt-indicator"),
										Swal.fire({

										html:"Sorry, looks like there are some errors detected, please try again. <br/><br/>Please note that there may be errors in the <strong>General</strong> or <strong>Advanced</strong> tabs",
										icon:"error",
										buttonsStyling:!1,
										confirmButtonText:"Ok, got it!",
										customClass:{

											confirmButton:"btn btn-primary"

										}

										})
									)
								}))

							}))

						})()
				}
			}
		}();
		var ComponentsColorPickers = function() {
			var t = function() {
				jQuery().colorpicker && ($(".colorpicker-default").colorpicker({
					format: "hex"
				}),
				$(".colorpicker-rgba").colorpicker())
			}
			, o = function() {
				$(".demo").each(function() {
					$(this).minicolors({
						control: $(this).attr("data-control") || "hue",
						defaultValue: $(this).attr("data-defaultValue") || "",
						inline: "true" === $(this).attr("data-inline"),
						letterCase: $(this).attr("data-letterCase") || "lowercase",
						opacity: $(this).attr("data-opacity"),
						position: $(this).attr("data-position") || "bottom left",
						change: function(t, o) {
							t && (o && (t += ", " + o),
							"object" == typeof console && console.log(t))
						},
						theme: "bootstrap"
					})
				})
			};
			return {
				init: function() {
					o(),
					t()
				}
			}
		}();

		KTUtil.onDOMContentLoaded((function(){
		ComponentsColorPickers.init()
		KTAppEcommerceSaveProduct.init()
		}));
	</script>

@endsection