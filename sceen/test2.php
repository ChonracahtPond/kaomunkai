<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="pieChart" width="400" height="400"></canvas>

<script>
    <?php
    include("../../connection.php");

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // SQL query to find the best-selling menu items
    $sql = "SELECT m.menu_name, SUM(od.quantity) AS total_quantity_sold
            FROM orderdetail od
            JOIN menu m ON od.menu_id = m.menu_id
            GROUP BY m.menu_name
            ORDER BY total_quantity_sold DESC";

    $result = $con->query($sql);

    $labels = [];
    $data = [];
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $labels[] = $row["menu_name"];
            $data[] = $row["total_quantity_sold"];
        }
    }

    $con->close();
    ?>

    var ctx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Total Quantity Sold',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Best Selling Menu Items'
            }
        }
    });
</script>
