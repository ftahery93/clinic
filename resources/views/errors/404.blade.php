<!DOCTYPE html>
<html  lang="{{ trans('backend.code') }}" dir="{{ trans('backend.direction') }}">
<head>
    @include('backend.includes.head')
</head>
<body>

<div class="app" id="app">

    <!-- ############ LAYOUT START-->

    <!-- content -->
    <div class="app-body indigo bg-auto w-full">
        <div class="text-center pos-rlt p-y-md">
            <h1 class="text-shadow text-white text-4x">
                <span class="text-2x font-bold block m-t-lg">404</span>
            </h1>
            <p class="h5 m-y-lg text-u-c font-bold">{{ trans('backend.notFound') }}.</p>
            <a href="{{ URL::previous() }}" class="md-btn amber-700 md-raised p-x-md">
                <span class="text-white">{{ trans('backend.returnTo') }} <i class="material-icons">&#xe5c4;</i></span>
            </a>
        </div>
    </div>
    <!-- / -->


    <!-- ############ LAYOUT END-->

</div>


@include('backend.includes.foot')
@yield('footerInclude')
</body>
</html>
