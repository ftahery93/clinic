@extends('backend.layout')
@section('headerInclude')
<link rel="stylesheet" type="text/css" href="{{ URL::to("backEnd/assets/styles/flags.css") }}" />
@endsection
@section('content')
<div class="padding p-b-0">
    <div class="margin">
        <h5 class="m-b-0 _300">{{ trans('backend.hi') }} <span class="text-primary">{{ Auth::user()->name }}</span>, {{ trans('backend.welcome') }}
        </h5>
    </div>
    <div class="row m-b">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <a href="{{ route("company_users_list") }}">
                <div class="box-color p-a-3 blue col-sm-12 col-md-4 col-lg-4">
                    <div class="pull-right m-l">
                        <span class="w-56 dker text-center rounded">
                            <i class="text-lg material-icons">&#xe7fb;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h6 class="text-muted">{{ trans('backend.company_users') }}</h6>
                        <h3 class="m-a-0 text-lg">{{ $NumberofCompanyUsers }}</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route("registered_users_list") }}">
                <div class="box-color p-a-3 orange  col-sm-12 col-md-4 col-lg-4">
                    <div class="pull-right m-l">
                        <span class="w-56 dker text-center rounded">
                            <i class="text-lg material-icons">&#xe7fb;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h6 class="text-muted">{{ trans('backend.registered_users') }}</h6>
                        <h3 class="m-a-0 text-lg">{{ $NumberofRegisteredUsers }}</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route("pending_shipments") }}">
                <div class="box-color p-a-3 red  col-sm-12 col-md-4 col-lg-4">
                    <div class="pull-right m-l">
                        <span class="w-56 dker text-center rounded">
                            <i class="material-icons">local_shipping</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h6 class="text-muted">{{ trans('backend.pending') }} {{ trans('backend.shipments') }}</h6>
                        <h3 class="m-a-0 text-lg">{{ $NumberofPendingShipments }}</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route("accepted_shipments") }}">
                <div class="box-color p-a-3 green  col-sm-12 col-md-4 col-lg-4">
                    <div class="pull-right m-l">
                        <span class="w-56 dker text-center rounded">
                            <i class="material-icons">local_shipping</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h6 class="text-muted">{{ trans('backend.approved') }}{{ trans('backend.shipments') }}</h6>
                        <h3 class="m-a-0 text-lg">{{ $NumberofApprovedShipments }}</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route("report_commission") }}">
                <div class="box-color p-a-3 black  col-sm-12 col-md-4 col-lg-4">
                    <div class="pull-right m-l">
                        <span class="w-56 dker text-center rounded">
                            <i class="material-icons">local_atm</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h6 class="text-muted">{{ trans('backend.total') }} {{ trans('backend.commission') }}</h6>
                        <h3 class="m-a-0 text-lg">{{ sprintf('%0.3f',$totalCommission) }} KWD</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3>Recent Shipments</h3>
            <div class="table-responsive">
                <table class="table table-striped  b-t">
                    <thead>
                        <tr>
                            <th>{{ trans('backend.shipment_identifier') }}</th>
                            <th>{{ trans('backend.price') }}</th>
                            <th>{{ trans('backend.date_created') }}</th>
                            <th>{{ trans('backend.status') }}</th>
                            <th>{{ trans('backend.companyName') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Shipments as $Shipment)
                        <tr>
                            <td> {!! $Shipment->id !!}</td>
                            <td>{!! $Shipment->price !!} {{ trans('backend.currency') }}</td>
                            <td>{!! date("d-m-Y", strtotime($Shipment->created_at)) !!}</td>
                            <td>
                                @if ($Shipment->status == 1 )
                                <span class="label label-default inline">{{ trans('backend.pending') }}</span>
                                @elseif ($Shipment->status == 2)
                                <span class="label label-primary inline">{{ trans('backend.approved') }}</span>
                                @elseif ($Shipment->status == 3)
                                <span class="label label-info inline">{{ trans('backend.picked_up') }}</span>
                                @elseif ($Shipment->status == 4)
                                <span class="label label-success inline">{{ trans('backend.delivered') }}</span>
                                @endif
                            </td>
                            <td>{!! $Shipment->company_name !!}</td>
                        </tr>



                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection