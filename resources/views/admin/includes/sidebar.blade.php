<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main"> Home </span></a>
            </li>

            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> ADs </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\ADS::count()}}</span>
                </a>
                <ul class="menu-content">



                    <li> <a class="menu-item" href="{{route('ads.all_ads')}}" data-i18n="nav.dash.crypto"> All ADs </a>
                    </li>

                     <li> <a class="menu-item" href="{{route('admin.ads.create')}}" data-i18n="nav.dash.crypto"> New AD </a>
                    </li>
                </ul>
            </li>








        </ul>
    </div>
</div>
