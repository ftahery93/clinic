@extends('backend.layout')
@section('content')
<div class="padding">
    <div class="box">
        <div class="box-header dker">
            <h3><i class="material-icons">&#xe3c9;</i> {{ trans('backend.edit') }}</h3>
            <small>
                <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                <a href="">{{ trans('backend.governorates') }}</a>
            </small>
        </div>
        <div class="box-body">
            {{Form::open(['route'=>['governorate_update',$Governorate->id],'method'=>'POST', 'files' => true])}}
            @if(Helper::GeneralWebmasterSettings("governorates_status"))
            <div class="form-group row">
                <label for="name_en" class="col-sm-2 form-control-label">{!! trans('backend.name').' (EN)' !!}
                </label>
                <div class="col-sm-10">
                    {!! Form::text('name_en',$Governorate->name_en, array('placeholder' => '','class' =>
                    'form-control','id'=>'name_en','required'=>'', 'dir'=>trans('backend.ltr'))) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="name_ar" class="col-sm-2 form-control-label">{!! trans('backend.name').' (AR)' !!}
                </label>
                <div class="col-sm-10">
                    {!! Form::text('name_ar',$Governorate->name_ar, array('placeholder' => '','class' =>
                    'form-control','id'=>'name_ar','required'=>'', 'dir'=>trans('backend.rtl'))) !!}
                </div>
            </div>
            @endif

            @if(Helper::GeneralWebmasterSettings("governorates_status"))
            <div class="form-group row">
                <label for="price" class="col-sm-2 form-control-label">{!! trans('backend.price') !!}
                </label>
                <div class="col-sm-10">
                    {!! Form::text('price',$Governorate->price, array('placeholder' => '','class' =>
                    'form-control','id'=>'price','required'=>''))
                    !!}
                </div>
            </div>
            @endif

            @if(Helper::GeneralWebmasterSettings("governorates_status"))
            <div class="form-group row">
                <label for="country_id" class="col-sm-2 form-control-label">{!! trans('backend.countries') !!}
                </label>
                <div class="col-sm-10">
                    <select required class="form-control c-select" name="country_id">
                        <option value="">- - {!! trans('backend.selectCountry') !!} - -</option>
                        @foreach($Countries as $item)
                        <option value="{{$item->id}}" @if($item->id==$Governorate->country_id) selected="selected"
                            @endif>{{$item->name_en}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif

            @if(Helper::GeneralWebmasterSettings("governorates_status"))
            <div class="form-group row">
                <label for="status" class="col-sm-2 form-control-label">{!! trans('backend.status') !!}</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label class="ui-check ui-check-md">
                            {!! Form::radio('status','1',($Governorate->status==1) ? true : false, array('id' =>
                            'status1','class'=>'has-value')) !!}
                            <i class="dark-white"></i>
                            {{ trans('backend.active') }}
                        </label>
                        &nbsp; &nbsp;
                        <label class="ui-check ui-check-md">
                            {!! Form::radio('status','0',($Governorate->status==0) ? true : false, array('id' =>
                            'status2','class'=>'has-value')) !!}
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
                    <a href="{{route("governorate_list")}}" class="btn btn-default m-t"><i class="material-icons">
                            &#xe5cd;</i> {!! trans('backend.cancel') !!}</a>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
@endsection