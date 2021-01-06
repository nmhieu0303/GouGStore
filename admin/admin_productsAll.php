<<<<<<< HEAD
=======
<?php
require_once 'init.php';
if (
    isset($_POST['id']) && isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['type'])
    && isset($_POST['color']) && isset($_POST['quantity']) && isset($_POST['desc']) && isset($_POST['import_price'])
    && isset($_POST['price']) && isset($_POST['promotion_price'])
) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $type = $_POST['type'];
    $color = $_POST['color'];
    $quantity = $_POST['quantity'];
    $desc = $_POST['desc'];
    $import_price = $_POST['import_price'];
    $price = $_POST['price'];
    $promotion_price = $_POST['promotion_price'];
    if (isset($_POST['hot']))
        $hot = 1;
    else $hot = 0;

    if (isset($_POST['new']))
        $new = 1;
    else $new = 0;

    if (isset($_POST['add'])) {
        var_dump($_POST);
        createProduct($id, $name, $type, $gender, $desc, $import_price, $price, $promotion_price, 'haha', $new, $hot);
    }
    elseif (isset($_POST['update'])) {
        updateProduct($id, $name, $type, $gender, $desc, $import_price, $price, $promotion_price, 'haha', $new, $hot);
    }
}
?>
>>>>>>> Admin
<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<h2 class="text-center display-5 mb-4">DANH SÁCH SẢN PHẨM</h2>
<div class="row">
<<<<<<< HEAD
    <div class="w-100 text-end">
        <a href="./admin_createProduct.php" class="btn btn-primary btn-rounded ml-auto" id="btn-add">Thêm mới</a>
    </div>
</div>
<div class=" mt-3">
    <table id="listProduct" class="table hover row-border align-middle" style="width:100%">
=======
    <div class="w-100 d-flex justify-content-between">
        <a href="./admin_productsInStore.php" class="btn btn-success btn-rounded mr-auto" id="btn-add"><i class="fas fa-store"></i> Kho</a>
        <a href="./admin_createProduct.php" class="btn btn-primary btn-rounded ml-auto" id="btn-add">Thêm mới</a>

    </div>
</div>
<div class=" mt-3">
    <table id="table" class="table hover row-border align-middle" style="width:100%">
>>>>>>> Admin
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Giá nhập</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
<<<<<<< HEAD
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>SP1007</td>
                <td>Áo sơ mi nam</td>
                <td>Áo sơ mi</td>
                <td>200000</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>

        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Image</th>
                <th>Start date</th>
                <th>Salary</th>
=======
            <?php echo  renderTableProduct(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Giá nhập</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
>>>>>>> Admin
            </tr>
        </tfoot>
    </table>
</div>

<<<<<<< HEAD
=======
<div class="modal fade" id="comfirmModal" tabindex="-1" aria-labelledby="comfirmModalLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comfirmModalLable">Thêm loại sản phẩm</h5>
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

>>>>>>> Admin
<?php include './admin_footer.php'; ?>