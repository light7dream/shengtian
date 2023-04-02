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
                        <h2 style="text-align: center;">登录</h2>
                        <form action="/api/member/login" method="post">
                            @csrf
                            <p>   
                                <label>账号 <span>*</span></label>
                                <input type="text" name="username">
                             </p>
                             <p>   
                                <label>密码 <span>*</span></label>
                                <input type="password" name="password">
                             </p>   
                            <div class="login_submit">
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    记住密码
                                </label>
                                <button type="submit">登录</button>
                                
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

@endsection