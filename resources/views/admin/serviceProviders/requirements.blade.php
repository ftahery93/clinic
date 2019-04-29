@extends('layouts.master')

@section('title')
Service Providers
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/datatables/datatables.css') }}">
@endsection

@section('content')

@section('breadcrumb')

@endsection

@section('pageheading')
Service Providers
@endsection
<form class="form" role="form" method="POST" action="{{ url('admin/serviceProviders/delete')  }}" >  
    {{ csrf_field() }} 
    <div class="row">
        <div class="col-md-12">
            @include('layouts.flash-message')

            <div class="panel panel-dark" data-collapsed="0">

                <div class="panel-body  table-responsive">
                    <div class="loading-image" style="position:relative;"><img src='{{ asset('assets/images/loader-1.gif') }}'></div>
                    <table class="table table-bordered datatable" id="table-4">
                        <thead>
                            <tr>
                                <th class="col-sm-2">Company Name</th>
                                <th class="col-sm-1">Type</th>
                                <th class="text-center col-sm-9">Requirements</th>
                            </tr>
                        </thead>


                    </table>
                </div>

            </div>

        </div>
    </div>
</form>
@endsection

@section('scripts')

<script src="{{ asset('assets/js/datatables/datatables.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function ($) {
    var $table4 = jQuery("#table-4");
    $table4.DataTable({
        "stateSave": true,
        processing: true,
        serverSide: true,
        ordering: true,
        language: {
            processing: "<img src='{{ asset('assets/images/loader-1.gif') }}'>"
        },
        "ajax": {
            "type": "GET",
            "url": '{{ url("admin/serviceProviders") }}/'+"{{ $serviceProvider_str }}requirements",
            complete: function () {
                $('.loading-image').hide();
            }
        },
        columns: [
            {data: 1, name: 'fullname'},
            {data: 2, name: 'serviceprovider_type'},
            {data: 3, name: 'requirements'},
        ],
        order: [[0, 'desc']]
    });

});
</script>


@endsection