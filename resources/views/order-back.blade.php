@extends('layout.app')

@section('styles')
@parent
<style>
    p{line-height: 18px;}
</style>
@endsection


@section('content')
  
        <div class="container" style="min-height:75%">   
            <div class="row">
                <div class="col-12 mt-100">
                    <div style="text-align: center;">
                        <h2>兑换成功！</h2>
                        <p class="mt-30">感谢您的兑换，胜天娱乐会为您尽快发货</p>
                        <p>预计3-7个工作日收到货, 请耐心等待</p>
                        <p>订单号：{{$order_info->no}}</p>
                        <p>消耗积分：{{$order_info->consumption_points}}</p>
                        <p>您的余额：{{$order_info->your_balance}}</p>
                        <img src="{{url('storage/uploads/orders/qrcode_'.$order_info->no.'.png')}}" />
                        <div class="mt-30">
                            <a href="/mine?type=3" class="btn btn-dark" role="button">查看订单</a>
                            <a href="/" class="btn btn-info" role="button">继续购买</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>    

    
@endsection

@section('scripts')
@parent
@endsection