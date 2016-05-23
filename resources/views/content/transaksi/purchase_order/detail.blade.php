<div class="form-group" id="result">
    <label class="col-sm-3 control-label">Products: </label>
    <div class="col-sm-9">
        <table class="table" id="subcat">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Qty To Buy</th>
                    <th>Qty Arrive</th>
                </tr>
            </thead>
            <tbody>
                @foreach($po->detail_po as $dt)
                <tr>
                    <td width="60%">{!! Form::text('products[]',$dt->product->p_name,['class'=>'form-control','readonly'=>true]) !!}</td>
                    <td width="10%"><input type="number" class="form-control" name="qty[]" min="0" value="{{ $dt->qty }}" readonly></td>
                    <td width="10%"><input type="number" class="form-control" name="qty_arrive[]" min="0" value="0" required></td>
                    {!! Form::hidden('product_id[]',$dt->product_id) !!}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>