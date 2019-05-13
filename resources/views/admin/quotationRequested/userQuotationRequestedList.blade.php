@extends('layouts.master')

@section('title')
User List
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/datatables/datatables.css') }}">

@endsection

@section('content')

@section('breadcrumb')
<li>

    <a href="{{ url('admin/serviceProviders') }}">Service Providers</a>
</li>
@endsection

@section('pageheading')
{{ $userName }} - User List
@endsection

<div class="row">
    <div class="col-md-12">
        @include('layouts.flash-message')

        <div class="panel panel-dark" data-collapsed="0">


            <div class="panel-body  table-responsive">
                <div class="loading-image" style="position:relative;"><img src='{{ asset('assets/images/loader-1.gif') }}'></div>
                <table class="table table-bordered datatable" id="table-4">
                    <thead>
                        <tr>
                            <th class="col-sm-4">Name</th>
                            <th class="col-sm-3">Email</th>
                            <th class="col-sm-2">Mobile</th>
                            <th class="col-sm-2">Country</th>
                            <th class="col-sm-1">Action</th>
                        </tr>
                    </thead>


                </table>
            </div>

        </div>

    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables/datatables.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function ($) {
    var $table4 = jQuery("#table-4");
    $table4.DataTable({
        dom: 'lBfrtip',
        "stateSave": true,
        processing: true,
        serverSide: true,
        ordering: true,
        language: {
            processing: "<img src='{{ asset('assets/images/loader-1.gif') }}'>"
        },
        "ajax": {
            "type": "GET",
            "url": '{{ url("admin/userQuotationRequestedList/$id") }}',
            complete: function () {
                $('.loading-image').hide();
            }
        },
        columns: [
            {data: 1, name: 'fullname'},
            {data: 2, name: 'email', orderable: false},
            {data: 3, name: 'mobile', class: 'text-center'},
            {data: 4, name: 'country', class: 'text-center', orderable: false},
            {data: 5, name: 'action', class: 'text-center'}
        ],
        order: [[1, 'desc']],
        buttons: [
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
});


</script>

@endsection