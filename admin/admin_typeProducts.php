<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<<<<<<< HEAD
<h2 class="text-center display-5 mb-4">DANH SÁCH LOẠI SẢN PHẨM</h2>
<div class="row">
    <div class="w-100 text-end">
        <a href="./admin_create_product.php" class="btn btn-primary btn-rounded ml-auto" id="btn-add" data-toggle="modal" data-target="#addTypeProductModal">Thêm mới</a>

        <div class="modal fade" id="addTypeProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm loại sản phẩm</h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group text-start">
                                <label for="typeProduct" class="form-label  fw-bold">Loại sản phẩm</label>
                                <input name="typeProduct" type="text" class="form-control" id="typeProduct" placeholder="Nhập loại sản phẩm" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
=======

<?php
var_dump($_POST);
if (isset($_POST["addType"])) {
    addType($_POST["addType"]);
}

if (isset($_POST["updateType"])) {
    updateType($_POST["idType"], $_POST["updateType"]);
}

if (isset($_POST['deleteId'])) {
    $deleteId = $_POST['deleteId'];
    removeType($deleteId);
}

?>

<h2 class="text-center display-5 mb-4">DANH SÁCH LOẠI SẢN PHẨM</h2>
<div class="row">
    <div class="w-100 text-end">
        <a href="./admin_create_product.php" class="btn btn-primary btn-rounded ml-auto" id="btn-add" data-toggle="modal" data-target="#addModal">Thêm mới</a>
>>>>>>> Admin
    </div>
</div>

<div class=" mt-3">
<<<<<<< HEAD
    <table id="listProduct" class="table hover row-border align-middle" style="width:100%">
=======
    <table class="table hover row-border align-middle" style="width:100%">
>>>>>>> Admin
        <thead>
            <tr>
                <th>Mã loại sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
<<<<<<< HEAD
            <tr>
                <td>L0001</td>
                <td>Áo sơ mi</td>
                <td>2020-12-26 19:47:26</td>
                <td></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                    <a title="Sửa" class=" btn-edit-prd text-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>L0001</td>
                <td>Áo sơ mi</td>
                <td>2020-12-26 19:47:26</td>
                <td></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                    <a title="Sửa" class=" btn-edit-prd text-success">
                        <i class="bi bi-pencil"></i>
                    </a>

                </td>
            </tr>
            <tr>
                <td>L0001</td>
                <td>Áo sơ mi</td>
                <td>2020-12-26 19:47:26</td>
                <td></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                    <a title="Sửa" class=" btn-edit-prd text-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>L0001</td>
                <td>Áo sơ mi</td>
                <td>2020-12-26 19:47:26</td>
                <td></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                    <a title="Sửa" class=" btn-edit-prd text-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>L0001</td>
                <td>Áo sơ mi</td>
                <td>2020-12-26 19:47:26</td>
                <td></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                    <a title="Sửa" class=" btn-edit-prd text-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>

=======
            <?php echo renderTableTpyeProduct(); ?>
>>>>>>> Admin
        </tbody>
        <tfoot>
            <tr>
                <th>Mã loại sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Thao tác</th>
            </tr>
        </tfoot>
    </table>
</div>
<<<<<<< HEAD
=======

<!-- Modal remove  -->
<div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeModalLable">Xóa loại sản phẩm</h5>
            </div>
            <div class="modal-body">
                <h3>Bạn có muốn xóa sản phẩm?</h3>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary btn-comfirm" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary btn-comfirm">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- Update type product -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Cập nhật loại sản phẩm</h5>
            </div>
            <div class="modal-body">
                <form action="admin_typeProducts.php" method="POST">
                    <div class="form-group text-start">
                        <label for="idType" class="form-label  fw-bold">Mã loại sản phẩm</label>
                        <input name="idType" type="number" class="form-control" id="idType" readonly="readonly">
                    </div>
                    <div class="form-group text-start">
                        <label for="updateType" class="form-label  fw-bold">Loại sản phẩm</label>
                        <input name="updateType" type="text" class="form-control" id="updateType" placeholder="Nhập loại sản phẩm" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Add type product -->

<!-- Form ajax -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Thêm loại sản phẩm</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group text-start">
                        <label for="addType" class="form-label  fw-bold">Loại sản phẩm</label>
                        <input name="addType" type="text" class="form-control" id="addType" placeholder="Nhập loại sản phẩm" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-addType">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        var table = $('.table').DataTable({
            responsive: true,
            className: 'dt-body-center',
            "pageLength": 50
        });
        var row;
        var id = "";


        // Remove record
        $(".btn-comfirm").click(function(event) {
            var yes = $(this).text();
            if (yes == 'Yes') {
                $.ajax({
                    url: "admin_typeProducts.php",
                    type: "POST",
                    cache: false,
                    data: {
                        deleteId: id
                    },
                     success: function(){
                    document.location = "admin_typeProducts.php";
                }
                });

                row.remove().draw(false)
                row = null;
                $('#removeModal').modal('hide');
            }
        });
        // Add record
        $("#btn-addType").click(function(event) {
            $.ajax({
                url: "admin_typeProducts.php",
                type: "POST",
                cache: false,
                data: {
                    addType: $("#addType").val()
                }, 
                success: function(){
                    document.location = "admin_typeProducts.php";
                }
            });
            $('#addModal').modal('hide');
        });


        $.fn.setEventChangePage = function() {

            $(".btn-delete").click(function(event) {
                row = table.row($(this).parents('tr'));
                id = row.data()[0];
            });
            $(".btn-edit").click(function(event) {
                row = table.row($(this).parents('tr'));
                id = row.data()[0];
                $('#idType').val(id);
            });
        }


        $.fn.setEventChangePage();
        $('.paginate_button').on('click', function() {
            $.fn.setEventChangePage();
        });
    })
</script>
>>>>>>> Admin
<?php include './admin_footer.php'; ?>