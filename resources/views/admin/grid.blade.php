<div class="row sales">

    <div class="col-sm-3">

        <div class="tile-progress magenta">

            <div class="tile-header">                    
                <h2>{{ $serviceProviderCount }}</h2>
            </div>

            <div class="tile-progressbar">
                <span data-fill="100%"></span>
            </div>

            <div class="tile-footer">
                <h4>
                    <i class="entypo-users"></i>  Service Providers
                </h4>


            </div>
        </div>

    </div>

    <div class="col-sm-3">

        <div class="tile-progress orange">

            <div class="tile-header">                    
                <h2>{{ $userCount }}</h2>
            </div>

            <div class="tile-progressbar">
                <span data-fill="100%"></span>
            </div>

            <div class="tile-footer">
                <h4>
                    <i class="entypo-users"></i>  Registered Users
                </h4>


            </div>
        </div>

    </div>



    <div class="col-sm-3">

        <div class="tile-progress aqua_blue">

            <div class="tile-header">
                <h2>{{ $requestCount }}</h2>

            </div>

            <div class="tile-progressbar">
                <span data-fill="100%"></span>
            </div>

            <div class="tile-footer">
                <h4>
                    <i class="entypo-doc-text-inv"></i>Quotation Requested 
                </h4>


            </div>
        </div>

    </div>

    <div class="col-sm-3">

        <div class="tile-progress neon">

            <div class="tile-header">
                <h2>{{ $requestApprovedCount }}</h2>

            </div>

            <div class="tile-progressbar">
                <span data-fill="100%"></span>
            </div>

            <div class="tile-footer">
                <h4>
                    <i class="entypo-doc-text"></i>Approved Quotations
                </h4>


            </div>
        </div>

    </div>

    <div class="clear visible-xs"></div>

</div>
<br />

<div class="row">    

    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="panel panel-default" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Top Service Providers</div>
            </div>

            <!-- panel body -->
            <div class="panel-body">
                @if (Auth::user()->hasRolePermission('serviceProviders'))

                <table width="100%" border="0" cellspacing="10" cellpadding="10" style="border-collapse: separate;border-spacing:0 10px;">
                    @foreach ($serviceProviders->chunk(4) as $chunk)

                    <tr>
                        @foreach ($chunk as $serviceProvider)
                        <td class="text-center"> <a href="{{ url('admin/registeredUsers/'.$serviceProvider->id.'/edit') }}">
                                @if($serviceProvider->profile_image!='')
                                <img  src="{{ url('public/registeredUsers_images/'.$serviceProvider->profile_image) }}" alt="" class="img-circle fit-circle-img" width="60">
                                @else
                                <img  src="{{ asset('assets/images/user_noimage.png') }}" alt="" class="img-circle fit-circle-img" width="60">
                                @endif
                                <h6>{{ $serviceProvider->company_name }}</h6></a></td>
                        @endforeach
                    </tr>                   
                    @endforeach

                </table>
                @endif
            </div>

        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="panel panel-default" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Top Registered Users</div>
            </div>

            <!-- panel body -->
            <div class="panel-body">
                @if (Auth::user()->hasRolePermission('registeredUsers'))
                <table width="100%" border="0" cellspacing="10" cellpadding="10" style="border-collapse: separate;border-spacing:0 10px;">
                    @foreach ($RegisteredUsers->chunk(4) as $chunk)

                    <tr>
                        @foreach ($chunk as $RegisteredUser)
                        <td class="text-center">
                            <a href="{{ url('admin/registeredUsers/'.$RegisteredUser->id.'/edit') }}">
                                @if($RegisteredUser->profile_image!='')
                                <img  src="{{ url('public/registeredUsers_images/'.$RegisteredUser->profile_image) }}" alt="" class="img-circle fit-circle-img" width="60">
                                @else
                                <img  src="{{ asset('assets/images/user_noimage.png') }}" alt="" class="img-circle fit-circle-img" width="60">
                                @endif
                                <h6>{{ $RegisteredUser->fullname }}</h6></a></td>
                        @endforeach
                    </tr>                   
                    @endforeach

                </table>
                @endif
            </div>

        </div>
    </div>
