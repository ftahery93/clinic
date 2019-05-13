<div class="row">
    <div class="form-group col-sm-12">
        <div class="col-sm-12">
            <label for="service_name" class="col-sm-5 control-label">Service name</label>

            <div class="col-sm-7">
                <input type="text" class="form-control" id="service_name" autocomplete="off" value="" name="service_name">
            </div>
        </div>

    </div>
    <div class="form-group col-sm-12">
        <div class="col-sm-12">
            <label for="category" class="col-sm-5 control-label">Category</label>

            <div class="col-sm-7">
                <input type="text" class="form-control" id="category" autocomplete="off" value="" name="category">
            </div>
        </div>

    </div>
    <div class="form-group col-sm-12">
        <div class="col-sm-12">
            <label for="project_location" class="col-sm-5 control-label">Project Location</label>

            <div class="col-sm-7">
                <input type="text" class="form-control" id="project_location" autocomplete="off" value="" name="project_location">
            </div>
        </div>

    </div>
    <div class="form-group col-sm-12">
        <div class="col-sm-12">
            <label for="submission_date" class="col-sm-5 control-label">Quotation Submission Date</label>

            <div class="col-sm-7">
                <input type="text" class="form-control" id="submission_date" autocomplete="off" value="" name="submission_date">
            </div>
        </div>

    </div>
    <div class="form-group col-sm-12">
        <div class="col-sm-12">
            <label for="description" class="col-sm-5 control-label">Project Description</label>

            <div class="col-sm-7">
                <textarea  class="form-control resize" name="description"></textarea>
            </div>
        </div>

    </div>
    @foreach ($fields as $field) 
    <div class="form-group col-sm-12">
        @if ($field->type=='select')
        <div class="form-group col-sm-12">
            <div class="col-sm-12">
                <label for="{{ $field->name }}" class="col-sm-5 control-label">{{ $field->name }}  @if(array_key_exists('required', $field))<span class="error"> *</span> @endif</label>

                <div class="col-sm-7">
                    <select name="{{ $field->name }}" class="col-sm-12" data-allow-clear="true" id="{{ $field->name }}" style="padding:10px 6px;" >                                        
                        @foreach($field->options as $option)
                        <option value="{{ $option->value }}"> {{ $option->name }}</option>                                      
                        @endforeach()
                    </select>
                </div>
            </div>

        </div>
        @endif
        @if ($field->type=='phone' || $field->type=='text' || $field->type=='email' || $field->type=='number')
        <div class="form-group col-sm-12">
            <div class="col-sm-12">
                <label for="{{ $field->name }}" class="col-sm-5 control-label">{{ $field->name }} @if(array_key_exists('required', $field))<span class="error"> *</span> @endif</label>

                <div class="col-sm-7">
                    <input type="tel" class="form-control" id="{{ $field->name }}" autocomplete="off" value="" name="{{ $field->name }}">
                </div>
            </div>

        </div>
        @endif
        @if ($field->type=='textarea')
        <div class="form-group col-sm-12">
            <div class="col-sm-12">
                <label for="{{ $field->name }}" class="col-sm-5 control-label">{{ $field->name }} @if(array_key_exists('required', $field))<span class="error"> *</span> @endif</label>

                <div class="col-sm-7">
                    <textarea id="{{ $field->name }}">{{ $field->name }}</textarea>
                </div>
            </div>

        </div>
        @endif
        @if ($field->type=='checkboxes')
        <div class="form-group col-sm-12">
            <div class="col-sm-12">
                <label for="{{ $field->name }}" class="col-sm-5 control-label">{{ $field->name }} @if(array_key_exists('required', $field))<span class="error"> *</span> @endif</label>
                
                <div class="col-sm-7">
                    @foreach($field->options as $option)
                    <label for="{{ $option->name }}" class="control-label">{{ $option->name }}</label>                     
                    <input type="checkbox" id="{{ $option->name }}" autocomplete="off" value="" name="{{ $option->name }}">
              @endforeach()
                </div>                                     
                

            </div>

        </div>
        @endif
        @if ($field->type=='radio')
        <div class="form-group col-sm-12">
            <div class="col-sm-12">
                <label for="{{ $field->name }}" class="col-sm-5 control-label">{{ $field->name }} @if(array_key_exists('required', $field))<span class="error"> *</span> @endif</label>
               
               <div class="col-sm-7">
                    @foreach($field->options as $option)
                    <label for="{{ $option->name }}" class="control-label">{{ $option->name }}</label>                     
                    <input type="radio" id="{{ $option->name }}" autocomplete="off" value="" name="{{ $option->name }}">
               @endforeach()
 
               </div>                                   
                
            </div>

        </div>
        @endif
    </div>
    @endforeach
</div>

