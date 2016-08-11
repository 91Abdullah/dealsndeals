@extends('admin.master')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> Product
            <small>Upload Images</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin::index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="{{ route('admin::product.index') }}">Product</a></li>
            <li class="active">Upload Images</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="row">
            <div class="col-sm-12">
                <h3>Upload Images</h3>
            </div>
        </div><!--/row-->
        <hr>
        <div>
            {!! Form::open(['route' => 'admin::product.upload', 'class' => 'dropzone', 'id' => 'myDropzone']) !!}
                {!! Form::hidden('id', $id) !!}
                <div class="fallback">
                    {!! Form::file('file', ['type' => 'file', 'multiple' => 'multiple']) !!}
                </div>
            {!! Form::close() !!}
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Images
                </h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table id="imageTable" class="table table-hover">
                    <tbody>
                        <tr>
                            #
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <script src="{{ URL::to('dist/js/images.js') }}"></script>
@endsection