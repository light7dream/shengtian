@extends('layout.app')

@section('styles')
@parent
<style>
    .card{
        width: 70%;
        margin: auto;
    }
   
    .w-200{
        width: 200px;
    }
    .mt-5{
        margin-top: 5em;
    }
    .align-items-center {
        align-items: center!important;
    }
    .ms-sm-auto{
        margin-left: auto;
    }
    .pt-7{
        padding-top: 7em;
    }
    .table {
        caption-side: bottom;
        border-collapse: collapse;

    }
    
    .table th{
        border-width: 0;
    }
    .table-responsive .table thead {
        background-color: #fff;
    }
    .table-responsive table tbody tr td {
        border-width: 0;
        font-weight: 500;
        text-transform: capitalize;
        font-size: 14px;
        text-align: center;
        min-width: 150px;
    }
    .table-responsive .table
    {
        margin: auto;
        border-width: 0;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 1px solid #dee2e6;
    }
    .fs-3 {
    font-size: 1.05rem!important;
}
    .table td{
        border-width: 0;
    }
    .border-bottom {
        border-bottom: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color)!important;
    }
    .ms-5{
        margin-left: 5px;
    }
    .separator {
        display: block;
        height: 0;
        border-bottom: 1px solid #eee;
    }
    .flex-root {
    flex: 1;
}
    .flex-column {
        flex-direction: column;
    }

    .gap-md-10 {
    gap: 2.5rem!important;
}
.flex-sm-row {
    flex-direction: row!important;
}
.fw-bold {
    font-weight: 600!important;
}
.d-flex {
    display: flex!important;
}
.card{
    margin-bottom: 3em;
}
.card-body{
    padding: 7em;
}
.flex-stack {
    justify-content: space-between;
    align-items: center;
}
.btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon) {
    border: 0;
    padding: calc(0.55rem + 1px) calc(1.25rem + 1px);
}
.text-gray-800 {
    color: var(--kt-text-gray-800)!important;
}

.fw-bolder {
    font-weight: 700!important;
}
.fs-2qx {
    font-size: calc(1.35rem + 1.2vw)!important;
}
.pb-7 {
    padding-bottom: 1.75rem!important;
}
.pe-5 {
    padding-right: 1.25rem!important;
}
.text-end {
    text-align: right!important;
}
.fs-7 {
    font-size: 0.65rem!important;
}
.fw-bold {
    font-weight: 600!important;
}
.table.table-row-dashed tr {
    border-bottom-width: 1px;
    border-bottom-style: dashed;
    border-bottom-color: #eee;
}
</style>
@endsection


@section('content') 

