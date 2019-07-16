@extends('backend.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i> {{ trans('backend.LanguagesEdit') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                    <a href="">{{ trans('backend.languages') }}</a>
                </small>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['adminLanguageUpdate',$Languages->id],'method'=>'POST', 'files' => true])}}
                @if(Helper::GeneralWebmasterSettings("en_box_status"))
                        <div class="form-group row">
                            <label for="code"
                            class="col-sm-2 form-control-label">{!!  trans('backend.name') !!}
                            </label>
                            <div class="col-sm-10">
                            {!! Form::text('name',$Languages->name, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                        </div>
                    @endif
                    @if(Helper::GeneralWebmasterSettings("en_box_status"))
                        <div class="form-group row">
                            <label for="code"
                            class="col-sm-2 form-control-label">{!!  trans('backend.label') !!}
                            </label>
                            <div class="col-sm-10">
                            {!! Form::text('label_en',$Languages->label_en, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                        </div>
                    @endif
                    @if(Helper::GeneralWebmasterSettings("en_box_status"))
                        <div class="form-group row">
                            <label for="code"
                            class="col-sm-2 form-control-label">{!!  trans('backend.label') !!} AR
                            </label>
                            <div class="col-sm-10">
                            {!! Form::text('label_ar',$Languages->label_ar, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backend.rtl'))) !!}
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                    <label for="link_status"
                           class="col-sm-2 form-control-label">{!!  trans('backend.status') !!}</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','1',($Languages->status==1) ? true : false, array('id' => 'status1','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backend.active') }}
                            </label>
                            &nbsp; &nbsp;
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('status','0',($Languages->status==0) ? true : false, array('id' => 'status2','class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                {{ trans('backend.notActive') }}
                            </label>
                        </div>
                    </div>
                </div>
                    
                    <div class="form-group row m-t-md">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                    &#xe31b;</i> {!! trans('backend.update') !!}</button>
                            <a href="{{route("adminLanguages")}}"
                            class="btn btn-default m-t"><i class="material-icons">
                                    &#xe5cd;</i> {!! trans('backend.cancel') !!}</a>
                        </div>
                    </div>               
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

