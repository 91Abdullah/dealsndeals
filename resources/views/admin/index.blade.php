@extends('admin.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i> Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin::index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
@endsection