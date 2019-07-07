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
                            {!! trans('backend.contactPhone') !!}:
                            &nbsp; {!! $Shipment->name !!}<br>
                            {!! trans('backend.contactEmail') !!}:
                            &nbsp; {!! $Shipment->namel !!}
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box p-a" style="min-height: 110px">
                        <strong class="text-muted">{!! trans('backend.sendTo') !!}:
                            &nbsp; {!! $Shipment->name !!}</strong>
                        <p class="text-muted">
                                {!! trans('backend.contactEmail') !!}:
                                &nbsp; {!! $Shipment->name !!}<br>
                                {!! trans('backend.sendCc') !!}:
                                &nbsp; {!! $Shipment->name !!}<br>
                                {!! trans('backend.sendBcc') !!}:
                                &nbsp; {!! $Shipment->name !!}
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
