@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>{{ trans('backLang.polls') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.polls') }}</a>
                </small>
            </div>
            @if($Polls->total() >0)
                @if(@Auth::user()->permissionsGroup->add_status)
                    <div class="row p-a">
                        <div class="col-sm-12">
                            {{-- @foreach($WebmasterBanners as $WebmasterBanner)
                                <a class="btn btn-fw primary marginBottom5"
                                   href="{{route("BannersCreate",$WebmasterBanner->id)}}">
                                    <i class="material-icons">&#xe02e;</i>
                                    &nbsp; {!! trans('backLang.'.$WebmasterBanner->name) !!}</a>
                            @endforeach --}}
                        </div>
                    </div>
                @endif
            @endif
            @if($Polls->total() == 0)
                <div class="row p-a">
                    <div class="col-sm-12">
                        <div class=" p-a text-center ">
                            {{ trans('backLang.noData') }}
                            <br>
                            <br>
                            @if(@Auth::user()->permissionsGroup->add_status)
                                {{-- @foreach($WebmasterBanners as $WebmasterBanner)
                                    <a class="btn btn-fw primary marginBottom5"
                                       href="{{route("BannersCreate",$WebmasterBanner->id)}}">
                                        <i class="material-icons">&#xe02e;</i>
                                        &nbsp; {!! trans('backLang.'.$WebmasterBanner->name) !!}</a>
                                @endforeach --}}
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @if($Polls->total() > 0)
                {{Form::open(['route'=>'BannersUpdateAll','method'=>'post'])}}
                <div class="table-responsive">
                    <table class="table table-striped  b-t">
                        <thead>
                        <tr>
                            <th class="width20">
                                <label class="ui-check m-a-0">
                                    <input id="checkAll" type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>{{ trans('backLang.pollName') }}</th>
                            <th>{{ trans('backLang.categoryName') }}</th>
                            <th>{{ trans('backLang.startTime') }}</th>
                            <th>{{ trans('backLang.endTime') }}</th>
                            <th class="text-center width50">{{ trans('backLang.status') }}</th>
                            <th class="text-center width200">{{ trans('backLang.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Polls as $Poll)
                            <tr>
                                <td>
                                    <label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="{{ $Poll->id }}">
                                        <i class="dark-white"></i>
                                        {!! Form::hidden('row_ids[]',$Poll->id, array('class' => 'form-control row_no')) !!}
                                    </label>
                                </td>
                                <td> 
                                    @if($Poll->name !="")
                                        {!! $Poll->name !!}
                                    @endif
                                </td>
                                <td>
                                    @if($Poll->categories != "")
                                        @foreach($Poll->categories as $Category)
                                            {!! $Category->title_en !!}
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if($Poll->start_datetime !="")
                                        {!! $Poll->start_datetime !!}
                                    @endif
                                <td>
                                    @if($Poll->end_datetime !="")
                                        {!! $Poll->start_datetime !!}
                                    @endif  
                                </td>
                                <td class="text-center">
                                    <i class="fa {{ ($Poll->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                                </td>
                                <td class="text-center">
                                    @if(@Auth::user()->permissionsGroup->edit_status)
                                        <a class="btn btn-sm success"
                                           href="{{ route("adminPollsEdit",["id"=>$Poll->id]) }}">
                                            <small><i class="material-icons">&#xe3c9;</i> {{ trans('backLang.edit') }}
                                            </small>
                                        </a>
                                    @endif
                                        @if(@Auth::user()->permissionsGroup->delete_status)
                                        <button class="btn btn-sm warning" data-toggle="modal"
                                                data-target="#m-{{ $Poll->id }}" ui-toggle-class="bounce"
                                                ui-target="#animate">
                                            <small><i class="material-icons">&#xe872;</i> {{ trans('backLang.delete') }}
                                            </small>
                                        </button>
                                    @endif

                                </td>
                            </tr>
                            <!-- .modal -->
                            <div id="m-{{ $Poll->id }}" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ trans('backLang.confirmation') }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            <p>
                                                {{ trans('backLang.confirmationDeleteMsg') }}
                                                <br>
                                                <strong>[ {{ $Poll->name }} ]</strong>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                            <a href="{{ route("BannersDestroy",["id"=>$Poll->id]) }}" class="btn danger p-x-md">{{ trans('backLang.yes') }}</a>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- / .modal -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="dker p-a">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <!-- .modal -->
                            <div id="m-all" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ trans('backLang.confirmation') }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            <p>
                                                {{ trans('backLang.confirmationDeleteMsg') }}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md"
                                                    data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                            <button type="submit"
                                                    class="btn danger p-x-md">{{ trans('backLang.yes') }}</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- / .modal -->
                            @if(@Auth::user()->permissionsGroup->edit_status)
                                <select name="action" id="action" class="input-sm form-control w-sm inline v-middle"
                                        required>
                                    <option value="">{{ trans('backLang.bulkAction') }}</option>
                                    <option value="order">{{ trans('backLang.saveOrder') }}</option>
                                    <option value="activate">{{ trans('backLang.activeSelected') }}</option>
                                    <option value="block">{{ trans('backLang.blockSelected') }}</option>
                                    @if(@Auth::user()->permissionsGroup->delete_status)
                                        <option value="delete">{{ trans('backLang.deleteSelected') }}</option>
                                    @endif
                                </select>
                                <button type="submit" id="submit_all"
                                        class="btn btn-sm white">{{ trans('backLang.apply') }}</button>
                                <button id="submit_show_msg" class="btn btn-sm white displayNone" data-toggle="modal"
                                        data-target="#m-all" ui-toggle-class="bounce"
                                        ui-target="#animate">{{ trans('backLang.apply') }}
                                </button>
                            @endif
                        </div>

                        <div class="col-sm-3 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backLang.showing') }} {{ $Polls->firstItem() }}
                                -{{ $Polls->lastItem() }} {{ trans('backLang.of') }}
                                <strong>{{ $Polls->total()  }}</strong> {{ trans('backLang.records') }}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Polls->links() !!}
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
