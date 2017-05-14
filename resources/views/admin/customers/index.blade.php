@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customers for Approval</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-9"></div>
                            <div class="col-xs-1">
                                <form action="/xyz/update-all" method="POST">
                                    {{ csrf_field()}}
                                    <input type="hidden" name="table" value="customers">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class="fa fa-check" aria-hidden="true"></i> Accept All
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="table-responsive col-xs-12" style="margin-top: 10px">
                                <table id="customers1" class="table table-responsive table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Request Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $customer)
                                        @if($customer->request_status == 'pending')
                                            <tr class="clickable-row" data-href="customers/{{$customer->id}}">
                                                {{--<td>{{ $customer->id }}</td>--}}
                                                <td>{{ $customer->last_name }}</td>
                                                <td>{{ $customer->first_name }}</td>
                                                <td>{{ $customer->request_status }}</td>
                                                <td class="table-commands">
                                                    <div class="row">
                                                        {!! Form::model($customer, [
                                                           'method' => 'POST',
                                                           'url' => ['/xyz/update-request-status'],
                                                           'class' => 'form-horizontal',
                                                           'files' => true,
                                                           'style' => 'display:inline'
                                                       ]) !!}
                                                        {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
                                                        {!! Form::hidden('request_status', 'accepted', ['class' => 'form-control']) !!}
                                                        {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Accept', array(
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-success btn-xs',
                                                                'title' => 'Accept Customer',
                                                                'onclick'=>'return confirm("Approve registration?")'
                                                        )) !!}
                                                        {!! Form::close() !!}


                                                        {!! Form::model($customer, [
                                                           'method' => 'POST',
                                                           'url' => ['/xyz/update-request-status'],
                                                           'class' => 'form-horizontal',
                                                           'files' => true,
                                                           'style' => 'display:inline'
                                                       ]) !!}
                                                        {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
                                                        {!! Form::hidden('request_status', 'rejected', ['class' => 'form-control']) !!}
                                                        {!! Form::button('<i class="fa fa-times" aria-hidden="true"></i> Reject', array(
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-danger btn-xs',
                                                                'title' => 'Reject Customer',
                                                                'onclick'=>'return confirm("Approve registration?")'
                                                        )) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customers</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-10"></div>
                            <div class="col-xs-2">
                                <a href="{{ url('/admin/customers/create') }}" class="btn btn-success btn-sm"
                                   title="Add New Service Provider">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive col-xs-12" style="margin-top: 10px">
                                <table id="customers2" class="table table-responsive table-condensed">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Commands</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $customer)
                                        @if($customer->request_status == 'accepted')
                                            <tr class="clickable-row" data-href="customers/{{$customer->id}}">
                                                <td>{{ $customer->id }}</td>
                                                <td>{{ $customer->last_name }}</td>
                                                <td>{{ $customer->first_name }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td>{{ $customer->address }}</td>
                                                <td class="table-commands">
                                                    <div class="row">
                                                        <a href="{{ url('/admin/customers/' . $customer->id) }}"
                                                           title="View Customer">
                                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                                   aria-hidden="true"></i> View
                                                            </button>
                                                        </a>
                                                        <a href="{{ url('/admin/customers/' . $customer->id . '/edit') }}"
                                                           title="Edit Customer">
                                                            <button class="btn btn-primary btn-xs"><i
                                                                        class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i> Edit
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--<div class="row">--}}

            {{--</div>--}}
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
            $('#customers1').DataTable({
                stateSave: true,
                "lengthMenu": [[5, 10, 15, 25, 50, 100, 500, -1], [5, 10, 15, 25, 50, 100, 500, "All"]]
            });
        });
        $(document).ready(function () {
            $('#customers2').DataTable({
                stateSave: true,
                "lengthMenu": [[5, 10, 15, 25, 50, 100, 500, -1], [5, 10, 15, 25, 50, 100, 500, "All"]]
            });
        });
    </script>
@endsection


