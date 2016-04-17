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
                        	{!! Form::model($department,['url'=>'department/update/'.$department->id,'method'=>'PUT','class'=>'form-horizontal']) !!}
                                <div class="form-group{{ $errors->has('d_name') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Department Name: </label>
                                    <div class="col-sm-9">
                                    	{!! Form::text('d_name',old('d_name'),['class'=>'form-control','placeholder'=>'Department Name','autocomplete'=>'off']) !!}
         
                                        @if($errors->has('d_name'))
                                        	<small class="help-block">{{ $errors->first('d_name') }}</small>
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