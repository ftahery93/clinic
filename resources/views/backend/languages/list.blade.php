@extends('backend.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>{{ trans('backend.languages') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                    <a href="">{{ trans('backend.languages') }}</a>
                </small>
            </div>
            <div class="row p-a">
                        <div class="col-sm-12">
            <a href="{{ route("adminLanguageUpdateVariable",["en"]) }}" class="btn btn-fw primary marginBottom5">                            
                                {{ trans('backend.langButton') }} (EN)
                                <i class="entypo-cw padding10"></i>                            
                        </a>

                        <a href="{{ route("adminLanguageUpdateVariable",["ar"])  }}" class="btn btn-fw primary marginBottom5">                            
                        {{ trans('backend.langButton') }} (AR)
                                <i class="entypo-cw padding10"></i>                            
                        </a>
                        </div>
                    </div>
            <div class="table-responsive">
                <table class="table table-striped  b-t">
                    <thead>
                    <tr>
                        <th>{{ trans('backend.topicName') }}</th>
                        <th>{{ trans('backend.languageMessage') }}</th>
                        <th>{{ trans('backend.languageMessage') }} (AR)</th>
                        <th class="text-center width200">{{ trans('backend.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Languages as $Key => $Value)
                        <tr>
                            <td> {!! $Value->name !!} </td>
                            <td> {!! $Value->label_en !!} </td>
                            <td> {!! $Value->label_ar !!} </td>
                            <td class="text-center">
                                @if(@Auth::user()->permissionsGroup->edit_status)
                                    <a class="btn btn-sm success"
                                        href="{{ route("adminLanguagesEdit",["id"=>$Value->id]) }}">
                                        <small><i class="material-icons">&#xe3c9;</i> {{ trans('backend.edit') }}
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
                            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backend.showing') }} {{ $Languages->firstItem() }}
                                -{{ $Languages->lastItem() }} {{ trans('backend.of') }}
                                <strong>{{ $Languages->total()  }}</strong> {{ trans('backend.records') }}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Languages->links() !!}
                        </div>
                 
                </div>
            </footer>
        </div>
    </div>
@endsection
