@extends('backend.layout')
@section('content')
<div class="padding">
    <div class="box">
        <div class="box-header dker">
            <h3>{{ trans('backend.pages') }}</h3>
            <small>
                <a href="{{ route('adminHome') }}">{{ trans('backend.home') }}</a> /
                <a href="">{{ trans('backend.pages') }}</a>
            </small>
        </div>
        @if($Pages->total() > 0)
        @if(@Auth::user()->permissionsGroup->add_status)
        {{-- <div class="row p-a">
            <div class="col-sm-12">
                <a class="btn btn-fw primary marginBottom5" href="{{route("page_create")}}">
        <i class="material-icons">&#xe02e;</i> &nbsp; {!! trans('backend.create') !!}
        </a>
    </div>
</div> --}}
@endif
@endif
@if($Pages->total() == 0)
<div class="row p-a">
    <div class="col-sm-12">
        <div class=" p-a text-center ">
            {{ trans('backend.noData') }}
        </div>
    </div>
</div>
@endif
@if($Pages->total() > 0)
{{Form::open(['route'=> 'page_update_all','method'=>'post'])}}
<div class="table-responsive">
    <table class="table table-striped  b-t">
        <thead>
            <tr>
                {{-- <th class="width20">
                    <label class="ui-check m-a-0">
                        <input id="checkAll" type="checkbox"><i></i>
                    </label>
                </th> --}}
                <th>{{ trans('backend.topicName') }}</th>
                <th class="text-center width200">{{ trans('backend.options') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Pages as $page)
            <tr>
                {{-- <td><label class="ui-check m-a-0">
                        <input type="checkbox" name="ids[]" value="{{ $page->id }}"><i class="dark-white"></i>
                {!! Form::hidden('row_ids[]',$page->id, array('class' => 'form-control row_no'))
                !!}
                </label>
                </td> --}}
                <td>{!! $page->name_en !!}</td>

                <td class="text-center">
                    @if(@Auth::user()->permissionsGroup->edit_status)
                    <a class="btn btn-sm success" href="{{ route("page_edit",["id"=>$page->id]) }}">
                        <small><i class="material-icons">&#xe3c9;</i> {{ trans('backend.edit') }}
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
            @if(@Auth::user()->permissionsGroup->edit_status)
            {{-- <select name="action" id="action" class="input-sm form-control w-sm inline v-middle" required>
                @if(@Auth::user()->permissionsGroup->delete_status)
                <option value="delete">{{ trans('backend.deleteSelected') }}</option>
            @endif
            </select> --}}
            {{-- <button type="submit" id="submit_all" class="btn btn-sm white">{{ trans('backend.apply') }}</button>
            --}}
            <button id="submit_show_msg" class="btn btn-sm white displayNone" data-toggle="modal" data-target="#m-all"
                ui-toggle-class="bounce" ui-target="#animate">{{ trans('backend.apply') }}
            </button>
            @endif
        </div>

        <div class="col-sm-3 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backend.showing') }}
                {{ $Pages->firstItem() }}
                -{{ $Pages->lastItem() }} {{ trans('backend.of') }}
                <strong>{{ $Pages->total()  }}</strong> {{ trans('backend.records') }}</small>
        </div>
        <div class="col-sm-6 text-right text-center-xs">
            {!! $Pages->links() !!}
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
</script>
@endsection