@extends('admin.master')

@section('styles')
    <link href="{{ URL::to('plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('plugins/iCheck/square/green.css') }}" rel="stylesheet">
    @endsection

    @section('content')
            <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i> Order
            <small>Create new</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin::index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="{{ route('admin::order.index') }}">Order</a></li>
            <li class="active">Create new</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        Create a new Order
                    </div>
                    {!! Form::open(['route' => 'admin::order.save', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('customer_id', 'Customer', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('customer_id', array(), null, ['class' => 'form-control select2']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('reference', 'Order Reference', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('reference', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        Add Products
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('product_id', 'Product', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('product_id', array(), null, ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        Add Voucher (Optional)
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('voucher_id', 'Voucher', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('voucher_id', array(), null, ['class' => 'form-control select2']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Save', ['class' => 'btn btn-info pull-right']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src='{{ URL::to('plugins/tinymce/js/tinymce/tinymce.min.js') }}'></script>
    <script src='{{ URL::to('dist/js/bootstrap-maxlength.js') }}'></script>
    <script src="{{ URL::to('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ URL::to('plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#customer_id").select2({
                ajax: {
                    url: "{{ route('admin::customer:index') }}",
                    
                }
            })
        })
    </script>
@endsection