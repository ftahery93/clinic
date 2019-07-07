@extends('backend.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>{{ trans('backend.shipments') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                    <a href="">{{ trans('backend.shipments') }}</a>
                </small>
            </div>
            @if($Shipments->total() > 0)
                <div class="table-responsive">
                    <table class="table table-striped  b-t">
                        <thead>
                        <tr>
                            <th>{{ trans('backend.name') }}</th>
                            <th>{{ trans('backend.price') }}</th>
                            <th class="text-center" style="width:50px;">{{ trans('backend.status') }}</th>
                            <th class="text-center" style="width:250px;">{{ trans('backend.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Shipments as $Shipment)
                            <tr>
                                <td> {!! $Shipment->name !!}</td>
                                <td><small>{!! $Shipment->price !!}</small></td>
                                <td class="text-center">
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
                                <td class="text-center">
                                    @if(@Auth::user()->permissionsGroup->view_status)
                                        <a class="btn btn-sm success"
                                        href="{{ route("shipments_show",["id"=>$Shipment->id]) }}">
                                        <small><i class="material-icons">visibility</i> {{ trans('backend.view') }}
                                        </small>
                                        </a>
                                    @endif
                                    @if ($Shipment->status != 1 )
                                        <a class="btn btn-sm primary"
                                        href="{{ route("shipments_show",["id"=>$Shipment->id]) }}">
                                        <small><i class="material-icons">local_atm</i> {{ trans('backend.transactions') }}
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
                            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backend.showing') }} {{ $Shipments->firstItem() }}
                                -{{ $Shipments->lastItem() }} {{ trans('backend.of') }}
                                <strong>{{ $Shipments->total()  }}</strong> {{ trans('backend.records') }}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Shipments->links() !!}
                        </div>
                    </div>
                </footer>
            @endif
        </div>
    </div>
@endsection