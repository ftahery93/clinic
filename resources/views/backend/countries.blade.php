@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>{{ trans('backLang.countries') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.countries') }}</a>
                </small>
            </div>
            @if($Countries->total() >0)
                @if(@Auth::user()->permissionsGroup->add_status)
                    <div class="row p-a">
                        <div class="col-sm-12">
                            <a class="btn btn-fw primary marginBottom5" href="{{route("adminCountriesCreate")}}">
                                <i class="material-icons">&#xe02e;</i> &nbsp; {!! trans('backLang.createCountry') !!}
                            </a>
                        </div>
                    </div>
                @endif
            @endif
            @if($Countries->total() > 0)
                {{Form::open(['route'=> 'adminCategoriesUpdateAll','method'=>'post'])}}
                <div class="table-responsive">
                    <table class="table table-striped  b-t">
                        <thead>
                        <tr>
                            <th class="width20">
                                <label class="ui-check m-a-0">
                                    <input id="checkAll" type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>{{ trans('backLang.countryName') }}</th>
                            <th>{{ trans('backLang.countryCode') }}</th>
                            <th>{{ trans('backLang.countryTelCode') }}</th>
                            <th>{{ trans('backLang.countrySortOrder') }}</th>
                            <th class="text-center width200">{{ trans('backLang.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $title_var = "title_" . trans('backLang.boxCode');
                        $title_var2 = "title_" . trans('backLang.boxCodeOther');
                        ?>
                        @foreach($Countries as $Country)
                            <?php
                            if ($Country->$title_var != "") {
                                $title = $Country->$title_var;
                            } else {
                                $title = $Country->$title_var2;
                            }
                            ?>
                            <tr>
                                <td>
                                    <label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="{{ $Country->id }}"><i class="dark-white"></i>
                                        {!! Form::hidden('row_ids[]',$Country->id, array('class' => 'form-control row_no')) !!}
                                    </label>
                                </td>
                                <td> {!! $title !!} </td>
                                <td> {!! $Country->code !!} </td>
                                <td> {!! $Country->tel !!} </td>
                                <td> {!! $Country->sort_order  !!} </td>
                                <td class="text-center">
                                    @if(@Auth::user()->permissionsGroup->edit_status)
                                        <a class="btn btn-sm success"
                                           href="{{ route("adminCountriesEdit",["id"=>$Country->id]) }}">
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
                            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backLang.showing') }} {{ $Countries->firstItem() }}
                                -{{ $Countries->lastItem() }} {{ trans('backLang.of') }}
                                <strong>{{ $Countries->total()  }}</strong> {{ trans('backLang.records') }}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Countries->links() !!}
                        </div>
                    </div>
                </footer>
                {{Form::close()}}
                <script type="text/javascript">
                    $("#checkAll").click(function () {
                        $('input:checkbox').not(this).prop('checked', this.checked);
                    });
                    $("#action").change(function () {
                        if (this.value == "delete") {
                            $("#submit_all").css("display", "none");
                            $("#submit_show_msg").css("display", "inline-block");
                        } else {
                            $("#submit_all").css("display", "inline-block");
                            $("#submit_show_msg").css("display", "none");
                        }
                    });
                </script>
            @endif
        </div>
    </div>
@endsection
@section('footerInclude')
    <script type="text/javascript">
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $("#action").change(function () {
            if (this.value == "delete") {
                $("#submit_all").css("display", "none");
                $("#submit_show_msg").css("display", "inline-block");
            } else {
                $("#submit_all").css("display", "inline-block");
                $("#submit_show_msg").css("display", "none");
            }
        });
    </script>
@endsection
