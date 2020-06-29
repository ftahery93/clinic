@extends('backend.layout')

@section('content')
<div class="padding">
    <div class="box">
        <div class="row">

            <div class="col-sm-12">
                <div class="box-header dker">
                    <!-- <div class="col-sm-2 "> -->
                    <!-- <span style="font-size: 25px" class="glyphicon glyphicon-calendar"></span> -->
                    {{-- <input type="text" style="padding:5px !important;" class="form-control daterange" name="daterange" id="daterange" placeholder="Date Range Filter" /> --}}
                    <div class="row">
                        <div class="col-sm-6" id="date">
                            <div class="col-sm-6">
                                <input type="text" class="form-control datetimepicker" id="startdate" autocomplete="off"  name="startdate" value="<?php echo @$_GET['start_date']; ?>">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control datetimepicker" id="enddate" autocomplete="off"  name="enddate"  value="<?php echo @$_GET['end_date']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-md warning" id="filter" onclick="GetSelectedTextValue();">
                                <small><i class="material-icons">filter</i> Filter
                                </small>
                            </button>
                            <button class="btn btn-md success" id="clear" onclick="cancelled();">
                                <small><i class="material-icons">clear</i> Clear
                                </small>
                            </button>
                        </div>
                       </div>
                    <input type="hidden" id="start_date" name="start_date" />
                    <input type="hidden" id="end_date" name="end_date" />
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-sm-12">                
                <div class="box-header dker">
                    <h3>{{ trans('backend.shipment_report') }}</h3>
                    <small>
                        <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                        <a href="">{{ trans('backend.shipment_report') }}</a>
                    </small>
                </div>
                
            </div>
        </div>
       
        @if(count($shipmentCountResponse) > 0)
        <!-- {{Form::open(['route'=>'registered_users_update_all','method'=>'post'])}} -->
        <div class="table-responsive">
            <table class="table table-striped b-t">
                <thead>
                    <tr>
                        <th>{{ trans('backend.companyName') }}</th>
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
        @else
        <div class="row">
            <div class="col-sm-12">
            <div align="center"><p></p><p><h6>No Record Found</h6></p></div>
        </div>
      </div>
        @endif
    </div>
</div>
@endsection
@section('footerInclude')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}" />
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script>   
    function GetSelectedTextValue() {
        $start_date = $('#startdate').val();
        $end_date = $('#enddate').val();
        window.location.href="{{ url('admin/reports/shipments') }}?start_date="+$start_date + '&end_date='+$end_date;
    }
    function cancelled() {       
        window.location.href="{{ url('admin/reports/shipments') }}";
    }
    // $('#daterange').daterangepicker({
    //     autoUpdateInput: false,
    //     locale: {
    //         format: 'DD/MM/YYYY',
    //     }
    // }).on('apply.daterangepicker', function(ev, picker) {
    //     $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    //     $('#start_date').val(picker.startDate.format('YYYY-MM-DD'));
    //     $('#end_date').val(picker.endDate.format('YYYY-MM-DD'));
    //    // console.log("New dates " + picker.startDate + " - " + picker.endDate);
    //     GetSelectedTextValue();
    // }).on('cancel.daterangepicker', function(ev, picker) {
    //     $(this).val('');
    //     $('#start_date').val('');
    //     $('#end_date').val('');
    //     cancelled();
    // });
    $(function () {
        /*-------Date-----------*/       
        $('#startdate').datepicker({
            format: 'yyyy-mm-dd',
            startView: "months",
           // minViewMode: "months",
            showTodayButton: true,
            sideBySide: true,
            showClose: true,
            showClear: true,
            keepOpen: true,
            toolbarPlacement: 'bottom'
        }).on('changeDate', function (selected) {
            startDate = new Date(selected.date.valueOf());
            startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
            $('#enddate').datepicker('setStartDate', startDate);
        });
        $('#enddate').datepicker({
            format: 'yyyy-mm-dd',
            startView: "months",
           // minViewMode: "months",
            showTodayButton: true,
            sideBySide: true,
            showClose: true,
            showClear: true,
            keepOpen: true,
            toolbarPlacement: 'bottom'
        }).on('changeDate', function (selected) {
            FromEndDate = new Date(selected.date.valueOf());
            FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
            $('#startdate').datepicker('setEndDate', FromEndDate);
        });
    });
</script>
@endsection