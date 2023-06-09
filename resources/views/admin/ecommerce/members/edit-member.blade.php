@extends('admin.layout.app')


@section('content')
	<div id="kt_app_content_container" class="app-container container-xxl">
		<form id="kt_edit_member_form" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row" data-kt-redirect="/admin/members/">
			@csrf
			<input type='hidden' name="id" value="{{$member->id}}">
			<!--begin::Aside column-->
		
			<!--end::Aside column-->
			<!--begin::Main column-->
			<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
				<!--begin::General options-->
				<div class="card card-flush">
					<!--begin::Card header-->
					<div class="card-header" style="display: flex">
						<div class="card-title">
							<h2>成员</h2>
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
							<div class="col-md-6 col-sm-12">
							<div class="mb-10 fv-row">
								<!--begin::Label-->
								<label class="required form-label">成员名字</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input type="text" name="member_name" class="form-control mb-2" placeholder="成员名字" value="{{$member->name}}" id='member_name' />
								<!--end::Input-->
							</div>
							</div>
							<div class="col-md-6 col-sm-12">
							<div class="mb-10 fv-row">
								<!--begin::Label-->
								<label class="required form-label">密码</label>
								<!--end::Label-->
								<!--begin::Editor-->
								<input type="hidden" name="last_password" class="form-control mb-2" placeholder="密码" value="{{$member->password}}" id='last_password'>
								<input name="member_password" class="form-control mb-2" placeholder="Password" value="{{$member->password}}" id='member_password'>
								<!--end::Editor-->
							</div>	
							</div>	
						</div>	
                        <!--end::Input group-->
						<!--begin::Input group-->
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="mb-10 fv-row">
									<!--begin::Label-->
									<label class="required form-label">创建日期</label>
									<!--end::Label-->
									<!--begin::Editor-->
									<input disabled name="member_created_at" class="form-control mb-2" placeholder="创建日期" value="{{$member->created_at}}" id='member_created_at'></textarea>
									<!--end::编辑-->
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="mb-10 fv-row">
									<!--begin::Label-->
									<label class="required form-label">最后交换日期</label>
									<!--end::Label-->
									<!--begin::Editor-->
									<input disabled name="member_last_exchange_at" class="form-control mb-2" placeholder="最后交换日期" value="{{$member->last_exchange_at}}" id='member_last_exchange_at'></textarea>
									<!--end::编辑-->
								</div>
							</div>
						</div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="mb-10 fv-row">
									<!--begin::Label-->
									<label class="required form-label">总积分</label>
									<!--end::Label-->
									<!--begin::Editor-->
									<input type="number" min="0" name="member_total_points" class="form-control mb-2" placeholder="总积分" value="{{$member->points}}" id='member_total_points'></textarea>
									<!--end::Editor-->
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="mb-10 fv-row">
									<!--begin::Label-->
									<label class="required form-label">二手点</label>
									<!--end::Label-->
									<!--begin::Editor-->
									<input disabled type="number" min="0" max="{{$member->points}}" name="member_used_points" class="form-control mb-2" placeholder="二手点" value="{{$member->orders->sum('total')}}" id='member_used_points'></textarea>
									<!--end::Editor-->
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="mb-10 fv-row">
									<!--begin::Label-->
									<label class="required form-label">仍然是要点</label>
									<!--end::Label-->
									<!--begin::Editor-->
									<input disabled type="number" name="member_remain_points" class="form-control mb-2" placeholder="仍然是要点" value="{{$member->points-$member->orders->sum('total')}}" id='member_remain_points'></textarea>
									<!--end::Editor-->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="d-flex flex-column">
							</div>
							
							<div class="d-flex flex-column">
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

		<div class="row">
			<div class="col-md-4 col-sm-6 mt-7 mb-10" style="display: flex">
				<input type="text" name="member_recharge" class="form-control mb-2" placeholder="充电" value="" id='recharge_amount' />
			</div>
			<div class="col-md-8 col-sm-6 mt-7 mb-10" style="display: flex">
				<button style="padding: 7px!important" type="button" id="recharge_change" class="btn btn-primary">Recharge </button>
			</div>
		</div>
			<div class="row mb-10">
			<div class="col-md-3 col-sm-12">
				<h3>Recharge History</h3>
				@foreach($member->reacharge_histories as $recharge_history)
				 <span>{{$recharge_history->created_at}}</span><span style="margin-left: 10px">{{$recharge_history->charge_points}}</span>
				@endforeach
			</div>
			<div class="col-md-4 col-sm-12">
				<h3>Password Change History</h3>
				@foreach($member->password_change_histories as $password_change_history)
				 <span>{{$password_change_history->created_at}}</span><span style="margin-left: 10px">Change the original password from {{$password_change_history->last_password}} to {{$password_change_history->current_password}}</span>
				@endforeach
			</div>
			<div class="col-md-5 col-sm-12">
				<h3>Exchanged Item History</h3>
				@foreach($member->exchange_histories as $exchange_history)
				 <span>-- {{$exchange_history->created_at}}</span>
				 <span style="margin-left: 10px">Product name :{{$exchange_history->name}}</span>
				 <span style="margin-left: 10px">color : {{$exchange_history->color}}</span>
				 <span style="margin-left: 10px">size : {{$exchange_history->size}}</span>
				 <span style="margin-left: 10px">quantity{{$exchange_history->quantity}}</span>
				 <span style="margin-left: 10px">used points{{$exchange_history->points}}</span>
				@endforeach
			</div>
		</div>
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
								member_name:{
									validators:{
										notEmpty:{
											message:"会员姓名为必填项"
										}
									}
								},
								member_password:{
									validators:{
										notEmpty:{
											message:"需要会员密码"
										}
									}
								},
								member_total_points:{
									validators:{
										notEmpty:{
											message:"会员总积分为必填项"
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
										url:"/api/members/edit-member",
										data: formData,
										processData: false, 
										contentType: false, 
										success: function(data) {
												o.disabled=!1,
											o.removeAttribute("data-kt-indicator"),
											Swal.fire({text:"表单已成功提交！",icon:"success",buttonsStyling:!1,confirmButtonText:"好的，我知道了！",
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
											text:"抱歉，似乎检测到一些错误，请重试。",
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
										text:"抱歉，似乎检测到一些错误，请重试。",
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
						$('#member_used_points').change(function(){
							var total = $('#member_total_points').val();
							var current = $('#member_used_points').val();
							if(current<0){
								$('#member_used_points').val(0);
								$('#member_remain_points').val(total);
								return;
							}
							$('#member_remain_points').val(total-current);
						})
						
						$('#member_total_points').change(function(){
							var total = $('#member_total_points').val();
							var current = $('#member_used_points').val();
							if(total<0){
								$('#member_total_points').val(0);
								$('#member_remain_points').val(0);
								return;
							}
							$('#member_remain_points').val(total-current);
						})

						$("#recharge_change").click(function(){

							$.post('/api/members/recharge',{_token: '{{csrf_token()}}', id:'{{$member->id}}', recharge: $("#recharge_amount").val()})
							.then(function(response){
									Swal.fire({
										text:"充值成功！",
										icon:"success",
										buttonsStyling:!1,
										confirmButtonText:"好的，我知道了！",
										customClass:{
										confirmButton:"btn btn-primary"
										}
									}).then((function(){
										window.location='/admin/members/edit-member/{{$member->id}}'
									}))
							})
							.fail(function(){
								Swal.fire({
									html:"抱歉，看起来有一些错误，请重试。",
									icon:"error",
									buttonsStyling:!1,
									confirmButtonText:"好的，我知道了！",
									customClass:{
										confirmButton:"btn btn-primary"
									}
								})
							})
						})
					})()
				}
			}
		}();
		
		KTUtil.onDOMContentLoaded((function(){KTAppEcommerceSavemember.init()}));
	</script>
@endsection		