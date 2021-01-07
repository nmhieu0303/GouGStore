<?php
$title="Sản phẩm yêu thích";
require_once 'init.php';
include 'header.php'; 
$allMyProducts = getAllMyProduct($currentUser['id']);
?>
<h2 class="text-center display-5 mb-4">DANH SÁCH SẢN PHẨM YÊU THÍCH</h2>

<?php include 'footer.php'; ?>