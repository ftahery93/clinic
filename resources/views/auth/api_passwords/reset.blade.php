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
                    {{ trans('backend.resetPassword') }}
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ URL::to($url) }}" id="form1">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="md-form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="hidden" class="form-control" id="email" name="email" placeholder="Enter Your Email"
                            value="{{ $email }}" required>
                    </div>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <div class="md-form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" class="md-input" required>
                        <label>{{ trans('backend.newPassword') }}</label>
                    </div>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <div class="md-form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input type="password" name="password_confirmation" class="md-input" required>
                        <label>{{ trans('backend.confirmPassword') }}</label>
                    </div>
                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                    <button type="submit"
                        class="btn primary btn-block p-x-md">{{ trans('backend.resetPassword') }}</button>
                </form>
            </div>
        </div>
        <!-- ############ LAYOUT END-->
    </div>
    @include('backend.includes.foot')
</body>

</html>