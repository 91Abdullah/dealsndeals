
@extends('admin.master')

    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-book"></i> Product
                <small><a href="{{ route('admin::product.new') }}" class="btn btn-primary">Create New</a></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin::index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Product</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('admin.includes.errors')
            <!-- Your Page Content Here -->
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Wholesale Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><img class="img-responsive" src="http://placehold.it/70x55" alt=""></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->default_category->name }}</td>
                            <td>{{ $product->wholesale_price }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td><a href="#"><i style="color: {{ $product->active ? 'green' : 'red' }}" class="fa {{ $product->active ? 'fa-check' : 'fa-times' }}"></i></a></td>
                            <td>
                                <div class="btn-group">
                                    <a type="button" href="{{ route('admin::product.edit', $product->id) }}" class="btn btn-default"><span class="fa fa-pencil"></span> Edit</a>
                                    <a type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#"><i class="fa fa-copy"></i>Duplicate</a></li>
                                        <li><a href="{{ route('admin::product.image', $product->id) }}"><i class="fa fa-thumbnail"></i>Upload Images</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ route('admin::product.delete', $product->id) }}"><i class="fa fa-trash"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <!-- /.content -->
    @endsection