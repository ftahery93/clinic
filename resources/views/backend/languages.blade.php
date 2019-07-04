@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>{{ trans('backLang.languages') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.languages') }}</a>
                </small>
            </div>
            <div class="box-body">
                @if(@Auth::user()->permissionsGroup->settings_status)
                    {{Form::open(['route'=>'adminLangIndex','method'=>'post'])}}
                        <div class="form-group row">
                            <label for="languages2"
                                class="col-sm-2 form-control-label">{!!  trans('backLang.selectLanguage') !!}</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <select name="language_id" id="language_id" required
                                            class="form-control c-select">
                                        <option value="">- - {!!  trans('backLang.selectLanguage') !!} - -</option>
                                        @foreach ($Languages as $language_id => $language_name)
                                            <option value="{{ $language_id  }}">{{ $language_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label for="languages1"
                                class="col-sm-2 form-control-label">{!!  trans('backLang.selectLangTemplate') !!}</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <select name="language_key" id="language_key" required
                                            class="form-control c-select">
                                        <option value="">- - {!!  trans('backLang.selectLangTemplate') !!} - -</option>
                                        @foreach ($LanguagesTemp as $Language_Key => $Language_Val)
                                            <option value="{{ $Language_Key  }}">{{ $Language_Val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>   
                        <div class="form-group row m-t-md">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                        &#xe31b;</i> {!! trans('backLang.select') !!}</button>
                            </div>
                        </div>
                    {{Form::close()}}
                @endif
            </div>
        </div>
    </div>
@endsection

