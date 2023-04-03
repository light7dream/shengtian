@section('toolbar')
<div id="kt_app_toolbar" class="app-toolbar pt-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
        <!--begin::Toolbar container-->
        <div class="d-flex flex-column flex-row-fluid">
            <!--begin::Toolbar wrapper-->
            <div class="d-flex align-items-center pt-1">
                <!--begin::Breadcrumb-->
                {{-- <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-white fw-bold lh-1">
                        <a href="#" class="text-white">
                            <i class="fonticon-home text-white fs-3"></i>
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-4 svg-icon-white mx-n1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-white fw-bold lh-1">Dashboards</li>
                    <!--end::Item-->
                </ul> --}}
                <!--end::Breadcrumb-->
            </div>
            <!--end::Toolbar wrapper=-->
            <!--begin::Toolbar wrapper flex-stack =-->
            <div class="d-flex flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pb-18 py-lg-13">
                <!--begin::Page title-->
                <div class="page-title d-flex align-items-center me-3">
                    <img alt="Logo" src="{{asset('admin/assets/media/svg/misc/layer.svg')}}" class="h-60px me-5" />
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">{{$title}}
                    <!--begin::Description-->
                    <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4"></span>
                    <!--end::Description--></h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Items-->
                <div class="text-center gap-2">
                    <!--begin::Item-->
                    @if(Request::is('admin/catalog/products'))   
                    <div class="my flex-column">
                        <a href="/admin/catalog/products" class="btn {{request()->query('type') === null?'bg-blue':'bg-black'}} btn-primary" >All Goods</a>
                    </div> 
                      @foreach($categories as $category)
                        <div class="my flex-column">
                            <a href="/admin/catalog/products?type={{$category->id}}" class="btn  {{request()->query('type') == ''.$category->id?'bg-blue':'bg-black'}} btn-primary" >{{$category->name}}</a>
                        </div>
                      @endforeach
                        
                    @endif


                    @if(Request::is('admin/sales/orders'))    

                        <div class="my flex-column">
                            <a href="/admin/sales/orders" class="btn {{request()->query('status') === null?'bg-blue':'bg-black'}} btn-primary" >Total Order</a>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="my flex-column">
                            <a href="/admin/sales/orders?status=0" class="btn  {{request()->query('status') === '0'?'bg-blue':'bg-black'}} btn-primary" >Unprocessed</a>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="my flex-column">
                            <a href="/admin/sales/orders?status=1" class="btn  {{request()->query('status') === '1'?'bg-blue':'bg-black'}} btn-primary" >Preparation</a>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="my flex-column">
                            <a href="/admin/sales/orders?status=2" class="btn  {{request()->query('status') === '2'?'bg-blue':'bg-black'}} btn-primary" >Shipped</a>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="my flex-column">
                            <a href="/admin/sales/orders?status=3" class="btn  {{request()->query('status') === '3'?'bg-blue':'bg-black'}} btn-primary" >Completed</a>
                        </div>
                        <!--end::Item-->
                    @endif

                        @if(Request::is('admin/supports/about-points') || Request::is('admin/supports/rule-clause') ||  Request::is('admin/supports/faq') || Request::is('admin/supports/online-service') )    

                            <div class="my flex-column">
                                <a href="/admin/supports/about-points" class="btn {{Request::is('admin/supports/about-points')?'bg-blue':'bg-black'}} btn-primary" >About points</a>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="my flex-column">
                                <a href="/admin/supports/rule-clause" class="btn  {{Request::is('admin/supports/rule-clause')?'bg-blue':'bg-black'}} btn-primary" >Rule and Clauses</a>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="my flex-column">
                                <a href="/admin/supports/faq" class="btn  {{Request::is('admin/supports/faq')?'bg-blue':'bg-black'}} btn-primary" >Frequently Asked</a>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="my flex-column">
                                <a href="/admin/supports/online-service" class="btn {{Request::is('admin/supports/online-service')?'bg-blue':'bg-black'}} btn-primary" >Online Service</a>
                            </div>
                    @endif
                </div>
                <!--end::Items-->
            </div>
            <!--end::Toolbar wrapper=-->
        </div>
        <!--end::Toolbar container=-->
    </div>
    <!--end::Toolbar container-->
</div>
@endsection
