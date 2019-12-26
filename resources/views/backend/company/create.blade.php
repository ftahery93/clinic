@extends('backend.layout')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> {{ trans('backend.new_company_user') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                    <a href="">{{ trans('backend.company_users') }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("company_users_list")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['company_users_store'],'method'=>'POST', 'files' => true ])}}
                <div class="form-group row">
                    <label for="name"
                           class="col-sm-2 form-control-label">{!!  trans('backend.name') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('name','', array('placeholder' => '','class' => 'form-control','id'=>'name','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile"
                           class="col-sm-2 form-control-label">{!!  trans('backend.mobile') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('mobile','', array('placeholder' => '','class' => 'form-control','id'=>'mobile','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile"
                           class="col-sm-2 form-control-label">{!!  trans('backend.phone') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('phone','', array('placeholder' => '','class' => 'form-control','id'=>'phone','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email"
                           class="col-sm-2 form-control-label">{!!  trans('backend.email') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::email('email','', array('placeholder' => '','class' => 'form-control','id'=>'email','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password"
                           class="col-sm-2 form-control-label">{!!  trans('backend.password') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('password','', array('placeholder' => '','class' => 'form-control','id'=>'password','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo"
                           class="col-sm-2 form-control-label">{!!  trans('backend.image') !!}</label>
                    <div class="col-sm-10">
                        {!! Form::file('image', array('class' => 'form-control','id'=>'image','accept'=>'image/*')) !!}
                        <small>
                            <i class="material-icons">&#xe8fd;</i>
                            {!!  trans('backend.imagesTypes') !!}
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description"
                           class="col-sm-2 form-control-label">{!!  trans('backend.description') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::textarea('description','', array('placeholder' => '','class' => 'form-control','id'=>'description','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country"
                           class="col-sm-2 form-control-label">{!!  trans('backend.country') !!}</label>
                    <div class="col-sm-10">
                        <select name="country_id" id="country_id" required class="form-control c-select">
                            <option value="">- - {!!  trans('backend.selectCountry') !!} - -</option>
                            @foreach ($Countries as $Country)
                                <option value="{{ $Country->id  }}">{{ $Country->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backend.add') !!}</button>
                        <a href="{{route("users_list")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backend.cancel') !!}</a>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
