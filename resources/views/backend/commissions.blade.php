@extends('backend.layout')
@section('content')
    <div class="padding">
        <div class="row-col">
            <div class="col-sm-3 col-lg-2">
                <div class="p-a-md _600"><i class="material-icons">local_atm</i>
                &nbsp; {!!  trans('backend.commissions_setting') !!}</div>
            </div>
            <div class="col-sm-10 col-lg-10 light lt">
                {{Form::open(['route'=>['commissions_update_setting'],'method'=>'POST'])}}
                
                <div class="p-a-md col-md-12">
                    <div class="form-group">
                        <label>{!!  trans('backend.commission_percentage') !!}</label>
                        {!! Form::text('percentage',$Commission->percentage, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                    </div>
                    <button type="submit" class="btn btn-info m-t">{{ trans('backend.update') }}</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection


