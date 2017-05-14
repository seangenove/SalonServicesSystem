@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">




            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Service Provider: </strong> {{ $serviceprovider->first_name . " " . $serviceprovider->last_name }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/service-providers') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/service-providers/' . $serviceprovider->id . '/edit') }}" title="Edit ServiceProvider"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {{--{!! Form::open([--}}
                            {{--'method'=>'DELETE',--}}
                            {{--'url' => ['admin/serviceproviders', $serviceprovider->id],--}}
                            {{--'style' => 'display:inline'--}}
                        {{--]) !!}--}}
                            {{--{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(--}}
                                    {{--'type' => 'submit',--}}
                                    {{--'class' => 'btn btn-danger btn-xs',--}}
                                    {{--'title' => 'Delete ServiceProvider',--}}
                                    {{--'onclick'=>'return confirm("Confirm delete?")'--}}
                            {{--))!!}--}}
                        {{--{!! Form::close() !!}--}}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $serviceprovider->id }}</td>
                                    </tr>
                                    <tr><th> Last Name </th><td> {{ $serviceprovider->last_name }} </td></tr>
                                    <tr><th> First Name </th><td> {{ $serviceprovider->first_name }} </td></tr>
                                    <tr><th> Contact Number </th><td> {{ $serviceprovider->contact_number }} </td></tr>
                                    <tr><th> Email </th><td> {{ $serviceprovider->email }} </td></tr>
                                    <tr><th> Description </th><td> {{ $serviceprovider->description }} </td></tr>
                                    <tr><th> Remarks </th><td> {{ $serviceprovider->remarks }} </td></tr>
                                    <tr><th> Request Status </th><td> {{ $serviceprovider->request_status }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Transactions (Ongoing Services)</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive col-xs-12" style="margin-top: 10px">
                            <table id="transactions" class="table table-responsive table-condensed">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Date Requested</th>
                                    <th>Date Accepted</th>
                                    <th>Date Started</th>
                                    <th>Date Finished</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr class="clickable-row" data-href="transactions/{{$transaction->id}}">
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->status }}</td>
                                        <td>{{ $transaction->date_requested }}</td>
                                        <td>{{ $transaction->date_accepted }}</td>
                                        <td>{{ $transaction->date_started }}</td>
                                        <td>{{ $transaction->date_finished }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td class="table-commands">
                                            <div class="row">
                                                <a href="{{ url('/admin/transactions/' . $transaction->id) }}"
                                                   title="View Customer">
                                                    <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                           aria-hidden="true"></i> View
                                                    </button>
                                                </a>
                                                <a href="{{ url('/admin/transactions/' . $transaction->id . '/edit') }}"
                                                   title="Edit Customer">
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