<div class="card">
    <!-- begin::Body-->
    <div class="card-body py-20">
        <!-- begin::Wrapper-->
        <div class="mw-lg-950px mx-auto w-100">
            <!-- begin::Header-->
            <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7">发票</h4>
                <!--end::Logo-->
                <div class="text-sm-end">
                    <!--begin::Logo-->
                    <a href="#" class="d-block mw-150px ms-sm-auto">
                        <img alt="Logo" src="{{asset('assets/img/logo/logo.svg')}}" class="w-200" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Text-->
                    <div class="text-sm-end fw-semibold fs-4 text-muted mt-7">
                        <!-- <div>Cecilia Chapman, 711-2880 Nulla St, Mankato</div> -->
                        <!-- <div>Mississippi 96522</div> -->
                    </div>
                    <!--end::Text-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="pb-12">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column gap-7 gap-md-10">
                    <!--begin::Message-->
                    <div class="fw-bold fs-2">{{$invoice->order->member->name}},
                    <span class="fs-6">ID-#{{$invoice->order->member->id}}</span>
                    <br />
                    <span class="text-muted fs-5">这是您的订单详细信息。我们感谢您购买。</span></div>
                    <!--begin::Message-->
                    <!--begin::Separator-->
                    <div class="separator"></div>
                    <!--begin::Separator-->
                    <!--begin::Order details-->
                    <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                        <div class="flex-root d-flex flex-column">
                            <span class="text-muted">订购ID</span>
                            <span class="fs-5">#{{$invoice->order_id}}</span>
                        </div>
                        <div class="flex-root d-flex flex-column">
                            <span class="text-muted">日期</span>
                            <span class="fs-5">{{$invoice->ended_date}}</span>
                        </div>
                        <div class="flex-root d-flex flex-column">
                            <span class="text-muted">发票ID</span>
                            <span class="fs-5">#INV-{{$invoice->id}}</span>
                        </div>
                       
                    </div>
                    <!--end::Order details-->
                    <!--begin::Billing & shipping-->
                    <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                        <div class="flex-root d-flex flex-column">
                            <span class="text-muted">帐单地址</span>
                            <span class="fs-6">XXXX, XXXXX XXXX,
                            <br />XXXXX,
                            <br />XXXXXX,
                            <br />中国.</span>
                        </div>
                        <div class="flex-root d-flex flex-column">
                            <span class="text-muted">收件地址</span>
                            <span class="fs-6">{{$invoice->recipient_name}},
                            <br />+{{$invoice->recipient_phone}},
                            <br />{{$invoice->recipient_address}}
                            </span>
                        </div>
                    </div>
                    <!--end::Billing & shipping-->
                    <!--begin:Order summary-->
                    <div class="d-flex justify-content-between flex-column">
                       
                        <!--begin::Table-->
                        <div class="table-responsive border-bottom mb-9">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <thead>
                                    <tr class="border-bottom fs-6 fw-bold text-muted">
                                        <th class="min-w-175px pb-2">产品</th>
                                        <th class="min-w-70px text-end pb-2">类别</th>
                                        <th class="min-w-80px text-end pb-2">数量</th>
                                        <th class="min-w-100px text-end pb-2">全部的</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <!--begin::Products-->
                                    @foreach ($invoice->orders as $order)
                                        <tr>
                                        <!--begin::Product-->
                                        <td>
                                            {{-- <div class="d-flex align-items-center"> --}}
                                                <!--begin::Title-->
                                                <div class="ms-5">
                                                    <div class="fw-bold">{{$order['product']}}</div>
                                                    <div class="fs-7 text-muted">{{$order['size'].', '.$order['color']}}</div>
                                                </div>
                                                <!--end::Title-->
                                            {{-- </div> --}}
                                        </td>
                                        <!--end::Product-->
                                        <!--begin::SKU-->
                                        <td class="text-end">{{$order['category']}}</td>
                                        <!--end::SKU-->
                                        <!--begin::Quantity-->
                                        <td class="text-end">{{$order['quantity']}}</td>
                                        <!--end::Quantity-->
                                        <!--begin::Total-->
                                        <td class="text-end">${{$order['price']*$order['quantity']}}</td>
                                        <!--end::Total-->
                                    </tr>
                                    @endforeach
                                    
                                    <!--end::Products-->
                                    <!--begin::Subtotal-->
                                    <tr>
                                        
                                    </tr>
                                    <!--end::Subtotal-->
                                    
                                    <!--begin::Shipping-->
                                    <tr>
                                        
                                    </tr>
                                    <!--end::Shipping-->
                                    <!--begin::Grand total-->
                                    <tr>
                                        <td colspan="3" class="fs-3 text-dark fw-bold text-end" style="padding:1em">累计</td>
                                        <td class="text-dark fs-3 fw-bolder text-end">${{$invoice->total}}</td>
                                    </tr>
                                    <!--end::Grand total-->
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                        
                    </div>
                    <!--end:Order summary-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Body-->
            @if($invoice->status)
                <div class="mt-5 mb-1">
                <img src="{{url('storage/uploads/invoices/'.$invoice->id.'.png')}}" />
            </div>
            @else
            <div class="mt-5 mb-1">
                <h5>签名 <span style="color:#ff0000">*</span></h5>
                 <form action="/api/invoice/sign" id="signature-form" method="POST">
                    @csrf
                    <input type="hidden" value="{{$invoice->id}}" name="invoice_id">
                    <div id="sig"></div><input type="hidden" id="input-sign" value="" name="signature" />
                </form>
                <button type="button" class="btn btn-primary" style="padding:.6em 1.2em;font-size:.75rem;" id="clear">
                清除</button>
            </div>
            @endif
            <!-- begin::Footer-->
            <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-7">
                <!-- begin::Actions-->
                <div class="my-1 me-5">
                    <!-- begin::Pint-->
                    <button type="button" class="btn btn-success my-1 me-12" onclick="window.print();">打印发票</button>
                    <!-- end::Pint-->
                    <!-- begin::Download-->
                    <!-- end::Download-->
                </div>
                <!-- end::Actions-->
                <!-- begin::Action-->
                @if(!$invoice->status)
                <button class="btn btn-primary my-1" id="save-invoice">节省</button>
                @endif
                <!-- end::Action-->
            </div>
            <!-- end::Footer-->
        </div>
        <!-- end::Wrapper-->
    </div>
    <!-- end::Body-->
</div>
@endsection

@section('scripts')
@parent
<script src="{{asset('/plugins/node_modules/jq-signature/jq-signature.min.js')}}" ></script>
@if(!$invoice->status)
<script>

var sig = $('#sig').jqSignature();

$('#clear').click(function(){
    sig.jqSignature('clearCanvas');
})

$('#save-invoice').click(function(){
    $('#input-sign').val(sig.jqSignature('getDataURL'));
    $('#signature-form').submit();
})
</script>
@endif
@endsection