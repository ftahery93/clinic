<!DOCTYPE html>
<html  lang="{{ trans('backend.code') }}" dir="{{ trans('backend.direction') }}">
<head>
    @include('backend.includes.head')
    @yield('headerInclude')
</head>
<body>
<div class="app" id="app">
    <!-- ############ LAYOUT START-->
    <!-- aside -->
    @include('backend.includes.menu')
    <!-- / aside -->
    <!-- content -->
    <div id="content" class="app-content box-shadow-z0" role="main">
        @include('backend.includes.header')
        @include('backend.includes.footer')
        <div ui-view class="app-body" id="view">
            <!-- ############ PAGE START-->
                @include('backend.includes.errors')
                @yield('content')
            <!-- ############ PAGE END-->
        </div>
    </div>
    <!-- / -->
    <!-- theme switcher -->
    @include('backend.includes.settings')
    <!-- / -->
    <!-- ############ LAYOUT END-->
</div>
@include('backend.includes.foot')
@yield('footerInclude')
</body>
</html>
