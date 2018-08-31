@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Schedule</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => 'delivery/schedule/filter', 'class'=>'form-inline']) !!}
                        <label for="keywords">Keywords</label>
                        {!! Form::text('keywords', '', array('id' => 'keywords', 'class'=>'form-control qty_custom')) !!}
                        <label for="area">Area</label>
                        {!! Form::select('area', $area,'',array('id' => 'area', 'class'=>'form-control size_custom')) !!}
                        <label for="keywords">Block</label>
                        {!! Form::text('block', '', array('id' => 'block', 'class'=>'form-control qty_custom')) !!}<br/><br/>
                        <div class=" text-center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    {!! Form::close() !!}


                    <table>
                        <th>Name</th><th>Company</th>
                        <th>Contact #</th>
                        <th>Address</th>
                        <th>Area</th>
                        <th>Block</th>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
