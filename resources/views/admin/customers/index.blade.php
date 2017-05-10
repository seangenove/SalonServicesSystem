@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">Customers</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/customers/create') }}" class="btn btn-success btn-sm"
                           title="Add New Customer">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/customers', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $item)
                                    @if($item->request_status == 'accepted')
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->last_name }}</td>
                                            <td>{{ $item->first_name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <a href="{{ url('/admin/customers/' . $item->id) }}"
                                                   title="View Customer">
                                                    <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                           aria-hidden="true"></i> View
                                                    </button>
                                                </a>
                                                <a href="{{ url('/admin/customers/' . $item->id . '/edit') }}"
                                                   title="Edit Customer">
                                                    <button class="btn btn-primary btn-xs"><i
                                                                class="fa fa-pencil-square-o"
                                                                aria-hidden="true"></i> Edit
                                                    </button>
                                                </a>
                                                {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => ['/admin/customers', $item->id],
                                                    'style' => 'display:inline'
                                                ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Customer',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $customers->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Customers for Approval</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-2">
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
                            <div class="col-xs-10">
                                {!! Form::open(['method' => 'GET', 'url' => '/admin/customers', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search...">
                                    <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped">
                                <thead>
                                <tr>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Request Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $item)
                                    @if($item->request_status == 'pending' || $item->request_status == 'rejected')
                                        <tr>
                                            <td>{{ $item->last_name }}</td>
                                            <td>{{ $item->first_name }}</td>
                                            <td>{{ $item->request_status }}</td>
                                            <td>

                                                {!! Form::model($item, [
                                                   'method' => 'POST',
                                                   'url' => ['/xyz/update-request-status'],
                                                   'style' => 'display:inline',
                                                   'files' => true
                                               ]) !!}
                                                {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
                                                {!! Form::hidden('request_status', 'accepted', ['class' => 'form-control']) !!}
                                                {!! Form::hidden('table', 'customers', ['class' => 'form-control']) !!}
                                                {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Accept', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-success btn-xs',
                                                        'title' => 'Approve Customer',
                                                        'onclick'=>'return confirm("Approve registration?")'
                                                )) !!}
                                                {!! Form::close() !!}

                                                {!! Form::model($item, [
                                                       'method' => 'POST',
                                                       'url' => ['/xyz/update-request-status'],
                                                       'style' => 'display:inline',
                                                       'files' => true
                                                   ]) !!}
                                                {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
                                                {!! Form::hidden('request_status', 'rejected', ['class' => 'form-control']) !!}
                                                {!! Form::hidden('table', 'customers', ['class' => 'form-control']) !!}
                                                {!! Form::button('<i class="fa fa-times" aria-hidden="true"></i> Decline', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Reject Customer',
                                                        'onclick'=>'return confirm("Reject registration?")'
                                                )) !!}
                                                {!! Form::close() !!}

                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $customers->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
