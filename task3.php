<?php
$hostname = '127.0.0.1';
$username = 'root';
$password = '';
$db = 'real_life_business';

$mysqli = new mysqli($hostname, $username, $password, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT
    c.name AS category_name,
    SUM(oi.quantity * oi.unit_price) AS total_revenue
FROM
    Order_Items oi
INNER JOIN
    Products p
ON
    oi.product_id = p.product_id
INNER JOIN
    Categories c
ON
    p.category_id = c.category_id
GROUP BY
    c.name
ORDER BY
    total_revenue DESC";

$result = $mysqli->query($sql);

if ($result) {
    echo "<table>";
    echo "<thead>";
    echo "<th>Category Name</th>";
    echo "<th>Total Revenue</th>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['category_name'] . "</td>";
        echo "<td>" . $row['total_revenue'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "Error executing the query: " . $mysqli->error;
}

$mysqli->close();
?>
