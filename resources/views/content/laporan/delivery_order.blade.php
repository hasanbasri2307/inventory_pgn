@extends("layouts.main")
@section("css")
  <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
	<link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/select2/select2.css') }}">
  <style>
    .bootstrap-select {
      width: 100% !important;
    }
    
    .datepair-wrap {
      position: relative;
      overflow: hidden;
    }
    
    .input-daterange-wrap {
      float: left;
    }
    
    .input-daterange-to {
      float: left;
      width: 40px;
      height: 40px;
      line-height: 40px;
      text-align: center;
    }
    
    @media (max-width: 1360px) {
      .input-daterange-wrap,
      .input-daterange-to {
        display: block;
        float: none;
      }
    }
  </style>
@endsection
@section("content")
  <div class="panel">
        
        <div class="panel-body">
          <div class="example-wrap">
            <h4 class="example-title">Filter</h4>
            <div class="example">
              {!! Form::open(['url'=>'report/delivery-order','method'=>'POST','class'=>'form-horizontal']) !!}

                <div class="form-group">
                   <label class="control-label" for="range">Range</label>
                   <div class="input-daterange" data-plugin="datepicker">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                      <input type="text" class="form-control" name="start" />
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">to</span>
                      <input type="text" class="form-control" name="end" />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label" for="department">Vendor</label>
                    {!! Form::select('vendor_id',$vendor,old('vendor_id'),['placeholder'=>'Choose','class'=>'form-control','id'=>'department']) !!}             
                </div>

                <div class="form-group">
                  <label class="control-label" for="status_po">Status Purchase Order</label>
                  {!! Form::select('status_po',['0'=>'On Process','1'=>'Done'],old('status_po'),['placeholder'=>'Choose','class'=>'form-control','id'=>'status_po']) !!}    
                    
                </div>

                <div class="form-group">
                  <label class="control-label" for="order">Order By</label>
                  {!! Form::select('order_by',['asc'=>'Ascending','desc'=>'Descending'],"asc",['placeholder'=>'Choose','class'=>'form-control','id'=>'order']) !!}    
                    
                </div>

                <div class="form-group" style="margin-up:10px;">
                  <button type="submit" class="btn btn-primary btn-outline">Search</button>
                </div>
              </form>
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
      });
    })(document, window, jQuery);
  </script>
@endsection