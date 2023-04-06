@extends('admin.layout.app')


@section('content')
	<div id="kt_app_content_container" class="app-container container-xxl">
		<form id="kt_edit_category_form" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row" data-kt-redirect="/admin/catalog/categories">
			@csrf
			<input type='hidden' name="id" value="{{$category->id}}">
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
						<!--begin::Image input-->
						<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
							<!--begin::Preview existing avatar-->
							<div class="image-input-wrapper w-150px h-150px" style="background-image: url({{url('/storage/uploads/catalog/categories/'.$category->id.'/main.png')}})"></div>
							<!--end::Preview existing avatar-->
							<!--begin::Label-->
							<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
								<!--begin::Icon-->
								<i class="bi bi-pencil-fill fs-7"></i>
								<!--end::Icon-->
								<!--begin::Inputs-->
								<input type="file" name="category_image" accept=".png, .jpg, .jpeg" />
								<input type="hidden" name="image_remove" />
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
						<div class="text-muted fs-7">设置类别缩略图图像。仅 *.png， *.jpg和 *.jpeg映像文件被接受</div>
						<!--end::Description-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Thumbnail settings-->
			</div>
			<!--end::Aside column-->
			<!--begin::Main column-->
			<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
				<!--begin::General options-->
				<div class="card card-flush py-4">
					<!--begin::Card header-->
					<div class="card-header">
						<div class="card-title">
							<h2>一般的</h2>
						</div>
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<!--begin::Input group-->
						<div class="mb-10 fv-row">
							<!--begin::Label-->
							<label class="required form-label">分类名称</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" name="category_name" class="form-control mb-2" placeholder="分类名称" value="{{$category->name}}" />
							<!--end::Input-->
							<!--begin::Description-->
							<div class="text-muted fs-7">需要一个类别名称，并建议是唯一的。</div>
							<!--end::Description-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div>
							<!--begin::Label-->
							<label class="form-label">描述</label>
							<!--end::Label-->
							<!--begin::Editor-->
							<textarea name="category_description" class="form-control mb-2" placeholder="描述" rows="6" id='category_desc' value="Hi">{!!$category->description!!}</textarea>
							{{-- <div id="kt_add_category_description" name="kt_add_category_description" class="min-h-200px mb-2"></div> --}}
							<!--end::Editor-->
							<!--begin::Description-->
							<div class="text-muted fs-7">将描述设置为类别以提高可见性。</div>
							<!--end::Description-->
						</div>
						<!--end::Input group-->
					</div>
					<!--end::Card header-->
				</div>
				<!--end::General options-->
				<div class="d-flex justify-content-end">
					<!--begin::Button-->
					<a href="/admin/catalog/categories" id="kt_add_product_cancel" class="btn btn-light me-5">取消</a>
					<!--end::Button-->
					<!--begin::Button-->
					<button type="submit" id="kt_edit_category_submit" class="btn btn-primary">
						<span class="indicator-label">节省</span>
						<span class="indicator-progress">请稍等...
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
					</button>
					<!--end::Button-->
				</div>
			</div> 
			<!--end::Main column-->
		</form>
	</div>
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
	<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
	<script>
		CKEDITOR.replace('category_desc');
		for (var i in CKEDITOR.instances) {
			CKEDITOR.instances[i].on('change', function() { CKEDITOR.instances[i].updateElement() });
        }
	</script>
	<script>
		var KTAppEcommerceSaveCategory = function(){
			return{
				init:function(){
					(()=>{
						let e;
						const t=document.getElementById("kt_edit_category_form"),
						o=document.getElementById("kt_edit_category_submit");
						e=FormValidation.formValidation(t,{fields:{category_name:{validators:{notEmpty:{message:"需要类别名称"}}}},
						plugins:{
							trigger:new FormValidation.plugins.Trigger,
							bootstrap:new FormValidation.plugins.Bootstrap5({
								rowSelector:".fv-row",
								eleInvalidClass:"",
								eleValidClass:""})
						}
						}),
						t.addEventListener("submit", a=>{
							a.preventDefault();
							e&&e.validate().then(function(e_){
								if(e_=="Valid"){
									var formData= new FormData(t);
									$.ajax({
										type: 'POST',
										url:"/api/catalog/edit-category",
										data: formData,
										processData: false, 
										contentType: false, 
										success: function(data) {
												o.disabled=!1,
											o.removeAttribute("data-kt-indicator"),
											Swal.fire({text:"表格已成功提交！",icon:"success",buttonsStyling:!1,confirmButtonText:"好的，我知道了！",
												customClass:{confirmButton:"btn btn-primary"}
											}).then((function(e){
												e.isConfirmed&&(o.disabled=!1,window.location=t.getAttribute("data-kt-redirect"))
											}))
										},
										error: function(request, status, error){
											console.log(error)
												o.disabled=!1,
											o.removeAttribute("data-kt-indicator"),
											Swal.fire({
											text:"抱歉，看起来有一些错误，请重试。",
											icon:"error",
											buttonsStyling:!1,
											confirmButtonText:"好的，我知道了！",
											customClass:{
												confirmButton:"btn btn-primary"
											}
										})
										}
									});
								}
								else{

									o.removeAttribute("data-kt-indicator"),
									Swal.fire({
										text:"抱歉，看起来有一些错误，请重试。",
										icon:"error",
										buttonsStyling:!1,
										confirmButtonText:"好的，我知道了！
										customClass:{
												confirmButton:"btn btn-primary"
										}
									})	
								}
							})
						})
					})()
				}
			}
		}();
		
		KTUtil.onDOMContentLoaded((function(){KTAppEcommerceSaveCategory.init()}));
	</script>
@endsection		