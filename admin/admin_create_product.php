<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<h2 class="text-center">THÊM SẢN PHẨM</h2>
<div class="panel-form mt-5">
    <div class="col-lg-8 mx-auto">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" required>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="gender" class="form-label" required>Giới tính</label>
                    <select class="form-select" name="gender" id="gender">
                        <option selected> -- Chọn giới tính -- </option>
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                        <option value="3">Trẻ em</option>
                        <option value="3">Cả nam và nữ</option>
                    </select>
                </div>
                <div class="col">
                    <label for="type_prd" class="form-label" required>Loại sản phẩm</label>
                    <select class="form-select" id="type_prd">
                        <option selected> -- Loại sản phẩm -- </option>
                        <option value="1">Giày</option>
                        <option value="2">Quần</option>
                        <option value="3">Áo</option>
                        <option value="3">Nón</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="color_prd" class="form-label" required>Màu sắc</label>
                    <select class="form-select" id="type_prd">
                        <option selected>-- Chọn màu --</option>
                        <option value="1">Xanh</option>
                        <option value="2">Đỏ</option>
                        <option value="3">Vàng</option>
                        <option value="3">Cam</option>
                    </select>
                </div>
                <div class="col">
                    <label for="brand_prd" class="form-label" required>Nhãn hiệu</label>
                    <select class="form-select" id="type_prd">
                        <option selected> -- Chọn nhãn hiệu -- </option>
                        <option value="1">Nike</option>
                        <option value="2">SWE</option>
                        <option value="3">NOW</option>
                        <option value="3">5THEWAY</option>
                    </select></div>
            </div>
        </div>
        <!-- Text area editor -->
        <div class="mb-3">
            <label for="dcs_prd" class="form-label">Chi tiết sản phẩm</label>
            <div id="dcs_prd" required></div>
        </div>
        <div class="mb-3">
            <div class="row mt-3">
                <div class="col">
                    <label for="import_price" class="form-label">Giá nhập</label>
                    <input name="import_price" type="number" class="form-control" id="import_price" placeholder="Giá nhập" required>
                </div>
                <div class="col">
                    <label for="import_price" class="form-label">Giá bán</label>
                    <input name="price" type="number" class="form-control" id="price" placeholder="Giá bán" required>
                </div>
                <div class="col">
                    <label for="promotion_price" class="form-label">Giá khuyến mãi</label>
                    <input name="promotion_price" type="number" class="form-control" id="promotion_price" placeholder="Giá khuyến mãi" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <form action="upload_file.php" method="post" enctype="multipart/form-data">
                <input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple />
                <input type="submit" name='submit_image' value="Upload Image" />
            </form>
            <div id="image_preview" class="d-flex"></div>
        </div>
    </div>

</div>
<?php include './admin_footer.php'; ?>