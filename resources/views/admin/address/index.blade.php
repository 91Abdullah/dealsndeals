@extends('admin.master')

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-envelope"></i> Address
        <small><a href="{{ route('admin::address.create') }}" class="btn btn-primary">Create New</a></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin::index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ route('admin::address.index') }}">Address</a></li>
        <li class="active">Create new</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    @include('admin.includes.errors')
    @if(count($customers) >= 1)
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Address</th>
                <th>City</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($addresses as $address)
                <tr>
                    <td>{{ $address->id }}</td>
                    <td>{{ $address->address }}</td>
                    <td>{{ $address->city }}</td>
                    <td>
                        <div class="btn-group">
                            <a type="button" href="{{ route('admin::customer.edit', $address->id) }}" class="btn btn-default"><span class="fa fa-pencil"></span> Edit</a>
                            <a type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('admin::address.view', $address->id) }}"><i class="fa fa-search"></i> View</a></li>
                                <li><a href="#"><i class="fa fa-copy"></i>Duplicate</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ route('admin::address.delete', $address->id) }}"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">No addresses found.</div>
    @endif
</section>
@endsection