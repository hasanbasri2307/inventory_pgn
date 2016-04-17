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
                        	{!! Form::model($product,['url'=>'product/update/'.$product->id,'method'=>'PUT','class'=>'form-horizontal']) !!}
                                <div class="form-group{{ $errors->has('p_name') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Product Name: </label>
                                    <div class="col-sm-9">
                                    	{!! Form::text('p_name',old('p_name'),['class'=>'form-control','placeholder'=>'Product Name','autocomplete'=>'off']) !!}
         
                                        @if($errors->has('p_name'))
                                        	<small class="help-block">{{ $errors->first('p_name') }}</small>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Price: </label>
                                    <div class="col-sm-9">
                                        {!! Form::text('price',old('price'),['class'=>'form-control','placeholder'=>'Price','autocomplete'=>'off']) !!}
         
                                        @if($errors->has('price'))
                                            <small class="help-block">{{ $errors->first('price') }}</small>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Description: </label>
                                    <div class="col-sm-9">
                                        {!! Form::textarea('description',old('description'),['class'=>'form-control','placeholder'=>'Description','autocomplete'=>'off']) !!}
         
                                        @if($errors->has('description'))
                                            <small class="help-block">{{ $errors->first('description') }}</small>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('sub_cat_id') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Category: </label>
                                    <div class="col-sm-9">
                                        {!! Form::select('sub_cat_id',$category,null,['placeholder'=>'Choose','class'=>'form-control','data-plugin'=>'select2']) !!}

                                        @if($errors->has('sub_cat_id'))
                                            <small class="help-block">{{ $errors->first('sub_cat_id') }}</small>
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