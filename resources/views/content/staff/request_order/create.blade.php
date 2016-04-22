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
                        	{!! Form::open(['url'=>'request-order/save','method'=>'POST','class'=>'form-horizontal']) !!}
                                <div class="form-group{{ $errors->has('date_ro') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Req. Order Date </label>
                                    <div class="col-sm-9">
                                      <div class="input-group">
                                        <span class="input-group-addon">
                                          <i class="icon wb-calendar" aria-hidden="true"></i>
                                        </span>
                                        {!! Form::text('date_ro',old('date_ro'),['class'=>'form-control','data-plugin'=>'datepicker']) !!}
                                        
                                      </div>
                                      @if($errors->has('date_ro'))
                                          <small class="help-block">{{ $errors->first('date_ro') }}</small>
                                      @endif
                                    </div>
                                </div>
                              <div class="form-group">
                                    <label class="col-sm-3 control-label">Req.By: </label>
                                    <div class="col-sm-9">
                                      {!! Form::text('req_name',Auth::user()->name,['class'=>'form-control','placeholder'=>'Fullname','autocomplete'=>'off','disabled'=>true]) !!}

                                    </div>
                              </div>
                              <div class="form-group">
                                    <label class="col-sm-3 control-label">Department</label>
                                    <div class="col-sm-9">
                                      {!! Form::text('department',Auth::user()->department->d_name,['class'=>'form-control','placeholder'=>'Fullname','autocomplete'=>'off','disabled'=>true]) !!}

                                    </div>
                                </div>
                             	<div class="form-group">
                                    <label class="col-sm-3 control-label">Products: </label>
                                    <div class="col-sm-9">
                                        <table class="table" id="subcat">
                                            <thead>
                                              <tr>
                                               <th>Product Name</th>
                                                <th>Qty</th>
                                                <th><button type="button" class="btn btn-default" id="add_sub">Add</button></th>
                                               
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>

                                              <td width="60%">{!! Form::select('products[]',$products,null,['placeholder'=>'Choose','class'=>'form-control select2','data-plugin'=>'select2']) !!}</td>
                                                <td width="10%"><input type="number" class="form-control" name="qty[]" min="1" value="1"></td>
                                                <td><button type="button" class="btn btn-danger" onclick="hapus(this)" id="remove" disabled>Remove</button></td>
                                                
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
var products = [];

        function hapus(selector){
            $(selector).parent().parent().remove();
        }

        function check(selector){

          
        }

        
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;

      $(document).ready(function() {
        Site.run();
        
        $('form').on('submit',function(e){
              $(".select2 option:selected").each(function(index, el) {
                 if(! el.value){
                  alert("Product must be filled");
                  e.preventDefault();
                  
                 }else{
                  if(products.indexOf(el.value) === -1){
                    products.push(el.value);
                  }else{
                    alert("Product that you have chosen already exists");
                    products = [];
                    return false;
                  }
                 }       
              });
            });

        var _select = '{!! Form::select('products[]',$products,null,['placeholder'=>'Choose','class'=>'form-control select2','data-plugin'=>'select2']) !!}';

        $(document).on('click','#add_sub',function(){
            $(".select2").select2("destroy");
            $('#subcat').append("<tr><td>"+_select+"</td><td><input type='number' class='form-control' min = '1' name='qty[]'></td><td><button type='button' class='btn btn-danger' id='remove' onclick='hapus(this)'>Remove</button></td></tr>");
            $(".select2").select2({               
                placeholder: "Example",
                alowClear:true
            });

        });

        
      });
    })(document, window, jQuery);
        
  </script>
@endsection