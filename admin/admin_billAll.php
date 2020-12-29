<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<h2 class="text-center display-5 mb-4">DANH SÁCH LOẠI SẢN PHẨM</h2>
<div class="row">
    <div class="w-100 text-end">
        <a href="./admin_create_product.php" class="btn btn-primary btn-rounded ml-auto" id="btn-add">Thêm mới</a>
    </div>
</div>
<div class=" mt-3">
    <table id="listProduct" class="table hover row-border align-middle" style="width:100%">
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
            <tr>
                <td>L0001</td>
                <td>Áo sơ mi</td>
                <td>2020-12-26 19:47:26</td>
                <td></td>
                <td class="text-center">
                    <a title="Xoa" class=" btn-delete-prd text-danger">
                        <i class="far fa-times-circle"></i>
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
                </td>
            </tr>

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
<?php include './admin_footer.php'; ?>