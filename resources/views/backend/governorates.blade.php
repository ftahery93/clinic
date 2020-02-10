@extends('backend.layout')

@section('content')
<div class="padding">
    <div class="box">
        <div class="box-header dker">
            <h3>{{ trans('backend.governorates') }}</h3>
            <small>
                <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                <a href="">{{ trans('backend.governorates') }}</a>
            </small>
        </div>
        <div class="row p-a pull-right" style="margin-top: -70px;">
            <div class="col-sm-12">
                <a class="btn btn-fw primary" href="{{route("governorate_create")}}">
                    <i class="material-icons">&#xe7fe;</i>
                    &nbsp; {{ trans('backend.create') }}
                </a>
            </div>
        </div>
        @if($Governorates->total() > 0)
        {{Form::open(['route'=>'governorate_update_all','method'=>'post'])}}
        <div class="table-responsive">
            <table class="table table-striped  b-t">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="ui-check m-a-0">
                                <input id="checkAll" type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>{{ trans('backend.name') }}</th>
                        <th>{{ trans('backend.country') }}</th>
                        <th>{{ trans('backend.country_code') }}</th>
                        <th>{{ trans('backend.price') }}</th>
                        <th class="text-center" style="width:50px;">{{ trans('backend.status') }}</th>
                        <th class="text-center" style="width:200px;">{{ trans('backend.options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Governorates as $Governorate)
                    <tr>
                        <td><label class="ui-check m-a-0">
                                <input type="checkbox" name="ids[]" value="{{ $Governorate->id }}"><i
                                    class="dark-white"></i>
                                {!! Form::hidden('row_ids[]',$Governorate->id, array('class' => 'form-control row_no'))
                                !!}
                            </label>
                        </td>
                        <td>{!! $Governorate->name_en !!}</td>
                        <td><small>{!! $Governorate->country_name !!}</small></td>
                        <td><small>{!! $Governorate->code !!}</small></td>
                        <td><small>{{ ($Governorate->price!=0)?$Governorate->price:'0.000' }} KWD</small></td>
                        <td class="text-center">
                            <i
                                class="fa {{ ($Governorate->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                        </td>
                        <td class="text-center">
                            @if(@Auth::user()->permissionsGroup->edit_status)
                            <a class="btn btn-sm success"
                                href="{{ route("governorate_edit",["id"=>$Governorate->id]) }}">
                                <small><i class="material-icons">&#xe3c9;</i>
                                </small>
                            </a>
                            @endif

                        </td>
                    </tr>
                    <!-- .modal -->
                    <div id="mv-{{ $Governorate->id }}" class="modal fade" data-backdrop="true">
                        <div class="modal-dialog" id="animate">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ trans('backend.governorates_details') }}</h5>
                                </div>
                                <div class="modal-body text-center p-lg">
                                    <p class="text-center">
                                        <h6 class="media-heading">{{ $Governorate->name_en }}</h6>
                                        <h6 class="media-heading">{{ $Governorate->name_ar }}</h6>
                                    </p>
                                    <p class="text-center">{{ $Governorate->code }}</p>
                                    <p class="text-center">{{ $Governorate->country_name }}
                                    </p>

                                    <p class="text-center"><strong>Status: </strong><br>
                                        <i
                                            class="fa {{ ($Governorate->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                                    </p>

                                    <p class="text-center"><strong><i class="fa fa-google-wallet"
                                                aria-hidden="true"></i>
                                            Price:
                                        </strong><br>{{ ($Governorate->balance!=0)?$Governorate->balance:0 }} KWD</p>
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
                    <select name="action" id="action" class="input-sm form-control w-sm inline v-middle" required>
                        <option value="">{{ trans('backend.bulkAction') }}</option>
                        <option value="activate">{{ trans('backend.activeSelected') }}</option>
                        <option value="block">{{ trans('backend.blockSelected') }}</option>
                        @if(@Auth::user()->permissionsGroup->delete_status)
                        <option value="delete">{{ trans('backend.deleteSelected') }}</option>
                        @endif
                    </select>
                    <button type="submit" id="submit_all" class="btn btn-sm white">{{ trans('backend.apply') }}</button>
                    <button id="submit_show_msg" class="btn btn-sm white" data-toggle="modal" style="display: none"
                        data-target="#m-all" ui-toggle-class="bounce" ui-target="#animate">{{ trans('backend.apply') }}
                    </button>
                    @endif
                </div>
                <div class="col-sm-3 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backend.showing') }}
                        {{ $Governorates->firstItem() }}
                        -{{ $Governorates->lastItem() }} {{ trans('backend.of') }}
                        <strong>{{ $Governorates->total()  }}</strong> {{ trans('backend.records') }}</small>
                </div>
                <div class="col-sm-6 text-right text-center-xs">
                    {!! $Governorates->links() !!}
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