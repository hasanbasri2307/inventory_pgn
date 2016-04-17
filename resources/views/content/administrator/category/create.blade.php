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
                        	{!! Form::open(['url'=>'category/save','method'=>'POST','class'=>'form-horizontal']) !!}
                                <div class="form-group{{ $errors->has('cat_name') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Category Name: </label>
                                    <div class="col-sm-9">
                                    	{!! Form::text('cat_name',old('cat_name'),['class'=>'form-control','placeholder'=>'Category Name','autocomplete'=>'off']) !!}
         
                                        @if($errors->has('cat_name'))
                                        	<small class="help-block">{{ $errors->first('cat_name') }}</small>
                                        @endif

                                    </div>
                                </div>
                             	<div class="form-group{{ $errors->has('sub_cat.0') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Sub Category (*minimal 1): </label>
                                    <div class="col-sm-9">
                                        <table class="table" id="subcat">
                                            <thead>
                                              <tr>
                                               <th>Sub Category</th>
                                                <th><button type="button" class="btn btn-default" id="add_sub">Add</button></th>
                                               
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                              <td><input type='text' name='sub_cat[]' value='{{ old("sub_cat[]") }}' class='form-control' placeholder='Sub Category'></td>
                                                <td><button type="button" class="btn btn-danger" onclick="hapus(this)" id="remove">Remove</button></td>
                                                
                                              </tr>
                                              
                                            </tbody>
                                          </table>
                                          @if($errors->has('sub_cat.0'))
                                            <small class="help-block">{{ $errors->first('sub_cat.0') }}</small>
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
        function hapus(selector){
            $(selector).parent().parent().remove();
        }
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;

      $(document).ready(function() {
        Site.run();

        $('#add_sub').on('click',function(){
            $('#subcat').append("<tr><td><input type='text' name='sub_cat[]' value='{{ old("sub_cat[]") }}' class='form-control' placeholder='Sub Category'></td><td><button type='button' class='btn btn-danger' id='remove' onclick='hapus(this)'>Remove</button></td></tr>");
        });

        
      });
    })(document, window, jQuery);
        
  </script>
@endsection