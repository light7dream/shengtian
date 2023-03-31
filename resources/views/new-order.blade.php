@extends('layout.app')

@section('styles')
@parent
<style>
    .cart-list figure{display: inline-block;width: 100%; }
    /* .cart-list .cart-del{float: right;font-size: 19px;color: #999999;margin-top:-5px} */
    .cart-list .cart-color{display: inline-block;font-size: 10px;border:1px solid #e5e5e5;border-radius: 5px;margin-bottom:0;padding:3px 12px;margin-right: 5px;}
    .cart-list .cart-size{display: inline-block;font-size: 10px;border:1px solid #e5e5e5;border-radius: 5px;margin-bottom: 0;padding:3px 12px;}
    .cart-list .cart-price{color: #c92d2d;margin-left: 10px;font-size: 16px;}
    .cart-list .cart-num{color: #646464;margin-left: 10px;font-size: 16px;}
   

    @media only screen and (max-width: 767px) {
        .cart-list .product_name{max-width: 200px}
    }
    @media only screen and (max-width: 420px) {
        .cart-list .product_name{max-width: 180px}
   

    }
    .checkout_btn a{background-color: #0867cc;margin-top: 20px;}
    .shop_sidebar_product .product_thumb {
        width: 60px;
        float: left;
    }
    form label.error{
        color: #c92d2d;
    }
</style>
@endsection


@section('content')
 
    <!--cart area start-->
    <div class="container">
        
            <div class="cart-list">
                <div class="shop_sidebar_product">
                    @foreach ($carts_ as $cart)
                        
                    <article class="single_product col-12 col-lg-12" >
                        <figure>
                          
                           <div class="product_thumb">
                                <a class="primary_img" href="/product-details/{{$cart->product->id}}"><img src="{{url('/storage/uploads/catalog/products/'.$cart->product->id.'/main.png')}}" alt=""></a>
                            </div>
                            <figcaption class="product_content">
                                <h4 class="product_name"><a href="/product-details/{{$cart->product->id}}">{{$cart->product->name}}</a></h4>
                                <div>
                                    <span class="cart-color">
                                      {{$cart->color}}
                                    </span>
                                    <span class="cart-size">
                                    {{$cart->size}}
                                    
                                    </span>
                                    <span class="cart-num"> X{{$cart->quantity}}</span>
                                    <span class="cart-price">
                                    {{$cart->product->points*$cart->quantity}}
                                    </span>
                                        
                                </div>
                              
                            </figcaption>
                           
                          
                        </figure>
                </article>

                @endforeach
                                      
               
                </div>
            </div>
             <!--coupon code area start-->
             <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="coupon_code right">
                            <h3>记账簿</h3>
                            <div class="coupon_inner">
                               <div class="cart_subtotal">
                                   <p>订单合计</p>
                                   <p class="cart_amount">{{$book_keeping->total_order}}</p>
                               </div>
                              
                               <a href="#"></a>

                               <div class="cart_subtotal">
                                   <p>我的积分</p>
                                   <p class="cart_amount">{{$book_keeping->my_scores}}</p>
                               </div>
                               <div class="cart_subtotal">
                                <p>还需积分</p>
                                <p class="cart_amount" style="color: #c92d2d;">-{{$book_keeping->need_scores}}</p>
                            </div>
                           
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="coupon_code left">
                            <h3>收货地址</h3>
                            <div class="coupon_inner">   
                                <form action="/api/add-order" method="POST" id='checkout_form'>
                                @csrf
                                <p>请写出正确的个人信息及详细地址，以确保您准确收到货.
                                </p>   
                                <div>
                                    <span>收货人姓名：</span>
                                    <input placeholder="" name="name" type="text" required>
                                </div>    
                                <div class="mt-10">
                                    <span>收货人电话：</span>
                                    <input placeholder="" name="tel" type="tel" required>
                                </div>    
                                <div class="mt-10" >
                                    <span>收货人地址：</span>
                                    <input placeholder="" type="text" name="address" style="width: 100%;" required>
                                </div>                     
                                <span class="checkout_btn" >
                                    <a href="#" id="checkout_btn">确认</a>
                                </span>
                                <span class="checkout_btn" >
                                    <a href="/cart">返回购物车</a>
                                </span>
                                </form>
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
<script src="{{asset('/assets/js/dist/jquery.validate.js')}}"></script>

<script>
    @if($errors->any())
    alert('{{$errors->first()}}');
    @endif
    $("#checkout_form").validate({
			rules: {
				name: "required",
				tel: "required",
				address: {
					required: true,
					minlength: 4
				},
			},
			messages: {
				name: "Please enter recipient name",
				tel: "Please enter recipient tel",
				address: {
					required: "Please enter a address",
					minlength: "Recipient address must consist of at least 4 characters"
				}
			}
    });
$('#checkout_btn').click(function(){
    var name = $('input[name="name"]').val();
    var tel = $('input[name="tel"]').val();
    var address = $('input[name="address"]').val();
    $("#checkout_form").submit();
})
</script>
@endsection