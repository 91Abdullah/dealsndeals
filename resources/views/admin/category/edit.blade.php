@extends('admin.master')

@section('styles')
    <link href="{{ URL::to('plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('plugins/iCheck/square/green.css') }}" rel="stylesheet">
    @endsection

    @section('content')
            <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> Category
            <small>Create new</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin::index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="{{ route('admin::category.index') }}">Category</a></li>
            <li class="active">Create new</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        Create a new Category
                    </div>
                    {!! Form::model($category, ['method' => 'patch', 'route' => ['admin::category.update', $category->id], 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('parent_id', 'Parent', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('parent_id', $parent, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('active', 'Displayed', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10 checkbox" style="padding-left: 35px;">
                                {!! Form::checkbox('active', $category->active, $category->active) !!}
                            </div>
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
                            {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('description', null, ['class' => 'editor form-control']) !!}
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
    <script src='{{ URL::to('dist/js/category.js') }}'></script>
@endsection