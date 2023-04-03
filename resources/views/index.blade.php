@extends('layout.app')

@section('styles')
@parent
<style>
    .main-group{
        box-sizing: border-box;
        width:100%;
        min-height:280px;
        padding:0 5em;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        background: linear-gradient(to bottom, #bea2e7 50%,#86b7e7 100%);
    }
    .main-group .items-group{
        background: #fff;
        max-width: 460px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 100px 20px 20px 100px;
        padding: 6px 10px 6px 6px;
        box-sizing: border-box;
        animation: animate 10s linear infinite;
        animation-delay: calc(2s * var(--delay));
        position: absolute;
        opacity: 0;
        box-shadow: 0 0 5px #c1c1c1;
    }
    .main-group .items-group:last-child{
        animation-delay: calc(-2s * var(--delay));
    }
    .main-group .items-group.no-animation{
        animation-play-state: paused;
    }
    @keyframes animate {
        0%{
            opacity: 0;
            transform: translateY(100%) scale(0.6);
        }
        
        5%, 20%{
            opacity: 0.4;
            transform: translateY(100%) scale(0.8);
        }
        25%, 40%{
            opacity: 1;
            z-index: 1;
            pointer-events: auto;
            transform: translateY(0%) scale(1);
        }
        45%, 60%{
            opacity: 0.4;
            transform: translateY(-100%) scale(0.8);
        }
        65%,100%{
            opacity: 0;
            transform: translateY(-100%) scale(0.6);
        }
    }
    .main-group .items-group .items-box{
        display: flex;
        align-items: center;
        /* justify-content: center; */
    }
    .main-group .items-group .img{
        width: 50px;
        height: 50px;
    }
    .items-group .img img{
        width:100%;
        height:100%;
        border-radius: 50%;
        box-shadow: 0 0 5px #989898;
    }
    .main-group .items-group .desc{
        margin-left:8px;
        font-size: 12px;
        line-height: 18px;
        max-width: 200px;
    }
    .main-group .items-group .desc .name{
        font-size: 14px;
        font-weight: bold;
        /* float: left; */
    }
    .main-group .items-group .follow-btn{
        margin-left: 10px;
        font-size: 12px;
        border-radius: 16px;
        font-weight: 500;
        padding:5px 8px;
        color: #fff;
        background: linear-gradient(to bottom, #bea2e7 0%,#86b7e7 100% );
    }
    .main-group .items-group .del-follow{
        background: linear-gradient(to bottom, #1f1f1f 0%,#a8a8a8 100% );
    }
</style>
@endsection

@section('content')

    <!--slider area start-->
    <section class="slider_section mb-30 color_four">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">

        </div>
        <div class="slider_area owl-carousel">
            
            @foreach($banners as $key => $banner)
                @if($key % 2==0)
                <div class="single_slider d-flex align-items-center" data-bgimg="{{url('storage/uploads/banners/'.$banner.'.png')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider_content">
                                    <h3>玩游戏/赚积分/享快乐</h3>
                                    <h1>胜天娱乐 </h1>
                                    <p>欢迎来到胜天娱乐积分商城</p>
                                    <a class="button" href="/login">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="single_slider d-flex align-items-center" data-bgimg="{{url('storage/uploads/banners/'.$banner.'.png')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider_content" >
                                    <h3 style="color: #0869b8 ">安全配送</h3>
                                    <h1  style="color: #0869b8 ">胜天娱乐</h1>
                                    <p style="color: #196baf ">欢迎来到胜天娱乐积分商城</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </section>
    <!--slider area end-->


    <!--banner area start-->

    <div class="banner_area home1_banner mb-40 color_four">

        <div class="container">
            <div class="row">
                <style> 
                    .color-checker ul li {display: inline-block; margin: 2px;transition: all 0.1s ease 0s;cursor: pointer;} 
                    .color-checker ul li span {display: block;} 
                    .color-checker ul li input{display: none;}
                    .color-checker ul li span:hover{background-color: rgba(0,0,0,0.6);}
                </style>
                @foreach ($categories as $category)
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="/product-list?type={{$category->id}}"><img src="{{url('/storage/uploads/catalog/categories/'.$category->id.'/main.png')}}" alt=""></a>
                        </div>
                    </figure>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product area start-->
    <div class="product_area  mb-40 color_four">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                       <h2>Best <span>seller</span></h2>
                       <!-- <p>Lorem ipsum dolor sit amet, consectetur elit.</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->

                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">
                        @foreach ($best_products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                       <div class="label_product">
                                            <span class="label_new">new</span>
                                            <span class="label_sale">hot!</span>
                                        </div>
                                        <a class="primary_img" href="/product-details/{{$product->id}}"><img src="{{url('/storage/uploads/catalog/products/'.$product->id.'/main.png')}}" alt=""></a>
                                        <a class="secondary_img" href="/product-details/{{$product->id}}"><img src="{{url('/storage/uploads/catalog/products/'.$product->id.'/sub0.png')}}" alt=""></a>

                                    </div>
                                    <div class="product_content grid_content">

                                        <h4 class="product_name"><a href="/product-details/{{$product->id}}"> {{$product->name}}</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">{{$product->points}}积分</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="/product-details/{{$product->id}}" title="Add to Cart" >Add to Cart</a>
</div>
                                        <div class="swatches-colors">
                                            <ul>
                                                @foreach ($product->colors as $color)
                                                    <li><a style="background-color: {{$color}}" href="javascript:void(0)"></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                </figure>
                            </article>
                        </div>
                            
                        @endforeach

                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--product area end-->

    <!--product area start-->
    <div class="product_area  mb-40 color_four">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                       <h2>New <span>product</span></h2>
                       <!-- <p>Lorem ipsum dolor sit amet, consectetur elit.</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->

                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">
                        @foreach ($new_products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                       <div class="label_product">
                                            <span class="label_new">new</span>
                                            <span class="label_sale">hot!</span>
                                        </div>
                                        <a class="primary_img" href="/product-details/{{$product->id}}"><img src="{{url('/storage/uploads/catalog/products/'.$product->id.'/main.png')}}" alt=""></a>
                                        <a class="secondary_img" href="/product-details/{{$product->id}}"><img src="{{url('/storage/uploads/catalog/products/'.$product->id.'/sub0.png')}}" alt=""></a>

                                    </div>
                                    <div class="product_content grid_content">

                                        <h4 class="product_name"><a href="/product-details/{{$product->id}}"> {{$product->name}}</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">{{$product->points}}积分</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="/product-details/{{$product->id}}" title="Add to Cart">Add to Cart</a>
</div>
                                        <div class="swatches-colors">
                                            <ul>
                                                @foreach ($product->colors as $color)
                                                    <li><a style="background-color: {{$color}}" href="javascript:void(0)"></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                </figure>
                            </article>
                        </div>
                        @endforeach
                    </div>


                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--product area end-->

@endsection

@section('scripts')
@parent
<script>
    setInterval(function () {
        document.getElementsByClassName("owl-next")[0].click();
     }, {{$banner_time*1000}});
</script>
@endsection
