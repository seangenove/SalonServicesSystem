@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">ServiceRequest {{ $servicerequest->id }}</h3>
                    </div>
                    <div class="box-body">
                        <a href="{{ url('/admin/service-requests') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/service-requests/' . $servicerequest->id . '/edit') }}" title="Edit ServiceRequest"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $servicerequest->id }}</td>
                                    </tr>
                                    <tr><th> Status </th><td> {{ $servicerequest->status }} </td></tr>
                                    <tr><th> Date Requested </th><td> {{ $servicerequest->date_requested }} </td></tr>
                                    <tr><th> Date Accepted </th><td> {{ $servicerequest->date_accepted }} </td></tr>
                                    <tr><th> Service </th><td> {{ $service }} </td></tr>
                                    <tr><th> Customer </th><td> {{ $customer }} </td></tr>
                                    <tr><th> Service Provider </th><td> {{ $service_provider }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
