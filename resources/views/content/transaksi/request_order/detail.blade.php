<div class="form-group" id="result">
    <label class="col-sm-3 control-label">Products: </label>
    <div class="col-sm-9">
        <table class="table" id="subcat">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Qty Request</th>
                    <th>Qty To Buy</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ro->detail_ro as $dt)
                <tr>
                    <td width="60%">{!! Form::text('products[]',$dt->product->p_name,['class'=>'form-control','readonly'=>true]) !!}</td>
                    <td width="10%"><input type="number" class="form-control" name="qty[]" min="0" value="{{ $dt->qty_req }}" readonly></td>
                    <td width="10%"><input type="number" class="form-control" name="qty_approve[]" min="0" value="{{ $dt->qty_approve }}"></td>
                    {!! Form::hidden('product_id[]',$dt->product_id) !!}
                    {!! Form::hidden('detail_ro_id[]',$dt->id) !!}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>