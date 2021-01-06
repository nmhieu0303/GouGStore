<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<h2 class="text-center display-5 mb-4">KHO HÀNG</h2>
<<<<<<< HEAD
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
    </div>
</div>

<div class=" mt-3">
    <table id="listProduct" class="table hover row-border align-middle" style="width:100%">
=======

<div class=" mt-3">
    <table id="table" class="table hover row-border align-middle" style="width:100%">
>>>>>>> Admin
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng tồn</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mại</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>L0001</td>
                <td>Áo sơ mi</td>
                <td>3</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
<<<<<<< HEAD
                    <a title="Xoa" class=" btn-delete-prd text-danger">
=======
                    <a title="edit" class="  btn-control text-success" data-toggle="modal" data-target="#updateQuantityModal">
                        <i class="far fa-edit"></i>
                    </a>
                    <a title="Xoa" class=" btn-delete  btn-control text-danger">
>>>>>>> Admin
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>L0001</td>
                <td>Áo sơ mi</td>
                <td>3</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
<<<<<<< HEAD
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr> <tr>
=======
                    <a title="edit" class="  btn-control text-success" data-toggle="modal" data-target="#updateQuantityModal">
                        <i class="far fa-edit"></i>
                    </a>
                    <a title="Xoa" class=" btn-delete  btn-control text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
>>>>>>> Admin
                <td>L0001</td>
                <td>Áo sơ mi</td>
                <td>3</td>
                <td>280000</td>
                <td>250000</td>
                <td><img id="img_load" src="../assets/img/pro_2-500x500.jpg" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
<<<<<<< HEAD
                    <a title="Xoa" class=" btn-delete-prd text-danger">
=======
                    <a title="edit" class="  btn-control text-success" data-toggle="modal" data-target="#updateQuantityModal">
                        <i class="far fa-edit"></i>
                    </a>
                    <a title="Xoa" class=" btn-delete  btn-control text-danger">
>>>>>>> Admin
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
<<<<<<< HEAD
            <th>Mã sản phẩm</th>
=======
                <th>Mã sản phẩm</th>
>>>>>>> Admin
                <th>Tên sản phẩm</th>
                <th>Số lượng tồn</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mại</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </tfoot>
    </table>
</div>
<<<<<<< HEAD
=======
<div class="modal fade" id="updateQuantityModal" tabindex="-1" aria-labelledby="updateQuantityModalLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateQuantityModalLable">Cập nhật số lượng</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group text-start">
                        <label for="quantity" class="form-label  fw-bold">Số lượng sản phẩm tồn kho</label>
                        <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Nhập số lượng sản phẩm trong kho" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</div>


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
                        <button type="button" class="btn btn-secondary btn-comfirm" data-dismiss="modal" >No</button>
                        <button type="button" class="btn btn-primary btn-comfirm">Yes</button>
                    </div>
                </div>
            </div>
        </div>
>>>>>>> Admin
<?php include './admin_footer.php'; ?>