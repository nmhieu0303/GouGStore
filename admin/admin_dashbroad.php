<?php $title = "Thống kê bán hàng";?>
<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<?php


$optionChart = $_GET["option"];
$typeDashboard = $optionChart == "day"? "NGÀY": ($optionChart == "month"? "THÁNG":"NĂM");

$dataPoints = getRevenue($optionChart);
?>
<h2 class="text-center display-5 mb-4 font-weight-bold">THỐNG KÊ BÁN HÀNG THEO <?php echo $typeDashboard?></h2>
<div class=" mt-6">
    <div class="container w-75 my-auto mx-auto my-5" id="chartRevenue" style="height: 370px; width: 100%;"></div>
</div>
<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartRevenue", {
            animationEnabled: true,

            title: {
                text: "Doanh thu bán hàng"
            },
            axisX: {
                crosshair: {
                    enabled: true,
                    snapToDataPoint: true
                }
            },
            axisY: {
                includeZero: true,
                crosshair: {
                    enabled: true,
                    snapToDataPoint: true,

                },
                suffix: "VNĐ"
            },
            toolTip: {
                enabled: false
            },
            data: [{
                type: "area",
                xValueType: "dateTime",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>
<?php include './admin_footer.php'; ?>