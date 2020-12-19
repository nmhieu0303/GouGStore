<?php
require_once 'init.php';
// Xử lý logic ở đây
if(isset($_POST['content-post']) && isset($_FILES["img-post"])){
  $file = $_FILES["img-post"];
  $img = file_get_contents($file['tmp_name']);
  createNewPost($currentUser['id'],$_POST['content-post'],$img);
  renderNewFeed();
  header('Location: index.php');
  exit();
}
?>

<?php include 'header.php'; ?>

<?php include 'slidePanner.php'; ?>

<?php include 'footer.php'; ?>