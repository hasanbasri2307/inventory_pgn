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
                        	{!! Form::model($category,['url'=>'category/update/'.$category->id,'method'=>'PUT','class'=>'form-horizontal']) !!}
                                <div class="form-group{{ $errors->has('cat_name') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Category Name: </label>
                                    <div class="col-sm-9">
                                    	{!! Form::text('cat_name',old('cat_name'),['class'=>'form-control','placeholder'=>'Category name','autocomplete'=>'off']) !!}
         
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
                                            @foreach($subcategory as $item)
                                             <input type="hidden" name="sub_cat_id[]" value="{{ $item->id }}">
                                              <tr>
                                              <td><input type='text' name='sub_cat[]' value='{{ $item->sub_cat_name }}' class='form-control' placeholder='Sub Category' disabled></td>
                                                <td><button type="button" class="btn btn-danger" data-id="{{ $item->id }}" onclick="hapus(this)" id="remove">Remove</button> &nbsp<button type="button" class="btn btn-primary" data-id="{{ $item->id }}" onclick="ubah(this)" id="edit">Edit</button></td>
                                                
                                              </tr>
                                            @endforeach 
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

        function simpans(selector){
            var idnya = $(selector).data("id");
            var values = $(selector).parent().parent().find('input:text').val()
            var _conf = confirm("Save this data ?");
            if(_conf){

                if(!values){
                    alert("sub category must filled!");
                    $(selector).parent().parent().find('input:text').focus();
                    return false;
                }

                $.post('{{ url('category/sub/save') }}', {id:idnya,'_token' : '{{ csrf_token() }}',sub_cat_name: values }, function(data, textStatus, xhr) {
                    /*optional stuff to do after success */
                    if(data.status === true) {
                        alert("data has been saved !");
                        $(selector).parent().parent().find('input:text').attr('disabled','disabled');
                        $(selector).replaceWith('<button type="button" class="btn btn-primary" data-id="'+idnya+'" onclick="ubah(this)" id="edit">Edit</button>');
                        return false;
                    }
                });
            }
        }


        function ubah(selector){
            var idnya = $(selector).data("id");
            var values = $(selector).parent().parent().find('input:text').removeAttr('disabled');
            $(selector).replaceWith('<button type="button" class="btn btn-primary" data-id="'+idnya+'" onclick="simpans(this)" id="simpan">Simpan</button>');
        }

        function hapus(selector){
            var check_sub = $("input[name='sub_cat[]']").length;
            var _conf = confirm("Delete this data ?");

            if(_conf){
                if(check_sub <= 1){
                    alert("Sub category minimal 1 !!");
                    return false;
                }

                $(selector).parent().parent().remove();
                var idnya = $(selector).data("id");
                $.get('{{ url('category/sub/delete') }}/'+idnya, function(data) {
                    if(data.status === true){
                        alert("Data has been delete");
                    }
                });
            }
            
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