
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
                <tfoot>
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
                </tfoot>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img class="img-responsive" src="http://placehold.it/70x55" alt=""></td>
                        <td>Tree of Life</td>
                        <td>0001</td>
                        <td>Home Decor</td>
                        <td>2499</td>
                        <td>1000</td>
                        <td>100</td>
                        <td><a href="#"><i class="fa fa-check"></i></a></td>
                        <td>
                            <div class="btn-group">
                                <a type="button" href="#" class="btn btn-default"><span class="fa fa-pencil"></span> Edit</a>
                                <a type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#"><i class="fa fa-eye"></i> Preview</a></li>
                                    <li><a href="#"><i class="fa fa-copy"></i>Duplicate</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <!-- /.content -->
    @endsection