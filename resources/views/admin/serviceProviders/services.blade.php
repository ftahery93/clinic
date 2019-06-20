@extends('layouts.master')

@section('title')
{{ $ServiceProvider }} - Services
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/icheck/skins/polaris/polaris.css') }}">
@if($EditAccess!=1)
<style>
    table tr th:last-child, table tr td:last-child{display:none;}
</style>
@endif
@if($DeleteAccess!=1)
<style>
    table tr th:first-child, table tr td:first-child{display:none;}
</style>
@endif

@endsection

@section('content')

@section('breadcrumb')
<li>

    <a href="{{ url('admin/serviceProviders') }}">Service Providers</a>
</li>
@endsection

@section('pageheading')
{{ $ServiceProvider }} - Services
@endsection
<form class="form" role="form" method="POST" action="{{ url('admin/serviceProviders'.'/'.$serviceProvider_id.'/service/delete')  }}" >  
   {{ csrf_field() }} 
    <div class="row">
        <div class="col-md-12">
            @include('layouts.flash-message')

            <div class="panel panel-dark" data-collapsed="0">


                <div class="panel-heading">

                    <div class="panel-options">
                        @if ($CreateAccess==1)
                        <a href="#myModal2" data-val="' . $Service->id . '"  class="margin-top0" data-toggle="modal" id="create">
                            <button type="button" class="btn btn-default btn-icon">
                                Add Record
                                <i class="entypo-plus padding10"></i>
                            </button>
                        </a>
                        @endif

                        @if ($DeleteAccess==1)
                        <button Onclick="return ConfirmDelete();" type="button" class="btn btn-danger btn-icon">
                            Delete
                            <i class="entypo-trash"></i>
                        </button>                        
                        @endif

                    </div>
                </div>

                <div class="panel-body  table-responsive">
                    <div class="loading-image" style="position:relative;"><img src='{{ asset('assets/images/loader-1.gif') }}'></div>
                    <table class="table table-bordered datatable" id="table-4">
                        <thead>
                            <tr>
                                <th class="text-center" id="td_checkbox"><input tabindex="5" type="checkbox" class="icheck-14"  id="check-all"></th>
                                <th class="col-sm-6">Name</th>
                                <th class="text-center">Status</th>
                                <th class="text-center col-sm-2">Created On</th>
                                <th class="text-center col-sm-2">Actions</th>
                            </tr>
                        </thead>


                    </table>
                </div>

            </div>

        </div>
    </div>
