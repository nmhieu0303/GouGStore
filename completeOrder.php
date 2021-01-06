<?php require_once 'init.php';
$title = 'Complete order';

$id_cart = 1;
var_dump($_POST);

if (isset($_POST["addCartDetail"])) {
    $id_cart = 1;
    $id_cartDetail = $_POST["id_product"];
    $quantity = $_POST["quantity"];
    $size = $_POST["size"];
    $price = (int)$_POST["price"];
    addCartDetail($id_cart, $id_cartDetail, $size, $quantity,$price);
}

?>


<?php include './header.php'; ?>


<?php include './footer.php'; ?>