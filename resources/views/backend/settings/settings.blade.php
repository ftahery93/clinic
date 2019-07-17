@extends('backend.layout')
@section('headerInclude')
    <link rel="stylesheet"
          href="{{ URL::to('backEnd/libs/jquery/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}"
          type="text/css"/>
@endsection
@section('content')
    <div class="padding">
        <div class="row-col">
            <div class="col-sm-3 col-lg-2">
                <div class="p-y">
                    <div class="nav-active-border left b-primary">
                        <ul class="nav nav-sm">
                            <li class="nav-item">
                                <a class="nav-link block {{ ((!Session::has('statusTab') && !Session::has('styleTab') && !Session::has('socialTab') && !Session::has('contactsTab')) ? 'active' : '') }}"
                                   href data-toggle="tab" data-target="#tab-1"><i class="material-icons">&#xe30c;</i>
                                    &nbsp; {!!  trans('backend.siteInfoSettings') !!}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-lg-10 light lt">
                <div class="tab-content pos-rlt">
                    <div class="tab-pane {{ ((!Session::has('statusTab') && !Session::has('styleTab') && !Session::has('socialTab') && !Session::has('contactsTab')) ? 'active' : '') }}"
                         id="tab-1">
                        {{Form::open(['route'=>['site_settings_update'],'method'=>'POST'])}}
                        <div class="p-a-md dker _600"><i class="material-icons">&#xe30c;</i>
                            &nbsp; {!!  trans('backend.siteInfoSettings') !!}</div>
                        <div class="p-a-md col-md-12">
                            <div class="form-group">
                                <label>{!!  trans('backend.websiteUrl') !!}</label>
                                {!! Form::text('site_url',$Setting->site_url, array('placeholder' => 'http//:www.sitename.com/','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backend.websiteTitle') !!} {!!  trans('backend.englishBox') !!} </label>
                                {!! Form::text('site_title_en',$Setting->site_title_en, array('placeholder' => 'http//:www.sitename.com/','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backend.websiteTitle') !!} {!!  trans('backend.arabicBox') !!} </label>
                                {!! Form::text('site_title_ar',$Setting->site_title_ar, array('placeholder' => 'http//:www.sitename.com/','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                            <button type="submit" class="btn btn-info m-t">{{ trans('backend.update') }}</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


