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
                            <th class="text-center" style="width:250px;">{{ trans('backend.options') }}</th>
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
                                <td class="text-center">
                                    @if(@Auth::user()->permissionsGroup->view_status)
                                        <button class="btn btn-sm success" data-toggle="modal"
                                        data-target="#ms-{{ $Shipment->id }}" ui-toggle-class="bounce"
                                        ui-target="#animate">
                                            <small><i class="material-icons">visibility</i> {{ trans('backend.view') }}
                                            </small>
                                        </button>
                                    @endif
                                    @if ($Shipment->status != 1 )
                                        <button class="btn btn-sm primary" data-toggle="modal"
                                        data-target="#mt-{{ $Shipment->id }}" ui-toggle-class="bounce"
                                        ui-target="#animate">
                                            <small><i class="material-icons">local_atm</i> {{ trans('backend.transactions') }}
                                            </small>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <!-- .modal -->
                            <div id="ms-{{ $Shipment->id }}" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            @if ($Shipment->status == 1 )
                                            <div class="corner-ribbon top-left sticky black shadow">  {{ trans('backend.pending') }} </div>
                                            @elseif ($Shipment->status == 2)
                                            <div class="corner-ribbon top-left sticky blue shadow">  {{ trans('backend.approved') }} </div>
                                            @elseif ($Shipment->status == 3)
                                            <div class="corner-ribbon top-left sticky orange shadow">  {{ trans('backend.picked_up') }} </div>  
                                            @elseif ($Shipment->status == 4)
                                            <div class="corner-ribbon top-left sticky green shadow">  {{ trans('backend.delivered') }} </div> 
                                            @endif 
                                            <h5 class="modal-title text-center">{{ trans('backend.shipment_id',[ 'id' => $Shipment->id]) }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">                                               
                                            @if(!empty($ShipmentDetails))
                                                @foreach($ShipmentDetails as $ShipmentID => $ShipmentDetail)
                                                    @if($ShipmentID == $Shipment->id)
                                                        <?php 
                                                            $categories = $ShipmentDetail['categories']; 
                                                            $toAddress = $ShipmentDetail['toAddress']; 
                                                            $fromAddress = $ShipmentDetail['fromAddress']; 
                                                            $company = $ShipmentDetail['company']; 
                                                            $user = $ShipmentDetail['registered_user']; 
                                                        ?>
                                                        <p class="text-center"><strong>{{ trans('backend.shipment_from') }}  </strong><br><br>{{ $user->fullname }} <br> {{ $fromAddress->address }}</p>
                                                        <p class="text-center"><strong>{{ trans('backend.shipment_to') }}  </strong><br><br>{{ $toAddress->name }}<br>{{ $toAddress->mobile }}<br>{{ $toAddress->address }}</p>
                                                        @if(count($categories) > 0)
                                                            <p class="text-center"><strong>{{ trans('backend.categories') }} <?php echo "(".count($categories).")"; ?> </strong><br></p>
                                                            @foreach($categories as $category)
                                                                @if(!empty($category->name))
                                                                    <p class="text-center"><strong>{{ trans('backend.category_name') }}  </strong><br><br>{{ $category->name }}</p>
                                                                @endif
                                                                @if(!empty($category->quantity))
                                                                    <p class="text-center"><strong>{{ trans('backend.quantity') }}  </strong><br><br>{{ $category->quantity }}</p>
                                                                @endif
                                                            @endforeach
                                                        @endif 
                                                        <p class="text-center"><strong>{{ trans('backend.price') }}  </strong><br><br>{{ $Shipment->price }} {{ trans('backend.currency') }}</p>
                                                        @if ($Shipment->status != 1 )
                                                        <span class="label label-warning inline"><strong>{{ trans('backend.approved_by_company',['company_name' => $company->name]) }}  </strong><br></span>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md"
                                                    data-dismiss="modal">{{ trans('backend.cancel') }}</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- / .modal -->
                            <!-- .modal -->
                            <div id="mt-{{ $Shipment->id }}" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ trans('backend.transaction_id',[ 'id' => $Shipment->id]) }}</h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            @if(!empty($ShipmentDetails))
                                                @foreach($ShipmentDetails as $ShipmentID => $ShipmentDetail)
                                                    @if($ShipmentID == $Shipment->id)
                                                        <?php 
                                                            $transaction = $ShipmentDetail['transactions']; 
                                                            $commission = ($Shipment->price/100)*$Commission->percentage;
                                                        ?>
                                                        @if ($Shipment->status != 1 )
                                                        <span class="label label-warning inline"><strong>{{ trans('backend.approved_by_company',['company_name' => $company->name]) }}  </strong><br></span>
                                                        @endif
                                                        <p class="text-center"><strong>{{ trans('backend.wallet_amount') }}  </strong><br><br>{{ $transaction->wallet_amount }} {{ trans('backend.currency') }}</p>
                                                        <p class="text-center"><strong>{{ trans('backend.commission') }}  </strong><br><br>{{ $commission }} {{ trans('backend.currency') }}</p>
                                                        <p class="text-center"><strong>{{ trans('backend.card_amount') }}  </strong><br><br>{{ $transaction->card_amount }} {{ trans('backend.currency') }}</p>
                                                        <p class="text-center"><strong>{{ trans('backend.free_deliveries') }}  </strong><br><br>{{ $transaction->free_deliveries }} </p>
                                                        <p class="text-center"><strong>{{ trans('backend.price') }}  </strong><br><br>{{ $Shipment->price }} {{ trans('backend.currency') }}</p>
                                                    @endif
                                                @endforeach
                                            @endif
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md"
                                                    data-dismiss="modal">{{ trans('backend.cancel') }}</button>
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