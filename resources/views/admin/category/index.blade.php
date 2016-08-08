@extends('admin.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> Category
            <small><a href="{{ route('admin::category.create') }}" class="btn btn-primary">Create New</a></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin::index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(!empty($categories))
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Displayed</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td><a href="#"><i style="color: {{ $category->active ? 'green' : 'red' }}" class="fa {{ $category->active ? 'fa-check' : 'fa-times' }}"></i></a></td>
                        <td>
                            <div class="btn-group">
                                <a type="button" href="{{ route('admin::category.view', $category->id) }}" class="btn btn-default"><span class="fa fa-search"></span> View</a>
                                <a type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('admin::category.edit', $category->id) }}"><i class="fa fa-pencil"></i> Edit</a></li>
                                    <li><a href="#"><i class="fa fa-copy"></i>Duplicate</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">No categories found.</div>
        @endif
    </section>
@endsection