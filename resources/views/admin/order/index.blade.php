@extends('admin.master')

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-file"></i> Order
        <small><a href="{{ route('admin::order.create') }}" class="btn btn-primary">Create New</a></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin::index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ route('admin::order.index') }}">Order</a></li>
        <li class="active">Create new</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    @include('admin.includes.errors')
    @if(count($orders) >= 1)
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Reference</th>
                <th>City</th>
                <th>Products</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Date</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->refrence }}</td>
                    <td>{{ $order->customer->address->city }}</td>
                    <td>
                        @foreach($order->cart->items as $item)
                            <p>{{ $item->product->name }}</p>
                        @endforeach
                    </td>
                    <td>{{ $order->customer->name }}</td>
                    <td>
                        {{ $order->cart->total }}
                    </td>
                    <td>
                        <div class="btn-group">
                            <a type="button" href="{{ route('admin::order.edit', $order->id) }}" class="btn btn-default"><span class="fa fa-pencil"></span> Edit</a>
                            <a type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('admin::order.view', $order->id) }}"><i class="fa fa-search"></i> View</a></li>
                                <li><a href="#"><i class="fa fa-copy"></i>Duplicate</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ route('admin::order.delete', $order->id) }}"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">No orders found.</div>
    @endif
</section>
@endsection