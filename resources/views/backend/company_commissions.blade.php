@extends('backend.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>{{ trans('backend.company_details') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                    <a href="">{{ trans('backend.company_details') }}</a>
                </small>
            </div>
            @if($CompanyOrders->total() > 0)
               
                <div class="table-responsive">
                    <table class="table table-striped  b-t">
                        <thead>
                        <tr>                           
                            <th>{{ trans('backend.companyName') }}</th>
                            <th>{{ trans('backend.card_amount') }} {{ trans('backend.used') }} ({{ trans('backend.currency') }})</th>
                            <th>{{ trans('backend.wallet_amount') }} {{ trans('backend.used') }} ({{ trans('backend.currency') }})</th>
                            <th>{{ trans('backend.free_deliveries') }} {{ trans('backend.used') }}</th>
                            <th>{{ trans('backend.shipments') }}</th>
                            <th>{{ trans('backend.commissions') }} ({{ trans('backend.currency') }})</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($CompanyOrders as $CompanyOrder)
                            <tr>
                               
                                <td>{!! $CompanyOrder->company_name   !!}</td>
                                <td><small>{!! $CompanyOrder->card_amount !!}</small></td>
                                <td><small>{!! $CompanyOrder->wallet_amount !!}</small></td>
                                <td><small>{!! $CompanyOrder->free_deliveries !!}</small></td>
                                <td><small>{!! $CompanyOrder->count_shipment !!}</small></td>
                                <td><small>{!! $CompanyOrder->card_amount+$CompanyOrder->wallet_amount !!}</small></td>
                            </tr>
                          
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="dker p-a">
                    <div class="row">                        
                        <div class="col-sm-3 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backend.showing') }} {{ $CompanyOrders->firstItem() }}
                                -{{ $CompanyOrders->lastItem() }} {{ trans('backend.of') }}
                                <strong>{{ $CompanyOrders->total()  }}</strong> {{ trans('backend.records') }}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $CompanyOrders->links() !!}
                        </div>
                    </div>
                </footer>
               
               
            @endif
        </div>
    </div>
@endsection