</div>
<br />

<div class="row">  

    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="panel panel-default" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Latest Quotation Requested</div>
            </div>

            <!-- panel body -->
            <div class="panel-body">
                @if (Auth::user()->hasRolePermission('quotationRequest'))

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Category</th>
                            <th>Service Name</th>
                            <th class="text-center">Submission Date</th>
                            <th class="text-center">Requested Date</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($latestQuotationRequested as $latestQuotation)                             
                        <tr>
                            <td>{{ $latestQuotation->fullname }}</td>
                            <td>{{ $latestQuotation->name_en }}</td>
                            <td>{{ $latestQuotation->service_name }}</td>                                        
                            <td class="col-sm-3">{{ Carbon\Carbon::parse($latestQuotation->submission_date)->format('d/m/Y') }}</td>
                            <td class="text-center">{{ Carbon\Carbon::parse($latestQuotation->created_at)->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                @endif
            </div>

        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="panel panel-default" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Latest Quotation Approved</div>
            </div>

            <!-- panel body -->
            <div class="panel-body">
                @if (Auth::user()->hasRolePermission('quotationRequest'))

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Service Provider</th>
                            <th>Category</th>
                            <th>Service Name</th>
                             <th>Approved Date</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($latestApprovedQuotations as $latestApproved)                             
                        <tr>
                            <td>{{ $latestApproved->fullname }}</td>
                            <td>{{ $latestApproved->company_name }}</td>
                            <td>{{ $latestApproved->name_en }}</td>
                            <td>{{ $latestApproved->service_name }}</td>
                            <td class="text-center">{{ Carbon\Carbon::parse($latestApproved->approved_date)->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                @endif
            </div>

        </div>
    </div>


</div>
<br />

<div class="row"> 
    <div class="col-sm-3">
        <div class="panel panel-default" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Top Quotation Requested</div>
            </div>

            <!-- panel body -->
            <div class="panel-body">

                @if (Auth::user()->hasRolePermission('quotationRequest'))
                 <table  class="table table-bordered datatable dashboard_class_table col-sm-6">
                                        <tbody>
                                            @foreach ($topQuotationCategories as $topQuotationCategory)                                        
                                            <tr>                                                
                                                <td class="col-sm-6">  {{ $topQuotationCategory->name_en }} <span class="badge orange" style="color:#fff;float:right;">{{ $topQuotationCategory->category_count }}</span> </td>
                                               
                                            </tr>
                                            @endforeach

                                        </tbody> 
                                    </table>               
                
                @endif

            </div>

        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-9">
        <div class="panel panel-default" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Recent Activities</div>
            </div>

            <!-- panel body -->
            <div class="panel-body">

                <ul class="activity-list">
                    @if (Auth::user()->hasRolePermission('logActivity'))
                    @foreach ($LogActivity as $Activity)
                    <li class="item row margin-btm10">
                        <!--                                <div class="activity-img col-sm-1 col-md-1 col-lg-2">
                                                            <img src="assets/images/thumb-1@2x.png" alt="Product Image" width="39">
                                                        </div>-->
                        <div class="activityinfo col-sm-12 col-md-12 col-lg-12">

                            <span class="product-description">
                                {{ $Activity->subject }} created on {{ $Activity->created_at->format('d/m/Y') }}
                            </span>
                        </div>
                    </li>
                    @endforeach

                </ul>
                @if (\App\Models\Admin\LogActivity::whereNotIn('user_id', [1])->count()!=0)
                <div class="col-sm-12">
                    <a type="button" href="{{ url('admin/logActivity') }}" class="btn btn-primary pull-right">View All</a>
                </div>  
                @endif
                @endif
            </div>

        </div>
    </div> 
    <div class="clear visible-xs"></div>
</div>

<br />

