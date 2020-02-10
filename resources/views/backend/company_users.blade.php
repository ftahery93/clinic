@extends('backend.layout')

@section('content')
<div class="padding">
    <div class="box">
        <div class="box-header dker">
            <h3>{{ trans('backend.company_users') }}</h3>
            <small>
                <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                <a href="">{{ trans('backend.company_users') }}</a>
            </small>
        </div>
        <div class="row p-a pull-right" style="margin-top: -70px;">
            <div class="col-sm-12">
                <a class="btn btn-fw primary" href="{{route("company_users_create")}}">
                    <i class="material-icons">&#xe7fe;</i>
                    &nbsp; {{ trans('backend.new_company_user') }}
                </a>
            </div>
        </div>
        @if($CompanyUsers->total() > 0)
        {{Form::open(['route'=>'company_users_update_all','method'=>'post'])}}
        <div class="table-responsive">
            <table class="table table-striped  b-t">
                <thead>
                    <tr>
                        <!-- <th style="width:20px;">
                                <label class="ui-check m-a-0">
                                    <input id="checkAll" type="checkbox"><i></i>
                                </label>
                            </th> -->
                        <th>{{ trans('backend.fullName') }}</th>
                        <th>{{ trans('backend.email') }}</th>
                        <th>{{ trans('backend.mobile') }}</th>
                        <th>{{ trans('backend.approved') }} {{ trans('backend.shipments') }}</th>
                        <th>{{ trans('backend.wallet_amount') }}</th>
                        <th>Admin {{ trans('backend.commission') }}</th>
                        <th>{{ trans('backend.free_deliveries') }}</th>
                        <th class="text-center" style="width:50px;">{{ trans('backend.status') }}</th>
                        <th class="text-center" style="width:200px;">{{ trans('backend.options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($CompanyUsers as $CompanyUser)
                    <tr>
                        <!-- <td><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="{{ $CompanyUser->id }}"><i
                                            class="dark-white"></i>
                                        {!! Form::hidden('row_ids[]',$CompanyUser->id, array('class' => 'form-control row_no')) !!}
                                    </label>
                                </td> -->
                        <td>{!! $CompanyUser->name !!}</td>
                        <td><small>{!! $CompanyUser->email !!}</small></td>
                        <td><small>{!! $CompanyUser->mobile !!}</small></td>
                        <td><small>{!! $CompanyUser->approved_shipments !!}</small></td>
                        <td><small>{{ ($CompanyUser->balance!=0)?$CompanyUser->balance:'0.000' }} KWD</small></td>
                        <td><small>{!! sprintf('%0.3f',$CompanyUser->admin_totalCommission) !!} KWD</small></td>
                        <td><small>{{ $CompanyUser->freeDeliveries }}</small></td>
                        <td class="text-center">
                            <i
                                class="fa {{ ($CompanyUser->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                        </td>
                        <td class="text-center">
                            @if(@Auth::user()->permissionsGroup->edit_status)
                            <a class="btn btn-sm success"
                                href="{{ route("company_users_edit",["id"=>$CompanyUser->id]) }}">
                                <small><i class="material-icons">&#xe3c9;</i>
                                </small>
                            </a>
                            @endif
                            @if(@Auth::user()->permissionsGroup->view_status)
                            <button class="btn btn-sm warning customer_view" data-toggle="modal"
                                data-target="#mv-{{ $CompanyUser->id }}" ui-toggle-class="bounce" ui-target="#animate"
                                data-rating="{{ $CompanyUser->rating }}">
                                <small><i class="material-icons">visibility</i>
                                </small>
                            </button>
                            @endif
                        </td>
                    </tr>
                    <!-- .modal -->
                    <div id="mv-{{ $CompanyUser->id }}" class="modal fade" data-backdrop="true">
                        <div class="modal-dialog" id="animate">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ trans('backend.company_users_details') }}</h5>
                                </div>
                                <div class="modal-body text-center p-lg">
                                    <p class="text-center">
                                        @if(@$CompanyUser->image)
                                        <img src="{{ $CompanyUser->image }}" name="aboutme" width="140" height="140"
                                            border="0" class="img-circle">
                                        @else
                                        <img src="{{ url('/uploads/appusers/appuser_thumb.png') }}" name="aboutme"
                                            width="140" height="140" border="0" class="img-circle">
                                        @endif
                                        <h6 class="media-heading">{{ $CompanyUser->name_en }}</h6>
                                        <h6 class="media-heading">{{ $CompanyUser->name_ar }}</h6>
                                    </p>
                                    <p class="text-center"><strong>Email: </strong><br>{{ $CompanyUser->email }}</p>
                                    <p class="text-center"><strong>Mobile: </strong><br>{{ $CompanyUser->mobile }}</p>
                                    <p class="text-center"><strong>Description (EN):
                                        </strong><br>{{ $CompanyUser->description_en }}</p>
                                    <p class="text-center"><strong>Description (AR):
                                        </strong><br>{{ $CompanyUser->description_ar }}</p>
                                    <p class="text-center"><strong>Status: </strong><br>
                                        <i
                                            class="fa {{ ($CompanyUser->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                                    </p>
                                    @if(@$CompanyUser->instagram_link)
                                    <p class="text-center"><strong>Instagram Link: </strong><br>
                                        {{ $CompanyUser->instagram_link }}
                                    </p>
                                    @endif
                                    <p class="text-center"><strong>Approved: </strong><br>
                                        <i
                                            class="fa {{ ($CompanyUser->approved==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                                    </p>
                                    <p class="text-center"><strong>Ratings : </strong><br>
                                        <div class="stars-outer hotel_b">
                                            <div class="stars-inner"></div>
                                        </div>
                                    </p>

                                    <p class="text-center"><strong><i class="fa fa-google-wallet"
                                                aria-hidden="true"></i>
                                            Wallet:
                                        </strong><br>{{ ($CompanyUser->balance!=0)?$CompanyUser->balance:0 }} KWD</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark-white p-x-md"
                                        data-dismiss="modal">{{ trans('backend.cancel') }}</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div>
                    </div>
                    <!-- / .modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="dker p-a">
            <div class="row">
                <div class="col-sm-3 hidden-xs">
                    <!-- .modal -->
                    <div id="m-all" class="modal fade" data-backdrop="true">
                        <div class="modal-dialog" id="animate">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ trans('backend.confirmation') }}</h5>
                                </div>
                                <div class="modal-body text-center p-lg">
                                    <p>
                                        {{ trans('backend.confirmationDeleteMsg') }}
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark-white p-x-md"
                                        data-dismiss="modal">{{ trans('backend.no') }}</button>
                                    <button type="submit" class="btn danger p-x-md">{{ trans('backend.yes') }}</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div>
                    </div>
                    <!-- / .modal -->
                    @if(@Auth::user()->permissionsGroup->webmaster_status)
                    <!-- <select name="action" id="action" class="input-sm form-control w-sm inline v-middle"
                                        required>
                                    <option value="">{{ trans('backend.bulkAction') }}</option>
                                    <option value="activate">{{ trans('backend.activeSelected') }}</option>
                                    <option value="block">{{ trans('backend.blockSelected') }}</option>
                                </select>
                                <button type="submit" id="submit_all"
                                        class="btn btn-sm white">{{ trans('backend.apply') }}</button>
                                <button id="submit_show_msg" class="btn btn-sm white" data-toggle="modal"
                                        style="display: none"
                                        data-target="#m-all" ui-toggle-class="bounce"
                                        ui-target="#animate">{{ trans('backend.apply') }}
                                </button> -->
                    @endif
                </div>
                <div class="col-sm-3 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backend.showing') }}
                        {{ $CompanyUsers->firstItem() }}
                        -{{ $CompanyUsers->lastItem() }} {{ trans('backend.of') }}
                        <strong>{{ $CompanyUsers->total()  }}</strong> {{ trans('backend.records') }}</small>
                </div>
                <div class="col-sm-6 text-right text-center-xs">
                    {!! $CompanyUsers->links() !!}
                </div>
            </div>
        </footer>
        {{Form::close()}}
        <script type="text/javascript">
            $("#checkAll").click(function () {
                        $('input:checkbox').not(this).prop('checked', this.checked);
                    });
                    $("#action").change(function () {
                        if (this.value == "delete") {
                            $("#submit_all").css("display", "none");
                            $("#submit_show_msg").css("display", "inline-block");
                        } else {
                            $("#submit_all").css("display", "inline-block");
                            $("#submit_show_msg").css("display", "none");
                        }
                    });
        </script>
        @endif
    </div>
