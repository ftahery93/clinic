@extends('backend.layout')

@section('content')
<div class="padding">
    <div class="box">
        <div class="row">
        <div class="col-sm-12" style="margin:20px 0px;">
                 
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="mobile_filter" id="mobile_filter" placeholder="Mobile number" />
               </div>
               <div class="col-sm-3">
                <button class="btn btn-md warning"  id="filter">
                    <small><i class="material-icons">filter</i> Filter
                    </small>
                </button>
                <button class="btn btn-md success"  id="clear">
                    <small><i class="material-icons">clear</i> Clear
                    </small>
                </button>
            </div>
           
        </div>
        <div class="col-sm-12">
        <div class="box-header dker">
            <h3>{{ trans('backend.registered_users') }}</h3>
            <small>
                <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                <a href="">{{ trans('backend.registered_users') }}</a>
            </small>
        </div>
    </div>
</div>
        @if($RegisteredUsers->total() > 0)
        {{Form::open(['route'=>'registered_users_update_all','method'=>'post'])}}
        <div class="table-responsive">
            <table class="table table-striped  b-t">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="ui-check m-a-0">
                                <input id="checkAll" type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Id</th>
                        <th>{{ trans('backend.fullName') }}</th>
                        <th>{{ trans('backend.loginEmail') }}</th>
                        <th>{{ trans('backend.mobile') }}</th>
                        <th class="text-center" style="width:50px;">{{ trans('backend.status') }}</th>
                        <th class="text-center" style="width:200px;">{{ trans('backend.options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($RegisteredUsers as $RegisteredUser)
                    <tr>
                        <td><label class="ui-check m-a-0">
                                <input type="checkbox" name="ids[]" value="{{ $RegisteredUser->id }}"><i class="dark-white"></i>
                                {!! Form::hidden('row_ids[]',$RegisteredUser->id, array('class' => 'form-control row_no')) !!}
                            </label>
                        </td>
                        <td> {!! $RegisteredUser->id !!} </td>
                        <td>
                            {!! $RegisteredUser->fullname !!}
                        </td>
                        <td>
                            <small>{!! $RegisteredUser->email !!}</small>
                        </td>
                        <td>
                            <small>{!! $RegisteredUser->mobile !!}</small>
                        </td>
                        <td class="text-center">
                            <i class="fa {{ ($RegisteredUser->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                        </td>
                        <td class="text-center">
                            @if(@Auth::user()->permissionsGroup->edit_status)
                            <a class="btn btn-sm success" href="{{ route("registered_users_edit",["id"=>$RegisteredUser->id]) }}">
                                <small><i class="material-icons">&#xe3c9;</i>
                                </small>
                            </a>
                            @endif
                            @if(@Auth::user()->permissionsGroup->view_status)
                            <button class="btn btn-sm warning" data-toggle="modal" data-target="#mv-{{ $RegisteredUser->id }}" ui-toggle-class="bounce" ui-target="#animate">
                                <small><i class="material-icons">visibility</i> {{ trans('backend.view') }}
                                </small>
                            </button>
                            @endif
                        </td>
                    </tr>
                    <!-- .modal -->
                    <div id="mv-{{ $RegisteredUser->id }}" class="modal fade" data-backdrop="true">
                        <div class="modal-dialog" id="animate">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ trans('backend.registered_users_details') }}</h5>
                                </div>
                                <div class="modal-body text-center p-lg">
                                    <p class="text-center">
                                        @if(@$RegisteredUser->image)
                                        <img src="{{ $RegisteredUser->image }}" name="aboutme" width="140" height="140" border="0" class="img-circle">
                                        @else
                                        <img src="{{ url('/uploads/appusers/appuser_thumb.png') }}" name="aboutme" width="140" height="140" border="0" class="img-circle">
                                        @endif
                                        <h3 class="media-heading">{{ $RegisteredUser->fullname }}</h3>
                                    </p>
                                    <p class="text-center"><strong>Email: </strong><br>{{ $RegisteredUser->email }}</p>
                                    <p class="text-center"><strong>Mobile: </strong><br>{{ $RegisteredUser->mobile }}</p>
                                    <p class="text-center"><strong>Status: </strong><br>
                                        <i class="fa {{ ($RegisteredUser->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                                    </p>
                                    <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">{{ trans('backend.cancel') }}</button>
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
                                    <h5 class="modal-title">{{ trans('backend.confirmation') }}</h5>
                                </div>
                                <div class="modal-body text-center p-lg">
                                    <p>
                                        {{ trans('backend.confirmationDeleteMsg') }}
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">{{ trans('backend.no') }}</button>
                                    <button type="submit" class="btn danger p-x-md">{{ trans('backend.yes') }}</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div>
                    </div>
                    <!-- / .modal -->
                    @if(@Auth::user()->permissionsGroup->webmaster_status)
                    <select name="action" id="action" class="input-sm form-control w-sm inline v-middle" required>
                        <option value="">{{ trans('backend.bulkAction') }}</option>
                        <option value="activate">{{ trans('backend.activeSelected') }}</option>
                        <option value="block">{{ trans('backend.blockSelected') }}</option>
                    </select>
                    <button type="submit" id="submit_all" class="btn btn-sm white">{{ trans('backend.apply') }}</button>
                    <button id="submit_show_msg" class="btn btn-sm white" data-toggle="modal" style="display: none" data-target="#m-all" ui-toggle-class="bounce" ui-target="#animate">{{ trans('backend.apply') }}
                    </button>
                    @endif
                </div>
                <div class="col-sm-3 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backend.showing') }} {{ $RegisteredUsers->firstItem() }}
                        -{{ $RegisteredUsers->lastItem() }} {{ trans('backend.of') }}
                        <strong>{{ $RegisteredUsers->total()  }}</strong> {{ trans('backend.records') }}</small>
                </div>
                <div class="col-sm-6 text-right text-center-xs">
                    {!! $RegisteredUsers->links() !!}
                </div>
            </div>
        </footer>
        {{Form::close()}}
        <script type="text/javascript">
            $("#checkAll").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
            $("#action").change(function() {
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
    $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    $("#action").change(function() {
        if (this.value == "delete") {
            $("#submit_all").css("display", "none");
            $("#submit_show_msg").css("display", "inline-block");
        } else {
            $("#submit_all").css("display", "inline-block");
            $("#submit_show_msg").css("display", "none");
        }
    });

    $("#filter").click(function() {
        var mobile = $('#mobile_filter').val();
        window.location.href="{{ url('admin/regular/users') }}?mobile="+mobile;
    });

    $("#clear").click(function() {        
        window.location.href="{{ url('admin/regular/users') }}";
    });
</script>
@endsection