@extends('layouts.master')

@section('title')
Service Provider
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2.css') }}">
@endsection

@section('content')

@section('breadcrumb')
<li>

    <a href="{{ url('admin/serviceProviders')  }}">Service Provider</a>
</li>
@endsection

@section('pageheading')
Service Provider
@endsection
<form role="form" class="form-horizontal form-groups-bordered" autocomplete="off"   action="{{ url('/admin/serviceProviders/'. $RegisteredUser->id)  }}" method="POST" id="form1" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="patch">

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
                        <a href="{{ url('admin/serviceProviders')  }}" class="margin-top0">
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
                            <div class="col-sm-6{{ $errors->has('categories') ? ' has-error' : '' }}">
                                <label for="categories" class="col-sm-3 control-label">Category</label>

                                <div class="col-sm-9">
                                    <select name="categories[]" class="select2" data-allow-clear="true" id="categories" multiple="multiple" >

                                       @foreach($allSubCategories as $subCate)
                                        <optgroup label="{{ ucfirst($subCate->name_en) }}">
                                        @foreach($subCate->subCategory as $firstNestedSub)                                      
                                        <option value="{{ $firstNestedSub->id }}" @if ($collection->contains($firstNestedSub->id)) selected  @endif> &nbsp;&nbsp; - {{ ucfirst($firstNestedSub->name_en) }}</option>
                                      
                                        <?php /* ?>
                                        @foreach($firstNestedSub->subCategory as $secondNestedSub)
                                         @if ($secondNestedSub->id!=$Category->id)
                                        <option value="{{ $secondNestedSub->id }}" @if ($secondNestedSub->id==$Category->parent_id) selected  @endif> &nbsp;&nbsp;&nbsp; --{{ ucfirst($secondNestedSub->name_en) }}</option>
                                         @endif
                                         
                                        @foreach($secondNestedSub->subCategory as $thirdNestedSub)
                                        @if ($thirdNestedSub->id!=$Category->id)
                                        <option value="{{ $thirdNestedSub->id }}" @if ($thirdNestedSub->id==$Category->parent_id) selected  @endif}> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- {{ ucfirst($thirdNestedSub->name_en) }}</option>
                                         @endif
                                        @endforeach()

                                        @endforeach()

                                          <?php */ ?>
                                        @endforeach()
                                         </optgroup>
                                        @endforeach()
                                    </select>
                                    @if ($errors->has('categories'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categories') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6{{ $errors->has('serviceprovider_type') ? ' has-error' : '' }}">
                                <label for="serviceprovider_type" class="col-sm-3 control-label">Type</label>

                                <div class="col-sm-9">
                                    <select name="serviceprovider_type" class="select2" data-allow-clear="true" id="serviceprovider_type" >
                                        <option value="1" @if($RegisteredUser->serviceprovider_type == 1) selected  @endif> Company</option>
                                        <option value="0" @if($RegisteredUser->serviceprovider_type == 0) selected  @endif> Individual</option>
                                    </select>
                                    @if ($errors->has('serviceprovider_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('serviceprovider_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                        </div>

                    </div>


                    <div class="row">
                        <div class="form-group col-sm-12">

                            <div class="col-sm-6{{ $errors->has('company_name') ? ' has-error' : '' }}">
                                <label for="company_name" class="col-sm-3 control-label">Company Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="company_name" autocomplete="off" value="{{ $RegisteredUser->company_name }}" name="company_name">
                                    @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="col-sm-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-sm-3 control-label">Email ID</label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" autocomplete="off" value="{{ $RegisteredUser->email }}" name="email"> 
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12">

                            <div class="col-sm-6{{ $errors->has('password') ? ' has-error' : '' }}">

                                <label for="password" class="col-sm-3 control-label">Password</label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" autocomplete="off"  name="password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="col-sm-6{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password_confirmation" class="col-sm-3 control-label">Confirm Password</label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password_confirmation" autocomplete="off"  name="password_confirmation"> 
                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12">

                            <div class="col-sm-6{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="mobile" class="col-sm-3 control-label">Mobile</label>

                                <div class="col-sm-9">
                                    <input type="tel" class="form-control number_only" id="mobile" autocomplete="off" value="{{ $RegisteredUser->mobile }}" name="mobile">
                                    @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6{{ $errors->has('country_id') ? ' has-error' : '' }}">
                                <label for="country_id" class="col-sm-3 control-label">Country</label>

                                <div class="col-sm-9">
                                    <select name="country_id" class="select2" data-allow-clear="true" >
                                        <option value="">--Select--</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @if($RegisteredUser->country_id == $country->id) selected  @endif} >{{ $country->name_en }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>

                      <div class="row">
                        <div class="form-group col-sm-12">

                            <div class="col-sm-6{{ $errors->has('council_specification') ? ' has-error' : '' }}">
                                <label for="council_specification" class="col-sm-3 control-label">Council Specification</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="council_specification" autocomplete="off" value="{{ $RegisteredUser->council_specification }}" name="council_specification">
                                    @if ($errors->has('council_specification'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('council_specification') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6{{ $errors->has('registration_number') ? ' has-error' : '' }}">
                                <label for="registration_number" class="col-sm-3 control-label">Registration Number</label>

                                <div class="col-sm-9">
                                    <input type="tel" class="form-control number_only" id="registration_number" autocomplete="off" value="{{ $RegisteredUser->registration_number }}" name="registration_number">
                                    @if ($errors->has('registration_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('registration_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-sm-12">

                            <div class="col-sm-6{{ $errors->has('instagram_id') ? ' has-error' : '' }}">
                                <label for="instagram_id" class="col-sm-3 control-label">Instagram ID</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="instagram_id" autocomplete="off" value="{{ $RegisteredUser->instagram_id }}" name="instagram_id">
                                    @if ($errors->has('instagram_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instagram_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6{{ $errors->has('website_address') ? ' has-error' : '' }}">
                                <label for="website_address" class="col-sm-3 control-label">Website Address</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="registration_number" autocomplete="off" value="{{ $RegisteredUser->website_address }}" name="website_address">
                                    @if ($errors->has('website_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website_address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="col-sm-6{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-sm-3 control-label">Phone</label>

                                <div class="col-sm-9">
                                    <input type="tel" class="form-control number_only" id="phone" autocomplete="off" value="{{ $RegisteredUser->phone }}" name="phone">
                                    @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea  class="form-control resize" id="address" autocomplete="off"  name="address">{{ $RegisteredUser->address }}</textarea>
                                    @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>
                    
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="col-sm-6{{ $errors->has('company_description_en') ? ' has-error' : '' }}">
                                <label for="company_description_en" class="col-sm-3 control-label">Company Description(EN)</label>
                                <div class="col-sm-9">
                                    <textarea  class="form-control resize" name="company_description_en" id="company_description_en" >{{ $RegisteredUser->company_description_en }}</textarea>
                                    @if ($errors->has('company_description_en'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_description_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6{{ $errors->has('company_description_ar') ? ' has-error' : '' }}">
                                <label for="company_description_ar" class="col-sm-3 control-label">Company Description(EN)</label>
                                <div class="col-sm-9">
                                    <textarea  class="form-control resize" name="company_description_ar" id="company_description_ar" >{{ $RegisteredUser->company_description_ar }}</textarea>
                                    @if ($errors->has('company_description_ar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_description_ar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>

                    
                    <div class="row">
                        <div class="form-group col-sm-12">

                            <div class="col-sm-6" @if($RegisteredUser->profile_image != '' || $RegisteredUser->profile_image!=null) style="display:none;" @endif id="upload_image">

                                 <label for="profile_image" class="col-sm-3 control-label">Profile Image</label>

                                <div class="col-sm-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput"  id="error_file">
                                        <div class="fileinput-new thumbnail" style="{{ $profile_WH }}" data-trigger="fileinput">
                                            <img src="{{ asset('assets/images/album-image-1.jpg') }}" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="{{ $profile_WH }}"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="profile_image" accept="image/*" id="profile_image">
                                                <input type="hidden" name="uploaded_image_removed" id="uploaded_image_removed" value="0">
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            <p style="margin-top:20px;" ><b> Image Size: {{ $profile_size }} </b></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @if($RegisteredUser->profile_image)
                            <div class="col-sm-6"  id="uploaded_image">

                                <label for="profile_image" class="col-sm-3 control-label">Uploaded Icon</label>

                                <div class="col-sm-9">
                                    <img src="{{ url('public/registeredUsers_images/'.$RegisteredUser->profile_image) }}" alt="Uploaded Icon" style="{{ $profile_WH }}">

                                    <div class="col-sm-12" style="margin-top:20px;">
                                        <a href="javascript:void(0);" class="btn btn-orange fileinput-exists" data-dismiss="fileinput" id="remove_image">Remove</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                              <div class="col-sm-6">
                                <label for="status" class="col-sm-3 control-label">Status</label>

                                <div class="col-sm-9">
                                    <select name="status" class="select2" data-allow-clear="true" id="status" >
                                        <option value="1" @if($RegisteredUser->status == 1) selected  @endif> Active</option>
                                        <option value="0" @if($RegisteredUser->status == 0) selected  @endif> Deactive</option>
                                    </select>
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

    $.validator.addMethod("currency", function (value, element) {
        return this.optional(element) || /^[1-9]\d*(\.\d+)?$/.test(value);
    }, "Please specify a valid amount");
    var validator = $("#form1").validate({
        ignore: 'input[type=hidden], .select2-input, .select2-focusser',
        rules: {
            country_id: "required",
            company_name: "required",
            categories: "required",
            serviceprovider_type: "required",
            company_description_en: "required",
            company_description_ar: "required",
            address: "required",
            council_specification: "required",
            registration_number: "required",
            email: "required",
            mobile: {
                required: true,
                number: true,
                //minlength: 8,
                maxlength: 8
            },
            profile_image: {
                required: function (element) {
                    if ($('#uploaded_image_removed').val() == 1) {
                        return true;
                    } else {
                        return false;
                    }
                },
            }
        },
        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case 'profile_image':
                    error.insertAfter($("#error_file"));
                    break;
                default:
                    error.insertAfter(element);
            }
        }
    });
//Remove Uploaded Image
    $('#remove_image').on('click', function (event) {
        $('profile_image').val('');
        $('#uploaded_image').hide('fast');
        $('#uploaded_image_removed').val('1');
        $('#upload_image').show('fast');
    });

});

$('.number_only').keypress(function (e) {
    return isNumbers(e, this);
});
function isNumbers(evt, element)
{
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (
            (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.�? CHECK DOT, AND ONLY ONE.
            (charCode > 57))
        return false;
    return true;
}
</script>

@endsection