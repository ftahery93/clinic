@extends('backend.layout')

@section('content')
<div class="padding">
    <div class="box">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div class="box-header dker">
                        <h3>{{ trans('backend.commission_report') }}</h3>
                        <small>
                            <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                            <a href="">{{ trans('backend.commission_report') }}</a>
                        </small>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="box-header dker">
                        <!-- <div class="col-sm-2 "> -->
                        <!-- <span style="font-size: 25px" class="glyphicon glyphicon-calendar"></span> -->
                        <input type="text" style="padding:5px !important;" class="form-control daterange" name="daterange" id="daterange" placeholder="Date Range Filter" />
                        <input type="hidden" id="start_date" name="start_date" />
                        <input type="hidden" id="end_date" name="end_date" />
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>

        @if(count($transactions) > 0)
        <!-- {{Form::open(['route'=>'registered_users_update_all','method'=>'post'])}} -->
        <div class="table-responsive">
            <table class="table table-striped b-t">
                <thead>
                    <tr>
                        <th>{{ trans('backend.fullName') }}</th>
                        <th>{{ trans('backend.amount') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $eachTransaction)
                    <tr>
                        <td> {!! $eachTransaction['company_name'] !!} </td>
                        <td> {!! $eachTransaction['amount'] !!} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection
@section('footerInclude')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        //$('#daterange, #start_date, #end_date').val('');
        var $table4 = jQuery("#table-4");
        console.log("S-Inside");
        $table4.DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            "ajax": {
                "type": "GET",
                "url": "{{ url('admin/reports/commission') }}",
                data: function(data) {
                    data.start_date = $('#start_date').val();
                    data.end_date = $('#end_date').val();
                    console.log("This is the message");
                },
                success: function(result) {
                    console.log("This is the result for success" + result);
                },
                complete: function() {
                    $('.loading-image').hide();
                }
            },
            columns: [{
                    data: 'fullname',
                    name: 'fullname',
                },
                {
                    data: 'amount',
                    name: 'amount',
                },
            ],
            order: [
                [0, 'desc']
            ],
            "drawCallback": function(settings) {

                //$('#totalBottles').html(settings.json.totalBottles);
                //do whatever  
            },
        });

    });
</script>
<script>
    // $(function() {
    //     $('input[name="daterange"]').daterangepicker({
    //         opens: 'left'
    //     }, function(start, end, label) {
    //         console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    //     });
    // });
    function GetSelectedTextValue() {
        var $table4 = $("#table-4");
        $table4.DataTable().draw();
    }
    $('#daterange').daterangepicker({
        autoUpdateInput: false,
        locale: {
            format: 'DD/MM/YYYY',
        }
    }).on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        $('#start_date').val(picker.startDate.format('YYYY-MM-DD'));
        $('#end_date').val(picker.endDate.format('YYYY-MM-DD'));
        console.log("New dates " + picker.startDate + " - " + picker.endDate);
        GetSelectedTextValue();
    }).on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        $('#start_date').val('');
        $('#end_date').val('');
        GetSelectedTextValue();
    });
</script>
@endsection