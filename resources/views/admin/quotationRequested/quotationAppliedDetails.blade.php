@extends('layouts.master')

@section('title')
Quotation Applied Details
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
<li>

    <a href="{{ url('admin/quotationRequestedDetails').'/'.$quotationDetails->id }}">Quotation Requested</a>
</li>
@endsection

@section('pageheading')
Quotation Applied Details - {{ $quotationDetails->userName }}
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
                                <div class="col-sm-12">
                                    <label><h4>Quotation Applied : {{ $quotationDetails->company_name }}</h4></label>
                                </div>
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
                                    <tr>      
                                        <td>
                                            <label class="labelMarginBottom"> Price:</label>
                                        </td>
                                        <td>
                                            <p class="table_padding_p"> {{ $quotationDetails->price }}</p> 
                                        </td>
                                        <td>
                                            <label class="labelMarginBottom"> Duration(In Days): </label>
                                        </td>
                                        <td>
                                            <p class="table_padding_p">{{ $quotationDetails->duration }} </p>
                                        </td>                                        
                                    </tr>

                                </table>

                            </div>

                            <div class="tab-pane" id="images">
                                <table>
                                    <tr>
                                        @foreach ($images as $image)
                                        <td>
                                            <a href="{{ url('admin/docDownload').'/'.$image.'/quotation_applied_images' }}">    
                                                <img src="{{ url('public/quotation_applied_images/'.$image) }}" />
                                            </a>
                                        </td>
                                        @endforeach
                                    </tr>

                                </table>
                            </div>
                            <div class="tab-pane" id="files">
                                <tr>
                                    @foreach ($files as $files)
                                    <td>                                       
                                        @if(pathinfo($files, PATHINFO_EXTENSION)=='dwg')
                                        <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_applied_images' }}">                                                
                                            <img src="{{ asset('assets/images/1.png') }}" width="50" />                                            
                                        </a>
                                        @endif
                                        @if(pathinfo($files, PATHINFO_EXTENSION)=='ppt')
                                        <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_applied_images' }}">                                              
                                            <img src="{{ asset('assets/images/2.png') }}" width="50" />                                            
                                        </a>
                                        @endif
                                        @if(pathinfo($files, PATHINFO_EXTENSION)=='png' || pathinfo($files, PATHINFO_EXTENSION)=='jpg')
                                        <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_applied_images' }}">                                      
                                            <img src="{{ asset('assets/images/3.png') }}" width="50" />                                            
                                        </a>
                                        @endif
                                        @if(pathinfo($files, PATHINFO_EXTENSION)=='xlsx')
                                        <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_applied_images' }}">                                                
                                            <img src="{{ asset('assets/images/4.png') }}" width="50" />                                            
                                        </a>
                                        @endif
                                        @if(pathinfo($files, PATHINFO_EXTENSION)=='doc')
                                        <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_applied_images' }}">                                
                                            <img src="{{ asset('assets/images/5.png') }}" width="50" />                                            
                                        </a>
                                        @endif
                                        @if(pathinfo($files, PATHINFO_EXTENSION)=='pdf')
                                        <a href="{{ url('admin/docDownload').'/'.$files.'/quotation_applied_images' }}">                                           
                                            <img src="{{ asset('assets/images/6.png') }}" width="50" />                                            
                                        </a>
                                        @endif
                                    </td>
                                    @endforeach
                                </tr>
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