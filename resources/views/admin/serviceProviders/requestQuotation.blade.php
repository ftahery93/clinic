@extends('layouts.master')

@section('title')
{{ $ServiceProvider }} - Quotation Form
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/animate.css')}}">
<style>
    .required label:after {
        color: #e32;
        content: '*';
        display:inline;
    }
    .radio label input, .checkbox label input {
        position: relative;
        top: 19px;
    }
</style>
@endsection

@section('content')

@section('breadcrumb')
<li>

    <a href="{{ url('admin/serviceProviders') }}">Service Providers</a>
</li>
@endsection

@section('pageheading')
{{ $ServiceProvider }} - Quotation Form
@endsection


<div class="row">
    <div class="col-md-12">
        @if(count($errors))
        @include('layouts.flash-message')
        @yield('form-error')
        @endif
        <div class="panel panel-primary" data-collapsed="0" ng-app="ngDynamicForms">

            <div class="panel-heading">


                <div class="panel-options padding10">
                    <button type="button" class="btn btn-info btn-icon" id="preview">
                        Quotaion Form Preview
                        <i class="entypo-eye"></i>
                    </button>
                    <button type="button" class="btn btn-green btn-icon" id="saveForm">
                        Save
                        <i class="entypo-check"></i>
                    </button>
                    <a href="{{ url('admin/serviceProviders')}}" class="margin-top0">
                        <button type="button" class="btn btn-red btn-icon">
                            Cancel
                            <i class="entypo-cancel"></i>
                        </button>
                    </a>

                </div>
            </div>

            <div class="panel-body">

                <div class="row">
                    <div class="form-group col-sm-12" >
                        <div ng-controller="FormBuilderCtrl" style="padding-top:30px;" >
                            <div ng-dynamic-form /></div>                        
                    </div>
                                          
                </div>

            </div>


        </div>

           
    </div>

</div>
</div>
<!-- Modal 1 (Ajax Modal)-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width: 30%;">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Quotation Form</h4>
                <div class="loading-image" style="position:relative;"><img src='{{ asset('assets/images/loader-1.gif')}}'></div>
            </div>
            <div class="modal-body" id="quotationForm">
             
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <!--                    <button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('scripts')
<script src="{{ asset('assets/js/toastr.js')}}"></script>
<script src="{{ asset('assets/js/angular.js')}}"></script>
<script>
    var app = angular.module('ngDynamicForms', []);
    app.controller('FormBuilderCtrl', function FormBuilderCtrl($scope)
    {
    $scope.newField = {};
    $scope.fields = [];
//        $scope.fields = [{
//                type: 'text',
//                name: 'Name',
//                placeholder: 'Please enter your name',
//                order: 1
//            }];
    $scope.editing = false;
    $scope.tokenize = function (slug1, slug2) {
    var result = slug1;
    result = result.replace(/[^-a-zA-Z0-9,&\s]+/ig, '');
    result = result.replace(/-/gi, "_");
    result = result.replace(/\s/gi, "-");
    if (slug2) {
    result += '-' + $scope.token(slug2);
    }
    return result;
    };
    $scope.saveField = function () {

    if ($scope.newField.type == 'checkboxes') {
    $scope.newField.value = {};
    }
    if ($scope.editing !== false) {
    $scope.fields[$scope.editing] = $scope.newField;
    $scope.editing = false;
    } else {
    $scope.fields.push($scope.newField);
    }
    $scope.newField = {
    order:1
    };
    };
   
    $scope.editField = function (field) {
    $scope.editing = $scope.fields.indexOf(field);
    $scope.newField = field;
    };
    $scope.splice = function (field, fields) {
    fields.splice(fields.indexOf(field), 1);
    };
    $scope.addOption = function () {
    if ($scope.newField.options === undefined) {
    $scope.newField.options = [];
    }
    $scope.newField.options.push({
    order: 1
    });
    };
    $scope.typeSwitch = function (type) {
    /*if (angular.Array.indexOf(['checkboxes','select','radio'], type) === -1)
     return type;*/
    if (type == 'checkboxes')
            return 'multiple';
    if (type == 'select')
            return 'multiple';
    if (type == 'radio')
            return 'multiple';
    return type;
    }
    
    });
   
    app.directive('ngDynamicForm', function () {
    return {
    // We limit this directive to attributes only.
    restrict: 'A',
            // We will not replace the original element code
            result: false,
            // We must supply at least one element in the code 
            templateUrl: "{{ url('admin/serviceProviders/dynamicForm')}}/" + {{ $serviceProvider_id}}
    }
    });
    
    </script>

<script>
    jQuery(document).ready(function ($) {
    /*----Form Submit---*/
    $('#saveForm').on('click', function (e) {
    e.preventDefault();
    var jsonData = $('#jsonData').val();
    $.ajax({
    type: "POST",
            async: true,
            url: "{{ url('admin/serviceProviders/storeRequestQuotation')}}",
            data: {jsonData: jsonData, serviceProvider_id: {{ $serviceProvider_id}}, _token: '{{ csrf_token() }}'},
            success: function (data) {
            toastr.success(data.response, "", opts);
            }
    });
    });
    /*------END----*/
    /*----Form Preview---*/
    $('#preview').on('click', function (e) {
    e.preventDefault();
    $('#myModal').modal({show: true});
    $.ajax({
    type: "GET",
            async: true,
            url: "{{ url('admin/serviceProviders/quotationFormPreview')}}/" + {{ $serviceProvider_id}},
            success: function (data) {
            $('#quotationForm').html(data.html);
            },
            complete: function () {
            $('.loading-image').hide();
            }
    });
    });
    /*------END----*/
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
    });
</script>   
@endsection