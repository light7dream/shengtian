@section('header')
<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
    <!--begin::Header container-->
    <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
        <!--begin::Header mobile toggle-->
        
        <!--end::Header mobile toggle-->
        <!--begin::Logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
            <a href="/">
                <img alt="Logo" src="{{asset('admin/assets/media/logos/logo.png')}}" class="h-24px d-sm-none" style="height: 36px" />
                <img alt="Logo" src="{{asset('admin/assets/media/logos/logo.png')}}" class="h-36px d-none d-sm-inline app-sidebar-logo-default theme-light-show" style="height: 36px" />
                <img alt="Logo" src="{{asset('admin/assets/media/logos/logo.png')}}" class="h-36px d-none d-sm-inline app-sidebar-logo-default theme-dark-show "  style="height: 36px"/>
            </a>
        </div>
        <!--end::Logo-->
        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
                        <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <!--begin::Menu wrapper-->
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <!--begin::Menu-->
                <div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                    <!--begin:Menu item-->
                    <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                          <a class="menu-title" href="/admin/catalog/products">产品管理</a>
                        </span>
                    </div>
                    <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                          <a class="menu-title" href="/admin/sales/orders">订单管理</a>
                        </span>
                    </div>
                    <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                          <a class="menu-title" href="/admin/supports/about-points">客户中心管理</a>
                        </span>
                    </div>
                    <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                          <a class="menu-title" href="/admin/members">添加会员</a>
                        </span>
                    </div>
                    <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                          <a class="menu-title" href="/admin/catalog/categories">分类管理</a>
                        </span>
                    </div>
                    <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                          <a class="menu-title" href="/admin/setting/banner">广告管理</a>
                        </span>
                    </div>
                    <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                          <a class="menu-title" href="/admin/game-official-site">修改游戏官方连接</a>
                        </span>
                    </div>
                    <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                          <a class="menu-title" href="/admin/password/change">修改管理员密码</a>
                        </span>
                    </div>
                    <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                          <a class="menu-title" href="/">进入用户页面</a>
                        </span>
                    </div>
                    <div class='menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2 text-center' style="border-bottom:0" id="translator">
                    <style>
                            .goog-te-menu-frame,.goog-te-balloon-frame{
                                box-shadow:none!important
                                }
                            .goog-te-gadget-simple{
                                background-color:transparent;
                                border: 0 !important;;
                                border-radius:5px;
                                padding:5px 10px;
                                /* box-shadow:0 2px 10px -7px rgba(0,0,0,0.2); */
                                font-size:0;
                                }
                    </style>
                    <div id="g_translater" style="margin: auto">
                        <div id="google_translate_element" ></div>
                    </div>
                    <!-- <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                            <div class="symbol symbol-50px me-5">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#aaaaaa" fill-rule="nonzero"/>
                                    </g>
                                </svg></span> 
                            </div>
                            <div class="d-flex flex-column">
                                <div class="fw-bold d-flex align-items-center fs-5">@if(Session::get('user')){{Session::get('user')->user_name}}@endif
                                <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2"></span></div>
                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7"></a>
                            </div>
                        </div>
                    </div> -->
                    </div>
                    <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2 text-end">
                        <form action="/api/member/logout" id="logout_form" method="POST">
                            @csrf
                            <a href="javascript::(0);" id="signout" class="menu-link">登出</a>
                        </form>
                    </div>
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
               
                <!--end::Quick links-->
                
                <!--begin::User menu-->
               
                <!--end::User menu-->
                <!--begin::Header menu toggle-->
                <!--end::Header menu toggle-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>
@endsection