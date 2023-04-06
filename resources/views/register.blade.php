@extends('layout.app')

@section('styles')
@parent
<style>
    p{line-height: 18px;}
</style>
@endsection

@section('content')
  
    <!-- customer login start -->
    <div class="customer_login" style="min-height:65%">
        <div class="container">
            <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6" style="margin: 8px auto;">
                    <div class="account_form">
                        <h2 style="text-align: center;">登记</h2>
                        <form action="/api/member/register" method="post" id="register_form">
                            @csrf
                            <p>   
                                <label>账号 <span>*</span></label>
                                <input type="text" name="username" required>
                                <p style="color: #fe0000"></p>
                            </p>
                             <p>   
                                <label>密码 <span>*</span></label>
                                <input type="password" name="password" required>
                                <p style="color: #fe0000"></p>
                             </p>   
                             <p>   
                                <label>确认密码 <span>*</span></label>
                                <input type="password" name="confirm_password" required>
                                <p style="color: #fe0000"></p>
                            </p>   
                            <div class="login_submit">
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    记住密码
                                </label>
                                <button type="submit" id="register_btn">确认</button>
                                
                            </div>

                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
           
                <!--register area end-->
            </div>
        </div>    
    </div>
    <!-- customer login end -->  

    
@endsection

@section('scripts')
@parent
<script>
$('#register_btn').click(function(e){
    e.preventDefault();
    var usn = $('input[name="username"]').val();
    if(!usn && usn.length==0){
        $('input[name="username"]').parent().next().text("您必须输入名称");
    }
    var en = $('input[name="password"]').val()===$('input[name="confirm_password"]').val() && $('input[name="password"]').val()
    if(en)
        $('#register_form').submit();
    else {
        $('input[name="password"]').parent().next().text("请输入正确的密码");
        $('input[name="confirm_password"]').parent().next().text("请输入正确的密码");
    }
})  
</script>
@endsection