
<?php 
require_once '../init.php';
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

<?php include './admin_footer.php'; ?>