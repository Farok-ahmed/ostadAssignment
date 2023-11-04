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
    c.name AS customer_name,
    SUM(oi.quantity * oi.unit_price) AS total_purchase_amount
FROM
    Customers c
LEFT JOIN
    Orders o
ON
    c.customer_id = o.customer_id
LEFT JOIN
    Order_Items oi
ON
    o.order_id = oi.order_id
GROUP BY
    c.name
ORDER BY
    total_purchase_amount DESC
LIMIT 5
";

$result = $mysqli->query($sql);

if ($result) {
    echo "<table>";
    echo "<thead>";
    echo "<th>Customer Name</th>";
    echo "<th>Total Purchase Amount</th>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['customer_name'] . "</td>";
        echo "<td>" . $row['total_purchase_amount'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "Error executing the query: " . $mysqli->error;
}

$mysqli->close();
?>
