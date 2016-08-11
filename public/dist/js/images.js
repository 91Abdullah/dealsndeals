/**
 * Created by Administrator on 8/10/2016.
 */

$(document).ready(function() {
    // The recommended way from within the init configuration:
    Dropzone.options.myDropzone = {
        init: function() {
            this.on("success", function(file, response) {
                console.log(file);
            });
        }
    };
});
