@extends('backend.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> {{ trans('backend.exceptionalCity') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                    <a href="">{{ trans('backend.exceptionalCity') }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("exceptionalCity_list")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['exceptionalCity_store'],'method'=>'POST', 'files' => true ])}}
                @if(Helper::GeneralWebmasterSettings("en_box_status"))
                <div class="form-group row">
                    <label for="city_id"
                            class="col-sm-2 form-control-label">{!!  trans('backend.city') !!}
                    </label>
                    <div class="col-sm-10">
                    <select class="form-control required" name="city_id">
                     <option value=" ">--Select--</option>
                    @foreach($cities as $item)
                    <option value="{{$item->id}}">{{$item->name_en}}</option>
                    @endforeach
                </select>
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="price"
                            class="col-sm-2 form-control-label">{!!  trans('backend.price') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('price','', array('placeholder' => '','class' => 'form-control','id'=>'price','required'=>'')) !!}
                    </div>
                </div>
                @endif
                
                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backend.add') !!}</button>
                        <a href="{{route("categories_list")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backend.cancel') !!}</a>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection