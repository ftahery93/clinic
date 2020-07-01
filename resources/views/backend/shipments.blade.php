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
                        <th>{{ trans('backend.shipment_identifier') }}</th>
                        <th>{{ trans('backend.price') }}</th>
                        <th>{{ trans('backend.date_created') }}</th>
                        <th>{{ trans('backend.status') }}</th>
                        <th>{{ trans('backend.companyName') }}</th>
                        <th class="text-center" style="width:250px;">{{ trans('backend.options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Shipments as $Shipment)
                    @if(!empty($ShipmentDetails))
                    <?php
                    $categories = $ShipmentDetails[$Shipment->id]['categories'];
                    $toAddresses = $ShipmentDetails[$Shipment->id]['toAddress'];
                    $fromAddress = $ShipmentDetails[$Shipment->id]['fromAddress'];
                    $company = $ShipmentDetails[$Shipment->id]['company'];
                    $user = $ShipmentDetails[$Shipment->id]['registered_user'];
                    ?>
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
                            @elseif ($Shipment->status == 6)
                            <span class="label label-danger inline">{{ trans('backend.deleted') }}</span>
                            @endif
                        </td>
                        <td>{!! $company->name !!} </td>
                        <td class="text-center">
                            @if(@Auth::user()->permissionsGroup->view_status)
                            <button class="btn btn-sm success" data-toggle="modal" data-target="#ms-{{ $Shipment->id }}" ui-toggle-class="bounce" ui-target="#animate">
                                <small><i class="material-icons">visibility</i> {{ trans('backend.view') }}
                                </small>
                            </button>
                            @endif
                            @if ($Shipment->status != 1 )
                            <button class="btn btn-sm primary" data-toggle="modal" data-target="#mt-{{ $Shipment->id }}" ui-toggle-class="bounce" ui-target="#animate">
                                <small><i class="material-icons">local_atm</i> {{ trans('backend.transactions') }}
                                </small>
                            </button>
                            @endif
                        </td>
                    </tr>
                    <!-- .modal -->
                    <div id="ms-{{ $Shipment->id }}" class="modal fade " data-backdrop="true">
                        <div class="modal-dialog" id="animate">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="logoPrint">
                                        <img src="{{ URL::to('backEnd/assets/images/logo.png') }}" alt="Control">
                                    </p>
                                    <h5 class="modal-title text-center">
                                        {{ trans('backend.shipment_id',[ 'id' => $Shipment->id]) }}</h5>
                                </div>
                                <div class="modal-body text-center p-lg"">  
                                            <div class=" row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                                            <p class="text-center margin-btm5">
                                                <strong>{{ trans('backend.category_name') }} </strong>
                                                <br>
                                                <p style="font-size:15px;">{{ $categories['name'] }}</p>
                                            </p>

                                        </div>

                                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                            <p class="text-center"><strong>{{ trans('backend.shipment_from') }}
                                                </strong><br>{{ $user->fullname }}
                                                {{ $fromAddress->name }} <br>
                                                <strong>{{ trans('backend.block') }}:</strong> {{ $fromAddress->block }},
                                                <strong>{{ trans('backend.building') }}:</strong> {{ $fromAddress->building }},
                                                <strong>{{ trans('backend.street') }}:</strong> {{ $fromAddress->street }} <br>
                                                <strong>{{ trans('backend.mobile') }}:</strong> {{ $fromAddress->mobile }} <br>
                                            </p>
                                        </div>

                                    </div>

                                    @endif

                                </div>

                                <div class="row">
                                    <hr>
                                    @foreach ($toAddresses as $toAddress)
                                    <div @if ($loop->first) class="col-lg-12 col-md-12 col-xs-12 col-sm-12 borderLeft0" @else class="col-lg-6 col-md-6 col-xs-12 col-sm-12 borderLeft0" @endif style="{{ $loop->index % 2 ? 'border-right:1px solid #dadada;':'' }}">
                                        <p class="text-center">
                                            <strong>{{ trans('backend.shipment_to') }}</strong><br>
                                            {{ $toAddress->title->name }}<br>
                                            <strong>{{ trans('backend.block') }}:</strong> {{ $toAddress->block }},
                                            <strong>{{ trans('backend.building') }}:</strong> {{ $toAddress->building }},
                                            <strong>{{ trans('backend.street') }}:</strong> {{ $toAddress->street }} <br>
                                            <strong>{{ trans('backend.mobile') }}:</strong> {{ $toAddress->mobile }} <br>

                                            <p><strong>{{ trans('backend.price') }}</strong> {{ $toAddress->price }}</p>


                                        </p>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <hr>
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                            <strong>{{ trans('backend.eventTotal') }} {{ trans('backend.price') }} </strong> : {{ $Shipment->price }}
                                            {{ trans('backend.currency') }}</p>
                                            @if ($Shipment->status != 1 )
                                            <span class="label label-warning inline fontsize12"><strong>{{ trans('backend.approved_by_company',['company_name' => $company->name]) }}
                                                </strong><br></span>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 marginTop">
                                            @if ($Shipment->status == 1 )
                                            <div class="corner-ribbon new_ribbon  black shadow">
                                                {{ trans('backend.pending') }} </div>
                                            @elseif ($Shipment->status == 2)
                                            <div class="corner-ribbon new_ribbon blue shadow">
                                                {{ trans('backend.approved') }} </div>
                                            @elseif ($Shipment->status == 3)
                                            <div class="corner-ribbon new_ribbon orange shadow">
                                                {{ trans('backend.picked_up') }} </div>
                                            @elseif ($Shipment->status == 4)
                                            <div class="corner-ribbon new_ribbon green shadow">
                                                {{ trans('backend.delivered') }} </div>
                                            @elseif ($Shipment->status == 6)
                                            <div class="corner-ribbon new_ribbon red shadow">
                                                {{ trans('backend.deleted') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">{{ trans('backend.cancel') }}</button>
                                    <button type="button" class="btn dark-black p-x-md" onclick="print('ms-{{ $Shipment->id }}')">{{ trans('backend.print') }}</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div>
                    </div>
        </div>
        <!-- / .modal -->
        <!-- .modal -->
        <div id="mt-{{ $Shipment->id }}" class="modal fade" data-backdrop="true">
            <div class="modal-dialog" id="animate">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="logoPrint">
                            <img src="{{ URL::to('backEnd/assets/images/logo.png') }}" alt="Control">
                        </p>
                        <h5 class="modal-title  text-center">{{ trans('backend.shipment_id',[ 'id' => $Shipment->id]) }}</h5>
                    </div>
                    <div class="modal-body text-center p-lg">
                        @if(!empty($ShipmentDetails))

                        <?php
                        $transaction = $ShipmentDetails[$Shipment->id]['transactions'];
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                                    <p class="text-center margin-btm5"><strong>{{ trans('backend.wallet_amount') }} </strong>
                                    </p>
                                    <p class="text-center">{{ ($transaction->wallet_amount) ? ($transaction->wallet_amount) : 0  }} {{ trans('backend.currency') }}</p>
                                </div>

                                <!-- <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                            <p class="text-center margin-btm5"><strong>{{ trans('backend.card_amount') }} </strong></p>
                            <p class="text-center">{{ ($transaction->card_amount) ? ($transaction->card_amount) : 0  }} {{ trans('backend.currency') }}</p>
                        </div> -->

                                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                                    <p class="text-center margin-btm5"><strong>{{ trans('backend.free_deliveries') }} </strong>
                                    </p>
                                    <p class="text-center">{{ ($transaction->free_deliveries) ? ($transaction->free_deliveries) : 0 }} </p>
                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                                    <p class="text-center margin-btm5"><strong>{{ trans('backend.shipmentPrice') }} </strong>
                                    </p>
                                    <p class="text-center">{{ ($Shipment->price) ? ($Shipment->price) : 0 }} {{ trans('backend.currency') }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">{{ trans('backend.cancel') }}</button>
                        <button type="button" class="btn dark-black p-x-md" onclick="print('mt-{{ $Shipment->id }}')">{{ trans('backend.print') }}</button>
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
            <div class="col-sm-3 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backend.showing') }}
                    {{ $Shipments->firstItem() }}
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
@section('footerInclude')
<script type="text/javascript" src="{{ URL::to('backEnd/scripts/plugins/print.js') }}"></script>
<script>
    function print(id) {
        $("#" + id).click(function() {
            $(this).printThis({
                loadCSS: "{{ URL::to('backEnd/assets/styles/print.css') }}",
            });
        });
    }
</script>
@endsection