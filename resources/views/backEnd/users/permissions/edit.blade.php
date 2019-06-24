@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i> {{ trans('backLang.editPermissions') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.settings') }}</a> /
                    <a href="">{{ trans('backLang.usersPermissions') }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("users")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['permissionsUpdate',$Permissions->id],'method'=>'POST'])}}
                <div class="form-group row">
                    <label for="name"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.title') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('name',$Permissions->name, array('placeholder' => '','class' => 'form-control','id'=>'name','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="analytics_status"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.activeApps') !!}
                    </label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('analytics_status','1',($Permissions->analytics_status==1) ? true : false, array('id' => 'analytics_status')) !!}
                                <i class="dark-white"></i><label
                                        for="analytics_status">{{ trans('backLang.pollAnalytics') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('polls_status','1',($Permissions->polls_status==1) ? true : false, array('id' => 'polls_status')) !!}
                                <i class="dark-white"></i><label
                                        for="polls_status">{{ trans('backLang.polls') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('categories_status','1',($Permissions->categories_status==1) ? true : false, array('id' => 'categories_status')) !!}
                                <i class="dark-white"></i><label
                                        for="categories_status">{{ trans('backLang.categories') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('appusers_status','1',($Permissions->appusers_status==1) ? true : false, array('id' => 'appusers_status')) !!}
                                <i class="dark-white"></i><label
                                        for="appusers_status">{{ trans('backLang.appusers') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('countries_status','1',($Permissions->countries_status==1) ? true : false, array('id' => 'countries_status')) !!}
                                <i class="dark-white"></i><label
                                        for="countries_status">{{ trans('backLang.countries') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('notifications_status','1',($Permissions->notifications_status==1) ? true : false, array('id' => 'notifications_status')) !!}
                                <i class="dark-white"></i><label
                                        for="notifications_status">{{ trans('backLang.notifications') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('settings_status','1',($Permissions->settings_status==1) ? true : false, array('id' => 'settings_status')) !!}
                                <i class="dark-white"></i><label
                                        for="settings_status">{{ trans('backLang.generalSettings') }}</label>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="add_status1"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.addPermission') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('add_status','1',($Permissions->add_status==1) ? true : false, array('id' => 'add_status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('add_status','0',($Permissions->add_status==0) ? true : false, array('id' => 'add_status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="edit_status1"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.editPermission') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('edit_status','1',($Permissions->edit_status==1) ? true : false, array('id' => 'edit_status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('edit_status','0',($Permissions->edit_status==0) ? true : false, array('id' => 'edit_status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="delete_status1"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.deletePermission') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('delete_status','1',($Permissions->delete_status==1) ? true : false, array('id' => 'delete_status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('delete_status','0',($Permissions->delete_status==0) ? true : false, array('id' => 'delete_status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="link_status"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.status') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','1',($Permissions->status==1) ? true : false, array('id' => 'status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.active') }}
                            </label>
                            &nbsp; &nbsp;
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','0',($Permissions->status==0) ? true : false, array('id' => 'status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backLang.notActive') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backLang.update') !!}</button>
                        <a href="{{route("users")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backLang.cancel') !!}</a>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
