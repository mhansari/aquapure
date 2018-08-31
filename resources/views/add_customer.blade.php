@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new Customer</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => 'customer/save']) !!}
                    <div class="form-group">
                        <label for="name">Name</label>
                        {!! Form::text('name','', array('id' => 'name', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="company">Company</label>
                        {!! Form::text('company','', array('id' => 'company', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="contact1">Contact 1 #</label>
                        {!! Form::text('contact1', '', array('id' => 'contact1', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="contact2">Contact 2 #</label>
                        {!! Form::text('contact2', '', array('id' => 'contact2', 'class'=>'form-control')) !!}
                        <label for="contact3">Contact 3 #</label>
                        {!! Form::text('contact3', '', array('id' => 'contact3', 'class'=>'form-control')) !!}
                        <label for="contact">Rate</label>
                        {!! Form::text('rate', '', array('id' => 'rate', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="address">Address</label>
                        {!! Form::text('address', '', array('id' => 'address', 'class'=>'form-control','required'=>'required')) !!}
                        <label for"supplier">Area</label><br/>
                        {!! Form::select('area', $area,'',array('id' => 'area', 'class'=>'form-control size_custom')) !!}
                        <label for="address">Block</label>
                        {!! Form::text('block', '', array('id' => 'block', 'class'=>'form-control qty_custom','required'=>'required')) !!}
                        <label for="near_by">Near By</label>
                        {!! Form::text('near_by', '', array('id' => 'near_by', 'class'=>'form-control','required'=>'required')) !!}
                        <label for"supplier">Delivery Days</label></br>
                        
                            @foreach($days as $d)
                                {!! Form::checkbox('delivery_days[]', $d, array('class'=>'form-control  qty_custom','required'=>'required')) !!}<label for"supplier">{!! $d !!}</label></br>
                            @endforeach
                        <label for"supplier">Time Slot</label><br/>
                        {!! Form::radio('time_s', '1', array('class'=>'form-control  qty_custom','required'=>'required')) !!} before {!! Form::select('time_before', $time,'',array('id' => 'size', 'class'=>'form-control size_custom')) !!} <br/>
                        {!! Form::radio('time_s', '2', array('class'=>'form-control  qty_custom','required'=>'required')) !!} after {!! Form::select('time_after', $time,'',array('id' => 'size', 'class'=>'form-control size_custom')) !!}  <br/>
                        {!! Form::radio('time_s', '3', array('class'=>'form-control  qty_custom','required'=>'required')) !!} between {!! Form::select('time_slot_1', $time,'',array('id' => 'size', 'class'=>'form-control size_custom')) !!} and {!! Form::select('time_slot_2', $time,'',array('id' => 'size', 'class'=>'form-control size_custom')) !!}<br/>

                        <label for="cnic">Symbol</label>
                        {!! Form::text('symbol', '', array('id' => 'symbol', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="advance_btl">Advance Bottles(Security deposit)</label>
                        {!! Form::number('advance_btl', '', array('id' => 'advance_btl', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="advance">Advance Amount(Security deposit)</label>
                        {!! Form::number('advance', '', array('id' => 'advance', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="advance">Special Note</label>
                        {!! Form::text('note', '', array('id' => 'note', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="cnic">Referred By</label>
                        {!! Form::text('refered_by', '', array('id' => 'refered_by', 'class'=>'form-control','required'=>'required')) !!}
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

@endsection
