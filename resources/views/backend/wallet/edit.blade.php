@extends('backend.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i> {{ trans('backend.wallet_edit') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                    <a href="">{{ trans('backend.wallet_edit') }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("wallet_offers_list")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['wallet_offers_update',$WalletOffer->id],'method'=>'POST', 'files' => true])}}
                @if(Helper::GeneralWebmasterSettings("en_box_status"))
                <div class="form-group row">
                    <label for="name"
                           class="col-sm-2 form-control-label">{!!  trans('backend.amount') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('amount',$WalletOffer->amount, array('placeholder' => '','class' => 'form-control','id'=>'amount','required'=>'', 'dir'=>trans('backend.ltl'))) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name"
                           class="col-sm-2 form-control-label">{!!  trans('backend.free_deliveries') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('free_deliveries',$WalletOffer->free_deliveries, array('placeholder' => '','class' => 'form-control','id'=>'free_deliveries','required'=>'', 'dir'=>trans('backend.ltl'))) !!}
                    </div>
                </div>
                @endif
                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backend.update') !!}</button>
                        <a href="{{route("wallet_offers_list")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backend.cancel') !!}</a>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection