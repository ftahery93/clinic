@extends('backend.layout')

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
            <div class="table-responsive">
                <table class="table table-striped  b-t">
                    <thead>
                    <tr>
                        <th>{{ trans('backLang.languageKey') }}</th>
                        <th>{{ trans('backLang.languageMessage') }}</th>
                        <th class="text-center width200">{{ trans('backLang.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Languages as $Key => $Value)
                        <tr>
                            <td> {!! $Key !!} </td>
                            <td> {!! $Value !!} </td>
                            <td class="text-center">
                                @if(@Auth::user()->permissionsGroup->edit_status)
                                    <a class="btn btn-sm success"
                                        href="{{ route("adminLanguagesEdit",["id"=>$Key]) }}">
                                        <small><i class="material-icons">&#xe3c9;</i> {{ trans('backLang.edit') }}
                                        </small>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="dker p-a">
                <div class="row">
                    <div class="col-sm-3 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backLang.showing') }} 
                            <strong>{{ count($Languages)  }}</strong> {{ trans('backLang.records') }}
                        </small>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
