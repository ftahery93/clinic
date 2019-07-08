<?php
// Current Full URL
$fullPagePath = Request::url();
// Char Count of Backend folder Plus 1
$envAdminCharCount = strlen(env('BACKEND_PATH')) + 1;
// URL after Root Path EX: admin/home
$urlAfterRoot = substr($fullPagePath, strpos($fullPagePath, env('BACKEND_PATH')) + $envAdminCharCount);
?>

<div id="aside" class="app-aside modal fade folded md nav-expand">
    <div class="left navside dark dk" layout="column">
        <div class="navbar navbar-md no-radius">
            <!-- brand -->
            <a class="navbar-brand" href="{{ route('adminHome') }}">
                <img src="{{ URL::to('backEnd/assets/images/logo.png') }}" alt="Control">
            </a>
            <!-- / brand -->
        </div>
        <div flex class="hide-scroll">
            <nav class="scroll nav-active-primary">
                <ul class="nav" ui-nav>
                    <li class="nav-header hidden-folded">
                        <small class="text-muted">{{ trans('backend.main') }}</small>
                    </li>
                    <li>
                        <a href="{{ route('adminHome') }}" onclick="location.href='{{ route('adminHome') }}'">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe3fc;</i>
                            </span>
                            <span class="nav-text">{{ trans('backend.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="nav-header hidden-folded">
                        <small class="text-muted">{{ trans('backend.siteData') }}</small>
                    </li>

                    {{-- Shipments and Transactions --}}
                    @if(Helper::GeneralWebmasterSettings("shipments_status"))
                        @if(@Auth::user()->permissionsGroup->shipments_status)
                            <?php
                            $currentFolder = "shipments"; // Put folder name here
                            $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                            ?>
                            <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }} >
                                <a href="{{ route('shipments_list') }}">
                                    <span class="nav-icon">
                                    <i class="material-icons">local_shipping</i>
                                    </span>
                                    <span class="nav-text">{{ trans('backend.shipments') }}</span>
                                </a>
                            </li>
                        @endif
                    @endif

                    {{-- Application Users --}}
                    @if(Helper::GeneralWebmasterSettings("registeredusers_status"))
                        @if(@Auth::user()->permissionsGroup->registeredusers_status)
                            <?php
                            $currentFolder = "registered_users"; // Put folder name here
                            $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                            ?>
                            <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                <a href="{{ route('registered_users_list') }}">
                                    <span class="nav-icon">
                                        <i class="material-icons">account_circle</i>
                                    </span>
                                    <span class="nav-text">{{ trans('backend.registered_users') }}</span>
                                </a>
                            </li>
                        @endif
                    @endif

                    {{-- Company Users --}}
                    @if(Helper::GeneralWebmasterSettings("companyusers_status"))
                        @if(@Auth::user()->permissionsGroup->companyusers_status)
                            <?php
                            $currentFolder = "company_users"; // Put folder name here
                            $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                            ?>
                            <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }} >
                                <a href="{{ route('company_users_list') }}">
                                    <span class="nav-icon">
                                    <i class="material-icons">account_circle</i>
                                    </span>
                                    <span class="nav-text">{{ trans('backend.company_users') }}</span>
                                </a>
                            </li>
                        @endif
                    @endif

                    {{-- Categories --}}
                    @if(Helper::GeneralWebmasterSettings("categories_status"))
                        @if(@Auth::user()->permissionsGroup->categories_status)
                            <?php
                            $currentFolder = "categories"; // Put folder name here
                            $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                            ?>
                            <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }} >
                                <a href="{{ route('categories_list') }}">
                                    <span class="nav-icon">
                                    <i class="material-icons">list</i>
                                    </span>
                                    <span class="nav-text">{{ trans('backend.categories') }}</span>
                                </a>
                            </li>
                        @endif
                    @endif

                    {{-- Notifications --}}
                    @if(Helper::GeneralWebmasterSettings("notifications_status"))
                        @if(@Auth::user()->permissionsGroup->notifications_status)
                            <?php
                            $currentFolder = "notifications"; // Put folder name here
                            $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                            ?>
                            <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                <a href="{{ route('notifications_list') }}">
                                    <span class="nav-icon">
                                        <i class="material-icons">notifications</i>
                                        </span>
                                    <span class="nav-text">{{ trans('backend.siteInbox') }}</span>
                                </a>
                            </li>
                        @endif
                    @endif

                    {{-- Settings --}}
                    @if(Helper::GeneralWebmasterSettings("settings_status"))
                        @if(@Auth::user()->permissionsGroup->settings_status)
                            <li class="nav-header hidden-folded">
                                <small class="text-muted">{{ trans('backend.settings') }}</small>
                            </li>
                            <?php
                            $currentFolder = "settings"; // Put folder name here
                            $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                            $currentFolder2 = "users"; // Put folder name here
                            $PathCurrentFolder2 = substr($urlAfterRoot, 0, strlen($currentFolder2));
                            ?>
                            <li {{ ($PathCurrentFolder==$currentFolder || $PathCurrentFolder2==$currentFolder2 ) ? 'class=active' : '' }}>
                                <a>
                                    <span class="nav-caret">
                                        <i class="fa fa-caret-down"></i>
                                    </span>
                                    <span class="nav-icon">
                                        <i class="material-icons">&#xe8b8;</i>
                                    </span>
                                    <span class="nav-text">{{ trans('backend.generalSiteSettings') }}</span>
                                </a>
                                <ul class="nav-sub">
                                    <?php
                                    $currentFolder = "settings"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a href="{{ route('settings') }}"
                                           onclick="location.href='{{ route('settings') }}'">
                                            <span class="nav-text">{{ trans('backend.generalSettings') }}</span>
                                        </a>
                                    </li>
                                    <?php
                                    $currentFolder = "commissions"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a href="{{ route('commissions_setting') }}"
                                           onclick="location.href='{{ route('commissions_setting') }}'">
                                            <span class="nav-text">{{ trans('backend.commissions_setting') }}</span>
                                        </a>
                                    </li>
                                    <?php
                                    $currentFolder = "price"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a href="{{ route('price_setting') }}"
                                           onclick="location.href='{{ route('price_setting') }}'">
                                            <span class="nav-text">{{ trans('backend.price_setting') }}</span>
                                        </a>
                                    </li>
                                    <?php
                                    $currentFolder = "wallets"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a href="{{ route('wallet_offers_list') }}"
                                           onclick="location.href='{{ route('wallet_offers_list') }}'">
                                            <span class="nav-text">{{ trans('backend.wallet_offers') }}</span>
                                        </a>
                                    </li>
                                    <?php
                                    $currentFolder = "languageManagement"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a href="{{ route('adminLanguages') }}">
                                            <span class="nav-text">{{ trans('backend.languageManagement') }}
                                            </span>
                                        </a>
                                    </li>
                                    <?php
                                    $currentFolder = "users"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a href="{{ route('users') }}">
                                            <span class="nav-text">{{ trans('backend.usersPermissions') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endif
                </ul>
            </nav>
        </div>
        <div flex-no-shrink>
            <div>
                <nav ui-nav>
                    <ul class="nav">
                        <li>
                            <div class="b-b b m-t-sm"></div>
                        </li>
                        <li class="no-bg">
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="nav-icon"><i class="material-icons">&#xe8ac;</i></span>
                                <span class="nav-text">{{ trans('backend.logout') }}</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>