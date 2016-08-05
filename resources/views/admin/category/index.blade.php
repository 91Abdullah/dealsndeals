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

    </section>
@endsection