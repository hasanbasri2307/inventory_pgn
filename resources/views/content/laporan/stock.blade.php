@extends("layouts.main")
@section("css")
	<link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/select2/select2.css') }}">
@endsection
@section("content")
  <div class="panel">
        
        <div class="panel-body">
          <div class="example-wrap">
            <h4 class="example-title">Filter</h4>
            <div class="example">
              {!! Form::open(['url'=>'report/stock','method'=>'POST','class'=>'form-inline']) !!}
                <div class="form-group">
                  <label class="control-label" for="department">Department</label>
                    {!! Form::select('department_id',$department,null,['placeholder'=>'Choose','class'=>'form-control','id'=>'department']) !!}             
                </div>

                <div class="form-group">
                  <label class="control-label" for="product">Product</label>
                  {!! Form::select('product_id',$product,null,['placeholder'=>'Choose','class'=>'form-control','id'=>'product']) !!}    
                </div>

                <div class="form-group">
                  <label class="control-label" for="order">Order By</label>
                  {!! Form::select('order_by',['asc'=>'Ascending','desc'=>'Descending'],null,['placeholder'=>'Choose','class'=>'form-control','id'=>'order']) !!}    
                    
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-outline">Search</button>
                </div>
              </form>
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