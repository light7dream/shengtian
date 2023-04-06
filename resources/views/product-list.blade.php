@extends('layout.app')

@section('styles')
@parent
<style>
    .p-type a{
        padding: 10px 20px;
        border: #C09578 solid 1px;
        border-radius: 5px;
        font-weight: 700;
        color: #C09578;
        display: inline-block;
    }
    .p-type a:hover{
        background-color: #C09578;
        color: aliceblue;
    }
    .p-type .on{
        background-color: #C09578;
        color: aliceblue;
    }
    @media only screen and (max-width: 767px) {
        .p-type a {
            padding: 5px 7px;
        }
        .niceselect_option{
            display: none;
        }
    }
</style>
@endsection


@section('content')


    <!--product area start-->
    
    <!--product area end-->
    
    <!--product area start-->
    <div class="product_area  mb-40 color_four">
        <div class="container">
            
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper" >
                        <div class="p-type"> 
                            <a href="/product-list?type=0"  class="lab" id="type0">全部</a>
                            <a href="/product-list?type=1"  class="lab" id="type1">数码产品</a>
                            <a href="/product-list?type=2"  class="lab" id="type2">奖金兑换</a>
                            <a href="/product-list?type=3"  class="lab" id="type3">生活精品</a>
                            <a href="/product-list?type=4"  class="lab" id="type4">奢侈品</a>
                        </div>
                        
                       
                        <div class="niceselect__option"  >
                            <form class="" action="#">
                                <select name="orderby" class="form-control" id="mySort">
                                    <option  value="1">按热度</option>
                                    <option  value="2">按价格</option>
                                    <option value="3">按时间</option>
                                </select>
                            </form>
                        </div>
                       
                    </div>
                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">
                        @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                       <div class="label_product">
                                            <span class="label_new">新的</span>
                                            <span class="label_sale">热的!</span>
                                        </div>
                                        <a class="primary_img" href="/product-details/{{$product->id}}"><img src="{{url('storage/uploads/catalog/products/'.$product->id.'/main.png')}}" alt=""></a>
                                        <a class="secondary_img" href="/product-details/{{$product->id}}"><img src="{{file_exists(url('storage/uploads/catalog/products/'.$product->id.'/sub0.png'))?url('storage/uploads/catalog/products/'.$product->id.'/sub0.png'):''}}" alt=""></a>

                                    </div>
                                    <div class="product_content grid_content">

                                        <h4 class="product_name"><a href="/product-details/{{$product->id}}"> {{$product->name}}</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">{{$product->points}}</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="/product-details/{{$product->id}}" title="添加到购物车">添加到购物车</a>
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
                    <div class="shop_toolbar t_bottom">
                        {{$products->links()}}
                        {{-- <div class="pagination">
                            <ul>
                                    
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div> --}}
                    </div>
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

        $('#mySort').change(function(e){
            var val = Number($(this).val().trim());
            var url = location.href.split('&')[0];
            console.log(val)
            switch(val){
                case 1:
                    location.href = url + '&filter=0';
                    break;
                case 2:
                    location.href = url + '&filter=1';
                    break;
                case 3:
                    location.href = url + '&filter=2';
                    break;
                default:
                    location.href = url;
                    break;
            }
        })
    </script>
<script>
    $(".p-type .lab").click(function () {
           $(this).addClass("on").siblings().removeClass("on");
    })
    window.onload=function(){
        var purl=document.location.search;
        purl=purl.substring(1,purl.length);
        var ptype=purl.split("=");
        ptype=ptype[1];
        if(ptype=="0"){
            $("#type0").addClass("on");
        }
        else if(ptype=="1")
        {
            $("#type1").addClass("on");
        }
        else if(ptype=="2")
        {
            $("#type2").addClass("on");
        }
        else if(ptype=="3")
        {
            $("#type3").addClass("on");
        }
        else if(ptype=="4")
        {
            $("#type4").addClass("on");
        }
        else
        {
            $("#type0").addClass("on");
        }
   
    }
</script>
@endsection