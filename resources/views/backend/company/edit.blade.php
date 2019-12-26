@extends('backend.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i> {{ trans('backend.company_users_edit') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                    <a href="">{{ trans('backend.company_users') }}</a>
                </small>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['company_users_update',$CompanyUser->id],'method'=>'POST', 'files' => true])}}
                    @if(Helper::GeneralWebmasterSettings("companyusers_status"))
                        <div class="form-group row">
                            <label for="name"
                                class="col-sm-2 form-control-label">{!!  trans('backend.name') !!}
                            </label>
                            <div class="col-sm-10">
                                {!! Form::text('name',$CompanyUser->name, array('placeholder' => '','class' => 'form-control','id'=>'name','required'=>'', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                        </div>
                    @endif
                    @if(Helper::GeneralWebmasterSettings("companyusers_status"))
                        <div class="form-group row">
                            <label for="email"
                            class="col-sm-2 form-control-label">{!!  trans('backend.email') !!}
                            </label>
                            <div class="col-sm-10">
                            {!! Form::text('email',$CompanyUser->email, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                        </div>
                    @endif
                    @if(Helper::GeneralWebmasterSettings("companyusers_status"))
                        <div class="form-group row">
                            <label for="mobile"
                            class="col-sm-2 form-control-label">{!!  trans('backend.mobile') !!}
                            </label>
                            <div class="col-sm-10">
                            {!! Form::text('mobile',$CompanyUser->mobile, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                        </div>
                    @endif 
                    @if(Helper::GeneralWebmasterSettings("companyusers_status"))
                        <div class="form-group row">
                            <label for="phone"
                            class="col-sm-2 form-control-label">{!!  trans('backend.phone') !!}
                            </label>
                            <div class="col-sm-10">
                            {!! Form::text('phone',$CompanyUser->phone, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                        </div>
                    @endif 
                    <?php
                     $file_allow = "*'";
                    ?>
                    @if(Helper::GeneralWebmasterSettings("companyusers_status"))
                        <div class="form-group row">
                            <label for="image"
                                class="col-sm-2 form-control-label">{!!  trans('backend.image') !!}
                            </label>
                            <div class="col-sm-10">
                                @if($CompanyUser->image!="")
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-4 box p-a-xs">
                                                    <a target="_blank"
                                                    href="{{ $CompanyUser->image }}"><img
                                                        src="{{ $CompanyUser->image }}"
                                                        class="img-responsive">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                                {!! Form::file('image', array('class' => 'form-control','id'=>'image','accept'=>$file_allow)) !!}
                            </div>
                        </div>
                    @endif
                    @if(Helper::GeneralWebmasterSettings("companyusers_status"))
                        <div class="form-group row">
                            <label for="description"
                            class="col-sm-2 form-control-label">{!!  trans('backend.description') !!}
                            </label>
                            <div class="col-sm-10">
                            {!! Form::textarea('description',$CompanyUser->description, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                        </div>
                    @endif
                    @if(Helper::GeneralWebmasterSettings("companyusers_status"))
                        <div class="form-group row">
                            <label for="status"
                                    class="col-sm-2 form-control-label">{!!  trans('backend.status') !!}</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label class="ui-check ui-check-md">
                                        {!! Form::radio('status','1',($CompanyUser->status==1) ? true : false, array('id' => 'status1','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        {{ trans('backend.active') }}
                                    </label>
                                    &nbsp; &nbsp;
                                    <label class="ui-check ui-check-md">
                                        {!! Form::radio('status','0',($CompanyUser->status==0) ? true : false, array('id' => 'status2','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        {{ trans('backend.notActive') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="approved"
                                    class="col-sm-2 form-control-label">{!!  trans('backend.approved') !!}</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label class="ui-check ui-check-md">
                                        {!! Form::radio('approved','1',($CompanyUser->approved==1) ? true : false, array('id' => 'status1','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        {{ trans('backend.active') }}
                                    </label>
                                    &nbsp; &nbsp;
                                    <label class="ui-check ui-check-md">
                                        {!! Form::radio('approved','0',($CompanyUser->approved==0) ? true : false, array('id' => 'status2','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        {{ trans('backend.notActive') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row m-t-md">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                    &#xe31b;</i> {!! trans('backend.update') !!}</button>
                            <a href="{{route("company_users_list")}}"
                            class="btn btn-default m-t"><i class="material-icons">
                                    &#xe5cd;</i> {!! trans('backend.cancel') !!}</a>
                        </div>
                    </div>               
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

