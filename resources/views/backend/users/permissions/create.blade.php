@extends('backend.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe03b;</i> {{ trans('backend.newPermissions') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                    <a href="">{{ trans('backend.settings') }}</a> /
                    <a href="">{{ trans('backend.usersPermissions') }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("users_list")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['permissions_store'],'method'=>'POST'])}}

                <div class="form-group row">
                    <label for="name"
                           class="col-sm-2 form-control-label">{!!  trans('backend.title') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('name','', array('placeholder' => '','class' => 'form-control','id'=>'name','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="analytics_status"
                           class="col-sm-2 form-control-label">{!!  trans('backend.activeApps') !!}
                    </label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('companyusers_status','1',false, array('id' => 'companyusers_status')) !!}
                                <i class="dark-white"></i><label
                                        for="companyusers_status">{{ trans('backend.company_users') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('registeredusers_status','1',false, array('id' => 'registeredusers_status')) !!}
                                <i class="dark-white"></i><label
                                        for="registeredusers_status">{{ trans('backend.registered_users') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('categories_status','1',false, array('id' => 'categories_status')) !!}
                                <i class="dark-white"></i><label
                                        for="categories_status">{{ trans('backend.categories') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('shipments_status','1',false, array('id' => 'shipments_status')) !!}
                                <i class="dark-white"></i><label
                                        for="shipments_status">{{ trans('backend.shipments') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('transactions_status','1',false, array('id' => 'transactions_status')) !!}
                                <i class="dark-white"></i><label
                                        for="transactions_status">{{ trans('backend.transactions') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('notifications_status','1',false, array('id' => 'notifications_status')) !!}
                                <i class="dark-white"></i><label
                                        for="notifications_status">{{ trans('backend.notifications') }}</label>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                {!! Form::checkbox('settings_status','1',false, array('id' => 'settings_status')) !!}
                                <i class="dark-white"></i><label
                                        for="settings_status">{{ trans('backend.generalSettings') }}</label>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="add_status1"
                           class="col-sm-2 form-control-label">{!!  trans('backend.addPermission') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('add_status','1',true, array('id' => 'add_status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backend.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('add_status','0',false, array('id' => 'add_status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backend.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="edit_status1"
                           class="col-sm-2 form-control-label">{!!  trans('backend.editPermission') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('edit_status','1',true, array('id' => 'edit_status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backend.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('edit_status','0',false, array('id' => 'edit_status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backend.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="delete_status1"
                           class="col-sm-2 form-control-label">{!!  trans('backend.deletePermission') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('delete_status','1',true, array('id' => 'delete_status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backend.yes') }}
                            </label>
                            <br>
                            <label class="ui-check ui-check-md" style="margin-bottom: 5px;">
                                {!! Form::radio('delete_status','0',false, array('id' => 'delete_status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backend.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backend.add') !!}</button>
                        <a href="{{route("users_list")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backend.cancel') !!}</a>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection
