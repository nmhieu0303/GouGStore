$(document).ready(function() {
    $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
            $(this)
            .parent()
            .hasClass("active")
        ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
            $(this)
                .parent()
                .addClass("active");
        }
    });

    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
    });



    $('#dcs_prd').summernote({
        placeholder: 'Nhập thông tin chi tiết sản phẩm....'
    });

    $("#input-704").fileinput({

        allowedFileExtensions: ['jpg', 'png', 'gif'],
        uploadUrl: "/file-upload-batch/2",
        uploadAsync: false,
        overwriteInitial: false,
        minFileCount: 1,
        maxFileCount: 10,
        minImageWidth: 50,
        minImageHeight: 50,
        initialPreviewAsData: true // identify if you are sending preview data only and not the markup
    });


    $('#listProduct').DataTable({
        responsive: true,
        className: 'dt-body-center'
    });
})

function preview_image() {
    var total_file = document.getElementById("upload_file").files.length;
    for (var i = 0; i < total_file; i++) {
        $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'><br>");
    }
}