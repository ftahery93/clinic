@extends('layouts.master')

@section('title')
Quotation Requested
@endsection

@section('css')
@endsection

@section('content')

@section('breadcrumb')
<li>

    <a href="{{ url('admin/registeredUsers') }}">Users</a>
</li>
<li>

    <a href="{{ url('admin/quotationRequestedList').'/'.$userID }}">Quotation Requested List</a>
</li>
@endsection

@section('pageheading')
Quotation Requested - {{ $userName }}
@endsection

<div class="row">
    <div class="col-md-12">
        @include('layouts.flash-message')

        <div class="panel panel-primary" data-collapsed="0">


            <div class="row">

                <div class="col-md-12">

                    <div class="tabs-vertical-env">

                        <ul class="nav tabs-vertical"><!-- available classes "right-aligned" -->
                            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                            <li><a href="#images" data-toggle="tab">Images</a></li>
                            <li><a href="#files" data-toggle="tab">Files</a></li>
                        </ul>

                        <div class="tab-content" id="tabs_padding">
                            <div class="tab-pane active" id="details">
                                <table class="table_column_separate">
                                    <tr>
                                        <td>
                                            <label class="labelMarginBottom">Service Name:</label>
                                        </td>
                                        <td>
                                            <p class="table_padding_p">{{ $quotationDetails->service_name }} </p>
                                        </td>

                                        <td>
                                            <label class="labelMarginBottom"> Category Name:</label>
                                        </td>
                                        <td>
                                            <p class="table_padding_p"> {{ $quotationDetails->category_name }}</p> 
                                        </td>
                                        <td>
                                            <label class="labelMarginBottom"> Location: </label>
                                        </td>
                                        <td>
                                            <p class="table_padding_p">{{ $quotationDetails->location }} </p>
                                        </td>                                        
                                    </tr>
                                    <tr>      
                                        <td>
                                            <label class="labelMarginBottom"> Submission Date:</label>
                                        </td>
                                        <td>
                                            <p class="table_padding_p"> {{ $quotationDetails->submission_date }}</p> 
                                        </td>
                                        <td>
                                            <label class="labelMarginBottom"> Description: </label>
                                        </td>
                                        <td>
                                            <p class="table_padding_p">{{ $quotationDetails->description }} </p>
                                        </td>
                                        <td>
                                            <label class="labelMarginBottom"> Quotation Requested Date:</label>
                                        </td>
                                        <td>
                                            <p class="table_padding_p"> {{ $quotationDetails->requested_date }}</p> 
                                        </td>
                                    </tr>

                                </table>
                                <div class="row">

                                    <div class="col-md-12">

                                        <ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
                                            <li class="active">
                                                <a href="#applied" data-toggle="tab">
                                                    <span class="visible-xs"><i class="entypo-home"></i></span>
                                                    <span class="hidden-xs">Applied</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#notapplied" data-toggle="tab">
                                                    <span class="visible-xs"><i class="entypo-user"></i></span>
                                                    <span class="hidden-xs">Not Applied</span>
                                                </a>
                                            </li>

                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="applied">

                                                <div class="scrollable" data-height="120">
                                                    <table class="table table-bordered datatable" id="table-4">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-sm-4">Name</th>
                                                                <th class="col-sm-2 text-center">Quotation Approved</th>
                                                                <th class="col-sm-2 text-center">Price {{ config('global.amountCurrency') }}</th>
                                                                <th class="col-sm-2 text-center">Duration</th>
                                                                <th class="col-sm-3 text-center">Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($QuotationApplied as $provider)
                                                            <tr>
                                                                <th class="col-sm-4">{{ $provider->company_name }}</th>                                                               
                                                                <th class="col-sm-2 text-center">
                                                                    @if($provider->approved_status==1)<div class="label label-success status" style="cursor:default" ><i class="entypo-check"></i></div> @else 
                                                                    <div class="label label-secondary status" style="cursor:default" ><i class="entypo-cancel"></i></div> @endif</th>
                                                                <th class="col-sm-2 text-right">{{ $provider->price }}</th>
                                                                <th class="col-sm-2 text-center">{{ $provider->duration }}</th>

                                                                <th class="col-sm-2 text-center">                                                                   
                                                                    <a href="{{ url('admin/quotationAppliedDetails'). '/' . $provider->id }}" class="btn btn-info tooltip-primary btn-small" data-toggle="tooltip" data-placement="top"
                                                                       title="Quotation Applied Details" data-original-title="Quotation Applied Details"><i class="entypo-eye"></i></a></th>                                                              
                                                            </tr>
                                                            @endforeach 
                                                        </tbody>

                                                    </table>
                                                </div>

                                            </div>
                                            <div class="tab-pane" id="notapplied">
                                                <div class="scrollable" data-height="120">
                                                    <table class="table table-bordered datatable" id="table-4">
                                                        <thead>
                                                        <th class="col-sm-4">Name</th>
                                                        <th class="col-sm-3">Email</th>
                                                        <th class="col-sm-2">Mobile</th>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($QuotationNotApplied as $provider)
                                                            <tr>
                                                                <th class="col-sm-4">{{ $provider->company_name }}</th>
                                                                <th class="col-sm-4">{{ $provider->email }}</th>
                                                                <th class="col-sm-4">{{ $provider->mobile }}</th>
                                                            </tr>
                                                            @endforeach 
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>

                                        </div>


                                    </div>


                                </div>

                            </div>

                            <div class="tab-pane" id="images">
                                <table>
                                    <tr>
                                        @foreach ($images as $image)
                                        <td>
                                            <a href="{{ url('admin/docDownload').'/'.$image.'/quotation_request_images' }}">    
                                                <img src="{{ url('public/quotation_request_images/'.$image) }}" />
                                            </a>
                                        </td>
                                        @endforeach
                                    </tr>

                                </table>
                            </div>
                            <div class="tab-pane" id="files">
                                <table>
                                    <tr>
                                        @foreach ($files as $files)
                                        <td>                                       
                                            @if(pathinfo($files, PATHINFO_EXTENSION)=='dwg')
                                            <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_request_images' }}">                                                
                                                <img src="{{ asset('assets/images/1.png') }}" width="50" />                                            
                                            </a>
                                            @endif
                                            @if(pathinfo($files, PATHINFO_EXTENSION)=='ppt')
                                            <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_request_images'}}">                                              
                                                <img src="{{ asset('assets/images/2.png') }}" width="50" />                                            
                                            </a>
                                            @endif
                                            @if(pathinfo($files, PATHINFO_EXTENSION)=='png' || pathinfo($files, PATHINFO_EXTENSION)=='jpg')
                                            <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_request_images' }}">                                      
                                                <img src="{{ asset('assets/images/3.png') }}" width="50" />                                            
                                            </a>
                                            @endif
                                            @if(pathinfo($files, PATHINFO_EXTENSION)=='xlsx')
                                            <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_request_images' }}">                                                
                                                <img src="{{ asset('assets/images/4.png') }}" width="50" />                                            
                                            </a>
                                            @endif
                                            @if(pathinfo($files, PATHINFO_EXTENSION)=='doc')
                                            <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_request_images' }}">                                
                                                <img src="{{ asset('assets/images/5.png') }}" width="50" />                                            
                                            </a>
                                            @endif
                                            @if(pathinfo($files, PATHINFO_EXTENSION)=='pdf')
                                            <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_request_images' }}">                                           
                                                <img src="{{ asset('assets/images/6.png') }}" width="50" />                                            
                                            </a>
                                            @endif
                                        </td>
                                        @endforeach
                                    </tr>

                                </table>
                            </div>
                        </div>

                    </div>	

                </div>


            </div>

        </div>

    </div>
</div>

@endsection

@section('scripts')

@endsection