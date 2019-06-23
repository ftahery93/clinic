@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i>  {!! trans('backLang.createCountry') !!} </h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.countries') }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("Banners")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
            {{Form::open(['route'=>['adminCountriesStore'],'method'=>'POST', 'files' => true ])}}
                @if(Helper::GeneralWebmasterSettings("en_box_status"))
                    <div class="form-group row">
                        <label for="title_en"
                            class="col-sm-2 form-control-label">{!!  trans('backLang.countryName') !!}
                            @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.englishBox') !!}@endif
                        </label>
                        <div class="col-sm-10">
                            {!! Form::text('title_en','', array('placeholder' => '','class' => 'form-control','id'=>'title_en','required'=>'', 'dir'=>trans('backLang.ltr'))) !!}
                        </div>
                    </div>
                @endif
                @if(Helper::GeneralWebmasterSettings("ar_box_status"))
                    <div class="form-group row">
                        <label for="title_ar"
                               class="col-sm-2 form-control-label">{!!  trans('backLang.countryName') !!}
                            @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.arabicBox') !!}@endif
                        </label>
                        <div class="col-sm-10">
                            {!! Form::text('title_ar','', array('placeholder' => '','class' => 'form-control','id'=>'title_ar','required'=>'', 'dir'=>trans('backLang.rtl'))) !!}
                        </div>
                    </div>
                @endif
                @if(Helper::GeneralWebmasterSettings("countries_status"))
                    <div class="form-group row">
                        <label for="title_en"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.countryCode') !!}
                        </label>
                        <div class="col-sm-10">
                          {!! Form::text('code','', array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                        </div>
                    </div>
                @endif
                @if(Helper::GeneralWebmasterSettings("countries_status"))
                    <div class="form-group row">
                        <label for="title_en"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.countryTelCode') !!}
                        </label>
                        <div class="col-sm-10">
                          {!! Form::text('tel','', array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                        </div>
                    </div>
                @endif
                @if(Helper::GeneralWebmasterSettings("countries_status"))
                    <div class="form-group row">
                        <label for="title_en"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.countrySortOrder') !!}
                        </label>
                        <div class="col-sm-10">
                          {!! Form::text('sort_order','', array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                        </div>
                    </div>
                @endif
                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backLang.add') !!}</button>
                        <a href="{{route("countries")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backLang.cancel') !!}</a>
                    </div>
                </div>
            {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

