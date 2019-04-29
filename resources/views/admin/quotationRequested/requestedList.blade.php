@extends('layouts.master')

@section('title')
Quotation Requested List
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/datatables/datatables.css') }}">
@endsection

@section('content')

@section('breadcrumb')
<li>

   <a href="{{ url('admin/serviceProviders') }}">Service Providers</a>
</li>
<li>

    <a href="{{ url('admin/userQuotationRequestedList').'/'.$id }}">User List</a>
</li>
@endsection

@section('pageheading')
{{ $spName }} - User {{ $userName }} (Quotation Requested  List)
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
                             <th class="col-sm-3">Service Name</th>
                            <th class="col-sm-3">Category Name</th>
                            <th class="col-sm-2">Location</th>
                            <th class="col-sm-2">Submission Date</th>
                            <th class="col-sm-2">Action</th>
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
            "url": '{{ url("admin/requestedList/$id/$user_id") }}',
            complete: function () {
                $('.loading-image').hide();
            }
        },
        columns: [
            {data: 0, name: 'service_name'},
            {data: 1, name: 'category_name'},
            {data: 2, name: 'location'},
            {data: 3, name: 'submission_date', class: 'text-center', orderable: false, searchable: false},
            {data: 5, name: 'action', class: 'text-center'}
        ],
        order: [[3, 'desc']],
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