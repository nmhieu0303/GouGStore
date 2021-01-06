<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<h2 class="text-center">THÊM SẢN PHẨM</h2>
<div class="panel-form my-5">
    <div class="col-lg-8 mx-auto">
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Mã sản phẩm</label>
            <input id="id" name="id" type="text" class="form-control" style="background-color: #81F7D8;" readonly="readonly" value="SP<?php echo (getLastIDProduct() + 1); ?>">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Tên sản phẩm</label>
            <input id="name" name="name" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" required>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="gender" class="form-label fw-bold" required>Giới tính</label>
                    <select class="form-select" name="gender" id="gender">
                        <option selected> -- Chọn giới tính -- </option>
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                        <option value="3">Trẻ em</option>
                        <option value="3">Cả nam và nữ</option>
                    </select>
                </div>
                <div class="col">
                    <label for="type" class="form-label fw-bold" required>Loại sản phẩm</label>
                    <select class="form-select" id="type" name="type">
                        <option selected> -- Loại sản phẩm -- </option>
                        <option value="1">Giày</option>
                        <option value="2">Quần</option>
                        <option value="3">Áo</option>
                        <option value="3">Nón</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="color" class="form-label fw-bold" required>Màu sắc</label>
                    <select class="form-select" id="color" name="color">
                        <option selected>-- Chọn màu --</option>
                        <option value="1">Xanh</option>
                        <option value="2">Đỏ</option>
                        <option value="3">Vàng</option>
                        <option value="3">Cam</option>
                    </select>
                </div>
                <div class="col">
                    <label for="quantity" class="form-label fw-bold">Số lượng</label>
                    <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Số lượng" required>
                </div>
            </div>
        </div>
        <!-- Text area editor -->
        <div class="mb-3">
            <label for="desc" class="form-label fw-bold">Chi tiết sản phẩm</label>
            <textarea id="desc" name="desc" required></textarea>
        </div>
        <div class="mb-3">
            <div class="row mt-3">
                <div class="col">
                    <label for="import_price" class="form-label fw-bold">Giá nhập</label>
                    <input name="import_price" type="number" class="form-control" id="import_price" placeholder="Giá nhập" required>
                </div>
                <div class="col">
                    <label for="import_price" class="form-label fw-bold">Giá bán</label>
                    <input name="price" type="number" class="form-control" id="price" placeholder="Giá bán" required>
                </div>
                <div class="col">
                    <label for="promotion_price" class="form-label fw-bold">Giá khuyến mãi</label>
                    <input name="promotion_price" type="number" class="form-control" id="promotion_price" placeholder="Giá khuyến mãi" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Hình ảnh mô tả</label>
            <div class="file-loading">
                <input id="input-res-1" name="input-res-1[]" type="file" multiple>
            </div>
        </div>
        <div class="mb-3">
            <div class="row mt-5">
                <div class="col">
                    <!-- Checked switch -->
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="hotCheck" name="hot" />
                        <h5 class="form-check-label fw-bold" for="hotCheck">Sản phẩm bán chạy</h5>
                    </div>
                </div>
                <div class="col">
                    <!-- Checked switch -->
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="newCheck" checked name="new" />
                        <h5 class="form-check-label fw-bold" for="newCheck">Sản phẩm mới</h5>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4 py-1">
        <div class="row">
            <div class="text-end">
                <button type="button" class="btn btn-danger fw-bold" name="cancel">Hủy</button>
                <button type="button" class="btn btn-success fw-bold" name="add" id="btn-add">Thêm sản phẩm</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#btn-add").click(function(event) {
            $.ajax({
                url: "admin_productsAll.php",
                type: "POST",
                cache: false,
                data: {
                    id: $("#id").val(),
                    name: $("#name").val(),
                    gender: $("#gender").val(),
                    type: $("#type").val(),
                    color: $("#color").val(),
                    quantity: $("#quantity").val(),
                    desc: $("#desc").val(),
                    import_price: $("#import_price").val(),
                    price: $("#price").val(),
                    promotion_price: $("#promotion_price").val(),
                    add: ""
                },
                success: function(data) {
                    document.location = "admin_productsAll.php"; // tried this doesn't work
                }
            });
        });
    })
</script>
<?php include './admin_footer.php'; ?>