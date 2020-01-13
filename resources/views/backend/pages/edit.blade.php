@extends('backend.layout')
@section('content')
<div class="padding">
    <div class="box">
        <div class="box-header dker">
            <h3><i class="material-icons">&#xe3c9;</i> {{ trans('backend.perEdit') }}</h3>
            <small>
                <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                <a href="">{{ trans('backend.pages') }}</a>
            </small>
        </div>
        <div class="box-tool">
            <ul class="nav">
                <li class="nav-item inline">
                    <a class="nav-link" href="{{route("page_list")}}">
                        <i class="material-icons md-18">×</i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="box-body">
            {{Form::open(['route'=>['page_update',$Page->id],'method'=>'POST', 'files' => true])}}
            @if(Helper::GeneralWebmasterSettings("en_box_status"))
            <div class="form-group row">
                <label for="name_en" class="col-sm-2 form-control-label">{!! trans('backend.topicName').' (EN)' !!}
                </label>
                <div class="col-sm-10">
                    {!! Form::text('name_en',$Page->name_en, array('placeholder' => '','class' =>
                    'form-control','id'=>'name_en','required'=>'', 'dir'=>trans('backend.ltl '))) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="name_ar" class="col-sm-2 form-control-label">{!! trans('backend.topicName').' (AR)' !!}
                </label>
                <div class="col-sm-10">
                    {!! Form::text('name_ar',$Page->name_ar, array('placeholder' => '','class' =>
                    'form-control','id'=>'name_ar','required'=>'', 'dir'=>trans('backend.rtl '))) !!}
                </div>
            </div>
            @endif
            @if(Helper::GeneralWebmasterSettings("en_box_status"))
            <div class="form-group row">
                <label for="message_en" class="col-sm-2 form-control-label">{!! trans('backend.description').' (EN)'
                    !!}
                </label>
                <div class="col-sm-10">
                    {!! Form::textarea('message_en',$Page->message_en, array('placeholder' => '','class'
                    =>
                    'form-control', 'dir'=>trans('backend.ltr'))) !!}
                </div>
            </div>
            @endif
            @if(Helper::GeneralWebmasterSettings("en_box_status"))
            <div class="form-group row">
                <label for="message_ar" class="col-sm-2 form-control-label">{!! trans('backend.description').' (AR)'
                    !!}
                </label>
                <div class="col-sm-10">
                    {!! Form::textarea('message_ar',$Page->message_ar, array('placeholder' => '','class'
                    =>
                    'form-control', 'dir'=>trans('backend.rtl'))) !!}
                </div>
            </div>
            @endif

            <div class="form-group row m-t-md">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                            &#xe31b;</i> {!! trans('backend.update') !!}</button>
                    <a href="{{route("page_list")}}" class="btn btn-default m-t"><i class="material-icons">
                            &#xe5cd;</i> {!! trans('backend.cancel') !!}</a>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
@endsection