@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Services </h3>
                    </div>
                    <div class="box-body">
                        {{--<div class="row">--}}
                            {{--<div class="col-xs-2">--}}
                                {{--<a href="{{ url('/admin/categories/create') }}" class="btn btn-success btn-sm" title="Add New Category">--}}
                                    {{--<i class="fa fa-plus" aria-hidden="true"></i> Add New--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-1">--}}
                                {{--{!! Form::open(['method' => 'GET', 'url' => '/admin/categories', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}--}}
                                {{--<div class="input-group">--}}
                                {{--<input type="text" class="form-control" name="search" placeholder="Search...">--}}
                                {{--<span class="input-group-btn">--}}
                                {{--<button class="btn btn-default" type="submit">--}}
                                {{--<i class="fa fa-search"></i>--}}
                                {{--</button>--}}
                                {{--</span>--}}
                                {{--</div>--}}
                                {{--{!! Form::close() !!}--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="row">
                            <div class="table-responsive col-xs-12" style="margin-top: 10px">
                                <table id="services" class="table table-responsive table-condensed">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Service Provider</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($services as $service)
                                        <tr class="clickable-row" data-href="categries/{{$service->id}}">
                                            <td>{{ $service->id }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->price }}</td>
                                            <td>{{ $service->category }}</td>
                                            @foreach($serviceproviders as $serviceprovider)
                                                @if($service->spid == $serviceprovider->id)
                                                    <td>{{ $serviceprovider->last_name . ", " . $serviceprovider->first_name }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $service->category }}</td>
                                            <td class="table-commands">
                                                <div class="row">
                                                    <a href="{{ url('/admin/services/' . $service->id) }}"
                                                       title="View Service Provider">
                                                        <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                               aria-hidden="true"></i> View
                                                        </button>
                                                    </a>
                                                    {{--<a href="{{ url('/admin/services/' . $service->id . '/edit') }}"--}}
                                                       {{--title="Edit Service Provider">--}}
                                                        {{--<button class="btn btn-primary btn-xs"><i--}}
                                                                    {{--class="fa fa-pencil-square-o"--}}
                                                                    {{--aria-hidden="true"></i> Edit--}}
                                                        {{--</button>--}}
                                                    {{--</a>--}}
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
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#services').DataTable({
                stateSave: true,
                "lengthMenu": [[5, 10, 15, 25, 50, 100, 500, -1], [5, 10, 15, 25, 50, 100, 500, "All"]]
            });
        });
    </script>
@endsection