</div>
@endsection
@section('footerInclude')
<script type="text/javascript">
    $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $("#action").change(function () {
            if (this.value == "delete") {
                $("#submit_all").css("display", "none");
                $("#submit_show_msg").css("display", "inline-block");
            } else {
                $("#submit_all").css("display", "inline-block");
                $("#submit_show_msg").css("display", "none");
            }
        });

        $(".customer_view").on("click",function() {
            //$(document).on("click",".customer_view",function() {
          var rating=  $(this).attr('data-rating');
        //console.log(rating);
            // const ratings = {  
            //     hotel_b :rate,
            //     };

        // total number of stars
        const starTotal = 5;

       // for(const rating in ratings) {  
        const starPercentage = (rating / starTotal) * 100;
        const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
        $('.stars-inner').css("width",starPercentageRounded);
        //console.log(starPercentageRounded);
        //document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded; 
       // }
    });

    $('#modal').on('hidden.bs.modal', function() {
    $(this).removeData('bs.modal');
});
       
</script>
<style>
    .stars-outer {
        display: inline-block;
        position: relative;
        font-family: FontAwesome;
    }

    .stars-outer::before {
        content: "\f006 \f006 \f006 \f006 \f006";
    }

    .stars-inner {
        position: absolute;
        top: 0;
        left: 0;
        white-space: nowrap;
        overflow: hidden;
        width: 0;
    }

    .stars-inner::before {
        content: "\f005 \f005 \f005 \f005 \f005";
        color: #f8ce0b;
    }
</style>
@endsection