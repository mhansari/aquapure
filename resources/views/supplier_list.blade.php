@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Suppliers</div>
                <div class="panel-body">
                    <div><a href="{!! route('new-supplier') !!}">Add new Supplier</a></div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Sno</th>
                <th>Name</th>
                <th>Contact #</th>
                <th># of Bottles</th>
                <th>Total Amt.</th>
                <th>Received Amt.</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": '{!! route('datatables.data') !!}'
            },
columns: [
            { data: 'sno', name: 'sno', 'orderable': true, 'searchable': false },
            { data: 'created_at', name: 'created_at'},
            { data: 'size', name: 'sizes.size'},
            { data: 'rate', name: 'rate'}
            
        ]
        });
    });
});
</script>
@endsection
