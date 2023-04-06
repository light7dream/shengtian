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
							<h2>密码设置</h2>
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
							<!--begin::Input group-->
							<div class="col-md-4 col-sm-12">
							<div class="mb-10 fv-row">
								<label class="required form-label">当前密码</label>
								<input type="text" name="current_password" class="form-control mb-2" placeholder="Current Password" id='current_password' />
							</div>
							</div>
							<div class="col-md-4 col-sm-12">
							<div class="mb-10 fv-row">
								<label class="required form-label">新密码</label>
								<input name="new_password" class="form-control mb-2" placeholder="新密码"  id='new_password'>
							</div>	
							</div>	
							<div class="col-md-4 col-sm-12">
								<div class="mb-10 fv-row">
									<label class="required form-label">确认密码</label>
									<input name="password_confirm" class="form-control mb-2" placeholder="确认密码"  id='password_confirm'>
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
								current_password:{
									validators:{
										notEmpty:{
											message:"需要当前密码"
										}
									}
								},
								new_password:{
									validators:{
										notEmpty:{
											message:"需要新密码"
										}
									}
								},
								password_confirm:{
									validators:{
										notEmpty:{
											message:"需要密码确认"
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
									if($("#password_confirm").val() != $("#new_password").val()){
										Swal.fire({text:"密码确认必须与新密码相同！",icon:"error",buttonsStyling:!1,confirmButtonText:"好的，我知道了！",
												customClass:{confirmButton:"btn btn-primary"}
											})
									}
									else
									$.ajax({
										type: 'POST',
										url:"/api/admin/edit-password",
										data: formData,
										processData: false, 
										contentType: false, 
										success: function(data) {
                                          if(!data)
										  {
											Swal.fire({text:"当前密码不正确！",icon:"error",buttonsStyling:!1,confirmButtonText:"好的，我知道了！",
												customClass:{confirmButton:"btn btn-primary"}
											})
										  }
										  else {
											o.disabled=!1,
											o.removeAttribute("data-kt-indicator"),
											Swal.fire({text:"表格已成功提交！",icon:"success",buttonsStyling:!1,confirmButtonText:"好的，我知道了！",
												customClass:{confirmButton:"btn btn-primary"}
											})
										  }
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