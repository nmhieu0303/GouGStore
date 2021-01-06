<?php include './admin_header.php';
var_dump($_POST); ?>



<div id="div1">
    <h2>Let jQuery AJAX Change This Text</h2>
</div>

<button>Get External Content</button>
<script>
    $(document).ready(function() {
        $("button").click(function(event) {
            $.ajax({
                url: "add.php",
                type: "POST",
                cache: false,
                data: {
                    id: 1,
                    name: 2,
                    gender: 3,
                    type: 4,
                    color:5,
                    quantity:6,
                    desc: 7,
                    import_price: 8,
                    update: ""
                },
                success: function(data) {
                    document.location = "add.php"; // tried this doesn't work
                },
            });
        });
    })
</script>
<?php include './admin_footer.php'; ?>

</body>

</html>