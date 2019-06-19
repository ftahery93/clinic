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
                        <small class="text-muted">{{ trans('backLang.main') }}</small>
                    </li>
                    <li>
                        <a href="{{ route('adminHome') }}" onclick="location.href='{{ route('adminHome') }}'">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe3fc;</i>
                            </span>
                            <span class="nav-text">{{ trans('backLang.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="nav-header hidden-folded">
                        <small class="text-muted">{{ trans('backLang.siteData') }}</small>
                    </li>

                    {{-- Polls --}}
                    @if(Helper::GeneralWebmasterSettings("polls_status"))
                        @if(@Auth::user()->permissionsGroup->categories_status)
                            <?php
                            $currentFolder = "polls"; // Put folder name here
                            $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                            ?>
                            <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }} >
                                <a href="{{ route('adminPolls') }}">
                                    <span class="nav-icon">
                                    <i class="material-icons">description</i>
                                    </span>
                                    <span class="nav-text">{{ trans('backLang.polls') }}</span>
                                </a>
                            </li>
                        @endif
                    @endif

                    {{-- Poll Analytics --}}
                    @if(Helper::GeneralWebmasterSettings("analytics_status"))
                        @if(@Auth::user()->permissionsGroup->analytics_status)
                            <?php
                                $currentFolder = "analytics"; // Put folder name here
                                $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                $currentFolder2 = "ip"; // Put folder name here
                                $PathCurrentFolder2 = substr($urlAfterRoot, 0, strlen($currentFolder2));
                                $currentFolder3 = "visitors"; // Put folder name here
                                $PathCurrentFolder3 = substr($urlAfterRoot, 0, strlen($currentFolder3));
                            ?>
                            <li {{ ($PathCurrentFolder==$currentFolder || $PathCurrentFolder2==$currentFolder2  || $PathCurrentFolder3==$currentFolder3) ? 'class=active' : '' }}>
                                <a>
                                    <span class="nav-caret">
                                        <i class="fa fa-caret-down"></i>
                                    </span>
                                    <span class="nav-icon">
                                        <i class="material-icons">&#xe1b8;</i>
                                    </span>
                                    <span class="nav-text">{{ trans('backLang.pollAnalytics') }}</span>
                                </a>
                                <ul class="nav-sub">
                                    <li>
                                        <a onclick="location.href='{{ route('analytics', 'date') }}'">
                                            <span class="nav-text">{{ trans('backLang.visitorsAnalyticsBydate') }}</span>
                                        </a>
                                    </li>

                                    <?php
                                    $currentFolder = "analytics/country"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a onclick="location.href='{{ route('analytics', 'country') }}'">
                                            <span class="nav-text">{{ trans('backLang.visitorsAnalyticsByCountry') }}</span>
                                        </a>
                                    </li>

                                    <?php
                                    $currentFolder = "analytics/city"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a onclick="location.href='{{ route('analytics', 'city') }}'">
                                            <span class="nav-text">{{ trans('backLang.visitorsAnalyticsByCity') }}</span>
                                        </a>
                                    </li>

                                    <?php
                                    $currentFolder = "analytics/os"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a onclick="location.href='{{ route('analytics', 'os') }}'">
                                            <span class="nav-text">{{ trans('backLang.visitorsAnalyticsByOperatingSystem') }}</span>
                                        </a>
                                    </li>

                                    <?php
                                    $currentFolder = "analytics/browser"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a onclick="location.href='{{ route('analytics', 'browser') }}'">
                                            <span class="nav-text">{{ trans('backLang.visitorsAnalyticsByBrowser') }}</span>
                                        </a>
                                    </li>

                                    <?php
                                    $currentFolder = "analytics/referrer"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a onclick="location.href='{{ route('analytics', 'referrer') }}'">
                                            <span class="nav-text">{{ trans('backLang.visitorsAnalyticsByReachWay') }}</span>
                                        </a>
                                    </li>
                                    <?php
                                    $currentFolder = "analytics/hostname"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a onclick="location.href='{{ route('analytics', 'hostname') }}'">
                                            <span class="nav-text">{{ trans('backLang.visitorsAnalyticsByHostName') }}</span>
                                        </a>
                                    </li>
                                    <?php
                                    $currentFolder = "analytics/org"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a onclick="location.href='{{ route('analytics', 'org') }}'">
                                            <span class="nav-text">{{ trans('backLang.visitorsAnalyticsByOrganization') }}</span>
                                        </a>
                                    </li>
                                    <?php
                                    $currentFolder = "visitors"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a onclick="location.href='{{ route('visitors') }}'">
                                            <span class="nav-text">{{ trans('backLang.visitorsAnalyticsVisitorsHistory') }}</span>
                                        </a>
                                    </li>
                                    <?php
                                    $currentFolder = "ip"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a href="{{ route('visitorsIP') }}">
                                            <span class="nav-text">{{ trans('backLang.visitorsAnalyticsIPInquiry') }}</span>
                                        </a>
                                    </li>
                                </ul>
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
                                <a href="{{ route('adminCategories') }}">
                                    <span class="nav-icon">
                                    <i class="material-icons">list</i>
                                    </span>
                                    <span class="nav-text">{{ trans('backLang.categories') }}</span>
                                </a>
                            </li>
                        @endif
                    @endif

                    {{-- Application Users --}}
                    @if(Helper::GeneralWebmasterSettings("appusers_status"))
                        @if(@Auth::user()->permissionsGroup->appusers_status)
                            <?php
                            $currentFolder = "appusers"; // Put folder name here
                            $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                            ?>
                            <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                <a href="{{ route('adminAppusers') }}">
                                    <span class="nav-icon">
                                        <i class="material-icons">account_circle</i>
                                    </span>
                                    <span class="nav-text">{{ trans('backLang.appusers') }}</span>
                                </a>
                            </li>
                        @endif
                    @endif

                    {{-- Notifications --}}
                    @if(Helper::GeneralWebmasterSettings("inbox_status"))
                        @if(@Auth::user()->permissionsGroup->inbox_status)
                            <?php
                            $currentFolder = "webmails"; // Put folder name here
                            $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                            ?>
                            <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                <a href="{{ route('webmails') }}">
                                    <span class="nav-icon">
                                        <i class="material-icons">&#xe156;</i>
                                        </span>
                                    <span class="nav-text">{{ trans('backLang.siteInbox') }}
                                        @if( Helper::webmailsNewCount() >0)
                                            <badge class="label warn m-l-xs">{{ Helper::webmailsNewCount() }}</badge>
                                        @endif
                                    </span>

                                </a>
                            </li>
                        @endif
                    @endif

                    {{-- Settings --}}
                    @if(Helper::GeneralWebmasterSettings("settings_status"))
                        @if(@Auth::user()->permissionsGroup->settings_status)
                            <li class="nav-header hidden-folded">
                                <small class="text-muted">{{ trans('backLang.settings') }}</small>
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
                                    <span class="nav-text">{{ trans('backLang.generalSiteSettings') }}</span>
                                </a>
                                <ul class="nav-sub">
                                    <?php
                                    $currentFolder = "settings"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a href="{{ route('settings') }}"
                                           onclick="location.href='{{ route('settings') }}'">
                                            <span class="nav-text">{{ trans('backLang.generalSettings') }}</span>
                                        </a>
                                    </li>
                                    <?php
                                    $currentFolder = "users"; // Put folder name here
                                    $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                                    ?>
                                    <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                                        <a href="{{ route('users') }}">
                                            <span class="nav-text">{{ trans('backLang.usersPermissions') }}</span>
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
                                <span class="nav-text">{{ trans('backLang.logout') }}</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>