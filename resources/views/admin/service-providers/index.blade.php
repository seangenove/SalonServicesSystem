@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Service Providers</h3>
                    </div>
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Service Providers</div>--}}
                    {{--<div class="panel-body">--}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-10"></div>
                            <div class="col-xs-2">
                                {{--{!! Form::open(['method' => 'GET', 'url' => '/admin/service-providers', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}--}}
                                {{--<div class="input-group">--}}
                                    {{--<input type="text" class="form-control" name="search" placeholder="Search...">--}}
                                    {{--<span class="input-group-btn">--}}
                                        {{--<button class="btn btn-default" type="submit">--}}
                                            {{--<i class="fa fa-search"></i>--}}
                                        {{--</button>--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                                {{--{!! Form::close() !!}--}}
                                <a href="{{ url('/admin/service-providers/create') }}" class="btn btn-success btn-sm"
                                   title="Add New Service Provider">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="table-responsive col-xs-12" style="margin-top: 10px">
                                <table id="service_providers1" class="table table-responsive table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($serviceproviders as $serviceprovider)
                                        <tr class="clickable-row" data-href="service-providers/{{$serviceprovider->id}}">
                                            <td>{{ $serviceprovider->id }}</td>
                                            <td>{{ $serviceprovider->last_name }}</td>
                                            <td>{{ $serviceprovider->first_name }}</td>
                                            <td>{{ $serviceprovider->email }}</td>
                                            <td>{{ $serviceprovider->address }}</td>
                                            <td class="table-commands">
                                                <div class="row">
                                                    <a href="{{ url('/admin/service-providers/' . $serviceproviders->id) }}"
                                                       title="View Service Provider">
                                                        <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                               aria-hidden="true"></i> View
                                                        </button>
                                                    </a>
                                                    <a href="{{ url('/admin/service-providers/' . $serviceprovider->id . '/edit') }}"
                                                       title="Edit Service Provider">
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
                                {{--{{dd($serviceproviders)}}--}}
                                {{--<div class="pagination-wrapper"> {!! $serviceproviders->appends(['search' => Request::get('search')])->render() !!} </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-5">
                {{--<div class="panel panel-default">--}}
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Service Providers for Approval</h3>
                    </div>
                    {{--<div class="panel-heading">Service Providers for Approval</div>--}}
                    {{--<div class="panel-body">--}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-9"></div>
                            <div class="col-xs-1">
                                {{--{!! Form::open(['method' => 'GET', 'url' => '/admin/service-providers', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}--}}
                                {{--<div class="input-group">--}}
                                {{--<input type="text" class="form-control" name="search" placeholder="Search...">--}}
                                {{--<span class="input-group-btn">--}}
                                {{--<button class="btn btn-default" type="submit">--}}
                                {{--<i class="fa fa-search"></i>--}}
                                {{--</button>--}}
                                {{--</span>--}}
                                {{--</div>--}}
                                {{--{!! Form::close() !!}--}}
                                <form action="/xyz/update-all" method="POST">
                                    {{ csrf_field()}}
                                    <input type="hidden" name="table" value="service_providers">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class="fa fa-check" aria-hidden="true"></i> Accept All
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="table-responsive col-xs-12" style="margin-top: 10px">

                                <table id="service_providers2" class="table table-responsive table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Request Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($serviceproviders as $serviceprovider)
                                        <tr class="clickable-row" data-href="service-providers/{{$serviceproviders->id}}">
                                            <td>{{ $serviceproviders->id }}</td>
                                            <td>{{ $serviceproviders->last_name }}</td>
                                            <td>{{ $serviceproviders->first_name }}</td>
                                            <td>{{ $serviceproviders->request_status }}</td>
                                            <td class="table-commands">
                                                <div class="row">
                                                    <a href="{{ url('/admin/service-providers/' . $serviceproviders->id) }}"
                                                       title="View Service Provider">
                                                        <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                               aria-hidden="true"></i> View
                                                        </button>
                                                    </a>
                                                    <a href="{{ url('/admin/service-providers/' . $serviceproviders->id . '/edit') }}"
                                                       title="Edit Service Provider">
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

                                {{--<table class="table table-borderless table-striped">--}}
                                    {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th>Last Name</th>--}}
                                            {{--<th>First Name</th>--}}
                                            {{--<th>Request Status</th>--}}
                                            {{--<th>Actions</th>--}}
                                        {{--</tr>--}}
                                    {{--</thead>--}}

                                    {{--<tbody>--}}
                                        {{--@foreach($serviceproviders as $item)--}}
                                            {{--{{dd($item)}}--}}
                                            {{--@if($item->request_status == 'pending' || $item->request_status == 'rejected')--}}
                                                {{--<tr>--}}
                                                    {{--<td>{{ $item->last_name }}</td>--}}
                                                    {{--<td>{{ $item->first_name }}</td>--}}
                                                    {{--<td>{{ $item->request_status }}</td>--}}
                                                    {{--<td>--}}
                                                        {{--{!! Form::model($item, [--}}
                                                           {{--'method' => 'POST',--}}
                                                           {{--'url' => ['/xyz/update-request-status'],--}}
                                                           {{--'style' => 'display:inline',--}}
                                                           {{--'files' => true--}}
                                                       {{--]) !!}--}}
                                                        {{--{!! Form::hidden('id', null, ['class' => 'form-control']) !!}--}}
                                                        {{--{!! Form::hidden('request_status', 'accepted', ['class' => 'form-control']) !!}--}}
                                                        {{--{!! Form::hidden('table', 'service_providers', ['class' => 'form-control']) !!}--}}
                                                        {{--{!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Accept', array(--}}
                                                                {{--'type' => 'submit',--}}
                                                                {{--'class' => 'btn btn-success btn-xs',--}}
                                                                {{--'title' => 'Approve Customer',--}}
                                                                {{--'onclick'=>'return confirm("Approve registration?")'--}}
                                                        {{--)) !!}--}}
                                                        {{--{!! Form::close() !!}--}}

                                                        {{--{!! Form::model($item, [--}}
                                                               {{--'method' => 'POST',--}}
                                                               {{--'url' => ['/xyz/update-request-status'],--}}
                                                               {{--'style' => 'display:inline',--}}
                                                               {{--'files' => true--}}
                                                           {{--]) !!}--}}
                                                        {{--{!! Form::hidden('id', null, ['class' => 'form-control']) !!}--}}
                                                        {{--{!! Form::hidden('request_status', 'rejected', ['class' => 'form-control']) !!}--}}
                                                        {{--{!! Form::hidden('table', 'service_providers', ['class' => 'form-control']) !!}--}}
                                                        {{--{!! Form::button('<i class="fa fa-times" aria-hidden="true"></i> Decline', array(--}}
                                                                {{--'type' => 'submit',--}}
                                                                {{--'class' => 'btn btn-danger btn-xs',--}}
                                                                {{--'title' => 'Reject Customer',--}}
                                                                {{--'onclick'=>'return confirm("Reject registration?")'--}}
                                                        {{--)) !!}--}}
                                                        {{--{!! Form::close() !!}--}}
                                                    {{--</td>--}}
                                                {{--</tr>--}}
                                            {{--@endif--}}
                                        {{--@endforeach--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}
                                {{--<div class="pagination-wrapper"> {!! $serviceproviders->appends(['search' => Request::get('search')])->render() !!} </div>--}}
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
            $('#service_providers1').DataTable({
                stateSave: true,
                "lengthMenu": [[5, 10, 15, 25, 50, 100, 500, -1], [5, 10, 15, 25, 50, 100, 500, "All"]]
            });
        });
        $(document).ready(function () {
            $('#service_providers2').DataTable({
                stateSave: true,
                "lengthMenu": [[5, 10, 15, 25, 50, 100, 500, -1], [5, 10, 15, 25, 50, 100, 500, "All"]]
            });
        });
    </script>
@endsection
