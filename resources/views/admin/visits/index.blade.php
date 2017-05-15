@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            {{--@include('admin.sidebar')--}}
{{--            {{dd($visits->description)}}--}}
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Visits</h3>
                    </div>
                    <div class="box-body">
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-2">--}}
                                {{--<a href="{{ url('/admin/visitss/create') }}" class="btn btn-success btn-sm"--}}
                                   {{--title="Add New Service Provider">--}}
                                    {{--<i class="fa fa-plus" aria-hidden="true"></i> Add New--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-10">--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="row">
                            <div class="table-responsive col-xs-12" style="margin-top: 10px">
                                <table id="visits" class="table table-responsive table-condensed">
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
                                    @foreach($visits as $visit)
                                        {{--@if($visit->request_status == 'accepted')--}}
                                            <tr class="clickable-row" data-href="visits/{{$visit->id}}">
                                                <td>{{ $visit->visitId}}</td>
                                                <td>{{ $visit->description }}</td>
                                                <td>{{ $visit->scheduled_date }}</td>
                                                <td>{{ $visit->transactionId }}</td>
                                                <td>{{ $visit->status }}</td>
                                                <td class="table-commands">
                                                    <div class="row">
                                                        <a href="{{ url('/admin/visits/' . $visit->id) }}"
                                                           title="View">
                                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                                   aria-hidden="true"></i> View
                                                            </button>
                                                        </a>
                                                        {{--<a href="{{ url('/admin/visitss/' . $visit->id . '/edit') }}"--}}
                                                           {{--title="Edit Customer">--}}
                                                            {{--<button class="btn btn-primary btn-xs"><i--}}
                                                                        {{--class="fa fa-pencil-square-o"--}}
                                                                        {{--aria-hidden="true"></i> Edit--}}
                                                            {{--</button>--}}
                                                        {{--</a>--}}
                                                    </div>
                                                </td>
                                            </tr>
                                        {{--@endif--}}
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
            $('#visits').DataTable({
                stateSave: true,
                "lengthMenu": [[5, 10, 15, 25, 50, 100, 500, -1], [5, 10, 15, 25, 50, 100, 500, "All"]]
            });
        });
    </script>
@endsection
