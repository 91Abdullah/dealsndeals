@extends('admin.master')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-picture-o"></i> Upload Images
            <small>Product</small>
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

        <div class="box box-primary">
            <div class="box-header with-border">
                Images <span id="counter"></span>
            </div>
            <div class="box-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="addfile">Add a new image to this product</label>
                        <div class="col-sm-9">
                            <button class="btn btn-success fileinput-button diz-clickable">
                                <i class="fa fa-plus"></i><span> Add files</span>
                            </button>
                        </div>
                    </div>
                    <div class="well" style="display: none;">
                        <div id="previews">
                            <div style="margin-bottom: 10px;" id="template">
                                <img class="dz-thumbnail" data-dz-thumbnail style="margin-right: 5px;" /> <span data-dz-name style="margin-right: 5px;"></span>(<span data-dz-size></span>)<span data-dz-errormessage></span>
                                <span class="remove pull-right">
                                    <button class="btn btn-danger" type="button"><i class="fa fa-trash-o"></i> Remove</button>
                                </span>
                            </div>
                        </div>
                        <div id="total-progress" class="progress progress-sm active">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            </div>
                        </div>
                        <button class="btn btn-success" id="start" type="button"><i class="fa fa-check"></i> Upload files</button>
                    </div>
                    <div class="alert alert-success alert-dismissible" id="file-success" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> <span>Upload successful</span></h4>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Position</th>
                            <th>Cover</th>
                        </tr>
                    </thead>
                    <tbody class="tb-data">
                        @if($images)
                            @foreach($images as $image)
                                <tr>
                                    <td>
                                        {{ $image->id }}
                                    </td>
                                    <td>
                                        <img class="img-responsive" src="{{ URL::asset($image->product_image->small->url) }}" alt="">
                                    </td>
                                    <td></td>
                                    <td>
                                        <input class="is_cover" {{ $image->is_cover ? "checked" : ""}} data-id="{{ $image->id }}" type="checkbox">
                                    </td>
                                    <td>
                                        <button data-id="{{ $image->id }}" class="btn btn-default deleteImage"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{--<div class="box box-primary">
            <div class="box-body">

                <div id="actions" class="row">
                    <div class="col-lg-7">
                        <span class="btn btn-success fileinput-button diz-clickable">
                            <i class="fa fa-plus"></i><span> Add files.</span>
                        </span>
                        <button type="submit" class="btn btn-primary start">
                            <i class="fa fa-upload"></i><span> Start Upload</span>
                        </button>
                        <button class="btn btn-warning cancel">
                            <i class="fa fa-ban"></i><span> Cancel Upload</span>
                        </button>
                    </div>
                    <div class="col-lg-5">
                        <span class="fileupload-process">
                            <div id="total-progress" class="progress progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                <div class="progress-bar progress-bar-success" style="width: 0%;" data-dz-uploadprogress></div>
                            </div>
                        </span>
                    </div>
                </div>

                <!-- HTML heavily inspired by http://blueimp.github.io/jQuery-File-Upload/ -->
                <div class="table table-striped" id="previews">

                    <div id="template" class="file-row">
                        <!-- This is used as the file preview template -->
                        <div class="checkbox">
                            <label for="cover">
                                Cover
                                <input id="cover" type="checkbox">
                            </label>
                        </div>
                        <div>
                            <span class="preview"><img data-dz-thumbnail /></span>
                        </div>
                        <div>
                            <p class="name" data-dz-name></p>
                            <strong class="error text-danger" data-dz-errormessage></strong>
                        </div>
                        <div>
                            <p class="size" data-dz-size></p>
                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary start">
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>Start</span>
                            </button>
                            <button data-dz-remove class="btn btn-warning cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>Cancel</span>
                            </button>
                            <button data-dz-remove class="btn btn-danger delete">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Delete</span>
                            </button>
                        </div>
                    </div>

                </div>
                {!! Form::hidden('csrf-token', csrf_token(), ['id' => 'csrf-token']) !!}
            </div>
            <div class="box-footer">
                <div class="jumbotron how-to-create">
                    <ul>
                        <li>Images are uploaded as soon as you drop them</li>
                        <li>Maximum allowed size of image is 8MB</li>
                    </ul>

                </div>
            </div>

        </div>--}}
    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <script src="{{ URL::to('dist/js/images.js') }}"></script>
    <script>
        var url = "{{ URL::to('/').'/' }}";
        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);
        var token = "{{ csrf_token() }}";

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "{{ route('admin::product.upload') }}", // Set the url
            params: {
                _token : token,
                id: "{{ $id }}"
            },
            paramName: "file",
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        });

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            $('#previews').parent().show();
            $("#start").on('click', function() {
                myDropzone.enqueueFile(file);
            });
            file.previewTemplate.addEventListener("click", function() {
               myDropzone.removeFile(file);
            });
        });

        //Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.width = "0%";
        });

        myDropzone.on("success", function(file, response) {
            $('#previews').parent().hide();
            $("#file-success").show();
            /*setInterval(function () {
                $("#file-success").hide();
            }, 3000);*/
            //console.log(response.code == 200);
            if (response.code == 200) {
                console.log(response.data);
                var checked = response.data.is_cover ? 'checked' : '';
                $(".tb-data").append(
                        "<tr>" +
                        "<td>" + response.data.id + "</td>" +
                        "<td><img src='" + url + response.data.product_image.small.url + "' alt=''></td>" +
                        "<td></td>" +
                        "<td><input data-id='"+ response.data.id +"' class='is_cover' type='checkbox' "+ checked +"></td>" +
                        "<td><button data-id='"+ response.data.id +"' class='btn btn-default deleteImage'><i class='fa fa-trash'></i> Delete</button></td>" +
                        "</tr>"
                );

                $('.is_cover').on('change', function() {
                    $('.is_cover').not(this).prop('checked', false);
                    var id = $(this).data("id");
                    console.log(id);
                });
            }
        });

        myDropzone.on("complete", function(file) {
            myDropzone.removeAllFiles();
        });

        myDropzone.on("init", function() {
            console.log('yes');
        });


        /*myDropzone.on("sending", function(file) {
         // Show the total progress bar when upload starts
         document.querySelector("#total-progress").style.opacity = "1";
         // And disable the start button
         file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
         });

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
        };
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true);
        };*/

        $(".deleteImage").on("click", function (e) {
            var id = $(e.currentTarget).data("id");
            console.log(e.currentTarget);
            $.ajax({
                type: "GET",
                url: "{{ route('admin::image.delete') }}",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "JSON",
                success: function (data) {
                    //console.log('success');
                    //console.log(data);
                    $(e.currentTarget).parent().parent().remove();
                },
                error: function (data) {
                    console.log(data.responseText);
                }
            })
        })

        $('.is_cover').on('change', function(event) {
            $('.is_cover').not(this).prop('checked', false);
            var id = $(this).data("id");
            if ($(event.currentTarget).is(':checked')) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin::image.cover') }}",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "JSON",
                    success: function (data) {
                        alert("Update successful");
                    },
                    error: function (data) {
                        alert("Update failed. Try again later!");
                    }
                })
            }
        });

    </script>
@endsection