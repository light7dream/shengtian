@extends('layout.app')

@section('styles')
@parent
<style>
    .cart-list figure{display: inline-block;width: 100%; }
    .cart-list .cart-check{float: left;margin: 30px 10px 30px 2px;}
    .cart-list .cart-del{float: right;font-size: 19px;color: #999999;margin-top:-5px}
    .cart-list .cart-color{width: 60px;display: inline;font-size: 10px;border:1px solid #e5e5e5;border-radius: 5px;margin-bottom: 8px;margin-top: 5px;}
    .cart-list .cart-size{width: 60px;display: inline;font-size: 10px;border:1px solid #e5e5e5;border-radius: 5px;margin-bottom: 8px;margin-top: 5px;}
    .cart-list .cart-num{float: right;padding-left: 5px;margin-top: 30px;color: #646464;}
    .cart-list .cart-num input{width: 35px;border:1px solid #e5e5e5;border-radius: 5px;color: rgb(103, 103, 103);}
    @media only screen and (max-width: 767px) {
        .cart-list .product_name{max-width: 200px}
        /* .cart-list .cart-num {margin-top: 0;} */
    }
    @media only screen and (max-width: 420px) {
        .cart-list .product_name{max-width: 180px}
        .cart-list .cart-num {margin-right: -20px;}
        .cart-list .cart-num input {width: 30px;}

    }
    .checkout_btn a{background-color: #0867cc;}
    
</style>
@endsection


@section('content')
    <!--cart area start-->
    <div class="container">
        
        @if(!count($carts))
        <div style="margin-bottom:10em">
        <h3 style="">No products! You should add products...</h3>
        <div>
        @endif
            <div class="widget_list cart-list">
                <div class="shop_sidebar_product">
                    @foreach ($carts as $cart)
                    <article class="single_product col-12 col-lg-12" >
                            <figure>
                                <span class="cart-check">
                                <input class="cart-check" type="checkbox" {{$cart->checked==1?'checked':''}}>

                                </span>
                                <span style="" class="cart-del">
                                        
                                    <input type="hidden" data="id" value="{{$cart->id}}" name="id">
                                   
                                   <a href="#"><i class="fa fa-close"></i></a>
                                </span>
                               <div class="product_thumb">
                                    <a class="primary_img" href="{{'/product-details/'.$cart->product->id}}"><img src="{{url('/storage/uploads/catalog/products/'.$cart->product->id.'/main.png')}}" alt=""></a>
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="{{'/product-details/'.$cart->product->id}}">{{$cart->product->name}}</a></h4>
                                    @if(!$cart->product->virtual)
                                    <div>
                                        <select  class="cart-color">
                                            <option>{{$cart->color}}</option>
                                          </select>
                                          <select class="cart-size">
                                            <option>{{$cart->size}}</option>
                                          </select>
                                    </div>
                                    @endif
                                    <div class="price_box" > 
                                        <span class="current_price">
                                           {{$cart->product->points.'积分'}}
                                        </span>
                                    </div>
                                </figcaption>
                               
                                <span class="cart-num">
                                    X
                                    <input class="cart-qty" min="1" max="100" data-price="{{$cart->product->points}}" data-id="{{$cart->id}}" value="{{$cart->quantity}}" type="number">
                                </span>
                            </figure>
                    </article>
                    @endforeach
                </div>
            </div>
             <!--coupon code area start-->
             <div class="coupon_area">
                <div class="row">
                   
                    <div class="col-lg-12 col-12">
                        <div class="coupon_code right">
                            <h3>购物车总计</h3>
                            <div class="coupon_inner">
                               <div class="cart_subtotal ">
                                   <p>购物车总积分</p>
                                   <p class="cart_amount"><span>总计:</span> {{$cart_info->total_points}}</p>
                               </div>
                               <a href="#">我的余额 {{$cart_info->my_balance}}</a>

                               <div class="cart_subtotal">
                                   <p>选中积分</p>
                                   <p class="cart_amount" id='cart_sel_total'>{{$cart_info->selected_points}}</p>
                               </div>
                               <div class="checkout_btn" >
                                   <a id="go-new-order" href="#">确认</a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
       
    </div>

   
    
    <!--cart area end-->
    
@endsection

@section('scripts')
@parent
<script>
var represent=function(){
    var selected_points = 0;
    $('.cart-qty').map((i, el)=>{
        if($(el).parent().parent().find('input.cart-check')[0].checked)
            selected_points+=Number($(el).attr('data-price'))*Number($(el).val());
    })
    $('#cart_sel_total').text(selected_points); 
}
$('.cart-qty').change(function(){
    represent();
})
$('input.cart-check').click(function(){
    represent();
})
$('#go-new-order').click(function(){
    var data=[];
    $('.cart-qty').map((i, el)=>{
        console.log($(el).parent().parent().find('input.cart-check')[0].checked);
        if($(el).parent().parent().find('input.cart-check')[0].checked)
        data.push({
            id : Number($(el).attr('data-id')),
            qty : $(el).val()
        });
    })
    $.post('/api/ready-order', {_token: '{{csrf_token()}}',carts: data}, function(){
        window.location.href='/new-order';
    })
})
$('.cart-del').click(function(){
    var id = $(this).find('input[data="id"]').val();
    $.post('/api/delete-cart', {_token: '{{csrf_token()}}', id: id})
        .done(function(){
            $(this).parent().parent().remove();
            represent();
        })
})
</script>
@endsection