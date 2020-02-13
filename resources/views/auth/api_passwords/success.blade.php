<!DOCTYPE html>
<html lang="{{ trans('backend.code') }}" dir="{{ trans('backend.direction') }}">

<head>
    @include('backend.includes.head')
</head>

<body>
    <div class="app" id="app">
        <!-- ############ LAYOUT START-->
        <div class="center-block w-xxl w-auto-xs p-y-md">
            <div class="navbar">
                <div class="pull-center">
                    <div>
                        <a class="navbar-brand"><img src="{{ URL::to('backEnd/assets/images/logo.png') }}" alt=".">

                        </a>
                    </div>
                </div>
            </div>
            <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
                <div class="m-b">
                    @if ($success)
                    <div class="login-content">
                        <div class="alert alert-success">
                            {{ $success }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- ############ LAYOUT END-->
        </div>
        @include('backend.includes.foot')
</body>

</html>