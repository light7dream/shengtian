@extends('admin.layout.app')
@section('styles')
@parent
<link href="{{asset('admin/assets/css/jquery-minicolors.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/css/color-picker.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-xxl">
		<!--begin::Form-->
		<form id="kt_ecommerce_edit_product_form" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row" data-kt-redirect="/admin/catalog/products">
			@csrf
			<input type="hidden" value="{{$product->id}}" name="id">
			<!--begin::Aside column-->
			<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
				<!--begin::Thumbnail settings-->
				<div class="card card-flush py-4">
					<!--begin::Card header-->
					<div class="card-header">
						<!--begin::Card title-->
						<div class="card-title required">
							<h2>缩略图</h2>
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
							<div class="image-input-wrapper w-150px h-150px"  style="background-image: url({{url('/storage/uploads/catalog/products/'.$product->id.'/main.png')}})"></div>
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
						<div class="text-muted fs-7">设置产品缩略图图像。仅 *.png， *.jpg和 *.jpeg映像文件被接受</div>
						<!--end::Description-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Thumbnail settings-->
				<!--begin::Status-->
				
				<!--end::Status-->
				<!--begin::Category & tags-->
				<div class="card card-flush py-4" id="details">
					<!--begin::Card header-->
					<div class="card-header">
						<!--begin::Card title-->
						<div class="card-title">
							<h2>产品详情</h2>
						</div>
						<!--end::Card title-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						
						{{-- <!--begin::Button-->
						<a href="/admin/catalog/add-category" class="btn btn-light-primary btn-sm mb-10">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
						<span class="svg-icon svg-icon-2">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
								<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->Create new category</a> --}}
						<!--end::Button-->
						
						<div class="fv-row mb-2">
							<!--begin::Input group-->
							<!--begin::Label-->
							<label class="form-label d-block">颜色</label>
							<!--end::Label-->
							<!--begin::Input-->
							<style> 
								.color-checker ul li {display: inline-block; margin: 2px;transition: all 0.1s ease 0s;cursor: pointer;} 
								.color-checker ul li span {display: block;} 
								.color-checker ul li input{display: none;}
								.color-checker ul li span:hover{background-color: rgba(0,0,0,0.6);}
							</style>
							<div class="color-checker row mt-3">
								<ul>
									@foreach ($product->colors as $color)
										<li style="background-color: {{$color}}"><span><span style="opacity:0;padding: 5px" class="svg-icon svg-icon-primary svg-icon-2x"> <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Home/Trash.svg--> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#ffffff" fill-rule="nonzero"/> <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#ffffff" opacity="0.9"/> </g> </svg><!--end::Svg Icon--></span></span><input type="hidden" name="product_colors[]" value="{{$color}}"></li>
									@endforeach
								</ul>
							</div>
							<!--begin::Input-->
							<div class="d-flex">
								<div class="col-md-9 col-sm-9">
									<input type="text" id="hue" class="demo mb-3 form-control" data-control="hue" value="#ff0000">
								</div>
								<div class="col-md-2 col-sm-3 ms-1 mt-1">
								<a href="#" class="btn btn-light-primary btn-sm mb-7" id="my-add-color">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
										<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
									</svg>
								</a>
								</div>
							</div>
							
							<!--end::Input-->
							<!--begin::Description-->
							<div class="text-muted fs-7">为产品添加颜色。</div>
							<!--end::Description-->
							<!--end::Input group-->
						</div>
						<div class="fv-row mb-2">
							<!--begin::Input group-->
							<!--begin::Label-->
							<label class="form-label d-block">尺寸</label>
							<!--end::Label-->
							<!--begin::Input-->
							<style> 
								.size-picker ul li {display: inline-block; border: 1px solid #ccc; margin: 3px;transition: all 0.1s ease 0s;cursor: pointer;} 
								.size-picker ul li span {display: flex; align-items: center;} 
								.size-picker ul li span span {margin: 4px;} 
								.size-picker ul li input{display: none;}
								.size-picker ul li:hover{background-color: rgba(0,50,250,0.3);}
							</style>
							<div class="size-picker" id="product_sizes">
							<ul>
								<li @foreach($product->sizes as $size) @if($size=='Small') {{"select = true"}} @break @endif @endforeach class="black"><span><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
										<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"/>
									</g>
								</svg><!--end::Svg Icon--></span></span><input type="hidden" data-value="Small" name="product_sizes[]" value=""></a></li>
								<li @foreach($product->sizes as $size) @if($size=='Medium') {{"select = true"}} @break @endif @endforeach class="gray"><span><span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
										<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"/>
									</g>
								</svg><!--end::Svg Icon--></span></span><input type="hidden" data-value="Medium"  name="product_sizes[]" value=""></li>
								<li @foreach($product->sizes as $size) @if($size=='Large') {{"select = true"}} @break @endif @endforeach class="red"><span><span class="svg-icon svg-icon-primary svg-icon-4x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
							<div class="text-muted fs-7">将尺寸添加到产品中。</div>
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
						{{-- <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_edit_product_general">General</a> --}}
					</li>
					<!--end:::Tab item-->
				</ul>
				<!--end:::Tabs-->
				<!--begin::Tab content-->
				<div class="tab-content">
					<!--begin::Tab pane-->
					<div class="tab-pane fade show active" id="kt_ecommerce_edit_product_general" role="tab-panel">
						<div class="d-flex flex-column gap-7 gap-lg-10">
							<!--begin::General options-->
							<div class="card card-flush py-4">
								<!--begin::Card header-->
								<div class="card-header">
									{{-- <div class="card-title"> --}}
										{{-- <h2>General</h2> --}}
									{{-- </div> --}}
									<div class="d-flex flex-stack">
									</div>
									<div class="d-flex checkbox-inline">
										<div class="form-check form-check-lg form-check-custom form-check-outline mt-3 form-label">
											<input class="form-check-input" name="virtual" type="checkbox" value="1" id="virtual"> <label class="ms-2 fs-3">虚拟商品</label>
										</div>
									</div>
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<!--begin::Input group-->
									<div class="mb-10 fv-row">
										<!--begin::Label-->
										<label class="required form-label">产品名称</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text" name="product_name" class="form-control mb-2" placeholder="Product name" value="{{$product->name}}" />
										<!--end::Input-->
										<!--begin::Description-->
										<div class="text-muted fs-7">需要产品名称并建议独特。</div>
										<!--end::Description-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row">
										<!--begin::Label-->
										<label class="required form-label">描述</label>
										<!--end::Label-->
										<!--begin::Editor-->
										<textarea class="form-control" name="product_description" rows="4" placeholder="Product description" id="product_description">{!!$product->description!!}</textarea>
										<!--end::Editor-->
										<!--begin::Description-->
										<div class="text-muted fs-7">为产品设置描述以提高可见度。</div>
										<!--end::Description-->
									</div>
									<!--end::Input group-->
									<div class="fv-row  mb-7">
										<!--begin::Input group-->
										<!--begin::Label-->
										<label class="required form-label">类别</label>
										<!--end::Label-->
										<!--begin::Select2-->
										<select class="form-select mb-2" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="product_category" value="{{$product->category}}">
											<option></option>
											@foreach ($categories as $category)
											<option value="{{$category->id}}" {{$category->id==$product->category->id?'selected="selected"':''}}">{{$category->name}}</option>
											@endforeach
										</select>
										<!--end::Select2-->
										<!--begin::Description-->
										<div class="text-muted fs-7">将产品添加到类别中。</div>
										<!--end::Description-->
										<!--end::Input group-->
									</div>
									<div class="fv-row mb-2">
										<!--begin::Input group-->
										<!--begin::Label-->
										<label class="required form-label d-block">价钱</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input name="product_price" class="form-control mb-2" value="{{$product->points}}" type="number" />
										<!--end::Input-->
										<!--begin::Description-->
										<div class="text-muted fs-7">输入产品的价格。</div>
										<!--end::Description-->
										<!--end::Input group-->
									</div>
									<!--begin::Input group-->
									<div class="fv-row">
										<!--begin::Label-->
										<label class="required form-label">数量</label>
										<!--end::Label-->
										<!--begin::Editor-->
										<input class="form-control" type="number" name="product_quantity" min="0" value="{{$product->quantity}}" placeholder="Product quantity"/>
										<!--end::Editor-->
										<!--begin::Description-->
										<div class="text-muted fs-7">输入产品数量。</div>
										<!--end::Description-->
									</div>
									<!--end::Input group-->
								</div>
								<!--end::Card header-->
							</div>
							<!--end::General options-->
							<!--begin::Media-->
							<div class="card card-flush py-4" id="preview">
								<!--begin::Card header-->
								<div class="card-header">
									<div class="card-title">
										<h2>预览</h2>
									</div>
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<div class="image-input {{file_exists('/storage/uploads/catalog/products/'.$product->id.'/sub0.png')?'':'image-input-empty'}} image-input-outline image-input-placeholder mb-8 ms-6" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-120px h-120px" style="background-image: url({{url('/storage/uploads/catalog/products/'.$product->id.'/sub0.png')}})"></div>
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
									<div class="image-input {{file_exists('/storage/uploads/catalog/products/'.$product->id.'/sub1.png')?'':'image-input-empty'}} image-input-outline image-input-placeholder mb-8 ms-6" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-120px h-120px"  style="background-image: url({{url('/storage/uploads/catalog/products/'.$product->id.'/sub1.png')}})"></div>
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
									<div class="image-input  {{file_exists('/storage/uploads/catalog/products/'.$product->id.'/sub2.png')?'':'image-input-empty'}}  image-input-outline image-input-placeholder mb-8 ms-6" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-120px h-120px"  style="background-image: url({{url('/storage/uploads/catalog/products/'.$product->id.'/sub2.png')}})"></div>
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
									<div class="image-input  {{file_exists('/storage/uploads/catalog/products/'.$product->id.'/sub3.png')?'':'image-input-empty'}}  image-input-outline image-input-placeholder mb-8 ms-6" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-120px h-120px"  style="background-image: url({{url('uploads/catalog/products/'.$product->id.'/sub3.png')}})"></div>
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
									<div class="image-input  {{file_exists('/storage/uploads/catalog/products/'.$product->id.'/sub4.png')?'':'image-input-empty'}}  image-input-outline image-input-placeholder mb-8 ms-6" data-kt-image-input="true">
										<!--begin::Preview existing avatar-->
										<div class="image-input-wrapper w-120px h-120px"  style="background-image: url({{url('/storage/uploads/catalog/products/'.$product->id.'/sub4.png')}})"></div>
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
					<a href="/admin/catalog/products" id="kt_ecommerce_edit_product_cancel" class="btn btn-light me-5">取消</a>
					<!--end::Button-->
					<!--begin::Button-->
					<button type="submit" id="kt_ecommerce_edit_product_submit" class="btn btn-primary">
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

@section('modals')

@endsection

@section('scripts')
@parent
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="{{asset('admin/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
	<!--end::Vendors Javascript-->
	<script src="{{asset('admin/assets/js/custom/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom/jquery-minicolors.min.js')}}"></script>
	<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
	<script>

		CKEDITOR.replace('product_description');
		for (var i in CKEDITOR.instances) {
			CKEDITOR.instances[i].on('change', function() { CKEDITOR.instances[i].updateElement() });
        }
	</script>
	<script>
		var KTAppEcommerceSaveProduct = function(){

			return{
				init:function(){
					(()=>{
						$('.color-checker ul li')
							.click(function(){
								$(this).remove();
							})	
							.mouseover(function(){
								$(this).find('.svg-icon').css('opacity', 1);
							}).mouseout(function(){
								$(this).find('.svg-icon').css('opacity', 0);
							})
						$('#product_sizes > ul li').map((id, el) => {
							if($(el).attr('select')=='true'){
								$(el).css('border-width', '2px');
								$(el).css('border-color', '#2c9aff');
								var o = $(el).find('input');
								o.val(o.attr('data-value'));
							}
						});
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
							o.val(null);
						})
					})(),
					(()=>{
						const t=document.querySelector('#kt_ecommerce_edit_product_colors');

						t&&new Tagify(t,
						{

							whitelist:[
							"Black",
							"Gray",
							"Red",
							"Black",
							"Yello"],
							dropdown:{
								maxItems:20,
								classname:"tagify__inline__suggestions",
								enabled:1,
								closeOnSelect:!1

							}

						})
					})(),
					(()=>{
						const t=document.querySelector('#kt_ecommerce_edit_product_sizes');

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

						const t=document.getElementById("kt_ecommerce_edit_product_form"),
						o=document.getElementById("kt_ecommerce_edit_product_submit");

						e=FormValidation.formValidation(t,
						{

							fields:{
								// product_name:{

								// 	validators:{

								// 		notEmpty:{

								// 			message:"Product name is required"

								// 		}

								// 	}

								// },
								// product_description:{

								// 	validators:{

								// 		notEmpty:{

								// 			message:"Product description is required"

								// 		}

								// 	}

								// },
								// product_category:{

								// 	validators:{

								// 		notEmpty:{

								// 			message:"Product category is required"

								// 		}

								// 	}

								// },
								// product_price:{

								// 	validators:{

								// 		notEmpty:{

								// 			message:"Product price is required"

								// 		}

								// 	}

								// },
								// mainImage:{

								// 	validators:{

								// 		notEmpty:{

								// 			message:"Product thumbnail is required"

								// 		}

								// 	}

								// }
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
									if(document.querySelector('input[name="mainImage_remove"]').value==1)
									{
										Swal.fire({

										html:"抱歉，缩略图是空的，请重试。",
										icon:"error",
										buttonsStyling:!1,
										confirmButtonText:"好的，我知道了！",
										customClass:{

											confirmButton:"btn btn-primary"

										}

										})
										return;
									}

									"Valid"==e?(
										o.setAttribute("data-kt-indicator",
										"on"),
									o.disabled=!0,
									$.ajax({
											type: 'POST',
											url:"/api/catalog/edit-product",
											data: new FormData(t),
											processData: false, 
											contentType: false, 
											success: function(data) {
												o.removeAttribute("data-kt-indicator"),
												o.disabled=!1,

												Swal.fire({

													text:"表格已成功提交！",
													icon:"success",
													buttonsStyling:!1,
													confirmButtonText:"好的，我知道了！",
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
												o.disabled=!1,
												Swal.fire({

													html:"抱歉，看起来有一些错误，请重试。",
													icon:"error",
													buttonsStyling:!1,
													confirmButtonText:"好的，我知道了！",
													customClass:{

														confirmButton:"btn btn-primary"

													}

												})
											}
									})):Swal.fire({

										html:"抱歉，看起来有一些错误，请重试。",
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
<script>
	if(Number({{$product->virtual}})){
		$('#details').hide();
		$('#preview').hide();
		$('#virtual').attr('checked','"checked"');
	}
	$('#virtual').change(function(){
		if(this.checked){
			$('#details').hide();
			$('#preview').hide();
		}else{
			$('#details').show();
			$('#preview').show();
		}
	})
</script>
@endsection