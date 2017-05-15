@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
{{--            @include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Visit {{ $visit->visitId }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/visits') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/visits/' . $visit->visitId . '/edit') }}" title="Edit Visit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/visits', $visit->visitId],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Visit',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $visit->visitId }}</td>
                                    </tr>
                                    <tr><th> Description </th><td> {{ $visit->description }} </td></tr><tr><th> Scheduled Date </th><td> {{ $visit->scheduled_date }} </td></tr><tr><th> TransactionId </th><td> {{ $visit->transactionId }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
