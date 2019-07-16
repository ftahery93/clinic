@extends('backend.layout')
@section('content')
    <div class="padding">
        <div class="row-col">
            <div class="col-sm-3 col-lg-2">
                <div class="p-a-md _600"><i class="material-icons">local_atm</i>
                &nbsp; {!!  trans('backend.price_setting') !!}</div>
            </div>
            <div class="col-sm-7 col-lg-10 light lt">
                {{Form::open(['route'=>['price_update_setting'],'method'=>'POST'])}}
                <div class="p-a-md col-md-12">
                    <div class="form-group">
                        <label>{!!  trans('backend.price') !!}</label>
                        {!! Form::text('price',$Price->price, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                    </div>
                    <button type="submit" class="btn btn-info m-t">{{ trans('backend.update') }}</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection


