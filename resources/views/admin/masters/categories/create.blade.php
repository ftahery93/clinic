@extends('layouts.master')

@section('title')
Categories
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2.css') }}">
@endsection

@section('content')

@section('breadcrumb')
<li>

    <a href="{{ url('admin/categories') }}">Categories</a>
</li>
@endsection

@section('pageheading')
Categories
@endsection
<form role="form" class="form-horizontal form-groups-bordered" autocomplete="off"  method="POST" action="{{ url('/admin/categories') }}" id="form1" enctype="multipart/form-data">
    {{ method_field('POST') }}
    {{ csrf_field() }}

    <div class="row">
        <div class="col-md-12">
            @if(count($errors))
            @include('layouts.flash-message')
            @yield('form-error')
            @endif
            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">


                    <div class="panel-options padding10">
                        <button type="submit" class="btn btn-green btn-icon">
                            Save
                            <i class="entypo-check"></i>
                        </button>
                        <a href="{{ url('admin/categories') }}" class="margin-top0">
                            <button type="button" class="btn btn-red btn-icon">
                                Cancel
                                <i class="entypo-cancel"></i>
                            </button>
                        </a>

                    </div>
                </div>

                <div class="panel-body">

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="col-sm-6">
                                <label for="parent_id" class="col-sm-3 control-label">Category</label>

                                <div class="col-sm-9">
                                    <select name="parent_id" class="select2" data-allow-clear="true" id="parent_id" >
                                        <option value="0" {{ (collect(old('parent_id'))->contains(0)) ? 'selected':0 }}>-- Main Category --</option>

                                        @foreach($allSubCategories as $subCate)
                                        <option value="{{ $subCate->id }}" {{ (collect(old('parent_id'))->contains($subCate->id)) ? 'selected':'' }}> {{ ucfirst($subCate->name_en) }}</option>
                                       <?php /* ?>
                                        @foreach($subCate->subCategory as $firstNestedSub)
                                        <option value="{{ $firstNestedSub->id }}" {{ (collect(old('parent_id'))->contains($firstNestedSub->parent_id)) ? 'selected':'' }}> &nbsp;&nbsp; - {{ ucfirst($firstNestedSub->name_en) }}</option>

                                        @foreach($firstNestedSub->subCategory as $secondNestedSub)
                                        <option value="{{ $secondNestedSub->id }}" {{ (collect(old('parent_id'))->contains($secondNestedSub->parent_id)) ? 'selected':'' }}> &nbsp;&nbsp;&nbsp; --{{ ucfirst($secondNestedSub->name_en) }}</option>

                                        @foreach($secondNestedSub->subCategory as $thirdNestedSub)
                                        <option value="{{ $thirdNestedSub->id }}" {{ (collect(old('parent_id'))->contains($thirdNestedSub->parent_id)) ? 'selected':'' }}> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- {{ ucfirst($thirdNestedSub->name_en) }}</option>
                                        @endforeach()

                                        @endforeach()


                                        @endforeach()
                                       <?php */ ?>
                                        @endforeach()
                                    </select>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12">

                            <div class="col-sm-6{{ $errors->has('name_en') ? ' has-error' : '' }}">

                                <label for="name_en" class="col-sm-3 control-label">Name(EN)</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name_en" autocomplete="off" value="{{ old('name_en') }}" name="name_en">
                                    @if ($errors->has('name_en'))

                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_en') }}</strong>
                                    </span>

                                    @endif
                                </div>

                            </div>

                            <div class="col-sm-6{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                <label for="name_ar" class="col-sm-3 control-label">Name(AR)</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name_ar" autocomplete="off" value="{{ old('name_ar') }}" name="name_ar" dir="rtl"> 
                                    @if ($errors->has('name_ar'))

                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_ar') }}</strong>
                                    </span>

                                    @endif
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12">


                            <div class="col-sm-6">
                                <label for="status" class="col-sm-3 control-label">Status</label>

                                <div class="col-sm-9">
                                    <select name="status" class="select2" data-allow-clear="true" id="status" >
                                        <option value="1" {{ (collect(old('status'))->contains(1)) ? 'selected':'' }}> Active</option>
                                        <option value="0" {{ (collect(old('status'))->contains(0)) ? 'selected':'' }}> Deactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12">

                            <div class="col-sm-6">

                                <label for="icon" class="col-sm-3 control-label">Icon</label>

                                <div class="col-sm-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput"  id="error_file">
                                        <div class="fileinput-new thumbnail" style="{{ $category_icon_WH }}" data-trigger="fileinput">
                                            <img src="{{ asset('assets/images/album-image-1.jpg') }}" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="{{ $category_icon_WH }}"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="icon" accept="image/*">
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            <p style="margin-top:20px;" ><b> Image Size: {{ $category_icon_size }} </b></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>



                </div>

            </div>

        </div>
    </div>

</form>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
<!-- Imported scripts on this page -->
<script src="{{ asset('assets/js/fileinput.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {

    var validator = $("#form1").validate({
        ignore: 'input[type=hidden], .select2-input, .select2-focusser',
        rules: {
            name_en: "required",
            name_ar: "required",
            parent_id: "required",
            icon: "required",
        },
        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case 'icon':
                    error.insertAfter($("#error_file"));
                    break;
                default:
                    error.insertAfter(element);
            }
        }

    });

});

</script>
@endsection