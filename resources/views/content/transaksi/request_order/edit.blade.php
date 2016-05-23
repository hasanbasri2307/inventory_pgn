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
                        @if(Auth::user()->role == "staff")
                        {!! Form::model($ro,['url'=>'request-order/update/'.$ro->id,'method'=>'PUT','class'=>'form-horizontal']) !!}
                        <div class="form-group{{ $errors->has('date_ro') ? ' has-error' : '' }}">
                            <label class="col-sm-3 control-label">Req. Order Date </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon wb-calendar" aria-hidden="true"></i>
                                    </span>
                                    {!! Form::text('date_ro',old('date_ro'),['class'=>'form-control','data-plugin'=>'datepicker','data-format'=>'yyyy-mm-dd','disabled'=>true]) !!}
                                </div>
                                @if($errors->has('date_ro'))
                                <small class="help-block">{{ $errors->first('date_ro') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Req.By: </label>
                            <div class="col-sm-9">
                                {!! Form::text('req_by',$ro->user->name,['class'=>'form-control','placeholder'=>'Fullname','autocomplete'=>'off','disabled'=>true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-9">
                                {!! Form::text('department',$ro->user->department->d_name,['class'=>'form-control','placeholder'=>'Fullname','autocomplete'=>'off','disabled'=>true]) !!}
                            </div>
                        </div>
                        @if((Auth::user()->role == "staff" && Auth::user()->dep_id ==7) || Auth::user()->role == "adminstrator")
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Products: </label>
                            <div class="col-sm-9">
                                <table class="table" id="subcat">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Qty Req</th>
                                            <th>Qty Approve</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail_ro as $dt)
                                        <tr>
                                            <td width="60%">{!! Form::select('products[]',$products,$dt->product_id,['placeholder'=>'Choose','class'=>'form-control select2','data-plugin'=>'select2','readonly'=>true]) !!}</td>
                                            <td width="10%"><input type="number" class="form-control qty" name="qty[]" min="0" value="{{ $dt->qty_req }}" readonly></td>
                                            <td><input type="number" class="form-control" name="qty_approve[]" min="0" value="0" onchange="check_approve(this)"></td>
                                            {!! Form::hidden('ro_detail_id[]',$dt->id) !!}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($errors->has('sub_cat.0'))
                                <small class="help-block">{{ $errors->first('sub_cat.0') }}</small>
                                @endif
                            </div>
                        </div>
                        @else
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Products: </label>
                            <div class="col-sm-9">
                                <table class="table" id="subcat">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Qty Req</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail_ro as $dt)
                                        <tr>
                                            <td width="60%">{!! Form::select('products[]',$products,$dt->product_id,['placeholder'=>'Choose','class'=>'form-control select2','data-plugin'=>'select2','readonly'=>true]) !!}</td>
                                            <td width="10%"><input type="number" class="form-control" name="qty[]" min="1" value="{{ $dt->qty_req }}" readonly></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($errors->has('sub_cat.0'))
                                <small class="help-block">{{ $errors->first('sub_cat.0') }}</small>
                                @endif
                            </div>
                        </div>
                        @endif
                        <div class="form-group{{ $errors->has('status_ro') ? ' has-error' : '' }}">
                            <label class="col-sm-3 control-label">Status request order: </label>
                            <div class="col-sm-9">
                                <div class="radio-custom radio-default radio-inline">
                                    {!! Form::radio('status_ro','1',true,['id'=>'accept']) !!}
                                    <label for="accept">Accept</label>
                                </div>
                                <div class="radio-custom radio-default radio-inline">
                                    {!! Form::radio('status_ro','2',false,['id'=>'reject']) !!}
                                    <label for="reject">Reject</label>
                                </div>
                                @if($errors->has('status_ro'))
                                <small class="help-block">{{ $errors->first('status_ro') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('reject_reason') ? ' has-error' : '' }}" style="display:none;" id="reason">
                            <label class="col-sm-3 control-label">Description: </label>
                            <div class="col-sm-9">
                                {!! Form::textarea('reject_reason',old('reject_reason'),['class'=>'form-control','placeholder'=>'Reject Reason','autocomplete'=>'off']) !!}
 
                                @if($errors->has('reject_reason'))
                                    <small class="help-block">{{ $errors->first('reject_reason') }}</small>
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
                        @else
                        @endif
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


function check_approve(elem){
    var qty= $(elem).parent().parent().find(".qty").val();
    if($(elem).val() > qty ){
        alert("Qty approved bigger than qty. Please reduce qty approved.");
        return false;
    }
}

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

        $("#reject").on('click',function(){
            $('#reason').show();
        });

        $('#accept').on('click',function(){
            $('#reason').hide();
        });

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
                        e.preventDefault();
                    }
                }
            });
        });

    var _select = '{!! Form::select('products[]',$products,null,['placeholder'=>'Choose','class'=>'form-control select2','data-plugin'=>'select2']) !!}';

    $(document).on('click','#add_sub',function(){
        $(".select2").select2("destroy");
        $('#subcat').append("<tr><td>"+_select+"</td><td><input type='number' class='form-control' min = '1' name='qty[]' value='1'></td><td><button type='button' class='btn btn-danger' id='remove' onclick='hapus(this)'>Remove</button></td></tr>");
        $(".select2").select2({
            placeholder: "Example",
            alowClear:true
        });
        });
    });
})(document, window, jQuery);
</script>
@endsection