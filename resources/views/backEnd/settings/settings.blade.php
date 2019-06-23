@extends('backEnd.layout')
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
                                    &nbsp; {!!  trans('backLang.siteInfoSettings') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block {{ ( Session::has('statusTab') ? 'active' : '') }}" href
                                   data-toggle="tab" data-target="#tab-4"><i class="material-icons">&#xe8c6;</i>
                                    &nbsp; {!!  trans('backLang.siteStatusSettings') !!}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-lg-10 light lt">
                <div class="tab-content pos-rlt">
                    <div class="tab-pane {{ ((!Session::has('statusTab') && !Session::has('styleTab') && !Session::has('socialTab') && !Session::has('contactsTab')) ? 'active' : '') }}"
                         id="tab-1">
                        {{Form::open(['route'=>['settingsUpdateSiteInfo'],'method'=>'POST'])}}
                        <div class="p-a-md dker _600"><i class="material-icons">&#xe30c;</i>
                            &nbsp; {!!  trans('backLang.siteInfoSettings') !!}</div>
                        <div class="p-a-md col-md-12">
                            <div class="form-group">
                                <label>{!!  trans('backLang.websiteUrl') !!}</label>
                                {!! Form::text('site_url',$Setting->site_url, array('placeholder' => 'http//:www.sitename.com/','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.websiteTitle') !!} {!!  trans('backLang.englishBox') !!} </label>
                                {!! Form::text('site_title_en',$Setting->site_title_en, array('placeholder' => 'http//:www.sitename.com/','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.websiteTitle') !!} {!!  trans('backLang.arabicBox') !!} </label>
                                {!! Form::text('site_title_ar',$Setting->site_title_ar, array('placeholder' => 'http//:www.sitename.com/','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <button type="submit" class="btn btn-info m-t">{{ trans('backLang.update') }}</button>
                        </div>
                        {{Form::close()}}
                    </div>
                    <div class="tab-pane {{ ( Session::has('statusTab') ? 'active' : '') }}" id="tab-4">
                        {{Form::open(['route'=>['settingsUpdateSiteStatus'],'method'=>'POST'])}}
                        <div class="p-a-md dker _600"><i class="material-icons">&#xe8c6;</i>
                            &nbsp; {!!  trans('backLang.siteStatusSettings') !!}</div>
                        <div class="p-a-md col-md-12">
                            <div class="form-group">
                                <label>{!!  trans('backLang.currentAndroidAppVersion') !!}</label>
                                {!! Form::text('android_version',$Setting->android_version, array('placeholder' => 'Current Android App version','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.currentiOSAppVersion') !!}</label>
                                {!! Form::text('ios_version',$Setting->ios_version, array('placeholder' => 'Current iOS App version','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('backLang.maintenanceMode') }} : </label>
                                <div class="radio">
                                    <label class="ui-check ui-check-md">
                                        {!! Form::radio('maintenance_mode','1',$Setting->maintenance_mode ? true : false , array('id' => 'maintenance_mode1','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    &nbsp; &nbsp;
                                    <label class="ui-check ui-check-md">
                                        {!! Form::radio('maintenance_mode','0',$Setting->maintenance_mode ? false : true , array('id' => 'maintenance_mode2','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group"
                                 id="close_msg_div1" {!! ($Setting->maintenance_mode) ? "":"style='display:none'" !!}>
                                <label>{!!  trans('backLang.siteStatusSettingsMsg') !!} {!!  trans('backLang.arabicBox') !!} </label>
                                {!! Form::textarea('maintenance_message_en',$Setting->maintenance_message_ar, array('placeholder' => trans('backLang.siteStatusSettingsMsg'),'class' => 'form-control','rows'=>'4')) !!}
                            </div>
                            <div class="form-group"
                                 id="close_msg_div2" {!! ($Setting->maintenance_mode) ? "":"style='display:none'" !!}>
                                <label>{!!  trans('backLang.siteStatusSettingsMsg') !!} {!!  trans('backLang.englishBox') !!} </label>
                                {!! Form::textarea('maintenance_message_ar',$Setting->maintenance_message_en, array('placeholder' => trans('backLang.siteStatusSettingsMsg'),'class' => 'form-control','rows'=>'4')) !!}
                            </div>
                            <button type="submit" class="btn btn-info m-t">{{ trans('backLang.update') }}</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('footerInclude')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#maintenance_mode2").click(function () {
                $("#close_msg_div1").css("display", "none");
                $("#close_msg_div2").css("display", "none");
            });
            $("#maintenance_mode1").click(function () {
                $("#close_msg_div1").css("display", "block");
                $("#close_msg_div2").css("display", "block");
            });
        });
    </script>
@endsection

