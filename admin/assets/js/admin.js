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

<<<<<<< HEAD
    $("#input-res-1").fileinput({
        uploadUrl: "/images",
        maxFileCount: 15,
        validateInitialCount: true,
        enableResumableUpload: true,
        resumableOptions: {
            maxThreads: 3
        },
        theme: 'fas',
        deleteUrl: '/images',
        fileActionSettings: {
            showZoom: function(config) {
                if (config.type === 'image') {
                    return true;
                }
                return false;
            }
        }
    });

    $('#table').DataTable({
        responsive: true,
        className: 'dt-body-center'
    });

    var table = $('#table').DataTable();
    var row;
    var id = "";

    $(".btn-delete").click(function(event) {
        showFormComfirm();
        row = table.row($(this).parents('tr'));
        id = row.data()[0];
    });




    $(".btn-comfirm").click(function(event) {

        var yes = $(this).text();
        if (yes === 'Yes') {
            row.remove().draw(false);
            row = null;
            $('#comfirmModal').modal('hide');
        }
    });

})


function showFormComfirm() {
    $('#comfirmModal').modal('show', function(data) {
        console.log('data:' + data);
    });
}

=======
<<<<<<< HEAD
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
=======
    $('form').ajaxForm(function() {
        alert("Uploaded SuccessFully");
    });

>>>>>>> 5fa545d8b5c46db5edba518fa76f2faebed9708b
})

>>>>>>> 109eff0e653291fe3325a73f3f12ba57dd62f4cc
function preview_image() {
    var total_file = document.getElementById("upload_file").files.length;
    for (var i = 0; i < total_file; i++) {
        $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'><br>");
    }
}