@extends("layouts.main")
@section("css")
	<link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/select2/select2.css') }}">
@endsection
@section("content")
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-sm-12 col-md-12">
                    <!-- Example Horizontal Form -->
                    <div class="example-wrap">
                        <h4 class="example-title">{{ $title }} Form</h4>
                        
                        <div class="example">
                        	{!! Form::open(['url'=>'vendor/save','method'=>'POST','class'=>'form-horizontal']) !!}
                                <div class="form-group{{ $errors->has('v_name') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Name: </label>
                                    <div class="col-sm-9">
                                    	{!! Form::text('v_name',old('v_name'),['class'=>'form-control','placeholder'=>'Vendor Name','autocomplete'=>'off']) !!}
         
                                        @if($errors->has('v_name'))
                                        	<small class="help-block">{{ $errors->first('v_name') }}</small>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Phone: </label>
                                    <div class="col-sm-9">
                                        {!! Form::text('phone',old('phone'),['class'=>'form-control','placeholder'=>'Phone (021xxxxx)','autocomplete'=>'off']) !!}
         
                                        @if($errors->has('phone'))
                                            <small class="help-block">{{ $errors->first('phone') }}</small>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Fax: </label>
                                    <div class="col-sm-9">
                                        {!! Form::text('fax',old('fax'),['class'=>'form-control','placeholder'=>'Fax (021xxxx)','autocomplete'=>'off']) !!}
         
                                        @if($errors->has('fax'))
                                            <small class="help-block">{{ $errors->first('fax') }}</small>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Address: </label>
                                    <div class="col-sm-9">
                                        {!! Form::textarea('address',old('address'),['class'=>'form-control','placeholder'=>'Address','autocomplete'=>'off']) !!}
         
                                        @if($errors->has('address'))
                                            <small class="help-block">{{ $errors->first('address') }}</small>
                                        @endif

                                    </div>
                                </div>
                             	
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                    	{!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                                        <button type="reset" class="btn btn-default btn-outline">Reset</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- End Example Horizontal Form -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
	<script src="{{ asset(env('ASSET_DIR').'js/components/select2.js') }}"></script>
	<script src="{{ asset(env('ASSET_DIR').'vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
	<script src="{{ asset(env('ASSET_DIR').'vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset(env('ASSET_DIR').'js/components/jquery-placeholder.js') }}"></script>
@endsection
@section("js_script")
<script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>
@endsection