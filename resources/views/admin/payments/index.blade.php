@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Payments</h3>
                    </div>
                    <div class="box-body">

                        <div class="row">
                            <div class="table-responsive col-xs-12">
                                <table id="payments" class="table table-responsive table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Payment ID</th>
                                        <th>Transaction ID</th>
                                        <th>Customer</th>
                                        <th>Service Provider</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($payments as $payment)
                                        <tr class="clickable-row" data-href="payments/{{$payment->id}}">
                                            <td>{{ $payment->id }}</td>
                                            <td>{{ $payment->transaction_id }}</td>
                                            <td>{{ $payment->customer }}</td>
                                                @foreach($customers as $customer)
                                                    @if($customer->id == $transaction->customer_id)
                                                        {{ $customer->last_name.", ".$customer->first_name }}
                                                    @endif
                                                @endforeach
                                            <td>{{ $payment->service_provider }}</td>
                                                @foreach($serviceproviders as $serviceprovider)
                                                    @if($service->spid == $serviceprovider->id)
                                                        <td>{{ $serviceprovider->last_name . ", " . $serviceprovider->first_name }}</td>
                                                    @endif
                                                @endforeach
                                            <td>{{ $payment->amount }}</td>
                                            <td>{{ $payment->date }}</td>
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
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#payments').DataTable({
                stateSave: true,
                "lengthMenu": [[5, 10, 15, 25, 50, 100, 500, -1], [5, 10, 15, 25, 50, 100, 500, "All"]]
            });
        });
    </script>
@endsection
