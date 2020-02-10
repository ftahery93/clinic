@extends('backend.layout')
@section('content')
<div class="padding">
    <div class="box">
        <div class="box-header dker">
            <h3><i class="material-icons">&#xe02e;</i> {{ trans('backend.create') }}</h3>
            <small>
                <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                <a href="">{{ trans('backend.governorates') }}</a>
            </small>
        </div>
        <div class="box-tool">
            <ul class="nav">
                <li class="nav-item inline">
                    <a class="nav-link" href="{{route("governorate_list")}}">
                        <i class="material-icons md-18">×</i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="box-body">
            {{Form::open(['route'=>['governorate_store'],'method'=>'POST', 'files' => true ])}}
            <div class="form-group row">
                <label for="name_en" class="col-sm-2 form-control-label">{!! trans('backend.name').' (EN)' !!}
                </label>
                <div class="col-sm-10">
                    {!! Form::text('name_en','', array('placeholder' => '','class' =>
                    'form-control','id'=>'name_en','required'=>'')) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="name_ar" class="col-sm-2 form-control-label">{!! trans('backend.name').' (AR)' !!}
                </label>
                <div class="col-sm-10">
                    {!! Form::text('name_ar','', array('placeholder' => '','class' =>
                    'form-control','id'=>'name_ar','required'=>'', 'dir'=>trans('backend.rtl'))) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 form-control-label">{!! trans('backend.price') !!}
                </label>
                <div class="col-sm-10">
                    {!! Form::text('price','', array('placeholder' => '','class' =>
                    'form-control','id'=>'price','required'=>''))
                    !!}
                </div>
            </div>

            <div class="form-group row">
                <label for="country" class="col-sm-2 form-control-label">{!! trans('backend.country') !!}</label>
                <div class="col-sm-10">
                    <select name="country_id" id="country_id" required class="form-control c-select">
                        <option value="">- - {!! trans('backend.selectCountry') !!} - -</option>
                        @foreach ($Countries as $Country)
                        <option value="{{ $Country->id  }}">{{ $Country->name_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row m-t-md">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                            &#xe31b;</i> {!! trans('backend.add') !!}</button>
                    <a href="{{route("users_list")}}" class="btn btn-default m-t"><i class="material-icons">
                            &#xe5cd;</i> {!! trans('backend.cancel') !!}</a>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
@endsection