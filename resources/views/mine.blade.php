@extends('layout.app')
@section('styles')
@parent
<style>
    @media only screen and (max-width: 767px) {
        .main_content_area{margin-top: 30px;padding-top: 0;}
        .dashboard-list{display: inline-block;width: 100%;}
        .dashboard-list li{width: 24%;display: inline-block;}
        .dashboard-list li .nav-link{font-size: 13px;width: 100%;}
}
.tab-content .tab-pane h3{border-left: #012862 solid 5px;padding-left: 15px;margin: 15px 0;}
.tab-content .tab-pane p{margin-bottom: 10px!important;}
.post_wrapper a{font-size: 15px;margin-right: 20px;color: black!important;}
.post_wrapper a:hover{color: rgb(3, 83, 148)!important;}
.dashboard_tab_button{text-align: center;}

#myorder .card_dipult{
    font-size:11px

}


.cart-list figure{display: inline-block;width: 100%; }
/* .cart-list .cart-del{float: right;font-size: 19px;color: #999999;margin-top:-5px} */
.cart-list .cart-color{display: inline-block;font-size: 9px;border:1px solid #e5e5e5;border-radius: 5px;margin-bottom:0;padding:1px 5px;margin-right: 5px;}
.cart-list .cart-size{display: inline-block;font-size: 9px;border:1px solid #e5e5e5;border-radius: 5px;margin-bottom: 0;padding:1px 5px;}
.cart-list .cart-price{color: #c92d2d;margin-left: 10px;font-size: 16px;}
.cart-list .cart-num{color: #646464;margin-left: 10px;font-size: 16px;}
.cart-list .product_thumb {
    width: 50px;
    float: left;
}
.cart-list .product_name{font-size: 12px;margin-top:0}

@media only screen and (max-width: 767px) {
    .cart-list .product_name{max-width: 250px}
}
@media only screen and (max-width: 420px) {
    .cart-list .product_name{max-width: 205px}


}
.card-header.card_accor button.btn-link.collapsed {
    background-color: #ffffff;
}
.shop_sidebar_product .single_product {padding-bottom: 0px;}
.ml-15{margin-left: 15px;}
#myorder .card-header .order-dfh{float: right;margin-right: 30px;color:#c7c7c7;font-weight: 700;}
#myorder .card-header .order-dsh{float: right;margin-right: 30px;color:#f25656;font-weight: 700;}
#myorder .card-header .order-ywc{float: right;margin-right: 30px;color:#56f297;font-weight: 700;}


#myorder .card-body p{margin-bottom: 5px;font-size: 15px;}
#myorder .card-body p .time{float: right;font-size: 13px;color: #646464;}
#myorder .card-body .order-mes{font-size: 13px;border-bottom: #e6e6e6 solid 1px; border-left: #e6e6e6  solid 1px;padding: 5px 5px 5px 10px;float: left;}
#myorder .card-body .order-kd{font-size: 13px;padding: 5px 5px 5px 10px;float: left;border-left: #e6e6e6  solid 1px;}

#myorder .card-body .order-mes .order-update{border: #0892ef solid 1px;border-radius: 2px;padding: 2px 3px;color: #0892ef;}
#myorder .card-body .order-mes .order-update:hover{border: #0892ef solid 1px;border-radius: 2px;padding: 2px 3px;background-color: #0892ef;color: #ffffff;}

.fr{float:right}
.fl{float:left}
.mr-20{margin-right:20px ;}





#mine2 .jf-time{font-size: 12px;color: #a7a7a7;line-height: 15px; }
#mine2 td{padding: 5px 5px;}
#mine2 .jf-add{color: #019647;}
#mine2 .jf-minus{color: #961f01;}



</style>
@endsection

@section('content')
 
    <hr>



  
<!-- my account start  -->
<section class="main_content_area" >
    <div class="container">   
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-2 col-lg-2 ">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#mine1" data-toggle="tab" class="nav-link" id="minetab1">个人信息</a></li>
                            <li> <a href="#mine2" data-toggle="tab" class="nav-link" id="minetab2">积分明细</a></li>
                            <li><a href="#mine3" data-toggle="tab" class="nav-link" id="minetab3">我的订单</a></li>
                
                        </ul>
                    </div>    
                </div>
                <div class="col-sm-12 col-md-10 col-lg-10">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show" id="mine1">
                            <h3>Alodn235</h3>

                            <div style="text-align: center;width: 100%!important;">
                                <div class="alert alert-primary col-6 col-lg-3 fl" role="alert" >
                                    昨日共获得积分<br><a href="#" class="alert-link">{{$personal_info->obtained_yesterday_points}}</a>
                                </div>
                                <div class="alert alert-warning col-6 col-lg-3 fl" role="alert" >
                                    月累计获得积分<br><a href="#" class="alert-link">{{$personal_info->accumulated_points_permonth}}</a>
                                    </div>
                                    <div class="alert alert-danger col-6 col-lg-3 fl" role="alert" >
                                    总获得积分<br><a href="#" class="alert-link">{{$personal_info->total_points}}</a>
                                    </div>
                                    <div class="alert alert-info col-6 col-lg-3 fl" role="alert" >
                                    已使用<a href="#" class="alert-link">{{$personal_info->used_points}}</a><br>
                                    剩余<a href="#" class="alert-link"> {{$personal_info->remaining_points}}</a>


                                    </div>
                                
                            </div>
                            <hr>
                            <div class="clearfix"></div>
                            <h3>兑换过的商品</h3>
                            
                            <div class="cart-list">
                                <div class="shop_sidebar_product">
                                    @foreach ($my_orders as $key => $order)
                                    
                                    @foreach ($order->order_products as $op)
                                    <article class="single_product col-12 col-lg-12" >
                                        <figure>
                                            
                                            <div class="product_thumb">
                                                <a class="primary_img" href="{{$op->product->id}}"><img src="{{url('/storage/uploads/catalog/products/'.$op->product->id.'/main.png')}}" alt=""></a>
                                            </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="{{$op->product->id}}">{{$op->product->name}}</a></h4>
                                                    <div>
                                                        <span class="cart-color" style="background-color: {{$op->color}}; color: rgba(255,255,255,0);">
                                                            {{$op->color}}
                                                        </span>
                                                        <span class="cart-size">
                                                            {{$op->size}}
                                                            
                                                        </span>
                                                        <span class="cart-price">
                                                            {{$op->product->points}} 
                                                        </span>
                                                        <span class="cart-num"> X{{$op->quantity}}</span>
                                                    </div>
                                                    
                                                </figcaption>
                                            </figure>
                                        </article>
                                    @endforeach    
                                    @endforeach    
                                </div>
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="mine2" style="line-height: 30px;">
                            <h3>积分明细</h3>
                            <div>
                                <div>
                                    <div class="fl mr-20">总积分 483,548,000</div>
                                    <div class="fl mr-20">已消耗 4,548,000</div>

                                    <div class="fl mr-20">剩余 28,500</div>

                                </div>
                                <br>

                                    
                            
                                <select class="form-control" style="width: 65px;font-size: 15px;padding: 2px 3px;float: right;margin-bottom: 5px;margin-left: 5px;">
                                    <option>全部</option>
                                    <option>收入</option>
                                    <option>支出</option>
                                    </select>
                                    <select class="form-control" style="width: 65px;font-size: 15px;padding: 2px 3px;float: right;margin-bottom: 5px;margin-left: 5px;">
                                    <option>时间</option>
                                    <option>2023.1</option>
                                    <option>2023.2</option>
                                    <option>2023.3</option>


                                    
                                    </select>
                            
                                
                                
                                
                            </div>
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>明细</th>
                                    <th>积分</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($point_details->records as $record)
                                    <tr>
                                        <td>
                                            {{$record->content}}
                                            <div class="jf-time">
                                                {{$record->date}}
                                            </div>
                                        </td>
                                        @if($record->points>=0)
                                        <td class="jf-plus">+{{$record->points}}</td>
                                        @else
                                        <td class="jf-minus">-{{$record->points}}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                <!--shop toolbar end-->
                                <div class="shop_toolbar t_bottom">
                                <div class="pagination">
                                    <ul>
                                        <li class="current">1</li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="next"><a href="#">next</a></li>
                                        <li><a href="#">>></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--shop wrapper end-->
                            
                        </div>
                        <div class="tab-pane fade" id="mine3">
                            
                            
                            <div class="accordion_area">
                                
                                    <div class="col-12" style="padding-right: 0;"> 
                                        <div id="myorder" class="card__accordion">
                                            @foreach ($my_orders as $key => $order)
                                            <div class="card card_dipult">
                                                <div class="card-header card_accor" id="heading{{$key}}">
                                                    <button class="btn btn-link {{$key==0?'':'collapsed'}}" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                                                        {{''}}  <span>共{{count($order->order_products)}}件</span>  @if($order->status == 3)<span class='order-ywc'>{{'已完成'}}</span> @elseif($order->status == 2) <span class='order-dsh'>{{'待收货'}}</span> @else <span class='order-dfh'>{{'待发货'}}</span> @endif
                                                    <i class="fa fa-plus"></i>
                                                    <i class="fa fa-minus"></i>
                                                    </button>

                                                </div>

                                                <div id="collapse{{$key}}" class="collapse {{$key==0?'show':''}}" aria-labelledby="heading{{$key}}" data-parent="#myorder">
                                                    
                                                    <div class="card-body">
                                                        <p>订单号：{{$order->id}} <i class="ml-15 time">{{$order->created_at}}</i></p>
                                                        <div class="cart-list">
                                                            <div class="shop_sidebar_product">
                                                                @foreach ($order->order_products as $op)
                                                                    <article class="single_product col-12 col-lg-12" >
                                                                        <figure>
                                                                            
                                                                            <div class="product_thumb">
                                                                                <a class="primary_img" href="{{$op->product->id}}"><img src="{{url('/storage/uploads/catalog/products/'.$op->product->id.'/main.png')}}" alt=""></a>
                                                                            </div>
                                                                                <figcaption class="product_content">
                                                                                    <h4 class="product_name"><a href="#">{{$op->product->name}}</a></h4>
                                                                                    <div>
                                                                                        <span class="cart-color" style="background-color: {{$op->color}}; color: rgba(255,255,255,0);">
                                                                                            {{$op->color}}
                                                                                        </span>
                                                                                        <span class="cart-size">
                                                                                            {{$op->size}}
                                                                                            
                                                                                        </span>
                                                                                        <span class="cart-price">
                                                                                            {{$op->product->points}} 
                                                                                        </span>
                                                                                        <span class="cart-num"> X{{$op->quantity}}</span>
                                                                                    </div>
                                                                                    
                                                                                </figcaption>
                                                                            </figure>
                                                                        </article>
                                                                    @endforeach    
                                                            </div>
                                                        </div>
                                                        <div class="col-12" style="display: inline-block;" >
                                                            <div class="order-mes col-12 col-lg-6">
                                                                <div >总计: {{$order->total}}积分</div>
                                                                @if($order->status == 1)
                                                                <div>收货信息： </div>
                                                                {{-- @else --}}
                                                                @endif
                                                                <div>{{$order->recipient_name}} </div>
                                                                <div>{{$order->recipient_tel}} </div>
                                                                <div>{{$order->recipient_address}} </div>
                                                            </div>
                                                            <div class="order-kd col-12 col-lg-6">
                                                                @if($order->status == 1)
                                                                <div >还未发货，预计今天下午发货，请耐心等待</div>
                                                                @else
                                                                <div >快递单号 : 
                                                                    @if($order->invoice)
                                                                    <a href="/invoices/{{$order->invoice->id}}">#INV-{{$order->invoice->id}}</a></div>
                                                                    @endif
                                                                <div></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @if($order->status==2)
                                                        <form action="/api/confirm-order" id="confirm_order_form" method="post">
                                                            @csrf
                                                            <div>
                                                                <input type="hidden" name="id" value="{{$order->id}}">
                                                                <a href="#" id="confirm-order" class="btn btn-info fr">确认收货</a>
                                                            </div>
                                                        </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                            </div>
                            <!--shop toolbar end-->
                            {{-- <div class="shop_toolbar t_bottom">
                                <div class="pagination">
                                    <ul>
                                        <li class="current">1</li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="next"><a href="#">next</a></li>
                                        <li><a href="#">>></a></li>
                                    </ul>
                                </div>
                            </div> --}}
                            <!--shop wrapper end-->
                        
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>  
    </div>        	
</section>			
<!-- my account end   --> 

    
  

@endsection

@section('scripts')
@parent

<script>
    $('#confirm-order').click(function(){
        $('#confirm_order_form').submit();
    })
    // $(".p-type .lab").click(function () {
    //        $(this).addClass("on").siblings().removeClass("on");
    // })
    window.onload=function(){
        var purl=document.location.search;
        purl=purl.substring(1,purl.length);
        var ptype=purl.split("=");
        ptype=ptype[1];
        if(ptype=="1"){
            $("#minetab1").addClass("active");
            $("#mine1").addClass("active");
           
        }
        else if(ptype=="2")
        {
            $("#minetab2").addClass("active");
            $("#mine2").addClass("active");
        }
        else if(ptype=="3")
        {
            $("#minetab3").addClass("active");
            $("#mine3").addClass("active");
        }
        
        else
        {
            $("#minetab1").addClass("active");
            $("#mine1").addClass("active");
        }
      
    }
</script>
@endsection