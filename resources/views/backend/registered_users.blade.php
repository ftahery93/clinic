@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>{{ trans('backLang.appusers') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.appusers') }}</a>
                </small>
            </div>
            @if($ApplicationUsers->total() > 0)
                {{Form::open(['route'=>'appuser_update_all','method'=>'post'])}}
                <div class="table-responsive">
                    <table class="table table-striped  b-t">
                        <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="ui-check m-a-0">
                                    <input id="checkAll" type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>{{ trans('backLang.fullName') }}</th>
                            <th>{{ trans('backLang.loginEmail') }}</th>
                            <th>{{ trans('backLang.gender') }}</th>
                            <th>{{ trans('backLang.age') }}</th>
                            <th class="text-center" style="width:50px;">{{ trans('backLang.status') }}</th>
                            <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ApplicationUsers as $ApplicationUser)
                            <tr>
                                <td><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="{{ $ApplicationUser->id }}"><i
                                            class="dark-white"></i>
                                        {!! Form::hidden('row_ids[]',$ApplicationUser->id, array('class' => 'form-control row_no')) !!}
                                    </label>
                                </td>
                                <td>
                                    {!! $ApplicationUser->name   !!}
                                </td>
                                <td>
                                    <small>{!! $ApplicationUser->email   !!}</small>
                                </td>
                                <td>
                                    <small>{!! $ApplicationUser->gender   !!}</small>
                                </td>
                                <td>
                                    <small>{!! $ApplicationUser->age   !!}</small>
                                </td>
                                <td class="text-center">
                                    <i class="fa {{ ($ApplicationUser->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                                </td>
                                <td class="text-center">
                                    @if(@Auth::user()->permissionsGroup->view_status)
                                        <button class="btn btn-sm warning" data-toggle="modal"
                                                data-target="#mv-{{ $ApplicationUser->id }}" ui-toggle-class="bounce"
                                                ui-target="#animate">
                                            <small><i class="material-icons">visibility</i> {{ trans('backLang.view') }}
                                            </small>
                                        </button>
                                    @endif
                                    @if(@Auth::user()->permissionsGroup->webmaster_status)
                                        <button class="btn btn-sm warning" data-toggle="modal"
                                                data-target="#m-{{ $ApplicationUser->id }}" ui-toggle-class="bounce"
                                                ui-target="#animate">
                                            <small><i class="material-icons">&#xe872;</i> {{ trans('backLang.delete') }}
                                            </small>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <!-- .modal -->
                            <div id="mv-{{ $ApplicationUser->id }}" class="modal fade" data-backdrop="true">
                                    <div class="modal-dialog" id="animate">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ trans('backLang.appusersViewDetails') }}</h5>
                                            </div>
                                            <div class="modal-body text-center p-lg">
                                                <p class="text-center">
                                                    @if(@$ApplicationUser->photo) 
                                                     <img src="{{ $ApplicationUser->photo }}" name="aboutme" width="140" height="140" border="0" class="img-circle">
                                                    @else
                                                      <img src="{{ url('/uploads/appusers/appuser_thumb.png') }}" name="aboutme" width="140" height="140" border="0" class="img-circle">
                                                    @endif
                                                    <h3 class="media-heading">{{ $ApplicationUser->name }}</h3>
                                                </p>
                                                <p class="text-center"><strong>Email: </strong><br>{{ $ApplicationUser->email }}</p>
                                                <p class="text-center"><strong>Gender: </strong><br>{{ $ApplicationUser->gender }}</p>
                                                <p class="text-center"><strong>Age: </strong><br>{{ $ApplicationUser->age }}</p>
                                                <p class="text-center"><strong>Status: </strong><br>
                                                    <i class="fa {{ ($ApplicationUser->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                                                </p>
                                                <p class="text-center"><strong>Notification: </strong><br>
                                                    <i class="fa {{ ($ApplicationUser->notification==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                                                </p>
                                                <p class="text-center"><strong>Terms and Conditions: </strong><br>
                                                    <i class="fa {{ ($ApplicationUser->terms_conditions==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                                                </p>
                                                <br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark-white p-x-md"
                                                        data-dismiss="modal">{{ trans('backLang.cancel') }}</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>
                                </div>
                            <!-- / .modal -->
                            <!-- .modal -->
                            <div id="m-{{ $ApplicationUser->id }}" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ trans('backLang.confirmation') }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            <p>
                                                {{ trans('backLang.confirmationDeleteMsg') }}
                                                <br>
                                                <strong>[ {{ $ApplicationUser->name }} ]</strong>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md"
                                                    data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                            <a href="{{ route("appuser_delete",["id"=>$ApplicationUser->id]) }}"
                                               class="btn danger p-x-md">{{ trans('backLang.yes') }}</a>
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
                            @if(@Auth::user()->permissionsGroup->webmaster_status)
                                <select name="action" id="action" class="input-sm form-control w-sm inline v-middle"
                                        required>
                                    <option value="">{{ trans('backLang.bulkAction') }}</option>
                                    <option value="activate">{{ trans('backLang.activeSelected') }}</option>
                                    <option value="block">{{ trans('backLang.blockSelected') }}</option>
                                    <option value="delete">{{ trans('backLang.deleteSelected') }}</option>
                                </select>
                                <button type="submit" id="submit_all"
                                        class="btn btn-sm white">{{ trans('backLang.apply') }}</button>
                                <button id="submit_show_msg" class="btn btn-sm white" data-toggle="modal"
                                        style="display: none"
                                        data-target="#m-all" ui-toggle-class="bounce"
                                        ui-target="#animate">{{ trans('backLang.apply') }}
                                </button>
                            @endif
                        </div>
                        <div class="col-sm-3 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backLang.showing') }} {{ $ApplicationUsers->firstItem() }}
                                -{{ $ApplicationUsers->lastItem() }} {{ trans('backLang.of') }}
                                <strong>{{ $ApplicationUsers->total()  }}</strong> {{ trans('backLang.records') }}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $ApplicationUsers->links() !!}
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
