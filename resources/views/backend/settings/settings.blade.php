@extends('backend.layout')
@section('headerInclude')
    <link rel="stylesheet"
          href="{{ URL::to('backEnd/libs/jquery/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}"
          type="text/css"/>
@endsection
@section('content')
    <div class="padding">
        <div class="row-col">
            <!-- <div class="col-sm-3 col-lg-2">
                <div class="p-y">
                    <div class="nav-active-border left b-primary">
                        <ul class="nav nav-sm">
                            <li class="nav-item">
                                <a class="nav-link block {{ ((!Session::has('statusTab') && !Session::has('styleTab') && !Session::has('socialTab') && !Session::has('contactsTab')) ? 'active' : '') }}"
                                   href data-toggle="tab" data-target="#tab-1"><i class="material-icons">&#xe30c;</i>
                                    &nbsp; {!!  trans('backend.siteInfoSettings') !!}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <div class="col-sm-12 col-lg-12 light lt">
                <div class="tab-content pos-rlt">
                    <div class="tab-pane {{ ((!Session::has('statusTab') && !Session::has('styleTab') && !Session::has('socialTab') && !Session::has('contactsTab')) ? 'active' : '') }}"
                         id="tab-1">
                        {{Form::open(['route'=>['site_settings_update'],'method'=>'POST'])}}
                        <div class="p-a-md dker _600"><i class="material-icons">&#xe30c;</i>
                            &nbsp; {!!  trans('backend.contact') !!}</div>
                        <div class="p-a-md col-md-12">
                            <div class="form-group">
                                <label>{!!  trans('backend.email') !!}</label>
                                {!! Form::text('email',$Setting->email, array('placeholder' => 'admin@g.com','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backend.subject') !!}  </label>
                                {!! Form::text('subject',$Setting->subject, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backend.body') !!} </label>
                                {!! Form::textarea('body',$Setting->body, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backend.ltr'))) !!}
                            </div>
                            <button type="submit" class="btn btn-info m-t">{{ trans('backend.update') }}</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


