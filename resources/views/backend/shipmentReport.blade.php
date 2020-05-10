@extends('backend.layout')

@section('content')
<div class="padding">
    <div class="box">
        <div class="box-header dker">
            <h3>{{ trans('backend.shipment_report') }}</h3>
            <small>
                <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                <a href="">{{ trans('backend.shipment_report') }}</a>
            </small>
        </div>
        @if(count($shipmentCountResponse) > 0)
        <!-- {{Form::open(['route'=>'registered_users_update_all','method'=>'post'])}} -->
        <div class="table-responsive">
            <table class="table table-striped b-t">
                <thead>
                    <tr>
                        <th>{{ trans('backend.fullName') }}</th>
                        <th>{{ trans('backend.shipments') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($shipmentCountResponse as $eachShipment)
                    <tr>
                        <td> {!! $eachShipment['company_name'] !!} </td>
                        <td>
                            {!! $eachShipment['count'] !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection