@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            {{--@include('admin.sidebar')--}}
            {{--            {{dd($visits->description)}}--}}
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Transaction {{ $detailed_transaction->id }}</h3>
                    </div>
                    <div class="box-body">

                        <a href="{{ url('/admin/transactions') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        {{--<a href="{{ url('/admin/transactions/' . $detailed_transaction->id . '/edit') }}" title="Edit Transaction"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}
                        {{--{!! Form::open([--}}
                            {{--'method'=>'DELETE',--}}
                            {{--'url' => ['admin/transactions', $detailed_transaction->id],--}}
                            {{--'style' => 'display:inline'--}}
                        {{--]) !!}--}}
                            {{--{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(--}}
                                    {{--'type' => 'submit',--}}
                                    {{--'class' => 'btn btn-danger btn-xs',--}}
                                    {{--'title' => 'Delete Transaction',--}}
                                    {{--'onclick'=>'return confirm("Confirm delete?")'--}}
                            {{--))!!}--}}
                        {{--{!! Form::close() !!}--}}
                        {{--<br/>--}}
                        {{--<br/>--}}
                        <div class="row">
                            <div class="table-responsive col-xs-12">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th>ID</th><td>{{ $detailed_transaction->id }}</td>
                                        </tr>
                                        <tr><th> Status </th><td> {{ $detailed_transaction->status }} </td></tr>
                                        <tr><th> Visits </th><td> {{ $visits }} </td></tr>
                                        <tr><th> Date Started </th><td> {{ $detailed_transaction->date_started }} </td></tr>
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
