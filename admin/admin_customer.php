<<<<<<< HEAD

<?php 
require_once 'init.php';
include './admin_header.php';
include './admin_side-menu.php'; 
$allUser = getAllUser();
?>
<h2 class="text-center display-5 mb-4">DANH SÁCH SẢN PHẨM</h2>

<table id="listProduct" class="table hover row-border" style="width:100%">
            <thead>
                <tr>
                    <th>Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đăng ký</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
    <?php 
    $i=0;
    foreach( $allUser as $value )       
    {
        if ($value['username'] != 'admin') 
        {?>                  
                <tbody>

                        <tr>
                            <td><?php echo $value['id'] ;?></td>
                            <td><?php echo $value['username']; ?></td>
                            <td><?php echo $value['address']; ?></td>
                            <td><?php echo $value['create_at']; ?></td>
                            <td><?php echo $value['phone_number']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td class="text-center"><a href="" class="btn-delete-prd text-danger"><i class="far fa-times-circle"></i></a></td>
                        </tr>                        
                </tbody>
                
        </div>
            <?php         
            $i++;
        }      
    }
    ?>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Image</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </tfoot>
</table>

=======
<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<h2 class="text-center display-5 mb-4">DANH SÁCH KHÁCH HÀNG</h2>
<div class=" mt-6">
    <table id="tableCustomer" class="table hover row-border" style="width:100%">
        <thead>
            <tr>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Ngày đăng ký</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
                <?php echo renderTableUsers()?>
        </tbody>
        <tfoot>
            <tr>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Ngày đăng ký</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Thao tác</th>
            </tr>
        </tfoot>
    </table>
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
                <button type="button" class="btn btn-secondary btn-comfirm" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary btn-comfirm">Yes</button>
            </div>
        </div>
    </div>
</div>
>>>>>>> Admin
<?php include './admin_footer.php'; ?>