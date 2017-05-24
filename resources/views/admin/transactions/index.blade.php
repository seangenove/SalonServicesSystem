@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Transactions</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            {{--<a href="{{ url('/admin/transactions/create') }}" class="btn btn-success btn-sm" title="Add New Transaction">--}}
                                {{--<i class="fa fa-plus" aria-hidden="true"></i> Add New--}}
                            {{--</a>--}}
    {{----}}
                            {{--{!! Form::open(['method' => 'GET', 'url' => '/admin/transactions', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}--}}
                            {{--<div class="input-group">--}}
                                {{--<input type="text" class="form-control" name="search" placeholder="Search...">--}}
                                {{--<span class="input-group-btn">--}}
                                    {{--<button class="btn btn-default" type="submit">--}}
                                        {{--<i class="fa fa-search"></i>--}}
                                    {{--</button>--}}
                                {{--</span>--}}
                            {{--</div>--}}
                            {{--{!! Form::close() !!}--}}
                            <div class="table-responsive col-xs-12" style="margin-top: 10px">
                                <table id="transactions" class="table table-responsive table-condensed">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Visits</th>
                                        <th>Customer</th>
                                        <th>Service Provider</th>
                                        <th>Date Started</th>
                                        <th>Date Finished</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        {{--{{dd($transaction)}}--}}
                                        <tr class="clickable-row"
                                            data-href="transactions/{{$transaction->id}}">
                                            {{--<td>{{ $serviceprovider->id }}</td>--}}
                                            <td>{{ $transaction->id }}</td>
                                            <td>{{ $transaction->status }}</td>

                                            <td>{{ $visits->where('visitId', $transaction->id)->count() }}</td>

                                            <td>
                                                @foreach($customers as $customer)
                                                    {{--{{dd($transaction->customer_id)}}--}}
                                                    @if($customer->id == $transaction->customer_id)
                                                        {{ $customer->last_name.", ".$customer->first_name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($service_providers as $service_provider)
                                                    @if($service_provider->id == $transaction->sp_id)
                                                        {{ $service_provider->last_name.", ".$service_provider->first_name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $transaction->date_started }}</td>
                                            {{--<td class="table-commands">--}}
                                                {{--<div class="row">--}}
                                                    {{--<a href="{{ url('/admin/transactions/' . $transaction->id) }}"--}}
                                                       {{--title="View ServiceRequest">--}}
                                                        {{--<button class="btn btn-info btn-xs"><i class="fa fa-eye"--}}
                                                                                               {{--aria-hidden="true"></i>--}}
                                                            {{--View--}}
                                                        {{--</button>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="{{ url('/admin/transactions/' . $transaction->id . '/edit') }}"--}}
                                                       {{--title="Edit ServiceRequest">--}}
                                                        {{--<button class="btn btn-primary btn-xs"><i--}}
                                                                    {{--class="fa fa-pencil-square-o"--}}
                                                                    {{--aria-hidden="true"></i> Edit--}}
                                                        {{--</button>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                            <td>{{$transaction->date_finished}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>


                        {{--<div class="table-responsive">--}}
                            {{--<table class="table table-borderless">--}}
                                {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>ID</th>--}}
                                        {{--<th>Status</th>--}}
                                        {{--<th>Visits</th>--}}
                                        {{--<th>Date Started</th>--}}
                                        {{--<th>Actions</th>--}}
                                    {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@foreach($transactions as $item)--}}
                                    {{--<tr>--}}
                                        {{--<td>{{ $item->id }}</td>--}}
                                        {{--<td>{{ $item->status }}</td><td>{{ $item->visits }}</td><td>{{ $item->date_started }}</td>--}}
                                        {{--<td>--}}
                                            {{--<a href="{{ url('/admin/transactions/' . $item->id) }}" title="View Transaction"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>--}}
                                            {{--<a href="{{ url('/admin/transactions/' . $item->id . '/edit') }}" title="Edit Transaction"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}
                                            {{--{!! Form::open([--}}
                                                {{--'method'=>'DELETE',--}}
                                                {{--'url' => ['/admin/transactions', $item->id],--}}
                                                {{--'style' => 'display:inline'--}}
                                            {{--]) !!}--}}
                                                {{--{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(--}}
                                                        {{--'type' => 'submit',--}}
                                                        {{--'class' => 'btn btn-danger btn-xs',--}}
                                                        {{--'title' => 'Delete Transaction',--}}
                                                        {{--'onclick'=>'return confirm("Confirm delete?")'--}}
                                                {{--)) !!}--}}
                                            {{--{!! Form::close() !!}--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                            {{--<div class="pagination-wrapper"> {!! $transactions->appends(['search' => Request::get('search')])->render() !!} </div>--}}
                        {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#transactions').DataTable({
                stateSave: true,
                "lengthMenu": [[5, 10, 15, 25, 50, 100, 500, -1], [5, 10, 15, 25, 50, 100, 500, "All"]]
            });
        });
    </script>
@endsection