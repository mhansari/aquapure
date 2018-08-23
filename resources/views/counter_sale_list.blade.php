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

                    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Sno</th>
                <th>Date</th>
                <th>Bottle Size</th>
                <th>Rate</th>
                <th>QTY</th>
                <th>Total</th>
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
            { data: 'rate', name: 'rate'},
            { data: 'qty', name: 'qty'},
            { data: 'total', name: 'total'}
        ]
        });
    });
});
</script>
@endsection
