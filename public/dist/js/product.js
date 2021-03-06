$(document).ready(function() {

    tinymce.init({
        selector: ".editor",

        // ===========================================
        // INCLUDE THE PLUGIN
        // ===========================================

        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste jbimages"
        ],

        // ===========================================
        // PUT PLUGIN'S BUTTON on the toolbar
        // ===========================================

        toolbar: "code insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

        // ===========================================
        // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
        // ===========================================

        relative_urls: false,

        menubar: 'edit, view, insert, format, table, tools',

    });


    $("#meta_title").maxlength();
    $("#meta_description").maxlength();
    $(".js-example-basic-multiple").select2();
});