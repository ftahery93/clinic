<div class="padding">
    <div class="box">
        <div class="box-header dker">
            <h3>{{ trans('backend.permissions') }}</h3>
            <small>
                <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                <a href="">{{ trans('backend.settings') }}</a>
            </small>
        </div>
        @if(count($Permissions) >0)
            <div class="row p-a pull-right" style="margin-top: -70px;">
                <div class="col-sm-12">
                    <a class="btn btn-fw danger" href="{{route("permissions_create")}}">
                        <i class="material-icons">&#xe03b;</i>
                        &nbsp; {{ trans('backend.newPermissions') }}
                    </a>
                </div>
            </div>
        @endif
        @if(count($Permissions)  == 0)
            <div class="row p-a">
                <div class="col-sm-12">
                    <div class=" p-a text-center ">
                        {{ trans('backend.noData') }}
                        <br>
                        <br>
                        <a class="btn btn-fw primary" href="{{route("permissions_create")}}">
                            <i class="material-icons">&#xe03b;</i>
                            &nbsp; {{ trans('backend.newPermissions') }}
                        </a>

                    </div>
                </div>
            </div>
        @endif
        @if(count($Permissions) > 0)
            <div class="table-responsive">
                <table class="table table-striped  b-t">
                    <thead>
                    <tr>
                        <th>{{ trans('backend.title') }}</th>
                        <th>{{ trans('backend.permissions') }}</th>
                        <th class="text-center" style="width:50px;">{{ trans('backend.status') }}</th>
                        <th class="text-center" style="width:200px;">{{ trans('backend.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Permissions as $Permission)
                        <tr>
                            <td>
                                {!! $Permission->name   !!}</td>
                            <td>
                                <small>
                                    <small>
                                        @if($Permission->add_status==1)
                                            <i class="fa fa-check text-success inline"></i> {{ trans('backend.perAdd') }}
                                            &nbsp;
                                        @endif
                                        @if($Permission->edit_status==1)
                                            <i class="fa fa-check text-success inline"></i> {{ trans('backend.perEdit') }}
                                            &nbsp;
                                        @endif
                                        @if($Permission->delete_status==1)
                                            <i class="fa fa-check text-success inline"></i> {{ trans('backend.perDelete') }}
                                            &nbsp;
                                        @endif
                                        @if($Permission->add_status==0 && $Permission->edit_status==0 && $Permission->delete_status==0)
                                            {{ trans('backend.viewOnly') }}
                                            &nbsp;
                                        @endif
                                        <br>
                                        @if($Permission->companyusers_status==1)
                                            {{ trans('backend.company_users') }},
                                        @endif
                                        @if($Permission->registeredusers_status==1)
                                            {{ trans('backend.registered_users') }},
                                        @endif
                                        @if($Permission->categories_status==1)
                                            {{ trans('backend.categories') }},
                                        @endif
                                        @if($Permission->shipments_status==1)
                                            {{ trans('backend.shipments') }},
                                        @endif
                                        @if($Permission->transactions_status==1)
                                            {{ trans('backend.transactions') }},
                                        @endif
                                        @if($Permission->notifications_status==1)
                                            {{ trans('backend.notifications') }},
                                        @endif
                                        @if($Permission->settings_status==1)
                                            {{ trans('backend.generalSettings') }},
                                        @endif
                                        <br>
                                    </small>
                                </small>
                            </td>
                            <td class="text-center">
                                <i class="fa {{ ($Permission->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm success"
                                   href="{{ route("permissions_edit",["id"=>$Permission->id]) }}">
                                    <small><i class="material-icons">&#xe3c9;</i> {{ trans('backend.edit') }}
                                    </small>
                                </a>
                                <button class="btn btn-sm danger" data-toggle="modal"
                                        data-target="#p-{{ $Permission->id }}" ui-toggle-class="bounce"
                                        ui-target="#animate">
                                    <small><i class="material-icons">&#xe872;</i> {{ trans('backend.delete') }}
                                    </small>
                                </button>
                            </td>
                        </tr>
                        <!-- .modal -->
                        <div id="p-{{ $Permission->id }}" class="modal fade" data-backdrop="true">
                            <div class="modal-dialog" id="animate">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ trans('backend.confirmation') }}</h5>
                                    </div>
                                    <div class="modal-body text-center p-lg">
                                        <p>
                                            {{ trans('backend.confirmationDeleteMsg') }}
                                            <br>
                                            <strong>[ {{ $Permission->name }} ]</strong>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn dark-white p-x-md"
                                                data-dismiss="modal">{{ trans('backend.no') }}</button>
                                        <a href="{{ route("permissions_delete",["id"=>$Permission->id]) }}"
                                           class="btn danger p-x-md">{{ trans('backend.yes') }}</a>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div>
                        </div>
                        <!-- / .modal -->
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>