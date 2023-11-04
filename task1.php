
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
    c.customer_id,
    c.name AS customer_name,
    c.email,
    c.location,
    COUNT(o.order_id) AS total_orders
FROM
    Customers c
LEFT JOIN
    Orders o
ON
    c.customer_id = o.customer_id
GROUP BY
    c.customer_id, c.name, c.email, c.location
ORDER BY
    total_orders DESC";

$result = $mysqli->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Process and use the data here
        echo "Customer ID: " . $row['customer_id'] . "<br>";
        echo "Customer Name: " . $row['customer_name'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Location: " . $row['location'] . "<br>";
        echo "Total Orders: " . $row['total_orders'] . "<br>";
    }
} else {
    echo "Error executing the query: " . $mysqli->error;
}

