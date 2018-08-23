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

                    {!! Form::open(['url' => 'supplier/save']) !!}
                    <div class="form-group">
                        <label for="name">Name</label>
                        {!! Form::text('name','', array('id' => 'name', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="contact">Contact #</label>
                        {!! Form::text('contact', '', array('id' => 'contact', 'class'=>'form-control','required'=>'required')) !!}

                        <label for="address">Address</label>
                        {!! Form::text('address', '', array('id' => 'address', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="cnic">CNIC</label>
                        {!! Form::text('cnic', '', array('id' => 'cnic', 'class'=>'form-control','required'=>'required')) !!}
                        <label for="payment_term">Payment Term</label>
                        {!! Form::select('payment_term', array('Cash'=>'Cash', 'Credit'=>'Credit'),'',array('id' => 'payment_term', 'class'=>'form-control size_custom','placeholder'=>'Select One','required'=>'required')) !!}
                        <label for="rate_with_cap">Rate (With Cap)</label>
                        {!! Form::text('rate_with_cap', '', array('id' => 'rate_with_cap', 'class'=>'form-control  qty_custom','required'=>'required')) !!}
                        <label for="rate_without_cap">Rate (Without Cap)</label>
                        {!! Form::text('rate_without_cap', '', array('id' => 'rate_without_cap', 'class'=>'form-control  qty_custom','required'=>'required')) !!}
                        
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
