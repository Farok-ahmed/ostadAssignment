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
    o.order_ID,
    p.name AS product_name,
    oi.quantity,
    (oi.quantity * oi.unit_price) AS total_amount
FROM
    Order_Items oi
INNER JOIN
    Products p
ON
    oi.product_ID = p.product_ID
INNER JOIN
    Orders o
ON
    oi.order_ID = o.order_ID
ORDER BY
    o.order_ID ASC
LIMIT 0, 25;";

$result = $mysqli->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Process and use the data here
        echo "Order ID: " . $row['order_ID'] . "<br>";
        echo "Product Name: " . $row['product_name'] . "<br>";
        echo "Quantity: " . $row['quantity'] . "<br>";
        echo "Total Amount: " . $row['total_amount'] . "<br>";
    }
} else {
    echo "Error executing the query: " . $mysqli->error;
}

$mysqli->close();
?>
