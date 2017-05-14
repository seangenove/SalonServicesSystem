@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Service Requests</h3>
                    </div>
                    {{--<div class="panel panel-default">--}}
                    <div class="box-body">
                        {{--<div class="row">--}}
                            {{--<div class="col-xs-10"></div>--}}
                            {{--<div class="col-xs-2">--}}
                                {{--<a href="{{ url('/admin/service-requests/create') }}" class="btn btn-success btn-sm"--}}
                                   {{--title="Add New ServiceRequest">--}}
                                    {{--<i class="fa fa-plus" aria-hidden="true"></i> Add New--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        {{--{!! Form::open(['method' => 'GET', 'url' => '/admin/service-requests', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}--}}
                        {{--<div class="input-group">--}}
                        {{--<input type="text" class="form-control" name="search" placeholder="Search...">--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-default" type="submit">--}}
                        {{--<i class="fa fa-search"></i>--}}
                        {{--</button>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--{!! Form::close() !!}--}}

                        <div class="row">
                            <div class="table-responsive col-xs-12" style="margin-top: 10px">
                                <table id="service_requests" class="table table-responsive table-condensed">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Customer</th>
                                        <th>Service Provider</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($servicerequests as $servicerequest)
                                            <tr class="clickable-row"
                                                data-href="service-requests/{{$servicerequest->id}}">
                                                {{--<td>{{ $serviceprovider->id }}</td>--}}
                                                <td>{{ $servicerequest->id }}</td>
                                                <td>{{ $servicerequest->status }}</td>
                                                <td>
                                                    @foreach($customers as $customer)
                                                        @if($customer->id == $servicerequest->customer_id)
                                                            {{ $customer->last_name.", ".$customer->first_name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($service_providers as $service_provider)
                                                        @if($service_provider->id == $servicerequest->service_provider_id)
                                                            {{ $service_provider->last_name.", ".$service_provider->first_name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="table-commands">
                                                    <div class="row">
                                                        <a href="{{ url('/admin/service-requests/' . $servicerequest->id) }}"
                                                           title="View ServiceRequest">
                                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                                   aria-hidden="true"></i>
                                                                View
                                                            </button>
                                                        </a>
                                                        <a href="{{ url('/admin/service-requests/' . $servicerequest->id . '/edit') }}"
                                                           title="Edit ServiceRequest">
                                                            <button class="btn btn-primary btn-xs"><i
                                                                        class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i> Edit
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                                {{--<table class="table table-borderless">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>ID</th>--}}
                                        {{--<th>Status</th>--}}
                                        {{--<th>Customer</th>--}}
                                        {{--<th>Service Provider</th>--}}
                                        {{--<th>Actions</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--@foreach($servicerequests as $item)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{ $item->id }}</td>--}}
                                            {{--<td>{{ $item->status }}</td>--}}
                                            {{--<td>--}}
                                                {{--@foreach($customers as $customer)--}}
                                                    {{--@if($customer->id == $item->customer_id)--}}
                                                        {{--{{ $customer->last_name.", ".$customer->first_name }}--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--@foreach($service_providers as $service_provider)--}}
                                                    {{--@if($service_provider->id == $item->service_provider_id)--}}
                                                        {{--{{ $service_provider->last_name.", ".$service_provider->first_name }}--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="{{ url('/admin/service-requests/' . $item->id) }}"--}}
                                                   {{--title="View ServiceRequest">--}}
                                                    {{--<button class="btn btn-info btn-xs"><i class="fa fa-eye"--}}
                                                                                           {{--aria-hidden="true"></i> View--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="{{ url('/admin/service-requests/' . $item->id . '/edit') }}"--}}
                                                   {{--title="Edit ServiceRequest">--}}
                                                    {{--<button class="btn btn-primary btn-xs"><i--}}
                                                                {{--class="fa fa-pencil-square-o" aria-hidden="true"></i>--}}
                                                        {{--Edit--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--{!! Form::open([--}}
                                                    {{--'method'=>'DELETE',--}}
                                                    {{--'url' => ['/admin/service-requests', $item->id],--}}
                                                    {{--'style' => 'display:inline'--}}
                                                {{--]) !!}--}}
                                                {{--{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(--}}
                                                        {{--'type' => 'submit',--}}
                                                        {{--'class' => 'btn btn-danger btn-xs',--}}
                                                        {{--'title' => 'Delete ServiceRequest',--}}
                                                        {{--'onclick'=>'return confirm("Confirm delete?")'--}}
                                                {{--)) !!}--}}
                                                {{--{!! Form::close() !!}--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}
                                {{--<div class="pagination-wrapper"> {!! $servicerequests->appends(['search' => Request::get('search')])->render() !!} </div>--}}
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
            $('#service_requests').DataTable({
                stateSave: true,
                "lengthMenu": [[5, 10, 15, 25, 50, 100, 500, -1], [5, 10, 15, 25, 50, 100, 500, "All"]]
            });
        });
    </script>
@endsection