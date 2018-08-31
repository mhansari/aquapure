@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new Supplier</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => 'supplier/save-filling']) !!}
                    <div class="form-group">
="                        <label forsupplier">Supplier</label>
                        {!! Form::select('supplier',$suppliers ,$id, array(($id>0?'disabled':'')=>($id>0?'disabled':''),'id' => 'supplier', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="date">Date</label>
                        {!! Form::text('datepicker', date('m/d/Y'), array('id' => 'datepicker', 'class'=>'form-control date_picker_custom','required'=>'required')) !!}
                        <label for="qty">Quantity</label>
                        {!! Form::number('qty', '', array('min'=>'0','id' => 'qty', 'class'=>'form-control qty_custom','placeholder'=>'1','required'=>'required')) !!}
                        {!! Form::checkbox('with_cap','1','1', array('id' => 'with_cap')) !!}
                        <label for="with_cap">With Cap</label></br>
                        <label for="rate">Rate</label>
                        {!! Form::text('rate', '', array('id' => 'rate', 'class'=>'form-control  qty_custom','required'=>'required')) !!}
                        <label for="total">Total</label>
                        {!! Form::text('total', '', array('id' => 'total', 'class'=>'form-control  qty_custom','required'=>'required')) !!}
                        {!! Form::checkbox('active', '1', array('id' => 'active', 'class'=>'form-control  qty_custom','required'=>'required')) !!}
                        <label for="active">Active</label>
                    </div><div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $('#qty').change(function() {
        $('#total').val($('#rate').val() * $('#qty').val());
    });
 
    $('#with_cap').change(function() {
        if($('#with_cap'). prop("checked"))
        {
            alert('with');

        }
    });
});
</script>
@endsection
