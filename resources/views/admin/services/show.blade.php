@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
{{--            @include('admin.sidebar')--}}

            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><strong>Service: </strong>{{ $service->name }}</h3>
                    </div>
                    <div class="box-body">

                        <a href="{{ url('/admin/services') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/services/' . $service->id . '/edit') }}" title="Edit Service"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/services', $service->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Service',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Service ID</th><td>{{ $service->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $service->name }} </td></tr>
                                    <tr><th> Price </th><td> {{ $service->price }} </td></tr>
                                    <tr><th> Category </th><td> {{ $service->category }} </td></tr>
                                    <tr><th> Service Provider </th><td> {{ $service_provider }} </td></tr>
                                    <tr><th> Description </th><td> {{ $service->description }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
