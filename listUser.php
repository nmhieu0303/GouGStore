<?php 
require_once 'init.php';
include 'header.php';
$allUser = getAllUser();
?>

<h1>DANH SÁCH TÀI KHOẢN KHÁCH HÀNG</h1>

<?php $i=0;
foreach( $allUser as $value )       
{
    if ($value['username'] != 'admin') 
    {?>
        <ul class="list-group">
        <li class="list-group-item"><?php echo $value['username'] .' - '. $value['email'] .' - '. $value['full_name'] .' - '. $value['phone_number'] .' - '. $value['create_at'];?> </li>
        </ul>
        <?php 
        $i++;
    }   
}?>

<?php include 'footer.php'; ?>
