<?php
require_once 'init.php';
$title="Trang chủ";
// Xử lý logic ở đây
if(isset($_POST["unsetBill"])){
  unset($_SESSION["id_bill"]);
}

if (isset($_POST['content-post']) && isset($_FILES["img-post"])) {
  $file = $_FILES["img-post"];
  $img = file_get_contents($file['tmp_name']);
  header('Location: index.php');
  exit();
}

?>

<?php include 'header.php'; ?>
<div id="data-container"></div>
<div id="pagination-container"></div>
<script>
    
$(document).ready(function() {
    $('#pagination-container').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12, 195],
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        $('#data-container').html(html);
    }
})
});
</script>

<?php include 'footer.php'; ?>