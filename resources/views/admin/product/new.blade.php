@extends('admin.master')

@section('styles')
    <link href="{{ URL::to('plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> Product
            <small>Create New</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin::index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="{{ route('admin::product.index') }}">Product</a></li>
            <li class="active">Create New</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Information
                        </h3>
                    </div>
                    {!! Form::open(['route' => 'admin::product.save', 'class' => 'form-horizontal']) !!}
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::label('name', 'Product Name', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('sku', 'SKU', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('sku', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::textarea('description', null, ['class' => 'form-control editor']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('long_description', 'Long Description', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::textarea('long_description', null, ['class' => 'form-control editor']) !!}
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    SEO
                                </h3>
                            </div>
                            <div class="form-group">
                                {!! Form::label('meta_title', 'Meta Title', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('meta_title', null, ['class' => 'form-control', 'maxlength' => '70']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('meta_description', 'Meta Description', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::textarea('meta_description', null, ['class' => 'form-control','rows' => '2', 'maxlength' => '160']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('friendly_url', 'Friendly Url', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('friendly_url', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    Pricing
                                </h3>
                            </div>
                            <div class="form-group">
                                {!! Form::label('wholesale_price', 'Wholesale Price', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('wholesale_price', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', 'Price', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    Associations
                                </h3>
                            </div>
                            <div class="form-group">
                                {!! Form::label('categories', 'Select Category(s)', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('categories', [1 => 'Category 1', 2 => 'Category 2'], null, ['class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('default_category', 'Default Category', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('price', [1 => 'Category 1', 2 => 'Category 2'], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
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
    <script src='{{ URL::to('dist/js/product.js') }}'></script>
@endsection