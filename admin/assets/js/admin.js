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

function preview_image() {
    var total_file = document.getElementById("upload_file").files.length;
    for (var i = 0; i < total_file; i++) {
        $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'><br>");
    }
}