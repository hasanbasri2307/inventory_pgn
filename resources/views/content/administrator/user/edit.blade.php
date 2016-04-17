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
                        	{!! Form::model($user,['url'=>'user/update/'.$user->id,'method'=>'PUT','class'=>'form-horizontal']) !!}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Name: </label>
                                    <div class="col-sm-9">
                                    	{!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Fullname','autocomplete'=>'off']) !!}
         
                                        @if($errors->has('name'))
                                        	<small class="help-block">{{ $errors->first('name') }}</small>
                                        @endif

                                    </div>
                                </div>
                             	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Email: </label>
                                    <div class="col-sm-9">
                                        {!! Form::email('email',old('email'),['class'=>'form-control','placeholder'=>'Email','autocomplete'=>'off','disabled'=>'disabled']) !!}

                                        @if($errors->has('email'))
                                        	<small class="help-block">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('dep_id') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Department: </label>
                                    <div class="col-sm-9">
                                    	{!! Form::select('dep_id',$department,null,['placeholder'=>'Choose','class'=>'form-control','data-plugin'=>'select2']) !!}

                                    	@if($errors->has('dep_id'))
                                        	<small class="help-block">{{ $errors->first('dep_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Role user: </label>
                                    <div class="col-sm-9">
                                        <div class="radio-custom radio-default radio-inline">
                                        	{!! Form::radio('role','administrator',true,['id'=>'administrator']) !!}
                                            <label for="administrator">Administrator</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            {!! Form::radio('role','staff',false,['id'=>'staff']) !!}
                                            <label for="staff">Staff</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            {!! Form::radio('role','manager',false,['id'=>'manager']) !!}
                                            <label for="manager">Manager</label>
                                        </div>

                                        @if($errors->has('role'))
                                        	<small class="help-block">{{ $errors->first('role') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('status_user') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Status user: </label>
                                    <div class="col-sm-9">
                                        <div class="radio-custom radio-default radio-inline">
                                        	{!! Form::radio('status_user','1',true,['id'=>'auser']) !!}
                                            <label for="auser">Active</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            {!! Form::radio('status_user','0',false,['id'=>'iauser']) !!}
                                            <label for="iauser">Inactive</label>
                                        </div>

                                        @if($errors->has('status_user'))
                                        	<small class="help-block">{{ $errors->first('status_user') }}</small>
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