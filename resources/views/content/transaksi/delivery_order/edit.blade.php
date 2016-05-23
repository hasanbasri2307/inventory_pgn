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
                        	{!! Form::model($do,['url'=>'delivery-order/update/'.$do->id,'method'=>'PUT','class'=>'form-horizontal','files'=>true]) !!}
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
                                <div class="form-group">
                                   <label class="col-sm-3 control-label">Change File ?: </label>
                                    <div class="col-sm-9">
                                      <div class="checkbox-custom checkbox-default">
                                      <input type="checkbox" id="change_file" name="change_file" value="1" autocomplete="off">
                                      <label for="change_file">Change File</label>
                                    </div>
                                    </div>
                                </div>
                              <div class="form-group{{ $errors->has('file_do') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">File DO: </label>
                                    <div class="col-sm-9">
                                        @if(!empty($do->file_do))
                                          <a href="{{ asset('uploaded/'.$do->file_do) }}" target="_blank">{{ $do->file_do }}</a>
                                          <br />
                                          {!! Form::hidden('files_do_name',$do->file_do) !!}
                                        @endif

                                        <div id="files" style="display:none;">
                                        {!! Form::file('file_do',old('file_do'),['class'=>'form-control','id'=>'file_do']) !!}

                                        @if($errors->has('file_do'))
                                            <small class="help-block">{{ $errors->first('file_do') }}</small>
                                        @endif
                                        </div>
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
                                        {!! Form::text('po_id',$do->po->no_po,['class'=>'form-control','readonly'=>true]) !!}
                                        @if($errors->has('po_id'))
                                            <small class="help-block">{{ $errors->first('po_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                             
                                <div class="form-group" >
                                    <label class="col-sm-3 control-label">Products: </label>
                                    <div class="col-sm-9">
                                        <table class="table" id="subcat">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Qty Arrive</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($do->detail_do as $dt)
                                                <tr>
                                                    <td width="60%">{!! Form::text('products[]',$dt->product->p_name,['class'=>'form-control','readonly'=>true]) !!}</td>
                                                
                                                    <td width="10%"><input type="number" class="form-control" name="qty_arrive[]" min="0" value="{{ $dt->qty }}" required></td>
                                                    {!! Form::hidden('product_id[]',$dt->product_id) !!}
                                                    {!! Form::hidden('product_qty[]',$dt->qty) !!}
                                                    {!! Form::hidden('detail_do[]',$dt->id) !!}
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
        $('#change_file').change(function () {
            if ($(this).is(':checked')) {
                $('#files').show();     
            } else {
                $('#files').hide();
            }
        });

       

      });
    })(document, window, jQuery);
        
  </script>
@endsection