</form>
<!-- Modal 3(Ajax Modal)-->
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 40%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Add Record</h4>
            </div>
            <div class="modal-body">
                <form role="form" class="form-horizontal form-groups-bordered" autocomplete="off"  id="form1" >

                    <div class="row">
                        <input type="hidden" name="sp_id" value="" id="sp_id">
                        <input type="hidden" name="update" value="" id="update">
                        <div class="form-group col-sm-12">

                            <div class="col-sm-6{{ $errors->has('name_en') ? ' has-error' : '' }}">

                                <label for="name_en" class="col-sm-4 control-label">Name(EN)</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="name_en" autocomplete="off" value="{{ old('name_en') }}" name="name_en">
                                    @if ($errors->has('name_en'))

                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_en') }}</strong>
                                    </span>

                                    @endif
                                </div>

                            </div>

                            <div class="col-sm-6{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                <label for="name_ar" class="col-sm-4 control-label">Name(AR)</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="name_ar" autocomplete="off" value="{{ old('name_ar') }}" name="name_ar" dir="rtl"> 
                                    @if ($errors->has('name_ar'))

                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_ar') }}</strong>
                                    </span>

                                    @endif
                                </div>

                            </div>

                        </div>

                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-green btn-icon" id="submit">
                    Save
                    <i class="entypo-check"></i>
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                <!--                    <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('scripts')
<script src="{{ asset('assets/js/datatables/datatables.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.js') }}"></script>
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
                                            "url": '{{ url("admin/serviceProviders/$serviceProvider_id/services") }}',
                                            complete: function () {
                                            $('.loading-image').hide();
                                            }
                                    },
                                    columns: [
                                    {data: 0, name: 'id', orderable: false, searchable: false, class: 'text-center checkbox_padding'},
                                    {data: 1, name: 'name_en'},
                                    {data: 2, name: 'status', orderable: false, searchable: false, class: 'text-center'},
                                    {data: 3, name: 'created_at', class: 'text-center'},
                                    {data: 5, name: 'action', orderable: false, searchable: false, class: 'text-center'}
                                    ],
                                    order: [[3, 'ASC']],
                                    "fnDrawCallback": function (oSettings) {
                                    $('input.icheck-14').iCheck({
                                    checkboxClass: 'icheckbox_polaris',
                                            radioClass: 'iradio_polaris'
                                    });
                                    $('#check-all').on('ifChecked', function (event) {
                                    $('.check').iCheck('check');
                                    return false;
                                    });
                                    $('#check-all').on('ifUnchecked', function (event) {
                                    $('.check').iCheck('uncheck');
                                    return false;
                                    });
// Removed the checked state from "All" if any checkbox is unchecked
                                    $('#check-all').on('ifChanged', function (event) {
                                    if (!this.changed) {
                                    this.changed = true;
                                    $('#check-all').iCheck('check');
                                    } else {
                                    this.changed = false;
                                    $('#check-all').iCheck('uncheck');
                                    }
                                    $('#check-all').iCheck('update');
                                    });
                                    /*----Status Update---*/
                                    $('.status').on('click', function (e) {
                                    e.preventDefault();
                                    var ID = $(this).attr('sid');
                                    var Value = $(this).attr('value');
                                    $.ajax({
                                    type: "PATCH",
                                            async: true,
                                            url: "{{ url('admin/serviceProviders')}}/" + ID + '/' + {{ $serviceProvider_id }} + '/services',
                                            data: {id: ID, status: Value, _token: '{{ csrf_token() }}'},
                                            success: function (data) {
                                            $table4.DataTable().ajax.reload(null, false);
                                            toastr.success(data.response, "", opts);
                                            }
                                    });
                                    });
                                    /*------END----*/
                                    /*----Add record---*/
                                    $('.add_record').on('click', function (e) {
                                    e.preventDefault();
                                    $('#form1')[0].reset();
                                    $('#submit').prop('disabled', false);
                                    var ID = $(this).attr('data-val');
                                    var name_en = $(this).attr('name_en');
                                    var name_ar = $(this).attr('name_ar');
                                    var update = $(this).attr('update');
                                    $('#sp_id').val(ID);
                                     $('#update').val(update);
                                    $('#name_en').val(name_en);
                                    $('#name_ar').val(name_ar);
                                    });
                                    $('#create').on('click', function (e) {
                                    e.preventDefault();                                    
                                    $('#form1')[0].reset();
                                    $('#submit').prop('disabled', false);
                                    });
                                    $('#submit').on('click', function (e) {
                                    e.preventDefault();
                                    $(this).off('click');
                                    $(this).prop('disabled', true);
                                    var ID = $('#sp_id').val();
                                    var name_en = $('#name_en').val();
                                    var name_ar = $('#name_ar').val();
                                    var update = $('#update').val();
                                    $.ajax({
                                    type: "POST",
                                            async: true,
                                            "url":  '{{ url("admin/serviceProviders/$serviceProvider_id/addService") }}',
                                            data: {id: ID, name_en: name_en, name_ar: name_ar, update: update, _token: '{{ csrf_token() }}'},
                                            success: function (data) {
                                            if (data.response) {
                                            $table4.DataTable().ajax.reload(null, false);
                                            toastr.success(data.response, "", opts);                                            
                                            $('#close').click();
                                            }
                                            if (data.error) {
                                            $('#submit').prop('disabled', false);
                                            toastr.error(data.error, "", opts2);
                                            }
                                            }
                                    });
                                    });
                                    /*------END----*/
                                    },
                                    buttons: [
                                            //'copyHtml5',
                                            'excelHtml5',
                                            'csvHtml5',
                                            'pdfHtml5'
                                    ]
                            });
                            // Sample Toastr Notification
                            var opts = {
                            "closeButton": true,
                                    "debug": false,
                                    "positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
                                    "toastClass": "sucess",
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                            };
                             // Sample Toastr Notification
                                               var opts2 = {
                                               "closeButton": true,
                                                       "debug": false,
                                                       "positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
                                                       "toastClass": "error",
                                                       "onclick": null,
                                                       "showDuration": "300",
                                                       "hideDuration": "1000",
                                                       "timeOut": "5000",
                                                       "extendedTimeOut": "8000",
                                                       "showEasing": "swing",
                                                       "hideEasing": "linear",
                                                       "showMethod": "fadeIn",
                                                       "hideMethod": "fadeOut"
                                               };
                            });</script>
<script type="text/javascript">
    jQuery(document).ready(function ($)
    {
    $('input.icheck-14').iCheck({
    checkboxClass: 'icheckbox_polaris',
            radioClass: 'iradio_polaris'
    });
    /*---CheckAll---*/
    $('#check-all').on('ifChecked', function (event) {
    $('.check').iCheck('check');
    return false;
    });
    $('#check-all').on('ifUnchecked', function (event) {
    $('.check').iCheck('uncheck');
    return false;
    });
// Removed the checked state from "All" if any checkbox is unchecked
    $('#check-all').on('ifChanged', function (event) {
    if (!this.changed) {
    this.changed = true;
    $('#check-all').iCheck('check');
    } else {
    this.changed = false;
    $('#check-all').iCheck('uncheck');
    }
    $('#check-all').iCheck('update');
    });
    /*------END----*/


    });
    /*---On Delete All Confirmation---*/
    function ConfirmDelete() {
    var chkId = '';
    $('.check:checked').each(function () {
    chkId = $(this).val();
    });
    if (chkId == '') {
    alert('{{ config('global.deleteCheck') }}');
    return false;
    } else {
    if (confirm('{{ config('global.deleteConfirmation') }}')) {
    $('.form').submit();
    } else {
    return false;
    }
    }

    }
    /*------END----*/
</script>



@endsection