@section('topbar')

<style>
    .goog-te-menu-frame,.goog-te-balloon-frame{
        box-shadow:none!important
        }
    .goog-te-gadget-simple{
        background-color:transparent;
        border:2px solid #eee;
        border-radius:5px;
        padding:5px 10px;
        box-shadow:0 2px 10px -7px rgba(0,0,0,0.2);
        font-size:0;
        }
        .goog-te-gadget-icon{
            display: none;
        }
    </style>
   
    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">
                
    </div>
    <div class="offcanvas_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" style="">
                    <div class="header_account-list  mini_cart_wrapper" style="width: 60px;float: right;">
                        <a href="javascript:void(0)" style="position:relative;top:35px;"><i class="icon icon-FullShoppingCart" ></i><span class="item_count">{{count($carts)}}</span></a>
                         <!--mini cart-->
                         <div class="mini_cart">
                            @php
                                $total = 0;
                                @endphp
                             <div class="cart_gallery">
                                @foreach ($carts as $cart)
                                <div class="cart_item">
                                    <div class="cart_img">
                                        <a href="#"><img src="{{url('/storage/uploads/catalog/products/'.$cart->product->id.'/main.png')}}" alt=""></a>
                                    </div>
                                    <div class="cart_info">
                                        <a href="#">{{$cart->product->name}}</a>
                                        <p>{{$cart->quantity}}x <span> {{$cart->product->points}} </span></p>    
                                    </div>
                                    <div class="cart_remove">
                                        <form action="/api/delete-cart" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$cart->id}}" name="id">
                                        </form>
                                        <a href="#"><i class="ion-ios-close-outline"></i></a>
                                    </div>
                                </div>
                               @php
                                   $total+=$cart->quantity*$cart->product->points;
                               @endphp
                            @endforeach
                             </div>
                             <div class="mini_cart_table">
                                 <div class="cart_table_border">
                                     
                                     <div class="cart_total mt-15 mb-15" >
                                         <span>总计:</span>
                                         <span class="price">{{$total}}</span>
                                     </div>
                                 </div>
                             </div>
                             <div class="mini_cart_footer">
                                <div class="cart_button">
                                     <a href="/cart"><i class="fa fa-shopping-cart"></i> 去购物车</a>
                                 </div>
                                

                             </div>
                         </div>
                         <!--mini cart end-->
                    </div>
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                      
                    </div>
                   
                    
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>  
                        </div>
                        <div  class="text-left mb-30">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children">
                                    @if (Session::has('user'))
                                    <a href="/mine" style="font-size: 14px;"><i class="icon icon-User"style="margin-right:10px"></i>{{Session::get('user')->user_name}}</a>
                                    @else
                                    <a href="/mine" style="font-size: 14px;"><i class="icon icon-User"style="margin-right:10px"></i>Account</a>
                                    @endif
                                </li>
                                <li class="menu-item-has-children ">
                                    @if (Session::has('user'))
                                            <h3><i class="icon icon-User"style="margin-right:10px"></i>{{Session::get('user')->user_name}}</h3>
                                        <ul>
                                            <li><a href="#">我的积分  <span style="float: right;">{{$total_points}}</span></a></li>
                                            <li><a href="#">已用积分  <span style="float: right;">{{$used_points}}</span></a></li>
                                            <li><a href="#">剩余积分  <span style="float: right;">{{$total_points-$used_points}}</span></a></li>
                                        </ul>
                                        @endif
                                </li>
                              
                            </ul>
                        </div>
                      
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children">
                                    <a href="#">游戏官网</a>
                                </li>
                                <li class="menu-item-has-children ">
                                    <a href="/">首页</a>
                                </li>
                              
                                <li class="menu-item-has-children">
                                    <a href="/product-list">礼品目录</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="/help">帮助中心 </a>
                                </li>
                                @if (Session::has('user'))

                                <li class="menu-item-has-children">
                                    <a href="/mine">我的账户</a> 
                                </li>
                                @endif
                                <li class="menu-item-has-children">
                                    <a href="/help?type=4">联系客服</a>
                                </li>
                                @if (Session::has('user')&&Session::get('user')->role)
                                    <li class="menu-item-has-children"><a href="/admin/catalog/categories">去管理页面</a></li>
                                @endif
                            </ul>
                        </div>

                        <div class="offcanvas_footer">
                            <ul>
                                <li class="twitter m-4"><a href="#" translate="no" class="zh-CN">简</a></li>
                                <li class="pinterest m-4"><a href="#" translate="no" class="zh-TW">繁</a></li>
                                <li class="facebook m-4"><a href="#" translate="no" class="En">En</a></li>
                            </ul>

                            <div class='d-flex m-10 text-center' style="height: 40px">
                                <div style="margin:auto" id="mobile_translator"></div>
                            </div>
                            <div class="cart_button mt-30">
                                @if (Session::has('user'))
                                    <form action="/api/member/logout" method="post">
                                        @csrf
                                    <a href="#" class="signout"><i class="fa fa-sign-out"></i> 退出登录</a>
                                    </form>
                                    @else
                                    <a href="/login"><i class="fa fa-sign-in"></i> 登入</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--offcanvas menu area end-->
    <header>
        <div class="main_header sticky-header color_four" style="padding-left:0px!important">
            <!-- <div class="container-fluid"> -->
            <div class="container">

                <div class="header_container">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <div class="logo">
                                <a href="/"><img src="{{asset('assets/img/logo/logo.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <!--main menu start-->
                            <div class="main_menu menu_position"> 
                                <nav>  
                                    <ul>
                                        <li><a href="{{$official}}">游戏官网</a></li>
                                        <li><a class="active"  href="/">首页</a></li>
                                        
                                        <li><a  href="/product-list">礼品目录<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="/product-list?type=0">全部</a></li>
                                                <li><a href="/product-list?type=1">数码产品</a></li>
                                                <li><a href="/product-list?type=2">奖金兑换</a></li>
                                                <li><a href="/product-list?type=3">生活精品</a></li>
                                                <li><a href="/product-list?type=4">奢华品</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/help">帮助中心<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="/help?type=1">关于积分</a></li>
                                                <li><a href="/help?type=2">规则与条款</a></li>
                                                <li><a href="/help?type=3">常见疑问</a></li>
                                            </ul>
                                        </li>
                                        @if (Session::has('user'))
                                        <li><a href="/mine">我的账户</a></li>
                                        @endif
                                        <li><a href="/help?type=4">联系客服</a></li>
                                        @if (Session::has('user')&&Session::get('user')->role)

                                        <li><a href="/admin/catalog/categories">去管理页面</a></li>
                                        @endif
                                    </ul>  
                                </nav> 
                            </div>
                            <!--main menu end-->
                        </div>
                        
                        <div class="col-lg-2">
                            <div class="header_account_area">
                                <div class="header_account-list top_links">
                                    @if (Session::has('user'))
                                    <a href="/mine" style="font-size: 14px;"><i class="icon icon-User"style="margin-right:10px"></i>{{Session::get('user')->user_name}}</a>
                                    @else
                                    <a href="/mine" style="font-size: 14px;"><i class="icon icon-User"style="margin-right:10px"></i>帐户</a>
                                    @endif
                                    <div class="dropdown_links">
                                        <div class="dropdown_links_list">
                                            @if (Session::has('user'))
                                            <h3><i class="icon icon-User"style="margin-right:10px"></i>{{Session::get('user')->user_name}}</h3>
                                            <ul>
                                                <li><a href="#">我的积分  <span style="float: right;">{{$total_points}}</span></a></li>
                                                <li><a href="#">已用积分  <span style="float: right;">{{$used_points}}</span></a></li>
                                                <li><a href="#">剩余积分  <span style="float: right;">{{$total_points-$used_points}}</span></a></li>
                                            </ul>
                                            @endif
                                        </div>
                                      
                                        <div class="dropdown_links_list">
                                            <div class="mini_cart_footer">
                                                 <div class="cart_button">
                                                    @if (Session::has('user'))
                                                    <form action="/api/member/logout" method="post">
                                                        @csrf
                                                    <a href="#" class="signout"><i class="fa fa-sign-out"></i> 退出登录</a>
                                                    </form>
                                                    @else
                                                    <a href="/login"><i class="fa fa-sign-in"></i> 登入</a>
                                                    <!-- <a href="/register"><i class="fa fa-sign-in"></i> 登记</a> -->
                                                    <!-- <a href="/identify-by-qrcode" style="font-size: 14px;margin-top: 8px;"><img src="{{asset('assets/img/qrcodescan_120401.svg')}}"></a> -->
                                                     @endif
                                                 </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                .goog-te-menu-frame,.goog-te-balloon-frame{
                                    box-shadow:none!important
                                    }
                                .goog-te-gadget-simple{
                                    background-color:transparent;
                                    border:2px solid #eee;
                                    border-radius:5px;
                                    padding:5px 10px;
                                    box-shadow:0 2px 10px -7px rgba(0,0,0,0.2);
                                    font-size:0;
                                    }
                                    .goog-te-gadget-icon{
                                        display: none;
                                    }
                                </style>

                                <div class='header_account-list top_links container' style="margin-right: 0px; margin-top:-5px; display:inline; width: 60px;" id="translator">
                                    <div id="g_translater" style="display:none">
                                        <div id="google_translate_element"></div>
                                    </div>  
                                    <a href="javascript:void(0)"><img src="{{asset('assets/img/icon/fy.png')}}" alt="" width="30px"></a>
                                    <div class="dropdown_links" style="width: 150px">
                                        <div class="dropdown_links_list" >
                                            <ul>
                                                <li><a href="#" translate="no" class="zh-CN">简体中文</a></li>
                                                <li><a href="#" translate="no" class="zh-TW">繁體中文</a></li>
                                                <li><a href="#" translate="no" class="En">English</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                  
                                </div>
                                
                                <div class="header_account-list mini_cart_wrapper">
                                   <a href="javascript:void(0)"><i class="icon icon-FullShoppingCart"></i><span class="item_count">{{count($carts)}}</span></a>
                                    <!--mini cart-->
                                    
                                    <div class="mini_cart">
                                        <div class="cart_gallery">
                                            @foreach ($carts as $cart)
                                                <div class="cart_item">
                                                    <div class="cart_img">

                                                        <a href="#"><img src="{{url('/storage/uploads/catalog/products/'.$cart->product->id.'/main.png')}}" alt=""></a>
                                                    </div>
                                                    <div class="cart_info">
                                                        <a href="#">{{$cart->product->name}}</a>
                                                        <p>{{$cart->quantity}}x <span> {{$cart->product->points}} </span></p>    
                                                    </div>
                                                    <div class="cart_remove">
                                                        <form action="/api/delete-cart" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{$cart->id}}" name="id">
                                                        </form>
                                                        <a href="#"><i class="ion-ios-close-outline"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="mini_cart_table">
                                            <div class="cart_table_border">
                                                <div class="cart_total">
                                                    <span>总计:</span>
                                                    <span class="price">{{$total}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_footer">
                                           <div class="cart_button">
                                                <a href="/cart"><i class="fa fa-shopping-cart"></i> 去购物车</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--mini cart end-->
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        
    </header>
@endsection
