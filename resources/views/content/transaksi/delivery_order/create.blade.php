@extends("layouts.main")
@section("css")
  <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
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
                        	{!! Form::open(['url'=>'delivery-order/save','method'=>'POST','class'=>'form-horizontal','files'=>true]) !!}
                              <div class="form-group{{ $errors->has('do_date') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Delivery Order Date </label>
                                    <div class="col-sm-9">
                                      <div class="input-group">
                                        <span class="input-group-addon">
                                          <i class="icon wb-calendar" aria-hidden="true"></i>
                                        </span>
                                        {!! Form::text('do_date',old('do_date'),['class'=>'form-control','data-plugin'=>'datepicker','data-format'=>'yyyy-mm-dd']) !!}
                                        
                                      </div>
                                      @if($errors->has('do_date'))
                                          <small class="help-block">{{ $errors->first('do_date') }}</small>
                                      @endif
                                    </div>
                                </div>
                              <div class="form-group{{ $errors->has('file_do') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">File DO: </label>
                                    <div class="col-sm-9">
                                        {!! Form::file('file_do',old('file_do'),['class'=>'form-control']) !!}

                                        @if($errors->has('file_do'))
                                            <small class="help-block">{{ $errors->first('file_do') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Description: </label>
                                    <div class="col-sm-9">
                                        {!! Form::textarea('description',old('description'),['class'=>'form-control']) !!}

                                        @if($errors->has('description'))
                                            <small class="help-block">{{ $errors->first('description') }}</small>
                                        @endif
                                    </div>
                                </div>
                              <div class="form-group{{ $errors->has('po_id') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Purchase Order: </label>
                                    <div class="col-sm-9">
                                        {!! Form::select('po_id',$po,null,['placeholder'=>'Choose','class'=>'form-control','data-plugin'=>'select2','id'=>'po']) !!}

                                        @if($errors->has('po_id'))
                                            <small class="help-block">{{ $errors->first('po_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                             
                                <div id="result"></div>
                                <div class="form-group{{ $errors->has('latest_do') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Latest Delivery Order ?: </label>
                                    <div class="col-sm-9">
                                        <div class="radio-custom radio-default radio-inline">
                                          {!! Form::radio('latest_do','1',true,['id'=>'yes']) !!}
                                            <label for="yes">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            {!! Form::radio('latest_do','0',false,['id'=>'no']) !!}
                                            <label for="no">No</label>
                                        </div>
                                       
                                        @if($errors->has('latest_do'))
                                          <small class="help-block">{{ $errors->first('latest_do') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                    	{!! Form::submit('Submit',['class'=>'btn btn-primary','onclick'=>'check()']) !!}
                                        <button type="reset" class="btn btn-default btn-outline" >Reset</button>
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
  <script src="{{ asset(env('ASSET_DIR').'vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset(env('ASSET_DIR').'js/components/bootstrap-datepicker.js') }}"></script>
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
        
        $('#po').on('change',function(){
          var _id = $(this).val();
          var url = "{{ url('purchase-order/detail/') }}"+'/'+_id;
          $.get(url, function( data ) {
            $( "#result" ).replaceWith( data.view );
           
          });
        });

      });
    })(document, window, jQuery);
        
  </script>
@endsection
