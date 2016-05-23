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
                        	{!! Form::open(['url'=>'purchase-order/save','method'=>'POST','class'=>'form-horizontal']) !!}
                              <div class="form-group{{ $errors->has('po_date') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Purchase Order Date </label>
                                    <div class="col-sm-9">
                                      <div class="input-group">
                                        <span class="input-group-addon">
                                          <i class="icon wb-calendar" aria-hidden="true"></i>
                                        </span>
                                        {!! Form::text('po_date',old('po_date'),['class'=>'form-control','data-plugin'=>'datepicker','data-format'=>'yyyy-mm-dd']) !!}
                                        
                                      </div>
                                      @if($errors->has('po_date'))
                                          <small class="help-block">{{ $errors->first('po_date') }}</small>
                                      @endif
                                    </div>
                                </div>
                              <div class="form-group{{ $errors->has('vendor_id') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Vendor: </label>
                                    <div class="col-sm-9">
                                        {!! Form::select('vendor_id',$vendor,null,['placeholder'=>'Choose','class'=>'form-control','data-plugin'=>'select2']) !!}

                                        @if($errors->has('vendor_id'))
                                            <small class="help-block">{{ $errors->first('vendor_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                              <div class="form-group{{ $errors->has('ro_id') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Request Order: </label>
                                    <div class="col-sm-9">
                                        {!! Form::select('ro_id',$ro,null,['placeholder'=>'Choose','class'=>'form-control','data-plugin'=>'select2','id'=>'ro']) !!}

                                        @if($errors->has('ro_id'))
                                            <small class="help-block">{{ $errors->first('ro_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                             
                                <div id="result"></div>
                                
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                    	{!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
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
        
        $('#ro').on('change',function(){
          var _id = $(this).val();
          var url = "{{ url('request-order/detail/') }}"+'/'+_id;
          $.get(url, function( data ) {
            $( "#result" ).replaceWith( data.view );
           
          });
        });

      });
    })(document, window, jQuery);
        
  </script>
@endsection
