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
.tab-content .tab-pane h3{border-left: #012862 solid 5px;padding-left: 15px;margin: 15px 0;font-size: 20px;}
.tab-content .tab-pane p{text-indent:24px;margin-bottom: 10px!important;}
.post_wrapper a{font-size: 15px;margin-right: 20px;color: black!important;}
.post_wrapper a:hover{color: rgb(3, 83, 148)!important;}
.dashboard_tab_button{text-align: center;}


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
        .cart-list .product_name{max-width: 200px}
   

    }
</style>
@endsection


@section('content')
     
    <!--product details start-->
    <div class="product_details variable_product mt-20 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                   <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{asset($product->mainImage)}}" data-zoom-image="{{asset($product->mainImage)}}" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                @if(!$product->virtual)
                                @foreach ($product->subImages as $subImage)
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset($subImage)}}" data-zoom-image="{{asset($subImage)}}">
                                        <img src="{{asset($subImage)}}" alt="No"/>
                                    </a>

                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="product_d_right">
                       <form action="/api/add-cart" method="POST" id="my_form"> 
                        @csrf
                        <input type="hidden" name="virtual" value="{{$product->virtual}}" />
                        <input type="hidden" value="{{$product->id}}" name="id">
                            <h1><a href="#">{{$product->name}}</a></h1>
                            {{-- <div class="product_nav">
                                <ul>
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div> --}}
                          
                            <div class="price_box">
                                <span class="current_price">{{$product->price}}</span>
                                <!-- <span class="old_price">$80.00</span> -->
                                
                            </div>
                            <div class="product_desc">
                                <p>{{$product->description}}</p>
                            </div>
                            @if(!$product->virtual)
                            <div class="product_variant color" id="product_color">
                                <label>颜色</label>
                                <ul>
                                    @foreach($product->colors as $color)
                                    <li data-value="{{$color}}"><a style="background-color: {{$color}}" href="#"></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="product_variant size">
                                <label>尺寸</label>
                                <select class="select_option" name="size" id='size'>
                                    {{-- <option value="" selected> 尺寸</option>   --}}
                                    @foreach ($product->sizes as $key=> $size)
                                    <option value="{{$size}}">{{$size}}</option>              
                                    @endforeach      
                                </select>   
                            </div>
                            @endif
                            <div class="product_variant quantity">
                                <label>数量</label>
                                <input min="1" max="100" value="1" type="number" name="quantity" id='qty'>
                                <button class="submit" id="my_submit">加入购物车</button>  
                            </div>
                        </form>
                    </div>
                </div>
              
            </div>
        </div>    
    </div>
    <!--product details end-->
    
    <!--product info start-->
    <div class="product_d_info mb-95">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">   
                        <div class="product_info_button">    
                            <ul class="nav" role="tablist">
                                <li >
                                    <a class="active" data-toggle="tab" href="#cpsm" role="tab" aria-controls="cpsm" aria-selected="false">产品说明</a>
                                </li>
                              
                                <li>
                                   <a data-toggle="tab" href="#dhjl" role="tab" aria-controls="dhjl" aria-selected="false">兑换记录</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#gyjf" role="tab" aria-controls="gyjf" aria-selected="false">关于积分</a>
                                 </li>
                                 <li>
                                    <a data-toggle="tab" href="#gztk" role="tab" aria-controls="gztk" aria-selected="false">规则与条款</a>
                                 </li>
                                 <li>
                                    <a data-toggle="tab" href="#ywjd" role="tab" aria-controls="ywjd" aria-selected="false">疑问解答</a>
                                 </li>
                                 <li>
                                    <a data-toggle="tab" href="#zxkf" role="tab" aria-controls="zxkf" aria-selected="false">在线客服</a>
                                 </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="cpsm" role="tabpanel" >
                                <div class="product_info_content">
                                    <p>{{$product->description}}</p>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="first_child">Compositions</td>
                                                <td>{{$product->compositions}}</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Styles</td>
                                                <td>{{$product->styles}}</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Properties</td>
                                                <td>{{{$product->properties}}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    {{-- <img src="{{asset('/assets/img/product/product1.jpg')}}" alt=""> --}}
                                    {{-- <img src="{{asset('/assets/img/product/product2.jpg')}}" alt=""> --}}

                                </div>    
                            </div>
                            <div class="tab-pane fade" id="dhjl" role="tabpanel" >
                                <div class="cart-list">
                                    <div class="shop_sidebar_product">
                                        @foreach ($exchange_records as $product)
                                        <article class="single_product col-12 col-lg-12" >
                                                <figure>
                                                
                                                <div class="product_thumb">
                                                        <a class="primary_img" href="{{$product->url}}"><img src="{{asset($product->primary_image)}}" alt=""></a>
                                                    </div>
                                                    <figcaption class="product_content">
                                                        <h4 class="product_name"><a href="{{$product->url}}">{{$product->name}}</a></h4>
                                                        <div>
                                                            <span class="cart-color">
                                                            {{$product->color}}
                                                            </span>
                                                            <span class="cart-size">
                                                            {{$product->size}}
                                                            
                                                            </span>
                                                            <span class="cart-price">
                                                               {{$product->price}}
                                                                
                                                            </span>
                                                        <span class="cart-num"> X{{$product->cart_num}}</span>
                                                        </div>
                                                    
                                                    </figcaption>
                                                
                                                
                                                </figure>
                                        </article>
                                            
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gyjf" role="tabpanel" >
                                {{$help_one}}
                                <hr>
                                <p>还有任何问题？胜天娱乐欢迎您随时联系 <a href="/help?type=4">在线客服</a>
                                </p>
                            </div>
                            <div class="tab-pane fade" id="gztk" role="tabpanel" >
                                {{$help_two}}
                                <hr>
                                <p>还有任何问题？胜天娱乐欢迎您随时联系 <a href="/help?type=4">在线客服</a>
                                </p>
                            </div>
                            <div class="tab-pane fade" id="ywjd" role="tabpanel" >
                                  <!--Accordion area-->
                            
                            <div class="accordion_area">
                                <div class="container">
                                    <div class="row">
                                    <div class="col-12"> 
                                        <div id="accordion" class="card__accordion">
                                            @foreach ($help_three as $key=> $help)
                                            
                                            <div class="card card_dipult">
                                                <div class="card-header card_accor" id="heading{{$key}}">
                                                    <button class="btn btn-link {{$key==0?'':'collapsed'}}" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                                                       {{$help->question}}
    
                                                    <i class="fa fa-plus"></i>
                                                    <i class="fa fa-minus"></i>
    
                                                    </button>
    
                                                </div>
    
                                                <div id="collapse{{$key}}" class="collapse {{$key==0?'show':''}}" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p>{{$help->answer}}</p>
                                                </div>
                                                </div>
                                            </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!--Accordion area end-->
                            </div>
                            <div class="tab-pane fade" id="zxkf" role="tabpanel" >
                                <div class="col-lg-6 col-md-12" style="margin-left: 30px;">
                                    <div class="blog_sidebar_widget">
                                        
                                        <div class="widget_list comments">
                                           <div class="widget_title">
                                                <h3>在线客服</h3>
                                            </div>
                                            @foreach ($help_four as $help)
                                            
                                            <div class="post_wrapper">
                                                <div class="post_thumb">
                                                    <a href="{{$help->url}}"><img src="{{url('/storage/uploads/service/'.$help->id.'.png')}}" alt=""></a>
                                                </div>
                                                <div class="post_info">
                                                    <span> <a href="#">{{$help->description}}</a> </span>
                                                    <span>ID {{$help->id}}</span>
                                                </div>
                                            </div>
                                            
                                            @endforeach
                                          
                                        </div>
                                       
                              
                                       
                                    </div>
                                </div>
    
                                <div class="col-lg-6 col-md-12">
                                    <center>
                                        <button type="button" class="btn btn-primary" style="background-color: #35a2f8;color: aliceblue;margin: 30px auto;">开始咨询</button>
                                    </center>
                                    
                                </div>
                            </div>

                            
                        </div>
                    </div>     
                </div>
            </div>
        </div>    
    </div>  
    <!--product info end-->

  
@endsection


@section('scripts')
@parent
<script>
$('#product_color ul li').click(function(){
    $('#product_color ul li').map((id, el)=>{
        if($(el)!=$(this)){
            $(el).removeAttr('select');
            $(el).css('border-width', '1px');
            $(el).css('border-color', '#ccc');
            $(el).find('input').remove();
        }
    });
    var en = true;
    if($(this).attr('select')=='true')
    {
        $(this).attr('select',false);
        $(this).css('border-width', '1px');
        $(this).css('border-color', '#ccc');
        en=false;
    }
    else
    {
        $(this).attr('select',true);
        $(this).css('border-width', '2px');
        $(this).css('border-color', '#2c9aff');
        en=true;
    }
    var o = $('<input type="hidden" name="color" value="">');
    if(en)
    {
        o.val($(this).attr('data-value'));
        $(this).append(o);
    }
    
})
$('#my_submit').click   (function(e){
    e.preventDefault();
    if($('#qty').val() > 0){
        $('#my_form').submit();
    }
    else{
        alert('Quantity must be greater than 0')
    }
})
</script>
@endsection