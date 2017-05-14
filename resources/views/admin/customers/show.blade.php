@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer: {{ $customer->last_name. ', '. $customer->first_name }}</h3>
                    </div>

                    <div class="box-body">
                        <a href="{{ url('/admin/customers') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/customers/' . $customer->id . '/edit') }}" title="Edit Customer"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/customers', $customer->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Customer',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                        <div class="col-xs-5">
                            <img src="/img/profilepic.png" alt="Profile Picture" class="img-responsive profileImage">
                        </div>
                        <div class="col-xs-7">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $customer->id }}</td>
                                    </tr>
                                    <tr><th> FirstName </th><td> {{ $customer->firstName }} </td></tr><tr><th> LastName </th><td> {{ $customer->lastName }} </td></tr><tr><th> Address </th><td> {{ $customer->address }} </td></tr>
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
