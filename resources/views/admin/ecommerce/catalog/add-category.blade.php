@extends('admin.layout.app')

@section('content')
		<!--begin::Content container -->
		<div id="kt_app_content_container" class="app-container container-xxl">
			<form id="kt_add_category_form" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row" data-kt-redirect="/admin/catalog/categories">
				@csrf
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
						<div class="card-body text-center fv-row pt-0">
							<!--begin::Image input-->
							<!--begin::Image input placeholder-->
							<style>.image-input-placeholder { background-image: url('{{asset("admin/assets/media/svg/files/blank-image.svg")}}'); } [data-theme="dark"] .image-input-placeholder { background-image: url('{{asset("admin/assets/media/svg/files/blank-image-dark.svg")}}'); }</style>
							<!--end::Image input placeholder-->
							<!--begin::Image input-->
							<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
								<!--begin::Preview existing avatar-->
								<div class="image-input-wrapper w-200px h-200px"></div>
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
							<div class="text-muted fs-7">设置类别缩略图。 仅接受 *.png、*.jpg 和 *.jpeg 图像文件</div>
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
							{{-- <div class="card-title">
								<h2>General</h2>
							</div> --}}
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
								<input type="text" name="category_name" class="form-control mb-2" placeholder="分类名称" value="" id='category_name' />
								<!--end::Input-->
								<!--begin::Description-->
								<div class="text-muted fs-7">类别名称为必填项，建议唯一</div>
								<!--end::Description-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div>
								<!--begin::Label-->
								<label class="form-label">描述</label>
								<!--end::Label-->
								<!--begin::Editor-->
								<textarea name="category_description" class="form-control mb-2" placeholder="描述" rows="6" id='category_desc'></textarea>
								{{-- <div id="kt_add_category_description" name="kt_add_category_description" class="min-h-200px mb-2"></div> --}}
								<!--end::Editor-->
								<!--begin::Description-->
								<div class="text-muted fs-7">为类别设置描述以获得更好的可见性</div>
								<!--end::Description-->
							</div>
							<!--end::Input group-->
						</div>
						<!--end::Card header-->
					</div>
					<!--end::General options-->
					<!--begin::Meta options-->
			
					<!--end::Automation-->
					<div class="d-flex justify-content-end">
						<!--begin::Button-->
						<a href="/admin/catalog/categories" id="kt_add_category_cancel" class="btn btn-light me-5">取消</a>
						<!--end::Button-->
						<!--begin::Button-->
						<button type="submit" id="kt_add_category_submit" class="btn btn-primary">
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
		<!--end::Content container-->
@endsection

@section('drawers')
		
@endsection
		<!--begin::Modals-->
@section('modals')
		
@endsection
@section('scripts')
@parent
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{asset('admin/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
		
		<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
	<script>
		
		CKEDITOR.replace('category_desc');
		for (var i in CKEDITOR.instances) {
			CKEDITOR.instances[i].on('change', function() { CKEDITOR.instances[i].updateElement() });
        }
	</script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<!--end::Custom Javascript-->
		<script>
			
			var KTAppEcommerceSaveCategory = function(){
				return{
					init:function(){
						(()=>{
							let e;
							const t=document.getElementById("kt_add_category_form"),
							o=document.getElementById("kt_add_category_submit");
							e=FormValidation.formValidation(t,{
								fields:{
									category_name:{
										validators:{
											notEmpty:{
												message:"需要类别名称"}
											}
										},
									category_image:{
										validators:{
											notEmpty:{
												message:"需要类别图像"}
											}
										}
								},
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
											url:"/api/catalog/add-category",
											data: formData,
											processData: false, 
											contentType: false, 
											success: function(data) {
												o.disabled=!1,
												o.removeAttribute("data-kt-indicator"),
												Swal.fire({text:"表单已成功提交!",icon:"success",buttonsStyling:!1,confirmButtonText:"好的, 我知道了!",
													customClass:{confirmButton:"btn btn-primary"}
												}).then((function(e){
													e.isConfirmed&&(o.disabled=!1,window.location=t.getAttribute("data-kt-redirect"))
												}))
											},
											error: function(request, status, error){
												console.log(error)
												o.disabled=!1,
												Swal.fire({
												text:"抱歉, 似乎检测到一些错误, 请重试.",
												icon:"error",
												buttonsStyling:!1,
												confirmButtonText:"好的, 我知道了!",
												customClass:{
													confirmButton:"btn btn-primary"
												}
											})
											}
										});
									}
									else{

										Swal.fire({
											text:"抱歉, 似乎检测到一些错误, 请重试.",
											icon:"error",
											buttonsStyling:!1,
											confirmButtonText:"好的, 我知道了!",
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