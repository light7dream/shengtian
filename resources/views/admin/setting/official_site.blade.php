@extends('admin.layout.app')


@section('content')
	<div id="kt_app_content_container" class="app-container container-xxl">
		<form id="kt_edit_member_form" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row" data-kt-redirect="/admin/members/">
			@csrf
			<input type='hidden' name="id">
			<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
				<!--begin::General options-->
				<div class="card card-flush">
					<!--begin::Card header-->
					<div class="card-header" style="display: flex">
						<div class="card-title">
							<h2>游戏官方网站</h2>
						</div>
						<div class="d-flex justify-content-end" style="margin-top: 5px; height : 50px">
							<!--begin::Button-->
							<a href="javascript:(0);" id="kt_edit_member_reset" class="btn btn-light me-5">重置</a>
							<!--end::Button-->
							<!--begin::Button-->
							<button type="submit" id="kt_edit_member_submit" class="btn btn-primary">
								<span class="indicator-label">节省</span>
								<span class="indicator-progress">请稍等...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<!--end::Button-->
						</div>
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0 row">
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="mb-10 fv-row">
									<label class="required form-label">关联</label>
									<input name="official_site" class="form-control mb-2" placeholder="游戏官方网站链接"  id='official_site' value="{{$official}}">
								</div>	
							</div>	
						</div>	
						</div>
                        <!--end::Input group-->
					</div>
					<!--end::Card header-->
				</div>
				<!--end::General options-->
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
	<script>
		var KTAppEcommerceSavemember = function(){
			return{
				init:function(){
					(()=>{
						let e;
						const t=document.getElementById("kt_edit_member_form"),
						o=document.getElementById("kt_edit_member_submit");
						$('#kt_edit_member_reset').click(function(){
							t.reset();
						})
						e=FormValidation.formValidation(t,{
							fields:{
								official_site:{
									validators:{
										notEmpty:{
											message:"需要链接"
										}
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
										url:"/api/admin/edit-game-official-site",
										data: formData,
										processData: false, 
										contentType: false, 
										success: function(data) {
											o.disabled=!1,
											o.removeAttribute("data-kt-indicator"),
											Swal.fire({text:"链接已成功更新！",icon:"success",buttonsStyling:!1,confirmButtonText:"好的，我知道了！",
												customClass:{confirmButton:"btn btn-primary"}
											})
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
										confirmButtonText:"好的，我知道了！",
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
		
		KTUtil.onDOMContentLoaded((function(){KTAppEcommerceSavemember.init()}));
	</script>
@endsection		