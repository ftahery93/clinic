@extends('backend.layout')

@section('content')
<div class="row-col">
    <div class="col-sm">
        <div ui-view class="padding">
            <div class="row hidden-print">
                <div class="col-sm-12">
                    <div class="p-b-1 pull-right">
                        <a class="btn btn-sm btn-default p-r-1"
                            onClick="window.print();">
                            <i class="fa fa-print"></i> {!! trans('backend.print') !!}
                        </a>
                    </div>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="box p-a dark" style="min-height: 110px">
                        <strong class="text-muted">{!! trans('backend.shipment_from') !!}:
                            &nbsp; {!! $Shipment->name !!}</strong>
                        <p class="text-muted">
                            {!! trans('backend.block') !!}:
                                &nbsp; {!! $FromAddress->block !!}<br>
                                {!! trans('backend.street') !!}:
                                &nbsp; {!! $FromAddress->street !!}<br>
                                {!! trans('backend.area') !!}:
                                &nbsp; {!! $FromAddress->area !!}<br>
                                {!! trans('backend.building') !!}:
                                &nbsp; {!! $FromAddress->building !!}<br>
                                {!! trans('backend.details') !!}:
                                &nbsp; {!! $FromAddress->details !!}<br>
                                {!! trans('backend.mobile') !!}:
                                &nbsp; {!! $FromAddress->mobile !!}
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box p-a" style="min-height: 110px">
                        <strong class="text-muted">{!! trans('backend.shipment_to') !!}:
                            &nbsp; {!! $Shipment->name !!}</strong>
                        <p class="text-muted">
                                {!! trans('backend.block') !!}:
                                &nbsp; {!! $ToAddress->block !!}<br>
                                {!! trans('backend.street') !!}:
                                &nbsp; {!! $ToAddress->street !!}<br>
                                {!! trans('backend.area') !!}:
                                &nbsp; {!! $ToAddress->area !!}<br>
                                {!! trans('backend.building') !!}:
                                &nbsp; {!! $ToAddress->building !!}<br>
                                {!! trans('backend.details') !!}:
                                &nbsp; {!! $ToAddress->details !!}<br>
                                {!! trans('backend.mobile') !!}:
                                &nbsp; {!! $ToAddress->mobile !!}
                        </p>
                    </div>
                </div>
            </div>
            <?php
            $dtformated = date('d M Y h:i A', strtotime(time()));
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="box p-a">
                        <h4>{!! $Shipment->name !!}</h4>
                        <small><i class="fa fa-calendar"></i> {{$dtformated}}</small>
                            <hr>
                            <p></p>
                            {!! nl2br($Shipment->name) !!}
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
