@extends('backend.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>{{ trans('backend.shipments') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                    <a href="">{{ trans('backend.shipments') }}</a>
                </small>
            </div>
            @if($Shipments->total() > 0)
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
                            <th>{{ trans('backend.price') }}</th>
                            <th class="text-center" style="width:50px;">{{ trans('backend.status') }}</th>
                            <th class="text-center" style="width:50px;">{{ trans('backend.payment_type') }}</th>
                            <th class="text-center" style="width:200px;">{{ trans('backend.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Shipments as $Shipment)
                            <tr>
                                <td><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="{{ $Shipment->id }}"><i
                                            class="dark-white"></i>
                                        {!! Form::hidden('row_ids[]',$Shipment->id, array('class' => 'form-control row_no')) !!}
                                    </label>
                                </td>
                                <td>
                                    {!! $Shipment->name   !!}
                                </td>
                                <td>
                                    <small>{!! $Shipment->price   !!}</small>
                                </td>
                                <td class="text-center">
                                    @if ($Shipment->status == 1 )
                                        <span class="label label-default inline">Pending</span>
                                    @elseif ($Shipment->status == 2)
                                        <span class="label label-primary inline">Accepted</span>
                                    @elseif ($Shipment->status == 3)
                                        <span class="label label-info inline">Picked Up</span>
                                    @elseif ($Shipment->status == 4)
                                        <span class="label label-success inline">Delivered</span>
                                    @endif 
                                </td>
                                <td class="text-center">
                                    @if ($Shipment->payment_type == 1 )
                                        <span class="label label-default inline">K-Net</span>
                                    @elseif ($Shipment->payment_type == 2)
                                        <span class="label label-primary inline">Wallet</span>
                                    @elseif ($Shipment->payment_type == 3)
                                        <span class="label label-info inline">COD</span>
                                    @endif 
                                </td>
                                <td class="text-center">
                                    @if(@Auth::user()->permissionsGroup->view_status)
                                        <a class="btn btn-sm success"
                                        href="{{ route("shipments_show",["id"=>$Shipment->id]) }}">
                                        <small><i class="material-icons">visibility</i> {{ trans('backend.view') }}
                                        </small>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="dker p-a">
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backend.showing') }} {{ $Shipments->firstItem() }}
                                -{{ $Shipments->lastItem() }} {{ trans('backend.of') }}
                                <strong>{{ $Shipments->total()  }}</strong> {{ trans('backend.records') }}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Shipments->links() !!}
                        </div>
                    </div>
                </footer>
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
    </script>
@endsection
