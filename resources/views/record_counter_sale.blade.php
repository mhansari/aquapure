@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Record Counter Sale</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => 'record-counter-sale/save']) !!}
                    <div class="form-group">
                        <label for="date">Date</label>
                        {!! Form::text('datepicker', date('m/d/Y'), array('id' => 'datepicker', 'class'=>'form-control date_picker_custom','required'=>'required')) !!}
                        <label for="qty">Quantity</label>
                        {!! Form::number('qty', '', array('min'=>'0','id' => 'qty', 'class'=>'form-control qty_custom','placeholder'=>'1','required'=>'required')) !!}
                         <label for="size">Bottle Type</label>
                        {!! Form::select('size', $sizes,'',array('id' => 'size', 'class'=>'form-control size_custom','placeholder'=>'Select One','required'=>'required')) !!}
                        <label for="date">Rate</label>
                        {!! Form::text('rate', '', array('readonly'=>'readonly','id' => 'rate', 'class'=>'form-control date_picker_custom','required'=>'required')) !!}
                        <label for="date">Total</label>
                        {!! Form::text('total', '', array('id' => 'total', 'class'=>'form-control date_picker_custom','required'=>'required')) !!}
                        
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
    $('#size').change(function() {
       
          $.get('rates_by_id/' + $('#size').val(), function(data){
            $('#rate').val(data.rate);
            $('#total').val(data.rate * $('#qty').val());
       });
    });
     $('#qty').change(function() {
            $('#total').val($('#rate').val() * $('#qty').val());
       });
});
</script>
@endsection
