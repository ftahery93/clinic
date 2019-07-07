@extends('backend.layout')
@section('headerInclude')
    <link rel="stylesheet" type="text/css" href="{{ URL::to("backEnd/assets/styles/flags.css") }}"/>
@endsection
@section('content')
    <div class="padding p-b-0">
        <div class="margin">
            <h5 class="m-b-0 _300">{{ trans('backend.hi') }} <span class="text-primary">{{ Auth::user()->name }}</span>, {{ trans('backend.welcome') }}
            </h5>
        </div>
        <div class="row m-b">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="box-color p-a-3 primary">
                    <div class="pull-right m-l">
                        <span class="w-56 dker text-center rounded">
                        <i class="text-lg material-icons">&#xe7fb;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h6 class="text-muted">{{ trans('backend.company_users') }}</h6>
                        <h3 class="m-a-0 text-lg"><a href="{{ route("company_users_list") }}">{{ $NumberofCompanyUsers }}</a></h3>
                    </div>
                </div>
                <div class="box-color p-a-3 success">
                    <div class="pull-right m-l">
                        <span class="w-56 dker text-center rounded">
                        <i class="text-lg material-icons">&#xe7fb;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h6 class="text-muted">{{ trans('backend.registered_users') }}</h6>
                        <h3 class="m-a-0 text-lg"><a href="{{ route("registered_users_list") }}">{{ $NumberofRegisteredUsers }}</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
